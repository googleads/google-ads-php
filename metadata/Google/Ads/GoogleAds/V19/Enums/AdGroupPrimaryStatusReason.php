<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/ad_group_primary_status_reason.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Enums;

class AdGroupPrimaryStatusReason
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
Cgoogle/ads/googleads/v19/enums/ad_group_primary_status_reason.protogoogle.ads.googleads.v19.enums"�
AdGroupPrimaryStatusReasonEnum"�
AdGroupPrimaryStatusReason
UNSPECIFIED 
UNKNOWN
CAMPAIGN_REMOVED
CAMPAIGN_PAUSED
CAMPAIGN_PENDING
CAMPAIGN_ENDED
AD_GROUP_PAUSED
AD_GROUP_REMOVED
AD_GROUP_INCOMPLETE
KEYWORDS_PAUSED	
NO_KEYWORDS

AD_GROUP_ADS_PAUSED
NO_AD_GROUP_ADS
HAS_ADS_DISAPPROVED
HAS_ADS_LIMITED_BY_POLICY
MOST_ADS_UNDER_REVIEW
CAMPAIGN_DRAFT\'
#AD_GROUP_PAUSED_DUE_TO_LOW_ACTIVITYB�
"com.google.ads.googleads.v19.enumsBAdGroupPrimaryStatusReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

