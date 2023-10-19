<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v15/resources/recommendation.proto

namespace Google\Ads\GoogleAds\V15\Resources\Recommendation;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The shopping recommendation to migrate Regular Shopping Campaign targeted
 * offers to Performance Max campaigns.
 *
 * Generated from protobuf message <code>google.ads.googleads.v15.resources.Recommendation.ShoppingMigrateRegularShoppingCampaignOffersToPerformanceMaxRecommendation</code>
 */
class ShoppingMigrateRegularShoppingCampaignOffersToPerformanceMaxRecommendation extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The details of the Merchant Center account.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v15.resources.Recommendation.MerchantInfo merchant = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $merchant = null;
    /**
     * Output only. The feed label of the offers targeted by the campaigns
     * sharing this suggestion.
     *
     * Generated from protobuf field <code>string feed_label = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $feed_label = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V15\Resources\Recommendation\MerchantInfo $merchant
     *           Output only. The details of the Merchant Center account.
     *     @type string $feed_label
     *           Output only. The feed label of the offers targeted by the campaigns
     *           sharing this suggestion.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V15\Resources\Recommendation::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The details of the Merchant Center account.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v15.resources.Recommendation.MerchantInfo merchant = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V15\Resources\Recommendation\MerchantInfo|null
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    public function hasMerchant()
    {
        return isset($this->merchant);
    }

    public function clearMerchant()
    {
        unset($this->merchant);
    }

    /**
     * Output only. The details of the Merchant Center account.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v15.resources.Recommendation.MerchantInfo merchant = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V15\Resources\Recommendation\MerchantInfo $var
     * @return $this
     */
    public function setMerchant($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V15\Resources\Recommendation\MerchantInfo::class);
        $this->merchant = $var;

        return $this;
    }

    /**
     * Output only. The feed label of the offers targeted by the campaigns
     * sharing this suggestion.
     *
     * Generated from protobuf field <code>string feed_label = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getFeedLabel()
    {
        return $this->feed_label;
    }

    /**
     * Output only. The feed label of the offers targeted by the campaigns
     * sharing this suggestion.
     *
     * Generated from protobuf field <code>string feed_label = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setFeedLabel($var)
    {
        GPBUtil::checkString($var, True);
        $this->feed_label = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ShoppingMigrateRegularShoppingCampaignOffersToPerformanceMaxRecommendation::class, \Google\Ads\GoogleAds\V15\Resources\Recommendation_ShoppingMigrateRegularShoppingCampaignOffersToPerformanceMaxRecommendation::class);

