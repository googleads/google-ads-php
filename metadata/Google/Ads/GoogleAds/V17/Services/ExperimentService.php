<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/services/experiment_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Services;

class ExperimentService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
@google/ads/googleads/v17/enums/experiment_metric_direction.protogoogle.ads.googleads.v17.enums"�
ExperimentMetricDirectionEnum"�
ExperimentMetricDirection
UNSPECIFIED 
UNKNOWN
	NO_CHANGE
INCREASE
DECREASE
NO_CHANGE_OR_INCREASE
NO_CHANGE_OR_DECREASEB�
"com.google.ads.googleads.v17.enumsBExperimentMetricDirectionProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
6google/ads/googleads/v17/enums/experiment_metric.protogoogle.ads.googleads.v17.enums"�
ExperimentMetricEnum"�
ExperimentMetric
UNSPECIFIED 
UNKNOWN

CLICKS
IMPRESSIONS
COST$
 CONVERSIONS_PER_INTERACTION_RATE
COST_PER_CONVERSION
CONVERSIONS_VALUE_PER_COST
AVERAGE_CPC
CTR	
INCREMENTAL_CONVERSIONS

COMPLETED_VIDEO_VIEWS
CUSTOM_ALGORITHMS
CONVERSIONS
CONVERSION_VALUEB�
"com.google.ads.googleads.v17.enumsBExperimentMetricProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
1google/ads/googleads/v17/common/metric_goal.protogoogle.ads.googleads.v17.common@google/ads/googleads/v17/enums/experiment_metric_direction.proto"�

MetricGoalU
metric (2E.google.ads.googleads.v17.enums.ExperimentMetricEnum.ExperimentMetricj
	direction (2W.google.ads.googleads.v17.enums.ExperimentMetricDirectionEnum.ExperimentMetricDirectionB�
#com.google.ads.googleads.v17.commonBMetricGoalProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/common;common�GAA�Google.Ads.GoogleAds.V17.Common�Google\\Ads\\GoogleAds\\V17\\Common�#Google::Ads::GoogleAds::V17::Commonbproto3
�
4google/ads/googleads/v17/enums/experiment_type.protogoogle.ads.googleads.v17.enums"�
ExperimentTypeEnum"�
ExperimentType
UNSPECIFIED 
UNKNOWN
DISPLAY_AND_VIDEO_360
AD_VARIATION
YOUTUBE_CUSTOM
DISPLAY_CUSTOM
SEARCH_CUSTOM&
"DISPLAY_AUTOMATED_BIDDING_STRATEGY%
!SEARCH_AUTOMATED_BIDDING_STRATEGY	\'
#SHOPPING_AUTOMATED_BIDDING_STRATEGY

SMART_MATCHING
HOTEL_CUSTOMB�
"com.google.ads.googleads.v17.enumsBExperimentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
6google/ads/googleads/v17/enums/experiment_status.protogoogle.ads.googleads.v17.enums"�
ExperimentStatusEnum"�
ExperimentStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVED

HALTED
PROMOTED	
SETUP
	INITIATED
	GRADUATEDB�
"com.google.ads.googleads.v17.enumsBExperimentStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
8google/ads/googleads/v17/enums/async_action_status.protogoogle.ads.googleads.v17.enums"�
AsyncActionStatusEnum"�
AsyncActionStatus
UNSPECIFIED 
UNKNOWN
NOT_STARTED
IN_PROGRESS
	COMPLETED

FAILED
COMPLETED_WITH_WARNINGB�
"com.google.ads.googleads.v17.enumsBAsyncActionStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�

3google/ads/googleads/v17/resources/experiment.proto"google.ads.googleads.v17.resources8google/ads/googleads/v17/enums/async_action_status.proto6google/ads/googleads/v17/enums/experiment_status.proto4google/ads/googleads/v17/enums/experiment_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�

ExperimentB
resource_name (	B+�A�A%
#googleads.googleapis.com/Experiment
experiment_id	 (B�AH �
name
 (	B�A
description (	
suffix (	T
type (2A.google.ads.googleads.v17.enums.ExperimentTypeEnum.ExperimentTypeB�AU
status (2E.google.ads.googleads.v17.enums.ExperimentStatusEnum.ExperimentStatus

start_date (	H�
end_date (	H�:
goals (2+.google.ads.googleads.v17.common.MetricGoal(
long_running_operation (	B�AH�d
promote_status (2G.google.ads.googleads.v17.enums.AsyncActionStatusEnum.AsyncActionStatusB�A
sync_enabled (B�AH�:X�AU
#googleads.googleapis.com/Experiment.customers/{customer_id}/experiments/{trial_id}B
_experiment_idB
_start_dateB
	_end_dateB
_long_running_operationB
_sync_enabledB�
&com.google.ads.googleads.v17.resourcesBExperimentProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v17/resources;resources�GAA�"Google.Ads.GoogleAds.V17.Resources�"Google\\Ads\\GoogleAds\\V17\\Resources�&Google::Ads::GoogleAds::V17::Resourcesbproto3
�
:google/ads/googleads/v17/services/experiment_service.proto!google.ads.googleads.v17.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto#google/longrunning/operations.protogoogle/protobuf/empty.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
MutateExperimentsRequest
customer_id (	B�AO

operations (26.google.ads.googleads.v17.services.ExperimentOperationB�A
partial_failure (
validate_only ("�
ExperimentOperation/
update_mask (2.google.protobuf.FieldMask@
create (2..google.ads.googleads.v17.resources.ExperimentH @
update (2..google.ads.googleads.v17.resources.ExperimentH :
remove (	B(�A%
#googleads.googleapis.com/ExperimentH B
	operation"�
MutateExperimentsResponse1
partial_failure_error (2.google.rpc.StatusJ
results (29.google.ads.googleads.v17.services.MutateExperimentResult"Y
MutateExperimentResult?
resource_name (	B(�A%
#googleads.googleapis.com/Experiment"n
EndExperimentRequest?

experiment (	B+�A�A%
#googleads.googleapis.com/Experiment
validate_only ("�
 ListExperimentAsyncErrorsRequestB
resource_name (	B+�A�A%
#googleads.googleapis.com/Experiment

page_token (	
	page_size ("`
!ListExperimentAsyncErrorsResponse"
errors (2.google.rpc.Status
next_page_token (	"�
GraduateExperimentRequest?

experiment (	B+�A�A%
#googleads.googleapis.com/Experiment_
campaign_budget_mappings (28.google.ads.googleads.v17.services.CampaignBudgetMappingB�A
validate_only ("�
CampaignBudgetMappingF
experiment_campaign (	B)�A�A#
!googleads.googleapis.com/CampaignH
campaign_budget (	B/�A�A)
\'googleads.googleapis.com/CampaignBudget"v
ScheduleExperimentRequestB
resource_name (	B+�A�A%
#googleads.googleapis.com/Experiment
validate_only ("]
ScheduleExperimentMetadata?

experiment (	B+�A�A%
#googleads.googleapis.com/Experiment"u
PromoteExperimentRequestB
resource_name (	B+�A�A%
#googleads.googleapis.com/Experiment
validate_only ("\\
PromoteExperimentMetadata?

experiment (	B+�A�A%
#googleads.googleapis.com/Experiment2�
ExperimentService�
MutateExperiments;.google.ads.googleads.v17.services.MutateExperimentsRequest<.google.ads.googleads.v17.services.MutateExperimentsResponse"U�Acustomer_id,operations���6"1/v17/customers/{customer_id=*}/experiments:mutate:*�
EndExperiment7.google.ads.googleads.v17.services.EndExperimentRequest.google.protobuf.Empty"Q�A
experiment���>"9/v17/{experiment=customers/*/experiments/*}:endExperiment:*�
ListExperimentAsyncErrorsC.google.ads.googleads.v17.services.ListExperimentAsyncErrorsRequestD.google.ads.googleads.v17.services.ListExperimentAsyncErrorsResponse"`�Aresource_name���JH/v17/{resource_name=customers/*/experiments/*}:listExperimentAsyncErrors�
GraduateExperiment<.google.ads.googleads.v17.services.GraduateExperimentRequest.google.protobuf.Empty"o�A#experiment,campaign_budget_mappings���C">/v17/{experiment=customers/*/experiments/*}:graduateExperiment:*�
ScheduleExperiment<.google.ads.googleads.v17.services.ScheduleExperimentRequest.google.longrunning.Operation"��AU
google.protobuf.Empty<google.ads.googleads.v17.services.ScheduleExperimentMetadata�Aresource_name���F"A/v17/{resource_name=customers/*/experiments/*}:scheduleExperiment:*�
PromoteExperiment;.google.ads.googleads.v17.services.PromoteExperimentRequest.google.longrunning.Operation"��AT
google.protobuf.Empty;google.ads.googleads.v17.services.PromoteExperimentMetadata�Aresource_name���E"@/v17/{resource_name=customers/*/experiments/*}:promoteExperiment:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v17.servicesBExperimentServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v17/services;services�GAA�!Google.Ads.GoogleAds.V17.Services�!Google\\Ads\\GoogleAds\\V17\\Services�%Google::Ads::GoogleAds::V17::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

