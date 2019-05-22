<?php
/**
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

use Google\Ads\GoogleAds\V1\Services\AdGroupAdServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupBidModifierServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V1\Services\AdGroupServiceClient;
use Google\Ads\GoogleAds\V1\Services\BiddingStrategyServiceClient;
use Google\Ads\GoogleAds\V1\Services\BillingSetupServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignBudgetServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignCriterionServiceClient;
use Google\Ads\GoogleAds\V1\Services\CampaignServiceClient;
use Google\Ads\GoogleAds\V1\Services\CustomerManagerLinkServiceClient;
use Google\Ads\GoogleAds\V1\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V1\Services\GeoTargetConstantServiceClient;
use Google\Ads\GoogleAds\V1\Services\KeywordPlanServiceClient;
use Google\Ads\GoogleAds\V1\Services\LabelServiceClient;
use Google\Ads\GoogleAds\V1\Services\LanguageConstantServiceClient;
use Google\Ads\GoogleAds\V1\Services\RecommendationServiceClient;

/**
 * Provides resource names for Google Ads API entities.
 */
final class ResourceNames
{

    /**
     * Generates resource name for an ad group.
     *
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @return string the ad group resource name
     */
    public static function forAdGroup($customerId, $adGroupId)
    {
        return AdGroupServiceClient::adGroupName($customerId, $adGroupId);
    }

    /**
     * Generates resource name for an ad group ad.
     *
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param int $adId the ad ID
     * @return string the ad group ad resource name
     */
    public static function forAdGroupAd($customerId, $adGroupId, $adId)
    {
        return AdGroupAdServiceClient::adGroupAdName($customerId, "{$adGroupId}~{$adId}");
    }

    /**
     * Generates resource name for an ad group bid modifier.
     *
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param int $criterionId the criterion ID
     * @return string the ad group bid modifier resource name
     */
    public static function forAdGroupBidModifier($customerId, $adGroupId, $criterionId)
    {
        return AdGroupBidModifierServiceClient::adGroupBidModifierName(
            $customerId,
            "{$adGroupId}~{$criterionId}"
        );
    }

    /**
     * Generates resource name for an ad group criterion.
     *
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param int $criterionId the criterion ID
     * @return string the ad group criterion resource name
     */
    public static function forAdGroupCriterion($customerId, $adGroupId, $criterionId)
    {
        return AdGroupCriterionServiceClient::adGroupCriteriaName(
            $customerId,
            "{$adGroupId}~{$criterionId}"
        );
    }

    /**
     * Generates resource name for a bidding strategy.
     *
     * @param int $customerId the customer ID
     * @param int $biddingStrategyId the bidding strategy ID
     * @return string the bidding strategy resource name
     */
    public static function forBiddingStrategy($customerId, $biddingStrategyId)
    {
        return BiddingStrategyServiceClient::biddingStrategyName($customerId, $biddingStrategyId);
    }

    /**
     * Generates resource name for a billing setup.
     *
     * @param int $customerId the customer ID
     * @param int $billingSetupId the billing setup ID
     * @return string the billing setup resource name
     */
    public static function forBillingSetup($customerId, $billingSetupId)
    {
        return BillingSetupServiceClient::billingSetupName($customerId, $billingSetupId);
    }

    /**
     * Generates resource name for a campaign budget.
     *
     * @param int $customerId the customer ID
     * @param int $budgetId the budget ID
     * @return string the campaign budget resource name
     */
    public static function forCampaignBudget($customerId, $budgetId)
    {
        return CampaignBudgetServiceClient::campaignBudgetName($customerId, $budgetId);
    }

    /**
     * Generates resource name for a campaign.
     *
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID
     * @return string the campaign resource name
     */
    public static function forCampaign($customerId, $campaignId)
    {
        return CampaignServiceClient::campaignName($customerId, $campaignId);
    }

    /**
     * Generates resource name for a campaign criterion.
     *
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID
     * @param int $criterionId the criterion ID
     * @return string the campaign criterion resource name
     */
    public static function forCampaignCriterion($customerId, $campaignId, $criterionId)
    {
        return CampaignCriterionServiceClient::campaignCriteriaName(
            $customerId,
            "{$campaignId}~{$criterionId}"
        );
    }

    /**
     * Generates resource name for a customer.
     *
     * @param int $customerId the customer ID
     * @return string the customer resource name
     */
    public static function forCustomer($customerId)
    {
        return CustomerServiceClient::customerName($customerId);
    }

    /**
     * Generates resource name for a customer manager link.
     *
     * @param int $clientCustomerId the client customer ID
     * @param int $managerCustomerId the manager customer ID
     * @param int $managerLinkId the manager link ID
     * @return string the customer manager link resource name
     */
    public static function forCustomerManagerLink(
        $clientCustomerId,
        $managerCustomerId,
        $managerLinkId
    ) {
        return CustomerManagerLinkServiceClient::customerManagerLinkName(
            $clientCustomerId,
            "{$managerCustomerId}~{$managerLinkId}"
        );
    }

    /**
     * Generates resource name for a recommendation.
     *
     * @param int $customerId the customer ID
     * @param int $recommendationId the recommendation ID
     * @return string the recommendation resource name
     */
    public static function forRecommendation($customerId, $recommendationId)
    {
        return RecommendationServiceClient::recommendationName($customerId, $recommendationId);
    }

    /**
     * Generates resource name for a geo target constant.
     *
     * @param int $geoTargetConstantId the geo target constant ID
     * @return string the geo target constant resource name
     */
    public static function forGeoTargetConstant($geoTargetConstantId)
    {
        return GeoTargetConstantServiceClient::geoTargetConstantName($geoTargetConstantId);
    }

    /**
     * Generates resource name for a label.
     *
     * @param int $customerId the customer ID
     * @param int $labelId the label ID
     */
    public static function forLabel($customerId, $labelId)
    {
        return LabelServiceClient::labelName($customerId, $labelId);
    }

    /**
     * Generates resource name for a language constant.
     *
     * @param int $languageConstantId the language constant ID
     * @return string the language constant resource name
     */
    public static function forLanguageConstant($languageConstantId)
    {
        return LanguageConstantServiceClient::languageConstantName($languageConstantId);
    }

    /**
     * Generates resource name for a keyword plan.
     *
     * @param int $customerId the customer ID
     * @param int $keywordPlanId the keyword plan ID
     */
    public static function forKeywordPlan($customerId, $keywordPlanId)
    {
        return KeywordPlanServiceClient::keywordPlanName($customerId, $keywordPlanId);
    }
}
