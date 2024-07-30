<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/services/shareable_preview_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Services;

class ShareablePreviewService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
Agoogle/ads/googleads/v17/services/shareable_preview_service.proto!google.ads.googleads.v17.servicesgoogle/api/client.protogoogle/api/field_behavior.protogoogle/rpc/status.proto"�
 GenerateShareablePreviewsRequest
customer_id (	B�AT
shareable_previews (23.google.ads.googleads.v17.services.ShareablePreviewB�A"p
ShareablePreview\\
asset_group_identifier (27.google.ads.googleads.v17.services.AssetGroupIdentifierB�A"3
AssetGroupIdentifier
asset_group_id (B�A"r
!GenerateShareablePreviewsResponseM
	responses (2:.google.ads.googleads.v17.services.ShareablePreviewOrError"�
ShareablePreviewOrErrorW
asset_group_identifier (27.google.ads.googleads.v17.services.AssetGroupIdentifier]
shareable_preview_result (29.google.ads.googleads.v17.services.ShareablePreviewResultH 3
partial_failure_error (2.google.rpc.StatusH B%
#generate_shareable_preview_response"U
ShareablePreviewResult
shareable_preview_url (	
expiration_date_time (	2�
ShareablePreviewService�
GenerateShareablePreviewsC.google.ads.googleads.v17.services.GenerateShareablePreviewsRequestD.google.ads.googleads.v17.services.GenerateShareablePreviewsResponse"d�Acustomer_id,shareable_previews���="8/v17/customers/{customer_id=*}:generateShareablePreviews:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v17.servicesBShareablePreviewServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v17/services;services�GAA�!Google.Ads.GoogleAds.V17.Services�!Google\\Ads\\GoogleAds\\V17\\Services�%Google::Ads::GoogleAds::V17::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

