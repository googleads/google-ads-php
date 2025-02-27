<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/bidding_strategy_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The result for the bidding strategy mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.MutateBiddingStrategyResult</code>
 */
class MutateBiddingStrategyResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * The mutated bidding strategy with only mutable fields after mutate. The
     * field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.BiddingStrategy bidding_strategy = 2;</code>
     */
    protected $bidding_strategy = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Returned for successful operations.
     *     @type \Google\Ads\GoogleAds\V19\Resources\BiddingStrategy $bidding_strategy
     *           The mutated bidding strategy with only mutable fields after mutate. The
     *           field will only be returned when response_content_type is set to
     *           "MUTABLE_RESOURCE".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\BiddingStrategyService::initOnce();
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
     * The mutated bidding strategy with only mutable fields after mutate. The
     * field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.BiddingStrategy bidding_strategy = 2;</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\BiddingStrategy|null
     */
    public function getBiddingStrategy()
    {
        return $this->bidding_strategy;
    }

    public function hasBiddingStrategy()
    {
        return isset($this->bidding_strategy);
    }

    public function clearBiddingStrategy()
    {
        unset($this->bidding_strategy);
    }

    /**
     * The mutated bidding strategy with only mutable fields after mutate. The
     * field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.BiddingStrategy bidding_strategy = 2;</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\BiddingStrategy $var
     * @return $this
     */
    public function setBiddingStrategy($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\BiddingStrategy::class);
        $this->bidding_strategy = $var;

        return $this;
    }

}

