<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/ad_group_criterion_primary_status.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Enums;

class AdGroupCriterionPrimaryStatus
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
Fgoogle/ads/googleads/v19/enums/ad_group_criterion_primary_status.protogoogle.ads.googleads.v19.enums"�
!AdGroupCriterionPrimaryStatusEnum"�
AdGroupCriterionPrimaryStatus
UNSPECIFIED 
UNKNOWN
ELIGIBLE

PAUSED
REMOVED
PENDING
NOT_ELIGIBLEB�
"com.google.ads.googleads.v19.enumsB"AdGroupCriterionPrimaryStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

