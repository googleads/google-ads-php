<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/services/keyword_plan_campaign_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Services;

class KeywordPlanCampaignService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
9google/ads/googleads/v16/enums/keyword_plan_network.protogoogle.ads.googleads.v16.enums"
KeywordPlanNetworkEnum"e
KeywordPlanNetwork
UNSPECIFIED 
UNKNOWN
GOOGLE_SEARCH
GOOGLE_SEARCH_AND_PARTNERSB�
"com.google.ads.googleads.v16.enumsBKeywordPlanNetworkProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�	
>google/ads/googleads/v16/resources/keyword_plan_campaign.proto"google.ads.googleads.v16.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
KeywordPlanCampaignK
resource_name (	B4�A�A.
,googleads.googleapis.com/KeywordPlanCampaignD
keyword_plan	 (	B)�A&
$googleads.googleapis.com/KeywordPlanH �
id
 (B�AH�
name (	H�J
language_constants (	B.�A+
)googleads.googleapis.com/LanguageConstantg
keyword_plan_network (2I.google.ads.googleads.v16.enums.KeywordPlanNetworkEnum.KeywordPlanNetwork
cpc_bid_micros (H�M
geo_targets (28.google.ads.googleads.v16.resources.KeywordPlanGeoTarget:z�Aw
,googleads.googleapis.com/KeywordPlanCampaignGcustomers/{customer_id}/keywordPlanCampaigns/{keyword_plan_campaign_id}B
_keyword_planB
_idB
_nameB
_cpc_bid_micros"�
KeywordPlanGeoTargetQ
geo_target_constant (	B/�A,
*googleads.googleapis.com/GeoTargetConstantH �B
_geo_target_constantB�
&com.google.ads.googleads.v16.resourcesBKeywordPlanCampaignProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v16/resources;resources�GAA�"Google.Ads.GoogleAds.V16.Resources�"Google\\Ads\\GoogleAds\\V16\\Resources�&Google::Ads::GoogleAds::V16::Resourcesbproto3
�
Egoogle/ads/googleads/v16/services/keyword_plan_campaign_service.proto!google.ads.googleads.v16.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
!MutateKeywordPlanCampaignsRequest
customer_id (	B�AX

operations (2?.google.ads.googleads.v16.services.KeywordPlanCampaignOperationB�A
partial_failure (
validate_only ("�
KeywordPlanCampaignOperation/
update_mask (2.google.protobuf.FieldMaskI
create (27.google.ads.googleads.v16.resources.KeywordPlanCampaignH I
update (27.google.ads.googleads.v16.resources.KeywordPlanCampaignH C
remove (	B1�A.
,googleads.googleapis.com/KeywordPlanCampaignH B
	operation"�
"MutateKeywordPlanCampaignsResponse1
partial_failure_error (2.google.rpc.StatusS
results (2B.google.ads.googleads.v16.services.MutateKeywordPlanCampaignResult"k
MutateKeywordPlanCampaignResultH
resource_name (	B1�A.
,googleads.googleapis.com/KeywordPlanCampaign2�
KeywordPlanCampaignService�
MutateKeywordPlanCampaignsD.google.ads.googleads.v16.services.MutateKeywordPlanCampaignsRequestE.google.ads.googleads.v16.services.MutateKeywordPlanCampaignsResponse"^�Acustomer_id,operations���?":/v16/customers/{customer_id=*}/keywordPlanCampaigns:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v16.servicesBKeywordPlanCampaignServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v16/services;services�GAA�!Google.Ads.GoogleAds.V16.Services�!Google\\Ads\\GoogleAds\\V16\\Services�%Google::Ads::GoogleAds::V16::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

