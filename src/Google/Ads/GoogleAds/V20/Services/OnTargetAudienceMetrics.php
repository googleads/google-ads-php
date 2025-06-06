<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/reach_plan_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Audience metrics for the planned products.
 * These metrics consider the following targeting dimensions:
 * - Location
 * - PlannableAgeRange
 * - Gender
 * - AudienceTargeting (only for youtube_audience_size)
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.OnTargetAudienceMetrics</code>
 */
class OnTargetAudienceMetrics extends \Google\Protobuf\Internal\Message
{
    /**
     * Reference audience size matching the considered targeting for YouTube.
     *
     * Generated from protobuf field <code>optional int64 youtube_audience_size = 3;</code>
     */
    protected $youtube_audience_size = null;
    /**
     * Reference audience size matching the considered targeting for Census.
     *
     * Generated from protobuf field <code>optional int64 census_audience_size = 4;</code>
     */
    protected $census_audience_size = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $youtube_audience_size
     *           Reference audience size matching the considered targeting for YouTube.
     *     @type int|string $census_audience_size
     *           Reference audience size matching the considered targeting for Census.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\ReachPlanService::initOnce();
        parent::__construct($data);
    }

    /**
     * Reference audience size matching the considered targeting for YouTube.
     *
     * Generated from protobuf field <code>optional int64 youtube_audience_size = 3;</code>
     * @return int|string
     */
    public function getYoutubeAudienceSize()
    {
        return isset($this->youtube_audience_size) ? $this->youtube_audience_size : 0;
    }

    public function hasYoutubeAudienceSize()
    {
        return isset($this->youtube_audience_size);
    }

    public function clearYoutubeAudienceSize()
    {
        unset($this->youtube_audience_size);
    }

    /**
     * Reference audience size matching the considered targeting for YouTube.
     *
     * Generated from protobuf field <code>optional int64 youtube_audience_size = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setYoutubeAudienceSize($var)
    {
        GPBUtil::checkInt64($var);
        $this->youtube_audience_size = $var;

        return $this;
    }

    /**
     * Reference audience size matching the considered targeting for Census.
     *
     * Generated from protobuf field <code>optional int64 census_audience_size = 4;</code>
     * @return int|string
     */
    public function getCensusAudienceSize()
    {
        return isset($this->census_audience_size) ? $this->census_audience_size : 0;
    }

    public function hasCensusAudienceSize()
    {
        return isset($this->census_audience_size);
    }

    public function clearCensusAudienceSize()
    {
        unset($this->census_audience_size);
    }

    /**
     * Reference audience size matching the considered targeting for Census.
     *
     * Generated from protobuf field <code>optional int64 census_audience_size = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCensusAudienceSize($var)
    {
        GPBUtil::checkInt64($var);
        $this->census_audience_size = $var;

        return $this;
    }

}

