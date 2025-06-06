<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/conversion_value_rule.proto

namespace Google\Ads\GoogleAds\V20\Resources\ConversionValueRule;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Range for the itinerary length in number of nights.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleItineraryTravelLength</code>
 */
class ValueRuleItineraryTravelLength extends \Google\Protobuf\Internal\Message
{
    /**
     * Minimum number of nights between the start date and the end date.
     *
     * Generated from protobuf field <code>int32 min_nights = 1;</code>
     */
    protected $min_nights = 0;
    /**
     * Maximum number of days between the start date and the end date.
     *
     * Generated from protobuf field <code>int32 max_nights = 2;</code>
     */
    protected $max_nights = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $min_nights
     *           Minimum number of nights between the start date and the end date.
     *     @type int $max_nights
     *           Maximum number of days between the start date and the end date.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\ConversionValueRule::initOnce();
        parent::__construct($data);
    }

    /**
     * Minimum number of nights between the start date and the end date.
     *
     * Generated from protobuf field <code>int32 min_nights = 1;</code>
     * @return int
     */
    public function getMinNights()
    {
        return $this->min_nights;
    }

    /**
     * Minimum number of nights between the start date and the end date.
     *
     * Generated from protobuf field <code>int32 min_nights = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setMinNights($var)
    {
        GPBUtil::checkInt32($var);
        $this->min_nights = $var;

        return $this;
    }

    /**
     * Maximum number of days between the start date and the end date.
     *
     * Generated from protobuf field <code>int32 max_nights = 2;</code>
     * @return int
     */
    public function getMaxNights()
    {
        return $this->max_nights;
    }

    /**
     * Maximum number of days between the start date and the end date.
     *
     * Generated from protobuf field <code>int32 max_nights = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setMaxNights($var)
    {
        GPBUtil::checkInt32($var);
        $this->max_nights = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ValueRuleItineraryTravelLength::class, \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule_ValueRuleItineraryTravelLength::class);

