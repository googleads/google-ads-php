<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/resources/dynamic_search_ads_search_term_view.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Resources;

class DynamicSearchAdsSearchTermView
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�	
Lgoogle/ads/googleads/v10/resources/dynamic_search_ads_search_term_view.proto"google.ads.googleads.v10.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
DynamicSearchAdsSearchTermViewV
resource_name (	B?�A�A9
7googleads.googleapis.com/DynamicSearchAdsSearchTermView
search_term	 (	B�AH �
headline
 (	B�AH�
landing_page (	B�AH�
page_url (	B�AH�&
has_negative_keyword (B�AH�&
has_matching_keyword (B�AH�"
has_negative_url (B�AH�:��A�
7googleads.googleapis.com/DynamicSearchAdsSearchTermView�customers/{customer_id}/dynamicSearchAdsSearchTermViews/{ad_group_id}~{search_term_fingerprint}~{headline_fingerprint}~{landing_page_fingerprint}~{page_url_fingerprint}B
_search_termB
	_headlineB
_landing_pageB
	_page_urlB
_has_negative_keywordB
_has_matching_keywordB
_has_negative_urlB�
&com.google.ads.googleads.v10.resourcesB#DynamicSearchAdsSearchTermViewProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v10/resources;resources�GAA�"Google.Ads.GoogleAds.V10.Resources�"Google\\Ads\\GoogleAds\\V10\\Resources�&Google::Ads::GoogleAds::V10::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

