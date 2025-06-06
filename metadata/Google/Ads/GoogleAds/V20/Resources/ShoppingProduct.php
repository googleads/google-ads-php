<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/shopping_product.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Resources;

class ShoppingProduct
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
6google/ads/googleads/v20/enums/product_condition.protogoogle.ads.googleads.v20.enums"l
ProductConditionEnum"T
ProductCondition
UNSPECIFIED 
UNKNOWN
NEW
REFURBISHED
USEDB�
"com.google.ads.googleads.v20.enumsBProductConditionProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
;google/ads/googleads/v20/enums/product_issue_severity.protogoogle.ads.googleads.v20.enums"h
ProductIssueSeverityEnum"L
ProductIssueSeverity
UNSPECIFIED 
UNKNOWN
WARNING	
ERRORB�
"com.google.ads.googleads.v20.enumsBProductIssueSeverityProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
9google/ads/googleads/v20/enums/product_availability.protogoogle.ads.googleads.v20.enums"|
ProductAvailabilityEnum"a
ProductAvailability
UNSPECIFIED 
UNKNOWN
IN_STOCK
OUT_OF_STOCK
PREORDERB�
"com.google.ads.googleads.v20.enumsBProductAvailabilityProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
4google/ads/googleads/v20/enums/product_channel.protogoogle.ads.googleads.v20.enums"[
ProductChannelEnum"E
ProductChannel
UNSPECIFIED 
UNKNOWN

ONLINE	
LOCALB�
"com.google.ads.googleads.v20.enumsBProductChannelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
3google/ads/googleads/v20/enums/product_status.protogoogle.ads.googleads.v20.enums"x
ProductStatusEnum"c
ProductStatus
UNSPECIFIED 
UNKNOWN
NOT_ELIGIBLE
ELIGIBLE_LIMITED
ELIGIBLEB�
"com.google.ads.googleads.v20.enumsBProductStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
@google/ads/googleads/v20/enums/product_channel_exclusivity.protogoogle.ads.googleads.v20.enums"�
ProductChannelExclusivityEnum"`
ProductChannelExclusivity
UNSPECIFIED 
UNKNOWN
SINGLE_CHANNEL
MULTI_CHANNELB�
"com.google.ads.googleads.v20.enumsBProductChannelExclusivityProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
9google/ads/googleads/v20/resources/shopping_product.proto"google.ads.googleads.v20.resources4google/ads/googleads/v20/enums/product_channel.proto@google/ads/googleads/v20/enums/product_channel_exclusivity.proto6google/ads/googleads/v20/enums/product_condition.proto;google/ads/googleads/v20/enums/product_issue_severity.proto3google/ads/googleads/v20/enums/product_status.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
ShoppingProductG
resource_name (	B0�A�A*
(googleads.googleapis.com/ShoppingProduct
merchant_center_id (B�AW
channel (2A.google.ads.googleads.v20.enums.ProductChannelEnum.ProductChannelB�A
language_code (	B�A

feed_label (	B�A
item_id (	B�A)
multi_client_account_id (B�AH �
title (	B�AH�
brand	 (	B�AH�
price_micros
 (B�AH�
currency_code (	B�AH�~
channel_exclusivity (2W.google.ads.googleads.v20.enums.ProductChannelExclusivityEnum.ProductChannelExclusivityB�AH�b
	condition (2E.google.ads.googleads.v20.enums.ProductConditionEnum.ProductConditionB�AH�k
availability (2K.google.ads.googleads.v20.enums.ProductAvailabilityEnum.ProductAvailabilityB�AH�
target_countries (	B�A#
custom_attribute0 (	B�AH�#
custom_attribute1 (	B�AH	�#
custom_attribute2 (	B�AH
�#
custom_attribute3 (	B�AH�#
custom_attribute4 (	B�AH�V
category_level1 (	B8�A�A2
0googleads.googleapis.com/ProductCategoryConstantH�V
category_level2 (	B8�A�A2
0googleads.googleapis.com/ProductCategoryConstantH�V
category_level3 (	B8�A�A2
0googleads.googleapis.com/ProductCategoryConstantH�V
category_level4 (	B8�A�A2
0googleads.googleapis.com/ProductCategoryConstantH�V
category_level5 (	B8�A�A2
0googleads.googleapis.com/ProductCategoryConstantH�%
product_type_level1 (	B�AH�%
product_type_level2 (	B�AH�%
product_type_level3 (	B�AH�%
product_type_level4 (	B�AH�%
product_type_level5 (	B�AH�*
effective_max_cpc_micros (B�AH�T
status  (2?.google.ads.googleads.v20.enums.ProductStatusEnum.ProductStatusB�AU
issues! (2@.google.ads.googleads.v20.resources.ShoppingProduct.ProductIssueB�A@
campaign" (	B)�A�A#
!googleads.googleapis.com/CampaignH�?
ad_group# (	B(�A�A"
 googleads.googleapis.com/AdGroupH��
ProductIssue

error_code (	B�Ah
ads_severity (2M.google.ads.googleads.v20.enums.ProductIssueSeverityEnum.ProductIssueSeverityB�A 
attribute_name (	B�AH �
description (	B�A
detail (	B�A
documentation (	B�A
affected_regions (	B�AB
_attribute_name:��A�
(googleads.googleapis.com/ShoppingProductncustomers/{customer_id}/shoppingProducts/{merchant_center_id}~{channel}~{language_code}~{feed_label}~{item_id}*shoppingProducts2shoppingProductB
_multi_client_account_idB
_titleB
_brandB
_price_microsB
_currency_codeB
_channel_exclusivityB

_conditionB
_availabilityB
_custom_attribute0B
_custom_attribute1B
_custom_attribute2B
_custom_attribute3B
_custom_attribute4B
_category_level1B
_category_level2B
_category_level3B
_category_level4B
_category_level5B
_product_type_level1B
_product_type_level2B
_product_type_level3B
_product_type_level4B
_product_type_level5B
_effective_max_cpc_microsB
	_campaignB
	_ad_groupB�
&com.google.ads.googleads.v20.resourcesBShoppingProductProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v20/resources;resources�GAA�"Google.Ads.GoogleAds.V20.Resources�"Google\\Ads\\GoogleAds\\V20\\Resources�&Google::Ads::GoogleAds::V20::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

