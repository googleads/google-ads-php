<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/hotel_performance_view.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A hotel performance view.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.HotelPerformanceView</code>
 */
class HotelPerformanceView extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the hotel performance view.
     * Hotel performance view resource names have the form:
     * `customers/{customer_id}/hotelPerformanceView`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the hotel performance view.
     *           Hotel performance view resource names have the form:
     *           `customers/{customer_id}/hotelPerformanceView`
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\HotelPerformanceView::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the hotel performance view.
     * Hotel performance view resource names have the form:
     * `customers/{customer_id}/hotelPerformanceView`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the hotel performance view.
     * Hotel performance view resource names have the form:
     * `customers/{customer_id}/hotelPerformanceView`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setResourceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->resource_name = $var;

        return $this;
    }

}

