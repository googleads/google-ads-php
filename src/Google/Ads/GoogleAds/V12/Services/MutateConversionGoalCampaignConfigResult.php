<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v12/services/conversion_goal_campaign_config_service.proto

namespace Google\Ads\GoogleAds\V12\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The result for the conversion goal campaign config mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v12.services.MutateConversionGoalCampaignConfigResult</code>
 */
class MutateConversionGoalCampaignConfigResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * The mutated ConversionGoalCampaignConfig with only mutable fields after
     * mutate. The field will only be returned when response_content_type is set
     * to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v12.resources.ConversionGoalCampaignConfig conversion_goal_campaign_config = 2;</code>
     */
    protected $conversion_goal_campaign_config = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Returned for successful operations.
     *     @type \Google\Ads\GoogleAds\V12\Resources\ConversionGoalCampaignConfig $conversion_goal_campaign_config
     *           The mutated ConversionGoalCampaignConfig with only mutable fields after
     *           mutate. The field will only be returned when response_content_type is set
     *           to "MUTABLE_RESOURCE".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V12\Services\ConversionGoalCampaignConfigService::initOnce();
        parent::__construct($data);
    }

    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
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
     * The mutated ConversionGoalCampaignConfig with only mutable fields after
     * mutate. The field will only be returned when response_content_type is set
     * to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v12.resources.ConversionGoalCampaignConfig conversion_goal_campaign_config = 2;</code>
     * @return \Google\Ads\GoogleAds\V12\Resources\ConversionGoalCampaignConfig|null
     */
    public function getConversionGoalCampaignConfig()
    {
        return $this->conversion_goal_campaign_config;
    }

    public function hasConversionGoalCampaignConfig()
    {
        return isset($this->conversion_goal_campaign_config);
    }

    public function clearConversionGoalCampaignConfig()
    {
        unset($this->conversion_goal_campaign_config);
    }

    /**
     * The mutated ConversionGoalCampaignConfig with only mutable fields after
     * mutate. The field will only be returned when response_content_type is set
     * to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v12.resources.ConversionGoalCampaignConfig conversion_goal_campaign_config = 2;</code>
     * @param \Google\Ads\GoogleAds\V12\Resources\ConversionGoalCampaignConfig $var
     * @return $this
     */
    public function setConversionGoalCampaignConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V12\Resources\ConversionGoalCampaignConfig::class);
        $this->conversion_goal_campaign_config = $var;

        return $this;
    }

}

