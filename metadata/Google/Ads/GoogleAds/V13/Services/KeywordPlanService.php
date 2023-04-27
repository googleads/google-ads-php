<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/services/keyword_plan_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V13\Services;

class KeywordPlanService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
+google/ads/googleads/v13/enums/device.protogoogle.ads.googleads.v13.enums"v

DeviceEnum"h
Device
UNSPECIFIED 
UNKNOWN

MOBILE

TABLET
DESKTOP
CONNECTED_TV	
OTHERB�
"com.google.ads.googleads.v13.enumsBDeviceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
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
�
Ggoogle/ads/googleads/v13/enums/keyword_plan_aggregate_metric_type.protogoogle.ads.googleads.v13.enums"p
"KeywordPlanAggregateMetricTypeEnum"J
KeywordPlanAggregateMetricType
UNSPECIFIED 
UNKNOWN

DEVICEB�
"com.google.ads.googleads.v13.enumsB#KeywordPlanAggregateMetricTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
Cgoogle/ads/googleads/v13/enums/keyword_plan_competition_level.protogoogle.ads.googleads.v13.enums"}
KeywordPlanCompetitionLevelEnum"Z
KeywordPlanCompetitionLevel
UNSPECIFIED 
UNKNOWN
LOW

MEDIUM
HIGHB�
"com.google.ads.googleads.v13.enumsB KeywordPlanCompetitionLevelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
Dgoogle/ads/googleads/v13/enums/keyword_plan_concept_group_type.protogoogle.ads.googleads.v13.enums"�
KeywordPlanConceptGroupTypeEnum"g
KeywordPlanConceptGroupType
UNSPECIFIED 
UNKNOWN	
BRAND
OTHER_BRANDS
	NON_BRANDB�
"com.google.ads.googleads.v13.enumsB KeywordPlanConceptGroupTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
9google/ads/googleads/v13/common/keyword_plan_common.protogoogle.ads.googleads.v13.common+google/ads/googleads/v13/enums/device.protoGgoogle/ads/googleads/v13/enums/keyword_plan_aggregate_metric_type.protoCgoogle/ads/googleads/v13/enums/keyword_plan_competition_level.protoDgoogle/ads/googleads/v13/enums/keyword_plan_concept_group_type.proto2google/ads/googleads/v13/enums/month_of_year.proto"�
KeywordPlanHistoricalMetrics!
avg_monthly_searches (H �T
monthly_search_volumes (24.google.ads.googleads.v13.common.MonthlySearchVolumep
competition (2[.google.ads.googleads.v13.enums.KeywordPlanCompetitionLevelEnum.KeywordPlanCompetitionLevel
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
year_month_range (2/.google.ads.googleads.v13.common.YearMonthRangeH �
include_average_cpc (B
_year_month_range"�
MonthlySearchVolume
year (H �J
month (2;.google.ads.googleads.v13.enums.MonthOfYearEnum.MonthOfYear
monthly_searches (H�B
_yearB
_monthly_searches"�
KeywordPlanAggregateMetrics�
aggregate_metric_types (2a.google.ads.googleads.v13.enums.KeywordPlanAggregateMetricTypeEnum.KeywordPlanAggregateMetricType"x
!KeywordPlanAggregateMetricResultsS
device_searches (2:.google.ads.googleads.v13.common.KeywordPlanDeviceSearches"�
KeywordPlanDeviceSearchesA
device (21.google.ads.googleads.v13.enums.DeviceEnum.Device
search_count (H �B
_search_count"W
KeywordAnnotationsA
concepts (2/.google.ads.googleads.v13.common.KeywordConcept"d
KeywordConcept
name (	D
concept_group (2-.google.ads.googleads.v13.common.ConceptGroup"�
ConceptGroup
name (	i
type (2[.google.ads.googleads.v13.enums.KeywordPlanConceptGroupTypeEnum.KeywordPlanConceptGroupTypeB�
#com.google.ads.googleads.v13.commonBKeywordPlanCommonProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v13/common;common�GAA�Google.Ads.GoogleAds.V13.Common�Google\\Ads\\GoogleAds\\V13\\Common�#Google::Ads::GoogleAds::V13::Commonbproto3
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
&com.google.ads.googleads.v13.resourcesBKeywordPlanProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v13/resources;resources�GAA�"Google.Ads.GoogleAds.V13.Resources�"Google\\Ads\\GoogleAds\\V13\\Resources�&Google::Ads::GoogleAds::V13::Resourcesbproto3
�.
<google/ads/googleads/v13/services/keyword_plan_service.proto!google.ads.googleads.v13.services5google/ads/googleads/v13/resources/keyword_plan.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
MutateKeywordPlansRequest
customer_id (	B�AP

operations (27.google.ads.googleads.v13.services.KeywordPlanOperationB�A
partial_failure (
validate_only ("�
KeywordPlanOperation/
update_mask (2.google.protobuf.FieldMaskA
create (2/.google.ads.googleads.v13.resources.KeywordPlanH A
update (2/.google.ads.googleads.v13.resources.KeywordPlanH ;
remove (	B)�A&
$googleads.googleapis.com/KeywordPlanH B
	operation"�
MutateKeywordPlansResponse1
partial_failure_error (2.google.rpc.StatusL
results (2;.google.ads.googleads.v13.services.MutateKeywordPlansResult"\\
MutateKeywordPlansResult@
resource_name (	B)�A&
$googleads.googleapis.com/KeywordPlan"b
GenerateForecastCurveRequestB
keyword_plan (	B,�A�A&
$googleads.googleapis.com/KeywordPlan"�
GenerateForecastCurveResponsee
campaign_forecast_curves (2C.google.ads.googleads.v13.services.KeywordPlanCampaignForecastCurve"g
!GenerateForecastTimeSeriesRequestB
keyword_plan (	B,�A�A&
$googleads.googleapis.com/KeywordPlan"�
"GenerateForecastTimeSeriesResponsel
weekly_time_series_forecasts (2F.google.ads.googleads.v13.services.KeywordPlanWeeklyTimeSeriesForecast"d
GenerateForecastMetricsRequestB
keyword_plan (	B,�A�A&
$googleads.googleapis.com/KeywordPlan"�
GenerateForecastMetricsResponseZ
campaign_forecasts (2>.google.ads.googleads.v13.services.KeywordPlanCampaignForecastY
ad_group_forecasts (2=.google.ads.googleads.v13.services.KeywordPlanAdGroupForecastX
keyword_forecasts (2=.google.ads.googleads.v13.services.KeywordPlanKeywordForecast"�
KeywordPlanCampaignForecast"
keyword_plan_campaign (	H �M
campaign_forecast (22.google.ads.googleads.v13.services.ForecastMetricsB
_keyword_plan_campaign"�
KeywordPlanAdGroupForecast"
keyword_plan_ad_group (	H �M
ad_group_forecast (22.google.ads.googleads.v13.services.ForecastMetricsB
_keyword_plan_ad_group"�
KeywordPlanKeywordForecast*
keyword_plan_ad_group_keyword (	H �L
keyword_forecast (22.google.ads.googleads.v13.services.ForecastMetricsB 
_keyword_plan_ad_group_keyword"�
 KeywordPlanCampaignForecastCurve"
keyword_plan_campaign (	H �h
max_cpc_bid_forecast_curve (2D.google.ads.googleads.v13.services.KeywordPlanMaxCpcBidForecastCurveB
_keyword_plan_campaign"�
!KeywordPlanMaxCpcBidForecastCurve^
max_cpc_bid_forecasts (2?.google.ads.googleads.v13.services.KeywordPlanMaxCpcBidForecast"�
KeywordPlanMaxCpcBidForecast
max_cpc_bid_micros (H �P
max_cpc_bid_forecast (22.google.ads.googleads.v13.services.ForecastMetricsB
_max_cpc_bid_micros"�
#KeywordPlanWeeklyTimeSeriesForecast"
keyword_plan_campaign (	H �V
weekly_forecasts (2<.google.ads.googleads.v13.services.KeywordPlanWeeklyForecastB
_keyword_plan_campaign"�
KeywordPlanWeeklyForecast

start_date (	H �D
forecast (22.google.ads.googleads.v13.services.ForecastMetricsB
_start_date"�
ForecastMetrics
impressions (H �
ctr (H�
average_cpc	 (H�
clicks
 (H�
cost_micros (H�B
_impressionsB
_ctrB
_average_cpcB	
_clicksB
_cost_micros"�
 GenerateHistoricalMetricsRequestB
keyword_plan (	B,�A�A&
$googleads.googleapis.com/KeywordPlanW
aggregate_metrics (2<.google.ads.googleads.v13.common.KeywordPlanAggregateMetrics]
historical_metrics_options (29.google.ads.googleads.v13.common.HistoricalMetricsOptions"�
!GenerateHistoricalMetricsResponseW
metrics (2F.google.ads.googleads.v13.services.KeywordPlanKeywordHistoricalMetricsd
aggregate_metric_results (2B.google.ads.googleads.v13.common.KeywordPlanAggregateMetricResults"�
#KeywordPlanKeywordHistoricalMetrics
search_query (	H �
close_variants (	V
keyword_metrics (2=.google.ads.googleads.v13.common.KeywordPlanHistoricalMetricsB
_search_query2�

KeywordPlanService�
MutateKeywordPlans<.google.ads.googleads.v13.services.MutateKeywordPlansRequest=.google.ads.googleads.v13.services.MutateKeywordPlansResponse"V���7"2/v13/customers/{customer_id=*}/keywordPlans:mutate:*�Acustomer_id,operations�
GenerateForecastCurve?.google.ads.googleads.v13.services.GenerateForecastCurveRequest@.google.ads.googleads.v13.services.GenerateForecastCurveResponse"^���I"D/v13/{keyword_plan=customers/*/keywordPlans/*}:generateForecastCurve:*�Akeyword_plan�
GenerateForecastTimeSeriesD.google.ads.googleads.v13.services.GenerateForecastTimeSeriesRequestE.google.ads.googleads.v13.services.GenerateForecastTimeSeriesResponse"c���N"I/v13/{keyword_plan=customers/*/keywordPlans/*}:generateForecastTimeSeries:*�Akeyword_plan�
GenerateForecastMetricsA.google.ads.googleads.v13.services.GenerateForecastMetricsRequestB.google.ads.googleads.v13.services.GenerateForecastMetricsResponse"`���K"F/v13/{keyword_plan=customers/*/keywordPlans/*}:generateForecastMetrics:*�Akeyword_plan�
GenerateHistoricalMetricsC.google.ads.googleads.v13.services.GenerateHistoricalMetricsRequestD.google.ads.googleads.v13.services.GenerateHistoricalMetricsResponse"b���M"H/v13/{keyword_plan=customers/*/keywordPlans/*}:generateHistoricalMetrics:*�Akeyword_planE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v13.servicesBKeywordPlanServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v13/services;services�GAA�!Google.Ads.GoogleAds.V13.Services�!Google\\Ads\\GoogleAds\\V13\\Services�%Google::Ads::GoogleAds::V13::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

