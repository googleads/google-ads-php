<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/mutate_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Errors;

class MutateError
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
2google/ads/googleads/v19/errors/mutate_error.protogoogle.ads.googleads.v19.errors"�
MutateErrorEnum"�
MutateError
UNSPECIFIED 
UNKNOWN
RESOURCE_NOT_FOUND!
ID_EXISTS_IN_MULTIPLE_MUTATES
INCONSISTENT_FIELD_VALUES
MUTATE_NOT_ALLOWED	
RESOURCE_NOT_IN_GOOGLE_ADS

RESOURCE_ALREADY_EXISTS+
\'RESOURCE_DOES_NOT_SUPPORT_VALIDATE_ONLY.
*OPERATION_DOES_NOT_SUPPORT_PARTIAL_FAILURE
RESOURCE_READ_ONLYB�
#com.google.ads.googleads.v19.errorsBMutateErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/errors;errors�GAA�Google.Ads.GoogleAds.V19.Errors�Google\\Ads\\GoogleAds\\V19\\Errors�#Google::Ads::GoogleAds::V19::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

