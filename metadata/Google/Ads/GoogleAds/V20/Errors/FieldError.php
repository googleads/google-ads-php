<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/field_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Errors;

class FieldError
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
1google/ads/googleads/v20/errors/field_error.protogoogle.ads.googleads.v20.errors"�
FieldErrorEnum"�

FieldError
UNSPECIFIED 
UNKNOWN
REQUIRED
IMMUTABLE_FIELD
INVALID_VALUE
VALUE_MUST_BE_UNSET
REQUIRED_NONEMPTY_LIST
FIELD_CANNOT_BE_CLEARED
BLOCKED_VALUE	
FIELD_CAN_ONLY_BE_CLEARED
B�
#com.google.ads.googleads.v20.errorsBFieldErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v20/errors;errors�GAA�Google.Ads.GoogleAds.V20.Errors�Google\\Ads\\GoogleAds\\V20\\Errors�#Google::Ads::GoogleAds::V20::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

