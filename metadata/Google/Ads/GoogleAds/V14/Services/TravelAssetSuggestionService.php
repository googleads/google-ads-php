<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v14/services/travel_asset_suggestion_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V14\Services;

class TravelAssetSuggestionService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
5google/ads/googleads/v14/enums/asset_field_type.protogoogle.ads.googleads.v14.enums"�
AssetFieldTypeEnum"�
AssetFieldType
UNSPECIFIED 
UNKNOWN
HEADLINE
DESCRIPTION
MANDATORY_AD_TEXT
MARKETING_IMAGE
MEDIA_BUNDLE
YOUTUBE_VIDEO
BOOK_ON_GOOGLE
	LEAD_FORM	
	PROMOTION

CALLOUT
STRUCTURED_SNIPPET
SITELINK

MOBILE_APP
HOTEL_CALLOUT
CALL	
PRICE
LONG_HEADLINE
BUSINESS_NAME
SQUARE_MARKETING_IMAGE
PORTRAIT_MARKETING_IMAGE
LOGO
LANDSCAPE_LOGO	
VIDEO
CALL_TO_ACTION_SELECTION
AD_IMAGE
BUSINESS_LOGO
HOTEL_PROPERTYB�
"com.google.ads.googleads.v14.enumsBAssetFieldTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
8google/ads/googleads/v14/enums/call_to_action_type.protogoogle.ads.googleads.v14.enums"�
CallToActionTypeEnum"�
CallToActionType
UNSPECIFIED 
UNKNOWN

LEARN_MORE
	GET_QUOTE
	APPLY_NOW
SIGN_UP

CONTACT_US
	SUBSCRIBE
DOWNLOAD
BOOK_NOW	
SHOP_NOW

BUY_NOW

DONATE_NOW
	ORDER_NOW
PLAY_NOW
SEE_MORE
	START_NOW

VISIT_SITE
	WATCH_NOWB�
"com.google.ads.googleads.v14.enumsBCallToActionTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
Bgoogle/ads/googleads/v14/enums/hotel_asset_suggestion_status.protogoogle.ads.googleads.v14.enums"�
HotelAssetSuggestionStatusEnum"r
HotelAssetSuggestionStatus
UNSPECIFIED 
UNKNOWN
SUCCESS
HOTEL_NOT_FOUND
INVALID_PLACE_IDB�
"com.google.ads.googleads.v14.enumsBHotelAssetSuggestionStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
Ggoogle/ads/googleads/v14/services/travel_asset_suggestion_service.proto!google.ads.googleads.v14.services8google/ads/googleads/v14/enums/call_to_action_type.protoBgoogle/ads/googleads/v14/enums/hotel_asset_suggestion_status.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.proto"g
SuggestTravelAssetsRequest
customer_id (	B�A
language_option (	B�A
	place_ids (	"w
SuggestTravelAssetsResponseX
hotel_asset_suggestions (27.google.ads.googleads.v14.services.HotelAssetSuggestion"�
HotelAssetSuggestion
place_id (	
	final_url (	

hotel_name (	]
call_to_action (2E.google.ads.googleads.v14.enums.CallToActionTypeEnum.CallToActionTypeF
text_assets (21.google.ads.googleads.v14.services.HotelTextAssetH
image_assets (22.google.ads.googleads.v14.services.HotelImageAsseti
status (2Y.google.ads.googleads.v14.enums.HotelAssetSuggestionStatusEnum.HotelAssetSuggestionStatus"{
HotelTextAsset
text (	[
asset_field_type (2A.google.ads.googleads.v14.enums.AssetFieldTypeEnum.AssetFieldType"{
HotelImageAsset
uri (	[
asset_field_type (2A.google.ads.googleads.v14.enums.AssetFieldTypeEnum.AssetFieldType2�
TravelAssetSuggestionService�
SuggestTravelAssets=.google.ads.googleads.v14.services.SuggestTravelAssetsRequest>.google.ads.googleads.v14.services.SuggestTravelAssetsResponse"[���7"2/v14/customers/{customer_id=*}:suggestTravelAssets:*�Acustomer_id,language_optionE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v14.servicesB!TravelAssetSuggestionServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v14/services;services�GAA�!Google.Ads.GoogleAds.V14.Services�!Google\\Ads\\GoogleAds\\V14\\Services�%Google::Ads::GoogleAds::V14::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

