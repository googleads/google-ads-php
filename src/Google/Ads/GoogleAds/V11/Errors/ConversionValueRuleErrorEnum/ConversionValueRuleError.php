<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v11/errors/conversion_value_rule_error.proto

namespace Google\Ads\GoogleAds\V11\Errors\ConversionValueRuleErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible conversion value rule errors.
 *
 * Protobuf type <code>google.ads.googleads.v11.errors.ConversionValueRuleErrorEnum.ConversionValueRuleError</code>
 */
class ConversionValueRuleError
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
     * The value rule's geo location condition contains invalid geo target
     * constant(s), for example, there's no matching geo target.
     *
     * Generated from protobuf enum <code>INVALID_GEO_TARGET_CONSTANT = 2;</code>
     */
    const INVALID_GEO_TARGET_CONSTANT = 2;
    /**
     * The value rule's geo location condition contains conflicting included and
     * excluded geo targets. Specifically, some of the excluded geo target(s)
     * are the same as or contain some of the included geo target(s). For
     * example, the geo location condition includes California but excludes U.S.
     *
     * Generated from protobuf enum <code>CONFLICTING_INCLUDED_AND_EXCLUDED_GEO_TARGET = 3;</code>
     */
    const CONFLICTING_INCLUDED_AND_EXCLUDED_GEO_TARGET = 3;
    /**
     * User specified conflicting conditions for two value rules in the same
     * value rule set.
     *
     * Generated from protobuf enum <code>CONFLICTING_CONDITIONS = 4;</code>
     */
    const CONFLICTING_CONDITIONS = 4;
    /**
     * The value rule cannot be removed because it's still included in some
     * value rule set.
     *
     * Generated from protobuf enum <code>CANNOT_REMOVE_IF_INCLUDED_IN_VALUE_RULE_SET = 5;</code>
     */
    const CANNOT_REMOVE_IF_INCLUDED_IN_VALUE_RULE_SET = 5;
    /**
     * The value rule contains a condition that's not allowed by the value rule
     * set including this value rule.
     *
     * Generated from protobuf enum <code>CONDITION_NOT_ALLOWED = 6;</code>
     */
    const CONDITION_NOT_ALLOWED = 6;
    /**
     * The value rule contains a field that should be unset.
     *
     * Generated from protobuf enum <code>FIELD_MUST_BE_UNSET = 7;</code>
     */
    const FIELD_MUST_BE_UNSET = 7;
    /**
     * Pausing the value rule requires pausing the value rule set because the
     * value rule is (one of) the last enabled in the value rule set.
     *
     * Generated from protobuf enum <code>CANNOT_PAUSE_UNLESS_VALUE_RULE_SET_IS_PAUSED = 8;</code>
     */
    const CANNOT_PAUSE_UNLESS_VALUE_RULE_SET_IS_PAUSED = 8;
    /**
     * The value rule's geo location condition contains untargetable geo target
     * constant(s).
     *
     * Generated from protobuf enum <code>UNTARGETABLE_GEO_TARGET = 9;</code>
     */
    const UNTARGETABLE_GEO_TARGET = 9;
    /**
     * The value rule's audience condition contains invalid user list(s). In
     * another word, there's no matching user list.
     *
     * Generated from protobuf enum <code>INVALID_AUDIENCE_USER_LIST = 10;</code>
     */
    const INVALID_AUDIENCE_USER_LIST = 10;
    /**
     * The value rule's audience condition contains inaccessible user list(s).
     *
     * Generated from protobuf enum <code>INACCESSIBLE_USER_LIST = 11;</code>
     */
    const INACCESSIBLE_USER_LIST = 11;
    /**
     * The value rule's audience condition contains invalid user_interest(s).
     * This might be because there is no matching user interest, or the user
     * interest is not visible.
     *
     * Generated from protobuf enum <code>INVALID_AUDIENCE_USER_INTEREST = 12;</code>
     */
    const INVALID_AUDIENCE_USER_INTEREST = 12;
    /**
     * When a value rule is created, it shouldn't have REMOVED status.
     *
     * Generated from protobuf enum <code>CANNOT_ADD_RULE_WITH_STATUS_REMOVED = 13;</code>
     */
    const CANNOT_ADD_RULE_WITH_STATUS_REMOVED = 13;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::INVALID_GEO_TARGET_CONSTANT => 'INVALID_GEO_TARGET_CONSTANT',
        self::CONFLICTING_INCLUDED_AND_EXCLUDED_GEO_TARGET => 'CONFLICTING_INCLUDED_AND_EXCLUDED_GEO_TARGET',
        self::CONFLICTING_CONDITIONS => 'CONFLICTING_CONDITIONS',
        self::CANNOT_REMOVE_IF_INCLUDED_IN_VALUE_RULE_SET => 'CANNOT_REMOVE_IF_INCLUDED_IN_VALUE_RULE_SET',
        self::CONDITION_NOT_ALLOWED => 'CONDITION_NOT_ALLOWED',
        self::FIELD_MUST_BE_UNSET => 'FIELD_MUST_BE_UNSET',
        self::CANNOT_PAUSE_UNLESS_VALUE_RULE_SET_IS_PAUSED => 'CANNOT_PAUSE_UNLESS_VALUE_RULE_SET_IS_PAUSED',
        self::UNTARGETABLE_GEO_TARGET => 'UNTARGETABLE_GEO_TARGET',
        self::INVALID_AUDIENCE_USER_LIST => 'INVALID_AUDIENCE_USER_LIST',
        self::INACCESSIBLE_USER_LIST => 'INACCESSIBLE_USER_LIST',
        self::INVALID_AUDIENCE_USER_INTEREST => 'INVALID_AUDIENCE_USER_INTEREST',
        self::CANNOT_ADD_RULE_WITH_STATUS_REMOVED => 'CANNOT_ADD_RULE_WITH_STATUS_REMOVED',
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
class_alias(ConversionValueRuleError::class, \Google\Ads\GoogleAds\V11\Errors\ConversionValueRuleErrorEnum_ConversionValueRuleError::class);

