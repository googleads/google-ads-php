<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/external_conversion_source.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Enums;

class ExternalConversionSource
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
?google/ads/googleads/v20/enums/external_conversion_source.protogoogle.ads.googleads.v20.enums"�
ExternalConversionSourceEnum"�
ExternalConversionSource
UNSPECIFIED 
UNKNOWN
WEBPAGE
	ANALYTICS

UPLOAD
AD_CALL_METRICS
WEBSITE_CALL_METRICS
STORE_VISITS
ANDROID_IN_APP

IOS_IN_APP	
IOS_FIRST_OPEN

APP_UNSPECIFIED
ANDROID_FIRST_OPEN
UPLOAD_CALLS
FIREBASE
CLICK_TO_CALL

SALESFORCE
STORE_SALES_CRM
STORE_SALES_PAYMENT_NETWORK
GOOGLE_PLAY
THIRD_PARTY_APP_ANALYTICS
GOOGLE_ATTRIBUTION
STORE_SALES_DIRECT_UPLOAD
STORE_SALES
SEARCH_ADS_360
GOOGLE_HOSTED

FLOODLIGHT
ANALYTICS_SEARCH_ADS_360
FIREBASE_SEARCH_ADS_360!$
 DISPLAY_AND_VIDEO_360_FLOODLIGHT"B�
"com.google.ads.googleads.v20.enumsBExternalConversionSourceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

