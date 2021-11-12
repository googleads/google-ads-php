<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/resources/keyword_plan.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Resources;

class KeywordPlan
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
1google/ads/googleads/v9/enums/month_of_year.protogoogle.ads.googleads.v9.enums"�
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
!com.google.ads.googleads.v9.enumsBMonthOfYearProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
*google/ads/googleads/v9/common/dates.protogoogle.ads.googleads.v9.commongoogle/api/annotations.proto"W
	DateRange

start_date (	H �
end_date (	H�B
_start_dateB
	_end_date"�
YearMonthRange8
start (2).google.ads.googleads.v9.common.YearMonth6
end (2).google.ads.googleads.v9.common.YearMonth"d
	YearMonth
year (I
month (2:.google.ads.googleads.v9.enums.MonthOfYearEnum.MonthOfYearB�
"com.google.ads.googleads.v9.commonB
DatesProtoPZDgoogle.golang.org/genproto/googleapis/ads/googleads/v9/common;common�GAA�Google.Ads.GoogleAds.V9.Common�Google\\Ads\\GoogleAds\\V9\\Common�"Google::Ads::GoogleAds::V9::Commonbproto3
�
Bgoogle/ads/googleads/v9/enums/keyword_plan_forecast_interval.protogoogle.ads.googleads.v9.enums"�
KeywordPlanForecastIntervalEnum"l
KeywordPlanForecastInterval
UNSPECIFIED 
UNKNOWN
	NEXT_WEEK

NEXT_MONTH
NEXT_QUARTERB�
!com.google.ads.googleads.v9.enumsB KeywordPlanForecastIntervalProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
4google/ads/googleads/v9/resources/keyword_plan.proto!google.ads.googleads.v9.resourcesBgoogle/ads/googleads/v9/enums/keyword_plan_forecast_interval.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/api/annotations.proto"�
KeywordPlanC
resource_name (	B,�A�A&
$googleads.googleapis.com/KeywordPlan
id (B�AH �
name (	H�U
forecast_period (2<.google.ads.googleads.v9.resources.KeywordPlanForecastPeriod:a�A^
$googleads.googleapis.com/KeywordPlan6customers/{customer_id}/keywordPlans/{keyword_plan_id}B
_idB
_name"�
KeywordPlanForecastPeriods
date_interval (2Z.google.ads.googleads.v9.enums.KeywordPlanForecastIntervalEnum.KeywordPlanForecastIntervalH ?

date_range (2).google.ads.googleads.v9.common.DateRangeH B

intervalB�
%com.google.ads.googleads.v9.resourcesBKeywordPlanProtoPZJgoogle.golang.org/genproto/googleapis/ads/googleads/v9/resources;resources�GAA�!Google.Ads.GoogleAds.V9.Resources�!Google\\Ads\\GoogleAds\\V9\\Resources�%Google::Ads::GoogleAds::V9::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

