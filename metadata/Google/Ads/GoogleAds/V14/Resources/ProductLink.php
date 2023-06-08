<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v14/resources/product_link.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V14\Resources;

class ProductLink
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
8google/ads/googleads/v14/enums/linked_product_type.protogoogle.ads.googleads.v14.enums"l
LinkedProductTypeEnum"S
LinkedProductType
UNSPECIFIED 
UNKNOWN
DATA_PARTNER

GOOGLE_ADSB�
"com.google.ads.googleads.v14.enumsBLinkedProductTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
5google/ads/googleads/v14/resources/product_link.proto"google.ads.googleads.v14.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
ProductLinkC
resource_name (	B,�A�A&
$googleads.googleapis.com/ProductLink!
product_link_id (B�AH�Z
type (2G.google.ads.googleads.v14.enums.LinkedProductTypeEnum.LinkedProductTypeB�AV
data_partner (29.google.ads.googleads.v14.resources.DataPartnerIdentifierB�AH R

google_ads (27.google.ads.googleads.v14.resources.GoogleAdsIdentifierB�AH :a�A^
$googleads.googleapis.com/ProductLink6customers/{customer_id}/productLinks/{product_link_id}B
linked_productB
_product_link_id"N
DataPartnerIdentifier!
data_partner_id (B�AH �B
_data_partner_id"d
GoogleAdsIdentifier@
customer (	B)�A�A#
!googleads.googleapis.com/CustomerH �B
	_customerB�
&com.google.ads.googleads.v14.resourcesBProductLinkProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v14/resources;resources�GAA�"Google.Ads.GoogleAds.V14.Resources�"Google\\Ads\\GoogleAds\\V14\\Resources�&Google::Ads::GoogleAds::V14::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

