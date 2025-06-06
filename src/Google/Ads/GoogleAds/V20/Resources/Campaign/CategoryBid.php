<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/campaign.proto

namespace Google\Ads\GoogleAds\V20\Resources\Campaign;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Category bids in LocalServicesReportingCampaignSettings.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.Campaign.CategoryBid</code>
 */
class CategoryBid extends \Google\Protobuf\Internal\Message
{
    /**
     * Category for which the bid will be associated with. For example,
     * xcat:service_area_business_plumber.
     *
     * Generated from protobuf field <code>optional string category_id = 1;</code>
     */
    protected $category_id = null;
    /**
     * Manual CPA bid for the category. Bid must be greater than the
     * reserve price associated for that category. Value is in micros
     * and in the advertiser's currency.
     *
     * Generated from protobuf field <code>optional int64 manual_cpa_bid_micros = 2;</code>
     */
    protected $manual_cpa_bid_micros = null;
    /**
     * Target CPA bid for the category. Value is in micros and in the
     * advertiser's currency.
     *
     * Generated from protobuf field <code>optional int64 target_cpa_bid_micros = 3;</code>
     */
    protected $target_cpa_bid_micros = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $category_id
     *           Category for which the bid will be associated with. For example,
     *           xcat:service_area_business_plumber.
     *     @type int|string $manual_cpa_bid_micros
     *           Manual CPA bid for the category. Bid must be greater than the
     *           reserve price associated for that category. Value is in micros
     *           and in the advertiser's currency.
     *     @type int|string $target_cpa_bid_micros
     *           Target CPA bid for the category. Value is in micros and in the
     *           advertiser's currency.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\Campaign::initOnce();
        parent::__construct($data);
    }

    /**
     * Category for which the bid will be associated with. For example,
     * xcat:service_area_business_plumber.
     *
     * Generated from protobuf field <code>optional string category_id = 1;</code>
     * @return string
     */
    public function getCategoryId()
    {
        return isset($this->category_id) ? $this->category_id : '';
    }

    public function hasCategoryId()
    {
        return isset($this->category_id);
    }

    public function clearCategoryId()
    {
        unset($this->category_id);
    }

    /**
     * Category for which the bid will be associated with. For example,
     * xcat:service_area_business_plumber.
     *
     * Generated from protobuf field <code>optional string category_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCategoryId($var)
    {
        GPBUtil::checkString($var, True);
        $this->category_id = $var;

        return $this;
    }

    /**
     * Manual CPA bid for the category. Bid must be greater than the
     * reserve price associated for that category. Value is in micros
     * and in the advertiser's currency.
     *
     * Generated from protobuf field <code>optional int64 manual_cpa_bid_micros = 2;</code>
     * @return int|string
     */
    public function getManualCpaBidMicros()
    {
        return isset($this->manual_cpa_bid_micros) ? $this->manual_cpa_bid_micros : 0;
    }

    public function hasManualCpaBidMicros()
    {
        return isset($this->manual_cpa_bid_micros);
    }

    public function clearManualCpaBidMicros()
    {
        unset($this->manual_cpa_bid_micros);
    }

    /**
     * Manual CPA bid for the category. Bid must be greater than the
     * reserve price associated for that category. Value is in micros
     * and in the advertiser's currency.
     *
     * Generated from protobuf field <code>optional int64 manual_cpa_bid_micros = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setManualCpaBidMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->manual_cpa_bid_micros = $var;

        return $this;
    }

    /**
     * Target CPA bid for the category. Value is in micros and in the
     * advertiser's currency.
     *
     * Generated from protobuf field <code>optional int64 target_cpa_bid_micros = 3;</code>
     * @return int|string
     */
    public function getTargetCpaBidMicros()
    {
        return isset($this->target_cpa_bid_micros) ? $this->target_cpa_bid_micros : 0;
    }

    public function hasTargetCpaBidMicros()
    {
        return isset($this->target_cpa_bid_micros);
    }

    public function clearTargetCpaBidMicros()
    {
        unset($this->target_cpa_bid_micros);
    }

    /**
     * Target CPA bid for the category. Value is in micros and in the
     * advertiser's currency.
     *
     * Generated from protobuf field <code>optional int64 target_cpa_bid_micros = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTargetCpaBidMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->target_cpa_bid_micros = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CategoryBid::class, \Google\Ads\GoogleAds\V20\Resources\Campaign_CategoryBid::class);

