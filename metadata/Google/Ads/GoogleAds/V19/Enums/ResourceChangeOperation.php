<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/enums/resource_change_operation.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Enums;

class ResourceChangeOperation
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
>google/ads/googleads/v19/enums/resource_change_operation.protogoogle.ads.googleads.v19.enums"z
ResourceChangeOperationEnum"[
ResourceChangeOperation
UNSPECIFIED 
UNKNOWN

CREATE

UPDATE

REMOVEB�
"com.google.ads.googleads.v19.enumsBResourceChangeOperationProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

