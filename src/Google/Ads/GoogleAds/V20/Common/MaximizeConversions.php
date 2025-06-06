<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/bidding.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An automated bidding strategy to help get the most conversions for your
 * campaigns while spending your budget.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.MaximizeConversions</code>
 */
class MaximizeConversions extends \Google\Protobuf\Internal\Message
{
    /**
     * Maximum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     * Mutable for portfolio bidding strategies only.
     *
     * Generated from protobuf field <code>int64 cpc_bid_ceiling_micros = 2;</code>
     */
    protected $cpc_bid_ceiling_micros = 0;
    /**
     * Minimum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     * Mutable for portfolio bidding strategies only.
     *
     * Generated from protobuf field <code>int64 cpc_bid_floor_micros = 3;</code>
     */
    protected $cpc_bid_floor_micros = 0;
    /**
     * The target cost-per-action (CPA) option. This is the average amount that
     * you would like to spend per conversion action specified in micro units of
     * the bidding strategy's currency. If set, the bid strategy will get as many
     * conversions as possible at or below the target cost-per-action. If the
     * target CPA is not set, the bid strategy will aim to achieve the lowest
     * possible CPA given the budget.
     *
     * Generated from protobuf field <code>int64 target_cpa_micros = 4;</code>
     */
    protected $target_cpa_micros = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $cpc_bid_ceiling_micros
     *           Maximum bid limit that can be set by the bid strategy.
     *           The limit applies to all keywords managed by the strategy.
     *           Mutable for portfolio bidding strategies only.
     *     @type int|string $cpc_bid_floor_micros
     *           Minimum bid limit that can be set by the bid strategy.
     *           The limit applies to all keywords managed by the strategy.
     *           Mutable for portfolio bidding strategies only.
     *     @type int|string $target_cpa_micros
     *           The target cost-per-action (CPA) option. This is the average amount that
     *           you would like to spend per conversion action specified in micro units of
     *           the bidding strategy's currency. If set, the bid strategy will get as many
     *           conversions as possible at or below the target cost-per-action. If the
     *           target CPA is not set, the bid strategy will aim to achieve the lowest
     *           possible CPA given the budget.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\Bidding::initOnce();
        parent::__construct($data);
    }

    /**
     * Maximum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     * Mutable for portfolio bidding strategies only.
     *
     * Generated from protobuf field <code>int64 cpc_bid_ceiling_micros = 2;</code>
     * @return int|string
     */
    public function getCpcBidCeilingMicros()
    {
        return $this->cpc_bid_ceiling_micros;
    }

    /**
     * Maximum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     * Mutable for portfolio bidding strategies only.
     *
     * Generated from protobuf field <code>int64 cpc_bid_ceiling_micros = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCpcBidCeilingMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->cpc_bid_ceiling_micros = $var;

        return $this;
    }

    /**
     * Minimum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     * Mutable for portfolio bidding strategies only.
     *
     * Generated from protobuf field <code>int64 cpc_bid_floor_micros = 3;</code>
     * @return int|string
     */
    public function getCpcBidFloorMicros()
    {
        return $this->cpc_bid_floor_micros;
    }

    /**
     * Minimum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     * Mutable for portfolio bidding strategies only.
     *
     * Generated from protobuf field <code>int64 cpc_bid_floor_micros = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCpcBidFloorMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->cpc_bid_floor_micros = $var;

        return $this;
    }

    /**
     * The target cost-per-action (CPA) option. This is the average amount that
     * you would like to spend per conversion action specified in micro units of
     * the bidding strategy's currency. If set, the bid strategy will get as many
     * conversions as possible at or below the target cost-per-action. If the
     * target CPA is not set, the bid strategy will aim to achieve the lowest
     * possible CPA given the budget.
     *
     * Generated from protobuf field <code>int64 target_cpa_micros = 4;</code>
     * @return int|string
     */
    public function getTargetCpaMicros()
    {
        return $this->target_cpa_micros;
    }

    /**
     * The target cost-per-action (CPA) option. This is the average amount that
     * you would like to spend per conversion action specified in micro units of
     * the bidding strategy's currency. If set, the bid strategy will get as many
     * conversions as possible at or below the target cost-per-action. If the
     * target CPA is not set, the bid strategy will aim to achieve the lowest
     * possible CPA given the budget.
     *
     * Generated from protobuf field <code>int64 target_cpa_micros = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTargetCpaMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->target_cpa_micros = $var;

        return $this;
    }

}

