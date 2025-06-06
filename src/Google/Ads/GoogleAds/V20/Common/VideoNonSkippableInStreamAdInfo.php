<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/common/ad_type_infos.proto

namespace Google\Ads\GoogleAds\V20\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Representation of video non-skippable in-stream ad format (15 second
 * in-stream non-skippable video ad).
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.common.VideoNonSkippableInStreamAdInfo</code>
 */
class VideoNonSkippableInStreamAdInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * The image assets of the companion banner used with the ad.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.AdImageAsset companion_banner = 5;</code>
     */
    protected $companion_banner = null;
    /**
     * Label on the "Call To Action" button taking the user to the video ad's
     * final URL.
     *
     * Generated from protobuf field <code>string action_button_label = 3;</code>
     */
    protected $action_button_label = '';
    /**
     * Additional text displayed with the "Call To Action" button to give
     * context and encourage clicking on the button.
     *
     * Generated from protobuf field <code>string action_headline = 4;</code>
     */
    protected $action_headline = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V20\Common\AdImageAsset $companion_banner
     *           The image assets of the companion banner used with the ad.
     *     @type string $action_button_label
     *           Label on the "Call To Action" button taking the user to the video ad's
     *           final URL.
     *     @type string $action_headline
     *           Additional text displayed with the "Call To Action" button to give
     *           context and encourage clicking on the button.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Common\AdTypeInfos::initOnce();
        parent::__construct($data);
    }

    /**
     * The image assets of the companion banner used with the ad.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.AdImageAsset companion_banner = 5;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\AdImageAsset|null
     */
    public function getCompanionBanner()
    {
        return $this->companion_banner;
    }

    public function hasCompanionBanner()
    {
        return isset($this->companion_banner);
    }

    public function clearCompanionBanner()
    {
        unset($this->companion_banner);
    }

    /**
     * The image assets of the companion banner used with the ad.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.AdImageAsset companion_banner = 5;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\AdImageAsset $var
     * @return $this
     */
    public function setCompanionBanner($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\AdImageAsset::class);
        $this->companion_banner = $var;

        return $this;
    }

    /**
     * Label on the "Call To Action" button taking the user to the video ad's
     * final URL.
     *
     * Generated from protobuf field <code>string action_button_label = 3;</code>
     * @return string
     */
    public function getActionButtonLabel()
    {
        return $this->action_button_label;
    }

    /**
     * Label on the "Call To Action" button taking the user to the video ad's
     * final URL.
     *
     * Generated from protobuf field <code>string action_button_label = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setActionButtonLabel($var)
    {
        GPBUtil::checkString($var, True);
        $this->action_button_label = $var;

        return $this;
    }

    /**
     * Additional text displayed with the "Call To Action" button to give
     * context and encourage clicking on the button.
     *
     * Generated from protobuf field <code>string action_headline = 4;</code>
     * @return string
     */
    public function getActionHeadline()
    {
        return $this->action_headline;
    }

    /**
     * Additional text displayed with the "Call To Action" button to give
     * context and encourage clicking on the button.
     *
     * Generated from protobuf field <code>string action_headline = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setActionHeadline($var)
    {
        GPBUtil::checkString($var, True);
        $this->action_headline = $var;

        return $this;
    }

}

