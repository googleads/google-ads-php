<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/geo_target_constant_service.proto

namespace Google\Ads\GoogleAds\V19\Services\SuggestGeoTargetConstantsRequest;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A list of geo target constant resource names.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.SuggestGeoTargetConstantsRequest.GeoTargets</code>
 */
class GeoTargets extends \Google\Protobuf\Internal\Message
{
    /**
     * A list of geo target constant resource names.
     *
     * Generated from protobuf field <code>repeated string geo_target_constants = 2;</code>
     */
    private $geo_target_constants;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $geo_target_constants
     *           A list of geo target constant resource names.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\GeoTargetConstantService::initOnce();
        parent::__construct($data);
    }

    /**
     * A list of geo target constant resource names.
     *
     * Generated from protobuf field <code>repeated string geo_target_constants = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getGeoTargetConstants()
    {
        return $this->geo_target_constants;
    }

    /**
     * A list of geo target constant resource names.
     *
     * Generated from protobuf field <code>repeated string geo_target_constants = 2;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setGeoTargetConstants($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->geo_target_constants = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeoTargets::class, \Google\Ads\GoogleAds\V19\Services\SuggestGeoTargetConstantsRequest_GeoTargets::class);

