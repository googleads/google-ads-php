<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/audience_insights_attribute.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Metadata associated with a Location attribute.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.LocationAttributeMetadata</code>
 */
class LocationAttributeMetadata extends \Google\Protobuf\Internal\Message
{
    /**
     * The country location that this attribute’s sub country location is located
     * in.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.LocationInfo country_location = 1;</code>
     */
    protected $country_location = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V20\Common\LocationInfo $country_location
     *           The country location that this attribute’s sub country location is located
     *           in.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\AudienceInsightsAttribute::initOnce();
        parent::__construct($data);
    }

    /**
     * The country location that this attribute’s sub country location is located
     * in.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.LocationInfo country_location = 1;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\LocationInfo|null
     */
    public function getCountryLocation()
    {
        return $this->country_location;
    }

    public function hasCountryLocation()
    {
        return isset($this->country_location);
    }

    public function clearCountryLocation()
    {
        unset($this->country_location);
    }

    /**
     * The country location that this attribute’s sub country location is located
     * in.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.LocationInfo country_location = 1;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\LocationInfo $var
     * @return $this
     */
    public function setCountryLocation($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\LocationInfo::class);
        $this->country_location = $var;

        return $this;
    }

}

