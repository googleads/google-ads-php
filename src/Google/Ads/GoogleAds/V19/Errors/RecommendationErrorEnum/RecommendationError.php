<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/recommendation_error.proto

namespace Google\Ads\GoogleAds\V19\Errors\RecommendationErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible errors from applying a recommendation.
 *
 * Protobuf type <code>google.ads.googleads.v19.errors.RecommendationErrorEnum.RecommendationError</code>
 */
class RecommendationError
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
     * The specified budget amount is too low for example, lower than minimum
     * currency unit or lower than ad group minimum cost-per-click.
     *
     * Generated from protobuf enum <code>BUDGET_AMOUNT_TOO_SMALL = 2;</code>
     */
    const BUDGET_AMOUNT_TOO_SMALL = 2;
    /**
     * The specified budget amount is too large.
     *
     * Generated from protobuf enum <code>BUDGET_AMOUNT_TOO_LARGE = 3;</code>
     */
    const BUDGET_AMOUNT_TOO_LARGE = 3;
    /**
     * The specified budget amount is not a valid amount, for example, not a
     * multiple of minimum currency unit.
     *
     * Generated from protobuf enum <code>INVALID_BUDGET_AMOUNT = 4;</code>
     */
    const INVALID_BUDGET_AMOUNT = 4;
    /**
     * The specified keyword or ad violates ad policy.
     *
     * Generated from protobuf enum <code>POLICY_ERROR = 5;</code>
     */
    const POLICY_ERROR = 5;
    /**
     * The specified bid amount is not valid, for example, too many fractional
     * digits, or negative amount.
     *
     * Generated from protobuf enum <code>INVALID_BID_AMOUNT = 6;</code>
     */
    const INVALID_BID_AMOUNT = 6;
    /**
     * The number of keywords in ad group have reached the maximum allowed.
     *
     * Generated from protobuf enum <code>ADGROUP_KEYWORD_LIMIT = 7;</code>
     */
    const ADGROUP_KEYWORD_LIMIT = 7;
    /**
     * The recommendation requested to apply has already been applied.
     *
     * Generated from protobuf enum <code>RECOMMENDATION_ALREADY_APPLIED = 8;</code>
     */
    const RECOMMENDATION_ALREADY_APPLIED = 8;
    /**
     * The recommendation requested to apply has been invalidated.
     *
     * Generated from protobuf enum <code>RECOMMENDATION_INVALIDATED = 9;</code>
     */
    const RECOMMENDATION_INVALIDATED = 9;
    /**
     * The number of operations in a single request exceeds the maximum allowed.
     *
     * Generated from protobuf enum <code>TOO_MANY_OPERATIONS = 10;</code>
     */
    const TOO_MANY_OPERATIONS = 10;
    /**
     * There are no operations in the request.
     *
     * Generated from protobuf enum <code>NO_OPERATIONS = 11;</code>
     */
    const NO_OPERATIONS = 11;
    /**
     * Operations with multiple recommendation types are not supported when
     * partial failure mode is not enabled.
     *
     * Generated from protobuf enum <code>DIFFERENT_TYPES_NOT_SUPPORTED = 12;</code>
     */
    const DIFFERENT_TYPES_NOT_SUPPORTED = 12;
    /**
     * Request contains multiple operations with the same resource_name.
     *
     * Generated from protobuf enum <code>DUPLICATE_RESOURCE_NAME = 13;</code>
     */
    const DUPLICATE_RESOURCE_NAME = 13;
    /**
     * The recommendation requested to dismiss has already been dismissed.
     *
     * Generated from protobuf enum <code>RECOMMENDATION_ALREADY_DISMISSED = 14;</code>
     */
    const RECOMMENDATION_ALREADY_DISMISSED = 14;
    /**
     * The recommendation apply request was malformed and invalid.
     *
     * Generated from protobuf enum <code>INVALID_APPLY_REQUEST = 15;</code>
     */
    const INVALID_APPLY_REQUEST = 15;
    /**
     * The type of recommendation requested to apply is not supported.
     *
     * Generated from protobuf enum <code>RECOMMENDATION_TYPE_APPLY_NOT_SUPPORTED = 17;</code>
     */
    const RECOMMENDATION_TYPE_APPLY_NOT_SUPPORTED = 17;
    /**
     * The target multiplier specified is invalid.
     *
     * Generated from protobuf enum <code>INVALID_MULTIPLIER = 18;</code>
     */
    const INVALID_MULTIPLIER = 18;
    /**
     * The passed in advertising_channel_type is not supported.
     *
     * Generated from protobuf enum <code>ADVERTISING_CHANNEL_TYPE_GENERATE_NOT_SUPPORTED = 19;</code>
     */
    const ADVERTISING_CHANNEL_TYPE_GENERATE_NOT_SUPPORTED = 19;
    /**
     * The passed in recommendation_type is not supported.
     *
     * Generated from protobuf enum <code>RECOMMENDATION_TYPE_GENERATE_NOT_SUPPORTED = 20;</code>
     */
    const RECOMMENDATION_TYPE_GENERATE_NOT_SUPPORTED = 20;
    /**
     * One or more recommendation_types need to be passed into the generate
     * recommendations request.
     *
     * Generated from protobuf enum <code>RECOMMENDATION_TYPES_CANNOT_BE_EMPTY = 21;</code>
     */
    const RECOMMENDATION_TYPES_CANNOT_BE_EMPTY = 21;
    /**
     * Bidding info is required for the CAMPAIGN_BUDGET recommendation type.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_BIDDING_INFO = 22;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_BIDDING_INFO = 22;
    /**
     * Bidding strategy type is required for the CAMPAIGN_BUDGET
     * recommendation type.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_BIDDING_STRATEGY_TYPE = 23;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_BIDDING_STRATEGY_TYPE = 23;
    /**
     * Asset group info is required for the campaign budget recommendation type.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_ASSET_GROUP_INFO = 24;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_ASSET_GROUP_INFO = 24;
    /**
     * Asset group info with final url is required for the CAMPAIGN_BUDGET
     * recommendation type.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_ASSET_GROUP_INFO_WITH_FINAL_URL = 25;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_ASSET_GROUP_INFO_WITH_FINAL_URL = 25;
    /**
     * Country codes are required for the CAMPAIGN_BUDGET recommendation type
     * for SEARCH channel.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_COUNTRY_CODES_FOR_SEARCH_CHANNEL = 26;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_COUNTRY_CODES_FOR_SEARCH_CHANNEL = 26;
    /**
     * Country code is invalid for the CAMPAIGN_BUDGET recommendation type for
     * SEARCH channel.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_INVALID_COUNTRY_CODE_FOR_SEARCH_CHANNEL = 27;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_INVALID_COUNTRY_CODE_FOR_SEARCH_CHANNEL = 27;
    /**
     * Language codes are required for the CAMPAIGN_BUDGET recommendation type
     * for SEARCH channel.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_LANGUAGE_CODES_FOR_SEARCH_CHANNEL = 28;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_LANGUAGE_CODES_FOR_SEARCH_CHANNEL = 28;
    /**
     * Either positive or negative location ids are required for the
     * CAMPAIGN_BUDGET recommendation type for SEARCH channel.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_EITHER_POSITIVE_OR_NEGATIVE_LOCATION_IDS_FOR_SEARCH_CHANNEL = 29;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_EITHER_POSITIVE_OR_NEGATIVE_LOCATION_IDS_FOR_SEARCH_CHANNEL = 29;
    /**
     * Ad group info is required for the CAMPAIGN_BUDGET recommendation type for
     * SEARCH channel.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_AD_GROUP_INFO_FOR_SEARCH_CHANNEL = 30;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_AD_GROUP_INFO_FOR_SEARCH_CHANNEL = 30;
    /**
     * Keywords are required for the CAMPAIGN_BUDGET recommendation type for
     * SEARCH channel.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_KEYWORDS_FOR_SEARCH_CHANNEL = 31;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_KEYWORDS_FOR_SEARCH_CHANNEL = 31;
    /**
     * Location is required for the CAMPAIGN_BUDGET recommendation type for
     * bidding strategy type TARGET_IMPRESSION_SHARE.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_WITH_CHANNEL_TYPE_SEARCH_AND_BIDDING_STRATEGY_TYPE_TARGET_IMPRESSION_SHARE_REQUIRES_LOCATION = 32;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_WITH_CHANNEL_TYPE_SEARCH_AND_BIDDING_STRATEGY_TYPE_TARGET_IMPRESSION_SHARE_REQUIRES_LOCATION = 32;
    /**
     * Target impression share micros are required for the CAMPAIGN_BUDGET
     * recommendation type for bidding strategy type TARGET_IMPRESSION_SHARE.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_WITH_CHANNEL_TYPE_SEARCH_AND_BIDDING_STRATEGY_TYPE_TARGET_IMPRESSION_SHARE_REQUIRES_TARGET_IMPRESSION_SHARE_MICROS = 33;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_WITH_CHANNEL_TYPE_SEARCH_AND_BIDDING_STRATEGY_TYPE_TARGET_IMPRESSION_SHARE_REQUIRES_TARGET_IMPRESSION_SHARE_MICROS = 33;
    /**
     * Target impression share micros are required to be between 1 and 1000000
     * for the CAMPAIGN_BUDGET recommendation type for bidding strategy type
     * TARGET_IMPRESSION_SHARE.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_TARGET_IMPRESSION_SHARE_MICROS_BETWEEN_1_AND_1000000 = 34;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_TARGET_IMPRESSION_SHARE_MICROS_BETWEEN_1_AND_1000000 = 34;
    /**
     * Target impression share info is required for the CAMPAIGN_BUDGET
     * recommendation type for bidding strategy type TARGET_IMPRESSION_SHARE.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_WITH_CHANNEL_TYPE_SEARCH_AND_BIDDING_STRATEGY_TYPE_TARGET_IMPRESSION_SHARE_REQUIRES_TARGET_IMPRESSION_SHARE_INFO = 35;</code>
     */
    const CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_WITH_CHANNEL_TYPE_SEARCH_AND_BIDDING_STRATEGY_TYPE_TARGET_IMPRESSION_SHARE_REQUIRES_TARGET_IMPRESSION_SHARE_INFO = 35;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::BUDGET_AMOUNT_TOO_SMALL => 'BUDGET_AMOUNT_TOO_SMALL',
        self::BUDGET_AMOUNT_TOO_LARGE => 'BUDGET_AMOUNT_TOO_LARGE',
        self::INVALID_BUDGET_AMOUNT => 'INVALID_BUDGET_AMOUNT',
        self::POLICY_ERROR => 'POLICY_ERROR',
        self::INVALID_BID_AMOUNT => 'INVALID_BID_AMOUNT',
        self::ADGROUP_KEYWORD_LIMIT => 'ADGROUP_KEYWORD_LIMIT',
        self::RECOMMENDATION_ALREADY_APPLIED => 'RECOMMENDATION_ALREADY_APPLIED',
        self::RECOMMENDATION_INVALIDATED => 'RECOMMENDATION_INVALIDATED',
        self::TOO_MANY_OPERATIONS => 'TOO_MANY_OPERATIONS',
        self::NO_OPERATIONS => 'NO_OPERATIONS',
        self::DIFFERENT_TYPES_NOT_SUPPORTED => 'DIFFERENT_TYPES_NOT_SUPPORTED',
        self::DUPLICATE_RESOURCE_NAME => 'DUPLICATE_RESOURCE_NAME',
        self::RECOMMENDATION_ALREADY_DISMISSED => 'RECOMMENDATION_ALREADY_DISMISSED',
        self::INVALID_APPLY_REQUEST => 'INVALID_APPLY_REQUEST',
        self::RECOMMENDATION_TYPE_APPLY_NOT_SUPPORTED => 'RECOMMENDATION_TYPE_APPLY_NOT_SUPPORTED',
        self::INVALID_MULTIPLIER => 'INVALID_MULTIPLIER',
        self::ADVERTISING_CHANNEL_TYPE_GENERATE_NOT_SUPPORTED => 'ADVERTISING_CHANNEL_TYPE_GENERATE_NOT_SUPPORTED',
        self::RECOMMENDATION_TYPE_GENERATE_NOT_SUPPORTED => 'RECOMMENDATION_TYPE_GENERATE_NOT_SUPPORTED',
        self::RECOMMENDATION_TYPES_CANNOT_BE_EMPTY => 'RECOMMENDATION_TYPES_CANNOT_BE_EMPTY',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_BIDDING_INFO => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_BIDDING_INFO',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_BIDDING_STRATEGY_TYPE => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_BIDDING_STRATEGY_TYPE',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_ASSET_GROUP_INFO => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_ASSET_GROUP_INFO',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_ASSET_GROUP_INFO_WITH_FINAL_URL => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_ASSET_GROUP_INFO_WITH_FINAL_URL',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_COUNTRY_CODES_FOR_SEARCH_CHANNEL => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_COUNTRY_CODES_FOR_SEARCH_CHANNEL',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_INVALID_COUNTRY_CODE_FOR_SEARCH_CHANNEL => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_INVALID_COUNTRY_CODE_FOR_SEARCH_CHANNEL',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_LANGUAGE_CODES_FOR_SEARCH_CHANNEL => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_LANGUAGE_CODES_FOR_SEARCH_CHANNEL',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_EITHER_POSITIVE_OR_NEGATIVE_LOCATION_IDS_FOR_SEARCH_CHANNEL => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_EITHER_POSITIVE_OR_NEGATIVE_LOCATION_IDS_FOR_SEARCH_CHANNEL',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_AD_GROUP_INFO_FOR_SEARCH_CHANNEL => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_AD_GROUP_INFO_FOR_SEARCH_CHANNEL',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_KEYWORDS_FOR_SEARCH_CHANNEL => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_REQUIRES_KEYWORDS_FOR_SEARCH_CHANNEL',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_WITH_CHANNEL_TYPE_SEARCH_AND_BIDDING_STRATEGY_TYPE_TARGET_IMPRESSION_SHARE_REQUIRES_LOCATION => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_WITH_CHANNEL_TYPE_SEARCH_AND_BIDDING_STRATEGY_TYPE_TARGET_IMPRESSION_SHARE_REQUIRES_LOCATION',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_WITH_CHANNEL_TYPE_SEARCH_AND_BIDDING_STRATEGY_TYPE_TARGET_IMPRESSION_SHARE_REQUIRES_TARGET_IMPRESSION_SHARE_MICROS => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_WITH_CHANNEL_TYPE_SEARCH_AND_BIDDING_STRATEGY_TYPE_TARGET_IMPRESSION_SHARE_REQUIRES_TARGET_IMPRESSION_SHARE_MICROS',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_TARGET_IMPRESSION_SHARE_MICROS_BETWEEN_1_AND_1000000 => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_TARGET_IMPRESSION_SHARE_MICROS_BETWEEN_1_AND_1000000',
        self::CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_WITH_CHANNEL_TYPE_SEARCH_AND_BIDDING_STRATEGY_TYPE_TARGET_IMPRESSION_SHARE_REQUIRES_TARGET_IMPRESSION_SHARE_INFO => 'CAMPAIGN_BUDGET_RECOMMENDATION_TYPE_WITH_CHANNEL_TYPE_SEARCH_AND_BIDDING_STRATEGY_TYPE_TARGET_IMPRESSION_SHARE_REQUIRES_TARGET_IMPRESSION_SHARE_INFO',
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
class_alias(RecommendationError::class, \Google\Ads\GoogleAds\V19\Errors\RecommendationErrorEnum_RecommendationError::class);

