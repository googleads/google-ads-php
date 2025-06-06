<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/campaign_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A single enablement result of a campaign.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.EnablementResult</code>
 */
class EnablementResult extends \Google\Protobuf\Internal\Message
{
    /**
     * This indicates the campaign for which enablement was tried, regardless of
     * the outcome.
     *
     * Generated from protobuf field <code>string campaign = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $campaign = '';
    /**
     * Details of the error when enablement fails.
     *
     * Generated from protobuf field <code>.google.rpc.Status enablement_error = 2;</code>
     */
    protected $enablement_error = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $campaign
     *           This indicates the campaign for which enablement was tried, regardless of
     *           the outcome.
     *     @type \Google\Rpc\Status $enablement_error
     *           Details of the error when enablement fails.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\CampaignService::initOnce();
        parent::__construct($data);
    }

    /**
     * This indicates the campaign for which enablement was tried, regardless of
     * the outcome.
     *
     * Generated from protobuf field <code>string campaign = 1 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * This indicates the campaign for which enablement was tried, regardless of
     * the outcome.
     *
     * Generated from protobuf field <code>string campaign = 1 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCampaign($var)
    {
        GPBUtil::checkString($var, True);
        $this->campaign = $var;

        return $this;
    }

    /**
     * Details of the error when enablement fails.
     *
     * Generated from protobuf field <code>.google.rpc.Status enablement_error = 2;</code>
     * @return \Google\Rpc\Status|null
     */
    public function getEnablementError()
    {
        return $this->enablement_error;
    }

    public function hasEnablementError()
    {
        return isset($this->enablement_error);
    }

    public function clearEnablementError()
    {
        unset($this->enablement_error);
    }

    /**
     * Details of the error when enablement fails.
     *
     * Generated from protobuf field <code>.google.rpc.Status enablement_error = 2;</code>
     * @param \Google\Rpc\Status $var
     * @return $this
     */
    public function setEnablementError($var)
    {
        GPBUtil::checkMessage($var, \Google\Rpc\Status::class);
        $this->enablement_error = $var;

        return $this;
    }

}

