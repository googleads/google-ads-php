<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/user_location_view.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class UserLocationView
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
;google/ads/googleads/v19/resources/user_location_view.proto"google.ads.googleads.v19.resourcesgoogle/api/resource.proto"�
UserLocationViewH
resource_name (	B1�A�A+
)googleads.googleapis.com/UserLocationView&
country_criterion_id (B�AH �$
targeting_location (B�AH�:��A�
)googleads.googleapis.com/UserLocationViewXcustomers/{customer_id}/userLocationViews/{country_criterion_id}~{is_targeting_location}B
_country_criterion_idB
_targeting_locationB�
&com.google.ads.googleads.v19.resourcesBUserLocationViewProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

