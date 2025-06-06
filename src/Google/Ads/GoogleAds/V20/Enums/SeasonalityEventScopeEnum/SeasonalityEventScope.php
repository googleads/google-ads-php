<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/seasonality_event_scope.proto

namespace Google\Ads\GoogleAds\V20\Enums\SeasonalityEventScopeEnum;

use UnexpectedValueException;

/**
 * The possible scopes of a Seasonality Event.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.SeasonalityEventScopeEnum.SeasonalityEventScope</code>
 */
class SeasonalityEventScope
{
    /**
     * No value has been specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The received value is not known in this version.
     * This is a response-only value.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * The seasonality event is applied to all the customer's traffic for
     * supported advertising channel types and device types. The CUSTOMER scope
     * cannot be used in mutates.
     *
     * Generated from protobuf enum <code>CUSTOMER = 2;</code>
     */
    const CUSTOMER = 2;
    /**
     * The seasonality event is applied to all specified campaigns.
     *
     * Generated from protobuf enum <code>CAMPAIGN = 4;</code>
     */
    const CAMPAIGN = 4;
    /**
     * The seasonality event is applied to all campaigns that belong to
     * specified channel types.
     *
     * Generated from protobuf enum <code>CHANNEL = 5;</code>
     */
    const CHANNEL = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CUSTOMER => 'CUSTOMER',
        self::CAMPAIGN => 'CAMPAIGN',
        self::CHANNEL => 'CHANNEL',
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
class_alias(SeasonalityEventScope::class, \Google\Ads\GoogleAds\V20\Enums\SeasonalityEventScopeEnum_SeasonalityEventScope::class);

