<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v15/enums/local_services_verification_status.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V15\Enums;

class LocalServicesVerificationStatus
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
Ggoogle/ads/googleads/v15/enums/local_services_verification_status.protogoogle.ads.googleads.v15.enums"�
#LocalServicesVerificationStatusEnum"�
LocalServicesVerificationStatus
UNSPECIFIED 
UNKNOWN
NEEDS_REVIEW

FAILED

PASSED
NOT_APPLICABLE
NO_SUBMISSION
PARTIAL_SUBMISSION
PENDING_ESCALATIONB�
"com.google.ads.googleads.v15.enumsB$LocalServicesVerificationStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v15/enums;enums�GAA�Google.Ads.GoogleAds.V15.Enums�Google\\Ads\\GoogleAds\\V15\\Enums�"Google::Ads::GoogleAds::V15::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

