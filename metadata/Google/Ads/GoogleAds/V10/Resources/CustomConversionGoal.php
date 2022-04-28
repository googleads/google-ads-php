<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/resources/custom_conversion_goal.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Resources;

class CustomConversionGoal
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
Bgoogle/ads/googleads/v10/enums/custom_conversion_goal_status.protogoogle.ads.googleads.v10.enums"v
CustomConversionGoalStatusEnum"T
CustomConversionGoalStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v10.enumsBCustomConversionGoalStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3
�
?google/ads/googleads/v10/resources/custom_conversion_goal.proto"google.ads.googleads.v10.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
CustomConversionGoalL
resource_name (	B5�A�A/
-googleads.googleapis.com/CustomConversionGoal
id (B�A
name (	J
conversion_actions (	B.�A+
)googleads.googleapis.com/ConversionActioni
status (2Y.google.ads.googleads.v10.enums.CustomConversionGoalStatusEnum.CustomConversionGoalStatus:k�Ah
-googleads.googleapis.com/CustomConversionGoal7customers/{customer_id}/customConversionGoals/{goal_id}B�
&com.google.ads.googleads.v10.resourcesBCustomConversionGoalProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v10/resources;resources�GAA�"Google.Ads.GoogleAds.V10.Resources�"Google\\Ads\\GoogleAds\\V10\\Resources�&Google::Ads::GoogleAds::V10::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

