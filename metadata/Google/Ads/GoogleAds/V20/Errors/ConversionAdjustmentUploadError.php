<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/conversion_adjustment_upload_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Errors;

class ConversionAdjustmentUploadError
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�

Hgoogle/ads/googleads/v20/errors/conversion_adjustment_upload_error.protogoogle.ads.googleads.v20.errors"�
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
#com.google.ads.googleads.v20.errorsB$ConversionAdjustmentUploadErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v20/errors;errors�GAA�Google.Ads.GoogleAds.V20.Errors�Google\\Ads\\GoogleAds\\V20\\Errors�#Google::Ads::GoogleAds::V20::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

