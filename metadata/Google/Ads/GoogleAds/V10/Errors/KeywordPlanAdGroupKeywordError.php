<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/errors/keyword_plan_ad_group_keyword_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Errors;

class KeywordPlanAdGroupKeywordError
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
Igoogle/ads/googleads/v10/errors/keyword_plan_ad_group_keyword_error.protogoogle.ads.googleads.v10.errors"�
"KeywordPlanAdGroupKeywordErrorEnum"�
KeywordPlanAdGroupKeywordError
UNSPECIFIED 
UNKNOWN
INVALID_KEYWORD_MATCH_TYPE
DUPLICATE_KEYWORD
KEYWORD_TEXT_TOO_LONG
KEYWORD_HAS_INVALID_CHARS
KEYWORD_HAS_TOO_MANY_WORDS
INVALID_KEYWORD_TEXT 
NEGATIVE_KEYWORD_HAS_CPC_BID 
NEW_BMM_KEYWORDS_NOT_ALLOWED	B�
#com.google.ads.googleads.v10.errorsB#KeywordPlanAdGroupKeywordErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v10/errors;errors�GAA�Google.Ads.GoogleAds.V10.Errors�Google\\Ads\\GoogleAds\\V10\\Errors�#Google::Ads::GoogleAds::V10::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

