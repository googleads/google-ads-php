<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/customizer_attribute_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class CustomizerAttributeService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
@google/ads/googleads/v19/enums/customizer_attribute_status.protogoogle.ads.googleads.v19.enums"t
CustomizerAttributeStatusEnum"S
CustomizerAttributeStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v19.enumsBCustomizerAttributeStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
>google/ads/googleads/v19/enums/customizer_attribute_type.protogoogle.ads.googleads.v19.enums"�
CustomizerAttributeTypeEnum"e
CustomizerAttributeType
UNSPECIFIED 
UNKNOWN
TEXT

NUMBER	
PRICE
PERCENTB�
"com.google.ads.googleads.v19.enumsBCustomizerAttributeTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
:google/ads/googleads/v19/enums/response_content_type.protogoogle.ads.googleads.v19.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v19.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
=google/ads/googleads/v19/resources/customizer_attribute.proto"google.ads.googleads.v19.resources>google/ads/googleads/v19/enums/customizer_attribute_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
CustomizerAttributeK
resource_name (	B4�A�A.
,googleads.googleapis.com/CustomizerAttribute
id (B�A
name (	B�A�Af
type (2S.google.ads.googleads.v19.enums.CustomizerAttributeTypeEnum.CustomizerAttributeTypeB�Al
status (2W.google.ads.googleads.v19.enums.CustomizerAttributeStatusEnum.CustomizerAttributeStatusB�A:y�Av
,googleads.googleapis.com/CustomizerAttributeFcustomers/{customer_id}/customizerAttributes/{customizer_attribute_id}B�
&com.google.ads.googleads.v19.resourcesBCustomizerAttributeProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
Dgoogle/ads/googleads/v19/services/customizer_attribute_service.proto!google.ads.googleads.v19.services=google/ads/googleads/v19/resources/customizer_attribute.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
!MutateCustomizerAttributesRequest
customer_id (	B�AX

operations (2?.google.ads.googleads.v19.services.CustomizerAttributeOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v19.enums.ResponseContentTypeEnum.ResponseContentType"�
CustomizerAttributeOperation/
update_mask (2.google.protobuf.FieldMaskI
create (27.google.ads.googleads.v19.resources.CustomizerAttributeH C
remove (	B1�A.
,googleads.googleapis.com/CustomizerAttributeH B
	operation"�
"MutateCustomizerAttributesResponseS
results (2B.google.ads.googleads.v19.services.MutateCustomizerAttributeResult1
partial_failure_error (2.google.rpc.Status"�
MutateCustomizerAttributeResultH
resource_name (	B1�A.
,googleads.googleapis.com/CustomizerAttributeU
customizer_attribute (27.google.ads.googleads.v19.resources.CustomizerAttribute2�
CustomizerAttributeService�
MutateCustomizerAttributesD.google.ads.googleads.v19.services.MutateCustomizerAttributesRequestE.google.ads.googleads.v19.services.MutateCustomizerAttributesResponse"^�Acustomer_id,operations���?":/v19/customers/{customer_id=*}/customizerAttributes:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesBCustomizerAttributeServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

