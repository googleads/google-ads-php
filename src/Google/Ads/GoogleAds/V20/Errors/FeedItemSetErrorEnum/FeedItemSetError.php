<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/feed_item_set_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\FeedItemSetErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible feed item set errors.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.FeedItemSetErrorEnum.FeedItemSetError</code>
 */
class FeedItemSetError
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
     * The given ID refers to a removed FeedItemSet.
     *
     * Generated from protobuf enum <code>FEED_ITEM_SET_REMOVED = 2;</code>
     */
    const FEED_ITEM_SET_REMOVED = 2;
    /**
     * The dynamic filter of a feed item set cannot be cleared on UPDATE if it
     * exists. A set is either static or dynamic once added, and that cannot
     * change.
     *
     * Generated from protobuf enum <code>CANNOT_CLEAR_DYNAMIC_FILTER = 3;</code>
     */
    const CANNOT_CLEAR_DYNAMIC_FILTER = 3;
    /**
     * The dynamic filter of a feed item set cannot be created on UPDATE if it
     * does not exist. A set is either static or dynamic once added, and that
     * cannot change.
     *
     * Generated from protobuf enum <code>CANNOT_CREATE_DYNAMIC_FILTER = 4;</code>
     */
    const CANNOT_CREATE_DYNAMIC_FILTER = 4;
    /**
     * FeedItemSets can only be made for location or affiliate location feeds.
     *
     * Generated from protobuf enum <code>INVALID_FEED_TYPE = 5;</code>
     */
    const INVALID_FEED_TYPE = 5;
    /**
     * FeedItemSets duplicate name. Name should be unique within an account.
     *
     * Generated from protobuf enum <code>DUPLICATE_NAME = 6;</code>
     */
    const DUPLICATE_NAME = 6;
    /**
     * The feed type of the parent Feed is not compatible with the type of
     * dynamic filter being set. For example, you can only set
     * dynamic_location_set_filter for LOCATION feed item sets.
     *
     * Generated from protobuf enum <code>WRONG_DYNAMIC_FILTER_FOR_FEED_TYPE = 7;</code>
     */
    const WRONG_DYNAMIC_FILTER_FOR_FEED_TYPE = 7;
    /**
     * Chain ID specified for AffiliateLocationFeedData is invalid.
     *
     * Generated from protobuf enum <code>DYNAMIC_FILTER_INVALID_CHAIN_IDS = 8;</code>
     */
    const DYNAMIC_FILTER_INVALID_CHAIN_IDS = 8;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::FEED_ITEM_SET_REMOVED => 'FEED_ITEM_SET_REMOVED',
        self::CANNOT_CLEAR_DYNAMIC_FILTER => 'CANNOT_CLEAR_DYNAMIC_FILTER',
        self::CANNOT_CREATE_DYNAMIC_FILTER => 'CANNOT_CREATE_DYNAMIC_FILTER',
        self::INVALID_FEED_TYPE => 'INVALID_FEED_TYPE',
        self::DUPLICATE_NAME => 'DUPLICATE_NAME',
        self::WRONG_DYNAMIC_FILTER_FOR_FEED_TYPE => 'WRONG_DYNAMIC_FILTER_FOR_FEED_TYPE',
        self::DYNAMIC_FILTER_INVALID_CHAIN_IDS => 'DYNAMIC_FILTER_INVALID_CHAIN_IDS',
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
class_alias(FeedItemSetError::class, \Google\Ads\GoogleAds\V20\Errors\FeedItemSetErrorEnum_FeedItemSetError::class);

