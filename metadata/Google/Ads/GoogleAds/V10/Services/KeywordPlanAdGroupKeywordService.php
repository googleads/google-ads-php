<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/services/keyword_plan_ad_group_keyword_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Services;

class KeywordPlanAdGroupKeywordService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
7google/ads/googleads/v10/enums/keyword_match_type.protogoogle.ads.googleads.v10.enums"j
KeywordMatchTypeEnum"R
KeywordMatchType
UNSPECIFIED 
UNKNOWN	
EXACT

PHRASE	
BROADB�
"com.google.ads.googleads.v10.enumsBKeywordMatchTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3
�
Fgoogle/ads/googleads/v10/resources/keyword_plan_ad_group_keyword.proto"google.ads.googleads.v10.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
KeywordPlanAdGroupKeywordQ
resource_name (	B:�A�A4
2googleads.googleapis.com/KeywordPlanAdGroupKeywordT
keyword_plan_ad_group (	B0�A-
+googleads.googleapis.com/KeywordPlanAdGroupH �
id	 (B�AH�
text
 (	H�Y

match_type (2E.google.ads.googleads.v10.enums.KeywordMatchTypeEnum.KeywordMatchType
cpc_bid_micros (H�
negative (B�AH�:��A�
2googleads.googleapis.com/KeywordPlanAdGroupKeywordUcustomers/{customer_id}/keywordPlanAdGroupKeywords/{keyword_plan_ad_group_keyword_id}B
_keyword_plan_ad_groupB
_idB
_textB
_cpc_bid_microsB
	_negativeB�
&com.google.ads.googleads.v10.resourcesBKeywordPlanAdGroupKeywordProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v10/resources;resources�GAA�"Google.Ads.GoogleAds.V10.Resources�"Google\\Ads\\GoogleAds\\V10\\Resources�&Google::Ads::GoogleAds::V10::Resourcesbproto3
�
Mgoogle/ads/googleads/v10/services/keyword_plan_ad_group_keyword_service.proto!google.ads.googleads.v10.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
\'MutateKeywordPlanAdGroupKeywordsRequest
customer_id (	B�A^

operations (2E.google.ads.googleads.v10.services.KeywordPlanAdGroupKeywordOperationB�A
partial_failure (
validate_only ("�
"KeywordPlanAdGroupKeywordOperation/
update_mask (2.google.protobuf.FieldMaskO
create (2=.google.ads.googleads.v10.resources.KeywordPlanAdGroupKeywordH O
update (2=.google.ads.googleads.v10.resources.KeywordPlanAdGroupKeywordH I
remove (	B7�A4
2googleads.googleapis.com/KeywordPlanAdGroupKeywordH B
	operation"�
(MutateKeywordPlanAdGroupKeywordsResponse1
partial_failure_error (2.google.rpc.StatusY
results (2H.google.ads.googleads.v10.services.MutateKeywordPlanAdGroupKeywordResult"w
%MutateKeywordPlanAdGroupKeywordResultN
resource_name (	B7�A4
2googleads.googleapis.com/KeywordPlanAdGroupKeyword2�
 KeywordPlanAdGroupKeywordService�
 MutateKeywordPlanAdGroupKeywordsJ.google.ads.googleads.v10.services.MutateKeywordPlanAdGroupKeywordsRequestK.google.ads.googleads.v10.services.MutateKeywordPlanAdGroupKeywordsResponse"d���E"@/v10/customers/{customer_id=*}/keywordPlanAdGroupKeywords:mutate:*�Acustomer_id,operationsE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v10.servicesB%KeywordPlanAdGroupKeywordServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v10/services;services�GAA�!Google.Ads.GoogleAds.V10.Services�!Google\\Ads\\GoogleAds\\V10\\Services�%Google::Ads::GoogleAds::V10::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

