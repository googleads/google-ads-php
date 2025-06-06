<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/asset_group.proto

namespace Google\Ads\GoogleAds\V20\Resources\AdStrengthActionItem;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The details of the asset to add.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.AdStrengthActionItem.AddAssetDetails</code>
 */
class AddAssetDetails extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The asset field type of the asset(s) to add.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetFieldTypeEnum.AssetFieldType asset_field_type = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $asset_field_type = 0;
    /**
     * Output only. The number of assets to add.
     *
     * Generated from protobuf field <code>optional int32 asset_count = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $asset_count = null;
    /**
     * Output only. For video field types, the required aspect ratio of the
     * video. When unset and asset_field_type is YOUTUBE_VIDEO, the system
     * recommends the advertiser upload any YouTube video, regardless of aspect
     * ratio.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetCoverageVideoAspectRatioRequirementEnum.AssetCoverageVideoAspectRatioRequirement video_aspect_ratio_requirement = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $video_aspect_ratio_requirement = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $asset_field_type
     *           Output only. The asset field type of the asset(s) to add.
     *     @type int $asset_count
     *           Output only. The number of assets to add.
     *     @type int $video_aspect_ratio_requirement
     *           Output only. For video field types, the required aspect ratio of the
     *           video. When unset and asset_field_type is YOUTUBE_VIDEO, the system
     *           recommends the advertiser upload any YouTube video, regardless of aspect
     *           ratio.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\AssetGroup::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The asset field type of the asset(s) to add.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetFieldTypeEnum.AssetFieldType asset_field_type = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getAssetFieldType()
    {
        return $this->asset_field_type;
    }

    /**
     * Output only. The asset field type of the asset(s) to add.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetFieldTypeEnum.AssetFieldType asset_field_type = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setAssetFieldType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\AssetFieldTypeEnum\AssetFieldType::class);
        $this->asset_field_type = $var;

        return $this;
    }

    /**
     * Output only. The number of assets to add.
     *
     * Generated from protobuf field <code>optional int32 asset_count = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getAssetCount()
    {
        return isset($this->asset_count) ? $this->asset_count : 0;
    }

    public function hasAssetCount()
    {
        return isset($this->asset_count);
    }

    public function clearAssetCount()
    {
        unset($this->asset_count);
    }

    /**
     * Output only. The number of assets to add.
     *
     * Generated from protobuf field <code>optional int32 asset_count = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setAssetCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->asset_count = $var;

        return $this;
    }

    /**
     * Output only. For video field types, the required aspect ratio of the
     * video. When unset and asset_field_type is YOUTUBE_VIDEO, the system
     * recommends the advertiser upload any YouTube video, regardless of aspect
     * ratio.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetCoverageVideoAspectRatioRequirementEnum.AssetCoverageVideoAspectRatioRequirement video_aspect_ratio_requirement = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getVideoAspectRatioRequirement()
    {
        return isset($this->video_aspect_ratio_requirement) ? $this->video_aspect_ratio_requirement : 0;
    }

    public function hasVideoAspectRatioRequirement()
    {
        return isset($this->video_aspect_ratio_requirement);
    }

    public function clearVideoAspectRatioRequirement()
    {
        unset($this->video_aspect_ratio_requirement);
    }

    /**
     * Output only. For video field types, the required aspect ratio of the
     * video. When unset and asset_field_type is YOUTUBE_VIDEO, the system
     * recommends the advertiser upload any YouTube video, regardless of aspect
     * ratio.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.enums.AssetCoverageVideoAspectRatioRequirementEnum.AssetCoverageVideoAspectRatioRequirement video_aspect_ratio_requirement = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setVideoAspectRatioRequirement($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\AssetCoverageVideoAspectRatioRequirementEnum\AssetCoverageVideoAspectRatioRequirement::class);
        $this->video_aspect_ratio_requirement = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AddAssetDetails::class, \Google\Ads\GoogleAds\V20\Resources\AdStrengthActionItem_AddAssetDetails::class);

