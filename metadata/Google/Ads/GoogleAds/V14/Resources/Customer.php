<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v14/resources/customer.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V14\Resources;

class Customer
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
�
9google/ads/googleads/v14/errors/string_format_error.protogoogle.ads.googleads.v14.errors"q
StringFormatErrorEnum"X
StringFormatError
UNSPECIFIED 
UNKNOWN
ILLEGAL_CHARS
INVALID_FORMATB�
#com.google.ads.googleads.v14.errorsBStringFormatErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v14/errors;errors�GAA�Google.Ads.GoogleAds.V14.Errors�Google\\Ads\\GoogleAds\\V14\\Errors�#Google::Ads::GoogleAds::V14::Errorsbproto3
�
;google/ads/googleads/v14/errors/collection_size_error.protogoogle.ads.googleads.v14.errors"i
CollectionSizeErrorEnum"N
CollectionSizeError
UNSPECIFIED 
UNKNOWN
TOO_FEW
TOO_MANYB�
#com.google.ads.googleads.v14.errorsBCollectionSizeErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v14/errors;errors�GAA�Google.Ads.GoogleAds.V14.Errors�Google\\Ads\\GoogleAds\\V14\\Errors�#Google::Ads::GoogleAds::V14::Errorsbproto3
�

Hgoogle/ads/googleads/v14/errors/conversion_adjustment_upload_error.protogoogle.ads.googleads.v14.errors"�
#ConversionAdjustmentUploadErrorEnum"�
ConversionAdjustmentUploadError
UNSPECIFIED 
UNKNOWN 
TOO_RECENT_CONVERSION_ACTION
INVALID_CONVERSION_ACTION 
CONVERSION_ALREADY_RETRACTED
CONVERSION_NOT_FOUND
CONVERSION_EXPIRED"
ADJUSTMENT_PRECEDES_CONVERSION!
MORE_RECENT_RESTATEMENT_FOUND
TOO_RECENT_CONVERSION	N
JCANNOT_RESTATE_CONVERSION_ACTION_THAT_ALWAYS_USES_DEFAULT_CONVERSION_VALUE
#
TOO_MANY_ADJUSTMENTS_IN_REQUEST
TOO_MANY_ADJUSTMENTS
RESTATEMENT_ALREADY_EXISTS#
DUPLICATE_ADJUSTMENT_IN_REQUEST-
)CUSTOMER_NOT_ACCEPTED_CUSTOMER_DATA_TERMS2
.CONVERSION_ACTION_NOT_ELIGIBLE_FOR_ENHANCEMENT
INVALID_USER_IDENTIFIER
UNSUPPORTED_USER_IDENTIFIER.
*GCLID_DATE_TIME_PAIR_AND_ORDER_ID_BOTH_SET
CONVERSION_ALREADY_ENHANCED$
 DUPLICATE_ENHANCEMENT_IN_REQUEST.
*CUSTOMER_DATA_POLICY_PROHIBITS_ENHANCEMENT 
MISSING_ORDER_ID_FOR_WEBPAGE
ORDER_ID_CONTAINS_PIIB�
#com.google.ads.googleads.v14.errorsB$ConversionAdjustmentUploadErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v14/errors;errors�GAA�Google.Ads.GoogleAds.V14.Errors�Google\\Ads\\GoogleAds\\V14\\Errors�#Google::Ads::GoogleAds::V14::Errorsbproto3
�
9google/ads/googleads/v14/errors/string_length_error.protogoogle.ads.googleads.v14.errors"r
StringLengthErrorEnum"Y
StringLengthError
UNSPECIFIED 
UNKNOWN	
EMPTY
	TOO_SHORT
TOO_LONGB�
#com.google.ads.googleads.v14.errorsBStringLengthErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v14/errors;errors�GAA�Google.Ads.GoogleAds.V14.Errors�Google\\Ads\\GoogleAds\\V14\\Errors�#Google::Ads::GoogleAds::V14::Errorsbproto3
�
0google/ads/googleads/v14/errors/date_error.protogoogle.ads.googleads.v14.errors"�
DateErrorEnum"�
	DateError
UNSPECIFIED 
UNKNOWN 
INVALID_FIELD_VALUES_IN_DATE%
!INVALID_FIELD_VALUES_IN_DATE_TIME
INVALID_STRING_DATE#
INVALID_STRING_DATE_TIME_MICROS$
 INVALID_STRING_DATE_TIME_SECONDS0
,INVALID_STRING_DATE_TIME_SECONDS_WITH_OFFSET
EARLIER_THAN_MINIMUM_DATE
LATER_THAN_MAXIMUM_DATE3
/DATE_RANGE_MINIMUM_DATE_LATER_THAN_MAXIMUM_DATE	2
.DATE_RANGE_MINIMUM_AND_MAXIMUM_DATES_BOTH_NULL
B�
#com.google.ads.googleads.v14.errorsBDateErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v14/errors;errors�GAA�Google.Ads.GoogleAds.V14.Errors�Google\\Ads\\GoogleAds\\V14\\Errors�#Google::Ads::GoogleAds::V14::Errorsbproto3
�
4google/ads/googleads/v14/enums/customer_status.protogoogle.ads.googleads.v14.enums"z
CustomerStatusEnum"d
CustomerStatus
UNSPECIFIED 
UNKNOWN
ENABLED
CANCELED
	SUSPENDED

CLOSEDB�
"com.google.ads.googleads.v14.enumsBCustomerStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
[google/ads/googleads/v14/enums/customer_pay_per_conversion_eligibility_failure_reason.protogoogle.ads.googleads.v14.enums"�
4CustomerPayPerConversionEligibilityFailureReasonEnum"�
0CustomerPayPerConversionEligibilityFailureReason
UNSPECIFIED 
UNKNOWN
NOT_ENOUGH_CONVERSIONS
CONVERSION_LAG_TOO_HIGH#
HAS_CAMPAIGN_WITH_SHARED_BUDGET 
HAS_UPLOAD_CLICKS_CONVERSION 
AVERAGE_DAILY_SPEND_TOO_HIGH
ANALYSIS_NOT_COMPLETE	
OTHERB�
"com.google.ads.googleads.v14.enumsB5CustomerPayPerConversionEligibilityFailureReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
Dgoogle/ads/googleads/v14/enums/conversion_tracking_status_enum.protogoogle.ads.googleads.v14.enums"�
ConversionTrackingStatusEnum"�
ConversionTrackingStatus
UNSPECIFIED 
UNKNOWN
NOT_CONVERSION_TRACKED\'
#CONVERSION_TRACKING_MANAGED_BY_SELF/
+CONVERSION_TRACKING_MANAGED_BY_THIS_MANAGER2
.CONVERSION_TRACKING_MANAGED_BY_ANOTHER_MANAGERB�
"com.google.ads.googleads.v14.enumsB!ConversionTrackingStatusEnumProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
1google/ads/googleads/v14/errors/field_error.protogoogle.ads.googleads.v14.errors"�
FieldErrorEnum"�

FieldError
UNSPECIFIED 
UNKNOWN
REQUIRED
IMMUTABLE_FIELD
INVALID_VALUE
VALUE_MUST_BE_UNSET
REQUIRED_NONEMPTY_LIST
FIELD_CANNOT_BE_CLEARED
BLOCKED_VALUE	
FIELD_CAN_ONLY_BE_CLEARED
B�
#com.google.ads.googleads.v14.errorsBFieldErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v14/errors;errors�GAA�Google.Ads.GoogleAds.V14.Errors�Google\\Ads\\GoogleAds\\V14\\Errors�#Google::Ads::GoogleAds::V14::Errorsbproto3
�
Egoogle/ads/googleads/v14/enums/offline_event_upload_client_enum.protogoogle.ads.googleads.v14.enums"�
OfflineEventUploadClientEnum"
OfflineEventUploadClient
UNSPECIFIED 
UNKNOWN
GOOGLE_ADS_API
GOOGLE_ADS_WEB_CLIENT
ADS_DATA_CONNECTORB�
"com.google.ads.googleads.v14.enumsB!OfflineEventUploadClientEnumProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
4google/ads/googleads/v14/errors/distinct_error.protogoogle.ads.googleads.v14.errors"m
DistinctErrorEnum"X
DistinctError
UNSPECIFIED 
UNKNOWN
DUPLICATE_ELEMENT
DUPLICATE_TYPEB�
#com.google.ads.googleads.v14.errorsBDistinctErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v14/errors;errors�GAA�Google.Ads.GoogleAds.V14.Errors�Google\\Ads\\GoogleAds\\V14\\Errors�#Google::Ads::GoogleAds::V14::Errorsbproto3
�
;google/ads/googleads/v14/errors/not_allowlisted_error.protogoogle.ads.googleads.v14.errors"}
NotAllowlistedErrorEnum"b
NotAllowlistedError
UNSPECIFIED 
UNKNOWN-
)CUSTOMER_NOT_ALLOWLISTED_FOR_THIS_FEATUREB�
#com.google.ads.googleads.v14.errorsBNotAllowlistedErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v14/errors;errors�GAA�Google.Ads.GoogleAds.V14.Errors�Google\\Ads\\GoogleAds\\V14\\Errors�#Google::Ads::GoogleAds::V14::Errorsbproto3
�
Ngoogle/ads/googleads/v14/enums/offline_conversion_diagnostic_status_enum.protogoogle.ads.googleads.v14.enums"�
%OfflineConversionDiagnosticStatusEnum"�
!OfflineConversionDiagnosticStatus
UNSPECIFIED 
UNKNOWN
	EXCELLENT
GOOD
NEEDS_ATTENTION
NO_RECENT_UPLOADB�
"com.google.ads.googleads.v14.enumsB*OfflineConversionDiagnosticStatusEnumProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
2google/ads/googleads/v14/errors/mutate_error.protogoogle.ads.googleads.v14.errors"�
MutateErrorEnum"�
MutateError
UNSPECIFIED 
UNKNOWN
RESOURCE_NOT_FOUND!
ID_EXISTS_IN_MULTIPLE_MUTATES
INCONSISTENT_FIELD_VALUES
MUTATE_NOT_ALLOWED	
RESOURCE_NOT_IN_GOOGLE_ADS

RESOURCE_ALREADY_EXISTS+
\'RESOURCE_DOES_NOT_SUPPORT_VALIDATE_ONLY.
*OPERATION_DOES_NOT_SUPPORT_PARTIAL_FAILURE
RESOURCE_READ_ONLYB�
#com.google.ads.googleads.v14.errorsBMutateErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v14/errors;errors�GAA�Google.Ads.GoogleAds.V14.Errors�Google\\Ads\\GoogleAds\\V14\\Errors�#Google::Ads::GoogleAds::V14::Errorsbproto3
�
=google/ads/googleads/v14/errors/conversion_upload_error.protogoogle.ads.googleads.v14.errors"�
ConversionUploadErrorEnum"�
ConversionUploadError
UNSPECIFIED 
UNKNOWN#
TOO_MANY_CONVERSIONS_IN_REQUEST
UNPARSEABLE_GCLID
CONVERSION_PRECEDES_EVENT*
EXPIRED_EVENT+
TOO_RECENT_EVENT,
EVENT_NOT_FOUND-
UNAUTHORIZED_CUSTOMER
INVALID_CONVERSION_ACTION	 
TOO_RECENT_CONVERSION_ACTION
6
2CONVERSION_TRACKING_NOT_ENABLED_AT_IMPRESSION_TIMEQ
MEXTERNAL_ATTRIBUTION_DATA_SET_FOR_NON_EXTERNALLY_ATTRIBUTED_CONVERSION_ACTIONQ
MEXTERNAL_ATTRIBUTION_DATA_NOT_SET_FOR_EXTERNALLY_ATTRIBUTED_CONVERSION_ACTIONF
BORDER_ID_NOT_PERMITTED_FOR_EXTERNALLY_ATTRIBUTED_CONVERSION_ACTION
ORDER_ID_ALREADY_IN_USE
DUPLICATE_ORDER_ID
TOO_RECENT_CALL
EXPIRED_CALL
CALL_NOT_FOUND
CONVERSION_PRECEDES_CALL0
,CONVERSION_TRACKING_NOT_ENABLED_AT_CALL_TIME$
 UNPARSEABLE_CALLERS_PHONE_NUMBER#
CLICK_CONVERSION_ALREADY_EXISTS"
CALL_CONVERSION_ALREADY_EXISTS)
%DUPLICATE_CLICK_CONVERSION_IN_REQUEST(
$DUPLICATE_CALL_CONVERSION_IN_REQUEST
CUSTOM_VARIABLE_NOT_ENABLED&
"CUSTOM_VARIABLE_VALUE_CONTAINS_PII
INVALID_CUSTOMER_FOR_CLICK
INVALID_CUSTOMER_FOR_CALL,
(CONVERSION_NOT_COMPLIANT_WITH_ATT_POLICY 
CLICK_NOT_FOUND!
INVALID_USER_IDENTIFIER"N
JEXTERNALLY_ATTRIBUTED_CONVERSION_ACTION_NOT_PERMITTED_WITH_USER_IDENTIFIER#
UNSUPPORTED_USER_IDENTIFIER$
GBRAID_WBRAID_BOTH_SET&
UNPARSEABLE_WBRAID\'
UNPARSEABLE_GBRAID(<
8ONE_PER_CLICK_CONVERSION_ACTION_NOT_PERMITTED_WITH_BRAID.7
3CUSTOMER_DATA_POLICY_PROHIBITS_ENHANCED_CONVERSIONS/-
)CUSTOMER_NOT_ACCEPTED_CUSTOMER_DATA_TERMS0
ORDER_ID_CONTAINS_PII17
3CUSTOMER_NOT_ENABLED_ENHANCED_CONVERSIONS_FOR_LEADS2B�
#com.google.ads.googleads.v14.errorsBConversionUploadErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v14/errors;errors�GAA�Google.Ads.GoogleAds.V14.Errors�Google\\Ads\\GoogleAds\\V14\\Errors�#Google::Ads::GoogleAds::V14::Errorsbproto3
�0
1google/ads/googleads/v14/resources/customer.proto"google.ads.googleads.v14.resources[google/ads/googleads/v14/enums/customer_pay_per_conversion_eligibility_failure_reason.proto4google/ads/googleads/v14/enums/customer_status.protoNgoogle/ads/googleads/v14/enums/offline_conversion_diagnostic_status_enum.protoEgoogle/ads/googleads/v14/enums/offline_event_upload_client_enum.proto;google/ads/googleads/v14/errors/collection_size_error.protoHgoogle/ads/googleads/v14/errors/conversion_adjustment_upload_error.proto=google/ads/googleads/v14/errors/conversion_upload_error.proto0google/ads/googleads/v14/errors/date_error.proto4google/ads/googleads/v14/errors/distinct_error.proto1google/ads/googleads/v14/errors/field_error.proto2google/ads/googleads/v14/errors/mutate_error.proto;google/ads/googleads/v14/errors/not_allowlisted_error.proto9google/ads/googleads/v14/errors/string_format_error.proto9google/ads/googleads/v14/errors/string_length_error.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
Customer@
resource_name (	B)�A�A#
!googleads.googleapis.com/Customer
id (B�AH �
descriptive_name (	H�
currency_code (	B�AH�
	time_zone (	B�AH�"
tracking_url_template (	H�
final_url_suffix (	H�!
auto_tagging_enabled (H�$
has_partners_badge (B�AH�
manager (B�AH�
test_account (B�AH	�X
call_reporting_setting
 (28.google.ads.googleads.v14.resources.CallReportingSettingg
conversion_tracking_setting (2=.google.ads.googleads.v14.resources.ConversionTrackingSettingB�AX
remarketing_setting (26.google.ads.googleads.v14.resources.RemarketingSettingB�A�
.pay_per_conversion_eligibility_failure_reasons (2�.google.ads.googleads.v14.enums.CustomerPayPerConversionEligibilityFailureReasonEnum.CustomerPayPerConversionEligibilityFailureReasonB�A$
optimization_score (B�AH
�&
optimization_score_weight (B�AV
status$ (2A.google.ads.googleads.v14.enums.CustomerStatusEnum.CustomerStatusB�A4
"location_asset_auto_migration_done& (B�AH�1
image_asset_auto_migration_done\' (B�AH�>
,location_asset_auto_migration_done_date_time( (	B�AH�;
)image_asset_auto_migration_done_date_time) (	B�AH�t
#offline_conversion_client_summaries+ (2B.google.ads.googleads.v14.resources.OfflineConversionClientSummaryB�Ae
customer_agreement_setting, (2<.google.ads.googleads.v14.resources.CustomerAgreementSettingB�A:?�A<
!googleads.googleapis.com/Customercustomers/{customer_id}B
_idB
_descriptive_nameB
_currency_codeB

_time_zoneB
_tracking_url_templateB
_final_url_suffixB
_auto_tagging_enabledB
_has_partners_badgeB

_managerB
_test_accountB
_optimization_scoreB%
#_location_asset_auto_migration_doneB"
 _image_asset_auto_migration_doneB/
-_location_asset_auto_migration_done_date_timeB,
*_image_asset_auto_migration_done_date_time"�
CallReportingSetting#
call_reporting_enabled
 (H �.
!call_conversion_reporting_enabled (H�S
call_conversion_action (	B.�A+
)googleads.googleapis.com/ConversionActionH�B
_call_reporting_enabledB$
"_call_conversion_reporting_enabledB
_call_conversion_action"�
ConversionTrackingSetting(
conversion_tracking_id (B�AH �6
$cross_account_conversion_tracking_id (B�AH�)
accepted_customer_data_terms (B�A~
conversion_tracking_status (2U.google.ads.googleads.v14.enums.ConversionTrackingStatusEnum.ConversionTrackingStatusB�A3
&enhanced_conversions_for_leads_enabled (B�A+
google_ads_conversion_customer (	B�AB
_conversion_tracking_idB\'
%_cross_account_conversion_tracking_id"Y
RemarketingSetting(
google_global_site_tag (	B�AH �B
_google_global_site_tag"�
OfflineConversionClientSummaryj
client (2U.google.ads.googleads.v14.enums.OfflineEventUploadClientEnum.OfflineEventUploadClientB�A|
status (2g.google.ads.googleads.v14.enums.OfflineConversionDiagnosticStatusEnum.OfflineConversionDiagnosticStatusB�A
total_event_count (B�A#
successful_event_count (B�A
success_rate (B�A"
last_upload_date_time (	B�A`
daily_summaries (2B.google.ads.googleads.v14.resources.OfflineConversionUploadSummaryB�A^
job_summaries (2B.google.ads.googleads.v14.resources.OfflineConversionUploadSummaryB�AU
alerts	 (2@.google.ads.googleads.v14.resources.OfflineConversionUploadAlertB�A"�
OfflineConversionUploadSummary
successful_count (B�A
failed_count (B�A
job_id (B�AH 
upload_date (	B�AH B
dimension_key"�
OfflineConversionUploadAlertT
error (2@.google.ads.googleads.v14.resources.OfflineConversionUploadErrorB�A
error_percentage (B�A"�
OfflineConversionUploadErrorr
collection_size_error (2L.google.ads.googleads.v14.errors.CollectionSizeErrorEnum.CollectionSizeErrorB�AH �
"conversion_adjustment_upload_error (2d.google.ads.googleads.v14.errors.ConversionAdjustmentUploadErrorEnum.ConversionAdjustmentUploadErrorB�AH x
conversion_upload_error (2P.google.ads.googleads.v14.errors.ConversionUploadErrorEnum.ConversionUploadErrorB�AH S

date_error (28.google.ads.googleads.v14.errors.DateErrorEnum.DateErrorB�AH _
distinct_error (2@.google.ads.googleads.v14.errors.DistinctErrorEnum.DistinctErrorB�AH V
field_error (2:.google.ads.googleads.v14.errors.FieldErrorEnum.FieldErrorB�AH Y
mutate_error (2<.google.ads.googleads.v14.errors.MutateErrorEnum.MutateErrorB�AH r
not_allowlisted_error (2L.google.ads.googleads.v14.errors.NotAllowlistedErrorEnum.NotAllowlistedErrorB�AH l
string_format_error	 (2H.google.ads.googleads.v14.errors.StringFormatErrorEnum.StringFormatErrorB�AH l
string_length_error
 (2H.google.ads.googleads.v14.errors.StringLengthErrorEnum.StringLengthErrorB�AH B

error_code"A
CustomerAgreementSetting%
accepted_lead_form_terms (B�AB�
&com.google.ads.googleads.v14.resourcesBCustomerProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v14/resources;resources�GAA�"Google.Ads.GoogleAds.V14.Resources�"Google\\Ads\\GoogleAds\\V14\\Resources�&Google::Ads::GoogleAds::V14::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

