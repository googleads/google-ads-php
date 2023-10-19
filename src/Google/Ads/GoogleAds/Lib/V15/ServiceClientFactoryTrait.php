<?php

/**
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

// Generated code ; DO NOT EDIT.

namespace Google\Ads\GoogleAds\Lib\V15;

use Google\Ads\GoogleAds\Constants;
use Google\Ads\GoogleAds\Lib\ConfigurationTrait;
use Google\Ads\GoogleAds\Lib\InsecureCredentialsWrapper;
use Google\Ads\GoogleAds\V15\Services\Client\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AccountLinkServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdGroupAssetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdGroupAssetSetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdGroupCriterionCustomizerServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdGroupCustomizerServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdGroupExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdGroupFeedServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdGroupServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdParameterServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AdServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AssetGroupAssetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AssetGroupListingGroupFilterServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AssetGroupServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AssetGroupSignalServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AssetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AssetSetAssetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AssetSetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AudienceInsightsServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\AudienceServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\BatchJobServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\BiddingDataExclusionServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\BiddingSeasonalityAdjustmentServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\BrandSuggestionServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignAssetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignAssetSetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignConversionGoalServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignCustomizerServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignFeedServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignGroupServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignLifecycleGoalServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ConversionAdjustmentUploadServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ConversionCustomVariableServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ConversionGoalCampaignConfigServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ConversionUploadServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ConversionValueRuleServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ConversionValueRuleSetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomAudienceServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomConversionGoalServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerAssetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerAssetSetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerConversionGoalServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerCustomizerServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerFeedServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerLifecycleGoalServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerSkAdNetworkConversionValueSchemaServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerUserAccessInvitationServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomerUserAccessServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomInterestServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\CustomizerAttributeServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ExperimentArmServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ExperimentServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ExtensionFeedItemServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\FeedItemServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\FeedItemSetLinkServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\FeedItemSetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\FeedItemTargetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\FeedMappingServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\FeedServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\GoogleAdsServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\InvoiceServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\KeywordPlanAdGroupKeywordServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\KeywordPlanCampaignKeywordServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\KeywordPlanIdeaServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\KeywordThemeConstantServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\LabelServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\OfflineUserDataJobServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\PaymentsAccountServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ProductLinkInvitationServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ProductLinkServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ReachPlanServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\RecommendationServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\RecommendationSubscriptionServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\RemarketingActionServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\SharedSetServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\SmartCampaignSettingServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\SmartCampaignSuggestServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\ThirdPartyAppAnalyticsLinkServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\TravelAssetSuggestionServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\UserDataServiceClient;
use Google\Ads\GoogleAds\V15\Services\Client\UserListServiceClient;
use Google\ApiCore\GrpcSupportTrait;
use Grpc\ChannelCredentials;

/**
 * Contains service client factory methods.
 */
trait ServiceClientFactoryTrait
{
    use ConfigurationTrait;
    use GrpcSupportTrait;

    private static $CREDENTIALS_LOADER_KEY = 'credentials';
    private static $DEVELOPER_TOKEN_KEY = 'developer-token';
    private static $LOGIN_CUSTOMER_ID_KEY = 'login-customer-id';
    private static $LINKED_CUSTOMER_ID_KEY = 'linked-customer-id';
    private static $SERVICE_ADDRESS_KEY = 'serviceAddress';
    private static $DEFAULT_SERVICE_ADDRESS = 'googleads.googleapis.com';
    private static $TRANSPORT_KEY = 'transport';
    private static $UNARY_MIDDLEWARES = 'unary-middlewares';
    private static $STREAMING_MIDDLEWARES = 'streaming-middlewares';

    /**
     * Gets the Google Ads client options for making API calls.
     *
     * @return array the client options
     */
    public function getGoogleAdsClientOptions(): array
    {
        $clientOptions = [
            self::$CREDENTIALS_LOADER_KEY => $this->getGrpcChannelIsSecure()
                ? $this->getOAuth2Credential()
                : new InsecureCredentialsWrapper($this->getOAuth2Credential()),
            self::$DEVELOPER_TOKEN_KEY => $this->getDeveloperToken()
        ];
        if (!empty($this->getLoginCustomerId())) {
            $clientOptions += [self::$LOGIN_CUSTOMER_ID_KEY => strval($this->getLoginCustomerId())];
        }
        if (!empty($this->getLinkedCustomerId())) {
            $clientOptions += [
                self::$LINKED_CUSTOMER_ID_KEY => strval($this->getLinkedCustomerId())
            ];
        }
        if (!empty($this->getEndpoint())) {
            $clientOptions += [self::$SERVICE_ADDRESS_KEY => $this->getEndpoint()];
        }
        $clientOptions['libName'] = Constants::LIBRARY_NAME;
        $clientOptions['libVersion'] = Constants::LIBRARY_VERSION;
        $clientOptions['transportConfig'] = [
            'grpc' => [
                'stubOpts' => [
                    // Inbound headers may exceed default (8kb) max header size.
                    // Sets max header size to 16MB, which should be more than necessary.
                    'grpc.max_metadata_size' => 16 * 1024 * 1024,
                    // Sets max response size to 64MB, since large responses will often exceed the
                    // default (4MB).
                    'grpc.max_receive_message_length' => 64 * 1024 * 1024
                ],
                'interceptors' => [new GoogleAdsFailuresInterceptor()]
            ]
        ];
        if (!empty($this->getLogger())) {
            $googleAdsLoggingInterceptor = new GoogleAdsLoggingInterceptor(
                new GoogleAdsCallLogger(
                    $this->getLogger(),
                    $this->getLogLevel(),
                    $this->getEndpoint() ?: self::$DEFAULT_SERVICE_ADDRESS
                )
            );
            array_unshift(
                $clientOptions['transportConfig']['grpc']['interceptors'],
                $googleAdsLoggingInterceptor
            );
        }
        array_push(
            $clientOptions['transportConfig']['grpc']['interceptors'],
            ...$this->getGrpcInterceptors()
        );
        if (!empty($this->getProxy())) {
            putenv('http_proxy=' . $this->getProxy());
        }
        if (!empty($this->getTransport())) {
            $clientOptions += [self::$TRANSPORT_KEY => $this->getTransport()];
        }
        if (
            self::getGrpcDependencyStatus()
            && (!$this->getGrpcChannelIsSecure() || !empty($this->getGrpcChannelCredential()))
        ) {
            $channelCredentials = $this->getGrpcChannelIsSecure()
                ? $this->getGrpcChannelCredential()
                : ChannelCredentials::createInsecure();
            $clientOptions['transportConfig']['grpc']['stubOpts'] += [
                self::$CREDENTIALS_LOADER_KEY => $channelCredentials
            ];
        }
        $clientOptions += [
            self::$UNARY_MIDDLEWARES => $this->getUnaryMiddlewares(),
            self::$STREAMING_MIDDLEWARES => $this->getStreamingMiddlewares()
        ];

        return $clientOptions;
    }

    /**
     * @return AccountBudgetProposalServiceClient|\Google\Ads\GoogleAds\V15\Services\AccountBudgetProposalServiceClient
     */
    public function getAccountBudgetProposalServiceClient(): AccountBudgetProposalServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AccountBudgetProposalServiceClient
    {
        return $this->useGapicV2Source()
            ? new AccountBudgetProposalServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AccountBudgetProposalServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AccountLinkServiceClient|\Google\Ads\GoogleAds\V15\Services\AccountLinkServiceClient
     */
    public function getAccountLinkServiceClient(): AccountLinkServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AccountLinkServiceClient
    {
        return $this->useGapicV2Source()
            ? new AccountLinkServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AccountLinkServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdGroupAdLabelServiceClient|\Google\Ads\GoogleAds\V15\Services\AdGroupAdLabelServiceClient
     */
    public function getAdGroupAdLabelServiceClient(): AdGroupAdLabelServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdGroupAdLabelServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdGroupAdLabelServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdGroupAdLabelServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdGroupAdServiceClient|\Google\Ads\GoogleAds\V15\Services\AdGroupAdServiceClient
     */
    public function getAdGroupAdServiceClient(): AdGroupAdServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdGroupAdServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdGroupAdServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdGroupAdServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdGroupAssetServiceClient|\Google\Ads\GoogleAds\V15\Services\AdGroupAssetServiceClient
     */
    public function getAdGroupAssetServiceClient(): AdGroupAssetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdGroupAssetServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdGroupAssetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdGroupAssetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdGroupAssetSetServiceClient|\Google\Ads\GoogleAds\V15\Services\AdGroupAssetSetServiceClient
     */
    public function getAdGroupAssetSetServiceClient(): AdGroupAssetSetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdGroupAssetSetServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdGroupAssetSetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdGroupAssetSetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdGroupBidModifierServiceClient|\Google\Ads\GoogleAds\V15\Services\AdGroupBidModifierServiceClient
     */
    public function getAdGroupBidModifierServiceClient(): AdGroupBidModifierServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdGroupBidModifierServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdGroupBidModifierServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdGroupBidModifierServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdGroupCriterionCustomizerServiceClient|\Google\Ads\GoogleAds\V15\Services\AdGroupCriterionCustomizerServiceClient
     */
    public function getAdGroupCriterionCustomizerServiceClient(): AdGroupCriterionCustomizerServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdGroupCriterionCustomizerServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdGroupCriterionCustomizerServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdGroupCriterionCustomizerServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdGroupCriterionLabelServiceClient|\Google\Ads\GoogleAds\V15\Services\AdGroupCriterionLabelServiceClient
     */
    public function getAdGroupCriterionLabelServiceClient(): AdGroupCriterionLabelServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdGroupCriterionLabelServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdGroupCriterionLabelServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdGroupCriterionLabelServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdGroupCriterionServiceClient|\Google\Ads\GoogleAds\V15\Services\AdGroupCriterionServiceClient
     */
    public function getAdGroupCriterionServiceClient(): AdGroupCriterionServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdGroupCriterionServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdGroupCriterionServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdGroupCriterionServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdGroupCustomizerServiceClient|\Google\Ads\GoogleAds\V15\Services\AdGroupCustomizerServiceClient
     */
    public function getAdGroupCustomizerServiceClient(): AdGroupCustomizerServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdGroupCustomizerServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdGroupCustomizerServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdGroupCustomizerServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdGroupExtensionSettingServiceClient|\Google\Ads\GoogleAds\V15\Services\AdGroupExtensionSettingServiceClient
     */
    public function getAdGroupExtensionSettingServiceClient(): AdGroupExtensionSettingServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdGroupExtensionSettingServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdGroupExtensionSettingServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdGroupExtensionSettingServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdGroupFeedServiceClient|\Google\Ads\GoogleAds\V15\Services\AdGroupFeedServiceClient
     */
    public function getAdGroupFeedServiceClient(): AdGroupFeedServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdGroupFeedServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdGroupFeedServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdGroupFeedServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdGroupLabelServiceClient|\Google\Ads\GoogleAds\V15\Services\AdGroupLabelServiceClient
     */
    public function getAdGroupLabelServiceClient(): AdGroupLabelServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdGroupLabelServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdGroupLabelServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdGroupLabelServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdGroupServiceClient|\Google\Ads\GoogleAds\V15\Services\AdGroupServiceClient
     */
    public function getAdGroupServiceClient(): AdGroupServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdGroupServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdGroupServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdGroupServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdParameterServiceClient|\Google\Ads\GoogleAds\V15\Services\AdParameterServiceClient
     */
    public function getAdParameterServiceClient(): AdParameterServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdParameterServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdParameterServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdParameterServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AdServiceClient|\Google\Ads\GoogleAds\V15\Services\AdServiceClient
     */
    public function getAdServiceClient(): AdServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AdServiceClient
    {
        return $this->useGapicV2Source()
            ? new AdServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AdServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AssetGroupAssetServiceClient|\Google\Ads\GoogleAds\V15\Services\AssetGroupAssetServiceClient
     */
    public function getAssetGroupAssetServiceClient(): AssetGroupAssetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AssetGroupAssetServiceClient
    {
        return $this->useGapicV2Source()
            ? new AssetGroupAssetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AssetGroupAssetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AssetGroupListingGroupFilterServiceClient|\Google\Ads\GoogleAds\V15\Services\AssetGroupListingGroupFilterServiceClient
     */
    public function getAssetGroupListingGroupFilterServiceClient(): AssetGroupListingGroupFilterServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AssetGroupListingGroupFilterServiceClient
    {
        return $this->useGapicV2Source()
            ? new AssetGroupListingGroupFilterServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AssetGroupListingGroupFilterServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AssetGroupServiceClient|\Google\Ads\GoogleAds\V15\Services\AssetGroupServiceClient
     */
    public function getAssetGroupServiceClient(): AssetGroupServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AssetGroupServiceClient
    {
        return $this->useGapicV2Source()
            ? new AssetGroupServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AssetGroupServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AssetGroupSignalServiceClient|\Google\Ads\GoogleAds\V15\Services\AssetGroupSignalServiceClient
     */
    public function getAssetGroupSignalServiceClient(): AssetGroupSignalServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AssetGroupSignalServiceClient
    {
        return $this->useGapicV2Source()
            ? new AssetGroupSignalServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AssetGroupSignalServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AssetServiceClient|\Google\Ads\GoogleAds\V15\Services\AssetServiceClient
     */
    public function getAssetServiceClient(): AssetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AssetServiceClient
    {
        return $this->useGapicV2Source()
            ? new AssetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AssetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AssetSetAssetServiceClient|\Google\Ads\GoogleAds\V15\Services\AssetSetAssetServiceClient
     */
    public function getAssetSetAssetServiceClient(): AssetSetAssetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AssetSetAssetServiceClient
    {
        return $this->useGapicV2Source()
            ? new AssetSetAssetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AssetSetAssetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AssetSetServiceClient|\Google\Ads\GoogleAds\V15\Services\AssetSetServiceClient
     */
    public function getAssetSetServiceClient(): AssetSetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AssetSetServiceClient
    {
        return $this->useGapicV2Source()
            ? new AssetSetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AssetSetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AudienceInsightsServiceClient|\Google\Ads\GoogleAds\V15\Services\AudienceInsightsServiceClient
     */
    public function getAudienceInsightsServiceClient(): AudienceInsightsServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AudienceInsightsServiceClient
    {
        return $this->useGapicV2Source()
            ? new AudienceInsightsServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AudienceInsightsServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return AudienceServiceClient|\Google\Ads\GoogleAds\V15\Services\AudienceServiceClient
     */
    public function getAudienceServiceClient(): AudienceServiceClient
        |\Google\Ads\GoogleAds\V15\Services\AudienceServiceClient
    {
        return $this->useGapicV2Source()
            ? new AudienceServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\AudienceServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return BatchJobServiceClient|\Google\Ads\GoogleAds\V15\Services\BatchJobServiceClient
     */
    public function getBatchJobServiceClient(): BatchJobServiceClient
        |\Google\Ads\GoogleAds\V15\Services\BatchJobServiceClient
    {
        return $this->useGapicV2Source()
            ? new BatchJobServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\BatchJobServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return BiddingDataExclusionServiceClient|\Google\Ads\GoogleAds\V15\Services\BiddingDataExclusionServiceClient
     */
    public function getBiddingDataExclusionServiceClient(): BiddingDataExclusionServiceClient
        |\Google\Ads\GoogleAds\V15\Services\BiddingDataExclusionServiceClient
    {
        return $this->useGapicV2Source()
            ? new BiddingDataExclusionServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\BiddingDataExclusionServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return BiddingSeasonalityAdjustmentServiceClient|\Google\Ads\GoogleAds\V15\Services\BiddingSeasonalityAdjustmentServiceClient
     */
    public function getBiddingSeasonalityAdjustmentServiceClient(): BiddingSeasonalityAdjustmentServiceClient
        |\Google\Ads\GoogleAds\V15\Services\BiddingSeasonalityAdjustmentServiceClient
    {
        return $this->useGapicV2Source()
            ? new BiddingSeasonalityAdjustmentServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\BiddingSeasonalityAdjustmentServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return BiddingStrategyServiceClient|\Google\Ads\GoogleAds\V15\Services\BiddingStrategyServiceClient
     */
    public function getBiddingStrategyServiceClient(): BiddingStrategyServiceClient
        |\Google\Ads\GoogleAds\V15\Services\BiddingStrategyServiceClient
    {
        return $this->useGapicV2Source()
            ? new BiddingStrategyServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\BiddingStrategyServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return BillingSetupServiceClient|\Google\Ads\GoogleAds\V15\Services\BillingSetupServiceClient
     */
    public function getBillingSetupServiceClient(): BillingSetupServiceClient
        |\Google\Ads\GoogleAds\V15\Services\BillingSetupServiceClient
    {
        return $this->useGapicV2Source()
            ? new BillingSetupServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\BillingSetupServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return BrandSuggestionServiceClient|\Google\Ads\GoogleAds\V15\Services\BrandSuggestionServiceClient
     */
    public function getBrandSuggestionServiceClient(): BrandSuggestionServiceClient
        |\Google\Ads\GoogleAds\V15\Services\BrandSuggestionServiceClient
    {
        return $this->useGapicV2Source()
            ? new BrandSuggestionServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\BrandSuggestionServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignAssetServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignAssetServiceClient
     */
    public function getCampaignAssetServiceClient(): CampaignAssetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignAssetServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignAssetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignAssetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignAssetSetServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignAssetSetServiceClient
     */
    public function getCampaignAssetSetServiceClient(): CampaignAssetSetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignAssetSetServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignAssetSetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignAssetSetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignBidModifierServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignBidModifierServiceClient
     */
    public function getCampaignBidModifierServiceClient(): CampaignBidModifierServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignBidModifierServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignBidModifierServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignBidModifierServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignBudgetServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignBudgetServiceClient
     */
    public function getCampaignBudgetServiceClient(): CampaignBudgetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignBudgetServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignBudgetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignBudgetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignConversionGoalServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignConversionGoalServiceClient
     */
    public function getCampaignConversionGoalServiceClient(): CampaignConversionGoalServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignConversionGoalServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignConversionGoalServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignConversionGoalServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignCriterionServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignCriterionServiceClient
     */
    public function getCampaignCriterionServiceClient(): CampaignCriterionServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignCriterionServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignCriterionServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignCriterionServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignCustomizerServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignCustomizerServiceClient
     */
    public function getCampaignCustomizerServiceClient(): CampaignCustomizerServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignCustomizerServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignCustomizerServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignCustomizerServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignDraftServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignDraftServiceClient
     */
    public function getCampaignDraftServiceClient(): CampaignDraftServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignDraftServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignDraftServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignDraftServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignExtensionSettingServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignExtensionSettingServiceClient
     */
    public function getCampaignExtensionSettingServiceClient(): CampaignExtensionSettingServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignExtensionSettingServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignExtensionSettingServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignExtensionSettingServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignFeedServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignFeedServiceClient
     */
    public function getCampaignFeedServiceClient(): CampaignFeedServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignFeedServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignFeedServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignFeedServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignGroupServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignGroupServiceClient
     */
    public function getCampaignGroupServiceClient(): CampaignGroupServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignGroupServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignGroupServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignGroupServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignLabelServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignLabelServiceClient
     */
    public function getCampaignLabelServiceClient(): CampaignLabelServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignLabelServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignLabelServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignLabelServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignLifecycleGoalServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignLifecycleGoalServiceClient
     */
    public function getCampaignLifecycleGoalServiceClient(): CampaignLifecycleGoalServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignLifecycleGoalServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignLifecycleGoalServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignLifecycleGoalServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignServiceClient
     */
    public function getCampaignServiceClient(): CampaignServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CampaignSharedSetServiceClient|\Google\Ads\GoogleAds\V15\Services\CampaignSharedSetServiceClient
     */
    public function getCampaignSharedSetServiceClient(): CampaignSharedSetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CampaignSharedSetServiceClient
    {
        return $this->useGapicV2Source()
            ? new CampaignSharedSetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CampaignSharedSetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ConversionActionServiceClient|\Google\Ads\GoogleAds\V15\Services\ConversionActionServiceClient
     */
    public function getConversionActionServiceClient(): ConversionActionServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ConversionActionServiceClient
    {
        return $this->useGapicV2Source()
            ? new ConversionActionServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ConversionActionServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ConversionAdjustmentUploadServiceClient|\Google\Ads\GoogleAds\V15\Services\ConversionAdjustmentUploadServiceClient
     */
    public function getConversionAdjustmentUploadServiceClient(): ConversionAdjustmentUploadServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ConversionAdjustmentUploadServiceClient
    {
        return $this->useGapicV2Source()
            ? new ConversionAdjustmentUploadServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ConversionAdjustmentUploadServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ConversionCustomVariableServiceClient|\Google\Ads\GoogleAds\V15\Services\ConversionCustomVariableServiceClient
     */
    public function getConversionCustomVariableServiceClient(): ConversionCustomVariableServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ConversionCustomVariableServiceClient
    {
        return $this->useGapicV2Source()
            ? new ConversionCustomVariableServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ConversionCustomVariableServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ConversionGoalCampaignConfigServiceClient|\Google\Ads\GoogleAds\V15\Services\ConversionGoalCampaignConfigServiceClient
     */
    public function getConversionGoalCampaignConfigServiceClient(): ConversionGoalCampaignConfigServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ConversionGoalCampaignConfigServiceClient
    {
        return $this->useGapicV2Source()
            ? new ConversionGoalCampaignConfigServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ConversionGoalCampaignConfigServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ConversionUploadServiceClient|\Google\Ads\GoogleAds\V15\Services\ConversionUploadServiceClient
     */
    public function getConversionUploadServiceClient(): ConversionUploadServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ConversionUploadServiceClient
    {
        return $this->useGapicV2Source()
            ? new ConversionUploadServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ConversionUploadServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ConversionValueRuleServiceClient|\Google\Ads\GoogleAds\V15\Services\ConversionValueRuleServiceClient
     */
    public function getConversionValueRuleServiceClient(): ConversionValueRuleServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ConversionValueRuleServiceClient
    {
        return $this->useGapicV2Source()
            ? new ConversionValueRuleServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ConversionValueRuleServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ConversionValueRuleSetServiceClient|\Google\Ads\GoogleAds\V15\Services\ConversionValueRuleSetServiceClient
     */
    public function getConversionValueRuleSetServiceClient(): ConversionValueRuleSetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ConversionValueRuleSetServiceClient
    {
        return $this->useGapicV2Source()
            ? new ConversionValueRuleSetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ConversionValueRuleSetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomAudienceServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomAudienceServiceClient
     */
    public function getCustomAudienceServiceClient(): CustomAudienceServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomAudienceServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomAudienceServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomAudienceServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomConversionGoalServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomConversionGoalServiceClient
     */
    public function getCustomConversionGoalServiceClient(): CustomConversionGoalServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomConversionGoalServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomConversionGoalServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomConversionGoalServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerAssetServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerAssetServiceClient
     */
    public function getCustomerAssetServiceClient(): CustomerAssetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerAssetServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerAssetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerAssetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerAssetSetServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerAssetSetServiceClient
     */
    public function getCustomerAssetSetServiceClient(): CustomerAssetSetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerAssetSetServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerAssetSetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerAssetSetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerClientLinkServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerClientLinkServiceClient
     */
    public function getCustomerClientLinkServiceClient(): CustomerClientLinkServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerClientLinkServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerClientLinkServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerClientLinkServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerConversionGoalServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerConversionGoalServiceClient
     */
    public function getCustomerConversionGoalServiceClient(): CustomerConversionGoalServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerConversionGoalServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerConversionGoalServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerConversionGoalServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerCustomizerServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerCustomizerServiceClient
     */
    public function getCustomerCustomizerServiceClient(): CustomerCustomizerServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerCustomizerServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerCustomizerServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerCustomizerServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerExtensionSettingServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerExtensionSettingServiceClient
     */
    public function getCustomerExtensionSettingServiceClient(): CustomerExtensionSettingServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerExtensionSettingServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerExtensionSettingServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerExtensionSettingServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerFeedServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerFeedServiceClient
     */
    public function getCustomerFeedServiceClient(): CustomerFeedServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerFeedServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerFeedServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerFeedServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerLabelServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerLabelServiceClient
     */
    public function getCustomerLabelServiceClient(): CustomerLabelServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerLabelServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerLabelServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerLabelServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerLifecycleGoalServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerLifecycleGoalServiceClient
     */
    public function getCustomerLifecycleGoalServiceClient(): CustomerLifecycleGoalServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerLifecycleGoalServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerLifecycleGoalServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerLifecycleGoalServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerManagerLinkServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerManagerLinkServiceClient
     */
    public function getCustomerManagerLinkServiceClient(): CustomerManagerLinkServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerManagerLinkServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerManagerLinkServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerManagerLinkServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerNegativeCriterionServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerNegativeCriterionServiceClient
     */
    public function getCustomerNegativeCriterionServiceClient(): CustomerNegativeCriterionServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerNegativeCriterionServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerNegativeCriterionServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerNegativeCriterionServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerServiceClient
     */
    public function getCustomerServiceClient(): CustomerServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerSkAdNetworkConversionValueSchemaServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerSkAdNetworkConversionValueSchemaServiceClient
     */
    public function getCustomerSkAdNetworkConversionValueSchemaServiceClient(): CustomerSkAdNetworkConversionValueSchemaServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerSkAdNetworkConversionValueSchemaServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerSkAdNetworkConversionValueSchemaServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerSkAdNetworkConversionValueSchemaServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerUserAccessInvitationServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerUserAccessInvitationServiceClient
     */
    public function getCustomerUserAccessInvitationServiceClient(): CustomerUserAccessInvitationServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerUserAccessInvitationServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerUserAccessInvitationServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerUserAccessInvitationServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomerUserAccessServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomerUserAccessServiceClient
     */
    public function getCustomerUserAccessServiceClient(): CustomerUserAccessServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomerUserAccessServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomerUserAccessServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomerUserAccessServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomInterestServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomInterestServiceClient
     */
    public function getCustomInterestServiceClient(): CustomInterestServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomInterestServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomInterestServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomInterestServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return CustomizerAttributeServiceClient|\Google\Ads\GoogleAds\V15\Services\CustomizerAttributeServiceClient
     */
    public function getCustomizerAttributeServiceClient(): CustomizerAttributeServiceClient
        |\Google\Ads\GoogleAds\V15\Services\CustomizerAttributeServiceClient
    {
        return $this->useGapicV2Source()
            ? new CustomizerAttributeServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\CustomizerAttributeServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ExperimentArmServiceClient|\Google\Ads\GoogleAds\V15\Services\ExperimentArmServiceClient
     */
    public function getExperimentArmServiceClient(): ExperimentArmServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ExperimentArmServiceClient
    {
        return $this->useGapicV2Source()
            ? new ExperimentArmServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ExperimentArmServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ExperimentServiceClient|\Google\Ads\GoogleAds\V15\Services\ExperimentServiceClient
     */
    public function getExperimentServiceClient(): ExperimentServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ExperimentServiceClient
    {
        return $this->useGapicV2Source()
            ? new ExperimentServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ExperimentServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ExtensionFeedItemServiceClient|\Google\Ads\GoogleAds\V15\Services\ExtensionFeedItemServiceClient
     */
    public function getExtensionFeedItemServiceClient(): ExtensionFeedItemServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ExtensionFeedItemServiceClient
    {
        return $this->useGapicV2Source()
            ? new ExtensionFeedItemServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ExtensionFeedItemServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return FeedItemServiceClient|\Google\Ads\GoogleAds\V15\Services\FeedItemServiceClient
     */
    public function getFeedItemServiceClient(): FeedItemServiceClient
        |\Google\Ads\GoogleAds\V15\Services\FeedItemServiceClient
    {
        return $this->useGapicV2Source()
            ? new FeedItemServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\FeedItemServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return FeedItemSetLinkServiceClient|\Google\Ads\GoogleAds\V15\Services\FeedItemSetLinkServiceClient
     */
    public function getFeedItemSetLinkServiceClient(): FeedItemSetLinkServiceClient
        |\Google\Ads\GoogleAds\V15\Services\FeedItemSetLinkServiceClient
    {
        return $this->useGapicV2Source()
            ? new FeedItemSetLinkServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\FeedItemSetLinkServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return FeedItemSetServiceClient|\Google\Ads\GoogleAds\V15\Services\FeedItemSetServiceClient
     */
    public function getFeedItemSetServiceClient(): FeedItemSetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\FeedItemSetServiceClient
    {
        return $this->useGapicV2Source()
            ? new FeedItemSetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\FeedItemSetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return FeedItemTargetServiceClient|\Google\Ads\GoogleAds\V15\Services\FeedItemTargetServiceClient
     */
    public function getFeedItemTargetServiceClient(): FeedItemTargetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\FeedItemTargetServiceClient
    {
        return $this->useGapicV2Source()
            ? new FeedItemTargetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\FeedItemTargetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return FeedMappingServiceClient|\Google\Ads\GoogleAds\V15\Services\FeedMappingServiceClient
     */
    public function getFeedMappingServiceClient(): FeedMappingServiceClient
        |\Google\Ads\GoogleAds\V15\Services\FeedMappingServiceClient
    {
        return $this->useGapicV2Source()
            ? new FeedMappingServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\FeedMappingServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return FeedServiceClient|\Google\Ads\GoogleAds\V15\Services\FeedServiceClient
     */
    public function getFeedServiceClient(): FeedServiceClient
        |\Google\Ads\GoogleAds\V15\Services\FeedServiceClient
    {
        return $this->useGapicV2Source()
            ? new FeedServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\FeedServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return GeoTargetConstantServiceClient|\Google\Ads\GoogleAds\V15\Services\GeoTargetConstantServiceClient
     */
    public function getGeoTargetConstantServiceClient(): GeoTargetConstantServiceClient
        |\Google\Ads\GoogleAds\V15\Services\GeoTargetConstantServiceClient
    {
        return $this->useGapicV2Source()
            ? new GeoTargetConstantServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\GeoTargetConstantServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return GoogleAdsFieldServiceClient|\Google\Ads\GoogleAds\V15\Services\GoogleAdsFieldServiceClient
     */
    public function getGoogleAdsFieldServiceClient(): GoogleAdsFieldServiceClient
        |\Google\Ads\GoogleAds\V15\Services\GoogleAdsFieldServiceClient
    {
        return $this->useGapicV2Source()
            ? new GoogleAdsFieldServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\GoogleAdsFieldServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return GoogleAdsServiceClient|\Google\Ads\GoogleAds\V15\Services\GoogleAdsServiceClient
     */
    public function getGoogleAdsServiceClient(): GoogleAdsServiceClient
        |\Google\Ads\GoogleAds\V15\Services\GoogleAdsServiceClient
    {
        return $this->useGapicV2Source()
            ? new GoogleAdsServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\GoogleAdsServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return InvoiceServiceClient|\Google\Ads\GoogleAds\V15\Services\InvoiceServiceClient
     */
    public function getInvoiceServiceClient(): InvoiceServiceClient
        |\Google\Ads\GoogleAds\V15\Services\InvoiceServiceClient
    {
        return $this->useGapicV2Source()
            ? new InvoiceServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\InvoiceServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return KeywordPlanAdGroupKeywordServiceClient|\Google\Ads\GoogleAds\V15\Services\KeywordPlanAdGroupKeywordServiceClient
     */
    public function getKeywordPlanAdGroupKeywordServiceClient(): KeywordPlanAdGroupKeywordServiceClient
        |\Google\Ads\GoogleAds\V15\Services\KeywordPlanAdGroupKeywordServiceClient
    {
        return $this->useGapicV2Source()
            ? new KeywordPlanAdGroupKeywordServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\KeywordPlanAdGroupKeywordServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return KeywordPlanAdGroupServiceClient|\Google\Ads\GoogleAds\V15\Services\KeywordPlanAdGroupServiceClient
     */
    public function getKeywordPlanAdGroupServiceClient(): KeywordPlanAdGroupServiceClient
        |\Google\Ads\GoogleAds\V15\Services\KeywordPlanAdGroupServiceClient
    {
        return $this->useGapicV2Source()
            ? new KeywordPlanAdGroupServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\KeywordPlanAdGroupServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return KeywordPlanCampaignKeywordServiceClient|\Google\Ads\GoogleAds\V15\Services\KeywordPlanCampaignKeywordServiceClient
     */
    public function getKeywordPlanCampaignKeywordServiceClient(): KeywordPlanCampaignKeywordServiceClient
        |\Google\Ads\GoogleAds\V15\Services\KeywordPlanCampaignKeywordServiceClient
    {
        return $this->useGapicV2Source()
            ? new KeywordPlanCampaignKeywordServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\KeywordPlanCampaignKeywordServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return KeywordPlanCampaignServiceClient|\Google\Ads\GoogleAds\V15\Services\KeywordPlanCampaignServiceClient
     */
    public function getKeywordPlanCampaignServiceClient(): KeywordPlanCampaignServiceClient
        |\Google\Ads\GoogleAds\V15\Services\KeywordPlanCampaignServiceClient
    {
        return $this->useGapicV2Source()
            ? new KeywordPlanCampaignServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\KeywordPlanCampaignServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return KeywordPlanIdeaServiceClient|\Google\Ads\GoogleAds\V15\Services\KeywordPlanIdeaServiceClient
     */
    public function getKeywordPlanIdeaServiceClient(): KeywordPlanIdeaServiceClient
        |\Google\Ads\GoogleAds\V15\Services\KeywordPlanIdeaServiceClient
    {
        return $this->useGapicV2Source()
            ? new KeywordPlanIdeaServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\KeywordPlanIdeaServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return KeywordPlanServiceClient|\Google\Ads\GoogleAds\V15\Services\KeywordPlanServiceClient
     */
    public function getKeywordPlanServiceClient(): KeywordPlanServiceClient
        |\Google\Ads\GoogleAds\V15\Services\KeywordPlanServiceClient
    {
        return $this->useGapicV2Source()
            ? new KeywordPlanServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\KeywordPlanServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return KeywordThemeConstantServiceClient|\Google\Ads\GoogleAds\V15\Services\KeywordThemeConstantServiceClient
     */
    public function getKeywordThemeConstantServiceClient(): KeywordThemeConstantServiceClient
        |\Google\Ads\GoogleAds\V15\Services\KeywordThemeConstantServiceClient
    {
        return $this->useGapicV2Source()
            ? new KeywordThemeConstantServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\KeywordThemeConstantServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return LabelServiceClient|\Google\Ads\GoogleAds\V15\Services\LabelServiceClient
     */
    public function getLabelServiceClient(): LabelServiceClient
        |\Google\Ads\GoogleAds\V15\Services\LabelServiceClient
    {
        return $this->useGapicV2Source()
            ? new LabelServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\LabelServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return OfflineUserDataJobServiceClient|\Google\Ads\GoogleAds\V15\Services\OfflineUserDataJobServiceClient
     */
    public function getOfflineUserDataJobServiceClient(): OfflineUserDataJobServiceClient
        |\Google\Ads\GoogleAds\V15\Services\OfflineUserDataJobServiceClient
    {
        return $this->useGapicV2Source()
            ? new OfflineUserDataJobServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\OfflineUserDataJobServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return PaymentsAccountServiceClient|\Google\Ads\GoogleAds\V15\Services\PaymentsAccountServiceClient
     */
    public function getPaymentsAccountServiceClient(): PaymentsAccountServiceClient
        |\Google\Ads\GoogleAds\V15\Services\PaymentsAccountServiceClient
    {
        return $this->useGapicV2Source()
            ? new PaymentsAccountServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\PaymentsAccountServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ProductLinkInvitationServiceClient|\Google\Ads\GoogleAds\V15\Services\ProductLinkInvitationServiceClient
     */
    public function getProductLinkInvitationServiceClient(): ProductLinkInvitationServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ProductLinkInvitationServiceClient
    {
        return $this->useGapicV2Source()
            ? new ProductLinkInvitationServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ProductLinkInvitationServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ProductLinkServiceClient|\Google\Ads\GoogleAds\V15\Services\ProductLinkServiceClient
     */
    public function getProductLinkServiceClient(): ProductLinkServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ProductLinkServiceClient
    {
        return $this->useGapicV2Source()
            ? new ProductLinkServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ProductLinkServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ReachPlanServiceClient|\Google\Ads\GoogleAds\V15\Services\ReachPlanServiceClient
     */
    public function getReachPlanServiceClient(): ReachPlanServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ReachPlanServiceClient
    {
        return $this->useGapicV2Source()
            ? new ReachPlanServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ReachPlanServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return RecommendationServiceClient|\Google\Ads\GoogleAds\V15\Services\RecommendationServiceClient
     */
    public function getRecommendationServiceClient(): RecommendationServiceClient
        |\Google\Ads\GoogleAds\V15\Services\RecommendationServiceClient
    {
        return $this->useGapicV2Source()
            ? new RecommendationServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\RecommendationServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return RecommendationSubscriptionServiceClient|\Google\Ads\GoogleAds\V15\Services\RecommendationSubscriptionServiceClient
     */
    public function getRecommendationSubscriptionServiceClient(): RecommendationSubscriptionServiceClient
        |\Google\Ads\GoogleAds\V15\Services\RecommendationSubscriptionServiceClient
    {
        return $this->useGapicV2Source()
            ? new RecommendationSubscriptionServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\RecommendationSubscriptionServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return RemarketingActionServiceClient|\Google\Ads\GoogleAds\V15\Services\RemarketingActionServiceClient
     */
    public function getRemarketingActionServiceClient(): RemarketingActionServiceClient
        |\Google\Ads\GoogleAds\V15\Services\RemarketingActionServiceClient
    {
        return $this->useGapicV2Source()
            ? new RemarketingActionServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\RemarketingActionServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return SharedCriterionServiceClient|\Google\Ads\GoogleAds\V15\Services\SharedCriterionServiceClient
     */
    public function getSharedCriterionServiceClient(): SharedCriterionServiceClient
        |\Google\Ads\GoogleAds\V15\Services\SharedCriterionServiceClient
    {
        return $this->useGapicV2Source()
            ? new SharedCriterionServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\SharedCriterionServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return SharedSetServiceClient|\Google\Ads\GoogleAds\V15\Services\SharedSetServiceClient
     */
    public function getSharedSetServiceClient(): SharedSetServiceClient
        |\Google\Ads\GoogleAds\V15\Services\SharedSetServiceClient
    {
        return $this->useGapicV2Source()
            ? new SharedSetServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\SharedSetServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return SmartCampaignSettingServiceClient|\Google\Ads\GoogleAds\V15\Services\SmartCampaignSettingServiceClient
     */
    public function getSmartCampaignSettingServiceClient(): SmartCampaignSettingServiceClient
        |\Google\Ads\GoogleAds\V15\Services\SmartCampaignSettingServiceClient
    {
        return $this->useGapicV2Source()
            ? new SmartCampaignSettingServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\SmartCampaignSettingServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return SmartCampaignSuggestServiceClient|\Google\Ads\GoogleAds\V15\Services\SmartCampaignSuggestServiceClient
     */
    public function getSmartCampaignSuggestServiceClient(): SmartCampaignSuggestServiceClient
        |\Google\Ads\GoogleAds\V15\Services\SmartCampaignSuggestServiceClient
    {
        return $this->useGapicV2Source()
            ? new SmartCampaignSuggestServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\SmartCampaignSuggestServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return ThirdPartyAppAnalyticsLinkServiceClient|\Google\Ads\GoogleAds\V15\Services\ThirdPartyAppAnalyticsLinkServiceClient
     */
    public function getThirdPartyAppAnalyticsLinkServiceClient(): ThirdPartyAppAnalyticsLinkServiceClient
        |\Google\Ads\GoogleAds\V15\Services\ThirdPartyAppAnalyticsLinkServiceClient
    {
        return $this->useGapicV2Source()
            ? new ThirdPartyAppAnalyticsLinkServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\ThirdPartyAppAnalyticsLinkServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return TravelAssetSuggestionServiceClient|\Google\Ads\GoogleAds\V15\Services\TravelAssetSuggestionServiceClient
     */
    public function getTravelAssetSuggestionServiceClient(): TravelAssetSuggestionServiceClient
        |\Google\Ads\GoogleAds\V15\Services\TravelAssetSuggestionServiceClient
    {
        return $this->useGapicV2Source()
            ? new TravelAssetSuggestionServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\TravelAssetSuggestionServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return UserDataServiceClient|\Google\Ads\GoogleAds\V15\Services\UserDataServiceClient
     */
    public function getUserDataServiceClient(): UserDataServiceClient
        |\Google\Ads\GoogleAds\V15\Services\UserDataServiceClient
    {
        return $this->useGapicV2Source()
            ? new UserDataServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\UserDataServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }

    /**
     * @return UserListServiceClient|\Google\Ads\GoogleAds\V15\Services\UserListServiceClient
     */
    public function getUserListServiceClient(): UserListServiceClient
        |\Google\Ads\GoogleAds\V15\Services\UserListServiceClient
    {
        return $this->useGapicV2Source()
            ? new UserListServiceClient($this->getGoogleAdsClientOptions())
            : new \Google\Ads\GoogleAds\V15\Services\UserListServiceClient(
                $this->getGoogleAdsClientOptions()
            );
    }
}
