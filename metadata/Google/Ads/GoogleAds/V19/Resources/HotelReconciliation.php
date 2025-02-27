<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/hotel_reconciliation.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class HotelReconciliation
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
@google/ads/googleads/v19/enums/hotel_reconciliation_status.protogoogle.ads.googleads.v19.enums"�
HotelReconciliationStatusEnum"�
HotelReconciliationStatus
UNSPECIFIED 
UNKNOWN
RESERVATION_ENABLED
RECONCILIATION_NEEDED

RECONCILED
CANCELEDB�
"com.google.ads.googleads.v19.enumsBHotelReconciliationStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
=google/ads/googleads/v19/resources/hotel_reconciliation.proto"google.ads.googleads.v19.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
HotelReconciliationK
resource_name (	B4�A�A.
,googleads.googleapis.com/HotelReconciliation
commission_id (	B�A�A
order_id (	B�A;
campaign (	B)�A�A#
!googleads.googleapis.com/Campaign
hotel_center_id (B�A
hotel_id (	B�A
check_in_date (	B�A
check_out_date (	B�A\'
reconciled_value_micros (B�A�A
billed	 (B�Ao
status
 (2W.google.ads.googleads.v19.enums.HotelReconciliationStatusEnum.HotelReconciliationStatusB�A�A:o�Al
,googleads.googleapis.com/HotelReconciliation<customers/{customer_id}/hotelReconciliations/{commission_id}B�
&com.google.ads.googleads.v19.resourcesBHotelReconciliationProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

