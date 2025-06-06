<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/recommendation.proto

namespace Google\Ads\GoogleAds\V20\Resources\Recommendation;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The Dynamic Search Ads to Performance Max migration recommendation.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.Recommendation.MigrateDynamicSearchAdsCampaignToPerformanceMaxRecommendation</code>
 */
class MigrateDynamicSearchAdsCampaignToPerformanceMaxRecommendation extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. A link to the Google Ads UI where the customer can manually
     * apply the recommendation.
     *
     * Generated from protobuf field <code>string apply_link = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $apply_link = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $apply_link
     *           Output only. A link to the Google Ads UI where the customer can manually
     *           apply the recommendation.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\Recommendation::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. A link to the Google Ads UI where the customer can manually
     * apply the recommendation.
     *
     * Generated from protobuf field <code>string apply_link = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getApplyLink()
    {
        return $this->apply_link;
    }

    /**
     * Output only. A link to the Google Ads UI where the customer can manually
     * apply the recommendation.
     *
     * Generated from protobuf field <code>string apply_link = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setApplyLink($var)
    {
        GPBUtil::checkString($var, True);
        $this->apply_link = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MigrateDynamicSearchAdsCampaignToPerformanceMaxRecommendation::class, \Google\Ads\GoogleAds\V20\Resources\Recommendation_MigrateDynamicSearchAdsCampaignToPerformanceMaxRecommendation::class);

