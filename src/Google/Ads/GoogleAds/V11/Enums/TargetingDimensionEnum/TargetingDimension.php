<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v11/enums/targeting_dimension.proto

namespace Google\Ads\GoogleAds\V11\Enums\TargetingDimensionEnum;

use UnexpectedValueException;

/**
 * Enum describing possible targeting dimensions.
 *
 * Protobuf type <code>google.ads.googleads.v11.enums.TargetingDimensionEnum.TargetingDimension</code>
 */
class TargetingDimension
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
     * Keyword criteria, for example, 'mars cruise'. KEYWORD may be used as a
     * custom bid dimension. Keywords are always a targeting dimension, so may
     * not be set as a target "ALL" dimension with TargetRestriction.
     *
     * Generated from protobuf enum <code>KEYWORD = 2;</code>
     */
    const KEYWORD = 2;
    /**
     * Audience criteria, which include user list, user interest, custom
     * affinity,  and custom in market.
     *
     * Generated from protobuf enum <code>AUDIENCE = 3;</code>
     */
    const AUDIENCE = 3;
    /**
     * Topic criteria for targeting categories of content, for example,
     * 'category::Animals>Pets' Used for Display and Video targeting.
     *
     * Generated from protobuf enum <code>TOPIC = 4;</code>
     */
    const TOPIC = 4;
    /**
     * Criteria for targeting gender.
     *
     * Generated from protobuf enum <code>GENDER = 5;</code>
     */
    const GENDER = 5;
    /**
     * Criteria for targeting age ranges.
     *
     * Generated from protobuf enum <code>AGE_RANGE = 6;</code>
     */
    const AGE_RANGE = 6;
    /**
     * Placement criteria, which include websites like 'www.flowers4sale.com',
     * as well as mobile applications, mobile app categories, YouTube videos,
     * and YouTube channels.
     *
     * Generated from protobuf enum <code>PLACEMENT = 7;</code>
     */
    const PLACEMENT = 7;
    /**
     * Criteria for parental status targeting.
     *
     * Generated from protobuf enum <code>PARENTAL_STATUS = 8;</code>
     */
    const PARENTAL_STATUS = 8;
    /**
     * Criteria for income range targeting.
     *
     * Generated from protobuf enum <code>INCOME_RANGE = 9;</code>
     */
    const INCOME_RANGE = 9;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::KEYWORD => 'KEYWORD',
        self::AUDIENCE => 'AUDIENCE',
        self::TOPIC => 'TOPIC',
        self::GENDER => 'GENDER',
        self::AGE_RANGE => 'AGE_RANGE',
        self::PLACEMENT => 'PLACEMENT',
        self::PARENTAL_STATUS => 'PARENTAL_STATUS',
        self::INCOME_RANGE => 'INCOME_RANGE',
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
class_alias(TargetingDimension::class, \Google\Ads\GoogleAds\V11\Enums\TargetingDimensionEnum_TargetingDimension::class);

