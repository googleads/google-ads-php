<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/media_bundle_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Errors;

class MediaBundleError
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
8google/ads/googleads/v20/errors/media_bundle_error.protogoogle.ads.googleads.v20.errors"�
MediaBundleErrorEnum"�
MediaBundleError
UNSPECIFIED 
UNKNOWN
BAD_REQUEST"
DOUBLECLICK_BUNDLE_NOT_ALLOWED
EXTERNAL_URL_NOT_ALLOWED
FILE_TOO_LARGE.
*GOOGLE_WEB_DESIGNER_ZIP_FILE_NOT_PUBLISHED
INVALID_INPUT
INVALID_MEDIA_BUNDLE	
INVALID_MEDIA_BUNDLE_ENTRY

INVALID_MIME_TYPE
INVALID_PATH
INVALID_URL_REFERENCE
MEDIA_DATA_TOO_LARGE&
"MISSING_PRIMARY_MEDIA_BUNDLE_ENTRY
SERVER_ERROR
STORAGE_ERROR
SWIFFY_BUNDLE_NOT_ALLOWED
TOO_MANY_FILES
UNEXPECTED_SIZE/
+UNSUPPORTED_GOOGLE_WEB_DESIGNER_ENVIRONMENT
UNSUPPORTED_HTML5_FEATURE)
%URL_IN_MEDIA_BUNDLE_NOT_SSL_COMPLIANT
CUSTOM_EXIT_NOT_ALLOWEDB�
#com.google.ads.googleads.v20.errorsBMediaBundleErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v20/errors;errors�GAA�Google.Ads.GoogleAds.V20.Errors�Google\\Ads\\GoogleAds\\V20\\Errors�#Google::Ads::GoogleAds::V20::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

