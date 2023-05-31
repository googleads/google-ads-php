<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/services/ad_parameter_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V13\Services;

class AdParameterService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
:google/ads/googleads/v13/enums/response_content_type.protogoogle.ads.googleads.v13.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v13.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
5google/ads/googleads/v13/resources/ad_parameter.proto"google.ads.googleads.v13.resourcesgoogle/api/resource.proto"�
AdParameterC
resource_name (	B,�A�A&
$googleads.googleapis.com/AdParameterR
ad_group_criterion (	B1�A�A+
)googleads.googleapis.com/AdGroupCriterionH �!
parameter_index (B�AH�
insertion_text (	H�:~�A{
$googleads.googleapis.com/AdParameterScustomers/{customer_id}/adParameters/{ad_group_id}~{criterion_id}~{parameter_index}B
_ad_group_criterionB
_parameter_indexB
_insertion_textB�
&com.google.ads.googleads.v13.resourcesBAdParameterProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v13/resources;resources�GAA�"Google.Ads.GoogleAds.V13.Resources�"Google\\Ads\\GoogleAds\\V13\\Resources�&Google::Ads::GoogleAds::V13::Resourcesbproto3
�
<google/ads/googleads/v13/services/ad_parameter_service.proto!google.ads.googleads.v13.services5google/ads/googleads/v13/resources/ad_parameter.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
MutateAdParametersRequest
customer_id (	B�AP

operations (27.google.ads.googleads.v13.services.AdParameterOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v13.enums.ResponseContentTypeEnum.ResponseContentType"�
AdParameterOperation/
update_mask (2.google.protobuf.FieldMaskA
create (2/.google.ads.googleads.v13.resources.AdParameterH A
update (2/.google.ads.googleads.v13.resources.AdParameterH ;
remove (	B)�A&
$googleads.googleapis.com/AdParameterH B
	operation"�
MutateAdParametersResponse1
partial_failure_error (2.google.rpc.StatusK
results (2:.google.ads.googleads.v13.services.MutateAdParameterResult"�
MutateAdParameterResult@
resource_name (	B)�A&
$googleads.googleapis.com/AdParameterE
ad_parameter (2/.google.ads.googleads.v13.resources.AdParameter2�
AdParameterService�
MutateAdParameters<.google.ads.googleads.v13.services.MutateAdParametersRequest=.google.ads.googleads.v13.services.MutateAdParametersResponse"V���7"2/v13/customers/{customer_id=*}/adParameters:mutate:*�Acustomer_id,operationsE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v13.servicesBAdParameterServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v13/services;services�GAA�!Google.Ads.GoogleAds.V13.Services�!Google\\Ads\\GoogleAds\\V13\\Services�%Google::Ads::GoogleAds::V13::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

