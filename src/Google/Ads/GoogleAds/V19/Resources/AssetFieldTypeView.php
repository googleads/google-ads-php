<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/asset_field_type_view.proto

namespace Google\Ads\GoogleAds\V19\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An asset field type view.
 * This view reports non-overcounted metrics for each asset field type when the
 * asset is used as extension.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.AssetFieldTypeView</code>
 */
class AssetFieldTypeView extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the asset field type view.
     * Asset field type view resource names have the form:
     * `customers/{customer_id}/assetFieldTypeViews/{field_type}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The asset field type of the asset field type view.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.AssetFieldTypeEnum.AssetFieldType field_type = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $field_type = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the asset field type view.
     *           Asset field type view resource names have the form:
     *           `customers/{customer_id}/assetFieldTypeViews/{field_type}`
     *     @type int $field_type
     *           Output only. The asset field type of the asset field type view.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\AssetFieldTypeView::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the asset field type view.
     * Asset field type view resource names have the form:
     * `customers/{customer_id}/assetFieldTypeViews/{field_type}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the asset field type view.
     * Asset field type view resource names have the form:
     * `customers/{customer_id}/assetFieldTypeViews/{field_type}`
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
     * Output only. The asset field type of the asset field type view.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.AssetFieldTypeEnum.AssetFieldType field_type = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getFieldType()
    {
        return $this->field_type;
    }

    /**
     * Output only. The asset field type of the asset field type view.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.AssetFieldTypeEnum.AssetFieldType field_type = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setFieldType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\AssetFieldTypeEnum\AssetFieldType::class);
        $this->field_type = $var;

        return $this;
    }

}

