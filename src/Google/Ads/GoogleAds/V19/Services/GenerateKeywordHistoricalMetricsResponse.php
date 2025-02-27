<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/keyword_plan_idea_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for
 * [KeywordPlanIdeaService.GenerateKeywordHistoricalMetrics][google.ads.googleads.v19.services.KeywordPlanIdeaService.GenerateKeywordHistoricalMetrics].
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.GenerateKeywordHistoricalMetricsResponse</code>
 */
class GenerateKeywordHistoricalMetricsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * List of keywords and their historical metrics.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.services.GenerateKeywordHistoricalMetricsResult results = 1;</code>
     */
    private $results;
    /**
     * The aggregate metrics for all keywords.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.KeywordPlanAggregateMetricResults aggregate_metric_results = 2;</code>
     */
    protected $aggregate_metric_results = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V19\Services\GenerateKeywordHistoricalMetricsResult>|\Google\Protobuf\Internal\RepeatedField $results
     *           List of keywords and their historical metrics.
     *     @type \Google\Ads\GoogleAds\V19\Common\KeywordPlanAggregateMetricResults $aggregate_metric_results
     *           The aggregate metrics for all keywords.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\KeywordPlanIdeaService::initOnce();
        parent::__construct($data);
    }

    /**
     * List of keywords and their historical metrics.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.services.GenerateKeywordHistoricalMetricsResult results = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * List of keywords and their historical metrics.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.services.GenerateKeywordHistoricalMetricsResult results = 1;</code>
     * @param array<\Google\Ads\GoogleAds\V19\Services\GenerateKeywordHistoricalMetricsResult>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setResults($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V19\Services\GenerateKeywordHistoricalMetricsResult::class);
        $this->results = $arr;

        return $this;
    }

    /**
     * The aggregate metrics for all keywords.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.KeywordPlanAggregateMetricResults aggregate_metric_results = 2;</code>
     * @return \Google\Ads\GoogleAds\V19\Common\KeywordPlanAggregateMetricResults|null
     */
    public function getAggregateMetricResults()
    {
        return $this->aggregate_metric_results;
    }

    public function hasAggregateMetricResults()
    {
        return isset($this->aggregate_metric_results);
    }

    public function clearAggregateMetricResults()
    {
        unset($this->aggregate_metric_results);
    }

    /**
     * The aggregate metrics for all keywords.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.KeywordPlanAggregateMetricResults aggregate_metric_results = 2;</code>
     * @param \Google\Ads\GoogleAds\V19\Common\KeywordPlanAggregateMetricResults $var
     * @return $this
     */
    public function setAggregateMetricResults($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Common\KeywordPlanAggregateMetricResults::class);
        $this->aggregate_metric_results = $var;

        return $this;
    }

}

