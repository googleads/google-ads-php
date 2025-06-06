<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/user_list_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Errors;

class UserListError
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
5google/ads/googleads/v20/errors/user_list_error.protogoogle.ads.googleads.v20.errors"�	
UserListErrorEnum"�	
UserListError
UNSPECIFIED 
UNKNOWN7
3EXTERNAL_REMARKETING_USER_LIST_MUTATE_NOT_SUPPORTED
CONCRETE_TYPE_REQUIRED
CONVERSION_TYPE_ID_REQUIRED
DUPLICATE_CONVERSION_TYPES
INVALID_CONVERSION_TYPE
INVALID_DESCRIPTION
INVALID_NAME
INVALID_TYPE	4
0CAN_NOT_ADD_LOGICAL_LIST_AS_LOGICAL_LIST_OPERAND
*
&INVALID_USER_LIST_LOGICAL_RULE_OPERAND
NAME_ALREADY_USED%
!NEW_CONVERSION_TYPE_NAME_REQUIRED%
!CONVERSION_TYPE_NAME_ALREADY_USED
OWNERSHIP_REQUIRED_FOR_SET"
USER_LIST_MUTATE_NOT_SUPPORTED
INVALID_RULE
INVALID_DATE_RANGE%
!CAN_NOT_MUTATE_SENSITIVE_USERLIST
MAX_NUM_RULEBASED_USERLISTS\'
#CANNOT_MODIFY_BILLABLE_RECORD_COUNT
APP_ID_NOT_SET-
)USERLIST_NAME_IS_RESERVED_FOR_SYSTEM_LIST 7
3ADVERTISER_NOT_ON_ALLOWLIST_FOR_USING_UPLOADED_DATA%
RULE_TYPE_IS_NOT_SUPPORTED":
6CAN_NOT_ADD_A_SIMILAR_USERLIST_AS_LOGICAL_LIST_OPERAND#:
6CAN_NOT_MIX_CRM_BASED_IN_LOGICAL_LIST_WITH_OTHER_LISTS$
APP_ID_NOT_ALLOWED\'
CANNOT_MUTATE_SYSTEM_LIST(
MOBILE_APP_IS_SENSITIVE)
SEED_LIST_DOES_NOT_EXIST*#
INVALID_SEED_LIST_ACCESS_REASON+
INVALID_SEED_LIST_TYPE,
INVALID_COUNTRY_CODES-B�
#com.google.ads.googleads.v20.errorsBUserListErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v20/errors;errors�GAA�Google.Ads.GoogleAds.V20.Errors�Google\\Ads\\GoogleAds\\V20\\Errors�#Google::Ads::GoogleAds::V20::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

