<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/resources/user_interest.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Resources;

class UserInterest
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
�
Agoogle/ads/googleads/v16/enums/advertising_channel_sub_type.protogoogle.ads.googleads.v16.enums"�
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
"com.google.ads.googleads.v16.enumsBAdvertisingChannelSubTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
=google/ads/googleads/v16/enums/advertising_channel_type.protogoogle.ads.googleads.v16.enums"�
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
	DISCOVERY

TRAVELB�
"com.google.ads.googleads.v16.enumsBAdvertisingChannelTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Qgoogle/ads/googleads/v16/enums/criterion_category_channel_availability_mode.protogoogle.ads.googleads.v16.enums"�
,CriterionCategoryChannelAvailabilityModeEnum"�
(CriterionCategoryChannelAvailabilityMode
UNSPECIFIED 
UNKNOWN
ALL_CHANNELS!
CHANNEL_TYPE_AND_ALL_SUBTYPES$
 CHANNEL_TYPE_AND_SUBSET_SUBTYPESB�
"com.google.ads.googleads.v16.enumsB-CriterionCategoryChannelAvailabilityModeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Pgoogle/ads/googleads/v16/enums/criterion_category_locale_availability_mode.protogoogle.ads.googleads.v16.enums"�
+CriterionCategoryLocaleAvailabilityModeEnum"�
\'CriterionCategoryLocaleAvailabilityMode
UNSPECIFIED 
UNKNOWN
ALL_LOCALES
COUNTRY_AND_ALL_LANGUAGES
LANGUAGE_AND_ALL_COUNTRIES
COUNTRY_AND_LANGUAGEB�
"com.google.ads.googleads.v16.enumsB,CriterionCategoryLocaleAvailabilityModeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Egoogle/ads/googleads/v16/common/criterion_category_availability.protogoogle.ads.googleads.v16.common=google/ads/googleads/v16/enums/advertising_channel_type.protoQgoogle/ads/googleads/v16/enums/criterion_category_channel_availability_mode.protoPgoogle/ads/googleads/v16/enums/criterion_category_locale_availability_mode.proto"�
CriterionCategoryAvailabilityV
channel (2E.google.ads.googleads.v16.common.CriterionCategoryChannelAvailabilityT
locale (2D.google.ads.googleads.v16.common.CriterionCategoryLocaleAvailability"�
$CriterionCategoryChannelAvailability�
availability_mode (2u.google.ads.googleads.v16.enums.CriterionCategoryChannelAvailabilityModeEnum.CriterionCategoryChannelAvailabilityModes
advertising_channel_type (2Q.google.ads.googleads.v16.enums.AdvertisingChannelTypeEnum.AdvertisingChannelType}
advertising_channel_sub_type (2W.google.ads.googleads.v16.enums.AdvertisingChannelSubTypeEnum.AdvertisingChannelSubType-
 include_default_channel_sub_type (H �B#
!_include_default_channel_sub_type"�
#CriterionCategoryLocaleAvailability�
availability_mode (2s.google.ads.googleads.v16.enums.CriterionCategoryLocaleAvailabilityModeEnum.CriterionCategoryLocaleAvailabilityMode
country_code (	H �
language_code (	H�B
_country_codeB
_language_codeB�
#com.google.ads.googleads.v16.commonB"CriterionCategoryAvailabilityProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v16/common;common�GAA�Google.Ads.GoogleAds.V16.Common�Google\\Ads\\GoogleAds\\V16\\Common�#Google::Ads::GoogleAds::V16::Commonbproto3
�
@google/ads/googleads/v16/enums/user_interest_taxonomy_type.protogoogle.ads.googleads.v16.enums"�
UserInterestTaxonomyTypeEnum"�
UserInterestTaxonomyType
UNSPECIFIED 
UNKNOWN
AFFINITY
	IN_MARKET
MOBILE_APP_INSTALL_USER
VERTICAL_GEO
NEW_SMART_PHONE_USERB�
"com.google.ads.googleads.v16.enumsBUserInterestTaxonomyTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
6google/ads/googleads/v16/resources/user_interest.proto"google.ads.googleads.v16.resources@google/ads/googleads/v16/enums/user_interest_taxonomy_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
UserInterestD
resource_name (	B-�A�A\'
%googleads.googleapis.com/UserInterestq
taxonomy_type (2U.google.ads.googleads.v16.enums.UserInterestTaxonomyTypeEnum.UserInterestTaxonomyTypeB�A"
user_interest_id (B�AH �
name	 (	B�AH�P
user_interest_parent
 (	B-�A�A\'
%googleads.googleapis.com/UserInterestH�!
launched_to_all (B�AH�[
availabilities (2>.google.ads.googleads.v16.common.CriterionCategoryAvailabilityB�A:d�Aa
%googleads.googleapis.com/UserInterest8customers/{customer_id}/userInterests/{user_interest_id}B
_user_interest_idB
_nameB
_user_interest_parentB
_launched_to_allB�
&com.google.ads.googleads.v16.resourcesBUserInterestProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v16/resources;resources�GAA�"Google.Ads.GoogleAds.V16.Resources�"Google\\Ads\\GoogleAds\\V16\\Resources�&Google::Ads::GoogleAds::V16::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

