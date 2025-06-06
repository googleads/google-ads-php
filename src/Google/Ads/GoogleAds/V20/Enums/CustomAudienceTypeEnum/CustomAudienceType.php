<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/custom_audience_type.proto

namespace Google\Ads\GoogleAds\V20\Enums\CustomAudienceTypeEnum;

use UnexpectedValueException;

/**
 * Enum containing possible custom audience types.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.CustomAudienceTypeEnum.CustomAudienceType</code>
 */
class CustomAudienceType
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
     * Google Ads will auto-select the best interpretation at serving
     * time.
     *
     * Generated from protobuf enum <code>AUTO = 2;</code>
     */
    const AUTO = 2;
    /**
     * Matches users by their interests.
     *
     * Generated from protobuf enum <code>INTEREST = 3;</code>
     */
    const INTEREST = 3;
    /**
     * Matches users by topics they are researching or products they are
     * considering for purchase.
     *
     * Generated from protobuf enum <code>PURCHASE_INTENT = 4;</code>
     */
    const PURCHASE_INTENT = 4;
    /**
     * Matches users by what they searched on Google Search.
     *
     * Generated from protobuf enum <code>SEARCH = 5;</code>
     */
    const SEARCH = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::AUTO => 'AUTO',
        self::INTEREST => 'INTEREST',
        self::PURCHASE_INTENT => 'PURCHASE_INTENT',
        self::SEARCH => 'SEARCH',
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
class_alias(CustomAudienceType::class, \Google\Ads\GoogleAds\V20\Enums\CustomAudienceTypeEnum_CustomAudienceType::class);

