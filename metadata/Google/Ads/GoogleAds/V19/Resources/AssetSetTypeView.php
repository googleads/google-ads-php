<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/asset_set_type_view.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class AssetSetTypeView
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
�
3google/ads/googleads/v19/enums/asset_set_type.protogoogle.ads.googleads.v19.enums"�
AssetSetTypeEnum"�
AssetSetType
UNSPECIFIED 
UNKNOWN
	PAGE_FEED
DYNAMIC_EDUCATION
MERCHANT_CENTER_FEED
DYNAMIC_REAL_ESTATE
DYNAMIC_CUSTOM
DYNAMIC_HOTELS_AND_RENTALS
DYNAMIC_FLIGHTS
DYNAMIC_TRAVEL	
DYNAMIC_LOCAL

DYNAMIC_JOBS
LOCATION_SYNC+
\'BUSINESS_PROFILE_DYNAMIC_LOCATION_GROUP 
CHAIN_DYNAMIC_LOCATION_GROUP
STATIC_LOCATION_GROUP
HOTEL_PROPERTY
TRAVEL_FEEDB�
"com.google.ads.googleads.v19.enumsBAssetSetTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
<google/ads/googleads/v19/resources/asset_set_type_view.proto"google.ads.googleads.v19.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
AssetSetTypeViewH
resource_name (	B1�A�A+
)googleads.googleapis.com/AssetSetTypeViewZ
asset_set_type (2=.google.ads.googleads.v19.enums.AssetSetTypeEnum.AssetSetTypeB�A:j�Ag
)googleads.googleapis.com/AssetSetTypeView:customers/{customer_id}/assetSetTypeViews/{asset_set_type}B�
&com.google.ads.googleads.v19.resourcesBAssetSetTypeViewProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

