<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/enums/criterion_category_locale_availability_mode.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V17\Enums;

class CriterionCategoryLocaleAvailabilityMode
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
Pgoogle/ads/googleads/v17/enums/criterion_category_locale_availability_mode.protogoogle.ads.googleads.v17.enums"�
+CriterionCategoryLocaleAvailabilityModeEnum"�
\'CriterionCategoryLocaleAvailabilityMode
UNSPECIFIED 
UNKNOWN
ALL_LOCALES
COUNTRY_AND_ALL_LANGUAGES
LANGUAGE_AND_ALL_COUNTRIES
COUNTRY_AND_LANGUAGEB�
"com.google.ads.googleads.v17.enumsB,CriterionCategoryLocaleAvailabilityModeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v17/enums;enums�GAA�Google.Ads.GoogleAds.V17.Enums�Google\\Ads\\GoogleAds\\V17\\Enums�"Google::Ads::GoogleAds::V17::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

