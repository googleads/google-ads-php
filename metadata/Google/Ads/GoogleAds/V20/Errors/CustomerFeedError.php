<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/customer_feed_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Errors;

class CustomerFeedError
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
9google/ads/googleads/v20/errors/customer_feed_error.protogoogle.ads.googleads.v20.errors"�
CustomerFeedErrorEnum"�
CustomerFeedError
UNSPECIFIED 
UNKNOWN,
(FEED_ALREADY_EXISTS_FOR_PLACEHOLDER_TYPE"
CANNOT_CREATE_FOR_REMOVED_FEED0
,CANNOT_CREATE_ALREADY_EXISTING_CUSTOMER_FEED\'
#CANNOT_MODIFY_REMOVED_CUSTOMER_FEED
INVALID_PLACEHOLDER_TYPE,
(MISSING_FEEDMAPPING_FOR_PLACEHOLDER_TYPE1
-PLACEHOLDER_TYPE_NOT_ALLOWED_ON_CUSTOMER_FEEDB�
#com.google.ads.googleads.v20.errorsBCustomerFeedErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v20/errors;errors�GAA�Google.Ads.GoogleAds.V20.Errors�Google\\Ads\\GoogleAds\\V20\\Errors�#Google::Ads::GoogleAds::V20::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

