<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/bidding_source.proto

namespace Google\Ads\GoogleAds\V20\Enums\BiddingSourceEnum;

use UnexpectedValueException;

/**
 * Indicates where a bid or target is defined. For example, an ad group
 * criterion may define a cpc bid directly, or it can inherit its cpc bid from
 * the ad group.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.BiddingSourceEnum.BiddingSource</code>
 */
class BiddingSource
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
     * Effective bid or target is inherited from campaign bidding strategy.
     *
     * Generated from protobuf enum <code>CAMPAIGN_BIDDING_STRATEGY = 5;</code>
     */
    const CAMPAIGN_BIDDING_STRATEGY = 5;
    /**
     * The bid or target is defined on the ad group.
     *
     * Generated from protobuf enum <code>AD_GROUP = 6;</code>
     */
    const AD_GROUP = 6;
    /**
     * The bid or target is defined on the ad group criterion.
     *
     * Generated from protobuf enum <code>AD_GROUP_CRITERION = 7;</code>
     */
    const AD_GROUP_CRITERION = 7;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CAMPAIGN_BIDDING_STRATEGY => 'CAMPAIGN_BIDDING_STRATEGY',
        self::AD_GROUP => 'AD_GROUP',
        self::AD_GROUP_CRITERION => 'AD_GROUP_CRITERION',
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
class_alias(BiddingSource::class, \Google\Ads\GoogleAds\V20\Enums\BiddingSourceEnum_BiddingSource::class);

