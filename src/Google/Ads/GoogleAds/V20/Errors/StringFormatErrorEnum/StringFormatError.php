<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/string_format_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\StringFormatErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible string format errors.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.StringFormatErrorEnum.StringFormatError</code>
 */
class StringFormatError
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
     * The input string value contains disallowed characters.
     *
     * Generated from protobuf enum <code>ILLEGAL_CHARS = 2;</code>
     */
    const ILLEGAL_CHARS = 2;
    /**
     * The input string value is invalid for the associated field.
     *
     * Generated from protobuf enum <code>INVALID_FORMAT = 3;</code>
     */
    const INVALID_FORMAT = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::ILLEGAL_CHARS => 'ILLEGAL_CHARS',
        self::INVALID_FORMAT => 'INVALID_FORMAT',
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
class_alias(StringFormatError::class, \Google\Ads\GoogleAds\V20\Errors\StringFormatErrorEnum_StringFormatError::class);

