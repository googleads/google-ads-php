<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/asset_set_link_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Errors;

class AssetSetLinkError
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
:google/ads/googleads/v19/errors/asset_set_link_error.protogoogle.ads.googleads.v19.errors"�
AssetSetLinkErrorEnum"�
AssetSetLinkError
UNSPECIFIED 
UNKNOWN)
%INCOMPATIBLE_ADVERTISING_CHANNEL_TYPE
DUPLICATE_FEED_LINK2
.INCOMPATIBLE_ASSET_SET_TYPE_WITH_CAMPAIGN_TYPE
DUPLICATE_ASSET_SET_LINK$
 ASSET_SET_LINK_CANNOT_BE_REMOVEDB�
#com.google.ads.googleads.v19.errorsBAssetSetLinkErrorProtoPZEgoogle.golang.org/genproto/googleapis/ads/googleads/v19/errors;errors�GAA�Google.Ads.GoogleAds.V19.Errors�Google\\Ads\\GoogleAds\\V19\\Errors�#Google::Ads::GoogleAds::V19::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

