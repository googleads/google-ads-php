<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/errors/operator_error.proto

namespace Google\Ads\GoogleAds\V10\Errors\OperatorErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible operator errors.
 *
 * Protobuf type <code>google.ads.googleads.v10.errors.OperatorErrorEnum.OperatorError</code>
 */
class OperatorError
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
     * Operator not supported.
     *
     * Generated from protobuf enum <code>OPERATOR_NOT_SUPPORTED = 2;</code>
     */
    const OPERATOR_NOT_SUPPORTED = 2;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::OPERATOR_NOT_SUPPORTED => 'OPERATOR_NOT_SUPPORTED',
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
class_alias(OperatorError::class, \Google\Ads\GoogleAds\V10\Errors\OperatorErrorEnum_OperatorError::class);

