<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/video.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class Video
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
.google/ads/googleads/v19/resources/video.proto"google.ads.googleads.v19.resourcesgoogle/api/resource.proto"�
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
&com.google.ads.googleads.v19.resourcesB
VideoProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

