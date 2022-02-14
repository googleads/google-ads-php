<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/resources/accessible_bidding_strategy.proto

namespace Google\Ads\GoogleAds\V10\Resources\AccessibleBiddingStrategy;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An automated bid strategy that sets your bids to help get as many clicks
 * as possible within your budget.
 *
 * Generated from protobuf message <code>google.ads.googleads.v10.resources.AccessibleBiddingStrategy.TargetSpend</code>
 */
class TargetSpend extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The spend target under which to maximize clicks.
     * A TargetSpend bidder will attempt to spend the smaller of this value
     * or the natural throttling spend amount.
     * If not specified, the budget is used as the spend target.
     * This field is deprecated and should no longer be used. See
     * https://ads-developers.googleblog.com/2020/05/reminder-about-sunset-creation-of.html
     * for details.
     *
     * Generated from protobuf field <code>optional int64 target_spend_micros = 1 [deprecated = true, (.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @deprecated
     */
    protected $target_spend_micros = null;
    /**
     * Output only. Maximum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     *
     * Generated from protobuf field <code>optional int64 cpc_bid_ceiling_micros = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $cpc_bid_ceiling_micros = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $target_spend_micros
     *           Output only. The spend target under which to maximize clicks.
     *           A TargetSpend bidder will attempt to spend the smaller of this value
     *           or the natural throttling spend amount.
     *           If not specified, the budget is used as the spend target.
     *           This field is deprecated and should no longer be used. See
     *           https://ads-developers.googleblog.com/2020/05/reminder-about-sunset-creation-of.html
     *           for details.
     *     @type int|string $cpc_bid_ceiling_micros
     *           Output only. Maximum bid limit that can be set by the bid strategy.
     *           The limit applies to all keywords managed by the strategy.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V10\Resources\AccessibleBiddingStrategy::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The spend target under which to maximize clicks.
     * A TargetSpend bidder will attempt to spend the smaller of this value
     * or the natural throttling spend amount.
     * If not specified, the budget is used as the spend target.
     * This field is deprecated and should no longer be used. See
     * https://ads-developers.googleblog.com/2020/05/reminder-about-sunset-creation-of.html
     * for details.
     *
     * Generated from protobuf field <code>optional int64 target_spend_micros = 1 [deprecated = true, (.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     * @deprecated
     */
    public function getTargetSpendMicros()
    {
        @trigger_error('target_spend_micros is deprecated.', E_USER_DEPRECATED);
        return isset($this->target_spend_micros) ? $this->target_spend_micros : 0;
    }

    public function hasTargetSpendMicros()
    {
        @trigger_error('target_spend_micros is deprecated.', E_USER_DEPRECATED);
        return isset($this->target_spend_micros);
    }

    public function clearTargetSpendMicros()
    {
        @trigger_error('target_spend_micros is deprecated.', E_USER_DEPRECATED);
        unset($this->target_spend_micros);
    }

    /**
     * Output only. The spend target under which to maximize clicks.
     * A TargetSpend bidder will attempt to spend the smaller of this value
     * or the natural throttling spend amount.
     * If not specified, the budget is used as the spend target.
     * This field is deprecated and should no longer be used. See
     * https://ads-developers.googleblog.com/2020/05/reminder-about-sunset-creation-of.html
     * for details.
     *
     * Generated from protobuf field <code>optional int64 target_spend_micros = 1 [deprecated = true, (.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     * @deprecated
     */
    public function setTargetSpendMicros($var)
    {
        @trigger_error('target_spend_micros is deprecated.', E_USER_DEPRECATED);
        GPBUtil::checkInt64($var);
        $this->target_spend_micros = $var;

        return $this;
    }

    /**
     * Output only. Maximum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     *
     * Generated from protobuf field <code>optional int64 cpc_bid_ceiling_micros = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getCpcBidCeilingMicros()
    {
        return isset($this->cpc_bid_ceiling_micros) ? $this->cpc_bid_ceiling_micros : 0;
    }

    public function hasCpcBidCeilingMicros()
    {
        return isset($this->cpc_bid_ceiling_micros);
    }

    public function clearCpcBidCeilingMicros()
    {
        unset($this->cpc_bid_ceiling_micros);
    }

    /**
     * Output only. Maximum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     *
     * Generated from protobuf field <code>optional int64 cpc_bid_ceiling_micros = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setCpcBidCeilingMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->cpc_bid_ceiling_micros = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetSpend::class, \Google\Ads\GoogleAds\V10\Resources\AccessibleBiddingStrategy_TargetSpend::class);

