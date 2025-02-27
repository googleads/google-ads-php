<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/change_status.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class ChangeStatus
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
@google/ads/googleads/v19/enums/change_status_resource_type.protogoogle.ads.googleads.v19.enums"�
ChangeStatusResourceTypeEnum"�
ChangeStatusResourceType
UNSPECIFIED 
UNKNOWN
AD_GROUP
AD_GROUP_AD
AD_GROUP_CRITERION
CAMPAIGN
CAMPAIGN_CRITERION
FEED	
	FEED_ITEM

AD_GROUP_FEED
CAMPAIGN_FEED
AD_GROUP_BID_MODIFIER

SHARED_SET
CAMPAIGN_SHARED_SET	
ASSET
CUSTOMER_ASSET
CAMPAIGN_ASSET
AD_GROUP_ASSET
COMBINED_AUDIENCE
ASSET_GROUPB�
"com.google.ads.googleads.v19.enumsBChangeStatusResourceTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
<google/ads/googleads/v19/enums/change_status_operation.protogoogle.ads.googleads.v19.enums"w
ChangeStatusOperationEnum"Z
ChangeStatusOperation
UNSPECIFIED 
UNKNOWN	
ADDED
CHANGED
REMOVEDB�
"com.google.ads.googleads.v19.enumsBChangeStatusOperationProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
6google/ads/googleads/v19/resources/change_status.proto"google.ads.googleads.v19.resources@google/ads/googleads/v19/enums/change_status_resource_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
ChangeStatusD
resource_name (	B-�A�A\'
%googleads.googleapis.com/ChangeStatus\'
last_change_date_time (	B�AH �q
resource_type (2U.google.ads.googleads.v19.enums.ChangeStatusResourceTypeEnum.ChangeStatusResourceTypeB�A@
campaign (	B)�A�A#
!googleads.googleapis.com/CampaignH�?
ad_group (	B(�A�A"
 googleads.googleapis.com/AdGroupH�m
resource_status (2O.google.ads.googleads.v19.enums.ChangeStatusOperationEnum.ChangeStatusOperationB�AD
ad_group_ad (	B*�A�A$
"googleads.googleapis.com/AdGroupAdH�R
ad_group_criterion (	B1�A�A+
)googleads.googleapis.com/AdGroupCriterionH�S
campaign_criterion (	B2�A�A,
*googleads.googleapis.com/CampaignCriterionH�W
ad_group_bid_modifier  (	B3�A�A-
+googleads.googleapis.com/AdGroupBidModifierH�>

shared_set! (	B*�A�A$
"googleads.googleapis.com/SharedSetO
campaign_shared_set" (	B2�A�A,
*googleads.googleapis.com/CampaignSharedSet5
asset# (	B&�A�A 
googleads.googleapis.com/AssetF
customer_asset$ (	B.�A�A(
&googleads.googleapis.com/CustomerAssetF
campaign_asset% (	B.�A�A(
&googleads.googleapis.com/CampaignAssetE
ad_group_asset& (	B-�A�A\'
%googleads.googleapis.com/AdGroupAssetL
combined_audience( (	B1�A�A+
)googleads.googleapis.com/CombinedAudience@
asset_group) (	B+�A�A%
#googleads.googleapis.com/AssetGroup:c�A`
%googleads.googleapis.com/ChangeStatus7customers/{customer_id}/changeStatus/{change_status_id}B
_last_change_date_timeB
	_campaignB
	_ad_groupB
_ad_group_adB
_ad_group_criterionB
_campaign_criterionB
_ad_group_bid_modifierB�
&com.google.ads.googleads.v19.resourcesBChangeStatusProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

