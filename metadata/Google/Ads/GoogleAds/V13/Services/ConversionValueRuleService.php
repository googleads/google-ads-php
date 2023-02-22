<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/services/conversion_value_rule_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V13\Services;

class ConversionValueRuleService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
Agoogle/ads/googleads/v13/enums/conversion_value_rule_status.protogoogle.ads.googleads.v13.enums"�
ConversionValueRuleStatusEnum"_
ConversionValueRuleStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVED

PAUSEDB�
"com.google.ads.googleads.v13.enumsBConversionValueRuleStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
:google/ads/googleads/v13/enums/response_content_type.protogoogle.ads.googleads.v13.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v13.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
;google/ads/googleads/v13/enums/value_rule_device_type.protogoogle.ads.googleads.v13.enums"s
ValueRuleDeviceTypeEnum"X
ValueRuleDeviceType
UNSPECIFIED 
UNKNOWN

MOBILE
DESKTOP

TABLETB�
"com.google.ads.googleads.v13.enumsBValueRuleDeviceTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
Ggoogle/ads/googleads/v13/enums/value_rule_geo_location_match_type.protogoogle.ads.googleads.v13.enums"�
!ValueRuleGeoLocationMatchTypeEnum"`
ValueRuleGeoLocationMatchType
UNSPECIFIED 
UNKNOWN
ANY
LOCATION_OF_PRESENCEB�
"com.google.ads.googleads.v13.enumsB"ValueRuleGeoLocationMatchTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
9google/ads/googleads/v13/enums/value_rule_operation.protogoogle.ads.googleads.v13.enums"l
ValueRuleOperationEnum"R
ValueRuleOperation
UNSPECIFIED 
UNKNOWN
ADD
MULTIPLY
SETB�
"com.google.ads.googleads.v13.enumsBValueRuleOperationProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
>google/ads/googleads/v13/resources/conversion_value_rule.proto"google.ads.googleads.v13.resources;google/ads/googleads/v13/enums/value_rule_device_type.protoGgoogle/ads/googleads/v13/enums/value_rule_geo_location_match_type.proto9google/ads/googleads/v13/enums/value_rule_operation.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
ConversionValueRuleK
resource_name (	B4�A�A.
,googleads.googleapis.com/ConversionValueRule
id (B�AW
action (2G.google.ads.googleads.v13.resources.ConversionValueRule.ValueRuleActionu
geo_location_condition (2U.google.ads.googleads.v13.resources.ConversionValueRule.ValueRuleGeoLocationConditionj
device_condition (2P.google.ads.googleads.v13.resources.ConversionValueRule.ValueRuleDeviceConditionn
audience_condition (2R.google.ads.googleads.v13.resources.ConversionValueRule.ValueRuleAudienceConditionA
owner_customer (	B)�A�A#
!googleads.googleapis.com/Customerg
status (2W.google.ads.googleads.v13.enums.ConversionValueRuleStatusEnum.ConversionValueRuleStatus~
ValueRuleAction\\
	operation (2I.google.ads.googleads.v13.enums.ValueRuleOperationEnum.ValueRuleOperation
value (�
ValueRuleGeoLocationConditionV
excluded_geo_target_constants (	B/�A,
*googleads.googleapis.com/GeoTargetConstant�
excluded_geo_match_type (2_.google.ads.googleads.v13.enums.ValueRuleGeoLocationMatchTypeEnum.ValueRuleGeoLocationMatchTypeM
geo_target_constants (	B/�A,
*googleads.googleapis.com/GeoTargetConstantw
geo_match_type (2_.google.ads.googleads.v13.enums.ValueRuleGeoLocationMatchTypeEnum.ValueRuleGeoLocationMatchType}
ValueRuleDeviceConditiona
device_types (2K.google.ads.googleads.v13.enums.ValueRuleDeviceTypeEnum.ValueRuleDeviceType�
ValueRuleAudienceCondition:

user_lists (	B&�A#
!googleads.googleapis.com/UserListB
user_interests (	B*�A\'
%googleads.googleapis.com/UserInterest:z�Aw
,googleads.googleapis.com/ConversionValueRuleGcustomers/{customer_id}/conversionValueRules/{conversion_value_rule_id}B�
&com.google.ads.googleads.v13.resourcesBConversionValueRuleProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v13/resources;resources�GAA�"Google.Ads.GoogleAds.V13.Resources�"Google\\Ads\\GoogleAds\\V13\\Resources�&Google::Ads::GoogleAds::V13::Resourcesbproto3
�
Egoogle/ads/googleads/v13/services/conversion_value_rule_service.proto!google.ads.googleads.v13.services>google/ads/googleads/v13/resources/conversion_value_rule.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
!MutateConversionValueRulesRequest
customer_id (	B�AX

operations (2?.google.ads.googleads.v13.services.ConversionValueRuleOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v13.enums.ResponseContentTypeEnum.ResponseContentType"�
ConversionValueRuleOperation/
update_mask (2.google.protobuf.FieldMaskI
create (27.google.ads.googleads.v13.resources.ConversionValueRuleH I
update (27.google.ads.googleads.v13.resources.ConversionValueRuleH C
remove (	B1�A.
,googleads.googleapis.com/ConversionValueRuleH B
	operation"�
"MutateConversionValueRulesResponseS
results (2B.google.ads.googleads.v13.services.MutateConversionValueRuleResult1
partial_failure_error (2.google.rpc.Status"�
MutateConversionValueRuleResultH
resource_name (	B1�A.
,googleads.googleapis.com/ConversionValueRuleV
conversion_value_rule (27.google.ads.googleads.v13.resources.ConversionValueRule2�
ConversionValueRuleService�
MutateConversionValueRulesD.google.ads.googleads.v13.services.MutateConversionValueRulesRequestE.google.ads.googleads.v13.services.MutateConversionValueRulesResponse"^���?":/v13/customers/{customer_id=*}/conversionValueRules:mutate:*�Acustomer_id,operationsE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v13.servicesBConversionValueRuleServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v13/services;services�GAA�!Google.Ads.GoogleAds.V13.Services�!Google\\Ads\\GoogleAds\\V13\\Services�%Google::Ads::GoogleAds::V13::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

