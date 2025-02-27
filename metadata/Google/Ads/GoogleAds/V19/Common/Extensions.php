<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/extensions.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Common;

class Extensions
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
6google/ads/googleads/v19/common/custom_parameter.protogoogle.ads.googleads.v19.common"I
CustomParameter
key (	H �
value (	H�B
_keyB
_valueB�
#com.google.ads.googleads.v19.commonBCustomParameterProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/common;common�GAA�Google.Ads.GoogleAds.V19.Common�Google\\Ads\\GoogleAds\\V19\\Common�#Google::Ads::GoogleAds::V19::Commonbproto3
�
Dgoogle/ads/googleads/v19/enums/call_conversion_reporting_state.protogoogle.ads.googleads.v19.enums"�
 CallConversionReportingStateEnum"�
CallConversionReportingState
UNSPECIFIED 
UNKNOWN
DISABLED,
(USE_ACCOUNT_LEVEL_CALL_CONVERSION_ACTION-
)USE_RESOURCE_LEVEL_CALL_CONVERSION_ACTIONB�
"com.google.ads.googleads.v19.enumsB!CallConversionReportingStateProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�

0google/ads/googleads/v19/common/extensions.protogoogle.ads.googleads.v19.commonDgoogle/ads/googleads/v19/enums/call_conversion_reporting_state.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
CallFeedItem
phone_number (	H �
country_code (	H�"
call_tracking_enabled	 (H�#
call_conversion_action
 (	H�.
!call_conversion_tracking_disabled (H��
call_conversion_reporting_state (2].google.ads.googleads.v19.enums.CallConversionReportingStateEnum.CallConversionReportingStateB
_phone_numberB
_country_codeB
_call_tracking_enabledB
_call_conversion_actionB$
"_call_conversion_tracking_disabled"=
CalloutFeedItem
callout_text (	H �B
_callout_text"�
SitelinkFeedItem
	link_text	 (	H �
line1
 (	H�
line2 (	H�

final_urls (	
final_mobile_urls (	"
tracking_url_template (	H�O
url_custom_parameters (20.google.ads.googleads.v19.common.CustomParameter
final_url_suffix (	H�B

_link_textB
_line1B
_line2B
_tracking_url_templateB
_final_url_suffixB�
#com.google.ads.googleads.v19.commonBExtensionsProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/common;common�GAA�Google.Ads.GoogleAds.V19.Common�Google\\Ads\\GoogleAds\\V19\\Common�#Google::Ads::GoogleAds::V19::Commonbproto3'
        , true);
        static::$is_initialized = true;
    }
}

