<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/conversion_value_rule.proto

namespace Google\Ads\GoogleAds\V19\Resources\ConversionValueRule;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Condition on Itinerary dimension.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.ConversionValueRule.ValueRuleItineraryCondition</code>
 */
class ValueRuleItineraryCondition extends \Google\Protobuf\Internal\Message
{
    /**
     * Range for the number of days between the date of the booking and the
     * start of the itinerary.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionValueRule.ValueRuleItineraryAdvanceBookingWindow advance_booking_window = 1;</code>
     */
    protected $advance_booking_window = null;
    /**
     * Range for the itinerary length in number of nights.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionValueRule.ValueRuleItineraryTravelLength travel_length = 2;</code>
     */
    protected $travel_length = null;
    /**
     * The days of the week on which this itinerary's travel can start.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionValueRule.ValueRuleItineraryTravelStartDay travel_start_day = 3;</code>
     */
    protected $travel_start_day = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V19\Resources\ConversionValueRule\ValueRuleItineraryAdvanceBookingWindow $advance_booking_window
     *           Range for the number of days between the date of the booking and the
     *           start of the itinerary.
     *     @type \Google\Ads\GoogleAds\V19\Resources\ConversionValueRule\ValueRuleItineraryTravelLength $travel_length
     *           Range for the itinerary length in number of nights.
     *     @type \Google\Ads\GoogleAds\V19\Resources\ConversionValueRule\ValueRuleItineraryTravelStartDay $travel_start_day
     *           The days of the week on which this itinerary's travel can start.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\ConversionValueRule::initOnce();
        parent::__construct($data);
    }

    /**
     * Range for the number of days between the date of the booking and the
     * start of the itinerary.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionValueRule.ValueRuleItineraryAdvanceBookingWindow advance_booking_window = 1;</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\ConversionValueRule\ValueRuleItineraryAdvanceBookingWindow|null
     */
    public function getAdvanceBookingWindow()
    {
        return $this->advance_booking_window;
    }

    public function hasAdvanceBookingWindow()
    {
        return isset($this->advance_booking_window);
    }

    public function clearAdvanceBookingWindow()
    {
        unset($this->advance_booking_window);
    }

    /**
     * Range for the number of days between the date of the booking and the
     * start of the itinerary.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionValueRule.ValueRuleItineraryAdvanceBookingWindow advance_booking_window = 1;</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\ConversionValueRule\ValueRuleItineraryAdvanceBookingWindow $var
     * @return $this
     */
    public function setAdvanceBookingWindow($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\ConversionValueRule\ValueRuleItineraryAdvanceBookingWindow::class);
        $this->advance_booking_window = $var;

        return $this;
    }

    /**
     * Range for the itinerary length in number of nights.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionValueRule.ValueRuleItineraryTravelLength travel_length = 2;</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\ConversionValueRule\ValueRuleItineraryTravelLength|null
     */
    public function getTravelLength()
    {
        return $this->travel_length;
    }

    public function hasTravelLength()
    {
        return isset($this->travel_length);
    }

    public function clearTravelLength()
    {
        unset($this->travel_length);
    }

    /**
     * Range for the itinerary length in number of nights.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionValueRule.ValueRuleItineraryTravelLength travel_length = 2;</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\ConversionValueRule\ValueRuleItineraryTravelLength $var
     * @return $this
     */
    public function setTravelLength($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\ConversionValueRule\ValueRuleItineraryTravelLength::class);
        $this->travel_length = $var;

        return $this;
    }

    /**
     * The days of the week on which this itinerary's travel can start.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionValueRule.ValueRuleItineraryTravelStartDay travel_start_day = 3;</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\ConversionValueRule\ValueRuleItineraryTravelStartDay|null
     */
    public function getTravelStartDay()
    {
        return $this->travel_start_day;
    }

    public function hasTravelStartDay()
    {
        return isset($this->travel_start_day);
    }

    public function clearTravelStartDay()
    {
        unset($this->travel_start_day);
    }

    /**
     * The days of the week on which this itinerary's travel can start.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionValueRule.ValueRuleItineraryTravelStartDay travel_start_day = 3;</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\ConversionValueRule\ValueRuleItineraryTravelStartDay $var
     * @return $this
     */
    public function setTravelStartDay($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\ConversionValueRule\ValueRuleItineraryTravelStartDay::class);
        $this->travel_start_day = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ValueRuleItineraryCondition::class, \Google\Ads\GoogleAds\V19\Resources\ConversionValueRule_ValueRuleItineraryCondition::class);

