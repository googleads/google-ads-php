<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v7/errors/user_data_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V7\Errors;

class UserDataError
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
4google/ads/googleads/v7/errors/user_data_error.protogoogle.ads.googleads.v7.errors"�
UserDataErrorEnum"�
UserDataError
UNSPECIFIED 
UNKNOWN-
)OPERATIONS_FOR_CUSTOMER_MATCH_NOT_ALLOWED
TOO_MANY_USER_IDENTIFIERS
USER_LIST_NOT_APPLICABLEB�
"com.google.ads.googleads.v7.errorsBUserDataErrorProtoPZDgoogle.golang.org/genproto/googleapis/ads/googleads/v7/errors;errors�GAA�Google.Ads.GoogleAds.V7.Errors�Google\\Ads\\GoogleAds\\V7\\Errors�"Google::Ads::GoogleAds::V7::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

