<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/recommendation_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Information about the operation to apply a recommendation and any parameters
 * to customize it.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.ApplyRecommendationOperation</code>
 */
class ApplyRecommendationOperation extends \Google\Protobuf\Internal\Message
{
    /**
     * The resource name of the recommendation to apply.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    protected $apply_parameters;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           The resource name of the recommendation to apply.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CampaignBudgetParameters $campaign_budget
     *           Optional parameters to use when applying a campaign budget
     *           recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\TextAdParameters $text_ad
     *           Optional parameters to use when applying a text ad recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\KeywordParameters $keyword
     *           Optional parameters to use when applying keyword recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\TargetCpaOptInParameters $target_cpa_opt_in
     *           Optional parameters to use when applying target CPA opt-in
     *           recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\TargetRoasOptInParameters $target_roas_opt_in
     *           Optional parameters to use when applying target ROAS opt-in
     *           recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CalloutExtensionParameters $callout_extension
     *           Parameters to use when applying callout extension recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CallExtensionParameters $call_extension
     *           Parameters to use when applying call extension recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\SitelinkExtensionParameters $sitelink_extension
     *           Parameters to use when applying sitelink recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\MoveUnusedBudgetParameters $move_unused_budget
     *           Parameters to use when applying move unused budget recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ResponsiveSearchAdParameters $responsive_search_ad
     *           Parameters to use when applying a responsive search ad recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\UseBroadMatchKeywordParameters $use_broad_match_keyword
     *           Parameters to use when applying a use broad match keyword recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ResponsiveSearchAdAssetParameters $responsive_search_ad_asset
     *           Parameters to use when applying a responsive search ad asset
     *           recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ResponsiveSearchAdImproveAdStrengthParameters $responsive_search_ad_improve_ad_strength
     *           Parameters to use when applying a responsive search ad improve ad
     *           strength recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\RaiseTargetCpaBidTooLowParameters $raise_target_cpa_bid_too_low
     *           Parameters to use when applying a raise target CPA bid too low
     *           recommendation. The apply is asynchronous and can take minutes depending
     *           on the number of ad groups there is in the related campaign.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetRoasParameters $forecasting_set_target_roas
     *           Parameters to use when applying a forecasting set target ROAS
     *           recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CalloutAssetParameters $callout_asset
     *           Parameters to use when applying callout asset recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CallAssetParameters $call_asset
     *           Parameters to use when applying call asset recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\SitelinkAssetParameters $sitelink_asset
     *           Parameters to use when applying sitelink asset recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\RaiseTargetCpaParameters $raise_target_cpa
     *           Parameters to use when applying raise Target CPA recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\LowerTargetRoasParameters $lower_target_roas
     *           Parameters to use when applying lower Target ROAS recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetCpaParameters $forecasting_set_target_cpa
     *           Parameters to use when applying forecasting set target CPA
     *           recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetCpaParameters $set_target_cpa
     *           Parameters to use when applying set target CPA
     *           recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetRoasParameters $set_target_roas
     *           Parameters to use when applying set target ROAS
     *           recommendation.
     *     @type \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\LeadFormAssetParameters $lead_form_asset
     *           Parameters to use when applying lead form asset recommendation.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\RecommendationService::initOnce();
        parent::__construct($data);
    }

    /**
     * The resource name of the recommendation to apply.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * The resource name of the recommendation to apply.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
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
     * Optional parameters to use when applying a campaign budget
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.CampaignBudgetParameters campaign_budget = 2;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CampaignBudgetParameters|null
     */
    public function getCampaignBudget()
    {
        return $this->readOneof(2);
    }

    public function hasCampaignBudget()
    {
        return $this->hasOneof(2);
    }

    /**
     * Optional parameters to use when applying a campaign budget
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.CampaignBudgetParameters campaign_budget = 2;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CampaignBudgetParameters $var
     * @return $this
     */
    public function setCampaignBudget($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CampaignBudgetParameters::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Optional parameters to use when applying a text ad recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.TextAdParameters text_ad = 3;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\TextAdParameters|null
     */
    public function getTextAd()
    {
        return $this->readOneof(3);
    }

    public function hasTextAd()
    {
        return $this->hasOneof(3);
    }

    /**
     * Optional parameters to use when applying a text ad recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.TextAdParameters text_ad = 3;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\TextAdParameters $var
     * @return $this
     */
    public function setTextAd($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\TextAdParameters::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Optional parameters to use when applying keyword recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.KeywordParameters keyword = 4;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\KeywordParameters|null
     */
    public function getKeyword()
    {
        return $this->readOneof(4);
    }

    public function hasKeyword()
    {
        return $this->hasOneof(4);
    }

    /**
     * Optional parameters to use when applying keyword recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.KeywordParameters keyword = 4;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\KeywordParameters $var
     * @return $this
     */
    public function setKeyword($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\KeywordParameters::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Optional parameters to use when applying target CPA opt-in
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.TargetCpaOptInParameters target_cpa_opt_in = 5;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\TargetCpaOptInParameters|null
     */
    public function getTargetCpaOptIn()
    {
        return $this->readOneof(5);
    }

    public function hasTargetCpaOptIn()
    {
        return $this->hasOneof(5);
    }

    /**
     * Optional parameters to use when applying target CPA opt-in
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.TargetCpaOptInParameters target_cpa_opt_in = 5;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\TargetCpaOptInParameters $var
     * @return $this
     */
    public function setTargetCpaOptIn($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\TargetCpaOptInParameters::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Optional parameters to use when applying target ROAS opt-in
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.TargetRoasOptInParameters target_roas_opt_in = 10;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\TargetRoasOptInParameters|null
     */
    public function getTargetRoasOptIn()
    {
        return $this->readOneof(10);
    }

    public function hasTargetRoasOptIn()
    {
        return $this->hasOneof(10);
    }

    /**
     * Optional parameters to use when applying target ROAS opt-in
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.TargetRoasOptInParameters target_roas_opt_in = 10;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\TargetRoasOptInParameters $var
     * @return $this
     */
    public function setTargetRoasOptIn($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\TargetRoasOptInParameters::class);
        $this->writeOneof(10, $var);

        return $this;
    }

    /**
     * Parameters to use when applying callout extension recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.CalloutExtensionParameters callout_extension = 6;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CalloutExtensionParameters|null
     */
    public function getCalloutExtension()
    {
        return $this->readOneof(6);
    }

    public function hasCalloutExtension()
    {
        return $this->hasOneof(6);
    }

    /**
     * Parameters to use when applying callout extension recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.CalloutExtensionParameters callout_extension = 6;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CalloutExtensionParameters $var
     * @return $this
     */
    public function setCalloutExtension($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CalloutExtensionParameters::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * Parameters to use when applying call extension recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.CallExtensionParameters call_extension = 7;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CallExtensionParameters|null
     */
    public function getCallExtension()
    {
        return $this->readOneof(7);
    }

    public function hasCallExtension()
    {
        return $this->hasOneof(7);
    }

    /**
     * Parameters to use when applying call extension recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.CallExtensionParameters call_extension = 7;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CallExtensionParameters $var
     * @return $this
     */
    public function setCallExtension($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CallExtensionParameters::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * Parameters to use when applying sitelink recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.SitelinkExtensionParameters sitelink_extension = 8;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\SitelinkExtensionParameters|null
     */
    public function getSitelinkExtension()
    {
        return $this->readOneof(8);
    }

    public function hasSitelinkExtension()
    {
        return $this->hasOneof(8);
    }

    /**
     * Parameters to use when applying sitelink recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.SitelinkExtensionParameters sitelink_extension = 8;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\SitelinkExtensionParameters $var
     * @return $this
     */
    public function setSitelinkExtension($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\SitelinkExtensionParameters::class);
        $this->writeOneof(8, $var);

        return $this;
    }

    /**
     * Parameters to use when applying move unused budget recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.MoveUnusedBudgetParameters move_unused_budget = 9;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\MoveUnusedBudgetParameters|null
     */
    public function getMoveUnusedBudget()
    {
        return $this->readOneof(9);
    }

    public function hasMoveUnusedBudget()
    {
        return $this->hasOneof(9);
    }

    /**
     * Parameters to use when applying move unused budget recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.MoveUnusedBudgetParameters move_unused_budget = 9;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\MoveUnusedBudgetParameters $var
     * @return $this
     */
    public function setMoveUnusedBudget($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\MoveUnusedBudgetParameters::class);
        $this->writeOneof(9, $var);

        return $this;
    }

    /**
     * Parameters to use when applying a responsive search ad recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ResponsiveSearchAdParameters responsive_search_ad = 11;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ResponsiveSearchAdParameters|null
     */
    public function getResponsiveSearchAd()
    {
        return $this->readOneof(11);
    }

    public function hasResponsiveSearchAd()
    {
        return $this->hasOneof(11);
    }

    /**
     * Parameters to use when applying a responsive search ad recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ResponsiveSearchAdParameters responsive_search_ad = 11;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ResponsiveSearchAdParameters $var
     * @return $this
     */
    public function setResponsiveSearchAd($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ResponsiveSearchAdParameters::class);
        $this->writeOneof(11, $var);

        return $this;
    }

    /**
     * Parameters to use when applying a use broad match keyword recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.UseBroadMatchKeywordParameters use_broad_match_keyword = 12;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\UseBroadMatchKeywordParameters|null
     */
    public function getUseBroadMatchKeyword()
    {
        return $this->readOneof(12);
    }

    public function hasUseBroadMatchKeyword()
    {
        return $this->hasOneof(12);
    }

    /**
     * Parameters to use when applying a use broad match keyword recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.UseBroadMatchKeywordParameters use_broad_match_keyword = 12;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\UseBroadMatchKeywordParameters $var
     * @return $this
     */
    public function setUseBroadMatchKeyword($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\UseBroadMatchKeywordParameters::class);
        $this->writeOneof(12, $var);

        return $this;
    }

    /**
     * Parameters to use when applying a responsive search ad asset
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ResponsiveSearchAdAssetParameters responsive_search_ad_asset = 13;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ResponsiveSearchAdAssetParameters|null
     */
    public function getResponsiveSearchAdAsset()
    {
        return $this->readOneof(13);
    }

    public function hasResponsiveSearchAdAsset()
    {
        return $this->hasOneof(13);
    }

    /**
     * Parameters to use when applying a responsive search ad asset
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ResponsiveSearchAdAssetParameters responsive_search_ad_asset = 13;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ResponsiveSearchAdAssetParameters $var
     * @return $this
     */
    public function setResponsiveSearchAdAsset($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ResponsiveSearchAdAssetParameters::class);
        $this->writeOneof(13, $var);

        return $this;
    }

    /**
     * Parameters to use when applying a responsive search ad improve ad
     * strength recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ResponsiveSearchAdImproveAdStrengthParameters responsive_search_ad_improve_ad_strength = 14;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ResponsiveSearchAdImproveAdStrengthParameters|null
     */
    public function getResponsiveSearchAdImproveAdStrength()
    {
        return $this->readOneof(14);
    }

    public function hasResponsiveSearchAdImproveAdStrength()
    {
        return $this->hasOneof(14);
    }

    /**
     * Parameters to use when applying a responsive search ad improve ad
     * strength recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ResponsiveSearchAdImproveAdStrengthParameters responsive_search_ad_improve_ad_strength = 14;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ResponsiveSearchAdImproveAdStrengthParameters $var
     * @return $this
     */
    public function setResponsiveSearchAdImproveAdStrength($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ResponsiveSearchAdImproveAdStrengthParameters::class);
        $this->writeOneof(14, $var);

        return $this;
    }

    /**
     * Parameters to use when applying a raise target CPA bid too low
     * recommendation. The apply is asynchronous and can take minutes depending
     * on the number of ad groups there is in the related campaign.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.RaiseTargetCpaBidTooLowParameters raise_target_cpa_bid_too_low = 15;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\RaiseTargetCpaBidTooLowParameters|null
     */
    public function getRaiseTargetCpaBidTooLow()
    {
        return $this->readOneof(15);
    }

    public function hasRaiseTargetCpaBidTooLow()
    {
        return $this->hasOneof(15);
    }

    /**
     * Parameters to use when applying a raise target CPA bid too low
     * recommendation. The apply is asynchronous and can take minutes depending
     * on the number of ad groups there is in the related campaign.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.RaiseTargetCpaBidTooLowParameters raise_target_cpa_bid_too_low = 15;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\RaiseTargetCpaBidTooLowParameters $var
     * @return $this
     */
    public function setRaiseTargetCpaBidTooLow($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\RaiseTargetCpaBidTooLowParameters::class);
        $this->writeOneof(15, $var);

        return $this;
    }

    /**
     * Parameters to use when applying a forecasting set target ROAS
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ForecastingSetTargetRoasParameters forecasting_set_target_roas = 16;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetRoasParameters|null
     */
    public function getForecastingSetTargetRoas()
    {
        return $this->readOneof(16);
    }

    public function hasForecastingSetTargetRoas()
    {
        return $this->hasOneof(16);
    }

    /**
     * Parameters to use when applying a forecasting set target ROAS
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ForecastingSetTargetRoasParameters forecasting_set_target_roas = 16;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetRoasParameters $var
     * @return $this
     */
    public function setForecastingSetTargetRoas($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetRoasParameters::class);
        $this->writeOneof(16, $var);

        return $this;
    }

    /**
     * Parameters to use when applying callout asset recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.CalloutAssetParameters callout_asset = 17;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CalloutAssetParameters|null
     */
    public function getCalloutAsset()
    {
        return $this->readOneof(17);
    }

    public function hasCalloutAsset()
    {
        return $this->hasOneof(17);
    }

    /**
     * Parameters to use when applying callout asset recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.CalloutAssetParameters callout_asset = 17;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CalloutAssetParameters $var
     * @return $this
     */
    public function setCalloutAsset($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CalloutAssetParameters::class);
        $this->writeOneof(17, $var);

        return $this;
    }

    /**
     * Parameters to use when applying call asset recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.CallAssetParameters call_asset = 18;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CallAssetParameters|null
     */
    public function getCallAsset()
    {
        return $this->readOneof(18);
    }

    public function hasCallAsset()
    {
        return $this->hasOneof(18);
    }

    /**
     * Parameters to use when applying call asset recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.CallAssetParameters call_asset = 18;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CallAssetParameters $var
     * @return $this
     */
    public function setCallAsset($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\CallAssetParameters::class);
        $this->writeOneof(18, $var);

        return $this;
    }

    /**
     * Parameters to use when applying sitelink asset recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.SitelinkAssetParameters sitelink_asset = 19;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\SitelinkAssetParameters|null
     */
    public function getSitelinkAsset()
    {
        return $this->readOneof(19);
    }

    public function hasSitelinkAsset()
    {
        return $this->hasOneof(19);
    }

    /**
     * Parameters to use when applying sitelink asset recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.SitelinkAssetParameters sitelink_asset = 19;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\SitelinkAssetParameters $var
     * @return $this
     */
    public function setSitelinkAsset($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\SitelinkAssetParameters::class);
        $this->writeOneof(19, $var);

        return $this;
    }

    /**
     * Parameters to use when applying raise Target CPA recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.RaiseTargetCpaParameters raise_target_cpa = 20;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\RaiseTargetCpaParameters|null
     */
    public function getRaiseTargetCpa()
    {
        return $this->readOneof(20);
    }

    public function hasRaiseTargetCpa()
    {
        return $this->hasOneof(20);
    }

    /**
     * Parameters to use when applying raise Target CPA recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.RaiseTargetCpaParameters raise_target_cpa = 20;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\RaiseTargetCpaParameters $var
     * @return $this
     */
    public function setRaiseTargetCpa($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\RaiseTargetCpaParameters::class);
        $this->writeOneof(20, $var);

        return $this;
    }

    /**
     * Parameters to use when applying lower Target ROAS recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.LowerTargetRoasParameters lower_target_roas = 21;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\LowerTargetRoasParameters|null
     */
    public function getLowerTargetRoas()
    {
        return $this->readOneof(21);
    }

    public function hasLowerTargetRoas()
    {
        return $this->hasOneof(21);
    }

    /**
     * Parameters to use when applying lower Target ROAS recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.LowerTargetRoasParameters lower_target_roas = 21;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\LowerTargetRoasParameters $var
     * @return $this
     */
    public function setLowerTargetRoas($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\LowerTargetRoasParameters::class);
        $this->writeOneof(21, $var);

        return $this;
    }

    /**
     * Parameters to use when applying forecasting set target CPA
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ForecastingSetTargetCpaParameters forecasting_set_target_cpa = 22;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetCpaParameters|null
     */
    public function getForecastingSetTargetCpa()
    {
        return $this->readOneof(22);
    }

    public function hasForecastingSetTargetCpa()
    {
        return $this->hasOneof(22);
    }

    /**
     * Parameters to use when applying forecasting set target CPA
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ForecastingSetTargetCpaParameters forecasting_set_target_cpa = 22;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetCpaParameters $var
     * @return $this
     */
    public function setForecastingSetTargetCpa($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetCpaParameters::class);
        $this->writeOneof(22, $var);

        return $this;
    }

    /**
     * Parameters to use when applying set target CPA
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ForecastingSetTargetCpaParameters set_target_cpa = 23;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetCpaParameters|null
     */
    public function getSetTargetCpa()
    {
        return $this->readOneof(23);
    }

    public function hasSetTargetCpa()
    {
        return $this->hasOneof(23);
    }

    /**
     * Parameters to use when applying set target CPA
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ForecastingSetTargetCpaParameters set_target_cpa = 23;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetCpaParameters $var
     * @return $this
     */
    public function setSetTargetCpa($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetCpaParameters::class);
        $this->writeOneof(23, $var);

        return $this;
    }

    /**
     * Parameters to use when applying set target ROAS
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ForecastingSetTargetRoasParameters set_target_roas = 24;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetRoasParameters|null
     */
    public function getSetTargetRoas()
    {
        return $this->readOneof(24);
    }

    public function hasSetTargetRoas()
    {
        return $this->hasOneof(24);
    }

    /**
     * Parameters to use when applying set target ROAS
     * recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.ForecastingSetTargetRoasParameters set_target_roas = 24;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetRoasParameters $var
     * @return $this
     */
    public function setSetTargetRoas($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\ForecastingSetTargetRoasParameters::class);
        $this->writeOneof(24, $var);

        return $this;
    }

    /**
     * Parameters to use when applying lead form asset recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.LeadFormAssetParameters lead_form_asset = 25;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\LeadFormAssetParameters|null
     */
    public function getLeadFormAsset()
    {
        return $this->readOneof(25);
    }

    public function hasLeadFormAsset()
    {
        return $this->hasOneof(25);
    }

    /**
     * Parameters to use when applying lead form asset recommendation.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ApplyRecommendationOperation.LeadFormAssetParameters lead_form_asset = 25;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\LeadFormAssetParameters $var
     * @return $this
     */
    public function setLeadFormAsset($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ApplyRecommendationOperation\LeadFormAssetParameters::class);
        $this->writeOneof(25, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getApplyParameters()
    {
        return $this->whichOneof("apply_parameters");
    }

}

