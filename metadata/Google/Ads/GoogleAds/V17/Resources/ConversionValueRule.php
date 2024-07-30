<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/resources/conversion_value_rule.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Resources;

class ConversionValueRule
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
Ggoogle/ads/googleads/v17/enums/value_rule_geo_location_match_type.protogoogle.ads.googleads.v17.enums"�
!ValueRuleGeoLocationMatchTypeEnum"`
ValueRuleGeoLocationMatchType
UNSPECIFIED 
UNKNOWN
ANY
LOCATION_OF_PRESENCEB�
"com.google.ads.googleads.v17.enumsB"ValueRuleGeoLocationMatchTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
;google/ads/googleads/v17/enums/value_rule_device_type.protogoogle.ads.googleads.v17.enums"s
ValueRuleDeviceTypeEnum"X
ValueRuleDeviceType
UNSPECIFIED 
UNKNOWN

MOBILE
DESKTOP

TABLETB�
"com.google.ads.googleads.v17.enumsBValueRuleDeviceTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
Agoogle/ads/googleads/v17/enums/conversion_value_rule_status.protogoogle.ads.googleads.v17.enums"�
ConversionValueRuleStatusEnum"_
ConversionValueRuleStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVED

PAUSEDB�
"com.google.ads.googleads.v17.enumsBConversionValueRuleStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
9google/ads/googleads/v17/enums/value_rule_operation.protogoogle.ads.googleads.v17.enums"l
ValueRuleOperationEnum"R
ValueRuleOperation
UNSPECIFIED 
UNKNOWN
ADD
MULTIPLY
SETB�
"com.google.ads.googleads.v17.enumsBValueRuleOperationProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
>google/ads/googleads/v17/resources/conversion_value_rule.proto"google.ads.googleads.v17.resources;google/ads/googleads/v17/enums/value_rule_device_type.protoGgoogle/ads/googleads/v17/enums/value_rule_geo_location_match_type.proto9google/ads/googleads/v17/enums/value_rule_operation.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
ConversionValueRuleK
resource_name (	B4�A�A.
,googleads.googleapis.com/ConversionValueRule
id (B�AW
action (2G.google.ads.googleads.v17.resources.ConversionValueRule.ValueRuleActionu
geo_location_condition (2U.google.ads.googleads.v17.resources.ConversionValueRule.ValueRuleGeoLocationConditionj
device_condition (2P.google.ads.googleads.v17.resources.ConversionValueRule.ValueRuleDeviceConditionn
audience_condition (2R.google.ads.googleads.v17.resources.ConversionValueRule.ValueRuleAudienceConditionA
owner_customer (	B)�A�A#
!googleads.googleapis.com/Customerg
status (2W.google.ads.googleads.v17.enums.ConversionValueRuleStatusEnum.ConversionValueRuleStatus~
ValueRuleAction\\
	operation (2I.google.ads.googleads.v17.enums.ValueRuleOperationEnum.ValueRuleOperation
value (�
ValueRuleGeoLocationConditionV
excluded_geo_target_constants (	B/�A,
*googleads.googleapis.com/GeoTargetConstant�
excluded_geo_match_type (2_.google.ads.googleads.v17.enums.ValueRuleGeoLocationMatchTypeEnum.ValueRuleGeoLocationMatchTypeM
geo_target_constants (	B/�A,
*googleads.googleapis.com/GeoTargetConstantw
geo_match_type (2_.google.ads.googleads.v17.enums.ValueRuleGeoLocationMatchTypeEnum.ValueRuleGeoLocationMatchType}
ValueRuleDeviceConditiona
device_types (2K.google.ads.googleads.v17.enums.ValueRuleDeviceTypeEnum.ValueRuleDeviceType�
ValueRuleAudienceCondition:

user_lists (	B&�A#
!googleads.googleapis.com/UserListB
user_interests (	B*�A\'
%googleads.googleapis.com/UserInterest:z�Aw
,googleads.googleapis.com/ConversionValueRuleGcustomers/{customer_id}/conversionValueRules/{conversion_value_rule_id}B�
&com.google.ads.googleads.v17.resourcesBConversionValueRuleProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v17/resources;resources�GAA�"Google.Ads.GoogleAds.V17.Resources�"Google\\Ads\\GoogleAds\\V17\\Resources�&Google::Ads::GoogleAds::V17::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

