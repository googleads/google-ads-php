<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/conversion_environment_enum.proto

namespace Google\Ads\GoogleAds\V20\Enums\ConversionEnvironmentEnum;

use UnexpectedValueException;

/**
 * Conversion environment of the uploaded conversion.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.ConversionEnvironmentEnum.ConversionEnvironment</code>
 */
class ConversionEnvironment
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
     * The conversion was recorded on an app.
     *
     * Generated from protobuf enum <code>APP = 2;</code>
     */
    const APP = 2;
    /**
     * The conversion was recorded on a website.
     *
     * Generated from protobuf enum <code>WEB = 3;</code>
     */
    const WEB = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::APP => 'APP',
        self::WEB => 'WEB',
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
class_alias(ConversionEnvironment::class, \Google\Ads\GoogleAds\V20\Enums\ConversionEnvironmentEnum_ConversionEnvironment::class);

