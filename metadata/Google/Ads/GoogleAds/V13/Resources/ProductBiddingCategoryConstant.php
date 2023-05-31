<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/resources/product_bidding_category_constant.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V13\Resources;

class ProductBiddingCategoryConstant
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
Dgoogle/ads/googleads/v13/enums/product_bidding_category_status.protogoogle.ads.googleads.v13.enums"z
 ProductBiddingCategoryStatusEnum"V
ProductBiddingCategoryStatus
UNSPECIFIED 
UNKNOWN

ACTIVE
OBSOLETEB�
"com.google.ads.googleads.v13.enumsB!ProductBiddingCategoryStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
Cgoogle/ads/googleads/v13/enums/product_bidding_category_level.protogoogle.ads.googleads.v13.enums"�
ProductBiddingCategoryLevelEnum"w
ProductBiddingCategoryLevel
UNSPECIFIED 
UNKNOWN

LEVEL1

LEVEL2

LEVEL3

LEVEL4

LEVEL5B�
"com.google.ads.googleads.v13.enumsB ProductBiddingCategoryLevelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�

Jgoogle/ads/googleads/v13/resources/product_bidding_category_constant.proto"google.ads.googleads.v13.resourcesDgoogle/ads/googleads/v13/enums/product_bidding_category_status.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
ProductBiddingCategoryConstantV
resource_name (	B?�A�A9
7googleads.googleapis.com/ProductBiddingCategoryConstant
id
 (B�AH �
country_code (	B�AH�v
(product_bidding_category_constant_parent (	B?�A�A9
7googleads.googleapis.com/ProductBiddingCategoryConstantH�o
level (2[.google.ads.googleads.v13.enums.ProductBiddingCategoryLevelEnum.ProductBiddingCategoryLevelB�Ar
status (2].google.ads.googleads.v13.enums.ProductBiddingCategoryStatusEnum.ProductBiddingCategoryStatusB�A
language_code (	B�AH� 
localized_name (	B�AH�:y�Av
7googleads.googleapis.com/ProductBiddingCategoryConstant;productBiddingCategoryConstants/{country_code}~{level}~{id}B
_idB
_country_codeB+
)_product_bidding_category_constant_parentB
_language_codeB
_localized_nameB�
&com.google.ads.googleads.v13.resourcesB#ProductBiddingCategoryConstantProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v13/resources;resources�GAA�"Google.Ads.GoogleAds.V13.Resources�"Google\\Ads\\GoogleAds\\V13\\Resources�&Google::Ads::GoogleAds::V13::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

