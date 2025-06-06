<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/conversion_goal_campaign_config.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Resources;

class ConversionGoalCampaignConfig
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
6google/ads/googleads/v20/enums/goal_config_level.protogoogle.ads.googleads.v20.enums"b
GoalConfigLevelEnum"K
GoalConfigLevel
UNSPECIFIED 
UNKNOWN
CUSTOMER
CAMPAIGNB�
"com.google.ads.googleads.v20.enumsBGoalConfigLevelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
Hgoogle/ads/googleads/v20/resources/conversion_goal_campaign_config.proto"google.ads.googleads.v20.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
ConversionGoalCampaignConfigT
resource_name (	B=�A�A7
5googleads.googleapis.com/ConversionGoalCampaignConfig;
campaign (	B)�A�A#
!googleads.googleapis.com/Campaign^
goal_config_level (2C.google.ads.googleads.v20.enums.GoalConfigLevelEnum.GoalConfigLevelR
custom_conversion_goal (	B2�A/
-googleads.googleapis.com/CustomConversionGoal:�A|
5googleads.googleapis.com/ConversionGoalCampaignConfigCcustomers/{customer_id}/conversionGoalCampaignConfigs/{campaign_id}B�
&com.google.ads.googleads.v20.resourcesB!ConversionGoalCampaignConfigProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v20/resources;resources�GAA�"Google.Ads.GoogleAds.V20.Resources�"Google\\Ads\\GoogleAds\\V20\\Resources�&Google::Ads::GoogleAds::V20::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

