<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v11/enums/lead_form_desired_intent.proto

namespace Google\Ads\GoogleAds\V11\Enums\LeadFormDesiredIntentEnum;

use UnexpectedValueException;

/**
 * Enum describing the chosen level of intent of generated leads.
 *
 * Protobuf type <code>google.ads.googleads.v11.enums.LeadFormDesiredIntentEnum.LeadFormDesiredIntent</code>
 */
class LeadFormDesiredIntent
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
     * Deliver more leads at a potentially lower quality.
     *
     * Generated from protobuf enum <code>LOW_INTENT = 2;</code>
     */
    const LOW_INTENT = 2;
    /**
     * Deliver leads that are more qualified.
     *
     * Generated from protobuf enum <code>HIGH_INTENT = 3;</code>
     */
    const HIGH_INTENT = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::LOW_INTENT => 'LOW_INTENT',
        self::HIGH_INTENT => 'HIGH_INTENT',
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
class_alias(LeadFormDesiredIntent::class, \Google\Ads\GoogleAds\V11\Enums\LeadFormDesiredIntentEnum_LeadFormDesiredIntent::class);

