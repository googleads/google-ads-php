<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v14/services/product_link_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V14\Services;

class ProductLinkService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
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
&com.google.ads.googleads.v14.resourcesBProductLinkProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v14/resources;resources�GAA�"Google.Ads.GoogleAds.V14.Resources�"Google\\Ads\\GoogleAds\\V14\\Resources�&Google::Ads::GoogleAds::V14::Resourcesbproto3
�
<google/ads/googleads/v14/services/product_link_service.proto!google.ads.googleads.v14.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
CreateProductLinkRequest
customer_id (	B�AJ
product_link (2/.google.ads.googleads.v14.resources.ProductLinkB�A"]
CreateProductLinkResponse@
resource_name (	B)�A&
$googleads.googleapis.com/ProductLink"�
RemoveProductLinkRequest
customer_id (	B�AC
resource_name (	B,�A�A&
$googleads.googleapis.com/ProductLink
validate_only ("]
RemoveProductLinkResponse@
resource_name (	B)�A&
$googleads.googleapis.com/ProductLink2�
ProductLinkService�
CreateProductLink;.google.ads.googleads.v14.services.CreateProductLinkRequest<.google.ads.googleads.v14.services.CreateProductLinkResponse"X���7"2/v14/customers/{customer_id=*}/productLinks:create:*�Acustomer_id,product_link�
RemoveProductLink;.google.ads.googleads.v14.services.RemoveProductLinkRequest<.google.ads.googleads.v14.services.RemoveProductLinkResponse"Y���7"2/v14/customers/{customer_id=*}/productLinks:remove:*�Acustomer_id,resource_nameE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v14.servicesBProductLinkServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v14/services;services�GAA�!Google.Ads.GoogleAds.V14.Services�!Google\\Ads\\GoogleAds\\V14\\Services�%Google::Ads::GoogleAds::V14::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

