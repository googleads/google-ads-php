<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/enums/audience_insights_dimension.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V18\Enums;

class AudienceInsightsDimension
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
@google/ads/googleads/v18/enums/audience_insights_dimension.protogoogle.ads.googleads.v18.enums"�
AudienceInsightsDimensionEnum"�
AudienceInsightsDimension
UNSPECIFIED 
UNKNOWN
CATEGORY
KNOWLEDGE_GRAPH
GEO_TARGET_COUNTRY
SUB_COUNTRY_LOCATION
YOUTUBE_CHANNEL
YOUTUBE_DYNAMIC_LINEUP
AFFINITY_USER_INTEREST
IN_MARKET_USER_INTEREST	
PARENTAL_STATUS

INCOME_RANGE
	AGE_RANGE

GENDERB�
"com.google.ads.googleads.v18.enumsBAudienceInsightsDimensionProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

