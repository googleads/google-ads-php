<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/ad_group_ad_primary_status_reason.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Enums;

class AdGroupAdPrimaryStatusReason
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
Fgoogle/ads/googleads/v19/enums/ad_group_ad_primary_status_reason.protogoogle.ads.googleads.v19.enums"�
 AdGroupAdPrimaryStatusReasonEnum"�
AdGroupAdPrimaryStatusReason
UNSPECIFIED 
UNKNOWN
CAMPAIGN_REMOVED
CAMPAIGN_PAUSED
CAMPAIGN_PENDING
CAMPAIGN_ENDED
AD_GROUP_PAUSED
AD_GROUP_REMOVED
AD_GROUP_AD_PAUSED
AD_GROUP_AD_REMOVED	
AD_GROUP_AD_DISAPPROVED

AD_GROUP_AD_UNDER_REVIEW
AD_GROUP_AD_POOR_QUALITY
AD_GROUP_AD_NO_ADS 
AD_GROUP_AD_APPROVED_LABELED%
!AD_GROUP_AD_AREA_OF_INTEREST_ONLY
AD_GROUP_AD_UNDER_APPEALB�
"com.google.ads.googleads.v19.enumsB!AdGroupAdPrimaryStatusReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

