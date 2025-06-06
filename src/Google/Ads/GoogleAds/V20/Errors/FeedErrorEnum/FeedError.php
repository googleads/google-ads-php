<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/feed_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\FeedErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible feed errors.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.FeedErrorEnum.FeedError</code>
 */
class FeedError
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
     * The names of the FeedAttributes must be unique.
     *
     * Generated from protobuf enum <code>ATTRIBUTE_NAMES_NOT_UNIQUE = 2;</code>
     */
    const ATTRIBUTE_NAMES_NOT_UNIQUE = 2;
    /**
     * The attribute list must be an exact copy of the existing list if the
     * attribute ID's are present.
     *
     * Generated from protobuf enum <code>ATTRIBUTES_DO_NOT_MATCH_EXISTING_ATTRIBUTES = 3;</code>
     */
    const ATTRIBUTES_DO_NOT_MATCH_EXISTING_ATTRIBUTES = 3;
    /**
     * Cannot specify USER origin for a system generated feed.
     *
     * Generated from protobuf enum <code>CANNOT_SPECIFY_USER_ORIGIN_FOR_SYSTEM_FEED = 4;</code>
     */
    const CANNOT_SPECIFY_USER_ORIGIN_FOR_SYSTEM_FEED = 4;
    /**
     * Cannot specify GOOGLE origin for a non-system generated feed.
     *
     * Generated from protobuf enum <code>CANNOT_SPECIFY_GOOGLE_ORIGIN_FOR_NON_SYSTEM_FEED = 5;</code>
     */
    const CANNOT_SPECIFY_GOOGLE_ORIGIN_FOR_NON_SYSTEM_FEED = 5;
    /**
     * Cannot specify feed attributes for system feed.
     *
     * Generated from protobuf enum <code>CANNOT_SPECIFY_FEED_ATTRIBUTES_FOR_SYSTEM_FEED = 6;</code>
     */
    const CANNOT_SPECIFY_FEED_ATTRIBUTES_FOR_SYSTEM_FEED = 6;
    /**
     * Cannot update FeedAttributes on feed with origin GOOGLE.
     *
     * Generated from protobuf enum <code>CANNOT_UPDATE_FEED_ATTRIBUTES_WITH_ORIGIN_GOOGLE = 7;</code>
     */
    const CANNOT_UPDATE_FEED_ATTRIBUTES_WITH_ORIGIN_GOOGLE = 7;
    /**
     * The given ID refers to a removed Feed. Removed Feeds are immutable.
     *
     * Generated from protobuf enum <code>FEED_REMOVED = 8;</code>
     */
    const FEED_REMOVED = 8;
    /**
     * The origin of the feed is not valid for the client.
     *
     * Generated from protobuf enum <code>INVALID_ORIGIN_VALUE = 9;</code>
     */
    const INVALID_ORIGIN_VALUE = 9;
    /**
     * A user can only create and modify feeds with USER origin.
     *
     * Generated from protobuf enum <code>FEED_ORIGIN_IS_NOT_USER = 10;</code>
     */
    const FEED_ORIGIN_IS_NOT_USER = 10;
    /**
     * Invalid auth token for the given email.
     *
     * Generated from protobuf enum <code>INVALID_AUTH_TOKEN_FOR_EMAIL = 11;</code>
     */
    const INVALID_AUTH_TOKEN_FOR_EMAIL = 11;
    /**
     * Invalid email specified.
     *
     * Generated from protobuf enum <code>INVALID_EMAIL = 12;</code>
     */
    const INVALID_EMAIL = 12;
    /**
     * Feed name matches that of another active Feed.
     *
     * Generated from protobuf enum <code>DUPLICATE_FEED_NAME = 13;</code>
     */
    const DUPLICATE_FEED_NAME = 13;
    /**
     * Name of feed is not allowed.
     *
     * Generated from protobuf enum <code>INVALID_FEED_NAME = 14;</code>
     */
    const INVALID_FEED_NAME = 14;
    /**
     * Missing OAuthInfo.
     *
     * Generated from protobuf enum <code>MISSING_OAUTH_INFO = 15;</code>
     */
    const MISSING_OAUTH_INFO = 15;
    /**
     * New FeedAttributes must not affect the unique key.
     *
     * Generated from protobuf enum <code>NEW_ATTRIBUTE_CANNOT_BE_PART_OF_UNIQUE_KEY = 16;</code>
     */
    const NEW_ATTRIBUTE_CANNOT_BE_PART_OF_UNIQUE_KEY = 16;
    /**
     * Too many FeedAttributes for a Feed.
     *
     * Generated from protobuf enum <code>TOO_MANY_ATTRIBUTES = 17;</code>
     */
    const TOO_MANY_ATTRIBUTES = 17;
    /**
     * The business account is not valid.
     *
     * Generated from protobuf enum <code>INVALID_BUSINESS_ACCOUNT = 18;</code>
     */
    const INVALID_BUSINESS_ACCOUNT = 18;
    /**
     * Business account cannot access Business Profile.
     *
     * Generated from protobuf enum <code>BUSINESS_ACCOUNT_CANNOT_ACCESS_LOCATION_ACCOUNT = 19;</code>
     */
    const BUSINESS_ACCOUNT_CANNOT_ACCESS_LOCATION_ACCOUNT = 19;
    /**
     * Invalid chain ID provided for affiliate location feed.
     *
     * Generated from protobuf enum <code>INVALID_AFFILIATE_CHAIN_ID = 20;</code>
     */
    const INVALID_AFFILIATE_CHAIN_ID = 20;
    /**
     * There is already a feed with the given system feed generation data.
     *
     * Generated from protobuf enum <code>DUPLICATE_SYSTEM_FEED = 21;</code>
     */
    const DUPLICATE_SYSTEM_FEED = 21;
    /**
     * An error occurred accessing Business Profile.
     *
     * Generated from protobuf enum <code>GMB_ACCESS_ERROR = 22;</code>
     */
    const GMB_ACCESS_ERROR = 22;
    /**
     * A customer cannot have both LOCATION and AFFILIATE_LOCATION feeds.
     *
     * Generated from protobuf enum <code>CANNOT_HAVE_LOCATION_AND_AFFILIATE_LOCATION_FEEDS = 23;</code>
     */
    const CANNOT_HAVE_LOCATION_AND_AFFILIATE_LOCATION_FEEDS = 23;
    /**
     * Feed-based extension is read-only for this extension type.
     *
     * Generated from protobuf enum <code>LEGACY_EXTENSION_TYPE_READ_ONLY = 24;</code>
     */
    const LEGACY_EXTENSION_TYPE_READ_ONLY = 24;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::ATTRIBUTE_NAMES_NOT_UNIQUE => 'ATTRIBUTE_NAMES_NOT_UNIQUE',
        self::ATTRIBUTES_DO_NOT_MATCH_EXISTING_ATTRIBUTES => 'ATTRIBUTES_DO_NOT_MATCH_EXISTING_ATTRIBUTES',
        self::CANNOT_SPECIFY_USER_ORIGIN_FOR_SYSTEM_FEED => 'CANNOT_SPECIFY_USER_ORIGIN_FOR_SYSTEM_FEED',
        self::CANNOT_SPECIFY_GOOGLE_ORIGIN_FOR_NON_SYSTEM_FEED => 'CANNOT_SPECIFY_GOOGLE_ORIGIN_FOR_NON_SYSTEM_FEED',
        self::CANNOT_SPECIFY_FEED_ATTRIBUTES_FOR_SYSTEM_FEED => 'CANNOT_SPECIFY_FEED_ATTRIBUTES_FOR_SYSTEM_FEED',
        self::CANNOT_UPDATE_FEED_ATTRIBUTES_WITH_ORIGIN_GOOGLE => 'CANNOT_UPDATE_FEED_ATTRIBUTES_WITH_ORIGIN_GOOGLE',
        self::FEED_REMOVED => 'FEED_REMOVED',
        self::INVALID_ORIGIN_VALUE => 'INVALID_ORIGIN_VALUE',
        self::FEED_ORIGIN_IS_NOT_USER => 'FEED_ORIGIN_IS_NOT_USER',
        self::INVALID_AUTH_TOKEN_FOR_EMAIL => 'INVALID_AUTH_TOKEN_FOR_EMAIL',
        self::INVALID_EMAIL => 'INVALID_EMAIL',
        self::DUPLICATE_FEED_NAME => 'DUPLICATE_FEED_NAME',
        self::INVALID_FEED_NAME => 'INVALID_FEED_NAME',
        self::MISSING_OAUTH_INFO => 'MISSING_OAUTH_INFO',
        self::NEW_ATTRIBUTE_CANNOT_BE_PART_OF_UNIQUE_KEY => 'NEW_ATTRIBUTE_CANNOT_BE_PART_OF_UNIQUE_KEY',
        self::TOO_MANY_ATTRIBUTES => 'TOO_MANY_ATTRIBUTES',
        self::INVALID_BUSINESS_ACCOUNT => 'INVALID_BUSINESS_ACCOUNT',
        self::BUSINESS_ACCOUNT_CANNOT_ACCESS_LOCATION_ACCOUNT => 'BUSINESS_ACCOUNT_CANNOT_ACCESS_LOCATION_ACCOUNT',
        self::INVALID_AFFILIATE_CHAIN_ID => 'INVALID_AFFILIATE_CHAIN_ID',
        self::DUPLICATE_SYSTEM_FEED => 'DUPLICATE_SYSTEM_FEED',
        self::GMB_ACCESS_ERROR => 'GMB_ACCESS_ERROR',
        self::CANNOT_HAVE_LOCATION_AND_AFFILIATE_LOCATION_FEEDS => 'CANNOT_HAVE_LOCATION_AND_AFFILIATE_LOCATION_FEEDS',
        self::LEGACY_EXTENSION_TYPE_READ_ONLY => 'LEGACY_EXTENSION_TYPE_READ_ONLY',
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
class_alias(FeedError::class, \Google\Ads\GoogleAds\V20\Errors\FeedErrorEnum_FeedError::class);

