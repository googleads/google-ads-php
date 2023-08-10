<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v14/services/feed_item_set_link_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V14\Services;

class FeedItemSetLinkService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
;google/ads/googleads/v14/resources/feed_item_set_link.proto"google.ads.googleads.v14.resourcesgoogle/api/resource.proto"�
FeedItemSetLinkG
resource_name (	B0�A�A*
(googleads.googleapis.com/FeedItemSetLink<
	feed_item (	B)�A�A#
!googleads.googleapis.com/FeedItemC
feed_item_set (	B,�A�A&
$googleads.googleapis.com/FeedItemSet:��A�
(googleads.googleapis.com/FeedItemSetLinkTcustomers/{customer_id}/feedItemSetLinks/{feed_id}~{feed_item_set_id}~{feed_item_id}B�
&com.google.ads.googleads.v14.resourcesBFeedItemSetLinkProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v14/resources;resources�GAA�"Google.Ads.GoogleAds.V14.Resources�"Google\\Ads\\GoogleAds\\V14\\Resources�&Google::Ads::GoogleAds::V14::Resourcesbproto3
�
Bgoogle/ads/googleads/v14/services/feed_item_set_link_service.proto!google.ads.googleads.v14.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/rpc/status.proto"�
MutateFeedItemSetLinksRequest
customer_id (	B�AT

operations (2;.google.ads.googleads.v14.services.FeedItemSetLinkOperationB�A
partial_failure (
validate_only ("�
FeedItemSetLinkOperationE
create (23.google.ads.googleads.v14.resources.FeedItemSetLinkH ?
remove (	B-�A*
(googleads.googleapis.com/FeedItemSetLinkH B
	operation"�
MutateFeedItemSetLinksResponseO
results (2>.google.ads.googleads.v14.services.MutateFeedItemSetLinkResult1
partial_failure_error (2.google.rpc.Status"c
MutateFeedItemSetLinkResultD
resource_name (	B-�A*
(googleads.googleapis.com/FeedItemSetLink2�
FeedItemSetLinkService�
MutateFeedItemSetLinks@.google.ads.googleads.v14.services.MutateFeedItemSetLinksRequestA.google.ads.googleads.v14.services.MutateFeedItemSetLinksResponse"Z���;"6/v14/customers/{customer_id=*}/feedItemSetLinks:mutate:*�Acustomer_id,operationsE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v14.servicesBFeedItemSetLinkServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v14/services;services�GAA�!Google.Ads.GoogleAds.V14.Services�!Google\\Ads\\GoogleAds\\V14\\Services�%Google::Ads::GoogleAds::V14::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

