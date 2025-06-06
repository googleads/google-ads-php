<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/asset_group_asset.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * AssetGroupAsset is the link between an asset and an asset group.
 * Adding an AssetGroupAsset links an asset with an asset group.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.AssetGroupAsset</code>
 */
class AssetGroupAsset extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the asset group asset.
     * Asset group asset resource name have the form:
     * `customers/{customer_id}/assetGroupAssets/{asset_group_id}~{asset_id}~{field_type}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Immutable. The asset group which this asset group asset is linking.
     *
     * Generated from protobuf field <code>string asset_group = 2 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $asset_group = '';
    /**
     * Immutable. The asset which this asset group asset is linking.
     *
     * Generated from protobuf field <code>string asset = 3 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $asset = '';
    /**
     * The description of the placement of the asset within the asset group. For
     * example: HEADLINE, YOUTUBE_VIDEO etc
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetFieldTypeEnum.AssetFieldType field_type = 4;</code>
     */
    protected $field_type = 0;
    /**
     * The status of the link between an asset and asset group.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetLinkStatusEnum.AssetLinkStatus status = 5;</code>
     */
    protected $status = 0;
    /**
     * Output only. Provides the PrimaryStatus of this asset link.
     * Primary status is meant essentially to differentiate between the plain
     * "status" field, which has advertiser set values of enabled, paused, or
     * removed.  The primary status takes into account other signals (for assets
     * its mainly policy and quality approvals) to come up with a more
     * comprehensive status to indicate its serving state.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetLinkPrimaryStatusEnum.AssetLinkPrimaryStatus primary_status = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $primary_status = 0;
    /**
     * Output only. Provides a list of reasons for why an asset is not serving or
     * not serving at full capacity.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.enums.AssetLinkPrimaryStatusReasonEnum.AssetLinkPrimaryStatusReason primary_status_reasons = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $primary_status_reasons;
    /**
     * Output only. Provides the details of the primary status and its associated
     * reasons.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.AssetLinkPrimaryStatusDetails primary_status_details = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $primary_status_details;
    /**
     * Output only. The performance of this asset group asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetPerformanceLabelEnum.AssetPerformanceLabel performance_label = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $performance_label = 0;
    /**
     * Output only. The policy information for this asset group asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.PolicySummary policy_summary = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $policy_summary = null;
    /**
     * Output only. Source of the asset group asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetSourceEnum.AssetSource source = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $source = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the asset group asset.
     *           Asset group asset resource name have the form:
     *           `customers/{customer_id}/assetGroupAssets/{asset_group_id}~{asset_id}~{field_type}`
     *     @type string $asset_group
     *           Immutable. The asset group which this asset group asset is linking.
     *     @type string $asset
     *           Immutable. The asset which this asset group asset is linking.
     *     @type int $field_type
     *           The description of the placement of the asset within the asset group. For
     *           example: HEADLINE, YOUTUBE_VIDEO etc
     *     @type int $status
     *           The status of the link between an asset and asset group.
     *     @type int $primary_status
     *           Output only. Provides the PrimaryStatus of this asset link.
     *           Primary status is meant essentially to differentiate between the plain
     *           "status" field, which has advertiser set values of enabled, paused, or
     *           removed.  The primary status takes into account other signals (for assets
     *           its mainly policy and quality approvals) to come up with a more
     *           comprehensive status to indicate its serving state.
     *     @type array<int>|\Google\Protobuf\Internal\RepeatedField $primary_status_reasons
     *           Output only. Provides a list of reasons for why an asset is not serving or
     *           not serving at full capacity.
     *     @type array<\Google\Ads\GoogleAds\V20\Common\AssetLinkPrimaryStatusDetails>|\Google\Protobuf\Internal\RepeatedField $primary_status_details
     *           Output only. Provides the details of the primary status and its associated
     *           reasons.
     *     @type int $performance_label
     *           Output only. The performance of this asset group asset.
     *     @type \Google\Ads\GoogleAds\V20\Common\PolicySummary $policy_summary
     *           Output only. The policy information for this asset group asset.
     *     @type int $source
     *           Output only. Source of the asset group asset.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\AssetGroupAsset::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the asset group asset.
     * Asset group asset resource name have the form:
     * `customers/{customer_id}/assetGroupAssets/{asset_group_id}~{asset_id}~{field_type}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the asset group asset.
     * Asset group asset resource name have the form:
     * `customers/{customer_id}/assetGroupAssets/{asset_group_id}~{asset_id}~{field_type}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
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
     * Immutable. The asset group which this asset group asset is linking.
     *
     * Generated from protobuf field <code>string asset_group = 2 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAssetGroup()
    {
        return $this->asset_group;
    }

    /**
     * Immutable. The asset group which this asset group asset is linking.
     *
     * Generated from protobuf field <code>string asset_group = 2 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
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
     * Immutable. The asset which this asset group asset is linking.
     *
     * Generated from protobuf field <code>string asset = 3 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * Immutable. The asset which this asset group asset is linking.
     *
     * Generated from protobuf field <code>string asset = 3 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
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
     * The description of the placement of the asset within the asset group. For
     * example: HEADLINE, YOUTUBE_VIDEO etc
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetFieldTypeEnum.AssetFieldType field_type = 4;</code>
     * @return int
     */
    public function getFieldType()
    {
        return $this->field_type;
    }

    /**
     * The description of the placement of the asset within the asset group. For
     * example: HEADLINE, YOUTUBE_VIDEO etc
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetFieldTypeEnum.AssetFieldType field_type = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setFieldType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\AssetFieldTypeEnum\AssetFieldType::class);
        $this->field_type = $var;

        return $this;
    }

    /**
     * The status of the link between an asset and asset group.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetLinkStatusEnum.AssetLinkStatus status = 5;</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the link between an asset and asset group.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetLinkStatusEnum.AssetLinkStatus status = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\AssetLinkStatusEnum\AssetLinkStatus::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Output only. Provides the PrimaryStatus of this asset link.
     * Primary status is meant essentially to differentiate between the plain
     * "status" field, which has advertiser set values of enabled, paused, or
     * removed.  The primary status takes into account other signals (for assets
     * its mainly policy and quality approvals) to come up with a more
     * comprehensive status to indicate its serving state.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetLinkPrimaryStatusEnum.AssetLinkPrimaryStatus primary_status = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getPrimaryStatus()
    {
        return $this->primary_status;
    }

    /**
     * Output only. Provides the PrimaryStatus of this asset link.
     * Primary status is meant essentially to differentiate between the plain
     * "status" field, which has advertiser set values of enabled, paused, or
     * removed.  The primary status takes into account other signals (for assets
     * its mainly policy and quality approvals) to come up with a more
     * comprehensive status to indicate its serving state.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetLinkPrimaryStatusEnum.AssetLinkPrimaryStatus primary_status = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setPrimaryStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\AssetLinkPrimaryStatusEnum\AssetLinkPrimaryStatus::class);
        $this->primary_status = $var;

        return $this;
    }

    /**
     * Output only. Provides a list of reasons for why an asset is not serving or
     * not serving at full capacity.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.enums.AssetLinkPrimaryStatusReasonEnum.AssetLinkPrimaryStatusReason primary_status_reasons = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getPrimaryStatusReasons()
    {
        return $this->primary_status_reasons;
    }

    /**
     * Output only. Provides a list of reasons for why an asset is not serving or
     * not serving at full capacity.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.enums.AssetLinkPrimaryStatusReasonEnum.AssetLinkPrimaryStatusReason primary_status_reasons = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<int>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setPrimaryStatusReasons($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::ENUM, \Google\Ads\GoogleAds\V20\Enums\AssetLinkPrimaryStatusReasonEnum\AssetLinkPrimaryStatusReason::class);
        $this->primary_status_reasons = $arr;

        return $this;
    }

    /**
     * Output only. Provides the details of the primary status and its associated
     * reasons.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.AssetLinkPrimaryStatusDetails primary_status_details = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getPrimaryStatusDetails()
    {
        return $this->primary_status_details;
    }

    /**
     * Output only. Provides the details of the primary status and its associated
     * reasons.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.AssetLinkPrimaryStatusDetails primary_status_details = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\AssetLinkPrimaryStatusDetails>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setPrimaryStatusDetails($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\AssetLinkPrimaryStatusDetails::class);
        $this->primary_status_details = $arr;

        return $this;
    }

    /**
     * Output only. The performance of this asset group asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetPerformanceLabelEnum.AssetPerformanceLabel performance_label = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getPerformanceLabel()
    {
        return $this->performance_label;
    }

    /**
     * Output only. The performance of this asset group asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetPerformanceLabelEnum.AssetPerformanceLabel performance_label = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setPerformanceLabel($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\AssetPerformanceLabelEnum\AssetPerformanceLabel::class);
        $this->performance_label = $var;

        return $this;
    }

    /**
     * Output only. The policy information for this asset group asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.PolicySummary policy_summary = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\PolicySummary|null
     */
    public function getPolicySummary()
    {
        return $this->policy_summary;
    }

    public function hasPolicySummary()
    {
        return isset($this->policy_summary);
    }

    public function clearPolicySummary()
    {
        unset($this->policy_summary);
    }

    /**
     * Output only. The policy information for this asset group asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.PolicySummary policy_summary = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\PolicySummary $var
     * @return $this
     */
    public function setPolicySummary($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\PolicySummary::class);
        $this->policy_summary = $var;

        return $this;
    }

    /**
     * Output only. Source of the asset group asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetSourceEnum.AssetSource source = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Output only. Source of the asset group asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetSourceEnum.AssetSource source = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setSource($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\AssetSourceEnum\AssetSource::class);
        $this->source = $var;

        return $this;
    }

}

