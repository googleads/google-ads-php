<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/errors/brand_guidelines_migration_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Errors;

class BrandGuidelinesMigrationError
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
Fgoogle/ads/googleads/v20/errors/brand_guidelines_migration_error.protogoogle.ads.googleads.v20.errors"�
!BrandGuidelinesMigrationErrorEnum"�
BrandGuidelinesMigrationError
UNSPECIFIED 
UNKNOWN$
 BRAND_GUIDELINES_ALREADY_ENABLED7
3CANNOT_ENABLE_BRAND_GUIDELINES_FOR_REMOVED_CAMPAIGN(
$BRAND_GUIDELINES_LOGO_LIMIT_EXCEEDED@
<CANNOT_AUTO_POPULATE_BRAND_ASSETS_WHEN_BRAND_ASSETS_PROVIDEDA
=AUTO_POPULATE_BRAND_ASSETS_REQUIRED_WHEN_BRAND_ASSETS_OMITTED
TOO_MANY_ENABLE_OPERATIONSB�
#com.google.ads.googleads.v20.errorsB"BrandGuidelinesMigrationErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v20/errors;errors�GAA�Google.Ads.GoogleAds.V20.Errors�Google\\Ads\\GoogleAds\\V20\\Errors�#Google::Ads::GoogleAds::V20::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

