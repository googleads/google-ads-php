<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/services/ad_group_feed_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Services;

class AdGroupFeedService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
Cgoogle/ads/googleads/v17/enums/matching_function_context_type.protogoogle.ads.googleads.v17.enums"�
MatchingFunctionContextTypeEnum"t
MatchingFunctionContextType
UNSPECIFIED 
UNKNOWN
FEED_ITEM_ID
DEVICE_NAME
FEED_ITEM_SET_IDB�
"com.google.ads.googleads.v17.enumsB MatchingFunctionContextTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
:google/ads/googleads/v17/enums/response_content_type.protogoogle.ads.googleads.v17.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v17.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
?google/ads/googleads/v17/enums/matching_function_operator.protogoogle.ads.googleads.v17.enums"�
MatchingFunctionOperatorEnum"u
MatchingFunctionOperator
UNSPECIFIED 
UNKNOWN
IN
IDENTITY

EQUALS
AND
CONTAINS_ANYB�
"com.google.ads.googleads.v17.enumsBMatchingFunctionOperatorProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
7google/ads/googleads/v17/common/matching_function.protogoogle.ads.googleads.v17.common?google/ads/googleads/v17/enums/matching_function_operator.proto"�
MatchingFunction
function_string (	H �g
operator (2U.google.ads.googleads.v17.enums.MatchingFunctionOperatorEnum.MatchingFunctionOperator?
left_operands (2(.google.ads.googleads.v17.common.Operand@
right_operands (2(.google.ads.googleads.v17.common.OperandB
_function_string"�
OperandT
constant_operand (28.google.ads.googleads.v17.common.Operand.ConstantOperandH _
feed_attribute_operand (2=.google.ads.googleads.v17.common.Operand.FeedAttributeOperandH T
function_operand (28.google.ads.googleads.v17.common.Operand.FunctionOperandH a
request_context_operand (2>.google.ads.googleads.v17.common.Operand.RequestContextOperandH �
ConstantOperand
string_value (	H 

long_value (H 
boolean_value (H 
double_value (H B
constant_operand_valuen
FeedAttributeOperand
feed_id (H �
feed_attribute_id (H�B

_feed_idB
_feed_attribute_id_
FunctionOperandL
matching_function (21.google.ads.googleads.v17.common.MatchingFunction�
RequestContextOperandq
context_type (2[.google.ads.googleads.v17.enums.MatchingFunctionContextTypeEnum.MatchingFunctionContextTypeB
function_argument_operandB�
#com.google.ads.googleads.v17.commonBMatchingFunctionProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v17/common;common�GAA�Google.Ads.GoogleAds.V17.Common�Google\\Ads\\GoogleAds\\V17\\Common�#Google::Ads::GoogleAds::V17::Commonbproto3
�
5google/ads/googleads/v17/enums/feed_link_status.protogoogle.ads.googleads.v17.enums"^
FeedLinkStatusEnum"H
FeedLinkStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v17.enumsBFeedLinkStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
5google/ads/googleads/v17/enums/placeholder_type.protogoogle.ads.googleads.v17.enums"�
PlaceholderTypeEnum"�
PlaceholderType
UNSPECIFIED 
UNKNOWN
SITELINK
CALL
APP
LOCATION
AFFILIATE_LOCATION
CALLOUT
STRUCTURED_SNIPPET
MESSAGE		
PRICE

	PROMOTION
AD_CUSTOMIZER
DYNAMIC_EDUCATION
DYNAMIC_FLIGHT
DYNAMIC_CUSTOM
DYNAMIC_HOTEL
DYNAMIC_REAL_ESTATE
DYNAMIC_TRAVEL
DYNAMIC_LOCAL
DYNAMIC_JOB	
IMAGEB�
"com.google.ads.googleads.v17.enumsBPlaceholderTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3
�
6google/ads/googleads/v17/resources/ad_group_feed.proto"google.ads.googleads.v17.resources5google/ads/googleads/v17/enums/feed_link_status.proto5google/ads/googleads/v17/enums/placeholder_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
AdGroupFeedC
resource_name (	B,�A�A&
$googleads.googleapis.com/AdGroupFeed8
feed (	B%�A�A
googleads.googleapis.com/FeedH �?
ad_group (	B(�A�A"
 googleads.googleapis.com/AdGroupH�^
placeholder_types (2C.google.ads.googleads.v17.enums.PlaceholderTypeEnum.PlaceholderTypeL
matching_function (21.google.ads.googleads.v17.common.MatchingFunctionV
status (2A.google.ads.googleads.v17.enums.FeedLinkStatusEnum.FeedLinkStatusB�A:g�Ad
$googleads.googleapis.com/AdGroupFeed<customers/{customer_id}/adGroupFeeds/{ad_group_id}~{feed_id}B
_feedB
	_ad_groupB�
&com.google.ads.googleads.v17.resourcesBAdGroupFeedProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v17/resources;resources�GAA�"Google.Ads.GoogleAds.V17.Resources�"Google\\Ads\\GoogleAds\\V17\\Resources�&Google::Ads::GoogleAds::V17::Resourcesbproto3
�
=google/ads/googleads/v17/services/ad_group_feed_service.proto!google.ads.googleads.v17.services6google/ads/googleads/v17/resources/ad_group_feed.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
MutateAdGroupFeedsRequest
customer_id (	B�AP

operations (27.google.ads.googleads.v17.services.AdGroupFeedOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v17.enums.ResponseContentTypeEnum.ResponseContentType"�
AdGroupFeedOperation/
update_mask (2.google.protobuf.FieldMaskA
create (2/.google.ads.googleads.v17.resources.AdGroupFeedH A
update (2/.google.ads.googleads.v17.resources.AdGroupFeedH ;
remove (	B)�A&
$googleads.googleapis.com/AdGroupFeedH B
	operation"�
MutateAdGroupFeedsResponse1
partial_failure_error (2.google.rpc.StatusK
results (2:.google.ads.googleads.v17.services.MutateAdGroupFeedResult"�
MutateAdGroupFeedResult@
resource_name (	B)�A&
$googleads.googleapis.com/AdGroupFeedF
ad_group_feed (2/.google.ads.googleads.v17.resources.AdGroupFeed2�
AdGroupFeedService�
MutateAdGroupFeeds<.google.ads.googleads.v17.services.MutateAdGroupFeedsRequest=.google.ads.googleads.v17.services.MutateAdGroupFeedsResponse"V�Acustomer_id,operations���7"2/v17/customers/{customer_id=*}/adGroupFeeds:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v17.servicesBAdGroupFeedServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v17/services;services�GAA�!Google.Ads.GoogleAds.V17.Services�!Google\\Ads\\GoogleAds\\V17\\Services�%Google::Ads::GoogleAds::V17::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

