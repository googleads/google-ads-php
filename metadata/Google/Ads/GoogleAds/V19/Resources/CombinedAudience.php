<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/combined_audience.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class CombinedAudience
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
�
=google/ads/googleads/v19/enums/combined_audience_status.protogoogle.ads.googleads.v19.enums"n
CombinedAudienceStatusEnum"P
CombinedAudienceStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v19.enumsBCombinedAudienceStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
:google/ads/googleads/v19/resources/combined_audience.proto"google.ads.googleads.v19.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
CombinedAudienceH
resource_name (	B1�A�A+
)googleads.googleapis.com/CombinedAudience
id (B�Af
status (2Q.google.ads.googleads.v19.enums.CombinedAudienceStatusEnum.CombinedAudienceStatusB�A
name (	B�A
description (	B�A:p�Am
)googleads.googleapis.com/CombinedAudience@customers/{customer_id}/combinedAudiences/{combined_audience_id}B�
&com.google.ads.googleads.v19.resourcesBCombinedAudienceProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

