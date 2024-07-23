<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/services/conversion_goal_campaign_config_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Services;

class ConversionGoalCampaignConfigService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
6google/ads/googleads/v17/enums/goal_config_level.protogoogle.ads.googleads.v17.enums"b
GoalConfigLevelEnum"K
GoalConfigLevel
UNSPECIFIED 
UNKNOWN
CUSTOMER
CAMPAIGNB�
"com.google.ads.googleads.v17.enumsBGoalConfigLevelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
:google/ads/googleads/v17/enums/response_content_type.protogoogle.ads.googleads.v17.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v17.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
Hgoogle/ads/googleads/v17/resources/conversion_goal_campaign_config.proto"google.ads.googleads.v17.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
ConversionGoalCampaignConfigT
resource_name (	B=�A�A7
5googleads.googleapis.com/ConversionGoalCampaignConfig;
campaign (	B)�A�A#
!googleads.googleapis.com/Campaign^
goal_config_level (2C.google.ads.googleads.v17.enums.GoalConfigLevelEnum.GoalConfigLevelR
custom_conversion_goal (	B2�A/
-googleads.googleapis.com/CustomConversionGoal:�A|
5googleads.googleapis.com/ConversionGoalCampaignConfigCcustomers/{customer_id}/conversionGoalCampaignConfigs/{campaign_id}B�
&com.google.ads.googleads.v17.resourcesB!ConversionGoalCampaignConfigProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v17/resources;resources�GAA�"Google.Ads.GoogleAds.V17.Resources�"Google\\Ads\\GoogleAds\\V17\\Resources�&Google::Ads::GoogleAds::V17::Resourcesbproto3
�
Ogoogle/ads/googleads/v17/services/conversion_goal_campaign_config_service.proto!google.ads.googleads.v17.servicesHgoogle/ads/googleads/v17/resources/conversion_goal_campaign_config.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.proto"�
*MutateConversionGoalCampaignConfigsRequest
customer_id (	B�Aa

operations (2H.google.ads.googleads.v17.services.ConversionGoalCampaignConfigOperationB�A
validate_only (j
response_content_type (2K.google.ads.googleads.v17.enums.ResponseContentTypeEnum.ResponseContentType"�
%ConversionGoalCampaignConfigOperation/
update_mask (2.google.protobuf.FieldMaskR
update (2@.google.ads.googleads.v17.resources.ConversionGoalCampaignConfigH B
	operation"�
+MutateConversionGoalCampaignConfigsResponse\\
results (2K.google.ads.googleads.v17.services.MutateConversionGoalCampaignConfigResult"�
(MutateConversionGoalCampaignConfigResultQ
resource_name (	B:�A7
5googleads.googleapis.com/ConversionGoalCampaignConfigi
conversion_goal_campaign_config (2@.google.ads.googleads.v17.resources.ConversionGoalCampaignConfig2�
#ConversionGoalCampaignConfigService�
#MutateConversionGoalCampaignConfigsM.google.ads.googleads.v17.services.MutateConversionGoalCampaignConfigsRequestN.google.ads.googleads.v17.services.MutateConversionGoalCampaignConfigsResponse"g�Acustomer_id,operations���H"C/v17/customers/{customer_id=*}/conversionGoalCampaignConfigs:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v17.servicesB(ConversionGoalCampaignConfigServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v17/services;services�GAA�!Google.Ads.GoogleAds.V17.Services�!Google\\Ads\\GoogleAds\\V17\\Services�%Google::Ads::GoogleAds::V17::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

