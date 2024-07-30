<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/services/ad_group_criterion_label_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Services;

class AdGroupCriterionLabelService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
Agoogle/ads/googleads/v17/resources/ad_group_criterion_label.proto"google.ads.googleads.v17.resourcesgoogle/api/resource.proto"�
AdGroupCriterionLabelM
resource_name (	B6�A�A0
.googleads.googleapis.com/AdGroupCriterionLabelR
ad_group_criterion (	B1�A�A+
)googleads.googleapis.com/AdGroupCriterionH �:
label (	B&�A�A 
googleads.googleapis.com/LabelH�:��A�
.googleads.googleapis.com/AdGroupCriterionLabelVcustomers/{customer_id}/adGroupCriterionLabels/{ad_group_id}~{criterion_id}~{label_id}B
_ad_group_criterionB
_labelB�
&com.google.ads.googleads.v17.resourcesBAdGroupCriterionLabelProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v17/resources;resources�GAA�"Google.Ads.GoogleAds.V17.Resources�"Google\\Ads\\GoogleAds\\V17\\Resources�&Google::Ads::GoogleAds::V17::Resourcesbproto3
�
Hgoogle/ads/googleads/v17/services/ad_group_criterion_label_service.proto!google.ads.googleads.v17.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/rpc/status.proto"�
#MutateAdGroupCriterionLabelsRequest
customer_id (	B�AZ

operations (2A.google.ads.googleads.v17.services.AdGroupCriterionLabelOperationB�A
partial_failure (
validate_only ("�
AdGroupCriterionLabelOperationK
create (29.google.ads.googleads.v17.resources.AdGroupCriterionLabelH E
remove (	B3�A0
.googleads.googleapis.com/AdGroupCriterionLabelH B
	operation"�
$MutateAdGroupCriterionLabelsResponse1
partial_failure_error (2.google.rpc.StatusU
results (2D.google.ads.googleads.v17.services.MutateAdGroupCriterionLabelResult"o
!MutateAdGroupCriterionLabelResultJ
resource_name (	B3�A0
.googleads.googleapis.com/AdGroupCriterionLabel2�
AdGroupCriterionLabelService�
MutateAdGroupCriterionLabelsF.google.ads.googleads.v17.services.MutateAdGroupCriterionLabelsRequestG.google.ads.googleads.v17.services.MutateAdGroupCriterionLabelsResponse"`�Acustomer_id,operations���A"</v17/customers/{customer_id=*}/adGroupCriterionLabels:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v17.servicesB!AdGroupCriterionLabelServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v17/services;services�GAA�!Google.Ads.GoogleAds.V17.Services�!Google\\Ads\\GoogleAds\\V17\\Services�%Google::Ads::GoogleAds::V17::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

