<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/recommendation.proto

namespace Google\Ads\GoogleAds\V20\Resources\Recommendation;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The Target ROAS opt-in recommendation.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.Recommendation.TargetRoasOptInRecommendation</code>
 */
class TargetRoasOptInRecommendation extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The recommended target ROAS (revenue per unit of spend).
     * The value is between 0.01 and 1000.0, inclusive.
     *
     * Generated from protobuf field <code>optional double recommended_target_roas = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $recommended_target_roas = null;
    /**
     * Output only. The minimum campaign budget, in local currency for the
     * account, required to achieve the target ROAS. Amount is specified in
     * micros, where one million is equivalent to one currency unit.
     *
     * Generated from protobuf field <code>optional int64 required_campaign_budget_amount_micros = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $required_campaign_budget_amount_micros = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type float $recommended_target_roas
     *           Output only. The recommended target ROAS (revenue per unit of spend).
     *           The value is between 0.01 and 1000.0, inclusive.
     *     @type int|string $required_campaign_budget_amount_micros
     *           Output only. The minimum campaign budget, in local currency for the
     *           account, required to achieve the target ROAS. Amount is specified in
     *           micros, where one million is equivalent to one currency unit.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\Recommendation::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The recommended target ROAS (revenue per unit of spend).
     * The value is between 0.01 and 1000.0, inclusive.
     *
     * Generated from protobuf field <code>optional double recommended_target_roas = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return float
     */
    public function getRecommendedTargetRoas()
    {
        return isset($this->recommended_target_roas) ? $this->recommended_target_roas : 0.0;
    }

    public function hasRecommendedTargetRoas()
    {
        return isset($this->recommended_target_roas);
    }

    public function clearRecommendedTargetRoas()
    {
        unset($this->recommended_target_roas);
    }

    /**
     * Output only. The recommended target ROAS (revenue per unit of spend).
     * The value is between 0.01 and 1000.0, inclusive.
     *
     * Generated from protobuf field <code>optional double recommended_target_roas = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param float $var
     * @return $this
     */
    public function setRecommendedTargetRoas($var)
    {
        GPBUtil::checkDouble($var);
        $this->recommended_target_roas = $var;

        return $this;
    }

    /**
     * Output only. The minimum campaign budget, in local currency for the
     * account, required to achieve the target ROAS. Amount is specified in
     * micros, where one million is equivalent to one currency unit.
     *
     * Generated from protobuf field <code>optional int64 required_campaign_budget_amount_micros = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getRequiredCampaignBudgetAmountMicros()
    {
        return isset($this->required_campaign_budget_amount_micros) ? $this->required_campaign_budget_amount_micros : 0;
    }

    public function hasRequiredCampaignBudgetAmountMicros()
    {
        return isset($this->required_campaign_budget_amount_micros);
    }

    public function clearRequiredCampaignBudgetAmountMicros()
    {
        unset($this->required_campaign_budget_amount_micros);
    }

    /**
     * Output only. The minimum campaign budget, in local currency for the
     * account, required to achieve the target ROAS. Amount is specified in
     * micros, where one million is equivalent to one currency unit.
     *
     * Generated from protobuf field <code>optional int64 required_campaign_budget_amount_micros = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setRequiredCampaignBudgetAmountMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->required_campaign_budget_amount_micros = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetRoasOptInRecommendation::class, \Google\Ads\GoogleAds\V20\Resources\Recommendation_TargetRoasOptInRecommendation::class);

