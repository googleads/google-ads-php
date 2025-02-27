<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/campaign_error.proto

namespace Google\Ads\GoogleAds\V19\Errors\CampaignErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible campaign errors.
 *
 * Protobuf type <code>google.ads.googleads.v19.errors.CampaignErrorEnum.CampaignError</code>
 */
class CampaignError
{
    /**
     * Enum unspecified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The received error code is not known in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Cannot target content network.
     *
     * Generated from protobuf enum <code>CANNOT_TARGET_CONTENT_NETWORK = 3;</code>
     */
    const CANNOT_TARGET_CONTENT_NETWORK = 3;
    /**
     * Cannot target search network.
     *
     * Generated from protobuf enum <code>CANNOT_TARGET_SEARCH_NETWORK = 4;</code>
     */
    const CANNOT_TARGET_SEARCH_NETWORK = 4;
    /**
     * Cannot cover search network without google search network.
     *
     * Generated from protobuf enum <code>CANNOT_TARGET_SEARCH_NETWORK_WITHOUT_GOOGLE_SEARCH = 5;</code>
     */
    const CANNOT_TARGET_SEARCH_NETWORK_WITHOUT_GOOGLE_SEARCH = 5;
    /**
     * Cannot target Google Search network for a CPM campaign.
     *
     * Generated from protobuf enum <code>CANNOT_TARGET_GOOGLE_SEARCH_FOR_CPM_CAMPAIGN = 6;</code>
     */
    const CANNOT_TARGET_GOOGLE_SEARCH_FOR_CPM_CAMPAIGN = 6;
    /**
     * Must target at least one network.
     *
     * Generated from protobuf enum <code>CAMPAIGN_MUST_TARGET_AT_LEAST_ONE_NETWORK = 7;</code>
     */
    const CAMPAIGN_MUST_TARGET_AT_LEAST_ONE_NETWORK = 7;
    /**
     * Only some Google partners are allowed to target partner search network.
     *
     * Generated from protobuf enum <code>CANNOT_TARGET_PARTNER_SEARCH_NETWORK = 8;</code>
     */
    const CANNOT_TARGET_PARTNER_SEARCH_NETWORK = 8;
    /**
     * Cannot target content network only as campaign has criteria-level bidding
     * strategy.
     *
     * Generated from protobuf enum <code>CANNOT_TARGET_CONTENT_NETWORK_ONLY_WITH_CRITERIA_LEVEL_BIDDING_STRATEGY = 9;</code>
     */
    const CANNOT_TARGET_CONTENT_NETWORK_ONLY_WITH_CRITERIA_LEVEL_BIDDING_STRATEGY = 9;
    /**
     * Cannot modify the start or end date such that the campaign duration would
     * not contain the durations of all runnable trials.
     *
     * Generated from protobuf enum <code>CAMPAIGN_DURATION_MUST_CONTAIN_ALL_RUNNABLE_TRIALS = 10;</code>
     */
    const CAMPAIGN_DURATION_MUST_CONTAIN_ALL_RUNNABLE_TRIALS = 10;
    /**
     * Cannot modify dates, budget or status of a trial campaign.
     *
     * Generated from protobuf enum <code>CANNOT_MODIFY_FOR_TRIAL_CAMPAIGN = 11;</code>
     */
    const CANNOT_MODIFY_FOR_TRIAL_CAMPAIGN = 11;
    /**
     * Trying to modify the name of an active or paused campaign, where the name
     * is already assigned to another active or paused campaign.
     *
     * Generated from protobuf enum <code>DUPLICATE_CAMPAIGN_NAME = 12;</code>
     */
    const DUPLICATE_CAMPAIGN_NAME = 12;
    /**
     * Two fields are in conflicting modes.
     *
     * Generated from protobuf enum <code>INCOMPATIBLE_CAMPAIGN_FIELD = 13;</code>
     */
    const INCOMPATIBLE_CAMPAIGN_FIELD = 13;
    /**
     * Campaign name cannot be used.
     *
     * Generated from protobuf enum <code>INVALID_CAMPAIGN_NAME = 14;</code>
     */
    const INVALID_CAMPAIGN_NAME = 14;
    /**
     * Given status is invalid.
     *
     * Generated from protobuf enum <code>INVALID_AD_SERVING_OPTIMIZATION_STATUS = 15;</code>
     */
    const INVALID_AD_SERVING_OPTIMIZATION_STATUS = 15;
    /**
     * Error in the campaign level tracking URL.
     *
     * Generated from protobuf enum <code>INVALID_TRACKING_URL = 16;</code>
     */
    const INVALID_TRACKING_URL = 16;
    /**
     * Cannot set both tracking URL template and tracking setting. A user has
     * to clear legacy tracking setting in order to add tracking URL template.
     *
     * Generated from protobuf enum <code>CANNOT_SET_BOTH_TRACKING_URL_TEMPLATE_AND_TRACKING_SETTING = 17;</code>
     */
    const CANNOT_SET_BOTH_TRACKING_URL_TEMPLATE_AND_TRACKING_SETTING = 17;
    /**
     * The maximum number of impressions for Frequency Cap should be an integer
     * greater than 0.
     *
     * Generated from protobuf enum <code>MAX_IMPRESSIONS_NOT_IN_RANGE = 18;</code>
     */
    const MAX_IMPRESSIONS_NOT_IN_RANGE = 18;
    /**
     * Only the Day, Week and Month time units are supported.
     *
     * Generated from protobuf enum <code>TIME_UNIT_NOT_SUPPORTED = 19;</code>
     */
    const TIME_UNIT_NOT_SUPPORTED = 19;
    /**
     * Operation not allowed on a campaign whose serving status has ended
     *
     * Generated from protobuf enum <code>INVALID_OPERATION_IF_SERVING_STATUS_HAS_ENDED = 20;</code>
     */
    const INVALID_OPERATION_IF_SERVING_STATUS_HAS_ENDED = 20;
    /**
     * This budget is exclusively linked to a Campaign that is using experiments
     * so it cannot be shared.
     *
     * Generated from protobuf enum <code>BUDGET_CANNOT_BE_SHARED = 21;</code>
     */
    const BUDGET_CANNOT_BE_SHARED = 21;
    /**
     * Campaigns using experiments cannot use a shared budget.
     *
     * Generated from protobuf enum <code>CAMPAIGN_CANNOT_USE_SHARED_BUDGET = 22;</code>
     */
    const CAMPAIGN_CANNOT_USE_SHARED_BUDGET = 22;
    /**
     * A different budget cannot be assigned to a campaign when there are
     * running or scheduled trials.
     *
     * Generated from protobuf enum <code>CANNOT_CHANGE_BUDGET_ON_CAMPAIGN_WITH_TRIALS = 23;</code>
     */
    const CANNOT_CHANGE_BUDGET_ON_CAMPAIGN_WITH_TRIALS = 23;
    /**
     * No link found between the campaign and the label.
     *
     * Generated from protobuf enum <code>CAMPAIGN_LABEL_DOES_NOT_EXIST = 24;</code>
     */
    const CAMPAIGN_LABEL_DOES_NOT_EXIST = 24;
    /**
     * The label has already been attached to the campaign.
     *
     * Generated from protobuf enum <code>CAMPAIGN_LABEL_ALREADY_EXISTS = 25;</code>
     */
    const CAMPAIGN_LABEL_ALREADY_EXISTS = 25;
    /**
     * A ShoppingSetting was not found when creating a shopping campaign.
     *
     * Generated from protobuf enum <code>MISSING_SHOPPING_SETTING = 26;</code>
     */
    const MISSING_SHOPPING_SETTING = 26;
    /**
     * The country in shopping setting is not an allowed country.
     *
     * Generated from protobuf enum <code>INVALID_SHOPPING_SALES_COUNTRY = 27;</code>
     */
    const INVALID_SHOPPING_SALES_COUNTRY = 27;
    /**
     * The requested channel type is not available according to the customer's
     * account setting.
     *
     * Generated from protobuf enum <code>ADVERTISING_CHANNEL_TYPE_NOT_AVAILABLE_FOR_ACCOUNT_TYPE = 31;</code>
     */
    const ADVERTISING_CHANNEL_TYPE_NOT_AVAILABLE_FOR_ACCOUNT_TYPE = 31;
    /**
     * The AdvertisingChannelSubType is not a valid subtype of the primary
     * channel type.
     *
     * Generated from protobuf enum <code>INVALID_ADVERTISING_CHANNEL_SUB_TYPE = 32;</code>
     */
    const INVALID_ADVERTISING_CHANNEL_SUB_TYPE = 32;
    /**
     * At least one conversion must be selected.
     *
     * Generated from protobuf enum <code>AT_LEAST_ONE_CONVERSION_MUST_BE_SELECTED = 33;</code>
     */
    const AT_LEAST_ONE_CONVERSION_MUST_BE_SELECTED = 33;
    /**
     * Setting ad rotation mode for a campaign is not allowed. Ad rotation mode
     * at campaign is deprecated.
     *
     * Generated from protobuf enum <code>CANNOT_SET_AD_ROTATION_MODE = 34;</code>
     */
    const CANNOT_SET_AD_ROTATION_MODE = 34;
    /**
     * Trying to change start date on a campaign that has started.
     *
     * Generated from protobuf enum <code>CANNOT_MODIFY_START_DATE_IF_ALREADY_STARTED = 35;</code>
     */
    const CANNOT_MODIFY_START_DATE_IF_ALREADY_STARTED = 35;
    /**
     * Trying to modify a date into the past.
     *
     * Generated from protobuf enum <code>CANNOT_SET_DATE_TO_PAST = 36;</code>
     */
    const CANNOT_SET_DATE_TO_PAST = 36;
    /**
     * Hotel center id in the hotel setting does not match any customer links.
     *
     * Generated from protobuf enum <code>MISSING_HOTEL_CUSTOMER_LINK = 37;</code>
     */
    const MISSING_HOTEL_CUSTOMER_LINK = 37;
    /**
     * Hotel center id in the hotel setting must match an active customer link.
     *
     * Generated from protobuf enum <code>INVALID_HOTEL_CUSTOMER_LINK = 38;</code>
     */
    const INVALID_HOTEL_CUSTOMER_LINK = 38;
    /**
     * Hotel setting was not found when creating a hotel ads campaign.
     *
     * Generated from protobuf enum <code>MISSING_HOTEL_SETTING = 39;</code>
     */
    const MISSING_HOTEL_SETTING = 39;
    /**
     * A Campaign cannot use shared campaign budgets and be part of a campaign
     * group.
     *
     * Generated from protobuf enum <code>CANNOT_USE_SHARED_CAMPAIGN_BUDGET_WHILE_PART_OF_CAMPAIGN_GROUP = 40;</code>
     */
    const CANNOT_USE_SHARED_CAMPAIGN_BUDGET_WHILE_PART_OF_CAMPAIGN_GROUP = 40;
    /**
     * The app ID was not found.
     *
     * Generated from protobuf enum <code>APP_NOT_FOUND = 41;</code>
     */
    const APP_NOT_FOUND = 41;
    /**
     * Campaign.shopping_setting.enable_local is not supported for the specified
     * campaign type.
     *
     * Generated from protobuf enum <code>SHOPPING_ENABLE_LOCAL_NOT_SUPPORTED_FOR_CAMPAIGN_TYPE = 42;</code>
     */
    const SHOPPING_ENABLE_LOCAL_NOT_SUPPORTED_FOR_CAMPAIGN_TYPE = 42;
    /**
     * The merchant does not support the creation of campaigns for Shopping
     * Comparison Listing Ads.
     *
     * Generated from protobuf enum <code>MERCHANT_NOT_ALLOWED_FOR_COMPARISON_LISTING_ADS = 43;</code>
     */
    const MERCHANT_NOT_ALLOWED_FOR_COMPARISON_LISTING_ADS = 43;
    /**
     * The App campaign for engagement cannot be created because there aren't
     * enough installs.
     *
     * Generated from protobuf enum <code>INSUFFICIENT_APP_INSTALLS_COUNT = 44;</code>
     */
    const INSUFFICIENT_APP_INSTALLS_COUNT = 44;
    /**
     * The App campaign for engagement cannot be created because the app is
     * sensitive.
     *
     * Generated from protobuf enum <code>SENSITIVE_CATEGORY_APP = 45;</code>
     */
    const SENSITIVE_CATEGORY_APP = 45;
    /**
     * Customers with Housing, Employment, or Credit ads must accept updated
     * personalized ads policy to continue creating campaigns.
     *
     * Generated from protobuf enum <code>HEC_AGREEMENT_REQUIRED = 46;</code>
     */
    const HEC_AGREEMENT_REQUIRED = 46;
    /**
     * The field is not compatible with view through conversion optimization.
     *
     * Generated from protobuf enum <code>NOT_COMPATIBLE_WITH_VIEW_THROUGH_CONVERSION_OPTIMIZATION = 49;</code>
     */
    const NOT_COMPATIBLE_WITH_VIEW_THROUGH_CONVERSION_OPTIMIZATION = 49;
    /**
     * The field type cannot be excluded because an active campaign-asset link
     * of this type exists.
     *
     * Generated from protobuf enum <code>INVALID_EXCLUDED_PARENT_ASSET_FIELD_TYPE = 48;</code>
     */
    const INVALID_EXCLUDED_PARENT_ASSET_FIELD_TYPE = 48;
    /**
     * The app pre-registration campaign cannot be created for non-Android
     * applications.
     *
     * Generated from protobuf enum <code>CANNOT_CREATE_APP_PRE_REGISTRATION_FOR_NON_ANDROID_APP = 50;</code>
     */
    const CANNOT_CREATE_APP_PRE_REGISTRATION_FOR_NON_ANDROID_APP = 50;
    /**
     * The campaign cannot be created since the app is not available for
     * pre-registration in any country.
     *
     * Generated from protobuf enum <code>APP_NOT_AVAILABLE_TO_CREATE_APP_PRE_REGISTRATION_CAMPAIGN = 51;</code>
     */
    const APP_NOT_AVAILABLE_TO_CREATE_APP_PRE_REGISTRATION_CAMPAIGN = 51;
    /**
     * The type of the Budget is not compatible with this Campaign.
     *
     * Generated from protobuf enum <code>INCOMPATIBLE_BUDGET_TYPE = 52;</code>
     */
    const INCOMPATIBLE_BUDGET_TYPE = 52;
    /**
     * Category bid list in the local services campaign setting contains
     * multiple bids for the same category ID.
     *
     * Generated from protobuf enum <code>LOCAL_SERVICES_DUPLICATE_CATEGORY_BID = 53;</code>
     */
    const LOCAL_SERVICES_DUPLICATE_CATEGORY_BID = 53;
    /**
     * Category bid list in the local services campaign setting contains
     * a bid for an invalid category ID.
     *
     * Generated from protobuf enum <code>LOCAL_SERVICES_INVALID_CATEGORY_BID = 54;</code>
     */
    const LOCAL_SERVICES_INVALID_CATEGORY_BID = 54;
    /**
     * Category bid list in the local services campaign setting is missing a
     * bid for a category ID that must be present.
     *
     * Generated from protobuf enum <code>LOCAL_SERVICES_MISSING_CATEGORY_BID = 55;</code>
     */
    const LOCAL_SERVICES_MISSING_CATEGORY_BID = 55;
    /**
     * The requested change in status is not supported.
     *
     * Generated from protobuf enum <code>INVALID_STATUS_CHANGE = 57;</code>
     */
    const INVALID_STATUS_CHANGE = 57;
    /**
     * Travel Campaign's travel_account_id does not match any customer links.
     *
     * Generated from protobuf enum <code>MISSING_TRAVEL_CUSTOMER_LINK = 58;</code>
     */
    const MISSING_TRAVEL_CUSTOMER_LINK = 58;
    /**
     * Travel Campaign's travel_account_id matches an existing customer link
     * but the customer link is not active.
     *
     * Generated from protobuf enum <code>INVALID_TRAVEL_CUSTOMER_LINK = 59;</code>
     */
    const INVALID_TRAVEL_CUSTOMER_LINK = 59;
    /**
     * The asset set type is invalid to be set in
     * excluded_parent_asset_set_types field.
     *
     * Generated from protobuf enum <code>INVALID_EXCLUDED_PARENT_ASSET_SET_TYPE = 62;</code>
     */
    const INVALID_EXCLUDED_PARENT_ASSET_SET_TYPE = 62;
    /**
     * Campaign.hotel_property_asset_set must point to an asset set of type
     * HOTEL_PROPERTY.
     *
     * Generated from protobuf enum <code>ASSET_SET_NOT_A_HOTEL_PROPERTY_ASSET_SET = 63;</code>
     */
    const ASSET_SET_NOT_A_HOTEL_PROPERTY_ASSET_SET = 63;
    /**
     * The hotel property asset set can only be set on Performance Max for
     * travel goals campaigns.
     *
     * Generated from protobuf enum <code>HOTEL_PROPERTY_ASSET_SET_ONLY_FOR_PERFORMANCE_MAX_FOR_TRAVEL_GOALS = 64;</code>
     */
    const HOTEL_PROPERTY_ASSET_SET_ONLY_FOR_PERFORMANCE_MAX_FOR_TRAVEL_GOALS = 64;
    /**
     * Customer's average daily spend is too high to enable this feature.
     *
     * Generated from protobuf enum <code>AVERAGE_DAILY_SPEND_TOO_HIGH = 65;</code>
     */
    const AVERAGE_DAILY_SPEND_TOO_HIGH = 65;
    /**
     * Cannot attach the campaign to a deleted campaign group.
     *
     * Generated from protobuf enum <code>CANNOT_ATTACH_TO_REMOVED_CAMPAIGN_GROUP = 66;</code>
     */
    const CANNOT_ATTACH_TO_REMOVED_CAMPAIGN_GROUP = 66;
    /**
     * Cannot attach the campaign to this bidding strategy.
     *
     * Generated from protobuf enum <code>CANNOT_ATTACH_TO_BIDDING_STRATEGY = 67;</code>
     */
    const CANNOT_ATTACH_TO_BIDDING_STRATEGY = 67;
    /**
     * A budget with a different period cannot be assigned to the campaign.
     *
     * Generated from protobuf enum <code>CANNOT_CHANGE_BUDGET_PERIOD = 68;</code>
     */
    const CANNOT_CHANGE_BUDGET_PERIOD = 68;
    /**
     * Customer does not have enough conversions to enable this feature.
     *
     * Generated from protobuf enum <code>NOT_ENOUGH_CONVERSIONS = 71;</code>
     */
    const NOT_ENOUGH_CONVERSIONS = 71;
    /**
     * This campaign type can only have one conversion action.
     *
     * Generated from protobuf enum <code>CANNOT_SET_MORE_THAN_ONE_CONVERSION_ACTION = 72;</code>
     */
    const CANNOT_SET_MORE_THAN_ONE_CONVERSION_ACTION = 72;
    /**
     * The field is not compatible with the budget type.
     *
     * Generated from protobuf enum <code>NOT_COMPATIBLE_WITH_BUDGET_TYPE = 73;</code>
     */
    const NOT_COMPATIBLE_WITH_BUDGET_TYPE = 73;
    /**
     * The feature is incompatible with ConversionActionType.UPLOAD_CLICKS.
     *
     * Generated from protobuf enum <code>NOT_COMPATIBLE_WITH_UPLOAD_CLICKS_CONVERSION = 74;</code>
     */
    const NOT_COMPATIBLE_WITH_UPLOAD_CLICKS_CONVERSION = 74;
    /**
     * App campaign setting app ID must match selective optimization conversion
     * action app ID.
     *
     * Generated from protobuf enum <code>APP_ID_MUST_MATCH_CONVERSION_ACTION_APP_ID = 76;</code>
     */
    const APP_ID_MUST_MATCH_CONVERSION_ACTION_APP_ID = 76;
    /**
     * Selective optimization conversion action with Download category is not
     * allowed.
     *
     * Generated from protobuf enum <code>CONVERSION_ACTION_WITH_DOWNLOAD_CATEGORY_NOT_ALLOWED = 77;</code>
     */
    const CONVERSION_ACTION_WITH_DOWNLOAD_CATEGORY_NOT_ALLOWED = 77;
    /**
     * One software download for selective optimization conversion action is
     * required for this campaign conversion action.
     *
     * Generated from protobuf enum <code>CONVERSION_ACTION_WITH_DOWNLOAD_CATEGORY_REQUIRED = 78;</code>
     */
    const CONVERSION_ACTION_WITH_DOWNLOAD_CATEGORY_REQUIRED = 78;
    /**
     * Conversion tracking is not enabled and is required for this feature.
     *
     * Generated from protobuf enum <code>CONVERSION_TRACKING_NOT_ENABLED = 79;</code>
     */
    const CONVERSION_TRACKING_NOT_ENABLED = 79;
    /**
     * The field is not compatible with the bidding strategy type.
     *
     * Generated from protobuf enum <code>NOT_COMPATIBLE_WITH_BIDDING_STRATEGY_TYPE = 80;</code>
     */
    const NOT_COMPATIBLE_WITH_BIDDING_STRATEGY_TYPE = 80;
    /**
     * Campaign is not compatible with a conversion tracker that has Google
     * attribution enabled.
     *
     * Generated from protobuf enum <code>NOT_COMPATIBLE_WITH_GOOGLE_ATTRIBUTION_CONVERSIONS = 81;</code>
     */
    const NOT_COMPATIBLE_WITH_GOOGLE_ATTRIBUTION_CONVERSIONS = 81;
    /**
     * Customer level conversion lag is too high.
     *
     * Generated from protobuf enum <code>CONVERSION_LAG_TOO_HIGH = 82;</code>
     */
    const CONVERSION_LAG_TOO_HIGH = 82;
    /**
     * The advertiser set as an advertising partner is not an actively linked
     * advertiser to this customer.
     *
     * Generated from protobuf enum <code>NOT_LINKED_ADVERTISING_PARTNER = 83;</code>
     */
    const NOT_LINKED_ADVERTISING_PARTNER = 83;
    /**
     * Invalid number of advertising partner IDs.
     *
     * Generated from protobuf enum <code>INVALID_NUMBER_OF_ADVERTISING_PARTNER_IDS = 84;</code>
     */
    const INVALID_NUMBER_OF_ADVERTISING_PARTNER_IDS = 84;
    /**
     * Cannot target the display network without also targeting YouTube.
     *
     * Generated from protobuf enum <code>CANNOT_TARGET_DISPLAY_NETWORK_WITHOUT_YOUTUBE = 85;</code>
     */
    const CANNOT_TARGET_DISPLAY_NETWORK_WITHOUT_YOUTUBE = 85;
    /**
     * This campaign type cannot be linked to a Comparison Shopping Service
     * account.
     *
     * Generated from protobuf enum <code>CANNOT_LINK_TO_COMPARISON_SHOPPING_SERVICE_ACCOUNT = 86;</code>
     */
    const CANNOT_LINK_TO_COMPARISON_SHOPPING_SERVICE_ACCOUNT = 86;
    /**
     * Standard Shopping campaigns that are linked to a Comparison Shopping
     * Service account cannot target this network.
     *
     * Generated from protobuf enum <code>CANNOT_TARGET_NETWORK_FOR_COMPARISON_SHOPPING_SERVICE_LINKED_ACCOUNTS = 87;</code>
     */
    const CANNOT_TARGET_NETWORK_FOR_COMPARISON_SHOPPING_SERVICE_LINKED_ACCOUNTS = 87;
    /**
     * Text asset automation settings can not be modified when there is an
     * active Performance Max optimization automatically created assets
     * experiment. End the experiment to modify these settings.
     *
     * Generated from protobuf enum <code>CANNOT_MODIFY_TEXT_ASSET_AUTOMATION_WITH_ENABLED_TRIAL = 88;</code>
     */
    const CANNOT_MODIFY_TEXT_ASSET_AUTOMATION_WITH_ENABLED_TRIAL = 88;
    /**
     * Dynamic text asset cannot be opted out when final URL expansion is opted
     * in.
     *
     * Generated from protobuf enum <code>DYNAMIC_TEXT_ASSET_CANNOT_OPT_OUT_WITH_FINAL_URL_EXPANSION_OPT_IN = 89;</code>
     */
    const DYNAMIC_TEXT_ASSET_CANNOT_OPT_OUT_WITH_FINAL_URL_EXPANSION_OPT_IN = 89;
    /**
     * Can not set a campaign level match type.
     *
     * Generated from protobuf enum <code>CANNOT_SET_CAMPAIGN_KEYWORD_MATCH_TYPE = 90;</code>
     */
    const CANNOT_SET_CAMPAIGN_KEYWORD_MATCH_TYPE = 90;
    /**
     * The campaign level keyword match type cannot be switched to non-broad
     * when keyword conversion to broad match is in process.
     *
     * Generated from protobuf enum <code>CANNOT_DISABLE_BROAD_MATCH_WHEN_KEYWORD_CONVERSION_IN_PROCESS = 91;</code>
     */
    const CANNOT_DISABLE_BROAD_MATCH_WHEN_KEYWORD_CONVERSION_IN_PROCESS = 91;
    /**
     * The campaign level keyword match type cannot be switched to non-broad
     * when the campaign has any attached brand list or when a brand hint shared
     * set is attached to the campaign.
     *
     * Generated from protobuf enum <code>CANNOT_DISABLE_BROAD_MATCH_WHEN_TARGETING_BRANDS = 92;</code>
     */
    const CANNOT_DISABLE_BROAD_MATCH_WHEN_TARGETING_BRANDS = 92;
    /**
     * Cannot set campaign level keyword match type to BROAD if the campaign is
     * a base campaign with an associated trial that is currently promoting.
     *
     * Generated from protobuf enum <code>CANNOT_ENABLE_BROAD_MATCH_FOR_BASE_CAMPAIGN_WITH_PROMOTING_TRIAL = 93;</code>
     */
    const CANNOT_ENABLE_BROAD_MATCH_FOR_BASE_CAMPAIGN_WITH_PROMOTING_TRIAL = 93;
    /**
     * Cannot set campaign level keyword match type to BROAD if the campaign is
     * a trial currently promoting.
     *
     * Generated from protobuf enum <code>CANNOT_ENABLE_BROAD_MATCH_FOR_PROMOTING_TRIAL_CAMPAIGN = 94;</code>
     */
    const CANNOT_ENABLE_BROAD_MATCH_FOR_PROMOTING_TRIAL_CAMPAIGN = 94;
    /**
     * Performance Max campaigns with Brand Guidelines enabled require at least
     * one business name to be linked as a CampaignAsset. Performance Max
     * campaigns for online sales with a product feed must meet this requirement
     * only when there are assets that are linked to the campaign's asset
     * groups.
     *
     * Generated from protobuf enum <code>REQUIRED_BUSINESS_NAME_ASSET_NOT_LINKED = 95;</code>
     */
    const REQUIRED_BUSINESS_NAME_ASSET_NOT_LINKED = 95;
    /**
     * Performance Max campaigns with Brand Guidelines enabled require at least
     * one square logo to be linked as a CampaignAsset. Performance Max
     * campaigns for online sales with a product feed must meet this requirement
     * only when there are assets that are linked to the campaign's asset
     * groups.
     *
     * Generated from protobuf enum <code>REQUIRED_LOGO_ASSET_NOT_LINKED = 96;</code>
     */
    const REQUIRED_LOGO_ASSET_NOT_LINKED = 96;
    /**
     * Brand Guideline fields can only be set for campaigns that have Brand
     * Guidelines enabled.
     *
     * Generated from protobuf enum <code>BRAND_GUIDELINES_NOT_ENABLED_FOR_CAMPAIGN = 98;</code>
     */
    const BRAND_GUIDELINES_NOT_ENABLED_FOR_CAMPAIGN = 98;
    /**
     * When a Brand Guidelines color field is set, both main color and accent
     * color are required.
     *
     * Generated from protobuf enum <code>BRAND_GUIDELINES_MAIN_AND_ACCENT_COLORS_REQUIRED = 99;</code>
     */
    const BRAND_GUIDELINES_MAIN_AND_ACCENT_COLORS_REQUIRED = 99;
    /**
     * Brand Guidelines colors must be hex colors matching the regular
     * expression '#[0-9a-fA-F]{6}', for example '#abc123'
     *
     * Generated from protobuf enum <code>BRAND_GUIDELINES_COLOR_INVALID_FORMAT = 100;</code>
     */
    const BRAND_GUIDELINES_COLOR_INVALID_FORMAT = 100;
    /**
     * Brand Guidelines font family must be one of the supported Google Fonts.
     * See Campaign.brand_guidelines.predefined_font_family for the list of
     * supported fonts.
     *
     * Generated from protobuf enum <code>BRAND_GUIDELINES_UNSUPPORTED_FONT_FAMILY = 101;</code>
     */
    const BRAND_GUIDELINES_UNSUPPORTED_FONT_FAMILY = 101;
    /**
     * Brand Guidelines cannot be set for this channel type. Brand Guidelines
     * supports Performance Max campaigns.
     *
     * Generated from protobuf enum <code>BRAND_GUIDELINES_UNSUPPORTED_CHANNEL = 102;</code>
     */
    const BRAND_GUIDELINES_UNSUPPORTED_CHANNEL = 102;
    /**
     * Brand Guidelines cannot be enabled for Performance Max for travel goals
     * campaigns.
     *
     * Generated from protobuf enum <code>CANNOT_ENABLE_BRAND_GUIDELINES_FOR_TRAVEL_GOALS = 103;</code>
     */
    const CANNOT_ENABLE_BRAND_GUIDELINES_FOR_TRAVEL_GOALS = 103;
    /**
     * This customer is not allowlisted for enabling Brand Guidelines.
     *
     * Generated from protobuf enum <code>CUSTOMER_NOT_ALLOWLISTED_FOR_BRAND_GUIDELINES = 104;</code>
     */
    const CUSTOMER_NOT_ALLOWLISTED_FOR_BRAND_GUIDELINES = 104;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CANNOT_TARGET_CONTENT_NETWORK => 'CANNOT_TARGET_CONTENT_NETWORK',
        self::CANNOT_TARGET_SEARCH_NETWORK => 'CANNOT_TARGET_SEARCH_NETWORK',
        self::CANNOT_TARGET_SEARCH_NETWORK_WITHOUT_GOOGLE_SEARCH => 'CANNOT_TARGET_SEARCH_NETWORK_WITHOUT_GOOGLE_SEARCH',
        self::CANNOT_TARGET_GOOGLE_SEARCH_FOR_CPM_CAMPAIGN => 'CANNOT_TARGET_GOOGLE_SEARCH_FOR_CPM_CAMPAIGN',
        self::CAMPAIGN_MUST_TARGET_AT_LEAST_ONE_NETWORK => 'CAMPAIGN_MUST_TARGET_AT_LEAST_ONE_NETWORK',
        self::CANNOT_TARGET_PARTNER_SEARCH_NETWORK => 'CANNOT_TARGET_PARTNER_SEARCH_NETWORK',
        self::CANNOT_TARGET_CONTENT_NETWORK_ONLY_WITH_CRITERIA_LEVEL_BIDDING_STRATEGY => 'CANNOT_TARGET_CONTENT_NETWORK_ONLY_WITH_CRITERIA_LEVEL_BIDDING_STRATEGY',
        self::CAMPAIGN_DURATION_MUST_CONTAIN_ALL_RUNNABLE_TRIALS => 'CAMPAIGN_DURATION_MUST_CONTAIN_ALL_RUNNABLE_TRIALS',
        self::CANNOT_MODIFY_FOR_TRIAL_CAMPAIGN => 'CANNOT_MODIFY_FOR_TRIAL_CAMPAIGN',
        self::DUPLICATE_CAMPAIGN_NAME => 'DUPLICATE_CAMPAIGN_NAME',
        self::INCOMPATIBLE_CAMPAIGN_FIELD => 'INCOMPATIBLE_CAMPAIGN_FIELD',
        self::INVALID_CAMPAIGN_NAME => 'INVALID_CAMPAIGN_NAME',
        self::INVALID_AD_SERVING_OPTIMIZATION_STATUS => 'INVALID_AD_SERVING_OPTIMIZATION_STATUS',
        self::INVALID_TRACKING_URL => 'INVALID_TRACKING_URL',
        self::CANNOT_SET_BOTH_TRACKING_URL_TEMPLATE_AND_TRACKING_SETTING => 'CANNOT_SET_BOTH_TRACKING_URL_TEMPLATE_AND_TRACKING_SETTING',
        self::MAX_IMPRESSIONS_NOT_IN_RANGE => 'MAX_IMPRESSIONS_NOT_IN_RANGE',
        self::TIME_UNIT_NOT_SUPPORTED => 'TIME_UNIT_NOT_SUPPORTED',
        self::INVALID_OPERATION_IF_SERVING_STATUS_HAS_ENDED => 'INVALID_OPERATION_IF_SERVING_STATUS_HAS_ENDED',
        self::BUDGET_CANNOT_BE_SHARED => 'BUDGET_CANNOT_BE_SHARED',
        self::CAMPAIGN_CANNOT_USE_SHARED_BUDGET => 'CAMPAIGN_CANNOT_USE_SHARED_BUDGET',
        self::CANNOT_CHANGE_BUDGET_ON_CAMPAIGN_WITH_TRIALS => 'CANNOT_CHANGE_BUDGET_ON_CAMPAIGN_WITH_TRIALS',
        self::CAMPAIGN_LABEL_DOES_NOT_EXIST => 'CAMPAIGN_LABEL_DOES_NOT_EXIST',
        self::CAMPAIGN_LABEL_ALREADY_EXISTS => 'CAMPAIGN_LABEL_ALREADY_EXISTS',
        self::MISSING_SHOPPING_SETTING => 'MISSING_SHOPPING_SETTING',
        self::INVALID_SHOPPING_SALES_COUNTRY => 'INVALID_SHOPPING_SALES_COUNTRY',
        self::ADVERTISING_CHANNEL_TYPE_NOT_AVAILABLE_FOR_ACCOUNT_TYPE => 'ADVERTISING_CHANNEL_TYPE_NOT_AVAILABLE_FOR_ACCOUNT_TYPE',
        self::INVALID_ADVERTISING_CHANNEL_SUB_TYPE => 'INVALID_ADVERTISING_CHANNEL_SUB_TYPE',
        self::AT_LEAST_ONE_CONVERSION_MUST_BE_SELECTED => 'AT_LEAST_ONE_CONVERSION_MUST_BE_SELECTED',
        self::CANNOT_SET_AD_ROTATION_MODE => 'CANNOT_SET_AD_ROTATION_MODE',
        self::CANNOT_MODIFY_START_DATE_IF_ALREADY_STARTED => 'CANNOT_MODIFY_START_DATE_IF_ALREADY_STARTED',
        self::CANNOT_SET_DATE_TO_PAST => 'CANNOT_SET_DATE_TO_PAST',
        self::MISSING_HOTEL_CUSTOMER_LINK => 'MISSING_HOTEL_CUSTOMER_LINK',
        self::INVALID_HOTEL_CUSTOMER_LINK => 'INVALID_HOTEL_CUSTOMER_LINK',
        self::MISSING_HOTEL_SETTING => 'MISSING_HOTEL_SETTING',
        self::CANNOT_USE_SHARED_CAMPAIGN_BUDGET_WHILE_PART_OF_CAMPAIGN_GROUP => 'CANNOT_USE_SHARED_CAMPAIGN_BUDGET_WHILE_PART_OF_CAMPAIGN_GROUP',
        self::APP_NOT_FOUND => 'APP_NOT_FOUND',
        self::SHOPPING_ENABLE_LOCAL_NOT_SUPPORTED_FOR_CAMPAIGN_TYPE => 'SHOPPING_ENABLE_LOCAL_NOT_SUPPORTED_FOR_CAMPAIGN_TYPE',
        self::MERCHANT_NOT_ALLOWED_FOR_COMPARISON_LISTING_ADS => 'MERCHANT_NOT_ALLOWED_FOR_COMPARISON_LISTING_ADS',
        self::INSUFFICIENT_APP_INSTALLS_COUNT => 'INSUFFICIENT_APP_INSTALLS_COUNT',
        self::SENSITIVE_CATEGORY_APP => 'SENSITIVE_CATEGORY_APP',
        self::HEC_AGREEMENT_REQUIRED => 'HEC_AGREEMENT_REQUIRED',
        self::NOT_COMPATIBLE_WITH_VIEW_THROUGH_CONVERSION_OPTIMIZATION => 'NOT_COMPATIBLE_WITH_VIEW_THROUGH_CONVERSION_OPTIMIZATION',
        self::INVALID_EXCLUDED_PARENT_ASSET_FIELD_TYPE => 'INVALID_EXCLUDED_PARENT_ASSET_FIELD_TYPE',
        self::CANNOT_CREATE_APP_PRE_REGISTRATION_FOR_NON_ANDROID_APP => 'CANNOT_CREATE_APP_PRE_REGISTRATION_FOR_NON_ANDROID_APP',
        self::APP_NOT_AVAILABLE_TO_CREATE_APP_PRE_REGISTRATION_CAMPAIGN => 'APP_NOT_AVAILABLE_TO_CREATE_APP_PRE_REGISTRATION_CAMPAIGN',
        self::INCOMPATIBLE_BUDGET_TYPE => 'INCOMPATIBLE_BUDGET_TYPE',
        self::LOCAL_SERVICES_DUPLICATE_CATEGORY_BID => 'LOCAL_SERVICES_DUPLICATE_CATEGORY_BID',
        self::LOCAL_SERVICES_INVALID_CATEGORY_BID => 'LOCAL_SERVICES_INVALID_CATEGORY_BID',
        self::LOCAL_SERVICES_MISSING_CATEGORY_BID => 'LOCAL_SERVICES_MISSING_CATEGORY_BID',
        self::INVALID_STATUS_CHANGE => 'INVALID_STATUS_CHANGE',
        self::MISSING_TRAVEL_CUSTOMER_LINK => 'MISSING_TRAVEL_CUSTOMER_LINK',
        self::INVALID_TRAVEL_CUSTOMER_LINK => 'INVALID_TRAVEL_CUSTOMER_LINK',
        self::INVALID_EXCLUDED_PARENT_ASSET_SET_TYPE => 'INVALID_EXCLUDED_PARENT_ASSET_SET_TYPE',
        self::ASSET_SET_NOT_A_HOTEL_PROPERTY_ASSET_SET => 'ASSET_SET_NOT_A_HOTEL_PROPERTY_ASSET_SET',
        self::HOTEL_PROPERTY_ASSET_SET_ONLY_FOR_PERFORMANCE_MAX_FOR_TRAVEL_GOALS => 'HOTEL_PROPERTY_ASSET_SET_ONLY_FOR_PERFORMANCE_MAX_FOR_TRAVEL_GOALS',
        self::AVERAGE_DAILY_SPEND_TOO_HIGH => 'AVERAGE_DAILY_SPEND_TOO_HIGH',
        self::CANNOT_ATTACH_TO_REMOVED_CAMPAIGN_GROUP => 'CANNOT_ATTACH_TO_REMOVED_CAMPAIGN_GROUP',
        self::CANNOT_ATTACH_TO_BIDDING_STRATEGY => 'CANNOT_ATTACH_TO_BIDDING_STRATEGY',
        self::CANNOT_CHANGE_BUDGET_PERIOD => 'CANNOT_CHANGE_BUDGET_PERIOD',
        self::NOT_ENOUGH_CONVERSIONS => 'NOT_ENOUGH_CONVERSIONS',
        self::CANNOT_SET_MORE_THAN_ONE_CONVERSION_ACTION => 'CANNOT_SET_MORE_THAN_ONE_CONVERSION_ACTION',
        self::NOT_COMPATIBLE_WITH_BUDGET_TYPE => 'NOT_COMPATIBLE_WITH_BUDGET_TYPE',
        self::NOT_COMPATIBLE_WITH_UPLOAD_CLICKS_CONVERSION => 'NOT_COMPATIBLE_WITH_UPLOAD_CLICKS_CONVERSION',
        self::APP_ID_MUST_MATCH_CONVERSION_ACTION_APP_ID => 'APP_ID_MUST_MATCH_CONVERSION_ACTION_APP_ID',
        self::CONVERSION_ACTION_WITH_DOWNLOAD_CATEGORY_NOT_ALLOWED => 'CONVERSION_ACTION_WITH_DOWNLOAD_CATEGORY_NOT_ALLOWED',
        self::CONVERSION_ACTION_WITH_DOWNLOAD_CATEGORY_REQUIRED => 'CONVERSION_ACTION_WITH_DOWNLOAD_CATEGORY_REQUIRED',
        self::CONVERSION_TRACKING_NOT_ENABLED => 'CONVERSION_TRACKING_NOT_ENABLED',
        self::NOT_COMPATIBLE_WITH_BIDDING_STRATEGY_TYPE => 'NOT_COMPATIBLE_WITH_BIDDING_STRATEGY_TYPE',
        self::NOT_COMPATIBLE_WITH_GOOGLE_ATTRIBUTION_CONVERSIONS => 'NOT_COMPATIBLE_WITH_GOOGLE_ATTRIBUTION_CONVERSIONS',
        self::CONVERSION_LAG_TOO_HIGH => 'CONVERSION_LAG_TOO_HIGH',
        self::NOT_LINKED_ADVERTISING_PARTNER => 'NOT_LINKED_ADVERTISING_PARTNER',
        self::INVALID_NUMBER_OF_ADVERTISING_PARTNER_IDS => 'INVALID_NUMBER_OF_ADVERTISING_PARTNER_IDS',
        self::CANNOT_TARGET_DISPLAY_NETWORK_WITHOUT_YOUTUBE => 'CANNOT_TARGET_DISPLAY_NETWORK_WITHOUT_YOUTUBE',
        self::CANNOT_LINK_TO_COMPARISON_SHOPPING_SERVICE_ACCOUNT => 'CANNOT_LINK_TO_COMPARISON_SHOPPING_SERVICE_ACCOUNT',
        self::CANNOT_TARGET_NETWORK_FOR_COMPARISON_SHOPPING_SERVICE_LINKED_ACCOUNTS => 'CANNOT_TARGET_NETWORK_FOR_COMPARISON_SHOPPING_SERVICE_LINKED_ACCOUNTS',
        self::CANNOT_MODIFY_TEXT_ASSET_AUTOMATION_WITH_ENABLED_TRIAL => 'CANNOT_MODIFY_TEXT_ASSET_AUTOMATION_WITH_ENABLED_TRIAL',
        self::DYNAMIC_TEXT_ASSET_CANNOT_OPT_OUT_WITH_FINAL_URL_EXPANSION_OPT_IN => 'DYNAMIC_TEXT_ASSET_CANNOT_OPT_OUT_WITH_FINAL_URL_EXPANSION_OPT_IN',
        self::CANNOT_SET_CAMPAIGN_KEYWORD_MATCH_TYPE => 'CANNOT_SET_CAMPAIGN_KEYWORD_MATCH_TYPE',
        self::CANNOT_DISABLE_BROAD_MATCH_WHEN_KEYWORD_CONVERSION_IN_PROCESS => 'CANNOT_DISABLE_BROAD_MATCH_WHEN_KEYWORD_CONVERSION_IN_PROCESS',
        self::CANNOT_DISABLE_BROAD_MATCH_WHEN_TARGETING_BRANDS => 'CANNOT_DISABLE_BROAD_MATCH_WHEN_TARGETING_BRANDS',
        self::CANNOT_ENABLE_BROAD_MATCH_FOR_BASE_CAMPAIGN_WITH_PROMOTING_TRIAL => 'CANNOT_ENABLE_BROAD_MATCH_FOR_BASE_CAMPAIGN_WITH_PROMOTING_TRIAL',
        self::CANNOT_ENABLE_BROAD_MATCH_FOR_PROMOTING_TRIAL_CAMPAIGN => 'CANNOT_ENABLE_BROAD_MATCH_FOR_PROMOTING_TRIAL_CAMPAIGN',
        self::REQUIRED_BUSINESS_NAME_ASSET_NOT_LINKED => 'REQUIRED_BUSINESS_NAME_ASSET_NOT_LINKED',
        self::REQUIRED_LOGO_ASSET_NOT_LINKED => 'REQUIRED_LOGO_ASSET_NOT_LINKED',
        self::BRAND_GUIDELINES_NOT_ENABLED_FOR_CAMPAIGN => 'BRAND_GUIDELINES_NOT_ENABLED_FOR_CAMPAIGN',
        self::BRAND_GUIDELINES_MAIN_AND_ACCENT_COLORS_REQUIRED => 'BRAND_GUIDELINES_MAIN_AND_ACCENT_COLORS_REQUIRED',
        self::BRAND_GUIDELINES_COLOR_INVALID_FORMAT => 'BRAND_GUIDELINES_COLOR_INVALID_FORMAT',
        self::BRAND_GUIDELINES_UNSUPPORTED_FONT_FAMILY => 'BRAND_GUIDELINES_UNSUPPORTED_FONT_FAMILY',
        self::BRAND_GUIDELINES_UNSUPPORTED_CHANNEL => 'BRAND_GUIDELINES_UNSUPPORTED_CHANNEL',
        self::CANNOT_ENABLE_BRAND_GUIDELINES_FOR_TRAVEL_GOALS => 'CANNOT_ENABLE_BRAND_GUIDELINES_FOR_TRAVEL_GOALS',
        self::CUSTOMER_NOT_ALLOWLISTED_FOR_BRAND_GUIDELINES => 'CUSTOMER_NOT_ALLOWLISTED_FOR_BRAND_GUIDELINES',
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
class_alias(CampaignError::class, \Google\Ads\GoogleAds\V19\Errors\CampaignErrorEnum_CampaignError::class);

