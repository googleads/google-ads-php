<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: Google/Ads/GoogleAds/Util/FieldMasks/Proto/tester.proto

namespace Google\Ads\GoogleAds\Util\FieldMasks\Proto\ResourceStatusEnum;

use UnexpectedValueException;

/**
 * Protobuf type <code>google.ads.googleads.util.fieldmasks.proto.ResourceStatusEnum.ResourceStatus</code>
 */
class ResourceStatus
{
    /**
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Generated from protobuf enum <code>ENABLED = 2;</code>
     */
    const ENABLED = 2;
    /**
     * Generated from protobuf enum <code>PAUSED = 3;</code>
     */
    const PAUSED = 3;
    /**
     * Generated from protobuf enum <code>REMOVED = 4;</code>
     */
    const REMOVED = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::ENABLED => 'ENABLED',
        self::PAUSED => 'PAUSED',
        self::REMOVED => 'REMOVED',
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
class_alias(ResourceStatus::class, \Google\Ads\GoogleAds\Util\FieldMasks\Proto\ResourceStatusEnum_ResourceStatus::class);

