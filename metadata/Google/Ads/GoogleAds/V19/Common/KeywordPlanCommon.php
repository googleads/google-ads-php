<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/keyword_plan_common.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Common;

class KeywordPlanCommon
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
Cgoogle/ads/googleads/v19/enums/keyword_plan_competition_level.protogoogle.ads.googleads.v19.enums"}
KeywordPlanCompetitionLevelEnum"Z
KeywordPlanCompetitionLevel
UNSPECIFIED 
UNKNOWN
LOW

MEDIUM
HIGHB�
"com.google.ads.googleads.v19.enumsB KeywordPlanCompetitionLevelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
Ggoogle/ads/googleads/v19/enums/keyword_plan_aggregate_metric_type.protogoogle.ads.googleads.v19.enums"p
"KeywordPlanAggregateMetricTypeEnum"J
KeywordPlanAggregateMetricType
UNSPECIFIED 
UNKNOWN

DEVICEB�
"com.google.ads.googleads.v19.enumsB#KeywordPlanAggregateMetricTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
2google/ads/googleads/v19/enums/month_of_year.protogoogle.ads.googleads.v19.enums"�
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
"com.google.ads.googleads.v19.enumsBMonthOfYearProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
+google/ads/googleads/v19/common/dates.protogoogle.ads.googleads.v19.common"W
	DateRange

start_date (	H �
end_date (	H�B
_start_dateB
	_end_date"�
YearMonthRange9
start (2*.google.ads.googleads.v19.common.YearMonth7
end (2*.google.ads.googleads.v19.common.YearMonth"e
	YearMonth
year (J
month (2;.google.ads.googleads.v19.enums.MonthOfYearEnum.MonthOfYearB�
#com.google.ads.googleads.v19.commonB
DatesProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/common;common�GAA�Google.Ads.GoogleAds.V19.Common�Google\\Ads\\GoogleAds\\V19\\Common�#Google::Ads::GoogleAds::V19::Commonbproto3
�
+google/ads/googleads/v19/enums/device.protogoogle.ads.googleads.v19.enums"v

DeviceEnum"h
Device
UNSPECIFIED 
UNKNOWN

MOBILE

TABLET
DESKTOP
CONNECTED_TV	
OTHERB�
"com.google.ads.googleads.v19.enumsBDeviceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
Dgoogle/ads/googleads/v19/enums/keyword_plan_concept_group_type.protogoogle.ads.googleads.v19.enums"�
KeywordPlanConceptGroupTypeEnum"g
KeywordPlanConceptGroupType
UNSPECIFIED 
UNKNOWN	
BRAND
OTHER_BRANDS
	NON_BRANDB�
"com.google.ads.googleads.v19.enumsB KeywordPlanConceptGroupTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
9google/ads/googleads/v19/common/keyword_plan_common.protogoogle.ads.googleads.v19.common+google/ads/googleads/v19/enums/device.protoGgoogle/ads/googleads/v19/enums/keyword_plan_aggregate_metric_type.protoCgoogle/ads/googleads/v19/enums/keyword_plan_competition_level.protoDgoogle/ads/googleads/v19/enums/keyword_plan_concept_group_type.proto2google/ads/googleads/v19/enums/month_of_year.proto"�
KeywordPlanHistoricalMetrics!
avg_monthly_searches (H �T
monthly_search_volumes (24.google.ads.googleads.v19.common.MonthlySearchVolumep
competition (2[.google.ads.googleads.v19.enums.KeywordPlanCompetitionLevelEnum.KeywordPlanCompetitionLevel
competition_index (H�\'
low_top_of_page_bid_micros	 (H�(
high_top_of_page_bid_micros
 (H�
average_cpc_micros (H�B
_avg_monthly_searchesB
_competition_indexB
_low_top_of_page_bid_microsB
_high_top_of_page_bid_microsB
_average_cpc_micros"�
HistoricalMetricsOptionsN
year_month_range (2/.google.ads.googleads.v19.common.YearMonthRangeH �
include_average_cpc (B
_year_month_range"�
MonthlySearchVolume
year (H �J
month (2;.google.ads.googleads.v19.enums.MonthOfYearEnum.MonthOfYear
monthly_searches (H�B
_yearB
_monthly_searches"�
KeywordPlanAggregateMetrics�
aggregate_metric_types (2a.google.ads.googleads.v19.enums.KeywordPlanAggregateMetricTypeEnum.KeywordPlanAggregateMetricType"x
!KeywordPlanAggregateMetricResultsS
device_searches (2:.google.ads.googleads.v19.common.KeywordPlanDeviceSearches"�
KeywordPlanDeviceSearchesA
device (21.google.ads.googleads.v19.enums.DeviceEnum.Device
search_count (H �B
_search_count"W
KeywordAnnotationsA
concepts (2/.google.ads.googleads.v19.common.KeywordConcept"d
KeywordConcept
name (	D
concept_group (2-.google.ads.googleads.v19.common.ConceptGroup"�
ConceptGroup
name (	i
type (2[.google.ads.googleads.v19.enums.KeywordPlanConceptGroupTypeEnum.KeywordPlanConceptGroupTypeB�
#com.google.ads.googleads.v19.commonBKeywordPlanCommonProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/common;common�GAA�Google.Ads.GoogleAds.V19.Common�Google\\Ads\\GoogleAds\\V19\\Common�#Google::Ads::GoogleAds::V19::Commonbproto3'
        , true);
        static::$is_initialized = true;
    }
}

