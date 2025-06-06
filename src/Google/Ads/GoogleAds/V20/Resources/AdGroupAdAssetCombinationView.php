<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/ad_group_ad_asset_combination_view.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A view on the usage of ad group ad asset combination.
 * Now we only support AdGroupAdAssetCombinationView for Responsive Search Ads,
 * with more ad types planned for the future.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.AdGroupAdAssetCombinationView</code>
 */
class AdGroupAdAssetCombinationView extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the ad group ad asset combination view.
     * The combination ID is 128 bits long, where the upper 64 bits are stored in
     * asset_combination_id_high, and the lower 64 bits are stored in
     * asset_combination_id_low.
     * AdGroupAd Asset Combination view resource names have the form:
     * `customers/{customer_id}/adGroupAdAssetCombinationViews/{AdGroupAd.ad_group_id}~{AdGroupAd.ad.ad_id}~{AssetCombination.asset_combination_id_low}~{AssetCombination.asset_combination_id_high}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. Served assets.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.AssetUsage served_assets = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $served_assets;
    /**
     * Output only. The status between the asset combination and the latest
     * version of the ad. If true, the asset combination is linked to the latest
     * version of the ad. If false, it means the link once existed but has been
     * removed and is no longer present in the latest version of the ad.
     *
     * Generated from protobuf field <code>optional bool enabled = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $enabled = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the ad group ad asset combination view.
     *           The combination ID is 128 bits long, where the upper 64 bits are stored in
     *           asset_combination_id_high, and the lower 64 bits are stored in
     *           asset_combination_id_low.
     *           AdGroupAd Asset Combination view resource names have the form:
     *           `customers/{customer_id}/adGroupAdAssetCombinationViews/{AdGroupAd.ad_group_id}~{AdGroupAd.ad.ad_id}~{AssetCombination.asset_combination_id_low}~{AssetCombination.asset_combination_id_high}`
     *     @type array<\Google\Ads\GoogleAds\V20\Common\AssetUsage>|\Google\Protobuf\Internal\RepeatedField $served_assets
     *           Output only. Served assets.
     *     @type bool $enabled
     *           Output only. The status between the asset combination and the latest
     *           version of the ad. If true, the asset combination is linked to the latest
     *           version of the ad. If false, it means the link once existed but has been
     *           removed and is no longer present in the latest version of the ad.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\AdGroupAdAssetCombinationView::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the ad group ad asset combination view.
     * The combination ID is 128 bits long, where the upper 64 bits are stored in
     * asset_combination_id_high, and the lower 64 bits are stored in
     * asset_combination_id_low.
     * AdGroupAd Asset Combination view resource names have the form:
     * `customers/{customer_id}/adGroupAdAssetCombinationViews/{AdGroupAd.ad_group_id}~{AdGroupAd.ad.ad_id}~{AssetCombination.asset_combination_id_low}~{AssetCombination.asset_combination_id_high}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the ad group ad asset combination view.
     * The combination ID is 128 bits long, where the upper 64 bits are stored in
     * asset_combination_id_high, and the lower 64 bits are stored in
     * asset_combination_id_low.
     * AdGroupAd Asset Combination view resource names have the form:
     * `customers/{customer_id}/adGroupAdAssetCombinationViews/{AdGroupAd.ad_group_id}~{AdGroupAd.ad.ad_id}~{AssetCombination.asset_combination_id_low}~{AssetCombination.asset_combination_id_high}`
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
     * Output only. Served assets.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.AssetUsage served_assets = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getServedAssets()
    {
        return $this->served_assets;
    }

    /**
     * Output only. Served assets.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.AssetUsage served_assets = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\AssetUsage>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setServedAssets($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\AssetUsage::class);
        $this->served_assets = $arr;

        return $this;
    }

    /**
     * Output only. The status between the asset combination and the latest
     * version of the ad. If true, the asset combination is linked to the latest
     * version of the ad. If false, it means the link once existed but has been
     * removed and is no longer present in the latest version of the ad.
     *
     * Generated from protobuf field <code>optional bool enabled = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return bool
     */
    public function getEnabled()
    {
        return isset($this->enabled) ? $this->enabled : false;
    }

    public function hasEnabled()
    {
        return isset($this->enabled);
    }

    public function clearEnabled()
    {
        unset($this->enabled);
    }

    /**
     * Output only. The status between the asset combination and the latest
     * version of the ad. If true, the asset combination is linked to the latest
     * version of the ad. If false, it means the link once existed but has been
     * removed and is no longer present in the latest version of the ad.
     *
     * Generated from protobuf field <code>optional bool enabled = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param bool $var
     * @return $this
     */
    public function setEnabled($var)
    {
        GPBUtil::checkBool($var);
        $this->enabled = $var;

        return $this;
    }

}

