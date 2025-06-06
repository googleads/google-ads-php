<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/user_list_string_rule_item_operator.proto

namespace Google\Ads\GoogleAds\V20\Enums\UserListStringRuleItemOperatorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible user list string rule item operators.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.UserListStringRuleItemOperatorEnum.UserListStringRuleItemOperator</code>
 */
class UserListStringRuleItemOperator
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
     * Contains.
     *
     * Generated from protobuf enum <code>CONTAINS = 2;</code>
     */
    const CONTAINS = 2;
    /**
     * Equals.
     *
     * Generated from protobuf enum <code>EQUALS = 3;</code>
     */
    const EQUALS = 3;
    /**
     * Starts with.
     *
     * Generated from protobuf enum <code>STARTS_WITH = 4;</code>
     */
    const STARTS_WITH = 4;
    /**
     * Ends with.
     *
     * Generated from protobuf enum <code>ENDS_WITH = 5;</code>
     */
    const ENDS_WITH = 5;
    /**
     * Not equals.
     *
     * Generated from protobuf enum <code>NOT_EQUALS = 6;</code>
     */
    const NOT_EQUALS = 6;
    /**
     * Not contains.
     *
     * Generated from protobuf enum <code>NOT_CONTAINS = 7;</code>
     */
    const NOT_CONTAINS = 7;
    /**
     * Not starts with.
     *
     * Generated from protobuf enum <code>NOT_STARTS_WITH = 8;</code>
     */
    const NOT_STARTS_WITH = 8;
    /**
     * Not ends with.
     *
     * Generated from protobuf enum <code>NOT_ENDS_WITH = 9;</code>
     */
    const NOT_ENDS_WITH = 9;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CONTAINS => 'CONTAINS',
        self::EQUALS => 'EQUALS',
        self::STARTS_WITH => 'STARTS_WITH',
        self::ENDS_WITH => 'ENDS_WITH',
        self::NOT_EQUALS => 'NOT_EQUALS',
        self::NOT_CONTAINS => 'NOT_CONTAINS',
        self::NOT_STARTS_WITH => 'NOT_STARTS_WITH',
        self::NOT_ENDS_WITH => 'NOT_ENDS_WITH',
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
class_alias(UserListStringRuleItemOperator::class, \Google\Ads\GoogleAds\V20\Enums\UserListStringRuleItemOperatorEnum_UserListStringRuleItemOperator::class);

