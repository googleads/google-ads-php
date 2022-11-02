<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v12/resources/ad_group_simulation.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V12\Resources;

class AdGroupSimulation
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
�$
0google/ads/googleads/v12/common/simulation.protogoogle.ads.googleads.v12.common"m
BidModifierSimulationPointListK
points (2;.google.ads.googleads.v12.common.BidModifierSimulationPoint"c
CpcBidSimulationPointListF
points (26.google.ads.googleads.v12.common.CpcBidSimulationPoint"c
CpvBidSimulationPointListF
points (26.google.ads.googleads.v12.common.CpvBidSimulationPoint"i
TargetCpaSimulationPointListI
points (29.google.ads.googleads.v12.common.TargetCpaSimulationPoint"k
TargetRoasSimulationPointListJ
points (2:.google.ads.googleads.v12.common.TargetRoasSimulationPoint"q
 PercentCpcBidSimulationPointListM
points (2=.google.ads.googleads.v12.common.PercentCpcBidSimulationPoint"c
BudgetSimulationPointListF
points (26.google.ads.googleads.v12.common.BudgetSimulationPoint"�
(TargetImpressionShareSimulationPointListU
points (2E.google.ads.googleads.v12.common.TargetImpressionShareSimulationPoint"�
BidModifierSimulationPoint
bid_modifier (H �!
biddable_conversions (H�\'
biddable_conversions_value (H�
clicks (H�
cost_micros (H�
impressions (H�!
top_slot_impressions (H�(
parent_biddable_conversions (H�.
!parent_biddable_conversions_value (H�
parent_clicks (H	�
parent_cost_micros (H
�
parent_impressions (H�(
parent_top_slot_impressions (H�*
parent_required_budget_micros (H�B
_bid_modifierB
_biddable_conversionsB
_biddable_conversions_valueB	
_clicksB
_cost_microsB
_impressionsB
_top_slot_impressionsB
_parent_biddable_conversionsB$
"_parent_biddable_conversions_valueB
_parent_clicksB
_parent_cost_microsB
_parent_impressionsB
_parent_top_slot_impressionsB 
_parent_required_budget_micros"�
CpcBidSimulationPoint%
required_budget_amount_micros (!
biddable_conversions	 (H�\'
biddable_conversions_value
 (H�
clicks (H�
cost_micros (H�
impressions (H�!
top_slot_impressions (H�
cpc_bid_micros (H "
cpc_bid_scaling_modifier (H B
cpc_simulation_key_valueB
_biddable_conversionsB
_biddable_conversions_valueB	
_clicksB
_cost_microsB
_impressionsB
_top_slot_impressions"�
CpvBidSimulationPoint
cpv_bid_micros (H �
cost_micros (H�
impressions (H�
views (H�B
_cpv_bid_microsB
_cost_microsB
_impressionsB
_views"�
TargetCpaSimulationPoint%
required_budget_amount_micros (!
biddable_conversions	 (H�\'
biddable_conversions_value
 (H�
app_installs (
in_app_actions (
clicks (H�
cost_micros (H�
impressions (H�!
top_slot_impressions (H�
target_cpa_micros (H %
target_cpa_scaling_modifier (H B!
target_cpa_simulation_key_valueB
_biddable_conversionsB
_biddable_conversions_valueB	
_clicksB
_cost_microsB
_impressionsB
_top_slot_impressions"�
TargetRoasSimulationPoint
target_roas (H �%
required_budget_amount_micros (!
biddable_conversions	 (H�\'
biddable_conversions_value
 (H�
clicks (H�
cost_micros (H�
impressions (H�!
top_slot_impressions (H�B
_target_roasB
_biddable_conversionsB
_biddable_conversions_valueB	
_clicksB
_cost_microsB
_impressionsB
_top_slot_impressions"�
PercentCpcBidSimulationPoint#
percent_cpc_bid_micros (H �!
biddable_conversions (H�\'
biddable_conversions_value (H�
clicks (H�
cost_micros (H�
impressions (H�!
top_slot_impressions (H�B
_percent_cpc_bid_microsB
_biddable_conversionsB
_biddable_conversions_valueB	
_clicksB
_cost_microsB
_impressionsB
_top_slot_impressions"�
BudgetSimulationPoint
budget_amount_micros (\'
required_cpc_bid_ceiling_micros (
biddable_conversions ("
biddable_conversions_value (
clicks (
cost_micros (
impressions (
top_slot_impressions ("�
$TargetImpressionShareSimulationPoint&
target_impression_share_micros (\'
required_cpc_bid_ceiling_micros (%
required_budget_amount_micros (
biddable_conversions ("
biddable_conversions_value (
clicks (
cost_micros (
impressions (
top_slot_impressions	 ( 
absolute_top_impressions
 (B�
#com.google.ads.googleads.v12.commonBSimulationProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v12/common;common�GAA�Google.Ads.GoogleAds.V12.Common�Google\\Ads\\GoogleAds\\V12\\Common�#Google::Ads::GoogleAds::V12::Commonbproto3
�
Cgoogle/ads/googleads/v12/enums/simulation_modification_method.protogoogle.ads.googleads.v12.enums"�
 SimulationModificationMethodEnum"c
SimulationModificationMethod
UNSPECIFIED 
UNKNOWN
UNIFORM
DEFAULT
SCALINGB�
"com.google.ads.googleads.v12.enumsB!SimulationModificationMethodProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v12/enums;enums�GAA�Google.Ads.GoogleAds.V12.Enums�Google\\Ads\\GoogleAds\\V12\\Enums�"Google::Ads::GoogleAds::V12::Enumsbproto3
�
4google/ads/googleads/v12/enums/simulation_type.protogoogle.ads.googleads.v12.enums"�
SimulationTypeEnum"�
SimulationType
UNSPECIFIED 
UNKNOWN
CPC_BID
CPV_BID

TARGET_CPA
BID_MODIFIER
TARGET_ROAS
PERCENT_CPC_BID
TARGET_IMPRESSION_SHARE

BUDGET	B�
"com.google.ads.googleads.v12.enumsBSimulationTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v12/enums;enums�GAA�Google.Ads.GoogleAds.V12.Enums�Google\\Ads\\GoogleAds\\V12\\Enums�"Google::Ads::GoogleAds::V12::Enumsbproto3
�
<google/ads/googleads/v12/resources/ad_group_simulation.proto"google.ads.googleads.v12.resourcesCgoogle/ads/googleads/v12/enums/simulation_modification_method.proto4google/ads/googleads/v12/enums/simulation_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
AdGroupSimulationI
resource_name (	B2�A�A,
*googleads.googleapis.com/AdGroupSimulation
ad_group_id (B�AH�T
type (2A.google.ads.googleads.v12.enums.SimulationTypeEnum.SimulationTypeB�A
modification_method (2].google.ads.googleads.v12.enums.SimulationModificationMethodEnum.SimulationModificationMethodB�A

start_date (	B�AH�
end_date (	B�AH�]
cpc_bid_point_list (2:.google.ads.googleads.v12.common.CpcBidSimulationPointListB�AH ]
cpv_bid_point_list
 (2:.google.ads.googleads.v12.common.CpvBidSimulationPointListB�AH c
target_cpa_point_list	 (2=.google.ads.googleads.v12.common.TargetCpaSimulationPointListB�AH e
target_roas_point_list (2>.google.ads.googleads.v12.common.TargetRoasSimulationPointListB�AH :��A�
*googleads.googleapis.com/AdGroupSimulationmcustomers/{customer_id}/adGroupSimulations/{ad_group_id}~{type}~{modification_method}~{start_date}~{end_date}B

point_listB
_ad_group_idB
_start_dateB
	_end_dateB�
&com.google.ads.googleads.v12.resourcesBAdGroupSimulationProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v12/resources;resources�GAA�"Google.Ads.GoogleAds.V12.Resources�"Google\\Ads\\GoogleAds\\V12\\Resources�&Google::Ads::GoogleAds::V12::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

