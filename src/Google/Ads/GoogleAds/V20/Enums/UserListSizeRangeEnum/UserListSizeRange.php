<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/user_list_size_range.proto

namespace Google\Ads\GoogleAds\V20\Enums\UserListSizeRangeEnum;

use UnexpectedValueException;

/**
 * Enum containing possible user list size ranges.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.UserListSizeRangeEnum.UserListSizeRange</code>
 */
class UserListSizeRange
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
     * User list has less than 500 users.
     *
     * Generated from protobuf enum <code>LESS_THAN_FIVE_HUNDRED = 2;</code>
     */
    const LESS_THAN_FIVE_HUNDRED = 2;
    /**
     * User list has number of users in range of 500 to 1000.
     *
     * Generated from protobuf enum <code>LESS_THAN_ONE_THOUSAND = 3;</code>
     */
    const LESS_THAN_ONE_THOUSAND = 3;
    /**
     * User list has number of users in range of 1000 to 10000.
     *
     * Generated from protobuf enum <code>ONE_THOUSAND_TO_TEN_THOUSAND = 4;</code>
     */
    const ONE_THOUSAND_TO_TEN_THOUSAND = 4;
    /**
     * User list has number of users in range of 10000 to 50000.
     *
     * Generated from protobuf enum <code>TEN_THOUSAND_TO_FIFTY_THOUSAND = 5;</code>
     */
    const TEN_THOUSAND_TO_FIFTY_THOUSAND = 5;
    /**
     * User list has number of users in range of 50000 to 100000.
     *
     * Generated from protobuf enum <code>FIFTY_THOUSAND_TO_ONE_HUNDRED_THOUSAND = 6;</code>
     */
    const FIFTY_THOUSAND_TO_ONE_HUNDRED_THOUSAND = 6;
    /**
     * User list has number of users in range of 100000 to 300000.
     *
     * Generated from protobuf enum <code>ONE_HUNDRED_THOUSAND_TO_THREE_HUNDRED_THOUSAND = 7;</code>
     */
    const ONE_HUNDRED_THOUSAND_TO_THREE_HUNDRED_THOUSAND = 7;
    /**
     * User list has number of users in range of 300000 to 500000.
     *
     * Generated from protobuf enum <code>THREE_HUNDRED_THOUSAND_TO_FIVE_HUNDRED_THOUSAND = 8;</code>
     */
    const THREE_HUNDRED_THOUSAND_TO_FIVE_HUNDRED_THOUSAND = 8;
    /**
     * User list has number of users in range of 500000 to 1 million.
     *
     * Generated from protobuf enum <code>FIVE_HUNDRED_THOUSAND_TO_ONE_MILLION = 9;</code>
     */
    const FIVE_HUNDRED_THOUSAND_TO_ONE_MILLION = 9;
    /**
     * User list has number of users in range of 1 to 2 millions.
     *
     * Generated from protobuf enum <code>ONE_MILLION_TO_TWO_MILLION = 10;</code>
     */
    const ONE_MILLION_TO_TWO_MILLION = 10;
    /**
     * User list has number of users in range of 2 to 3 millions.
     *
     * Generated from protobuf enum <code>TWO_MILLION_TO_THREE_MILLION = 11;</code>
     */
    const TWO_MILLION_TO_THREE_MILLION = 11;
    /**
     * User list has number of users in range of 3 to 5 millions.
     *
     * Generated from protobuf enum <code>THREE_MILLION_TO_FIVE_MILLION = 12;</code>
     */
    const THREE_MILLION_TO_FIVE_MILLION = 12;
    /**
     * User list has number of users in range of 5 to 10 millions.
     *
     * Generated from protobuf enum <code>FIVE_MILLION_TO_TEN_MILLION = 13;</code>
     */
    const FIVE_MILLION_TO_TEN_MILLION = 13;
    /**
     * User list has number of users in range of 10 to 20 millions.
     *
     * Generated from protobuf enum <code>TEN_MILLION_TO_TWENTY_MILLION = 14;</code>
     */
    const TEN_MILLION_TO_TWENTY_MILLION = 14;
    /**
     * User list has number of users in range of 20 to 30 millions.
     *
     * Generated from protobuf enum <code>TWENTY_MILLION_TO_THIRTY_MILLION = 15;</code>
     */
    const TWENTY_MILLION_TO_THIRTY_MILLION = 15;
    /**
     * User list has number of users in range of 30 to 50 millions.
     *
     * Generated from protobuf enum <code>THIRTY_MILLION_TO_FIFTY_MILLION = 16;</code>
     */
    const THIRTY_MILLION_TO_FIFTY_MILLION = 16;
    /**
     * User list has over 50 million users.
     *
     * Generated from protobuf enum <code>OVER_FIFTY_MILLION = 17;</code>
     */
    const OVER_FIFTY_MILLION = 17;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::LESS_THAN_FIVE_HUNDRED => 'LESS_THAN_FIVE_HUNDRED',
        self::LESS_THAN_ONE_THOUSAND => 'LESS_THAN_ONE_THOUSAND',
        self::ONE_THOUSAND_TO_TEN_THOUSAND => 'ONE_THOUSAND_TO_TEN_THOUSAND',
        self::TEN_THOUSAND_TO_FIFTY_THOUSAND => 'TEN_THOUSAND_TO_FIFTY_THOUSAND',
        self::FIFTY_THOUSAND_TO_ONE_HUNDRED_THOUSAND => 'FIFTY_THOUSAND_TO_ONE_HUNDRED_THOUSAND',
        self::ONE_HUNDRED_THOUSAND_TO_THREE_HUNDRED_THOUSAND => 'ONE_HUNDRED_THOUSAND_TO_THREE_HUNDRED_THOUSAND',
        self::THREE_HUNDRED_THOUSAND_TO_FIVE_HUNDRED_THOUSAND => 'THREE_HUNDRED_THOUSAND_TO_FIVE_HUNDRED_THOUSAND',
        self::FIVE_HUNDRED_THOUSAND_TO_ONE_MILLION => 'FIVE_HUNDRED_THOUSAND_TO_ONE_MILLION',
        self::ONE_MILLION_TO_TWO_MILLION => 'ONE_MILLION_TO_TWO_MILLION',
        self::TWO_MILLION_TO_THREE_MILLION => 'TWO_MILLION_TO_THREE_MILLION',
        self::THREE_MILLION_TO_FIVE_MILLION => 'THREE_MILLION_TO_FIVE_MILLION',
        self::FIVE_MILLION_TO_TEN_MILLION => 'FIVE_MILLION_TO_TEN_MILLION',
        self::TEN_MILLION_TO_TWENTY_MILLION => 'TEN_MILLION_TO_TWENTY_MILLION',
        self::TWENTY_MILLION_TO_THIRTY_MILLION => 'TWENTY_MILLION_TO_THIRTY_MILLION',
        self::THIRTY_MILLION_TO_FIFTY_MILLION => 'THIRTY_MILLION_TO_FIFTY_MILLION',
        self::OVER_FIFTY_MILLION => 'OVER_FIFTY_MILLION',
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
class_alias(UserListSizeRange::class, \Google\Ads\GoogleAds\V20\Enums\UserListSizeRangeEnum_UserListSizeRange::class);

