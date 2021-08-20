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
    public const ACCESS_ROLE = 'accessRole';
    public const ADJUSTMENT_DATE_TIME = 'adjustmentDateTime';
    public const ADJUSTMENT_TYPE = 'adjustmentType';
    public const ADVERTISER_UPLOAD_DATE_TIME = 'advertiserUploadDateTime';
    public const AD_ID = 'adId';
    public const AD_GROUP_ID = 'adGroupId';
    public const AD_GROUP_IDS = 'adGroupIds';
    public const ARTIFACT_NAME = 'artifactName';
    public const ATTRIBUTE_VALUE = 'attributeValue';
    public const BASE_CAMPAIGN_ID = 'baseCampaignId';
    public const BID_MODIFIER_VALUE = 'bidModifierValue';
    public const BILLING_SETUP_ID = 'billingSetupId';
    public const BRIDGE_MAP_VERSION_ID = 'bridgeMapVersionId';
    public const BUSINESS_ACCOUNT_IDENTIFIER = 'businessAccountIdentifier';
    public const BUSINESS_LOCATION_ID = 'businessLocationId';
    public const BUSINESS_NAME = 'businessName';
    public const CALL_START_DATE_TIME = 'callStartDateTime';
    public const CALLER_ID = 'callerId';
    public const CALLOUT_TEXT = 'calloutText';
    public const CAMPAIGN_BUDGET_ID = 'campaignBudgetId';
    public const CAMPAIGN_EXPERIMENT_ID = 'campaignExperimentId';
    public const CAMPAIGN_ID = 'campaignId';
    public const CAMPAIGN_IDS = 'campaignIds';
    public const CARRIER_COUNTRY_CODE = 'carrierCountryCode';
    public const CHAIN_ID = 'chainId';
    public const CHECK_IN_DAY_CRITERION_ID = 'checkInDayCriterionId';
    public const CONVERSION_ACTION_ID = 'conversionActionId';
    public const CONVERSION_ACTION_IDS = 'conversionActionIds';
    public const CONVERSION_CUSTOM_VARIABLE_ID = 'conversionCustomVariableId';
    public const CONVERSION_CUSTOM_VARIABLE_VALUE = 'conversionCustomVariableValue';
    public const CONVERSION_DATE_TIME = 'conversionDateTime';
    public const CONVERSION_RATE_MODIFIER = "conversionRateModifier";
    public const CONVERSION_VALUE = 'conversionValue';
    public const COUNTRY_CODE = 'countryCode';
    public const CPC_BID_CEILING_MICRO_AMOUNT = 'cpcBidCeilingMicroAmount';
    public const CPC_BID_MICRO_AMOUNT = 'cpcBidMicroAmount';
    public const CRITERION_ID = 'criterionId';
    public const CUSTOMER_ID = 'customerId';
    public const CUSTOM_KEY = 'customKey';
    public const DRAFT_ID = 'draftId';
    public const EMAIL_ADDRESS = 'emailAddress';
    public const END_DATE_TIME = "endDateTime";
    public const EXTERNAL_ID = 'externalId';
    public const FEED_ID = 'feedId';
    public const FEED_ITEM_ID = 'feedItemId';
    public const FEED_ITEM_IDS = 'feedItemIds';
    public const FEED_ITEM_SET_ID = 'feedItemSetId';
    public const FLIGHT_PLACEHOLDER_FIELD_NAME = 'flightPlaceholderFieldName';
    public const GCLID = 'gclid';
    public const GEO_TARGET_CONSTANT_ID = 'geoTargetConstantId';
    public const GMB_ACCESS_TOKEN = 'gmbAccessToken';
    public const GMB_EMAIL_ADDRESS = 'gmbEmailAddress';
    public const HOTEL_CENTER_ACCOUNT_ID = 'hotelCenterAccountId';
    public const IMAGE_ASSET_ID = 'imageAssetId';
    public const ITEM_ID = 'itemId';
    public const KEYWORD_PLAN_ID = 'keywordPlanId';
    public const KEYWORD_TEXT = 'keywordText';
    public const KEYWORD_TEXTS = 'keywordTexts';
    public const LABEL_ID = "labelId";
    public const LANGUAGE_CODE = 'languageCode';
    public const LANGUAGE_ID = 'languageId';
    public const LANGUAGE_NAME = 'languageName';
    public const LOCALE = 'locale';
    public const LOCATION_ID = 'locationId';
    public const LOCATION_IDS = 'locationIds';
    public const LOCATION_NAMES = 'locationNames';
    public const LOGIN_CUSTOMER_ID = 'loginCustomerId';
    public const MANAGER_CUSTOMER_ID = 'managerCustomerId';
    public const MARKETING_IMAGE_ASSET_ID = 'marketingImageAssetId';
    public const MERCHANT_CENTER_ACCOUNT_ID = 'merchantCenterAccountId';
    public const OFFLINE_USER_DATA_JOB_TYPE = 'offlineUserDataJobType';
    public const OUTPUT_FILE_PATH = 'outputFilePath';
    public const PAGE_URL = 'pageUrl';
    public const PARTNER_ID = 'partnerId';
    public const PAYMENTS_ACCOUNT_ID = 'paymentsAccountId';
    public const PAYMENTS_PROFILE_ID = 'paymentsProfileId';
    public const PERCENT_CPC_BID_MICRO_AMOUNT = 'percentCpcBidMicroAmount';
    public const RECOMMENDATION_ID = 'recommendationId';
    public const RESTATEMENT_VALUE = 'restatementValue';
    public const CREATE_DEFAULT_LISTING_GROUP = 'createDefaultListingGroup';
    public const DELETE_EXISTING_FEEDS = 'deleteExistingFeeds';
    public const REPLACE_EXISTING_TREE = 'replaceExistingTree';
    public const QUANTITY = 'quantity';
    public const SITELINK_TEXT = 'sitelinkText';
    public const SQUARE_MARKETING_IMAGE_ASSET_ID = 'squareMarketingImageAssetId';
    public const START_DATE_TIME = "startDateTime";
    public const USER_LIST_ID = 'userListId';
    public const USER_LIST_IDS = 'userListIds';

    public static $ARGUMENTS_TO_DESCRIPTIONS = [
        self::ACCESS_ROLE => 'The user access role',
        self::ADJUSTMENT_DATE_TIME => 'The adjustment date time',
        self::ADJUSTMENT_TYPE => 'The adjustment type',
        self::ADVERTISER_UPLOAD_DATE_TIME => 'The advertiser upload date time',
        self::AD_ID => 'The ad ID',
        self::AD_GROUP_ID => 'The ad group ID',
        self::AD_GROUP_IDS => 'The ad group IDs',
        self::ARTIFACT_NAME => 'The artifact name',
        self::ATTRIBUTE_VALUE => 'The attribute value',
        self::BASE_CAMPAIGN_ID => 'The base campaign ID',
        self::BID_MODIFIER_VALUE => 'The bid modifier value',
        self::BILLING_SETUP_ID => 'The billing setup ID',
        self::BRIDGE_MAP_VERSION_ID
            => 'The version of partner IDs to be used for store-sale uploads',
        self::BUSINESS_ACCOUNT_IDENTIFIER => 'The account number of the GMB account',
        self::BUSINESS_LOCATION_ID => 'The GMB location ID',
        self::BUSINESS_NAME => 'The GMB business name',
        self::CALL_START_DATE_TIME => 'The call start date time',
        self::CALLER_ID => 'The caller ID',
        self::CALLOUT_TEXT => 'The callout text',
        self::CAMPAIGN_BUDGET_ID => 'The campaign budget ID',
        self::CAMPAIGN_EXPERIMENT_ID => 'The campaign experiment ID',
        self::CAMPAIGN_ID => 'The campaign ID',
        self::CAMPAIGN_IDS => 'The campaign IDs',
        self::CARRIER_COUNTRY_CODE => 'The carrier country code',
        self::CHAIN_ID => 'The retail chain ID',
        self::CHECK_IN_DAY_CRITERION_ID => 'The hotel check-in day criterion ID',
        self::CONVERSION_ACTION_ID => 'The conversion action ID',
        self::CONVERSION_ACTION_IDS => 'The conversion action IDs',
        self::CONVERSION_CUSTOM_VARIABLE_ID => 'The conversion custom variable ID',
        self::CONVERSION_CUSTOM_VARIABLE_VALUE => 'The conversion custom variable value',
        self::CONVERSION_DATE_TIME => 'The conversion date time',
        self::CONVERSION_RATE_MODIFIER => 'The conversion rate modifier',
        self::CONVERSION_VALUE => 'The conversion value',
        self::COUNTRY_CODE => 'The country code',
        self::CPC_BID_CEILING_MICRO_AMOUNT => 'The CPC bid ceiling micro amount',
        self::CPC_BID_MICRO_AMOUNT => 'The CPC bid micro amount',
        self::CRITERION_ID => 'The criterion ID',
        self::CUSTOMER_ID => 'The customer ID without dashes',
        self::CUSTOM_KEY => 'The custom key',
        self::DRAFT_ID => 'The draft ID',
        self::EMAIL_ADDRESS => 'The email address',
        self::END_DATE_TIME => 'The end date time',
        self::EXTERNAL_ID => 'The external ID',
        self::FEED_ID => 'The feed ID',
        self::FEED_ITEM_ID => 'The feed item ID',
        self::FEED_ITEM_IDS => 'The feed item IDs',
        self::FEED_ITEM_SET_ID => 'The feed item set ID',
        self::FLIGHT_PLACEHOLDER_FIELD_NAME => 'The flight placeholder field name',
        self::GCLID => 'The Google Click ID',
        self::GEO_TARGET_CONSTANT_ID => 'The geo target constant ID',
        self::GMB_ACCESS_TOKEN => 'The access token used for uploading GMB location feed data',
        self::GMB_EMAIL_ADDRESS => 'The email address associated with the GMB account',
        self::HOTEL_CENTER_ACCOUNT_ID => 'The hotel center account ID',
        self::IMAGE_ASSET_ID => 'The image asset ID',
        self::ITEM_ID => 'The item ID',
        self::KEYWORD_PLAN_ID => 'The keyword plan ID',
        self::KEYWORD_TEXT => 'The keyword text',
        self::KEYWORD_TEXTS => 'The list of keyword texts',
        self::LABEL_ID => 'The label ID',
        self::LANGUAGE_CODE => 'The language code',
        self::LANGUAGE_ID => 'The language ID',
        self::LANGUAGE_NAME => 'The language name',
        self::LOCALE => 'The locale',
        self::LOCATION_ID => 'The location ID',
        self::LOCATION_IDS => 'The list of location IDs',
        self::LOCATION_NAMES => 'The list of location names',
        self::LOGIN_CUSTOMER_ID => 'The login customer ID',
        self::MANAGER_CUSTOMER_ID => 'The manager customer ID',
        self::MARKETING_IMAGE_ASSET_ID => 'The ID of marketing image asset',
        self::MERCHANT_CENTER_ACCOUNT_ID => 'The Merchant center account ID',
        self::OFFLINE_USER_DATA_JOB_TYPE => 'The offline user data job type',
        self::OUTPUT_FILE_PATH => 'The output file path',
        self::PAGE_URL => 'The page URL',
        self::PARTNER_ID => 'The partner ID',
        self::PAYMENTS_ACCOUNT_ID => 'The payments account ID',
        self::PAYMENTS_PROFILE_ID => 'The payments profile ID',
        self::PERCENT_CPC_BID_MICRO_AMOUNT =>
            'The CPC bid micro amount for the Percent CPC bidding strategy',
        self::RECOMMENDATION_ID => 'The recommendation ID',
        self::RESTATEMENT_VALUE => 'The restatement value',
        self::CREATE_DEFAULT_LISTING_GROUP =>
            'Whether it should create a default listing group',
        self::DELETE_EXISTING_FEEDS =>
            'Whether it should delete the existing feeds',
        self::REPLACE_EXISTING_TREE =>
            'Whether it should replace the existing listing group tree on an ad group',
        self::QUANTITY => 'The quantity',
        self::SITELINK_TEXT => 'The sitelink text',
        self::SQUARE_MARKETING_IMAGE_ASSET_ID => 'The ID of square marketing image asset',
        self::START_DATE_TIME => 'The start date time',
        self::USER_LIST_ID => 'The user list ID',
        self::USER_LIST_IDS => 'The user list IDs'
    ];
}
