<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v12/resources/campaign_extension_setting.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V12\Resources;

class CampaignExtensionSetting
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
=google/ads/googleads/v12/enums/extension_setting_device.protogoogle.ads.googleads.v12.enums"m
ExtensionSettingDeviceEnum"O
ExtensionSettingDevice
UNSPECIFIED 
UNKNOWN

MOBILE
DESKTOPB�
"com.google.ads.googleads.v12.enumsBExtensionSettingDeviceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v12/enums;enums�GAA�Google.Ads.GoogleAds.V12.Enums�Google\\Ads\\GoogleAds\\V12\\Enums�"Google::Ads::GoogleAds::V12::Enumsbproto3
�
3google/ads/googleads/v12/enums/extension_type.protogoogle.ads.googleads.v12.enums"�
ExtensionTypeEnum"�
ExtensionType
UNSPECIFIED 
UNKNOWN
NONE
APP
CALL
CALLOUT
MESSAGE	
PRICE
	PROMOTION
SITELINK

STRUCTURED_SNIPPET
LOCATION
AFFILIATE_LOCATION
HOTEL_CALLOUT	
IMAGEB�
"com.google.ads.googleads.v12.enumsBExtensionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v12/enums;enums�GAA�Google.Ads.GoogleAds.V12.Enums�Google\\Ads\\GoogleAds\\V12\\Enums�"Google::Ads::GoogleAds::V12::Enumsbproto3
�
Cgoogle/ads/googleads/v12/resources/campaign_extension_setting.proto"google.ads.googleads.v12.resources3google/ads/googleads/v12/enums/extension_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
CampaignExtensionSettingP
resource_name (	B9�A�A3
1googleads.googleapis.com/CampaignExtensionSetting\\
extension_type (2?.google.ads.googleads.v12.enums.ExtensionTypeEnum.ExtensionTypeB�A@
campaign (	B)�A�A#
!googleads.googleapis.com/CampaignH �M
extension_feed_items (	B/�A,
*googleads.googleapis.com/ExtensionFeedItema
device (2Q.google.ads.googleads.v12.enums.ExtensionSettingDeviceEnum.ExtensionSettingDevice:��A�
1googleads.googleapis.com/CampaignExtensionSettingPcustomers/{customer_id}/campaignExtensionSettings/{campaign_id}~{extension_type}B
	_campaignB�
&com.google.ads.googleads.v12.resourcesBCampaignExtensionSettingProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v12/resources;resources�GAA�"Google.Ads.GoogleAds.V12.Resources�"Google\\Ads\\GoogleAds\\V12\\Resources�&Google::Ads::GoogleAds::V12::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

