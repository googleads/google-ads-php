<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/experiment_metric.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Enums;

class ExperimentMetric
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
6google/ads/googleads/v20/enums/experiment_metric.protogoogle.ads.googleads.v20.enums"�
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
"com.google.ads.googleads.v20.enumsBExperimentMetricProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

