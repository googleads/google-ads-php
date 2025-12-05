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

use DomainException;
use Google\Auth\ApplicationDefaultCredentials;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Google\Auth\Credentials\UserRefreshCredentials;
use Google\Auth\FetchAuthTokenInterface;
use InvalidArgumentException;
use UnexpectedValueException;
use Google\Ads\GoogleAds\Util\EnvironmentalVariables;

/**
 * Builds OAuth2 access token fetchers.
 *
 * @see FetchAuthTokenInterface
 */
final class OAuth2TokenBuilder extends AbstractGoogleAdsBuilder
{
    private const DEFAULT_SCOPE = 'https://www.googleapis.com/auth/adwords';

    private $jsonKeyFilePath;
    private $scopes;
    private $impersonatedEmail;

    private $clientId;
    private $clientSecret;
    private $refreshToken;

    private $adcFetcher;

    public function __construct(
        ConfigurationLoader $configurationLoader = null,
        ?EnvironmentalVariables $environmentalVariables = null,
    ) {
        parent::__construct($configurationLoader, $environmentalVariables);
        $this->adcFetcher = [ApplicationDefaultCredentials::class, 'getCredentials'];
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
     * @see GoogleAdsBuilder::fromEnvironmentVariablesConfiguration()
     */
    public function fromEnvironmentVariablesConfiguration(Configuration $configuration)
    {
        $this->clientId = $configuration->getConfiguration('CLIENT_ID') ?? $this->clientId;
        $this->clientSecret = $configuration->getConfiguration('CLIENT_SECRET') ??
            $this->clientSecret;
        $this->refreshToken = $configuration->getConfiguration('REFRESH_TOKEN') ??
            $this->refreshToken;
        $this->jsonKeyFilePath = $configuration->getConfiguration('JSON_KEY_FILE_PATH') ??
            $this->jsonKeyFilePath;
        $this->impersonatedEmail = $configuration->getConfiguration('IMPERSONATED_EMAIL') ??
            $this->impersonatedEmail;

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
    public function build(): FetchAuthTokenInterface
    {
        $this->defaultOptionals();

        // Determine the final scope array to use for User Refresh and ADC.
        $scopeArrayForUserAndAdc = explode(' ', $this->scopes);

        // 1. Check for **EXPLICIT** Service Account Flow
        if (!empty($this->jsonKeyFilePath)) {
            if (is_null($this->scopes)) {
                throw new InvalidArgumentException(
                    "Both 'jsonKeyFilePath' and 'scopes' must be set when using service account flow."
                );
            }
            if (
                !is_null($this->clientId)
                || !is_null($this->clientSecret)
                || !is_null($this->refreshToken)
            ) {
                    throw new InvalidArgumentException(
                        "Cannot have both service account flow and installed/web "
                        . "application flow credential values set."
                    );
            }
            // Service Account flow uses the specific configured scope string
            return new ServiceAccountCredentials(
                $scopeArrayForUserAndAdc,
                $this->jsonKeyFilePath,
                $this->impersonatedEmail
            );
        }

        // 2. Check for **EXPLICIT** User Refresh Token Flow (Installed/Web App)
        if (!empty($this->refreshToken)) {
            if (is_null($this->clientId) || is_null($this->clientSecret)) {
                throw new UnexpectedValueException(
                    "Both 'clientId' and 'clientSecret' must be set when using 'refreshToken'."
                );
            }
            return new UserRefreshCredentials(
                // Use the determined scope array, allowing configuration via $this->scopes
                $scopeArrayForUserAndAdc,
                [
                    'client_id' => $this->clientId,
                    'client_secret' => $this->clientSecret,
                    'refresh_token' => $this->refreshToken
                ]
            );
        }

        // 3. FALLBACK: Use Application Default Credentials (ADC)
        try {
            // Use the determined scope array, allowing configuration via $this->scopes
            return call_user_func($this->adcFetcher, $scopeArrayForUserAndAdc);
        } catch (\Google\Auth\CredentialsLoaderException $e) {
            throw new DomainException(
                "No OAuth2 credentials were provided, and the automatic Application Default "
                . "Credentials (ADC) search failed. Please ensure you have run "
                . "'gcloud auth application-default login' or set explicit credentials. "
                . "Underlying error: " . $e->getMessage(),
                0,
                $e
            );
        }
    }

    /**
     * @see GoogleAdsBuilder::defaultOptionals()
     */
    public function defaultOptionals()
    {
        // If the user has not set a custom scope via config or withScopes(),
        // default to the mandatory Google Ads API scope. This is needed for the
        // User Refresh Token and ADC fallback flows.
        if (is_null($this->scopes)) {
            $this->scopes = self::DEFAULT_SCOPE;
        }
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
        if (!is_null($this->jsonKeyFilePath)) {
            if ($this->scopes === self::DEFAULT_SCOPE) {
                throw new InvalidArgumentException(
                    "Both 'jsonKeyFilePath' and "
                    . "'scopes' must be set when using service account flow."
                );
            }
        // Triggers validation if any part of the Installed/Web flow is set; otherwise, allows the ADC fallback.
        } elseif (
            !is_null($this->clientId)
            || !is_null($this->clientSecret)
            || !is_null($this->refreshToken)
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

    /**
     * Overrides the internal Application Default Credentials fetcher for testing purposes.
     * @param callable $adcFetcher The mock or custom callable.
     * @return self
     */
    protected function setAdcFetcherForTesting(callable $adcFetcher): self
    {
        $this->adcFetcher = $adcFetcher;
        return $this;
    }
}
