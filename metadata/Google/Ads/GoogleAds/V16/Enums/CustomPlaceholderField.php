<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/enums/custom_placeholder_field.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Enums;

class CustomPlaceholderField
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
=google/ads/googleads/v16/enums/custom_placeholder_field.protogoogle.ads.googleads.v16.enums"�
CustomPlaceholderFieldEnum"�
CustomPlaceholderField
UNSPECIFIED 
UNKNOWN
ID
ID2

ITEM_TITLE
ITEM_SUBTITLE
ITEM_DESCRIPTION
ITEM_ADDRESS	
PRICE
FORMATTED_PRICE	

SALE_PRICE

FORMATTED_SALE_PRICE
	IMAGE_URL
ITEM_CATEGORY

FINAL_URLS
FINAL_MOBILE_URLS
TRACKING_URL
CONTEXTUAL_KEYWORDS
ANDROID_APP_LINK
SIMILAR_IDS
IOS_APP_LINK
IOS_APP_STORE_IDB�
"com.google.ads.googleads.v16.enumsBCustomPlaceholderFieldProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

