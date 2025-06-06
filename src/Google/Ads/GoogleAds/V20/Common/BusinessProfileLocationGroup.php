<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/asset_set_types.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Information about a Business Profile dynamic location group.
 * Only applicable if the sync level AssetSet's type is LOCATION_SYNC and
 * sync source is Business Profile.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.BusinessProfileLocationGroup</code>
 */
class BusinessProfileLocationGroup extends \Google\Protobuf\Internal\Message
{
    /**
     * Filter for dynamic Business Profile location sets.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.DynamicBusinessProfileLocationGroupFilter dynamic_business_profile_location_group_filter = 1;</code>
     */
    protected $dynamic_business_profile_location_group_filter = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V20\Common\DynamicBusinessProfileLocationGroupFilter $dynamic_business_profile_location_group_filter
     *           Filter for dynamic Business Profile location sets.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\AssetSetTypes::initOnce();
        parent::__construct($data);
    }

    /**
     * Filter for dynamic Business Profile location sets.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.DynamicBusinessProfileLocationGroupFilter dynamic_business_profile_location_group_filter = 1;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\DynamicBusinessProfileLocationGroupFilter|null
     */
    public function getDynamicBusinessProfileLocationGroupFilter()
    {
        return $this->dynamic_business_profile_location_group_filter;
    }

    public function hasDynamicBusinessProfileLocationGroupFilter()
    {
        return isset($this->dynamic_business_profile_location_group_filter);
    }

    public function clearDynamicBusinessProfileLocationGroupFilter()
    {
        unset($this->dynamic_business_profile_location_group_filter);
    }

    /**
     * Filter for dynamic Business Profile location sets.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.DynamicBusinessProfileLocationGroupFilter dynamic_business_profile_location_group_filter = 1;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\DynamicBusinessProfileLocationGroupFilter $var
     * @return $this
     */
    public function setDynamicBusinessProfileLocationGroupFilter($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\DynamicBusinessProfileLocationGroupFilter::class);
        $this->dynamic_business_profile_location_group_filter = $var;

        return $this;
    }

}

