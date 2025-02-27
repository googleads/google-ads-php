<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/asset_group.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class AssetGroup
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
�
Fgoogle/ads/googleads/v19/enums/asset_group_primary_status_reason.protogoogle.ads.googleads.v19.enums"�
!AssetGroupPrimaryStatusReasonEnum"�
AssetGroupPrimaryStatusReason
UNSPECIFIED 
UNKNOWN
ASSET_GROUP_PAUSED
ASSET_GROUP_REMOVED
CAMPAIGN_REMOVED
CAMPAIGN_PAUSED
CAMPAIGN_PENDING
CAMPAIGN_ENDED
ASSET_GROUP_LIMITED
ASSET_GROUP_DISAPPROVED	
ASSET_GROUP_UNDER_REVIEW
B�
"com.google.ads.googleads.v19.enumsB"AssetGroupPrimaryStatusReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
?google/ads/googleads/v19/enums/asset_group_primary_status.protogoogle.ads.googleads.v19.enums"�
AssetGroupPrimaryStatusEnum"�
AssetGroupPrimaryStatus
UNSPECIFIED 
UNKNOWN
ELIGIBLE

PAUSED
REMOVED
NOT_ELIGIBLE
LIMITED
PENDINGB�
"com.google.ads.googleads.v19.enumsBAssetGroupPrimaryStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
0google/ads/googleads/v19/enums/ad_strength.protogoogle.ads.googleads.v19.enums"�
AdStrengthEnum"s

AdStrength
UNSPECIFIED 
UNKNOWN
PENDING

NO_ADS
POOR
AVERAGE
GOOD
	EXCELLENTB�
"com.google.ads.googleads.v19.enumsBAdStrengthProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
7google/ads/googleads/v19/enums/asset_group_status.protogoogle.ads.googleads.v19.enums"n
AssetGroupStatusEnum"V
AssetGroupStatus
UNSPECIFIED 
UNKNOWN
ENABLED

PAUSED
REMOVEDB�
"com.google.ads.googleads.v19.enumsBAssetGroupStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�

4google/ads/googleads/v19/resources/asset_group.proto"google.ads.googleads.v19.resources?google/ads/googleads/v19/enums/asset_group_primary_status.protoFgoogle/ads/googleads/v19/enums/asset_group_primary_status_reason.proto7google/ads/googleads/v19/enums/asset_group_status.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�

AssetGroupB
resource_name (	B+�A�A%
#googleads.googleapis.com/AssetGroup
id	 (B�A;
campaign (	B)�A�A#
!googleads.googleapis.com/Campaign
name (	B�A

final_urls (	
final_mobile_urls (	U
status (2E.google.ads.googleads.v19.enums.AssetGroupStatusEnum.AssetGroupStatusp
primary_status (2S.google.ads.googleads.v19.enums.AssetGroupPrimaryStatusEnum.AssetGroupPrimaryStatusB�A�
primary_status_reasons (2_.google.ads.googleads.v19.enums.AssetGroupPrimaryStatusReasonEnum.AssetGroupPrimaryStatusReasonB�A
path1 (	
path2 (	S
ad_strength
 (29.google.ads.googleads.v19.enums.AdStrengthEnum.AdStrengthB�A:^�A[
#googleads.googleapis.com/AssetGroup4customers/{customer_id}/assetGroups/{asset_group_id}B�
&com.google.ads.googleads.v19.resourcesBAssetGroupProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

