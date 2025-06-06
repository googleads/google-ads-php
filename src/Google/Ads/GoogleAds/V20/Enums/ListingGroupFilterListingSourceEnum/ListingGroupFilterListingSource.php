<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/listing_group_filter_listing_source.proto

namespace Google\Ads\GoogleAds\V20\Enums\ListingGroupFilterListingSourceEnum;

use UnexpectedValueException;

/**
 * The source of listings filtered by a listing group filter node.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.ListingGroupFilterListingSourceEnum.ListingGroupFilterListingSource</code>
 */
class ListingGroupFilterListingSource
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
     * Listings from a Shopping source, like products from Google Merchant
     * Center.
     *
     * Generated from protobuf enum <code>SHOPPING = 2;</code>
     */
    const SHOPPING = 2;
    /**
     * Listings from a webpage source, like URLs from a page feed or from the
     * advertiser web domain.
     *
     * Generated from protobuf enum <code>WEBPAGE = 3;</code>
     */
    const WEBPAGE = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::SHOPPING => 'SHOPPING',
        self::WEBPAGE => 'WEBPAGE',
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
class_alias(ListingGroupFilterListingSource::class, \Google\Ads\GoogleAds\V20\Enums\ListingGroupFilterListingSourceEnum_ListingGroupFilterListingSource::class);

