<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/additional_application_info.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Common;

class AdditionalApplicationInfo
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
9google/ads/googleads/v20/enums/application_instance.protogoogle.ads.googleads.v20.enums"{
ApplicationInstanceEnum"`
ApplicationInstance
UNSPECIFIED 
UNKNOWN
DEVELOPMENT_AND_TESTING

PRODUCTIONB�
"com.google.ads.googleads.v20.enumsBApplicationInstanceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
Agoogle/ads/googleads/v20/common/additional_application_info.protogoogle.ads.googleads.v20.common"�
AdditionalApplicationInfo
application_id (	i
application_instance (2K.google.ads.googleads.v20.enums.ApplicationInstanceEnum.ApplicationInstanceB�
#com.google.ads.googleads.v20.commonBAdditionalApplicationInfoProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v20/common;common�GAA�Google.Ads.GoogleAds.V20.Common�Google\\Ads\\GoogleAds\\V20\\Common�#Google::Ads::GoogleAds::V20::Commonbproto3'
        , true);
        static::$is_initialized = true;
    }
}

