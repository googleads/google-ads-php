<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/errors/ad_customizer_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Errors;

class AdCustomizerError
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
9google/ads/googleads/v10/errors/ad_customizer_error.protogoogle.ads.googleads.v10.errors"�
AdCustomizerErrorEnum"�
AdCustomizerError
UNSPECIFIED 
UNKNOWN!
COUNTDOWN_INVALID_DATE_FORMAT
COUNTDOWN_DATE_IN_PAST
COUNTDOWN_INVALID_LOCALE\'
#COUNTDOWN_INVALID_START_DAYS_BEFORE
UNKNOWN_USER_LISTB�
#com.google.ads.googleads.v10.errorsBAdCustomizerErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v10/errors;errors�GAA�Google.Ads.GoogleAds.V10.Errors�Google\\Ads\\GoogleAds\\V10\\Errors�#Google::Ads::GoogleAds::V10::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

