<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/enums/targeting_dimension.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Enums;

class TargetingDimension
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
8google/ads/googleads/v16/enums/targeting_dimension.protogoogle.ads.googleads.v16.enums"�
TargetingDimensionEnum"�
TargetingDimension
UNSPECIFIED 
UNKNOWN
KEYWORD
AUDIENCE	
TOPIC

GENDER
	AGE_RANGE
	PLACEMENT
PARENTAL_STATUS
INCOME_RANGE	B�
"com.google.ads.googleads.v16.enumsBTargetingDimensionProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

