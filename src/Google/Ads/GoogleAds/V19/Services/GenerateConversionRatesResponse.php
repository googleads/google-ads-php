<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/reach_plan_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for
 * [ReachPlanService.GenerateConversionRates][google.ads.googleads.v19.services.ReachPlanService.GenerateConversionRates],
 * containing conversion rate suggestions for supported plannable products.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.GenerateConversionRatesResponse</code>
 */
class GenerateConversionRatesResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * A list containing conversion rate suggestions. Each repeated element will
     * have an associated product code. Multiple suggestions may share the same
     * product code.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.services.ConversionRateSuggestion conversion_rate_suggestions = 1;</code>
     */
    private $conversion_rate_suggestions;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V19\Services\ConversionRateSuggestion>|\Google\Protobuf\Internal\RepeatedField $conversion_rate_suggestions
     *           A list containing conversion rate suggestions. Each repeated element will
     *           have an associated product code. Multiple suggestions may share the same
     *           product code.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\ReachPlanService::initOnce();
        parent::__construct($data);
    }

    /**
     * A list containing conversion rate suggestions. Each repeated element will
     * have an associated product code. Multiple suggestions may share the same
     * product code.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.services.ConversionRateSuggestion conversion_rate_suggestions = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getConversionRateSuggestions()
    {
        return $this->conversion_rate_suggestions;
    }

    /**
     * A list containing conversion rate suggestions. Each repeated element will
     * have an associated product code. Multiple suggestions may share the same
     * product code.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v19.services.ConversionRateSuggestion conversion_rate_suggestions = 1;</code>
     * @param array<\Google\Ads\GoogleAds\V19\Services\ConversionRateSuggestion>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setConversionRateSuggestions($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V19\Services\ConversionRateSuggestion::class);
        $this->conversion_rate_suggestions = $arr;

        return $this;
    }

}

