<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/frequency_cap_level.proto

namespace Google\Ads\GoogleAds\V20\Enums\FrequencyCapLevelEnum;

use UnexpectedValueException;

/**
 * The level on which the cap is to be applied (e.g ad group ad, ad group).
 * Cap is applied to all the resources of this level.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.FrequencyCapLevelEnum.FrequencyCapLevel</code>
 */
class FrequencyCapLevel
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
     * The cap is applied at the ad group ad level.
     *
     * Generated from protobuf enum <code>AD_GROUP_AD = 2;</code>
     */
    const AD_GROUP_AD = 2;
    /**
     * The cap is applied at the ad group level.
     *
     * Generated from protobuf enum <code>AD_GROUP = 3;</code>
     */
    const AD_GROUP = 3;
    /**
     * The cap is applied at the campaign level.
     *
     * Generated from protobuf enum <code>CAMPAIGN = 4;</code>
     */
    const CAMPAIGN = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::AD_GROUP_AD => 'AD_GROUP_AD',
        self::AD_GROUP => 'AD_GROUP',
        self::CAMPAIGN => 'CAMPAIGN',
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
class_alias(FrequencyCapLevel::class, \Google\Ads\GoogleAds\V20\Enums\FrequencyCapLevelEnum_FrequencyCapLevel::class);

