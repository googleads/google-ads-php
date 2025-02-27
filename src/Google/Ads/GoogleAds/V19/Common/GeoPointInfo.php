<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/criteria.proto

namespace Google\Ads\GoogleAds\V19\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Geo point for proximity criterion.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.common.GeoPointInfo</code>
 */
class GeoPointInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Micro degrees for the longitude.
     *
     * Generated from protobuf field <code>optional int32 longitude_in_micro_degrees = 3;</code>
     */
    protected $longitude_in_micro_degrees = null;
    /**
     * Micro degrees for the latitude.
     *
     * Generated from protobuf field <code>optional int32 latitude_in_micro_degrees = 4;</code>
     */
    protected $latitude_in_micro_degrees = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $longitude_in_micro_degrees
     *           Micro degrees for the longitude.
     *     @type int $latitude_in_micro_degrees
     *           Micro degrees for the latitude.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Common\Criteria::initOnce();
        parent::__construct($data);
    }

    /**
     * Micro degrees for the longitude.
     *
     * Generated from protobuf field <code>optional int32 longitude_in_micro_degrees = 3;</code>
     * @return int
     */
    public function getLongitudeInMicroDegrees()
    {
        return isset($this->longitude_in_micro_degrees) ? $this->longitude_in_micro_degrees : 0;
    }

    public function hasLongitudeInMicroDegrees()
    {
        return isset($this->longitude_in_micro_degrees);
    }

    public function clearLongitudeInMicroDegrees()
    {
        unset($this->longitude_in_micro_degrees);
    }

    /**
     * Micro degrees for the longitude.
     *
     * Generated from protobuf field <code>optional int32 longitude_in_micro_degrees = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setLongitudeInMicroDegrees($var)
    {
        GPBUtil::checkInt32($var);
        $this->longitude_in_micro_degrees = $var;

        return $this;
    }

    /**
     * Micro degrees for the latitude.
     *
     * Generated from protobuf field <code>optional int32 latitude_in_micro_degrees = 4;</code>
     * @return int
     */
    public function getLatitudeInMicroDegrees()
    {
        return isset($this->latitude_in_micro_degrees) ? $this->latitude_in_micro_degrees : 0;
    }

    public function hasLatitudeInMicroDegrees()
    {
        return isset($this->latitude_in_micro_degrees);
    }

    public function clearLatitudeInMicroDegrees()
    {
        unset($this->latitude_in_micro_degrees);
    }

    /**
     * Micro degrees for the latitude.
     *
     * Generated from protobuf field <code>optional int32 latitude_in_micro_degrees = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setLatitudeInMicroDegrees($var)
    {
        GPBUtil::checkInt32($var);
        $this->latitude_in_micro_degrees = $var;

        return $this;
    }

}

