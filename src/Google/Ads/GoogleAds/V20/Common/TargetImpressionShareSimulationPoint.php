<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/simulation.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Projected metrics for a specific target impression share value.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.TargetImpressionShareSimulationPoint</code>
 */
class TargetImpressionShareSimulationPoint extends \Google\Protobuf\Internal\Message
{
    /**
     * The simulated target impression share value (in micros) upon which
     * projected metrics are based.
     * For example, 10% impression share, which is equal to 0.1, is stored as
     * 100_000. This value is validated and will not exceed 1M (100%).
     *
     * Generated from protobuf field <code>int64 target_impression_share_micros = 1;</code>
     */
    protected $target_impression_share_micros = 0;
    /**
     * Projected required daily cpc bid ceiling that the advertiser must set to
     * realize this simulation, in micros of the advertiser currency.
     *
     * Generated from protobuf field <code>int64 required_cpc_bid_ceiling_micros = 2;</code>
     */
    protected $required_cpc_bid_ceiling_micros = 0;
    /**
     * Projected required daily budget that the advertiser must set in order to
     * receive the estimated traffic, in micros of advertiser currency.
     *
     * Generated from protobuf field <code>int64 required_budget_amount_micros = 3;</code>
     */
    protected $required_budget_amount_micros = 0;
    /**
     * Projected number of biddable conversions.
     *
     * Generated from protobuf field <code>double biddable_conversions = 4;</code>
     */
    protected $biddable_conversions = 0.0;
    /**
     * Projected total value of biddable conversions.
     *
     * Generated from protobuf field <code>double biddable_conversions_value = 5;</code>
     */
    protected $biddable_conversions_value = 0.0;
    /**
     * Projected number of clicks.
     *
     * Generated from protobuf field <code>int64 clicks = 6;</code>
     */
    protected $clicks = 0;
    /**
     * Projected cost in micros.
     *
     * Generated from protobuf field <code>int64 cost_micros = 7;</code>
     */
    protected $cost_micros = 0;
    /**
     * Projected number of impressions.
     *
     * Generated from protobuf field <code>int64 impressions = 8;</code>
     */
    protected $impressions = 0;
    /**
     * Projected number of top slot impressions.
     * Only search advertising channel type supports this field.
     *
     * Generated from protobuf field <code>int64 top_slot_impressions = 9;</code>
     */
    protected $top_slot_impressions = 0;
    /**
     * Projected number of absolute top impressions.
     * Only search advertising channel type supports this field.
     *
     * Generated from protobuf field <code>int64 absolute_top_impressions = 10;</code>
     */
    protected $absolute_top_impressions = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $target_impression_share_micros
     *           The simulated target impression share value (in micros) upon which
     *           projected metrics are based.
     *           For example, 10% impression share, which is equal to 0.1, is stored as
     *           100_000. This value is validated and will not exceed 1M (100%).
     *     @type int|string $required_cpc_bid_ceiling_micros
     *           Projected required daily cpc bid ceiling that the advertiser must set to
     *           realize this simulation, in micros of the advertiser currency.
     *     @type int|string $required_budget_amount_micros
     *           Projected required daily budget that the advertiser must set in order to
     *           receive the estimated traffic, in micros of advertiser currency.
     *     @type float $biddable_conversions
     *           Projected number of biddable conversions.
     *     @type float $biddable_conversions_value
     *           Projected total value of biddable conversions.
     *     @type int|string $clicks
     *           Projected number of clicks.
     *     @type int|string $cost_micros
     *           Projected cost in micros.
     *     @type int|string $impressions
     *           Projected number of impressions.
     *     @type int|string $top_slot_impressions
     *           Projected number of top slot impressions.
     *           Only search advertising channel type supports this field.
     *     @type int|string $absolute_top_impressions
     *           Projected number of absolute top impressions.
     *           Only search advertising channel type supports this field.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\Simulation::initOnce();
        parent::__construct($data);
    }

    /**
     * The simulated target impression share value (in micros) upon which
     * projected metrics are based.
     * For example, 10% impression share, which is equal to 0.1, is stored as
     * 100_000. This value is validated and will not exceed 1M (100%).
     *
     * Generated from protobuf field <code>int64 target_impression_share_micros = 1;</code>
     * @return int|string
     */
    public function getTargetImpressionShareMicros()
    {
        return $this->target_impression_share_micros;
    }

    /**
     * The simulated target impression share value (in micros) upon which
     * projected metrics are based.
     * For example, 10% impression share, which is equal to 0.1, is stored as
     * 100_000. This value is validated and will not exceed 1M (100%).
     *
     * Generated from protobuf field <code>int64 target_impression_share_micros = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTargetImpressionShareMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->target_impression_share_micros = $var;

        return $this;
    }

    /**
     * Projected required daily cpc bid ceiling that the advertiser must set to
     * realize this simulation, in micros of the advertiser currency.
     *
     * Generated from protobuf field <code>int64 required_cpc_bid_ceiling_micros = 2;</code>
     * @return int|string
     */
    public function getRequiredCpcBidCeilingMicros()
    {
        return $this->required_cpc_bid_ceiling_micros;
    }

    /**
     * Projected required daily cpc bid ceiling that the advertiser must set to
     * realize this simulation, in micros of the advertiser currency.
     *
     * Generated from protobuf field <code>int64 required_cpc_bid_ceiling_micros = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setRequiredCpcBidCeilingMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->required_cpc_bid_ceiling_micros = $var;

        return $this;
    }

    /**
     * Projected required daily budget that the advertiser must set in order to
     * receive the estimated traffic, in micros of advertiser currency.
     *
     * Generated from protobuf field <code>int64 required_budget_amount_micros = 3;</code>
     * @return int|string
     */
    public function getRequiredBudgetAmountMicros()
    {
        return $this->required_budget_amount_micros;
    }

    /**
     * Projected required daily budget that the advertiser must set in order to
     * receive the estimated traffic, in micros of advertiser currency.
     *
     * Generated from protobuf field <code>int64 required_budget_amount_micros = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setRequiredBudgetAmountMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->required_budget_amount_micros = $var;

        return $this;
    }

    /**
     * Projected number of biddable conversions.
     *
     * Generated from protobuf field <code>double biddable_conversions = 4;</code>
     * @return float
     */
    public function getBiddableConversions()
    {
        return $this->biddable_conversions;
    }

    /**
     * Projected number of biddable conversions.
     *
     * Generated from protobuf field <code>double biddable_conversions = 4;</code>
     * @param float $var
     * @return $this
     */
    public function setBiddableConversions($var)
    {
        GPBUtil::checkDouble($var);
        $this->biddable_conversions = $var;

        return $this;
    }

    /**
     * Projected total value of biddable conversions.
     *
     * Generated from protobuf field <code>double biddable_conversions_value = 5;</code>
     * @return float
     */
    public function getBiddableConversionsValue()
    {
        return $this->biddable_conversions_value;
    }

    /**
     * Projected total value of biddable conversions.
     *
     * Generated from protobuf field <code>double biddable_conversions_value = 5;</code>
     * @param float $var
     * @return $this
     */
    public function setBiddableConversionsValue($var)
    {
        GPBUtil::checkDouble($var);
        $this->biddable_conversions_value = $var;

        return $this;
    }

    /**
     * Projected number of clicks.
     *
     * Generated from protobuf field <code>int64 clicks = 6;</code>
     * @return int|string
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * Projected number of clicks.
     *
     * Generated from protobuf field <code>int64 clicks = 6;</code>
     * @param int|string $var
     * @return $this
     */
    public function setClicks($var)
    {
        GPBUtil::checkInt64($var);
        $this->clicks = $var;

        return $this;
    }

    /**
     * Projected cost in micros.
     *
     * Generated from protobuf field <code>int64 cost_micros = 7;</code>
     * @return int|string
     */
    public function getCostMicros()
    {
        return $this->cost_micros;
    }

    /**
     * Projected cost in micros.
     *
     * Generated from protobuf field <code>int64 cost_micros = 7;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCostMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->cost_micros = $var;

        return $this;
    }

    /**
     * Projected number of impressions.
     *
     * Generated from protobuf field <code>int64 impressions = 8;</code>
     * @return int|string
     */
    public function getImpressions()
    {
        return $this->impressions;
    }

    /**
     * Projected number of impressions.
     *
     * Generated from protobuf field <code>int64 impressions = 8;</code>
     * @param int|string $var
     * @return $this
     */
    public function setImpressions($var)
    {
        GPBUtil::checkInt64($var);
        $this->impressions = $var;

        return $this;
    }

    /**
     * Projected number of top slot impressions.
     * Only search advertising channel type supports this field.
     *
     * Generated from protobuf field <code>int64 top_slot_impressions = 9;</code>
     * @return int|string
     */
    public function getTopSlotImpressions()
    {
        return $this->top_slot_impressions;
    }

    /**
     * Projected number of top slot impressions.
     * Only search advertising channel type supports this field.
     *
     * Generated from protobuf field <code>int64 top_slot_impressions = 9;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTopSlotImpressions($var)
    {
        GPBUtil::checkInt64($var);
        $this->top_slot_impressions = $var;

        return $this;
    }

    /**
     * Projected number of absolute top impressions.
     * Only search advertising channel type supports this field.
     *
     * Generated from protobuf field <code>int64 absolute_top_impressions = 10;</code>
     * @return int|string
     */
    public function getAbsoluteTopImpressions()
    {
        return $this->absolute_top_impressions;
    }

    /**
     * Projected number of absolute top impressions.
     * Only search advertising channel type supports this field.
     *
     * Generated from protobuf field <code>int64 absolute_top_impressions = 10;</code>
     * @param int|string $var
     * @return $this
     */
    public function setAbsoluteTopImpressions($var)
    {
        GPBUtil::checkInt64($var);
        $this->absolute_top_impressions = $var;

        return $this;
    }

}

