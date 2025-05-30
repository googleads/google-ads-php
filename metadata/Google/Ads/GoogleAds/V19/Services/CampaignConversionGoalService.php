<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/campaign_conversion_goal_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class CampaignConversionGoalService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
6google/ads/googleads/v19/enums/conversion_origin.protogoogle.ads.googleads.v19.enums"�
ConversionOriginEnum"�
ConversionOrigin
UNSPECIFIED 
UNKNOWN
WEBSITE
GOOGLE_HOSTED
APP
CALL_FROM_ADS	
STORE
YOUTUBE_HOSTEDB�
"com.google.ads.googleads.v19.enumsBConversionOriginProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
?google/ads/googleads/v19/enums/conversion_action_category.protogoogle.ads.googleads.v19.enums"�
ConversionActionCategoryEnum"�
ConversionActionCategory
UNSPECIFIED 
UNKNOWN
DEFAULT
	PAGE_VIEW
PURCHASE

SIGNUP
DOWNLOAD
ADD_TO_CART
BEGIN_CHECKOUT	
SUBSCRIBE_PAID

PHONE_CALL_LEAD
IMPORTED_LEAD
SUBMIT_LEAD_FORM
BOOK_APPOINTMENT
REQUEST_QUOTE
GET_DIRECTIONS
OUTBOUND_CLICK
CONTACT

ENGAGEMENT
STORE_VISIT

STORE_SALE
QUALIFIED_LEAD
CONVERTED_LEADB�
"com.google.ads.googleads.v19.enumsBConversionActionCategoryProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
Agoogle/ads/googleads/v19/resources/campaign_conversion_goal.proto"google.ads.googleads.v19.resources6google/ads/googleads/v19/enums/conversion_origin.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
CampaignConversionGoalN
resource_name (	B7�A�A1
/googleads.googleapis.com/CampaignConversionGoal;
campaign (	B)�A�A#
!googleads.googleapis.com/Campaigng
category (2U.google.ads.googleads.v19.enums.ConversionActionCategoryEnum.ConversionActionCategoryU
origin (2E.google.ads.googleads.v19.enums.ConversionOriginEnum.ConversionOrigin
biddable (:��A�
/googleads.googleapis.com/CampaignConversionGoalQcustomers/{customer_id}/campaignConversionGoals/{campaign_id}~{category}~{source}B�
&com.google.ads.googleads.v19.resourcesBCampaignConversionGoalProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
Hgoogle/ads/googleads/v19/services/campaign_conversion_goal_service.proto!google.ads.googleads.v19.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.proto"�
$MutateCampaignConversionGoalsRequest
customer_id (	B�A[

operations (2B.google.ads.googleads.v19.services.CampaignConversionGoalOperationB�A
validate_only ("�
CampaignConversionGoalOperation/
update_mask (2.google.protobuf.FieldMaskL
update (2:.google.ads.googleads.v19.resources.CampaignConversionGoalH B
	operation"
%MutateCampaignConversionGoalsResponseV
results (2E.google.ads.googleads.v19.services.MutateCampaignConversionGoalResult"q
"MutateCampaignConversionGoalResultK
resource_name (	B4�A1
/googleads.googleapis.com/CampaignConversionGoal2�
CampaignConversionGoalService�
MutateCampaignConversionGoalsG.google.ads.googleads.v19.services.MutateCampaignConversionGoalsRequestH.google.ads.googleads.v19.services.MutateCampaignConversionGoalsResponse"a�Acustomer_id,operations���B"=/v19/customers/{customer_id=*}/campaignConversionGoals:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesB"CampaignConversionGoalServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

