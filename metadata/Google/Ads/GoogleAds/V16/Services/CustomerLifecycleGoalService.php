<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/services/customer_lifecycle_goal_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Services;

class CustomerLifecycleGoalService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
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
�
@google/ads/googleads/v16/resources/customer_lifecycle_goal.proto"google.ads.googleads.v16.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
CustomerLifecycleGoalM
resource_name (	B6�A�A0
.googleads.googleapis.com/CustomerLifecycleGoal�
+lifecycle_goal_customer_definition_settings (2a.google.ads.googleads.v16.resources.CustomerLifecycleGoal.LifecycleGoalCustomerDefinitionSettingsB�Ar
(customer_acquisition_goal_value_settings (2;.google.ads.googleads.v16.common.LifecycleGoalValueSettingsB�A�
\'LifecycleGoalCustomerDefinitionSettingsF
existing_user_lists (	B)�A�A#
!googleads.googleapis.com/UserListQ
high_lifetime_value_user_lists (	B)�A�A#
!googleads.googleapis.com/UserList:c�A`
.googleads.googleapis.com/CustomerLifecycleGoal.customers/{customer_id}/customerLifecycleGoalsB�
&com.google.ads.googleads.v16.resourcesBCustomerLifecycleGoalProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v16/resources;resources�GAA�"Google.Ads.GoogleAds.V16.Resources�"Google\\Ads\\GoogleAds\\V16\\Resources�&Google::Ads::GoogleAds::V16::Resourcesbproto3
�
Ggoogle/ads/googleads/v16/services/customer_lifecycle_goal_service.proto!google.ads.googleads.v16.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.proto"�
&ConfigureCustomerLifecycleGoalsRequest
customer_id (	B�AY
	operation (2A.google.ads.googleads.v16.services.CustomerLifecycleGoalOperationB�A
validate_only (B�A"�
CustomerLifecycleGoalOperation4
update_mask (2.google.protobuf.FieldMaskB�AK
create (29.google.ads.googleads.v16.resources.CustomerLifecycleGoalH K
update (29.google.ads.googleads.v16.resources.CustomerLifecycleGoalH B
	operation"�
\'ConfigureCustomerLifecycleGoalsResponseX
result (2H.google.ads.googleads.v16.services.ConfigureCustomerLifecycleGoalsResult"s
%ConfigureCustomerLifecycleGoalsResultJ
resource_name (	B3�A0
.googleads.googleapis.com/CustomerLifecycleGoal2�
CustomerLifecycleGoalService�
ConfigureCustomerLifecycleGoalsI.google.ads.googleads.v16.services.ConfigureCustomerLifecycleGoalsRequestJ.google.ads.googleads.v16.services.ConfigureCustomerLifecycleGoalsResponse"w�Acustomer_id,operation���Y"T/v16/customers/{customer_id=*}/customerLifecycleGoal:configureCustomerLifecycleGoals:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v16.servicesB!CustomerLifecycleGoalServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v16/services;services�GAA�!Google.Ads.GoogleAds.V16.Services�!Google\\Ads\\GoogleAds\\V16\\Services�%Google::Ads::GoogleAds::V16::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

