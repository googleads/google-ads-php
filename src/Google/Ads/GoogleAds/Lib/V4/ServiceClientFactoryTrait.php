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

namespace Google\Ads\GoogleAds\Lib\V4;

use Google\Ads\GoogleAds\Lib\ConfigurationTrait;
use Google\Ads\GoogleAds\V4\Services\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V4\Services\AccountBudgetServiceClient;
use Google\Ads\GoogleAds\V4\Services\AccountLinkServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdGroupAudienceViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdGroupCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdGroupExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdGroupFeedServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdGroupSimulationServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdParameterServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdScheduleViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\AdServiceClient;
use Google\Ads\GoogleAds\V4\Services\AgeRangeViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\AssetServiceClient;
use Google\Ads\GoogleAds\V4\Services\BatchJobServiceClient;
use Google\Ads\GoogleAds\V4\Services\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V4\Services\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V4\Services\CampaignAudienceViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V4\Services\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V4\Services\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V4\Services\CampaignCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V4\Services\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V4\Services\CampaignExperimentServiceClient;
use Google\Ads\GoogleAds\V4\Services\CampaignExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V4\Services\CampaignFeedServiceClient;
use Google\Ads\GoogleAds\V4\Services\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V4\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V4\Services\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V4\Services\CarrierConstantServiceClient;
use Google\Ads\GoogleAds\V4\Services\ChangeStatusServiceClient;
use Google\Ads\GoogleAds\V4\Services\ClickViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V4\Services\ConversionAdjustmentUploadServiceClient;
use Google\Ads\GoogleAds\V4\Services\ConversionUploadServiceClient;
use Google\Ads\GoogleAds\V4\Services\CurrencyConstantServiceClient;
use Google\Ads\GoogleAds\V4\Services\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V4\Services\CustomerClientServiceClient;
use Google\Ads\GoogleAds\V4\Services\CustomerExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V4\Services\CustomerFeedServiceClient;
use Google\Ads\GoogleAds\V4\Services\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V4\Services\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V4\Services\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V4\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V4\Services\CustomInterestServiceClient;
use Google\Ads\GoogleAds\V4\Services\DetailPlacementViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\DisplayKeywordViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\DomainCategoryServiceClient;
use Google\Ads\GoogleAds\V4\Services\DynamicSearchAdsSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\ExpandedLandingPageViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\ExtensionFeedItemServiceClient;
use Google\Ads\GoogleAds\V4\Services\FeedItemServiceClient;
use Google\Ads\GoogleAds\V4\Services\FeedItemTargetServiceClient;
use Google\Ads\GoogleAds\V4\Services\FeedMappingServiceClient;
use Google\Ads\GoogleAds\V4\Services\FeedPlaceholderViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\FeedServiceClient;
use Google\Ads\GoogleAds\V4\Services\GenderViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\GeographicViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V4\Services\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V4\Services\GoogleAdsServiceClient;
use Google\Ads\GoogleAds\V4\Services\GroupPlacementViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\HotelGroupViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\HotelPerformanceViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\IncomeRangeViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\InvoiceServiceClient;
use Google\Ads\GoogleAds\V4\Services\KeywordPlanAdGroupKeywordServiceClient;
use Google\Ads\GoogleAds\V4\Services\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V4\Services\KeywordPlanCampaignKeywordServiceClient;
use Google\Ads\GoogleAds\V4\Services\KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V4\Services\KeywordPlanIdeaServiceClient;
use Google\Ads\GoogleAds\V4\Services\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V4\Services\KeywordViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\LabelServiceClient;
use Google\Ads\GoogleAds\V4\Services\LandingPageViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\LanguageConstantServiceClient;
use Google\Ads\GoogleAds\V4\Services\LocationViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\ManagedPlacementViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\MediaFileServiceClient;
use Google\Ads\GoogleAds\V4\Services\MerchantCenterLinkServiceClient;
use Google\Ads\GoogleAds\V4\Services\MobileAppCategoryConstantServiceClient;
use Google\Ads\GoogleAds\V4\Services\MobileDeviceConstantServiceClient;
use Google\Ads\GoogleAds\V4\Services\OfflineUserDataJobServiceClient;
use Google\Ads\GoogleAds\V4\Services\OperatingSystemVersionConstantServiceClient;
use Google\Ads\GoogleAds\V4\Services\PaidOrganicSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\ParentalStatusViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\PaymentsAccountServiceClient;
use Google\Ads\GoogleAds\V4\Services\ProductBiddingCategoryConstantServiceClient;
use Google\Ads\GoogleAds\V4\Services\ProductGroupViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\ReachPlanServiceClient;
use Google\Ads\GoogleAds\V4\Services\RecommendationServiceClient;
use Google\Ads\GoogleAds\V4\Services\RemarketingActionServiceClient;
use Google\Ads\GoogleAds\V4\Services\SearchTermViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V4\Services\SharedSetServiceClient;
use Google\Ads\GoogleAds\V4\Services\ShoppingPerformanceViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\ThirdPartyAppAnalyticsLinkServiceClient;
use Google\Ads\GoogleAds\V4\Services\TopicConstantServiceClient;
use Google\Ads\GoogleAds\V4\Services\TopicViewServiceClient;
use Google\Ads\GoogleAds\V4\Services\UserDataServiceClient;
use Google\Ads\GoogleAds\V4\Services\UserInterestServiceClient;
use Google\Ads\GoogleAds\V4\Services\UserListServiceClient;
use Google\Ads\GoogleAds\V4\Services\VideoServiceClient;

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
    public function getGoogleAdsClientOptions()
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
        $clientOptions['transportConfig'] = [
            'grpc' => [
                'stubOpts' => [
                    // Inbound headers may exceed default (8kb) max header size.
                    // Sets max header size to 16MB, which should be more than necessary.
                    'grpc.max_metadata_size' => 16 * 1024 * 1024,
                    // Sets max response size to 64MB, since large responses will often exceed the
                    // default (4MB).
                    'grpc.max_receive_message_length' => 64 * 1024 * 1024
                ]
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
            $clientOptions['transportConfig']['grpc'] += [
                'interceptors' => [$googleAdsLoggingInterceptor]
            ];
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
     * @return AccountBudgetProposalServiceClient
     */
    public function getAccountBudgetProposalServiceClient()
    {
        return new AccountBudgetProposalServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AccountBudgetServiceClient
     */
    public function getAccountBudgetServiceClient()
    {
        return new AccountBudgetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AccountLinkServiceClient
     */
    public function getAccountLinkServiceClient()
    {
        return new AccountLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupAdServiceClient
     */
    public function getAdGroupAdServiceClient()
    {
        return new AdGroupAdServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupAdLabelServiceClient
     */
    public function getAdGroupAdLabelServiceClient()
    {
        return new AdGroupAdLabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupAudienceViewServiceClient
     */
    public function getAdGroupAudienceViewServiceClient()
    {
        return new AdGroupAudienceViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupBidModifierServiceClient
     */
    public function getAdGroupBidModifierServiceClient()
    {
        return new AdGroupBidModifierServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupCriterionLabelServiceClient
     */
    public function getAdGroupCriterionLabelServiceClient()
    {
        return new AdGroupCriterionLabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupCriterionServiceClient
     */
    public function getAdGroupCriterionServiceClient()
    {
        return new AdGroupCriterionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupCriterionSimulationServiceClient
     */
    public function getAdGroupCriterionSimulationServiceClient()
    {
        return new AdGroupCriterionSimulationServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupExtensionSettingServiceClient
     */
    public function getAdGroupExtensionSettingServiceClient()
    {
        return new AdGroupExtensionSettingServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupFeedServiceClient
     */
    public function getAdGroupFeedServiceClient()
    {
        return new AdGroupFeedServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupLabelServiceClient
     */
    public function getAdGroupLabelServiceClient()
    {
        return new AdGroupLabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupServiceClient
     */
    public function getAdGroupServiceClient()
    {
        return new AdGroupServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdGroupSimulationServiceClient
     */
    public function getAdGroupSimulationServiceClient()
    {
        return new AdGroupSimulationServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdParameterServiceClient
     */
    public function getAdParameterServiceClient()
    {
        return new AdParameterServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdScheduleViewServiceClient
     */
    public function getAdScheduleViewServiceClient()
    {
        return new AdScheduleViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AdServiceClient
     */
    public function getAdServiceClient()
    {
        return new AdServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AgeRangeViewServiceClient
     */
    public function getAgeRangeViewServiceClient()
    {
        return new AgeRangeViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return AssetServiceClient
     */
    public function getAssetServiceClient()
    {
        return new AssetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return BatchJobServiceClient
     */
    public function getBatchJobServiceClient()
    {
        return new BatchJobServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return BiddingStrategyServiceClient
     */
    public function getBiddingStrategyServiceClient()
    {
        return new BiddingStrategyServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return BillingSetupServiceClient
     */
    public function getBillingSetupServiceClient()
    {
        return new BillingSetupServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignAudienceViewServiceClient
     */
    public function getCampaignAudienceViewServiceClient()
    {
        return new CampaignAudienceViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignBidModifierServiceClient
     */
    public function getCampaignBidModifierServiceClient()
    {
        return new CampaignBidModifierServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignBudgetServiceClient
     */
    public function getCampaignBudgetServiceClient()
    {
        return new CampaignBudgetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignCriterionServiceClient
     */
    public function getCampaignCriterionServiceClient()
    {
        return new CampaignCriterionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignCriterionSimulationServiceClient
     */
    public function getCampaignCriterionSimulationServiceClient()
    {
        return new CampaignCriterionSimulationServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignDraftServiceClient
     */
    public function getCampaignDraftServiceClient()
    {
        return new CampaignDraftServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignExperimentServiceClient
     */
    public function getCampaignExperimentServiceClient()
    {
        return new CampaignExperimentServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignExtensionSettingServiceClient
     */
    public function getCampaignExtensionSettingServiceClient()
    {
        return new CampaignExtensionSettingServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignFeedServiceClient
     */
    public function getCampaignFeedServiceClient()
    {
        return new CampaignFeedServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignLabelServiceClient
     */
    public function getCampaignLabelServiceClient()
    {
        return new CampaignLabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignServiceClient
     */
    public function getCampaignServiceClient()
    {
        return new CampaignServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CampaignSharedSetServiceClient
     */
    public function getCampaignSharedSetServiceClient()
    {
        return new CampaignSharedSetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CarrierConstantServiceClient
     */
    public function getCarrierConstantServiceClient()
    {
        return new CarrierConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ChangeStatusServiceClient
     */
    public function getChangeStatusServiceClient()
    {
        return new ChangeStatusServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ClickViewServiceClient
     */
    public function getClickViewServiceClient()
    {
        return new ClickViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ConversionActionServiceClient
     */
    public function getConversionActionServiceClient()
    {
        return new ConversionActionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ConversionAdjustmentUploadServiceClient
     */
    public function getConversionAdjustmentUploadServiceClient()
    {
        return new ConversionAdjustmentUploadServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ConversionUploadServiceClient
     */
    public function getConversionUploadServiceClient()
    {
        return new ConversionUploadServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CurrencyConstantServiceClient
     */
    public function getCurrencyConstantServiceClient()
    {
        return new CurrencyConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerClientLinkServiceClient
     */
    public function getCustomerClientLinkServiceClient()
    {
        return new CustomerClientLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerClientServiceClient
     */
    public function getCustomerClientServiceClient()
    {
        return new CustomerClientServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerExtensionSettingServiceClient
     */
    public function getCustomerExtensionSettingServiceClient()
    {
        return new CustomerExtensionSettingServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerFeedServiceClient
     */
    public function getCustomerFeedServiceClient()
    {
        return new CustomerFeedServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerLabelServiceClient
     */
    public function getCustomerLabelServiceClient()
    {
        return new CustomerLabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerManagerLinkServiceClient
     */
    public function getCustomerManagerLinkServiceClient()
    {
        return new CustomerManagerLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerNegativeCriterionServiceClient
     */
    public function getCustomerNegativeCriterionServiceClient()
    {
        return new CustomerNegativeCriterionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomerServiceClient
     */
    public function getCustomerServiceClient()
    {
        return new CustomerServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return CustomInterestServiceClient
     */
    public function getCustomInterestServiceClient()
    {
        return new CustomInterestServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return DisplayKeywordViewServiceClient
     */
    public function getDisplayKeywordViewServiceClient()
    {
        return new DisplayKeywordViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return DetailPlacementViewServiceClient
     */
    public function getDetailPlacementViewServiceClient()
    {
        return new DetailPlacementViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return DomainCategoryServiceClient
     */
    public function getDomainCategoryServiceClient()
    {
        return new DomainCategoryServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return DynamicSearchAdsSearchTermViewServiceClient
     */
    public function getDynamicSearchAdsSearchTermViewServiceClient()
    {
        return new DynamicSearchAdsSearchTermViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ExtensionFeedItemServiceClient
     */
    public function getExtensionFeedItemServiceClient()
    {
        return new ExtensionFeedItemServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ExpandedLandingPageViewServiceClient
     */
    public function getExpandedLandingPageViewServiceClient()
    {
        return new ExpandedLandingPageViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return FeedItemServiceClient
     */
    public function getFeedItemServiceClient()
    {
        return new FeedItemServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return FeedItemTargetServiceClient
     */
    public function getFeedItemTargetServiceClient()
    {
        return new FeedItemTargetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return FeedMappingServiceClient
     */
    public function getFeedMappingServiceClient()
    {
        return new FeedMappingServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return FeedPlaceholderViewServiceClient
     */
    public function getFeedPlaceholderViewServiceClient()
    {
        return new FeedPlaceholderViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return FeedServiceClient
     */
    public function getFeedServiceClient()
    {
        return new FeedServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GenderViewServiceClient
     */
    public function getGenderViewServiceClient()
    {
        return new GenderViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GeographicViewServiceClient
     */
    public function getGeographicViewServiceClient()
    {
        return new GeographicViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GeoTargetConstantServiceClient
     */
    public function getGeoTargetConstantServiceClient()
    {
        return new GeoTargetConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GoogleAdsFieldServiceClient
     */
    public function getGoogleAdsFieldServiceClient()
    {
        return new GoogleAdsFieldServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GoogleAdsServiceClient
     */
    public function getGoogleAdsServiceClient()
    {
        return new GoogleAdsServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return HotelPerformanceViewServiceClient
     */
    public function getHotelPerformanceViewServiceClient()
    {
        return new HotelPerformanceViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return IncomeRangeViewServiceClient
     */
    public function getIncomeRangeViewServiceClient()
    {
        return new IncomeRangeViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return InvoiceServiceClient
     */
    public function getInvoiceServiceClient()
    {
        return new InvoiceServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return GroupPlacementViewServiceClient
     */
    public function getGroupPlacementViewServiceClient()
    {
        return new GroupPlacementViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return HotelGroupViewServiceClient
     */
    public function getHotelGroupViewServiceClient()
    {
        return new HotelGroupViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordPlanAdGroupServiceClient
     */
    public function getKeywordPlanAdGroupServiceClient()
    {
        return new KeywordPlanAdGroupServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordPlanAdGroupKeywordServiceClient
     */
    public function getKeywordPlanAdGroupKeywordServiceClient()
    {
        return new KeywordPlanAdGroupKeywordServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordPlanCampaignServiceClient
     */
    public function getKeywordPlanCampaignServiceClient()
    {
        return new KeywordPlanCampaignServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordPlanCampaignKeywordServiceClient
     */
    public function getKeywordPlanCampaignKeywordServiceClient()
    {
        return new KeywordPlanCampaignKeywordServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordPlanIdeaServiceClient
     */
    public function getKeywordPlanIdeaServiceClient()
    {
        return new KeywordPlanIdeaServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordPlanServiceClient
     */
    public function getKeywordPlanServiceClient()
    {
        return new KeywordPlanServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return KeywordViewServiceClient
     */
    public function getKeywordViewServiceClient()
    {
        return new KeywordViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return LabelServiceClient
     */
    public function getLabelServiceClient()
    {
        return new LabelServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return LandingPageViewServiceClient
     */
    public function getLandingPageViewServiceClient()
    {
        return new LandingPageViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return LanguageConstantServiceClient
     */
    public function getLanguageConstantServiceClient()
    {
        return new LanguageConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return LocationViewServiceClient
     */
    public function getLocationViewServiceClient()
    {
        return new LocationViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ManagedPlacementViewServiceClient
     */
    public function getManagedPlacementViewServiceClient()
    {
        return new ManagedPlacementViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return MediaFileServiceClient
     */
    public function getMediaFileServiceClient()
    {
        return new MediaFileServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return MerchantCenterLinkServiceClient
     */
    public function getMerchantCenterLinkServiceClient()
    {
        return new MerchantCenterLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return MobileAppCategoryConstantServiceClient
     */
    public function getMobileAppCategoryConstantServiceClient()
    {
        return new MobileAppCategoryConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return MobileDeviceConstantServiceClient
     */
    public function getMobileDeviceConstantServiceClient()
    {
        return new MobileDeviceConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return OfflineUserDataJobServiceClient
     */
    public function getOfflineUserDataJobServiceClient()
    {
        return new OfflineUserDataJobServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return OperatingSystemVersionConstantServiceClient
     */
    public function getOperatingSystemVersionConstantServiceClient()
    {
        return new OperatingSystemVersionConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ParentalStatusViewServiceClient
     */
    public function getParentalStatusViewServiceClient()
    {
        return new ParentalStatusViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return PaymentsAccountServiceClient
     */
    public function getPaymentsAccountServiceClient()
    {
        return new PaymentsAccountServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ProductBiddingCategoryConstantServiceClient
     */
    public function getProductBiddingCategoryConstantServiceClient()
    {
        return new ProductBiddingCategoryConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return PaidOrganicSearchTermViewServiceClient
     */
    public function getPaidOrganicSearchTermViewServiceClient()
    {
        return new PaidOrganicSearchTermViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ProductGroupViewServiceClient
     */
    public function getProductGroupViewServiceClient()
    {
        return new ProductGroupViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ReachPlanServiceClient
     */
    public function getReachPlanServiceClient()
    {
        return new ReachPlanServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return RecommendationServiceClient
     */
    public function getRecommendationServiceClient()
    {
        return new RecommendationServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return RemarketingActionServiceClient
     */
    public function getRemarketingActionServiceClient()
    {
        return new RemarketingActionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return SearchTermViewServiceClient
     */
    public function getSearchTermViewServiceClient()
    {
        return new SearchTermViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return SharedCriterionServiceClient
     */
    public function getSharedCriterionServiceClient()
    {
        return new SharedCriterionServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return SharedSetServiceClient
     */
    public function getSharedSetServiceClient()
    {
        return new SharedSetServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ShoppingPerformanceViewServiceClient
     */
    public function getShoppingPerformanceViewServiceClient()
    {
        return new ShoppingPerformanceViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return ThirdPartyAppAnalyticsLinkServiceClient
     */
    public function getThirdPartyAppAnalyticsLinkServiceClient()
    {
        return new ThirdPartyAppAnalyticsLinkServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return TopicViewServiceClient
     */
    public function getTopicViewServiceClient()
    {
        return new TopicViewServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return TopicConstantServiceClient
     */
    public function getTopicConstantServiceClient()
    {
        return new TopicConstantServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return UserDataServiceClient
     */
    public function getUserDataServiceClient()
    {
        return new UserDataServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return UserInterestServiceClient
     */
    public function getUserInterestServiceClient()
    {
        return new UserInterestServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return UserListServiceClient
     */
    public function getUserListServiceClient()
    {
        return new UserListServiceClient($this->getGoogleAdsClientOptions());
    }

    /**
     * @return VideoServiceClient
     */
    public function getVideoServiceClient()
    {
        return new VideoServiceClient($this->getGoogleAdsClientOptions());
    }
}
