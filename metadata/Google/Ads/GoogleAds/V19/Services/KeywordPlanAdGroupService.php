<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/keyword_plan_ad_group_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class KeywordPlanAdGroupService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
>google/ads/googleads/v19/resources/keyword_plan_ad_group.proto"google.ads.googleads.v19.resourcesgoogle/api/resource.proto"�
KeywordPlanAdGroupJ
resource_name (	B3�A�A-
+googleads.googleapis.com/KeywordPlanAdGroupU
keyword_plan_campaign (	B1�A.
,googleads.googleapis.com/KeywordPlanCampaignH �
id (B�AH�
name (	H�
cpc_bid_micros	 (H�:x�Au
+googleads.googleapis.com/KeywordPlanAdGroupFcustomers/{customer_id}/keywordPlanAdGroups/{keyword_plan_ad_group_id}B
_keyword_plan_campaignB
_idB
_nameB
_cpc_bid_microsB�
&com.google.ads.googleads.v19.resourcesBKeywordPlanAdGroupProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
Egoogle/ads/googleads/v19/services/keyword_plan_ad_group_service.proto!google.ads.googleads.v19.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
 MutateKeywordPlanAdGroupsRequest
customer_id (	B�AW

operations (2>.google.ads.googleads.v19.services.KeywordPlanAdGroupOperationB�A
partial_failure (
validate_only ("�
KeywordPlanAdGroupOperation/
update_mask (2.google.protobuf.FieldMaskH
create (26.google.ads.googleads.v19.resources.KeywordPlanAdGroupH H
update (26.google.ads.googleads.v19.resources.KeywordPlanAdGroupH B
remove (	B0�A-
+googleads.googleapis.com/KeywordPlanAdGroupH B
	operation"�
!MutateKeywordPlanAdGroupsResponse1
partial_failure_error (2.google.rpc.StatusR
results (2A.google.ads.googleads.v19.services.MutateKeywordPlanAdGroupResult"i
MutateKeywordPlanAdGroupResultG
resource_name (	B0�A-
+googleads.googleapis.com/KeywordPlanAdGroup2�
KeywordPlanAdGroupService�
MutateKeywordPlanAdGroupsC.google.ads.googleads.v19.services.MutateKeywordPlanAdGroupsRequestD.google.ads.googleads.v19.services.MutateKeywordPlanAdGroupsResponse"]�Acustomer_id,operations���>"9/v19/customers/{customer_id=*}/keywordPlanAdGroups:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesBKeywordPlanAdGroupServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

