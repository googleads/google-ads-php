<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/enums/user_list_size_range.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Enums;

class UserListSizeRange
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
�
9google/ads/googleads/v10/enums/user_list_size_range.protogoogle.ads.googleads.v10.enums"�
UserListSizeRangeEnum"�
UserListSizeRange
UNSPECIFIED 
UNKNOWN
LESS_THAN_FIVE_HUNDRED
LESS_THAN_ONE_THOUSAND 
ONE_THOUSAND_TO_TEN_THOUSAND"
TEN_THOUSAND_TO_FIFTY_THOUSAND*
&FIFTY_THOUSAND_TO_ONE_HUNDRED_THOUSAND2
.ONE_HUNDRED_THOUSAND_TO_THREE_HUNDRED_THOUSAND3
/THREE_HUNDRED_THOUSAND_TO_FIVE_HUNDRED_THOUSAND(
$FIVE_HUNDRED_THOUSAND_TO_ONE_MILLION	
ONE_MILLION_TO_TWO_MILLION
 
TWO_MILLION_TO_THREE_MILLION!
THREE_MILLION_TO_FIVE_MILLION
FIVE_MILLION_TO_TEN_MILLION!
TEN_MILLION_TO_TWENTY_MILLION$
 TWENTY_MILLION_TO_THIRTY_MILLION#
THIRTY_MILLION_TO_FIFTY_MILLION
OVER_FIFTY_MILLIONB�
"com.google.ads.googleads.v10.enumsBUserListSizeRangeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

