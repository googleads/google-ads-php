<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v11/resources/ad_group_criterion.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V11\Resources;

class AdGroupCriterion
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
6google/ads/googleads/v11/enums/product_condition.protogoogle.ads.googleads.v11.enums"l
ProductConditionEnum"T
ProductCondition
UNSPECIFIED 
UNKNOWN
NEW
REFURBISHED
USEDB�
"com.google.ads.googleads.v11.enumsBProductConditionProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
3google/ads/googleads/v11/enums/age_range_type.protogoogle.ads.googleads.v11.enums"�
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
"com.google.ads.googleads.v11.enumsBAgeRangeTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
;google/ads/googleads/v11/enums/app_payment_model_type.protogoogle.ads.googleads.v11.enums"X
AppPaymentModelTypeEnum"=
AppPaymentModelType
UNSPECIFIED 
UNKNOWN
PAIDB�
"com.google.ads.googleads.v11.enumsBAppPaymentModelTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
7google/ads/googleads/v11/enums/content_label_type.protogoogle.ads.googleads.v11.enums"�
ContentLabelTypeEnum"�
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
SOCIAL_ISSUESB�
"com.google.ads.googleads.v11.enumsBContentLabelTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
0google/ads/googleads/v11/enums/day_of_week.protogoogle.ads.googleads.v11.enums"�
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
"com.google.ads.googleads.v11.enumsBDayOfWeekProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
+google/ads/googleads/v11/enums/device.protogoogle.ads.googleads.v11.enums"v

DeviceEnum"h
Device
UNSPECIFIED 
UNKNOWN

MOBILE

TABLET
DESKTOP
CONNECTED_TV	
OTHERB�
"com.google.ads.googleads.v11.enumsBDeviceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
0google/ads/googleads/v11/enums/gender_type.protogoogle.ads.googleads.v11.enums"d
GenderTypeEnum"R

GenderType
UNSPECIFIED 
UNKNOWN
MALE


FEMALE
UNDETERMINEDB�
"com.google.ads.googleads.v11.enumsBGenderTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
>google/ads/googleads/v11/enums/hotel_date_selection_type.protogoogle.ads.googleads.v11.enums"~
HotelDateSelectionTypeEnum"`
HotelDateSelectionType
UNSPECIFIED 
UNKNOWN
DEFAULT_SELECTION2
USER_SELECTED3B�
"com.google.ads.googleads.v11.enumsBHotelDateSelectionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
6google/ads/googleads/v11/enums/income_range_type.protogoogle.ads.googleads.v11.enums"�
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
"com.google.ads.googleads.v11.enumsBIncomeRangeTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
5google/ads/googleads/v11/enums/interaction_type.protogoogle.ads.googleads.v11.enums"R
InteractionTypeEnum";
InteractionType
UNSPECIFIED 
UNKNOWN

CALLS�>B�
"com.google.ads.googleads.v11.enumsBInteractionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
7google/ads/googleads/v11/enums/keyword_match_type.protogoogle.ads.googleads.v11.enums"j
KeywordMatchTypeEnum"R
KeywordMatchType
UNSPECIFIED 
UNKNOWN	
EXACT

PHRASE	
BROADB�
"com.google.ads.googleads.v11.enumsBKeywordMatchTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
7google/ads/googleads/v11/enums/listing_group_type.protogoogle.ads.googleads.v11.enums"c
ListingGroupTypeEnum"K
ListingGroupType
UNSPECIFIED 
UNKNOWN
SUBDIVISION
UNITB�
"com.google.ads.googleads.v11.enumsBListingGroupTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
@google/ads/googleads/v11/enums/location_group_radius_units.protogoogle.ads.googleads.v11.enums"�
LocationGroupRadiusUnitsEnum"`
LocationGroupRadiusUnits
UNSPECIFIED 
UNKNOWN

METERS	
MILES
MILLI_MILESB�
"com.google.ads.googleads.v11.enumsBLocationGroupRadiusUnitsProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
3google/ads/googleads/v11/enums/minute_of_hour.protogoogle.ads.googleads.v11.enums"s
MinuteOfHourEnum"_
MinuteOfHour
UNSPECIFIED 
UNKNOWN
ZERO
FIFTEEN

THIRTY

FORTY_FIVEB�
"com.google.ads.googleads.v11.enumsBMinuteOfHourProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
9google/ads/googleads/v11/enums/parental_status_type.protogoogle.ads.googleads.v11.enums"
ParentalStatusTypeEnum"e
ParentalStatusType
UNSPECIFIED 
UNKNOWN
PARENT�
NOT_A_PARENT�
UNDETERMINED�B�
"com.google.ads.googleads.v11.enumsBParentalStatusTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
;google/ads/googleads/v11/enums/preferred_content_type.protogoogle.ads.googleads.v11.enums"j
PreferredContentTypeEnum"N
PreferredContentType
UNSPECIFIED 
UNKNOWN
YOUTUBE_TOP_CONTENT�B�
"com.google.ads.googleads.v11.enumsBPreferredContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
Cgoogle/ads/googleads/v11/enums/product_bidding_category_level.protogoogle.ads.googleads.v11.enums"�
ProductBiddingCategoryLevelEnum"w
ProductBiddingCategoryLevel
UNSPECIFIED 
UNKNOWN

LEVEL1

LEVEL2

LEVEL3

LEVEL4

LEVEL5B�
"com.google.ads.googleads.v11.enumsB ProductBiddingCategoryLevelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
4google/ads/googleads/v11/enums/product_channel.protogoogle.ads.googleads.v11.enums"[
ProductChannelEnum"E
ProductChannel
UNSPECIFIED 
UNKNOWN

ONLINE	
LOCALB�
"com.google.ads.googleads.v11.enumsBProductChannelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
@google/ads/googleads/v11/enums/product_channel_exclusivity.protogoogle.ads.googleads.v11.enums"�
ProductChannelExclusivityEnum"`
ProductChannelExclusivity
UNSPECIFIED 
UNKNOWN
SINGLE_CHANNEL
MULTI_CHANNELB�
"com.google.ads.googleads.v11.enumsBProductChannelExclusivityProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
Cgoogle/ads/googleads/v11/enums/product_custom_attribute_index.protogoogle.ads.googleads.v11.enums"�
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
"com.google.ads.googleads.v11.enumsB ProductCustomAttributeIndexProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
7google/ads/googleads/v11/enums/product_type_level.protogoogle.ads.googleads.v11.enums"�
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
"com.google.ads.googleads.v11.enumsBProductTypeLevelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
;google/ads/googleads/v11/enums/proximity_radius_units.protogoogle.ads.googleads.v11.enums"k
ProximityRadiusUnitsEnum"O
ProximityRadiusUnits
UNSPECIFIED 
UNKNOWN	
MILES

KILOMETERSB�
"com.google.ads.googleads.v11.enumsBProximityRadiusUnitsProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
>google/ads/googleads/v11/enums/webpage_condition_operand.protogoogle.ads.googleads.v11.enums"�
WebpageConditionOperandEnum"�
WebpageConditionOperand
UNSPECIFIED 
UNKNOWN
URL
CATEGORY

PAGE_TITLE
PAGE_CONTENT
CUSTOM_LABELB�
"com.google.ads.googleads.v11.enumsBWebpageConditionOperandProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
?google/ads/googleads/v11/enums/webpage_condition_operator.protogoogle.ads.googleads.v11.enums"r
WebpageConditionOperatorEnum"R
WebpageConditionOperator
UNSPECIFIED 
UNKNOWN

EQUALS
CONTAINSB�
"com.google.ads.googleads.v11.enumsBWebpageConditionOperatorProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�M
.google/ads/googleads/v11/common/criteria.protogoogle.ads.googleads.v11.common;google/ads/googleads/v11/enums/app_payment_model_type.proto7google/ads/googleads/v11/enums/content_label_type.proto0google/ads/googleads/v11/enums/day_of_week.proto+google/ads/googleads/v11/enums/device.proto0google/ads/googleads/v11/enums/gender_type.proto>google/ads/googleads/v11/enums/hotel_date_selection_type.proto6google/ads/googleads/v11/enums/income_range_type.proto5google/ads/googleads/v11/enums/interaction_type.proto7google/ads/googleads/v11/enums/keyword_match_type.proto7google/ads/googleads/v11/enums/listing_group_type.proto@google/ads/googleads/v11/enums/location_group_radius_units.proto3google/ads/googleads/v11/enums/minute_of_hour.proto9google/ads/googleads/v11/enums/parental_status_type.proto;google/ads/googleads/v11/enums/preferred_content_type.protoCgoogle/ads/googleads/v11/enums/product_bidding_category_level.proto4google/ads/googleads/v11/enums/product_channel.proto@google/ads/googleads/v11/enums/product_channel_exclusivity.proto6google/ads/googleads/v11/enums/product_condition.protoCgoogle/ads/googleads/v11/enums/product_custom_attribute_index.proto7google/ads/googleads/v11/enums/product_type_level.proto;google/ads/googleads/v11/enums/proximity_radius_units.proto>google/ads/googleads/v11/enums/webpage_condition_operand.proto?google/ads/googleads/v11/enums/webpage_condition_operator.proto"�
KeywordInfo
text (	H �Y

match_type (2E.google.ads.googleads.v11.enums.KeywordMatchTypeEnum.KeywordMatchTypeB
_text")
PlacementInfo
url (	H �B
_url"c
MobileAppCategoryInfo)
mobile_app_category_constant (	H �B
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
type (21.google.ads.googleads.v11.enums.DeviceEnum.Device"s
PreferredContentInfo[
type (2M.google.ads.googleads.v11.enums.PreferredContentTypeEnum.PreferredContentType"�
ListingGroupInfoS
type (2E.google.ads.googleads.v11.enums.ListingGroupTypeEnum.ListingGroupTypeI

case_value (25.google.ads.googleads.v11.common.ListingDimensionInfo&
parent_ad_group_criterion (	H �B
_parent_ad_group_criterion"]
ListingScopeInfoI

dimensions (25.google.ads.googleads.v11.common.ListingDimensionInfo"�
ListingDimensionInfo@
hotel_id (2,.google.ads.googleads.v11.common.HotelIdInfoH F
hotel_class (2/.google.ads.googleads.v11.common.HotelClassInfoH W
hotel_country_region (27.google.ads.googleads.v11.common.HotelCountryRegionInfoH F
hotel_state (2/.google.ads.googleads.v11.common.HotelStateInfoH D

hotel_city (2..google.ads.googleads.v11.common.HotelCityInfoH _
product_bidding_category (2;.google.ads.googleads.v11.common.ProductBiddingCategoryInfoH J
product_brand (21.google.ads.googleads.v11.common.ProductBrandInfoH N
product_channel (23.google.ads.googleads.v11.common.ProductChannelInfoH e
product_channel_exclusivity	 (2>.google.ads.googleads.v11.common.ProductChannelExclusivityInfoH R
product_condition
 (25.google.ads.googleads.v11.common.ProductConditionInfoH _
product_custom_attribute (2;.google.ads.googleads.v11.common.ProductCustomAttributeInfoH M
product_item_id (22.google.ads.googleads.v11.common.ProductItemIdInfoH H
product_type (20.google.ads.googleads.v11.common.ProductTypeInfoH P
product_grouping (24.google.ads.googleads.v11.common.ProductGroupingInfoH L
product_labels (22.google.ads.googleads.v11.common.ProductLabelsInfoH _
product_legacy_condition (2;.google.ads.googleads.v11.common.ProductLegacyConditionInfoH Q
product_type_full (24.google.ads.googleads.v11.common.ProductTypeFullInfoH a
unknown_listing_dimension (2<.google.ads.googleads.v11.common.UnknownListingDimensionInfoH B
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
ProductBiddingCategoryInfo
id (H �
country_code (	H�j
level (2[.google.ads.googleads.v11.enums.ProductBiddingCategoryLevelEnum.ProductBiddingCategoryLevelB
_idB
_country_code"0
ProductBrandInfo
value (	H �B
_value"h
ProductChannelInfoR
channel (2A.google.ads.googleads.v11.enums.ProductChannelEnum.ProductChannel"�
ProductChannelExclusivityInfot
channel_exclusivity (2W.google.ads.googleads.v11.enums.ProductChannelExclusivityEnum.ProductChannelExclusivity"p
ProductConditionInfoX
	condition (2E.google.ads.googleads.v11.enums.ProductConditionEnum.ProductCondition"�
ProductCustomAttributeInfo
value (	H �j
index (2[.google.ads.googleads.v11.enums.ProductCustomAttributeIndexEnum.ProductCustomAttributeIndexB
_value"1
ProductItemIdInfo
value (	H �B
_value"�
ProductTypeInfo
value (	H �T
level (2E.google.ads.googleads.v11.enums.ProductTypeLevelEnum.ProductTypeLevelB
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
type (2Q.google.ads.googleads.v11.enums.HotelDateSelectionTypeEnum.HotelDateSelectionType"g
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
day_of_week (27.google.ads.googleads.v11.enums.DayOfWeekEnum.DayOfWeek"h
InteractionTypeInfoQ
type (2C.google.ads.googleads.v11.enums.InteractionTypeEnum.InteractionType"�
AdScheduleInfoS
start_minute (2=.google.ads.googleads.v11.enums.MinuteOfHourEnum.MinuteOfHourQ

end_minute (2=.google.ads.googleads.v11.enums.MinuteOfHourEnum.MinuteOfHour

start_hour (H �
end_hour (H�L
day_of_week (27.google.ads.googleads.v11.enums.DayOfWeekEnum.DayOfWeekB
_start_hourB
	_end_hour"[
AgeRangeInfoK
type (2=.google.ads.googleads.v11.enums.AgeRangeTypeEnum.AgeRangeType"U

GenderInfoG
type (29.google.ads.googleads.v11.enums.GenderTypeEnum.GenderType"d
IncomeRangeInfoQ
type (2C.google.ads.googleads.v11.enums.IncomeRangeTypeEnum.IncomeRangeType"m
ParentalStatusInfoW
type (2I.google.ads.googleads.v11.enums.ParentalStatusTypeEnum.ParentalStatusType"6
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
	geo_point (2-.google.ads.googleads.v11.common.GeoPointInfo
radius (H �c
radius_units (2M.google.ads.googleads.v11.enums.ProximityRadiusUnitsEnum.ProximityRadiusUnits=
address (2,.google.ads.googleads.v11.common.AddressInfoB	
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

_city_name"I
	TopicInfo
topic_constant (	H �
path (	B
_topic_constant"D
LanguageInfo
language_constant (	H �B
_language_constant"5
IpBlockInfo

ip_address (	H �B
_ip_address"g
ContentLabelInfoS
type (2E.google.ads.googleads.v11.enums.ContentLabelTypeEnum.ContentLabelType"A
CarrierInfo
carrier_constant (	H �B
_carrier_constant"R
UserInterestInfo#
user_interest_category (	H �B
_user_interest_category"�
WebpageInfo
criterion_name (	H �I

conditions (25.google.ads.googleads.v11.common.WebpageConditionInfo
coverage_percentage (B
sample (22.google.ads.googleads.v11.common.WebpageSampleInfoB
_criterion_name"�
WebpageConditionInfod
operand (2S.google.ads.googleads.v11.enums.WebpageConditionOperandEnum.WebpageConditionOperandg
operator (2U.google.ads.googleads.v11.enums.WebpageConditionOperatorEnum.WebpageConditionOperator
argument (	H �B
	_argument"(
WebpageSampleInfo
sample_urls (	"r
OperatingSystemVersionInfo.
!operating_system_version_constant (	H �B$
"_operating_system_version_constant"p
AppPaymentModelInfoY
type (2K.google.ads.googleads.v11.enums.AppPaymentModelTypeEnum.AppPaymentModelType"R
MobileDeviceInfo#
mobile_device_constant (	H �B
_mobile_device_constant"F
CustomAffinityInfo
custom_affinity (	H �B
_custom_affinity"@
CustomIntentInfo
custom_intent (	H �B
_custom_intent"�
LocationGroupInfo
feed (	H �
geo_target_constants (	
radius (H�k
radius_units (2U.google.ads.googleads.v11.enums.LocationGroupRadiusUnitsEnum.LocationGroupRadiusUnits
feed_item_sets (	B
_feedB	
_radius"-
CustomAudienceInfo
custom_audience (	"1
CombinedAudienceInfo
combined_audience (	" 
AudienceInfo
audience (	"h
KeywordThemeInfo 
keyword_theme_constant (	H !
free_form_keyword_theme (	H B
keyword_themeB�
#com.google.ads.googleads.v11.commonBCriteriaProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v11/common;common�GAA�Google.Ads.GoogleAds.V11.Common�Google\\Ads\\GoogleAds\\V11\\Common�#Google::Ads::GoogleAds::V11::Commonbproto3
�
6google/ads/googleads/v11/common/custom_parameter.protogoogle.ads.googleads.v11.common"I
CustomParameter
key (	H �
value (	H�B
_keyB
_valueB�
#com.google.ads.googleads.v11.commonBCustomParameterProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v11/common;common�GAA�Google.Ads.GoogleAds.V11.Common�Google\\Ads\\GoogleAds\\V11\\Common�#Google::Ads::GoogleAds::V11::Commonbproto3
�
9google/ads/googleads/v11/enums/quality_score_bucket.protogoogle.ads.googleads.v11.enums"
QualityScoreBucketEnum"e
QualityScoreBucket
UNSPECIFIED 
UNKNOWN
BELOW_AVERAGE
AVERAGE
ABOVE_AVERAGEB�
"com.google.ads.googleads.v11.enumsBQualityScoreBucketProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
Ggoogle/ads/googleads/v11/enums/ad_group_criterion_approval_status.protogoogle.ads.googleads.v11.enums"�
"AdGroupCriterionApprovalStatusEnum"�
AdGroupCriterionApprovalStatus
UNSPECIFIED 
UNKNOWN
APPROVED
DISAPPROVED
PENDING_REVIEW
UNDER_REVIEWB�
"com.google.ads.googleads.v11.enumsB#AdGroupCriterionApprovalStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
>google/ads/googleads/v11/enums/ad_group_criterion_status.protogoogle.ads.googleads.v11.enums"z
AdGroupCriterionStatusEnum"\\
AdGroupCriterionStatus
UNSPECIFIED 
UNKNOWN
ENABLED

PAUSED
REMOVEDB�
"com.google.ads.googleads.v11.enumsBAdGroupCriterionStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
3google/ads/googleads/v11/enums/bidding_source.protogoogle.ads.googleads.v11.enums"�
BiddingSourceEnum"r
BiddingSource
UNSPECIFIED 
UNKNOWN
CAMPAIGN_BIDDING_STRATEGY
AD_GROUP
AD_GROUP_CRITERIONB�
"com.google.ads.googleads.v11.enumsBBiddingSourceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
Dgoogle/ads/googleads/v11/enums/criterion_system_serving_status.protogoogle.ads.googleads.v11.enums"�
 CriterionSystemServingStatusEnum"]
CriterionSystemServingStatus
UNSPECIFIED 
UNKNOWN
ELIGIBLE
RARELY_SERVEDB�
"com.google.ads.googleads.v11.enumsB!CriterionSystemServingStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�
3google/ads/googleads/v11/enums/criterion_type.protogoogle.ads.googleads.v11.enums"�
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
AUDIENCE#B�
"com.google.ads.googleads.v11.enumsBCriterionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v11/enums;enums�GAA�Google.Ads.GoogleAds.V11.Enums�Google\\Ads\\GoogleAds\\V11\\Enums�"Google::Ads::GoogleAds::V11::Enumsbproto3
�-
;google/ads/googleads/v11/resources/ad_group_criterion.proto"google.ads.googleads.v11.resources6google/ads/googleads/v11/common/custom_parameter.protoGgoogle/ads/googleads/v11/enums/ad_group_criterion_approval_status.proto>google/ads/googleads/v11/enums/ad_group_criterion_status.proto3google/ads/googleads/v11/enums/bidding_source.protoDgoogle/ads/googleads/v11/enums/criterion_system_serving_status.proto3google/ads/googleads/v11/enums/criterion_type.proto9google/ads/googleads/v11/enums/quality_score_bucket.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�&
AdGroupCriterionH
resource_name (	B1�A�A+
)googleads.googleapis.com/AdGroupCriterion
criterion_id8 (B�AH�
display_nameM (	B�Aa
status (2Q.google.ads.googleads.v11.enums.AdGroupCriterionStatusEnum.AdGroupCriterionStatus[
quality_info (2@.google.ads.googleads.v11.resources.AdGroupCriterion.QualityInfoB�A?
ad_group9 (	B(�A�A"
 googleads.googleapis.com/AdGroupH�R
type (2?.google.ads.googleads.v11.enums.CriterionTypeEnum.CriterionTypeB�A
negative: (B�AH��
system_serving_status4 (2].google.ads.googleads.v11.enums.CriterionSystemServingStatusEnum.CriterionSystemServingStatusB�A
approval_status5 (2a.google.ads.googleads.v11.enums.AdGroupCriterionApprovalStatusEnum.AdGroupCriterionApprovalStatusB�A 
disapproval_reasons; (	B�AF
labels< (	B6�A�A0
.googleads.googleapis.com/AdGroupCriterionLabel
bid_modifier= (H�
cpc_bid_micros> (H�
cpm_bid_micros? (H�
cpv_bid_micros@ (H�#
percent_cpc_bid_microsA (H�*
effective_cpc_bid_microsB (B�AH	�*
effective_cpm_bid_microsC (B�AH
�*
effective_cpv_bid_microsD (B�AH�2
 effective_percent_cpc_bid_microsE (B�AH�f
effective_cpc_bid_source (2?.google.ads.googleads.v11.enums.BiddingSourceEnum.BiddingSourceB�Af
effective_cpm_bid_source (2?.google.ads.googleads.v11.enums.BiddingSourceEnum.BiddingSourceB�Af
effective_cpv_bid_source (2?.google.ads.googleads.v11.enums.BiddingSourceEnum.BiddingSourceB�An
 effective_percent_cpc_bid_source# (2?.google.ads.googleads.v11.enums.BiddingSourceEnum.BiddingSourceB�Ag
position_estimates
 (2F.google.ads.googleads.v11.resources.AdGroupCriterion.PositionEstimatesB�A

final_urlsF (	
final_mobile_urlsG (	
final_url_suffixH (	H�"
tracking_url_templateI (	H�O
url_custom_parameters (20.google.ads.googleads.v11.common.CustomParameterD
keyword (2,.google.ads.googleads.v11.common.KeywordInfoB�AH H
	placement (2..google.ads.googleads.v11.common.PlacementInfoB�AH Z
mobile_app_category (26.google.ads.googleads.v11.common.MobileAppCategoryInfoB�AH Y
mobile_application (26.google.ads.googleads.v11.common.MobileApplicationInfoB�AH O
listing_group  (21.google.ads.googleads.v11.common.ListingGroupInfoB�AH G
	age_range$ (2-.google.ads.googleads.v11.common.AgeRangeInfoB�AH B
gender% (2+.google.ads.googleads.v11.common.GenderInfoB�AH M
income_range& (20.google.ads.googleads.v11.common.IncomeRangeInfoB�AH S
parental_status\' (23.google.ads.googleads.v11.common.ParentalStatusInfoB�AH G
	user_list* (2-.google.ads.googleads.v11.common.UserListInfoB�AH O
youtube_video( (21.google.ads.googleads.v11.common.YouTubeVideoInfoB�AH S
youtube_channel) (23.google.ads.googleads.v11.common.YouTubeChannelInfoB�AH @
topic+ (2*.google.ads.googleads.v11.common.TopicInfoB�AH O
user_interest- (21.google.ads.googleads.v11.common.UserInterestInfoB�AH D
webpage. (2,.google.ads.googleads.v11.common.WebpageInfoB�AH V
app_payment_model/ (24.google.ads.googleads.v11.common.AppPaymentModelInfoB�AH S
custom_affinity0 (23.google.ads.googleads.v11.common.CustomAffinityInfoB�AH O
custom_intent1 (21.google.ads.googleads.v11.common.CustomIntentInfoB�AH S
custom_audienceJ (23.google.ads.googleads.v11.common.CustomAudienceInfoB�AH W
combined_audienceK (25.google.ads.googleads.v11.common.CombinedAudienceInfoB�AH F
audienceO (2-.google.ads.googleads.v11.common.AudienceInfoB�AH �
QualityInfo
quality_score (B�AH �n
creative_quality_score (2I.google.ads.googleads.v11.enums.QualityScoreBucketEnum.QualityScoreBucketB�Ap
post_click_quality_score (2I.google.ads.googleads.v11.enums.QualityScoreBucketEnum.QualityScoreBucketB�Al
search_predicted_ctr (2I.google.ads.googleads.v11.enums.QualityScoreBucketEnum.QualityScoreBucketB�AB
_quality_score�
PositionEstimates\'
first_page_cpc_micros (B�AH �+
first_position_cpc_micros (B�AH�(
top_of_page_cpc_micros (B�AH�<
*estimated_add_clicks_at_first_position_cpc	 (B�AH�:
(estimated_add_cost_at_first_position_cpc
 (B�AH�B
_first_page_cpc_microsB
_first_position_cpc_microsB
_top_of_page_cpc_microsB-
+_estimated_add_clicks_at_first_position_cpcB+
)_estimated_add_cost_at_first_position_cpc:t�Aq
)googleads.googleapis.com/AdGroupCriterionDcustomers/{customer_id}/adGroupCriteria/{ad_group_id}~{criterion_id}B
	criterionB
_criterion_idB
	_ad_groupB
	_negativeB
_bid_modifierB
_cpc_bid_microsB
_cpm_bid_microsB
_cpv_bid_microsB
_percent_cpc_bid_microsB
_effective_cpc_bid_microsB
_effective_cpm_bid_microsB
_effective_cpv_bid_microsB#
!_effective_percent_cpc_bid_microsB
_final_url_suffixB
_tracking_url_templateB�
&com.google.ads.googleads.v11.resourcesBAdGroupCriterionProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v11/resources;resources�GAA�"Google.Ads.GoogleAds.V11.Resources�"Google\\Ads\\GoogleAds\\V11\\Resources�&Google::Ads::GoogleAds::V11::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

