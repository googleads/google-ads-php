<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/asset_group_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class AssetGroupService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
5google/ads/googleads/v19/enums/asset_field_type.protogoogle.ads.googleads.v19.enums"�
AssetFieldTypeEnum"�
AssetFieldType
UNSPECIFIED 
UNKNOWN
HEADLINE
DESCRIPTION
MANDATORY_AD_TEXT
MARKETING_IMAGE
MEDIA_BUNDLE
YOUTUBE_VIDEO
BOOK_ON_GOOGLE
	LEAD_FORM	
	PROMOTION

CALLOUT
STRUCTURED_SNIPPET
SITELINK

MOBILE_APP
HOTEL_CALLOUT
CALL	
PRICE
LONG_HEADLINE
BUSINESS_NAME
SQUARE_MARKETING_IMAGE
PORTRAIT_MARKETING_IMAGE
LOGO
LANDSCAPE_LOGO	
VIDEO
CALL_TO_ACTION_SELECTION
AD_IMAGE
BUSINESS_LOGO
HOTEL_PROPERTY
DEMAND_GEN_CAROUSEL_CARD
BUSINESS_MESSAGE!
TALL_PORTRAIT_MARKETING_IMAGE B�
"com.google.ads.googleads.v19.enumsBAssetFieldTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
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
Rgoogle/ads/googleads/v19/enums/asset_coverage_video_aspect_ratio_requirement.protogoogle.ads.googleads.v19.enums"�
,AssetCoverageVideoAspectRatioRequirementEnum"r
(AssetCoverageVideoAspectRatioRequirement
UNSPECIFIED 
UNKNOWN

HORIZONTAL

SQUARE
VERTICALB�
"com.google.ads.googleads.v19.enumsB-AssetCoverageVideoAspectRatioRequirementProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
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
�
Agoogle/ads/googleads/v19/enums/ad_strength_action_item_type.protogoogle.ads.googleads.v19.enums"g
AdStrengthActionItemTypeEnum"G
AdStrengthActionItemType
UNSPECIFIED 
UNKNOWN
	ADD_ASSETB�
"com.google.ads.googleads.v19.enumsBAdStrengthActionItemTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
4google/ads/googleads/v19/resources/asset_group.proto"google.ads.googleads.v19.resourcesAgoogle/ads/googleads/v19/enums/ad_strength_action_item_type.protoRgoogle/ads/googleads/v19/enums/asset_coverage_video_aspect_ratio_requirement.proto5google/ads/googleads/v19/enums/asset_field_type.proto?google/ads/googleads/v19/enums/asset_group_primary_status.protoFgoogle/ads/googleads/v19/enums/asset_group_primary_status_reason.proto7google/ads/googleads/v19/enums/asset_group_status.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�

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
 (29.google.ads.googleads.v19.enums.AdStrengthEnum.AdStrengthB�AN
asset_coverage (21.google.ads.googleads.v19.resources.AssetCoverageB�A:w�At
#googleads.googleapis.com/AssetGroup4customers/{customer_id}/assetGroups/{asset_group_id}*assetGroups2
assetGroup"p
AssetCoverage_
ad_strength_action_items (28.google.ads.googleads.v19.resources.AdStrengthActionItemB�A"�
AdStrengthActionItemt
action_item_type (2U.google.ads.googleads.v19.enums.AdStrengthActionItemTypeEnum.AdStrengthActionItemTypeB�Aj
add_asset_details (2H.google.ads.googleads.v19.resources.AdStrengthActionItem.AddAssetDetailsB�AH �
AddAssetDetails`
asset_field_type (2A.google.ads.googleads.v19.enums.AssetFieldTypeEnum.AssetFieldTypeB�A
asset_count (B�AH ��
video_aspect_ratio_requirement (2u.google.ads.googleads.v19.enums.AssetCoverageVideoAspectRatioRequirementEnum.AssetCoverageVideoAspectRatioRequirementB�AH�B
_asset_countB!
_video_aspect_ratio_requirementB
action_detailsB�
&com.google.ads.googleads.v19.resourcesBAssetGroupProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
;google/ads/googleads/v19/services/asset_group_service.proto!google.ads.googleads.v19.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
MutateAssetGroupsRequest
customer_id (	B�AO

operations (26.google.ads.googleads.v19.services.AssetGroupOperationB�A
validate_only ("�
AssetGroupOperation/
update_mask (2.google.protobuf.FieldMask@
create (2..google.ads.googleads.v19.resources.AssetGroupH @
update (2..google.ads.googleads.v19.resources.AssetGroupH :
remove (	B(�A%
#googleads.googleapis.com/AssetGroupH B
	operation"�
MutateAssetGroupsResponseJ
results (29.google.ads.googleads.v19.services.MutateAssetGroupResult1
partial_failure_error (2.google.rpc.Status"Y
MutateAssetGroupResult?
resource_name (	B(�A%
#googleads.googleapis.com/AssetGroup2�
AssetGroupService�
MutateAssetGroups;.google.ads.googleads.v19.services.MutateAssetGroupsRequest<.google.ads.googleads.v19.services.MutateAssetGroupsResponse"U�Acustomer_id,operations���6"1/v19/customers/{customer_id=*}/assetGroups:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesBAssetGroupServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

