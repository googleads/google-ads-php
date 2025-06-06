<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/internal_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\InternalErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible internal errors.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.InternalErrorEnum.InternalError</code>
 */
class InternalError
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
     * Google Ads API encountered unexpected internal error.
     *
     * Generated from protobuf enum <code>INTERNAL_ERROR = 2;</code>
     */
    const INTERNAL_ERROR = 2;
    /**
     * The intended error code doesn't exist in specified API version. It will
     * be released in a future API version.
     *
     * Generated from protobuf enum <code>ERROR_CODE_NOT_PUBLISHED = 3;</code>
     */
    const ERROR_CODE_NOT_PUBLISHED = 3;
    /**
     * Google Ads API encountered an unexpected transient error. The user
     * should retry their request in these cases.
     *
     * Generated from protobuf enum <code>TRANSIENT_ERROR = 4;</code>
     */
    const TRANSIENT_ERROR = 4;
    /**
     * The request took longer than a deadline.
     *
     * Generated from protobuf enum <code>DEADLINE_EXCEEDED = 5;</code>
     */
    const DEADLINE_EXCEEDED = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::INTERNAL_ERROR => 'INTERNAL_ERROR',
        self::ERROR_CODE_NOT_PUBLISHED => 'ERROR_CODE_NOT_PUBLISHED',
        self::TRANSIENT_ERROR => 'TRANSIENT_ERROR',
        self::DEADLINE_EXCEEDED => 'DEADLINE_EXCEEDED',
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
class_alias(InternalError::class, \Google\Ads\GoogleAds\V20\Errors\InternalErrorEnum_InternalError::class);

