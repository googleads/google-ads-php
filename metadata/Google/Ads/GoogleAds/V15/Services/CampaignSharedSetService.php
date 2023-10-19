<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v15/services/campaign_shared_set_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V15\Services;

class CampaignSharedSetService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
?google/ads/googleads/v15/enums/campaign_shared_set_status.protogoogle.ads.googleads.v15.enums"p
CampaignSharedSetStatusEnum"Q
CampaignSharedSetStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v15.enumsBCampaignSharedSetStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v15/enums;enums�GAA�Google.Ads.GoogleAds.V15.Enums�Google\\Ads\\GoogleAds\\V15\\Enums�"Google::Ads::GoogleAds::V15::Enumsbproto3
�
:google/ads/googleads/v15/enums/response_content_type.protogoogle.ads.googleads.v15.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v15.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v15/enums;enums�GAA�Google.Ads.GoogleAds.V15.Enums�Google\\Ads\\GoogleAds\\V15\\Enums�"Google::Ads::GoogleAds::V15::Enumsbproto3
�
<google/ads/googleads/v15/resources/campaign_shared_set.proto"google.ads.googleads.v15.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
CampaignSharedSetI
resource_name (	B2�A�A,
*googleads.googleapis.com/CampaignSharedSet@
campaign (	B)�A�A#
!googleads.googleapis.com/CampaignH �C

shared_set (	B*�A�A$
"googleads.googleapis.com/SharedSetH�h
status (2S.google.ads.googleads.v15.enums.CampaignSharedSetStatusEnum.CampaignSharedSetStatusB�A:y�Av
*googleads.googleapis.com/CampaignSharedSetHcustomers/{customer_id}/campaignSharedSets/{campaign_id}~{shared_set_id}B
	_campaignB
_shared_setB�
&com.google.ads.googleads.v15.resourcesBCampaignSharedSetProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v15/resources;resources�GAA�"Google.Ads.GoogleAds.V15.Resources�"Google\\Ads\\GoogleAds\\V15\\Resources�&Google::Ads::GoogleAds::V15::Resourcesbproto3
�
Cgoogle/ads/googleads/v15/services/campaign_shared_set_service.proto!google.ads.googleads.v15.services<google/ads/googleads/v15/resources/campaign_shared_set.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/rpc/status.proto"�
MutateCampaignSharedSetsRequest
customer_id (	B�AV

operations (2=.google.ads.googleads.v15.services.CampaignSharedSetOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v15.enums.ResponseContentTypeEnum.ResponseContentType"�
CampaignSharedSetOperationG
create (25.google.ads.googleads.v15.resources.CampaignSharedSetH A
remove (	B/�A,
*googleads.googleapis.com/CampaignSharedSetH B
	operation"�
 MutateCampaignSharedSetsResponse1
partial_failure_error (2.google.rpc.StatusQ
results (2@.google.ads.googleads.v15.services.MutateCampaignSharedSetResult"�
MutateCampaignSharedSetResultF
resource_name (	B/�A,
*googleads.googleapis.com/CampaignSharedSetR
campaign_shared_set (25.google.ads.googleads.v15.resources.CampaignSharedSet2�
CampaignSharedSetService�
MutateCampaignSharedSetsB.google.ads.googleads.v15.services.MutateCampaignSharedSetsRequestC.google.ads.googleads.v15.services.MutateCampaignSharedSetsResponse"\\���="8/v15/customers/{customer_id=*}/campaignSharedSets:mutate:*�Acustomer_id,operationsE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v15.servicesBCampaignSharedSetServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v15/services;services�GAA�!Google.Ads.GoogleAds.V15.Services�!Google\\Ads\\GoogleAds\\V15\\Services�%Google::Ads::GoogleAds::V15::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

