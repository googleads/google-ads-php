<?php

/**
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

namespace Google\Ads\GoogleAds\Lib\V2;

use Google\Ads\GoogleAds\V2\Services\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V2\Services\AccountBudgetServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdGroupAudienceViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdGroupCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdGroupExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdGroupFeedServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdGroupSimulationServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdParameterServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdScheduleViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\AdServiceClient;
use Google\Ads\GoogleAds\V2\Services\AgeRangeViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\AssetServiceClient;
use Google\Ads\GoogleAds\V2\Services\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V2\Services\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V2\Services\CampaignAudienceViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V2\Services\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V2\Services\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V2\Services\CampaignCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V2\Services\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V2\Services\CampaignExperimentServiceClient;
use Google\Ads\GoogleAds\V2\Services\CampaignExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V2\Services\CampaignFeedServiceClient;
use Google\Ads\GoogleAds\V2\Services\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V2\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V2\Services\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V2\Services\CarrierConstantServiceClient;
use Google\Ads\GoogleAds\V2\Services\ChangeStatusServiceClient;
use Google\Ads\GoogleAds\V2\Services\ClickViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V2\Services\ConversionAdjustmentUploadServiceClient;
use Google\Ads\GoogleAds\V2\Services\ConversionUploadServiceClient;
use Google\Ads\GoogleAds\V2\Services\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V2\Services\CustomerClientServiceClient;
use Google\Ads\GoogleAds\V2\Services\CustomerExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V2\Services\CustomerFeedServiceClient;
use Google\Ads\GoogleAds\V2\Services\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V2\Services\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V2\Services\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V2\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V2\Services\CustomInterestServiceClient;
use Google\Ads\GoogleAds\V2\Services\DetailPlacementViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\DisplayKeywordViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\DomainCategoryServiceClient;
use Google\Ads\GoogleAds\V2\Services\DynamicSearchAdsSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\ExpandedLandingPageViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\ExtensionFeedItemServiceClient;
use Google\Ads\GoogleAds\V2\Services\FeedItemServiceClient;
use Google\Ads\GoogleAds\V2\Services\FeedItemTargetServiceClient;
use Google\Ads\GoogleAds\V2\Services\FeedMappingServiceClient;
use Google\Ads\GoogleAds\V2\Services\FeedPlaceholderViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\FeedServiceClient;
use Google\Ads\GoogleAds\V2\Services\GenderViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\GeographicViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V2\Services\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V2\Services\GoogleAdsServiceClient;
use Google\Ads\GoogleAds\V2\Services\GroupPlacementViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\HotelGroupViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\HotelPerformanceViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\InvoiceServiceClient;
use Google\Ads\GoogleAds\V2\Services\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V2\Services\KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V2\Services\KeywordPlanIdeaServiceClient;
use Google\Ads\GoogleAds\V2\Services\KeywordPlanKeywordServiceClient;
use Google\Ads\GoogleAds\V2\Services\KeywordPlanNegativeKeywordServiceClient;
use Google\Ads\GoogleAds\V2\Services\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V2\Services\KeywordViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\LabelServiceClient;
use Google\Ads\GoogleAds\V2\Services\LandingPageViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\LanguageConstantServiceClient;
use Google\Ads\GoogleAds\V2\Services\LocationViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\ManagedPlacementViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\MediaFileServiceClient;
use Google\Ads\GoogleAds\V2\Services\MerchantCenterLinkServiceClient;
use Google\Ads\GoogleAds\V2\Services\MobileAppCategoryConstantServiceClient;
use Google\Ads\GoogleAds\V2\Services\MobileDeviceConstantServiceClient;
use Google\Ads\GoogleAds\V2\Services\MutateJobServiceClient;
use Google\Ads\GoogleAds\V2\Services\OperatingSystemVersionConstantServiceClient;
use Google\Ads\GoogleAds\V2\Services\PaidOrganicSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\ParentalStatusViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\PaymentsAccountServiceClient;
use Google\Ads\GoogleAds\V2\Services\ProductBiddingCategoryConstantServiceClient;
use Google\Ads\GoogleAds\V2\Services\ProductGroupViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\ReachPlanServiceClient;
use Google\Ads\GoogleAds\V2\Services\RecommendationServiceClient;
use Google\Ads\GoogleAds\V2\Services\RemarketingActionServiceClient;
use Google\Ads\GoogleAds\V2\Services\SearchTermViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V2\Services\SharedSetServiceClient;
use Google\Ads\GoogleAds\V2\Services\ShoppingPerformanceViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\TopicConstantServiceClient;
use Google\Ads\GoogleAds\V2\Services\TopicViewServiceClient;
use Google\Ads\GoogleAds\V2\Services\UserInterestServiceClient;
use Google\Ads\GoogleAds\V2\Services\UserListServiceClient;
use Google\Ads\GoogleAds\V2\Services\VideoServiceClient;
use Google\Auth\FetchAuthTokenInterface;
use Monolog\Handler\NullHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `ServiceClientFactoryTrait`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\V2\ServiceClientFactoryTrait
 * @small
 */
class ServiceClientFactoryTraitTest extends TestCase
{
    private static $DEVELOPER_TOKEN = 'ABcdeFGH93KL-NOPQ_STUv';
    private static $LOGIN_CUSTOMER_ID = '1234567890';
    private static $PROXY = 'http://localhost:8080';

    /** @var GoogleAdsClient $googleAdsClient */
    private $googleAdsClient;

    /**
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    protected function setUp()
    {
        $googleAdsClientBuilder = new GoogleAdsClientBuilder();
        $fetchAuthTokenInterfaceMock = $this
            ->getMockBuilder(FetchAuthTokenInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->googleAdsClient = $googleAdsClientBuilder
            ->withOAuth2Credential($fetchAuthTokenInterfaceMock)
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withLoginCustomerId(self::$LOGIN_CUSTOMER_ID)
            ->withLogger(new Logger('', [new NullHandler()]))
            ->withProxy(self::$PROXY)
            ->build();
    }

    public function testGetAccountBudgetProposalServiceClient()
    {
        $this->assertInstanceOf(
            AccountBudgetProposalServiceClient::class,
            $this->googleAdsClient->getAccountBudgetProposalServiceClient()
        );
    }

    public function testGetAccountBudgetServiceClient()
    {
        $this->assertInstanceOf(
            AccountBudgetServiceClient::class,
            $this->googleAdsClient->getAccountBudgetServiceClient()
        );
    }

    public function testGetAdGroupAdLabelServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupAdLabelServiceClient::class,
            $this->googleAdsClient->getAdGroupAdLabelServiceClient()
        );
    }

    public function testGetAdGroupAdServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupAdServiceClient::class,
            $this->googleAdsClient->getAdGroupAdServiceClient()
        );
    }

    public function testGetAdGroupAudienceViewServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupAudienceViewServiceClient::class,
            $this->googleAdsClient->getAdGroupAudienceViewServiceClient()
        );
    }

    public function testGetAdGroupBidModifierServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupBidModifierServiceClient::class,
            $this->googleAdsClient->getAdGroupBidModifierServiceClient()
        );
    }

    public function testGetAdGroupCriterionLabelServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupCriterionLabelServiceClient::class,
            $this->googleAdsClient->getAdGroupCriterionLabelServiceClient()
        );
    }

    public function testGetAdGroupCriterionServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupCriterionServiceClient::class,
            $this->googleAdsClient->getAdGroupCriterionServiceClient()
        );
    }

    public function testGetAdGroupCriterionSimulationServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupCriterionSimulationServiceClient::class,
            $this->googleAdsClient->getAdGroupCriterionSimulationServiceClient()
        );
    }

    public function testGetAdGroupExtensionSettingServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupExtensionSettingServiceClient::class,
            $this->googleAdsClient->getAdGroupExtensionSettingServiceClient()
        );
    }

    public function testGetAdGroupFeedServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupFeedServiceClient::class,
            $this->googleAdsClient->getAdGroupFeedServiceClient()
        );
    }

    public function testGetAdGroupLabelServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupLabelServiceClient::class,
            $this->googleAdsClient->getAdGroupLabelServiceClient()
        );
    }

    public function testGetAdGroupServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupServiceClient::class,
            $this->googleAdsClient->getAdGroupServiceClient()
        );
    }

    public function testGetAdGroupSimulationServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupSimulationServiceClient::class,
            $this->googleAdsClient->getAdGroupSimulationServiceClient()
        );
    }

    public function testGetAdParameterServiceClient()
    {
        $this->assertInstanceOf(
            AdParameterServiceClient::class,
            $this->googleAdsClient->getAdParameterServiceClient()
        );
    }

    public function testGetAdScheduleViewServiceClient()
    {
        $this->assertInstanceOf(
            AdScheduleViewServiceClient::class,
            $this->googleAdsClient->getAdScheduleViewServiceClient()
        );
    }

    public function testGetAdServiceClient()
    {
        $this->assertInstanceOf(
            AdServiceClient::class,
            $this->googleAdsClient->getAdServiceClient()
        );
    }

    public function testGetAgeRangeViewServiceClient()
    {
        $this->assertInstanceOf(
            AgeRangeViewServiceClient::class,
            $this->googleAdsClient->getAgeRangeViewServiceClient()
        );
    }

    public function testGetAssetServiceClient()
    {
        $this->assertInstanceOf(
            AssetServiceClient::class,
            $this->googleAdsClient->getAssetServiceClient()
        );
    }

    public function testGetBiddingStrategyServiceClient()
    {
        $this->assertInstanceOf(
            BiddingStrategyServiceClient::class,
            $this->googleAdsClient->getBiddingStrategyServiceClient()
        );
    }

    public function testGetBillingSetupServiceClient()
    {
        $this->assertInstanceOf(
            BillingSetupServiceClient::class,
            $this->googleAdsClient->getBillingSetupServiceClient()
        );
    }

    public function testGetCampaignAudienceViewServiceClient()
    {
        $this->assertInstanceOf(
            CampaignAudienceViewServiceClient::class,
            $this->googleAdsClient->getCampaignAudienceViewServiceClient()
        );
    }

    public function testGetCampaignBidModifierServiceClient()
    {
        $this->assertInstanceOf(
            CampaignBidModifierServiceClient::class,
            $this->googleAdsClient->getCampaignBidModifierServiceClient()
        );
    }

    public function testGetCampaignBudgetServiceClient()
    {
        $this->assertInstanceOf(
            CampaignBudgetServiceClient::class,
            $this->googleAdsClient->getCampaignBudgetServiceClient()
        );
    }

    public function testGetCampaignCriterionServiceClient()
    {
        $this->assertInstanceOf(
            CampaignCriterionServiceClient::class,
            $this->googleAdsClient->getCampaignCriterionServiceClient()
        );
    }

    public function testGetCampaignCriterionSimulationServiceClient()
    {
        $this->assertInstanceOf(
            CampaignCriterionSimulationServiceClient::class,
            $this->googleAdsClient->getCampaignCriterionSimulationServiceClient()
        );
    }

    public function testGetCampaignDraftServiceClient()
    {
        $this->assertInstanceOf(
            CampaignDraftServiceClient::class,
            $this->googleAdsClient->getCampaignDraftServiceClient()
        );
    }

    public function testGetCampaignExperimentServiceClient()
    {
        $this->assertInstanceOf(
            CampaignExperimentServiceClient::class,
            $this->googleAdsClient->getCampaignExperimentServiceClient()
        );
    }

    public function testGetCampaignExtensionSettingServiceClient()
    {
        $this->assertInstanceOf(
            CampaignExtensionSettingServiceClient::class,
            $this->googleAdsClient->getCampaignExtensionSettingServiceClient()
        );
    }

    public function testGetCampaignFeedServiceClient()
    {
        $this->assertInstanceOf(
            CampaignFeedServiceClient::class,
            $this->googleAdsClient->getCampaignFeedServiceClient()
        );
    }

    public function testGetCampaignLabelServiceClient()
    {
        $this->assertInstanceOf(
            CampaignLabelServiceClient::class,
            $this->googleAdsClient->getCampaignLabelServiceClient()
        );
    }

    public function testGetCampaignServiceClient()
    {
        $this->assertInstanceOf(
            CampaignServiceClient::class,
            $this->googleAdsClient->getCampaignServiceClient()
        );
    }

    public function testGetCampaignSharedSetServiceClient()
    {
        $this->assertInstanceOf(
            CampaignSharedSetServiceClient::class,
            $this->googleAdsClient->getCampaignSharedSetServiceClient()
        );
    }

    public function testGetCarrierConstantServiceClient()
    {
        $this->assertInstanceOf(
            CarrierConstantServiceClient::class,
            $this->googleAdsClient->getCarrierConstantServiceClient()
        );
    }

    public function testGetChangeStatusServiceClient()
    {
        $this->assertInstanceOf(
            ChangeStatusServiceClient::class,
            $this->googleAdsClient->getChangeStatusServiceClient()
        );
    }

    public function testGetClickViewServiceClient()
    {
        $this->assertInstanceOf(
            ClickViewServiceClient::class,
            $this->googleAdsClient->getClickViewServiceClient()
        );
    }

    public function testGetConversionActionServiceClient()
    {
        $this->assertInstanceOf(
            ConversionActionServiceClient::class,
            $this->googleAdsClient->getConversionActionServiceClient()
        );
    }

    public function testGetConversionAdjustmentUploadServiceClient()
    {
        $this->assertInstanceOf(
            ConversionAdjustmentUploadServiceClient::class,
            $this->googleAdsClient->getConversionAdjustmentUploadServiceClient()
        );
    }

    public function testGetConversionUploadServiceClient()
    {
        $this->assertInstanceOf(
            ConversionUploadServiceClient::class,
            $this->googleAdsClient->getConversionUploadServiceClient()
        );
    }

    public function testGetCustomerClientLinkServiceClient()
    {
        $this->assertInstanceOf(
            CustomerClientLinkServiceClient::class,
            $this->googleAdsClient->getCustomerClientLinkServiceClient()
        );
    }

    public function testGetCustomerClientServiceClient()
    {
        $this->assertInstanceOf(
            CustomerClientServiceClient::class,
            $this->googleAdsClient->getCustomerClientServiceClient()
        );
    }

    public function testGetCustomerExtensionSettingServiceClient()
    {
        $this->assertInstanceOf(
            CustomerExtensionSettingServiceClient::class,
            $this->googleAdsClient->getCustomerExtensionSettingServiceClient()
        );
    }

    public function testGetCustomerFeedServiceClient()
    {
        $this->assertInstanceOf(
            CustomerFeedServiceClient::class,
            $this->googleAdsClient->getCustomerFeedServiceClient()
        );
    }

    public function testGetCustomerLabelServiceClient()
    {
        $this->assertInstanceOf(
            CustomerLabelServiceClient::class,
            $this->googleAdsClient->getCustomerLabelServiceClient()
        );
    }

    public function testGetCustomerManagerLinkServiceClient()
    {
        $this->assertInstanceOf(
            CustomerManagerLinkServiceClient::class,
            $this->googleAdsClient->getCustomerManagerLinkServiceClient()
        );
    }

    public function testGetCustomerNegativeCriterionServiceClient()
    {
        $this->assertInstanceOf(
            CustomerNegativeCriterionServiceClient::class,
            $this->googleAdsClient->getCustomerNegativeCriterionServiceClient()
        );
    }

    public function testGetCustomerServiceClient()
    {
        $this->assertInstanceOf(
            CustomerServiceClient::class,
            $this->googleAdsClient->getCustomerServiceClient()
        );
    }

    public function testGetCustomInterestServiceClient()
    {
        $this->assertInstanceOf(
            CustomInterestServiceClient::class,
            $this->googleAdsClient->getCustomInterestServiceClient()
        );
    }

    public function testGetDetailPlacementViewServiceClient()
    {
        $this->assertInstanceOf(
            DetailPlacementViewServiceClient::class,
            $this->googleAdsClient->getDetailPlacementViewServiceClient()
        );
    }

    public function testGetDisplayKeywordViewServiceClient()
    {
        $this->assertInstanceOf(
            DisplayKeywordViewServiceClient::class,
            $this->googleAdsClient->getDisplayKeywordViewServiceClient()
        );
    }

    public function testGetDomainCategoryServiceClient()
    {
        $this->assertInstanceOf(
            DomainCategoryServiceClient::class,
            $this->googleAdsClient->getDomainCategoryServiceClient()
        );
    }

    public function testGetDynamicSearchAdsSearchTermViewServiceClient()
    {
        $this->assertInstanceOf(
            DynamicSearchAdsSearchTermViewServiceClient::class,
            $this->googleAdsClient->getDynamicSearchAdsSearchTermViewServiceClient()
        );
    }

    public function testGetExpandedLandingPageViewServiceClient()
    {
        $this->assertInstanceOf(
            ExpandedLandingPageViewServiceClient::class,
            $this->googleAdsClient->getExpandedLandingPageViewServiceClient()
        );
    }

    public function testGetExtensionFeedItemServiceClient()
    {
        $this->assertInstanceOf(
            ExtensionFeedItemServiceClient::class,
            $this->googleAdsClient->getExtensionFeedItemServiceClient()
        );
    }

    public function testGetFeedItemServiceClient()
    {
        $this->assertInstanceOf(
            FeedItemServiceClient::class,
            $this->googleAdsClient->getFeedItemServiceClient()
        );
    }

    public function testGetFeedItemTargetServiceClient()
    {
        $this->assertInstanceOf(
            FeedItemTargetServiceClient::class,
            $this->googleAdsClient->getFeedItemTargetServiceClient()
        );
    }

    public function testGetFeedMappingServiceClient()
    {
        $this->assertInstanceOf(
            FeedMappingServiceClient::class,
            $this->googleAdsClient->getFeedMappingServiceClient()
        );
    }

    public function testGetFeedPlaceholderViewServiceClient()
    {
        $this->assertInstanceOf(
            FeedPlaceholderViewServiceClient::class,
            $this->googleAdsClient->getFeedPlaceholderViewServiceClient()
        );
    }

    public function testGetFeedServiceClient()
    {
        $this->assertInstanceOf(
            FeedServiceClient::class,
            $this->googleAdsClient->getFeedServiceClient()
        );
    }

    public function testGetGenderViewServiceClient()
    {
        $this->assertInstanceOf(
            GenderViewServiceClient::class,
            $this->googleAdsClient->getGenderViewServiceClient()
        );
    }

    public function testGetGeographicViewServiceClient()
    {
        $this->assertInstanceOf(
            GeographicViewServiceClient::class,
            $this->googleAdsClient->getGeographicViewServiceClient()
        );
    }

    public function testGetGeoTargetConstantServiceClient()
    {
        $this->assertInstanceOf(
            GeoTargetConstantServiceClient::class,
            $this->googleAdsClient->getGeoTargetConstantServiceClient()
        );
    }

    public function testGetGoogleAdsFieldServiceClient()
    {
        $this->assertInstanceOf(
            GoogleAdsFieldServiceClient::class,
            $this->googleAdsClient->getGoogleAdsFieldServiceClient()
        );
    }

    public function testGetGoogleAdsServiceClient()
    {
        $this->assertInstanceOf(
            GoogleAdsServiceClient::class,
            $this->googleAdsClient->getGoogleAdsServiceClient()
        );
    }

    public function testGetGroupPlacementViewServiceClient()
    {
        $this->assertInstanceOf(
            GroupPlacementViewServiceClient::class,
            $this->googleAdsClient->getGroupPlacementViewServiceClient()
        );
    }

    public function testGetHotelGroupViewServiceClient()
    {
        $this->assertInstanceOf(
            HotelGroupViewServiceClient::class,
            $this->googleAdsClient->getHotelGroupViewServiceClient()
        );
    }

    public function testGetHotelPerformanceViewServiceClient()
    {
        $this->assertInstanceOf(
            HotelPerformanceViewServiceClient::class,
            $this->googleAdsClient->getHotelPerformanceViewServiceClient()
        );
    }

    public function testGetInvoiceServiceClient()
    {
        $this->assertInstanceOf(
            InvoiceServiceClient::class,
            $this->googleAdsClient->getInvoiceServiceClient()
        );
    }

    public function testGetKeywordPlanAdGroupServiceClient()
    {
        $this->assertInstanceOf(
            KeywordPlanAdGroupServiceClient::class,
            $this->googleAdsClient->getKeywordPlanAdGroupServiceClient()
        );
    }

    public function testGetKeywordPlanCampaignServiceClient()
    {
        $this->assertInstanceOf(
            KeywordPlanCampaignServiceClient::class,
            $this->googleAdsClient->getKeywordPlanCampaignServiceClient()
        );
    }

    public function testGetKeywordPlanIdeaServiceClient()
    {
        $this->assertInstanceOf(
            KeywordPlanIdeaServiceClient::class,
            $this->googleAdsClient->getKeywordPlanIdeaServiceClient()
        );
    }

    public function testGetKeywordPlanKeywordServiceClient()
    {
        $this->assertInstanceOf(
            KeywordPlanKeywordServiceClient::class,
            $this->googleAdsClient->getKeywordPlanKeywordServiceClient()
        );
    }

    public function testGetKeywordPlanNegativeKeywordServiceClient()
    {
        $this->assertInstanceOf(
            KeywordPlanNegativeKeywordServiceClient::class,
            $this->googleAdsClient->getKeywordPlanNegativeKeywordServiceClient()
        );
    }

    public function testGetKeywordPlanServiceClient()
    {
        $this->assertInstanceOf(
            KeywordPlanServiceClient::class,
            $this->googleAdsClient->getKeywordPlanServiceClient()
        );
    }

    public function testGetKeywordViewServiceClient()
    {
        $this->assertInstanceOf(
            KeywordViewServiceClient::class,
            $this->googleAdsClient->getKeywordViewServiceClient()
        );
    }

    public function testGetLabelServiceClient()
    {
        $this->assertInstanceOf(
            LabelServiceClient::class,
            $this->googleAdsClient->getLabelServiceClient()
        );
    }

    public function testGetLandingPageViewServiceClient()
    {
        $this->assertInstanceOf(
            LandingPageViewServiceClient::class,
            $this->googleAdsClient->getLandingPageViewServiceClient()
        );
    }

    public function testGetLanguageConstantServiceClient()
    {
        $this->assertInstanceOf(
            LanguageConstantServiceClient::class,
            $this->googleAdsClient->getLanguageConstantServiceClient()
        );
    }

    public function testGetLocationViewServiceClient()
    {
        $this->assertInstanceOf(
            LocationViewServiceClient::class,
            $this->googleAdsClient->getLocationViewServiceClient()
        );
    }

    public function testGetManagedPlacementViewServiceClient()
    {
        $this->assertInstanceOf(
            ManagedPlacementViewServiceClient::class,
            $this->googleAdsClient->getManagedPlacementViewServiceClient()
        );
    }

    public function testGetMediaFileServiceClient()
    {
        $this->assertInstanceOf(
            MediaFileServiceClient::class,
            $this->googleAdsClient->getMediaFileServiceClient()
        );
    }

    public function testGetMerchantCenterLinkServiceClient()
    {
        $this->assertInstanceOf(
            MerchantCenterLinkServiceClient::class,
            $this->googleAdsClient->getMerchantCenterLinkServiceClient()
        );
    }

    public function testGetMobileAppCategoryConstantServiceClient()
    {
        $this->assertInstanceOf(
            MobileAppCategoryConstantServiceClient::class,
            $this->googleAdsClient->getMobileAppCategoryConstantServiceClient()
        );
    }

    public function testGetMobileDeviceConstantServiceClient()
    {
        $this->assertInstanceOf(
            MobileDeviceConstantServiceClient::class,
            $this->googleAdsClient->getMobileDeviceConstantServiceClient()
        );
    }

    public function testGetMutateJobServiceClient()
    {
        $this->assertInstanceOf(
            MutateJobServiceClient::class,
            $this->googleAdsClient->getMutateJobServiceClient()
        );
    }

    public function testGetOperatingSystemVersionConstantServiceClient()
    {
        $this->assertInstanceOf(
            OperatingSystemVersionConstantServiceClient::class,
            $this->googleAdsClient->getOperatingSystemVersionConstantServiceClient()
        );
    }

    public function testGetPaidOrganicSearchTermViewServiceClient()
    {
        $this->assertInstanceOf(
            PaidOrganicSearchTermViewServiceClient::class,
            $this->googleAdsClient->getPaidOrganicSearchTermViewServiceClient()
        );
    }

    public function testGetParentalStatusViewServiceClient()
    {
        $this->assertInstanceOf(
            ParentalStatusViewServiceClient::class,
            $this->googleAdsClient->getParentalStatusViewServiceClient()
        );
    }

    public function testGetPaymentsAccountServiceClient()
    {
        $this->assertInstanceOf(
            PaymentsAccountServiceClient::class,
            $this->googleAdsClient->getPaymentsAccountServiceClient()
        );
    }

    public function testGetProductBiddingCategoryConstantServiceClient()
    {
        $this->assertInstanceOf(
            ProductBiddingCategoryConstantServiceClient::class,
            $this->googleAdsClient->getProductBiddingCategoryConstantServiceClient()
        );
    }

    public function testGetProductGroupViewServiceClient()
    {
        $this->assertInstanceOf(
            ProductGroupViewServiceClient::class,
            $this->googleAdsClient->getProductGroupViewServiceClient()
        );
    }

    public function testGetReachPlanServiceClient()
    {
        $this->assertInstanceOf(
            ReachPlanServiceClient::class,
            $this->googleAdsClient->getReachPlanServiceClient()
        );
    }

    public function testGetRecommendationServiceClient()
    {
        $this->assertInstanceOf(
            RecommendationServiceClient::class,
            $this->googleAdsClient->getRecommendationServiceClient()
        );
    }

    public function testGetRemarketingActionServiceClient()
    {
        $this->assertInstanceOf(
            RemarketingActionServiceClient::class,
            $this->googleAdsClient->getRemarketingActionServiceClient()
        );
    }

    public function testGetSearchTermViewServiceClient()
    {
        $this->assertInstanceOf(
            SearchTermViewServiceClient::class,
            $this->googleAdsClient->getSearchTermViewServiceClient()
        );
    }

    public function testGetSharedCriterionServiceClient()
    {
        $this->assertInstanceOf(
            SharedCriterionServiceClient::class,
            $this->googleAdsClient->getSharedCriterionServiceClient()
        );
    }

    public function testGetSharedSetServiceClient()
    {
        $this->assertInstanceOf(
            SharedSetServiceClient::class,
            $this->googleAdsClient->getSharedSetServiceClient()
        );
    }

    public function testGetShoppingPerformanceViewServiceClient()
    {
        $this->assertInstanceOf(
            ShoppingPerformanceViewServiceClient::class,
            $this->googleAdsClient->getShoppingPerformanceViewServiceClient()
        );
    }

    public function testGetTopicConstantServiceClient()
    {
        $this->assertInstanceOf(
            TopicConstantServiceClient::class,
            $this->googleAdsClient->getTopicConstantServiceClient()
        );
    }

    public function testGetTopicViewServiceClient()
    {
        $this->assertInstanceOf(
            TopicViewServiceClient::class,
            $this->googleAdsClient->getTopicViewServiceClient()
        );
    }

    public function testGetUserInterestServiceClient()
    {
        $this->assertInstanceOf(
            UserInterestServiceClient::class,
            $this->googleAdsClient->getUserInterestServiceClient()
        );
    }

    public function testGetUserListServiceClient()
    {
        $this->assertInstanceOf(
            UserListServiceClient::class,
            $this->googleAdsClient->getUserListServiceClient()
        );
    }

    public function testGetVideoServiceClient()
    {
        $this->assertInstanceOf(
            VideoServiceClient::class,
            $this->googleAdsClient->getVideoServiceClient()
        );
    }
}
