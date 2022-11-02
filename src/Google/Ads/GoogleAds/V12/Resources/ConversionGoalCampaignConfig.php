<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v12/resources/conversion_goal_campaign_config.proto

namespace Google\Ads\GoogleAds\V12\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Conversion goal settings for a Campaign.
 *
 * Generated from protobuf message <code>google.ads.googleads.v12.resources.ConversionGoalCampaignConfig</code>
 */
class ConversionGoalCampaignConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the conversion goal campaign config.
     * Conversion goal campaign config resource names have the form:
     * `customers/{customer_id}/conversionGoalCampaignConfigs/{campaign_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Immutable. The campaign with which this conversion goal campaign config is associated.
     *
     * Generated from protobuf field <code>string campaign = 2 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $campaign = '';
    /**
     * The level of goal config the campaign is using.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v12.enums.GoalConfigLevelEnum.GoalConfigLevel goal_config_level = 3;</code>
     */
    protected $goal_config_level = 0;
    /**
     * The custom conversion goal the campaign is using for optimization.
     *
     * Generated from protobuf field <code>string custom_conversion_goal = 4 [(.google.api.resource_reference) = {</code>
     */
    protected $custom_conversion_goal = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the conversion goal campaign config.
     *           Conversion goal campaign config resource names have the form:
     *           `customers/{customer_id}/conversionGoalCampaignConfigs/{campaign_id}`
     *     @type string $campaign
     *           Immutable. The campaign with which this conversion goal campaign config is associated.
     *     @type int $goal_config_level
     *           The level of goal config the campaign is using.
     *     @type string $custom_conversion_goal
     *           The custom conversion goal the campaign is using for optimization.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V12\Resources\ConversionGoalCampaignConfig::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the conversion goal campaign config.
     * Conversion goal campaign config resource names have the form:
     * `customers/{customer_id}/conversionGoalCampaignConfigs/{campaign_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the conversion goal campaign config.
     * Conversion goal campaign config resource names have the form:
     * `customers/{customer_id}/conversionGoalCampaignConfigs/{campaign_id}`
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
     * Immutable. The campaign with which this conversion goal campaign config is associated.
     *
     * Generated from protobuf field <code>string campaign = 2 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * Immutable. The campaign with which this conversion goal campaign config is associated.
     *
     * Generated from protobuf field <code>string campaign = 2 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
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
     * The level of goal config the campaign is using.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v12.enums.GoalConfigLevelEnum.GoalConfigLevel goal_config_level = 3;</code>
     * @return int
     */
    public function getGoalConfigLevel()
    {
        return $this->goal_config_level;
    }

    /**
     * The level of goal config the campaign is using.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v12.enums.GoalConfigLevelEnum.GoalConfigLevel goal_config_level = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setGoalConfigLevel($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V12\Enums\GoalConfigLevelEnum\GoalConfigLevel::class);
        $this->goal_config_level = $var;

        return $this;
    }

    /**
     * The custom conversion goal the campaign is using for optimization.
     *
     * Generated from protobuf field <code>string custom_conversion_goal = 4 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCustomConversionGoal()
    {
        return $this->custom_conversion_goal;
    }

    /**
     * The custom conversion goal the campaign is using for optimization.
     *
     * Generated from protobuf field <code>string custom_conversion_goal = 4 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCustomConversionGoal($var)
    {
        GPBUtil::checkString($var, True);
        $this->custom_conversion_goal = $var;

        return $this;
    }

}

