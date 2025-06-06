<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/asset_group_product_group_view.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An asset group product group view.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.AssetGroupProductGroupView</code>
 */
class AssetGroupProductGroupView extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the asset group product group view.
     * Asset group product group view resource names have the form:
     * `customers/{customer_id}/assetGroupProductGroupViews/{asset_group_id}~{listing_group_filter_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The asset group associated with the listing group filter.
     *
     * Generated from protobuf field <code>string asset_group = 2 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $asset_group = '';
    /**
     * Output only. The resource name of the asset group listing group filter.
     *
     * Generated from protobuf field <code>string asset_group_listing_group_filter = 4 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $asset_group_listing_group_filter = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the asset group product group view.
     *           Asset group product group view resource names have the form:
     *           `customers/{customer_id}/assetGroupProductGroupViews/{asset_group_id}~{listing_group_filter_id}`
     *     @type string $asset_group
     *           Output only. The asset group associated with the listing group filter.
     *     @type string $asset_group_listing_group_filter
     *           Output only. The resource name of the asset group listing group filter.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\AssetGroupProductGroupView::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the asset group product group view.
     * Asset group product group view resource names have the form:
     * `customers/{customer_id}/assetGroupProductGroupViews/{asset_group_id}~{listing_group_filter_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the asset group product group view.
     * Asset group product group view resource names have the form:
     * `customers/{customer_id}/assetGroupProductGroupViews/{asset_group_id}~{listing_group_filter_id}`
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
     * Output only. The asset group associated with the listing group filter.
     *
     * Generated from protobuf field <code>string asset_group = 2 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAssetGroup()
    {
        return $this->asset_group;
    }

    /**
     * Output only. The asset group associated with the listing group filter.
     *
     * Generated from protobuf field <code>string asset_group = 2 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAssetGroup($var)
    {
        GPBUtil::checkString($var, True);
        $this->asset_group = $var;

        return $this;
    }

    /**
     * Output only. The resource name of the asset group listing group filter.
     *
     * Generated from protobuf field <code>string asset_group_listing_group_filter = 4 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAssetGroupListingGroupFilter()
    {
        return $this->asset_group_listing_group_filter;
    }

    /**
     * Output only. The resource name of the asset group listing group filter.
     *
     * Generated from protobuf field <code>string asset_group_listing_group_filter = 4 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAssetGroupListingGroupFilter($var)
    {
        GPBUtil::checkString($var, True);
        $this->asset_group_listing_group_filter = $var;

        return $this;
    }

}

