<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/experiment_arm_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Services;

class ExperimentArmService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
7google/ads/googleads/v20/resources/experiment_arm.proto"google.ads.googleads.v20.resourcesgoogle/api/resource.proto"�
ExperimentArmE
resource_name (	B.�A�A(
&googleads.googleapis.com/ExperimentArm?

experiment (	B+�A�A%
#googleads.googleapis.com/Experiment
name (	B�A
control (
traffic_split (9
	campaigns (	B&�A#
!googleads.googleapis.com/CampaignF
in_design_campaigns (	B)�A�A#
!googleads.googleapis.com/Campaign:m�Aj
&googleads.googleapis.com/ExperimentArm@customers/{customer_id}/experimentArms/{trial_id}~{trial_arm_id}B�
&com.google.ads.googleads.v20.resourcesBExperimentArmProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v20/resources;resources�GAA�"Google.Ads.GoogleAds.V20.Resources�"Google\\Ads\\GoogleAds\\V20\\Resources�&Google::Ads::GoogleAds::V20::Resourcesbproto3
�
:google/ads/googleads/v20/enums/response_content_type.protogoogle.ads.googleads.v20.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v20.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
>google/ads/googleads/v20/services/experiment_arm_service.proto!google.ads.googleads.v20.services7google/ads/googleads/v20/resources/experiment_arm.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
MutateExperimentArmsRequest
customer_id (	B�AR

operations (29.google.ads.googleads.v20.services.ExperimentArmOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v20.enums.ResponseContentTypeEnum.ResponseContentType"�
ExperimentArmOperation/
update_mask (2.google.protobuf.FieldMaskC
create (21.google.ads.googleads.v20.resources.ExperimentArmH C
update (21.google.ads.googleads.v20.resources.ExperimentArmH =
remove (	B+�A(
&googleads.googleapis.com/ExperimentArmH B
	operation"�
MutateExperimentArmsResponse1
partial_failure_error (2.google.rpc.StatusM
results (2<.google.ads.googleads.v20.services.MutateExperimentArmResult"�
MutateExperimentArmResultB
resource_name (	B+�A(
&googleads.googleapis.com/ExperimentArmI
experiment_arm (21.google.ads.googleads.v20.resources.ExperimentArm2�
ExperimentArmService�
MutateExperimentArms>.google.ads.googleads.v20.services.MutateExperimentArmsRequest?.google.ads.googleads.v20.services.MutateExperimentArmsResponse"X�Acustomer_id,operations���9"4/v20/customers/{customer_id=*}/experimentArms:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v20.servicesBExperimentArmServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v20/services;services�GAA�!Google.Ads.GoogleAds.V20.Services�!Google\\Ads\\GoogleAds\\V20\\Services�%Google::Ads::GoogleAds::V20::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

