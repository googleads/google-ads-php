<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/ad_type.proto

namespace Google\Ads\GoogleAds\V19\Enums\AdTypeEnum;

use UnexpectedValueException;

/**
 * The possible types of an ad.
 *
 * Protobuf type <code>google.ads.googleads.v19.enums.AdTypeEnum.AdType</code>
 */
class AdType
{
    /**
     * No value has been specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The received value is not known in this version.
     * This is a response-only value.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * The ad is a text ad.
     *
     * Generated from protobuf enum <code>TEXT_AD = 2;</code>
     */
    const TEXT_AD = 2;
    /**
     * The ad is an expanded text ad.
     *
     * Generated from protobuf enum <code>EXPANDED_TEXT_AD = 3;</code>
     */
    const EXPANDED_TEXT_AD = 3;
    /**
     * The ad is an expanded dynamic search ad.
     *
     * Generated from protobuf enum <code>EXPANDED_DYNAMIC_SEARCH_AD = 7;</code>
     */
    const EXPANDED_DYNAMIC_SEARCH_AD = 7;
    /**
     * The ad is a hotel ad.
     *
     * Generated from protobuf enum <code>HOTEL_AD = 8;</code>
     */
    const HOTEL_AD = 8;
    /**
     * The ad is a Smart Shopping ad.
     *
     * Generated from protobuf enum <code>SHOPPING_SMART_AD = 9;</code>
     */
    const SHOPPING_SMART_AD = 9;
    /**
     * The ad is a standard Shopping ad.
     *
     * Generated from protobuf enum <code>SHOPPING_PRODUCT_AD = 10;</code>
     */
    const SHOPPING_PRODUCT_AD = 10;
    /**
     * The ad is a video ad.
     *
     * Generated from protobuf enum <code>VIDEO_AD = 12;</code>
     */
    const VIDEO_AD = 12;
    /**
     * This ad is an Image ad.
     *
     * Generated from protobuf enum <code>IMAGE_AD = 14;</code>
     */
    const IMAGE_AD = 14;
    /**
     * The ad is a responsive search ad.
     *
     * Generated from protobuf enum <code>RESPONSIVE_SEARCH_AD = 15;</code>
     */
    const RESPONSIVE_SEARCH_AD = 15;
    /**
     * The ad is a legacy responsive display ad.
     *
     * Generated from protobuf enum <code>LEGACY_RESPONSIVE_DISPLAY_AD = 16;</code>
     */
    const LEGACY_RESPONSIVE_DISPLAY_AD = 16;
    /**
     * The ad is an app ad.
     *
     * Generated from protobuf enum <code>APP_AD = 17;</code>
     */
    const APP_AD = 17;
    /**
     * The ad is a legacy app install ad.
     *
     * Generated from protobuf enum <code>LEGACY_APP_INSTALL_AD = 18;</code>
     */
    const LEGACY_APP_INSTALL_AD = 18;
    /**
     * The ad is a responsive display ad.
     *
     * Generated from protobuf enum <code>RESPONSIVE_DISPLAY_AD = 19;</code>
     */
    const RESPONSIVE_DISPLAY_AD = 19;
    /**
     * The ad is a local ad.
     *
     * Generated from protobuf enum <code>LOCAL_AD = 20;</code>
     */
    const LOCAL_AD = 20;
    /**
     * The ad is a display upload ad with the HTML5_UPLOAD_AD product type.
     *
     * Generated from protobuf enum <code>HTML5_UPLOAD_AD = 21;</code>
     */
    const HTML5_UPLOAD_AD = 21;
    /**
     * The ad is a display upload ad with one of the DYNAMIC_HTML5_* product
     * types.
     *
     * Generated from protobuf enum <code>DYNAMIC_HTML5_AD = 22;</code>
     */
    const DYNAMIC_HTML5_AD = 22;
    /**
     * The ad is an app engagement ad.
     *
     * Generated from protobuf enum <code>APP_ENGAGEMENT_AD = 23;</code>
     */
    const APP_ENGAGEMENT_AD = 23;
    /**
     * The ad is a Shopping Comparison Listing ad.
     *
     * Generated from protobuf enum <code>SHOPPING_COMPARISON_LISTING_AD = 24;</code>
     */
    const SHOPPING_COMPARISON_LISTING_AD = 24;
    /**
     * Video bumper ad.
     *
     * Generated from protobuf enum <code>VIDEO_BUMPER_AD = 25;</code>
     */
    const VIDEO_BUMPER_AD = 25;
    /**
     * Video non-skippable in-stream ad.
     *
     * Generated from protobuf enum <code>VIDEO_NON_SKIPPABLE_IN_STREAM_AD = 26;</code>
     */
    const VIDEO_NON_SKIPPABLE_IN_STREAM_AD = 26;
    /**
     * Video TrueView in-stream ad.
     *
     * Generated from protobuf enum <code>VIDEO_TRUEVIEW_IN_STREAM_AD = 29;</code>
     */
    const VIDEO_TRUEVIEW_IN_STREAM_AD = 29;
    /**
     * Video responsive ad.
     *
     * Generated from protobuf enum <code>VIDEO_RESPONSIVE_AD = 30;</code>
     */
    const VIDEO_RESPONSIVE_AD = 30;
    /**
     * Smart campaign ad.
     *
     * Generated from protobuf enum <code>SMART_CAMPAIGN_AD = 31;</code>
     */
    const SMART_CAMPAIGN_AD = 31;
    /**
     * Call ad.
     *
     * Generated from protobuf enum <code>CALL_AD = 32;</code>
     */
    const CALL_AD = 32;
    /**
     * Universal app pre-registration ad.
     *
     * Generated from protobuf enum <code>APP_PRE_REGISTRATION_AD = 33;</code>
     */
    const APP_PRE_REGISTRATION_AD = 33;
    /**
     * In-feed video ad.
     *
     * Generated from protobuf enum <code>IN_FEED_VIDEO_AD = 34;</code>
     */
    const IN_FEED_VIDEO_AD = 34;
    /**
     * Demand Gen multi asset ad.
     *
     * Generated from protobuf enum <code>DEMAND_GEN_MULTI_ASSET_AD = 40;</code>
     */
    const DEMAND_GEN_MULTI_ASSET_AD = 40;
    /**
     * Demand Gen carousel ad.
     *
     * Generated from protobuf enum <code>DEMAND_GEN_CAROUSEL_AD = 41;</code>
     */
    const DEMAND_GEN_CAROUSEL_AD = 41;
    /**
     * Travel ad.
     *
     * Generated from protobuf enum <code>TRAVEL_AD = 37;</code>
     */
    const TRAVEL_AD = 37;
    /**
     * Demand Gen video responsive ad.
     *
     * Generated from protobuf enum <code>DEMAND_GEN_VIDEO_RESPONSIVE_AD = 42;</code>
     */
    const DEMAND_GEN_VIDEO_RESPONSIVE_AD = 42;
    /**
     * Demand Gen product ad.
     *
     * Generated from protobuf enum <code>DEMAND_GEN_PRODUCT_AD = 39;</code>
     */
    const DEMAND_GEN_PRODUCT_AD = 39;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::TEXT_AD => 'TEXT_AD',
        self::EXPANDED_TEXT_AD => 'EXPANDED_TEXT_AD',
        self::EXPANDED_DYNAMIC_SEARCH_AD => 'EXPANDED_DYNAMIC_SEARCH_AD',
        self::HOTEL_AD => 'HOTEL_AD',
        self::SHOPPING_SMART_AD => 'SHOPPING_SMART_AD',
        self::SHOPPING_PRODUCT_AD => 'SHOPPING_PRODUCT_AD',
        self::VIDEO_AD => 'VIDEO_AD',
        self::IMAGE_AD => 'IMAGE_AD',
        self::RESPONSIVE_SEARCH_AD => 'RESPONSIVE_SEARCH_AD',
        self::LEGACY_RESPONSIVE_DISPLAY_AD => 'LEGACY_RESPONSIVE_DISPLAY_AD',
        self::APP_AD => 'APP_AD',
        self::LEGACY_APP_INSTALL_AD => 'LEGACY_APP_INSTALL_AD',
        self::RESPONSIVE_DISPLAY_AD => 'RESPONSIVE_DISPLAY_AD',
        self::LOCAL_AD => 'LOCAL_AD',
        self::HTML5_UPLOAD_AD => 'HTML5_UPLOAD_AD',
        self::DYNAMIC_HTML5_AD => 'DYNAMIC_HTML5_AD',
        self::APP_ENGAGEMENT_AD => 'APP_ENGAGEMENT_AD',
        self::SHOPPING_COMPARISON_LISTING_AD => 'SHOPPING_COMPARISON_LISTING_AD',
        self::VIDEO_BUMPER_AD => 'VIDEO_BUMPER_AD',
        self::VIDEO_NON_SKIPPABLE_IN_STREAM_AD => 'VIDEO_NON_SKIPPABLE_IN_STREAM_AD',
        self::VIDEO_TRUEVIEW_IN_STREAM_AD => 'VIDEO_TRUEVIEW_IN_STREAM_AD',
        self::VIDEO_RESPONSIVE_AD => 'VIDEO_RESPONSIVE_AD',
        self::SMART_CAMPAIGN_AD => 'SMART_CAMPAIGN_AD',
        self::CALL_AD => 'CALL_AD',
        self::APP_PRE_REGISTRATION_AD => 'APP_PRE_REGISTRATION_AD',
        self::IN_FEED_VIDEO_AD => 'IN_FEED_VIDEO_AD',
        self::DEMAND_GEN_MULTI_ASSET_AD => 'DEMAND_GEN_MULTI_ASSET_AD',
        self::DEMAND_GEN_CAROUSEL_AD => 'DEMAND_GEN_CAROUSEL_AD',
        self::TRAVEL_AD => 'TRAVEL_AD',
        self::DEMAND_GEN_VIDEO_RESPONSIVE_AD => 'DEMAND_GEN_VIDEO_RESPONSIVE_AD',
        self::DEMAND_GEN_PRODUCT_AD => 'DEMAND_GEN_PRODUCT_AD',
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
class_alias(AdType::class, \Google\Ads\GoogleAds\V19\Enums\AdTypeEnum_AdType::class);

