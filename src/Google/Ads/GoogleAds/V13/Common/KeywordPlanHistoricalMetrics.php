<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/common/keyword_plan_common.proto

namespace Google\Ads\GoogleAds\V13\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Historical metrics specific to the targeting options selected.
 * Targeting options include geographies, network, etc.
 * Refer to https://support.google.com/google-ads/answer/3022575 for more
 * details.
 *
 * Generated from protobuf message <code>google.ads.googleads.v13.common.KeywordPlanHistoricalMetrics</code>
 */
class KeywordPlanHistoricalMetrics extends \Google\Protobuf\Internal\Message
{
    /**
     * Approximate number of monthly searches on this query averaged
     * for the past 12 months.
     *
     * Generated from protobuf field <code>optional int64 avg_monthly_searches = 7;</code>
     */
    protected $avg_monthly_searches = null;
    /**
     * Approximate number of searches on this query for the past twelve months.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v13.common.MonthlySearchVolume monthly_search_volumes = 6;</code>
     */
    private $monthly_search_volumes;
    /**
     * The competition level for the query.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.enums.KeywordPlanCompetitionLevelEnum.KeywordPlanCompetitionLevel competition = 2;</code>
     */
    protected $competition = 0;
    /**
     * The competition index for the query in the range [0, 100].
     * Shows how competitive ad placement is for a keyword.
     * The level of competition from 0-100 is determined by the number of ad slots
     * filled divided by the total number of ad slots available. If not enough
     * data is available, null is returned.
     *
     * Generated from protobuf field <code>optional int64 competition_index = 8;</code>
     */
    protected $competition_index = null;
    /**
     * Top of page bid low range (20th percentile) in micros for the keyword.
     *
     * Generated from protobuf field <code>optional int64 low_top_of_page_bid_micros = 9;</code>
     */
    protected $low_top_of_page_bid_micros = null;
    /**
     * Top of page bid high range (80th percentile) in micros for the keyword.
     *
     * Generated from protobuf field <code>optional int64 high_top_of_page_bid_micros = 10;</code>
     */
    protected $high_top_of_page_bid_micros = null;
    /**
     * Average Cost Per Click in micros for the keyword.
     *
     * Generated from protobuf field <code>optional int64 average_cpc_micros = 11;</code>
     */
    protected $average_cpc_micros = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $avg_monthly_searches
     *           Approximate number of monthly searches on this query averaged
     *           for the past 12 months.
     *     @type array<\Google\Ads\GoogleAds\V13\Common\MonthlySearchVolume>|\Google\Protobuf\Internal\RepeatedField $monthly_search_volumes
     *           Approximate number of searches on this query for the past twelve months.
     *     @type int $competition
     *           The competition level for the query.
     *     @type int|string $competition_index
     *           The competition index for the query in the range [0, 100].
     *           Shows how competitive ad placement is for a keyword.
     *           The level of competition from 0-100 is determined by the number of ad slots
     *           filled divided by the total number of ad slots available. If not enough
     *           data is available, null is returned.
     *     @type int|string $low_top_of_page_bid_micros
     *           Top of page bid low range (20th percentile) in micros for the keyword.
     *     @type int|string $high_top_of_page_bid_micros
     *           Top of page bid high range (80th percentile) in micros for the keyword.
     *     @type int|string $average_cpc_micros
     *           Average Cost Per Click in micros for the keyword.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V13\Common\KeywordPlanCommon::initOnce();
        parent::__construct($data);
    }

    /**
     * Approximate number of monthly searches on this query averaged
     * for the past 12 months.
     *
     * Generated from protobuf field <code>optional int64 avg_monthly_searches = 7;</code>
     * @return int|string
     */
    public function getAvgMonthlySearches()
    {
        return isset($this->avg_monthly_searches) ? $this->avg_monthly_searches : 0;
    }

    public function hasAvgMonthlySearches()
    {
        return isset($this->avg_monthly_searches);
    }

    public function clearAvgMonthlySearches()
    {
        unset($this->avg_monthly_searches);
    }

    /**
     * Approximate number of monthly searches on this query averaged
     * for the past 12 months.
     *
     * Generated from protobuf field <code>optional int64 avg_monthly_searches = 7;</code>
     * @param int|string $var
     * @return $this
     */
    public function setAvgMonthlySearches($var)
    {
        GPBUtil::checkInt64($var);
        $this->avg_monthly_searches = $var;

        return $this;
    }

    /**
     * Approximate number of searches on this query for the past twelve months.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v13.common.MonthlySearchVolume monthly_search_volumes = 6;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getMonthlySearchVolumes()
    {
        return $this->monthly_search_volumes;
    }

    /**
     * Approximate number of searches on this query for the past twelve months.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v13.common.MonthlySearchVolume monthly_search_volumes = 6;</code>
     * @param array<\Google\Ads\GoogleAds\V13\Common\MonthlySearchVolume>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setMonthlySearchVolumes($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V13\Common\MonthlySearchVolume::class);
        $this->monthly_search_volumes = $arr;

        return $this;
    }

    /**
     * The competition level for the query.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.enums.KeywordPlanCompetitionLevelEnum.KeywordPlanCompetitionLevel competition = 2;</code>
     * @return int
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * The competition level for the query.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.enums.KeywordPlanCompetitionLevelEnum.KeywordPlanCompetitionLevel competition = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setCompetition($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V13\Enums\KeywordPlanCompetitionLevelEnum\KeywordPlanCompetitionLevel::class);
        $this->competition = $var;

        return $this;
    }

    /**
     * The competition index for the query in the range [0, 100].
     * Shows how competitive ad placement is for a keyword.
     * The level of competition from 0-100 is determined by the number of ad slots
     * filled divided by the total number of ad slots available. If not enough
     * data is available, null is returned.
     *
     * Generated from protobuf field <code>optional int64 competition_index = 8;</code>
     * @return int|string
     */
    public function getCompetitionIndex()
    {
        return isset($this->competition_index) ? $this->competition_index : 0;
    }

    public function hasCompetitionIndex()
    {
        return isset($this->competition_index);
    }

    public function clearCompetitionIndex()
    {
        unset($this->competition_index);
    }

    /**
     * The competition index for the query in the range [0, 100].
     * Shows how competitive ad placement is for a keyword.
     * The level of competition from 0-100 is determined by the number of ad slots
     * filled divided by the total number of ad slots available. If not enough
     * data is available, null is returned.
     *
     * Generated from protobuf field <code>optional int64 competition_index = 8;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCompetitionIndex($var)
    {
        GPBUtil::checkInt64($var);
        $this->competition_index = $var;

        return $this;
    }

    /**
     * Top of page bid low range (20th percentile) in micros for the keyword.
     *
     * Generated from protobuf field <code>optional int64 low_top_of_page_bid_micros = 9;</code>
     * @return int|string
     */
    public function getLowTopOfPageBidMicros()
    {
        return isset($this->low_top_of_page_bid_micros) ? $this->low_top_of_page_bid_micros : 0;
    }

    public function hasLowTopOfPageBidMicros()
    {
        return isset($this->low_top_of_page_bid_micros);
    }

    public function clearLowTopOfPageBidMicros()
    {
        unset($this->low_top_of_page_bid_micros);
    }

    /**
     * Top of page bid low range (20th percentile) in micros for the keyword.
     *
     * Generated from protobuf field <code>optional int64 low_top_of_page_bid_micros = 9;</code>
     * @param int|string $var
     * @return $this
     */
    public function setLowTopOfPageBidMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->low_top_of_page_bid_micros = $var;

        return $this;
    }

    /**
     * Top of page bid high range (80th percentile) in micros for the keyword.
     *
     * Generated from protobuf field <code>optional int64 high_top_of_page_bid_micros = 10;</code>
     * @return int|string
     */
    public function getHighTopOfPageBidMicros()
    {
        return isset($this->high_top_of_page_bid_micros) ? $this->high_top_of_page_bid_micros : 0;
    }

    public function hasHighTopOfPageBidMicros()
    {
        return isset($this->high_top_of_page_bid_micros);
    }

    public function clearHighTopOfPageBidMicros()
    {
        unset($this->high_top_of_page_bid_micros);
    }

    /**
     * Top of page bid high range (80th percentile) in micros for the keyword.
     *
     * Generated from protobuf field <code>optional int64 high_top_of_page_bid_micros = 10;</code>
     * @param int|string $var
     * @return $this
     */
    public function setHighTopOfPageBidMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->high_top_of_page_bid_micros = $var;

        return $this;
    }

    /**
     * Average Cost Per Click in micros for the keyword.
     *
     * Generated from protobuf field <code>optional int64 average_cpc_micros = 11;</code>
     * @return int|string
     */
    public function getAverageCpcMicros()
    {
        return isset($this->average_cpc_micros) ? $this->average_cpc_micros : 0;
    }

    public function hasAverageCpcMicros()
    {
        return isset($this->average_cpc_micros);
    }

    public function clearAverageCpcMicros()
    {
        unset($this->average_cpc_micros);
    }

    /**
     * Average Cost Per Click in micros for the keyword.
     *
     * Generated from protobuf field <code>optional int64 average_cpc_micros = 11;</code>
     * @param int|string $var
     * @return $this
     */
    public function setAverageCpcMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->average_cpc_micros = $var;

        return $this;
    }

}

