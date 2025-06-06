<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/app_url_operating_system_type.proto

namespace Google\Ads\GoogleAds\V20\Enums\AppUrlOperatingSystemTypeEnum;

use UnexpectedValueException;

/**
 * Operating System
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.AppUrlOperatingSystemTypeEnum.AppUrlOperatingSystemType</code>
 */
class AppUrlOperatingSystemType
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
     * The Apple IOS operating system.
     *
     * Generated from protobuf enum <code>IOS = 2;</code>
     */
    const IOS = 2;
    /**
     * The Android operating system.
     *
     * Generated from protobuf enum <code>ANDROID = 3;</code>
     */
    const ANDROID = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::IOS => 'IOS',
        self::ANDROID => 'ANDROID',
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
class_alias(AppUrlOperatingSystemType::class, \Google\Ads\GoogleAds\V20\Enums\AppUrlOperatingSystemTypeEnum_AppUrlOperatingSystemType::class);

