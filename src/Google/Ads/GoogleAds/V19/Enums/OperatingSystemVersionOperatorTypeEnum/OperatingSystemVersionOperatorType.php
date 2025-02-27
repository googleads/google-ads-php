<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/operating_system_version_operator_type.proto

namespace Google\Ads\GoogleAds\V19\Enums\OperatingSystemVersionOperatorTypeEnum;

use UnexpectedValueException;

/**
 * The type of operating system version.
 *
 * Protobuf type <code>google.ads.googleads.v19.enums.OperatingSystemVersionOperatorTypeEnum.OperatingSystemVersionOperatorType</code>
 */
class OperatingSystemVersionOperatorType
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
     * Equals to the specified version.
     *
     * Generated from protobuf enum <code>EQUALS_TO = 2;</code>
     */
    const EQUALS_TO = 2;
    /**
     * Greater than or equals to the specified version.
     *
     * Generated from protobuf enum <code>GREATER_THAN_EQUALS_TO = 4;</code>
     */
    const GREATER_THAN_EQUALS_TO = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::EQUALS_TO => 'EQUALS_TO',
        self::GREATER_THAN_EQUALS_TO => 'GREATER_THAN_EQUALS_TO',
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
class_alias(OperatingSystemVersionOperatorType::class, \Google\Ads\GoogleAds\V19\Enums\OperatingSystemVersionOperatorTypeEnum_OperatingSystemVersionOperatorType::class);

