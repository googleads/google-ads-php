<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/resources/keyword_plan.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V13\Resources;

class KeywordPlan
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
Cgoogle/ads/googleads/v13/enums/keyword_plan_forecast_interval.protogoogle.ads.googleads.v13.enums"�
KeywordPlanForecastIntervalEnum"l
KeywordPlanForecastInterval
UNSPECIFIED 
UNKNOWN
	NEXT_WEEK

NEXT_MONTH
NEXT_QUARTERB�
"com.google.ads.googleads.v13.enumsB KeywordPlanForecastIntervalProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
2google/ads/googleads/v13/enums/month_of_year.protogoogle.ads.googleads.v13.enums"�
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
"com.google.ads.googleads.v13.enumsBMonthOfYearProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
+google/ads/googleads/v13/common/dates.protogoogle.ads.googleads.v13.common"W
	DateRange

start_date (	H �
end_date (	H�B
_start_dateB
	_end_date"�
YearMonthRange9
start (2*.google.ads.googleads.v13.common.YearMonth7
end (2*.google.ads.googleads.v13.common.YearMonth"e
	YearMonth
year (J
month (2;.google.ads.googleads.v13.enums.MonthOfYearEnum.MonthOfYearB�
#com.google.ads.googleads.v13.commonB
DatesProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v13/common;common�GAA�Google.Ads.GoogleAds.V13.Common�Google\\Ads\\GoogleAds\\V13\\Common�#Google::Ads::GoogleAds::V13::Commonbproto3
�
5google/ads/googleads/v13/resources/keyword_plan.proto"google.ads.googleads.v13.resourcesCgoogle/ads/googleads/v13/enums/keyword_plan_forecast_interval.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
KeywordPlanC
resource_name (	B,�A�A&
$googleads.googleapis.com/KeywordPlan
id (B�AH �
name (	H�V
forecast_period (2=.google.ads.googleads.v13.resources.KeywordPlanForecastPeriod:a�A^
$googleads.googleapis.com/KeywordPlan6customers/{customer_id}/keywordPlans/{keyword_plan_id}B
_idB
_name"�
KeywordPlanForecastPeriodt
date_interval (2[.google.ads.googleads.v13.enums.KeywordPlanForecastIntervalEnum.KeywordPlanForecastIntervalH @

date_range (2*.google.ads.googleads.v13.common.DateRangeH B

intervalB�
&com.google.ads.googleads.v13.resourcesBKeywordPlanProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v13/resources;resources�GAA�"Google.Ads.GoogleAds.V13.Resources�"Google\\Ads\\GoogleAds\\V13\\Resources�&Google::Ads::GoogleAds::V13::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

