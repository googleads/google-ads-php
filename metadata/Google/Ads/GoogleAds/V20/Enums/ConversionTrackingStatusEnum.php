<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/conversion_tracking_status_enum.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Enums;

class ConversionTrackingStatusEnum
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
Dgoogle/ads/googleads/v20/enums/conversion_tracking_status_enum.protogoogle.ads.googleads.v20.enums"�
ConversionTrackingStatusEnum"�
ConversionTrackingStatus
UNSPECIFIED 
UNKNOWN
NOT_CONVERSION_TRACKED\'
#CONVERSION_TRACKING_MANAGED_BY_SELF/
+CONVERSION_TRACKING_MANAGED_BY_THIS_MANAGER2
.CONVERSION_TRACKING_MANAGED_BY_ANOTHER_MANAGERB�
"com.google.ads.googleads.v20.enumsB!ConversionTrackingStatusEnumProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

