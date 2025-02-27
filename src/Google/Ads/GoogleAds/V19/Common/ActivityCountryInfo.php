<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/criteria.proto

namespace Google\Ads\GoogleAds\V19\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The country where the travel activity is available.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.common.ActivityCountryInfo</code>
 */
class ActivityCountryInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * String value of the activity country. The Geo Target Constant resource
     * name.
     *
     * Generated from protobuf field <code>optional string value = 1;</code>
     */
    protected $value = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $value
     *           String value of the activity country. The Geo Target Constant resource
     *           name.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Common\Criteria::initOnce();
        parent::__construct($data);
    }

    /**
     * String value of the activity country. The Geo Target Constant resource
     * name.
     *
     * Generated from protobuf field <code>optional string value = 1;</code>
     * @return string
     */
    public function getValue()
    {
        return isset($this->value) ? $this->value : '';
    }

    public function hasValue()
    {
        return isset($this->value);
    }

    public function clearValue()
    {
        unset($this->value);
    }

    /**
     * String value of the activity country. The Geo Target Constant resource
     * name.
     *
     * Generated from protobuf field <code>optional string value = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkString($var, True);
        $this->value = $var;

        return $this;
    }

}

