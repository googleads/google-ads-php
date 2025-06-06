<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/bidding.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Target CPM (cost per thousand impressions) is an automated bidding strategy
 * that sets bids to optimize performance given the target CPM you set.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.TargetCpm</code>
 */
class TargetCpm extends \Google\Protobuf\Internal\Message
{
    protected $goal;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V20\Common\TargetCpmTargetFrequencyGoal $target_frequency_goal
     *           Target Frequency bidding goal details.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\Bidding::initOnce();
        parent::__construct($data);
    }

    /**
     * Target Frequency bidding goal details.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.TargetCpmTargetFrequencyGoal target_frequency_goal = 1;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\TargetCpmTargetFrequencyGoal|null
     */
    public function getTargetFrequencyGoal()
    {
        return $this->readOneof(1);
    }

    public function hasTargetFrequencyGoal()
    {
        return $this->hasOneof(1);
    }

    /**
     * Target Frequency bidding goal details.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.TargetCpmTargetFrequencyGoal target_frequency_goal = 1;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\TargetCpmTargetFrequencyGoal $var
     * @return $this
     */
    public function setTargetFrequencyGoal($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\TargetCpmTargetFrequencyGoal::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getGoal()
    {
        return $this->whichOneof("goal");
    }

}

