<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/enums/call_to_action_type.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Enums;

class CallToActionType
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
8google/ads/googleads/v10/enums/call_to_action_type.protogoogle.ads.googleads.v10.enums"�
CallToActionTypeEnum"�
CallToActionType
UNSPECIFIED 
UNKNOWN

LEARN_MORE
	GET_QUOTE
	APPLY_NOW
SIGN_UP

CONTACT_US
	SUBSCRIBE
DOWNLOAD
BOOK_NOW	
SHOP_NOW
B�
"com.google.ads.googleads.v10.enumsBCallToActionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

