<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/offline_conversion_diagnostic_status_enum.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Enums;

class OfflineConversionDiagnosticStatusEnum
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
Ngoogle/ads/googleads/v19/enums/offline_conversion_diagnostic_status_enum.protogoogle.ads.googleads.v19.enums"�
%OfflineConversionDiagnosticStatusEnum"�
!OfflineConversionDiagnosticStatus
UNSPECIFIED 
UNKNOWN
	EXCELLENT
GOOD
NEEDS_ATTENTION
NO_RECENT_UPLOADB�
"com.google.ads.googleads.v19.enumsB*OfflineConversionDiagnosticStatusEnumProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

