<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/click_view_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Errors;

class ClickViewError
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
6google/ads/googleads/v20/errors/click_view_error.protogoogle.ads.googleads.v20.errors"{
ClickViewErrorEnum"e
ClickViewError
UNSPECIFIED 
UNKNOWN#
EXPECTED_FILTER_ON_A_SINGLE_DAY
DATE_TOO_OLDB�
#com.google.ads.googleads.v20.errorsBClickViewErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v20/errors;errors�GAA�Google.Ads.GoogleAds.V20.Errors�Google\\Ads\\GoogleAds\\V20\\Errors�#Google::Ads::GoogleAds::V20::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

