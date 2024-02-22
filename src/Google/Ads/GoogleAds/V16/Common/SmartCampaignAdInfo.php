<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/common/ad_type_infos.proto

namespace Google\Ads\GoogleAds\V16\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Smart campaign ad.
 *
 * Generated from protobuf message <code>google.ads.googleads.v16.common.SmartCampaignAdInfo</code>
 */
class SmartCampaignAdInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * List of text assets, each of which corresponds to a headline when the ad
     * serves. This list consists of a minimum of 3 and up to 15 text assets.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v16.common.AdTextAsset headlines = 1;</code>
     */
    private $headlines;
    /**
     * List of text assets, each of which corresponds to a description when the ad
     * serves. This list consists of a minimum of 2 and up to 4 text assets.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v16.common.AdTextAsset descriptions = 2;</code>
     */
    private $descriptions;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V16\Common\AdTextAsset>|\Google\Protobuf\Internal\RepeatedField $headlines
     *           List of text assets, each of which corresponds to a headline when the ad
     *           serves. This list consists of a minimum of 3 and up to 15 text assets.
     *     @type array<\Google\Ads\GoogleAds\V16\Common\AdTextAsset>|\Google\Protobuf\Internal\RepeatedField $descriptions
     *           List of text assets, each of which corresponds to a description when the ad
     *           serves. This list consists of a minimum of 2 and up to 4 text assets.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V16\Common\AdTypeInfos::initOnce();
        parent::__construct($data);
    }

    /**
     * List of text assets, each of which corresponds to a headline when the ad
     * serves. This list consists of a minimum of 3 and up to 15 text assets.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v16.common.AdTextAsset headlines = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getHeadlines()
    {
        return $this->headlines;
    }

    /**
     * List of text assets, each of which corresponds to a headline when the ad
     * serves. This list consists of a minimum of 3 and up to 15 text assets.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v16.common.AdTextAsset headlines = 1;</code>
     * @param array<\Google\Ads\GoogleAds\V16\Common\AdTextAsset>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setHeadlines($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V16\Common\AdTextAsset::class);
        $this->headlines = $arr;

        return $this;
    }

    /**
     * List of text assets, each of which corresponds to a description when the ad
     * serves. This list consists of a minimum of 2 and up to 4 text assets.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v16.common.AdTextAsset descriptions = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     * List of text assets, each of which corresponds to a description when the ad
     * serves. This list consists of a minimum of 2 and up to 4 text assets.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v16.common.AdTextAsset descriptions = 2;</code>
     * @param array<\Google\Ads\GoogleAds\V16\Common\AdTextAsset>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setDescriptions($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V16\Common\AdTextAsset::class);
        $this->descriptions = $arr;

        return $this;
    }

}

