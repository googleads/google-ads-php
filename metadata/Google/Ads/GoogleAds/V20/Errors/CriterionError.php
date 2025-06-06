<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/criterion_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Errors;

class CriterionError
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
χ2
5google/ads/googleads/v20/errors/criterion_error.protogoogle.ads.googleads.v20.errors"0
CriterionErrorEnum"0
CriterionError
UNSPECIFIED 
UNKNOWN
CONCRETE_TYPE_REQUIRED
INVALID_EXCLUDED_CATEGORY
INVALID_KEYWORD_TEXT
KEYWORD_TEXT_TOO_LONG
KEYWORD_HAS_TOO_MANY_WORDS
KEYWORD_HAS_INVALID_CHARS
INVALID_PLACEMENT_URL
INVALID_USER_LIST	
INVALID_USER_INTEREST
$
 INVALID_FORMAT_FOR_PLACEMENT_URL
PLACEMENT_URL_IS_TOO_LONG"
PLACEMENT_URL_HAS_ILLEGAL_CHAR,
(PLACEMENT_URL_HAS_MULTIPLE_SITES_IN_LINE9
5PLACEMENT_IS_NOT_AVAILABLE_FOR_TARGETING_OR_EXCLUSION
INVALID_TOPIC_PATH
INVALID_YOUTUBE_CHANNEL_ID
INVALID_YOUTUBE_VIDEO_ID\'
#YOUTUBE_VERTICAL_CHANNEL_DEPRECATED*
&YOUTUBE_DEMOGRAPHIC_CHANNEL_DEPRECATED
YOUTUBE_URL_UNSUPPORTED 
CANNOT_EXCLUDE_CRITERIA_TYPE
CANNOT_ADD_CRITERIA_TYPE$
 CANNOT_EXCLUDE_SIMILAR_USER_LIST
CANNOT_ADD_CLOSED_USER_LIST:
6CANNOT_ADD_DISPLAY_ONLY_LISTS_TO_SEARCH_ONLY_CAMPAIGNS5
1CANNOT_ADD_DISPLAY_ONLY_LISTS_TO_SEARCH_CAMPAIGNS7
3CANNOT_ADD_DISPLAY_ONLY_LISTS_TO_SHOPPING_CAMPAIGNS1
-CANNOT_ADD_USER_INTERESTS_TO_SEARCH_CAMPAIGNS9
5CANNOT_SET_BIDS_ON_CRITERION_TYPE_IN_SEARCH_CAMPAIGNS 7
3CANNOT_ADD_URLS_TO_CRITERION_TYPE_FOR_CAMPAIGN_TYPE!
INVALID_COMBINED_AUDIENCEz
INVALID_CUSTOM_AFFINITY`
INVALID_CUSTOM_INTENTa
INVALID_CUSTOM_AUDIENCEy
INVALID_IP_ADDRESS"
INVALID_IP_FORMAT#
INVALID_MOBILE_APP$
INVALID_MOBILE_APP_CATEGORY%
INVALID_CRITERION_ID&
CANNOT_TARGET_CRITERION\'$
 CANNOT_TARGET_OBSOLETE_CRITERION("
CRITERION_ID_AND_TYPE_MISMATCH)
INVALID_PROXIMITY_RADIUS*"
INVALID_PROXIMITY_RADIUS_UNITS+ 
INVALID_STREETADDRESS_LENGTH,
INVALID_CITYNAME_LENGTH-
INVALID_REGIONCODE_LENGTH.
INVALID_REGIONNAME_LENGTH/
INVALID_POSTALCODE_LENGTH0
INVALID_COUNTRY_CODE1
INVALID_LATITUDE2
INVALID_LONGITUDE36
2PROXIMITY_GEOPOINT_AND_ADDRESS_BOTH_CANNOT_BE_NULL4
INVALID_PROXIMITY_ADDRESS5
INVALID_USER_DOMAIN_NAME6 
CRITERION_PARAMETER_TOO_LONG7&
"AD_SCHEDULE_TIME_INTERVALS_OVERLAP82
.AD_SCHEDULE_INTERVAL_CANNOT_SPAN_MULTIPLE_DAYS9%
!AD_SCHEDULE_INVALID_TIME_INTERVAL:0
,AD_SCHEDULE_EXCEEDED_INTERVALS_PER_DAY_LIMIT;/
+AD_SCHEDULE_CRITERION_ID_MISMATCHING_FIELDS<$
 CANNOT_BID_MODIFY_CRITERION_TYPE=2
.CANNOT_BID_MODIFY_CRITERION_CAMPAIGN_OPTED_OUT>(
$CANNOT_BID_MODIFY_NEGATIVE_CRITERION?
BID_MODIFIER_ALREADY_EXISTS@
FEED_ID_NOT_ALLOWEDA(
$ACCOUNT_INELIGIBLE_FOR_CRITERIA_TYPEB.
*CRITERIA_TYPE_INVALID_FOR_BIDDING_STRATEGYC
CANNOT_EXCLUDE_CRITERIOND
CANNOT_REMOVE_CRITERIONE$
 INVALID_PRODUCT_BIDDING_CATEGORYL
MISSING_SHOPPING_SETTINGM
INVALID_MATCHING_FUNCTIONN
LOCATION_FILTER_NOT_ALLOWEDO$
 INVALID_FEED_FOR_LOCATION_FILTERb
LOCATION_FILTER_INVALIDP7
3CANNOT_SET_GEO_TARGET_CONSTANTS_WITH_FEED_ITEM_SETS{\'
"CANNOT_SET_BOTH_ASSET_SET_AND_FEED3
.CANNOT_SET_FEED_OR_FEED_ITEM_SETS_FOR_CUSTOMER,
\'CANNOT_SET_ASSET_SET_FIELD_FOR_CUSTOMER4
/CANNOT_SET_GEO_TARGET_CONSTANTS_WITH_ASSET_SETS.
)CANNOT_SET_ASSET_SETS_WITH_FEED_ITEM_SETS%
 INVALID_LOCATION_GROUP_ASSET_SET!
INVALID_LOCATION_GROUP_RADIUS|&
"INVALID_LOCATION_GROUP_RADIUS_UNIT}2
.CANNOT_ATTACH_CRITERIA_AT_CAMPAIGN_AND_ADGROUPQ9
5HOTEL_LENGTH_OF_STAY_OVERLAPS_WITH_EXISTING_CRITERIONRA
=HOTEL_ADVANCE_BOOKING_WINDOW_OVERLAPS_WITH_EXISTING_CRITERIONS.
*FIELD_INCOMPATIBLE_WITH_NEGATIVE_TARGETINGT
INVALID_WEBPAGE_CONDITIONU!
INVALID_WEBPAGE_CONDITION_URLV)
%WEBPAGE_CONDITION_URL_CANNOT_BE_EMPTYW.
*WEBPAGE_CONDITION_URL_UNSUPPORTED_PROTOCOLX.
*WEBPAGE_CONDITION_URL_CANNOT_BE_IP_ADDRESSYE
AWEBPAGE_CONDITION_URL_DOMAIN_NOT_CONSISTENT_WITH_CAMPAIGN_SETTINGZ1
-WEBPAGE_CONDITION_URL_CANNOT_BE_PUBLIC_SUFFIX[/
+WEBPAGE_CONDITION_URL_INVALID_PUBLIC_SUFFIX\\9
5WEBPAGE_CONDITION_URL_VALUE_TRACK_VALUE_NOT_SUPPORTED]<
8WEBPAGE_CRITERION_URL_EQUALS_CAN_HAVE_ONLY_ONE_CONDITION^7
3WEBPAGE_CRITERION_NOT_SUPPORTED_ON_NON_DSA_AD_GROUP_7
3CANNOT_TARGET_USER_LIST_FOR_SMART_DISPLAY_CAMPAIGNSc1
-CANNOT_TARGET_PLACEMENTS_FOR_SEARCH_CAMPAIGNS~*
&LISTING_SCOPE_TOO_MANY_DIMENSION_TYPESd\'
#LISTING_SCOPE_TOO_MANY_IN_OPERATORSe+
\'LISTING_SCOPE_IN_OPERATOR_NOT_SUPPORTEDf$
 DUPLICATE_LISTING_DIMENSION_TYPEg%
!DUPLICATE_LISTING_DIMENSION_VALUEh0
,CANNOT_SET_BIDS_ON_LISTING_GROUP_SUBDIVISIONi#
INVALID_LISTING_GROUP_HIERARCHYj+
\'LISTING_GROUP_UNIT_CANNOT_HAVE_CHILDRENk2
.LISTING_GROUP_SUBDIVISION_REQUIRES_OTHERS_CASEl:
6LISTING_GROUP_REQUIRES_SAME_DIMENSION_TYPE_AS_SIBLINGSm 
LISTING_GROUP_ALREADY_EXISTSn 
LISTING_GROUP_DOES_NOT_EXISTo#
LISTING_GROUP_CANNOT_BE_REMOVEDp
INVALID_LISTING_GROUP_TYPEq*
&LISTING_GROUP_ADD_MAY_ONLY_USE_TEMP_IDr
LISTING_SCOPE_TOO_LONGs%
!LISTING_SCOPE_TOO_MANY_DIMENSIONSt
LISTING_GROUP_TOO_LONGu
LISTING_GROUP_TREE_TOO_DEEPv
INVALID_LISTING_DIMENSIONw"
INVALID_LISTING_DIMENSION_TYPEx@
<ADVERTISER_NOT_ON_ALLOWLIST_FOR_COMBINED_AUDIENCE_ON_DISPLAY,
\'CANNOT_TARGET_REMOVED_COMBINED_AUDIENCE!
INVALID_COMBINED_AUDIENCE_ID*
%CANNOT_TARGET_REMOVED_CUSTOM_AUDIENCE?
:HOTEL_CHECK_IN_DATE_RANGE_OVERLAPS_WITH_EXISTING_CRITERION3
.HOTEL_CHECK_IN_DATE_RANGE_START_DATE_TOO_EARLY0
+HOTEL_CHECK_IN_DATE_RANGE_END_DATE_TOO_LATE\'
"HOTEL_CHECK_IN_DATE_RANGE_REVERSED-
(BROAD_MATCH_MODIFIER_KEYWORD_NOT_ALLOWED)
$ONE_AUDIENCE_ALLOWED_PER_ASSET_GROUP,
\'AUDIENCE_NOT_ELIGIBLE_FOR_CAMPAIGN_TYPEF
AAUDIENCE_NOT_ALLOWED_TO_ATTACH_WHEN_AUDIENCE_GROUPED_SET_TO_FALSE+
&CANNOT_TARGET_CUSTOMER_MATCH_USER_LIST/
*NEGATIVE_KEYWORD_SHARED_SET_DOES_NOT_EXIST3
.CANNOT_ADD_REMOVED_NEGATIVE_KEYWORD_SHARED_SET;
6CANNOT_HAVE_MULTIPLE_NEGATIVE_KEYWORD_LIST_PER_ACCOUNT/
*CUSTOMER_CANNOT_ADD_CRITERION_OF_THIS_TYPE$
CANNOT_TARGET_SIMILAR_USER_LISTG
BCANNOT_ADD_AUDIENCE_SEGMENT_CRITERION_WHEN_AUDIENCE_GROUPED_IS_SET&
!ONE_AUDIENCE_ALLOWED_PER_AD_GROUP!
INVALID_DETAILED_DEMOGRAPHIC
CANNOT_RECOGNIZE_BRAND$
BRAND_SHARED_SET_DOES_NOT_EXIST(
#CANNOT_ADD_REMOVED_BRAND_SHARED_SET8
3ONLY_EXCLUSION_BRAND_LIST_ALLOWED_FOR_CAMPAIGN_TYPE<
7LOCATION_TARGETING_NOT_ELIGIBLE_FOR_RESTRICTED_CAMPAIGN¦Bσ
#com.google.ads.googleads.v20.errorsBCriterionErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v20/errors;errors’GAAͺGoogle.Ads.GoogleAds.V20.ErrorsΚGoogle\\Ads\\GoogleAds\\V20\\Errorsκ#Google::Ads::GoogleAds::V20::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

