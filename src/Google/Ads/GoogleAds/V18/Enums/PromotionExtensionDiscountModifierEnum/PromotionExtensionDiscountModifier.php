<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/enums/promotion_extension_discount_modifier.proto

namespace Google\Ads\GoogleAds\V18\Enums\PromotionExtensionDiscountModifierEnum;

use UnexpectedValueException;

/**
 * A promotion extension discount modifier.
 *
 * Protobuf type <code>google.ads.googleads.v18.enums.PromotionExtensionDiscountModifierEnum.PromotionExtensionDiscountModifier</code>
 */
class PromotionExtensionDiscountModifier
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
     * 'Up to'.
     *
     * Generated from protobuf enum <code>UP_TO = 2;</code>
     */
    const UP_TO = 2;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::UP_TO => 'UP_TO',
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
class_alias(PromotionExtensionDiscountModifier::class, \Google\Ads\GoogleAds\V18\Enums\PromotionExtensionDiscountModifierEnum_PromotionExtensionDiscountModifier::class);

