<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/resources/geographic_view.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Resources;

class GeographicView
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
7google/ads/googleads/v16/enums/geo_targeting_type.protogoogle.ads.googleads.v16.enums"x
GeoTargetingTypeEnum"`
GeoTargetingType
UNSPECIFIED 
UNKNOWN
AREA_OF_INTEREST
LOCATION_OF_PRESENCEB�
"com.google.ads.googleads.v16.enumsBGeoTargetingTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
8google/ads/googleads/v16/resources/geographic_view.proto"google.ads.googleads.v16.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
GeographicViewF
resource_name (	B/�A�A)
\'googleads.googleapis.com/GeographicViewa
location_type (2E.google.ads.googleads.v16.enums.GeoTargetingTypeEnum.GeoTargetingTypeB�A&
country_criterion_id (B�AH �:|�Ay
\'googleads.googleapis.com/GeographicViewNcustomers/{customer_id}/geographicViews/{country_criterion_id}~{location_type}B
_country_criterion_idB�
&com.google.ads.googleads.v16.resourcesBGeographicViewProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v16/resources;resources�GAA�"Google.Ads.GoogleAds.V16.Resources�"Google\\Ads\\GoogleAds\\V16\\Resources�&Google::Ads::GoogleAds::V16::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

