<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/services/bidding_seasonality_adjustment_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Services;

class BiddingSeasonalityAdjustmentService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
:google/ads/googleads/v16/enums/response_content_type.protogoogle.ads.googleads.v16.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v16.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
+google/ads/googleads/v16/enums/device.protogoogle.ads.googleads.v16.enums"v

DeviceEnum"h
Device
UNSPECIFIED 
UNKNOWN

MOBILE

TABLET
DESKTOP
CONNECTED_TV	
OTHERB�
"com.google.ads.googleads.v16.enumsBDeviceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
=google/ads/googleads/v16/enums/advertising_channel_type.protogoogle.ads.googleads.v16.enums"�
AdvertisingChannelTypeEnum"�
AdvertisingChannelType
UNSPECIFIED 
UNKNOWN

SEARCH
DISPLAY
SHOPPING	
HOTEL	
VIDEO
MULTI_CHANNEL	
LOCAL	
SMART	
PERFORMANCE_MAX

LOCAL_SERVICES
	DISCOVERY

TRAVELB�
"com.google.ads.googleads.v16.enumsBAdvertisingChannelTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
<google/ads/googleads/v16/enums/seasonality_event_scope.protogoogle.ads.googleads.v16.enums"{
SeasonalityEventScopeEnum"^
SeasonalityEventScope
UNSPECIFIED 
UNKNOWN
CUSTOMER
CAMPAIGN
CHANNELB�
"com.google.ads.googleads.v16.enumsBSeasonalityEventScopeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
=google/ads/googleads/v16/enums/seasonality_event_status.protogoogle.ads.googleads.v16.enums"n
SeasonalityEventStatusEnum"P
SeasonalityEventStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v16.enumsBSeasonalityEventStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Ggoogle/ads/googleads/v16/resources/bidding_seasonality_adjustment.proto"google.ads.googleads.v16.resources+google/ads/googleads/v16/enums/device.proto<google/ads/googleads/v16/enums/seasonality_event_scope.proto=google/ads/googleads/v16/enums/seasonality_event_status.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
BiddingSeasonalityAdjustmentT
resource_name (	B=�A�A7
5googleads.googleapis.com/BiddingSeasonalityAdjustment&
seasonality_adjustment_id (B�A^
scope (2O.google.ads.googleads.v16.enums.SeasonalityEventScopeEnum.SeasonalityEventScopef
status (2Q.google.ads.googleads.v16.enums.SeasonalityEventStatusEnum.SeasonalityEventStatusB�A
start_date_time (	B�A
end_date_time (	B�A
name (	
description (	B
devices	 (21.google.ads.googleads.v16.enums.DeviceEnum.Device 
conversion_rate_modifier
 (9
	campaigns (	B&�A#
!googleads.googleapis.com/Campaignt
advertising_channel_types (2Q.google.ads.googleads.v16.enums.AdvertisingChannelTypeEnum.AdvertisingChannelType:��A�
5googleads.googleapis.com/BiddingSeasonalityAdjustmentLcustomers/{customer_id}/biddingSeasonalityAdjustments/{seasonality_event_id}B�
&com.google.ads.googleads.v16.resourcesB!BiddingSeasonalityAdjustmentProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v16/resources;resources�GAA�"Google.Ads.GoogleAds.V16.Resources�"Google\\Ads\\GoogleAds\\V16\\Resources�&Google::Ads::GoogleAds::V16::Resourcesbproto3
�
Ngoogle/ads/googleads/v16/services/bidding_seasonality_adjustment_service.proto!google.ads.googleads.v16.servicesGgoogle/ads/googleads/v16/resources/bidding_seasonality_adjustment.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
*MutateBiddingSeasonalityAdjustmentsRequest
customer_id (	B�Aa

operations (2H.google.ads.googleads.v16.services.BiddingSeasonalityAdjustmentOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v16.enums.ResponseContentTypeEnum.ResponseContentType"�
%BiddingSeasonalityAdjustmentOperation/
update_mask (2.google.protobuf.FieldMaskR
create (2@.google.ads.googleads.v16.resources.BiddingSeasonalityAdjustmentH R
update (2@.google.ads.googleads.v16.resources.BiddingSeasonalityAdjustmentH L
remove (	B:�A7
5googleads.googleapis.com/BiddingSeasonalityAdjustmentH B
	operation"�
+MutateBiddingSeasonalityAdjustmentsResponse1
partial_failure_error (2.google.rpc.Status]
results (2L.google.ads.googleads.v16.services.MutateBiddingSeasonalityAdjustmentsResult"�
)MutateBiddingSeasonalityAdjustmentsResultQ
resource_name (	B:�A7
5googleads.googleapis.com/BiddingSeasonalityAdjustmenth
bidding_seasonality_adjustment (2@.google.ads.googleads.v16.resources.BiddingSeasonalityAdjustment2�
#BiddingSeasonalityAdjustmentService�
#MutateBiddingSeasonalityAdjustmentsM.google.ads.googleads.v16.services.MutateBiddingSeasonalityAdjustmentsRequestN.google.ads.googleads.v16.services.MutateBiddingSeasonalityAdjustmentsResponse"g�Acustomer_id,operations���H"C/v16/customers/{customer_id=*}/biddingSeasonalityAdjustments:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v16.servicesB(BiddingSeasonalityAdjustmentServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v16/services;services�GAA�!Google.Ads.GoogleAds.V16.Services�!Google\\Ads\\GoogleAds\\V16\\Services�%Google::Ads::GoogleAds::V16::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

