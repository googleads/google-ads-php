<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/enums/affiliate_location_placeholder_field.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Enums;

class AffiliateLocationPlaceholderField
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
�
Igoogle/ads/googleads/v10/enums/affiliate_location_placeholder_field.protogoogle.ads.googleads.v10.enums"�
%AffiliateLocationPlaceholderFieldEnum"�
!AffiliateLocationPlaceholderField
UNSPECIFIED 
UNKNOWN
BUSINESS_NAME
ADDRESS_LINE_1
ADDRESS_LINE_2
CITY
PROVINCE
POSTAL_CODE
COUNTRY_CODE
PHONE_NUMBER	
LANGUAGE_CODE

CHAIN_ID

CHAIN_NAMEB�
"com.google.ads.googleads.v10.enumsB&AffiliateLocationPlaceholderFieldProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

