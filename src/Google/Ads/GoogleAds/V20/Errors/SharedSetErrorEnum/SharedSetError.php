<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/shared_set_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\SharedSetErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible shared set errors.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.SharedSetErrorEnum.SharedSetError</code>
 */
class SharedSetError
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
     * The customer cannot create this type of shared set.
     *
     * Generated from protobuf enum <code>CUSTOMER_CANNOT_CREATE_SHARED_SET_OF_THIS_TYPE = 2;</code>
     */
    const CUSTOMER_CANNOT_CREATE_SHARED_SET_OF_THIS_TYPE = 2;
    /**
     * A shared set with this name already exists.
     *
     * Generated from protobuf enum <code>DUPLICATE_NAME = 3;</code>
     */
    const DUPLICATE_NAME = 3;
    /**
     * Removed shared sets cannot be mutated.
     *
     * Generated from protobuf enum <code>SHARED_SET_REMOVED = 4;</code>
     */
    const SHARED_SET_REMOVED = 4;
    /**
     * The shared set cannot be removed because it is in use.
     *
     * Generated from protobuf enum <code>SHARED_SET_IN_USE = 5;</code>
     */
    const SHARED_SET_IN_USE = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CUSTOMER_CANNOT_CREATE_SHARED_SET_OF_THIS_TYPE => 'CUSTOMER_CANNOT_CREATE_SHARED_SET_OF_THIS_TYPE',
        self::DUPLICATE_NAME => 'DUPLICATE_NAME',
        self::SHARED_SET_REMOVED => 'SHARED_SET_REMOVED',
        self::SHARED_SET_IN_USE => 'SHARED_SET_IN_USE',
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
class_alias(SharedSetError::class, \Google\Ads\GoogleAds\V20\Errors\SharedSetErrorEnum_SharedSetError::class);

