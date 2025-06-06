<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/response_content_type.proto

namespace Google\Ads\GoogleAds\V20\Enums\ResponseContentTypeEnum;

use UnexpectedValueException;

/**
 * Possible response content types.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.ResponseContentTypeEnum.ResponseContentType</code>
 */
class ResponseContentType
{
    /**
     * Not specified. Will return the resource name only in the response.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The mutate response will be the resource name.
     *
     * Generated from protobuf enum <code>RESOURCE_NAME_ONLY = 1;</code>
     */
    const RESOURCE_NAME_ONLY = 1;
    /**
     * The mutate response will contain the resource name and the resource with
     * mutable fields if possible. Otherwise, only the resource name will be
     * returned.
     *
     * Generated from protobuf enum <code>MUTABLE_RESOURCE = 2;</code>
     */
    const MUTABLE_RESOURCE = 2;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::RESOURCE_NAME_ONLY => 'RESOURCE_NAME_ONLY',
        self::MUTABLE_RESOURCE => 'MUTABLE_RESOURCE',
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
class_alias(ResponseContentType::class, \Google\Ads\GoogleAds\V20\Enums\ResponseContentTypeEnum_ResponseContentType::class);

