<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/display_ad_format_setting.proto

namespace Google\Ads\GoogleAds\V20\Enums\DisplayAdFormatSettingEnum;

use UnexpectedValueException;

/**
 * Enumerates display ad format settings.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.DisplayAdFormatSettingEnum.DisplayAdFormatSetting</code>
 */
class DisplayAdFormatSetting
{
    /**
     * Not specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The value is unknown in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Text, image and native formats.
     *
     * Generated from protobuf enum <code>ALL_FORMATS = 2;</code>
     */
    const ALL_FORMATS = 2;
    /**
     * Text and image formats.
     *
     * Generated from protobuf enum <code>NON_NATIVE = 3;</code>
     */
    const NON_NATIVE = 3;
    /**
     * Native format, for example, the format rendering is controlled by the
     * publisher and not by Google.
     *
     * Generated from protobuf enum <code>NATIVE = 4;</code>
     */
    const NATIVE = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::ALL_FORMATS => 'ALL_FORMATS',
        self::NON_NATIVE => 'NON_NATIVE',
        self::NATIVE => 'NATIVE',
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
class_alias(DisplayAdFormatSetting::class, \Google\Ads\GoogleAds\V20\Enums\DisplayAdFormatSettingEnum_DisplayAdFormatSetting::class);

