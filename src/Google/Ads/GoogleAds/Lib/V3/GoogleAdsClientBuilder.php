<?php

/*
 * Copyright 2020 Google LLC
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

namespace Google\Ads\GoogleAds\Lib\V3;

use Google\Ads\GoogleAds\Lib\Configuration;
use Google\Ads\GoogleAds\Lib\ConfigurationLoader;
use Google\Ads\GoogleAds\Lib\GoogleAdsBuilder;
use Google\Auth\FetchAuthTokenInterface;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Builds Google Ads API clients.
 *
 * @see GoogleAdsClient
 */
final class GoogleAdsClientBuilder implements GoogleAdsBuilder
{
    private static $DEFAULT_LOGGER_CHANNEL = 'google-ads';

    private $loggerFactory;

    private $developerToken;
    private $loginCustomerId;
    private $endpoint;
    private $oAuth2Credential;
    private $logger;
    private $logLevel;
    private $proxy;
    private $transport;

    private $configurationLoader;

    public function __construct(ConfigurationLoader $configurationLoader = null)
    {
        $this->configurationLoader = $configurationLoader ?? new ConfigurationLoader();
        $this->loggerFactory = new LoggerFactory();
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
    public function fromFile(string $path = null)
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
        $this->loginCustomerId = $configuration->getConfiguration('loginCustomerId', 'GOOGLE_ADS');
        $this->endpoint =
            $configuration->getConfiguration('endpoint', 'GOOGLE_ADS');
        $this->logLevel = $configuration->getConfiguration('logLevel', 'LOGGING');
        $this->logger = $this->loggerFactory->createLogger(
            self::$DEFAULT_LOGGER_CHANNEL,
            $configuration->getConfiguration('logFilePath', 'LOGGING'),
            $this->logLevel
        );
        $this->proxy = $configuration->getConfiguration('proxy', 'CONNECTION');
        $this->transport = $configuration->getConfiguration('transport', 'CONNECTION');

        return $this;
    }

    /**
     * Includes a developer token. This is required.
     *
     * @param string $developerToken
     * @return self this builder
     */
    public function withDeveloperToken(string $developerToken)
    {
        $this->developerToken = $developerToken;
        return $this;
    }

    /**
     * Sets the login customer ID for this client.
     * Required for manager accounts only. When authenticating as a Google Ads manager account,
     * specifies the customer ID of the authenticating manager account.
     *
     * <p>If your OAuth credentials are for a user with access to multiple manager accounts you must
     * create a separate GoogleAdsClient instance for each manager account. Use this method to
     * set each login customer ID and call build() to create a separate instance.
     *
     * @param string|null $loginCustomerId the login customer ID
     * @return self this builder
     */
    public function withLoginCustomerId(?string $loginCustomerId)
    {
        $this->loginCustomerId = $loginCustomerId;
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
     * Includes a logger to log requests and responses.
     *
     * @param LoggerInterface $logger
     * @return self this builder
     */
    public function withLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * Sets the log level for Google Ads API requests and responses.
     *
     * @param string $logLevel the PSR-3 log level name, e.g., INFO
     * @return self this builder
     */
    public function withLogLevel(string $logLevel)
    {
        $this->logLevel = $logLevel;
        return $this;
    }

    /**
     * Sets the proxy URI for Google Ads API requests in the format protocol://user:pass@host:port.
     *
     * @param string $proxy the proxy URI, e.g., http://user:password@localhost:8080
     * @return self this builder
     */
    public function withProxy(string $proxy)
    {
        $this->proxy = $proxy;
        return $this;
    }

    /**
     * Sets the transport for Google Ads API requests.
     *
     * @param string $transport the transport type to use, supported values are `grpc` and `rest`
     * @return self this builder
     */
    public function withTransport(string $transport)
    {
        $this->transport = $transport;
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
        if (!empty($this->loginCustomerId) && $this->loginCustomerId < 0) {
            throw new InvalidArgumentException('The login customer ID must be a positive number.');
        }

        // Use parse_url instead of filter_var to do less restrict validation.
        // This is because we need to allow endpoint in the form of "googleads.googleapis.com",
        // but filter_var doesn't allow that.
        if (!empty($this->endpoint) && parse_url($this->endpoint) === false) {
            throw new InvalidArgumentException('Endpoint must be a valid URL.');
        }

        // For the proxy URI using filter_var is ok because the GRPC library expects the URI
        // in a very specific format.
        if (!empty($this->proxy) && filter_var($this->proxy, FILTER_VALIDATE_URL) === false) {
            throw new InvalidArgumentException(
                'Proxy must be a valid URI in the form protocol://user:pass@host:port'
            );
        }

        if ($this->oAuth2Credential === null) {
            throw new InvalidArgumentException(
                'OAuth2 authentication credentials must not be null.'
            );
        }

        if (
            !empty($this->transport) && $this->transport !== 'grpc' && $this->transport !== 'rest'
        ) {
            throw new InvalidArgumentException(
                'Transport can only be set as "grpc" or "rest".'
            );
        }

        if (is_null($this->logLevel)) {
            $this->logLevel = LogLevel::INFO;
        } elseif (!defined('Psr\Log\LogLevel::' . strtoupper($this->logLevel))) {
            throw new InvalidArgumentException("The log level must be a valid PSR log level");
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
     * Gets the login customer ID for this client.
     *
     * @return int
     */
    public function getLoginCustomerId()
    {
        return $this->loginCustomerId;
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

    /**
     * Gets the logger used to log requests and responses.
     *
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * Gets the PSR-3 log level for Google Ads API requests and responses.
     *
     * @return string the log level
     */
    public function getLogLevel()
    {
        return $this->logLevel;
    }

    /**
     * Gets the proxy URI.
     *
     * @return string the proxy URI
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * Gets the transport.
     *
     * @return string the transport
     */
    public function getTransport()
    {
        return $this->transport;
    }
}
