<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/enums/asset_offline_evaluation_error_reasons.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V20\Enums;

class AssetOfflineEvaluationErrorReasons
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
Kgoogle/ads/googleads/v20/enums/asset_offline_evaluation_error_reasons.protogoogle.ads.googleads.v20.enums"�
&AssetOfflineEvaluationErrorReasonsEnum"�
"AssetOfflineEvaluationErrorReasons
UNSPECIFIED 
UNKNOWN.
*PRICE_ASSET_DESCRIPTION_REPEATS_ROW_HEADER"
PRICE_ASSET_REPETITIVE_HEADERS3
/PRICE_ASSET_HEADER_INCOMPATIBLE_WITH_PRICE_TYPE9
5PRICE_ASSET_DESCRIPTION_INCOMPATIBLE_WITH_ITEM_HEADER/
+PRICE_ASSET_DESCRIPTION_HAS_PRICE_QUALIFIER$
 PRICE_ASSET_UNSUPPORTED_LANGUAGE
PRICE_ASSET_OTHER_ERRORB�
"com.google.ads.googleads.v20.enumsB\'AssetOfflineEvaluationErrorReasonsProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v20/enums;enums�GAA�Google.Ads.GoogleAds.V20.Enums�Google\\Ads\\GoogleAds\\V20\\Enums�"Google::Ads::GoogleAds::V20::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

