<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/customer_lifecycle_goal_error.proto

namespace Google\Ads\GoogleAds\V19\Errors\CustomerLifecycleGoalErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible customer lifecycle goal errors.
 *
 * Protobuf type <code>google.ads.googleads.v19.errors.CustomerLifecycleGoalErrorEnum.CustomerLifecycleGoalError</code>
 */
class CustomerLifecycleGoalError
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
     * CustomerLifecycleGoal.customer_acquisition_goal_value_settings.value must
     * be set.
     *
     * Generated from protobuf enum <code>CUSTOMER_ACQUISITION_VALUE_MISSING = 2;</code>
     */
    const CUSTOMER_ACQUISITION_VALUE_MISSING = 2;
    /**
     * CustomerLifecycleGoal.customer_acquisition_goal_value_settings.value must
     * be no less than 0.01.
     *
     * Generated from protobuf enum <code>CUSTOMER_ACQUISITION_INVALID_VALUE = 3;</code>
     */
    const CUSTOMER_ACQUISITION_INVALID_VALUE = 3;
    /**
     * CustomerLifecycleGoal.customer_acquisition_goal_value_settings.high_lifetime_value
     * must be no less than 0.01. Also, to set this field,
     * CustomerLifecycleGoal.customer_acquisition_goal_value_settings.value must
     * also be present, and high_lifetime_value must be greater than value.
     *
     * Generated from protobuf enum <code>CUSTOMER_ACQUISITION_INVALID_HIGH_LIFETIME_VALUE = 4;</code>
     */
    const CUSTOMER_ACQUISITION_INVALID_HIGH_LIFETIME_VALUE = 4;
    /**
     * CustomerLifecycleGoal.customer_acquisition_goal_value_settings.value
     * cannot be cleared. This value would have no effect as long as none of
     * your campaigns adopt the customer acquisitiong goal.
     *
     * Generated from protobuf enum <code>CUSTOMER_ACQUISITION_VALUE_CANNOT_BE_CLEARED = 5;</code>
     */
    const CUSTOMER_ACQUISITION_VALUE_CANNOT_BE_CLEARED = 5;
    /**
     * CustomerLifecycleGoal.customer_acquisition_goal_value_settings.high_lifetime_value
     * cannot be cleared. This value would have no effect as long as none of
     * your campaigns adopt the high value optimization of customer acquisitiong
     * goal.
     *
     * Generated from protobuf enum <code>CUSTOMER_ACQUISITION_HIGH_LIFETIME_VALUE_CANNOT_BE_CLEARED = 6;</code>
     */
    const CUSTOMER_ACQUISITION_HIGH_LIFETIME_VALUE_CANNOT_BE_CLEARED = 6;
    /**
     * Found invalid value in
     * CustomerLifecycleGoal.lifecycle_goal_customer_definition_settings.existing_user_lists.
     * The userlist must be accessible, active and belong to one of the
     * following types: CRM_BASED, RULE_BASED, REMARKETING.
     *
     * Generated from protobuf enum <code>INVALID_EXISTING_USER_LIST = 7;</code>
     */
    const INVALID_EXISTING_USER_LIST = 7;
    /**
     * Found invalid value in
     * CustomerLifecycleGoal.lifecycle_goal_customer_definition_settings.high_lifetime_value_user_lists.
     * The userlist must be accessible, active and belong to one of the
     * following types: CRM_BASED, RULE_BASED, REMARKETING.
     *
     * Generated from protobuf enum <code>INVALID_HIGH_LIFETIME_VALUE_USER_LIST = 8;</code>
     */
    const INVALID_HIGH_LIFETIME_VALUE_USER_LIST = 8;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CUSTOMER_ACQUISITION_VALUE_MISSING => 'CUSTOMER_ACQUISITION_VALUE_MISSING',
        self::CUSTOMER_ACQUISITION_INVALID_VALUE => 'CUSTOMER_ACQUISITION_INVALID_VALUE',
        self::CUSTOMER_ACQUISITION_INVALID_HIGH_LIFETIME_VALUE => 'CUSTOMER_ACQUISITION_INVALID_HIGH_LIFETIME_VALUE',
        self::CUSTOMER_ACQUISITION_VALUE_CANNOT_BE_CLEARED => 'CUSTOMER_ACQUISITION_VALUE_CANNOT_BE_CLEARED',
        self::CUSTOMER_ACQUISITION_HIGH_LIFETIME_VALUE_CANNOT_BE_CLEARED => 'CUSTOMER_ACQUISITION_HIGH_LIFETIME_VALUE_CANNOT_BE_CLEARED',
        self::INVALID_EXISTING_USER_LIST => 'INVALID_EXISTING_USER_LIST',
        self::INVALID_HIGH_LIFETIME_VALUE_USER_LIST => 'INVALID_HIGH_LIFETIME_VALUE_USER_LIST',
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
class_alias(CustomerLifecycleGoalError::class, \Google\Ads\GoogleAds\V19\Errors\CustomerLifecycleGoalErrorEnum_CustomerLifecycleGoalError::class);

