<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/location_view.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Resources;

class LocationView
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
6google/ads/googleads/v20/resources/location_view.proto"google.ads.googleads.v20.resourcesgoogle/api/resource.proto"�
LocationViewD
resource_name (	B-�A�A\'
%googleads.googleapis.com/LocationView:n�Ak
%googleads.googleapis.com/LocationViewBcustomers/{customer_id}/locationViews/{campaign_id}~{criterion_id}B�
&com.google.ads.googleads.v20.resourcesBLocationViewProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v20/resources;resources�GAA�"Google.Ads.GoogleAds.V20.Resources�"Google\\Ads\\GoogleAds\\V20\\Resources�&Google::Ads::GoogleAds::V20::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

