<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/shareable_preview_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Errors;

class ShareablePreviewError
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
=google/ads/googleads/v19/errors/shareable_preview_error.protogoogle.ads.googleads.v19.errors"�
ShareablePreviewErrorEnum"�
ShareablePreviewError
UNSPECIFIED 
UNKNOWN$
 TOO_MANY_ASSET_GROUPS_IN_REQUEST2
.ASSET_GROUP_DOES_NOT_EXIST_UNDER_THIS_CUSTOMERB�
#com.google.ads.googleads.v19.errorsBShareablePreviewErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/errors;errors�GAA�Google.Ads.GoogleAds.V19.Errors�Google\\Ads\\GoogleAds\\V19\\Errors�#Google::Ads::GoogleAds::V19::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

