<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/conversion_upload_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Services;

class ConversionUploadService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\FieldInfo::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
;google/ads/googleads/v20/enums/user_identifier_source.protogoogle.ads.googleads.v20.enums"r
UserIdentifierSourceEnum"V
UserIdentifierSource
UNSPECIFIED 
UNKNOWN
FIRST_PARTY
THIRD_PARTYB�
"com.google.ads.googleads.v20.enumsBUserIdentifierSourceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
@google/ads/googleads/v20/enums/conversion_environment_enum.protogoogle.ads.googleads.v20.enums"d
ConversionEnvironmentEnum"G
ConversionEnvironment
UNSPECIFIED 
UNKNOWN
APP
WEBB�
"com.google.ads.googleads.v20.enumsBConversionEnvironmentEnumProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
=google/ads/googleads/v20/enums/conversion_customer_type.protogoogle.ads.googleads.v20.enums"l
ConversionCustomerTypeEnum"N
ConversionCustomerType
UNSPECIFIED 
UNKNOWN
NEW
	RETURNINGB�
"com.google.ads.googleads.v20.enumsBConversionCustomerTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
3google/ads/googleads/v20/enums/consent_status.protogoogle.ads.googleads.v20.enums"[
ConsentStatusEnum"F
ConsentStatus
UNSPECIFIED 
UNKNOWN
GRANTED

DENIEDB�
"com.google.ads.googleads.v20.enumsBConsentStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
-google/ads/googleads/v20/common/consent.protogoogle.ads.googleads.v20.common"�
ConsentU
ad_user_data (2?.google.ads.googleads.v20.enums.ConsentStatusEnum.ConsentStatus[
ad_personalization (2?.google.ads.googleads.v20.enums.ConsentStatusEnum.ConsentStatusB�
#com.google.ads.googleads.v20.commonBConsentProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v20/common;common�GAA�Google.Ads.GoogleAds.V20.Common�Google\\Ads\\GoogleAds\\V20\\Common�#Google::Ads::GoogleAds::V20::Commonbproto3
�
7google/ads/googleads/v20/common/offline_user_data.protogoogle.ads.googleads.v20.common;google/ads/googleads/v20/enums/user_identifier_source.protogoogle/api/field_behavior.proto"�
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
user_identifier_source (2M.google.ads.googleads.v20.enums.UserIdentifierSourceEnum.UserIdentifierSource
hashed_email (	H 
hashed_phone_number (	H 
	mobile_id	 (	H 
third_party_user_id
 (	H O
address_info (27.google.ads.googleads.v20.common.OfflineUserAddressInfoH B

identifier"�
TransactionAttribute"
transaction_date_time (	H �&
transaction_amount_micros	 (H�
currency_code
 (	H�
conversion_action (	H�
order_id (	H�H
store_attribute (2/.google.ads.googleads.v20.common.StoreAttribute
custom_value (	H�F
item_attribute (2..google.ads.googleads.v20.common.ItemAttributeB
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
_merchant_id"�
UserDataI
user_identifiers (2/.google.ads.googleads.v20.common.UserIdentifierT
transaction_attribute (25.google.ads.googleads.v20.common.TransactionAttributeF
user_attribute (2..google.ads.googleads.v20.common.UserAttribute>
consent (2(.google.ads.googleads.v20.common.ConsentH �B

_consent"�
UserAttribute"
lifetime_value_micros (H �"
lifetime_value_bucket (H�
last_purchase_date_time (	
average_purchase_count (%
average_purchase_value_micros (
acquisition_date_time (	O
shopping_loyalty (20.google.ads.googleads.v20.common.ShoppingLoyaltyH�
lifecycle_stage (	B�A%
first_purchase_date_time	 (	B�AM
event_attribute
 (2/.google.ads.googleads.v20.common.EventAttributeB�AB
_lifetime_value_microsB
_lifetime_value_bucketB
_shopping_loyalty"�
EventAttribute
event (	B�A
event_date_time (	B�AP
item_attribute (23.google.ads.googleads.v20.common.EventItemAttributeB�A"*
EventItemAttribute
item_id (	B�A"=
ShoppingLoyalty
loyalty_tier (	H �B
_loyalty_tier"�
CustomerMatchUserListMetadata
	user_list (	H �>
consent (2(.google.ads.googleads.v20.common.ConsentH�B

_user_listB

_consent"�
StoreSalesMetadata
loyalty_fraction (H �(
transaction_upload_fraction (H�

custom_key (	H�[
third_party_metadata (2=.google.ads.googleads.v20.common.StoreSalesThirdPartyMetadataB
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
#com.google.ads.googleads.v20.commonBOfflineUserDataProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v20/common;common�GAA�Google.Ads.GoogleAds.V20.Common�Google\\Ads\\GoogleAds\\V20\\Common�#Google::Ads::GoogleAds::V20::Commonbproto3
�\'
Agoogle/ads/googleads/v20/services/conversion_upload_service.proto!google.ads.googleads.v20.services7google/ads/googleads/v20/common/offline_user_data.proto=google/ads/googleads/v20/enums/conversion_customer_type.proto@google/ads/googleads/v20/enums/conversion_environment_enum.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/field_info.protogoogle/api/resource.protogoogle/rpc/status.proto"�
UploadClickConversionsRequest
customer_id (	B�AL
conversions (22.google.ads.googleads.v20.services.ClickConversionB�A
partial_failure (B�A
validate_only (
debug_enabled (
job_id (B�AH �B	
_job_id"�
UploadClickConversionsResponse1
partial_failure_error (2.google.rpc.StatusI
results (28.google.ads.googleads.v20.services.ClickConversionResult
job_id ("�
UploadCallConversionsRequest
customer_id (	B�AK
conversions (21.google.ads.googleads.v20.services.CallConversionB�A
partial_failure (B�A
validate_only ("�
UploadCallConversionsResponse1
partial_failure_error (2.google.rpc.StatusH
results (27.google.ads.googleads.v20.services.CallConversionResult"�
ClickConversion
gclid	 (	H�
gbraid (	
wbraid (	
conversion_action
 (	H�!
conversion_date_time (	H�
conversion_value (H�
currency_code (	H�
order_id (	H�]
external_attribution_data (2:.google.ads.googleads.v20.services.ExternalAttributionDataK
custom_variables (21.google.ads.googleads.v20.services.CustomVariable>
	cart_data (2+.google.ads.googleads.v20.services.CartDataI
user_identifiers (2/.google.ads.googleads.v20.common.UserIdentifiero
conversion_environment (2O.google.ads.googleads.v20.enums.ConversionEnvironmentEnum.ConversionEnvironment9
consent (2(.google.ads.googleads.v20.common.Consenth
customer_type (2Q.google.ads.googleads.v20.enums.ConversionCustomerTypeEnum.ConversionCustomerType&
user_ip_address (	B���H�$
session_attributes_encoded (H o
"session_attributes_key_value_pairs (2A.google.ads.googleads.v20.services.SessionAttributesKeyValuePairsH B
session_attributesB
_gclidB
_conversion_actionB
_conversion_date_timeB
_conversion_valueB
_currency_codeB
	_order_idB
_user_ip_address"�
CallConversion
	caller_id (	H �!
call_start_date_time (	H�
conversion_action	 (	H�!
conversion_date_time
 (	H�
conversion_value (H�
currency_code (	H�K
custom_variables (21.google.ads.googleads.v20.services.CustomVariable9
consent (2(.google.ads.googleads.v20.common.ConsentB

_caller_idB
_call_start_date_timeB
_conversion_actionB
_conversion_date_timeB
_conversion_valueB
_currency_code"�
ExternalAttributionData(
external_attribution_credit (H �\'
external_attribution_model (	H�B
_external_attribution_creditB
_external_attribution_model"�
ClickConversionResult
gclid (	H �
gbraid (	
wbraid	 (	
conversion_action (	H�!
conversion_date_time (	H�I
user_identifiers (2/.google.ads.googleads.v20.common.UserIdentifierB
_gclidB
_conversion_actionB
_conversion_date_time"�
CallConversionResult
	caller_id (	H �!
call_start_date_time (	H�
conversion_action (	H�!
conversion_date_time (	H�B

_caller_idB
_call_start_date_timeB
_conversion_actionB
_conversion_date_time"{
CustomVariableZ
conversion_custom_variable (	B6�A3
1googleads.googleapis.com/ConversionCustomVariable
value (	"�
CartData
merchant_id (
feed_country_code (	
feed_language_code (	
local_transaction_cost (?
items (20.google.ads.googleads.v20.services.CartData.Item@
Item

product_id (	
quantity (

unit_price ("h
SessionAttributeKeyValuePair"
session_attribute_key (	B�A$
session_attribute_value (	B�A"
SessionAttributesKeyValuePairs]
key_value_pairs (2?.google.ads.googleads.v20.services.SessionAttributeKeyValuePairB�A2�
ConversionUploadService�
UploadClickConversions@.google.ads.googleads.v20.services.UploadClickConversionsRequestA.google.ads.googleads.v20.services.UploadClickConversionsResponse"j�A\'customer_id,conversions,partial_failure���:"5/v20/customers/{customer_id=*}:uploadClickConversions:*�
UploadCallConversions?.google.ads.googleads.v20.services.UploadCallConversionsRequest@.google.ads.googleads.v20.services.UploadCallConversionsResponse"i�A\'customer_id,conversions,partial_failure���9"4/v20/customers/{customer_id=*}:uploadCallConversions:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v20.servicesBConversionUploadServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v20/services;services�GAA�!Google.Ads.GoogleAds.V20.Services�!Google\\Ads\\GoogleAds\\V20\\Services�%Google::Ads::GoogleAds::V20::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

