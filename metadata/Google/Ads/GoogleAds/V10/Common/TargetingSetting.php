<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/common/targeting_setting.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Common;

class TargetingSetting
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
�
8google/ads/googleads/v10/enums/targeting_dimension.protogoogle.ads.googleads.v10.enums"�
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
"com.google.ads.googleads.v10.enumsBTargetingDimensionProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3
�
7google/ads/googleads/v10/common/targeting_setting.protogoogle.ads.googleads.v10.commongoogle/api/annotations.proto"�
TargetingSettingO
target_restrictions (22.google.ads.googleads.v10.common.TargetRestrictionb
target_restriction_operations (2;.google.ads.googleads.v10.common.TargetRestrictionOperation"�
TargetRestrictionf
targeting_dimension (2I.google.ads.googleads.v10.enums.TargetingDimensionEnum.TargetingDimension
bid_only (H �B
	_bid_only"�
TargetRestrictionOperationV
operator (2D.google.ads.googleads.v10.common.TargetRestrictionOperation.OperatorA
value (22.google.ads.googleads.v10.common.TargetRestriction"=
Operator
UNSPECIFIED 
UNKNOWN
ADD

REMOVEB�
#com.google.ads.googleads.v10.commonBTargetingSettingProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v10/common;common�GAA�Google.Ads.GoogleAds.V10.Common�Google\\Ads\\GoogleAds\\V10\\Common�#Google::Ads::GoogleAds::V10::Commonbproto3'
        , true);
        static::$is_initialized = true;
    }
}

