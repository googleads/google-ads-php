<?php
/*
 * Copyright 2025 Google LLC
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

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/ads/googleads/v19/services/audience_insights_service.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Ads\GoogleAds\V19\Services\Client;

use Google\Ads\GoogleAds\Lib\V19\GoogleAdsGapicClientTrait;
use Google\Ads\GoogleAds\V19\Services\GenerateAudienceCompositionInsightsRequest;
use Google\Ads\GoogleAds\V19\Services\GenerateAudienceCompositionInsightsResponse;
use Google\Ads\GoogleAds\V19\Services\GenerateAudienceOverlapInsightsRequest;
use Google\Ads\GoogleAds\V19\Services\GenerateAudienceOverlapInsightsResponse;
use Google\Ads\GoogleAds\V19\Services\GenerateInsightsFinderReportRequest;
use Google\Ads\GoogleAds\V19\Services\GenerateInsightsFinderReportResponse;
use Google\Ads\GoogleAds\V19\Services\GenerateSuggestedTargetingInsightsRequest;
use Google\Ads\GoogleAds\V19\Services\GenerateSuggestedTargetingInsightsResponse;
use Google\Ads\GoogleAds\V19\Services\GenerateTargetingSuggestionMetricsRequest;
use Google\Ads\GoogleAds\V19\Services\GenerateTargetingSuggestionMetricsResponse;
use Google\Ads\GoogleAds\V19\Services\ListAudienceInsightsAttributesRequest;
use Google\Ads\GoogleAds\V19\Services\ListAudienceInsightsAttributesResponse;
use Google\Ads\GoogleAds\V19\Services\ListInsightsEligibleDatesRequest;
use Google\Ads\GoogleAds\V19\Services\ListInsightsEligibleDatesResponse;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Log\LoggerInterface;

/**
 * Service Description: Audience Insights Service helps users find information about groups of
 * people and how they can be reached with Google Ads. Accessible to
 * allowlisted customers only.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * @method PromiseInterface<GenerateAudienceCompositionInsightsResponse> generateAudienceCompositionInsightsAsync(GenerateAudienceCompositionInsightsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<GenerateAudienceOverlapInsightsResponse> generateAudienceOverlapInsightsAsync(GenerateAudienceOverlapInsightsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<GenerateInsightsFinderReportResponse> generateInsightsFinderReportAsync(GenerateInsightsFinderReportRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<GenerateSuggestedTargetingInsightsResponse> generateSuggestedTargetingInsightsAsync(GenerateSuggestedTargetingInsightsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<GenerateTargetingSuggestionMetricsResponse> generateTargetingSuggestionMetricsAsync(GenerateTargetingSuggestionMetricsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<ListAudienceInsightsAttributesResponse> listAudienceInsightsAttributesAsync(ListAudienceInsightsAttributesRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<ListInsightsEligibleDatesResponse> listInsightsEligibleDatesAsync(ListInsightsEligibleDatesRequest $request, array $optionalArgs = [])
 */
class AudienceInsightsServiceClient
{
    use GapicClientTrait, GoogleAdsGapicClientTrait {
        GoogleAdsGapicClientTrait::modifyClientOptions insteadof GapicClientTrait;
        GoogleAdsGapicClientTrait::modifyUnaryCallable insteadof GapicClientTrait;
        GoogleAdsGapicClientTrait::modifyStreamingCallable insteadof GapicClientTrait;
    }

    /** The name of the service. */
    private const SERVICE_NAME = 'google.ads.googleads.v19.services.AudienceInsightsService';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    private const SERVICE_ADDRESS = 'googleads.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'googleads.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/adwords',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/audience_insights_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/audience_insights_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/audience_insights_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/audience_insights_service_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'googleads.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *           *Important*: If you accept a credential configuration (credential
     *           JSON/File/Stream) from an external source for authentication to Google Cloud
     *           Platform, you must validate it before providing it to any Google API or library.
     *           Providing an unvalidated credential configuration to Google APIs can compromise
     *           the security of your systems and data. For more information {@see
     *           https://cloud.google.com/docs/authentication/external/externally-sourced-credentials}
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     *     @type false|LoggerInterface $logger
     *           A PSR-3 compliant logger. If set to false, logging is disabled, ignoring the
     *           'GOOGLE_SDK_PHP_LOGGING' environment flag
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * Returns a collection of attributes that are represented in an audience of
     * interest, with metrics that compare each attribute's share of the audience
     * with its share of a baseline audience.
     *
     * List of thrown errors:
     * [AudienceInsightsError]()
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [FieldError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RangeError]()
     * [RequestError]()
     *
     * The async variant is
     * {@see AudienceInsightsServiceClient::generateAudienceCompositionInsightsAsync()}
     * .
     *
     * @param GenerateAudienceCompositionInsightsRequest $request     A request to house fields associated with the call.
     * @param array                                      $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return GenerateAudienceCompositionInsightsResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function generateAudienceCompositionInsights(GenerateAudienceCompositionInsightsRequest $request, array $callOptions = []): GenerateAudienceCompositionInsightsResponse
    {
        return $this->startApiCall('GenerateAudienceCompositionInsights', $request, $callOptions)->wait();
    }

    /**
     * Returns a collection of audience attributes along with estimates of the
     * overlap between their potential YouTube reach and that of a given input
     * attribute.
     *
     * List of thrown errors:
     * [AudienceInsightsError]()
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [FieldError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RangeError]()
     * [RequestError]()
     *
     * The async variant is
     * {@see AudienceInsightsServiceClient::generateAudienceOverlapInsightsAsync()} .
     *
     * @param GenerateAudienceOverlapInsightsRequest $request     A request to house fields associated with the call.
     * @param array                                  $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return GenerateAudienceOverlapInsightsResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function generateAudienceOverlapInsights(GenerateAudienceOverlapInsightsRequest $request, array $callOptions = []): GenerateAudienceOverlapInsightsResponse
    {
        return $this->startApiCall('GenerateAudienceOverlapInsights', $request, $callOptions)->wait();
    }

    /**
     * Creates a saved report that can be viewed in the Insights Finder tool.
     *
     * List of thrown errors:
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [FieldError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RangeError]()
     * [RequestError]()
     *
     * The async variant is
     * {@see AudienceInsightsServiceClient::generateInsightsFinderReportAsync()} .
     *
     * @param GenerateInsightsFinderReportRequest $request     A request to house fields associated with the call.
     * @param array                               $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return GenerateInsightsFinderReportResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function generateInsightsFinderReport(GenerateInsightsFinderReportRequest $request, array $callOptions = []): GenerateInsightsFinderReportResponse
    {
        return $this->startApiCall('GenerateInsightsFinderReport', $request, $callOptions)->wait();
    }

    /**
     * Returns a collection of targeting insights (e.g. targetable audiences) that
     * are relevant to the requested audience.
     *
     * List of thrown errors:
     * [AudienceInsightsError]()
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [FieldError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RangeError]()
     * [RequestError]()
     *
     * The async variant is
     * {@see AudienceInsightsServiceClient::generateSuggestedTargetingInsightsAsync()}
     * .
     *
     * @param GenerateSuggestedTargetingInsightsRequest $request     A request to house fields associated with the call.
     * @param array                                     $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return GenerateSuggestedTargetingInsightsResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function generateSuggestedTargetingInsights(GenerateSuggestedTargetingInsightsRequest $request, array $callOptions = []): GenerateSuggestedTargetingInsightsResponse
    {
        return $this->startApiCall('GenerateSuggestedTargetingInsights', $request, $callOptions)->wait();
    }

    /**
     * Returns potential reach metrics for targetable audiences.
     *
     * This method helps answer questions like "How many Men aged 18+ interested
     * in Camping can be reached on YouTube?"
     *
     * List of thrown errors:
     * [AudienceInsightsError]()
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [FieldError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RangeError]()
     * [RequestError]()
     *
     * The async variant is
     * {@see AudienceInsightsServiceClient::generateTargetingSuggestionMetricsAsync()}
     * .
     *
     * @param GenerateTargetingSuggestionMetricsRequest $request     A request to house fields associated with the call.
     * @param array                                     $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return GenerateTargetingSuggestionMetricsResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function generateTargetingSuggestionMetrics(GenerateTargetingSuggestionMetricsRequest $request, array $callOptions = []): GenerateTargetingSuggestionMetricsResponse
    {
        return $this->startApiCall('GenerateTargetingSuggestionMetrics', $request, $callOptions)->wait();
    }

    /**
     * Searches for audience attributes that can be used to generate insights.
     *
     * List of thrown errors:
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [FieldError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RangeError]()
     * [RequestError]()
     *
     * The async variant is
     * {@see AudienceInsightsServiceClient::listAudienceInsightsAttributesAsync()} .
     *
     * @param ListAudienceInsightsAttributesRequest $request     A request to house fields associated with the call.
     * @param array                                 $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return ListAudienceInsightsAttributesResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listAudienceInsightsAttributes(ListAudienceInsightsAttributesRequest $request, array $callOptions = []): ListAudienceInsightsAttributesResponse
    {
        return $this->startApiCall('ListAudienceInsightsAttributes', $request, $callOptions)->wait();
    }

    /**
     * Lists date ranges for which audience insights data can be requested.
     *
     * List of thrown errors:
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [FieldError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RangeError]()
     * [RequestError]()
     *
     * The async variant is
     * {@see AudienceInsightsServiceClient::listInsightsEligibleDatesAsync()} .
     *
     * @param ListInsightsEligibleDatesRequest $request     A request to house fields associated with the call.
     * @param array                            $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return ListInsightsEligibleDatesResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listInsightsEligibleDates(ListInsightsEligibleDatesRequest $request, array $callOptions = []): ListInsightsEligibleDatesResponse
    {
        return $this->startApiCall('ListInsightsEligibleDates', $request, $callOptions)->wait();
    }
}
