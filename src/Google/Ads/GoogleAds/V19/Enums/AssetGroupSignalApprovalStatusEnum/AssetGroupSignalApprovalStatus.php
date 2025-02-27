<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/asset_group_signal_approval_status.proto

namespace Google\Ads\GoogleAds\V19\Enums\AssetGroupSignalApprovalStatusEnum;

use UnexpectedValueException;

/**
 * Enumerates AssetGroupSignal approval statuses, which are only used for
 * Search Theme Signal.
 *
 * Protobuf type <code>google.ads.googleads.v19.enums.AssetGroupSignalApprovalStatusEnum.AssetGroupSignalApprovalStatus</code>
 */
class AssetGroupSignalApprovalStatus
{
    /**
     * Not specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The value is unknown in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Search Theme is eligible to show ads.
     *
     * Generated from protobuf enum <code>APPROVED = 2;</code>
     */
    const APPROVED = 2;
    /**
     * Low search volume; Below first page bid estimate.
     *
     * Generated from protobuf enum <code>LIMITED = 3;</code>
     */
    const LIMITED = 3;
    /**
     * Search Theme is inactive and isn't showing ads. A disapproved Search
     * Theme usually means there's an issue with one or more of our advertising
     * policies.
     *
     * Generated from protobuf enum <code>DISAPPROVED = 4;</code>
     */
    const DISAPPROVED = 4;
    /**
     * Search Theme is under review. It won’t be able to trigger ads until
     * it's been reviewed.
     *
     * Generated from protobuf enum <code>UNDER_REVIEW = 5;</code>
     */
    const UNDER_REVIEW = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::APPROVED => 'APPROVED',
        self::LIMITED => 'LIMITED',
        self::DISAPPROVED => 'DISAPPROVED',
        self::UNDER_REVIEW => 'UNDER_REVIEW',
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
class_alias(AssetGroupSignalApprovalStatus::class, \Google\Ads\GoogleAds\V19\Enums\AssetGroupSignalApprovalStatusEnum_AssetGroupSignalApprovalStatus::class);

