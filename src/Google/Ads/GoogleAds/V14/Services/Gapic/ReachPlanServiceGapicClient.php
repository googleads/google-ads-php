<?php
/*
 * Copyright 2023 Google LLC
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
 * https://github.com/googleapis/googleapis/blob/master/google/ads/googleads/v14/services/reach_plan_service.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Ads\GoogleAds\V14\Services\Gapic;

use Google\Ads\GoogleAds\V14\Services\CampaignDuration;
use Google\Ads\GoogleAds\V14\Services\EffectiveFrequencyLimit;
use Google\Ads\GoogleAds\V14\Services\ForecastMetricOptions;
use Google\Ads\GoogleAds\V14\Services\FrequencyCap;
use Google\Ads\GoogleAds\V14\Services\GenerateReachForecastRequest;
use Google\Ads\GoogleAds\V14\Services\GenerateReachForecastResponse;
use Google\Ads\GoogleAds\V14\Services\ListPlannableLocationsRequest;
use Google\Ads\GoogleAds\V14\Services\ListPlannableLocationsResponse;
use Google\Ads\GoogleAds\V14\Services\ListPlannableProductsRequest;
use Google\Ads\GoogleAds\V14\Services\ListPlannableProductsResponse;
use Google\Ads\GoogleAds\V14\Services\PlannedProduct;
use Google\Ads\GoogleAds\V14\Services\Targeting;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;

/**
 * Service Description: Reach Plan Service gives users information about audience size that can
 * be reached through advertisement on YouTube. In particular,
 * GenerateReachForecast provides estimated number of people of specified
 * demographics that can be reached by an ad in a given market by a campaign of
 * certain duration with a defined budget.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $reachPlanServiceClient = new ReachPlanServiceClient();
 * try {
 *     $customerId = 'customer_id';
 *     $campaignDuration = new CampaignDuration();
 *     $plannedProducts = [];
 *     $response = $reachPlanServiceClient->generateReachForecast($customerId, $campaignDuration, $plannedProducts);
 * } finally {
 *     $reachPlanServiceClient->close();
 * }
 * ```
 */
class ReachPlanServiceGapicClient
{
    use GapicClientTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'google.ads.googleads.v14.services.ReachPlanService';

    /** The default address of the service. */
    const SERVICE_ADDRESS = 'googleads.googleapis.com';

    /** The default port of the service. */
    const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/adwords',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/reach_plan_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/reach_plan_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/reach_plan_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/reach_plan_service_rest_client_config.php',
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
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * Generates a reach forecast for a given targeting / product mix.
     *
     * List of thrown errors:
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [FieldError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RangeError]()
     * [ReachPlanError]()
     * [RequestError]()
     *
     * Sample code:
     * ```
     * $reachPlanServiceClient = new ReachPlanServiceClient();
     * try {
     *     $customerId = 'customer_id';
     *     $campaignDuration = new CampaignDuration();
     *     $plannedProducts = [];
     *     $response = $reachPlanServiceClient->generateReachForecast($customerId, $campaignDuration, $plannedProducts);
     * } finally {
     *     $reachPlanServiceClient->close();
     * }
     * ```
     *
     * @param string           $customerId       Required. The ID of the customer.
     * @param CampaignDuration $campaignDuration Required. Campaign duration.
     * @param PlannedProduct[] $plannedProducts  Required. The products to be forecast.
     *                                           The max number of allowed planned products is 15.
     * @param array            $optionalArgs     {
     *     Optional.
     *
     *     @type string $currencyCode
     *           The currency code.
     *           Three-character ISO 4217 currency code.
     *     @type int $cookieFrequencyCap
     *           Chosen cookie frequency cap to be applied to each planned product.
     *           This is equivalent to the frequency cap exposed in Google Ads when creating
     *           a campaign, it represents the maximum number of times an ad can be shown to
     *           the same user.
     *           If not specified, no cap is applied.
     *
     *           This field is deprecated in v4 and will eventually be removed.
     *           Use cookie_frequency_cap_setting instead.
     *     @type FrequencyCap $cookieFrequencyCapSetting
     *           Chosen cookie frequency cap to be applied to each planned product.
     *           This is equivalent to the frequency cap exposed in Google Ads when creating
     *           a campaign, it represents the maximum number of times an ad can be shown to
     *           the same user during a specified time interval.
     *           If not specified, a default of 0 (no cap) is applied.
     *
     *           This field replaces the deprecated cookie_frequency_cap field.
     *     @type int $minEffectiveFrequency
     *           Chosen minimum effective frequency (the number of times a person was
     *           exposed to the ad) for the reported reach metrics [1-10].
     *           This won't affect the targeting, but just the reporting.
     *           If not specified, a default of 1 is applied.
     *
     *           This field cannot be combined with the effective_frequency_limit field.
     *     @type EffectiveFrequencyLimit $effectiveFrequencyLimit
     *           The highest minimum effective frequency (the number of times a person was
     *           exposed to the ad) value [1-10] to include in
     *           Forecast.effective_frequency_breakdowns.
     *           If not specified, Forecast.effective_frequency_breakdowns will not be
     *           provided.
     *
     *           The effective frequency value provided here will also be used as the
     *           minimum effective frequency for the reported reach metrics.
     *
     *           This field cannot be combined with the min_effective_frequency field.
     *     @type Targeting $targeting
     *           The targeting to be applied to all products selected in the product mix.
     *
     *           This is planned targeting: execution details might vary based on the
     *           advertising product, consult an implementation specialist.
     *
     *           See specific metrics for details on how targeting affects them.
     *     @type ForecastMetricOptions $forecastMetricOptions
     *           Controls the forecast metrics returned in the response.
     *     @type string $customerReachGroup
     *           The name of the customer being planned for. This is a user-defined value.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V14\Services\GenerateReachForecastResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function generateReachForecast($customerId, $campaignDuration, $plannedProducts, array $optionalArgs = [])
    {
        $request = new GenerateReachForecastRequest();
        $requestParamHeaders = [];
        $request->setCustomerId($customerId);
        $request->setCampaignDuration($campaignDuration);
        $request->setPlannedProducts($plannedProducts);
        $requestParamHeaders['customer_id'] = $customerId;
        if (isset($optionalArgs['currencyCode'])) {
            $request->setCurrencyCode($optionalArgs['currencyCode']);
        }

        if (isset($optionalArgs['cookieFrequencyCap'])) {
            $request->setCookieFrequencyCap($optionalArgs['cookieFrequencyCap']);
        }

        if (isset($optionalArgs['cookieFrequencyCapSetting'])) {
            $request->setCookieFrequencyCapSetting($optionalArgs['cookieFrequencyCapSetting']);
        }

        if (isset($optionalArgs['minEffectiveFrequency'])) {
            $request->setMinEffectiveFrequency($optionalArgs['minEffectiveFrequency']);
        }

        if (isset($optionalArgs['effectiveFrequencyLimit'])) {
            $request->setEffectiveFrequencyLimit($optionalArgs['effectiveFrequencyLimit']);
        }

        if (isset($optionalArgs['targeting'])) {
            $request->setTargeting($optionalArgs['targeting']);
        }

        if (isset($optionalArgs['forecastMetricOptions'])) {
            $request->setForecastMetricOptions($optionalArgs['forecastMetricOptions']);
        }

        if (isset($optionalArgs['customerReachGroup'])) {
            $request->setCustomerReachGroup($optionalArgs['customerReachGroup']);
        }

        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('GenerateReachForecast', GenerateReachForecastResponse::class, $optionalArgs, $request)->wait();
    }

    /**
     * Returns the list of plannable locations (for example, countries).
     *
     * List of thrown errors:
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RequestError]()
     *
     * Sample code:
     * ```
     * $reachPlanServiceClient = new ReachPlanServiceClient();
     * try {
     *     $response = $reachPlanServiceClient->listPlannableLocations();
     * } finally {
     *     $reachPlanServiceClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V14\Services\ListPlannableLocationsResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function listPlannableLocations(array $optionalArgs = [])
    {
        $request = new ListPlannableLocationsRequest();
        return $this->startCall('ListPlannableLocations', ListPlannableLocationsResponse::class, $optionalArgs, $request)->wait();
    }

    /**
     * Returns the list of per-location plannable YouTube ad formats with allowed
     * targeting.
     *
     * List of thrown errors:
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [HeaderError]()
     * [InternalError]()
     * [QuotaError]()
     * [RequestError]()
     *
     * Sample code:
     * ```
     * $reachPlanServiceClient = new ReachPlanServiceClient();
     * try {
     *     $plannableLocationId = 'plannable_location_id';
     *     $response = $reachPlanServiceClient->listPlannableProducts($plannableLocationId);
     * } finally {
     *     $reachPlanServiceClient->close();
     * }
     * ```
     *
     * @param string $plannableLocationId Required. The ID of the selected location for planning. To list the
     *                                    available plannable location IDs use
     *                                    [ReachPlanService.ListPlannableLocations][google.ads.googleads.v14.services.ReachPlanService.ListPlannableLocations].
     * @param array  $optionalArgs        {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V14\Services\ListPlannableProductsResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function listPlannableProducts($plannableLocationId, array $optionalArgs = [])
    {
        $request = new ListPlannableProductsRequest();
        $request->setPlannableLocationId($plannableLocationId);
        return $this->startCall('ListPlannableProducts', ListPlannableProductsResponse::class, $optionalArgs, $request)->wait();
    }
}
