<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v15/resources/shared_set.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V15\Resources;

class SharedSet
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
�
4google/ads/googleads/v15/enums/shared_set_type.protogoogle.ads.googleads.v15.enums"�
SharedSetTypeEnum"�
SharedSetType
UNSPECIFIED 
UNKNOWN
NEGATIVE_KEYWORDS
NEGATIVE_PLACEMENTS#
ACCOUNT_LEVEL_NEGATIVE_KEYWORDS

BRANDSB�
"com.google.ads.googleads.v15.enumsBSharedSetTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v15/enums;enums�GAA�Google.Ads.GoogleAds.V15.Enums�Google\\Ads\\GoogleAds\\V15\\Enums�"Google::Ads::GoogleAds::V15::Enumsbproto3
�
6google/ads/googleads/v15/enums/shared_set_status.protogoogle.ads.googleads.v15.enums"`
SharedSetStatusEnum"I
SharedSetStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v15.enumsBSharedSetStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v15/enums;enums�GAA�Google.Ads.GoogleAds.V15.Enums�Google\\Ads\\GoogleAds\\V15\\Enums�"Google::Ads::GoogleAds::V15::Enumsbproto3
�
3google/ads/googleads/v15/resources/shared_set.proto"google.ads.googleads.v15.resources4google/ads/googleads/v15/enums/shared_set_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
	SharedSetA
resource_name (	B*�A�A$
"googleads.googleapis.com/SharedSet
id (B�AH �R
type (2?.google.ads.googleads.v15.enums.SharedSetTypeEnum.SharedSetTypeB�A
name	 (	H�X
status (2C.google.ads.googleads.v15.enums.SharedSetStatusEnum.SharedSetStatusB�A
member_count
 (B�AH�!
reference_count (B�AH�:[�AX
"googleads.googleapis.com/SharedSet2customers/{customer_id}/sharedSets/{shared_set_id}B
_idB
_nameB
_member_countB
_reference_countB�
&com.google.ads.googleads.v15.resourcesBSharedSetProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v15/resources;resources�GAA�"Google.Ads.GoogleAds.V15.Resources�"Google\\Ads\\GoogleAds\\V15\\Resources�&Google::Ads::GoogleAds::V15::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

