<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/search_term_match_type.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Enums;

class SearchTermMatchType
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
;google/ads/googleads/v19/enums/search_term_match_type.protogoogle.ads.googleads.v19.enums"�
SearchTermMatchTypeEnum"v
SearchTermMatchType
UNSPECIFIED 
UNKNOWN	
BROAD	
EXACT

PHRASE

NEAR_EXACT
NEAR_PHRASEB�
"com.google.ads.googleads.v19.enumsBSearchTermMatchTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

