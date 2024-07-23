<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/resources/ad_group_criterion_customizer.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Resources;

class AdGroupCriterionCustomizer
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
>google/ads/googleads/v17/enums/customizer_attribute_type.protogoogle.ads.googleads.v17.enums"�
CustomizerAttributeTypeEnum"e
CustomizerAttributeType
UNSPECIFIED 
UNKNOWN
TEXT

NUMBER	
PRICE
PERCENTB�
"com.google.ads.googleads.v17.enumsBCustomizerAttributeTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
<google/ads/googleads/v17/enums/customizer_value_status.protogoogle.ads.googleads.v17.enums"l
CustomizerValueStatusEnum"O
CustomizerValueStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v17.enumsBCustomizerValueStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
6google/ads/googleads/v17/common/customizer_value.protogoogle.ads.googleads.v17.commongoogle/api/field_behavior.proto"�
CustomizerValuef
type (2S.google.ads.googleads.v17.enums.CustomizerAttributeTypeEnum.CustomizerAttributeTypeB�A
string_value (	B�AB�
#com.google.ads.googleads.v17.commonBCustomizerValueProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/common;common�GAA�Google.Ads.GoogleAds.V17.Common�Google\\Ads\\GoogleAds\\V17\\Common�#Google::Ads::GoogleAds::V17::Commonbproto3
�	
Fgoogle/ads/googleads/v17/resources/ad_group_criterion_customizer.proto"google.ads.googleads.v17.resources<google/ads/googleads/v17/enums/customizer_value_status.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
AdGroupCriterionCustomizerR
resource_name (	B;�A�A5
3googleads.googleapis.com/AdGroupCriterionCustomizerR
ad_group_criterion (	B1�A�A+
)googleads.googleapis.com/AdGroupCriterionH �U
customizer_attribute (	B7�A�A�A.
,googleads.googleapis.com/CustomizerAttributed
status (2O.google.ads.googleads.v17.enums.CustomizerValueStatusEnum.CustomizerValueStatusB�AD
value (20.google.ads.googleads.v17.common.CustomizerValueB�A:��A�
3googleads.googleapis.com/AdGroupCriterionCustomizerjcustomers/{customer_id}/adGroupCriterionCustomizers/{ad_group_id}~{criterion_id}~{customizer_attribute_id}B
_ad_group_criterionB�
&com.google.ads.googleads.v17.resourcesBAdGroupCriterionCustomizerProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v17/resources;resources�GAA�"Google.Ads.GoogleAds.V17.Resources�"Google\\Ads\\GoogleAds\\V17\\Resources�&Google::Ads::GoogleAds::V17::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

