<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/product_link_invitation_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Errors;

class ProductLinkInvitationError
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
Cgoogle/ads/googleads/v19/errors/product_link_invitation_error.protogoogle.ads.googleads.v19.errors"�
ProductLinkInvitationErrorEnum"�
ProductLinkInvitationError
UNSPECIFIED 
UNKNOWN
INVALID_STATUS
PERMISSION_DENIED
NO_INVITATION_REQUIRED/
+CUSTOMER_NOT_PERMITTED_TO_CREATE_INVITATIONB�
#com.google.ads.googleads.v19.errorsBProductLinkInvitationErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/errors;errors�GAA�Google.Ads.GoogleAds.V19.Errors�Google\\Ads\\GoogleAds\\V19\\Errors�#Google::Ads::GoogleAds::V19::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

