<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/fixed_cpm_goal.proto

namespace Google\Ads\GoogleAds\V20\Enums\FixedCpmGoalEnum;

use UnexpectedValueException;

/**
 * Enum describing the goal of the Fixed CPM bidding strategy.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.FixedCpmGoalEnum.FixedCpmGoal</code>
 */
class FixedCpmGoal
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
     * Maximize reach, that is the number of users who saw the ads in this
     * campaign.
     *
     * Generated from protobuf enum <code>REACH = 2;</code>
     */
    const REACH = 2;
    /**
     * Target Frequency CPM bidder. Optimize bidding to reach a single user with
     * the requested frequency.
     *
     * Generated from protobuf enum <code>TARGET_FREQUENCY = 3;</code>
     */
    const TARGET_FREQUENCY = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::REACH => 'REACH',
        self::TARGET_FREQUENCY => 'TARGET_FREQUENCY',
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
class_alias(FixedCpmGoal::class, \Google\Ads\GoogleAds\V20\Enums\FixedCpmGoalEnum_FixedCpmGoal::class);

