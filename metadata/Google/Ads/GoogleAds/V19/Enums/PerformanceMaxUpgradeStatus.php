<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/performance_max_upgrade_status.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Enums;

class PerformanceMaxUpgradeStatus
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
Cgoogle/ads/googleads/v19/enums/performance_max_upgrade_status.protogoogle.ads.googleads.v19.enums"�
PerformanceMaxUpgradeStatusEnum"�
PerformanceMaxUpgradeStatus
UNSPECIFIED 
UNKNOWN
UPGRADE_IN_PROGRESS
UPGRADE_COMPLETE
UPGRADE_FAILED
UPGRADE_ELIGIBLEB�
"com.google.ads.googleads.v19.enumsB PerformanceMaxUpgradeStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

