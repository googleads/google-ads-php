<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/ad_type_infos.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An expanded dynamic search ad.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.ExpandedDynamicSearchAdInfo</code>
 */
class ExpandedDynamicSearchAdInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * The description of the ad.
     *
     * Generated from protobuf field <code>optional string description = 3;</code>
     */
    protected $description = null;
    /**
     * The second description of the ad.
     *
     * Generated from protobuf field <code>optional string description2 = 4;</code>
     */
    protected $description2 = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $description
     *           The description of the ad.
     *     @type string $description2
     *           The second description of the ad.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\AdTypeInfos::initOnce();
        parent::__construct($data);
    }

    /**
     * The description of the ad.
     *
     * Generated from protobuf field <code>optional string description = 3;</code>
     * @return string
     */
    public function getDescription()
    {
        return isset($this->description) ? $this->description : '';
    }

    public function hasDescription()
    {
        return isset($this->description);
    }

    public function clearDescription()
    {
        unset($this->description);
    }

    /**
     * The description of the ad.
     *
     * Generated from protobuf field <code>optional string description = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * The second description of the ad.
     *
     * Generated from protobuf field <code>optional string description2 = 4;</code>
     * @return string
     */
    public function getDescription2()
    {
        return isset($this->description2) ? $this->description2 : '';
    }

    public function hasDescription2()
    {
        return isset($this->description2);
    }

    public function clearDescription2()
    {
        unset($this->description2);
    }

    /**
     * The second description of the ad.
     *
     * Generated from protobuf field <code>optional string description2 = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription2($var)
    {
        GPBUtil::checkString($var, True);
        $this->description2 = $var;

        return $this;
    }

}

