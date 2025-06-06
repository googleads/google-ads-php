<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/android_privacy_shared_key_google_ad_group.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Resources;

class AndroidPrivacySharedKeyGoogleAdGroup
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
Egoogle/ads/googleads/v20/enums/android_privacy_interaction_type.protogoogle.ads.googleads.v20.enums"�
!AndroidPrivacyInteractionTypeEnum"d
AndroidPrivacyInteractionType
UNSPECIFIED 
UNKNOWN	
CLICK
ENGAGED_VIEW
VIEWB�
"com.google.ads.googleads.v20.enumsB"AndroidPrivacyInteractionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
Agoogle/ads/googleads/v20/enums/android_privacy_network_type.protogoogle.ads.googleads.v20.enums"�
AndroidPrivacyNetworkTypeEnum"_
AndroidPrivacyNetworkType
UNSPECIFIED 
UNKNOWN

SEARCH
DISPLAY
YOUTUBEB�
"com.google.ads.googleads.v20.enumsBAndroidPrivacyNetworkTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�

Sgoogle/ads/googleads/v20/resources/android_privacy_shared_key_google_ad_group.proto"google.ads.googleads.v20.resourcesAgoogle/ads/googleads/v20/enums/android_privacy_network_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
$AndroidPrivacySharedKeyGoogleAdGroup\\
resource_name (	BE�A�A?
=googleads.googleapis.com/AndroidPrivacySharedKeyGoogleAdGroup
campaign_id (B�A�
 android_privacy_interaction_type (2_.google.ads.googleads.v20.enums.AndroidPrivacyInteractionTypeEnum.AndroidPrivacyInteractionTypeB�A-
 android_privacy_interaction_date (	B�A�
android_privacy_network_type (2W.google.ads.googleads.v20.enums.AndroidPrivacyNetworkTypeEnum.AndroidPrivacyNetworkTypeB�A
ad_group_id (B�A 
shared_ad_group_key (	B�A:��A�
=googleads.googleapis.com/AndroidPrivacySharedKeyGoogleAdGroup�customers/{customer_id}/androidPrivacySharedKeyGoogleAdGroups/{campaign_id}~{ad_group_id}~{android_privacy_interaction_type}~{android_privacy_network_type}~{android_privacy_interaction_date}B�
&com.google.ads.googleads.v20.resourcesB)AndroidPrivacySharedKeyGoogleAdGroupProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v20/resources;resources�GAA�"Google.Ads.GoogleAds.V20.Resources�"Google\\Ads\\GoogleAds\\V20\\Resources�&Google::Ads::GoogleAds::V20::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

