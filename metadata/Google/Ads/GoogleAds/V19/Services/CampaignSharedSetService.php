<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/campaign_shared_set_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class CampaignSharedSetService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
?google/ads/googleads/v19/enums/campaign_shared_set_status.protogoogle.ads.googleads.v19.enums"p
CampaignSharedSetStatusEnum"Q
CampaignSharedSetStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v19.enumsBCampaignSharedSetStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
:google/ads/googleads/v19/enums/response_content_type.protogoogle.ads.googleads.v19.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v19.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
<google/ads/googleads/v19/resources/campaign_shared_set.proto"google.ads.googleads.v19.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
CampaignSharedSetI
resource_name (	B2�A�A,
*googleads.googleapis.com/CampaignSharedSet@
campaign (	B)�A�A#
!googleads.googleapis.com/CampaignH �C

shared_set (	B*�A�A$
"googleads.googleapis.com/SharedSetH�h
status (2S.google.ads.googleads.v19.enums.CampaignSharedSetStatusEnum.CampaignSharedSetStatusB�A:y�Av
*googleads.googleapis.com/CampaignSharedSetHcustomers/{customer_id}/campaignSharedSets/{campaign_id}~{shared_set_id}B
	_campaignB
_shared_setB�
&com.google.ads.googleads.v19.resourcesBCampaignSharedSetProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
Cgoogle/ads/googleads/v19/services/campaign_shared_set_service.proto!google.ads.googleads.v19.services<google/ads/googleads/v19/resources/campaign_shared_set.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/rpc/status.proto"�
MutateCampaignSharedSetsRequest
customer_id (	B�AV

operations (2=.google.ads.googleads.v19.services.CampaignSharedSetOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v19.enums.ResponseContentTypeEnum.ResponseContentType"�
CampaignSharedSetOperationG
create (25.google.ads.googleads.v19.resources.CampaignSharedSetH A
remove (	B/�A,
*googleads.googleapis.com/CampaignSharedSetH B
	operation"�
 MutateCampaignSharedSetsResponse1
partial_failure_error (2.google.rpc.StatusQ
results (2@.google.ads.googleads.v19.services.MutateCampaignSharedSetResult"�
MutateCampaignSharedSetResultF
resource_name (	B/�A,
*googleads.googleapis.com/CampaignSharedSetR
campaign_shared_set (25.google.ads.googleads.v19.resources.CampaignSharedSet2�
CampaignSharedSetService�
MutateCampaignSharedSetsB.google.ads.googleads.v19.services.MutateCampaignSharedSetsRequestC.google.ads.googleads.v19.services.MutateCampaignSharedSetsResponse"\\�Acustomer_id,operations���="8/v19/customers/{customer_id=*}/campaignSharedSets:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesBCampaignSharedSetServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

