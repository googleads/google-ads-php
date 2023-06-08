<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v14/enums/criterion_category_channel_availability_mode.proto

namespace Google\Ads\GoogleAds\V14\Enums\CriterionCategoryChannelAvailabilityModeEnum;

use UnexpectedValueException;

/**
 * Enum containing the possible CriterionCategoryChannelAvailabilityMode.
 *
 * Protobuf type <code>google.ads.googleads.v14.enums.CriterionCategoryChannelAvailabilityModeEnum.CriterionCategoryChannelAvailabilityMode</code>
 */
class CriterionCategoryChannelAvailabilityMode
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
     * The category is available to campaigns of all channel types and subtypes.
     *
     * Generated from protobuf enum <code>ALL_CHANNELS = 2;</code>
     */
    const ALL_CHANNELS = 2;
    /**
     * The category is available to campaigns of a specific channel type,
     * including all subtypes under it.
     *
     * Generated from protobuf enum <code>CHANNEL_TYPE_AND_ALL_SUBTYPES = 3;</code>
     */
    const CHANNEL_TYPE_AND_ALL_SUBTYPES = 3;
    /**
     * The category is available to campaigns of a specific channel type and
     * subtype(s).
     *
     * Generated from protobuf enum <code>CHANNEL_TYPE_AND_SUBSET_SUBTYPES = 4;</code>
     */
    const CHANNEL_TYPE_AND_SUBSET_SUBTYPES = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::ALL_CHANNELS => 'ALL_CHANNELS',
        self::CHANNEL_TYPE_AND_ALL_SUBTYPES => 'CHANNEL_TYPE_AND_ALL_SUBTYPES',
        self::CHANNEL_TYPE_AND_SUBSET_SUBTYPES => 'CHANNEL_TYPE_AND_SUBSET_SUBTYPES',
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
class_alias(CriterionCategoryChannelAvailabilityMode::class, \Google\Ads\GoogleAds\V14\Enums\CriterionCategoryChannelAvailabilityModeEnum_CriterionCategoryChannelAvailabilityMode::class);

