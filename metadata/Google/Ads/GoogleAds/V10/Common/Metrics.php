<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/common/metrics.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Common;

class Metrics
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
;google/ads/googleads/v10/enums/interaction_event_type.protogoogle.ads.googleads.v10.enums"�
InteractionEventTypeEnum"i
InteractionEventType
UNSPECIFIED 
UNKNOWN	
CLICK

ENGAGEMENT

VIDEO_VIEW
NONEB�
"com.google.ads.googleads.v10.enumsBInteractionEventTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3
�
9google/ads/googleads/v10/enums/quality_score_bucket.protogoogle.ads.googleads.v10.enums"
QualityScoreBucketEnum"e
QualityScoreBucket
UNSPECIFIED 
UNKNOWN
BELOW_AVERAGE
AVERAGE
ABOVE_AVERAGEB�
"com.google.ads.googleads.v10.enumsBQualityScoreBucketProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3
�J
-google/ads/googleads/v10/common/metrics.protogoogle.ads.googleads.v10.common9google/ads/googleads/v10/enums/quality_score_bucket.proto"�G
Metrics0
"absolute_top_impression_percentage� (H �
active_view_cpm� (H�
active_view_ctr� (H�%
active_view_impressions� (H�\'
active_view_measurability� (H�0
"active_view_measurable_cost_micros� (H�0
"active_view_measurable_impressions� (H�%
active_view_viewability� (H�4
&all_conversions_from_interactions_rate� (H�#
all_conversions_value� (H	�1
(all_conversions_value_by_conversion_date� (
all_conversions� (H
�+
"all_conversions_by_conversion_date� (,
all_conversions_value_per_cost� (H�0
"all_conversions_from_click_to_call� (H�-
all_conversions_from_directions� (H�E
7all_conversions_from_interactions_value_per_interaction� (H�\'
all_conversions_from_menu� (H�(
all_conversions_from_order� (H�3
%all_conversions_from_other_engagement� (H�.
 all_conversions_from_store_visit� (H�0
"all_conversions_from_store_website� (H�
average_cost� (H�
average_cpc� (H�
average_cpe� (H�
average_cpm� (H�
average_cpv� (H� 
average_page_views� (H�"
average_time_on_site� (H�\'
benchmark_average_max_cpc� (H�.
 biddable_app_install_conversions� (H�3
%biddable_app_post_install_conversions� (H�
benchmark_ctr� (H�
bounce_rate� (H�
clicks� (H �
combined_clicks� (H!�\'
combined_clicks_per_query� (H"�
combined_queries� (H#�2
$content_budget_lost_impression_share� (H$�&
content_impression_share� (H%�8
*conversion_last_received_request_date_time� (	H&�-
conversion_last_conversion_date� (	H\'�0
"content_rank_lost_impression_share� (H(�0
"conversions_from_interactions_rate� (H)�
conversions_value� (H*�-
$conversions_value_by_conversion_date� ((
conversions_value_per_cost� (H+�A
3conversions_from_interactions_value_per_interaction� (H,�
conversions� (H-�\'
conversions_by_conversion_date� (
cost_micros� (H.�&
cost_per_all_conversions� (H/�!
cost_per_conversion� (H0�:
,cost_per_current_model_attributed_conversion� (H1�&
cross_device_conversions� (H2�
ctr� (H3�2
$current_model_attributed_conversions� (H4�I
;current_model_attributed_conversions_from_interactions_rate� (H5�Z
Lcurrent_model_attributed_conversions_from_interactions_value_per_interaction� (H6�8
*current_model_attributed_conversions_value� (H7�A
3current_model_attributed_conversions_value_per_cost� (H8�
engagement_rate� (H9�
engagements� (H:�-
hotel_average_lead_value_micros� (H;�*
hotel_commission_rate_micros� (H<�,
hotel_expected_commission_cost� (H=�/
!hotel_price_difference_percentage� (H>�(
hotel_eligible_impressions� (H?�t
!historical_creative_quality_scoreP (2I.google.ads.googleads.v10.enums.QualityScoreBucketEnum.QualityScoreBucketx
%historical_landing_page_quality_scoreQ (2I.google.ads.googleads.v10.enums.QualityScoreBucketEnum.QualityScoreBucket&
historical_quality_score� (H@�r
historical_search_predicted_ctrS (2I.google.ads.googleads.v10.enums.QualityScoreBucketEnum.QualityScoreBucket
gmail_forwards� (HA�
gmail_saves� (HB�$
gmail_secondary_clicks� (HC�*
impressions_from_store_reach� (HD�
impressions� (HE�
interaction_rate� (HF�
interactions� (HG�n
interaction_event_typesd (2M.google.ads.googleads.v10.enums.InteractionEventTypeEnum.InteractionEventType 
invalid_click_rate� (HH�
invalid_clicks� (HI�
message_chats� (HJ�!
message_impressions� (HK�
message_chat_rate� (HL�/
!mobile_friendly_clicks_percentage� (HM�\'
optimization_score_uplift� (HN�$
optimization_score_url� (	HO�
organic_clicks� (HP�&
organic_clicks_per_query� (HQ�!
organic_impressions� (HR�+
organic_impressions_per_query� (HS�
organic_queries� (HT�"
percent_new_visitors� (HU�
phone_calls� (HV�
phone_impressions� (HW� 
phone_through_rate� (HX�
relative_ctr� (HY�2
$search_absolute_top_impression_share� (HZ�>
0search_budget_lost_absolute_top_impression_share� (H[�1
#search_budget_lost_impression_share� (H\\�5
\'search_budget_lost_top_impression_share� (H]� 
search_click_share� (H^�1
#search_exact_match_impression_share� (H_�%
search_impression_share� (H`�<
.search_rank_lost_absolute_top_impression_share� (Ha�/
!search_rank_lost_impression_share� (Hb�3
%search_rank_lost_top_impression_share� (Hc�)
search_top_impression_share� (Hd�
speed_score� (He�\'
top_impression_percentage� (Hf�>
0valid_accelerated_mobile_pages_clicks_percentage� (Hg�\'
value_per_all_conversions� (Hh�:
,value_per_all_conversions_by_conversion_date� (Hi�"
value_per_conversion� (Hj�6
(value_per_conversions_by_conversion_date� (Hk�;
-value_per_current_model_attributed_conversion� (Hl�&
video_quartile_p100_rate� (Hm�%
video_quartile_p25_rate� (Hn�%
video_quartile_p50_rate� (Ho�%
video_quartile_p75_rate� (Hp�
video_view_rate� (Hq�
video_views� (Hr�&
view_through_conversions� (Hs�"
sk_ad_network_conversions� (B%
#_absolute_top_impression_percentageB
_active_view_cpmB
_active_view_ctrB
_active_view_impressionsB
_active_view_measurabilityB%
#_active_view_measurable_cost_microsB%
#_active_view_measurable_impressionsB
_active_view_viewabilityB)
\'_all_conversions_from_interactions_rateB
_all_conversions_valueB
_all_conversionsB!
_all_conversions_value_per_costB%
#_all_conversions_from_click_to_callB"
 _all_conversions_from_directionsB:
8_all_conversions_from_interactions_value_per_interactionB
_all_conversions_from_menuB
_all_conversions_from_orderB(
&_all_conversions_from_other_engagementB#
!_all_conversions_from_store_visitB%
#_all_conversions_from_store_websiteB
_average_costB
_average_cpcB
_average_cpeB
_average_cpmB
_average_cpvB
_average_page_viewsB
_average_time_on_siteB
_benchmark_average_max_cpcB#
!_biddable_app_install_conversionsB(
&_biddable_app_post_install_conversionsB
_benchmark_ctrB
_bounce_rateB	
_clicksB
_combined_clicksB
_combined_clicks_per_queryB
_combined_queriesB\'
%_content_budget_lost_impression_shareB
_content_impression_shareB-
+_conversion_last_received_request_date_timeB"
 _conversion_last_conversion_dateB%
#_content_rank_lost_impression_shareB%
#_conversions_from_interactions_rateB
_conversions_valueB
_conversions_value_per_costB6
4_conversions_from_interactions_value_per_interactionB
_conversionsB
_cost_microsB
_cost_per_all_conversionsB
_cost_per_conversionB/
-_cost_per_current_model_attributed_conversionB
_cross_device_conversionsB
_ctrB\'
%_current_model_attributed_conversionsB>
<_current_model_attributed_conversions_from_interactions_rateBO
M_current_model_attributed_conversions_from_interactions_value_per_interactionB-
+_current_model_attributed_conversions_valueB6
4_current_model_attributed_conversions_value_per_costB
_engagement_rateB
_engagementsB"
 _hotel_average_lead_value_microsB
_hotel_commission_rate_microsB!
_hotel_expected_commission_costB$
"_hotel_price_difference_percentageB
_hotel_eligible_impressionsB
_historical_quality_scoreB
_gmail_forwardsB
_gmail_savesB
_gmail_secondary_clicksB
_impressions_from_store_reachB
_impressionsB
_interaction_rateB
_interactionsB
_invalid_click_rateB
_invalid_clicksB
_message_chatsB
_message_impressionsB
_message_chat_rateB$
"_mobile_friendly_clicks_percentageB
_optimization_score_upliftB
_optimization_score_urlB
_organic_clicksB
_organic_clicks_per_queryB
_organic_impressionsB 
_organic_impressions_per_queryB
_organic_queriesB
_percent_new_visitorsB
_phone_callsB
_phone_impressionsB
_phone_through_rateB
_relative_ctrB\'
%_search_absolute_top_impression_shareB3
1_search_budget_lost_absolute_top_impression_shareB&
$_search_budget_lost_impression_shareB*
(_search_budget_lost_top_impression_shareB
_search_click_shareB&
$_search_exact_match_impression_shareB
_search_impression_shareB1
/_search_rank_lost_absolute_top_impression_shareB$
"_search_rank_lost_impression_shareB(
&_search_rank_lost_top_impression_shareB
_search_top_impression_shareB
_speed_scoreB
_top_impression_percentageB3
1_valid_accelerated_mobile_pages_clicks_percentageB
_value_per_all_conversionsB/
-_value_per_all_conversions_by_conversion_dateB
_value_per_conversionB+
)_value_per_conversions_by_conversion_dateB0
._value_per_current_model_attributed_conversionB
_video_quartile_p100_rateB
_video_quartile_p25_rateB
_video_quartile_p50_rateB
_video_quartile_p75_rateB
_video_view_rateB
_video_viewsB
_view_through_conversionsB�
#com.google.ads.googleads.v10.commonBMetricsProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v10/common;common�GAA�Google.Ads.GoogleAds.V10.Common�Google\\Ads\\GoogleAds\\V10\\Common�#Google::Ads::GoogleAds::V10::Commonbproto3'
        , true);
        static::$is_initialized = true;
    }
}

