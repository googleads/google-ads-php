<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/topic_constant.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class TopicConstant
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
7google/ads/googleads/v19/resources/topic_constant.proto"google.ads.googleads.v19.resourcesgoogle/api/resource.proto"�
TopicConstantE
resource_name (	B.�A�A(
&googleads.googleapis.com/TopicConstant
id (B�AH �R
topic_constant_parent (	B.�A�A(
&googleads.googleapis.com/TopicConstantH�
path (	B�A:F�AC
&googleads.googleapis.com/TopicConstanttopicConstants/{topic_id}B
_idB
_topic_constant_parentB�
&com.google.ads.googleads.v19.resourcesBTopicConstantProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

