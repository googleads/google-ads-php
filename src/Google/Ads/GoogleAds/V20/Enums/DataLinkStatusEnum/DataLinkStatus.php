<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/data_link_status.proto

namespace Google\Ads\GoogleAds\V20\Enums\DataLinkStatusEnum;

use UnexpectedValueException;

/**
 * Describes the possible data link statuses.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.DataLinkStatusEnum.DataLinkStatus</code>
 */
class DataLinkStatus
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
     * Link has been requested by one party, but not confirmed by the other
     * party.
     *
     * Generated from protobuf enum <code>REQUESTED = 2;</code>
     */
    const REQUESTED = 2;
    /**
     * Link is waiting for the customer to approve.
     *
     * Generated from protobuf enum <code>PENDING_APPROVAL = 3;</code>
     */
    const PENDING_APPROVAL = 3;
    /**
     * Link is established and can be used as needed.
     *
     * Generated from protobuf enum <code>ENABLED = 4;</code>
     */
    const ENABLED = 4;
    /**
     * Link is no longer valid and should be ignored.
     *
     * Generated from protobuf enum <code>DISABLED = 5;</code>
     */
    const DISABLED = 5;
    /**
     * Link request has been cancelled by the requester and further cleanup may
     * be needed.
     *
     * Generated from protobuf enum <code>REVOKED = 6;</code>
     */
    const REVOKED = 6;
    /**
     * Link request has been rejected by the approver.
     *
     * Generated from protobuf enum <code>REJECTED = 7;</code>
     */
    const REJECTED = 7;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::REQUESTED => 'REQUESTED',
        self::PENDING_APPROVAL => 'PENDING_APPROVAL',
        self::ENABLED => 'ENABLED',
        self::DISABLED => 'DISABLED',
        self::REVOKED => 'REVOKED',
        self::REJECTED => 'REJECTED',
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
class_alias(DataLinkStatus::class, \Google\Ads\GoogleAds\V20\Enums\DataLinkStatusEnum_DataLinkStatus::class);

