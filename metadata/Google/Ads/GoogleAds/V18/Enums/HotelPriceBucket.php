<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/enums/hotel_price_bucket.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V18\Enums;

class HotelPriceBucket
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
7google/ads/googleads/v18/enums/hotel_price_bucket.protogoogle.ads.googleads.v18.enums"�
HotelPriceBucketEnum"|
HotelPriceBucket
UNSPECIFIED 
UNKNOWN
LOWEST_UNIQUE
LOWEST_TIED

NOT_LOWEST
ONLY_PARTNER_SHOWNB�
"com.google.ads.googleads.v18.enumsBHotelPriceBucketProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

