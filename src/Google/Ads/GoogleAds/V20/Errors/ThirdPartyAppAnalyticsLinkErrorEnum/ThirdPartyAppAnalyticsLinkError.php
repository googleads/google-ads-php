<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/third_party_app_analytics_link_error.proto

namespace Google\Ads\GoogleAds\V20\Errors\ThirdPartyAppAnalyticsLinkErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible third party app analytics link errors.
 *
 * Protobuf type <code>google.ads.googleads.v20.errors.ThirdPartyAppAnalyticsLinkErrorEnum.ThirdPartyAppAnalyticsLinkError</code>
 */
class ThirdPartyAppAnalyticsLinkError
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
     * The provided analytics provider ID is invalid.
     *
     * Generated from protobuf enum <code>INVALID_ANALYTICS_PROVIDER_ID = 2;</code>
     */
    const INVALID_ANALYTICS_PROVIDER_ID = 2;
    /**
     * The provided mobile app ID is invalid.
     *
     * Generated from protobuf enum <code>INVALID_MOBILE_APP_ID = 3;</code>
     */
    const INVALID_MOBILE_APP_ID = 3;
    /**
     * The mobile app corresponding to the provided app ID is not
     * active/enabled.
     *
     * Generated from protobuf enum <code>MOBILE_APP_IS_NOT_ENABLED = 4;</code>
     */
    const MOBILE_APP_IS_NOT_ENABLED = 4;
    /**
     * Regenerating shareable link ID is only allowed on active links
     *
     * Generated from protobuf enum <code>CANNOT_REGENERATE_SHAREABLE_LINK_ID_FOR_REMOVED_LINK = 5;</code>
     */
    const CANNOT_REGENERATE_SHAREABLE_LINK_ID_FOR_REMOVED_LINK = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::INVALID_ANALYTICS_PROVIDER_ID => 'INVALID_ANALYTICS_PROVIDER_ID',
        self::INVALID_MOBILE_APP_ID => 'INVALID_MOBILE_APP_ID',
        self::MOBILE_APP_IS_NOT_ENABLED => 'MOBILE_APP_IS_NOT_ENABLED',
        self::CANNOT_REGENERATE_SHAREABLE_LINK_ID_FOR_REMOVED_LINK => 'CANNOT_REGENERATE_SHAREABLE_LINK_ID_FOR_REMOVED_LINK',
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
class_alias(ThirdPartyAppAnalyticsLinkError::class, \Google\Ads\GoogleAds\V20\Errors\ThirdPartyAppAnalyticsLinkErrorEnum_ThirdPartyAppAnalyticsLinkError::class);

