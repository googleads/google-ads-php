<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/local_services_insurance_rejection_reason.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Enums;

class LocalServicesInsuranceRejectionReason
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
Ngoogle/ads/googleads/v20/enums/local_services_insurance_rejection_reason.protogoogle.ads.googleads.v20.enums"�
)LocalServicesInsuranceRejectionReasonEnum"�
%LocalServicesInsuranceRejectionReason
UNSPECIFIED 
UNKNOWN
BUSINESS_NAME_MISMATCH!
INSURANCE_AMOUNT_INSUFFICIENT
EXPIRED
NO_SIGNATURE
NO_POLICY_NUMBER#
NO_COMMERCIAL_GENERAL_LIABILITY
EDITABLE_FORMAT
CATEGORY_MISMATCH	
MISSING_EXPIRATION_DATE

POOR_QUALITY
POTENTIALLY_EDITED
WRONG_DOCUMENT_TYPE
	NON_FINAL	
OTHERB�
"com.google.ads.googleads.v20.enumsB*LocalServicesInsuranceRejectionReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

