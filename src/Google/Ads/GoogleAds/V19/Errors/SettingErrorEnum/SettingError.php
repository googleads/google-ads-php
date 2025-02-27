<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/setting_error.proto

namespace Google\Ads\GoogleAds\V19\Errors\SettingErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible setting errors.
 *
 * Protobuf type <code>google.ads.googleads.v19.errors.SettingErrorEnum.SettingError</code>
 */
class SettingError
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
     * The campaign setting is not available for this Google Ads account.
     *
     * Generated from protobuf enum <code>SETTING_TYPE_IS_NOT_AVAILABLE = 3;</code>
     */
    const SETTING_TYPE_IS_NOT_AVAILABLE = 3;
    /**
     * The setting is not compatible with the campaign.
     *
     * Generated from protobuf enum <code>SETTING_TYPE_IS_NOT_COMPATIBLE_WITH_CAMPAIGN = 4;</code>
     */
    const SETTING_TYPE_IS_NOT_COMPATIBLE_WITH_CAMPAIGN = 4;
    /**
     * The supplied TargetingSetting contains an invalid CriterionTypeGroup. See
     * CriterionTypeGroup documentation for CriterionTypeGroups allowed
     * in Campaign or AdGroup TargetingSettings.
     *
     * Generated from protobuf enum <code>TARGETING_SETTING_CONTAINS_INVALID_CRITERION_TYPE_GROUP = 5;</code>
     */
    const TARGETING_SETTING_CONTAINS_INVALID_CRITERION_TYPE_GROUP = 5;
    /**
     * TargetingSetting must not explicitly
     * set any of the Demographic CriterionTypeGroups (AGE_RANGE, GENDER,
     * PARENT, INCOME_RANGE) to false (it's okay to not set them at all, in
     * which case the system will set them to true automatically).
     *
     * Generated from protobuf enum <code>TARGETING_SETTING_DEMOGRAPHIC_CRITERION_TYPE_GROUPS_MUST_BE_SET_TO_TARGET_ALL = 6;</code>
     */
    const TARGETING_SETTING_DEMOGRAPHIC_CRITERION_TYPE_GROUPS_MUST_BE_SET_TO_TARGET_ALL = 6;
    /**
     * TargetingSetting cannot change any of
     * the Demographic CriterionTypeGroups (AGE_RANGE, GENDER, PARENT,
     * INCOME_RANGE) from true to false.
     *
     * Generated from protobuf enum <code>TARGETING_SETTING_CANNOT_CHANGE_TARGET_ALL_TO_FALSE_FOR_DEMOGRAPHIC_CRITERION_TYPE_GROUP = 7;</code>
     */
    const TARGETING_SETTING_CANNOT_CHANGE_TARGET_ALL_TO_FALSE_FOR_DEMOGRAPHIC_CRITERION_TYPE_GROUP = 7;
    /**
     * At least one feed id should be present.
     *
     * Generated from protobuf enum <code>DYNAMIC_SEARCH_ADS_SETTING_AT_LEAST_ONE_FEED_ID_MUST_BE_PRESENT = 8;</code>
     */
    const DYNAMIC_SEARCH_ADS_SETTING_AT_LEAST_ONE_FEED_ID_MUST_BE_PRESENT = 8;
    /**
     * The supplied DynamicSearchAdsSetting contains an invalid domain name.
     *
     * Generated from protobuf enum <code>DYNAMIC_SEARCH_ADS_SETTING_CONTAINS_INVALID_DOMAIN_NAME = 9;</code>
     */
    const DYNAMIC_SEARCH_ADS_SETTING_CONTAINS_INVALID_DOMAIN_NAME = 9;
    /**
     * The supplied DynamicSearchAdsSetting contains a subdomain name.
     *
     * Generated from protobuf enum <code>DYNAMIC_SEARCH_ADS_SETTING_CONTAINS_SUBDOMAIN_NAME = 10;</code>
     */
    const DYNAMIC_SEARCH_ADS_SETTING_CONTAINS_SUBDOMAIN_NAME = 10;
    /**
     * The supplied DynamicSearchAdsSetting contains an invalid language code.
     *
     * Generated from protobuf enum <code>DYNAMIC_SEARCH_ADS_SETTING_CONTAINS_INVALID_LANGUAGE_CODE = 11;</code>
     */
    const DYNAMIC_SEARCH_ADS_SETTING_CONTAINS_INVALID_LANGUAGE_CODE = 11;
    /**
     * TargetingSettings in search campaigns should not have
     * CriterionTypeGroup.PLACEMENT set to targetAll.
     *
     * Generated from protobuf enum <code>TARGET_ALL_IS_NOT_ALLOWED_FOR_PLACEMENT_IN_SEARCH_CAMPAIGN = 12;</code>
     */
    const TARGET_ALL_IS_NOT_ALLOWED_FOR_PLACEMENT_IN_SEARCH_CAMPAIGN = 12;
    /**
     * The setting value is not compatible with the campaign type.
     *
     * Generated from protobuf enum <code>SETTING_VALUE_NOT_COMPATIBLE_WITH_CAMPAIGN = 20;</code>
     */
    const SETTING_VALUE_NOT_COMPATIBLE_WITH_CAMPAIGN = 20;
    /**
     * Switching from observation setting to targeting setting is not allowed
     * for Customer Match lists. See
     * https://support.google.com/google-ads/answer/6299717.
     *
     * Generated from protobuf enum <code>BID_ONLY_IS_NOT_ALLOWED_TO_BE_MODIFIED_WITH_CUSTOMER_MATCH_TARGETING = 21;</code>
     */
    const BID_ONLY_IS_NOT_ALLOWED_TO_BE_MODIFIED_WITH_CUSTOMER_MATCH_TARGETING = 21;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::SETTING_TYPE_IS_NOT_AVAILABLE => 'SETTING_TYPE_IS_NOT_AVAILABLE',
        self::SETTING_TYPE_IS_NOT_COMPATIBLE_WITH_CAMPAIGN => 'SETTING_TYPE_IS_NOT_COMPATIBLE_WITH_CAMPAIGN',
        self::TARGETING_SETTING_CONTAINS_INVALID_CRITERION_TYPE_GROUP => 'TARGETING_SETTING_CONTAINS_INVALID_CRITERION_TYPE_GROUP',
        self::TARGETING_SETTING_DEMOGRAPHIC_CRITERION_TYPE_GROUPS_MUST_BE_SET_TO_TARGET_ALL => 'TARGETING_SETTING_DEMOGRAPHIC_CRITERION_TYPE_GROUPS_MUST_BE_SET_TO_TARGET_ALL',
        self::TARGETING_SETTING_CANNOT_CHANGE_TARGET_ALL_TO_FALSE_FOR_DEMOGRAPHIC_CRITERION_TYPE_GROUP => 'TARGETING_SETTING_CANNOT_CHANGE_TARGET_ALL_TO_FALSE_FOR_DEMOGRAPHIC_CRITERION_TYPE_GROUP',
        self::DYNAMIC_SEARCH_ADS_SETTING_AT_LEAST_ONE_FEED_ID_MUST_BE_PRESENT => 'DYNAMIC_SEARCH_ADS_SETTING_AT_LEAST_ONE_FEED_ID_MUST_BE_PRESENT',
        self::DYNAMIC_SEARCH_ADS_SETTING_CONTAINS_INVALID_DOMAIN_NAME => 'DYNAMIC_SEARCH_ADS_SETTING_CONTAINS_INVALID_DOMAIN_NAME',
        self::DYNAMIC_SEARCH_ADS_SETTING_CONTAINS_SUBDOMAIN_NAME => 'DYNAMIC_SEARCH_ADS_SETTING_CONTAINS_SUBDOMAIN_NAME',
        self::DYNAMIC_SEARCH_ADS_SETTING_CONTAINS_INVALID_LANGUAGE_CODE => 'DYNAMIC_SEARCH_ADS_SETTING_CONTAINS_INVALID_LANGUAGE_CODE',
        self::TARGET_ALL_IS_NOT_ALLOWED_FOR_PLACEMENT_IN_SEARCH_CAMPAIGN => 'TARGET_ALL_IS_NOT_ALLOWED_FOR_PLACEMENT_IN_SEARCH_CAMPAIGN',
        self::SETTING_VALUE_NOT_COMPATIBLE_WITH_CAMPAIGN => 'SETTING_VALUE_NOT_COMPATIBLE_WITH_CAMPAIGN',
        self::BID_ONLY_IS_NOT_ALLOWED_TO_BE_MODIFIED_WITH_CUSTOMER_MATCH_TARGETING => 'BID_ONLY_IS_NOT_ALLOWED_TO_BE_MODIFIED_WITH_CUSTOMER_MATCH_TARGETING',
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
class_alias(SettingError::class, \Google\Ads\GoogleAds\V19\Errors\SettingErrorEnum_SettingError::class);

