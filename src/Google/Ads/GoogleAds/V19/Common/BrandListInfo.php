<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/criteria.proto

namespace Google\Ads\GoogleAds\V19\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Brand List Criterion is used to specify a list of brands.  The list is
 * represented as a SharedSet id type BRAND_HINT. A criterion of this type can
 * be either targeted or excluded.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.common.BrandListInfo</code>
 */
class BrandListInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Shared set resource name of the brand list.
     *
     * Generated from protobuf field <code>optional string shared_set = 1;</code>
     */
    protected $shared_set = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $shared_set
     *           Shared set resource name of the brand list.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Common\Criteria::initOnce();
        parent::__construct($data);
    }

    /**
     * Shared set resource name of the brand list.
     *
     * Generated from protobuf field <code>optional string shared_set = 1;</code>
     * @return string
     */
    public function getSharedSet()
    {
        return isset($this->shared_set) ? $this->shared_set : '';
    }

    public function hasSharedSet()
    {
        return isset($this->shared_set);
    }

    public function clearSharedSet()
    {
        unset($this->shared_set);
    }

    /**
     * Shared set resource name of the brand list.
     *
     * Generated from protobuf field <code>optional string shared_set = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setSharedSet($var)
    {
        GPBUtil::checkString($var, True);
        $this->shared_set = $var;

        return $this;
    }

}

