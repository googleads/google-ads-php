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

namespace Google\Ads\GoogleAds\Lib\V20;

use Google\Ads\GoogleAds\Constants;
use Google\Ads\GoogleAds\Lib\ConfigurationTrait;
use Google\Ads\GoogleAds\Lib\InsecureCredentialsWrapper;
use Google\Ads\GoogleAds\V20\Services\Client\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AccountLinkServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AdGroupAssetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AdGroupAssetSetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AdGroupCriterionCustomizerServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AdGroupCustomizerServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AdGroupServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AdParameterServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AdServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AssetGroupAssetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AssetGroupListingGroupFilterServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AssetGroupServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AssetGroupSignalServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AssetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AssetSetAssetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AssetSetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AudienceInsightsServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\AudienceServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\BatchJobServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\BiddingDataExclusionServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\BiddingSeasonalityAdjustmentServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\BrandSuggestionServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CampaignAssetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CampaignAssetSetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CampaignConversionGoalServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CampaignCustomizerServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CampaignGroupServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CampaignLifecycleGoalServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CampaignServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ContentCreatorInsightsServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ConversionAdjustmentUploadServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ConversionCustomVariableServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ConversionGoalCampaignConfigServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ConversionUploadServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ConversionValueRuleServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ConversionValueRuleSetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomAudienceServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomConversionGoalServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomerAssetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomerAssetSetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomerConversionGoalServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomerCustomizerServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomerLifecycleGoalServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomerServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomerSkAdNetworkConversionValueSchemaServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomerUserAccessInvitationServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomerUserAccessServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomInterestServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\CustomizerAttributeServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\DataLinkServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ExperimentArmServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ExperimentServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\GoogleAdsServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\IdentityVerificationServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\InvoiceServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\KeywordPlanAdGroupKeywordServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\KeywordPlanCampaignKeywordServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\KeywordPlanIdeaServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\KeywordThemeConstantServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\LabelServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\LocalServicesLeadServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\OfflineUserDataJobServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\PaymentsAccountServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ProductLinkInvitationServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ProductLinkServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ReachPlanServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\RecommendationServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\RecommendationSubscriptionServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\RemarketingActionServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ShareablePreviewServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\SharedSetServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\SmartCampaignSettingServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\SmartCampaignSuggestServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\ThirdPartyAppAnalyticsLinkServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\TravelAssetSuggestionServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\UserDataServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\UserListCustomerTypeServiceClient;
use Google\Ads\GoogleAds\V20\Services\Client\UserListServiceClient;
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
        if (!empty($this->getHttpHandler())) {
            $clientOptions['transportConfig']['rest']['httpHandler'] = $this->getHttpHandler();
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
     * @return AdGroupAssetSetServiceClient
     */
    public function getAdGroupAssetSetServiceClient(): AdGroupAssetSetServiceClient
    {
        return new AdGroupAssetSetServiceClient($this->getGoogleAdsClientOptions());
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
     * @return BrandSuggestionServiceClient
     */
    public function getBrandSuggestionServiceClient(): BrandSuggestionServiceClient
    {
        return new BrandSuggestionServiceClient($this->getGoogleAdsClientOptions());
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
     * @return CampaignLifecycleGoalServiceClient
     */
    public function getCampaignLifecycleGoalServiceClient(): CampaignLifecycleGoalServiceClient
    {
        return new CampaignLifecycleGoalServiceClient($this->getGoogleAdsClientOptions());
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
     * @return ContentCreatorInsightsServiceClient
     */
    public function getContentCreatorInsightsServiceClient(): ContentCreatorInsightsServiceClient
    {
        return new ContentCreatorInsightsServiceClient($this->getGoogleAdsClientOptions());
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
     * @return CustomerAssetSetServiceClient
     */
    public function getCustomerAssetSetServiceClient(): CustomerAssetSetServiceClient
    {
        return new CustomerAssetSetServiceClient($this->getGoogleAdsClientOptions());
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
     * @return CustomerLabelServiceClient
     */
    public function getCustomerLabelServiceClient(): CustomerLabelServiceClient
    {
        return new CustomerLabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerLifecycleGoalServiceClient
     */
    public function getCustomerLifecycleGoalServiceClient(): CustomerLifecycleGoalServiceClient
    {
        return new CustomerLifecycleGoalServiceClient($this->getGoogleAdsClientOptions());
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
     * @return CustomerSkAdNetworkConversionValueSchemaServiceClient
     */
    public function getCustomerSkAdNetworkConversionValueSchemaServiceClient(): CustomerSkAdNetworkConversionValueSchemaServiceClient
    {
        return new CustomerSkAdNetworkConversionValueSchemaServiceClient($this->getGoogleAdsClientOptions());
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
     * @return DataLinkServiceClient
     */
    public function getDataLinkServiceClient(): DataLinkServiceClient
    {
        return new DataLinkServiceClient($this->getGoogleAdsClientOptions());
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
     * @return IdentityVerificationServiceClient
     */
    public function getIdentityVerificationServiceClient(): IdentityVerificationServiceClient
    {
        return new IdentityVerificationServiceClient($this->getGoogleAdsClientOptions());
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
     * @return LocalServicesLeadServiceClient
     */
    public function getLocalServicesLeadServiceClient(): LocalServicesLeadServiceClient
    {
        return new LocalServicesLeadServiceClient($this->getGoogleAdsClientOptions());
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
     * @return ProductLinkInvitationServiceClient
     */
    public function getProductLinkInvitationServiceClient(): ProductLinkInvitationServiceClient
    {
        return new ProductLinkInvitationServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ProductLinkServiceClient
     */
    public function getProductLinkServiceClient(): ProductLinkServiceClient
    {
        return new ProductLinkServiceClient($this->getGoogleAdsClientOptions());
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
     * @return RecommendationSubscriptionServiceClient
     */
    public function getRecommendationSubscriptionServiceClient(): RecommendationSubscriptionServiceClient
    {
        return new RecommendationSubscriptionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return RemarketingActionServiceClient
     */
    public function getRemarketingActionServiceClient(): RemarketingActionServiceClient
    {
        return new RemarketingActionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ShareablePreviewServiceClient
     */
    public function getShareablePreviewServiceClient(): ShareablePreviewServiceClient
    {
        return new ShareablePreviewServiceClient($this->getGoogleAdsClientOptions());
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
     * @return TravelAssetSuggestionServiceClient
     */
    public function getTravelAssetSuggestionServiceClient(): TravelAssetSuggestionServiceClient
    {
        return new TravelAssetSuggestionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return UserDataServiceClient
     */
    public function getUserDataServiceClient(): UserDataServiceClient
    {
        return new UserDataServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return UserListCustomerTypeServiceClient
     */
    public function getUserListCustomerTypeServiceClient(): UserListCustomerTypeServiceClient
    {
        return new UserListCustomerTypeServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return UserListServiceClient
     */
    public function getUserListServiceClient(): UserListServiceClient
    {
        return new UserListServiceClient($this->getGoogleAdsClientOptions());
    }
}
