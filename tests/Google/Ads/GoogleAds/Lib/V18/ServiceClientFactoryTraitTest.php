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

namespace Google\Ads\GoogleAds\Lib\V18;

use Google\Ads\GoogleAds\V18\Services\Client\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AccountLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupAssetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupAssetSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupCriterionCustomizerServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupCustomizerServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupFeedServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdGroupServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdParameterServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AdServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetGroupAssetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetGroupListingGroupFilterServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetGroupServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetGroupSignalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetSetAssetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AssetSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AudienceInsightsServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\AudienceServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\BatchJobServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\BiddingDataExclusionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\BiddingSeasonalityAdjustmentServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\BrandSuggestionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignAssetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignAssetSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignConversionGoalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignCustomizerServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignFeedServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignGroupServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignLifecycleGoalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ContentCreatorInsightsServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ConversionAdjustmentUploadServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ConversionCustomVariableServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ConversionGoalCampaignConfigServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ConversionUploadServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ConversionValueRuleServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ConversionValueRuleSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomAudienceServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomConversionGoalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerAssetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerAssetSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerConversionGoalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerCustomizerServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerFeedServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerLifecycleGoalServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerSkAdNetworkConversionValueSchemaServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerUserAccessInvitationServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomerUserAccessServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomInterestServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\CustomizerAttributeServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\DataLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ExperimentArmServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ExperimentServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ExtensionFeedItemServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\FeedItemServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\FeedItemSetLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\FeedItemSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\FeedItemTargetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\FeedMappingServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\FeedServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\GoogleAdsServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\IdentityVerificationServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\InvoiceServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\KeywordPlanAdGroupKeywordServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\KeywordPlanCampaignKeywordServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\KeywordPlanIdeaServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\KeywordThemeConstantServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\LabelServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\LocalServicesLeadServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\OfflineUserDataJobServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\PaymentsAccountServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ProductLinkInvitationServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ProductLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ReachPlanServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\RecommendationServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\RecommendationSubscriptionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\RemarketingActionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ShareablePreviewServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\SharedSetServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\SmartCampaignSettingServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\SmartCampaignSuggestServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\ThirdPartyAppAnalyticsLinkServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\TravelAssetSuggestionServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\UserDataServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\UserListCustomerTypeServiceClient;
use Google\Ads\GoogleAds\V18\Services\Client\UserListServiceClient;
use Google\Auth\FetchAuthTokenInterface;
use Google\Auth\HttpHandler\HttpHandlerFactory;
use Monolog\Handler\NullHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `ServiceClientFactoryTrait`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\V18\ServiceClientFactoryTrait
 * @small
 */
class ServiceClientFactoryTraitTest extends TestCase
{
    private static $DEVELOPER_TOKEN = 'ABcdeFGH93KL-NOPQ_STUv';
    private static $LOGIN_CUSTOMER_ID = '1234567890';
    private static $PROXY = 'http://localhost:8080';
    private static $TRANSPORT = 'grpc';

    /** @var GoogleAdsClient $googleAdsClient */
    private $googleAdsClient;

    /**
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    protected function setUp(): void
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
            ->withTransport(self::$TRANSPORT)
            ->build();
    }

    public function testSetHttpHandler()
    {
        $httpHandler = HttpHandlerFactory::build();
        $fetchAuthTokenInterfaceMock = $this
            ->getMockBuilder(FetchAuthTokenInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->withOAuth2Credential($fetchAuthTokenInterfaceMock)
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withLoginCustomerId(self::$LOGIN_CUSTOMER_ID)
            ->withLogger(new Logger('', [new NullHandler()]))
            ->withHttpHandler($httpHandler)
            ->build();
        $this->assertSame(
            $httpHandler,
            $googleAdsClient->getGoogleAdsClientOptions()['transportConfig']['rest']['httpHandler']
        );
    }

    public function testGetAccountBudgetProposalServiceClient()
    {
        $this->assertInstanceOf(
            AccountBudgetProposalServiceClient::class,
            $this->googleAdsClient->getAccountBudgetProposalServiceClient()
        );
    }

    public function testGetAccountLinkServiceClient()
    {
        $this->assertInstanceOf(
            AccountLinkServiceClient::class,
            $this->googleAdsClient->getAccountLinkServiceClient()
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

    public function testGetAdGroupAssetServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupAssetServiceClient::class,
            $this->googleAdsClient->getAdGroupAssetServiceClient()
        );
    }

    public function testGetAdGroupAssetSetServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupAssetSetServiceClient::class,
            $this->googleAdsClient->getAdGroupAssetSetServiceClient()
        );
    }

    public function testGetAdGroupBidModifierServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupBidModifierServiceClient::class,
            $this->googleAdsClient->getAdGroupBidModifierServiceClient()
        );
    }

    public function testGetAdGroupCriterionCustomizerServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupCriterionCustomizerServiceClient::class,
            $this->googleAdsClient->getAdGroupCriterionCustomizerServiceClient()
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

    public function testGetAdGroupCustomizerServiceClient()
    {
        $this->assertInstanceOf(
            AdGroupCustomizerServiceClient::class,
            $this->googleAdsClient->getAdGroupCustomizerServiceClient()
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

    public function testGetAdParameterServiceClient()
    {
        $this->assertInstanceOf(
            AdParameterServiceClient::class,
            $this->googleAdsClient->getAdParameterServiceClient()
        );
    }

    public function testGetAdServiceClient()
    {
        $this->assertInstanceOf(
            AdServiceClient::class,
            $this->googleAdsClient->getAdServiceClient()
        );
    }

    public function testGetAssetGroupAssetServiceClient()
    {
        $this->assertInstanceOf(
            AssetGroupAssetServiceClient::class,
            $this->googleAdsClient->getAssetGroupAssetServiceClient()
        );
    }

    public function testGetAssetGroupListingGroupFilterServiceClient()
    {
        $this->assertInstanceOf(
            AssetGroupListingGroupFilterServiceClient::class,
            $this->googleAdsClient->getAssetGroupListingGroupFilterServiceClient()
        );
    }

    public function testGetAssetGroupServiceClient()
    {
        $this->assertInstanceOf(
            AssetGroupServiceClient::class,
            $this->googleAdsClient->getAssetGroupServiceClient()
        );
    }

    public function testGetAssetGroupSignalServiceClient()
    {
        $this->assertInstanceOf(
            AssetGroupSignalServiceClient::class,
            $this->googleAdsClient->getAssetGroupSignalServiceClient()
        );
    }

    public function testGetAssetServiceClient()
    {
        $this->assertInstanceOf(
            AssetServiceClient::class,
            $this->googleAdsClient->getAssetServiceClient()
        );
    }

    public function testGetAssetSetAssetServiceClient()
    {
        $this->assertInstanceOf(
            AssetSetAssetServiceClient::class,
            $this->googleAdsClient->getAssetSetAssetServiceClient()
        );
    }

    public function testGetAssetSetServiceClient()
    {
        $this->assertInstanceOf(
            AssetSetServiceClient::class,
            $this->googleAdsClient->getAssetSetServiceClient()
        );
    }

    public function testGetAudienceInsightsServiceClient()
    {
        $this->assertInstanceOf(
            AudienceInsightsServiceClient::class,
            $this->googleAdsClient->getAudienceInsightsServiceClient()
        );
    }

    public function testGetAudienceServiceClient()
    {
        $this->assertInstanceOf(
            AudienceServiceClient::class,
            $this->googleAdsClient->getAudienceServiceClient()
        );
    }

    public function testGetBatchJobServiceClient()
    {
        $this->assertInstanceOf(
            BatchJobServiceClient::class,
            $this->googleAdsClient->getBatchJobServiceClient()
        );
    }

    public function testGetBiddingDataExclusionServiceClient()
    {
        $this->assertInstanceOf(
            BiddingDataExclusionServiceClient::class,
            $this->googleAdsClient->getBiddingDataExclusionServiceClient()
        );
    }

    public function testGetBiddingSeasonalityAdjustmentServiceClient()
    {
        $this->assertInstanceOf(
            BiddingSeasonalityAdjustmentServiceClient::class,
            $this->googleAdsClient->getBiddingSeasonalityAdjustmentServiceClient()
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

    public function testGetBrandSuggestionServiceClient()
    {
        $this->assertInstanceOf(
            BrandSuggestionServiceClient::class,
            $this->googleAdsClient->getBrandSuggestionServiceClient()
        );
    }

    public function testGetCampaignAssetServiceClient()
    {
        $this->assertInstanceOf(
            CampaignAssetServiceClient::class,
            $this->googleAdsClient->getCampaignAssetServiceClient()
        );
    }

    public function testGetCampaignAssetSetServiceClient()
    {
        $this->assertInstanceOf(
            CampaignAssetSetServiceClient::class,
            $this->googleAdsClient->getCampaignAssetSetServiceClient()
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

    public function testGetCampaignConversionGoalServiceClient()
    {
        $this->assertInstanceOf(
            CampaignConversionGoalServiceClient::class,
            $this->googleAdsClient->getCampaignConversionGoalServiceClient()
        );
    }

    public function testGetCampaignCriterionServiceClient()
    {
        $this->assertInstanceOf(
            CampaignCriterionServiceClient::class,
            $this->googleAdsClient->getCampaignCriterionServiceClient()
        );
    }

    public function testGetCampaignCustomizerServiceClient()
    {
        $this->assertInstanceOf(
            CampaignCustomizerServiceClient::class,
            $this->googleAdsClient->getCampaignCustomizerServiceClient()
        );
    }

    public function testGetCampaignDraftServiceClient()
    {
        $this->assertInstanceOf(
            CampaignDraftServiceClient::class,
            $this->googleAdsClient->getCampaignDraftServiceClient()
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

    public function testGetCampaignGroupServiceClient()
    {
        $this->assertInstanceOf(
            CampaignGroupServiceClient::class,
            $this->googleAdsClient->getCampaignGroupServiceClient()
        );
    }

    public function testGetCampaignLabelServiceClient()
    {
        $this->assertInstanceOf(
            CampaignLabelServiceClient::class,
            $this->googleAdsClient->getCampaignLabelServiceClient()
        );
    }

    public function testGetCampaignLifecycleGoalServiceClient()
    {
        $this->assertInstanceOf(
            CampaignLifecycleGoalServiceClient::class,
            $this->googleAdsClient->getCampaignLifecycleGoalServiceClient()
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

    public function testGetContentCreatorInsightsServiceClient()
    {
        $this->assertInstanceOf(
            ContentCreatorInsightsServiceClient::class,
            $this->googleAdsClient->getContentCreatorInsightsServiceClient()
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

    public function testGetConversionCustomVariableServiceClient()
    {
        $this->assertInstanceOf(
            ConversionCustomVariableServiceClient::class,
            $this->googleAdsClient->getConversionCustomVariableServiceClient()
        );
    }

    public function testGetConversionGoalCampaignConfigServiceClient()
    {
        $this->assertInstanceOf(
            ConversionGoalCampaignConfigServiceClient::class,
            $this->googleAdsClient->getConversionGoalCampaignConfigServiceClient()
        );
    }

    public function testGetConversionUploadServiceClient()
    {
        $this->assertInstanceOf(
            ConversionUploadServiceClient::class,
            $this->googleAdsClient->getConversionUploadServiceClient()
        );
    }

    public function testGetConversionValueRuleServiceClient()
    {
        $this->assertInstanceOf(
            ConversionValueRuleServiceClient::class,
            $this->googleAdsClient->getConversionValueRuleServiceClient()
        );
    }

    public function testGetConversionValueRuleSetServiceClient()
    {
        $this->assertInstanceOf(
            ConversionValueRuleSetServiceClient::class,
            $this->googleAdsClient->getConversionValueRuleSetServiceClient()
        );
    }

    public function testGetCustomAudienceServiceClient()
    {
        $this->assertInstanceOf(
            CustomAudienceServiceClient::class,
            $this->googleAdsClient->getCustomAudienceServiceClient()
        );
    }

    public function testGetCustomConversionGoalServiceClient()
    {
        $this->assertInstanceOf(
            CustomConversionGoalServiceClient::class,
            $this->googleAdsClient->getCustomConversionGoalServiceClient()
        );
    }

    public function testGetCustomerAssetServiceClient()
    {
        $this->assertInstanceOf(
            CustomerAssetServiceClient::class,
            $this->googleAdsClient->getCustomerAssetServiceClient()
        );
    }

    public function testGetCustomerAssetSetServiceClient()
    {
        $this->assertInstanceOf(
            CustomerAssetSetServiceClient::class,
            $this->googleAdsClient->getCustomerAssetSetServiceClient()
        );
    }

    public function testGetCustomerClientLinkServiceClient()
    {
        $this->assertInstanceOf(
            CustomerClientLinkServiceClient::class,
            $this->googleAdsClient->getCustomerClientLinkServiceClient()
        );
    }

    public function testGetCustomerConversionGoalServiceClient()
    {
        $this->assertInstanceOf(
            CustomerConversionGoalServiceClient::class,
            $this->googleAdsClient->getCustomerConversionGoalServiceClient()
        );
    }

    public function testGetCustomerCustomizerServiceClient()
    {
        $this->assertInstanceOf(
            CustomerCustomizerServiceClient::class,
            $this->googleAdsClient->getCustomerCustomizerServiceClient()
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

    public function testGetCustomerLifecycleGoalServiceClient()
    {
        $this->assertInstanceOf(
            CustomerLifecycleGoalServiceClient::class,
            $this->googleAdsClient->getCustomerLifecycleGoalServiceClient()
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

    public function testGetCustomerSkAdNetworkConversionValueSchemaServiceClient()
    {
        $this->assertInstanceOf(
            CustomerSkAdNetworkConversionValueSchemaServiceClient::class,
            $this->googleAdsClient->getCustomerSkAdNetworkConversionValueSchemaServiceClient()
        );
    }

    public function testGetCustomerUserAccessInvitationServiceClient()
    {
        $this->assertInstanceOf(
            CustomerUserAccessInvitationServiceClient::class,
            $this->googleAdsClient->getCustomerUserAccessInvitationServiceClient()
        );
    }

    public function testGetCustomerUserAccessServiceClient()
    {
        $this->assertInstanceOf(
            CustomerUserAccessServiceClient::class,
            $this->googleAdsClient->getCustomerUserAccessServiceClient()
        );
    }

    public function testGetCustomInterestServiceClient()
    {
        $this->assertInstanceOf(
            CustomInterestServiceClient::class,
            $this->googleAdsClient->getCustomInterestServiceClient()
        );
    }

    public function testGetCustomizerAttributeServiceClient()
    {
        $this->assertInstanceOf(
            CustomizerAttributeServiceClient::class,
            $this->googleAdsClient->getCustomizerAttributeServiceClient()
        );
    }

    public function testGetDataLinkServiceClient()
    {
        $this->assertInstanceOf(
            DataLinkServiceClient::class,
            $this->googleAdsClient->getDataLinkServiceClient()
        );
    }

    public function testGetExperimentArmServiceClient()
    {
        $this->assertInstanceOf(
            ExperimentArmServiceClient::class,
            $this->googleAdsClient->getExperimentArmServiceClient()
        );
    }

    public function testGetExperimentServiceClient()
    {
        $this->assertInstanceOf(
            ExperimentServiceClient::class,
            $this->googleAdsClient->getExperimentServiceClient()
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

    public function testGetFeedItemSetLinkServiceClient()
    {
        $this->assertInstanceOf(
            FeedItemSetLinkServiceClient::class,
            $this->googleAdsClient->getFeedItemSetLinkServiceClient()
        );
    }

    public function testGetFeedItemSetServiceClient()
    {
        $this->assertInstanceOf(
            FeedItemSetServiceClient::class,
            $this->googleAdsClient->getFeedItemSetServiceClient()
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

    public function testGetFeedServiceClient()
    {
        $this->assertInstanceOf(
            FeedServiceClient::class,
            $this->googleAdsClient->getFeedServiceClient()
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

    public function testGetIdentityVerificationServiceClient()
    {
        $this->assertInstanceOf(
            IdentityVerificationServiceClient::class,
            $this->googleAdsClient->getIdentityVerificationServiceClient()
        );
    }

    public function testGetInvoiceServiceClient()
    {
        $this->assertInstanceOf(
            InvoiceServiceClient::class,
            $this->googleAdsClient->getInvoiceServiceClient()
        );
    }

    public function testGetKeywordPlanAdGroupKeywordServiceClient()
    {
        $this->assertInstanceOf(
            KeywordPlanAdGroupKeywordServiceClient::class,
            $this->googleAdsClient->getKeywordPlanAdGroupKeywordServiceClient()
        );
    }

    public function testGetKeywordPlanAdGroupServiceClient()
    {
        $this->assertInstanceOf(
            KeywordPlanAdGroupServiceClient::class,
            $this->googleAdsClient->getKeywordPlanAdGroupServiceClient()
        );
    }

    public function testGetKeywordPlanCampaignKeywordServiceClient()
    {
        $this->assertInstanceOf(
            KeywordPlanCampaignKeywordServiceClient::class,
            $this->googleAdsClient->getKeywordPlanCampaignKeywordServiceClient()
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

    public function testGetKeywordPlanServiceClient()
    {
        $this->assertInstanceOf(
            KeywordPlanServiceClient::class,
            $this->googleAdsClient->getKeywordPlanServiceClient()
        );
    }

    public function testGetKeywordThemeConstantServiceClient()
    {
        $this->assertInstanceOf(
            KeywordThemeConstantServiceClient::class,
            $this->googleAdsClient->getKeywordThemeConstantServiceClient()
        );
    }

    public function testGetLabelServiceClient()
    {
        $this->assertInstanceOf(
            LabelServiceClient::class,
            $this->googleAdsClient->getLabelServiceClient()
        );
    }

    public function testGetLocalServicesLeadServiceClient()
    {
        $this->assertInstanceOf(
            LocalServicesLeadServiceClient::class,
            $this->googleAdsClient->getLocalServicesLeadServiceClient()
        );
    }

    public function testGetOfflineUserDataJobServiceClient()
    {
        $this->assertInstanceOf(
            OfflineUserDataJobServiceClient::class,
            $this->googleAdsClient->getOfflineUserDataJobServiceClient()
        );
    }

    public function testGetPaymentsAccountServiceClient()
    {
        $this->assertInstanceOf(
            PaymentsAccountServiceClient::class,
            $this->googleAdsClient->getPaymentsAccountServiceClient()
        );
    }

    public function testGetProductLinkInvitationServiceClient()
    {
        $this->assertInstanceOf(
            ProductLinkInvitationServiceClient::class,
            $this->googleAdsClient->getProductLinkInvitationServiceClient()
        );
    }

    public function testGetProductLinkServiceClient()
    {
        $this->assertInstanceOf(
            ProductLinkServiceClient::class,
            $this->googleAdsClient->getProductLinkServiceClient()
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

    public function testGetRecommendationSubscriptionServiceClient()
    {
        $this->assertInstanceOf(
            RecommendationSubscriptionServiceClient::class,
            $this->googleAdsClient->getRecommendationSubscriptionServiceClient()
        );
    }

    public function testGetRemarketingActionServiceClient()
    {
        $this->assertInstanceOf(
            RemarketingActionServiceClient::class,
            $this->googleAdsClient->getRemarketingActionServiceClient()
        );
    }

    public function testGetShareablePreviewServiceClient()
    {
        $this->assertInstanceOf(
            ShareablePreviewServiceClient::class,
            $this->googleAdsClient->getShareablePreviewServiceClient()
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

    public function testGetSmartCampaignSettingServiceClient()
    {
        $this->assertInstanceOf(
            SmartCampaignSettingServiceClient::class,
            $this->googleAdsClient->getSmartCampaignSettingServiceClient()
        );
    }

    public function testGetSmartCampaignSuggestServiceClient()
    {
        $this->assertInstanceOf(
            SmartCampaignSuggestServiceClient::class,
            $this->googleAdsClient->getSmartCampaignSuggestServiceClient()
        );
    }

    public function testGetThirdPartyAppAnalyticsLinkServiceClient()
    {
        $this->assertInstanceOf(
            ThirdPartyAppAnalyticsLinkServiceClient::class,
            $this->googleAdsClient->getThirdPartyAppAnalyticsLinkServiceClient()
        );
    }

    public function testGetTravelAssetSuggestionServiceClient()
    {
        $this->assertInstanceOf(
            TravelAssetSuggestionServiceClient::class,
            $this->googleAdsClient->getTravelAssetSuggestionServiceClient()
        );
    }

    public function testGetUserDataServiceClient()
    {
        $this->assertInstanceOf(
            UserDataServiceClient::class,
            $this->googleAdsClient->getUserDataServiceClient()
        );
    }

    public function testGetUserListCustomerTypeServiceClient()
    {
        $this->assertInstanceOf(
            UserListCustomerTypeServiceClient::class,
            $this->googleAdsClient->getUserListCustomerTypeServiceClient()
        );
    }

    public function testGetUserListServiceClient()
    {
        $this->assertInstanceOf(
            UserListServiceClient::class,
            $this->googleAdsClient->getUserListServiceClient()
        );
    }
}
