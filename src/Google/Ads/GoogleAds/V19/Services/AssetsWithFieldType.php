<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/ad_group_ad_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The combination of system asset and field type to remove.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.AssetsWithFieldType</code>
 */
class AssetsWithFieldType extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name of the asset to be removed.
     *
     * Generated from protobuf field <code>string asset = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    protected $asset = '';
    /**
     * Required. The asset field type.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.AssetFieldTypeEnum.AssetFieldType asset_field_type = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $asset_field_type = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $asset
     *           Required. The resource name of the asset to be removed.
     *     @type int $asset_field_type
     *           Required. The asset field type.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\AdGroupAdService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name of the asset to be removed.
     *
     * Generated from protobuf field <code>string asset = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * Required. The resource name of the asset to be removed.
     *
     * Generated from protobuf field <code>string asset = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
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
     * Required. The asset field type.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.AssetFieldTypeEnum.AssetFieldType asset_field_type = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getAssetFieldType()
    {
        return $this->asset_field_type;
    }

    /**
     * Required. The asset field type.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.AssetFieldTypeEnum.AssetFieldType asset_field_type = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setAssetFieldType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\AssetFieldTypeEnum\AssetFieldType::class);
        $this->asset_field_type = $var;

        return $this;
    }

}

