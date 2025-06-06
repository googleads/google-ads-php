<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/criteria.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An IpBlock criterion used for IP exclusions. We allow:
 *  - IPv4 and IPv6 addresses
 *  - individual addresses (192.168.0.1)
 *  - masks for individual addresses (192.168.0.1/32)
 *  - masks for Class C networks (192.168.0.1/24)
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.IpBlockInfo</code>
 */
class IpBlockInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * The IP address of this IP block.
     *
     * Generated from protobuf field <code>optional string ip_address = 2;</code>
     */
    protected $ip_address = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $ip_address
     *           The IP address of this IP block.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\Criteria::initOnce();
        parent::__construct($data);
    }

    /**
     * The IP address of this IP block.
     *
     * Generated from protobuf field <code>optional string ip_address = 2;</code>
     * @return string
     */
    public function getIpAddress()
    {
        return isset($this->ip_address) ? $this->ip_address : '';
    }

    public function hasIpAddress()
    {
        return isset($this->ip_address);
    }

    public function clearIpAddress()
    {
        unset($this->ip_address);
    }

    /**
     * The IP address of this IP block.
     *
     * Generated from protobuf field <code>optional string ip_address = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setIpAddress($var)
    {
        GPBUtil::checkString($var, True);
        $this->ip_address = $var;

        return $this;
    }

}

