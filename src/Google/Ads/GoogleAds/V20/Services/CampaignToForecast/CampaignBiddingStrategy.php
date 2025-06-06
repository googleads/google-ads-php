<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/keyword_plan_idea_service.proto

namespace Google\Ads\GoogleAds\V20\Services\CampaignToForecast;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Supported bidding strategies for new campaign forecasts.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.CampaignToForecast.CampaignBiddingStrategy</code>
 */
class CampaignBiddingStrategy extends \Google\Protobuf\Internal\Message
{
    protected $bidding_strategy;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V20\Services\ManualCpcBiddingStrategy $manual_cpc_bidding_strategy
     *           Use manual CPC bidding strategy for forecasting.
     *     @type \Google\Ads\GoogleAds\V20\Services\MaximizeClicksBiddingStrategy $maximize_clicks_bidding_strategy
     *           Use maximize clicks bidding strategy for forecasting.
     *     @type \Google\Ads\GoogleAds\V20\Services\MaximizeConversionsBiddingStrategy $maximize_conversions_bidding_strategy
     *           Use maximize conversions bidding strategy for forecasting.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\KeywordPlanIdeaService::initOnce();
        parent::__construct($data);
    }

    /**
     * Use manual CPC bidding strategy for forecasting.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ManualCpcBiddingStrategy manual_cpc_bidding_strategy = 1;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\ManualCpcBiddingStrategy|null
     */
    public function getManualCpcBiddingStrategy()
    {
        return $this->readOneof(1);
    }

    public function hasManualCpcBiddingStrategy()
    {
        return $this->hasOneof(1);
    }

    /**
     * Use manual CPC bidding strategy for forecasting.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.ManualCpcBiddingStrategy manual_cpc_bidding_strategy = 1;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\ManualCpcBiddingStrategy $var
     * @return $this
     */
    public function setManualCpcBiddingStrategy($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\ManualCpcBiddingStrategy::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Use maximize clicks bidding strategy for forecasting.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.MaximizeClicksBiddingStrategy maximize_clicks_bidding_strategy = 2;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\MaximizeClicksBiddingStrategy|null
     */
    public function getMaximizeClicksBiddingStrategy()
    {
        return $this->readOneof(2);
    }

    public function hasMaximizeClicksBiddingStrategy()
    {
        return $this->hasOneof(2);
    }

    /**
     * Use maximize clicks bidding strategy for forecasting.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.MaximizeClicksBiddingStrategy maximize_clicks_bidding_strategy = 2;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\MaximizeClicksBiddingStrategy $var
     * @return $this
     */
    public function setMaximizeClicksBiddingStrategy($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\MaximizeClicksBiddingStrategy::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Use maximize conversions bidding strategy for forecasting.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.MaximizeConversionsBiddingStrategy maximize_conversions_bidding_strategy = 3;</code>
     * @return \Google\Ads\GoogleAds\V20\Services\MaximizeConversionsBiddingStrategy|null
     */
    public function getMaximizeConversionsBiddingStrategy()
    {
        return $this->readOneof(3);
    }

    public function hasMaximizeConversionsBiddingStrategy()
    {
        return $this->hasOneof(3);
    }

    /**
     * Use maximize conversions bidding strategy for forecasting.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.services.MaximizeConversionsBiddingStrategy maximize_conversions_bidding_strategy = 3;</code>
     * @param \Google\Ads\GoogleAds\V20\Services\MaximizeConversionsBiddingStrategy $var
     * @return $this
     */
    public function setMaximizeConversionsBiddingStrategy($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\MaximizeConversionsBiddingStrategy::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getBiddingStrategy()
    {
        return $this->whichOneof("bidding_strategy");
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CampaignBiddingStrategy::class, \Google\Ads\GoogleAds\V20\Services\CampaignToForecast_CampaignBiddingStrategy::class);

