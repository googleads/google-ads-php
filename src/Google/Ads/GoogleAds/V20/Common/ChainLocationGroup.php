<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/asset_set_types.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents information about a Chain dynamic location group.
 * Only applicable if the sync level AssetSet's type is LOCATION_SYNC and
 * sync source is chain.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.ChainLocationGroup</code>
 */
class ChainLocationGroup extends \Google\Protobuf\Internal\Message
{
    /**
     * Used to filter chain locations by chain ids.
     * Only Locations that belong to the specified chain(s) will be in the asset
     * set.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.ChainFilter dynamic_chain_location_group_filters = 1;</code>
     */
    private $dynamic_chain_location_group_filters;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V20\Common\ChainFilter>|\Google\Protobuf\Internal\RepeatedField $dynamic_chain_location_group_filters
     *           Used to filter chain locations by chain ids.
     *           Only Locations that belong to the specified chain(s) will be in the asset
     *           set.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\AssetSetTypes::initOnce();
        parent::__construct($data);
    }

    /**
     * Used to filter chain locations by chain ids.
     * Only Locations that belong to the specified chain(s) will be in the asset
     * set.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.ChainFilter dynamic_chain_location_group_filters = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getDynamicChainLocationGroupFilters()
    {
        return $this->dynamic_chain_location_group_filters;
    }

    /**
     * Used to filter chain locations by chain ids.
     * Only Locations that belong to the specified chain(s) will be in the asset
     * set.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.ChainFilter dynamic_chain_location_group_filters = 1;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\ChainFilter>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setDynamicChainLocationGroupFilters($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\ChainFilter::class);
        $this->dynamic_chain_location_group_filters = $arr;

        return $this;
    }

}

