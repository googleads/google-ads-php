<?php

/*
 * Copyright 2022 Google LLC
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

namespace Google\Ads\GoogleAds\Lib\V20;

use Google\Ads\GoogleAds\Lib\AbstractGoogleAdsBuilder;
use Google\Ads\GoogleAds\Lib\Configuration;
use Google\Ads\GoogleAds\Lib\ConfigurationLoader;
use Google\Ads\GoogleAds\Lib\GoogleAdsBuilder;
use Google\Ads\GoogleAds\Lib\GoogleAdsMiddlewareAbstract;
use Google\Ads\GoogleAds\Util\Dependencies;
use Google\Ads\GoogleAds\Util\EnvironmentalVariables;
use Google\ApiCore\GrpcSupportTrait;
use Google\Auth\FetchAuthTokenInterface;
use Grpc\ChannelCredentials;
use Grpc\Interceptor;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use UnexpectedValueException;

/**
 * Builds Google Ads API clients.
 *
 * @see GoogleAdsClient
 */
final class GoogleAdsClientBuilder extends AbstractGoogleAdsBuilder
{
    use GrpcSupportTrait;

    private const DEFAULT_LOGGER_CHANNEL = 'google-ads';
    private const DEFAULT_GRPC_CHANNEL_IS_SECURE = true;
    private const DEFAULT_USE_CLOUD_ORG_FOR_API_ACCESS = false;

    private $loggerFactory;

    private $developerToken;
    private $useCloudOrgForApiAccess;
    private $loginCustomerId;
    private $linkedCustomerId;
    private $endpoint;
    private $oAuth2Credential;
    private $logger;
    private $logLevel;
    private $proxy;
    private $transport;
    private $grpcChannelIsSecure;
    private $grpcChannelCredential;
    private $unaryMiddlewares = [];
    private $streamingMiddlewares = [];
    private $grpcInterceptors = [];
    private $httpHandler =  null;
    /** @var Dependencies $dependencies */
    private $dependencies;

    public function __construct(
        ConfigurationLoader $configurationLoader = null,
        EnvironmentalVariables $environmentalVariables = null
    ) {
        parent::__construct($configurationLoader, $environmentalVariables);
        $this->loggerFactory = new LoggerFactory();
        $this->grpcChannelIsSecure = self::DEFAULT_GRPC_CHANNEL_IS_SECURE;
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
        $this->useCloudOrgForApiAccess =
            is_null($configuration->getConfiguration('useCloudOrgForApiAccess', 'GOOGLE_ADS'))
            || $configuration->getConfiguration('useCloudOrgForApiAccess', 'GOOGLE_ADS') === ""
                ? self::DEFAULT_USE_CLOUD_ORG_FOR_API_ACCESS
                : filter_var(
                    $configuration->getConfiguration('useCloudOrgForApiAccess', 'GOOGLE_ADS'),
                    FILTER_VALIDATE_BOOLEAN,
                    // Defaults when value is not a valid boolean.
                    [
                        'options' => ['default' => self::DEFAULT_USE_CLOUD_ORG_FOR_API_ACCESS],
                        'flags' => FILTER_NULL_ON_FAILURE
                    ]
                );
        $this->loginCustomerId = $configuration->getConfiguration('loginCustomerId', 'GOOGLE_ADS');
        $this->linkedCustomerId =
            $configuration->getConfiguration('linkedCustomerId', 'GOOGLE_ADS');
        $this->endpoint =
            $configuration->getConfiguration('endpoint', 'GOOGLE_ADS');
        $this->logLevel = $configuration->getConfiguration('logLevel', 'LOGGING');
        $this->logger = $this->loggerFactory->createLogger(
            self::DEFAULT_LOGGER_CHANNEL,
            $configuration->getConfiguration('logFilePath', 'LOGGING'),
            $this->logLevel
        );
        $this->proxy = $configuration->getConfiguration('proxy', 'CONNECTION');
        $this->transport = $configuration->getConfiguration('transport', 'CONNECTION');
        $this->grpcChannelIsSecure =
            is_null($configuration->getConfiguration('grpcChannelIsSecure', 'CONNECTION'))
            || $configuration->getConfiguration('grpcChannelIsSecure', 'CONNECTION') === ""
                // Defaults when value is not defined or an empty string.
                ? self::DEFAULT_GRPC_CHANNEL_IS_SECURE
                : filter_var(
                    $configuration->getConfiguration('grpcChannelIsSecure', 'CONNECTION'),
                    FILTER_VALIDATE_BOOLEAN,
                    // Defaults when value is not a valid boolean.
                    [
                        'options' => ['default' => self::DEFAULT_GRPC_CHANNEL_IS_SECURE],
                        'flags' => FILTER_NULL_ON_FAILURE
                    ]
                );

        return $this;
    }

    /**
     * Populates this builder from the specified configuration object.
     *
     * @param Configuration $configuration the configuration
     * @return self this builder populated from the configuration
     */
    public function fromEnvironmentVariablesConfiguration(Configuration $configuration)
    {
        $this->developerToken = $configuration->getConfiguration('DEVELOPER_TOKEN') ??
            $this->developerToken;
        $this->loginCustomerId = $configuration->getConfiguration('LOGIN_CUSTOMER_ID') ??
            $this->loginCustomerId;
        $this->linkedCustomerId = $configuration->getConfiguration('LINKED_CUSTOMER_ID') ??
            $this->linkedCustomerId;
        $this->endpoint = $configuration->getConfiguration('ENDPOINT') ?? $this->endpoint;

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
     * Sets whether this library should use Google Cloud organization for API access.
     *
     * @param bool $useCloudOrgForApiAccess
     * @return self this builder
     */
    public function usingCloudOrgForApiAccess(bool $useCloudOrgForApiAccess)
    {
        $this->useCloudOrgForApiAccess = $useCloudOrgForApiAccess;
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
     * @param int|null $loginCustomerId the login customer ID
     * @return self this builder
     */
    public function withLoginCustomerId(?int $loginCustomerId)
    {
        $this->loginCustomerId = $loginCustomerId;
        return $this;
    }

    /**
     * Sets the linked customer ID for this client.
     *
     * This header is only required for methods that update the resources of an entity when
     * permissioned via Linked Accounts in the Google Ads UI (AccountLink resource in the Google Ads
     * API). Set this value to the customer ID of the data provider that updates the resources of
     * the specified customer ID. It should be set without dashes, for example: 1234567890 instead
     * of 123-456-7890. Read https://support.google.com/google-ads/answer/7365001 to learn more
     * about Linked Accounts.
     *
     * @param int|null $linkedCustomerId the linked customer ID
     * @return self this builder
     */
    public function withLinkedCustomerId(?int $linkedCustomerId)
    {
        $this->linkedCustomerId = $linkedCustomerId;
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
     * Sets whether the gRPC channel for Google Ads API requests is secure or not.
     *
     * @param bool $grpcChannelIsSecure
     * @return self this builder
     */
    public function withGrpcChannelIsSecure(bool $grpcChannelIsSecure)
    {
        $this->grpcChannelIsSecure = $grpcChannelIsSecure;
        return $this;
    }

    /**
     * Sets the gRPC channel credential for Google Ads API requests.
     *
     * @param ChannelCredentials $grpcChannelCredential
     * @return self this builder
     */
    public function withGrpcChannelCredential(ChannelCredentials $grpcChannelCredential)
    {
        $this->grpcChannelCredential = $grpcChannelCredential;
        return $this;
    }

    /**
     * Sets the unary middlewares for Google Ads API requests. They execute in order after the ones
     * defined by the library.
     *
     * @param GoogleAdsMiddlewareAbstract ...$unaryMiddlewares the Google Ads unary middlewares
     * @return self this builder
     */
    public function withUnaryMiddlewares(GoogleAdsMiddlewareAbstract ...$unaryMiddlewares)
    {
        $this->unaryMiddlewares = $unaryMiddlewares;
        return $this;
    }

    /**
     * Sets the streaming middlewares for Google Ads API requests. They execute in order after the ones
     * defined by the library.
     *
     * @param GoogleAdsMiddlewareAbstract ...$streamingMiddlewares the Google Ads streaming middlewares
     * @return self this builder
     */
    public function withStreamingMiddlewares(GoogleAdsMiddlewareAbstract ...$streamingMiddlewares)
    {
        $this->streamingMiddlewares = $streamingMiddlewares;
        return $this;
    }

    /**
     * Sets the gRPC interceptors for Google Ads API requests. They execute in order after the ones
     * defined by the library.
     *
     * @param Interceptor ...$grpcInterceptors the gRPC interceptors
     * @return self this builder
     */
    public function withGrpcInterceptors(Interceptor ...$grpcInterceptors)
    {
        $this->grpcInterceptors = $grpcInterceptors;
        return $this;
    }

    /**
     * Sets the REST HTTP handler for Google Ads API requests.
     *
     * @param callable $httpHandler the HTTP handler
     * @return self this builder
     */
    public function withHttpHandler(callable $httpHandler)
    {
        $this->httpHandler = $httpHandler;
        return $this;
    }

    /**
     * Sets the Dependencies utilities for this Google Ads client builder.
     *
     * @param Dependencies $dependencies
     * @return self this builder
     */
    public function withDependencies(Dependencies $dependencies)
    {
        $this->dependencies = $dependencies;
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
        $this->dependencies = $this->dependencies ?? new Dependencies();
    }

    /**
     * @see GoogleAdsBuilder::validate()
     */
    public function validate()
    {
        if (
            !$this->useCloudOrgForApiAccess
            && (is_null($this->developerToken) || empty(trim($this->developerToken)))
        ) {
            throw new InvalidArgumentException('A developer token must be set.');
        }
        if (!empty($this->loginCustomerId) && $this->loginCustomerId < 0) {
            throw new InvalidArgumentException('The login customer ID must be a positive number.');
        }
        if (!empty($this->linkedCustomerId) && $this->linkedCustomerId < 0) {
            throw new InvalidArgumentException('The linked customer ID must be a positive number.');
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

        if (
            !empty($this->transport) && $this->transport === 'grpc'
        ) {
            self::validateGrpcSupport();
        }

        if (is_null($this->logLevel)) {
            $this->logLevel = LogLevel::INFO;
        } elseif (!defined('Psr\Log\LogLevel::' . strtoupper($this->logLevel))) {
            throw new InvalidArgumentException("The log level must be a valid PSR log level");
        }

        if (!$this->grpcChannelIsSecure && $this->grpcChannelCredential !== null) {
            throw new InvalidArgumentException(
                'The gRPC channel credential can only be set when the gRPC channel is set as ' .
                'secure.'
            );
        }

        if (
            !empty($this->transport) && $this->transport !== 'grpc'
            && !$this->grpcChannelIsSecure
        ) {
            throw new InvalidArgumentException(
                'The gRPC channel can only be set as insecure when the transport is "grpc".'
            );
        }
        if (
            !empty($this->transport) && $this->transport !== 'grpc'
            && $this->grpcChannelCredential !== null
        ) {
            throw new InvalidArgumentException(
                'The gRPC channel credential can only be set when the transport is "grpc".'
            );
        }
        // Check if the version of the grpc extension installed by Composer is greater than that of
        // the extension installed as a system package, throw an exception to remind the user to
        // upgrade.
        $grpcPackageVersion = $this->dependencies->getGrpcSystemPackageVersion();
        $grpcComposerVersion = $this->dependencies->getGrpcComposerVersion();
        if (
            !empty($grpcComposerVersion) && !empty($grpcPackageVersion)
            && version_compare($grpcComposerVersion, $grpcPackageVersion, '>')
        ) {
            throw new UnexpectedValueException(
                'The grpc extension installed by Composer has a greater version than that'
                . ' installed by PECL. Upgrade the PECL extension to avoid issues caused by the'
                . ' version difference. For linux, run "sudo pecl install grpc".'
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
     * Returns true when this library is set to use Google Cloud organization for API access.
     *
     * @return bool
     */
    public function useCloudOrgForApiAccess()
    {
        return $this->useCloudOrgForApiAccess;
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
     * Gets the linked customer ID for this client.
     *
     * @return int
     */
    public function getLinkedCustomerId()
    {
        return $this->linkedCustomerId;
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

    /**
     * Returns whether the gRPC channel is secure or not.
     *
     * @return bool
     */
    public function getGrpcChannelIsSecure()
    {
        return $this->grpcChannelIsSecure;
    }

    /**
     * Gets the gRPC channel credential.
     *
     * @return ChannelCredentials|null
     */
    public function getGrpcChannelCredential()
    {
        return $this->grpcChannelCredential;
    }

    /**
     * Gets the Google Ads unary middlewares.
     *
     * @return GoogleAdsMiddlewareAbstract[] the Google Ads unary middlewares
     */
    public function getUnaryMiddlewares()
    {
        return $this->unaryMiddlewares;
    }

    /**
     * Gets the Google Ads streaming middlewares.
     *
     * @return GoogleAdsMiddlewareAbstract[] the Google Ads streaming middlewares
     */
    public function getStreamingMiddlewares()
    {
        return $this->streamingMiddlewares;
    }

    /**
     * Gets the gRPC interceptors.
     *
     * @return Interceptor[] the gRPC interceptors
     */
    public function getGrpcInterceptors()
    {
        return $this->grpcInterceptors;
    }

    /**
     * Gets the REST HTTP handler.
     *
     * @return callable|null the REST HTTP handler
     */
    public function getHttpHandler()
    {
        return $this->httpHandler;
    }
}
