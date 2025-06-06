<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/search_term_targeting_status.proto

namespace Google\Ads\GoogleAds\V20\Enums\SearchTermTargetingStatusEnum;

use UnexpectedValueException;

/**
 * Indicates whether the search term is one of your targeted or excluded
 * keywords.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.SearchTermTargetingStatusEnum.SearchTermTargetingStatus</code>
 */
class SearchTermTargetingStatus
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
     * Search term is added to targeted keywords.
     *
     * Generated from protobuf enum <code>ADDED = 2;</code>
     */
    const ADDED = 2;
    /**
     * Search term matches a negative keyword.
     *
     * Generated from protobuf enum <code>EXCLUDED = 3;</code>
     */
    const EXCLUDED = 3;
    /**
     * Search term has been both added and excluded.
     *
     * Generated from protobuf enum <code>ADDED_EXCLUDED = 4;</code>
     */
    const ADDED_EXCLUDED = 4;
    /**
     * Search term is neither targeted nor excluded.
     *
     * Generated from protobuf enum <code>NONE = 5;</code>
     */
    const NONE = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::ADDED => 'ADDED',
        self::EXCLUDED => 'EXCLUDED',
        self::ADDED_EXCLUDED => 'ADDED_EXCLUDED',
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
class_alias(SearchTermTargetingStatus::class, \Google\Ads\GoogleAds\V20\Enums\SearchTermTargetingStatusEnum_SearchTermTargetingStatus::class);

