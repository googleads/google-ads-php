<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/conversion_action_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class ConversionActionService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
6google/ads/googleads/v19/enums/conversion_origin.protogoogle.ads.googleads.v19.enums"�
ConversionOriginEnum"�
ConversionOrigin
UNSPECIFIED 
UNKNOWN
WEBSITE
GOOGLE_HOSTED
APP
CALL_FROM_ADS	
STORE
YOUTUBE_HOSTEDB�
"com.google.ads.googleads.v19.enumsBConversionOriginProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
7google/ads/googleads/v19/enums/tracking_code_type.protogoogle.ads.googleads.v19.enums"�
TrackingCodeTypeEnum"w
TrackingCodeType
UNSPECIFIED 
UNKNOWN
WEBPAGE
WEBPAGE_ONCLICK
CLICK_TO_CALL
WEBSITE_CALLB�
"com.google.ads.googleads.v19.enumsBTrackingCodeTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
>google/ads/googleads/v19/enums/tracking_code_page_format.protogoogle.ads.googleads.v19.enums"g
TrackingCodePageFormatEnum"I
TrackingCodePageFormat
UNSPECIFIED 
UNKNOWN
HTML
AMPB�
"com.google.ads.googleads.v19.enumsBTrackingCodePageFormatProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
6google/ads/googleads/v19/enums/attribution_model.protogoogle.ads.googleads.v19.enums"�
AttributionModelEnum"�
AttributionModel
UNSPECIFIED 
UNKNOWN
EXTERNALd
GOOGLE_ADS_LAST_CLICKe)
%GOOGLE_SEARCH_ATTRIBUTION_FIRST_CLICKf$
 GOOGLE_SEARCH_ATTRIBUTION_LINEARg(
$GOOGLE_SEARCH_ATTRIBUTION_TIME_DECAYh,
(GOOGLE_SEARCH_ATTRIBUTION_POSITION_BASEDi)
%GOOGLE_SEARCH_ATTRIBUTION_DATA_DRIVENjB�
"com.google.ads.googleads.v19.enumsBAttributionModelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
?google/ads/googleads/v19/enums/conversion_action_category.protogoogle.ads.googleads.v19.enums"�
ConversionActionCategoryEnum"�
ConversionActionCategory
UNSPECIFIED 
UNKNOWN
DEFAULT
	PAGE_VIEW
PURCHASE

SIGNUP
DOWNLOAD
ADD_TO_CART
BEGIN_CHECKOUT	
SUBSCRIBE_PAID

PHONE_CALL_LEAD
IMPORTED_LEAD
SUBMIT_LEAD_FORM
BOOK_APPOINTMENT
REQUEST_QUOTE
GET_DIRECTIONS
OUTBOUND_CLICK
CONTACT

ENGAGEMENT
STORE_VISIT

STORE_SALE
QUALIFIED_LEAD
CONVERTED_LEADB�
"com.google.ads.googleads.v19.enumsBConversionActionCategoryProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
Dgoogle/ads/googleads/v19/enums/conversion_action_counting_type.protogoogle.ads.googleads.v19.enums"�
 ConversionActionCountingTypeEnum"c
ConversionActionCountingType
UNSPECIFIED 
UNKNOWN
ONE_PER_CLICK
MANY_PER_CLICKB�
"com.google.ads.googleads.v19.enumsB!ConversionActionCountingTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
=google/ads/googleads/v19/enums/conversion_action_status.protogoogle.ads.googleads.v19.enums"z
ConversionActionStatusEnum"\\
ConversionActionStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVED

HIDDENB�
"com.google.ads.googleads.v19.enumsBConversionActionStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
1google/ads/googleads/v19/common/tag_snippet.protogoogle.ads.googleads.v19.common7google/ads/googleads/v19/enums/tracking_code_type.proto"�

TagSnippetS
type (2E.google.ads.googleads.v19.enums.TrackingCodeTypeEnum.TrackingCodeTypef
page_format (2Q.google.ads.googleads.v19.enums.TrackingCodePageFormatEnum.TrackingCodePageFormat
global_site_tag (	H �
event_snippet (	H�B
_global_site_tagB
_event_snippetB�
#com.google.ads.googleads.v19.commonBTagSnippetProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/common;common�GAA�Google.Ads.GoogleAds.V19.Common�Google\\Ads\\GoogleAds\\V19\\Common�#Google::Ads::GoogleAds::V19::Commonbproto3
�
=google/ads/googleads/v19/enums/data_driven_model_status.protogoogle.ads.googleads.v19.enums"�
DataDrivenModelStatusEnum"q
DataDrivenModelStatus
UNSPECIFIED 
UNKNOWN
	AVAILABLE	
STALE
EXPIRED
NEVER_GENERATEDB�
"com.google.ads.googleads.v19.enumsBDataDrivenModelStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
:google/ads/googleads/v19/enums/response_content_type.protogoogle.ads.googleads.v19.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v19.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
;google/ads/googleads/v19/enums/conversion_action_type.protogoogle.ads.googleads.v19.enums"�

ConversionActionTypeEnum"�	
ConversionActionType
UNSPECIFIED 
UNKNOWN
AD_CALL
CLICK_TO_CALL
GOOGLE_PLAY_DOWNLOAD
GOOGLE_PLAY_IN_APP_PURCHASE
UPLOAD_CALLS
UPLOAD_CLICKS
WEBPAGE
WEBSITE_CALL	
STORE_SALES_DIRECT_UPLOAD

STORE_SALES
FIREBASE_ANDROID_FIRST_OPEN$
 FIREBASE_ANDROID_IN_APP_PURCHASE
FIREBASE_ANDROID_CUSTOM
FIREBASE_IOS_FIRST_OPEN 
FIREBASE_IOS_IN_APP_PURCHASE
FIREBASE_IOS_CUSTOM0
,THIRD_PARTY_APP_ANALYTICS_ANDROID_FIRST_OPEN5
1THIRD_PARTY_APP_ANALYTICS_ANDROID_IN_APP_PURCHASE,
(THIRD_PARTY_APP_ANALYTICS_ANDROID_CUSTOM,
(THIRD_PARTY_APP_ANALYTICS_IOS_FIRST_OPEN1
-THIRD_PARTY_APP_ANALYTICS_IOS_IN_APP_PURCHASE(
$THIRD_PARTY_APP_ANALYTICS_IOS_CUSTOM 
ANDROID_APP_PRE_REGISTRATION#
ANDROID_INSTALLS_ALL_OTHER_APPS
FLOODLIGHT_ACTION
FLOODLIGHT_TRANSACTION
GOOGLE_HOSTED
LEAD_FORM_SUBMIT

SALESFORCE
SEARCH_ADS_360$
 SMART_CAMPAIGN_AD_CLICKS_TO_CALL %
!SMART_CAMPAIGN_MAP_CLICKS_TO_CALL!!
SMART_CAMPAIGN_MAP_DIRECTIONS" 
SMART_CAMPAIGN_TRACKED_CALLS#
STORE_VISITS$
WEBPAGE_CODELESS%
UNIVERSAL_ANALYTICS_GOAL&#
UNIVERSAL_ANALYTICS_TRANSACTION\'
GOOGLE_ANALYTICS_4_CUSTOM(
GOOGLE_ANALYTICS_4_PURCHASE)B�
"com.google.ads.googleads.v19.enumsBConversionActionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
6google/ads/googleads/v19/enums/mobile_app_vendor.protogoogle.ads.googleads.v19.enums"q
MobileAppVendorEnum"Z
MobileAppVendor
UNSPECIFIED 
UNKNOWN
APPLE_APP_STORE
GOOGLE_APP_STOREB�
"com.google.ads.googleads.v19.enumsBMobileAppVendorProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
:google/ads/googleads/v19/resources/conversion_action.proto"google.ads.googleads.v19.resources6google/ads/googleads/v19/enums/attribution_model.proto?google/ads/googleads/v19/enums/conversion_action_category.protoDgoogle/ads/googleads/v19/enums/conversion_action_counting_type.proto=google/ads/googleads/v19/enums/conversion_action_status.proto;google/ads/googleads/v19/enums/conversion_action_type.proto6google/ads/googleads/v19/enums/conversion_origin.proto=google/ads/googleads/v19/enums/data_driven_model_status.proto6google/ads/googleads/v19/enums/mobile_app_vendor.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
ConversionActionH
resource_name (	B1�A�A+
)googleads.googleapis.com/ConversionAction
id (B�AH �
name (	H�a
status (2Q.google.ads.googleads.v19.enums.ConversionActionStatusEnum.ConversionActionStatus`
type (2M.google.ads.googleads.v19.enums.ConversionActionTypeEnum.ConversionActionTypeB�AZ
origin (2E.google.ads.googleads.v19.enums.ConversionOriginEnum.ConversionOriginB�A
primary_for_goal (H�g
category (2U.google.ads.googleads.v19.enums.ConversionActionCategoryEnum.ConversionActionCategoryF
owner_customer (	B)�A�A#
!googleads.googleapis.com/CustomerH�*
include_in_conversions_metric (H�/
"click_through_lookback_window_days (H�.
!view_through_lookback_window_days (H�Z
value_settings (2B.google.ads.googleads.v19.resources.ConversionAction.ValueSettingst
counting_type (2].google.ads.googleads.v19.enums.ConversionActionCountingTypeEnum.ConversionActionCountingTypeq
attribution_model_settings (2M.google.ads.googleads.v19.resources.ConversionAction.AttributionModelSettingsF
tag_snippets (2+.google.ads.googleads.v19.common.TagSnippetB�A(
phone_call_duration_seconds (H�
app_id (	H�c
mobile_app_vendor (2C.google.ads.googleads.v19.enums.MobileAppVendorEnum.MobileAppVendorB�Ae
firebase_settings (2E.google.ads.googleads.v19.resources.ConversionAction.FirebaseSettingsB�A�
"third_party_app_analytics_settings (2S.google.ads.googleads.v19.resources.ConversionAction.ThirdPartyAppAnalyticsSettingsB�Aw
google_analytics_4_settings" (2M.google.ads.googleads.v19.resources.ConversionAction.GoogleAnalytics4SettingsB�A�
AttributionModelSettings`
attribution_model (2E.google.ads.googleads.v19.enums.AttributionModelEnum.AttributionModelv
data_driven_model_status (2O.google.ads.googleads.v19.enums.DataDrivenModelStatusEnum.DataDrivenModelStatusB�A�
ValueSettings
default_value (H �"
default_currency_code (	H�%
always_use_default_value (H�B
_default_valueB
_default_currency_codeB
_always_use_default_valuei
ThirdPartyAppAnalyticsSettings

event_name (	B�AH �
provider_name (	B�AB
_event_name�
FirebaseSettings

event_name (	B�AH �

project_id (	B�AH�
property_id (B�A
property_name (	B�AB
_event_nameB
_project_idi
GoogleAnalytics4Settings

event_name (	B�A
property_name (	B�A
property_id (B�A:p�Am
)googleads.googleapis.com/ConversionAction@customers/{customer_id}/conversionActions/{conversion_action_id}B
_idB
_nameB
_primary_for_goalB
_owner_customerB 
_include_in_conversions_metricB%
#_click_through_lookback_window_daysB$
"_view_through_lookback_window_daysB
_phone_call_duration_secondsB	
_app_idB�
&com.google.ads.googleads.v19.resourcesBConversionActionProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
Agoogle/ads/googleads/v19/services/conversion_action_service.proto!google.ads.googleads.v19.services:google/ads/googleads/v19/resources/conversion_action.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
MutateConversionActionsRequest
customer_id (	B�AU

operations (2<.google.ads.googleads.v19.services.ConversionActionOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v19.enums.ResponseContentTypeEnum.ResponseContentType"�
ConversionActionOperation/
update_mask (2.google.protobuf.FieldMaskF
create (24.google.ads.googleads.v19.resources.ConversionActionH F
update (24.google.ads.googleads.v19.resources.ConversionActionH @
remove (	B.�A+
)googleads.googleapis.com/ConversionActionH B
	operation"�
MutateConversionActionsResponse1
partial_failure_error (2.google.rpc.StatusP
results (2?.google.ads.googleads.v19.services.MutateConversionActionResult"�
MutateConversionActionResultE
resource_name (	B.�A+
)googleads.googleapis.com/ConversionActionO
conversion_action (24.google.ads.googleads.v19.resources.ConversionAction2�
ConversionActionService�
MutateConversionActionsA.google.ads.googleads.v19.services.MutateConversionActionsRequestB.google.ads.googleads.v19.services.MutateConversionActionsResponse"[�Acustomer_id,operations���<"7/v19/customers/{customer_id=*}/conversionActions:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesBConversionActionServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

