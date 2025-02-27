<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/customer_customizer_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class CustomerCustomizerService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
:google/ads/googleads/v19/enums/response_content_type.protogoogle.ads.googleads.v19.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v19.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
<google/ads/googleads/v19/enums/customizer_value_status.protogoogle.ads.googleads.v19.enums"l
CustomizerValueStatusEnum"O
CustomizerValueStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v19.enumsBCustomizerValueStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
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
�
6google/ads/googleads/v19/common/customizer_value.protogoogle.ads.googleads.v19.commongoogle/api/field_behavior.proto"�
CustomizerValuef
type (2S.google.ads.googleads.v19.enums.CustomizerAttributeTypeEnum.CustomizerAttributeTypeB�A
string_value (	B�AB�
#com.google.ads.googleads.v19.commonBCustomizerValueProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/common;common�GAA�Google.Ads.GoogleAds.V19.Common�Google\\Ads\\GoogleAds\\V19\\Common�#Google::Ads::GoogleAds::V19::Commonbproto3
�
<google/ads/googleads/v19/resources/customer_customizer.proto"google.ads.googleads.v19.resources<google/ads/googleads/v19/enums/customizer_value_status.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
CustomerCustomizerJ
resource_name (	B3�A�A-
+googleads.googleapis.com/CustomerCustomizerU
customizer_attribute (	B7�A�A�A.
,googleads.googleapis.com/CustomizerAttributed
status (2O.google.ads.googleads.v19.enums.CustomizerValueStatusEnum.CustomizerValueStatusB�AD
value (20.google.ads.googleads.v19.common.CustomizerValueB�A:w�At
+googleads.googleapis.com/CustomerCustomizerEcustomers/{customer_id}/customerCustomizers/{customizer_attribute_id}B�
&com.google.ads.googleads.v19.resourcesBCustomerCustomizerProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
Cgoogle/ads/googleads/v19/services/customer_customizer_service.proto!google.ads.googleads.v19.services<google/ads/googleads/v19/resources/customer_customizer.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/rpc/status.proto"�
 MutateCustomerCustomizersRequest
customer_id (	B�AW

operations (2>.google.ads.googleads.v19.services.CustomerCustomizerOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v19.enums.ResponseContentTypeEnum.ResponseContentType"�
CustomerCustomizerOperationH
create (26.google.ads.googleads.v19.resources.CustomerCustomizerH B
remove (	B0�A-
+googleads.googleapis.com/CustomerCustomizerH B
	operation"�
!MutateCustomerCustomizersResponseR
results (2A.google.ads.googleads.v19.services.MutateCustomerCustomizerResult1
partial_failure_error (2.google.rpc.Status"�
MutateCustomerCustomizerResultG
resource_name (	B0�A-
+googleads.googleapis.com/CustomerCustomizerS
customer_customizer (26.google.ads.googleads.v19.resources.CustomerCustomizer2�
CustomerCustomizerService�
MutateCustomerCustomizersC.google.ads.googleads.v19.services.MutateCustomerCustomizersRequestD.google.ads.googleads.v19.services.MutateCustomerCustomizersResponse"]�Acustomer_id,operations���>"9/v19/customers/{customer_id=*}/CustomerCustomizers:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesBCustomerCustomizerServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

