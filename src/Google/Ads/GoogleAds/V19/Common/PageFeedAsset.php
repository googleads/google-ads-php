<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/asset_types.proto

namespace Google\Ads\GoogleAds\V19\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Page Feed asset.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.common.PageFeedAsset</code>
 */
class PageFeedAsset extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The webpage that advertisers want to target.
     *
     * Generated from protobuf field <code>string page_url = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $page_url = '';
    /**
     * Labels used to group the page urls.
     *
     * Generated from protobuf field <code>repeated string labels = 2;</code>
     */
    private $labels;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $page_url
     *           Required. The webpage that advertisers want to target.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $labels
     *           Labels used to group the page urls.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Common\AssetTypes::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The webpage that advertisers want to target.
     *
     * Generated from protobuf field <code>string page_url = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getPageUrl()
    {
        return $this->page_url;
    }

    /**
     * Required. The webpage that advertisers want to target.
     *
     * Generated from protobuf field <code>string page_url = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setPageUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->page_url = $var;

        return $this;
    }

    /**
     * Labels used to group the page urls.
     *
     * Generated from protobuf field <code>repeated string labels = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Labels used to group the page urls.
     *
     * Generated from protobuf field <code>repeated string labels = 2;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

}

