<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/enums/sitelink_placeholder_field.proto

namespace Google\Ads\GoogleAds\V18\Enums\SitelinkPlaceholderFieldEnum;

use UnexpectedValueException;

/**
 * Possible values for Sitelink placeholder fields.
 *
 * Protobuf type <code>google.ads.googleads.v18.enums.SitelinkPlaceholderFieldEnum.SitelinkPlaceholderField</code>
 */
class SitelinkPlaceholderField
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
     * Data Type: STRING. The link text for your sitelink.
     *
     * Generated from protobuf enum <code>TEXT = 2;</code>
     */
    const TEXT = 2;
    /**
     * Data Type: STRING. First line of the sitelink description.
     *
     * Generated from protobuf enum <code>LINE_1 = 3;</code>
     */
    const LINE_1 = 3;
    /**
     * Data Type: STRING. Second line of the sitelink description.
     *
     * Generated from protobuf enum <code>LINE_2 = 4;</code>
     */
    const LINE_2 = 4;
    /**
     * Data Type: URL_LIST. Final URLs for the sitelink when using Upgraded
     * URLs.
     *
     * Generated from protobuf enum <code>FINAL_URLS = 5;</code>
     */
    const FINAL_URLS = 5;
    /**
     * Data Type: URL_LIST. Final Mobile URLs for the sitelink when using
     * Upgraded URLs.
     *
     * Generated from protobuf enum <code>FINAL_MOBILE_URLS = 6;</code>
     */
    const FINAL_MOBILE_URLS = 6;
    /**
     * Data Type: URL. Tracking template for the sitelink when using Upgraded
     * URLs.
     *
     * Generated from protobuf enum <code>TRACKING_URL = 7;</code>
     */
    const TRACKING_URL = 7;
    /**
     * Data Type: STRING. Final URL suffix for sitelink when using parallel
     * tracking.
     *
     * Generated from protobuf enum <code>FINAL_URL_SUFFIX = 8;</code>
     */
    const FINAL_URL_SUFFIX = 8;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::TEXT => 'TEXT',
        self::LINE_1 => 'LINE_1',
        self::LINE_2 => 'LINE_2',
        self::FINAL_URLS => 'FINAL_URLS',
        self::FINAL_MOBILE_URLS => 'FINAL_MOBILE_URLS',
        self::TRACKING_URL => 'TRACKING_URL',
        self::FINAL_URL_SUFFIX => 'FINAL_URL_SUFFIX',
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
class_alias(SitelinkPlaceholderField::class, \Google\Ads\GoogleAds\V18\Enums\SitelinkPlaceholderFieldEnum_SitelinkPlaceholderField::class);

