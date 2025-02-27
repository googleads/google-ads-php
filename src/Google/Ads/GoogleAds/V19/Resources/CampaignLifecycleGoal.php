<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/campaign_lifecycle_goal.proto

namespace Google\Ads\GoogleAds\V19\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Campaign level customer lifecycle goal settings.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.CampaignLifecycleGoal</code>
 */
class CampaignLifecycleGoal extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the customer lifecycle goal of a campaign.
     * `customers/{customer_id}/campaignLifecycleGoal/{campaign_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The campaign where the goal is attached.
     *
     * Generated from protobuf field <code>string campaign = 2 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $campaign = '';
    /**
     * Output only. The customer acquisition goal settings for the campaign. The
     * customer acquisition goal is described in this article:
     * https://support.google.com/google-ads/answer/12080169
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.CustomerAcquisitionGoalSettings customer_acquisition_goal_settings = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $customer_acquisition_goal_settings = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the customer lifecycle goal of a campaign.
     *           `customers/{customer_id}/campaignLifecycleGoal/{campaign_id}`
     *     @type string $campaign
     *           Output only. The campaign where the goal is attached.
     *     @type \Google\Ads\GoogleAds\V19\Resources\CustomerAcquisitionGoalSettings $customer_acquisition_goal_settings
     *           Output only. The customer acquisition goal settings for the campaign. The
     *           customer acquisition goal is described in this article:
     *           https://support.google.com/google-ads/answer/12080169
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\CampaignLifecycleGoal::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the customer lifecycle goal of a campaign.
     * `customers/{customer_id}/campaignLifecycleGoal/{campaign_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the customer lifecycle goal of a campaign.
     * `customers/{customer_id}/campaignLifecycleGoal/{campaign_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setResourceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->resource_name = $var;

        return $this;
    }

    /**
     * Output only. The campaign where the goal is attached.
     *
     * Generated from protobuf field <code>string campaign = 2 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * Output only. The campaign where the goal is attached.
     *
     * Generated from protobuf field <code>string campaign = 2 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
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
     * Output only. The customer acquisition goal settings for the campaign. The
     * customer acquisition goal is described in this article:
     * https://support.google.com/google-ads/answer/12080169
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.CustomerAcquisitionGoalSettings customer_acquisition_goal_settings = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\CustomerAcquisitionGoalSettings|null
     */
    public function getCustomerAcquisitionGoalSettings()
    {
        return $this->customer_acquisition_goal_settings;
    }

    public function hasCustomerAcquisitionGoalSettings()
    {
        return isset($this->customer_acquisition_goal_settings);
    }

    public function clearCustomerAcquisitionGoalSettings()
    {
        unset($this->customer_acquisition_goal_settings);
    }

    /**
     * Output only. The customer acquisition goal settings for the campaign. The
     * customer acquisition goal is described in this article:
     * https://support.google.com/google-ads/answer/12080169
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.CustomerAcquisitionGoalSettings customer_acquisition_goal_settings = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\CustomerAcquisitionGoalSettings $var
     * @return $this
     */
    public function setCustomerAcquisitionGoalSettings($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\CustomerAcquisitionGoalSettings::class);
        $this->customer_acquisition_goal_settings = $var;

        return $this;
    }

}

