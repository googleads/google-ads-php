<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/app_bidding_goal.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Enums;

class AppBiddingGoal
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
5google/ads/googleads/v20/enums/app_bidding_goal.protogoogle.ads.googleads.v20.enums"�
AppBiddingGoalEnum"�
AppBiddingGoal
UNSPECIFIED 
UNKNOWN*
&OPTIMIZE_FOR_INSTALL_CONVERSION_VOLUME)
%OPTIMIZE_FOR_IN_APP_CONVERSION_VOLUME\'
#OPTIMIZE_FOR_TOTAL_CONVERSION_VALUE)
%OPTIMIZE_FOR_TARGET_IN_APP_CONVERSION,
(OPTIMIZE_FOR_RETURN_ON_ADVERTISING_SPEND=
9OPTIMIZE_FOR_INSTALL_CONVERSION_VOLUME_WITHOUT_TARGET_CPI3
/OPTIMIZE_FOR_PRE_REGISTRATION_CONVERSION_VOLUMEB�
"com.google.ads.googleads.v20.enumsBAppBiddingGoalProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

