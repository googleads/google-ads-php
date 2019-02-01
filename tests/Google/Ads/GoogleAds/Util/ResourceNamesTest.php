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

namespace Google\Ads\GoogleAds\Util;

use Google\Ads\GoogleAds\V0\Services\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V0\Services\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V0\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V0\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V0\Services\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V0\Services\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V0\Services\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V0\Services\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V0\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V0\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V0\Services\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V0\Services\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V0\Services\LanguageConstantServiceClient;
use Google\Ads\GoogleAds\V0\Services\RecommendationServiceClient;
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
            sprintf('customers/%s/adGroupAds/%s_%s', self::CUSTOMER_ID, $adGroupId, $adId);
        $this->assertEquals(
            $expectedResourceName,
            ResourceNames::forAdGroupAd(self::CUSTOMER_ID, $adGroupId, $adId)
        );

        $names = AdGroupAdServiceClient::parseName($expectedResourceName);
        $this->assertEquals(self::CUSTOMER_ID, $names['customer']);
        $this->assertEquals("{$adGroupId}_{$adId}", $names['ad_group_ad']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroupBidModifier()
     */
    public function testGetNameForAdGroupBidModifier()
    {
        $adGroupId = 111111;
        $criterionId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/adGroupBidModifiers/%s_%s',
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
        $this->assertEquals("{$adGroupId}_{$criterionId}", $names['ad_group_bid_modifier']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forAdGroupCriterion()
     */
    public function testGetNameForAdGroupCriterion()
    {
        $adGroupId = 111111;
        $criterionId = 3333333;
        $expectedResourceName = sprintf(
            'customers/%s/adGroupCriteria/%s_%s',
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
        $this->assertEquals("{$adGroupId}_{$criterionId}", $names['ad_group_criteria']);
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
            'customers/%s/campaignCriteria/%s_%s',
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
        $this->assertEquals("{$campaignId}_{$criterionId}", $names['campaign_criteria']);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Util\ResourceNames::forCampaign()
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
