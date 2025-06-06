<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/media_upload_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Errors;

class MediaUploadError
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
8google/ads/googleads/v20/errors/media_upload_error.protogoogle.ads.googleads.v20.errors"�
MediaUploadErrorEnum"�
MediaUploadError
UNSPECIFIED 
UNKNOWN
FILE_TOO_BIG
UNPARSEABLE_IMAGE
ANIMATED_IMAGE_NOT_ALLOWED
FORMAT_NOT_ALLOWED
EXTERNAL_URL_NOT_ALLOWED
INVALID_URL_REFERENCE&
"MISSING_PRIMARY_MEDIA_BUNDLE_ENTRY
ANIMATED_VISUAL_EFFECT	
ANIMATION_TOO_LONG

ASPECT_RATIO_NOT_ALLOWED%
!AUDIO_NOT_ALLOWED_IN_MEDIA_BUNDLE
CMYK_JPEG_NOT_ALLOWED
FLASH_NOT_ALLOWED
FRAME_RATE_TOO_HIGH.
*GOOGLE_WEB_DESIGNER_ZIP_FILE_NOT_PUBLISHED
IMAGE_CONSTRAINTS_VIOLATED
INVALID_MEDIA_BUNDLE
INVALID_MEDIA_BUNDLE_ENTRY
INVALID_MIME_TYPE
INVALID_PATH
LAYOUT_PROBLEM
MALFORMED_URL
MEDIA_BUNDLE_NOT_ALLOWED/
+MEDIA_BUNDLE_NOT_COMPATIBLE_TO_PRODUCT_TYPE1
-MEDIA_BUNDLE_REJECTED_BY_MULTIPLE_ASSET_SPECS"
TOO_MANY_FILES_IN_MEDIA_BUNDLE/
+UNSUPPORTED_GOOGLE_WEB_DESIGNER_ENVIRONMENT
UNSUPPORTED_HTML5_FEATURE)
%URL_IN_MEDIA_BUNDLE_NOT_SSL_COMPLIANT
VIDEO_FILE_NAME_TOO_LONG\'
#VIDEO_MULTIPLE_FILES_WITH_SAME_NAME %
!VIDEO_NOT_ALLOWED_IN_MEDIA_BUNDLE!(
$CANNOT_UPLOAD_MEDIA_TYPE_THROUGH_API"
DIMENSIONS_NOT_ALLOWED#B�
#com.google.ads.googleads.v20.errorsBMediaUploadErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v20/errors;errors�GAA�Google.Ads.GoogleAds.V20.Errors�Google\\Ads\\GoogleAds\\V20\\Errors�#Google::Ads::GoogleAds::V20::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

