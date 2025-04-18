<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/customer_user_access_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class CustomerUserAccessService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
0google/ads/googleads/v19/enums/access_role.protogoogle.ads.googleads.v19.enums"t
AccessRoleEnum"b

AccessRole
UNSPECIFIED 
UNKNOWN	
ADMIN
STANDARD
	READ_ONLY

EMAIL_ONLYB�
"com.google.ads.googleads.v19.enumsBAccessRoleProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
=google/ads/googleads/v19/resources/customer_user_access.proto"google.ads.googleads.v19.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
CustomerUserAccessJ
resource_name (	B3�A�A-
+googleads.googleapis.com/CustomerUserAccess
user_id (B�A
email_address (	B�AH �N
access_role (29.google.ads.googleads.v19.enums.AccessRoleEnum.AccessRole+
access_creation_date_time (	B�AH�,
inviter_user_email_address (	B�AH�:h�Ae
+googleads.googleapis.com/CustomerUserAccess6customers/{customer_id}/customerUserAccesses/{user_id}B
_email_addressB
_access_creation_date_timeB
_inviter_user_email_addressB�
&com.google.ads.googleads.v19.resourcesBCustomerUserAccessProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
Dgoogle/ads/googleads/v19/services/customer_user_access_service.proto!google.ads.googleads.v19.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.proto"�
MutateCustomerUserAccessRequest
customer_id (	B�AV
	operation (2>.google.ads.googleads.v19.services.CustomerUserAccessOperationB�A"�
CustomerUserAccessOperation/
update_mask (2.google.protobuf.FieldMaskH
update (26.google.ads.googleads.v19.resources.CustomerUserAccessH B
remove (	B0�A-
+googleads.googleapis.com/CustomerUserAccessH B
	operation"u
 MutateCustomerUserAccessResponseQ
result (2A.google.ads.googleads.v19.services.MutateCustomerUserAccessResult"i
MutateCustomerUserAccessResultG
resource_name (	B0�A-
+googleads.googleapis.com/CustomerUserAccess2�
CustomerUserAccessService�
MutateCustomerUserAccessB.google.ads.googleads.v19.services.MutateCustomerUserAccessRequestC.google.ads.googleads.v19.services.MutateCustomerUserAccessResponse"]�Acustomer_id,operation���?":/v19/customers/{customer_id=*}/customerUserAccesses:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesBCustomerUserAccessServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

