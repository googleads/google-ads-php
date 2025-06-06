<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/keyword_plan_idea_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A campaign to do a keyword campaign forecast.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.CampaignToForecast</code>
 */
class CampaignToForecast extends \Google\Protobuf\Internal\Message
{
    /**
     * The list of resource names of languages to be targeted. The resource name
     * is of the format "languageConstants/{criterion_id}". See
     * https://developers.google.com/google-ads/api/data/codes-formats#languages
     * for the list of language criterion codes.
     *
     * Generated from protobuf field <code>repeated string language_constants = 1;</code>
     */
    private $language_constants;
    /**
     * Locations to be targeted. Locations must be unique.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.CriterionBidModifier geo_modifiers = 2;</code>
     */
    private $geo_modifiers;
    /**
     * Required. The network used for targeting.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.KeywordPlanNetworkEnum.KeywordPlanNetwork keyword_plan_network = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $keyword_plan_network = 0;
    /**
     * The list of negative keywords to be used in the campaign when doing the
     * forecast.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.KeywordInfo negative_keywords = 4;</code>
     */
    private $negative_keywords;
    /**
     * Required. The bidding strategy for the campaign.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.CampaignToForecast.CampaignBiddingStrategy bidding_strategy = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $bidding_strategy = null;
    /**
     * The expected conversion rate (number of conversions divided by number of
     * total clicks) as defined by the user. This value is expressed as a decimal
     * value, so an expected conversion rate of 2% should be entered as 0.02. If
     * left empty, an estimated conversion rate will be used.
     *
     * Generated from protobuf field <code>optional double conversion_rate = 6;</code>
     */
    protected $conversion_rate = null;
    /**
     * The ad groups in the new campaign to forecast.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.ForecastAdGroup ad_groups = 7;</code>
     */
    private $ad_groups;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $language_constants
     *           The list of resource names of languages to be targeted. The resource name
     *           is of the format "languageConstants/{criterion_id}". See
     *           https://developers.google.com/google-ads/api/data/codes-formats#languages
     *           for the list of language criterion codes.
     *     @type array<\Google\Ads\GoogleAds\V20\Services\CriterionBidModifier>|\Google\Protobuf\Internal\RepeatedField $geo_modifiers
     *           Locations to be targeted. Locations must be unique.
     *     @type int $keyword_plan_network
     *           Required. The network used for targeting.
     *     @type array<\Google\Ads\GoogleAds\V20\Common\KeywordInfo>|\Google\Protobuf\Internal\RepeatedField $negative_keywords
     *           The list of negative keywords to be used in the campaign when doing the
     *           forecast.
     *     @type \Google\Ads\GoogleAds\V20\Services\CampaignToForecast\CampaignBiddingStrategy $bidding_strategy
     *           Required. The bidding strategy for the campaign.
     *     @type float $conversion_rate
     *           The expected conversion rate (number of conversions divided by number of
     *           total clicks) as defined by the user. This value is expressed as a decimal
     *           value, so an expected conversion rate of 2% should be entered as 0.02. If
     *           left empty, an estimated conversion rate will be used.
     *     @type array<\Google\Ads\GoogleAds\V20\Services\ForecastAdGroup>|\Google\Protobuf\Internal\RepeatedField $ad_groups
     *           The ad groups in the new campaign to forecast.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\KeywordPlanIdeaService::initOnce();
        parent::__construct($data);
    }

    /**
     * The list of resource names of languages to be targeted. The resource name
     * is of the format "languageConstants/{criterion_id}". See
     * https://developers.google.com/google-ads/api/data/codes-formats#languages
     * for the list of language criterion codes.
     *
     * Generated from protobuf field <code>repeated string language_constants = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLanguageConstants()
    {
        return $this->language_constants;
    }

    /**
     * The list of resource names of languages to be targeted. The resource name
     * is of the format "languageConstants/{criterion_id}". See
     * https://developers.google.com/google-ads/api/data/codes-formats#languages
     * for the list of language criterion codes.
     *
     * Generated from protobuf field <code>repeated string language_constants = 1;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLanguageConstants($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->language_constants = $arr;

        return $this;
    }

    /**
     * Locations to be targeted. Locations must be unique.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.CriterionBidModifier geo_modifiers = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getGeoModifiers()
    {
        return $this->geo_modifiers;
    }

    /**
     * Locations to be targeted. Locations must be unique.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.CriterionBidModifier geo_modifiers = 2;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Services\CriterionBidModifier>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setGeoModifiers($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Services\CriterionBidModifier::class);
        $this->geo_modifiers = $arr;

        return $this;
    }

    /**
     * Required. The network used for targeting.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.KeywordPlanNetworkEnum.KeywordPlanNetwork keyword_plan_network = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getKeywordPlanNetwork()
    {
        return $this->keyword_plan_network;
    }

    /**
     * Required. The network used for targeting.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.KeywordPlanNetworkEnum.KeywordPlanNetwork keyword_plan_network = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setKeywordPlanNetwork($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\KeywordPlanNetworkEnum\KeywordPlanNetwork::class);
        $this->keyword_plan_network = $var;

        return $this;
    }

    /**
     * The list of negative keywords to be used in the campaign when doing the
     * forecast.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.KeywordInfo negative_keywords = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getNegativeKeywords()
    {
        return $this->negative_keywords;
    }

    /**
     * The list of negative keywords to be used in the campaign when doing the
     * forecast.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.KeywordInfo negative_keywords = 4;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\KeywordInfo>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setNegativeKeywords($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\KeywordInfo::class);
        $this->negative_keywords = $arr;

        return $this;
    }

    /**
     * Required. The bidding strategy for the campaign.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.CampaignToForecast.CampaignBiddingStrategy bidding_strategy = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Ads\GoogleAds\V20\Services\CampaignToForecast\CampaignBiddingStrategy|null
     */
    public function getBiddingStrategy()
    {
        return $this->bidding_strategy;
    }

    public function hasBiddingStrategy()
    {
        return isset($this->bidding_strategy);
    }

    public function clearBiddingStrategy()
    {
        unset($this->bidding_strategy);
    }

    /**
     * Required. The bidding strategy for the campaign.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.CampaignToForecast.CampaignBiddingStrategy bidding_strategy = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Ads\GoogleAds\V20\Services\CampaignToForecast\CampaignBiddingStrategy $var
     * @return $this
     */
    public function setBiddingStrategy($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\CampaignToForecast\CampaignBiddingStrategy::class);
        $this->bidding_strategy = $var;

        return $this;
    }

    /**
     * The expected conversion rate (number of conversions divided by number of
     * total clicks) as defined by the user. This value is expressed as a decimal
     * value, so an expected conversion rate of 2% should be entered as 0.02. If
     * left empty, an estimated conversion rate will be used.
     *
     * Generated from protobuf field <code>optional double conversion_rate = 6;</code>
     * @return float
     */
    public function getConversionRate()
    {
        return isset($this->conversion_rate) ? $this->conversion_rate : 0.0;
    }

    public function hasConversionRate()
    {
        return isset($this->conversion_rate);
    }

    public function clearConversionRate()
    {
        unset($this->conversion_rate);
    }

    /**
     * The expected conversion rate (number of conversions divided by number of
     * total clicks) as defined by the user. This value is expressed as a decimal
     * value, so an expected conversion rate of 2% should be entered as 0.02. If
     * left empty, an estimated conversion rate will be used.
     *
     * Generated from protobuf field <code>optional double conversion_rate = 6;</code>
     * @param float $var
     * @return $this
     */
    public function setConversionRate($var)
    {
        GPBUtil::checkDouble($var);
        $this->conversion_rate = $var;

        return $this;
    }

    /**
     * The ad groups in the new campaign to forecast.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.ForecastAdGroup ad_groups = 7;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAdGroups()
    {
        return $this->ad_groups;
    }

    /**
     * The ad groups in the new campaign to forecast.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.services.ForecastAdGroup ad_groups = 7;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Services\ForecastAdGroup>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAdGroups($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Services\ForecastAdGroup::class);
        $this->ad_groups = $arr;

        return $this;
    }

}

