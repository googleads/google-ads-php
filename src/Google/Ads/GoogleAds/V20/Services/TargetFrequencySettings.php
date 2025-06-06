<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/reach_plan_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Target Frequency settings for a supported product.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.TargetFrequencySettings</code>
 */
class TargetFrequencySettings extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The time unit used to describe the time frame for
     * target_frequency.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.TargetFrequencyTimeUnitEnum.TargetFrequencyTimeUnit time_unit = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $time_unit = 0;
    /**
     * Required. The target frequency goal per selected time unit.
     *
     * Generated from protobuf field <code>int32 target_frequency = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $target_frequency = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $time_unit
     *           Required. The time unit used to describe the time frame for
     *           target_frequency.
     *     @type int $target_frequency
     *           Required. The target frequency goal per selected time unit.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\ReachPlanService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The time unit used to describe the time frame for
     * target_frequency.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.TargetFrequencyTimeUnitEnum.TargetFrequencyTimeUnit time_unit = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getTimeUnit()
    {
        return $this->time_unit;
    }

    /**
     * Required. The time unit used to describe the time frame for
     * target_frequency.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.TargetFrequencyTimeUnitEnum.TargetFrequencyTimeUnit time_unit = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setTimeUnit($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\TargetFrequencyTimeUnitEnum\TargetFrequencyTimeUnit::class);
        $this->time_unit = $var;

        return $this;
    }

    /**
     * Required. The target frequency goal per selected time unit.
     *
     * Generated from protobuf field <code>int32 target_frequency = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getTargetFrequency()
    {
        return $this->target_frequency;
    }

    /**
     * Required. The target frequency goal per selected time unit.
     *
     * Generated from protobuf field <code>int32 target_frequency = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setTargetFrequency($var)
    {
        GPBUtil::checkInt32($var);
        $this->target_frequency = $var;

        return $this;
    }

}

