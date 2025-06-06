<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/simulation.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A container for simulation points for simulations of type TARGET_CPA.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.TargetCpaSimulationPointList</code>
 */
class TargetCpaSimulationPointList extends \Google\Protobuf\Internal\Message
{
    /**
     * Projected metrics for a series of target CPA amounts.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.TargetCpaSimulationPoint points = 1;</code>
     */
    private $points;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V20\Common\TargetCpaSimulationPoint>|\Google\Protobuf\Internal\RepeatedField $points
     *           Projected metrics for a series of target CPA amounts.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\Simulation::initOnce();
        parent::__construct($data);
    }

    /**
     * Projected metrics for a series of target CPA amounts.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.TargetCpaSimulationPoint points = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Projected metrics for a series of target CPA amounts.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.TargetCpaSimulationPoint points = 1;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\TargetCpaSimulationPoint>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setPoints($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\TargetCpaSimulationPoint::class);
        $this->points = $arr;

        return $this;
    }

}

