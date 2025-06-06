<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/performance_max_placement_view.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Resources;

class PerformanceMaxPlacementView
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
3google/ads/googleads/v20/enums/placement_type.protogoogle.ads.googleads.v20.enums"�
PlacementTypeEnum"�
PlacementType
UNSPECIFIED 
UNKNOWN
WEBSITE
MOBILE_APP_CATEGORY
MOBILE_APPLICATION
YOUTUBE_VIDEO
YOUTUBE_CHANNEL
GOOGLE_PRODUCTSB�
"com.google.ads.googleads.v20.enumsBPlacementTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
Ggoogle/ads/googleads/v20/resources/performance_max_placement_view.proto"google.ads.googleads.v20.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
PerformanceMaxPlacementViewS
resource_name (	B<�A�A6
4googleads.googleapis.com/PerformanceMaxPlacementView
	placement (	B�AH �
display_name (	B�AH�

target_url (	B�AH�\\
placement_type (2?.google.ads.googleads.v20.enums.PlacementTypeEnum.PlacementTypeB�A:��A�
4googleads.googleapis.com/PerformanceMaxPlacementViewHcustomers/{customer_id}/performanceMaxPlacementViews/{base_64_placement}*performanceMaxPlacementViews2performanceMaxPlacementViewB

_placementB
_display_nameB
_target_urlB�
&com.google.ads.googleads.v20.resourcesB PerformanceMaxPlacementViewProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v20/resources;resources�GAA�"Google.Ads.GoogleAds.V20.Resources�"Google\\Ads\\GoogleAds\\V20\\Resources�&Google::Ads::GoogleAds::V20::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

