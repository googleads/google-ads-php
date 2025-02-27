<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/keyword_plan_idea_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Maximize Conversions Bidding Strategy.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.MaximizeConversionsBiddingStrategy</code>
 */
class MaximizeConversionsBiddingStrategy extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The daily target spend in micros to be used for estimation. This
     * value must be greater than zero.
     *
     * Generated from protobuf field <code>int64 daily_target_spend_micros = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $daily_target_spend_micros = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $daily_target_spend_micros
     *           Required. The daily target spend in micros to be used for estimation. This
     *           value must be greater than zero.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\KeywordPlanIdeaService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The daily target spend in micros to be used for estimation. This
     * value must be greater than zero.
     *
     * Generated from protobuf field <code>int64 daily_target_spend_micros = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int|string
     */
    public function getDailyTargetSpendMicros()
    {
        return $this->daily_target_spend_micros;
    }

    /**
     * Required. The daily target spend in micros to be used for estimation. This
     * value must be greater than zero.
     *
     * Generated from protobuf field <code>int64 daily_target_spend_micros = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int|string $var
     * @return $this
     */
    public function setDailyTargetSpendMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->daily_target_spend_micros = $var;

        return $this;
    }

}

