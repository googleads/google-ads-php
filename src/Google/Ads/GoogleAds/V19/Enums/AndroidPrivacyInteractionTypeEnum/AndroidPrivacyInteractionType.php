<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/android_privacy_interaction_type.proto

namespace Google\Ads\GoogleAds\V19\Enums\AndroidPrivacyInteractionTypeEnum;

use UnexpectedValueException;

/**
 * Enumerates interaction types
 *
 * Protobuf type <code>google.ads.googleads.v19.enums.AndroidPrivacyInteractionTypeEnum.AndroidPrivacyInteractionType</code>
 */
class AndroidPrivacyInteractionType
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
     * The physical click interaction type.
     *
     * Generated from protobuf enum <code>CLICK = 2;</code>
     */
    const CLICK = 2;
    /**
     * The 10 seconds engaged view interaction type.
     *
     * Generated from protobuf enum <code>ENGAGED_VIEW = 3;</code>
     */
    const ENGAGED_VIEW = 3;
    /**
     * The view (ad impression) interaction type.
     *
     * Generated from protobuf enum <code>VIEW = 4;</code>
     */
    const VIEW = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CLICK => 'CLICK',
        self::ENGAGED_VIEW => 'ENGAGED_VIEW',
        self::VIEW => 'VIEW',
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
class_alias(AndroidPrivacyInteractionType::class, \Google\Ads\GoogleAds\V19\Enums\AndroidPrivacyInteractionTypeEnum_AndroidPrivacyInteractionType::class);

