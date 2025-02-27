<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/local_services_lead_status.proto

namespace Google\Ads\GoogleAds\V19\Enums\LocalServicesLeadStatusEnum;

use UnexpectedValueException;

/**
 * Possible statuses of lead.
 *
 * Protobuf type <code>google.ads.googleads.v19.enums.LocalServicesLeadStatusEnum.LeadStatus</code>
 */
class LeadStatus
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
     * New lead which hasn't yet been seen by advertiser.
     *
     * Generated from protobuf enum <code>NEW = 2;</code>
     */
    const PBNEW = 2;
    /**
     * Lead that thas been interacted by advertiser.
     *
     * Generated from protobuf enum <code>ACTIVE = 3;</code>
     */
    const ACTIVE = 3;
    /**
     * Lead has been booked.
     *
     * Generated from protobuf enum <code>BOOKED = 4;</code>
     */
    const BOOKED = 4;
    /**
     * Lead was declined by advertiser.
     *
     * Generated from protobuf enum <code>DECLINED = 5;</code>
     */
    const DECLINED = 5;
    /**
     * Lead has expired due to inactivity.
     *
     * Generated from protobuf enum <code>EXPIRED = 6;</code>
     */
    const EXPIRED = 6;
    /**
     * Disabled due to spam or dispute.
     *
     * Generated from protobuf enum <code>DISABLED = 7;</code>
     */
    const DISABLED = 7;
    /**
     * Consumer declined the lead.
     *
     * Generated from protobuf enum <code>CONSUMER_DECLINED = 8;</code>
     */
    const CONSUMER_DECLINED = 8;
    /**
     * Personally Identifiable Information of the lead is wiped out.
     *
     * Generated from protobuf enum <code>WIPED_OUT = 9;</code>
     */
    const WIPED_OUT = 9;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::PBNEW => 'NEW',
        self::ACTIVE => 'ACTIVE',
        self::BOOKED => 'BOOKED',
        self::DECLINED => 'DECLINED',
        self::EXPIRED => 'EXPIRED',
        self::DISABLED => 'DISABLED',
        self::CONSUMER_DECLINED => 'CONSUMER_DECLINED',
        self::WIPED_OUT => 'WIPED_OUT',
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
            $pbconst =  __CLASS__. '::PB' . strtoupper($name);
            if (!defined($pbconst)) {
                throw new UnexpectedValueException(sprintf(
                        'Enum %s has no value defined for name %s', __CLASS__, $name));
            }
            return constant($pbconst);
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LeadStatus::class, \Google\Ads\GoogleAds\V19\Enums\LocalServicesLeadStatusEnum_LeadStatus::class);

