<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/youtube_video_registration_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Errors;

class YoutubeVideoRegistrationError
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
Fgoogle/ads/googleads/v19/errors/youtube_video_registration_error.protogoogle.ads.googleads.v19.errors"�
!YoutubeVideoRegistrationErrorEnum"�
YoutubeVideoRegistrationError
UNSPECIFIED 
UNKNOWN
VIDEO_NOT_FOUND
VIDEO_NOT_ACCESSIBLE
VIDEO_NOT_ELIGIBLEB�
#com.google.ads.googleads.v19.errorsB"YoutubeVideoRegistrationErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/errors;errors�GAA�Google.Ads.GoogleAds.V19.Errors�Google\\Ads\\GoogleAds\\V19\\Errors�#Google::Ads::GoogleAds::V19::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

