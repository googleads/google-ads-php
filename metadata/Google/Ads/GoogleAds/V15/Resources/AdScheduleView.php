<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v15/resources/ad_schedule_view.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V15\Resources;

class AdScheduleView
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
�
9google/ads/googleads/v15/resources/ad_schedule_view.proto"google.ads.googleads.v15.resourcesgoogle/api/resource.proto"�
AdScheduleViewF

\'googleads.googleapis.com/AdScheduleView:r�Ao
\'googleads.googleapis.com/AdScheduleViewDcustomers/{customer_id}/adScheduleViews/{campaign_id}~{criterion_id}B�
&com.google.ads.googleads.v15.resourcesBAdScheduleViewProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v15/resources;resources�GAA�"Google.Ads.GoogleAds.V15.Resources�"Google\\Ads\\GoogleAds\\V15\\Resources�&Google::Ads::GoogleAds::V15::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}
