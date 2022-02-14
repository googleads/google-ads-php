<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/errors/mutate_error.proto

namespace Google\Ads\GoogleAds\V10\Errors\MutateErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible mutate errors.
 *
 * Protobuf type <code>google.ads.googleads.v10.errors.MutateErrorEnum.MutateError</code>
 */
class MutateError
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
     * Requested resource was not found.
     *
     * Generated from protobuf enum <code>RESOURCE_NOT_FOUND = 3;</code>
     */
    const RESOURCE_NOT_FOUND = 3;
    /**
     * Cannot mutate the same resource twice in one request.
     *
     * Generated from protobuf enum <code>ID_EXISTS_IN_MULTIPLE_MUTATES = 7;</code>
     */
    const ID_EXISTS_IN_MULTIPLE_MUTATES = 7;
    /**
     * The field's contents don't match another field that represents the same
     * data.
     *
     * Generated from protobuf enum <code>INCONSISTENT_FIELD_VALUES = 8;</code>
     */
    const INCONSISTENT_FIELD_VALUES = 8;
    /**
     * Mutates are not allowed for the requested resource.
     *
     * Generated from protobuf enum <code>MUTATE_NOT_ALLOWED = 9;</code>
     */
    const MUTATE_NOT_ALLOWED = 9;
    /**
     * The resource isn't in Google Ads. It belongs to another ads system.
     *
     * Generated from protobuf enum <code>RESOURCE_NOT_IN_GOOGLE_ADS = 10;</code>
     */
    const RESOURCE_NOT_IN_GOOGLE_ADS = 10;
    /**
     * The resource being created already exists.
     *
     * Generated from protobuf enum <code>RESOURCE_ALREADY_EXISTS = 11;</code>
     */
    const RESOURCE_ALREADY_EXISTS = 11;
    /**
     * This resource cannot be used with "validate_only".
     *
     * Generated from protobuf enum <code>RESOURCE_DOES_NOT_SUPPORT_VALIDATE_ONLY = 12;</code>
     */
    const RESOURCE_DOES_NOT_SUPPORT_VALIDATE_ONLY = 12;
    /**
     * This operation cannot be used with "partial_failure".
     *
     * Generated from protobuf enum <code>OPERATION_DOES_NOT_SUPPORT_PARTIAL_FAILURE = 16;</code>
     */
    const OPERATION_DOES_NOT_SUPPORT_PARTIAL_FAILURE = 16;
    /**
     * Attempt to write to read-only fields.
     *
     * Generated from protobuf enum <code>RESOURCE_READ_ONLY = 13;</code>
     */
    const RESOURCE_READ_ONLY = 13;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::RESOURCE_NOT_FOUND => 'RESOURCE_NOT_FOUND',
        self::ID_EXISTS_IN_MULTIPLE_MUTATES => 'ID_EXISTS_IN_MULTIPLE_MUTATES',
        self::INCONSISTENT_FIELD_VALUES => 'INCONSISTENT_FIELD_VALUES',
        self::MUTATE_NOT_ALLOWED => 'MUTATE_NOT_ALLOWED',
        self::RESOURCE_NOT_IN_GOOGLE_ADS => 'RESOURCE_NOT_IN_GOOGLE_ADS',
        self::RESOURCE_ALREADY_EXISTS => 'RESOURCE_ALREADY_EXISTS',
        self::RESOURCE_DOES_NOT_SUPPORT_VALIDATE_ONLY => 'RESOURCE_DOES_NOT_SUPPORT_VALIDATE_ONLY',
        self::OPERATION_DOES_NOT_SUPPORT_PARTIAL_FAILURE => 'OPERATION_DOES_NOT_SUPPORT_PARTIAL_FAILURE',
        self::RESOURCE_READ_ONLY => 'RESOURCE_READ_ONLY',
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
class_alias(MutateError::class, \Google\Ads\GoogleAds\V10\Errors\MutateErrorEnum_MutateError::class);

