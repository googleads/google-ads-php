<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/conversion_tracking_status_enum.proto

namespace Google\Ads\GoogleAds\V20\Enums\ConversionTrackingStatusEnum;

use UnexpectedValueException;

/**
 * Conversion Tracking status of the customer.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.ConversionTrackingStatusEnum.ConversionTrackingStatus</code>
 */
class ConversionTrackingStatus
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
     * Customer does not use any conversion tracking.
     *
     * Generated from protobuf enum <code>NOT_CONVERSION_TRACKED = 2;</code>
     */
    const NOT_CONVERSION_TRACKED = 2;
    /**
     * The conversion actions are created and managed by this customer.
     *
     * Generated from protobuf enum <code>CONVERSION_TRACKING_MANAGED_BY_SELF = 3;</code>
     */
    const CONVERSION_TRACKING_MANAGED_BY_SELF = 3;
    /**
     * The conversion actions are created and managed by the manager specified
     * in the request's `login-customer-id`.
     *
     * Generated from protobuf enum <code>CONVERSION_TRACKING_MANAGED_BY_THIS_MANAGER = 4;</code>
     */
    const CONVERSION_TRACKING_MANAGED_BY_THIS_MANAGER = 4;
    /**
     * The conversion actions are created and managed by a manager different
     * from the customer or manager specified in the request's
     * `login-customer-id`.
     *
     * Generated from protobuf enum <code>CONVERSION_TRACKING_MANAGED_BY_ANOTHER_MANAGER = 5;</code>
     */
    const CONVERSION_TRACKING_MANAGED_BY_ANOTHER_MANAGER = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::NOT_CONVERSION_TRACKED => 'NOT_CONVERSION_TRACKED',
        self::CONVERSION_TRACKING_MANAGED_BY_SELF => 'CONVERSION_TRACKING_MANAGED_BY_SELF',
        self::CONVERSION_TRACKING_MANAGED_BY_THIS_MANAGER => 'CONVERSION_TRACKING_MANAGED_BY_THIS_MANAGER',
        self::CONVERSION_TRACKING_MANAGED_BY_ANOTHER_MANAGER => 'CONVERSION_TRACKING_MANAGED_BY_ANOTHER_MANAGER',
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
class_alias(ConversionTrackingStatus::class, \Google\Ads\GoogleAds\V20\Enums\ConversionTrackingStatusEnum_ConversionTrackingStatus::class);

