<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/resources/campaign_budget.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Resources;

class CampaignBudget
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
2google/ads/googleads/v16/enums/budget_period.protogoogle.ads.googleads.v16.enums"^
BudgetPeriodEnum"J
BudgetPeriod
UNSPECIFIED 
UNKNOWN	
DAILY
CUSTOM_PERIODB�
"com.google.ads.googleads.v16.enumsBBudgetPeriodProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
2google/ads/googleads/v16/enums/budget_status.protogoogle.ads.googleads.v16.enums"Z
BudgetStatusEnum"F
BudgetStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v16.enumsBBudgetStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
0google/ads/googleads/v16/enums/budget_type.protogoogle.ads.googleads.v16.enums"�
BudgetTypeEnum"o

BudgetType
UNSPECIFIED 
UNKNOWN
STANDARD
	FIXED_CPA
SMART_CAMPAIGN
LOCAL_SERVICESB�
"com.google.ads.googleads.v16.enumsBBudgetTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
;google/ads/googleads/v16/enums/budget_delivery_method.protogoogle.ads.googleads.v16.enums"o
BudgetDeliveryMethodEnum"S
BudgetDeliveryMethod
UNSPECIFIED 
UNKNOWN
STANDARD
ACCELERATEDB�
"com.google.ads.googleads.v16.enumsBBudgetDeliveryMethodProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
8google/ads/googleads/v16/resources/campaign_budget.proto"google.ads.googleads.v16.resources2google/ads/googleads/v16/enums/budget_period.proto2google/ads/googleads/v16/enums/budget_status.proto0google/ads/googleads/v16/enums/budget_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
CampaignBudgetF
resource_name (	B/�A�A)
\'googleads.googleapis.com/CampaignBudget
id (B�AH �
name (	H�
amount_micros (H� 
total_amount_micros (H�R
status (2=.google.ads.googleads.v16.enums.BudgetStatusEnum.BudgetStatusB�Af
delivery_method (2M.google.ads.googleads.v16.enums.BudgetDeliveryMethodEnum.BudgetDeliveryMethod
explicitly_shared (H�!
reference_count (B�AH�(
has_recommended_budget (B�AH�2
 recommended_budget_amount_micros (B�AH�R
period (2=.google.ads.googleads.v16.enums.BudgetPeriodEnum.BudgetPeriodB�AC
1recommended_budget_estimated_change_weekly_clicks (B�AH�H
6recommended_budget_estimated_change_weekly_cost_micros (B�AH	�I
7recommended_budget_estimated_change_weekly_interactions (B�AH
�B
0recommended_budget_estimated_change_weekly_views (B�AH�L
type (29.google.ads.googleads.v16.enums.BudgetTypeEnum.BudgetTypeB�A#
aligned_bidding_strategy_id (:j�Ag
\'googleads.googleapis.com/CampaignBudget<customers/{customer_id}/campaignBudgets/{campaign_budget_id}B
_idB
_nameB
_amount_microsB
_total_amount_microsB
_explicitly_sharedB
_reference_countB
_has_recommended_budgetB#
!_recommended_budget_amount_microsB4
2_recommended_budget_estimated_change_weekly_clicksB9
7_recommended_budget_estimated_change_weekly_cost_microsB:
8_recommended_budget_estimated_change_weekly_interactionsB3
1_recommended_budget_estimated_change_weekly_viewsB�
&com.google.ads.googleads.v16.resourcesBCampaignBudgetProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v16/resources;resources�GAA�"Google.Ads.GoogleAds.V16.Resources�"Google\\Ads\\GoogleAds\\V16\\Resources�&Google::Ads::GoogleAds::V16::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

