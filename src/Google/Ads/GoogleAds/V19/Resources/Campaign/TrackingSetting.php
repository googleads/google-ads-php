<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/campaign.proto

namespace Google\Ads\GoogleAds\V19\Resources\Campaign;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Campaign-level settings for tracking information.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.Campaign.TrackingSetting</code>
 */
class TrackingSetting extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The url used for dynamic tracking.
     *
     * Generated from protobuf field <code>optional string tracking_url = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $tracking_url = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $tracking_url
     *           Output only. The url used for dynamic tracking.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\Campaign::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The url used for dynamic tracking.
     *
     * Generated from protobuf field <code>optional string tracking_url = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getTrackingUrl()
    {
        return isset($this->tracking_url) ? $this->tracking_url : '';
    }

    public function hasTrackingUrl()
    {
        return isset($this->tracking_url);
    }

    public function clearTrackingUrl()
    {
        unset($this->tracking_url);
    }

    /**
     * Output only. The url used for dynamic tracking.
     *
     * Generated from protobuf field <code>optional string tracking_url = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setTrackingUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->tracking_url = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrackingSetting::class, \Google\Ads\GoogleAds\V19\Resources\Campaign_TrackingSetting::class);

