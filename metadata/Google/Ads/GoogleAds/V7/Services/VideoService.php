<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v7/services/video_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V7\Services;

class VideoService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
-google/ads/googleads/v7/resources/video.proto!google.ads.googleads.v7.resourcesgoogle/api/resource.protogoogle/api/annotations.proto"�
Video=
resource_name (	B&�A�A 
googleads.googleapis.com/Video
id (	B�AH �

channel_id (	B�AH�!
duration_millis (B�AH�
title	 (	B�AH�:N�AK
googleads.googleapis.com/Video)customers/{customer_id}/videos/{video_id}B
_idB
_channel_idB
_duration_millisB
_titleB�
%com.google.ads.googleads.v7.resourcesB
VideoProtoPZJgoogle.golang.org/genproto/googleapis/ads/googleads/v7/resources;resources�GAA�!Google.Ads.GoogleAds.V7.Resources�!Google\\Ads\\GoogleAds\\V7\\Resources�%Google::Ads::GoogleAds::V7::Resourcesbproto3
�
4google/ads/googleads/v7/services/video_service.proto google.ads.googleads.v7.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto"P
GetVideoRequest=
resource_name (	B&�A�A 
googleads.googleapis.com/Video2�
VideoService�
GetVideo1.google.ads.googleads.v7.services.GetVideoRequest(.google.ads.googleads.v7.resources.Video"@���*(/v7/{resource_name=customers/*/videos/*}�Aresource_nameE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
$com.google.ads.googleads.v7.servicesBVideoServiceProtoPZHgoogle.golang.org/genproto/googleapis/ads/googleads/v7/services;services�GAA� Google.Ads.GoogleAds.V7.Services� Google\\Ads\\GoogleAds\\V7\\Services�$Google::Ads::GoogleAds::V7::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

