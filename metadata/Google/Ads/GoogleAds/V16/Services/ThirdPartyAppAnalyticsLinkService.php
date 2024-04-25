<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/services/third_party_app_analytics_link_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Services;

class ThirdPartyAppAnalyticsLinkService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
Ngoogle/ads/googleads/v16/services/third_party_app_analytics_link_service.proto!google.ads.googleads.v16.servicesgoogle/api/client.protogoogle/api/resource.proto"s
 RegenerateShareableLinkIdRequestO
resource_name (	B8�A5
3googleads.googleapis.com/ThirdPartyAppAnalyticsLink"#
!RegenerateShareableLinkIdResponse2�
!ThirdPartyAppAnalyticsLinkService�
RegenerateShareableLinkIdC.google.ads.googleads.v16.services.RegenerateShareableLinkIdRequestD.google.ads.googleads.v16.services.RegenerateShareableLinkIdResponse"c���]"X/v16/{resource_name=customers/*/thirdPartyAppAnalyticsLinks/*}:regenerateShareableLinkId:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v16.servicesB&ThirdPartyAppAnalyticsLinkServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v16/services;services�GAA�!Google.Ads.GoogleAds.V16.Services�!Google\\Ads\\GoogleAds\\V16\\Services�%Google::Ads::GoogleAds::V16::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

