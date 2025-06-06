<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/keyword_plan.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Keyword Planner plan.
 * Max number of saved keyword plans: 10000.
 * It's possible to remove plans if limit is reached.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.KeywordPlan</code>
 */
class KeywordPlan extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the Keyword Planner plan.
     * KeywordPlan resource names have the form:
     * `customers/{customer_id}/keywordPlans/{kp_plan_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the keyword plan.
     *
     * Generated from protobuf field <code>optional int64 id = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = null;
    /**
     * The name of the keyword plan.
     * This field is required and should not be empty when creating new keyword
     * plans.
     *
     * Generated from protobuf field <code>optional string name = 6;</code>
     */
    protected $name = null;
    /**
     * The date period used for forecasting the plan.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.KeywordPlanForecastPeriod forecast_period = 4;</code>
     */
    protected $forecast_period = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the Keyword Planner plan.
     *           KeywordPlan resource names have the form:
     *           `customers/{customer_id}/keywordPlans/{kp_plan_id}`
     *     @type int|string $id
     *           Output only. The ID of the keyword plan.
     *     @type string $name
     *           The name of the keyword plan.
     *           This field is required and should not be empty when creating new keyword
     *           plans.
     *     @type \Google\Ads\GoogleAds\V20\Resources\KeywordPlanForecastPeriod $forecast_period
     *           The date period used for forecasting the plan.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\KeywordPlan::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the Keyword Planner plan.
     * KeywordPlan resource names have the form:
     * `customers/{customer_id}/keywordPlans/{kp_plan_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the Keyword Planner plan.
     * KeywordPlan resource names have the form:
     * `customers/{customer_id}/keywordPlans/{kp_plan_id}`
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
     * Output only. The ID of the keyword plan.
     *
     * Generated from protobuf field <code>optional int64 id = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getId()
    {
        return isset($this->id) ? $this->id : 0;
    }

    public function hasId()
    {
        return isset($this->id);
    }

    public function clearId()
    {
        unset($this->id);
    }

    /**
     * Output only. The ID of the keyword plan.
     *
     * Generated from protobuf field <code>optional int64 id = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt64($var);
        $this->id = $var;

        return $this;
    }

    /**
     * The name of the keyword plan.
     * This field is required and should not be empty when creating new keyword
     * plans.
     *
     * Generated from protobuf field <code>optional string name = 6;</code>
     * @return string
     */
    public function getName()
    {
        return isset($this->name) ? $this->name : '';
    }

    public function hasName()
    {
        return isset($this->name);
    }

    public function clearName()
    {
        unset($this->name);
    }

    /**
     * The name of the keyword plan.
     * This field is required and should not be empty when creating new keyword
     * plans.
     *
     * Generated from protobuf field <code>optional string name = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * The date period used for forecasting the plan.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.KeywordPlanForecastPeriod forecast_period = 4;</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\KeywordPlanForecastPeriod|null
     */
    public function getForecastPeriod()
    {
        return $this->forecast_period;
    }

    public function hasForecastPeriod()
    {
        return isset($this->forecast_period);
    }

    public function clearForecastPeriod()
    {
        unset($this->forecast_period);
    }

    /**
     * The date period used for forecasting the plan.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.KeywordPlanForecastPeriod forecast_period = 4;</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\KeywordPlanForecastPeriod $var
     * @return $this
     */
    public function setForecastPeriod($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\KeywordPlanForecastPeriod::class);
        $this->forecast_period = $var;

        return $this;
    }

}

