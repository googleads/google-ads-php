<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/channel_aggregate_asset_view.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A channel-level aggregate asset view that shows where the asset is linked,
 * performamce of the asset and stats.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.ChannelAggregateAssetView</code>
 */
class ChannelAggregateAssetView extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the channel aggregate asset view.
     * Channel aggregate asset view resource names have the form:
     * `customers/{customer_id}/channelAggregateAssetViews/{ChannelAssetV2.advertising_channel_type}~{ChannelAssetV2.asset_id}~{ChannelAssetV2.asset_source}~{ChannelAssetV2.field_type}"`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. Channel in which the asset served.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AdvertisingChannelTypeEnum.AdvertisingChannelType advertising_channel_type = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $advertising_channel_type = null;
    /**
     * Output only. The ID of the asset.
     *
     * Generated from protobuf field <code>optional string asset = 3 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $asset = null;
    /**
     * Output only. Source of the asset link.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetSourceEnum.AssetSource asset_source = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $asset_source = null;
    /**
     * Output only. FieldType of the asset.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetFieldTypeEnum.AssetFieldType field_type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $field_type = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the channel aggregate asset view.
     *           Channel aggregate asset view resource names have the form:
     *           `customers/{customer_id}/channelAggregateAssetViews/{ChannelAssetV2.advertising_channel_type}~{ChannelAssetV2.asset_id}~{ChannelAssetV2.asset_source}~{ChannelAssetV2.field_type}"`
     *     @type int $advertising_channel_type
     *           Output only. Channel in which the asset served.
     *     @type string $asset
     *           Output only. The ID of the asset.
     *     @type int $asset_source
     *           Output only. Source of the asset link.
     *     @type int $field_type
     *           Output only. FieldType of the asset.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\ChannelAggregateAssetView::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the channel aggregate asset view.
     * Channel aggregate asset view resource names have the form:
     * `customers/{customer_id}/channelAggregateAssetViews/{ChannelAssetV2.advertising_channel_type}~{ChannelAssetV2.asset_id}~{ChannelAssetV2.asset_source}~{ChannelAssetV2.field_type}"`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the channel aggregate asset view.
     * Channel aggregate asset view resource names have the form:
     * `customers/{customer_id}/channelAggregateAssetViews/{ChannelAssetV2.advertising_channel_type}~{ChannelAssetV2.asset_id}~{ChannelAssetV2.asset_source}~{ChannelAssetV2.field_type}"`
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
     * Output only. Channel in which the asset served.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AdvertisingChannelTypeEnum.AdvertisingChannelType advertising_channel_type = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getAdvertisingChannelType()
    {
        return isset($this->advertising_channel_type) ? $this->advertising_channel_type : 0;
    }

    public function hasAdvertisingChannelType()
    {
        return isset($this->advertising_channel_type);
    }

    public function clearAdvertisingChannelType()
    {
        unset($this->advertising_channel_type);
    }

    /**
     * Output only. Channel in which the asset served.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AdvertisingChannelTypeEnum.AdvertisingChannelType advertising_channel_type = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setAdvertisingChannelType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType::class);
        $this->advertising_channel_type = $var;

        return $this;
    }

    /**
     * Output only. The ID of the asset.
     *
     * Generated from protobuf field <code>optional string asset = 3 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAsset()
    {
        return isset($this->asset) ? $this->asset : '';
    }

    public function hasAsset()
    {
        return isset($this->asset);
    }

    public function clearAsset()
    {
        unset($this->asset);
    }

    /**
     * Output only. The ID of the asset.
     *
     * Generated from protobuf field <code>optional string asset = 3 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAsset($var)
    {
        GPBUtil::checkString($var, True);
        $this->asset = $var;

        return $this;
    }

    /**
     * Output only. Source of the asset link.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetSourceEnum.AssetSource asset_source = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getAssetSource()
    {
        return isset($this->asset_source) ? $this->asset_source : 0;
    }

    public function hasAssetSource()
    {
        return isset($this->asset_source);
    }

    public function clearAssetSource()
    {
        unset($this->asset_source);
    }

    /**
     * Output only. Source of the asset link.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetSourceEnum.AssetSource asset_source = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setAssetSource($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\AssetSourceEnum\AssetSource::class);
        $this->asset_source = $var;

        return $this;
    }

    /**
     * Output only. FieldType of the asset.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetFieldTypeEnum.AssetFieldType field_type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getFieldType()
    {
        return isset($this->field_type) ? $this->field_type : 0;
    }

    public function hasFieldType()
    {
        return isset($this->field_type);
    }

    public function clearFieldType()
    {
        unset($this->field_type);
    }

    /**
     * Output only. FieldType of the asset.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetFieldTypeEnum.AssetFieldType field_type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setFieldType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\AssetFieldTypeEnum\AssetFieldType::class);
        $this->field_type = $var;

        return $this;
    }

}

