<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/ad_group_criterion_primary_status_reason.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Enums;

class AdGroupCriterionPrimaryStatusReason
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
Mgoogle/ads/googleads/v19/enums/ad_group_criterion_primary_status_reason.protogoogle.ads.googleads.v19.enums"�
\'AdGroupCriterionPrimaryStatusReasonEnum"�
#AdGroupCriterionPrimaryStatusReason
UNSPECIFIED 
UNKNOWN
CAMPAIGN_PENDING
CAMPAIGN_CRITERION_NEGATIVE
CAMPAIGN_PAUSED
CAMPAIGN_REMOVED
CAMPAIGN_ENDED
AD_GROUP_PAUSED
AD_GROUP_REMOVED"
AD_GROUP_CRITERION_DISAPPROVED	$
 AD_GROUP_CRITERION_RARELY_SERVED
"
AD_GROUP_CRITERION_LOW_QUALITY#
AD_GROUP_CRITERION_UNDER_REVIEW%
!AD_GROUP_CRITERION_PENDING_REVIEW+
\'AD_GROUP_CRITERION_BELOW_FIRST_PAGE_BID
AD_GROUP_CRITERION_NEGATIVE!
AD_GROUP_CRITERION_RESTRICTED
AD_GROUP_CRITERION_PAUSED1
-AD_GROUP_CRITERION_PAUSED_DUE_TO_LOW_ACTIVITY
AD_GROUP_CRITERION_REMOVEDB�
"com.google.ads.googleads.v19.enumsB(AdGroupCriterionPrimaryStatusReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

