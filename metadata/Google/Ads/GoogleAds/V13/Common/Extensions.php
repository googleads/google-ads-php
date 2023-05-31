<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/common/extensions.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V13\Common;

class Extensions
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
�
?google/ads/googleads/v13/enums/price_extension_price_unit.protogoogle.ads.googleads.v13.enums"�
PriceExtensionPriceUnitEnum"�
PriceExtensionPriceUnit
UNSPECIFIED 
UNKNOWN
PER_HOUR
PER_DAY
PER_WEEK
	PER_MONTH
PER_YEAR
	PER_NIGHTB�
"com.google.ads.googleads.v13.enumsBPriceExtensionPriceUnitProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
Dgoogle/ads/googleads/v13/enums/call_conversion_reporting_state.protogoogle.ads.googleads.v13.enums"�
 CallConversionReportingStateEnum"�
CallConversionReportingState
UNSPECIFIED 
UNKNOWN
DISABLED,
(USE_ACCOUNT_LEVEL_CALL_CONVERSION_ACTION-
)USE_RESOURCE_LEVEL_CALL_CONVERSION_ACTIONB�
"com.google.ads.googleads.v13.enumsB!CallConversionReportingStateProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
Dgoogle/ads/googleads/v13/enums/price_extension_price_qualifier.protogoogle.ads.googleads.v13.enums"�
 PriceExtensionPriceQualifierEnum"^
PriceExtensionPriceQualifier
UNSPECIFIED 
UNKNOWN
FROM	
UP_TO
AVERAGEB�
"com.google.ads.googleads.v13.enumsB!PriceExtensionPriceQualifierProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
Jgoogle/ads/googleads/v13/enums/promotion_extension_discount_modifier.protogoogle.ads.googleads.v13.enums"w
&PromotionExtensionDiscountModifierEnum"M
"PromotionExtensionDiscountModifier
UNSPECIFIED 
UNKNOWN	
UP_TOB�
"com.google.ads.googleads.v13.enumsB\'PromotionExtensionDiscountModifierProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
Agoogle/ads/googleads/v13/enums/promotion_extension_occasion.protogoogle.ads.googleads.v13.enums"�
PromotionExtensionOccasionEnum"�
PromotionExtensionOccasion
UNSPECIFIED 
UNKNOWN
	NEW_YEARS
CHINESE_NEW_YEAR
VALENTINES_DAY

EASTER
MOTHERS_DAY
FATHERS_DAY
	LABOR_DAY
BACK_TO_SCHOOL	
	HALLOWEEN

BLACK_FRIDAY
CYBER_MONDAY
	CHRISTMAS

BOXING_DAY
INDEPENDENCE_DAY
NATIONAL_DAY
END_OF_SEASON
WINTER_SALE
SUMMER_SALE
	FALL_SALE
SPRING_SALE
RAMADAN
EID_AL_FITR
EID_AL_ADHA
SINGLES_DAY

WOMENS_DAY
HOLI
PARENTS_DAY
ST_NICHOLAS_DAY
CARNIVAL
EPIPHANY
ROSH_HASHANAH 
PASSOVER!
HANUKKAH"

DIWALI#
NAVRATRI$
SONGKRAN%
YEAR_END_GIFT&B�
"com.google.ads.googleads.v13.enumsBPromotionExtensionOccasionProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
1google/ads/googleads/v13/common/feed_common.protogoogle.ads.googleads.v13.common"c
Money
currency_code (	H �
amount_micros (H�B
_currency_codeB
_amount_microsB�
#com.google.ads.googleads.v13.commonBFeedCommonProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v13/common;common�GAA�Google.Ads.GoogleAds.V13.Common�Google\\Ads\\GoogleAds\\V13\\Common�#Google::Ads::GoogleAds::V13::Commonbproto3
�
6google/ads/googleads/v13/common/custom_parameter.protogoogle.ads.googleads.v13.common"I
CustomParameter
key (	H �
value (	H�B
_keyB
_valueB�
#com.google.ads.googleads.v13.commonBCustomParameterProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v13/common;common�GAA�Google.Ads.GoogleAds.V13.Common�Google\\Ads\\GoogleAds\\V13\\Common�#Google::Ads::GoogleAds::V13::Commonbproto3
�
9google/ads/googleads/v13/enums/price_extension_type.protogoogle.ads.googleads.v13.enums"�
PriceExtensionTypeEnum"�
PriceExtensionType
UNSPECIFIED 
UNKNOWN

BRANDS

EVENTS
	LOCATIONS
NEIGHBORHOODS
PRODUCT_CATEGORIES
PRODUCT_TIERS
SERVICES
SERVICE_CATEGORIES	
SERVICE_TIERS
B�
"com.google.ads.googleads.v13.enumsBPriceExtensionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
.google/ads/googleads/v13/enums/app_store.protogoogle.ads.googleads.v13.enums"[
AppStoreEnum"K
AppStore
UNSPECIFIED 
UNKNOWN
APPLE_ITUNES
GOOGLE_PLAYB�
"com.google.ads.googleads.v13.enumsBAppStoreProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�(
0google/ads/googleads/v13/common/extensions.protogoogle.ads.googleads.v13.common1google/ads/googleads/v13/common/feed_common.proto.google/ads/googleads/v13/enums/app_store.protoDgoogle/ads/googleads/v13/enums/call_conversion_reporting_state.protoDgoogle/ads/googleads/v13/enums/price_extension_price_qualifier.proto?google/ads/googleads/v13/enums/price_extension_price_unit.proto9google/ads/googleads/v13/enums/price_extension_type.protoJgoogle/ads/googleads/v13/enums/promotion_extension_discount_modifier.protoAgoogle/ads/googleads/v13/enums/promotion_extension_occasion.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
AppFeedItem
	link_text	 (	H �
app_id
 (	H�H
	app_store (25.google.ads.googleads.v13.enums.AppStoreEnum.AppStore

final_urls (	
final_mobile_urls (	"
tracking_url_template (	H�O
url_custom_parameters (20.google.ads.googleads.v13.common.CustomParameter
final_url_suffix (	H�B

_link_textB	
_app_idB
_tracking_url_templateB
_final_url_suffix"�
CallFeedItem
phone_number (	H �
country_code (	H�"
call_tracking_enabled	 (H�#
call_conversion_action
 (	H�.
!call_conversion_tracking_disabled (H��
call_conversion_reporting_state (2].google.ads.googleads.v13.enums.CallConversionReportingStateEnum.CallConversionReportingStateB
_phone_numberB
_country_codeB
_call_tracking_enabledB
_call_conversion_actionB$
"_call_conversion_tracking_disabled"=
CalloutFeedItem
callout_text (	H �B
_callout_text"�
LocationFeedItem
business_name	 (	H �
address_line_1
 (	H�
address_line_2 (	H�
city (	H�
province (	H�
postal_code (	H�
country_code (	H�
phone_number (	H�B
_business_nameB
_address_line_1B
_address_line_2B
_cityB
	_provinceB
_postal_codeB
_country_codeB
_phone_number"�
AffiliateLocationFeedItem
business_name (	H �
address_line_1 (	H�
address_line_2 (	H�
city (	H�
province (	H�
postal_code (	H�
country_code (	H�
phone_number (	H�
chain_id (H�

chain_name (	H	�B
_business_nameB
_address_line_1B
_address_line_2B
_cityB
	_provinceB
_postal_codeB
_country_codeB
_phone_numberB
	_chain_idB
_chain_name"�
TextMessageFeedItem
business_name (	H �
country_code (	H�
phone_number (	H�
text	 (	H�
extension_text
 (	H�B
_business_nameB
_country_codeB
_phone_numberB
_textB
_extension_text"�
PriceFeedItemW
type (2I.google.ads.googleads.v13.enums.PriceExtensionTypeEnum.PriceExtensionTypev
price_qualifier (2].google.ads.googleads.v13.enums.PriceExtensionPriceQualifierEnum.PriceExtensionPriceQualifier"
tracking_url_template (	H �
language_code (	H�D
price_offerings (2+.google.ads.googleads.v13.common.PriceOffer
final_url_suffix	 (	H�B
_tracking_url_templateB
_language_codeB
_final_url_suffix"�

PriceOffer
header (	H �
description (	H�5
price (2&.google.ads.googleads.v13.common.Moneya
unit (2S.google.ads.googleads.v13.enums.PriceExtensionPriceUnitEnum.PriceExtensionPriceUnit

final_urls	 (	
final_mobile_urls
 (	B	
_headerB
_description"�
PromotionFeedItem
promotion_target (	H��
discount_modifier (2i.google.ads.googleads.v13.enums.PromotionExtensionDiscountModifierEnum.PromotionExtensionDiscountModifier!
promotion_start_date (	H�
promotion_end_date (	H�k
occasion	 (2Y.google.ads.googleads.v13.enums.PromotionExtensionOccasionEnum.PromotionExtensionOccasion

final_urls (	
final_mobile_urls (	"
tracking_url_template (	H�O
url_custom_parameters (20.google.ads.googleads.v13.common.CustomParameter
final_url_suffix (	H�
language_code (	H�
percent_off (H B
money_amount_off (2&.google.ads.googleads.v13.common.MoneyH 
promotion_code (	HD
orders_over_amount (2&.google.ads.googleads.v13.common.MoneyHB
discount_typeB
promotion_triggerB
_promotion_targetB
_promotion_start_dateB
_promotion_end_dateB
_tracking_url_templateB
_final_url_suffixB
_language_code"K
StructuredSnippetFeedItem
header (	H �
values (	B	
_header"�
SitelinkFeedItem
	link_text	 (	H �
line1
 (	H�
line2 (	H�

final_urls (	
final_mobile_urls (	"
tracking_url_template (	H�O
url_custom_parameters (20.google.ads.googleads.v13.common.CustomParameter
final_url_suffix (	H�B

_link_textB
_line1B
_line2B
_tracking_url_templateB
_final_url_suffix"`
HotelCalloutFeedItem
text (	H �
language_code (	H�B
_textB
_language_code"L
ImageFeedItem;
image_asset (	B&�A�A 
googleads.googleapis.com/AssetB�
#com.google.ads.googleads.v13.commonBExtensionsProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v13/common;common�GAA�Google.Ads.GoogleAds.V13.Common�Google\\Ads\\GoogleAds\\V13\\Common�#Google::Ads::GoogleAds::V13::Commonbproto3'
        , true);
        static::$is_initialized = true;
    }
}

