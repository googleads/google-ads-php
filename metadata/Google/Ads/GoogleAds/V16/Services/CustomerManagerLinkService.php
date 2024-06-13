<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/services/customer_manager_link_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V16\Services;

class CustomerManagerLinkService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
8google/ads/googleads/v16/enums/manager_link_status.protogoogle.ads.googleads.v16.enums"�
ManagerLinkStatusEnum"s
ManagerLinkStatus
UNSPECIFIED 
UNKNOWN

ACTIVE
INACTIVE
PENDING
REFUSED
CANCELEDB�
"com.google.ads.googleads.v16.enumsBManagerLinkStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v16/enums;enums�GAA�Google.Ads.GoogleAds.V16.Enums�Google\\Ads\\GoogleAds\\V16\\Enums�"Google::Ads::GoogleAds::V16::Enumsbproto3
�
>google/ads/googleads/v16/resources/customer_manager_link.proto"google.ads.googleads.v16.resourcesgoogle/api/field_behavior.protogoogle/api/resource.proto"�
CustomerManagerLinkK
resource_name (	B4�A�A.
,googleads.googleapis.com/CustomerManagerLinkH
manager_customer (	B)�A�A#
!googleads.googleapis.com/CustomerH �!
manager_link_id (B�AH�W
status (2G.google.ads.googleads.v16.enums.ManagerLinkStatusEnum.ManagerLinkStatus:��A�
,googleads.googleapis.com/CustomerManagerLinkTcustomers/{customer_id}/customerManagerLinks/{manager_customer_id}~{manager_link_id}B
_manager_customerB
_manager_link_idB�
&com.google.ads.googleads.v16.resourcesBCustomerManagerLinkProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v16/resources;resources�GAA�"Google.Ads.GoogleAds.V16.Resources�"Google\\Ads\\GoogleAds\\V16\\Resources�&Google::Ads::GoogleAds::V16::Resourcesbproto3
�
Egoogle/ads/googleads/v16/services/customer_manager_link_service.proto!google.ads.googleads.v16.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.proto"�
 MutateCustomerManagerLinkRequest
customer_id (	B�AX

operations (2?.google.ads.googleads.v16.services.CustomerManagerLinkOperationB�A
validate_only ("�
MoveManagerLinkRequest
customer_id (	B�A+
previous_customer_manager_link (	B�A
new_manager (	B�A
validate_only ("�
CustomerManagerLinkOperation/
update_mask (2.google.protobuf.FieldMaskI
update (27.google.ads.googleads.v16.resources.CustomerManagerLinkH B
	operation"x
!MutateCustomerManagerLinkResponseS
results (2B.google.ads.googleads.v16.services.MutateCustomerManagerLinkResult"c
MoveManagerLinkResponseH
resource_name (	B1�A.
,googleads.googleapis.com/CustomerManagerLink"k
MutateCustomerManagerLinkResultH
resource_name (	B1�A.
,googleads.googleapis.com/CustomerManagerLink2�
CustomerManagerLinkService�
MutateCustomerManagerLinkC.google.ads.googleads.v16.services.MutateCustomerManagerLinkRequestD.google.ads.googleads.v16.services.MutateCustomerManagerLinkResponse"^�Acustomer_id,operations���?":/v16/customers/{customer_id=*}/customerManagerLinks:mutate:*�
MoveManagerLink9.google.ads.googleads.v16.services.MoveManagerLinkRequest:.google.ads.googleads.v16.services.MoveManagerLinkResponse"��A6customer_id,previous_customer_manager_link,new_manager���H"C/v16/customers/{customer_id=*}/customerManagerLinks:moveManagerLink:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v16.servicesBCustomerManagerLinkServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v16/services;services�GAA�!Google.Ads.GoogleAds.V16.Services�!Google\\Ads\\GoogleAds\\V16\\Services�%Google::Ads::GoogleAds::V16::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

