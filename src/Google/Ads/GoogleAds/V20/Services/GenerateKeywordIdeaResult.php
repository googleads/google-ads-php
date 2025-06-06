<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/keyword_plan_idea_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The result of generating keyword ideas.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.GenerateKeywordIdeaResult</code>
 */
class GenerateKeywordIdeaResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Text of the keyword idea.
     * As in Keyword Plan historical metrics, this text may not be an actual
     * keyword, but the canonical form of multiple keywords.
     * See KeywordPlanKeywordHistoricalMetrics message in KeywordPlanService.
     *
     * Generated from protobuf field <code>optional string text = 5;</code>
     */
    protected $text = null;
    /**
     * The historical metrics for the keyword.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.KeywordPlanHistoricalMetrics keyword_idea_metrics = 3;</code>
     */
    protected $keyword_idea_metrics = null;
    /**
     * The annotations for the keyword.
     * The annotation data is only provided if requested.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.KeywordAnnotations keyword_annotations = 6;</code>
     */
    protected $keyword_annotations = null;
    /**
     * The list of close variants from the requested keywords that
     * are combined into this GenerateKeywordIdeaResult. See
     * https://support.google.com/google-ads/answer/9342105 for the
     * definition of "close variants".
     *
     * Generated from protobuf field <code>repeated string close_variants = 7;</code>
     */
    private $close_variants;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $text
     *           Text of the keyword idea.
     *           As in Keyword Plan historical metrics, this text may not be an actual
     *           keyword, but the canonical form of multiple keywords.
     *           See KeywordPlanKeywordHistoricalMetrics message in KeywordPlanService.
     *     @type \Google\Ads\GoogleAds\V20\Common\KeywordPlanHistoricalMetrics $keyword_idea_metrics
     *           The historical metrics for the keyword.
     *     @type \Google\Ads\GoogleAds\V20\Common\KeywordAnnotations $keyword_annotations
     *           The annotations for the keyword.
     *           The annotation data is only provided if requested.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $close_variants
     *           The list of close variants from the requested keywords that
     *           are combined into this GenerateKeywordIdeaResult. See
     *           https://support.google.com/google-ads/answer/9342105 for the
     *           definition of "close variants".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\KeywordPlanIdeaService::initOnce();
        parent::__construct($data);
    }

    /**
     * Text of the keyword idea.
     * As in Keyword Plan historical metrics, this text may not be an actual
     * keyword, but the canonical form of multiple keywords.
     * See KeywordPlanKeywordHistoricalMetrics message in KeywordPlanService.
     *
     * Generated from protobuf field <code>optional string text = 5;</code>
     * @return string
     */
    public function getText()
    {
        return isset($this->text) ? $this->text : '';
    }

    public function hasText()
    {
        return isset($this->text);
    }

    public function clearText()
    {
        unset($this->text);
    }

    /**
     * Text of the keyword idea.
     * As in Keyword Plan historical metrics, this text may not be an actual
     * keyword, but the canonical form of multiple keywords.
     * See KeywordPlanKeywordHistoricalMetrics message in KeywordPlanService.
     *
     * Generated from protobuf field <code>optional string text = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setText($var)
    {
        GPBUtil::checkString($var, True);
        $this->text = $var;

        return $this;
    }

    /**
     * The historical metrics for the keyword.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.KeywordPlanHistoricalMetrics keyword_idea_metrics = 3;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\KeywordPlanHistoricalMetrics|null
     */
    public function getKeywordIdeaMetrics()
    {
        return $this->keyword_idea_metrics;
    }

    public function hasKeywordIdeaMetrics()
    {
        return isset($this->keyword_idea_metrics);
    }

    public function clearKeywordIdeaMetrics()
    {
        unset($this->keyword_idea_metrics);
    }

    /**
     * The historical metrics for the keyword.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.KeywordPlanHistoricalMetrics keyword_idea_metrics = 3;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\KeywordPlanHistoricalMetrics $var
     * @return $this
     */
    public function setKeywordIdeaMetrics($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\KeywordPlanHistoricalMetrics::class);
        $this->keyword_idea_metrics = $var;

        return $this;
    }

    /**
     * The annotations for the keyword.
     * The annotation data is only provided if requested.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.KeywordAnnotations keyword_annotations = 6;</code>
     * @return \Google\Ads\GoogleAds\V20\Common\KeywordAnnotations|null
     */
    public function getKeywordAnnotations()
    {
        return $this->keyword_annotations;
    }

    public function hasKeywordAnnotations()
    {
        return isset($this->keyword_annotations);
    }

    public function clearKeywordAnnotations()
    {
        unset($this->keyword_annotations);
    }

    /**
     * The annotations for the keyword.
     * The annotation data is only provided if requested.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.KeywordAnnotations keyword_annotations = 6;</code>
     * @param \Google\Ads\GoogleAds\V20\Common\KeywordAnnotations $var
     * @return $this
     */
    public function setKeywordAnnotations($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\KeywordAnnotations::class);
        $this->keyword_annotations = $var;

        return $this;
    }

    /**
     * The list of close variants from the requested keywords that
     * are combined into this GenerateKeywordIdeaResult. See
     * https://support.google.com/google-ads/answer/9342105 for the
     * definition of "close variants".
     *
     * Generated from protobuf field <code>repeated string close_variants = 7;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCloseVariants()
    {
        return $this->close_variants;
    }

    /**
     * The list of close variants from the requested keywords that
     * are combined into this GenerateKeywordIdeaResult. See
     * https://support.google.com/google-ads/answer/9342105 for the
     * definition of "close variants".
     *
     * Generated from protobuf field <code>repeated string close_variants = 7;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCloseVariants($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->close_variants = $arr;

        return $this;
    }

}

