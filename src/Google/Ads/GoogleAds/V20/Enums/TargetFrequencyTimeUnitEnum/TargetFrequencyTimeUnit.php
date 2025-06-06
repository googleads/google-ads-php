<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/target_frequency_time_unit.proto

namespace Google\Ads\GoogleAds\V20\Enums\TargetFrequencyTimeUnitEnum;

use UnexpectedValueException;

/**
 * Enum describing time window over which we want to reach Target Frequency.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.TargetFrequencyTimeUnitEnum.TargetFrequencyTimeUnit</code>
 */
class TargetFrequencyTimeUnit
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
     * Optimize bidding to reach Target Frequency in a week.
     *
     * Generated from protobuf enum <code>WEEKLY = 2;</code>
     */
    const WEEKLY = 2;
    /**
     * Optimize bidding to reach Target Frequency in a month.
     *
     * Generated from protobuf enum <code>MONTHLY = 3;</code>
     */
    const MONTHLY = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::WEEKLY => 'WEEKLY',
        self::MONTHLY => 'MONTHLY',
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
class_alias(TargetFrequencyTimeUnit::class, \Google\Ads\GoogleAds\V20\Enums\TargetFrequencyTimeUnitEnum_TargetFrequencyTimeUnit::class);

