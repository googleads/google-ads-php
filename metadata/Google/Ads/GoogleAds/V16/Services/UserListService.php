<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/services/user_list_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Services;

class UserListService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
@google/ads/googleads/v16/enums/user_list_membership_status.protogoogle.ads.googleads.v16.enums"n
UserListMembershipStatusEnum"N
UserListMembershipStatus
UNSPECIFIED 
UNKNOWN
OPEN

CLOSEDB�
"com.google.ads.googleads.v16.enumsBUserListMembershipStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Hgoogle/ads/googleads/v16/enums/user_list_number_rule_item_operator.protogoogle.ads.googleads.v16.enums"�
"UserListNumberRuleItemOperatorEnum"�
UserListNumberRuleItemOperator
UNSPECIFIED 
UNKNOWN
GREATER_THAN
GREATER_THAN_OR_EQUAL

EQUALS

NOT_EQUALS
	LESS_THAN
LESS_THAN_OR_EQUALB�
"com.google.ads.googleads.v16.enumsB#UserListNumberRuleItemOperatorProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Fgoogle/ads/googleads/v16/enums/user_list_date_rule_item_operator.protogoogle.ads.googleads.v16.enums"�
 UserListDateRuleItemOperatorEnum"o
UserListDateRuleItemOperator
UNSPECIFIED 
UNKNOWN

EQUALS

NOT_EQUALS

BEFORE	
AFTERB�
"com.google.ads.googleads.v16.enumsB!UserListDateRuleItemOperatorProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Hgoogle/ads/googleads/v16/enums/user_list_string_rule_item_operator.protogoogle.ads.googleads.v16.enums"�
"UserListStringRuleItemOperatorEnum"�
UserListStringRuleItemOperator
UNSPECIFIED 
UNKNOWN
CONTAINS

EQUALS
STARTS_WITH
	ENDS_WITH

NOT_EQUALS
NOT_CONTAINS
NOT_STARTS_WITH
NOT_ENDS_WITH	B�
"com.google.ads.googleads.v16.enumsB#UserListStringRuleItemOperatorProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
>google/ads/googleads/v16/enums/lookalike_expansion_level.protogoogle.ads.googleads.v16.enums"{
LookalikeExpansionLevelEnum"\\
LookalikeExpansionLevel
UNSPECIFIED 
UNKNOWN

NARROW
BALANCED	
BROADB�
"com.google.ads.googleads.v16.enumsBLookalikeExpansionLevelProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
<google/ads/googleads/v16/enums/user_list_access_status.protogoogle.ads.googleads.v16.enums"k
UserListAccessStatusEnum"O
UserListAccessStatus
UNSPECIFIED 
UNKNOWN
ENABLED
DISABLEDB�
"com.google.ads.googleads.v16.enumsBUserListAccessStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
9google/ads/googleads/v16/enums/user_list_size_range.protogoogle.ads.googleads.v16.enums"�
UserListSizeRangeEnum"�
UserListSizeRange
UNSPECIFIED 
UNKNOWN
LESS_THAN_FIVE_HUNDRED
LESS_THAN_ONE_THOUSAND 
ONE_THOUSAND_TO_TEN_THOUSAND"
TEN_THOUSAND_TO_FIFTY_THOUSAND*
&FIFTY_THOUSAND_TO_ONE_HUNDRED_THOUSAND2
.ONE_HUNDRED_THOUSAND_TO_THREE_HUNDRED_THOUSAND3
/THREE_HUNDRED_THOUSAND_TO_FIVE_HUNDRED_THOUSAND(
$FIVE_HUNDRED_THOUSAND_TO_ONE_MILLION	
ONE_MILLION_TO_TWO_MILLION
 
TWO_MILLION_TO_THREE_MILLION!
THREE_MILLION_TO_FIVE_MILLION
FIVE_MILLION_TO_TEN_MILLION!
TEN_MILLION_TO_TWENTY_MILLION$
 TWENTY_MILLION_TO_THIRTY_MILLION#
THIRTY_MILLION_TO_FIFTY_MILLION
OVER_FIFTY_MILLIONB�
"com.google.ads.googleads.v16.enumsBUserListSizeRangeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Egoogle/ads/googleads/v16/enums/user_list_flexible_rule_operator.protogoogle.ads.googleads.v16.enums"q
 UserListFlexibleRuleOperatorEnum"M
UserListFlexibleRuleOperator
UNSPECIFIED 
UNKNOWN
AND
ORB�
"com.google.ads.googleads.v16.enumsB!UserListFlexibleRuleOperatorProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
2google/ads/googleads/v16/enums/access_reason.protogoogle.ads.googleads.v16.enums"�
AccessReasonEnum"q
AccessReason
UNSPECIFIED 
UNKNOWN	
OWNED

SHARED
LICENSED

SUBSCRIBED

AFFILIATEDB�
"com.google.ads.googleads.v16.enumsBAccessReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
3google/ads/googleads/v16/enums/user_list_type.protogoogle.ads.googleads.v16.enums"�
UserListTypeEnum"�
UserListType
UNSPECIFIED 
UNKNOWN
REMARKETING
LOGICAL
EXTERNAL_REMARKETING

RULE_BASED
SIMILAR
	CRM_BASED
	LOOKALIKE	B�
"com.google.ads.googleads.v16.enumsBUserListTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Cgoogle/ads/googleads/v16/enums/customer_match_upload_key_type.protogoogle.ads.googleads.v16.enums"�
CustomerMatchUploadKeyTypeEnum"s
CustomerMatchUploadKeyType
UNSPECIFIED 
UNKNOWN
CONTACT_INFO

CRM_ID
MOBILE_ADVERTISING_IDB�
"com.google.ads.googleads.v16.enumsBCustomerMatchUploadKeyTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Dgoogle/ads/googleads/v16/enums/user_list_logical_rule_operator.protogoogle.ads.googleads.v16.enums"z
UserListLogicalRuleOperatorEnum"W
UserListLogicalRuleOperator
UNSPECIFIED 
UNKNOWN
ALL
ANY
NONEB�
"com.google.ads.googleads.v16.enumsB UserListLogicalRuleOperatorProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
8google/ads/googleads/v16/enums/user_list_rule_type.protogoogle.ads.googleads.v16.enums"h
UserListRuleTypeEnum"P
UserListRuleType
UNSPECIFIED 
UNKNOWN

AND_OF_ORS

OR_OF_ANDSB�
"com.google.ads.googleads.v16.enumsBUserListRuleTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Cgoogle/ads/googleads/v16/enums/user_list_prepopulation_status.protogoogle.ads.googleads.v16.enums"�
UserListPrepopulationStatusEnum"d
UserListPrepopulationStatus
UNSPECIFIED 
UNKNOWN
	REQUESTED
FINISHED

FAILEDB�
"com.google.ads.googleads.v16.enumsB UserListPrepopulationStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
=google/ads/googleads/v16/enums/user_list_closing_reason.protogoogle.ads.googleads.v16.enums"^
UserListClosingReasonEnum"A
UserListClosingReason
UNSPECIFIED 
UNKNOWN

UNUSEDB�
"com.google.ads.googleads.v16.enumsBUserListClosingReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
Cgoogle/ads/googleads/v16/enums/user_list_crm_data_source_type.protogoogle.ads.googleads.v16.enums"�
UserListCrmDataSourceTypeEnum"�
UserListCrmDataSourceType
UNSPECIFIED 
UNKNOWN
FIRST_PARTY
THIRD_PARTY_CREDIT_BUREAU
THIRD_PARTY_VOTER_FILEB�
"com.google.ads.googleads.v16.enumsBUserListCrmDataSourceTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
0google/ads/googleads/v16/common/user_lists.protogoogle.ads.googleads.v16.common>google/ads/googleads/v16/enums/lookalike_expansion_level.protoCgoogle/ads/googleads/v16/enums/user_list_crm_data_source_type.protoFgoogle/ads/googleads/v16/enums/user_list_date_rule_item_operator.protoEgoogle/ads/googleads/v16/enums/user_list_flexible_rule_operator.protoDgoogle/ads/googleads/v16/enums/user_list_logical_rule_operator.protoHgoogle/ads/googleads/v16/enums/user_list_number_rule_item_operator.protoCgoogle/ads/googleads/v16/enums/user_list_prepopulation_status.proto8google/ads/googleads/v16/enums/user_list_rule_type.protoHgoogle/ads/googleads/v16/enums/user_list_string_rule_item_operator.proto"�
LookalikeUserListInfo
seed_user_list_ids (l
expansion_level (2S.google.ads.googleads.v16.enums.LookalikeExpansionLevelEnum.LookalikeExpansionLevel
country_codes (	"E
SimilarUserListInfo
seed_user_list (	H �B
_seed_user_list"�
CrmBasedUserListInfo
app_id (	H �r
upload_key_type (2Y.google.ads.googleads.v16.enums.CustomerMatchUploadKeyTypeEnum.CustomerMatchUploadKeyTypeq
data_source_type (2W.google.ads.googleads.v16.enums.UserListCrmDataSourceTypeEnum.UserListCrmDataSourceTypeB	
_app_id"�
UserListRuleInfoX
	rule_type (2E.google.ads.googleads.v16.enums.UserListRuleTypeEnum.UserListRuleTypeT
rule_item_groups (2:.google.ads.googleads.v16.common.UserListRuleItemGroupInfo"f
UserListRuleItemGroupInfoI

rule_items (25.google.ads.googleads.v16.common.UserListRuleItemInfo"�
UserListRuleItemInfo
name (	H�W
number_rule_item (2;.google.ads.googleads.v16.common.UserListNumberRuleItemInfoH W
string_rule_item (2;.google.ads.googleads.v16.common.UserListStringRuleItemInfoH S
date_rule_item (29.google.ads.googleads.v16.common.UserListDateRuleItemInfoH B
	rule_itemB
_name"�
UserListDateRuleItemInfoo
operator (2].google.ads.googleads.v16.enums.UserListDateRuleItemOperatorEnum.UserListDateRuleItemOperator
value (	H �
offset_in_days (H�B
_valueB
_offset_in_days"�
UserListNumberRuleItemInfos
operator (2a.google.ads.googleads.v16.enums.UserListNumberRuleItemOperatorEnum.UserListNumberRuleItemOperator
value (H �B
_value"�
UserListStringRuleItemInfos
operator (2a.google.ads.googleads.v16.enums.UserListStringRuleItemOperatorEnum.UserListStringRuleItemOperator
value (	H �B
_value"�
FlexibleRuleOperandInfo?
rule (21.google.ads.googleads.v16.common.UserListRuleInfo!
lookback_window_days (H �B
_lookback_window_days"�
FlexibleRuleUserListInfo~
inclusive_rule_operator (2].google.ads.googleads.v16.enums.UserListFlexibleRuleOperatorEnum.UserListFlexibleRuleOperatorT
inclusive_operands (28.google.ads.googleads.v16.common.FlexibleRuleOperandInfoT
exclusive_operands (28.google.ads.googleads.v16.common.FlexibleRuleOperandInfo"�
RuleBasedUserListInfoy
prepopulation_status (2[.google.ads.googleads.v16.enums.UserListPrepopulationStatusEnum.UserListPrepopulationStatusZ
flexible_rule_user_list (29.google.ads.googleads.v16.common.FlexibleRuleUserListInfo"^
LogicalUserListInfoG
rules (28.google.ads.googleads.v16.common.UserListLogicalRuleInfo"�
UserListLogicalRuleInfom
operator (2[.google.ads.googleads.v16.enums.UserListLogicalRuleOperatorEnum.UserListLogicalRuleOperatorR
rule_operands (2;.google.ads.googleads.v16.common.LogicalUserListOperandInfo"B
LogicalUserListOperandInfo
	user_list (	H �B

_user_list"Y
BasicUserListInfoD
actions (23.google.ads.googleads.v16.common.UserListActionInfo"c
UserListActionInfo
conversion_action (	H 
remarketing_action (	H B
user_list_actionB�
#com.google.ads.googleads.v16.commonBUserListsProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v16/common;common�GAA�Google.Ads.GoogleAds.V16.Common�Google\\Ads\\GoogleAds\\V16\\Common�#Google::Ads::GoogleAds::V16::Commonbproto3
�
2google/ads/googleads/v16/resources/user_list.proto"google.ads.googleads.v16.resources2google/ads/googleads/v16/enums/access_reason.proto<google/ads/googleads/v16/enums/user_list_access_status.proto=google/ads/googleads/v16/enums/user_list_closing_reason.proto@google/ads/googleads/v16/enums/user_list_membership_status.proto9google/ads/googleads/v16/enums/user_list_size_range.proto3google/ads/googleads/v16/enums/user_list_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
UserList@
resource_name (	B)�A�A#
!googleads.googleapis.com/UserList
id (B�AH�
	read_only (B�AH�
name (	H�
description (	H�p
membership_status (2U.google.ads.googleads.v16.enums.UserListMembershipStatusEnum.UserListMembershipStatus
integration_code (	H�!
membership_life_span (H�"
size_for_display (B�AH�l
size_range_for_display
 (2G.google.ads.googleads.v16.enums.UserListSizeRangeEnum.UserListSizeRangeB�A!
size_for_search  (B�AH�k
size_range_for_search (2G.google.ads.googleads.v16.enums.UserListSizeRangeEnum.UserListSizeRangeB�AP
type (2=.google.ads.googleads.v16.enums.UserListTypeEnum.UserListTypeB�Ag
closing_reason (2O.google.ads.googleads.v16.enums.UserListClosingReasonEnum.UserListClosingReasonY
access_reason (2=.google.ads.googleads.v16.enums.AccessReasonEnum.AccessReasonB�Ao
account_user_list_status (2M.google.ads.googleads.v16.enums.UserListAccessStatusEnum.UserListAccessStatus 
eligible_for_search! (H	�&
eligible_for_display" (B�AH
�\'
match_rate_percentage (B�AH�T
crm_based_user_list (25.google.ads.googleads.v16.common.CrmBasedUserListInfoH V
similar_user_list (24.google.ads.googleads.v16.common.SimilarUserListInfoB�AH V
rule_based_user_list (26.google.ads.googleads.v16.common.RuleBasedUserListInfoH Q
logical_user_list (24.google.ads.googleads.v16.common.LogicalUserListInfoH M
basic_user_list (22.google.ads.googleads.v16.common.BasicUserListInfoH Z
lookalike_user_list$ (26.google.ads.googleads.v16.common.LookalikeUserListInfoB�AH :X�AU
!googleads.googleapis.com/UserList0customers/{customer_id}/userLists/{user_list_id}B
	user_listB
_idB

_read_onlyB
_nameB
_descriptionB
_integration_codeB
_membership_life_spanB
_size_for_displayB
_size_for_searchB
_eligible_for_searchB
_eligible_for_displayB
_match_rate_percentageB�
&com.google.ads.googleads.v16.resourcesBUserListProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v16/resources;resources�GAA�"Google.Ads.GoogleAds.V16.Resources�"Google\\Ads\\GoogleAds\\V16\\Resources�&Google::Ads::GoogleAds::V16::Resourcesbproto3
�
9google/ads/googleads/v16/services/user_list_service.proto!google.ads.googleads.v16.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"�
MutateUserListsRequest
customer_id (	B�AM

operations (24.google.ads.googleads.v16.services.UserListOperationB�A
partial_failure (
validate_only ("�
UserListOperation/
update_mask (2.google.protobuf.FieldMask>
create (2,.google.ads.googleads.v16.resources.UserListH >
update (2,.google.ads.googleads.v16.resources.UserListH 8
remove (	B&�A#
!googleads.googleapis.com/UserListH B
	operation"�
MutateUserListsResponse1
partial_failure_error (2.google.rpc.StatusH
results (27.google.ads.googleads.v16.services.MutateUserListResult"U
MutateUserListResult=
resource_name (	B&�A#
!googleads.googleapis.com/UserList2�
UserListService�
MutateUserLists9.google.ads.googleads.v16.services.MutateUserListsRequest:.google.ads.googleads.v16.services.MutateUserListsResponse"S�Acustomer_id,operations���4"//v16/customers/{customer_id=*}/userLists:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v16.servicesBUserListServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v16/services;services�GAA�!Google.Ads.GoogleAds.V16.Services�!Google\\Ads\\GoogleAds\\V16\\Services�%Google::Ads::GoogleAds::V16::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

