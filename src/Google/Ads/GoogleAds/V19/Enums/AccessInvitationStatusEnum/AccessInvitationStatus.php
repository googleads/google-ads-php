<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/access_invitation_status.proto

namespace Google\Ads\GoogleAds\V19\Enums\AccessInvitationStatusEnum;

use UnexpectedValueException;

/**
 * Possible access invitation status of a user
 *
 * Protobuf type <code>google.ads.googleads.v19.enums.AccessInvitationStatusEnum.AccessInvitationStatus</code>
 */
class AccessInvitationStatus
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
     * The initial state of an invitation, before being acted upon by anyone.
     *
     * Generated from protobuf enum <code>PENDING = 2;</code>
     */
    const PENDING = 2;
    /**
     * Invitation process was terminated by the email recipient. No new user was
     * created.
     *
     * Generated from protobuf enum <code>DECLINED = 3;</code>
     */
    const DECLINED = 3;
    /**
     * Invitation URLs expired without being acted upon. No new user can be
     * created.  Invitations expire 20 days after creation.
     *
     * Generated from protobuf enum <code>EXPIRED = 4;</code>
     */
    const EXPIRED = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::PENDING => 'PENDING',
        self::DECLINED => 'DECLINED',
        self::EXPIRED => 'EXPIRED',
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
class_alias(AccessInvitationStatus::class, \Google\Ads\GoogleAds\V19\Enums\AccessInvitationStatusEnum_AccessInvitationStatus::class);

