<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/services/campaign_extension_setting_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Services;

class CampaignExtensionSettingService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
=google/ads/googleads/v17/enums/extension_setting_device.protogoogle.ads.googleads.v17.enums"m
ExtensionSettingDeviceEnum"O
ExtensionSettingDevice
UNSPECIFIED 
UNKNOWN

MOBILE
DESKTOPB�
"com.google.ads.googleads.v17.enumsBExtensionSettingDeviceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
3google/ads/googleads/v17/enums/extension_type.protogoogle.ads.googleads.v17.enums"�
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
"com.google.ads.googleads.v17.enumsBExtensionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
Cgoogle/ads/googleads/v17/resources/campaign_extension_setting.proto"google.ads.googleads.v17.resources3google/ads/googleads/v17/enums/extension_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
CampaignExtensionSettingP
resource_name (	B9�A�A3
1googleads.googleapis.com/CampaignExtensionSetting\\
extension_type (2?.google.ads.googleads.v17.enums.ExtensionTypeEnum.ExtensionTypeB�A@
campaign (	B)�A�A#
!googleads.googleapis.com/CampaignH �M
extension_feed_items (	B/�A,
*googleads.googleapis.com/ExtensionFeedItema
device (2Q.google.ads.googleads.v17.enums.ExtensionSettingDeviceEnum.ExtensionSettingDevice:��A�
1googleads.googleapis.com/CampaignExtensionSettingPcustomers/{customer_id}/campaignExtensionSettings/{campaign_id}~{extension_type}B
	_campaignB�
&com.google.ads.googleads.v17.resourcesBCampaignExtensionSettingProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v17/resources;resources�GAA�"Google.Ads.GoogleAds.V17.Resources�"Google\\Ads\\GoogleAds\\V17\\Resources�&Google::Ads::GoogleAds::V17::Resourcesbproto3
�
:google/ads/googleads/v17/enums/response_content_type.protogoogle.ads.googleads.v17.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v17.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
Jgoogle/ads/googleads/v17/services/campaign_extension_setting_service.proto!google.ads.googleads.v17.servicesCgoogle/ads/googleads/v17/resources/campaign_extension_setting.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
&MutateCampaignExtensionSettingsRequest
customer_id (	B�A]

operations (2D.google.ads.googleads.v17.services.CampaignExtensionSettingOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v17.enums.ResponseContentTypeEnum.ResponseContentType"�
!CampaignExtensionSettingOperation/
update_mask (2.google.protobuf.FieldMaskN
create (2<.google.ads.googleads.v17.resources.CampaignExtensionSettingH N
update (2<.google.ads.googleads.v17.resources.CampaignExtensionSettingH H
remove (	B6�A3
1googleads.googleapis.com/CampaignExtensionSettingH B
	operation"�
\'MutateCampaignExtensionSettingsResponse1
partial_failure_error (2.google.rpc.StatusX
results (2G.google.ads.googleads.v17.services.MutateCampaignExtensionSettingResult"�
$MutateCampaignExtensionSettingResultM
resource_name (	B6�A3
1googleads.googleapis.com/CampaignExtensionSetting`
campaign_extension_setting (2<.google.ads.googleads.v17.resources.CampaignExtensionSetting2�
CampaignExtensionSettingService�
MutateCampaignExtensionSettingsI.google.ads.googleads.v17.services.MutateCampaignExtensionSettingsRequestJ.google.ads.googleads.v17.services.MutateCampaignExtensionSettingsResponse"c�Acustomer_id,operations���D"?/v17/customers/{customer_id=*}/campaignExtensionSettings:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v17.servicesB$CampaignExtensionSettingServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v17/services;services�GAA�!Google.Ads.GoogleAds.V17.Services�!Google\\Ads\\GoogleAds\\V17\\Services�%Google::Ads::GoogleAds::V17::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

