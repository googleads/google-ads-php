<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/ad_group_asset_set.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class AdGroupAssetSet
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
:google/ads/googleads/v19/enums/asset_set_link_status.protogoogle.ads.googleads.v19.enums"f
AssetSetLinkStatusEnum"L
AssetSetLinkStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v19.enumsBAssetSetLinkStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
;google/ads/googleads/v19/resources/ad_group_asset_set.proto"google.ads.googleads.v19.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
AdGroupAssetSetG
resource_name (	B0�A�A*
(googleads.googleapis.com/AdGroupAssetSet:
ad_group (	B(�A�A"
 googleads.googleapis.com/AdGroup<
	asset_set (	B)�A�A#
!googleads.googleapis.com/AssetSet^
status (2I.google.ads.googleads.v19.enums.AssetSetLinkStatusEnum.AssetSetLinkStatusB�A:t�Aq
(googleads.googleapis.com/AdGroupAssetSetEcustomers/{customer_id}/adGroupAssetSets/{ad_group_id}~{asset_set_id}B�
&com.google.ads.googleads.v19.resourcesBAdGroupAssetSetProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

