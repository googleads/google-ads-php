<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/batch_job_status.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Enums;

class BatchJobStatus
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
5google/ads/googleads/v20/enums/batch_job_status.protogoogle.ads.googleads.v20.enums"h
BatchJobStatusEnum"R
BatchJobStatus
UNSPECIFIED 
UNKNOWN
PENDING
RUNNING
DONEB�
"com.google.ads.googleads.v20.enumsBBatchJobStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

