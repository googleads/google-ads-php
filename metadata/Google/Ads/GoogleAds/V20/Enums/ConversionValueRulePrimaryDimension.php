<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/conversion_value_rule_primary_dimension.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Enums;

class ConversionValueRulePrimaryDimension
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
Lgoogle/ads/googleads/v20/enums/conversion_value_rule_primary_dimension.protogoogle.ads.googleads.v20.enums"�
\'ConversionValueRulePrimaryDimensionEnum"�
#ConversionValueRulePrimaryDimension
UNSPECIFIED 
UNKNOWN
NO_RULE_APPLIED
ORIGINAL
NEW_VS_RETURNING_USER
GEO_LOCATION

DEVICE
AUDIENCE
MULTIPLE
	ITINERARY	B�
"com.google.ads.googleads.v20.enumsB(ConversionValueRulePrimaryDimensionProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

