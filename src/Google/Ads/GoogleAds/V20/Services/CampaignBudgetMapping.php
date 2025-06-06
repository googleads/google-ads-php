<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/experiment_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The mapping of experiment campaign and budget to be graduated.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.CampaignBudgetMapping</code>
 */
class CampaignBudgetMapping extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The experiment campaign to graduate.
     *
     * Generated from protobuf field <code>string experiment_campaign = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    protected $experiment_campaign = '';
    /**
     * Required. The budget that should be attached to the graduating experiment
     * campaign.
     *
     * Generated from protobuf field <code>string campaign_budget = 2 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    protected $campaign_budget = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $experiment_campaign
     *           Required. The experiment campaign to graduate.
     *     @type string $campaign_budget
     *           Required. The budget that should be attached to the graduating experiment
     *           campaign.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\ExperimentService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The experiment campaign to graduate.
     *
     * Generated from protobuf field <code>string experiment_campaign = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getExperimentCampaign()
    {
        return $this->experiment_campaign;
    }

    /**
     * Required. The experiment campaign to graduate.
     *
     * Generated from protobuf field <code>string experiment_campaign = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setExperimentCampaign($var)
    {
        GPBUtil::checkString($var, True);
        $this->experiment_campaign = $var;

        return $this;
    }

    /**
     * Required. The budget that should be attached to the graduating experiment
     * campaign.
     *
     * Generated from protobuf field <code>string campaign_budget = 2 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCampaignBudget()
    {
        return $this->campaign_budget;
    }

    /**
     * Required. The budget that should be attached to the graduating experiment
     * campaign.
     *
     * Generated from protobuf field <code>string campaign_budget = 2 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCampaignBudget($var)
    {
        GPBUtil::checkString($var, True);
        $this->campaign_budget = $var;

        return $this;
    }

}

