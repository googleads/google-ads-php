<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/enums/asset_link_primary_status.proto

namespace Google\Ads\GoogleAds\V16\Enums\AssetLinkPrimaryStatusEnum;

use UnexpectedValueException;

/**
 * Enum Provides insight into why an asset is not serving or not serving
 * at full capacity for a particular link level. There could be one status
 * with multiple reasons. For example, a sitelink might be paused by the user,
 * but also limited in serving due to violation of an alcohol policy. In
 * this case, the PrimaryStatus will be returned as PAUSED, since the asset's
 * effective status is determined by its paused state.
 *
 * Protobuf type <code>google.ads.googleads.v16.enums.AssetLinkPrimaryStatusEnum.AssetLinkPrimaryStatus</code>
 */
class AssetLinkPrimaryStatus
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
     * The asset is eligible to serve.
     *
     * Generated from protobuf enum <code>ELIGIBLE = 2;</code>
     */
    const ELIGIBLE = 2;
    /**
     * The user-specified asset link status is paused.
     *
     * Generated from protobuf enum <code>PAUSED = 3;</code>
     */
    const PAUSED = 3;
    /**
     * The user-specified asset link status is removed.
     *
     * Generated from protobuf enum <code>REMOVED = 4;</code>
     */
    const REMOVED = 4;
    /**
     * The asset may serve in the future.
     *
     * Generated from protobuf enum <code>PENDING = 5;</code>
     */
    const PENDING = 5;
    /**
     * The asset is serving in a partial capacity.
     *
     * Generated from protobuf enum <code>LIMITED = 6;</code>
     */
    const LIMITED = 6;
    /**
     * The asset is not eligible to serve.
     *
     * Generated from protobuf enum <code>NOT_ELIGIBLE = 7;</code>
     */
    const NOT_ELIGIBLE = 7;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::ELIGIBLE => 'ELIGIBLE',
        self::PAUSED => 'PAUSED',
        self::REMOVED => 'REMOVED',
        self::PENDING => 'PENDING',
        self::LIMITED => 'LIMITED',
        self::NOT_ELIGIBLE => 'NOT_ELIGIBLE',
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
class_alias(AssetLinkPrimaryStatus::class, \Google\Ads\GoogleAds\V16\Enums\AssetLinkPrimaryStatusEnum_AssetLinkPrimaryStatus::class);

