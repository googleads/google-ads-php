<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/customer_negative_criterion.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A negative criterion for exclusions at the customer level.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.CustomerNegativeCriterion</code>
 */
class CustomerNegativeCriterion extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the customer negative criterion.
     * Customer negative criterion resource names have the form:
     * `customers/{customer_id}/customerNegativeCriteria/{criterion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the criterion.
     *
     * Generated from protobuf field <code>optional int64 id = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = null;
    /**
     * Output only. The type of the criterion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CriterionTypeEnum.CriterionType type = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $type = 0;
    protected $criterion;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the customer negative criterion.
     *           Customer negative criterion resource names have the form:
     *           `customers/{customer_id}/customerNegativeCriteria/{criterion_id}`
     *     @type int|string $id
     *           Output only. The ID of the criterion.
     *     @type int $type
     *           Output only. The type of the criterion.
     *     @type \Google\Ads\GoogleAds\V20\Common\ContentLabelInfo $content_label
     *           Immutable. ContentLabel.
     *     @type \Google\Ads\GoogleAds\V20\Common\MobileApplicationInfo $mobile_application
     *           Immutable. MobileApplication.
     *     @type \Google\Ads\GoogleAds\V20\Common\MobileAppCategoryInfo $mobile_app_category
     *           Immutable. MobileAppCategory.
     *     @type \Google\Ads\GoogleAds\V20\Common\PlacementInfo $placement
     *           Immutable. Placement.
     *     @type \Google\Ads\GoogleAds\V20\Common\YouTubeVideoInfo $youtube_video
     *           Immutable. YouTube Video.
     *     @type \Google\Ads\GoogleAds\V20\Common\YouTubeChannelInfo $youtube_channel
     *           Immutable. YouTube Channel.
     *     @type \Google\Ads\GoogleAds\V20\Common\NegativeKeywordListInfo $negative_keyword_list
     *           Immutable. NegativeKeywordList.
     *     @type \Google\Ads\GoogleAds\V20\Common\IpBlockInfo $ip_block
     *           Immutable. IPBLock
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\CustomerNegativeCriterion::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the customer negative criterion.
     * Customer negative criterion resource names have the form:
     * `customers/{customer_id}/customerNegativeCriteria/{criterion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the customer negative criterion.
     * Customer negative criterion resource names have the form:
     * `customers/{customer_id}/customerNegativeCriteria/{criterion_id}`
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
     * Output only. The ID of the criterion.
     *
     * Generated from protobuf field <code>optional int64 id = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getId()
    {
        return isset($this->id) ? $this->id : 0;
    }

    public function hasId()
    {
        return isset($this->id);
    }

    public function clearId()
    {
        unset($this->id);
    }

    /**
     * Output only. The ID of the criterion.
     *
     * Generated from protobuf field <code>optional int64 id = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt64($var);
        $this->id = $var;

        return $this;
    }

    /**
     * Output only. The type of the criterion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CriterionTypeEnum.CriterionType type = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Output only. The type of the criterion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CriterionTypeEnum.CriterionType type = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\CriterionTypeEnum\CriterionType::class);
        $this->type = $var;

        return $this;
    }

    /**
     * Immutable. ContentLabel.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.ContentLabelInfo content_label = 4 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\ContentLabelInfo|null
     */
    public function getContentLabel()
    {
        return $this->readOneof(4);
    }

    public function hasContentLabel()
    {
        return $this->hasOneof(4);
    }

    /**
     * Immutable. ContentLabel.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.ContentLabelInfo content_label = 4 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\ContentLabelInfo $var
     * @return $this
     */
    public function setContentLabel($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\ContentLabelInfo::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Immutable. MobileApplication.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.MobileApplicationInfo mobile_application = 5 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\MobileApplicationInfo|null
     */
    public function getMobileApplication()
    {
        return $this->readOneof(5);
    }

    public function hasMobileApplication()
    {
        return $this->hasOneof(5);
    }

    /**
     * Immutable. MobileApplication.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.MobileApplicationInfo mobile_application = 5 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\MobileApplicationInfo $var
     * @return $this
     */
    public function setMobileApplication($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\MobileApplicationInfo::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Immutable. MobileAppCategory.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.MobileAppCategoryInfo mobile_app_category = 6 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\MobileAppCategoryInfo|null
     */
    public function getMobileAppCategory()
    {
        return $this->readOneof(6);
    }

    public function hasMobileAppCategory()
    {
        return $this->hasOneof(6);
    }

    /**
     * Immutable. MobileAppCategory.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.MobileAppCategoryInfo mobile_app_category = 6 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\MobileAppCategoryInfo $var
     * @return $this
     */
    public function setMobileAppCategory($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\MobileAppCategoryInfo::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * Immutable. Placement.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.PlacementInfo placement = 7 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\PlacementInfo|null
     */
    public function getPlacement()
    {
        return $this->readOneof(7);
    }

    public function hasPlacement()
    {
        return $this->hasOneof(7);
    }

    /**
     * Immutable. Placement.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.PlacementInfo placement = 7 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\PlacementInfo $var
     * @return $this
     */
    public function setPlacement($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\PlacementInfo::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * Immutable. YouTube Video.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.YouTubeVideoInfo youtube_video = 8 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\YouTubeVideoInfo|null
     */
    public function getYoutubeVideo()
    {
        return $this->readOneof(8);
    }

    public function hasYoutubeVideo()
    {
        return $this->hasOneof(8);
    }

    /**
     * Immutable. YouTube Video.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.YouTubeVideoInfo youtube_video = 8 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\YouTubeVideoInfo $var
     * @return $this
     */
    public function setYoutubeVideo($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\YouTubeVideoInfo::class);
        $this->writeOneof(8, $var);

        return $this;
    }

    /**
     * Immutable. YouTube Channel.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.YouTubeChannelInfo youtube_channel = 9 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\YouTubeChannelInfo|null
     */
    public function getYoutubeChannel()
    {
        return $this->readOneof(9);
    }

    public function hasYoutubeChannel()
    {
        return $this->hasOneof(9);
    }

    /**
     * Immutable. YouTube Channel.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.YouTubeChannelInfo youtube_channel = 9 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\YouTubeChannelInfo $var
     * @return $this
     */
    public function setYoutubeChannel($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\YouTubeChannelInfo::class);
        $this->writeOneof(9, $var);

        return $this;
    }

    /**
     * Immutable. NegativeKeywordList.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.NegativeKeywordListInfo negative_keyword_list = 11 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\NegativeKeywordListInfo|null
     */
    public function getNegativeKeywordList()
    {
        return $this->readOneof(11);
    }

    public function hasNegativeKeywordList()
    {
        return $this->hasOneof(11);
    }

    /**
     * Immutable. NegativeKeywordList.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.NegativeKeywordListInfo negative_keyword_list = 11 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\NegativeKeywordListInfo $var
     * @return $this
     */
    public function setNegativeKeywordList($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\NegativeKeywordListInfo::class);
        $this->writeOneof(11, $var);

        return $this;
    }

    /**
     * Immutable. IPBLock
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.IpBlockInfo ip_block = 12 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\IpBlockInfo|null
     */
    public function getIpBlock()
    {
        return $this->readOneof(12);
    }

    public function hasIpBlock()
    {
        return $this->hasOneof(12);
    }

    /**
     * Immutable. IPBLock
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.IpBlockInfo ip_block = 12 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\IpBlockInfo $var
     * @return $this
     */
    public function setIpBlock($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\IpBlockInfo::class);
        $this->writeOneof(12, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getCriterion()
    {
        return $this->whichOneof("criterion");
    }

}

