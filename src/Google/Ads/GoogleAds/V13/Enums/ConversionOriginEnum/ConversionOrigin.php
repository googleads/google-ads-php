<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/enums/conversion_origin.proto

namespace Google\Ads\GoogleAds\V13\Enums\ConversionOriginEnum;

use UnexpectedValueException;

/**
 * The possible places where a conversion can occur.
 *
 * Protobuf type <code>google.ads.googleads.v13.enums.ConversionOriginEnum.ConversionOrigin</code>
 */
class ConversionOrigin
{
    /**
     * The conversion origin has not been specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The conversion origin is not known in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Conversion that occurs when a user visits a website or takes an action
     * there after viewing an ad.
     *
     * Generated from protobuf enum <code>WEBSITE = 2;</code>
     */
    const WEBSITE = 2;
    /**
     * Conversions reported by an offline pipeline which collects local actions
     * from Google-hosted pages (for example, Google Maps, Google Place Page,
     * etc) and attributes them to relevant ad events.
     *
     * Generated from protobuf enum <code>GOOGLE_HOSTED = 3;</code>
     */
    const GOOGLE_HOSTED = 3;
    /**
     * Conversion that occurs when a user performs an action through any app
     * platforms.
     *
     * Generated from protobuf enum <code>APP = 4;</code>
     */
    const APP = 4;
    /**
     * Conversion that occurs when a user makes a call from ads.
     *
     * Generated from protobuf enum <code>CALL_FROM_ADS = 5;</code>
     */
    const CALL_FROM_ADS = 5;
    /**
     * Conversion that occurs when a user visits or makes a purchase at a
     * physical store.
     *
     * Generated from protobuf enum <code>STORE = 6;</code>
     */
    const STORE = 6;
    /**
     * Conversion that occurs on YouTube.
     *
     * Generated from protobuf enum <code>YOUTUBE_HOSTED = 7;</code>
     */
    const YOUTUBE_HOSTED = 7;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::WEBSITE => 'WEBSITE',
        self::GOOGLE_HOSTED => 'GOOGLE_HOSTED',
        self::APP => 'APP',
        self::CALL_FROM_ADS => 'CALL_FROM_ADS',
        self::STORE => 'STORE',
        self::YOUTUBE_HOSTED => 'YOUTUBE_HOSTED',
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
class_alias(ConversionOrigin::class, \Google\Ads\GoogleAds\V13\Enums\ConversionOriginEnum_ConversionOrigin::class);

