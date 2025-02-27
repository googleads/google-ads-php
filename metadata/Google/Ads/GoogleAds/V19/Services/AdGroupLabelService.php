<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/ad_group_label_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class AdGroupLabelService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
7google/ads/googleads/v19/resources/ad_group_label.proto"google.ads.googleads.v19.resourcesgoogle/api/resource.proto"�
AdGroupLabelD
resource_name (	B-�A�A\'
%googleads.googleapis.com/AdGroupLabel?
ad_group (	B(�A�A"
 googleads.googleapis.com/AdGroupH �:
label (	B&�A�A 
googleads.googleapis.com/LabelH�:j�Ag
%googleads.googleapis.com/AdGroupLabel>customers/{customer_id}/adGroupLabels/{ad_group_id}~{label_id}B
	_ad_groupB
_labelB�
&com.google.ads.googleads.v19.resourcesBAdGroupLabelProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
>google/ads/googleads/v19/services/ad_group_label_service.proto!google.ads.googleads.v19.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/rpc/status.proto"�
MutateAdGroupLabelsRequest
customer_id (	B�AQ

operations (28.google.ads.googleads.v19.services.AdGroupLabelOperationB�A
partial_failure (
validate_only ("�
AdGroupLabelOperationB
create (20.google.ads.googleads.v19.resources.AdGroupLabelH <
remove (	B*�A\'
%googleads.googleapis.com/AdGroupLabelH B
	operation"�
MutateAdGroupLabelsResponse1
partial_failure_error (2.google.rpc.StatusL
results (2;.google.ads.googleads.v19.services.MutateAdGroupLabelResult"]
MutateAdGroupLabelResultA
resource_name (	B*�A\'
%googleads.googleapis.com/AdGroupLabel2�
AdGroupLabelService�
MutateAdGroupLabels=.google.ads.googleads.v19.services.MutateAdGroupLabelsRequest>.google.ads.googleads.v19.services.MutateAdGroupLabelsResponse"W�Acustomer_id,operations���8"3/v19/customers/{customer_id=*}/adGroupLabels:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesBAdGroupLabelServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

