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

    private $clientId;
    private $clientSecret;
    private $refreshToken;

    public function __construct()
    {
        $this->configurationLoader = new ConfigurationLoader();
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
     * @see GoogleAdsBuilder::build()
     *
     * @return FetchAuthTokenInterface the created OAuth2 object that can fetch auth tokens
     */
    public function build()
    {
        $this->defaultOptionals();
        $this->validate();
        
        return new UserRefreshCredentials(
            null,
            [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'refresh_token' => $this->refreshToken
            ]
        );
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
        if (is_null($this->clientId)
            || is_null($this->clientSecret)
            || is_null($this->refreshToken)) {
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
}
