<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/account_link.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Resources;

class AccountLink
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
8google/ads/googleads/v20/enums/account_link_status.protogoogle.ads.googleads.v20.enums"�
AccountLinkStatusEnum"�
AccountLinkStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVED
	REQUESTED
PENDING_APPROVAL
REJECTED
REVOKEDB�
"com.google.ads.googleads.v20.enumsBAccountLinkStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
8google/ads/googleads/v20/enums/linked_account_type.protogoogle.ads.googleads.v20.enums"i
LinkedAccountTypeEnum"P
LinkedAccountType
UNSPECIFIED 
UNKNOWN
THIRD_PARTY_APP_ANALYTICSB�
"com.google.ads.googleads.v20.enumsBLinkedAccountTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�
6google/ads/googleads/v20/enums/mobile_app_vendor.protogoogle.ads.googleads.v20.enums"q
MobileAppVendorEnum"Z
MobileAppVendor
UNSPECIFIED 
UNKNOWN
APPLE_APP_STORE
GOOGLE_APP_STOREB�
"com.google.ads.googleads.v20.enumsBMobileAppVendorProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3
�

5google/ads/googleads/v20/resources/account_link.proto"google.ads.googleads.v20.resources8google/ads/googleads/v20/enums/linked_account_type.proto6google/ads/googleads/v20/enums/mobile_app_vendor.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
AccountLinkC
resource_name (	B,�A�A&
$googleads.googleapis.com/AccountLink!
account_link_id (B�AH�W
status (2G.google.ads.googleads.v20.enums.AccountLinkStatusEnum.AccountLinkStatusZ
type (2G.google.ads.googleads.v20.enums.LinkedAccountTypeEnum.LinkedAccountTypeB�Ar
third_party_app_analytics (2H.google.ads.googleads.v20.resources.ThirdPartyAppAnalyticsLinkIdentifierB�AH :a�A^
$googleads.googleapis.com/AccountLink6customers/{customer_id}/accountLinks/{account_link_id}B
linked_accountB
_account_link_id"�
$ThirdPartyAppAnalyticsLinkIdentifier+
app_analytics_provider_id (B�AH �
app_id (	B�AH�\\

app_vendor (2C.google.ads.googleads.v20.enums.MobileAppVendorEnum.MobileAppVendorB�AB
_app_analytics_provider_idB	
_app_idB�
&com.google.ads.googleads.v20.resourcesBAccountLinkProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v20/resources;resources�GAA�"Google.Ads.GoogleAds.V20.Resources�"Google\\Ads\\GoogleAds\\V20\\Resources�&Google::Ads::GoogleAds::V20::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

