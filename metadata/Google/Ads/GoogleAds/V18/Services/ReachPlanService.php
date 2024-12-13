<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/services/reach_plan_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V18\Services;

class ReachPlanService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
9google/ads/googleads/v18/enums/reach_plan_age_range.protogoogle.ads.googleads.v18.enums"�
ReachPlanAgeRangeEnum"�
ReachPlanAgeRange
UNSPECIFIED 
UNKNOWN
AGE_RANGE_18_24��
AGE_RANGE_18_34
AGE_RANGE_18_44
AGE_RANGE_18_49
AGE_RANGE_18_54
AGE_RANGE_18_64
AGE_RANGE_18_65_UP
AGE_RANGE_21_34
AGE_RANGE_25_34��
AGE_RANGE_25_44	
AGE_RANGE_25_49

AGE_RANGE_25_54
AGE_RANGE_25_64
AGE_RANGE_25_65_UP
AGE_RANGE_35_44��
AGE_RANGE_35_49
AGE_RANGE_35_54
AGE_RANGE_35_64
AGE_RANGE_35_65_UP
AGE_RANGE_45_54��
AGE_RANGE_45_64
AGE_RANGE_45_65_UP
AGE_RANGE_50_65_UP
AGE_RANGE_55_64��
AGE_RANGE_55_65_UP
AGE_RANGE_65_UP��B�
"com.google.ads.googleads.v18.enumsBReachPlanAgeRangeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
7google/ads/googleads/v18/enums/keyword_match_type.protogoogle.ads.googleads.v18.enums"j
KeywordMatchTypeEnum"R
KeywordMatchType
UNSPECIFIED 
UNKNOWN	
EXACT

PHRASE	
BROADB�
"com.google.ads.googleads.v18.enumsBKeywordMatchTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
0google/ads/googleads/v18/enums/day_of_week.protogoogle.ads.googleads.v18.enums"�
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
"com.google.ads.googleads.v18.enumsBDayOfWeekProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
;google/ads/googleads/v18/enums/proximity_radius_units.protogoogle.ads.googleads.v18.enums"k
ProximityRadiusUnitsEnum"O
ProximityRadiusUnits
UNSPECIFIED 
UNKNOWN	
MILES

KILOMETERSB�
"com.google.ads.googleads.v18.enumsBProximityRadiusUnitsProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
7google/ads/googleads/v18/enums/product_type_level.protogoogle.ads.googleads.v18.enums"�
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
"com.google.ads.googleads.v18.enumsBProductTypeLevelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
Cgoogle/ads/googleads/v18/enums/brand_request_rejection_reason.protogoogle.ads.googleads.v18.enums"�
BrandRequestRejectionReasonEnum"�
BrandRequestRejectionReason
UNSPECIFIED 
UNKNOWN
EXISTING_BRAND
EXISTING_BRAND_VARIANT
INCORRECT_INFORMATION
NOT_A_BRANDB�
"com.google.ads.googleads.v18.enumsB BrandRequestRejectionReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
7google/ads/googleads/v18/enums/reach_plan_surface.protogoogle.ads.googleads.v18.enums"�
ReachPlanSurfaceEnum"�
ReachPlanSurface
UNSPECIFIED 
UNKNOWN
IN_FEED
IN_STREAM_BUMPER
IN_STREAM_NON_SKIPPABLE
IN_STREAM_SKIPPABLE

SHORTSB�
"com.google.ads.googleads.v18.enumsBReachPlanSurfaceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
2google/ads/googleads/v18/enums/month_of_year.protogoogle.ads.googleads.v18.enums"�
MonthOfYearEnum"�
MonthOfYear
UNSPECIFIED 
UNKNOWN
JANUARY
FEBRUARY	
MARCH	
APRIL
MAY
JUNE
JULY

AUGUST	
	SEPTEMBER

OCTOBER
NOVEMBER
DECEMBERB�
"com.google.ads.googleads.v18.enumsBMonthOfYearProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
+google/ads/googleads/v18/common/dates.protogoogle.ads.googleads.v18.common"W
	DateRange

start_date (	H �
end_date (	H�B
_start_dateB
	_end_date"�
YearMonthRange9
start (2*.google.ads.googleads.v18.common.YearMonth7
end (2*.google.ads.googleads.v18.common.YearMonth"e
	YearMonth
year (J
month (2;.google.ads.googleads.v18.enums.MonthOfYearEnum.MonthOfYearB�
#com.google.ads.googleads.v18.commonB
DatesProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v18/common;common�GAA�Google.Ads.GoogleAds.V18.Common�Google\\Ads\\GoogleAds\\V18\\Common�#Google::Ads::GoogleAds::V18::Commonbproto3
�
>google/ads/googleads/v18/enums/webpage_condition_operand.protogoogle.ads.googleads.v18.enums"�
WebpageConditionOperandEnum"�
WebpageConditionOperand
UNSPECIFIED 
UNKNOWN
URL
CATEGORY

PAGE_TITLE
PAGE_CONTENT
CUSTOM_LABELB�
"com.google.ads.googleads.v18.enumsBWebpageConditionOperandProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
9google/ads/googleads/v18/enums/parental_status_type.protogoogle.ads.googleads.v18.enums"
ParentalStatusTypeEnum"e
ParentalStatusType
UNSPECIFIED 
UNKNOWN
PARENT�
NOT_A_PARENT�
UNDETERMINED�B�
"com.google.ads.googleads.v18.enumsBParentalStatusTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
5google/ads/googleads/v18/enums/interaction_type.protogoogle.ads.googleads.v18.enums"R
InteractionTypeEnum";
InteractionType
UNSPECIFIED 
UNKNOWN

CALLS�>B�
"com.google.ads.googleads.v18.enumsBInteractionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
@google/ads/googleads/v18/enums/product_channel_exclusivity.protogoogle.ads.googleads.v18.enums"�
ProductChannelExclusivityEnum"`
ProductChannelExclusivity
UNSPECIFIED 
UNKNOWN
SINGLE_CHANNEL
MULTI_CHANNELB�
"com.google.ads.googleads.v18.enumsBProductChannelExclusivityProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
7google/ads/googleads/v18/enums/listing_group_type.protogoogle.ads.googleads.v18.enums"c
ListingGroupTypeEnum"K
ListingGroupType
UNSPECIFIED 
UNKNOWN
SUBDIVISION
UNITB�
"com.google.ads.googleads.v18.enumsBListingGroupTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
0google/ads/googleads/v18/enums/brand_state.protogoogle.ads.googleads.v18.enums"�
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
"com.google.ads.googleads.v18.enumsBBrandStateProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
4google/ads/googleads/v18/enums/product_channel.protogoogle.ads.googleads.v18.enums"[
ProductChannelEnum"E
ProductChannel
UNSPECIFIED 
UNKNOWN

ONLINE	
LOCALB�
"com.google.ads.googleads.v18.enumsBProductChannelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
@google/ads/googleads/v18/enums/location_group_radius_units.protogoogle.ads.googleads.v18.enums"�
LocationGroupRadiusUnitsEnum"`
LocationGroupRadiusUnits
UNSPECIFIED 
UNKNOWN

METERS	
MILES
MILLI_MILESB�
"com.google.ads.googleads.v18.enumsBLocationGroupRadiusUnitsProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
<google/ads/googleads/v18/enums/frequency_cap_time_unit.protogoogle.ads.googleads.v18.enums"n
FrequencyCapTimeUnitEnum"R
FrequencyCapTimeUnit
UNSPECIFIED 
UNKNOWN
DAY
WEEK	
MONTHB�
"com.google.ads.googleads.v18.enumsBFrequencyCapTimeUnitProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
>google/ads/googleads/v18/enums/hotel_date_selection_type.protogoogle.ads.googleads.v18.enums"~
HotelDateSelectionTypeEnum"`
HotelDateSelectionType
UNSPECIFIED 
UNKNOWN
DEFAULT_SELECTION2
USER_SELECTED3B�
"com.google.ads.googleads.v18.enumsBHotelDateSelectionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
7google/ads/googleads/v18/enums/reach_plan_network.protogoogle.ads.googleads.v18.enums"�
ReachPlanNetworkEnum"
ReachPlanNetwork
UNSPECIFIED 
UNKNOWN
YOUTUBE
GOOGLE_VIDEO_PARTNERS%
!YOUTUBE_AND_GOOGLE_VIDEO_PARTNERSB�
"com.google.ads.googleads.v18.enumsBReachPlanNetworkProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
6google/ads/googleads/v18/enums/income_range_type.protogoogle.ads.googleads.v18.enums"�
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
"com.google.ads.googleads.v18.enumsBIncomeRangeTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
;google/ads/googleads/v18/enums/product_category_level.protogoogle.ads.googleads.v18.enums"�
ProductCategoryLevelEnum"p
ProductCategoryLevel
UNSPECIFIED 
UNKNOWN

LEVEL1

LEVEL2

LEVEL3

LEVEL4

LEVEL5B�
"com.google.ads.googleads.v18.enumsBProductCategoryLevelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
Cgoogle/ads/googleads/v18/enums/product_custom_attribute_index.protogoogle.ads.googleads.v18.enums"�
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
"com.google.ads.googleads.v18.enumsB ProductCustomAttributeIndexProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
;google/ads/googleads/v18/enums/app_payment_model_type.protogoogle.ads.googleads.v18.enums"X
AppPaymentModelTypeEnum"=
AppPaymentModelType
UNSPECIFIED 
UNKNOWN
PAIDB�
"com.google.ads.googleads.v18.enumsBAppPaymentModelTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
+google/ads/googleads/v18/enums/device.protogoogle.ads.googleads.v18.enums"v

DeviceEnum"h
Device
UNSPECIFIED 
UNKNOWN

MOBILE

TABLET
DESKTOP
CONNECTED_TV	
OTHERB�
"com.google.ads.googleads.v18.enumsBDeviceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
7google/ads/googleads/v18/enums/content_label_type.protogoogle.ads.googleads.v18.enums"�
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
"com.google.ads.googleads.v18.enumsBContentLabelTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
6google/ads/googleads/v18/enums/product_condition.protogoogle.ads.googleads.v18.enums"l
ProductConditionEnum"T
ProductCondition
UNSPECIFIED 
UNKNOWN
NEW
REFURBISHED
USEDB�
"com.google.ads.googleads.v18.enumsBProductConditionProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
3google/ads/googleads/v18/enums/age_range_type.protogoogle.ads.googleads.v18.enums"�
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
"com.google.ads.googleads.v18.enumsBAgeRangeTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
0google/ads/googleads/v18/enums/gender_type.protogoogle.ads.googleads.v18.enums"d
GenderTypeEnum"R

GenderType
UNSPECIFIED 
UNKNOWN
MALE


FEMALE
UNDETERMINEDB�
"com.google.ads.googleads.v18.enumsBGenderTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
3google/ads/googleads/v18/enums/minute_of_hour.protogoogle.ads.googleads.v18.enums"s
MinuteOfHourEnum"_
MinuteOfHour
UNSPECIFIED 
UNKNOWN
ZERO
FIFTEEN

THIRTY

FORTY_FIVEB�
"com.google.ads.googleads.v18.enumsBMinuteOfHourProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
?google/ads/googleads/v18/enums/target_frequency_time_unit.protogoogle.ads.googleads.v18.enums"b
TargetFrequencyTimeUnitEnum"C
TargetFrequencyTimeUnit
UNSPECIFIED 
UNKNOWN

WEEKLYB�
"com.google.ads.googleads.v18.enumsBTargetFrequencyTimeUnitProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�
?google/ads/googleads/v18/enums/webpage_condition_operator.protogoogle.ads.googleads.v18.enums"r
WebpageConditionOperatorEnum"R
WebpageConditionOperator
UNSPECIFIED 
UNKNOWN

EQUALS
CONTAINSB�
"com.google.ads.googleads.v18.enumsBWebpageConditionOperatorProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v18/enums;enums�GAA�Google.Ads.GoogleAds.V18.Enums�Google\\Ads\\GoogleAds\\V18\\Enums�"Google::Ads::GoogleAds::V18::Enumsbproto3
�\\
.google/ads/googleads/v18/common/criteria.protogoogle.ads.googleads.v18.common;google/ads/googleads/v18/enums/app_payment_model_type.protoCgoogle/ads/googleads/v18/enums/brand_request_rejection_reason.proto0google/ads/googleads/v18/enums/brand_state.proto7google/ads/googleads/v18/enums/content_label_type.proto0google/ads/googleads/v18/enums/day_of_week.proto+google/ads/googleads/v18/enums/device.proto0google/ads/googleads/v18/enums/gender_type.proto>google/ads/googleads/v18/enums/hotel_date_selection_type.proto6google/ads/googleads/v18/enums/income_range_type.proto5google/ads/googleads/v18/enums/interaction_type.proto7google/ads/googleads/v18/enums/keyword_match_type.proto7google/ads/googleads/v18/enums/listing_group_type.proto@google/ads/googleads/v18/enums/location_group_radius_units.proto3google/ads/googleads/v18/enums/minute_of_hour.proto9google/ads/googleads/v18/enums/parental_status_type.proto;google/ads/googleads/v18/enums/product_category_level.proto4google/ads/googleads/v18/enums/product_channel.proto@google/ads/googleads/v18/enums/product_channel_exclusivity.proto6google/ads/googleads/v18/enums/product_condition.protoCgoogle/ads/googleads/v18/enums/product_custom_attribute_index.proto7google/ads/googleads/v18/enums/product_type_level.proto;google/ads/googleads/v18/enums/proximity_radius_units.proto>google/ads/googleads/v18/enums/webpage_condition_operand.proto?google/ads/googleads/v18/enums/webpage_condition_operator.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
KeywordInfo
text (	H �Y

match_type (2E.google.ads.googleads.v18.enums.KeywordMatchTypeEnum.KeywordMatchTypeB
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
type (21.google.ads.googleads.v18.enums.DeviceEnum.Device"�
ListingGroupInfoS
type (2E.google.ads.googleads.v18.enums.ListingGroupTypeEnum.ListingGroupTypeI

case_value (25.google.ads.googleads.v18.common.ListingDimensionInfo&
parent_ad_group_criterion (	H �H
path (25.google.ads.googleads.v18.common.ListingDimensionPathH�B
_parent_ad_group_criterionB
_path"a
ListingDimensionPathI

dimensions (25.google.ads.googleads.v18.common.ListingDimensionInfo"]
ListingScopeInfoI

dimensions (25.google.ads.googleads.v18.common.ListingDimensionInfo"�
ListingDimensionInfo@
hotel_id (2,.google.ads.googleads.v18.common.HotelIdInfoH F
hotel_class (2/.google.ads.googleads.v18.common.HotelClassInfoH W
hotel_country_region (27.google.ads.googleads.v18.common.HotelCountryRegionInfoH F
hotel_state (2/.google.ads.googleads.v18.common.HotelStateInfoH D

hotel_city (2..google.ads.googleads.v18.common.HotelCityInfoH P
product_category (24.google.ads.googleads.v18.common.ProductCategoryInfoH J
product_brand (21.google.ads.googleads.v18.common.ProductBrandInfoH N
product_channel (23.google.ads.googleads.v18.common.ProductChannelInfoH e
product_channel_exclusivity	 (2>.google.ads.googleads.v18.common.ProductChannelExclusivityInfoH R
product_condition
 (25.google.ads.googleads.v18.common.ProductConditionInfoH _
product_custom_attribute (2;.google.ads.googleads.v18.common.ProductCustomAttributeInfoH M
product_item_id (22.google.ads.googleads.v18.common.ProductItemIdInfoH H
product_type (20.google.ads.googleads.v18.common.ProductTypeInfoH P
product_grouping (24.google.ads.googleads.v18.common.ProductGroupingInfoH L
product_labels (22.google.ads.googleads.v18.common.ProductLabelsInfoH _
product_legacy_condition (2;.google.ads.googleads.v18.common.ProductLegacyConditionInfoH Q
product_type_full (24.google.ads.googleads.v18.common.ProductTypeFullInfoH F
activity_id (2/.google.ads.googleads.v18.common.ActivityIdInfoH N
activity_rating (23.google.ads.googleads.v18.common.ActivityRatingInfoH P
activity_country (24.google.ads.googleads.v18.common.ActivityCountryInfoH L
activity_state (22.google.ads.googleads.v18.common.ActivityStateInfoH J
activity_city (21.google.ads.googleads.v18.common.ActivityCityInfoH a
unknown_listing_dimension (2<.google.ads.googleads.v18.common.UnknownListingDimensionInfoH B
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
level (2M.google.ads.googleads.v18.enums.ProductCategoryLevelEnum.ProductCategoryLevelB
_category_id"0
ProductBrandInfo
value (	H �B
_value"h
ProductChannelInfoR
channel (2A.google.ads.googleads.v18.enums.ProductChannelEnum.ProductChannel"�
ProductChannelExclusivityInfot
channel_exclusivity (2W.google.ads.googleads.v18.enums.ProductChannelExclusivityEnum.ProductChannelExclusivity"p
ProductConditionInfoX
	condition (2E.google.ads.googleads.v18.enums.ProductConditionEnum.ProductCondition"�
ProductCustomAttributeInfo
value (	H �j
index (2[.google.ads.googleads.v18.enums.ProductCustomAttributeIndexEnum.ProductCustomAttributeIndexB
_value"1
ProductItemIdInfo
value (	H �B
_value"�
ProductTypeInfo
value (	H �T
level (2E.google.ads.googleads.v18.enums.ProductTypeLevelEnum.ProductTypeLevelB
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
type (2Q.google.ads.googleads.v18.enums.HotelDateSelectionTypeEnum.HotelDateSelectionType"g
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
day_of_week (27.google.ads.googleads.v18.enums.DayOfWeekEnum.DayOfWeek".
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
type (2C.google.ads.googleads.v18.enums.InteractionTypeEnum.InteractionType"�
AdScheduleInfoS
start_minute (2=.google.ads.googleads.v18.enums.MinuteOfHourEnum.MinuteOfHourQ

end_minute (2=.google.ads.googleads.v18.enums.MinuteOfHourEnum.MinuteOfHour

start_hour (H �
end_hour (H�L
day_of_week (27.google.ads.googleads.v18.enums.DayOfWeekEnum.DayOfWeekB
_start_hourB
	_end_hour"[
AgeRangeInfoK
type (2=.google.ads.googleads.v18.enums.AgeRangeTypeEnum.AgeRangeType"U

GenderInfoG
type (29.google.ads.googleads.v18.enums.GenderTypeEnum.GenderType"d
IncomeRangeInfoQ
type (2C.google.ads.googleads.v18.enums.IncomeRangeTypeEnum.IncomeRangeType"m
ParentalStatusInfoW
type (2I.google.ads.googleads.v18.enums.ParentalStatusTypeEnum.ParentalStatusType"6
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
	geo_point (2-.google.ads.googleads.v18.common.GeoPointInfo
radius (H �c
radius_units (2M.google.ads.googleads.v18.enums.ProximityRadiusUnitsEnum.ProximityRadiusUnits=
address (2,.google.ads.googleads.v18.common.AddressInfoB	
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
type (2E.google.ads.googleads.v18.enums.ContentLabelTypeEnum.ContentLabelType"p
CarrierInfoL
carrier_constant (	B-�A*
(googleads.googleapis.com/CarrierConstantH �B
_carrier_constant"R
UserInterestInfo#
user_interest_category (	H �B
_user_interest_category"�
WebpageInfo
criterion_name (	H �I

conditions (25.google.ads.googleads.v18.common.WebpageConditionInfo
coverage_percentage (B
sample (22.google.ads.googleads.v18.common.WebpageSampleInfoB
_criterion_name"�
WebpageConditionInfod
operand (2S.google.ads.googleads.v18.enums.WebpageConditionOperandEnum.WebpageConditionOperandg
operator (2U.google.ads.googleads.v18.enums.WebpageConditionOperatorEnum.WebpageConditionOperator
argument (	H �B
	_argument"(
WebpageSampleInfo
sample_urls (	"�
OperatingSystemVersionInfol
!operating_system_version_constant (	B<�A9
7googleads.googleapis.com/OperatingSystemVersionConstantH �B$
"_operating_system_version_constant"p
AppPaymentModelInfoY
type (2K.google.ads.googleads.v18.enums.AppPaymentModelTypeEnum.AppPaymentModelType"�
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
radius_units (2U.google.ads.googleads.v18.enums.LocationGroupRadiusUnitsEnum.LocationGroupRadiusUnits
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
rejection_reason (2[.google.ads.googleads.v18.enums.BrandRequestRejectionReasonEnum.BrandRequestRejectionReasonB�AH�S
status (29.google.ads.googleads.v18.enums.BrandStateEnum.BrandStateB�AH�B
_display_nameB

_entity_idB
_primary_urlB
_rejection_reasonB	
_status"7
BrandListInfo

shared_set (	H �B
_shared_setB�
#com.google.ads.googleads.v18.commonBCriteriaProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v18/common;common�GAA�Google.Ads.GoogleAds.V18.Common�Google\\Ads\\GoogleAds\\V18\\Common�#Google::Ads::GoogleAds::V18::Commonbproto3
�?
:google/ads/googleads/v18/services/reach_plan_service.proto!google.ads.googleads.v18.services+google/ads/googleads/v18/common/dates.proto<google/ads/googleads/v18/enums/frequency_cap_time_unit.proto9google/ads/googleads/v18/enums/reach_plan_age_range.proto7google/ads/googleads/v18/enums/reach_plan_network.proto7google/ads/googleads/v18/enums/reach_plan_surface.proto?google/ads/googleads/v18/enums/target_frequency_time_unit.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.proto"
ListPlannableLocationsRequest"s
ListPlannableLocationsResponseQ
plannable_locations (24.google.ads.googleads.v18.services.PlannableLocation"�
PlannableLocation
id (	H �
name (	H�
parent_country_id (H�
country_code (	H�
location_type (	H�B
_idB
_nameB
_parent_country_idB
_country_codeB
_location_type"B
ListPlannableProductsRequest"
plannable_location_id (	B�A"m
ListPlannableProductsResponseL
product_metadata (22.google.ads.googleads.v18.services.ProductMetadata"�
ProductMetadata#
plannable_product_code (	H �
plannable_product_name (	R
plannable_targeting (25.google.ads.googleads.v18.services.PlannableTargetingB
_plannable_product_code"�
PlannableTargeting[

age_ranges (2G.google.ads.googleads.v18.enums.ReachPlanAgeRangeEnum.ReachPlanAgeRange<
genders (2+.google.ads.googleads.v18.common.GenderInfo<
devices (2+.google.ads.googleads.v18.common.DeviceInfoW
networks (2E.google.ads.googleads.v18.enums.ReachPlanNetworkEnum.ReachPlanNetworkV
youtube_select_lineups (26.google.ads.googleads.v18.services.YouTubeSelectLineUpZ
surface_targeting (2?.google.ads.googleads.v18.services.SurfaceTargetingCombinations"�
GenerateReachForecastRequest
customer_id (	B�A
currency_code	 (	H �S
campaign_duration (23.google.ads.googleads.v18.services.CampaignDurationB�A!
cookie_frequency_cap
 (H�U
cookie_frequency_cap_setting (2/.google.ads.googleads.v18.services.FrequencyCap$
min_effective_frequency (H�b
effective_frequency_limit (2:.google.ads.googleads.v18.services.EffectiveFrequencyLimitH�?
	targeting (2,.google.ads.googleads.v18.services.TargetingP
planned_products (21.google.ads.googleads.v18.services.PlannedProductB�AY
forecast_metric_options (28.google.ads.googleads.v18.services.ForecastMetricOptions!
customer_reach_group (	H�B
_currency_codeB
_cookie_frequency_capB
_min_effective_frequencyB
_effective_frequency_limitB
_customer_reach_group"F
EffectiveFrequencyLimit+
#effective_frequency_breakdown_limit ("�
FrequencyCap
impressions (B�Ae
	time_unit (2M.google.ads.googleads.v18.enums.FrequencyCapTimeUnitEnum.FrequencyCapTimeUnitB�A"�
	Targeting"
plannable_location_id (	H �
plannable_location_ids (	Z
	age_range (2G.google.ads.googleads.v18.enums.ReachPlanAgeRangeEnum.ReachPlanAgeRange<
genders (2+.google.ads.googleads.v18.common.GenderInfo<
devices (2+.google.ads.googleads.v18.common.DeviceInfoV
network (2E.google.ads.googleads.v18.enums.ReachPlanNetworkEnum.ReachPlanNetworkP
audience_targeting (24.google.ads.googleads.v18.services.AudienceTargetingB
_plannable_location_id"�
CampaignDuration
duration_in_days (H �>

date_range (2*.google.ads.googleads.v18.common.DateRangeB
_duration_in_days"�
PlannedProduct(
plannable_product_code (	B�AH �
budget_micros (B�AH�_
advanced_product_targeting (2;.google.ads.googleads.v18.services.AdvancedProductTargetingB
_plannable_product_codeB
_budget_micros"�
GenerateReachForecastResponse^
on_target_audience_metrics (2:.google.ads.googleads.v18.services.OnTargetAudienceMetricsB
reach_curve (2-.google.ads.googleads.v18.services.ReachCurve"W

ReachCurveI
reach_forecasts (20.google.ads.googleads.v18.services.ReachForecast"�
ReachForecast
cost_micros (=
forecast (2+.google.ads.googleads.v18.services.Forecastg
planned_product_reach_forecasts (2>.google.ads.googleads.v18.services.PlannedProductReachForecast"�
Forecast
on_target_reach (H �
total_reach (H�"
on_target_impressions (H�
total_impressions (H�!
viewable_impressions	 (H�f
effective_frequency_breakdowns
 (2>.google.ads.googleads.v18.services.EffectiveFrequencyBreakdown#
on_target_coview_reach (H�
total_coview_reach (H�)
on_target_coview_impressions (H�%
total_coview_impressions (H�
views (H	�B
_on_target_reachB
_total_reachB
_on_target_impressionsB
_total_impressionsB
_viewable_impressionsB
_on_target_coview_reachB
_total_coview_reachB
_on_target_coview_impressionsB
_total_coview_impressionsB
_views"�
PlannedProductReachForecast
plannable_product_code (	
cost_micros ([
planned_product_forecast (29.google.ads.googleads.v18.services.PlannedProductForecast"�
PlannedProductForecast
on_target_reach (
total_reach (
on_target_impressions (
total_impressions (!
viewable_impressions (H �#
on_target_coview_reach (H�
total_coview_reach (H�)
on_target_coview_impressions (H�%
total_coview_impressions	 (H�
average_frequency
 (H�
views (H�B
_viewable_impressionsB
_on_target_coview_reachB
_total_coview_reachB
_on_target_coview_impressionsB
_total_coview_impressionsB
_average_frequencyB
_views"�
OnTargetAudienceMetrics"
youtube_audience_size (H �!
census_audience_size (H�B
_youtube_audience_sizeB
_census_audience_size"�
EffectiveFrequencyBreakdown
effective_frequency (
on_target_reach (
total_reach (#
effective_coview_reach (H �-
 on_target_effective_coview_reach (H�B
_effective_coview_reachB#
!_on_target_effective_coview_reach"/
ForecastMetricOptions
include_coview ("]
AudienceTargetingH
user_interest (21.google.ads.googleads.v18.common.UserInterestInfo"�
AdvancedProductTargetingW
surface_targeting_settings (23.google.ads.googleads.v18.services.SurfaceTargeting]
target_frequency_settings (2:.google.ads.googleads.v18.services.TargetFrequencySettings[
youtube_select_settings (28.google.ads.googleads.v18.services.YouTubeSelectSettingsH B
advanced_targeting"*
YouTubeSelectSettings
	lineup_id ("=
YouTubeSelectLineUp
	lineup_id (
lineup_name (	"�
SurfaceTargetingCombinationsN
default_targeting (23.google.ads.googleads.v18.services.SurfaceTargeting]
 available_targeting_combinations (23.google.ads.googleads.v18.services.SurfaceTargeting"k
SurfaceTargetingW
surfaces (2E.google.ads.googleads.v18.enums.ReachPlanSurfaceEnum.ReachPlanSurface"�
TargetFrequencySettingsk
	time_unit (2S.google.ads.googleads.v18.enums.TargetFrequencyTimeUnitEnum.TargetFrequencyTimeUnitB�A
target_frequency (B�A2�
ReachPlanService�
ListPlannableLocations@.google.ads.googleads.v18.services.ListPlannableLocationsRequestA.google.ads.googleads.v18.services.ListPlannableLocationsResponse"&��� "/v18:listPlannableLocations:*�
ListPlannableProducts?.google.ads.googleads.v18.services.ListPlannableProductsRequest@.google.ads.googleads.v18.services.ListPlannableProductsResponse"=�Aplannable_location_id���"/v18:listPlannableProducts:*�
GenerateReachForecast?.google.ads.googleads.v18.services.GenerateReachForecastRequest@.google.ads.googleads.v18.services.GenerateReachForecastResponse"p�A.customer_id,campaign_duration,planned_products���9"4/v18/customers/{customer_id=*}:generateReachForecast:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v18.servicesBReachPlanServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v18/services;services�GAA�!Google.Ads.GoogleAds.V18.Services�!Google\\Ads\\GoogleAds\\V18\\Services�%Google::Ads::GoogleAds::V18::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

