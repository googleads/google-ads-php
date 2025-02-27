<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/data_link.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V19\Resources;

class DataLink
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
5google/ads/googleads/v19/enums/data_link_status.protogoogle.ads.googleads.v19.enums"�
DataLinkStatusEnum"�
DataLinkStatus
UNSPECIFIED 
UNKNOWN
	REQUESTED
PENDING_APPROVAL
ENABLED
DISABLED
REVOKED
REJECTEDB�
"com.google.ads.googleads.v19.enumsBDataLinkStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
3google/ads/googleads/v19/enums/data_link_type.protogoogle.ads.googleads.v19.enums"K
DataLinkTypeEnum"7
DataLinkType
UNSPECIFIED 
UNKNOWN	
VIDEOB�
"com.google.ads.googleads.v19.enumsBDataLinkTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v19/enums;enums�GAA�Google.Ads.GoogleAds.V19.Enums�Google\\Ads\\GoogleAds\\V19\\Enums�"Google::Ads::GoogleAds::V19::Enumsbproto3
�
2google/ads/googleads/v19/resources/data_link.proto"google.ads.googleads.v19.resources3google/ads/googleads/v19/enums/data_link_type.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
DataLink@
resource_name (	B)�A�A#
!googleads.googleapis.com/DataLink!
product_link_id (B�AH�
data_link_id (B�AH�P
type (2=.google.ads.googleads.v19.enums.DataLinkTypeEnum.DataLinkTypeB�AV
status (2A.google.ads.googleads.v19.enums.DataLinkStatusEnum.DataLinkStatusB�AX
youtube_video (2:.google.ads.googleads.v19.resources.YoutubeVideoIdentifierB�AH :j�Ag
!googleads.googleapis.com/DataLinkBcustomers/{customer_id}/dataLinks/{product_link_id}~{data_link_id}B
data_link_entityB
_product_link_idB
_data_link_id"n
YoutubeVideoIdentifier

channel_id (	B�AH �
video_id (	B�AH�B
_channel_idB
	_video_idB�
&com.google.ads.googleads.v19.resourcesBDataLinkProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v19/resources;resources�GAA�"Google.Ads.GoogleAds.V19.Resources�"Google\\Ads\\GoogleAds\\V19\\Resources�&Google::Ads::GoogleAds::V19::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

