<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/resources/income_range_view.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V18\Resources;

class IncomeRangeView
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
:google/ads/googleads/v18/resources/income_range_view.proto"google.ads.googleads.v18.resourcesgoogle/api/resource.proto"�
IncomeRangeViewG
resource_name (	B0�A�A*
(googleads.googleapis.com/IncomeRangeView:t�Aq
(googleads.googleapis.com/IncomeRangeViewEcustomers/{customer_id}/incomeRangeViews/{ad_group_id}~{criterion_id}B�
&com.google.ads.googleads.v18.resourcesBIncomeRangeViewProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v18/resources;resources�GAA�"Google.Ads.GoogleAds.V18.Resources�"Google\\Ads\\GoogleAds\\V18\\Resources�&Google::Ads::GoogleAds::V18::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

