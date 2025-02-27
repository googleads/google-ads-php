<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/ad_asset.proto

namespace Google\Ads\GoogleAds\V19\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A text asset used inside an ad.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.common.AdTextAsset</code>
 */
class AdTextAsset extends \Google\Protobuf\Internal\Message
{
    /**
     * Asset text.
     *
     * Generated from protobuf field <code>optional string text = 4;</code>
     */
    protected $text = null;
    /**
     * The pinned field of the asset. This restricts the asset to only serve
     * within this field. Multiple assets can be pinned to the same field. An
     * asset that is unpinned or pinned to a different field will not serve in a
     * field where some other asset has been pinned.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ServedAssetFieldTypeEnum.ServedAssetFieldType pinned_field = 2;</code>
     */
    protected $pinned_field = 0;
    /**
     * The performance label of this text asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.AssetPerformanceLabelEnum.AssetPerformanceLabel asset_performance_label = 5;</code>
     */
    protected $asset_performance_label = 0;
    /**
     * The policy summary of this text asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.AdAssetPolicySummary policy_summary_info = 6;</code>
     */
    protected $policy_summary_info = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $text
     *           Asset text.
     *     @type int $pinned_field
     *           The pinned field of the asset. This restricts the asset to only serve
     *           within this field. Multiple assets can be pinned to the same field. An
     *           asset that is unpinned or pinned to a different field will not serve in a
     *           field where some other asset has been pinned.
     *     @type int $asset_performance_label
     *           The performance label of this text asset.
     *     @type \Google\Ads\GoogleAds\V19\Common\AdAssetPolicySummary $policy_summary_info
     *           The policy summary of this text asset.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Common\AdAsset::initOnce();
        parent::__construct($data);
    }

    /**
     * Asset text.
     *
     * Generated from protobuf field <code>optional string text = 4;</code>
     * @return string
     */
    public function getText()
    {
        return isset($this->text) ? $this->text : '';
    }

    public function hasText()
    {
        return isset($this->text);
    }

    public function clearText()
    {
        unset($this->text);
    }

    /**
     * Asset text.
     *
     * Generated from protobuf field <code>optional string text = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setText($var)
    {
        GPBUtil::checkString($var, True);
        $this->text = $var;

        return $this;
    }

    /**
     * The pinned field of the asset. This restricts the asset to only serve
     * within this field. Multiple assets can be pinned to the same field. An
     * asset that is unpinned or pinned to a different field will not serve in a
     * field where some other asset has been pinned.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ServedAssetFieldTypeEnum.ServedAssetFieldType pinned_field = 2;</code>
     * @return int
     */
    public function getPinnedField()
    {
        return $this->pinned_field;
    }

    /**
     * The pinned field of the asset. This restricts the asset to only serve
     * within this field. Multiple assets can be pinned to the same field. An
     * asset that is unpinned or pinned to a different field will not serve in a
     * field where some other asset has been pinned.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.ServedAssetFieldTypeEnum.ServedAssetFieldType pinned_field = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setPinnedField($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\ServedAssetFieldTypeEnum\ServedAssetFieldType::class);
        $this->pinned_field = $var;

        return $this;
    }

    /**
     * The performance label of this text asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.AssetPerformanceLabelEnum.AssetPerformanceLabel asset_performance_label = 5;</code>
     * @return int
     */
    public function getAssetPerformanceLabel()
    {
        return $this->asset_performance_label;
    }

    /**
     * The performance label of this text asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.AssetPerformanceLabelEnum.AssetPerformanceLabel asset_performance_label = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setAssetPerformanceLabel($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\AssetPerformanceLabelEnum\AssetPerformanceLabel::class);
        $this->asset_performance_label = $var;

        return $this;
    }

    /**
     * The policy summary of this text asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.AdAssetPolicySummary policy_summary_info = 6;</code>
     * @return \Google\Ads\GoogleAds\V19\Common\AdAssetPolicySummary|null
     */
    public function getPolicySummaryInfo()
    {
        return $this->policy_summary_info;
    }

    public function hasPolicySummaryInfo()
    {
        return isset($this->policy_summary_info);
    }

    public function clearPolicySummaryInfo()
    {
        unset($this->policy_summary_info);
    }

    /**
     * The policy summary of this text asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.AdAssetPolicySummary policy_summary_info = 6;</code>
     * @param \Google\Ads\GoogleAds\V19\Common\AdAssetPolicySummary $var
     * @return $this
     */
    public function setPolicySummaryInfo($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Common\AdAssetPolicySummary::class);
        $this->policy_summary_info = $var;

        return $this;
    }

}

