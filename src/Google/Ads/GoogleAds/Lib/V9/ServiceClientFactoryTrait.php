<?php

/**
 * Copyright 2021 Google LLC
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

namespace Google\Ads\GoogleAds\Lib\V9;

use Google\Ads\GoogleAds\Constants;
use Google\Ads\GoogleAds\Lib\ConfigurationTrait;
use Google\Ads\GoogleAds\V9\Services\AccessibleBiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V9\Services\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V9\Services\AccountBudgetServiceClient;
use Google\Ads\GoogleAds\V9\Services\AccountLinkServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupAdAssetViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupAssetServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupAudienceViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupCriterionCustomizerServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupCustomizerServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupFeedServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdGroupSimulationServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdParameterServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdScheduleViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\AdServiceClient;
use Google\Ads\GoogleAds\V9\Services\AgeRangeViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetFieldTypeViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetGroupAssetServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetGroupListingGroupFilterServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetGroupServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetSetAssetServiceClient;
use Google\Ads\GoogleAds\V9\Services\AssetSetServiceClient;
use Google\Ads\GoogleAds\V9\Services\BatchJobServiceClient;
use Google\Ads\GoogleAds\V9\Services\BiddingDataExclusionServiceClient;
use Google\Ads\GoogleAds\V9\Services\BiddingSeasonalityAdjustmentServiceClient;
use Google\Ads\GoogleAds\V9\Services\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V9\Services\BiddingStrategySimulationServiceClient;
use Google\Ads\GoogleAds\V9\Services\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignAssetServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignAssetSetServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignAudienceViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignConversionGoalServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignCustomizerServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignExperimentServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignFeedServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V9\Services\CampaignSimulationServiceClient;
use Google\Ads\GoogleAds\V9\Services\CarrierConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\ChangeStatusServiceClient;
use Google\Ads\GoogleAds\V9\Services\ClickViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\CombinedAudienceServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionAdjustmentUploadServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionCustomVariableServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionGoalCampaignConfigServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionUploadServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionValueRuleServiceClient;
use Google\Ads\GoogleAds\V9\Services\ConversionValueRuleSetServiceClient;
use Google\Ads\GoogleAds\V9\Services\CurrencyConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomAudienceServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomConversionGoalServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerAssetServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerClientServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerConversionGoalServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerCustomizerServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerFeedServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerUserAccessInvitationServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomerUserAccessServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomInterestServiceClient;
use Google\Ads\GoogleAds\V9\Services\CustomizerAttributeServiceClient;
use Google\Ads\GoogleAds\V9\Services\DetailedDemographicServiceClient;
use Google\Ads\GoogleAds\V9\Services\DetailPlacementViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\DisplayKeywordViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\DistanceViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\DomainCategoryServiceClient;
use Google\Ads\GoogleAds\V9\Services\DynamicSearchAdsSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\ExpandedLandingPageViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\ExtensionFeedItemServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedItemServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedItemSetLinkServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedItemSetServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedItemTargetServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedMappingServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedPlaceholderViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\FeedServiceClient;
use Google\Ads\GoogleAds\V9\Services\GenderViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\GeographicViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V9\Services\GoogleAdsServiceClient;
use Google\Ads\GoogleAds\V9\Services\GroupPlacementViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\HotelGroupViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\HotelPerformanceViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\IncomeRangeViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\InvoiceServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanAdGroupKeywordServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanCampaignKeywordServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanIdeaServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordThemeConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\KeywordViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\LabelServiceClient;
use Google\Ads\GoogleAds\V9\Services\LandingPageViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\LanguageConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\LifeEventServiceClient;
use Google\Ads\GoogleAds\V9\Services\LocationViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\ManagedPlacementViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\MediaFileServiceClient;
use Google\Ads\GoogleAds\V9\Services\MerchantCenterLinkServiceClient;
use Google\Ads\GoogleAds\V9\Services\MobileAppCategoryConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\MobileDeviceConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\OfflineUserDataJobServiceClient;
use Google\Ads\GoogleAds\V9\Services\OperatingSystemVersionConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\PaidOrganicSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\ParentalStatusViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\PaymentsAccountServiceClient;
use Google\Ads\GoogleAds\V9\Services\ProductBiddingCategoryConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\ProductGroupViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\ReachPlanServiceClient;
use Google\Ads\GoogleAds\V9\Services\RecommendationServiceClient;
use Google\Ads\GoogleAds\V9\Services\RemarketingActionServiceClient;
use Google\Ads\GoogleAds\V9\Services\SearchTermViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V9\Services\SharedSetServiceClient;
use Google\Ads\GoogleAds\V9\Services\ShoppingPerformanceViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\SmartCampaignSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\SmartCampaignSettingServiceClient;
use Google\Ads\GoogleAds\V9\Services\SmartCampaignSuggestServiceClient;
use Google\Ads\GoogleAds\V9\Services\ThirdPartyAppAnalyticsLinkServiceClient;
use Google\Ads\GoogleAds\V9\Services\TopicConstantServiceClient;
use Google\Ads\GoogleAds\V9\Services\TopicViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\UserDataServiceClient;
use Google\Ads\GoogleAds\V9\Services\UserInterestServiceClient;
use Google\Ads\GoogleAds\V9\Services\UserListServiceClient;
use Google\Ads\GoogleAds\V9\Services\UserLocationViewServiceClient;
use Google\Ads\GoogleAds\V9\Services\VideoServiceClient;
use Google\Ads\GoogleAds\V9\Services\WebpageViewServiceClient;

/**
 * Contains service client factory methods.
 */
trait ServiceClientFactoryTrait
{
    use ConfigurationTrait;

    private static $CREDENTIALS_LOADER_KEY = 'credentials';
    private static $DEVELOPER_TOKEN_KEY = 'developer-token';
    private static $LOGIN_CUSTOMER_ID_KEY = 'login-customer-id';
    private static $LINKED_CUSTOMER_ID_KEY = 'linked-customer-id';
    private static $SERVICE_ADDRESS_KEY = 'serviceAddress';
    private static $DEFAULT_SERVICE_ADDRESS = 'googleads.googleapis.com';
    private static $TRANSPORT_KEY = 'transport';

    /**
     * Gets the Google Ads client options for making API calls.
     *
     * @return array the client options
     */
    public function getGoogleAdsClientOptions(): array
    {
        $clientOptions = [
            self::$CREDENTIALS_LOADER_KEY => $this->getOAuth2Credential(),
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
        if (!empty($this->getProxy())) {
            putenv('http_proxy=' . $this->getProxy());
        }
        if (!empty($this->getTransport())) {
            $clientOptions += [self::$TRANSPORT_KEY => $this->getTransport()];
        }

        return $clientOptions;
    }

    /**
     * @return AccessibleBiddingStrategyServiceClient
     */
    public function getAccessibleBiddingStrategyServiceClient(): AccessibleBiddingStrategyServiceClient
    {
        return new AccessibleBiddingStrategyServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AccountBudgetProposalServiceClient
     */
    public function getAccountBudgetProposalServiceClient(): AccountBudgetProposalServiceClient
    {
        return new AccountBudgetProposalServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AccountBudgetServiceClient
     */
    public function getAccountBudgetServiceClient(): AccountBudgetServiceClient
    {
        return new AccountBudgetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AccountLinkServiceClient
     */
    public function getAccountLinkServiceClient(): AccountLinkServiceClient
    {
        return new AccountLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupAdAssetViewServiceClient
     */
    public function getAdGroupAdAssetViewServiceClient(): AdGroupAdAssetViewServiceClient
    {
        return new AdGroupAdAssetViewServiceClient($this->getGoogleAdsClientOptions());
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
     * @return AdGroupAudienceViewServiceClient
     */
    public function getAdGroupAudienceViewServiceClient(): AdGroupAudienceViewServiceClient
    {
        return new AdGroupAudienceViewServiceClient($this->getGoogleAdsClientOptions());
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
     * @return AdGroupCriterionSimulationServiceClient
     */
    public function getAdGroupCriterionSimulationServiceClient(): AdGroupCriterionSimulationServiceClient
    {
        return new AdGroupCriterionSimulationServiceClient($this->getGoogleAdsClientOptions());
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
     * @return AdGroupSimulationServiceClient
     */
    public function getAdGroupSimulationServiceClient(): AdGroupSimulationServiceClient
    {
        return new AdGroupSimulationServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdParameterServiceClient
     */
    public function getAdParameterServiceClient(): AdParameterServiceClient
    {
        return new AdParameterServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdScheduleViewServiceClient
     */
    public function getAdScheduleViewServiceClient(): AdScheduleViewServiceClient
    {
        return new AdScheduleViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdServiceClient
     */
    public function getAdServiceClient(): AdServiceClient
    {
        return new AdServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AgeRangeViewServiceClient
     */
    public function getAgeRangeViewServiceClient(): AgeRangeViewServiceClient
    {
        return new AgeRangeViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AssetFieldTypeViewServiceClient
     */
    public function getAssetFieldTypeViewServiceClient(): AssetFieldTypeViewServiceClient
    {
        return new AssetFieldTypeViewServiceClient($this->getGoogleAdsClientOptions());
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
     * @return BiddingStrategySimulationServiceClient
     */
    public function getBiddingStrategySimulationServiceClient(): BiddingStrategySimulationServiceClient
    {
        return new BiddingStrategySimulationServiceClient($this->getGoogleAdsClientOptions());
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
     * @return CampaignAudienceViewServiceClient
     */
    public function getCampaignAudienceViewServiceClient(): CampaignAudienceViewServiceClient
    {
        return new CampaignAudienceViewServiceClient($this->getGoogleAdsClientOptions());
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
     * @return CampaignCriterionSimulationServiceClient
     */
    public function getCampaignCriterionSimulationServiceClient(): CampaignCriterionSimulationServiceClient
    {
        return new CampaignCriterionSimulationServiceClient($this->getGoogleAdsClientOptions());
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
     * @return CampaignSimulationServiceClient
     */
    public function getCampaignSimulationServiceClient(): CampaignSimulationServiceClient
    {
        return new CampaignSimulationServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CarrierConstantServiceClient
     */
    public function getCarrierConstantServiceClient(): CarrierConstantServiceClient
    {
        return new CarrierConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ChangeStatusServiceClient
     */
    public function getChangeStatusServiceClient(): ChangeStatusServiceClient
    {
        return new ChangeStatusServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ClickViewServiceClient
     */
    public function getClickViewServiceClient(): ClickViewServiceClient
    {
        return new ClickViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CombinedAudienceServiceClient
     */
    public function getCombinedAudienceServiceClient(): CombinedAudienceServiceClient
    {
        return new CombinedAudienceServiceClient($this->getGoogleAdsClientOptions());
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
     * @return CurrencyConstantServiceClient
     */
    public function getCurrencyConstantServiceClient(): CurrencyConstantServiceClient
    {
        return new CurrencyConstantServiceClient($this->getGoogleAdsClientOptions());
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
     * @return CustomerClientServiceClient
     */
    public function getCustomerClientServiceClient(): CustomerClientServiceClient
    {
        return new CustomerClientServiceClient($this->getGoogleAdsClientOptions());
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
     * @return DetailedDemographicServiceClient
     */
    public function getDetailedDemographicServiceClient(): DetailedDemographicServiceClient
    {
        return new DetailedDemographicServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return DetailPlacementViewServiceClient
     */
    public function getDetailPlacementViewServiceClient(): DetailPlacementViewServiceClient
    {
        return new DetailPlacementViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return DisplayKeywordViewServiceClient
     */
    public function getDisplayKeywordViewServiceClient(): DisplayKeywordViewServiceClient
    {
        return new DisplayKeywordViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return DistanceViewServiceClient
     */
    public function getDistanceViewServiceClient(): DistanceViewServiceClient
    {
        return new DistanceViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return DomainCategoryServiceClient
     */
    public function getDomainCategoryServiceClient(): DomainCategoryServiceClient
    {
        return new DomainCategoryServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return DynamicSearchAdsSearchTermViewServiceClient
     */
    public function getDynamicSearchAdsSearchTermViewServiceClient(): DynamicSearchAdsSearchTermViewServiceClient
    {
        return new DynamicSearchAdsSearchTermViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ExpandedLandingPageViewServiceClient
     */
    public function getExpandedLandingPageViewServiceClient(): ExpandedLandingPageViewServiceClient
    {
        return new ExpandedLandingPageViewServiceClient($this->getGoogleAdsClientOptions());
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
     * @return FeedPlaceholderViewServiceClient
     */
    public function getFeedPlaceholderViewServiceClient(): FeedPlaceholderViewServiceClient
    {
        return new FeedPlaceholderViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return FeedServiceClient
     */
    public function getFeedServiceClient(): FeedServiceClient
    {
        return new FeedServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GenderViewServiceClient
     */
    public function getGenderViewServiceClient(): GenderViewServiceClient
    {
        return new GenderViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GeographicViewServiceClient
     */
    public function getGeographicViewServiceClient(): GeographicViewServiceClient
    {
        return new GeographicViewServiceClient($this->getGoogleAdsClientOptions());
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
     * @return GroupPlacementViewServiceClient
     */
    public function getGroupPlacementViewServiceClient(): GroupPlacementViewServiceClient
    {
        return new GroupPlacementViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return HotelGroupViewServiceClient
     */
    public function getHotelGroupViewServiceClient(): HotelGroupViewServiceClient
    {
        return new HotelGroupViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return HotelPerformanceViewServiceClient
     */
    public function getHotelPerformanceViewServiceClient(): HotelPerformanceViewServiceClient
    {
        return new HotelPerformanceViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return IncomeRangeViewServiceClient
     */
    public function getIncomeRangeViewServiceClient(): IncomeRangeViewServiceClient
    {
        return new IncomeRangeViewServiceClient($this->getGoogleAdsClientOptions());
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
     * @return KeywordViewServiceClient
     */
    public function getKeywordViewServiceClient(): KeywordViewServiceClient
    {
        return new KeywordViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return LabelServiceClient
     */
    public function getLabelServiceClient(): LabelServiceClient
    {
        return new LabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return LandingPageViewServiceClient
     */
    public function getLandingPageViewServiceClient(): LandingPageViewServiceClient
    {
        return new LandingPageViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return LanguageConstantServiceClient
     */
    public function getLanguageConstantServiceClient(): LanguageConstantServiceClient
    {
        return new LanguageConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return LifeEventServiceClient
     */
    public function getLifeEventServiceClient(): LifeEventServiceClient
    {
        return new LifeEventServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return LocationViewServiceClient
     */
    public function getLocationViewServiceClient(): LocationViewServiceClient
    {
        return new LocationViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ManagedPlacementViewServiceClient
     */
    public function getManagedPlacementViewServiceClient(): ManagedPlacementViewServiceClient
    {
        return new ManagedPlacementViewServiceClient($this->getGoogleAdsClientOptions());
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
     * @return MobileAppCategoryConstantServiceClient
     */
    public function getMobileAppCategoryConstantServiceClient(): MobileAppCategoryConstantServiceClient
    {
        return new MobileAppCategoryConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return MobileDeviceConstantServiceClient
     */
    public function getMobileDeviceConstantServiceClient(): MobileDeviceConstantServiceClient
    {
        return new MobileDeviceConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return OfflineUserDataJobServiceClient
     */
    public function getOfflineUserDataJobServiceClient(): OfflineUserDataJobServiceClient
    {
        return new OfflineUserDataJobServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return OperatingSystemVersionConstantServiceClient
     */
    public function getOperatingSystemVersionConstantServiceClient(): OperatingSystemVersionConstantServiceClient
    {
        return new OperatingSystemVersionConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return PaidOrganicSearchTermViewServiceClient
     */
    public function getPaidOrganicSearchTermViewServiceClient(): PaidOrganicSearchTermViewServiceClient
    {
        return new PaidOrganicSearchTermViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ParentalStatusViewServiceClient
     */
    public function getParentalStatusViewServiceClient(): ParentalStatusViewServiceClient
    {
        return new ParentalStatusViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return PaymentsAccountServiceClient
     */
    public function getPaymentsAccountServiceClient(): PaymentsAccountServiceClient
    {
        return new PaymentsAccountServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ProductBiddingCategoryConstantServiceClient
     */
    public function getProductBiddingCategoryConstantServiceClient(): ProductBiddingCategoryConstantServiceClient
    {
        return new ProductBiddingCategoryConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ProductGroupViewServiceClient
     */
    public function getProductGroupViewServiceClient(): ProductGroupViewServiceClient
    {
        return new ProductGroupViewServiceClient($this->getGoogleAdsClientOptions());
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
     * @return SearchTermViewServiceClient
     */
    public function getSearchTermViewServiceClient(): SearchTermViewServiceClient
    {
        return new SearchTermViewServiceClient($this->getGoogleAdsClientOptions());
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
     * @return ShoppingPerformanceViewServiceClient
     */
    public function getShoppingPerformanceViewServiceClient(): ShoppingPerformanceViewServiceClient
    {
        return new ShoppingPerformanceViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return SmartCampaignSearchTermViewServiceClient
     */
    public function getSmartCampaignSearchTermViewServiceClient(): SmartCampaignSearchTermViewServiceClient
    {
        return new SmartCampaignSearchTermViewServiceClient($this->getGoogleAdsClientOptions());
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
     * @return TopicConstantServiceClient
     */
    public function getTopicConstantServiceClient(): TopicConstantServiceClient
    {
        return new TopicConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return TopicViewServiceClient
     */
    public function getTopicViewServiceClient(): TopicViewServiceClient
    {
        return new TopicViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return UserDataServiceClient
     */
    public function getUserDataServiceClient(): UserDataServiceClient
    {
        return new UserDataServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return UserInterestServiceClient
     */
    public function getUserInterestServiceClient(): UserInterestServiceClient
    {
        return new UserInterestServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return UserListServiceClient
     */
    public function getUserListServiceClient(): UserListServiceClient
    {
        return new UserListServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return UserLocationViewServiceClient
     */
    public function getUserLocationViewServiceClient(): UserLocationViewServiceClient
    {
        return new UserLocationViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return VideoServiceClient
     */
    public function getVideoServiceClient(): VideoServiceClient
    {
        return new VideoServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return WebpageViewServiceClient
     */
    public function getWebpageViewServiceClient(): WebpageViewServiceClient
    {
        return new WebpageViewServiceClient($this->getGoogleAdsClientOptions());
    }
}
