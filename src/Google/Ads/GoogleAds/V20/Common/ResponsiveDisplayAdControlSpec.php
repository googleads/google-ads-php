<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/ad_type_infos.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Specification for various creative controls for a responsive display ad.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.ResponsiveDisplayAdControlSpec</code>
 */
class ResponsiveDisplayAdControlSpec extends \Google\Protobuf\Internal\Message
{
    /**
     * Whether the advertiser has opted into the asset enhancements feature.
     *
     * Generated from protobuf field <code>bool enable_asset_enhancements = 1;</code>
     */
    protected $enable_asset_enhancements = false;
    /**
     * Whether the advertiser has opted into auto-gen video feature.
     *
     * Generated from protobuf field <code>bool enable_autogen_video = 2;</code>
     */
    protected $enable_autogen_video = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type bool $enable_asset_enhancements
     *           Whether the advertiser has opted into the asset enhancements feature.
     *     @type bool $enable_autogen_video
     *           Whether the advertiser has opted into auto-gen video feature.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\AdTypeInfos::initOnce();
        parent::__construct($data);
    }

    /**
     * Whether the advertiser has opted into the asset enhancements feature.
     *
     * Generated from protobuf field <code>bool enable_asset_enhancements = 1;</code>
     * @return bool
     */
    public function getEnableAssetEnhancements()
    {
        return $this->enable_asset_enhancements;
    }

    /**
     * Whether the advertiser has opted into the asset enhancements feature.
     *
     * Generated from protobuf field <code>bool enable_asset_enhancements = 1;</code>
     * @param bool $var
     * @return $this
     */
    public function setEnableAssetEnhancements($var)
    {
        GPBUtil::checkBool($var);
        $this->enable_asset_enhancements = $var;

        return $this;
    }

    /**
     * Whether the advertiser has opted into auto-gen video feature.
     *
     * Generated from protobuf field <code>bool enable_autogen_video = 2;</code>
     * @return bool
     */
    public function getEnableAutogenVideo()
    {
        return $this->enable_autogen_video;
    }

    /**
     * Whether the advertiser has opted into auto-gen video feature.
     *
     * Generated from protobuf field <code>bool enable_autogen_video = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setEnableAutogenVideo($var)
    {
        GPBUtil::checkBool($var);
        $this->enable_autogen_video = $var;

        return $this;
    }

}

