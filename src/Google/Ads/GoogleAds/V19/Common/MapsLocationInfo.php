<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/asset_set_types.proto

namespace Google\Ads\GoogleAds\V19\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Wrapper for place ids
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.common.MapsLocationInfo</code>
 */
class MapsLocationInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Place ID of the Maps location.
     *
     * Generated from protobuf field <code>string place_id = 1;</code>
     */
    protected $place_id = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $place_id
     *           Place ID of the Maps location.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Common\AssetSetTypes::initOnce();
        parent::__construct($data);
    }

    /**
     * Place ID of the Maps location.
     *
     * Generated from protobuf field <code>string place_id = 1;</code>
     * @return string
     */
    public function getPlaceId()
    {
        return $this->place_id;
    }

    /**
     * Place ID of the Maps location.
     *
     * Generated from protobuf field <code>string place_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setPlaceId($var)
    {
        GPBUtil::checkString($var, True);
        $this->place_id = $var;

        return $this;
    }

}

