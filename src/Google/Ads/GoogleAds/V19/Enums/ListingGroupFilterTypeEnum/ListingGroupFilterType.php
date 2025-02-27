<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/listing_group_filter_type_enum.proto

namespace Google\Ads\GoogleAds\V19\Enums\ListingGroupFilterTypeEnum;

use UnexpectedValueException;

/**
 * The type of the listing group filter.
 *
 * Protobuf type <code>google.ads.googleads.v19.enums.ListingGroupFilterTypeEnum.ListingGroupFilterType</code>
 */
class ListingGroupFilterType
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
     * Subdivision of products along some listing dimensions.
     *
     * Generated from protobuf enum <code>SUBDIVISION = 2;</code>
     */
    const SUBDIVISION = 2;
    /**
     * An included listing group filter leaf node.
     *
     * Generated from protobuf enum <code>UNIT_INCLUDED = 3;</code>
     */
    const UNIT_INCLUDED = 3;
    /**
     * An excluded listing group filter leaf node.
     *
     * Generated from protobuf enum <code>UNIT_EXCLUDED = 4;</code>
     */
    const UNIT_EXCLUDED = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::SUBDIVISION => 'SUBDIVISION',
        self::UNIT_INCLUDED => 'UNIT_INCLUDED',
        self::UNIT_EXCLUDED => 'UNIT_EXCLUDED',
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
class_alias(ListingGroupFilterType::class, \Google\Ads\GoogleAds\V19\Enums\ListingGroupFilterTypeEnum_ListingGroupFilterType::class);

