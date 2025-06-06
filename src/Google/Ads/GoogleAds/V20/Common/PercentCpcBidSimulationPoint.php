<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/simulation.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Projected metrics for a specific percent CPC amount. Only Hotel advertising
 * channel type supports this field.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.PercentCpcBidSimulationPoint</code>
 */
class PercentCpcBidSimulationPoint extends \Google\Protobuf\Internal\Message
{
    /**
     * The simulated percent CPC upon which projected metrics are based. Percent
     * CPC expressed as fraction of the advertised price for some good or service.
     * The value stored here is 1,000,000 * [fraction].
     *
     * Generated from protobuf field <code>optional int64 percent_cpc_bid_micros = 1;</code>
     */
    protected $percent_cpc_bid_micros = null;
    /**
     * Projected number of biddable conversions.
     *
     * Generated from protobuf field <code>optional double biddable_conversions = 2;</code>
     */
    protected $biddable_conversions = null;
    /**
     * Projected total value of biddable conversions in local currency.
     *
     * Generated from protobuf field <code>optional double biddable_conversions_value = 3;</code>
     */
    protected $biddable_conversions_value = null;
    /**
     * Projected number of clicks.
     *
     * Generated from protobuf field <code>optional int64 clicks = 4;</code>
     */
    protected $clicks = null;
    /**
     * Projected cost in micros.
     *
     * Generated from protobuf field <code>optional int64 cost_micros = 5;</code>
     */
    protected $cost_micros = null;
    /**
     * Projected number of impressions.
     *
     * Generated from protobuf field <code>optional int64 impressions = 6;</code>
     */
    protected $impressions = null;
    /**
     * Projected number of top slot impressions.
     *
     * Generated from protobuf field <code>optional int64 top_slot_impressions = 7;</code>
     */
    protected $top_slot_impressions = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $percent_cpc_bid_micros
     *           The simulated percent CPC upon which projected metrics are based. Percent
     *           CPC expressed as fraction of the advertised price for some good or service.
     *           The value stored here is 1,000,000 * [fraction].
     *     @type float $biddable_conversions
     *           Projected number of biddable conversions.
     *     @type float $biddable_conversions_value
     *           Projected total value of biddable conversions in local currency.
     *     @type int|string $clicks
     *           Projected number of clicks.
     *     @type int|string $cost_micros
     *           Projected cost in micros.
     *     @type int|string $impressions
     *           Projected number of impressions.
     *     @type int|string $top_slot_impressions
     *           Projected number of top slot impressions.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\Simulation::initOnce();
        parent::__construct($data);
    }

    /**
     * The simulated percent CPC upon which projected metrics are based. Percent
     * CPC expressed as fraction of the advertised price for some good or service.
     * The value stored here is 1,000,000 * [fraction].
     *
     * Generated from protobuf field <code>optional int64 percent_cpc_bid_micros = 1;</code>
     * @return int|string
     */
    public function getPercentCpcBidMicros()
    {
        return isset($this->percent_cpc_bid_micros) ? $this->percent_cpc_bid_micros : 0;
    }

    public function hasPercentCpcBidMicros()
    {
        return isset($this->percent_cpc_bid_micros);
    }

    public function clearPercentCpcBidMicros()
    {
        unset($this->percent_cpc_bid_micros);
    }

    /**
     * The simulated percent CPC upon which projected metrics are based. Percent
     * CPC expressed as fraction of the advertised price for some good or service.
     * The value stored here is 1,000,000 * [fraction].
     *
     * Generated from protobuf field <code>optional int64 percent_cpc_bid_micros = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setPercentCpcBidMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->percent_cpc_bid_micros = $var;

        return $this;
    }

    /**
     * Projected number of biddable conversions.
     *
     * Generated from protobuf field <code>optional double biddable_conversions = 2;</code>
     * @return float
     */
    public function getBiddableConversions()
    {
        return isset($this->biddable_conversions) ? $this->biddable_conversions : 0.0;
    }

    public function hasBiddableConversions()
    {
        return isset($this->biddable_conversions);
    }

    public function clearBiddableConversions()
    {
        unset($this->biddable_conversions);
    }

    /**
     * Projected number of biddable conversions.
     *
     * Generated from protobuf field <code>optional double biddable_conversions = 2;</code>
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
     * Projected total value of biddable conversions in local currency.
     *
     * Generated from protobuf field <code>optional double biddable_conversions_value = 3;</code>
     * @return float
     */
    public function getBiddableConversionsValue()
    {
        return isset($this->biddable_conversions_value) ? $this->biddable_conversions_value : 0.0;
    }

    public function hasBiddableConversionsValue()
    {
        return isset($this->biddable_conversions_value);
    }

    public function clearBiddableConversionsValue()
    {
        unset($this->biddable_conversions_value);
    }

    /**
     * Projected total value of biddable conversions in local currency.
     *
     * Generated from protobuf field <code>optional double biddable_conversions_value = 3;</code>
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
     * Generated from protobuf field <code>optional int64 clicks = 4;</code>
     * @return int|string
     */
    public function getClicks()
    {
        return isset($this->clicks) ? $this->clicks : 0;
    }

    public function hasClicks()
    {
        return isset($this->clicks);
    }

    public function clearClicks()
    {
        unset($this->clicks);
    }

    /**
     * Projected number of clicks.
     *
     * Generated from protobuf field <code>optional int64 clicks = 4;</code>
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
     * Generated from protobuf field <code>optional int64 cost_micros = 5;</code>
     * @return int|string
     */
    public function getCostMicros()
    {
        return isset($this->cost_micros) ? $this->cost_micros : 0;
    }

    public function hasCostMicros()
    {
        return isset($this->cost_micros);
    }

    public function clearCostMicros()
    {
        unset($this->cost_micros);
    }

    /**
     * Projected cost in micros.
     *
     * Generated from protobuf field <code>optional int64 cost_micros = 5;</code>
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
     * Generated from protobuf field <code>optional int64 impressions = 6;</code>
     * @return int|string
     */
    public function getImpressions()
    {
        return isset($this->impressions) ? $this->impressions : 0;
    }

    public function hasImpressions()
    {
        return isset($this->impressions);
    }

    public function clearImpressions()
    {
        unset($this->impressions);
    }

    /**
     * Projected number of impressions.
     *
     * Generated from protobuf field <code>optional int64 impressions = 6;</code>
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
     *
     * Generated from protobuf field <code>optional int64 top_slot_impressions = 7;</code>
     * @return int|string
     */
    public function getTopSlotImpressions()
    {
        return isset($this->top_slot_impressions) ? $this->top_slot_impressions : 0;
    }

    public function hasTopSlotImpressions()
    {
        return isset($this->top_slot_impressions);
    }

    public function clearTopSlotImpressions()
    {
        unset($this->top_slot_impressions);
    }

    /**
     * Projected number of top slot impressions.
     *
     * Generated from protobuf field <code>optional int64 top_slot_impressions = 7;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTopSlotImpressions($var)
    {
        GPBUtil::checkInt64($var);
        $this->top_slot_impressions = $var;

        return $this;
    }

}

