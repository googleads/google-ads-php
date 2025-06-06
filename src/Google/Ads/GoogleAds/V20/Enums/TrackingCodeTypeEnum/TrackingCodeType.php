<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/tracking_code_type.proto

namespace Google\Ads\GoogleAds\V20\Enums\TrackingCodeTypeEnum;

use UnexpectedValueException;

/**
 * The type of the generated tag snippets for tracking conversions.
 *
 * Protobuf type <code>google.ads.googleads.v20.enums.TrackingCodeTypeEnum.TrackingCodeType</code>
 */
class TrackingCodeType
{
    /**
     * Not specified.
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
     * The snippet that is fired as a result of a website page loading.
     *
     * Generated from protobuf enum <code>WEBPAGE = 2;</code>
     */
    const WEBPAGE = 2;
    /**
     * The snippet contains a JavaScript function which fires the tag. This
     * function is typically called from an onClick handler added to a link or
     * button element on the page.
     *
     * Generated from protobuf enum <code>WEBPAGE_ONCLICK = 3;</code>
     */
    const WEBPAGE_ONCLICK = 3;
    /**
     * For embedding on a mobile webpage. The snippet contains a JavaScript
     * function which fires the tag.
     *
     * Generated from protobuf enum <code>CLICK_TO_CALL = 4;</code>
     */
    const CLICK_TO_CALL = 4;
    /**
     * The snippet that is used to replace the phone number on your website with
     * a Google forwarding number for call tracking purposes.
     *
     * Generated from protobuf enum <code>WEBSITE_CALL = 5;</code>
     */
    const WEBSITE_CALL = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::WEBPAGE => 'WEBPAGE',
        self::WEBPAGE_ONCLICK => 'WEBPAGE_ONCLICK',
        self::CLICK_TO_CALL => 'CLICK_TO_CALL',
        self::WEBSITE_CALL => 'WEBSITE_CALL',
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
class_alias(TrackingCodeType::class, \Google\Ads\GoogleAds\V20\Enums\TrackingCodeTypeEnum_TrackingCodeType::class);

