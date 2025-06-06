<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/carrier_constant.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A carrier criterion that can be used in campaign targeting.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.CarrierConstant</code>
 */
class CarrierConstant extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the carrier criterion.
     * Carrier criterion resource names have the form:
     * `carrierConstants/{criterion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the carrier criterion.
     *
     * Generated from protobuf field <code>optional int64 id = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = null;
    /**
     * Output only. The full name of the carrier in English.
     *
     * Generated from protobuf field <code>optional string name = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $name = null;
    /**
     * Output only. The country code of the country where the carrier is located,
     * for example, "AR", "FR", etc.
     *
     * Generated from protobuf field <code>optional string country_code = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $country_code = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the carrier criterion.
     *           Carrier criterion resource names have the form:
     *           `carrierConstants/{criterion_id}`
     *     @type int|string $id
     *           Output only. The ID of the carrier criterion.
     *     @type string $name
     *           Output only. The full name of the carrier in English.
     *     @type string $country_code
     *           Output only. The country code of the country where the carrier is located,
     *           for example, "AR", "FR", etc.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\CarrierConstant::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the carrier criterion.
     * Carrier criterion resource names have the form:
     * `carrierConstants/{criterion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the carrier criterion.
     * Carrier criterion resource names have the form:
     * `carrierConstants/{criterion_id}`
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

    /**
     * Output only. The ID of the carrier criterion.
     *
     * Generated from protobuf field <code>optional int64 id = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getId()
    {
        return isset($this->id) ? $this->id : 0;
    }

    public function hasId()
    {
        return isset($this->id);
    }

    public function clearId()
    {
        unset($this->id);
    }

    /**
     * Output only. The ID of the carrier criterion.
     *
     * Generated from protobuf field <code>optional int64 id = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt64($var);
        $this->id = $var;

        return $this;
    }

    /**
     * Output only. The full name of the carrier in English.
     *
     * Generated from protobuf field <code>optional string name = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getName()
    {
        return isset($this->name) ? $this->name : '';
    }

    public function hasName()
    {
        return isset($this->name);
    }

    public function clearName()
    {
        unset($this->name);
    }

    /**
     * Output only. The full name of the carrier in English.
     *
     * Generated from protobuf field <code>optional string name = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Output only. The country code of the country where the carrier is located,
     * for example, "AR", "FR", etc.
     *
     * Generated from protobuf field <code>optional string country_code = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getCountryCode()
    {
        return isset($this->country_code) ? $this->country_code : '';
    }

    public function hasCountryCode()
    {
        return isset($this->country_code);
    }

    public function clearCountryCode()
    {
        unset($this->country_code);
    }

    /**
     * Output only. The country code of the country where the carrier is located,
     * for example, "AR", "FR", etc.
     *
     * Generated from protobuf field <code>optional string country_code = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setCountryCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->country_code = $var;

        return $this;
    }

}

