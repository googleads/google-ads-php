<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/asset_set_link_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\AssetSetLinkErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible asset set link errors.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.AssetSetLinkErrorEnum.AssetSetLinkError</code>
 */
class AssetSetLinkError
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
     * Advertising channel type cannot be attached to the asset set due to
     * channel-based restrictions.
     *
     * Generated from protobuf enum <code>INCOMPATIBLE_ADVERTISING_CHANNEL_TYPE = 2;</code>
     */
    const INCOMPATIBLE_ADVERTISING_CHANNEL_TYPE = 2;
    /**
     * For this asset set type, only one campaign to feed linkage is allowed.
     *
     * Generated from protobuf enum <code>DUPLICATE_FEED_LINK = 3;</code>
     */
    const DUPLICATE_FEED_LINK = 3;
    /**
     * The asset set type and campaign type are incompatible.
     *
     * Generated from protobuf enum <code>INCOMPATIBLE_ASSET_SET_TYPE_WITH_CAMPAIGN_TYPE = 4;</code>
     */
    const INCOMPATIBLE_ASSET_SET_TYPE_WITH_CAMPAIGN_TYPE = 4;
    /**
     * Cannot link duplicate asset sets to the same campaign.
     *
     * Generated from protobuf enum <code>DUPLICATE_ASSET_SET_LINK = 5;</code>
     */
    const DUPLICATE_ASSET_SET_LINK = 5;
    /**
     * Cannot remove the asset set link. If a campaign is linked with only one
     * asset set and you attempt to unlink them, this error will be triggered.
     *
     * Generated from protobuf enum <code>ASSET_SET_LINK_CANNOT_BE_REMOVED = 6;</code>
     */
    const ASSET_SET_LINK_CANNOT_BE_REMOVED = 6;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::INCOMPATIBLE_ADVERTISING_CHANNEL_TYPE => 'INCOMPATIBLE_ADVERTISING_CHANNEL_TYPE',
        self::DUPLICATE_FEED_LINK => 'DUPLICATE_FEED_LINK',
        self::INCOMPATIBLE_ASSET_SET_TYPE_WITH_CAMPAIGN_TYPE => 'INCOMPATIBLE_ASSET_SET_TYPE_WITH_CAMPAIGN_TYPE',
        self::DUPLICATE_ASSET_SET_LINK => 'DUPLICATE_ASSET_SET_LINK',
        self::ASSET_SET_LINK_CANNOT_BE_REMOVED => 'ASSET_SET_LINK_CANNOT_BE_REMOVED',
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
class_alias(AssetSetLinkError::class, \Google\Ads\GoogleAds\V20\Errors\AssetSetLinkErrorEnum_AssetSetLinkError::class);

