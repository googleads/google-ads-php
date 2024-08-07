<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/errors/customer_sk_ad_network_conversion_value_schema_error.proto

namespace Google\Ads\GoogleAds\V17\Errors\CustomerSkAdNetworkConversionValueSchemaErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible CustomerSkAdNetworkConversionValueSchema errors.
 *
 * Protobuf type <code>google.ads.googleads.v17.errors.CustomerSkAdNetworkConversionValueSchemaErrorEnum.CustomerSkAdNetworkConversionValueSchemaError</code>
 */
class CustomerSkAdNetworkConversionValueSchemaError
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
     * The customer link ID provided is invalid.
     *
     * Generated from protobuf enum <code>INVALID_LINK_ID = 2;</code>
     */
    const INVALID_LINK_ID = 2;
    /**
     * The app ID provided is invalid.
     *
     * Generated from protobuf enum <code>INVALID_APP_ID = 3;</code>
     */
    const INVALID_APP_ID = 3;
    /**
     * The conversion value schema provided is invalid.
     *
     * Generated from protobuf enum <code>INVALID_SCHEMA = 4;</code>
     */
    const INVALID_SCHEMA = 4;
    /**
     * The customer link id provided could not be found.
     *
     * Generated from protobuf enum <code>LINK_CODE_NOT_FOUND = 5;</code>
     */
    const LINK_CODE_NOT_FOUND = 5;
    /**
     * The SkAdNetwork event counter provided is invalid.
     *
     * Generated from protobuf enum <code>INVALID_EVENT_COUNTER = 7;</code>
     */
    const INVALID_EVENT_COUNTER = 7;
    /**
     * The SkAdNetwork event name provided is invalid.
     *
     * Generated from protobuf enum <code>INVALID_EVENT_NAME = 8;</code>
     */
    const INVALID_EVENT_NAME = 8;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::INVALID_LINK_ID => 'INVALID_LINK_ID',
        self::INVALID_APP_ID => 'INVALID_APP_ID',
        self::INVALID_SCHEMA => 'INVALID_SCHEMA',
        self::LINK_CODE_NOT_FOUND => 'LINK_CODE_NOT_FOUND',
        self::INVALID_EVENT_COUNTER => 'INVALID_EVENT_COUNTER',
        self::INVALID_EVENT_NAME => 'INVALID_EVENT_NAME',
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
class_alias(CustomerSkAdNetworkConversionValueSchemaError::class, \Google\Ads\GoogleAds\V17\Errors\CustomerSkAdNetworkConversionValueSchemaErrorEnum_CustomerSkAdNetworkConversionValueSchemaError::class);
