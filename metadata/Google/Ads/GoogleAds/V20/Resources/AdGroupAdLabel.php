<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/ad_group_ad_label.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Resources;

class AdGroupAdLabel
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
�
:google/ads/googleads/v20/resources/ad_group_ad_label.proto"google.ads.googleads.v20.resourcesgoogle/api/resource.proto"�
AdGroupAdLabelF
resource_name (	B/�A�A)
\'googleads.googleapis.com/AdGroupAdLabelD
ad_group_ad (	B*�A�A$
"googleads.googleapis.com/AdGroupAdH �:
label (	B&�A�A 
googleads.googleapis.com/LabelH�:v�As
\'googleads.googleapis.com/AdGroupAdLabelHcustomers/{customer_id}/adGroupAdLabels/{ad_group_id}~{ad_id}~{label_id}B
_ad_group_adB
_labelB�
&com.google.ads.googleads.v20.resourcesBAdGroupAdLabelProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v20/resources;resources�GAA�"Google.Ads.GoogleAds.V20.Resources�"Google\\Ads\\GoogleAds\\V20\\Resources�&Google::Ads::GoogleAds::V20::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

