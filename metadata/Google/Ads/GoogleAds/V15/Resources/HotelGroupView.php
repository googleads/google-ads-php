<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v15/resources/hotel_group_view.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V15\Resources;

class HotelGroupView
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
9google/ads/googleads/v15/resources/hotel_group_view.proto"google.ads.googleads.v15.resourcesgoogle/api/resource.proto"�
HotelGroupViewF
resource_name (	B/�A�A)
\'googleads.googleapis.com/HotelGroupView:r�Ao
\'googleads.googleapis.com/HotelGroupViewDcustomers/{customer_id}/hotelGroupViews/{ad_group_id}~{criterion_id}B�
&com.google.ads.googleads.v15.resourcesBHotelGroupViewProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v15/resources;resources�GAA�"Google.Ads.GoogleAds.V15.Resources�"Google\\Ads\\GoogleAds\\V15\\Resources�&Google::Ads::GoogleAds::V15::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

