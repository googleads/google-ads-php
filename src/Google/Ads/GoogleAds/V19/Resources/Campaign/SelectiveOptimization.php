<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/campaign.proto

namespace Google\Ads\GoogleAds\V19\Resources\Campaign;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Selective optimization setting for this campaign, which includes a set of
 * conversion actions to optimize this campaign towards.
 * This feature only applies to app campaigns that use MULTI_CHANNEL as
 * AdvertisingChannelType and APP_CAMPAIGN or APP_CAMPAIGN_FOR_ENGAGEMENT as
 * AdvertisingChannelSubType.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.Campaign.SelectiveOptimization</code>
 */
class SelectiveOptimization extends \Google\Protobuf\Internal\Message
{
    /**
     * The selected set of resource names for conversion actions for optimizing
     * this campaign.
     *
     * Generated from protobuf field <code>repeated string conversion_actions = 2 [(.google.api.resource_reference) = {</code>
     */
    private $conversion_actions;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $conversion_actions
     *           The selected set of resource names for conversion actions for optimizing
     *           this campaign.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\Campaign::initOnce();
        parent::__construct($data);
    }

    /**
     * The selected set of resource names for conversion actions for optimizing
     * this campaign.
     *
     * Generated from protobuf field <code>repeated string conversion_actions = 2 [(.google.api.resource_reference) = {</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getConversionActions()
    {
        return $this->conversion_actions;
    }

    /**
     * The selected set of resource names for conversion actions for optimizing
     * this campaign.
     *
     * Generated from protobuf field <code>repeated string conversion_actions = 2 [(.google.api.resource_reference) = {</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setConversionActions($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->conversion_actions = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SelectiveOptimization::class, \Google\Ads\GoogleAds\V19\Resources\Campaign_SelectiveOptimization::class);

