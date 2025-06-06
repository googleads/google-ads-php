<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/smart_campaign_setting_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A single operation to update Smart campaign settings for a campaign.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.SmartCampaignSettingOperation</code>
 */
class SmartCampaignSettingOperation extends \Google\Protobuf\Internal\Message
{
    /**
     * Update operation: The Smart campaign setting must specify a valid
     * resource name.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.SmartCampaignSetting update = 1;</code>
     */
    protected $update = null;
    /**
     * FieldMask that determines which resource fields are modified in an update.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2;</code>
     */
    protected $update_mask = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V20\Resources\SmartCampaignSetting $update
     *           Update operation: The Smart campaign setting must specify a valid
     *           resource name.
     *     @type \Google\Protobuf\FieldMask $update_mask
     *           FieldMask that determines which resource fields are modified in an update.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\SmartCampaignSettingService::initOnce();
        parent::__construct($data);
    }

    /**
     * Update operation: The Smart campaign setting must specify a valid
     * resource name.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.SmartCampaignSetting update = 1;</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\SmartCampaignSetting|null
     */
    public function getUpdate()
    {
        return $this->update;
    }

    public function hasUpdate()
    {
        return isset($this->update);
    }

    public function clearUpdate()
    {
        unset($this->update);
    }

    /**
     * Update operation: The Smart campaign setting must specify a valid
     * resource name.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.SmartCampaignSetting update = 1;</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\SmartCampaignSetting $var
     * @return $this
     */
    public function setUpdate($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\SmartCampaignSetting::class);
        $this->update = $var;

        return $this;
    }

    /**
     * FieldMask that determines which resource fields are modified in an update.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2;</code>
     * @return \Google\Protobuf\FieldMask|null
     */
    public function getUpdateMask()
    {
        return $this->update_mask;
    }

    public function hasUpdateMask()
    {
        return isset($this->update_mask);
    }

    public function clearUpdateMask()
    {
        unset($this->update_mask);
    }

    /**
     * FieldMask that determines which resource fields are modified in an update.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2;</code>
     * @param \Google\Protobuf\FieldMask $var
     * @return $this
     */
    public function setUpdateMask($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\FieldMask::class);
        $this->update_mask = $var;

        return $this;
    }

}

