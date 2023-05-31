<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/services/label_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V13\Services;

class LabelService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
0google/ads/googleads/v13/common/text_label.protogoogle.ads.googleads.v13.common"i
	TextLabel
background_color (	H �
description (	H�B
_background_colorB
_descriptionB�
#com.google.ads.googleads.v13.commonBTextLabelProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v13/common;common�GAA�Google.Ads.GoogleAds.V13.Common�Google\\Ads\\GoogleAds\\V13\\Common�#Google::Ads::GoogleAds::V13::Commonbproto3
�
1google/ads/googleads/v13/enums/label_status.protogoogle.ads.googleads.v13.enums"X
LabelStatusEnum"E
LabelStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v13.enumsBLabelStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
:google/ads/googleads/v13/enums/response_content_type.protogoogle.ads.googleads.v13.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v13.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v13/enums;enums�GAA�Google.Ads.GoogleAds.V13.Enums�Google\\Ads\\GoogleAds\\V13\\Enums�"Google::Ads::GoogleAds::V13::Enumsbproto3
�
.google/ads/googleads/v13/resources/label.proto"google.ads.googleads.v13.resources1google/ads/googleads/v13/enums/label_status.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
Label=
resource_name (	B&�A�A 
googleads.googleapis.com/Label
id (B�AH �
name (	H�P
status (2;.google.ads.googleads.v13.enums.LabelStatusEnum.LabelStatusB�A>

text_label (2*.google.ads.googleads.v13.common.TextLabel:N�AK
googleads.googleapis.com/Label)customers/{customer_id}/labels/{label_id}B
_idB
_nameB�
&com.google.ads.googleads.v13.resourcesB
LabelProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v13/resources;resources�GAA�"Google.Ads.GoogleAds.V13.Resources�"Google\\Ads\\GoogleAds\\V13\\Resources�&Google::Ads::GoogleAds::V13::Resourcesbproto3
�
5google/ads/googleads/v13/services/label_service.proto!google.ads.googleads.v13.services.google/ads/googleads/v13/resources/label.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
MutateLabelsRequest
customer_id (	B�AJ

operations (21.google.ads.googleads.v13.services.LabelOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v13.enums.ResponseContentTypeEnum.ResponseContentType"�
LabelOperation/
update_mask (2.google.protobuf.FieldMask;
create (2).google.ads.googleads.v13.resources.LabelH ;
update (2).google.ads.googleads.v13.resources.LabelH 5
remove (	B#�A 
googleads.googleapis.com/LabelH B
	operation"�
MutateLabelsResponse1
partial_failure_error (2.google.rpc.StatusE
results (24.google.ads.googleads.v13.services.MutateLabelResult"�
MutateLabelResult:
resource_name (	B#�A 
googleads.googleapis.com/Label8
label (2).google.ads.googleads.v13.resources.Label2�
LabelService�
MutateLabels6.google.ads.googleads.v13.services.MutateLabelsRequest7.google.ads.googleads.v13.services.MutateLabelsResponse"P���1",/v13/customers/{customer_id=*}/labels:mutate:*�Acustomer_id,operationsE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v13.servicesBLabelServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v13/services;services�GAA�!Google.Ads.GoogleAds.V13.Services�!Google\\Ads\\GoogleAds\\V13\\Services�%Google::Ads::GoogleAds::V13::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

