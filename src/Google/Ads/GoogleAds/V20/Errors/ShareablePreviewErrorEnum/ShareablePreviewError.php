<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/shareable_preview_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\ShareablePreviewErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible shareable preview errors.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.ShareablePreviewErrorEnum.ShareablePreviewError</code>
 */
class ShareablePreviewError
{
    /**
     * Enum unspecified.
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
     * The maximum of 10 asset groups was exceeded.
     *
     * Generated from protobuf enum <code>TOO_MANY_ASSET_GROUPS_IN_REQUEST = 2;</code>
     */
    const TOO_MANY_ASSET_GROUPS_IN_REQUEST = 2;
    /**
     * asset group does not exist under this customer.
     *
     * Generated from protobuf enum <code>ASSET_GROUP_DOES_NOT_EXIST_UNDER_THIS_CUSTOMER = 3;</code>
     */
    const ASSET_GROUP_DOES_NOT_EXIST_UNDER_THIS_CUSTOMER = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::TOO_MANY_ASSET_GROUPS_IN_REQUEST => 'TOO_MANY_ASSET_GROUPS_IN_REQUEST',
        self::ASSET_GROUP_DOES_NOT_EXIST_UNDER_THIS_CUSTOMER => 'ASSET_GROUP_DOES_NOT_EXIST_UNDER_THIS_CUSTOMER',
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
class_alias(ShareablePreviewError::class, \Google\Ads\GoogleAds\V20\Errors\ShareablePreviewErrorEnum_ShareablePreviewError::class);

