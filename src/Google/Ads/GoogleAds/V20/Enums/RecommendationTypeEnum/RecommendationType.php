<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/recommendation_type.proto

namespace Google\Ads\GoogleAds\V20\Enums\RecommendationTypeEnum;

use UnexpectedValueException;

/**
 * Types of recommendations.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.RecommendationTypeEnum.RecommendationType</code>
 */
class RecommendationType
{
    /**
     * Not specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * Used for return value only. Represents value unknown in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Provides optimized budget recommendations for campaigns.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET = 2;</code>
     */
    const CAMPAIGN_BUDGET = 2;
    /**
     * Keyword recommendation.
     *
     * Generated from protobuf enum <code>KEYWORD = 3;</code>
     */
    const KEYWORD = 3;
    /**
     * Recommendation to add a new text ad.
     *
     * Generated from protobuf enum <code>TEXT_AD = 4;</code>
     */
    const TEXT_AD = 4;
    /**
     * Recommendation to update a campaign to use a Target CPA bidding strategy.
     *
     * Generated from protobuf enum <code>TARGET_CPA_OPT_IN = 5;</code>
     */
    const TARGET_CPA_OPT_IN = 5;
    /**
     * Recommendation to update a campaign to use the Maximize Conversions
     * bidding strategy.
     *
     * Generated from protobuf enum <code>MAXIMIZE_CONVERSIONS_OPT_IN = 6;</code>
     */
    const MAXIMIZE_CONVERSIONS_OPT_IN = 6;
    /**
     * Recommendation to enable Enhanced Cost Per Click for a campaign.
     *
     * Generated from protobuf enum <code>ENHANCED_CPC_OPT_IN = 7;</code>
     */
    const ENHANCED_CPC_OPT_IN = 7;
    /**
     * Recommendation to start showing your campaign's ads on Google Search
     * Partners Websites.
     *
     * Generated from protobuf enum <code>SEARCH_PARTNERS_OPT_IN = 8;</code>
     */
    const SEARCH_PARTNERS_OPT_IN = 8;
    /**
     * Recommendation to update a campaign to use a Maximize Clicks bidding
     * strategy.
     *
     * Generated from protobuf enum <code>MAXIMIZE_CLICKS_OPT_IN = 9;</code>
     */
    const MAXIMIZE_CLICKS_OPT_IN = 9;
    /**
     * Recommendation to start using the "Optimize" ad rotation setting for the
     * given ad group.
     *
     * Generated from protobuf enum <code>OPTIMIZE_AD_ROTATION = 10;</code>
     */
    const OPTIMIZE_AD_ROTATION = 10;
    /**
     * Recommendation to change an existing keyword from one match type to a
     * broader match type.
     *
     * Generated from protobuf enum <code>KEYWORD_MATCH_TYPE = 14;</code>
     */
    const KEYWORD_MATCH_TYPE = 14;
    /**
     * Recommendation to move unused budget from one budget to a constrained
     * budget.
     *
     * Generated from protobuf enum <code>MOVE_UNUSED_BUDGET = 15;</code>
     */
    const MOVE_UNUSED_BUDGET = 15;
    /**
     * Budget recommendation for campaigns that are expected to become
     * budget-constrained in the future (as opposed to the CAMPAIGN_BUDGET
     * recommendation, which applies to campaigns that are currently
     * budget-constrained).
     *
     * Generated from protobuf enum <code>FORECASTING_CAMPAIGN_BUDGET = 16;</code>
     */
    const FORECASTING_CAMPAIGN_BUDGET = 16;
    /**
     * Recommendation to update a campaign to use a Target ROAS bidding
     * strategy.
     *
     * Generated from protobuf enum <code>TARGET_ROAS_OPT_IN = 17;</code>
     */
    const TARGET_ROAS_OPT_IN = 17;
    /**
     * Recommendation to add a new responsive search ad.
     *
     * Generated from protobuf enum <code>RESPONSIVE_SEARCH_AD = 18;</code>
     */
    const RESPONSIVE_SEARCH_AD = 18;
    /**
     * Budget recommendation for campaigns whose ROI is predicted to increase
     * with a budget adjustment.
     *
     * Generated from protobuf enum <code>MARGINAL_ROI_CAMPAIGN_BUDGET = 19;</code>
     */
    const MARGINAL_ROI_CAMPAIGN_BUDGET = 19;
    /**
     * Recommendation to add broad match versions of keywords for fully
     * automated conversion-based bidding campaigns.
     *
     * Generated from protobuf enum <code>USE_BROAD_MATCH_KEYWORD = 20;</code>
     */
    const USE_BROAD_MATCH_KEYWORD = 20;
    /**
     * Recommendation to add new responsive search ad assets.
     *
     * Generated from protobuf enum <code>RESPONSIVE_SEARCH_AD_ASSET = 21;</code>
     */
    const RESPONSIVE_SEARCH_AD_ASSET = 21;
    /**
     * Recommendation to upgrade a Smart Shopping campaign to a Performance Max
     * campaign.
     *
     * Generated from protobuf enum <code>UPGRADE_SMART_SHOPPING_CAMPAIGN_TO_PERFORMANCE_MAX = 22;</code>
     */
    const UPGRADE_SMART_SHOPPING_CAMPAIGN_TO_PERFORMANCE_MAX = 22;
    /**
     * Recommendation to improve strength of responsive search ad.
     *
     * Generated from protobuf enum <code>RESPONSIVE_SEARCH_AD_IMPROVE_AD_STRENGTH = 23;</code>
     */
    const RESPONSIVE_SEARCH_AD_IMPROVE_AD_STRENGTH = 23;
    /**
     * Recommendation to update a campaign to use Display Expansion.
     *
     * Generated from protobuf enum <code>DISPLAY_EXPANSION_OPT_IN = 24;</code>
     */
    const DISPLAY_EXPANSION_OPT_IN = 24;
    /**
     * Recommendation to upgrade a Local campaign to a Performance Max
     * campaign.
     *
     * Generated from protobuf enum <code>UPGRADE_LOCAL_CAMPAIGN_TO_PERFORMANCE_MAX = 25;</code>
     */
    const UPGRADE_LOCAL_CAMPAIGN_TO_PERFORMANCE_MAX = 25;
    /**
     * Recommendation to raise target CPA when it is too low and there are very
     * few or no conversions.
     * It is applied asynchronously and can take minutes
     * depending on the number of ad groups there are in the related campaign.
     *
     * Generated from protobuf enum <code>RAISE_TARGET_CPA_BID_TOO_LOW = 26;</code>
     */
    const RAISE_TARGET_CPA_BID_TOO_LOW = 26;
    /**
     * Recommendation to raise the budget in advance of a seasonal event that is
     * forecasted to increase traffic, and change bidding strategy from maximize
     * conversion value to target ROAS.
     *
     * Generated from protobuf enum <code>FORECASTING_SET_TARGET_ROAS = 27;</code>
     */
    const FORECASTING_SET_TARGET_ROAS = 27;
    /**
     * Recommendation to add callout assets to campaign or customer level.
     *
     * Generated from protobuf enum <code>CALLOUT_ASSET = 28;</code>
     */
    const CALLOUT_ASSET = 28;
    /**
     * Recommendation to add sitelink assets to campaign or customer level.
     *
     * Generated from protobuf enum <code>SITELINK_ASSET = 29;</code>
     */
    const SITELINK_ASSET = 29;
    /**
     * Recommendation to add call assets to campaign or customer level.
     *
     * Generated from protobuf enum <code>CALL_ASSET = 30;</code>
     */
    const CALL_ASSET = 30;
    /**
     * Recommendation to add the age group attribute to offers that are
     * demoted because of a missing age group.
     *
     * Generated from protobuf enum <code>SHOPPING_ADD_AGE_GROUP = 31;</code>
     */
    const SHOPPING_ADD_AGE_GROUP = 31;
    /**
     * Recommendation to add a color to offers that are demoted
     * because of a missing color.
     *
     * Generated from protobuf enum <code>SHOPPING_ADD_COLOR = 32;</code>
     */
    const SHOPPING_ADD_COLOR = 32;
    /**
     * Recommendation to add a gender to offers that are demoted
     * because of a missing gender.
     *
     * Generated from protobuf enum <code>SHOPPING_ADD_GENDER = 33;</code>
     */
    const SHOPPING_ADD_GENDER = 33;
    /**
     * Recommendation to add a GTIN (Global Trade Item Number) to offers
     * that are demoted because of a missing GTIN.
     *
     * Generated from protobuf enum <code>SHOPPING_ADD_GTIN = 34;</code>
     */
    const SHOPPING_ADD_GTIN = 34;
    /**
     * Recommendation to add more identifiers to offers that are demoted because
     * of missing identifiers.
     *
     * Generated from protobuf enum <code>SHOPPING_ADD_MORE_IDENTIFIERS = 35;</code>
     */
    const SHOPPING_ADD_MORE_IDENTIFIERS = 35;
    /**
     * Recommendation to add the size to offers that are demoted
     * because of a missing size.
     *
     * Generated from protobuf enum <code>SHOPPING_ADD_SIZE = 36;</code>
     */
    const SHOPPING_ADD_SIZE = 36;
    /**
     * Recommendation informing a customer about a campaign that cannot serve
     * because no products are being targeted.
     *
     * Generated from protobuf enum <code>SHOPPING_ADD_PRODUCTS_TO_CAMPAIGN = 37;</code>
     */
    const SHOPPING_ADD_PRODUCTS_TO_CAMPAIGN = 37;
    /**
     * The shopping recommendation informing a customer about campaign with a
     * high percentage of disapproved products.
     *
     * Generated from protobuf enum <code>SHOPPING_FIX_DISAPPROVED_PRODUCTS = 38;</code>
     */
    const SHOPPING_FIX_DISAPPROVED_PRODUCTS = 38;
    /**
     * Recommendation to create a catch-all campaign that targets all offers.
     *
     * Generated from protobuf enum <code>SHOPPING_TARGET_ALL_OFFERS = 39;</code>
     */
    const SHOPPING_TARGET_ALL_OFFERS = 39;
    /**
     * Recommendation to fix Merchant Center account suspension issues.
     *
     * Generated from protobuf enum <code>SHOPPING_FIX_SUSPENDED_MERCHANT_CENTER_ACCOUNT = 40;</code>
     */
    const SHOPPING_FIX_SUSPENDED_MERCHANT_CENTER_ACCOUNT = 40;
    /**
     * Recommendation to fix Merchant Center account suspension warning issues.
     *
     * Generated from protobuf enum <code>SHOPPING_FIX_MERCHANT_CENTER_ACCOUNT_SUSPENSION_WARNING = 41;</code>
     */
    const SHOPPING_FIX_MERCHANT_CENTER_ACCOUNT_SUSPENSION_WARNING = 41;
    /**
     * Recommendation to migrate offers targeted by Regular Shopping Campaigns
     * to existing Performance Max campaigns.
     *
     * Generated from protobuf enum <code>SHOPPING_MIGRATE_REGULAR_SHOPPING_CAMPAIGN_OFFERS_TO_PERFORMANCE_MAX = 42;</code>
     */
    const SHOPPING_MIGRATE_REGULAR_SHOPPING_CAMPAIGN_OFFERS_TO_PERFORMANCE_MAX = 42;
    /**
     * Recommendation to enable dynamic image extensions on the account,
     * allowing Google to find the best images from ad landing pages and
     * complement text ads.
     *
     * Generated from protobuf enum <code>DYNAMIC_IMAGE_EXTENSION_OPT_IN = 43;</code>
     */
    const DYNAMIC_IMAGE_EXTENSION_OPT_IN = 43;
    /**
     * Recommendation to raise Target CPA based on Google predictions modeled
     * from past conversions. It is applied asynchronously and can take minutes
     * depending on the number of ad groups there are in the related campaign.
     *
     * Generated from protobuf enum <code>RAISE_TARGET_CPA = 44;</code>
     */
    const RAISE_TARGET_CPA = 44;
    /**
     * Recommendation to lower Target ROAS.
     *
     * Generated from protobuf enum <code>LOWER_TARGET_ROAS = 45;</code>
     */
    const LOWER_TARGET_ROAS = 45;
    /**
     * Recommendation to opt into Performance Max campaigns.
     *
     * Generated from protobuf enum <code>PERFORMANCE_MAX_OPT_IN = 46;</code>
     */
    const PERFORMANCE_MAX_OPT_IN = 46;
    /**
     * Recommendation to improve the asset group strength of a Performance Max
     * campaign to an "Excellent" rating.
     *
     * Generated from protobuf enum <code>IMPROVE_PERFORMANCE_MAX_AD_STRENGTH = 47;</code>
     */
    const IMPROVE_PERFORMANCE_MAX_AD_STRENGTH = 47;
    /**
     * Recommendation to migrate Dynamic Search Ads to Performance Max
     * campaigns.
     *
     * Generated from protobuf enum <code>MIGRATE_DYNAMIC_SEARCH_ADS_CAMPAIGN_TO_PERFORMANCE_MAX = 48;</code>
     */
    const MIGRATE_DYNAMIC_SEARCH_ADS_CAMPAIGN_TO_PERFORMANCE_MAX = 48;
    /**
     * Recommendation to set a target CPA for campaigns that do not have one
     * specified, in advance of a seasonal event that is forecasted to increase
     * traffic.
     *
     * Generated from protobuf enum <code>FORECASTING_SET_TARGET_CPA = 49;</code>
     */
    const FORECASTING_SET_TARGET_CPA = 49;
    /**
     * Recommendation to set a target CPA for campaigns that do not have one
     * specified.
     *
     * Generated from protobuf enum <code>SET_TARGET_CPA = 50;</code>
     */
    const SET_TARGET_CPA = 50;
    /**
     * Recommendation to set a target ROAS for campaigns that do not have one
     * specified.
     *
     * Generated from protobuf enum <code>SET_TARGET_ROAS = 51;</code>
     */
    const SET_TARGET_ROAS = 51;
    /**
     * Recommendation to update a campaign to use the Maximize Conversion Value
     * bidding strategy.
     *
     * Generated from protobuf enum <code>MAXIMIZE_CONVERSION_VALUE_OPT_IN = 52;</code>
     */
    const MAXIMIZE_CONVERSION_VALUE_OPT_IN = 52;
    /**
     * Recommendation to deploy Google Tag on more pages.
     *
     * Generated from protobuf enum <code>IMPROVE_GOOGLE_TAG_COVERAGE = 53;</code>
     */
    const IMPROVE_GOOGLE_TAG_COVERAGE = 53;
    /**
     * Recommendation to turn on Final URL expansion for your Performance Max
     * campaigns.
     *
     * Generated from protobuf enum <code>PERFORMANCE_MAX_FINAL_URL_OPT_IN = 54;</code>
     */
    const PERFORMANCE_MAX_FINAL_URL_OPT_IN = 54;
    /**
     * Recommendation to update a customer list that hasn't been updated
     * in the last 90 days.
     *
     * Generated from protobuf enum <code>REFRESH_CUSTOMER_MATCH_LIST = 55;</code>
     */
    const REFRESH_CUSTOMER_MATCH_LIST = 55;
    /**
     * Recommendation to create a custom audience.
     *
     * Generated from protobuf enum <code>CUSTOM_AUDIENCE_OPT_IN = 56;</code>
     */
    const CUSTOM_AUDIENCE_OPT_IN = 56;
    /**
     * Recommendation to add lead form assets to campaign or customer level.
     *
     * Generated from protobuf enum <code>LEAD_FORM_ASSET = 57;</code>
     */
    const LEAD_FORM_ASSET = 57;
    /**
     * Recommendation to improve the strength of ads in
     * Demand Gen campaigns.
     *
     * Generated from protobuf enum <code>IMPROVE_DEMAND_GEN_AD_STRENGTH = 58;</code>
     */
    const IMPROVE_DEMAND_GEN_AD_STRENGTH = 58;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CAMPAIGN_BUDGET => 'CAMPAIGN_BUDGET',
        self::KEYWORD => 'KEYWORD',
        self::TEXT_AD => 'TEXT_AD',
        self::TARGET_CPA_OPT_IN => 'TARGET_CPA_OPT_IN',
        self::MAXIMIZE_CONVERSIONS_OPT_IN => 'MAXIMIZE_CONVERSIONS_OPT_IN',
        self::ENHANCED_CPC_OPT_IN => 'ENHANCED_CPC_OPT_IN',
        self::SEARCH_PARTNERS_OPT_IN => 'SEARCH_PARTNERS_OPT_IN',
        self::MAXIMIZE_CLICKS_OPT_IN => 'MAXIMIZE_CLICKS_OPT_IN',
        self::OPTIMIZE_AD_ROTATION => 'OPTIMIZE_AD_ROTATION',
        self::KEYWORD_MATCH_TYPE => 'KEYWORD_MATCH_TYPE',
        self::MOVE_UNUSED_BUDGET => 'MOVE_UNUSED_BUDGET',
        self::FORECASTING_CAMPAIGN_BUDGET => 'FORECASTING_CAMPAIGN_BUDGET',
        self::TARGET_ROAS_OPT_IN => 'TARGET_ROAS_OPT_IN',
        self::RESPONSIVE_SEARCH_AD => 'RESPONSIVE_SEARCH_AD',
        self::MARGINAL_ROI_CAMPAIGN_BUDGET => 'MARGINAL_ROI_CAMPAIGN_BUDGET',
        self::USE_BROAD_MATCH_KEYWORD => 'USE_BROAD_MATCH_KEYWORD',
        self::RESPONSIVE_SEARCH_AD_ASSET => 'RESPONSIVE_SEARCH_AD_ASSET',
        self::UPGRADE_SMART_SHOPPING_CAMPAIGN_TO_PERFORMANCE_MAX => 'UPGRADE_SMART_SHOPPING_CAMPAIGN_TO_PERFORMANCE_MAX',
        self::RESPONSIVE_SEARCH_AD_IMPROVE_AD_STRENGTH => 'RESPONSIVE_SEARCH_AD_IMPROVE_AD_STRENGTH',
        self::DISPLAY_EXPANSION_OPT_IN => 'DISPLAY_EXPANSION_OPT_IN',
        self::UPGRADE_LOCAL_CAMPAIGN_TO_PERFORMANCE_MAX => 'UPGRADE_LOCAL_CAMPAIGN_TO_PERFORMANCE_MAX',
        self::RAISE_TARGET_CPA_BID_TOO_LOW => 'RAISE_TARGET_CPA_BID_TOO_LOW',
        self::FORECASTING_SET_TARGET_ROAS => 'FORECASTING_SET_TARGET_ROAS',
        self::CALLOUT_ASSET => 'CALLOUT_ASSET',
        self::SITELINK_ASSET => 'SITELINK_ASSET',
        self::CALL_ASSET => 'CALL_ASSET',
        self::SHOPPING_ADD_AGE_GROUP => 'SHOPPING_ADD_AGE_GROUP',
        self::SHOPPING_ADD_COLOR => 'SHOPPING_ADD_COLOR',
        self::SHOPPING_ADD_GENDER => 'SHOPPING_ADD_GENDER',
        self::SHOPPING_ADD_GTIN => 'SHOPPING_ADD_GTIN',
        self::SHOPPING_ADD_MORE_IDENTIFIERS => 'SHOPPING_ADD_MORE_IDENTIFIERS',
        self::SHOPPING_ADD_SIZE => 'SHOPPING_ADD_SIZE',
        self::SHOPPING_ADD_PRODUCTS_TO_CAMPAIGN => 'SHOPPING_ADD_PRODUCTS_TO_CAMPAIGN',
        self::SHOPPING_FIX_DISAPPROVED_PRODUCTS => 'SHOPPING_FIX_DISAPPROVED_PRODUCTS',
        self::SHOPPING_TARGET_ALL_OFFERS => 'SHOPPING_TARGET_ALL_OFFERS',
        self::SHOPPING_FIX_SUSPENDED_MERCHANT_CENTER_ACCOUNT => 'SHOPPING_FIX_SUSPENDED_MERCHANT_CENTER_ACCOUNT',
        self::SHOPPING_FIX_MERCHANT_CENTER_ACCOUNT_SUSPENSION_WARNING => 'SHOPPING_FIX_MERCHANT_CENTER_ACCOUNT_SUSPENSION_WARNING',
        self::SHOPPING_MIGRATE_REGULAR_SHOPPING_CAMPAIGN_OFFERS_TO_PERFORMANCE_MAX => 'SHOPPING_MIGRATE_REGULAR_SHOPPING_CAMPAIGN_OFFERS_TO_PERFORMANCE_MAX',
        self::DYNAMIC_IMAGE_EXTENSION_OPT_IN => 'DYNAMIC_IMAGE_EXTENSION_OPT_IN',
        self::RAISE_TARGET_CPA => 'RAISE_TARGET_CPA',
        self::LOWER_TARGET_ROAS => 'LOWER_TARGET_ROAS',
        self::PERFORMANCE_MAX_OPT_IN => 'PERFORMANCE_MAX_OPT_IN',
        self::IMPROVE_PERFORMANCE_MAX_AD_STRENGTH => 'IMPROVE_PERFORMANCE_MAX_AD_STRENGTH',
        self::MIGRATE_DYNAMIC_SEARCH_ADS_CAMPAIGN_TO_PERFORMANCE_MAX => 'MIGRATE_DYNAMIC_SEARCH_ADS_CAMPAIGN_TO_PERFORMANCE_MAX',
        self::FORECASTING_SET_TARGET_CPA => 'FORECASTING_SET_TARGET_CPA',
        self::SET_TARGET_CPA => 'SET_TARGET_CPA',
        self::SET_TARGET_ROAS => 'SET_TARGET_ROAS',
        self::MAXIMIZE_CONVERSION_VALUE_OPT_IN => 'MAXIMIZE_CONVERSION_VALUE_OPT_IN',
        self::IMPROVE_GOOGLE_TAG_COVERAGE => 'IMPROVE_GOOGLE_TAG_COVERAGE',
        self::PERFORMANCE_MAX_FINAL_URL_OPT_IN => 'PERFORMANCE_MAX_FINAL_URL_OPT_IN',
        self::REFRESH_CUSTOMER_MATCH_LIST => 'REFRESH_CUSTOMER_MATCH_LIST',
        self::CUSTOM_AUDIENCE_OPT_IN => 'CUSTOM_AUDIENCE_OPT_IN',
        self::LEAD_FORM_ASSET => 'LEAD_FORM_ASSET',
        self::IMPROVE_DEMAND_GEN_AD_STRENGTH => 'IMPROVE_DEMAND_GEN_AD_STRENGTH',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RecommendationType::class, \Google\Ads\GoogleAds\V20\Enums\RecommendationTypeEnum_RecommendationType::class);

