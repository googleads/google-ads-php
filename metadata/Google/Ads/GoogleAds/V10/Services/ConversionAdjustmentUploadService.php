<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/services/conversion_adjustment_upload_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Services;

class ConversionAdjustmentUploadService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
;google/ads/googleads/v10/enums/user_identifier_source.protogoogle.ads.googleads.v10.enums"r
UserIdentifierSourceEnum"V
UserIdentifierSource
UNSPECIFIED 
UNKNOWN
FIRST_PARTY
THIRD_PARTYB�
"com.google.ads.googleads.v10.enumsBUserIdentifierSourceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3
�
7google/ads/googleads/v10/common/offline_user_data.protogoogle.ads.googleads.v10.common"�
OfflineUserAddressInfo
hashed_first_name (	H �
hashed_last_name (	H�
city	 (	H�
state
 (	H�
country_code (	H�
postal_code (	H�"
hashed_street_address (	H�B
_hashed_first_nameB
_hashed_last_nameB
_cityB
_stateB
_country_codeB
_postal_codeB
_hashed_street_address"�
UserIdentifierm
user_identifier_source (2M.google.ads.googleads.v10.enums.UserIdentifierSourceEnum.UserIdentifierSource
hashed_email (	H 
hashed_phone_number (	H 
	mobile_id	 (	H 
third_party_user_id
 (	H O
address_info (27.google.ads.googleads.v10.common.OfflineUserAddressInfoH B

identifier"�
TransactionAttribute"
transaction_date_time (	H �&
transaction_amount_micros	 (H�
currency_code
 (	H�
conversion_action (	H�
order_id (	H�H
store_attribute (2/.google.ads.googleads.v10.common.StoreAttribute
custom_value (	H�F
item_attribute (2..google.ads.googleads.v10.common.ItemAttributeB
_transaction_date_timeB
_transaction_amount_microsB
_currency_codeB
_conversion_actionB
	_order_idB
_custom_value"8
StoreAttribute

store_code (	H �B
_store_code"�
ItemAttribute
item_id (	
merchant_id (H �
country_code (	
language_code (	
quantity (B
_merchant_id"�
UserDataI
user_identifiers (2/.google.ads.googleads.v10.common.UserIdentifierT
transaction_attribute (25.google.ads.googleads.v10.common.TransactionAttributeF
user_attribute (2..google.ads.googleads.v10.common.UserAttribute"�
UserAttribute"
lifetime_value_micros (H �"
lifetime_value_bucket (H�
last_purchase_date_time (	
average_purchase_count (%
average_purchase_value_micros (
acquisition_date_time (	O
shopping_loyalty (20.google.ads.googleads.v10.common.ShoppingLoyaltyH�B
_lifetime_value_microsB
_lifetime_value_bucketB
_shopping_loyalty"=
ShoppingLoyalty
loyalty_tier (	H �B
_loyalty_tier"E
CustomerMatchUserListMetadata
	user_list (	H �B

_user_list"�
StoreSalesMetadata
loyalty_fraction (H �(
transaction_upload_fraction (H�

custom_key (	H�[
third_party_metadata (2=.google.ads.googleads.v10.common.StoreSalesThirdPartyMetadataB
_loyalty_fractionB
_transaction_upload_fractionB
_custom_key"�
StoreSalesThirdPartyMetadata(
advertiser_upload_date_time (	H �\'
valid_transaction_fraction (H�#
partner_match_fraction	 (H�$
partner_upload_fraction
 (H�"
bridge_map_version_id (	H�

partner_id (H�B
_advertiser_upload_date_timeB
_valid_transaction_fractionB
_partner_match_fractionB
_partner_upload_fractionB
_bridge_map_version_idB
_partner_idB�
#com.google.ads.googleads.v10.commonBOfflineUserDataProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v10/common;common�GAA�Google.Ads.GoogleAds.V10.Common�Google\\Ads\\GoogleAds\\V10\\Common�#Google::Ads::GoogleAds::V10::Commonbproto3
�
?google/ads/googleads/v10/enums/conversion_adjustment_type.protogoogle.ads.googleads.v10.enums"�
ConversionAdjustmentTypeEnum"j
ConversionAdjustmentType
UNSPECIFIED 
UNKNOWN

RETRACTION
RESTATEMENT
ENHANCEMENTB�
"com.google.ads.googleads.v10.enumsBConversionAdjustmentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3
�
Lgoogle/ads/googleads/v10/services/conversion_adjustment_upload_service.proto!google.ads.googleads.v10.services?google/ads/googleads/v10/enums/conversion_adjustment_type.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/rpc/status.proto"�
"UploadConversionAdjustmentsRequest
customer_id (	B�A\\
conversion_adjustments (27.google.ads.googleads.v10.services.ConversionAdjustmentB�A
partial_failure (B�A
validate_only ("�
#UploadConversionAdjustmentsResponse1
partial_failure_error (2.google.rpc.StatusN
results (2=.google.ads.googleads.v10.services.ConversionAdjustmentResult"�
ConversionAdjustmentR
gclid_date_time_pair (24.google.ads.googleads.v10.services.GclidDateTimePair
order_id (	H �
conversion_action (	H�!
adjustment_date_time	 (	H�n
adjustment_type (2U.google.ads.googleads.v10.enums.ConversionAdjustmentTypeEnum.ConversionAdjustmentTypeN
restatement_value (23.google.ads.googleads.v10.services.RestatementValueI
user_identifiers
 (2/.google.ads.googleads.v10.common.UserIdentifier

user_agent (	H�B
	_order_idB
_conversion_actionB
_adjustment_date_timeB
_user_agent"p
RestatementValue
adjusted_value (H �
currency_code (	H�B
_adjusted_valueB
_currency_code"m
GclidDateTimePair
gclid (	H �!
conversion_date_time (	H�B
_gclidB
_conversion_date_time"�
ConversionAdjustmentResultR
gclid_date_time_pair	 (24.google.ads.googleads.v10.services.GclidDateTimePair
order_id
 (	
conversion_action (	H �!
adjustment_date_time (	H�n
adjustment_type (2U.google.ads.googleads.v10.enums.ConversionAdjustmentTypeEnum.ConversionAdjustmentTypeB
_conversion_actionB
_adjustment_date_time2�
!ConversionAdjustmentUploadService�
UploadConversionAdjustmentsE.google.ads.googleads.v10.services.UploadConversionAdjustmentsRequestF.google.ads.googleads.v10.services.UploadConversionAdjustmentsResponse"z���?":/v10/customers/{customer_id=*}:uploadConversionAdjustments:*�A2customer_id,conversion_adjustments,partial_failureE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v10.servicesB&ConversionAdjustmentUploadServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v10/services;services�GAA�!Google.Ads.GoogleAds.V10.Services�!Google\\Ads\\GoogleAds\\V10\\Services�%Google::Ads::GoogleAds::V10::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

