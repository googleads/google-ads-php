<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/services/customer_lifecycle_goal_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Services;

class CustomerLifecycleGoalService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
5google/ads/googleads/v17/common/lifecycle_goals.protogoogle.ads.googleads.v17.common"t
LifecycleGoalValueSettings
value (H � 
high_lifetime_value (H�B
_valueB
_high_lifetime_valueB�
#com.google.ads.googleads.v17.commonBLifecycleGoalsProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/common;common�GAA�Google.Ads.GoogleAds.V17.Common�Google\\Ads\\GoogleAds\\V17\\Common�#Google::Ads::GoogleAds::V17::Commonbproto3
�
@google/ads/googleads/v17/resources/customer_lifecycle_goal.proto"google.ads.googleads.v17.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
CustomerLifecycleGoalM
resource_name (	B6�A�A0
.googleads.googleapis.com/CustomerLifecycleGoalr
(customer_acquisition_goal_value_settings (2;.google.ads.googleads.v17.common.LifecycleGoalValueSettingsB�A:c�A`
.googleads.googleapis.com/CustomerLifecycleGoal.customers/{customer_id}/customerLifecycleGoalsB�
&com.google.ads.googleads.v17.resourcesBCustomerLifecycleGoalProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v17/resources;resources�GAA�"Google.Ads.GoogleAds.V17.Resources�"Google\\Ads\\GoogleAds\\V17\\Resources�&Google::Ads::GoogleAds::V17::Resourcesbproto3
�
Ggoogle/ads/googleads/v17/services/customer_lifecycle_goal_service.proto!google.ads.googleads.v17.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.proto"�
&ConfigureCustomerLifecycleGoalsRequest
customer_id (	B�AY
	operation (2A.google.ads.googleads.v17.services.CustomerLifecycleGoalOperationB�A
validate_only (B�A"�
CustomerLifecycleGoalOperation4
update_mask (2.google.protobuf.FieldMaskB�AK
create (29.google.ads.googleads.v17.resources.CustomerLifecycleGoalH K
update (29.google.ads.googleads.v17.resources.CustomerLifecycleGoalH B
	operation"�
\'ConfigureCustomerLifecycleGoalsResponseX
result (2H.google.ads.googleads.v17.services.ConfigureCustomerLifecycleGoalsResult"s
%ConfigureCustomerLifecycleGoalsResultJ
resource_name (	B3�A0
.googleads.googleapis.com/CustomerLifecycleGoal2�
CustomerLifecycleGoalService�
ConfigureCustomerLifecycleGoalsI.google.ads.googleads.v17.services.ConfigureCustomerLifecycleGoalsRequestJ.google.ads.googleads.v17.services.ConfigureCustomerLifecycleGoalsResponse"w�Acustomer_id,operation���Y"T/v17/customers/{customer_id=*}/customerLifecycleGoal:configureCustomerLifecycleGoals:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v17.servicesB!CustomerLifecycleGoalServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v17/services;services�GAA�!Google.Ads.GoogleAds.V17.Services�!Google\\Ads\\GoogleAds\\V17\\Services�%Google::Ads::GoogleAds::V17::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

