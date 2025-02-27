<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/hotel_asset_suggestion_status.proto

namespace Google\Ads\GoogleAds\V19\Enums\HotelAssetSuggestionStatusEnum;

use UnexpectedValueException;

/**
 * Possible statuses of a hotel asset suggestion.
 *
 * Protobuf type <code>google.ads.googleads.v19.enums.HotelAssetSuggestionStatusEnum.HotelAssetSuggestionStatus</code>
 */
class HotelAssetSuggestionStatus
{
    /**
     * Enum unspecified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The received error code is not known in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * The hotel asset suggestion was successfully retrieved.
     *
     * Generated from protobuf enum <code>SUCCESS = 2;</code>
     */
    const SUCCESS = 2;
    /**
     * A hotel look up returns nothing.
     *
     * Generated from protobuf enum <code>HOTEL_NOT_FOUND = 3;</code>
     */
    const HOTEL_NOT_FOUND = 3;
    /**
     * A Google Places ID is invalid and cannot be decoded.
     *
     * Generated from protobuf enum <code>INVALID_PLACE_ID = 4;</code>
     */
    const INVALID_PLACE_ID = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::SUCCESS => 'SUCCESS',
        self::HOTEL_NOT_FOUND => 'HOTEL_NOT_FOUND',
        self::INVALID_PLACE_ID => 'INVALID_PLACE_ID',
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
class_alias(HotelAssetSuggestionStatus::class, \Google\Ads\GoogleAds\V19\Enums\HotelAssetSuggestionStatusEnum_HotelAssetSuggestionStatus::class);

