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

use Google\Auth\FetchAuthTokenInterface;
use InvalidArgumentException;

/**
 * Builds Google Ads API clients.
 *
 * @see GoogleAdsClient
 */
final class GoogleAdsClientBuilder implements GoogleAdsBuilder
{
    private $developerToken;
    private $endpoint;
    private $oAuth2Credential;

    private $configurationLoader;

    public function __construct()
    {
        $this->configurationLoader = new ConfigurationLoader();
    }

    /**
     * Reads configuration settings from the specified file path. The file path
     * is optional, and if omitted, it will look for the default configuration
     * filename in the home directory of the user running PHP.
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
     * Populates this builder from the specified configuration object.
     *
     * @param Configuration $configuration the configuration
     * @return self this builder populated from the configuration
     */
    public function from(Configuration $configuration)
    {
        $this->developerToken =
            $configuration->getConfiguration('developerToken', 'GOOGLE_ADS');
        $this->endpoint =
            $configuration->getConfiguration('endpoint', 'GOOGLE_ADS');

        return $this;
    }

    /**
     * Includes a developer token. This is required.
     *
     * @param string $developerToken
     * @return self this builder
     */
    public function withDeveloperToken($developerToken)
    {
        $this->developerToken = $developerToken;
        return $this;
    }

    /**
     * Includes the Google Ads API server's base endpoint. This is optional.
     *
     * @param string|null $endpoint
     * @return self this builder
     */
    public function withEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * Includes the OAuth2 credential to be used for authentication. This is
     * required.
     *
     * @param FetchAuthTokenInterface $oAuth2Credential
     * @return self this builder
     */
    public function withOAuth2Credential(FetchAuthTokenInterface $oAuth2Credential)
    {
        $this->oAuth2Credential = $oAuth2Credential;
        return $this;
    }

    /**
     * @see GoogleAdsBuilder::build()
     *
     * @return GoogleAdsClient the created Google Ads client
     */
    public function build()
    {
        $this->defaultOptionals();
        $this->validate();

        return new GoogleAdsClient($this);
    }

    /**
     * @see GoogleAdsBuilder::defaultOptionals()
     */
    public function defaultOptionals()
    {
        // No default optionals for this class.
    }

    /**
     * @see GoogleAdsBuilder::validate()
     */
    public function validate()
    {
        if (is_null($this->developerToken) || empty(trim($this->developerToken))) {
            throw new InvalidArgumentException('A developer token must be set.');
        }

        // Use parse_url instead of filter_var to do less restrict validation.
        // This is because we need to allow endpoint in the form of "googleads.googleapis.com",
        // but filter_var doesn't allow that.
        if (!empty($this->endpoint) && parse_url($this->endpoint) === false) {
            throw new InvalidArgumentException('Endpoint must be a valid URL.');
        }

        if ($this->oAuth2Credential === null) {
            throw new InvalidArgumentException(
                'OAuth2 authentication credentials must not be null.'
            );
        }
    }

    /**
     * Gets the developer token.
     *
     * @return string
     */
    public function getDeveloperToken()
    {
        return $this->developerToken;
    }

    /**
     * Gets the endpoint.
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Gets the OAuth2 credential.
     *
     * @return FetchAuthTokenInterface
     */
    public function getOAuth2Credential()
    {
        return $this->oAuth2Credential;
    }
}
