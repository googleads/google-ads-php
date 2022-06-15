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

namespace Google\Ads\GoogleAds\Lib\V11;

use Google\Ads\GoogleAds\Constants;
use Google\Ads\GoogleAds\Lib\ConfigurationTrait;
use Google\Ads\GoogleAds\Lib\InsecureCredentialsWrapper;
use Google\Ads\GoogleAds\V11\Services\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V11\Services\AccountLinkServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdGroupAssetServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdGroupCriterionCustomizerServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdGroupCustomizerServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdGroupExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdGroupFeedServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdParameterServiceClient;
use Google\Ads\GoogleAds\V11\Services\AdServiceClient;
use Google\Ads\GoogleAds\V11\Services\AssetGroupAssetServiceClient;
use Google\Ads\GoogleAds\V11\Services\AssetGroupListingGroupFilterServiceClient;
use Google\Ads\GoogleAds\V11\Services\AssetGroupServiceClient;
use Google\Ads\GoogleAds\V11\Services\AssetGroupSignalServiceClient;
use Google\Ads\GoogleAds\V11\Services\AssetServiceClient;
use Google\Ads\GoogleAds\V11\Services\AssetSetAssetServiceClient;
use Google\Ads\GoogleAds\V11\Services\AssetSetServiceClient;
use Google\Ads\GoogleAds\V11\Services\AudienceInsightsServiceClient;
use Google\Ads\GoogleAds\V11\Services\AudienceServiceClient;
use Google\Ads\GoogleAds\V11\Services\BatchJobServiceClient;
use Google\Ads\GoogleAds\V11\Services\BiddingDataExclusionServiceClient;
use Google\Ads\GoogleAds\V11\Services\BiddingSeasonalityAdjustmentServiceClient;
use Google\Ads\GoogleAds\V11\Services\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V11\Services\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignAssetServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignAssetSetServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignConversionGoalServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignCustomizerServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignExperimentServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignFeedServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignGroupServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V11\Services\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V11\Services\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V11\Services\ConversionAdjustmentUploadServiceClient;
use Google\Ads\GoogleAds\V11\Services\ConversionCustomVariableServiceClient;
use Google\Ads\GoogleAds\V11\Services\ConversionGoalCampaignConfigServiceClient;
use Google\Ads\GoogleAds\V11\Services\ConversionUploadServiceClient;
use Google\Ads\GoogleAds\V11\Services\ConversionValueRuleServiceClient;
use Google\Ads\GoogleAds\V11\Services\ConversionValueRuleSetServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomAudienceServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomConversionGoalServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomerAssetServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomerConversionGoalServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomerCustomizerServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomerExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomerFeedServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomerUserAccessInvitationServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomerUserAccessServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomInterestServiceClient;
use Google\Ads\GoogleAds\V11\Services\CustomizerAttributeServiceClient;
use Google\Ads\GoogleAds\V11\Services\ExperimentArmServiceClient;
use Google\Ads\GoogleAds\V11\Services\ExperimentServiceClient;
use Google\Ads\GoogleAds\V11\Services\ExtensionFeedItemServiceClient;
use Google\Ads\GoogleAds\V11\Services\FeedItemServiceClient;
use Google\Ads\GoogleAds\V11\Services\FeedItemSetLinkServiceClient;
use Google\Ads\GoogleAds\V11\Services\FeedItemSetServiceClient;
use Google\Ads\GoogleAds\V11\Services\FeedItemTargetServiceClient;
use Google\Ads\GoogleAds\V11\Services\FeedMappingServiceClient;
use Google\Ads\GoogleAds\V11\Services\FeedServiceClient;
use Google\Ads\GoogleAds\V11\Services\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V11\Services\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V11\Services\GoogleAdsServiceClient;
use Google\Ads\GoogleAds\V11\Services\InvoiceServiceClient;
use Google\Ads\GoogleAds\V11\Services\KeywordPlanAdGroupKeywordServiceClient;
use Google\Ads\GoogleAds\V11\Services\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V11\Services\KeywordPlanCampaignKeywordServiceClient;
use Google\Ads\GoogleAds\V11\Services\KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V11\Services\KeywordPlanIdeaServiceClient;
use Google\Ads\GoogleAds\V11\Services\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V11\Services\KeywordThemeConstantServiceClient;
use Google\Ads\GoogleAds\V11\Services\LabelServiceClient;
use Google\Ads\GoogleAds\V11\Services\MediaFileServiceClient;
use Google\Ads\GoogleAds\V11\Services\MerchantCenterLinkServiceClient;
use Google\Ads\GoogleAds\V11\Services\OfflineUserDataJobServiceClient;
use Google\Ads\GoogleAds\V11\Services\PaymentsAccountServiceClient;
use Google\Ads\GoogleAds\V11\Services\ReachPlanServiceClient;
use Google\Ads\GoogleAds\V11\Services\RecommendationServiceClient;
use Google\Ads\GoogleAds\V11\Services\RemarketingActionServiceClient;
use Google\Ads\GoogleAds\V11\Services\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V11\Services\SharedSetServiceClient;
use Google\Ads\GoogleAds\V11\Services\SmartCampaignSettingServiceClient;
use Google\Ads\GoogleAds\V11\Services\SmartCampaignSuggestServiceClient;
use Google\Ads\GoogleAds\V11\Services\ThirdPartyAppAnalyticsLinkServiceClient;
use Google\Ads\GoogleAds\V11\Services\UserDataServiceClient;
use Google\Ads\GoogleAds\V11\Services\UserListServiceClient;
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
     * @return AccountBudgetProposalServiceClient
     */
    public function getAccountBudgetProposalServiceClient(): AccountBudgetProposalServiceClient
    {
        return new AccountBudgetProposalServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AccountLinkServiceClient
     */
    public function getAccountLinkServiceClient(): AccountLinkServiceClient
    {
        return new AccountLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupAdLabelServiceClient
     */
    public function getAdGroupAdLabelServiceClient(): AdGroupAdLabelServiceClient
    {
        return new AdGroupAdLabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupAdServiceClient
     */
    public function getAdGroupAdServiceClient(): AdGroupAdServiceClient
    {
        return new AdGroupAdServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupAssetServiceClient
     */
    public function getAdGroupAssetServiceClient(): AdGroupAssetServiceClient
    {
        return new AdGroupAssetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupBidModifierServiceClient
     */
    public function getAdGroupBidModifierServiceClient(): AdGroupBidModifierServiceClient
    {
        return new AdGroupBidModifierServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupCriterionCustomizerServiceClient
     */
    public function getAdGroupCriterionCustomizerServiceClient(): AdGroupCriterionCustomizerServiceClient
    {
        return new AdGroupCriterionCustomizerServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupCriterionLabelServiceClient
     */
    public function getAdGroupCriterionLabelServiceClient(): AdGroupCriterionLabelServiceClient
    {
        return new AdGroupCriterionLabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupCriterionServiceClient
     */
    public function getAdGroupCriterionServiceClient(): AdGroupCriterionServiceClient
    {
        return new AdGroupCriterionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupCustomizerServiceClient
     */
    public function getAdGroupCustomizerServiceClient(): AdGroupCustomizerServiceClient
    {
        return new AdGroupCustomizerServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupExtensionSettingServiceClient
     */
    public function getAdGroupExtensionSettingServiceClient(): AdGroupExtensionSettingServiceClient
    {
        return new AdGroupExtensionSettingServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupFeedServiceClient
     */
    public function getAdGroupFeedServiceClient(): AdGroupFeedServiceClient
    {
        return new AdGroupFeedServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupLabelServiceClient
     */
    public function getAdGroupLabelServiceClient(): AdGroupLabelServiceClient
    {
        return new AdGroupLabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupServiceClient
     */
    public function getAdGroupServiceClient(): AdGroupServiceClient
    {
        return new AdGroupServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdParameterServiceClient
     */
    public function getAdParameterServiceClient(): AdParameterServiceClient
    {
        return new AdParameterServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdServiceClient
     */
    public function getAdServiceClient(): AdServiceClient
    {
        return new AdServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AssetGroupAssetServiceClient
     */
    public function getAssetGroupAssetServiceClient(): AssetGroupAssetServiceClient
    {
        return new AssetGroupAssetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AssetGroupListingGroupFilterServiceClient
     */
    public function getAssetGroupListingGroupFilterServiceClient(): AssetGroupListingGroupFilterServiceClient
    {
        return new AssetGroupListingGroupFilterServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AssetGroupServiceClient
     */
    public function getAssetGroupServiceClient(): AssetGroupServiceClient
    {
        return new AssetGroupServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AssetGroupSignalServiceClient
     */
    public function getAssetGroupSignalServiceClient(): AssetGroupSignalServiceClient
    {
        return new AssetGroupSignalServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AssetServiceClient
     */
    public function getAssetServiceClient(): AssetServiceClient
    {
        return new AssetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AssetSetAssetServiceClient
     */
    public function getAssetSetAssetServiceClient(): AssetSetAssetServiceClient
    {
        return new AssetSetAssetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AssetSetServiceClient
     */
    public function getAssetSetServiceClient(): AssetSetServiceClient
    {
        return new AssetSetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AudienceInsightsServiceClient
     */
    public function getAudienceInsightsServiceClient(): AudienceInsightsServiceClient
    {
        return new AudienceInsightsServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AudienceServiceClient
     */
    public function getAudienceServiceClient(): AudienceServiceClient
    {
        return new AudienceServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return BatchJobServiceClient
     */
    public function getBatchJobServiceClient(): BatchJobServiceClient
    {
        return new BatchJobServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return BiddingDataExclusionServiceClient
     */
    public function getBiddingDataExclusionServiceClient(): BiddingDataExclusionServiceClient
    {
        return new BiddingDataExclusionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return BiddingSeasonalityAdjustmentServiceClient
     */
    public function getBiddingSeasonalityAdjustmentServiceClient(): BiddingSeasonalityAdjustmentServiceClient
    {
        return new BiddingSeasonalityAdjustmentServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return BiddingStrategyServiceClient
     */
    public function getBiddingStrategyServiceClient(): BiddingStrategyServiceClient
    {
        return new BiddingStrategyServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return BillingSetupServiceClient
     */
    public function getBillingSetupServiceClient(): BillingSetupServiceClient
    {
        return new BillingSetupServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignAssetServiceClient
     */
    public function getCampaignAssetServiceClient(): CampaignAssetServiceClient
    {
        return new CampaignAssetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignAssetSetServiceClient
     */
    public function getCampaignAssetSetServiceClient(): CampaignAssetSetServiceClient
    {
        return new CampaignAssetSetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignBidModifierServiceClient
     */
    public function getCampaignBidModifierServiceClient(): CampaignBidModifierServiceClient
    {
        return new CampaignBidModifierServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignBudgetServiceClient
     */
    public function getCampaignBudgetServiceClient(): CampaignBudgetServiceClient
    {
        return new CampaignBudgetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignConversionGoalServiceClient
     */
    public function getCampaignConversionGoalServiceClient(): CampaignConversionGoalServiceClient
    {
        return new CampaignConversionGoalServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignCriterionServiceClient
     */
    public function getCampaignCriterionServiceClient(): CampaignCriterionServiceClient
    {
        return new CampaignCriterionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignCustomizerServiceClient
     */
    public function getCampaignCustomizerServiceClient(): CampaignCustomizerServiceClient
    {
        return new CampaignCustomizerServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignDraftServiceClient
     */
    public function getCampaignDraftServiceClient(): CampaignDraftServiceClient
    {
        return new CampaignDraftServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignExperimentServiceClient
     */
    public function getCampaignExperimentServiceClient(): CampaignExperimentServiceClient
    {
        return new CampaignExperimentServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignExtensionSettingServiceClient
     */
    public function getCampaignExtensionSettingServiceClient(): CampaignExtensionSettingServiceClient
    {
        return new CampaignExtensionSettingServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignFeedServiceClient
     */
    public function getCampaignFeedServiceClient(): CampaignFeedServiceClient
    {
        return new CampaignFeedServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignGroupServiceClient
     */
    public function getCampaignGroupServiceClient(): CampaignGroupServiceClient
    {
        return new CampaignGroupServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignLabelServiceClient
     */
    public function getCampaignLabelServiceClient(): CampaignLabelServiceClient
    {
        return new CampaignLabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignServiceClient
     */
    public function getCampaignServiceClient(): CampaignServiceClient
    {
        return new CampaignServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignSharedSetServiceClient
     */
    public function getCampaignSharedSetServiceClient(): CampaignSharedSetServiceClient
    {
        return new CampaignSharedSetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ConversionActionServiceClient
     */
    public function getConversionActionServiceClient(): ConversionActionServiceClient
    {
        return new ConversionActionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ConversionAdjustmentUploadServiceClient
     */
    public function getConversionAdjustmentUploadServiceClient(): ConversionAdjustmentUploadServiceClient
    {
        return new ConversionAdjustmentUploadServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ConversionCustomVariableServiceClient
     */
    public function getConversionCustomVariableServiceClient(): ConversionCustomVariableServiceClient
    {
        return new ConversionCustomVariableServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ConversionGoalCampaignConfigServiceClient
     */
    public function getConversionGoalCampaignConfigServiceClient(): ConversionGoalCampaignConfigServiceClient
    {
        return new ConversionGoalCampaignConfigServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ConversionUploadServiceClient
     */
    public function getConversionUploadServiceClient(): ConversionUploadServiceClient
    {
        return new ConversionUploadServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ConversionValueRuleServiceClient
     */
    public function getConversionValueRuleServiceClient(): ConversionValueRuleServiceClient
    {
        return new ConversionValueRuleServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ConversionValueRuleSetServiceClient
     */
    public function getConversionValueRuleSetServiceClient(): ConversionValueRuleSetServiceClient
    {
        return new ConversionValueRuleSetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomAudienceServiceClient
     */
    public function getCustomAudienceServiceClient(): CustomAudienceServiceClient
    {
        return new CustomAudienceServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomConversionGoalServiceClient
     */
    public function getCustomConversionGoalServiceClient(): CustomConversionGoalServiceClient
    {
        return new CustomConversionGoalServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerAssetServiceClient
     */
    public function getCustomerAssetServiceClient(): CustomerAssetServiceClient
    {
        return new CustomerAssetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerClientLinkServiceClient
     */
    public function getCustomerClientLinkServiceClient(): CustomerClientLinkServiceClient
    {
        return new CustomerClientLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerConversionGoalServiceClient
     */
    public function getCustomerConversionGoalServiceClient(): CustomerConversionGoalServiceClient
    {
        return new CustomerConversionGoalServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerCustomizerServiceClient
     */
    public function getCustomerCustomizerServiceClient(): CustomerCustomizerServiceClient
    {
        return new CustomerCustomizerServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerExtensionSettingServiceClient
     */
    public function getCustomerExtensionSettingServiceClient(): CustomerExtensionSettingServiceClient
    {
        return new CustomerExtensionSettingServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerFeedServiceClient
     */
    public function getCustomerFeedServiceClient(): CustomerFeedServiceClient
    {
        return new CustomerFeedServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerLabelServiceClient
     */
    public function getCustomerLabelServiceClient(): CustomerLabelServiceClient
    {
        return new CustomerLabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerManagerLinkServiceClient
     */
    public function getCustomerManagerLinkServiceClient(): CustomerManagerLinkServiceClient
    {
        return new CustomerManagerLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerNegativeCriterionServiceClient
     */
    public function getCustomerNegativeCriterionServiceClient(): CustomerNegativeCriterionServiceClient
    {
        return new CustomerNegativeCriterionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerServiceClient
     */
    public function getCustomerServiceClient(): CustomerServiceClient
    {
        return new CustomerServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerUserAccessInvitationServiceClient
     */
    public function getCustomerUserAccessInvitationServiceClient(): CustomerUserAccessInvitationServiceClient
    {
        return new CustomerUserAccessInvitationServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerUserAccessServiceClient
     */
    public function getCustomerUserAccessServiceClient(): CustomerUserAccessServiceClient
    {
        return new CustomerUserAccessServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomInterestServiceClient
     */
    public function getCustomInterestServiceClient(): CustomInterestServiceClient
    {
        return new CustomInterestServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomizerAttributeServiceClient
     */
    public function getCustomizerAttributeServiceClient(): CustomizerAttributeServiceClient
    {
        return new CustomizerAttributeServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ExperimentArmServiceClient
     */
    public function getExperimentArmServiceClient(): ExperimentArmServiceClient
    {
        return new ExperimentArmServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ExperimentServiceClient
     */
    public function getExperimentServiceClient(): ExperimentServiceClient
    {
        return new ExperimentServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ExtensionFeedItemServiceClient
     */
    public function getExtensionFeedItemServiceClient(): ExtensionFeedItemServiceClient
    {
        return new ExtensionFeedItemServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return FeedItemServiceClient
     */
    public function getFeedItemServiceClient(): FeedItemServiceClient
    {
        return new FeedItemServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return FeedItemSetLinkServiceClient
     */
    public function getFeedItemSetLinkServiceClient(): FeedItemSetLinkServiceClient
    {
        return new FeedItemSetLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return FeedItemSetServiceClient
     */
    public function getFeedItemSetServiceClient(): FeedItemSetServiceClient
    {
        return new FeedItemSetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return FeedItemTargetServiceClient
     */
    public function getFeedItemTargetServiceClient(): FeedItemTargetServiceClient
    {
        return new FeedItemTargetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return FeedMappingServiceClient
     */
    public function getFeedMappingServiceClient(): FeedMappingServiceClient
    {
        return new FeedMappingServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return FeedServiceClient
     */
    public function getFeedServiceClient(): FeedServiceClient
    {
        return new FeedServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GeoTargetConstantServiceClient
     */
    public function getGeoTargetConstantServiceClient(): GeoTargetConstantServiceClient
    {
        return new GeoTargetConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GoogleAdsFieldServiceClient
     */
    public function getGoogleAdsFieldServiceClient(): GoogleAdsFieldServiceClient
    {
        return new GoogleAdsFieldServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GoogleAdsServiceClient
     */
    public function getGoogleAdsServiceClient(): GoogleAdsServiceClient
    {
        return new GoogleAdsServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return InvoiceServiceClient
     */
    public function getInvoiceServiceClient(): InvoiceServiceClient
    {
        return new InvoiceServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordPlanAdGroupKeywordServiceClient
     */
    public function getKeywordPlanAdGroupKeywordServiceClient(): KeywordPlanAdGroupKeywordServiceClient
    {
        return new KeywordPlanAdGroupKeywordServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordPlanAdGroupServiceClient
     */
    public function getKeywordPlanAdGroupServiceClient(): KeywordPlanAdGroupServiceClient
    {
        return new KeywordPlanAdGroupServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordPlanCampaignKeywordServiceClient
     */
    public function getKeywordPlanCampaignKeywordServiceClient(): KeywordPlanCampaignKeywordServiceClient
    {
        return new KeywordPlanCampaignKeywordServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordPlanCampaignServiceClient
     */
    public function getKeywordPlanCampaignServiceClient(): KeywordPlanCampaignServiceClient
    {
        return new KeywordPlanCampaignServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordPlanIdeaServiceClient
     */
    public function getKeywordPlanIdeaServiceClient(): KeywordPlanIdeaServiceClient
    {
        return new KeywordPlanIdeaServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordPlanServiceClient
     */
    public function getKeywordPlanServiceClient(): KeywordPlanServiceClient
    {
        return new KeywordPlanServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordThemeConstantServiceClient
     */
    public function getKeywordThemeConstantServiceClient(): KeywordThemeConstantServiceClient
    {
        return new KeywordThemeConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return LabelServiceClient
     */
    public function getLabelServiceClient(): LabelServiceClient
    {
        return new LabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return MediaFileServiceClient
     */
    public function getMediaFileServiceClient(): MediaFileServiceClient
    {
        return new MediaFileServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return MerchantCenterLinkServiceClient
     */
    public function getMerchantCenterLinkServiceClient(): MerchantCenterLinkServiceClient
    {
        return new MerchantCenterLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return OfflineUserDataJobServiceClient
     */
    public function getOfflineUserDataJobServiceClient(): OfflineUserDataJobServiceClient
    {
        return new OfflineUserDataJobServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return PaymentsAccountServiceClient
     */
    public function getPaymentsAccountServiceClient(): PaymentsAccountServiceClient
    {
        return new PaymentsAccountServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ReachPlanServiceClient
     */
    public function getReachPlanServiceClient(): ReachPlanServiceClient
    {
        return new ReachPlanServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return RecommendationServiceClient
     */
    public function getRecommendationServiceClient(): RecommendationServiceClient
    {
        return new RecommendationServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return RemarketingActionServiceClient
     */
    public function getRemarketingActionServiceClient(): RemarketingActionServiceClient
    {
        return new RemarketingActionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return SharedCriterionServiceClient
     */
    public function getSharedCriterionServiceClient(): SharedCriterionServiceClient
    {
        return new SharedCriterionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return SharedSetServiceClient
     */
    public function getSharedSetServiceClient(): SharedSetServiceClient
    {
        return new SharedSetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return SmartCampaignSettingServiceClient
     */
    public function getSmartCampaignSettingServiceClient(): SmartCampaignSettingServiceClient
    {
        return new SmartCampaignSettingServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return SmartCampaignSuggestServiceClient
     */
    public function getSmartCampaignSuggestServiceClient(): SmartCampaignSuggestServiceClient
    {
        return new SmartCampaignSuggestServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ThirdPartyAppAnalyticsLinkServiceClient
     */
    public function getThirdPartyAppAnalyticsLinkServiceClient(): ThirdPartyAppAnalyticsLinkServiceClient
    {
        return new ThirdPartyAppAnalyticsLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return UserDataServiceClient
     */
    public function getUserDataServiceClient(): UserDataServiceClient
    {
        return new UserDataServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return UserListServiceClient
     */
    public function getUserListServiceClient(): UserListServiceClient
    {
        return new UserListServiceClient($this->getGoogleAdsClientOptions());
    }
}
