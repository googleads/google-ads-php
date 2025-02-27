<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/customer_label_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class CustomerLabelService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
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
7google/ads/googleads/v19/resources/customer_label.proto"google.ads.googleads.v19.resourcesgoogle/api/resource.proto"�
CustomerLabelE
resource_name (	B.�A�A(
&googleads.googleapis.com/CustomerLabel@
customer (	B)�A�A#
!googleads.googleapis.com/CustomerH �:
label (	B&�A�A 
googleads.googleapis.com/LabelH�:^�A[
&googleads.googleapis.com/CustomerLabel1customers/{customer_id}/customerLabels/{label_id}B
	_customerB
_labelB�
&com.google.ads.googleads.v19.resourcesBCustomerLabelProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
>google/ads/googleads/v19/services/customer_label_service.proto!google.ads.googleads.v19.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/rpc/status.proto"�
MutateCustomerLabelsRequest
customer_id (	B�AR

operations (29.google.ads.googleads.v19.services.CustomerLabelOperationB�A
partial_failure (
validate_only ("�
CustomerLabelOperationC
create (21.google.ads.googleads.v19.resources.CustomerLabelH =
remove (	B+�A(
&googleads.googleapis.com/CustomerLabelH B
	operation"�
MutateCustomerLabelsResponse1
partial_failure_error (2.google.rpc.StatusM
results (2<.google.ads.googleads.v19.services.MutateCustomerLabelResult"_
MutateCustomerLabelResultB
resource_name (	B+�A(
&googleads.googleapis.com/CustomerLabel2�
CustomerLabelService�
MutateCustomerLabels>.google.ads.googleads.v19.services.MutateCustomerLabelsRequest?.google.ads.googleads.v19.services.MutateCustomerLabelsResponse"X�Acustomer_id,operations���9"4/v19/customers/{customer_id=*}/customerLabels:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesBCustomerLabelServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

