<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/account_link_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Errors;

class AccountLinkError
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
8google/ads/googleads/v19/errors/account_link_error.protogoogle.ads.googleads.v19.errors"s
AccountLinkErrorEnum"[
AccountLinkError
UNSPECIFIED 
UNKNOWN
INVALID_STATUS
PERMISSION_DENIEDB�
#com.google.ads.googleads.v19.errorsBAccountLinkErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/errors;errors�GAA�Google.Ads.GoogleAds.V19.Errors�Google\\Ads\\GoogleAds\\V19\\Errors�#Google::Ads::GoogleAds::V19::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

