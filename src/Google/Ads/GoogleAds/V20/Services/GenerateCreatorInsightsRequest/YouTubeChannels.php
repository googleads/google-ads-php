<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/content_creator_insights_service.proto

namespace Google\Ads\GoogleAds\V20\Services\GenerateCreatorInsightsRequest;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A collection of YouTube Channels.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.GenerateCreatorInsightsRequest.YouTubeChannels</code>
 */
class YouTubeChannels extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. The YouTube Channel IDs to fetch creator insights for.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.YouTubeChannelInfo youtube_channels = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $youtube_channels;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V20\Common\YouTubeChannelInfo>|\Google\Protobuf\Internal\RepeatedField $youtube_channels
     *           Optional. The YouTube Channel IDs to fetch creator insights for.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\ContentCreatorInsightsService::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. The YouTube Channel IDs to fetch creator insights for.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.YouTubeChannelInfo youtube_channels = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getYoutubeChannels()
    {
        return $this->youtube_channels;
    }

    /**
     * Optional. The YouTube Channel IDs to fetch creator insights for.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.YouTubeChannelInfo youtube_channels = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\YouTubeChannelInfo>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setYoutubeChannels($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\YouTubeChannelInfo::class);
        $this->youtube_channels = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YouTubeChannels::class, \Google\Ads\GoogleAds\V20\Services\GenerateCreatorInsightsRequest_YouTubeChannels::class);

