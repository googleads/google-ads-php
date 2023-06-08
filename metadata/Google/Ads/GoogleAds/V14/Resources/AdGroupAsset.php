<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v14/resources/ad_group_asset.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V14\Resources;

class AdGroupAsset
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
�
Xgoogle/ads/googleads/v14/enums/policy_topic_evidence_destination_mismatch_url_type.protogoogle.ads.googleads.v14.enums"�
1PolicyTopicEvidenceDestinationMismatchUrlTypeEnum"�
-PolicyTopicEvidenceDestinationMismatchUrlType
UNSPECIFIED 
UNKNOWN
DISPLAY_URL
	FINAL_URL
FINAL_MOBILE_URL
TRACKING_URL
MOBILE_TRACKING_URLB�
"com.google.ads.googleads.v14.enumsB2PolicyTopicEvidenceDestinationMismatchUrlTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
<google/ads/googleads/v14/enums/policy_topic_entry_type.protogoogle.ads.googleads.v14.enums"�
PolicyTopicEntryTypeEnum"�
PolicyTopicEntryType
UNSPECIFIED 
UNKNOWN

PROHIBITED
LIMITED
FULLY_LIMITED
DESCRIPTIVE

BROADENING
AREA_OF_INTEREST_ONLYB�
"com.google.ads.googleads.v14.enumsBPolicyTopicEntryTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
Kgoogle/ads/googleads/v14/enums/asset_offline_evaluation_error_reasons.protogoogle.ads.googleads.v14.enums"�
&AssetOfflineEvaluationErrorReasonsEnum"�
"AssetOfflineEvaluationErrorReasons
UNSPECIFIED 
UNKNOWN.
*PRICE_ASSET_DESCRIPTION_REPEATS_ROW_HEADER"
PRICE_ASSET_REPETITIVE_HEADERS3
/PRICE_ASSET_HEADER_INCOMPATIBLE_WITH_PRICE_TYPE9
5PRICE_ASSET_DESCRIPTION_INCOMPATIBLE_WITH_ITEM_HEADER/
+PRICE_ASSET_DESCRIPTION_HAS_PRICE_QUALIFIER$
 PRICE_ASSET_UNSUPPORTED_LANGUAGE
PRICE_ASSET_OTHER_ERRORB�
"com.google.ads.googleads.v14.enumsB\'AssetOfflineEvaluationErrorReasonsProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
6google/ads/googleads/v14/enums/asset_link_status.protogoogle.ads.googleads.v14.enums"l
AssetLinkStatusEnum"U
AssetLinkStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVED

PAUSEDB�
"com.google.ads.googleads.v14.enumsBAssetLinkStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
9google/ads/googleads/v14/enums/policy_review_status.protogoogle.ads.googleads.v14.enums"�
PolicyReviewStatusEnum"�
PolicyReviewStatus
UNSPECIFIED 
UNKNOWN
REVIEW_IN_PROGRESS
REVIEWED
UNDER_APPEAL
ELIGIBLE_MAY_SERVEB�
"com.google.ads.googleads.v14.enumsBPolicyReviewStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
Egoogle/ads/googleads/v14/enums/asset_link_primary_status_reason.protogoogle.ads.googleads.v14.enums"�
 AssetLinkPrimaryStatusReasonEnum"�
AssetLinkPrimaryStatusReason
UNSPECIFIED 
UNKNOWN
ASSET_LINK_PAUSED
ASSET_LINK_REMOVED
ASSET_DISAPPROVED
ASSET_UNDER_REVIEW
ASSET_APPROVED_LABELEDB�
"com.google.ads.googleads.v14.enumsB!AssetLinkPrimaryStatusReasonProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
5google/ads/googleads/v14/enums/asset_field_type.protogoogle.ads.googleads.v14.enums"�
AssetFieldTypeEnum"�
AssetFieldType
UNSPECIFIED 
UNKNOWN
HEADLINE
DESCRIPTION
MANDATORY_AD_TEXT
MARKETING_IMAGE
MEDIA_BUNDLE
YOUTUBE_VIDEO
BOOK_ON_GOOGLE
	LEAD_FORM	
	PROMOTION

CALLOUT
STRUCTURED_SNIPPET
SITELINK

MOBILE_APP
HOTEL_CALLOUT
CALL	
PRICE
LONG_HEADLINE
BUSINESS_NAME
SQUARE_MARKETING_IMAGE
PORTRAIT_MARKETING_IMAGE
LOGO
LANDSCAPE_LOGO	
VIDEO
CALL_TO_ACTION_SELECTION
AD_IMAGE
BUSINESS_LOGO
HOTEL_PROPERTYB�
"com.google.ads.googleads.v14.enumsBAssetFieldTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
1google/ads/googleads/v14/enums/asset_source.protogoogle.ads.googleads.v14.enums"i
AssetSourceEnum"V
AssetSource
UNSPECIFIED 
UNKNOWN

ADVERTISER
AUTOMATICALLY_CREATEDB�
"com.google.ads.googleads.v14.enumsBAssetSourceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
agoogle/ads/googleads/v14/enums/policy_topic_evidence_destination_not_working_dns_error_type.protogoogle.ads.googleads.v14.enums"�
8PolicyTopicEvidenceDestinationNotWorkingDnsErrorTypeEnum"�
4PolicyTopicEvidenceDestinationNotWorkingDnsErrorType
UNSPECIFIED 
UNKNOWN
HOSTNAME_NOT_FOUND
GOOGLE_CRAWLER_DNS_ISSUEB�
"com.google.ads.googleads.v14.enumsB9PolicyTopicEvidenceDestinationNotWorkingDnsErrorTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
Ygoogle/ads/googleads/v14/enums/policy_topic_evidence_destination_not_working_device.protogoogle.ads.googleads.v14.enums"�
2PolicyTopicEvidenceDestinationNotWorkingDeviceEnum"q
.PolicyTopicEvidenceDestinationNotWorkingDevice
UNSPECIFIED 
UNKNOWN
DESKTOP
ANDROID
IOSB�
"com.google.ads.googleads.v14.enumsB3PolicyTopicEvidenceDestinationNotWorkingDeviceProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
,google/ads/googleads/v14/common/policy.protogoogle.ads.googleads.v14.commonXgoogle/ads/googleads/v14/enums/policy_topic_evidence_destination_mismatch_url_type.protoYgoogle/ads/googleads/v14/enums/policy_topic_evidence_destination_not_working_device.protoagoogle/ads/googleads/v14/enums/policy_topic_evidence_destination_not_working_dns_error_type.proto"n
PolicyViolationKey
policy_name (	H �
violating_text (	H�B
_policy_nameB
_violating_text"�
PolicyValidationParameter
ignorable_policy_topics (	Y
exempt_policy_violation_keys (23.google.ads.googleads.v14.common.PolicyViolationKey"�
PolicyTopicEntry
topic (	H �[
type (2M.google.ads.googleads.v14.enums.PolicyTopicEntryTypeEnum.PolicyTopicEntryTypeG
	evidences (24.google.ads.googleads.v14.common.PolicyTopicEvidenceK
constraints (26.google.ads.googleads.v14.common.PolicyTopicConstraintB
_topic"�

PolicyTopicEvidenceX
website_list (2@.google.ads.googleads.v14.common.PolicyTopicEvidence.WebsiteListH R
	text_list (2=.google.ads.googleads.v14.common.PolicyTopicEvidence.TextListH 
language_code	 (	H i
destination_text_list (2H.google.ads.googleads.v14.common.PolicyTopicEvidence.DestinationTextListH h
destination_mismatch (2H.google.ads.googleads.v14.common.PolicyTopicEvidence.DestinationMismatchH m
destination_not_working (2J.google.ads.googleads.v14.common.PolicyTopicEvidence.DestinationNotWorkingH 
TextList
texts (	
WebsiteList
websites (	0
DestinationTextList
destination_texts (	�
DestinationMismatch�
	url_types (2.google.ads.googleads.v14.enums.PolicyTopicEvidenceDestinationMismatchUrlTypeEnum.PolicyTopicEvidenceDestinationMismatchUrlType�
DestinationNotWorking
expanded_url (	H��
device (2�.google.ads.googleads.v14.enums.PolicyTopicEvidenceDestinationNotWorkingDeviceEnum.PolicyTopicEvidenceDestinationNotWorkingDevice#
last_checked_date_time (	H��
dns_error_type (2�.google.ads.googleads.v14.enums.PolicyTopicEvidenceDestinationNotWorkingDnsErrorTypeEnum.PolicyTopicEvidenceDestinationNotWorkingDnsErrorTypeH 
http_error_code (H B
reasonB
_expanded_urlB
_last_checked_date_timeB
value"�
PolicyTopicConstrainto
country_constraint_list (2L.google.ads.googleads.v14.common.PolicyTopicConstraint.CountryConstraintListH h
reseller_constraint (2I.google.ads.googleads.v14.common.PolicyTopicConstraint.ResellerConstraintH {
#certificate_missing_in_country_list (2L.google.ads.googleads.v14.common.PolicyTopicConstraint.CountryConstraintListH �
+certificate_domain_mismatch_in_country_list (2L.google.ads.googleads.v14.common.PolicyTopicConstraint.CountryConstraintListH �
CountryConstraintList%
total_targeted_countries (H �[
	countries (2H.google.ads.googleads.v14.common.PolicyTopicConstraint.CountryConstraintB
_total_targeted_countries
ResellerConstraintI
CountryConstraint
country_criterion (	H �B
_country_criterionB
valueB�
#com.google.ads.googleads.v14.commonBPolicyProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v14/common;common�GAA�Google.Ads.GoogleAds.V14.Common�Google\\Ads\\GoogleAds\\V14\\Common�#Google::Ads::GoogleAds::V14::Commonbproto3
�
>google/ads/googleads/v14/enums/asset_link_primary_status.protogoogle.ads.googleads.v14.enums"�
AssetLinkPrimaryStatusEnum"�
AssetLinkPrimaryStatus
UNSPECIFIED 
UNKNOWN
ELIGIBLE

PAUSED
REMOVED
PENDING
LIMITED
NOT_ELIGIBLEB�
"com.google.ads.googleads.v14.enumsBAssetLinkPrimaryStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
;google/ads/googleads/v14/enums/policy_approval_status.protogoogle.ads.googleads.v14.enums"�
PolicyApprovalStatusEnum"�
PolicyApprovalStatus
UNSPECIFIED 
UNKNOWN
DISAPPROVED
APPROVED_LIMITED
APPROVED
AREA_OF_INTEREST_ONLYB�
"com.google.ads.googleads.v14.enumsBPolicyApprovalStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v14/enums;enums�GAA�Google.Ads.GoogleAds.V14.Enums�Google\\Ads\\GoogleAds\\V14\\Enums�"Google::Ads::GoogleAds::V14::Enumsbproto3
�
2google/ads/googleads/v14/common/asset_policy.protogoogle.ads.googleads.v14.common>google/ads/googleads/v14/enums/asset_link_primary_status.protoEgoogle/ads/googleads/v14/enums/asset_link_primary_status_reason.protoKgoogle/ads/googleads/v14/enums/asset_offline_evaluation_error_reasons.proto;google/ads/googleads/v14/enums/policy_approval_status.proto9google/ads/googleads/v14/enums/policy_review_status.proto"�
AdAssetPolicySummaryO
policy_topic_entries (21.google.ads.googleads.v14.common.PolicyTopicEntry`
review_status (2I.google.ads.googleads.v14.enums.PolicyReviewStatusEnum.PolicyReviewStatusf
approval_status (2M.google.ads.googleads.v14.enums.PolicyApprovalStatusEnum.PolicyApprovalStatus"�
AssetLinkPrimaryStatusDetailsr
reason (2].google.ads.googleads.v14.enums.AssetLinkPrimaryStatusReasonEnum.AssetLinkPrimaryStatusReasonH�f
status (2Q.google.ads.googleads.v14.enums.AssetLinkPrimaryStatusEnum.AssetLinkPrimaryStatusH�N
asset_disapproved (21.google.ads.googleads.v14.common.AssetDisapprovedH B	
detailsB	
_reasonB	
_status"�
AssetDisapproved�
 offline_evaluation_error_reasons (2i.google.ads.googleads.v14.enums.AssetOfflineEvaluationErrorReasonsEnum.AssetOfflineEvaluationErrorReasonsB�
#com.google.ads.googleads.v14.commonBAssetPolicyProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v14/common;common�GAA�Google.Ads.GoogleAds.V14.Common�Google\\Ads\\GoogleAds\\V14\\Common�#Google::Ads::GoogleAds::V14::Commonbproto3
�
7google/ads/googleads/v14/resources/ad_group_asset.proto"google.ads.googleads.v14.resources5google/ads/googleads/v14/enums/asset_field_type.proto>google/ads/googleads/v14/enums/asset_link_primary_status.protoEgoogle/ads/googleads/v14/enums/asset_link_primary_status_reason.proto6google/ads/googleads/v14/enums/asset_link_status.proto1google/ads/googleads/v14/enums/asset_source.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
AdGroupAssetD
resource_name (	B-�A�A\'
%googleads.googleapis.com/AdGroupAsset=
ad_group (	B+�A�A�A"
 googleads.googleapis.com/AdGroup8
asset (	B)�A�A�A 
googleads.googleapis.com/Asset]

field_type (2A.google.ads.googleads.v14.enums.AssetFieldTypeEnum.AssetFieldTypeB�A�AP
source (2;.google.ads.googleads.v14.enums.AssetSourceEnum.AssetSourceB�AS
status (2C.google.ads.googleads.v14.enums.AssetLinkStatusEnum.AssetLinkStatusn
primary_status (2Q.google.ads.googleads.v14.enums.AssetLinkPrimaryStatusEnum.AssetLinkPrimaryStatusB�Ac
primary_status_details (2>.google.ads.googleads.v14.common.AssetLinkPrimaryStatusDetailsB�A�
primary_status_reasons	 (2].google.ads.googleads.v14.enums.AssetLinkPrimaryStatusReasonEnum.AssetLinkPrimaryStatusReasonB�A:w�At
%googleads.googleapis.com/AdGroupAssetKcustomers/{customer_id}/adGroupAssets/{ad_group_id}~{asset_id}~{field_type}B�
&com.google.ads.googleads.v14.resourcesBAdGroupAssetProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v14/resources;resources�GAA�"Google.Ads.GoogleAds.V14.Resources�"Google\\Ads\\GoogleAds\\V14\\Resources�&Google::Ads::GoogleAds::V14::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

