<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/list_operation_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\ListOperationErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible list operation errors.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.ListOperationErrorEnum.ListOperationError</code>
 */
class ListOperationError
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
     * Field required in value is missing.
     *
     * Generated from protobuf enum <code>REQUIRED_FIELD_MISSING = 7;</code>
     */
    const REQUIRED_FIELD_MISSING = 7;
    /**
     * Duplicate or identical value is sent in multiple list operations.
     *
     * Generated from protobuf enum <code>DUPLICATE_VALUES = 8;</code>
     */
    const DUPLICATE_VALUES = 8;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::REQUIRED_FIELD_MISSING => 'REQUIRED_FIELD_MISSING',
        self::DUPLICATE_VALUES => 'DUPLICATE_VALUES',
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
class_alias(ListOperationError::class, \Google\Ads\GoogleAds\V20\Errors\ListOperationErrorEnum_ListOperationError::class);

