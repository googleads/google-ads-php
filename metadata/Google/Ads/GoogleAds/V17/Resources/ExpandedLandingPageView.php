<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/resources/expanded_landing_page_view.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Resources;

class ExpandedLandingPageView
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
�
Cgoogle/ads/googleads/v17/resources/expanded_landing_page_view.proto"google.ads.googleads.v17.resourcesgoogle/api/resource.proto"�
ExpandedLandingPageViewO
resource_name (	B8�A�A2
0googleads.googleapis.com/ExpandedLandingPageView$
expanded_final_url (	B�AH �:��A�
0googleads.googleapis.com/ExpandedLandingPageViewQcustomers/{customer_id}/expandedLandingPageViews/{expanded_final_url_fingerprint}B
_expanded_final_urlB�
&com.google.ads.googleads.v17.resourcesBExpandedLandingPageViewProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v17/resources;resources�GAA�"Google.Ads.GoogleAds.V17.Resources�"Google\\Ads\\GoogleAds\\V17\\Resources�&Google::Ads::GoogleAds::V17::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

