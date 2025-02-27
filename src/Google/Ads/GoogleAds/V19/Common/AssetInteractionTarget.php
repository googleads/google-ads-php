<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/segments.proto

namespace Google\Ads\GoogleAds\V19\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An AssetInteractionTarget segment.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.common.AssetInteractionTarget</code>
 */
class AssetInteractionTarget extends \Google\Protobuf\Internal\Message
{
    /**
     * The asset resource name.
     *
     * Generated from protobuf field <code>string asset = 1;</code>
     */
    protected $asset = '';
    /**
     * Only used with CustomerAsset, CampaignAsset and AdGroupAsset metrics.
     * Indicates whether the interaction metrics occurred on the asset itself or a
     * different asset or ad unit.
     *
     * Generated from protobuf field <code>bool interaction_on_this_asset = 2;</code>
     */
    protected $interaction_on_this_asset = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $asset
     *           The asset resource name.
     *     @type bool $interaction_on_this_asset
     *           Only used with CustomerAsset, CampaignAsset and AdGroupAsset metrics.
     *           Indicates whether the interaction metrics occurred on the asset itself or a
     *           different asset or ad unit.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Common\Segments::initOnce();
        parent::__construct($data);
    }

    /**
     * The asset resource name.
     *
     * Generated from protobuf field <code>string asset = 1;</code>
     * @return string
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * The asset resource name.
     *
     * Generated from protobuf field <code>string asset = 1;</code>
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
     * Only used with CustomerAsset, CampaignAsset and AdGroupAsset metrics.
     * Indicates whether the interaction metrics occurred on the asset itself or a
     * different asset or ad unit.
     *
     * Generated from protobuf field <code>bool interaction_on_this_asset = 2;</code>
     * @return bool
     */
    public function getInteractionOnThisAsset()
    {
        return $this->interaction_on_this_asset;
    }

    /**
     * Only used with CustomerAsset, CampaignAsset and AdGroupAsset metrics.
     * Indicates whether the interaction metrics occurred on the asset itself or a
     * different asset or ad unit.
     *
     * Generated from protobuf field <code>bool interaction_on_this_asset = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setInteractionOnThisAsset($var)
    {
        GPBUtil::checkBool($var);
        $this->interaction_on_this_asset = $var;

        return $this;
    }

}

