<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/resources/offline_conversion_upload_client_summary.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Resources;

class OfflineConversionUploadClientSummary
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
Egoogle/ads/googleads/v17/enums/offline_event_upload_client_enum.protogoogle.ads.googleads.v17.enums"�
OfflineEventUploadClientEnum"
OfflineEventUploadClient
UNSPECIFIED 
UNKNOWN
GOOGLE_ADS_API
GOOGLE_ADS_WEB_CLIENT
ADS_DATA_CONNECTORB�
"com.google.ads.googleads.v17.enumsB!OfflineEventUploadClientEnumProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
0google/ads/googleads/v17/errors/date_error.protogoogle.ads.googleads.v17.errors"�
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
#com.google.ads.googleads.v17.errorsBDateErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/errors;errors�GAA�Google.Ads.GoogleAds.V17.Errors�Google\\Ads\\GoogleAds\\V17\\Errors�#Google::Ads::GoogleAds::V17::Errorsbproto3
�
4google/ads/googleads/v17/errors/distinct_error.protogoogle.ads.googleads.v17.errors"m
DistinctErrorEnum"X
DistinctError
UNSPECIFIED 
UNKNOWN
DUPLICATE_ELEMENT
DUPLICATE_TYPEB�
#com.google.ads.googleads.v17.errorsBDistinctErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/errors;errors�GAA�Google.Ads.GoogleAds.V17.Errors�Google\\Ads\\GoogleAds\\V17\\Errors�#Google::Ads::GoogleAds::V17::Errorsbproto3
�
Ngoogle/ads/googleads/v17/enums/offline_conversion_diagnostic_status_enum.protogoogle.ads.googleads.v17.enums"�
%OfflineConversionDiagnosticStatusEnum"�
!OfflineConversionDiagnosticStatus
UNSPECIFIED 
UNKNOWN
	EXCELLENT
GOOD
NEEDS_ATTENTION
NO_RECENT_UPLOADB�
"com.google.ads.googleads.v17.enumsB*OfflineConversionDiagnosticStatusEnumProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
=google/ads/googleads/v17/errors/conversion_upload_error.protogoogle.ads.googleads.v17.errors"�
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
3CUSTOMER_NOT_ENABLED_ENHANCED_CONVERSIONS_FOR_LEADS2
INVALID_JOB_ID4
NO_CONVERSION_ACTION_FOUND5"
INVALID_CONVERSION_ACTION_TYPE6B�
#com.google.ads.googleads.v17.errorsBConversionUploadErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/errors;errors�GAA�Google.Ads.GoogleAds.V17.Errors�Google\\Ads\\GoogleAds\\V17\\Errors�#Google::Ads::GoogleAds::V17::Errorsbproto3
�
;google/ads/googleads/v17/errors/not_allowlisted_error.protogoogle.ads.googleads.v17.errors"}
NotAllowlistedErrorEnum"b
NotAllowlistedError
UNSPECIFIED 
UNKNOWN-
)CUSTOMER_NOT_ALLOWLISTED_FOR_THIS_FEATUREB�
#com.google.ads.googleads.v17.errorsBNotAllowlistedErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/errors;errors�GAA�Google.Ads.GoogleAds.V17.Errors�Google\\Ads\\GoogleAds\\V17\\Errors�#Google::Ads::GoogleAds::V17::Errorsbproto3
�
9google/ads/googleads/v17/errors/string_format_error.protogoogle.ads.googleads.v17.errors"q
StringFormatErrorEnum"X
StringFormatError
UNSPECIFIED 
UNKNOWN
ILLEGAL_CHARS
INVALID_FORMATB�
#com.google.ads.googleads.v17.errorsBStringFormatErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/errors;errors�GAA�Google.Ads.GoogleAds.V17.Errors�Google\\Ads\\GoogleAds\\V17\\Errors�#Google::Ads::GoogleAds::V17::Errorsbproto3
�
2google/ads/googleads/v17/errors/mutate_error.protogoogle.ads.googleads.v17.errors"�
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
#com.google.ads.googleads.v17.errorsBMutateErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/errors;errors�GAA�Google.Ads.GoogleAds.V17.Errors�Google\\Ads\\GoogleAds\\V17\\Errors�#Google::Ads::GoogleAds::V17::Errorsbproto3
�
9google/ads/googleads/v17/errors/string_length_error.protogoogle.ads.googleads.v17.errors"r
StringLengthErrorEnum"Y
StringLengthError
UNSPECIFIED 
UNKNOWN	
EMPTY
	TOO_SHORT
TOO_LONGB�
#com.google.ads.googleads.v17.errorsBStringLengthErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/errors;errors�GAA�Google.Ads.GoogleAds.V17.Errors�Google\\Ads\\GoogleAds\\V17\\Errors�#Google::Ads::GoogleAds::V17::Errorsbproto3
�
1google/ads/googleads/v17/errors/field_error.protogoogle.ads.googleads.v17.errors"�
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
#com.google.ads.googleads.v17.errorsBFieldErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/errors;errors�GAA�Google.Ads.GoogleAds.V17.Errors�Google\\Ads\\GoogleAds\\V17\\Errors�#Google::Ads::GoogleAds::V17::Errorsbproto3
�

Hgoogle/ads/googleads/v17/errors/conversion_adjustment_upload_error.protogoogle.ads.googleads.v17.errors"�
#ConversionAdjustmentUploadErrorEnum"�
ConversionAdjustmentUploadError
UNSPECIFIED 
UNKNOWN 
TOO_RECENT_CONVERSION_ACTION 
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
ORDER_ID_CONTAINS_PII
INVALID_JOB_ID
NO_CONVERSION_ACTION_FOUND"
INVALID_CONVERSION_ACTION_TYPEB�
#com.google.ads.googleads.v17.errorsB$ConversionAdjustmentUploadErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/errors;errors�GAA�Google.Ads.GoogleAds.V17.Errors�Google\\Ads\\GoogleAds\\V17\\Errors�#Google::Ads::GoogleAds::V17::Errorsbproto3
�
;google/ads/googleads/v17/errors/collection_size_error.protogoogle.ads.googleads.v17.errors"i
CollectionSizeErrorEnum"N
CollectionSizeError
UNSPECIFIED 
UNKNOWN
TOO_FEW
TOO_MANYB�
#com.google.ads.googleads.v17.errorsBCollectionSizeErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/errors;errors�GAA�Google.Ads.GoogleAds.V17.Errors�Google\\Ads\\GoogleAds\\V17\\Errors�#Google::Ads::GoogleAds::V17::Errorsbproto3
�
Qgoogle/ads/googleads/v17/resources/offline_conversion_upload_client_summary.proto"google.ads.googleads.v17.resourcesEgoogle/ads/googleads/v17/enums/offline_event_upload_client_enum.proto;google/ads/googleads/v17/errors/collection_size_error.protoHgoogle/ads/googleads/v17/errors/conversion_adjustment_upload_error.proto=google/ads/googleads/v17/errors/conversion_upload_error.proto0google/ads/googleads/v17/errors/date_error.proto4google/ads/googleads/v17/errors/distinct_error.proto1google/ads/googleads/v17/errors/field_error.proto2google/ads/googleads/v17/errors/mutate_error.proto;google/ads/googleads/v17/errors/not_allowlisted_error.proto9google/ads/googleads/v17/errors/string_format_error.proto9google/ads/googleads/v17/errors/string_length_error.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
$OfflineConversionUploadClientSummary\\
resource_name (	BE�A�A?
=googleads.googleapis.com/OfflineConversionUploadClientSummaryj
client (2U.google.ads.googleads.v17.enums.OfflineEventUploadClientEnum.OfflineEventUploadClientB�A|
status (2g.google.ads.googleads.v17.enums.OfflineConversionDiagnosticStatusEnum.OfflineConversionDiagnosticStatusB�A
total_event_count (B�A#
successful_event_count (B�A
success_rate (B�A"
last_upload_date_time (	B�AZ
daily_summaries (2<.google.ads.googleads.v17.resources.OfflineConversionSummaryB�AX
job_summaries	 (2<.google.ads.googleads.v17.resources.OfflineConversionSummaryB�AO
alerts
 (2:.google.ads.googleads.v17.resources.OfflineConversionAlertB�A:��A�
=googleads.googleapis.com/OfflineConversionUploadClientSummaryGcustomers/{customer_id}/offlineConversionUploadClientSummaries/{client}"�
OfflineConversionSummary
successful_count (B�A
failed_count (B�A
job_id (B�AH 
upload_date (	B�AH B
dimension_key"�
OfflineConversionAlertN
error (2:.google.ads.googleads.v17.resources.OfflineConversionErrorB�A
error_percentage (B�A"�
OfflineConversionErrorr
collection_size_error (2L.google.ads.googleads.v17.errors.CollectionSizeErrorEnum.CollectionSizeErrorB�AH �
"conversion_adjustment_upload_error (2d.google.ads.googleads.v17.errors.ConversionAdjustmentUploadErrorEnum.ConversionAdjustmentUploadErrorB�AH x
conversion_upload_error (2P.google.ads.googleads.v17.errors.ConversionUploadErrorEnum.ConversionUploadErrorB�AH S

date_error (28.google.ads.googleads.v17.errors.DateErrorEnum.DateErrorB�AH _
distinct_error (2@.google.ads.googleads.v17.errors.DistinctErrorEnum.DistinctErrorB�AH V
field_error (2:.google.ads.googleads.v17.errors.FieldErrorEnum.FieldErrorB�AH Y
mutate_error (2<.google.ads.googleads.v17.errors.MutateErrorEnum.MutateErrorB�AH r
not_allowlisted_error (2L.google.ads.googleads.v17.errors.NotAllowlistedErrorEnum.NotAllowlistedErrorB�AH l
string_format_error	 (2H.google.ads.googleads.v17.errors.StringFormatErrorEnum.StringFormatErrorB�AH l
string_length_error
 (2H.google.ads.googleads.v17.errors.StringLengthErrorEnum.StringLengthErrorB�AH B

error_codeB�
&com.google.ads.googleads.v17.resourcesB)OfflineConversionUploadClientSummaryProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v17/resources;resources�GAA�"Google.Ads.GoogleAds.V17.Resources�"Google\\Ads\\GoogleAds\\V17\\Resources�&Google::Ads::GoogleAds::V17::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

