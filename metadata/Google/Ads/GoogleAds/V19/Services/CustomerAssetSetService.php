<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/customer_asset_set_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class CustomerAssetSetService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
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
;google/ads/googleads/v19/resources/customer_asset_set.proto"google.ads.googleads.v19.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
CustomerAssetSetH
resource_name (	B1�A�A+
)googleads.googleapis.com/CustomerAssetSet<
	asset_set (	B)�A�A#
!googleads.googleapis.com/AssetSet;
customer (	B)�A�A#
!googleads.googleapis.com/Customer^
status (2I.google.ads.googleads.v19.enums.AssetSetLinkStatusEnum.AssetSetLinkStatusB�A:h�Ae
)googleads.googleapis.com/CustomerAssetSet8customers/{customer_id}/customerAssetSets/{asset_set_id}B�
&com.google.ads.googleads.v19.resourcesBCustomerAssetSetProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
:google/ads/googleads/v19/enums/response_content_type.protogoogle.ads.googleads.v19.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v19.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
Bgoogle/ads/googleads/v19/services/customer_asset_set_service.proto!google.ads.googleads.v19.services;google/ads/googleads/v19/resources/customer_asset_set.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/rpc/status.proto"�
MutateCustomerAssetSetsRequest
customer_id (	B�AU

operations (2<.google.ads.googleads.v19.services.CustomerAssetSetOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v19.enums.ResponseContentTypeEnum.ResponseContentType"�
CustomerAssetSetOperationF
create (24.google.ads.googleads.v19.resources.CustomerAssetSetH @
remove (	B.�A+
)googleads.googleapis.com/CustomerAssetSetH B
	operation"�
MutateCustomerAssetSetsResponseP
results (2?.google.ads.googleads.v19.services.MutateCustomerAssetSetResult1
partial_failure_error (2.google.rpc.Status"�
MutateCustomerAssetSetResultE
resource_name (	B.�A+
)googleads.googleapis.com/CustomerAssetSetP
customer_asset_set (24.google.ads.googleads.v19.resources.CustomerAssetSet2�
CustomerAssetSetService�
MutateCustomerAssetSetsA.google.ads.googleads.v19.services.MutateCustomerAssetSetsRequestB.google.ads.googleads.v19.services.MutateCustomerAssetSetsResponse"[�Acustomer_id,operations���<"7/v19/customers/{customer_id=*}/customerAssetSets:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesBCustomerAssetSetServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

