<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/ad_group.proto

namespace Google\Ads\GoogleAds\V20\Resources\AdGroup\DemandGenAdGroupSettings\DemandGenChannelControls;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Explicitly selected channels for channel controls in Demand Gen ad
 * groups.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.AdGroup.DemandGenAdGroupSettings.DemandGenChannelControls.DemandGenSelectedChannels</code>
 */
class DemandGenSelectedChannels extends \Google\Protobuf\Internal\Message
{
    /**
     * Whether to enable ads on the YouTube In-Stream channel.
     *
     * Generated from protobuf field <code>bool youtube_in_stream = 1;</code>
     */
    protected $youtube_in_stream = false;
    /**
     * Whether to enable ads on the YouTube In-Feed channel.
     *
     * Generated from protobuf field <code>bool youtube_in_feed = 2;</code>
     */
    protected $youtube_in_feed = false;
    /**
     * Whether to enable ads on the YouTube Shorts channel.
     *
     * Generated from protobuf field <code>bool youtube_shorts = 3;</code>
     */
    protected $youtube_shorts = false;
    /**
     * Whether to enable ads on the Discover channel.
     *
     * Generated from protobuf field <code>bool discover = 4;</code>
     */
    protected $discover = false;
    /**
     * Whether to enable ads on the Gmail channel.
     *
     * Generated from protobuf field <code>bool gmail = 5;</code>
     */
    protected $gmail = false;
    /**
     * Whether to enable ads on the Display channel.
     *
     * Generated from protobuf field <code>bool display = 6;</code>
     */
    protected $display = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type bool $youtube_in_stream
     *           Whether to enable ads on the YouTube In-Stream channel.
     *     @type bool $youtube_in_feed
     *           Whether to enable ads on the YouTube In-Feed channel.
     *     @type bool $youtube_shorts
     *           Whether to enable ads on the YouTube Shorts channel.
     *     @type bool $discover
     *           Whether to enable ads on the Discover channel.
     *     @type bool $gmail
     *           Whether to enable ads on the Gmail channel.
     *     @type bool $display
     *           Whether to enable ads on the Display channel.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\AdGroup::initOnce();
        parent::__construct($data);
    }

    /**
     * Whether to enable ads on the YouTube In-Stream channel.
     *
     * Generated from protobuf field <code>bool youtube_in_stream = 1;</code>
     * @return bool
     */
    public function getYoutubeInStream()
    {
        return $this->youtube_in_stream;
    }

    /**
     * Whether to enable ads on the YouTube In-Stream channel.
     *
     * Generated from protobuf field <code>bool youtube_in_stream = 1;</code>
     * @param bool $var
     * @return $this
     */
    public function setYoutubeInStream($var)
    {
        GPBUtil::checkBool($var);
        $this->youtube_in_stream = $var;

        return $this;
    }

    /**
     * Whether to enable ads on the YouTube In-Feed channel.
     *
     * Generated from protobuf field <code>bool youtube_in_feed = 2;</code>
     * @return bool
     */
    public function getYoutubeInFeed()
    {
        return $this->youtube_in_feed;
    }

    /**
     * Whether to enable ads on the YouTube In-Feed channel.
     *
     * Generated from protobuf field <code>bool youtube_in_feed = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setYoutubeInFeed($var)
    {
        GPBUtil::checkBool($var);
        $this->youtube_in_feed = $var;

        return $this;
    }

    /**
     * Whether to enable ads on the YouTube Shorts channel.
     *
     * Generated from protobuf field <code>bool youtube_shorts = 3;</code>
     * @return bool
     */
    public function getYoutubeShorts()
    {
        return $this->youtube_shorts;
    }

    /**
     * Whether to enable ads on the YouTube Shorts channel.
     *
     * Generated from protobuf field <code>bool youtube_shorts = 3;</code>
     * @param bool $var
     * @return $this
     */
    public function setYoutubeShorts($var)
    {
        GPBUtil::checkBool($var);
        $this->youtube_shorts = $var;

        return $this;
    }

    /**
     * Whether to enable ads on the Discover channel.
     *
     * Generated from protobuf field <code>bool discover = 4;</code>
     * @return bool
     */
    public function getDiscover()
    {
        return $this->discover;
    }

    /**
     * Whether to enable ads on the Discover channel.
     *
     * Generated from protobuf field <code>bool discover = 4;</code>
     * @param bool $var
     * @return $this
     */
    public function setDiscover($var)
    {
        GPBUtil::checkBool($var);
        $this->discover = $var;

        return $this;
    }

    /**
     * Whether to enable ads on the Gmail channel.
     *
     * Generated from protobuf field <code>bool gmail = 5;</code>
     * @return bool
     */
    public function getGmail()
    {
        return $this->gmail;
    }

    /**
     * Whether to enable ads on the Gmail channel.
     *
     * Generated from protobuf field <code>bool gmail = 5;</code>
     * @param bool $var
     * @return $this
     */
    public function setGmail($var)
    {
        GPBUtil::checkBool($var);
        $this->gmail = $var;

        return $this;
    }

    /**
     * Whether to enable ads on the Display channel.
     *
     * Generated from protobuf field <code>bool display = 6;</code>
     * @return bool
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * Whether to enable ads on the Display channel.
     *
     * Generated from protobuf field <code>bool display = 6;</code>
     * @param bool $var
     * @return $this
     */
    public function setDisplay($var)
    {
        GPBUtil::checkBool($var);
        $this->display = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DemandGenSelectedChannels::class, \Google\Ads\GoogleAds\V20\Resources\AdGroup_DemandGenAdGroupSettings_DemandGenChannelControls_DemandGenSelectedChannels::class);

