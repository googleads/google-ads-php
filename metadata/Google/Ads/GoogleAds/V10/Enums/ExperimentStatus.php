<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/enums/experiment_status.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Enums;

class ExperimentStatus
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
6google/ads/googleads/v10/enums/experiment_status.protogoogle.ads.googleads.v10.enums"�
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
"com.google.ads.googleads.v10.enumsBExperimentStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

