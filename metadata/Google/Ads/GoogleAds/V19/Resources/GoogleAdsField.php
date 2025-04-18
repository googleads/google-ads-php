<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/google_ads_field.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class GoogleAdsField
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
�
?google/ads/googleads/v19/enums/google_ads_field_data_type.protogoogle.ads.googleads.v19.enums"�
GoogleAdsFieldDataTypeEnum"�
GoogleAdsFieldDataType
UNSPECIFIED 
UNKNOWN
BOOLEAN
DATE

DOUBLE
ENUM	
FLOAT	
INT32	
INT64
MESSAGE	
RESOURCE_NAME


STRING

UINT64B�
"com.google.ads.googleads.v19.enumsBGoogleAdsFieldDataTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
>google/ads/googleads/v19/enums/google_ads_field_category.protogoogle.ads.googleads.v19.enums"�
GoogleAdsFieldCategoryEnum"l
GoogleAdsFieldCategory
UNSPECIFIED 
UNKNOWN
RESOURCE
	ATTRIBUTE
SEGMENT

METRICB�
"com.google.ads.googleads.v19.enumsBGoogleAdsFieldCategoryProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�	
9google/ads/googleads/v19/resources/google_ads_field.proto"google.ads.googleads.v19.resources?google/ads/googleads/v19/enums/google_ads_field_data_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
GoogleAdsFieldF
resource_name (	B/�A�A)
\'googleads.googleapis.com/GoogleAdsField
name (	B�AH �h
category (2Q.google.ads.googleads.v19.enums.GoogleAdsFieldCategoryEnum.GoogleAdsFieldCategoryB�A

selectable (B�AH�

filterable (B�AH�
sortable (B�AH�
selectable_with (	B�A 
attribute_resources (	B�A
metrics (	B�A
segments (	B�A
enum_values (	B�Ai
	data_type (2Q.google.ads.googleads.v19.enums.GoogleAdsFieldDataTypeEnum.GoogleAdsFieldDataTypeB�A
type_url (	B�AH�
is_repeated (B�AH�:P�AM
\'googleads.googleapis.com/GoogleAdsField"googleAdsFields/{google_ads_field}B
_nameB
_selectableB
_filterableB
	_sortableB
	_type_urlB
_is_repeatedB�
&com.google.ads.googleads.v19.resourcesBGoogleAdsFieldProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

