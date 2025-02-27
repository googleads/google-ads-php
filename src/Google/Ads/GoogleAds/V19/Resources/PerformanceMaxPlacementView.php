<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/performance_max_placement_view.proto

namespace Google\Ads\GoogleAds\V19\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A view with impression metrics for Performance Max campaign placements.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.PerformanceMaxPlacementView</code>
 */
class PerformanceMaxPlacementView extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the Performance Max placement view.
     * Performance Max placement view resource names have the form:
     * `customers/{customer_id}/performanceMaxPlacementViews/{base_64_placement}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The default placement string, such as the website URL, mobile
     * application ID, or a YouTube video ID.
     *
     * Generated from protobuf field <code>optional string placement = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $placement = null;
    /**
     * Output only. The name displayed to represent the placement, such as the URL
     * name for websites, YouTube video name for YouTube videos, and translated
     * mobile app name for mobile apps.
     *
     * Generated from protobuf field <code>optional string display_name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $display_name = null;
    /**
     * Output only. URL of the placement, for example, website, link to the mobile
     * application in app store, or a YouTube video URL.
     *
     * Generated from protobuf field <code>optional string target_url = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $target_url = null;
    /**
     * Output only. Type of the placement. Possible values for Performance Max
     * placements are WEBSITE, MOBILE_APPLICATION, or YOUTUBE_VIDEO.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.PlacementTypeEnum.PlacementType placement_type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $placement_type = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the Performance Max placement view.
     *           Performance Max placement view resource names have the form:
     *           `customers/{customer_id}/performanceMaxPlacementViews/{base_64_placement}`
     *     @type string $placement
     *           Output only. The default placement string, such as the website URL, mobile
     *           application ID, or a YouTube video ID.
     *     @type string $display_name
     *           Output only. The name displayed to represent the placement, such as the URL
     *           name for websites, YouTube video name for YouTube videos, and translated
     *           mobile app name for mobile apps.
     *     @type string $target_url
     *           Output only. URL of the placement, for example, website, link to the mobile
     *           application in app store, or a YouTube video URL.
     *     @type int $placement_type
     *           Output only. Type of the placement. Possible values for Performance Max
     *           placements are WEBSITE, MOBILE_APPLICATION, or YOUTUBE_VIDEO.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\PerformanceMaxPlacementView::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the Performance Max placement view.
     * Performance Max placement view resource names have the form:
     * `customers/{customer_id}/performanceMaxPlacementViews/{base_64_placement}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the Performance Max placement view.
     * Performance Max placement view resource names have the form:
     * `customers/{customer_id}/performanceMaxPlacementViews/{base_64_placement}`
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
     * Output only. The default placement string, such as the website URL, mobile
     * application ID, or a YouTube video ID.
     *
     * Generated from protobuf field <code>optional string placement = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getPlacement()
    {
        return isset($this->placement) ? $this->placement : '';
    }

    public function hasPlacement()
    {
        return isset($this->placement);
    }

    public function clearPlacement()
    {
        unset($this->placement);
    }

    /**
     * Output only. The default placement string, such as the website URL, mobile
     * application ID, or a YouTube video ID.
     *
     * Generated from protobuf field <code>optional string placement = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setPlacement($var)
    {
        GPBUtil::checkString($var, True);
        $this->placement = $var;

        return $this;
    }

    /**
     * Output only. The name displayed to represent the placement, such as the URL
     * name for websites, YouTube video name for YouTube videos, and translated
     * mobile app name for mobile apps.
     *
     * Generated from protobuf field <code>optional string display_name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getDisplayName()
    {
        return isset($this->display_name) ? $this->display_name : '';
    }

    public function hasDisplayName()
    {
        return isset($this->display_name);
    }

    public function clearDisplayName()
    {
        unset($this->display_name);
    }

    /**
     * Output only. The name displayed to represent the placement, such as the URL
     * name for websites, YouTube video name for YouTube videos, and translated
     * mobile app name for mobile apps.
     *
     * Generated from protobuf field <code>optional string display_name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->display_name = $var;

        return $this;
    }

    /**
     * Output only. URL of the placement, for example, website, link to the mobile
     * application in app store, or a YouTube video URL.
     *
     * Generated from protobuf field <code>optional string target_url = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getTargetUrl()
    {
        return isset($this->target_url) ? $this->target_url : '';
    }

    public function hasTargetUrl()
    {
        return isset($this->target_url);
    }

    public function clearTargetUrl()
    {
        unset($this->target_url);
    }

    /**
     * Output only. URL of the placement, for example, website, link to the mobile
     * application in app store, or a YouTube video URL.
     *
     * Generated from protobuf field <code>optional string target_url = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setTargetUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->target_url = $var;

        return $this;
    }

    /**
     * Output only. Type of the placement. Possible values for Performance Max
     * placements are WEBSITE, MOBILE_APPLICATION, or YOUTUBE_VIDEO.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.PlacementTypeEnum.PlacementType placement_type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getPlacementType()
    {
        return $this->placement_type;
    }

    /**
     * Output only. Type of the placement. Possible values for Performance Max
     * placements are WEBSITE, MOBILE_APPLICATION, or YOUTUBE_VIDEO.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.PlacementTypeEnum.PlacementType placement_type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setPlacementType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\PlacementTypeEnum\PlacementType::class);
        $this->placement_type = $var;

        return $this;
    }

}

