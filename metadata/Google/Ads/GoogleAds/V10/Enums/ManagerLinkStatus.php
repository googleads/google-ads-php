<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/enums/manager_link_status.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Enums;

class ManagerLinkStatus
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
8google/ads/googleads/v10/enums/manager_link_status.protogoogle.ads.googleads.v10.enums"�
ManagerLinkStatusEnum"s
ManagerLinkStatus
UNSPECIFIED 
UNKNOWN

ACTIVE
INACTIVE
PENDING
REFUSED
CANCELEDB�
"com.google.ads.googleads.v10.enumsBManagerLinkStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

