<?php

/*
 * Copyright 2018 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Ads\GoogleAds\Lib;

use Google\Auth\Credentials\ServiceAccountCredentials;
use Google\Auth\Credentials\UserRefreshCredentials;
use Google\Auth\FetchAuthTokenInterface;
use InvalidArgumentException;
use UnexpectedValueException;

/**
 * Builds OAuth2 access token fetchers.
 *
 * @see FetchAuthTokenInterface
 */
final class OAuth2TokenBuilder implements GoogleAdsBuilder
{

    private $configurationLoader;

    private $jsonKeyFilePath;
    private $scopes;
    private $impersonatedEmail;

    private $clientId;
    private $clientSecret;
    private $refreshToken;

    public function __construct(ConfigurationLoader $configurationLoader = null)
    {
        $this->configurationLoader = $configurationLoader ?? new ConfigurationLoader();
    }

    /**
     * Reads configuration settings from the specified file path. The file path is
     * optional, and if omitted, it will look for the default configuration
     * filename in the home directory of the user running PHP.
     *
     * @see GoogleAdsBuilder::DEFAULT_CONFIGURATION_FILENAME
     *
     * @param string $path the file path
     * @return self this builder populated from the configuration
     * @throws InvalidArgumentException if the configuration file could not be
     *     found
     */
    public function fromFile($path = null)
    {
        if ($path === null) {
            $path = self::DEFAULT_CONFIGURATION_FILENAME;
        }
        return $this->from($this->configurationLoader->fromFile($path));
    }

    /**
     * @see GoogleAdsBuilder::from()
     */
    public function from(Configuration $configuration)
    {
        $this->clientId = $configuration->getConfiguration('clientId', 'OAUTH2');
        $this->clientSecret = $configuration->getConfiguration('clientSecret', 'OAUTH2');
        $this->refreshToken = $configuration->getConfiguration('refreshToken', 'OAUTH2');
        $this->jsonKeyFilePath = $configuration->getConfiguration('jsonKeyFilePath', 'OAUTH2');
        $this->scopes = $configuration->getConfiguration('scopes', 'OAUTH2');
        $this->impersonatedEmail = $configuration->getConfiguration('impersonatedEmail', 'OAUTH2');

        return $this;
    }

    /**
     * Includes an OAuth2 client ID. Required when using installed application or
     * web application flow.
     *
     * @param string $clientId
     * @return self this builder
     */
    public function withClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * Includes an OAuth2 client secret. Required when using installed application
     * or web application flow.
     *
     * @param string $clientSecret
     * @return self this builder
     */
    public function withClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }

    /**
     * Includes an OAuth2 refresh token. Required when using installed application
     * or web application flow.
     *
     * @param string $refreshToken
     * @return self this builder
     */
    public function withRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    /**
     * Includes an absolute path to an OAuth2 JSON key file when using service
     * account flow. Required and only applicable when using service account flow.
     *
     * @param string $jsonKeyFilePath
     * @return OAuth2TokenBuilder this builder
     */
    public function withJsonKeyFilePath(string $jsonKeyFilePath): self
    {
        $this->jsonKeyFilePath = $jsonKeyFilePath;
        return $this;
    }

    /**
     * Includes OAuth2 scopes. Required and only applicable when using service
     * account flow.
     *
     * @param string $scopes a space-delimited list of scopes
     * @return OAuth2TokenBuilder this builder
     */
    public function withScopes($scopes): self
    {
        $this->scopes = $scopes;
        return $this;
    }

    /**
     * Includes an email of account to impersonate when using service account
     * flow. Optional and only applicable when using service account flow.
     *
     * @param string|null $impersonatedEmail
     * @return OAuth2TokenBuilder this builder
     */
    public function withImpersonatedEmail(?string $impersonatedEmail): self
    {
        $this->impersonatedEmail = $impersonatedEmail;
        return $this;
    }

    /**
     * @see GoogleAdsBuilder::build()
     *
     * @return FetchAuthTokenInterface the created OAuth2 object that can fetch auth tokens
     */
    public function build()
    {
        $this->defaultOptionals();
        $this->validate();

        if ($this->jsonKeyFilePath !== null) {
            return new ServiceAccountCredentials(
                $this->scopes,
                $this->jsonKeyFilePath,
                $this->impersonatedEmail
            );
        } else {
            return new UserRefreshCredentials(null, [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'refresh_token' => $this->refreshToken
            ]);
        }
    }

    /**
     * @see GoogleAdsBuilder::defaultOptionals()
     */
    public function defaultOptionals()
    {
        // Nothing to default for this builder.
    }

    /**
     * @see GoogleAdsBuilder::validate()
     */
    public function validate()
    {
        if (
            (!is_null($this->jsonKeyFilePath) || !is_null($this->scopes))
            && (!is_null($this->clientId) || !is_null($this->clientSecret)
                || !is_null($this->refreshToken))
        ) {
            throw new InvalidArgumentException(
                'Cannot have both service account '
                . 'flow and installed/web application flow credential values set.'
            );
        }
        if (!is_null($this->jsonKeyFilePath) || !is_null($this->scopes)) {
            if (is_null($this->jsonKeyFilePath) || is_null($this->scopes)) {
                throw new InvalidArgumentException(
                    "Both 'jsonKeyFilePath' and "
                    . "'scopes' must be set when using service account flow."
                );
            }
        } elseif (
            is_null($this->clientId)
            || is_null($this->clientSecret)
            || is_null($this->refreshToken)
        ) {
            throw new UnexpectedValueException(
                "All of 'clientId', 'clientSecret', and 'refreshToken' must be set when using "
                . "installed/web application flow."
            );
        }
    }

    /**
     * Gets the client ID.
     *
     * @return string|null
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Gets the client secret.
     *
     * @return string|null
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Gets the refresh token.
     *
     * @return string|null
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * Gets the JSON key file path.
     *
     * @return string|null
     */
    public function getJsonKeyFilePath()
    {
        return $this->jsonKeyFilePath;
    }

    /**
     * Gets the scopes.
     *
     * @return string|null
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * Gets the impersonated email.
     *
     * @return string|null
     */
    public function getImpersonatedEmail()
    {
        return $this->impersonatedEmail;
    }
}
