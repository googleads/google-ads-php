<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v8/services/ad_group_asset_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V8\Services;

class AdGroupAssetService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
4google/ads/googleads/v8/enums/asset_field_type.protogoogle.ads.googleads.v8.enums"�
AssetFieldTypeEnum"�
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
SITELINKB�
!com.google.ads.googleads.v8.enumsBAssetFieldTypeProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v8/enums;enums�GAA�Google.Ads.GoogleAds.V8.Enums�Google\\Ads\\GoogleAds\\V8\\Enums�!Google::Ads::GoogleAds::V8::Enumsbproto3
�
5google/ads/googleads/v8/enums/asset_link_status.protogoogle.ads.googleads.v8.enums"l
AssetLinkStatusEnum"U
AssetLinkStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVED

PAUSEDB�
!com.google.ads.googleads.v8.enumsBAssetLinkStatusProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v8/enums;enums�GAA�Google.Ads.GoogleAds.V8.Enums�Google\\Ads\\GoogleAds\\V8\\Enums�!Google::Ads::GoogleAds::V8::Enumsbproto3
�
9google/ads/googleads/v8/enums/response_content_type.protogoogle.ads.googleads.v8.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
!com.google.ads.googleads.v8.enumsBResponseContentTypeProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v8/enums;enums�GAA�Google.Ads.GoogleAds.V8.Enums�Google\\Ads\\GoogleAds\\V8\\Enums�!Google::Ads::GoogleAds::V8::Enumsbproto3
�
6google/ads/googleads/v8/resources/ad_group_asset.proto!google.ads.googleads.v8.resources5google/ads/googleads/v8/enums/asset_link_status.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/api/annotations.proto"�
AdGroupAssetD
resource_name (	B-�A�A\'
%googleads.googleapis.com/AdGroupAsset=
ad_group (	B+�A�A�A"
 googleads.googleapis.com/AdGroup8
asset (	B)�A�A�A 
googleads.googleapis.com/Asset\\

field_type (2@.google.ads.googleads.v8.enums.AssetFieldTypeEnum.AssetFieldTypeB�A�AR
status (2B.google.ads.googleads.v8.enums.AssetLinkStatusEnum.AssetLinkStatus:w�At
%googleads.googleapis.com/AdGroupAssetKcustomers/{customer_id}/adGroupAssets/{ad_group_id}~{asset_id}~{field_type}B�
%com.google.ads.googleads.v8.resourcesBAdGroupAssetProtoPZJgoogle.golang.org/genproto/googleapis/ads/googleads/v8/resources;resources�GAA�!Google.Ads.GoogleAds.V8.Resources�!Google\\Ads\\GoogleAds\\V8\\Resources�%Google::Ads::GoogleAds::V8::Resourcesbproto3
�
=google/ads/googleads/v8/services/ad_group_asset_service.proto google.ads.googleads.v8.services6google/ads/googleads/v8/resources/ad_group_asset.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"^
GetAdGroupAssetRequestD
resource_name (	B-�A�A\'
%googleads.googleapis.com/AdGroupAsset"�
MutateAdGroupAssetsRequest
customer_id (	B�AP

operations (27.google.ads.googleads.v8.services.AdGroupAssetOperationB�A
partial_failure (
validate_only (i
response_content_type (2J.google.ads.googleads.v8.enums.ResponseContentTypeEnum.ResponseContentType"�
AdGroupAssetOperation/
update_mask (2.google.protobuf.FieldMaskA
create (2/.google.ads.googleads.v8.resources.AdGroupAssetH A
update (2/.google.ads.googleads.v8.resources.AdGroupAssetH 
remove (	H B
	operation"�
MutateAdGroupAssetsResponse1
partial_failure_error (2.google.rpc.StatusK
results (2:.google.ads.googleads.v8.services.MutateAdGroupAssetResult"z
MutateAdGroupAssetResult
resource_name (	G
ad_group_asset (2/.google.ads.googleads.v8.resources.AdGroupAsset2�
AdGroupAssetService�
GetAdGroupAsset8.google.ads.googleads.v8.services.GetAdGroupAssetRequest/.google.ads.googleads.v8.resources.AdGroupAsset"G���1//v8/{resource_name=customers/*/adGroupAssets/*}�Aresource_name�
MutateAdGroupAssets<.google.ads.googleads.v8.services.MutateAdGroupAssetsRequest=.google.ads.googleads.v8.services.MutateAdGroupAssetsResponse"V���7"2/v8/customers/{customer_id=*}/adGroupAssets:mutate:*�Acustomer_id,operationsE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
$com.google.ads.googleads.v8.servicesBAdGroupAssetServiceProtoPZHgoogle.golang.org/genproto/googleapis/ads/googleads/v8/services;services�GAA� Google.Ads.GoogleAds.V8.Services� Google\\Ads\\GoogleAds\\V8\\Services�$Google::Ads::GoogleAds::V8::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

