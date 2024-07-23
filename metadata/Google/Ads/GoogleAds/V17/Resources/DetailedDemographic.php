<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/resources/detailed_demographic.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Resources;

class DetailedDemographic
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
�
=google/ads/googleads/v17/enums/advertising_channel_type.protogoogle.ads.googleads.v17.enums"�
AdvertisingChannelTypeEnum"�
AdvertisingChannelType
UNSPECIFIED 
UNKNOWN

SEARCH
DISPLAY
SHOPPING	
HOTEL	
VIDEO
MULTI_CHANNEL	
LOCAL	
SMART	
PERFORMANCE_MAX

LOCAL_SERVICES

TRAVEL

DEMAND_GENB�
"com.google.ads.googleads.v17.enumsBAdvertisingChannelTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
Pgoogle/ads/googleads/v17/enums/criterion_category_locale_availability_mode.protogoogle.ads.googleads.v17.enums"�
+CriterionCategoryLocaleAvailabilityModeEnum"�
\'CriterionCategoryLocaleAvailabilityMode
UNSPECIFIED 
UNKNOWN
ALL_LOCALES
COUNTRY_AND_ALL_LANGUAGES
LANGUAGE_AND_ALL_COUNTRIES
COUNTRY_AND_LANGUAGEB�
"com.google.ads.googleads.v17.enumsB,CriterionCategoryLocaleAvailabilityModeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
Agoogle/ads/googleads/v17/enums/advertising_channel_sub_type.protogoogle.ads.googleads.v17.enums"�
AdvertisingChannelSubTypeEnum"�
AdvertisingChannelSubType
UNSPECIFIED 
UNKNOWN
SEARCH_MOBILE_APP
DISPLAY_MOBILE_APP
SEARCH_EXPRESS
DISPLAY_EXPRESS
SHOPPING_SMART_ADS
DISPLAY_GMAIL_AD
DISPLAY_SMART_CAMPAIGN
VIDEO_OUTSTREAM	
VIDEO_ACTION

VIDEO_NON_SKIPPABLE
APP_CAMPAIGN
APP_CAMPAIGN_FOR_ENGAGEMENT
LOCAL_CAMPAIGN#
SHOPPING_COMPARISON_LISTING_ADS
SMART_CAMPAIGN
VIDEO_SEQUENCE%
!APP_CAMPAIGN_FOR_PRE_REGISTRATION 
VIDEO_REACH_TARGET_FREQUENCY
TRAVEL_ACTIVITIESB�
"com.google.ads.googleads.v17.enumsBAdvertisingChannelSubTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
Qgoogle/ads/googleads/v17/enums/criterion_category_channel_availability_mode.protogoogle.ads.googleads.v17.enums"�
,CriterionCategoryChannelAvailabilityModeEnum"�
(CriterionCategoryChannelAvailabilityMode
UNSPECIFIED 
UNKNOWN
ALL_CHANNELS!
CHANNEL_TYPE_AND_ALL_SUBTYPES$
 CHANNEL_TYPE_AND_SUBSET_SUBTYPESB�
"com.google.ads.googleads.v17.enumsB-CriterionCategoryChannelAvailabilityModeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
Egoogle/ads/googleads/v17/common/criterion_category_availability.protogoogle.ads.googleads.v17.common=google/ads/googleads/v17/enums/advertising_channel_type.protoQgoogle/ads/googleads/v17/enums/criterion_category_channel_availability_mode.protoPgoogle/ads/googleads/v17/enums/criterion_category_locale_availability_mode.proto"�
CriterionCategoryAvailabilityV
channel (2E.google.ads.googleads.v17.common.CriterionCategoryChannelAvailabilityT
locale (2D.google.ads.googleads.v17.common.CriterionCategoryLocaleAvailability"�
$CriterionCategoryChannelAvailability�
availability_mode (2u.google.ads.googleads.v17.enums.CriterionCategoryChannelAvailabilityModeEnum.CriterionCategoryChannelAvailabilityModes
advertising_channel_type (2Q.google.ads.googleads.v17.enums.AdvertisingChannelTypeEnum.AdvertisingChannelType}
advertising_channel_sub_type (2W.google.ads.googleads.v17.enums.AdvertisingChannelSubTypeEnum.AdvertisingChannelSubType-
 include_default_channel_sub_type (H �B#
!_include_default_channel_sub_type"�
#CriterionCategoryLocaleAvailability�
availability_mode (2s.google.ads.googleads.v17.enums.CriterionCategoryLocaleAvailabilityModeEnum.CriterionCategoryLocaleAvailabilityMode
country_code (	H �
language_code (	H�B
_country_codeB
_language_codeB�
#com.google.ads.googleads.v17.commonB"CriterionCategoryAvailabilityProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/common;common�GAA�Google.Ads.GoogleAds.V17.Common�Google\\Ads\\GoogleAds\\V17\\Common�#Google::Ads::GoogleAds::V17::Commonbproto3
�
=google/ads/googleads/v17/resources/detailed_demographic.proto"google.ads.googleads.v17.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
DetailedDemographicK
resource_name (	B4�A�A.
,googleads.googleapis.com/DetailedDemographic
id (B�A
name (	B�AD
parent (	B4�A�A.
,googleads.googleapis.com/DetailedDemographic
launched_to_all (B�A[
availabilities (2>.google.ads.googleads.v17.common.CriterionCategoryAvailabilityB�A:y�Av
,googleads.googleapis.com/DetailedDemographicFcustomers/{customer_id}/detailedDemographics/{detailed_demographic_id}B�
&com.google.ads.googleads.v17.resourcesBDetailedDemographicProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v17/resources;resources�GAA�"Google.Ads.GoogleAds.V17.Resources�"Google\\Ads\\GoogleAds\\V17\\Resources�&Google::Ads::GoogleAds::V17::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

