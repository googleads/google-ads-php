<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/experiment.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class Experiment
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
6google/ads/googleads/v19/enums/experiment_status.protogoogle.ads.googleads.v19.enums"�
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
"com.google.ads.googleads.v19.enumsBExperimentStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
6google/ads/googleads/v19/enums/experiment_metric.protogoogle.ads.googleads.v19.enums"�
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
"com.google.ads.googleads.v19.enumsBExperimentMetricProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
@google/ads/googleads/v19/enums/experiment_metric_direction.protogoogle.ads.googleads.v19.enums"�
ExperimentMetricDirectionEnum"�
ExperimentMetricDirection
UNSPECIFIED 
UNKNOWN
	NO_CHANGE
INCREASE
DECREASE
NO_CHANGE_OR_INCREASE
NO_CHANGE_OR_DECREASEB�
"com.google.ads.googleads.v19.enumsBExperimentMetricDirectionProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
1google/ads/googleads/v19/common/metric_goal.protogoogle.ads.googleads.v19.common@google/ads/googleads/v19/enums/experiment_metric_direction.proto"�

MetricGoalU
metric (2E.google.ads.googleads.v19.enums.ExperimentMetricEnum.ExperimentMetricj
	direction (2W.google.ads.googleads.v19.enums.ExperimentMetricDirectionEnum.ExperimentMetricDirectionB�
#com.google.ads.googleads.v19.commonBMetricGoalProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/common;common�GAA�Google.Ads.GoogleAds.V19.Common�Google\\Ads\\GoogleAds\\V19\\Common�#Google::Ads::GoogleAds::V19::Commonbproto3
�
4google/ads/googleads/v19/enums/experiment_type.protogoogle.ads.googleads.v19.enums"�
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
"com.google.ads.googleads.v19.enumsBExperimentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
8google/ads/googleads/v19/enums/async_action_status.protogoogle.ads.googleads.v19.enums"�
AsyncActionStatusEnum"�
AsyncActionStatus
UNSPECIFIED 
UNKNOWN
NOT_STARTED
IN_PROGRESS
	COMPLETED

FAILED
COMPLETED_WITH_WARNINGB�
"com.google.ads.googleads.v19.enumsBAsyncActionStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�

3google/ads/googleads/v19/resources/experiment.proto"google.ads.googleads.v19.resources8google/ads/googleads/v19/enums/async_action_status.proto6google/ads/googleads/v19/enums/experiment_status.proto4google/ads/googleads/v19/enums/experiment_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�

ExperimentB
resource_name (	B+�A�A%
#googleads.googleapis.com/Experiment
experiment_id	 (B�AH �
name
 (	B�A
description (	
suffix (	T
type (2A.google.ads.googleads.v19.enums.ExperimentTypeEnum.ExperimentTypeB�AU
status (2E.google.ads.googleads.v19.enums.ExperimentStatusEnum.ExperimentStatus

start_date (	H�
end_date (	H�:
goals (2+.google.ads.googleads.v19.common.MetricGoal(
long_running_operation (	B�AH�d
promote_status (2G.google.ads.googleads.v19.enums.AsyncActionStatusEnum.AsyncActionStatusB�A
sync_enabled (B�AH�:X�AU
#googleads.googleapis.com/Experiment.customers/{customer_id}/experiments/{trial_id}B
_experiment_idB
_start_dateB
	_end_dateB
_long_running_operationB
_sync_enabledB�
&com.google.ads.googleads.v19.resourcesBExperimentProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

