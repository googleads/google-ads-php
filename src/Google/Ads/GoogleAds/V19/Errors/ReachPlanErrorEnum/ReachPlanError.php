<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/reach_plan_error.proto

namespace Google\Ads\GoogleAds\V19\Errors\ReachPlanErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible errors from ReachPlanService.
 *
 * Protobuf type <code>google.ads.googleads.v19.errors.ReachPlanErrorEnum.ReachPlanError</code>
 */
class ReachPlanError
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
     * Not forecastable due to missing rate card data.
     *
     * Generated from protobuf enum <code>NOT_FORECASTABLE_MISSING_RATE = 2;</code>
     */
    const NOT_FORECASTABLE_MISSING_RATE = 2;
    /**
     * Not forecastable due to not enough inventory.
     *
     * Generated from protobuf enum <code>NOT_FORECASTABLE_NOT_ENOUGH_INVENTORY = 3;</code>
     */
    const NOT_FORECASTABLE_NOT_ENOUGH_INVENTORY = 3;
    /**
     * Not forecastable due to account not being enabled.
     *
     * Generated from protobuf enum <code>NOT_FORECASTABLE_ACCOUNT_NOT_ENABLED = 4;</code>
     */
    const NOT_FORECASTABLE_ACCOUNT_NOT_ENABLED = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::NOT_FORECASTABLE_MISSING_RATE => 'NOT_FORECASTABLE_MISSING_RATE',
        self::NOT_FORECASTABLE_NOT_ENOUGH_INVENTORY => 'NOT_FORECASTABLE_NOT_ENOUGH_INVENTORY',
        self::NOT_FORECASTABLE_ACCOUNT_NOT_ENABLED => 'NOT_FORECASTABLE_ACCOUNT_NOT_ENABLED',
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
class_alias(ReachPlanError::class, \Google\Ads\GoogleAds\V19\Errors\ReachPlanErrorEnum_ReachPlanError::class);

