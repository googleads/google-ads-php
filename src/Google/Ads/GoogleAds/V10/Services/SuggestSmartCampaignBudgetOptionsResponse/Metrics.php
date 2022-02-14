<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/services/smart_campaign_suggest_service.proto

namespace Google\Ads\GoogleAds\V10\Services\SuggestSmartCampaignBudgetOptionsResponse;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Performance metrics for a given budget option.
 *
 * Generated from protobuf message <code>google.ads.googleads.v10.services.SuggestSmartCampaignBudgetOptionsResponse.Metrics</code>
 */
class Metrics extends \Google\Protobuf\Internal\Message
{
    /**
     * The estimated min daily clicks.
     *
     * Generated from protobuf field <code>int64 min_daily_clicks = 1;</code>
     */
    protected $min_daily_clicks = 0;
    /**
     * The estimated max daily clicks.
     *
     * Generated from protobuf field <code>int64 max_daily_clicks = 2;</code>
     */
    protected $max_daily_clicks = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $min_daily_clicks
     *           The estimated min daily clicks.
     *     @type int|string $max_daily_clicks
     *           The estimated max daily clicks.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V10\Services\SmartCampaignSuggestService::initOnce();
        parent::__construct($data);
    }

    /**
     * The estimated min daily clicks.
     *
     * Generated from protobuf field <code>int64 min_daily_clicks = 1;</code>
     * @return int|string
     */
    public function getMinDailyClicks()
    {
        return $this->min_daily_clicks;
    }

    /**
     * The estimated min daily clicks.
     *
     * Generated from protobuf field <code>int64 min_daily_clicks = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setMinDailyClicks($var)
    {
        GPBUtil::checkInt64($var);
        $this->min_daily_clicks = $var;

        return $this;
    }

    /**
     * The estimated max daily clicks.
     *
     * Generated from protobuf field <code>int64 max_daily_clicks = 2;</code>
     * @return int|string
     */
    public function getMaxDailyClicks()
    {
        return $this->max_daily_clicks;
    }

    /**
     * The estimated max daily clicks.
     *
     * Generated from protobuf field <code>int64 max_daily_clicks = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setMaxDailyClicks($var)
    {
        GPBUtil::checkInt64($var);
        $this->max_daily_clicks = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Metrics::class, \Google\Ads\GoogleAds\V10\Services\SuggestSmartCampaignBudgetOptionsResponse_Metrics::class);

