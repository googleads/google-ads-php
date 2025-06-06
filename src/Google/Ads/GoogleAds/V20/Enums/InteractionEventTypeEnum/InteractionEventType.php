<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/interaction_event_type.proto

namespace Google\Ads\GoogleAds\V20\Enums\InteractionEventTypeEnum;

use UnexpectedValueException;

/**
 * Enum describing possible types of payable and free interactions.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.InteractionEventTypeEnum.InteractionEventType</code>
 */
class InteractionEventType
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
     * Click to site. In most cases, this interaction navigates to an external
     * location, usually the advertiser's landing page. This is also the default
     * InteractionEventType for click events.
     *
     * Generated from protobuf enum <code>CLICK = 2;</code>
     */
    const CLICK = 2;
    /**
     * The user's expressed intent to engage with the ad in-place.
     *
     * Generated from protobuf enum <code>ENGAGEMENT = 3;</code>
     */
    const ENGAGEMENT = 3;
    /**
     * User viewed a video ad.
     *
     * Generated from protobuf enum <code>VIDEO_VIEW = 4;</code>
     */
    const VIDEO_VIEW = 4;
    /**
     * The default InteractionEventType for ad conversion events.
     * This is used when an ad conversion row does NOT indicate
     * that the free interactions (for example, the ad conversions)
     * should be 'promoted' and reported as part of the core metrics.
     * These are simply other (ad) conversions.
     *
     * Generated from protobuf enum <code>NONE = 5;</code>
     */
    const NONE = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CLICK => 'CLICK',
        self::ENGAGEMENT => 'ENGAGEMENT',
        self::VIDEO_VIEW => 'VIDEO_VIEW',
        self::NONE => 'NONE',
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
class_alias(InteractionEventType::class, \Google\Ads\GoogleAds\V20\Enums\InteractionEventTypeEnum_InteractionEventType::class);

