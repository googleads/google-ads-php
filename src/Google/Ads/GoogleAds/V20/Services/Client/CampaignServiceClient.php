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
 * https://github.com/googleapis/googleapis/blob/master/google/ads/googleads/v20/services/campaign_service.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Ads\GoogleAds\V20\Services\Client;

use Google\Ads\GoogleAds\Lib\V20\GoogleAdsGapicClientTrait;
use Google\Ads\GoogleAds\V20\Services\EnablePMaxBrandGuidelinesRequest;
use Google\Ads\GoogleAds\V20\Services\EnablePMaxBrandGuidelinesResponse;
use Google\Ads\GoogleAds\V20\Services\MutateCampaignsRequest;
use Google\Ads\GoogleAds\V20\Services\MutateCampaignsResponse;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Log\LoggerInterface;

/**
 * Service Description: Service to manage campaigns.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @method PromiseInterface<EnablePMaxBrandGuidelinesResponse> enablePMaxBrandGuidelinesAsync(EnablePMaxBrandGuidelinesRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<MutateCampaignsResponse> mutateCampaignsAsync(MutateCampaignsRequest $request, array $optionalArgs = [])
 */
class CampaignServiceClient
{
    use GapicClientTrait, GoogleAdsGapicClientTrait {
        GoogleAdsGapicClientTrait::modifyClientOptions insteadof GapicClientTrait;
        GoogleAdsGapicClientTrait::modifyUnaryCallable insteadof GapicClientTrait;
        GoogleAdsGapicClientTrait::modifyStreamingCallable insteadof GapicClientTrait;
    }
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.ads.googleads.v20.services.CampaignService';

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
            'clientConfig' => __DIR__ . '/../resources/campaign_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/campaign_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/campaign_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/campaign_service_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * accessible_bidding_strategy resource.
     *
     * @param string $customerId
     * @param string $biddingStrategyId
     *
     * @return string The formatted accessible_bidding_strategy resource.
     */
    public static function accessibleBiddingStrategyName(string $customerId, string $biddingStrategyId): string
    {
        return self::getPathTemplate('accessibleBiddingStrategy')->render([
            'customer_id' => $customerId,
            'bidding_strategy_id' => $biddingStrategyId,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a asset_set
     * resource.
     *
     * @param string $customerId
     * @param string $assetSetId
     *
     * @return string The formatted asset_set resource.
     */
    public static function assetSetName(string $customerId, string $assetSetId): string
    {
        return self::getPathTemplate('assetSet')->render([
            'customer_id' => $customerId,
            'asset_set_id' => $assetSetId,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * bidding_strategy resource.
     *
     * @param string $customerId
     * @param string $biddingStrategyId
     *
     * @return string The formatted bidding_strategy resource.
     */
    public static function biddingStrategyName(string $customerId, string $biddingStrategyId): string
    {
        return self::getPathTemplate('biddingStrategy')->render([
            'customer_id' => $customerId,
            'bidding_strategy_id' => $biddingStrategyId,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a campaign
     * resource.
     *
     * @param string $customerId
     * @param string $campaignId
     *
     * @return string The formatted campaign resource.
     */
    public static function campaignName(string $customerId, string $campaignId): string
    {
        return self::getPathTemplate('campaign')->render([
            'customer_id' => $customerId,
            'campaign_id' => $campaignId,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * campaign_budget resource.
     *
     * @param string $customerId
     * @param string $campaignBudgetId
     *
     * @return string The formatted campaign_budget resource.
     */
    public static function campaignBudgetName(string $customerId, string $campaignBudgetId): string
    {
        return self::getPathTemplate('campaignBudget')->render([
            'customer_id' => $customerId,
            'campaign_budget_id' => $campaignBudgetId,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * campaign_group resource.
     *
     * @param string $customerId
     * @param string $campaignGroupId
     *
     * @return string The formatted campaign_group resource.
     */
    public static function campaignGroupName(string $customerId, string $campaignGroupId): string
    {
        return self::getPathTemplate('campaignGroup')->render([
            'customer_id' => $customerId,
            'campaign_group_id' => $campaignGroupId,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * campaign_label resource.
     *
     * @param string $customerId
     * @param string $campaignId
     * @param string $labelId
     *
     * @return string The formatted campaign_label resource.
     */
    public static function campaignLabelName(string $customerId, string $campaignId, string $labelId): string
    {
        return self::getPathTemplate('campaignLabel')->render([
            'customer_id' => $customerId,
            'campaign_id' => $campaignId,
            'label_id' => $labelId,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * conversion_action resource.
     *
     * @param string $customerId
     * @param string $conversionActionId
     *
     * @return string The formatted conversion_action resource.
     */
    public static function conversionActionName(string $customerId, string $conversionActionId): string
    {
        return self::getPathTemplate('conversionAction')->render([
            'customer_id' => $customerId,
            'conversion_action_id' => $conversionActionId,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - accessibleBiddingStrategy: customers/{customer_id}/accessibleBiddingStrategies/{bidding_strategy_id}
     * - assetSet: customers/{customer_id}/assetSets/{asset_set_id}
     * - biddingStrategy: customers/{customer_id}/biddingStrategies/{bidding_strategy_id}
     * - campaign: customers/{customer_id}/campaigns/{campaign_id}
     * - campaignBudget: customers/{customer_id}/campaignBudgets/{campaign_budget_id}
     * - campaignGroup: customers/{customer_id}/campaignGroups/{campaign_group_id}
     * - campaignLabel: customers/{customer_id}/campaignLabels/{campaign_id}~{label_id}
     * - conversionAction: customers/{customer_id}/conversionActions/{conversion_action_id}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string  $formattedName The formatted name string
     * @param ?string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName(string $formattedName, ?string $template = null): array
    {
        return self::parseFormattedName($formattedName, $template);
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
     * Enables Brand Guidelines for Performance Max campaigns.
     *
     * List of thrown errors:
     * [AuthenticationError]()
     * [AssetError]()
     * [AssetLinkError]()
     * [AuthorizationError]()
     * [BrandGuidelinesMigrationError]()
     * [CampaignError]()
     * [HeaderError]()
     * [InternalError]()
     * [MutateError]()
     * [QuotaError]()
     * [RequestError]()
     * [ResourceCountLimitExceededError]()
     *
     * The async variant is
     * {@see CampaignServiceClient::enablePMaxBrandGuidelinesAsync()} .
     *
     * @param EnablePMaxBrandGuidelinesRequest $request     A request to house fields associated with the call.
     * @param array                            $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return EnablePMaxBrandGuidelinesResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function enablePMaxBrandGuidelines(EnablePMaxBrandGuidelinesRequest $request, array $callOptions = []): EnablePMaxBrandGuidelinesResponse
    {
        return $this->startApiCall('EnablePMaxBrandGuidelines', $request, $callOptions)->wait();
    }

    /**
     * Creates, updates, or removes campaigns. Operation statuses are returned.
     *
     * List of thrown errors:
     * [AdxError]()
     * [AuthenticationError]()
     * [AuthorizationError]()
     * [BiddingError]()
     * [BiddingStrategyError]()
     * [CampaignBudgetError]()
     * [CampaignError]()
     * [ContextError]()
     * [DatabaseError]()
     * [DateError]()
     * [DateRangeError]()
     * [DistinctError]()
     * [FieldError]()
     * [FieldMaskError]()
     * [HeaderError]()
     * [IdError]()
     * [InternalError]()
     * [ListOperationError]()
     * [MutateError]()
     * [NewResourceCreationError]()
     * [NotAllowlistedError]()
     * [NotEmptyError]()
     * [NullError]()
     * [OperationAccessDeniedError]()
     * [OperatorError]()
     * [QuotaError]()
     * [RangeError]()
     * [RegionCodeError]()
     * [RequestError]()
     * [ResourceCountLimitExceededError]()
     * [SettingError]()
     * [SizeLimitError]()
     * [StringFormatError]()
     * [StringLengthError]()
     * [UrlFieldError]()
     *
     * The async variant is {@see CampaignServiceClient::mutateCampaignsAsync()} .
     *
     * @param MutateCampaignsRequest $request     A request to house fields associated with the call.
     * @param array                  $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return MutateCampaignsResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function mutateCampaigns(MutateCampaignsRequest $request, array $callOptions = []): MutateCampaignsResponse
    {
        return $this->startApiCall('MutateCampaigns', $request, $callOptions)->wait();
    }
}
