<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/parental_status_view.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class ParentalStatusView
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
=google/ads/googleads/v19/resources/parental_status_view.proto"google.ads.googleads.v19.resourcesgoogle/api/resource.proto"�
ParentalStatusViewJ
resource_name (	B3�A�A-
+googleads.googleapis.com/ParentalStatusView:z�Aw
+googleads.googleapis.com/ParentalStatusViewHcustomers/{customer_id}/parentalStatusViews/{ad_group_id}~{criterion_id}B�
&com.google.ads.googleads.v19.resourcesBParentalStatusViewProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

