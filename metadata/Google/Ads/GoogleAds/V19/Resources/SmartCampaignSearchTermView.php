<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/smart_campaign_search_term_view.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class SmartCampaignSearchTermView
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
Hgoogle/ads/googleads/v19/resources/smart_campaign_search_term_view.proto"google.ads.googleads.v19.resourcesgoogle/api/resource.proto"�
SmartCampaignSearchTermViewS
resource_name (	B<�A�A6
4googleads.googleapis.com/SmartCampaignSearchTermView
search_term (	B�A;
campaign (	B)�A�A#
!googleads.googleapis.com/Campaign:��A�
4googleads.googleapis.com/SmartCampaignSearchTermViewJcustomers/{customer_id}/smartCampaignSearchTermViews/{campaign_id}~{query}B�
&com.google.ads.googleads.v19.resourcesB SmartCampaignSearchTermViewProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

