<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/services/smart_campaign_setting_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Services;

class SmartCampaignSettingService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�	
?google/ads/googleads/v16/resources/smart_campaign_setting.proto"google.ads.googleads.v16.resourcesgoogle/api/resource.proto"�
SmartCampaignSettingL
resource_name (	B5�A�A/
-googleads.googleapis.com/SmartCampaignSetting;
campaign (	B)�A�A#
!googleads.googleapis.com/CampaignZ
phone_number (2D.google.ads.googleads.v16.resources.SmartCampaignSetting.PhoneNumber!
advertising_language_code (	
	final_url (	H �
%ad_optimized_business_profile_setting	 (2Z.google.ads.googleads.v16.resources.SmartCampaignSetting.AdOptimizedBusinessProfileSettingH 
business_name (	H#
business_profile_location
 (	He
PhoneNumber
phone_number (	H �
country_code (	H�B
_phone_numberB
_country_codeY
!AdOptimizedBusinessProfileSetting
include_lead_form (H �B
_include_lead_form:o�Al
-googleads.googleapis.com/SmartCampaignSetting;customers/{customer_id}/smartCampaignSettings/{campaign_id}B
landing_pageB
business_settingB�
&com.google.ads.googleads.v16.resourcesBSmartCampaignSettingProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v16/resources;resources�GAA�"Google.Ads.GoogleAds.V16.Resources�"Google\\Ads\\GoogleAds\\V16\\Resources�&Google::Ads::GoogleAds::V16::Resourcesbproto3
�
:google/ads/googleads/v16/enums/smart_campaign_status.protogoogle.ads.googleads.v16.enums"�
SmartCampaignStatusEnum"�
SmartCampaignStatus
UNSPECIFIED 
UNKNOWN

PAUSED
NOT_ELIGIBLE
PENDING
ELIGIBLE
REMOVED	
ENDEDB�
"com.google.ads.googleads.v16.enumsBSmartCampaignStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
:google/ads/googleads/v16/enums/response_content_type.protogoogle.ads.googleads.v16.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v16.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Ggoogle/ads/googleads/v16/enums/smart_campaign_not_eligible_reason.protogoogle.ads.googleads.v16.enums"�
"SmartCampaignNotEligibleReasonEnum"�
SmartCampaignNotEligibleReason
UNSPECIFIED 
UNKNOWN
ACCOUNT_ISSUE
BILLING_ISSUE%
!BUSINESS_PROFILE_LOCATION_REMOVED
ALL_ADS_DISAPPROVEDB�
"com.google.ads.googleads.v16.enumsB#SmartCampaignNotEligibleReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Fgoogle/ads/googleads/v16/services/smart_campaign_setting_service.proto!google.ads.googleads.v16.servicesGgoogle/ads/googleads/v16/enums/smart_campaign_not_eligible_reason.proto:google/ads/googleads/v16/enums/smart_campaign_status.proto?google/ads/googleads/v16/resources/smart_campaign_setting.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"m
GetSmartCampaignStatusRequestL
resource_name (	B5�A�A/
-googleads.googleapis.com/SmartCampaignSetting"�
SmartCampaignNotEligibleDetails�
not_eligible_reason (2a.google.ads.googleads.v16.enums.SmartCampaignNotEligibleReasonEnum.SmartCampaignNotEligibleReasonH �B
_not_eligible_reason"�
SmartCampaignEligibleDetails&
last_impression_date_time (	H �
end_date_time (	H�B
_last_impression_date_timeB
_end_date_time"P
SmartCampaignPausedDetails
paused_date_time (	H �B
_paused_date_time"S
SmartCampaignRemovedDetails
removed_date_time (	H �B
_removed_date_time"I
SmartCampaignEndedDetails
end_date_time (	H �B
_end_date_time"�
GetSmartCampaignStatusResponsej
smart_campaign_status (2K.google.ads.googleads.v16.enums.SmartCampaignStatusEnum.SmartCampaignStatusb
not_eligible_details (2B.google.ads.googleads.v16.services.SmartCampaignNotEligibleDetailsH [
eligible_details (2?.google.ads.googleads.v16.services.SmartCampaignEligibleDetailsH W
paused_details (2=.google.ads.googleads.v16.services.SmartCampaignPausedDetailsH Y
removed_details (2>.google.ads.googleads.v16.services.SmartCampaignRemovedDetailsH U
ended_details (2<.google.ads.googleads.v16.services.SmartCampaignEndedDetailsH B
smart_campaign_status_details"�
"MutateSmartCampaignSettingsRequest
customer_id (	B�AY

operations (2@.google.ads.googleads.v16.services.SmartCampaignSettingOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v16.enums.ResponseContentTypeEnum.ResponseContentType"�
SmartCampaignSettingOperationH
update (28.google.ads.googleads.v16.resources.SmartCampaignSetting/
update_mask (2.google.protobuf.FieldMask"�
#MutateSmartCampaignSettingsResponse1
partial_failure_error (2.google.rpc.StatusT
results (2C.google.ads.googleads.v16.services.MutateSmartCampaignSettingResult"�
 MutateSmartCampaignSettingResultI
resource_name (	B2�A/
-googleads.googleapis.com/SmartCampaignSettingX
smart_campaign_setting (28.google.ads.googleads.v16.resources.SmartCampaignSetting2�
SmartCampaignSettingService�
GetSmartCampaignStatus@.google.ads.googleads.v16.services.GetSmartCampaignStatusRequestA.google.ads.googleads.v16.services.GetSmartCampaignStatusResponse"g�Aresource_name���QO/v16/{resource_name=customers/*/smartCampaignSettings/*}:getSmartCampaignStatus�
MutateSmartCampaignSettingsE.google.ads.googleads.v16.services.MutateSmartCampaignSettingsRequestF.google.ads.googleads.v16.services.MutateSmartCampaignSettingsResponse"_�Acustomer_id,operations���@";/v16/customers/{customer_id=*}/smartCampaignSettings:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v16.servicesB SmartCampaignSettingServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v16/services;services�GAA�!Google.Ads.GoogleAds.V16.Services�!Google\\Ads\\GoogleAds\\V16\\Services�%Google::Ads::GoogleAds::V16::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

