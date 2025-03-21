<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/campaign.proto

namespace Google\Ads\GoogleAds\V19\Resources\Campaign;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Settings for Video campaign.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.Campaign.VideoCampaignSettings</code>
 */
class VideoCampaignSettings extends \Google\Protobuf\Internal\Message
{
    /**
     * Inventory control for responsive ad containers in reach campaigns.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.Campaign.VideoCampaignSettings.VideoAdInventoryControl video_ad_inventory_control = 1;</code>
     */
    protected $video_ad_inventory_control = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V19\Resources\Campaign\VideoCampaignSettings\VideoAdInventoryControl $video_ad_inventory_control
     *           Inventory control for responsive ad containers in reach campaigns.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\Campaign::initOnce();
        parent::__construct($data);
    }

    /**
     * Inventory control for responsive ad containers in reach campaigns.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.Campaign.VideoCampaignSettings.VideoAdInventoryControl video_ad_inventory_control = 1;</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\Campaign\VideoCampaignSettings\VideoAdInventoryControl|null
     */
    public function getVideoAdInventoryControl()
    {
        return $this->video_ad_inventory_control;
    }

    public function hasVideoAdInventoryControl()
    {
        return isset($this->video_ad_inventory_control);
    }

    public function clearVideoAdInventoryControl()
    {
        unset($this->video_ad_inventory_control);
    }

    /**
     * Inventory control for responsive ad containers in reach campaigns.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.Campaign.VideoCampaignSettings.VideoAdInventoryControl video_ad_inventory_control = 1;</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\Campaign\VideoCampaignSettings\VideoAdInventoryControl $var
     * @return $this
     */
    public function setVideoAdInventoryControl($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\Campaign\VideoCampaignSettings\VideoAdInventoryControl::class);
        $this->video_ad_inventory_control = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoCampaignSettings::class, \Google\Ads\GoogleAds\V19\Resources\Campaign_VideoCampaignSettings::class);

