<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/resources/shared_criterion.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Resources;

class SharedCriterion
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
0google/ads/googleads/v17/enums/day_of_week.protogoogle.ads.googleads.v17.enums"�
DayOfWeekEnum"�
	DayOfWeek
UNSPECIFIED 
UNKNOWN

MONDAY
TUESDAY
	WEDNESDAY
THURSDAY

FRIDAY
SATURDAY

SUNDAYB�
"com.google.ads.googleads.v17.enumsBDayOfWeekProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
3google/ads/googleads/v17/enums/minute_of_hour.protogoogle.ads.googleads.v17.enums"s
MinuteOfHourEnum"_
MinuteOfHour
UNSPECIFIED 
UNKNOWN
ZERO
FIFTEEN

THIRTY

FORTY_FIVEB�
"com.google.ads.googleads.v17.enumsBMinuteOfHourProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
;google/ads/googleads/v17/enums/proximity_radius_units.protogoogle.ads.googleads.v17.enums"k
ProximityRadiusUnitsEnum"O
ProximityRadiusUnits
UNSPECIFIED 
UNKNOWN	
MILES

KILOMETERSB�
"com.google.ads.googleads.v17.enumsBProximityRadiusUnitsProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
7google/ads/googleads/v17/enums/product_type_level.protogoogle.ads.googleads.v17.enums"�
ProductTypeLevelEnum"l
ProductTypeLevel
UNSPECIFIED 
UNKNOWN

LEVEL1

LEVEL2

LEVEL3	

LEVEL4


LEVEL5B�
"com.google.ads.googleads.v17.enumsBProductTypeLevelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
3google/ads/googleads/v17/enums/criterion_type.protogoogle.ads.googleads.v17.enums"�
CriterionTypeEnum"�
CriterionType
UNSPECIFIED 
UNKNOWN
KEYWORD
	PLACEMENT
MOBILE_APP_CATEGORY
MOBILE_APPLICATION

DEVICE
LOCATION
LISTING_GROUP
AD_SCHEDULE	
	AGE_RANGE


GENDER
INCOME_RANGE
PARENTAL_STATUS
YOUTUBE_VIDEO
YOUTUBE_CHANNEL
	USER_LIST
	PROXIMITY	
TOPIC
LISTING_SCOPE
LANGUAGE
IP_BLOCK
CONTENT_LABEL
CARRIER
USER_INTEREST
WEBPAGE
OPERATING_SYSTEM_VERSION
APP_PAYMENT_MODEL
MOBILE_DEVICE
CUSTOM_AFFINITY
CUSTOM_INTENT
LOCATION_GROUP
CUSTOM_AUDIENCE 
COMBINED_AUDIENCE!
KEYWORD_THEME"
AUDIENCE#
NEGATIVE_KEYWORD_LIST$
LOCAL_SERVICE_ID%
SEARCH_THEME&	
BRAND\'

BRAND_LIST(

LIFE_EVENT)B�
"com.google.ads.googleads.v17.enumsBCriterionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
Cgoogle/ads/googleads/v17/enums/brand_request_rejection_reason.protogoogle.ads.googleads.v17.enums"�
BrandRequestRejectionReasonEnum"�
BrandRequestRejectionReason
UNSPECIFIED 
UNKNOWN
EXISTING_BRAND
EXISTING_BRAND_VARIANT
INCORRECT_INFORMATION
NOT_A_BRANDB�
"com.google.ads.googleads.v17.enumsB BrandRequestRejectionReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
0google/ads/googleads/v17/enums/brand_state.protogoogle.ads.googleads.v17.enums"�
BrandStateEnum"�

BrandState
UNSPECIFIED 
UNKNOWN
ENABLED

DEPRECATED

UNVERIFIED
APPROVED
	CANCELLED
REJECTEDB�
"com.google.ads.googleads.v17.enumsBBrandStateProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
5google/ads/googleads/v17/enums/interaction_type.protogoogle.ads.googleads.v17.enums"R
InteractionTypeEnum";
InteractionType
UNSPECIFIED 
UNKNOWN

CALLS�>B�
"com.google.ads.googleads.v17.enumsBInteractionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
Cgoogle/ads/googleads/v17/enums/product_custom_attribute_index.protogoogle.ads.googleads.v17.enums"�
ProductCustomAttributeIndexEnum"w
ProductCustomAttributeIndex
UNSPECIFIED 
UNKNOWN

INDEX0

INDEX1

INDEX2	

INDEX3


INDEX4B�
"com.google.ads.googleads.v17.enumsB ProductCustomAttributeIndexProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
6google/ads/googleads/v17/enums/product_condition.protogoogle.ads.googleads.v17.enums"l
ProductConditionEnum"T
ProductCondition
UNSPECIFIED 
UNKNOWN
NEW
REFURBISHED
USEDB�
"com.google.ads.googleads.v17.enumsBProductConditionProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
7google/ads/googleads/v17/enums/content_label_type.protogoogle.ads.googleads.v17.enums"�
ContentLabelTypeEnum"�
ContentLabelType
UNSPECIFIED 
UNKNOWN
SEXUALLY_SUGGESTIVE
BELOW_THE_FOLD
PARKED_DOMAIN
JUVENILE
	PROFANITY
TRAGEDY	
VIDEO	
VIDEO_RATING_DV_G

VIDEO_RATING_DV_PG
VIDEO_RATING_DV_T
VIDEO_RATING_DV_MA
VIDEO_NOT_YET_RATED
EMBEDDED_VIDEO
LIVE_STREAMING_VIDEO
SOCIAL_ISSUES*
&BRAND_SUITABILITY_CONTENT_FOR_FAMILIES$
 BRAND_SUITABILITY_GAMES_FIGHTING"
BRAND_SUITABILITY_GAMES_MATURE&
"BRAND_SUITABILITY_HEALTH_SENSITIVE0
,BRAND_SUITABILITY_HEALTH_SOURCE_UNDETERMINED!
BRAND_SUITABILITY_NEWS_RECENT$
 BRAND_SUITABILITY_NEWS_SENSITIVE.
*BRAND_SUITABILITY_NEWS_SOURCE_NOT_FEATURED
BRAND_SUITABILITY_POLITICS
BRAND_SUITABILITY_RELIGIONB�
"com.google.ads.googleads.v17.enumsBContentLabelTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
6google/ads/googleads/v17/enums/income_range_type.protogoogle.ads.googleads.v17.enums"�
IncomeRangeTypeEnum"�
IncomeRangeType
UNSPECIFIED 
UNKNOWN
INCOME_RANGE_0_50��
INCOME_RANGE_50_60��
INCOME_RANGE_60_70��
INCOME_RANGE_70_80��
INCOME_RANGE_80_90��
INCOME_RANGE_90_UP��
INCOME_RANGE_UNDETERMINED��B�
"com.google.ads.googleads.v17.enumsBIncomeRangeTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
0google/ads/googleads/v17/enums/gender_type.protogoogle.ads.googleads.v17.enums"d
GenderTypeEnum"R

GenderType
UNSPECIFIED 
UNKNOWN
MALE


FEMALE
UNDETERMINEDB�
"com.google.ads.googleads.v17.enumsBGenderTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
3google/ads/googleads/v17/enums/age_range_type.protogoogle.ads.googleads.v17.enums"�
AgeRangeTypeEnum"�
AgeRangeType
UNSPECIFIED 
UNKNOWN
AGE_RANGE_18_24��
AGE_RANGE_25_34��
AGE_RANGE_35_44��
AGE_RANGE_45_54��
AGE_RANGE_55_64��
AGE_RANGE_65_UP��
AGE_RANGE_UNDETERMINED��B�
"com.google.ads.googleads.v17.enumsBAgeRangeTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
>google/ads/googleads/v17/enums/hotel_date_selection_type.protogoogle.ads.googleads.v17.enums"~
HotelDateSelectionTypeEnum"`
HotelDateSelectionType
UNSPECIFIED 
UNKNOWN
DEFAULT_SELECTION2
USER_SELECTED3B�
"com.google.ads.googleads.v17.enumsBHotelDateSelectionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
9google/ads/googleads/v17/enums/parental_status_type.protogoogle.ads.googleads.v17.enums"
ParentalStatusTypeEnum"e
ParentalStatusType
UNSPECIFIED 
UNKNOWN
PARENT�
NOT_A_PARENT�
UNDETERMINED�B�
"com.google.ads.googleads.v17.enumsBParentalStatusTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
?google/ads/googleads/v17/enums/webpage_condition_operator.protogoogle.ads.googleads.v17.enums"r
WebpageConditionOperatorEnum"R
WebpageConditionOperator
UNSPECIFIED 
UNKNOWN

EQUALS
CONTAINSB�
"com.google.ads.googleads.v17.enumsBWebpageConditionOperatorProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
;google/ads/googleads/v17/enums/app_payment_model_type.protogoogle.ads.googleads.v17.enums"X
AppPaymentModelTypeEnum"=
AppPaymentModelType
UNSPECIFIED 
UNKNOWN
PAIDB�
"com.google.ads.googleads.v17.enumsBAppPaymentModelTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
@google/ads/googleads/v17/enums/product_channel_exclusivity.protogoogle.ads.googleads.v17.enums"�
ProductChannelExclusivityEnum"`
ProductChannelExclusivity
UNSPECIFIED 
UNKNOWN
SINGLE_CHANNEL
MULTI_CHANNELB�
"com.google.ads.googleads.v17.enumsBProductChannelExclusivityProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
7google/ads/googleads/v17/enums/listing_group_type.protogoogle.ads.googleads.v17.enums"c
ListingGroupTypeEnum"K
ListingGroupType
UNSPECIFIED 
UNKNOWN
SUBDIVISION
UNITB�
"com.google.ads.googleads.v17.enumsBListingGroupTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
;google/ads/googleads/v17/enums/product_category_level.protogoogle.ads.googleads.v17.enums"�
ProductCategoryLevelEnum"p
ProductCategoryLevel
UNSPECIFIED 
UNKNOWN

LEVEL1

LEVEL2

LEVEL3

LEVEL4

LEVEL5B�
"com.google.ads.googleads.v17.enumsBProductCategoryLevelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
4google/ads/googleads/v17/enums/product_channel.protogoogle.ads.googleads.v17.enums"[
ProductChannelEnum"E
ProductChannel
UNSPECIFIED 
UNKNOWN

ONLINE	
LOCALB�
"com.google.ads.googleads.v17.enumsBProductChannelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
>google/ads/googleads/v17/enums/webpage_condition_operand.protogoogle.ads.googleads.v17.enums"�
WebpageConditionOperandEnum"�
WebpageConditionOperand
UNSPECIFIED 
UNKNOWN
URL
CATEGORY

PAGE_TITLE
PAGE_CONTENT
CUSTOM_LABELB�
"com.google.ads.googleads.v17.enumsBWebpageConditionOperandProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
@google/ads/googleads/v17/enums/location_group_radius_units.protogoogle.ads.googleads.v17.enums"�
LocationGroupRadiusUnitsEnum"`
LocationGroupRadiusUnits
UNSPECIFIED 
UNKNOWN

METERS	
MILES
MILLI_MILESB�
"com.google.ads.googleads.v17.enumsBLocationGroupRadiusUnitsProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
+google/ads/googleads/v17/enums/device.protogoogle.ads.googleads.v17.enums"v

DeviceEnum"h
Device
UNSPECIFIED 
UNKNOWN

MOBILE

TABLET
DESKTOP
CONNECTED_TV	
OTHERB�
"com.google.ads.googleads.v17.enumsBDeviceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
7google/ads/googleads/v17/enums/keyword_match_type.protogoogle.ads.googleads.v17.enums"j
KeywordMatchTypeEnum"R
KeywordMatchType
UNSPECIFIED 
UNKNOWN	
EXACT

PHRASE	
BROADB�
"com.google.ads.googleads.v17.enumsBKeywordMatchTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�\\
.google/ads/googleads/v17/common/criteria.protogoogle.ads.googleads.v17.common;google/ads/googleads/v17/enums/app_payment_model_type.protoCgoogle/ads/googleads/v17/enums/brand_request_rejection_reason.proto0google/ads/googleads/v17/enums/brand_state.proto7google/ads/googleads/v17/enums/content_label_type.proto0google/ads/googleads/v17/enums/day_of_week.proto+google/ads/googleads/v17/enums/device.proto0google/ads/googleads/v17/enums/gender_type.proto>google/ads/googleads/v17/enums/hotel_date_selection_type.proto6google/ads/googleads/v17/enums/income_range_type.proto5google/ads/googleads/v17/enums/interaction_type.proto7google/ads/googleads/v17/enums/keyword_match_type.proto7google/ads/googleads/v17/enums/listing_group_type.proto@google/ads/googleads/v17/enums/location_group_radius_units.proto3google/ads/googleads/v17/enums/minute_of_hour.proto9google/ads/googleads/v17/enums/parental_status_type.proto;google/ads/googleads/v17/enums/product_category_level.proto4google/ads/googleads/v17/enums/product_channel.proto@google/ads/googleads/v17/enums/product_channel_exclusivity.proto6google/ads/googleads/v17/enums/product_condition.protoCgoogle/ads/googleads/v17/enums/product_custom_attribute_index.proto7google/ads/googleads/v17/enums/product_type_level.proto;google/ads/googleads/v17/enums/proximity_radius_units.proto>google/ads/googleads/v17/enums/webpage_condition_operand.proto?google/ads/googleads/v17/enums/webpage_condition_operator.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
KeywordInfo
text (	H �Y

match_type (2E.google.ads.googleads.v17.enums.KeywordMatchTypeEnum.KeywordMatchTypeB
_text")
PlacementInfo
url (	H �B
_url"A
NegativeKeywordListInfo

shared_set (	H �B
_shared_set"�
MobileAppCategoryInfob
mobile_app_category_constant (	B7�A4
2googleads.googleapis.com/MobileAppCategoryConstantH �B
_mobile_app_category_constant"S
MobileApplicationInfo
app_id (	H �
name (	H�B	
_app_idB
_name"H
LocationInfo 
geo_target_constant (	H �B
_geo_target_constant"M

DeviceInfo?
type (21.google.ads.googleads.v17.enums.DeviceEnum.Device"�
ListingGroupInfoS
type (2E.google.ads.googleads.v17.enums.ListingGroupTypeEnum.ListingGroupTypeI

case_value (25.google.ads.googleads.v17.common.ListingDimensionInfo&
parent_ad_group_criterion (	H �H
path (25.google.ads.googleads.v17.common.ListingDimensionPathH�B
_parent_ad_group_criterionB
_path"a
ListingDimensionPathI

dimensions (25.google.ads.googleads.v17.common.ListingDimensionInfo"]
ListingScopeInfoI

dimensions (25.google.ads.googleads.v17.common.ListingDimensionInfo"�
ListingDimensionInfo@
hotel_id (2,.google.ads.googleads.v17.common.HotelIdInfoH F
hotel_class (2/.google.ads.googleads.v17.common.HotelClassInfoH W
hotel_country_region (27.google.ads.googleads.v17.common.HotelCountryRegionInfoH F
hotel_state (2/.google.ads.googleads.v17.common.HotelStateInfoH D

hotel_city (2..google.ads.googleads.v17.common.HotelCityInfoH P
product_category (24.google.ads.googleads.v17.common.ProductCategoryInfoH J
product_brand (21.google.ads.googleads.v17.common.ProductBrandInfoH N
product_channel (23.google.ads.googleads.v17.common.ProductChannelInfoH e
product_channel_exclusivity	 (2>.google.ads.googleads.v17.common.ProductChannelExclusivityInfoH R
product_condition
 (25.google.ads.googleads.v17.common.ProductConditionInfoH _
product_custom_attribute (2;.google.ads.googleads.v17.common.ProductCustomAttributeInfoH M
product_item_id (22.google.ads.googleads.v17.common.ProductItemIdInfoH H
product_type (20.google.ads.googleads.v17.common.ProductTypeInfoH P
product_grouping (24.google.ads.googleads.v17.common.ProductGroupingInfoH L
product_labels (22.google.ads.googleads.v17.common.ProductLabelsInfoH _
product_legacy_condition (2;.google.ads.googleads.v17.common.ProductLegacyConditionInfoH Q
product_type_full (24.google.ads.googleads.v17.common.ProductTypeFullInfoH F
activity_id (2/.google.ads.googleads.v17.common.ActivityIdInfoH N
activity_rating (23.google.ads.googleads.v17.common.ActivityRatingInfoH P
activity_country (24.google.ads.googleads.v17.common.ActivityCountryInfoH L
activity_state (22.google.ads.googleads.v17.common.ActivityStateInfoH J
activity_city (21.google.ads.googleads.v17.common.ActivityCityInfoH a
unknown_listing_dimension (2<.google.ads.googleads.v17.common.UnknownListingDimensionInfoH B
	dimension"+
HotelIdInfo
value (	H �B
_value".
HotelClassInfo
value (H �B
_value"\\
HotelCountryRegionInfo%
country_region_criterion (	H �B
_country_region_criterion"B
HotelStateInfo
state_criterion (	H �B
_state_criterion"?
HotelCityInfo
city_criterion (	H �B
_city_criterion"�
ProductCategoryInfo
category_id (H �\\
level (2M.google.ads.googleads.v17.enums.ProductCategoryLevelEnum.ProductCategoryLevelB
_category_id"0
ProductBrandInfo
value (	H �B
_value"h
ProductChannelInfoR
channel (2A.google.ads.googleads.v17.enums.ProductChannelEnum.ProductChannel"�
ProductChannelExclusivityInfot
channel_exclusivity (2W.google.ads.googleads.v17.enums.ProductChannelExclusivityEnum.ProductChannelExclusivity"p
ProductConditionInfoX
	condition (2E.google.ads.googleads.v17.enums.ProductConditionEnum.ProductCondition"�
ProductCustomAttributeInfo
value (	H �j
index (2[.google.ads.googleads.v17.enums.ProductCustomAttributeIndexEnum.ProductCustomAttributeIndexB
_value"1
ProductItemIdInfo
value (	H �B
_value"�
ProductTypeInfo
value (	H �T
level (2E.google.ads.googleads.v17.enums.ProductTypeLevelEnum.ProductTypeLevelB
_value"3
ProductGroupingInfo
value (	H �B
_value"1
ProductLabelsInfo
value (	H �B
_value":
ProductLegacyConditionInfo
value (	H �B
_value"3
ProductTypeFullInfo
value (	H �B
_value"
UnknownListingDimensionInfo"}
HotelDateSelectionTypeInfo_
type (2Q.google.ads.googleads.v17.enums.HotelDateSelectionTypeEnum.HotelDateSelectionType"g
HotelAdvanceBookingWindowInfo
min_days (H �
max_days (H�B
	_min_daysB
	_max_days"g
HotelLengthOfStayInfo

min_nights (H �

max_nights (H�B
_min_nightsB
_max_nights"A
HotelCheckInDateRangeInfo

start_date (	
end_date (	"c
HotelCheckInDayInfoL
day_of_week (27.google.ads.googleads.v17.enums.DayOfWeekEnum.DayOfWeek".
ActivityIdInfo
value (	H �B
_value"2
ActivityRatingInfo
value (H �B
_value"3
ActivityCountryInfo
value (	H �B
_value"1
ActivityStateInfo
value (	H �B
_value"0
ActivityCityInfo
value (	H �B
_value"h
InteractionTypeInfoQ
type (2C.google.ads.googleads.v17.enums.InteractionTypeEnum.InteractionType"�
AdScheduleInfoS
start_minute (2=.google.ads.googleads.v17.enums.MinuteOfHourEnum.MinuteOfHourQ

end_minute (2=.google.ads.googleads.v17.enums.MinuteOfHourEnum.MinuteOfHour

start_hour (H �
end_hour (H�L
day_of_week (27.google.ads.googleads.v17.enums.DayOfWeekEnum.DayOfWeekB
_start_hourB
	_end_hour"[
AgeRangeInfoK
type (2=.google.ads.googleads.v17.enums.AgeRangeTypeEnum.AgeRangeType"U

GenderInfoG
type (29.google.ads.googleads.v17.enums.GenderTypeEnum.GenderType"d
IncomeRangeInfoQ
type (2C.google.ads.googleads.v17.enums.IncomeRangeTypeEnum.IncomeRangeType"m
ParentalStatusInfoW
type (2I.google.ads.googleads.v17.enums.ParentalStatusTypeEnum.ParentalStatusType"6
YouTubeVideoInfo
video_id (	H �B
	_video_id"<
YouTubeChannelInfo

channel_id (	H �B
_channel_id"4
UserListInfo
	user_list (	H �B

_user_list"�
ProximityInfo@
	geo_point (2-.google.ads.googleads.v17.common.GeoPointInfo
radius (H �c
radius_units (2M.google.ads.googleads.v17.enums.ProximityRadiusUnitsEnum.ProximityRadiusUnits=
address (2,.google.ads.googleads.v17.common.AddressInfoB	
_radius"�
GeoPointInfo\'
longitude_in_micro_degrees (H �&
latitude_in_micro_degrees (H�B
_longitude_in_micro_degreesB
_latitude_in_micro_degrees"�
AddressInfo
postal_code (	H �
province_code	 (	H�
country_code
 (	H�
province_name (	H�
street_address (	H�
street_address2 (	H�
	city_name (	H�B
_postal_codeB
_province_codeB
_country_codeB
_province_nameB
_street_addressB
_street_address2B

_city_name"v
	TopicInfoH
topic_constant (	B+�A(
&googleads.googleapis.com/TopicConstantH �
path (	B
_topic_constant"D
LanguageInfo
language_constant (	H �B
_language_constant"5
IpBlockInfo

ip_address (	H �B
_ip_address"g
ContentLabelInfoS
type (2E.google.ads.googleads.v17.enums.ContentLabelTypeEnum.ContentLabelType"p
CarrierInfoL
carrier_constant (	B-�A*
(googleads.googleapis.com/CarrierConstantH �B
_carrier_constant"R
UserInterestInfo#
user_interest_category (	H �B
_user_interest_category"�
WebpageInfo
criterion_name (	H �I

conditions (25.google.ads.googleads.v17.common.WebpageConditionInfo
coverage_percentage (B
sample (22.google.ads.googleads.v17.common.WebpageSampleInfoB
_criterion_name"�
WebpageConditionInfod
operand (2S.google.ads.googleads.v17.enums.WebpageConditionOperandEnum.WebpageConditionOperandg
operator (2U.google.ads.googleads.v17.enums.WebpageConditionOperatorEnum.WebpageConditionOperator
argument (	H �B
	_argument"(
WebpageSampleInfo
sample_urls (	"�
OperatingSystemVersionInfol
!operating_system_version_constant (	B<�A9
7googleads.googleapis.com/OperatingSystemVersionConstantH �B$
"_operating_system_version_constant"p
AppPaymentModelInfoY
type (2K.google.ads.googleads.v17.enums.AppPaymentModelTypeEnum.AppPaymentModelType"�
MobileDeviceInfoW
mobile_device_constant (	B2�A/
-googleads.googleapis.com/MobileDeviceConstantH �B
_mobile_device_constant"F
CustomAffinityInfo
custom_affinity (	H �B
_custom_affinity"@
CustomIntentInfo
custom_intent (	H �B
_custom_intent"�
LocationGroupInfo
feed (	H �
geo_target_constants (	
radius (H�k
radius_units (2U.google.ads.googleads.v17.enums.LocationGroupRadiusUnitsEnum.LocationGroupRadiusUnits
feed_item_sets (	5
(enable_customer_level_location_asset_set	 (H�!
location_group_asset_sets
 (	B
_feedB	
_radiusB+
)_enable_customer_level_location_asset_set"-
CustomAudienceInfo
custom_audience (	"a
CombinedAudienceInfoI
combined_audience (	B.�A+
)googleads.googleapis.com/CombinedAudience" 
AudienceInfo
audience (	"�
KeywordThemeInfoT
keyword_theme_constant (	B2�A/
-googleads.googleapis.com/KeywordThemeConstantH !
free_form_keyword_theme (	H B
keyword_theme"(
LocalServiceIdInfo

service_id (	"
SearchThemeInfo
text (	"�
	BrandInfo
display_name (	B�AH �
	entity_id (	H�
primary_url (	B�AH�
rejection_reason (2[.google.ads.googleads.v17.enums.BrandRequestRejectionReasonEnum.BrandRequestRejectionReasonB�AH�S
status (29.google.ads.googleads.v17.enums.BrandStateEnum.BrandStateB�AH�B
_display_nameB

_entity_idB
_primary_urlB
_rejection_reasonB	
_status"7
BrandListInfo

shared_set (	H �B
_shared_setB�
#com.google.ads.googleads.v17.commonBCriteriaProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/common;common�GAA�Google.Ads.GoogleAds.V17.Common�Google\\Ads\\GoogleAds\\V17\\Common�#Google::Ads::GoogleAds::V17::Commonbproto3
�
9google/ads/googleads/v17/resources/shared_criterion.proto"google.ads.googleads.v17.resources3google/ads/googleads/v17/enums/criterion_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
SharedCriterionG
resource_name (	B0�A�A*
(googleads.googleapis.com/SharedCriterionC

shared_set
 (	B*�A�A$
"googleads.googleapis.com/SharedSetH�
criterion_id (B�AH�R
type (2?.google.ads.googleads.v17.enums.CriterionTypeEnum.CriterionTypeB�AD
keyword (2,.google.ads.googleads.v17.common.KeywordInfoB�AH O
youtube_video (21.google.ads.googleads.v17.common.YouTubeVideoInfoB�AH S
youtube_channel (23.google.ads.googleads.v17.common.YouTubeChannelInfoB�AH H
	placement (2..google.ads.googleads.v17.common.PlacementInfoB�AH Z
mobile_app_category (26.google.ads.googleads.v17.common.MobileAppCategoryInfoB�AH Y
mobile_application	 (26.google.ads.googleads.v17.common.MobileApplicationInfoB�AH @
brand (2*.google.ads.googleads.v17.common.BrandInfoB�AH :t�Aq
(googleads.googleapis.com/SharedCriterionEcustomers/{customer_id}/sharedCriteria/{shared_set_id}~{criterion_id}B
	criterionB
_shared_setB
_criterion_idB�
&com.google.ads.googleads.v17.resourcesBSharedCriterionProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v17/resources;resources�GAA�"Google.Ads.GoogleAds.V17.Resources�"Google\\Ads\\GoogleAds\\V17\\Resources�&Google::Ads::GoogleAds::V17::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

