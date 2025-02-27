<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/campaign_customizer.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class CampaignCustomizer
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
<google/ads/googleads/v19/enums/customizer_value_status.protogoogle.ads.googleads.v19.enums"l
CustomizerValueStatusEnum"O
CustomizerValueStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v19.enumsBCustomizerValueStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
>google/ads/googleads/v19/enums/customizer_attribute_type.protogoogle.ads.googleads.v19.enums"�
CustomizerAttributeTypeEnum"e
CustomizerAttributeType
UNSPECIFIED 
UNKNOWN
TEXT

NUMBER	
PRICE
PERCENTB�
"com.google.ads.googleads.v19.enumsBCustomizerAttributeTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
6google/ads/googleads/v19/common/customizer_value.protogoogle.ads.googleads.v19.commongoogle/api/field_behavior.proto"�
CustomizerValuef
type (2S.google.ads.googleads.v19.enums.CustomizerAttributeTypeEnum.CustomizerAttributeTypeB�A
string_value (	B�AB�
#com.google.ads.googleads.v19.commonBCustomizerValueProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/common;common�GAA�Google.Ads.GoogleAds.V19.Common�Google\\Ads\\GoogleAds\\V19\\Common�#Google::Ads::GoogleAds::V19::Commonbproto3
�
<google/ads/googleads/v19/resources/campaign_customizer.proto"google.ads.googleads.v19.resources<google/ads/googleads/v19/enums/customizer_value_status.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
CampaignCustomizerJ
resource_name (	B3�A�A-
+googleads.googleapis.com/CampaignCustomizer;
campaign (	B)�A�A#
!googleads.googleapis.com/CampaignU
customizer_attribute (	B7�A�A�A.
,googleads.googleapis.com/CustomizerAttributed
status (2O.google.ads.googleads.v19.enums.CustomizerValueStatusEnum.CustomizerValueStatusB�AD
value (20.google.ads.googleads.v19.common.CustomizerValueB�A:��A�
+googleads.googleapis.com/CampaignCustomizerScustomers/{customer_id}/campaignCustomizers/{campaign_id}~{customizer_attribute_id}B�
&com.google.ads.googleads.v19.resourcesBCampaignCustomizerProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

