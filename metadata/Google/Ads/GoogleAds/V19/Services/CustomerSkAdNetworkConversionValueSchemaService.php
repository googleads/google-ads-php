<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/customer_sk_ad_network_conversion_value_schema_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class CustomerSkAdNetworkConversionValueSchemaService
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
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
Jgoogle/ads/googleads/v19/enums/sk_ad_network_coarse_conversion_value.protogoogle.ads.googleads.v19.enums"�
$SkAdNetworkCoarseConversionValueEnum"z
 SkAdNetworkCoarseConversionValue
UNSPECIFIED 
UNKNOWN
UNAVAILABLE
LOW

MEDIUM
HIGH
NONEB�
"com.google.ads.googleads.v19.enumsB%SkAdNetworkCoarseConversionValueProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
Wgoogle/ads/googleads/v19/resources/customer_sk_ad_network_conversion_value_schema.proto"google.ads.googleads.v19.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
(CustomerSkAdNetworkConversionValueSchema`
resource_name (	BI�A�AC
Agoogleads.googleapis.com/CustomerSkAdNetworkConversionValueSchema�
schema (2m.google.ads.googleads.v19.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchemaB�A�
 SkAdNetworkConversionValueSchema
app_id (	B�A�A%
measurement_window_hours (B�A�
&fine_grained_conversion_value_mappings (2�.google.ads.googleads.v19.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.FineGrainedConversionValueMappingsB�A�
postback_mappings (2}.google.ads.googleads.v19.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.PostbackMappingB�A�
"FineGrainedConversionValueMappings*
fine_grained_conversion_value (B�A�
conversion_value_mapping (2�.google.ads.googleads.v19.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.ConversionValueMappingB�A�
PostbackMapping$
postback_sequence_index (B�A�
(coarse_grained_conversion_value_mappings (2�.google.ads.googleads.v19.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.CoarseGrainedConversionValueMappingsB�A�
#lock_window_coarse_conversion_value (2e.google.ads.googleads.v19.enums.SkAdNetworkCoarseConversionValueEnum.SkAdNetworkCoarseConversionValueB�AH 0
!lock_window_fine_conversion_value (B�AH  
lock_window_event (	B�AH B
lock_window_trigger�
$CoarseGrainedConversionValueMappings�
low_conversion_value_mapping (2�.google.ads.googleads.v19.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.ConversionValueMappingB�A�
medium_conversion_value_mapping (2�.google.ads.googleads.v19.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.ConversionValueMappingB�A�
high_conversion_value_mapping (2�.google.ads.googleads.v19.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.ConversionValueMappingB�A�
ConversionValueMapping(
min_time_post_install_hours (B�A(
max_time_post_install_hours (B�A�
mapped_events (2s.google.ads.googleads.v19.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.EventB�A�
Event
mapped_event_name (	B�A
currency_code (	B�A�
event_revenue_range (2�.google.ads.googleads.v19.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.Event.RevenueRangeB�AH "
event_revenue_value (B�AH �
event_occurrence_range (2�.google.ads.googleads.v19.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.Event.EventOccurrenceRangeB�AH
event_counter (B�AHN
RevenueRange
min_event_revenue (B�A
max_event_revenue (B�AR
EventOccurrenceRange
min_event_count (B�A
max_event_count (B�AB
revenue_rateB

event_rate:��A�
Agoogleads.googleapis.com/CustomerSkAdNetworkConversionValueSchemaScustomers/{customer_id}/customerSkAdNetworkConversionValueSchemas/{account_link_id}B�
&com.google.ads.googleads.v19.resourcesB-CustomerSkAdNetworkConversionValueSchemaProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
^google/ads/googleads/v19/services/customer_sk_ad_network_conversion_value_schema_service.proto!google.ads.googleads.v19.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/rpc/status.proto"�
1CustomerSkAdNetworkConversionValueSchemaOperation\\
update (2L.google.ads.googleads.v19.resources.CustomerSkAdNetworkConversionValueSchema"�
5MutateCustomerSkAdNetworkConversionValueSchemaRequest
customer_id (	g
	operation (2T.google.ads.googleads.v19.services.CustomerSkAdNetworkConversionValueSchemaOperation
validate_only (
enable_warnings (B�A"�
4MutateCustomerSkAdNetworkConversionValueSchemaResult]
resource_name (	BF�AC
Agoogleads.googleapis.com/CustomerSkAdNetworkConversionValueSchema
app_id (	"�
6MutateCustomerSkAdNetworkConversionValueSchemaResponseg
result (2W.google.ads.googleads.v19.services.MutateCustomerSkAdNetworkConversionValueSchemaResult#
warning (2.google.rpc.Status2�
/CustomerSkAdNetworkConversionValueSchemaService�
.MutateCustomerSkAdNetworkConversionValueSchemaX.google.ads.googleads.v19.services.MutateCustomerSkAdNetworkConversionValueSchemaRequestY.google.ads.googleads.v19.services.MutateCustomerSkAdNetworkConversionValueSchemaResponse"Z���T"O/v19/customers/{customer_id=*}/customerSkAdNetworkConversionValueSchemas:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesB4CustomerSkAdNetworkConversionValueSchemaServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

