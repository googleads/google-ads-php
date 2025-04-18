<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/ad_group_asset_set_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class AdGroupAssetSetService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
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
&com.google.ads.googleads.v19.resourcesBAdGroupAssetSetProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
:google/ads/googleads/v19/enums/response_content_type.protogoogle.ads.googleads.v19.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v19.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
Bgoogle/ads/googleads/v19/services/ad_group_asset_set_service.proto!google.ads.googleads.v19.services;google/ads/googleads/v19/resources/ad_group_asset_set.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/rpc/status.proto"�
MutateAdGroupAssetSetsRequest
customer_id (	B�AT

operations (2;.google.ads.googleads.v19.services.AdGroupAssetSetOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v19.enums.ResponseContentTypeEnum.ResponseContentType"�
AdGroupAssetSetOperationE
create (23.google.ads.googleads.v19.resources.AdGroupAssetSetH ?
remove (	B-�A*
(googleads.googleapis.com/AdGroupAssetSetH B
	operation"�
MutateAdGroupAssetSetsResponseO
results (2>.google.ads.googleads.v19.services.MutateAdGroupAssetSetResult1
partial_failure_error (2.google.rpc.Status"�
MutateAdGroupAssetSetResultD
resource_name (	B-�A*
(googleads.googleapis.com/AdGroupAssetSetO
ad_group_asset_set (23.google.ads.googleads.v19.resources.AdGroupAssetSet2�
AdGroupAssetSetService�
MutateAdGroupAssetSets@.google.ads.googleads.v19.services.MutateAdGroupAssetSetsRequestA.google.ads.googleads.v19.services.MutateAdGroupAssetSetsResponse"Z�Acustomer_id,operations���;"6/v19/customers/{customer_id=*}/adGroupAssetSets:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesBAdGroupAssetSetServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

