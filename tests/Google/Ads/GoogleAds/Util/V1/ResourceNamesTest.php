<?php
/*
 * Copyright 2018 Google LLC
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

namespace Google\Ads\GoogleAds\Util\V1;

use Google\Ads\GoogleAds\V1\Services\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V1\Services\AccountBudgetServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupAdLabelServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupAudienceViewServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupCriterionLabelServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupFeedServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupLabelServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupSimulationServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdParameterServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdScheduleViewServiceClient;
use Google\Ads\GoogleAds\V1\Services\AgeRangeViewServiceClient;
use Google\Ads\GoogleAds\V1\Services\AssetServiceClient;
use Google\Ads\GoogleAds\V1\Services\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V1\Services\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignAudienceViewServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignBidModifierServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignCriterionSimulationServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignDraftServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignExperimentServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignFeedServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignLabelServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignSharedSetServiceClient;
use Google\Ads\GoogleAds\V1\Services\CarrierConstantServiceClient;
use Google\Ads\GoogleAds\V1\Services\ChangeStatusServiceClient;
use Google\Ads\GoogleAds\V1\Services\ClickViewServiceClient;
use Google\Ads\GoogleAds\V1\Services\ConversionActionServiceClient;
use Google\Ads\GoogleAds\V1\Services\CustomInterestServiceClient;
use Google\Ads\GoogleAds\V1\Services\CustomerClientLinkServiceClient;
use Google\Ads\GoogleAds\V1\Services\CustomerClientServiceClient;
use Google\Ads\GoogleAds\V1\Services\CustomerExtensionSettingServiceClient;
use Google\Ads\GoogleAds\V1\Services\CustomerFeedServiceClient;
use Google\Ads\GoogleAds\V1\Services\CustomerLabelServiceClient;
use Google\Ads\GoogleAds\V1\Services\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V1\Services\CustomerNegativeCriterionServiceClient;
use Google\Ads\GoogleAds\V1\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V1\Services\DetailPlacementViewServiceClient;
use Google\Ads\GoogleAds\V1\Services\DisplayKeywordViewServiceClient;
use Google\Ads\GoogleAds\V1\Services\DomainCategoryServiceClient;
use Google\Ads\GoogleAds\V1\Services\ExpandedLandingPageViewServiceClient;
use Google\Ads\GoogleAds\V1\Services\ExtensionFeedItemServiceClient;
use Google\Ads\GoogleAds\V1\Services\FeedServiceClient;
use Google\Ads\GoogleAds\V1\Services\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V1\Services\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V1\Services\LabelServiceClient;
use Google\Ads\GoogleAds\V1\Services\LanguageConstantServiceClient;
use Google\Ads\GoogleAds\V1\Services\RecommendationServiceClient;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `ResourceNames`.
 *
 * @see ResourceNames
 * @small
 */
class ResourceNamesTest extends TestCase
{

    const CUSTOMER_ID = 1234567890;

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAccountBudget()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($accountBudgetId, $names['account_budget']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAccountBudgetProposal()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($accountBudgetProposalId, $names['account_budget_proposal']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroup()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($adGroupId, $names['ad_group']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroupAd()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$adGroupId}~{$adId}", $names['ad_group_ad']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroupAdLabel()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$adGroupId}~{$adId}~{$labelId}", $names['ad_group_ad_label']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroupAudienceView()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$adGroupId}~{$criterionId}", $names['ad_group_audience_view']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroupBidModifier()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$adGroupId}~{$criterionId}", $names['ad_group_bid_modifier']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroupCriterion()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$adGroupId}~{$criterionId}", $names['ad_group_criteria']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroupCriterionLabel()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals(
            "{$adGroupId}~{$criterionId}~{$labelId}",
            $names['ad_group_criterion_label']
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroupCriterionSimulation()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals(
            "{$adGroupId}~{$criterionId}~{$type}~{$modificationMethod}~{$startDate}~{$endDate}",
            $names['ad_group_criterion_simulation']
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroupExtensionSetting()
     */
    public function testGetNameForAdGroupExtensionSetting()
    {
        $adGroupId = 111111;
        $extensionType = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/adGroupExtensionSettings/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $extensionType
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$adGroupId}~{$extensionType}", $names['ad_group_extension_setting']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroupFeed()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$adGroupId}~{$feedId}", $names['ad_group_feed']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroupLabel()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$adGroupId}~{$labelId}", $names['ad_group_label']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroupSimulation()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals(
            "{$adGroupId}~{$type}~{$modificationMethod}~{$startDate}~{$endDate}",
            $names['ad_group_simulation']
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdParameter()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals(
            "{$adGroupId}~{$criterionId}~{$parameterIndex}",
            $names['ad_parameter']
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdScheduleView()
     */
    public function testGetNameForAdScheduleView()
    {
        $adGroupId = 111111;
        $criterionId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/adScheduleViews/%s~%s',
            self::CUSTOMER_ID,
            $adGroupId,
            $criterionId
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdScheduleView(self::CUSTOMER_ID, $adGroupId, $criterionId)
        );

        $names = AdScheduleViewServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$adGroupId}~{$criterionId}", $names['ad_schedule_view']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAgeRangeView()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$adGroupId}~{$criterionId}", $names['age_range_view']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAsset()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($assetId, $names['asset']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forBiddingStrategy()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($biddingStrategyId, $names['bidding_strategy']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forBillingSetup()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($billingSetupId, $names['billing_setup']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCampaignBudget()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($budgetId, $names['campaign_budget']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCampaign()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($campaignId, $names['campaign']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCampaignCriterion()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$campaignId}~{$criterionId}", $names['campaign_criteria']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCampaignAudienceView()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$campaignId}~{$criterionId}", $names['campaign_audience_view']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCampaignBidModifier()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$campaignId}~{$criterionId}", $names['campaign_bid_modifier']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCampaignCriterionSimulation()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals(
            "{$campaignId}~{$criterionId}~{$type}~{$modificationMethod}~{$startDate}~{$endDate}",
            $names['campaign_criterion_simulation']
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCampaignDraft()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$baseCampaignId}~{$draftId}", $names['campaign_draft']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCampaignExperiment()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($campaignExperimentId, $names['campaign_experiment']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCampaignExtensionSetting()
     */
    public function testGetNameForCampaignExtensionSetting()
    {
        $campaignId = 111111;
        $extensionType = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/campaignExtensionSettings/%s~%s',
            self::CUSTOMER_ID,
            $campaignId,
            $extensionType
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals(
            "{$campaignId}~{$extensionType}",
            $names['campaign_extension_setting']
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCampaignFeed()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$campaignId}~{$feedId}", $names['campaign_feed']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCampaignLabel()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$campaignId}~{$labelId}", $names['campaign_label']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCampaignSharedSet()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$campaignId}~{$sharedSetId}", $names['campaign_shared_set']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCarrierConstant()
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
        $this->assertEquals($criterionId, $names['carrier_constant']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forChangeStatus()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($changeStatusId, $names['change_status']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forClickView()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$date}~{$gclId}", $names['click_view']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forConversionAction()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($conversionActionId, $names['conversion_action']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCustomInterest()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($customInterestId, $names['custom_interest']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCustomer()
     */
    public function testGetNameForCustomer()
    {
        $expectedResourceName = sprintf('customers/%s', self::CUSTOMER_ID);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomer(self::CUSTOMER_ID)
        );

        $names = CustomerServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCustomerClient()
     */
    public function testGetNameForCustomerClient()
    {
        $customerClientId = 66666666;
        $expectedResourceName =
            sprintf('customers/%s/customerClients/%s', self::CUSTOMER_ID, $customerClientId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerClient(self::CUSTOMER_ID, $customerClientId)
        );

        $names = CustomerClientServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($customerClientId, $names['customer_client']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCustomerClientLink()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals(
            "{$clientCustomerId}~{$managerLinkId}",
            $names['customer_client_link']
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCustomerExtensionSetting()
     */
    public function testGetNameForCustomerExtensionSetting()
    {
        $extensionType = 66666666;
        $expectedResourceName = sprintf(
            'customers/%s/customerExtensionSettings/%s',
            self::CUSTOMER_ID,
            $extensionType
        );
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forCustomerExtensionSetting(self::CUSTOMER_ID, $extensionType)
        );

        $names = CustomerExtensionSettingServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($extensionType, $names['customer_extension_setting']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCustomerFeed()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($feedId, $names['customer_feed']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCustomerLabel()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($labelId, $names['customer_label']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCustomerManagerLink()
     */
    public function testGetNameForCustomerManagerLink()
    {
        $customerManagerId = 111111;
        $managerLinkId = 222222;
        $expectedResourceName = sprintf(
            'customers/%s/customerManagerLinks/%s~%s',
            self::CUSTOMER_ID,
            $customerManagerId,
            $managerLinkId
        );
        $this->assertEquals($expectedResourceName, ResourceNames::forCustomerManagerLink(
            self::CUSTOMER_ID,
            $customerManagerId,
            $managerLinkId
        ));

        $names = CustomerManagerLinkServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals(
            "{$customerManagerId}~{$managerLinkId}",
            $names['customer_manager_link']
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCustomerNegativeCriterion()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($criterionId, $names['customer_negative_criteria']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forDetailPlacementView()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$adGroupId}~{$placement}", $names['detail_placement_view']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forDisplayKeywordView()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$adGroupId}~{$criterionId}", $names['display_keyword_view']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forDomainCategory()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals(
            "{$campaignId}~{$category}~{$languageCode}",
            $names['domain_category']
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forExpandedLandingPageView()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($expandedFinalUrlFingerprint, $names['expanded_landing_page_view']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forExtensionFeedItem()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($feedItemId, $names['extension_feed_item']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forFeed()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($feedId, $names['feed']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forRecommendation()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($recommendationId, $names['recommendation']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forGeoTargetConstant()
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
        $this->assertEquals($japanTargetConstantId, $names['geo_target_constant']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forLabel()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($labelId, $names['label']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forLanguageConstant()
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
        $this->assertEquals($englishLanguageId, $names['language_constant']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forKeywordPlan()
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
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals($keywordPlanId, $names['keyword_plan']);
    }
}
