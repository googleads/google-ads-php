<?php
/**
 * Copyright 2018 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the 'License');
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an 'AS IS' BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Ads\GoogleAds\Examples\Utils;

/**
 * Provides argument name constants for examples.
 */
final class ArgumentNames
{
    const AD_ID = 'adId';
    const AD_GROUP_ID = 'adGroupId';
    const ARTIFACT_NAME = 'artifactName';
    const BID_MODIFIER_VALUE = 'bidModifierValue';
    const BILLING_SETUP_ID = 'billingSetupId';
    const CAMPAIGN_BUDGET_ID = 'campaignBudgetId';
    const CAMPAIGN_ID = 'campaignId';
    const CAMPAIGN_IDS = 'campaignIds';
    const CHECK_IN_DAY_CRITERION_ID = 'checkInDayCriterionId';
    const CPC_BID_CEILING_MICRO_AMOUNT = 'cpcBidCeilingMicroAmount';
    const CPC_BID_MICRO_AMOUNT = 'cpcBidMicroAmount';
    const CRITERION_ID = 'criterionId';
    const CUSTOMER_ID = 'customerId';
    const HOTEL_CENTER_ACCOUNT_ID = 'hotelCenterAccountId';
    const KEYWORD_TEXT = 'keywordText';
    const LOCALE = 'locale';
    const LOCATION_ID = 'locationId';
    const LOCATION_NAMES = 'locationNames';
    const MERCHANT_CENTER_ACCOUNT_ID = 'merchantCenterAccountId';
    const PERCENT_CPC_BID_MICRO_AMOUNT = 'percentCpcBidMicroAmount';
    const RECOMMENDATION_ID = 'recommendationId';
    const SHOULD_CREATE_DEFAULT_LISTING_GROUP = 'shouldCreateDefaultListingGroup';
    const SHOULD_REPLACE_EXISTING_TREE = 'shouldReplaceExistingTree';

    public static $ARGUMENTS_TO_DESCRIPTIONS = [
        self::AD_ID => 'The ad ID',
        self::AD_GROUP_ID => 'The ad group ID',
        self::ARTIFACT_NAME => 'The artifact name',
        self::BID_MODIFIER_VALUE => 'The bid modifier value',
        self::BILLING_SETUP_ID => 'The billing setup ID',
        self::CAMPAIGN_BUDGET_ID => 'The campaign budget ID',
        self::CAMPAIGN_ID => 'The campaign ID',
        self::CAMPAIGN_IDS => 'The campaign IDs',
        self::CPC_BID_CEILING_MICRO_AMOUNT => 'The CPC bid ceiling micro amount',
        self::CPC_BID_MICRO_AMOUNT => 'The CPC bid micro amount',
        self::CRITERION_ID => 'The criterion ID',
        self::CUSTOMER_ID => 'The customer ID without dashes',
        self::HOTEL_CENTER_ACCOUNT_ID => 'The hotel center account ID',
        self::CHECK_IN_DAY_CRITERION_ID => 'The hotel check-in day criterion ID',
        self::KEYWORD_TEXT => 'The keyword text',
        self::LOCALE => 'The locale',
        self::LOCATION_ID => 'The location ID',
        self::LOCATION_NAMES => 'The list of location names',
        self::MERCHANT_CENTER_ACCOUNT_ID => 'The Merchant center account ID',
        self::PERCENT_CPC_BID_MICRO_AMOUNT =>
            'The CPC bid micro amount for the Percent CPC bidding strategy',
        self::RECOMMENDATION_ID => 'The recommendation ID',
        self::SHOULD_CREATE_DEFAULT_LISTING_GROUP =>
            'Whether it should create a default listing group',
        self::SHOULD_REPLACE_EXISTING_TREE =>
            'Whether it should replace the existing listing group tree on an ad group'
    ];
}
