<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/common/feed_common.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Common;

class FeedCommon
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
�
1google/ads/googleads/v10/common/feed_common.protogoogle.ads.googleads.v10.common"c
Money
currency_code (	H �
amount_micros (H�B
_currency_codeB
_amount_microsB�
#com.google.ads.googleads.v10.commonBFeedCommonProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v10/common;common�GAA�Google.Ads.GoogleAds.V10.Common�Google\\Ads\\GoogleAds\\V10\\Common�#Google::Ads::GoogleAds::V10::Commonbproto3'
        , true);
        static::$is_initialized = true;
    }
}

