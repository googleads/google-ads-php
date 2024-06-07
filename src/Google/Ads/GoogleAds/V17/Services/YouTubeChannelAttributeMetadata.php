<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/services/audience_insights_service.proto

namespace Google\Ads\GoogleAds\V17\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Metadata associated with a YouTube channel attribute.
 *
 * Generated from protobuf message <code>google.ads.googleads.v17.services.YouTubeChannelAttributeMetadata</code>
 */
class YouTubeChannelAttributeMetadata extends \Google\Protobuf\Internal\Message
{
    /**
     * The approximate number of subscribers to the YouTube channel.
     *
     * Generated from protobuf field <code>int64 subscriber_count = 1;</code>
     */
    protected $subscriber_count = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $subscriber_count
     *           The approximate number of subscribers to the YouTube channel.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V17\Services\AudienceInsightsService::initOnce();
        parent::__construct($data);
    }

    /**
     * The approximate number of subscribers to the YouTube channel.
     *
     * Generated from protobuf field <code>int64 subscriber_count = 1;</code>
     * @return int|string
     */
    public function getSubscriberCount()
    {
        return $this->subscriber_count;
    }

    /**
     * The approximate number of subscribers to the YouTube channel.
     *
     * Generated from protobuf field <code>int64 subscriber_count = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setSubscriberCount($var)
    {
        GPBUtil::checkInt64($var);
        $this->subscriber_count = $var;

        return $this;
    }

}

