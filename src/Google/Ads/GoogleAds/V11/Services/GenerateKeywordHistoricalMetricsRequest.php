<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v11/services/keyword_plan_idea_service.proto

namespace Google\Ads\GoogleAds\V11\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [KeywordPlanIdeaService.GenerateKeywordHistoricalMetrics][google.ads.googleads.v11.services.KeywordPlanIdeaService.GenerateKeywordHistoricalMetrics].
 *
 * Generated from protobuf message <code>google.ads.googleads.v11.services.GenerateKeywordHistoricalMetricsRequest</code>
 */
class GenerateKeywordHistoricalMetricsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * The ID of the customer with the recommendation.
     *
     * Generated from protobuf field <code>string customer_id = 1;</code>
     */
    protected $customer_id = '';
    /**
     * A list of keywords to get historical metrics.
     * Not all inputs will be returned as a result of near-exact deduplication.
     * For example, if stats for "car" and "cars" are requested, only "car" will
     * be returned.
     * A maximum of 10,000 keywords can be used.
     *
     * Generated from protobuf field <code>repeated string keywords = 2;</code>
     */
    private $keywords;
    /**
     * The resource name of the language to target.
     * Each keyword belongs to some set of languages; a keyword is included if
     * language is one of its languages.
     * If not set, all keywords will be included.
     *
     * Generated from protobuf field <code>optional string language = 4;</code>
     */
    protected $language = null;
    /**
     * If true, adult keywords will be included in response.
     * The default value is false.
     *
     * Generated from protobuf field <code>bool include_adult_keywords = 5;</code>
     */
    protected $include_adult_keywords = false;
    /**
     * The resource names of the location to target. Maximum is 10.
     * An empty list MAY be used to specify all targeting geos.
     *
     * Generated from protobuf field <code>repeated string geo_target_constants = 6;</code>
     */
    private $geo_target_constants;
    /**
     * Targeting network.
     * If not set, Google Search And Partners Network will be used.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.KeywordPlanNetworkEnum.KeywordPlanNetwork keyword_plan_network = 7;</code>
     */
    protected $keyword_plan_network = 0;
    /**
     * The aggregate fields to include in response.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.KeywordPlanAggregateMetrics aggregate_metrics = 8;</code>
     */
    protected $aggregate_metrics = null;
    /**
     * The options for historical metrics data.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.HistoricalMetricsOptions historical_metrics_options = 3;</code>
     */
    protected $historical_metrics_options = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $customer_id
     *           The ID of the customer with the recommendation.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $keywords
     *           A list of keywords to get historical metrics.
     *           Not all inputs will be returned as a result of near-exact deduplication.
     *           For example, if stats for "car" and "cars" are requested, only "car" will
     *           be returned.
     *           A maximum of 10,000 keywords can be used.
     *     @type string $language
     *           The resource name of the language to target.
     *           Each keyword belongs to some set of languages; a keyword is included if
     *           language is one of its languages.
     *           If not set, all keywords will be included.
     *     @type bool $include_adult_keywords
     *           If true, adult keywords will be included in response.
     *           The default value is false.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $geo_target_constants
     *           The resource names of the location to target. Maximum is 10.
     *           An empty list MAY be used to specify all targeting geos.
     *     @type int $keyword_plan_network
     *           Targeting network.
     *           If not set, Google Search And Partners Network will be used.
     *     @type \Google\Ads\GoogleAds\V11\Common\KeywordPlanAggregateMetrics $aggregate_metrics
     *           The aggregate fields to include in response.
     *     @type \Google\Ads\GoogleAds\V11\Common\HistoricalMetricsOptions $historical_metrics_options
     *           The options for historical metrics data.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V11\Services\KeywordPlanIdeaService::initOnce();
        parent::__construct($data);
    }

    /**
     * The ID of the customer with the recommendation.
     *
     * Generated from protobuf field <code>string customer_id = 1;</code>
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * The ID of the customer with the recommendation.
     *
     * Generated from protobuf field <code>string customer_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCustomerId($var)
    {
        GPBUtil::checkString($var, True);
        $this->customer_id = $var;

        return $this;
    }

    /**
     * A list of keywords to get historical metrics.
     * Not all inputs will be returned as a result of near-exact deduplication.
     * For example, if stats for "car" and "cars" are requested, only "car" will
     * be returned.
     * A maximum of 10,000 keywords can be used.
     *
     * Generated from protobuf field <code>repeated string keywords = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * A list of keywords to get historical metrics.
     * Not all inputs will be returned as a result of near-exact deduplication.
     * For example, if stats for "car" and "cars" are requested, only "car" will
     * be returned.
     * A maximum of 10,000 keywords can be used.
     *
     * Generated from protobuf field <code>repeated string keywords = 2;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setKeywords($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->keywords = $arr;

        return $this;
    }

    /**
     * The resource name of the language to target.
     * Each keyword belongs to some set of languages; a keyword is included if
     * language is one of its languages.
     * If not set, all keywords will be included.
     *
     * Generated from protobuf field <code>optional string language = 4;</code>
     * @return string
     */
    public function getLanguage()
    {
        return isset($this->language) ? $this->language : '';
    }

    public function hasLanguage()
    {
        return isset($this->language);
    }

    public function clearLanguage()
    {
        unset($this->language);
    }

    /**
     * The resource name of the language to target.
     * Each keyword belongs to some set of languages; a keyword is included if
     * language is one of its languages.
     * If not set, all keywords will be included.
     *
     * Generated from protobuf field <code>optional string language = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setLanguage($var)
    {
        GPBUtil::checkString($var, True);
        $this->language = $var;

        return $this;
    }

    /**
     * If true, adult keywords will be included in response.
     * The default value is false.
     *
     * Generated from protobuf field <code>bool include_adult_keywords = 5;</code>
     * @return bool
     */
    public function getIncludeAdultKeywords()
    {
        return $this->include_adult_keywords;
    }

    /**
     * If true, adult keywords will be included in response.
     * The default value is false.
     *
     * Generated from protobuf field <code>bool include_adult_keywords = 5;</code>
     * @param bool $var
     * @return $this
     */
    public function setIncludeAdultKeywords($var)
    {
        GPBUtil::checkBool($var);
        $this->include_adult_keywords = $var;

        return $this;
    }

    /**
     * The resource names of the location to target. Maximum is 10.
     * An empty list MAY be used to specify all targeting geos.
     *
     * Generated from protobuf field <code>repeated string geo_target_constants = 6;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getGeoTargetConstants()
    {
        return $this->geo_target_constants;
    }

    /**
     * The resource names of the location to target. Maximum is 10.
     * An empty list MAY be used to specify all targeting geos.
     *
     * Generated from protobuf field <code>repeated string geo_target_constants = 6;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setGeoTargetConstants($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->geo_target_constants = $arr;

        return $this;
    }

    /**
     * Targeting network.
     * If not set, Google Search And Partners Network will be used.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.KeywordPlanNetworkEnum.KeywordPlanNetwork keyword_plan_network = 7;</code>
     * @return int
     */
    public function getKeywordPlanNetwork()
    {
        return $this->keyword_plan_network;
    }

    /**
     * Targeting network.
     * If not set, Google Search And Partners Network will be used.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.enums.KeywordPlanNetworkEnum.KeywordPlanNetwork keyword_plan_network = 7;</code>
     * @param int $var
     * @return $this
     */
    public function setKeywordPlanNetwork($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V11\Enums\KeywordPlanNetworkEnum\KeywordPlanNetwork::class);
        $this->keyword_plan_network = $var;

        return $this;
    }

    /**
     * The aggregate fields to include in response.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.KeywordPlanAggregateMetrics aggregate_metrics = 8;</code>
     * @return \Google\Ads\GoogleAds\V11\Common\KeywordPlanAggregateMetrics|null
     */
    public function getAggregateMetrics()
    {
        return $this->aggregate_metrics;
    }

    public function hasAggregateMetrics()
    {
        return isset($this->aggregate_metrics);
    }

    public function clearAggregateMetrics()
    {
        unset($this->aggregate_metrics);
    }

    /**
     * The aggregate fields to include in response.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.KeywordPlanAggregateMetrics aggregate_metrics = 8;</code>
     * @param \Google\Ads\GoogleAds\V11\Common\KeywordPlanAggregateMetrics $var
     * @return $this
     */
    public function setAggregateMetrics($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V11\Common\KeywordPlanAggregateMetrics::class);
        $this->aggregate_metrics = $var;

        return $this;
    }

    /**
     * The options for historical metrics data.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.HistoricalMetricsOptions historical_metrics_options = 3;</code>
     * @return \Google\Ads\GoogleAds\V11\Common\HistoricalMetricsOptions|null
     */
    public function getHistoricalMetricsOptions()
    {
        return $this->historical_metrics_options;
    }

    public function hasHistoricalMetricsOptions()
    {
        return isset($this->historical_metrics_options);
    }

    public function clearHistoricalMetricsOptions()
    {
        unset($this->historical_metrics_options);
    }

    /**
     * The options for historical metrics data.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v11.common.HistoricalMetricsOptions historical_metrics_options = 3;</code>
     * @param \Google\Ads\GoogleAds\V11\Common\HistoricalMetricsOptions $var
     * @return $this
     */
    public function setHistoricalMetricsOptions($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V11\Common\HistoricalMetricsOptions::class);
        $this->historical_metrics_options = $var;

        return $this;
    }

}

