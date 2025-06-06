<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/asset_set_type.proto

namespace Google\Ads\GoogleAds\V20\Enums\AssetSetTypeEnum;

use UnexpectedValueException;

/**
 * Possible types of an asset set.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.AssetSetTypeEnum.AssetSetType</code>
 */
class AssetSetType
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
     * Page asset set.
     *
     * Generated from protobuf enum <code>PAGE_FEED = 2;</code>
     */
    const PAGE_FEED = 2;
    /**
     * Dynamic education asset set.
     *
     * Generated from protobuf enum <code>DYNAMIC_EDUCATION = 3;</code>
     */
    const DYNAMIC_EDUCATION = 3;
    /**
     * Google Merchant Center asset set.
     *
     * Generated from protobuf enum <code>MERCHANT_CENTER_FEED = 4;</code>
     */
    const MERCHANT_CENTER_FEED = 4;
    /**
     * Dynamic real estate asset set.
     *
     * Generated from protobuf enum <code>DYNAMIC_REAL_ESTATE = 5;</code>
     */
    const DYNAMIC_REAL_ESTATE = 5;
    /**
     * Dynamic custom asset set.
     *
     * Generated from protobuf enum <code>DYNAMIC_CUSTOM = 6;</code>
     */
    const DYNAMIC_CUSTOM = 6;
    /**
     * Dynamic hotels and rentals asset set.
     *
     * Generated from protobuf enum <code>DYNAMIC_HOTELS_AND_RENTALS = 7;</code>
     */
    const DYNAMIC_HOTELS_AND_RENTALS = 7;
    /**
     * Dynamic flights asset set.
     *
     * Generated from protobuf enum <code>DYNAMIC_FLIGHTS = 8;</code>
     */
    const DYNAMIC_FLIGHTS = 8;
    /**
     * Dynamic travel asset set.
     *
     * Generated from protobuf enum <code>DYNAMIC_TRAVEL = 9;</code>
     */
    const DYNAMIC_TRAVEL = 9;
    /**
     * Dynamic local asset set.
     *
     * Generated from protobuf enum <code>DYNAMIC_LOCAL = 10;</code>
     */
    const DYNAMIC_LOCAL = 10;
    /**
     * Dynamic jobs asset set.
     *
     * Generated from protobuf enum <code>DYNAMIC_JOBS = 11;</code>
     */
    const DYNAMIC_JOBS = 11;
    /**
     * Location sync level asset set.
     *
     * Generated from protobuf enum <code>LOCATION_SYNC = 12;</code>
     */
    const LOCATION_SYNC = 12;
    /**
     * Business Profile location group asset set.
     *
     * Generated from protobuf enum <code>BUSINESS_PROFILE_DYNAMIC_LOCATION_GROUP = 13;</code>
     */
    const BUSINESS_PROFILE_DYNAMIC_LOCATION_GROUP = 13;
    /**
     * Chain location group asset set which can be used for both owned
     * locations and affiliate locations.
     *
     * Generated from protobuf enum <code>CHAIN_DYNAMIC_LOCATION_GROUP = 14;</code>
     */
    const CHAIN_DYNAMIC_LOCATION_GROUP = 14;
    /**
     * Static location group asset set which can be used for both owned
     * locations and affiliate locations.
     *
     * Generated from protobuf enum <code>STATIC_LOCATION_GROUP = 15;</code>
     */
    const STATIC_LOCATION_GROUP = 15;
    /**
     * Hotel Property asset set which is used to link a hotel property feed to
     * Performance Max for travel goals campaigns.
     *
     * Generated from protobuf enum <code>HOTEL_PROPERTY = 16;</code>
     */
    const HOTEL_PROPERTY = 16;
    /**
     * Travel Feed asset set type. Can represent either a Hotel feed or a Things
     * to Do (activities) feed.
     *
     * Generated from protobuf enum <code>TRAVEL_FEED = 17;</code>
     */
    const TRAVEL_FEED = 17;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::PAGE_FEED => 'PAGE_FEED',
        self::DYNAMIC_EDUCATION => 'DYNAMIC_EDUCATION',
        self::MERCHANT_CENTER_FEED => 'MERCHANT_CENTER_FEED',
        self::DYNAMIC_REAL_ESTATE => 'DYNAMIC_REAL_ESTATE',
        self::DYNAMIC_CUSTOM => 'DYNAMIC_CUSTOM',
        self::DYNAMIC_HOTELS_AND_RENTALS => 'DYNAMIC_HOTELS_AND_RENTALS',
        self::DYNAMIC_FLIGHTS => 'DYNAMIC_FLIGHTS',
        self::DYNAMIC_TRAVEL => 'DYNAMIC_TRAVEL',
        self::DYNAMIC_LOCAL => 'DYNAMIC_LOCAL',
        self::DYNAMIC_JOBS => 'DYNAMIC_JOBS',
        self::LOCATION_SYNC => 'LOCATION_SYNC',
        self::BUSINESS_PROFILE_DYNAMIC_LOCATION_GROUP => 'BUSINESS_PROFILE_DYNAMIC_LOCATION_GROUP',
        self::CHAIN_DYNAMIC_LOCATION_GROUP => 'CHAIN_DYNAMIC_LOCATION_GROUP',
        self::STATIC_LOCATION_GROUP => 'STATIC_LOCATION_GROUP',
        self::HOTEL_PROPERTY => 'HOTEL_PROPERTY',
        self::TRAVEL_FEED => 'TRAVEL_FEED',
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
class_alias(AssetSetType::class, \Google\Ads\GoogleAds\V20\Enums\AssetSetTypeEnum_AssetSetType::class);

