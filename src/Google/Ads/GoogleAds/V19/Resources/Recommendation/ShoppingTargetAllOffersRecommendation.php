<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/recommendation.proto

namespace Google\Ads\GoogleAds\V19\Resources\Recommendation;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The shopping recommendation to create a catch-all campaign that targets all
 * offers.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.Recommendation.ShoppingTargetAllOffersRecommendation</code>
 */
class ShoppingTargetAllOffersRecommendation extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The details of the Merchant Center account.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.Recommendation.MerchantInfo merchant = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $merchant = null;
    /**
     * Output only. The number of untargeted offers.
     *
     * Generated from protobuf field <code>int64 untargeted_offers_count = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $untargeted_offers_count = 0;
    /**
     * Output only. The offer feed label.
     *
     * Generated from protobuf field <code>string feed_label = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $feed_label = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V19\Resources\Recommendation\MerchantInfo $merchant
     *           Output only. The details of the Merchant Center account.
     *     @type int|string $untargeted_offers_count
     *           Output only. The number of untargeted offers.
     *     @type string $feed_label
     *           Output only. The offer feed label.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\Recommendation::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The details of the Merchant Center account.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.Recommendation.MerchantInfo merchant = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\Recommendation\MerchantInfo|null
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
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.Recommendation.MerchantInfo merchant = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\Recommendation\MerchantInfo $var
     * @return $this
     */
    public function setMerchant($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\Recommendation\MerchantInfo::class);
        $this->merchant = $var;

        return $this;
    }

    /**
     * Output only. The number of untargeted offers.
     *
     * Generated from protobuf field <code>int64 untargeted_offers_count = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getUntargetedOffersCount()
    {
        return $this->untargeted_offers_count;
    }

    /**
     * Output only. The number of untargeted offers.
     *
     * Generated from protobuf field <code>int64 untargeted_offers_count = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setUntargetedOffersCount($var)
    {
        GPBUtil::checkInt64($var);
        $this->untargeted_offers_count = $var;

        return $this;
    }

    /**
     * Output only. The offer feed label.
     *
     * Generated from protobuf field <code>string feed_label = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getFeedLabel()
    {
        return $this->feed_label;
    }

    /**
     * Output only. The offer feed label.
     *
     * Generated from protobuf field <code>string feed_label = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
class_alias(ShoppingTargetAllOffersRecommendation::class, \Google\Ads\GoogleAds\V19\Resources\Recommendation_ShoppingTargetAllOffersRecommendation::class);

