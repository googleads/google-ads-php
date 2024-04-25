<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/services/campaign_lifecycle_goal_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Services;

class CampaignLifecycleGoalService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
5google/ads/googleads/v16/common/lifecycle_goals.protogoogle.ads.googleads.v16.common"t
LifecycleGoalValueSettings
value (H � 
high_lifetime_value (H�B
_valueB
_high_lifetime_valueB�
#com.google.ads.googleads.v16.commonBLifecycleGoalsProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v16/common;common�GAA�Google.Ads.GoogleAds.V16.Common�Google\\Ads\\GoogleAds\\V16\\Common�#Google::Ads::GoogleAds::V16::Commonbproto3
�
Kgoogle/ads/googleads/v16/enums/customer_acquisition_optimization_mode.protogoogle.ads.googleads.v16.enums"�
\'CustomerAcquisitionOptimizationModeEnum"�
#CustomerAcquisitionOptimizationMode
UNSPECIFIED 
UNKNOWN
TARGET_ALL_EQUALLY
BID_HIGHER_FOR_NEW_CUSTOMER
TARGET_NEW_CUSTOMERB�
"com.google.ads.googleads.v16.enumsB(CustomerAcquisitionOptimizationModeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�	
@google/ads/googleads/v16/resources/campaign_lifecycle_goal.proto"google.ads.googleads.v16.resourcesKgoogle/ads/googleads/v16/enums/customer_acquisition_optimization_mode.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
CampaignLifecycleGoalM
resource_name (	B6�A�A0
.googleads.googleapis.com/CampaignLifecycleGoal;
campaign (	B)�A�A#
!googleads.googleapis.com/Campaignt
"customer_acquisition_goal_settings (2C.google.ads.googleads.v16.resources.CustomerAcquisitionGoalSettingsB�A:q�An
.googleads.googleapis.com/CampaignLifecycleGoal<customers/{customer_id}/campaignLifecycleGoals/{campaign_id}"�
CustomerAcquisitionGoalSettings�
optimization_mode (2k.google.ads.googleads.v16.enums.CustomerAcquisitionOptimizationModeEnum.CustomerAcquisitionOptimizationModeB�AX
value_settings (2;.google.ads.googleads.v16.common.LifecycleGoalValueSettingsB�AB�
&com.google.ads.googleads.v16.resourcesBCampaignLifecycleGoalProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v16/resources;resources�GAA�"Google.Ads.GoogleAds.V16.Resources�"Google\\Ads\\GoogleAds\\V16\\Resources�&Google::Ads::GoogleAds::V16::Resourcesbproto3
�
Ggoogle/ads/googleads/v16/services/campaign_lifecycle_goal_service.proto!google.ads.googleads.v16.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.proto"�
&ConfigureCampaignLifecycleGoalsRequest
customer_id (	B�AY
	operation (2A.google.ads.googleads.v16.services.CampaignLifecycleGoalOperationB�A
validate_only (B�A"�
CampaignLifecycleGoalOperation4
update_mask (2.google.protobuf.FieldMaskB�AK
create (29.google.ads.googleads.v16.resources.CampaignLifecycleGoalH K
update (29.google.ads.googleads.v16.resources.CampaignLifecycleGoalH B
	operation"�
\'ConfigureCampaignLifecycleGoalsResponseX
result (2H.google.ads.googleads.v16.services.ConfigureCampaignLifecycleGoalsResult"s
%ConfigureCampaignLifecycleGoalsResultJ
resource_name (	B3�A0
.googleads.googleapis.com/CampaignLifecycleGoal2�
CampaignLifecycleGoalService�
ConfigureCampaignLifecycleGoalsI.google.ads.googleads.v16.services.ConfigureCampaignLifecycleGoalsRequestJ.google.ads.googleads.v16.services.ConfigureCampaignLifecycleGoalsResponse"w�Acustomer_id,operation���Y"T/v16/customers/{customer_id=*}/campaignLifecycleGoal:configureCampaignLifecycleGoals:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v16.servicesB!CampaignLifecycleGoalServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v16/services;services�GAA�!Google.Ads.GoogleAds.V16.Services�!Google\\Ads\\GoogleAds\\V16\\Services�%Google::Ads::GoogleAds::V16::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

