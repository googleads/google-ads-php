<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/campaign.proto

namespace Google\Ads\GoogleAds\V19\Resources\Campaign\VideoCampaignSettings;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * For campaigns using responsive ad containers inventory controls determine
 * on which inventories the ads can be shown. This only applies for
 * campaigns with the bidding strategies TARGET_CPM and FIXED_CPM.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.Campaign.VideoCampaignSettings.VideoAdInventoryControl</code>
 */
class VideoAdInventoryControl extends \Google\Protobuf\Internal\Message
{
    /**
     * Determine if VideoResponsiveAds can be used for in-stream video ads.
     *
     * Generated from protobuf field <code>optional bool allow_in_stream = 1;</code>
     */
    protected $allow_in_stream = null;
    /**
     * Determine if VideoResponsiveAds can be used for in-feed video ads.
     *
     * Generated from protobuf field <code>optional bool allow_in_feed = 2;</code>
     */
    protected $allow_in_feed = null;
    /**
     * Determine if VideoResponsiveAds can be used as shorts format.
     *
     * Generated from protobuf field <code>optional bool allow_shorts = 3;</code>
     */
    protected $allow_shorts = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type bool $allow_in_stream
     *           Determine if VideoResponsiveAds can be used for in-stream video ads.
     *     @type bool $allow_in_feed
     *           Determine if VideoResponsiveAds can be used for in-feed video ads.
     *     @type bool $allow_shorts
     *           Determine if VideoResponsiveAds can be used as shorts format.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\Campaign::initOnce();
        parent::__construct($data);
    }

    /**
     * Determine if VideoResponsiveAds can be used for in-stream video ads.
     *
     * Generated from protobuf field <code>optional bool allow_in_stream = 1;</code>
     * @return bool
     */
    public function getAllowInStream()
    {
        return isset($this->allow_in_stream) ? $this->allow_in_stream : false;
    }

    public function hasAllowInStream()
    {
        return isset($this->allow_in_stream);
    }

    public function clearAllowInStream()
    {
        unset($this->allow_in_stream);
    }

    /**
     * Determine if VideoResponsiveAds can be used for in-stream video ads.
     *
     * Generated from protobuf field <code>optional bool allow_in_stream = 1;</code>
     * @param bool $var
     * @return $this
     */
    public function setAllowInStream($var)
    {
        GPBUtil::checkBool($var);
        $this->allow_in_stream = $var;

        return $this;
    }

    /**
     * Determine if VideoResponsiveAds can be used for in-feed video ads.
     *
     * Generated from protobuf field <code>optional bool allow_in_feed = 2;</code>
     * @return bool
     */
    public function getAllowInFeed()
    {
        return isset($this->allow_in_feed) ? $this->allow_in_feed : false;
    }

    public function hasAllowInFeed()
    {
        return isset($this->allow_in_feed);
    }

    public function clearAllowInFeed()
    {
        unset($this->allow_in_feed);
    }

    /**
     * Determine if VideoResponsiveAds can be used for in-feed video ads.
     *
     * Generated from protobuf field <code>optional bool allow_in_feed = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setAllowInFeed($var)
    {
        GPBUtil::checkBool($var);
        $this->allow_in_feed = $var;

        return $this;
    }

    /**
     * Determine if VideoResponsiveAds can be used as shorts format.
     *
     * Generated from protobuf field <code>optional bool allow_shorts = 3;</code>
     * @return bool
     */
    public function getAllowShorts()
    {
        return isset($this->allow_shorts) ? $this->allow_shorts : false;
    }

    public function hasAllowShorts()
    {
        return isset($this->allow_shorts);
    }

    public function clearAllowShorts()
    {
        unset($this->allow_shorts);
    }

    /**
     * Determine if VideoResponsiveAds can be used as shorts format.
     *
     * Generated from protobuf field <code>optional bool allow_shorts = 3;</code>
     * @param bool $var
     * @return $this
     */
    public function setAllowShorts($var)
    {
        GPBUtil::checkBool($var);
        $this->allow_shorts = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoAdInventoryControl::class, \Google\Ads\GoogleAds\V19\Resources\Campaign_VideoCampaignSettings_VideoAdInventoryControl::class);

