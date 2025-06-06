<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/audiences.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Custom audience segment.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.CustomAudienceSegment</code>
 */
class CustomAudienceSegment extends \Google\Protobuf\Internal\Message
{
    /**
     * The custom audience resource.
     *
     * Generated from protobuf field <code>optional string custom_audience = 1;</code>
     */
    protected $custom_audience = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $custom_audience
     *           The custom audience resource.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\Audiences::initOnce();
        parent::__construct($data);
    }

    /**
     * The custom audience resource.
     *
     * Generated from protobuf field <code>optional string custom_audience = 1;</code>
     * @return string
     */
    public function getCustomAudience()
    {
        return isset($this->custom_audience) ? $this->custom_audience : '';
    }

    public function hasCustomAudience()
    {
        return isset($this->custom_audience);
    }

    public function clearCustomAudience()
    {
        unset($this->custom_audience);
    }

    /**
     * The custom audience resource.
     *
     * Generated from protobuf field <code>optional string custom_audience = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCustomAudience($var)
    {
        GPBUtil::checkString($var, True);
        $this->custom_audience = $var;

        return $this;
    }

}

