<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/resources/carrier_constant.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Resources;

class CarrierConstant
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
9google/ads/googleads/v16/resources/carrier_constant.proto"google.ads.googleads.v16.resourcesgoogle/api/resource.proto"�
CarrierConstantG
resource_name (	B0�A�A*
(googleads.googleapis.com/CarrierConstant
id (B�AH �
name (	B�AH�
country_code (	B�AH�:N�AK
(googleads.googleapis.com/CarrierConstantcarrierConstants/{criterion_id}B
_idB
_nameB
_country_codeB�
&com.google.ads.googleads.v16.resourcesBCarrierConstantProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v16/resources;resources�GAA�"Google.Ads.GoogleAds.V16.Resources�"Google\\Ads\\GoogleAds\\V16\\Resources�&Google::Ads::GoogleAds::V16::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

