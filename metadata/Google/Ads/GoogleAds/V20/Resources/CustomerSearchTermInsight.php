<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/customer_search_term_insight.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Resources;

class CustomerSearchTermInsight
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
Egoogle/ads/googleads/v20/resources/customer_search_term_insight.proto"google.ads.googleads.v20.resourcesgoogle/api/resource.proto"�
CustomerSearchTermInsightQ
resource_name (	B:�A�A4
2googleads.googleapis.com/CustomerSearchTermInsight 
category_label (	B�AH �
id (B�AH�:x�Au
2googleads.googleapis.com/CustomerSearchTermInsight?customers/{customer_id}/customerSearchTermInsights/{cluster_id}B
_category_labelB
_idB�
&com.google.ads.googleads.v20.resourcesBCustomerSearchTermInsightProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v20/resources;resources�GAA�"Google.Ads.GoogleAds.V20.Resources�"Google\\Ads\\GoogleAds\\V20\\Resources�&Google::Ads::GoogleAds::V20::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

