<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/resource_change_operation.proto

namespace Google\Ads\GoogleAds\V20\Enums\ResourceChangeOperationEnum;

use UnexpectedValueException;

/**
 * The operation on the changed resource in change_event resource.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.ResourceChangeOperationEnum.ResourceChangeOperation</code>
 */
class ResourceChangeOperation
{
    /**
     * No value has been specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * Used for return value only. Represents an unclassified operation unknown
     * in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * The resource was created.
     *
     * Generated from protobuf enum <code>CREATE = 2;</code>
     */
    const CREATE = 2;
    /**
     * The resource was modified.
     *
     * Generated from protobuf enum <code>UPDATE = 3;</code>
     */
    const UPDATE = 3;
    /**
     * The resource was removed.
     *
     * Generated from protobuf enum <code>REMOVE = 4;</code>
     */
    const REMOVE = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CREATE => 'CREATE',
        self::UPDATE => 'UPDATE',
        self::REMOVE => 'REMOVE',
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
class_alias(ResourceChangeOperation::class, \Google\Ads\GoogleAds\V20\Enums\ResourceChangeOperationEnum_ResourceChangeOperation::class);

