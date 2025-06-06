<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/recommendation_service.proto

namespace Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Parameters to use when applying a Target ROAS opt-in recommendation.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.ApplyRecommendationOperation.TargetRoasOptInParameters</code>
 */
class TargetRoasOptInParameters extends \Google\Protobuf\Internal\Message
{
    /**
     * Average ROAS (revenue per unit of spend) to use for Target ROAS bidding
     * strategy. The value is between 0.01 and 1000.0, inclusive. This is a
     * required field, unless new_campaign_budget_amount_micros is set.
     *
     * Generated from protobuf field <code>optional double target_roas = 1;</code>
     */
    protected $target_roas = null;
    /**
     * Optional, budget amount to set for the campaign.
     *
     * Generated from protobuf field <code>optional int64 new_campaign_budget_amount_micros = 2;</code>
     */
    protected $new_campaign_budget_amount_micros = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type float $target_roas
     *           Average ROAS (revenue per unit of spend) to use for Target ROAS bidding
     *           strategy. The value is between 0.01 and 1000.0, inclusive. This is a
     *           required field, unless new_campaign_budget_amount_micros is set.
     *     @type int|string $new_campaign_budget_amount_micros
     *           Optional, budget amount to set for the campaign.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\RecommendationService::initOnce();
        parent::__construct($data);
    }

    /**
     * Average ROAS (revenue per unit of spend) to use for Target ROAS bidding
     * strategy. The value is between 0.01 and 1000.0, inclusive. This is a
     * required field, unless new_campaign_budget_amount_micros is set.
     *
     * Generated from protobuf field <code>optional double target_roas = 1;</code>
     * @return float
     */
    public function getTargetRoas()
    {
        return isset($this->target_roas) ? $this->target_roas : 0.0;
    }

    public function hasTargetRoas()
    {
        return isset($this->target_roas);
    }

    public function clearTargetRoas()
    {
        unset($this->target_roas);
    }

    /**
     * Average ROAS (revenue per unit of spend) to use for Target ROAS bidding
     * strategy. The value is between 0.01 and 1000.0, inclusive. This is a
     * required field, unless new_campaign_budget_amount_micros is set.
     *
     * Generated from protobuf field <code>optional double target_roas = 1;</code>
     * @param float $var
     * @return $this
     */
    public function setTargetRoas($var)
    {
        GPBUtil::checkDouble($var);
        $this->target_roas = $var;

        return $this;
    }

    /**
     * Optional, budget amount to set for the campaign.
     *
     * Generated from protobuf field <code>optional int64 new_campaign_budget_amount_micros = 2;</code>
     * @return int|string
     */
    public function getNewCampaignBudgetAmountMicros()
    {
        return isset($this->new_campaign_budget_amount_micros) ? $this->new_campaign_budget_amount_micros : 0;
    }

    public function hasNewCampaignBudgetAmountMicros()
    {
        return isset($this->new_campaign_budget_amount_micros);
    }

    public function clearNewCampaignBudgetAmountMicros()
    {
        unset($this->new_campaign_budget_amount_micros);
    }

    /**
     * Optional, budget amount to set for the campaign.
     *
     * Generated from protobuf field <code>optional int64 new_campaign_budget_amount_micros = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setNewCampaignBudgetAmountMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->new_campaign_budget_amount_micros = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetRoasOptInParameters::class, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation_TargetRoasOptInParameters::class);

