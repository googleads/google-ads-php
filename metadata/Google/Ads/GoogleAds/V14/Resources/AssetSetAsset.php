<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v14/resources/asset_set_asset.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V14\Resources;

class AssetSetAsset
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
;google/ads/googleads/v14/enums/asset_set_asset_status.protogoogle.ads.googleads.v14.enums"h
AssetSetAssetStatusEnum"M
AssetSetAssetStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v14.enumsBAssetSetAssetStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
8google/ads/googleads/v14/resources/asset_set_asset.proto"google.ads.googleads.v14.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
AssetSetAssetE
resource_name (	B.�A�A(
&googleads.googleapis.com/AssetSetAsset<
	asset_set (	B)�A�A#
!googleads.googleapis.com/AssetSet5
asset (	B&�A�A 
googleads.googleapis.com/Asset`
status (2K.google.ads.googleads.v14.enums.AssetSetAssetStatusEnum.AssetSetAssetStatusB�A:m�Aj
&googleads.googleapis.com/AssetSetAsset@customers/{customer_id}/assetSetAssets/{asset_set_id}~{asset_id}B�
&com.google.ads.googleads.v14.resourcesBAssetSetAssetProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v14/resources;resources�GAA�"Google.Ads.GoogleAds.V14.Resources�"Google\\Ads\\GoogleAds\\V14\\Resources�&Google::Ads::GoogleAds::V14::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

