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

namespace Google\Ads\GoogleAds\Util\V6;

use Google\Ads\GoogleAds\V6\Enums\AssetFieldTypeEnum\AssetFieldType;
use Google\Ads\GoogleAds\V6\Enums\ExtensionTypeEnum\ExtensionType;
use Google\Ads\GoogleAds\V6\Services\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V6\Services\AccountBudgetServiceClient;
use Google\Ads\GoogleAds\V6\Services\AccountLinkServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdGroupAudienceViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdGroupCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdGroupExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdGroupFeedServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdGroupSimulationServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdParameterServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdScheduleViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\AdServiceClient;
use Google\Ads\GoogleAds\V6\Services\AgeRangeViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\AssetServiceClient;
use Google\Ads\GoogleAds\V6\Services\BatchJobServiceClient;
use Google\Ads\GoogleAds\V6\Services\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V6\Services\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignAssetServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignAudienceViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignExperimentServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignFeedServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V6\Services\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V6\Services\CarrierConstantServiceClient;
use Google\Ads\GoogleAds\V6\Services\ChangeStatusServiceClient;
use Google\Ads\GoogleAds\V6\Services\ClickViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\CombinedAudienceServiceClient;
use Google\Ads\GoogleAds\V6\Services\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V6\Services\CurrencyConstantServiceClient;
use Google\Ads\GoogleAds\V6\Services\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V6\Services\CustomerClientServiceClient;
use Google\Ads\GoogleAds\V6\Services\CustomerExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V6\Services\CustomerFeedServiceClient;
use Google\Ads\GoogleAds\V6\Services\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V6\Services\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V6\Services\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V6\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V6\Services\CustomerUserAccessInvitationServiceClient;
use Google\Ads\GoogleAds\V6\Services\CustomerUserAccessServiceClient;
use Google\Ads\GoogleAds\V6\Services\CustomInterestServiceClient;
use Google\Ads\GoogleAds\V6\Services\DetailPlacementViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\DisplayKeywordViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\DomainCategoryServiceClient;
use Google\Ads\GoogleAds\V6\Services\ExpandedLandingPageViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\ExtensionFeedItemServiceClient;
use Google\Ads\GoogleAds\V6\Services\FeedItemServiceClient;
use Google\Ads\GoogleAds\V6\Services\FeedItemSetLinkServiceClient;
use Google\Ads\GoogleAds\V6\Services\FeedItemSetServiceClient;
use Google\Ads\GoogleAds\V6\Services\FeedItemTargetServiceClient;
use Google\Ads\GoogleAds\V6\Services\FeedMappingServiceClient;
use Google\Ads\GoogleAds\V6\Services\FeedServiceClient;
use Google\Ads\GoogleAds\V6\Services\GenderViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\GeographicViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V6\Services\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V6\Services\GroupPlacementViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\HotelGroupViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\HotelPerformanceViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\IncomeRangeViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\KeywordPlanAdGroupKeywordServiceClient;
use Google\Ads\GoogleAds\V6\Services\KeywordPlanAdGroupServiceClient;
use Google\Ads\GoogleAds\V6\Services\KeywordPlanCampaignKeywordServiceClient;
use Google\Ads\GoogleAds\V6\Services\KeywordPlanCampaignServiceClient;
use Google\Ads\GoogleAds\V6\Services\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V6\Services\LabelServiceClient;
use Google\Ads\GoogleAds\V6\Services\LandingPageViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\LanguageConstantServiceClient;
use Google\Ads\GoogleAds\V6\Services\LocationViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\ManagedPlacementViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\MediaFileServiceClient;
use Google\Ads\GoogleAds\V6\Services\MerchantCenterLinkServiceClient;
use Google\Ads\GoogleAds\V6\Services\MobileAppCategoryConstantServiceClient;
use Google\Ads\GoogleAds\V6\Services\MobileDeviceConstantServiceClient;
use Google\Ads\GoogleAds\V6\Services\OperatingSystemVersionConstantServiceClient;
use Google\Ads\GoogleAds\V6\Services\PaidOrganicSearchTermViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\ParentalStatusViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\ProductBiddingCategoryConstantServiceClient;
use Google\Ads\GoogleAds\V6\Services\ProductGroupViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\RecommendationServiceClient;
use Google\Ads\GoogleAds\V6\Services\RemarketingActionServiceClient;
use Google\Ads\GoogleAds\V6\Services\SearchTermViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\SharedCriterionServiceClient;
use Google\Ads\GoogleAds\V6\Services\SharedSetServiceClient;
use Google\Ads\GoogleAds\V6\Services\ShoppingPerformanceViewServiceClient;
use Google\Ads\GoogleAds\V6\Services\ThirdPartyAppAnalyticsLinkServiceClient;
use Google\Ads\GoogleAds\V6\Services\TopicConstantServiceClient;
use Google\Ads\GoogleAds\V6\Services\UserInterestServiceClient;
use Google\Ads\GoogleAds\V6\Services\UserListServiceClient;
use Google\Ads\GoogleAds\V6\Services\VideoServiceClient;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `ResourceNames`.
 *
 * @see ResourceNames
 * @small
 */
class ResourceNamesTest extends TestCase
{

    private const CUSTOMER_ID = 1234567890;

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAccountBudgetProposal()
     */
    public function testGetNameForAccountBudgetProposal()
    {
        $accountBudgetProposalId = 111111;
        $expectedResourceName = sprintf(
            'customers/%s/accountBudgetProposals/%s',
            self::CUSTOMER_ID,
            $accountBudgetProposalId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAccountBudgetProposal(self::CUSTOMER_ID, $accountBudgetProposalId)
        );

        $names = AccountBudgetProposalServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($accountBudgetProposalId, $names['account_budget_proposal_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAccountBudget()
     */
    public function testGetNameForAccountBudget()
    {
        $accountBudgetId = 111111;
        $expectedResourceName =
            sprintf('customers/%s/accountBudgets/%s', self::CUSTOMER_ID, $accountBudgetId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAccountBudget(self::CUSTOMER_ID, $accountBudgetId)
        );

        $names = AccountBudgetServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($accountBudgetId, $names['account_budget_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAccountLinkName()
     */
    public function testGetNameForAccountLink()
    {
        $accountLinkId = 111111;
        $expectedResourceName =
            sprintf('customers/%s/accountLinks/%s', self::CUSTOMER_ID, $accountLinkId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAccountLinkName(self::CUSTOMER_ID, $accountLinkId)
        );

        $names = AccountLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($accountLinkId, $names['account_link_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAd()
     */
    public function testGetNameForAd()
    {
        $adId = 22222;
        $expectedResourceName =
            sprintf('customers/%s/ads/%s', self::CUSTOMER_ID, $adId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAd(self::CUSTOMER_ID, $adId)
        );

        $names = AdServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adId, $names['ad_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdGroupAdLabel()
     */
    public function testGetNameForAdGroupAdLabel()
    {
        $adGroupId = 111111;
        $adId = 222222;
        $labelId = 333333;
        $expectedResourceName = sprintf(
            'customers/%s/adGroupAdLabels/%s~%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $adId,
            $labelId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupAdLabel(self::CUSTOMER_ID, $adGroupId, $adId, $labelId)
        );

        $names = AdGroupAdLabelServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($adId, $names['ad_id']);
        $this->assertEquals($labelId, $names['label_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdGroupAd()
     */
    public function testGetNameForAdGroupAd()
    {
        $adGroupId = 111111;
        $adId = 22222;
        $expectedResourceName =
            sprintf('customers/%s/adGroupAds/%s~%s', self::CUSTOMER_ID, $adGroupId, $adId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupAd(self::CUSTOMER_ID, $adGroupId, $adId)
        );

        $names = AdGroupAdServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($adId, $names['ad_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdGroupAudienceView()
     */
    public function testGetNameForAdGroupAudienceView()
    {
        $adGroupId = 111111;
        $criterionId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/adGroupAudienceViews/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupAudienceView(
                self::CUSTOMER_ID,
                $adGroupId,
                $criterionId
            )
        );

        $names = AdGroupAudienceViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdGroupBidModifier()
     */
    public function testGetNameForAdGroupBidModifier()
    {
        $adGroupId = 111111;
        $criterionId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/adGroupBidModifiers/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupBidModifier(self::CUSTOMER_ID, $adGroupId, $criterionId)
        );

        $names = AdGroupBidModifierServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdGroupCriterionLabel()
     */
    public function testGetNameForAdGroupCriterionLabel()
    {
        $adGroupId = 111111;
        $criterionId = 3333333;
        $labelId = 4444444;
        $expectedResourceName = sprintf(
            'customers/%s/adGroupCriterionLabels/%s~%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId,
            $labelId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupCriterionLabel(
                self::CUSTOMER_ID,
                $adGroupId,
                $criterionId,
                $labelId
            )
        );

        $names = AdGroupCriterionLabelServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
        $this->assertEquals($labelId, $names['label_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdGroupCriterion()
     */
    public function testGetNameForAdGroupCriterion()
    {
        $adGroupId = 111111;
        $criterionId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/adGroupCriteria/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupCriterion(self::CUSTOMER_ID, $adGroupId, $criterionId)
        );

        $names = AdGroupCriterionServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdGroupCriterionSimulation()
     */
    public function testGetNameForAdGroupCriterionSimulation()
    {
        $adGroupId = 111111;
        $criterionId = 3333333;
        $type = 4444444;
        $modificationMethod = 5555555;
        $startDate = 66666666;
        $endDate = 7777777;
        $expectedResourceName = sprintf(
            'customers/%s/adGroupCriterionSimulations/%s~%s~%s~%s~%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId,
            $type,
            $modificationMethod,
            $startDate,
            $endDate
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupCriterionSimulation(
                self::CUSTOMER_ID,
                $adGroupId,
                $criterionId,
                $type,
                $modificationMethod,
                $startDate,
                $endDate
            )
        );

        $names = AdGroupCriterionSimulationServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
        $this->assertEquals($type, $names['type']);
        $this->assertEquals($modificationMethod, $names['modification_method']);
        $this->assertEquals($startDate, $names['start_date']);
        $this->assertEquals($endDate, $names['end_date']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdGroupExtensionSetting()
     */
    public function testGetNameForAdGroupExtensionSetting()
    {
        $adGroupId = 111111;
        $extensionType = ExtensionType::SITELINK;
        $expectedResourceName = sprintf(
            'customers/%s/adGroupExtensionSettings/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            'SITELINK'
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupExtensionSetting(
                self::CUSTOMER_ID,
                $adGroupId,
                $extensionType
            )
        );

        $names = AdGroupExtensionSettingServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals(ExtensionType::name($extensionType), $names['extension_type']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdGroupFeed()
     */
    public function testGetNameForAdGroupFeed()
    {
        $adGroupId = 111111;
        $feedId = 3333333;
        $expectedResourceName =
            sprintf('customers/%s/adGroupFeeds/%s~%s', self::CUSTOMER_ID, $adGroupId, $feedId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupFeed(self::CUSTOMER_ID, $adGroupId, $feedId)
        );

        $names = AdGroupFeedServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($feedId, $names['feed_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdGroupLabel()
     */
    public function testGetNameForAdGroupLabel()
    {
        $adGroupId = 111111;
        $labelId = 3333333;
        $expectedResourceName =
            sprintf('customers/%s/adGroupLabels/%s~%s', self::CUSTOMER_ID, $adGroupId, $labelId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupLabel(self::CUSTOMER_ID, $adGroupId, $labelId)
        );

        $names = AdGroupLabelServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($labelId, $names['label_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdGroup()
     */
    public function testGetNameForAdGroup()
    {
        $adGroupId = 111111;
        $expectedResourceName = sprintf('customers/%s/adGroups/%s', self::CUSTOMER_ID, $adGroupId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroup(self::CUSTOMER_ID, $adGroupId)
        );

        $names = AdGroupServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdGroupSimulation()
     */
    public function testGetNameForAdGroupSimulation()
    {
        $adGroupId = 111111;
        $type = 4444444;
        $modificationMethod = 5555555;
        $startDate = 66666666;
        $endDate = 7777777;
        $expectedResourceName = sprintf(
            'customers/%s/adGroupSimulations/%s~%s~%s~%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $type,
            $modificationMethod,
            $startDate,
            $endDate
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupSimulation(
                self::CUSTOMER_ID,
                $adGroupId,
                $type,
                $modificationMethod,
                $startDate,
                $endDate
            )
        );

        $names = AdGroupSimulationServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($type, $names['type']);
        $this->assertEquals($modificationMethod, $names['modification_method']);
        $this->assertEquals($startDate, $names['start_date']);
        $this->assertEquals($endDate, $names['end_date']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdParameter()
     */
    public function testGetNameForAdParameter()
    {
        $adGroupId = 111111;
        $criterionId = 3333333;
        $parameterIndex = 4444444;
        $expectedResourceName = sprintf(
            'customers/%s/adParameters/%s~%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId,
            $parameterIndex
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdParameter(
                self::CUSTOMER_ID,
                $adGroupId,
                $criterionId,
                $parameterIndex
            )
        );

        $names = AdParameterServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
        $this->assertEquals($parameterIndex, $names['parameter_index']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAdScheduleView()
     */
    public function testGetNameForAdScheduleView()
    {
        $campaignId = 111111;
        $criterionId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/adScheduleViews/%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdScheduleView(self::CUSTOMER_ID, $campaignId, $criterionId)
        );

        $names = AdScheduleViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAgeRangeView()
     */
    public function testGetNameForAgeRangeView()
    {
        $adGroupId = 111111;
        $criterionId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/ageRangeViews/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAgeRangeView(self::CUSTOMER_ID, $adGroupId, $criterionId)
        );

        $names = AgeRangeViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forAsset()
     */
    public function testGetNameForAsset()
    {
        $assetId = 111111;
        $expectedResourceName = sprintf('customers/%s/assets/%s', self::CUSTOMER_ID, $assetId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAsset(self::CUSTOMER_ID, $assetId)
        );

        $names = AssetServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($assetId, $names['asset_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forBatchJob()
     */
    public function testGetNameForBatchJob()
    {
        $batchJobId = 111111;
        $expectedResourceName =
            sprintf('customers/%s/batchJobs/%s', self::CUSTOMER_ID, $batchJobId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forBatchJob(self::CUSTOMER_ID, $batchJobId)
        );

        $names = BatchJobServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($batchJobId, $names['batch_job_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forBiddingStrategy()
     */
    public function testGetNameForBiddingStrategy()
    {
        $biddingStrategyId = 4444444;
        $expectedResourceName =
            sprintf('customers/%s/biddingStrategies/%s', self::CUSTOMER_ID, $biddingStrategyId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forBiddingStrategy(self::CUSTOMER_ID, $biddingStrategyId)
        );

        $names = BiddingStrategyServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($biddingStrategyId, $names['bidding_strategy_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forBillingSetup()
     */
    public function testGetNameForBillingSetup()
    {
        $billingSetupId = 4444444;
        $expectedResourceName =
            sprintf('customers/%s/billingSetups/%s', self::CUSTOMER_ID, $billingSetupId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forBillingSetup(self::CUSTOMER_ID, $billingSetupId)
        );

        $names = BillingSetupServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($billingSetupId, $names['billing_setup_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCampaignAsset()
     */
    public function testGetNameForCampaignAsset()
    {
        $campaignId = 111111;
        $assetId = 3333333;
        $fieldType = 3;
        $expectedResourceName = sprintf(
            'customers/%s/campaignAssets/%s~%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $assetId,
            AssetFieldType::name($fieldType)
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignAsset(self::CUSTOMER_ID, $campaignId, $assetId, $fieldType)
        );

        $names = CampaignAssetServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($assetId, $names['asset_id']);
        $this->assertEquals(AssetFieldType::name($fieldType), $names['field_type']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCampaignAudienceView()
     */
    public function testGetNameForCampaignAudienceView()
    {
        $campaignId = 111111;
        $criterionId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/campaignAudienceViews/%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignAudienceView(self::CUSTOMER_ID, $campaignId, $criterionId)
        );

        $names = CampaignAudienceViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCampaignBidModifier()
     */
    public function testGetNameForCampaignBidModifier()
    {
        $campaignId = 111111;
        $criterionId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/campaignBidModifiers/%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignBidModifier(self::CUSTOMER_ID, $campaignId, $criterionId)
        );

        $names = CampaignBidModifierServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCampaignBudget()
     */
    public function testGetNameForCampaignBudget()
    {
        $budgetId = 555555;
        $expectedResourceName =
            sprintf('customers/%s/campaignBudgets/%s', self::CUSTOMER_ID, $budgetId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignBudget(self::CUSTOMER_ID, $budgetId)
        );

        $names = CampaignBudgetServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($budgetId, $names['campaign_budget_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCampaignCriterion()
     */
    public function testGetNameForCampaignCriterion()
    {
        $campaignId = 66666666;
        $criterionId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/campaignCriteria/%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignCriterion(self::CUSTOMER_ID, $campaignId, $criterionId)
        );

        $names = CampaignCriterionServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCampaignCriterionSimulation()
     */
    public function testGetNameForCampaignCriterionSimulation()
    {
        $campaignId = 111111;
        $criterionId = 3333333;
        $type = 4444444;
        $modificationMethod = 5555555;
        $startDate = 66666666;
        $endDate = 7777777;
        $expectedResourceName = sprintf(
            'customers/%s/campaignCriterionSimulations/%s~%s~%s~%s~%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $criterionId,
            $type,
            $modificationMethod,
            $startDate,
            $endDate
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignCriterionSimulation(
                self::CUSTOMER_ID,
                $campaignId,
                $criterionId,
                $type,
                $modificationMethod,
                $startDate,
                $endDate
            )
        );

        $names = CampaignCriterionSimulationServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
        $this->assertEquals($type, $names['type']);
        $this->assertEquals($modificationMethod, $names['modification_method']);
        $this->assertEquals($startDate, $names['start_date']);
        $this->assertEquals($endDate, $names['end_date']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCampaignDraft()
     */
    public function testGetNameForCampaignDraft()
    {
        $baseCampaignId = 111111;
        $draftId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/campaignDrafts/%s~%s',
            self::CUSTOMER_ID,
            $baseCampaignId,
            $draftId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignDraft(self::CUSTOMER_ID, $baseCampaignId, $draftId)
        );

        $names = CampaignDraftServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($baseCampaignId, $names['base_campaign_id']);
        $this->assertEquals($draftId, $names['draft_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCampaignExperiment()
     */
    public function testGetNameForCampaignExperiment()
    {
        $campaignExperimentId = 66666666;
        $expectedResourceName = sprintf(
            'customers/%s/campaignExperiments/%s',
            self::CUSTOMER_ID,
            $campaignExperimentId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignExperiment(self::CUSTOMER_ID, $campaignExperimentId)
        );

        $names = CampaignExperimentServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignExperimentId, $names['campaign_experiment_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCampaignExtensionSetting()
     */
    public function testGetNameForCampaignExtensionSetting()
    {
        $campaignId = 111111;
        $extensionType = ExtensionType::SITELINK;
        $expectedResourceName = sprintf(
            'customers/%s/campaignExtensionSettings/%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            'SITELINK'
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignExtensionSetting(
                self::CUSTOMER_ID,
                $campaignId,
                $extensionType
            )
        );

        $names = CampaignExtensionSettingServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals(ExtensionType::name($extensionType), $names['extension_type']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCampaignFeed()
     */
    public function testGetNameForCampaignFeed()
    {
        $campaignId = 111111;
        $feedId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/campaignFeeds/%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $feedId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignFeed(
                self::CUSTOMER_ID,
                $campaignId,
                $feedId
            )
        );

        $names = CampaignFeedServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($feedId, $names['feed_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCampaignLabel()
     */
    public function testGetNameForCampaignLabel()
    {
        $campaignId = 111111;
        $labelId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/campaignLabels/%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $labelId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignLabel(
                self::CUSTOMER_ID,
                $campaignId,
                $labelId
            )
        );

        $names = CampaignLabelServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($labelId, $names['label_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCampaign()
     */
    public function testGetNameForCampaign()
    {
        $campaignId = 66666666;
        $expectedResourceName =
            sprintf('customers/%s/campaigns/%s', self::CUSTOMER_ID, $campaignId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaign(self::CUSTOMER_ID, $campaignId)
        );

        $names = CampaignServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCampaignSharedSet()
     */
    public function testGetNameForCampaignSharedSet()
    {
        $campaignId = 111111;
        $sharedSetId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/campaignSharedSets/%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $sharedSetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCampaignSharedSet(
                self::CUSTOMER_ID,
                $campaignId,
                $sharedSetId
            )
        );

        $names = CampaignSharedSetServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($sharedSetId, $names['shared_set_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCarrierConstant()
     */
    public function testGetNameForCarrierConstant()
    {
        $criterionId = 3333333;
        $expectedResourceName = sprintf('carrierConstants/%s', $criterionId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCarrierConstant($criterionId)
        );

        $names = CarrierConstantServiceClient::parseName($expectedResourceName);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forChangeStatus()
     */
    public function testGetNameForChangeStatus()
    {
        $changeStatusId = 66666666;
        $expectedResourceName =
            sprintf('customers/%s/changeStatus/%s', self::CUSTOMER_ID, $changeStatusId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forChangeStatus(self::CUSTOMER_ID, $changeStatusId)
        );

        $names = ChangeStatusServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($changeStatusId, $names['change_status_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forClickView()
     */
    public function testGetNameForClickView()
    {
        $date = '2019-05-29';
        $gclId = 3333333;
        $expectedResourceName =
            sprintf('customers/%s/clickViews/%s~%s', self::CUSTOMER_ID, $date, $gclId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forClickView(self::CUSTOMER_ID, $date, $gclId)
        );

        $names = ClickViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($date, $names['date']);
        $this->assertEquals($gclId, $names['gclid']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCombinedAudience()
     */
    public function testGetNameForCombinedAudience()
    {
        $combinedAudienceId = 66666666;
        $expectedResourceName =
            sprintf('customers/%s/combinedAudiences/%s', self::CUSTOMER_ID, $combinedAudienceId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCombinedAudience(self::CUSTOMER_ID, $combinedAudienceId)
        );

        $names = CombinedAudienceServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($combinedAudienceId, $names['combined_audience_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forConversionAction()
     */
    public function testGetNameForConversionAction()
    {
        $conversionActionId = 66666666;
        $expectedResourceName =
            sprintf('customers/%s/conversionActions/%s', self::CUSTOMER_ID, $conversionActionId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forConversionAction(self::CUSTOMER_ID, $conversionActionId)
        );

        $names = ConversionActionServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($conversionActionId, $names['conversion_action_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCurrencyConstant()
     */
    public function testGetNameForCurrencyConstant()
    {
        $usdCurrencyConstantId = 'USD';
        $expectedResourceName = sprintf('currencyConstants/%s', $usdCurrencyConstantId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCurrencyConstant($usdCurrencyConstantId)
        );

        $names = CurrencyConstantServiceClient::parseName($expectedResourceName);
        $this->assertEquals($usdCurrencyConstantId, $names['code']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCustomInterest()
     */
    public function testGetNameForCustomInterest()
    {
        $customInterestId = 66666666;
        $expectedResourceName =
            sprintf('customers/%s/customInterests/%s', self::CUSTOMER_ID, $customInterestId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomInterest(self::CUSTOMER_ID, $customInterestId)
        );

        $names = CustomInterestServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($customInterestId, $names['custom_interest_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCustomerClientLink()
     */
    public function testGetNameForCustomerClientLink()
    {
        $clientCustomerId = 111111;
        $managerLinkId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/customerClientLinks/%s~%s',
            self::CUSTOMER_ID,
            $clientCustomerId,
            $managerLinkId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerClientLink(
                self::CUSTOMER_ID,
                $clientCustomerId,
                $managerLinkId
            )
        );

        $names = CustomerClientLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($clientCustomerId, $names['client_customer_id']);
        $this->assertEquals($managerLinkId, $names['manager_link_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCustomerClient()
     */
    public function testGetNameForCustomerClient()
    {
        $clientCustomerId = 66666666;
        $expectedResourceName =
            sprintf('customers/%s/customerClients/%s', self::CUSTOMER_ID, $clientCustomerId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerClient(self::CUSTOMER_ID, $clientCustomerId)
        );

        $names = CustomerClientServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($clientCustomerId, $names['client_customer_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCustomerExtensionSetting()
     */
    public function testGetNameForCustomerExtensionSetting()
    {
        $extensionType = ExtensionType::SITELINK;
        $expectedResourceName = sprintf(
            'customers/%s/customerExtensionSettings/%s',
            self::CUSTOMER_ID,
            'SITELINK'
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerExtensionSetting(self::CUSTOMER_ID, $extensionType)
        );

        $names = CustomerExtensionSettingServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals(ExtensionType::name($extensionType), $names['extension_type']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCustomerFeed()
     */
    public function testGetNameForCustomerFeed()
    {
        $feedId = 66666666;
        $expectedResourceName =
            sprintf('customers/%s/customerFeeds/%s', self::CUSTOMER_ID, $feedId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerFeed(self::CUSTOMER_ID, $feedId)
        );

        $names = CustomerFeedServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($feedId, $names['feed_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCustomerLabel()
     */
    public function testGetNameForCustomerLabel()
    {
        $labelId = 66666666;
        $expectedResourceName =
            sprintf('customers/%s/customerLabels/%s', self::CUSTOMER_ID, $labelId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerLabel(self::CUSTOMER_ID, $labelId)
        );

        $names = CustomerLabelServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($labelId, $names['label_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCustomerManagerLink()
     */
    public function testGetNameForCustomerManagerLink()
    {
        $managerCustomerId = 111111;
        $managerLinkId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/customerManagerLinks/%s~%s',
            self::CUSTOMER_ID,
            $managerCustomerId,
            $managerLinkId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forCustomerManagerLink(
            self::CUSTOMER_ID,
            $managerCustomerId,
            $managerLinkId
        ));

        $names = CustomerManagerLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($managerCustomerId, $names['manager_customer_id']);
        $this->assertEquals($managerLinkId, $names['manager_link_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCustomerNegativeCriterion()
     */
    public function testGetNameForCustomerNegativeCriterion()
    {
        $criterionId = 66666666;
        $expectedResourceName =
            sprintf('customers/%s/customerNegativeCriteria/%s', self::CUSTOMER_ID, $criterionId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerNegativeCriterion(self::CUSTOMER_ID, $criterionId)
        );

        $names = CustomerNegativeCriterionServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCustomer()
     */
    public function testGetNameForCustomer()
    {
        $expectedResourceName = sprintf('customers/%s', self::CUSTOMER_ID);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomer(self::CUSTOMER_ID)
        );

        $names = CustomerServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCustomerUserAccess()
     */
    public function testGetNameForCustomerUserAccess()
    {
        $userId = 1111111;
        $expectedResourceName =
            sprintf('customers/%s/customerUserAccesses/%s', self::CUSTOMER_ID, $userId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerUserAccess(self::CUSTOMER_ID, $userId)
        );

        $names = CustomerUserAccessServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($userId, $names['user_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forCustomerUserAccessInvitation()
     */
    public function testGetNameForCustomerUserAccessInvitation()
    {
        $invitationId = 1111111;
        $expectedResourceName = sprintf(
            'customers/%s/customerUserAccessInvitations/%s',
            self::CUSTOMER_ID,
            $invitationId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerUserAccessInvitation(self::CUSTOMER_ID, $invitationId)
        );

        $names = CustomerUserAccessInvitationServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($invitationId, $names['invitation_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forDetailPlacementView()
     */
    public function testGetNameForDetailPlacementView()
    {
        $adGroupId = 111111;
        $placement = 'base64';
        $expectedResourceName = sprintf(
            'customers/%s/detailPlacementViews/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $placement
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forDetailPlacementView(
            self::CUSTOMER_ID,
            $adGroupId,
            $placement
        ));

        $names = DetailPlacementViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($placement, $names['base64_placement']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forDisplayKeywordView()
     */
    public function testGetNameForDisplayKeywordView()
    {
        $adGroupId = 111111;
        $criterionId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/displayKeywordViews/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forDisplayKeywordView(
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        ));

        $names = DisplayKeywordViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forDomainCategory()
     */
    public function testGetNameForDomainCategory()
    {
        $campaignId = 111111;
        $category = 'category';
        $languageCode = 'en';
        $expectedResourceName = sprintf(
            'customers/%s/domainCategories/%s~%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $category,
            $languageCode
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forDomainCategory(
                self::CUSTOMER_ID,
                $campaignId,
                $category,
                $languageCode
            )
        );

        $names = DomainCategoryServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($category, $names['base64_category']);
        $this->assertEquals($languageCode, $names['language_code']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forExpandedLandingPageView()
     */
    public function testGetNameForExpandedLandingPageView()
    {
        $expandedFinalUrlFingerprint = 'url';
        $expectedResourceName = sprintf(
            'customers/%s/expandedLandingPageViews/%s',
            self::CUSTOMER_ID,
            $expandedFinalUrlFingerprint
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forExpandedLandingPageView(
                self::CUSTOMER_ID,
                $expandedFinalUrlFingerprint
            )
        );

        $names = ExpandedLandingPageViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($expandedFinalUrlFingerprint, $names['expanded_final_url_fingerprint']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forExtensionFeedItem()
     */
    public function testGetNameForExtensionFeedItem()
    {
        $feedItemId = 66666666;
        $expectedResourceName =
            sprintf('customers/%s/extensionFeedItems/%s', self::CUSTOMER_ID, $feedItemId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forExtensionFeedItem(self::CUSTOMER_ID, $feedItemId)
        );

        $names = ExtensionFeedItemServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($feedItemId, $names['feed_item_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forFeedItem()
     */
    public function testGetNameForFeedItem()
    {
        $feedId = 111111;
        $feedItemId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/feedItems/%s~%s',
            self::CUSTOMER_ID,
            $feedId,
            $feedItemId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forFeedItem(
            self::CUSTOMER_ID,
            $feedId,
            $feedItemId
        ));

        $names = FeedItemServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($feedItemId, $names['feed_item_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forFeedItemSet()
     */
    public function testGetNameForFeedItemSet()
    {
        $feedId = 111111;
        $feedItemSetId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/feedItemSets/%s~%s',
            self::CUSTOMER_ID,
            $feedId,
            $feedItemSetId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forFeedItemSet(
            self::CUSTOMER_ID,
            $feedId,
            $feedItemSetId
        ));

        $names = FeedItemSetServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($feedId, $names['feed_id']);
        $this->assertEquals($feedItemSetId, $names['feed_item_set_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forFeedItemSetLink()
     */
    public function testGetNameForFeedItemSetLink()
    {
        $feedId = 111111;
        $feedItemId = 222222;
        $feedItemSetId = 333333;
        $expectedResourceName = sprintf(
            'customers/%s/feedItemSetLinks/%s~%s~%s',
            self::CUSTOMER_ID,
            $feedId,
            $feedItemSetId,
            $feedItemId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forFeedItemSetLink(
            self::CUSTOMER_ID,
            $feedId,
            $feedItemSetId,
            $feedItemId
        ));

        $names = FeedItemSetLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($feedId, $names['feed_id']);
        $this->assertEquals($feedItemSetId, $names['feed_item_set_id']);
        $this->assertEquals($feedItemId, $names['feed_item_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forFeedItemTarget()
     */
    public function testGetNameForFeedItemTarget()
    {
        $feedId = 3333333;
        $feedItemId = 4444444;
        $feedItemTargetType = 5555555;
        $feedItemTargetId = 66666666;
        $expectedResourceName = sprintf(
            'customers/%s/feedItemTargets/%s~%s~%s~%s',
            self::CUSTOMER_ID,
            $feedId,
            $feedItemId,
            $feedItemTargetType,
            $feedItemTargetId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forFeedItemTarget(
                self::CUSTOMER_ID,
                $feedId,
                $feedItemId,
                $feedItemTargetType,
                $feedItemTargetId
            )
        );

        $names = FeedItemTargetServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($feedItemId, $names['feed_item_id']);
        $this->assertEquals($feedItemTargetType, $names['feed_item_target_type']);
        $this->assertEquals($feedItemTargetId, $names['feed_item_target_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forFeedMapping()
     */
    public function testGetNameForFeedMapping()
    {
        $feedId = 111111;
        $feedMappingId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/feedMappings/%s~%s',
            self::CUSTOMER_ID,
            $feedId,
            $feedMappingId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forFeedMapping(
            self::CUSTOMER_ID,
            $feedId,
            $feedMappingId
        ));

        $names = FeedMappingServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($feedId, $names['feed_id']);
        $this->assertEquals($feedMappingId, $names['feed_mapping_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forFeed()
     */
    public function testGetNameForFeed()
    {
        $feedId = 66666666;
        $expectedResourceName = sprintf('customers/%s/feeds/%s', self::CUSTOMER_ID, $feedId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forFeed(self::CUSTOMER_ID, $feedId)
        );

        $names = FeedServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($feedId, $names['feed_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forGenderView()
     */
    public function testGetNameForGenderView()
    {
        $adGroupId = 111111;
        $criterionId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/genderViews/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forGenderView(
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        ));

        $names = GenderViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forGeoTargetConstant()
     */
    public function testGetNameForGeoTargetConstant()
    {
        $japanTargetConstantId = 2392;
        $expectedResourceName = sprintf('geoTargetConstants/%s', $japanTargetConstantId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forGeoTargetConstant($japanTargetConstantId)
        );

        $names = GeoTargetConstantServiceClient::parseName($expectedResourceName);
        $this->assertEquals($japanTargetConstantId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forGeographicView()
     */
    public function testGetNameForGeographicView()
    {
        $countryCriterionId = 111111;
        $locationType = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/geographicViews/%s~%s',
            self::CUSTOMER_ID,
            $countryCriterionId,
            $locationType
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forGeographicView(
            self::CUSTOMER_ID,
            $countryCriterionId,
            $locationType
        ));

        $names = GeographicViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($countryCriterionId, $names['country_criterion_id']);
        $this->assertEquals($locationType, $names['location_type']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forGoogleAdsField()
     */
    public function testGetNameForGoogleAdsField()
    {
        $field = 'field';
        $expectedResourceName = sprintf('googleAdsFields/%s', $field);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forGoogleAdsField($field)
        );

        $names = GoogleAdsFieldServiceClient::parseName($expectedResourceName);
        $this->assertEquals($field, $names['google_ads_field']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forGroupPlacementView()
     */
    public function testGetNameForGroupPlacementView()
    {
        $adGroupId = 111111;
        $placement = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/groupPlacementViews/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $placement
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forGroupPlacementView(
            self::CUSTOMER_ID,
            $adGroupId,
            $placement
        ));

        $names = GroupPlacementViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($placement, $names['base64_placement']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forHotelGroupView()
     */
    public function testGetNameForHotelGroupView()
    {
        $adGroupId = 111111;
        $criterionId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/hotelGroupViews/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forHotelGroupView(
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        ));

        $names = HotelGroupViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forHotelPerformanceView()
     */
    public function testGetNameForHotelPerformanceView()
    {
        $expectedResourceName = sprintf(
            'customers/%s/hotelPerformanceView',
            self::CUSTOMER_ID
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forHotelPerformanceView(
            self::CUSTOMER_ID
        ));

        $names = HotelPerformanceViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forIncomeRangeView()
     */
    public function testGetNameForIncomeRangeView()
    {
        $adGroupId = 111111;
        $criterionId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/incomeRangeViews/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forIncomeRangeView(self::CUSTOMER_ID, $adGroupId, $criterionId)
        );

        $names = IncomeRangeViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forKeywordPlanAdGroup()
     */
    public function testGetNameForKeywordPlanAdGroup()
    {
        $keywordPlanAdGroupId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/keywordPlanAdGroups/%s',
            self::CUSTOMER_ID,
            $keywordPlanAdGroupId
        );

        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forKeywordPlanAdGroup(self::CUSTOMER_ID, $keywordPlanAdGroupId)
        );

        $names = KeywordPlanAdGroupServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($keywordPlanAdGroupId, $names['keyword_plan_ad_group_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forKeywordPlanAdGroupKeyword()
     */
    public function testGetNameForKeywordPlanAdGroupKeyword()
    {
        $keywordPlanAdGroupKeywordId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/keywordPlanAdGroupKeywords/%s',
            self::CUSTOMER_ID,
            $keywordPlanAdGroupKeywordId
        );

        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forKeywordPlanAdGroupKeyword(
                self::CUSTOMER_ID,
                $keywordPlanAdGroupKeywordId
            )
        );

        $names = KeywordPlanAdGroupKeywordServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($keywordPlanAdGroupKeywordId, $names['keyword_plan_ad_group_keyword_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forKeywordPlanCampaign()
     */
    public function testGetNameForKeywordPlanCampaign()
    {
        $keywordPlanCampaignId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/keywordPlanCampaigns/%s',
            self::CUSTOMER_ID,
            $keywordPlanCampaignId
        );

        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forKeywordPlanCampaign(self::CUSTOMER_ID, $keywordPlanCampaignId)
        );

        $names = KeywordPlanCampaignServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($keywordPlanCampaignId, $names['keyword_plan_campaign_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forKeywordPlanCampaignKeyword()
     */
    public function testGetNameForKeywordPlanCampaignKeyword()
    {
        $keywordPlanCampaignKeywordId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/keywordPlanCampaignKeywords/%s',
            self::CUSTOMER_ID,
            $keywordPlanCampaignKeywordId
        );

        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forKeywordPlanCampaignKeyword(
                self::CUSTOMER_ID,
                $keywordPlanCampaignKeywordId
            )
        );

        $names = KeywordPlanCampaignKeywordServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($keywordPlanCampaignKeywordId, $names['keyword_plan_campaign_keyword_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forKeywordPlan()
     */
    public function testGetNameForKeywordPlan()
    {
        $keywordPlanId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/keywordPlans/%s',
            self::CUSTOMER_ID,
            $keywordPlanId
        );

        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forKeywordPlan(self::CUSTOMER_ID, $keywordPlanId)
        );

        $names = KeywordPlanServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($keywordPlanId, $names['keyword_plan_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forLabel()
     */
    public function testGetNameForLabel()
    {
        $labelId = 938;
        $expectedResourceName = sprintf('customers/%s/labels/%s', self::CUSTOMER_ID, $labelId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forLabel(self::CUSTOMER_ID, $labelId)
        );

        $names = LabelServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($labelId, $names['label_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forLandingPageView()
     */
    public function testGetNameForLandingPageView()
    {
        $unexpandedFinalUrlFingerprint = 'url';
        $expectedResourceName = sprintf(
            'customers/%s/landingPageViews/%s',
            self::CUSTOMER_ID,
            $unexpandedFinalUrlFingerprint
        );

        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forLandingPageView(self::CUSTOMER_ID, $unexpandedFinalUrlFingerprint)
        );

        $names = LandingPageViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals(
            $unexpandedFinalUrlFingerprint,
            $names['unexpanded_final_url_fingerprint']
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forLanguageConstant()
     */
    public function testGetNameForLanguageConstant()
    {
        $englishLanguageId = 1000;
        $expectedResourceName = sprintf('languageConstants/%s', $englishLanguageId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forLanguageConstant($englishLanguageId)
        );

        $names = LanguageConstantServiceClient::parseName($expectedResourceName);
        $this->assertEquals($englishLanguageId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forLocationView()
     */
    public function testGetNameForLocationView()
    {
        $campaignId = 111111;
        $criterionId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/locationViews/%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forLocationView(self::CUSTOMER_ID, $campaignId, $criterionId)
        );

        $names = LocationViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forManagedPlacementView()
     */
    public function testGetNameForManagedPlacementView()
    {
        $adGroupId = 111111;
        $criterionId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/managedPlacementViews/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forManagedPlacementView(
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        ));

        $names = ManagedPlacementViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forMediaFile()
     */
    public function testGetNameForMediaFile()
    {
        $mediaFileId = 111111;
        $expectedResourceName =
            sprintf('customers/%s/mediaFiles/%s', self::CUSTOMER_ID, $mediaFileId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forMediaFile(self::CUSTOMER_ID, $mediaFileId)
        );

        $names = MediaFileServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($mediaFileId, $names['media_file_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forMerchantCenterLink()
     */
    public function testGetNameForMerchantCenterLink()
    {
        $merchantCenterId = 111111;
        $expectedResourceName =
            sprintf('customers/%s/merchantCenterLinks/%s', self::CUSTOMER_ID, $merchantCenterId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forMerchantCenterLink(self::CUSTOMER_ID, $merchantCenterId)
        );

        $names = MerchantCenterLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($merchantCenterId, $names['merchant_center_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forMobileAppCategoryConstant()
     */
    public function testGetNameForMobileAppCategoryConstant()
    {
        $mobileAppCategoryId = 1000;
        $expectedResourceName = sprintf('mobileAppCategoryConstants/%s', $mobileAppCategoryId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forMobileAppCategoryConstant($mobileAppCategoryId)
        );

        $names = MobileAppCategoryConstantServiceClient::parseName($expectedResourceName);
        $this->assertEquals($mobileAppCategoryId, $names['mobile_app_category_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forMobileDeviceConstant()
     */
    public function testGetNameForMobileDeviceConstant()
    {
        $criterionId = 1000;
        $expectedResourceName = sprintf('mobileDeviceConstants/%s', $criterionId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forMobileDeviceConstant($criterionId)
        );

        $names = MobileDeviceConstantServiceClient::parseName($expectedResourceName);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forOperatingSystemVersionConstant()
     */
    public function testGetNameForOperatingSystemVersionConstant()
    {
        $criterionId = 1000;
        $expectedResourceName = sprintf('operatingSystemVersionConstants/%s', $criterionId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forOperatingSystemVersionConstant($criterionId)
        );

        $names = OperatingSystemVersionConstantServiceClient::parseName($expectedResourceName);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forPaidOrganicSearchTermView()
     */
    public function testGetNameForPaidOrganicSearchTermView()
    {
        $campaignId = 111111;
        $adGroupId = 222222;
        $searchTerm = 'base64';
        $expectedResourceName = sprintf(
            'customers/%s/paidOrganicSearchTermViews/%s~%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $adGroupId,
            $searchTerm
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forPaidOrganicSearchTermView(
                self::CUSTOMER_ID,
                $campaignId,
                $adGroupId,
                $searchTerm
            )
        );

        $names = PaidOrganicSearchTermViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($searchTerm, $names['base64_search_term']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forParentalStatusView()
     */
    public function testGetNameForParentalStatusView()
    {
        $adGroupId = 111111;
        $criterionId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/parentalStatusViews/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forParentalStatusView(
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        ));

        $names = ParentalStatusViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forPaymentsAccount()
     */
    public function testGetNameForPaymentsAccount()
    {
        $paymentsAccountId = '1111-2222-3333-4444';
        $expectedResourceName = sprintf(
            'customers/%s/paymentsAccounts/%s',
            self::CUSTOMER_ID,
            $paymentsAccountId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forPaymentsAccount(
            self::CUSTOMER_ID,
            $paymentsAccountId
        ));
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forProductBiddingCategoryConstant()
     */
    public function testGetNameForProductBiddingCategoryConstant()
    {
        $countryCode = 'US';
        $level = 222222;
        $id = 3333333;
        $expectedResourceName = sprintf(
            'productBiddingCategoryConstants/%s~%s~%s',
            $countryCode,
            $level,
            $id
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forProductBiddingCategoryConstant(
                $countryCode,
                $level,
                $id
            )
        );

        $names = ProductBiddingCategoryConstantServiceClient::parseName($expectedResourceName);
        $this->assertEquals($countryCode, $names['country_code']);
        $this->assertEquals($level, $names['level']);
        $this->assertEquals($id, $names['id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forProductGroupView()
     */
    public function testGetNameForProductGroupView()
    {
        $adGroupId = 111111;
        $criterionId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/productGroupViews/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forProductGroupView(
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        ));

        $names = ProductGroupViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($adGroupId, $names['adgroup_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forRecommendation()
     */
    public function testGetNameForRecommendation()
    {
        $recommendationId = 'a1b2c3d4';
        $expectedResourceName =
            sprintf('customers/%s/recommendations/%s', self::CUSTOMER_ID, $recommendationId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forRecommendation(self::CUSTOMER_ID, $recommendationId)
        );

        $names = RecommendationServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($recommendationId, $names['recommendation_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forRemarketingAction()
     */
    public function testGetNameForRemarketingAction()
    {
        $remarketingActionId = 111111;
        $expectedResourceName =
            sprintf('customers/%s/remarketingActions/%s', self::CUSTOMER_ID, $remarketingActionId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forRemarketingAction(self::CUSTOMER_ID, $remarketingActionId)
        );

        $names = RemarketingActionServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($remarketingActionId, $names['remarketing_action_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forSearchTermView()
     */
    public function testGetNameForSearchTermView()
    {
        $campaignId = 111111;
        $adGroupId = 222222;
        $searchTerm = 'base64';
        $expectedResourceName = sprintf(
            'customers/%s/searchTermViews/%s~%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $adGroupId,
            $searchTerm
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forSearchTermView(
                self::CUSTOMER_ID,
                $campaignId,
                $adGroupId,
                $searchTerm
            )
        );

        $names = SearchTermViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($campaignId, $names['campaign_id']);
        $this->assertEquals($adGroupId, $names['ad_group_id']);
        $this->assertEquals($searchTerm, $names['query']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forSharedCriterion()
     */
    public function testGetNameForSharedCriterion()
    {
        $sharedSetId = 111111;
        $criterionId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/sharedCriteria/%s~%s',
            self::CUSTOMER_ID,
            $sharedSetId,
            $criterionId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forSharedCriterion(
            self::CUSTOMER_ID,
            $sharedSetId,
            $criterionId
        ));

        $names = SharedCriterionServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($sharedSetId, $names['shared_set_id']);
        $this->assertEquals($criterionId, $names['criterion_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forSharedSet()
     */
    public function testGetNameForSharedSet()
    {
        $sharedSetId = 111111;
        $expectedResourceName =
            sprintf('customers/%s/sharedSets/%s', self::CUSTOMER_ID, $sharedSetId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forSharedSet(self::CUSTOMER_ID, $sharedSetId)
        );

        $names = SharedSetServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($sharedSetId, $names['shared_set_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forShoppingPerformanceView()
     */
    public function testGetNameForShoppingPerformanceView()
    {
        $expectedResourceName =
            sprintf('customers/%s/shoppingPerformanceView', self::CUSTOMER_ID);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forShoppingPerformanceView(self::CUSTOMER_ID)
        );

        $names = ShoppingPerformanceViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forThirdPartyAppAnalyticsLinkName()
     */
    public function testGetNameForThirdPartyAppAnalyticsLink()
    {
        $thirdPartyAppAnalyticsLinkId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/thirdPartyAppAnalyticsLinks/%s',
            self::CUSTOMER_ID,
            $thirdPartyAppAnalyticsLinkId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forThirdPartyAppAnalyticsLinkName(
                self::CUSTOMER_ID,
                $thirdPartyAppAnalyticsLinkId
            )
        );

        $names = ThirdPartyAppAnalyticsLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals(
            $thirdPartyAppAnalyticsLinkId,
            $names['customer_link_id']
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forTopicConstant()
     */
    public function testGetNameForTopicConstant()
    {
        $topicId = 222222;
        $expectedResourceName =
            sprintf('topicConstants/%s', $topicId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forTopicConstant($topicId)
        );

        $names = TopicConstantServiceClient::parseName($expectedResourceName);
        $this->assertEquals($topicId, $names['topic_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forUserInterest()
     */
    public function testGetNameForUserInterest()
    {
        $userInterestId = 111111;
        $expectedResourceName =
            sprintf('customers/%s/userInterests/%s', self::CUSTOMER_ID, $userInterestId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forUserInterest(self::CUSTOMER_ID, $userInterestId)
        );

        $names = UserInterestServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($userInterestId, $names['user_interest_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forUserList()
     */
    public function testGetNameForUserList()
    {
        $userListId = 111111;
        $expectedResourceName =
            sprintf('customers/%s/userLists/%s', self::CUSTOMER_ID, $userListId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forUserList(self::CUSTOMER_ID, $userListId)
        );

        $names = UserListServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($userListId, $names['user_list_id']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\V6\ResourceNames::forVideo()
     */
    public function testGetNameForVideo()
    {
        $videoId = 111111;
        $expectedResourceName =
            sprintf('customers/%s/videos/%s', self::CUSTOMER_ID, $videoId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forVideo(self::CUSTOMER_ID, $videoId)
        );

        $names = VideoServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer_id']);
        $this->assertEquals($videoId, $names['video_id']);
    }
}
