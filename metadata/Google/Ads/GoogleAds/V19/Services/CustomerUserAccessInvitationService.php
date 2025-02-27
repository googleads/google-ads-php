<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/customer_user_access_invitation_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Services;

class CustomerUserAccessInvitationService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
=google/ads/googleads/v19/enums/access_invitation_status.protogoogle.ads.googleads.v19.enums"|
AccessInvitationStatusEnum"^
AccessInvitationStatus
UNSPECIFIED 
UNKNOWN
PENDING
DECLINED
EXPIREDB�
"com.google.ads.googleads.v19.enumsBAccessInvitationStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
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
�
Hgoogle/ads/googleads/v19/resources/customer_user_access_invitation.proto"google.ads.googleads.v19.resources0google/ads/googleads/v19/enums/access_role.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
CustomerUserAccessInvitationT
resource_name (	B=�A�A7
5googleads.googleapis.com/CustomerUserAccessInvitation
invitation_id (B�AS
access_role (29.google.ads.googleads.v19.enums.AccessRoleEnum.AccessRoleB�A
email_address (	B�A
creation_date_time (	B�Aq
invitation_status (2Q.google.ads.googleads.v19.enums.AccessInvitationStatusEnum.AccessInvitationStatusB�A:��A~
5googleads.googleapis.com/CustomerUserAccessInvitationEcustomers/{customer_id}/customerUserAccessInvitations/{invitation_id}B�
&com.google.ads.googleads.v19.resourcesB!CustomerUserAccessInvitationProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3
�
Ogoogle/ads/googleads/v19/services/customer_user_access_invitation_service.proto!google.ads.googleads.v19.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
)MutateCustomerUserAccessInvitationRequest
customer_id (	B�A`
	operation (2H.google.ads.googleads.v19.services.CustomerUserAccessInvitationOperationB�A"�
%CustomerUserAccessInvitationOperationR
create (2@.google.ads.googleads.v19.resources.CustomerUserAccessInvitationH L
remove (	B:�A7
5googleads.googleapis.com/CustomerUserAccessInvitationH B
	operation"�
*MutateCustomerUserAccessInvitationResponse[
result (2K.google.ads.googleads.v19.services.MutateCustomerUserAccessInvitationResult"}
(MutateCustomerUserAccessInvitationResultQ
resource_name (	B:�A7
5googleads.googleapis.com/CustomerUserAccessInvitation2�
#CustomerUserAccessInvitationService�
"MutateCustomerUserAccessInvitationL.google.ads.googleads.v19.services.MutateCustomerUserAccessInvitationRequestM.google.ads.googleads.v19.services.MutateCustomerUserAccessInvitationResponse"f�Acustomer_id,operation���H"C/v19/customers/{customer_id=*}/customerUserAccessInvitations:mutate:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v19.servicesB(CustomerUserAccessInvitationServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v19/services;services�GAA�!Google.Ads.GoogleAds.V19.Services�!Google\\Ads\\GoogleAds\\V19\\Services�%Google::Ads::GoogleAds::V19::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

