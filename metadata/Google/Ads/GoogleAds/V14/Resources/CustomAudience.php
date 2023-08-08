<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v14/resources/custom_audience.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V14\Resources;

class CustomAudience
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
@google/ads/googleads/v14/enums/custom_audience_member_type.protogoogle.ads.googleads.v14.enums"�
CustomAudienceMemberTypeEnum"k
CustomAudienceMemberType
UNSPECIFIED 
UNKNOWN
KEYWORD
URL
PLACE_CATEGORY
APPB�
"com.google.ads.googleads.v14.enumsBCustomAudienceMemberTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
9google/ads/googleads/v14/enums/custom_audience_type.protogoogle.ads.googleads.v14.enums"�
CustomAudienceTypeEnum"k
CustomAudienceType
UNSPECIFIED 
UNKNOWN
AUTO
INTEREST
PURCHASE_INTENT

SEARCHB�
"com.google.ads.googleads.v14.enumsBCustomAudienceTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
;google/ads/googleads/v14/enums/custom_audience_status.protogoogle.ads.googleads.v14.enums"j
CustomAudienceStatusEnum"N
CustomAudienceStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v14.enumsBCustomAudienceStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�	
8google/ads/googleads/v14/resources/custom_audience.proto"google.ads.googleads.v14.resources;google/ads/googleads/v14/enums/custom_audience_status.proto9google/ads/googleads/v14/enums/custom_audience_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
CustomAudienceF
resource_name (	B/�A�A)
\'googleads.googleapis.com/CustomAudience
id (B�Ab
status (2M.google.ads.googleads.v14.enums.CustomAudienceStatusEnum.CustomAudienceStatusB�A
name (	W
type (2I.google.ads.googleads.v14.enums.CustomAudienceTypeEnum.CustomAudienceType
description (	I
members (28.google.ads.googleads.v14.resources.CustomAudienceMember:j�Ag
\'googleads.googleapis.com/CustomAudience<customers/{customer_id}/customAudiences/{custom_audience_id}"�
CustomAudienceMemberj
member_type (2U.google.ads.googleads.v14.enums.CustomAudienceMemberTypeEnum.CustomAudienceMemberType
keyword (	H 
url (	H 
place_category (H 
app (	H B
valueB�
&com.google.ads.googleads.v14.resourcesBCustomAudienceProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v14/resources;resources�GAA�"Google.Ads.GoogleAds.V14.Resources�"Google\\Ads\\GoogleAds\\V14\\Resources�&Google::Ads::GoogleAds::V14::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

