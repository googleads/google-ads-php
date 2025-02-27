<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/smart_campaign_setting_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Details related to Smart campaigns that are eligible to serve.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.SmartCampaignEligibleDetails</code>
 */
class SmartCampaignEligibleDetails extends \Google\Protobuf\Internal\Message
{
    /**
     * The timestamp of the last impression observed in the last 48 hours for this
     * campaign.
     * The timestamp is in the customer’s timezone and in
     * “yyyy-MM-dd HH:mm:ss” format.
     *
     * Generated from protobuf field <code>optional string last_impression_date_time = 1;</code>
     */
    protected $last_impression_date_time = null;
    /**
     * The timestamp of when the campaign will end, if applicable.
     * The timestamp is in the customer’s timezone and in
     * “yyyy-MM-dd HH:mm:ss” format.
     *
     * Generated from protobuf field <code>optional string end_date_time = 2;</code>
     */
    protected $end_date_time = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $last_impression_date_time
     *           The timestamp of the last impression observed in the last 48 hours for this
     *           campaign.
     *           The timestamp is in the customer’s timezone and in
     *           “yyyy-MM-dd HH:mm:ss” format.
     *     @type string $end_date_time
     *           The timestamp of when the campaign will end, if applicable.
     *           The timestamp is in the customer’s timezone and in
     *           “yyyy-MM-dd HH:mm:ss” format.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\SmartCampaignSettingService::initOnce();
        parent::__construct($data);
    }

    /**
     * The timestamp of the last impression observed in the last 48 hours for this
     * campaign.
     * The timestamp is in the customer’s timezone and in
     * “yyyy-MM-dd HH:mm:ss” format.
     *
     * Generated from protobuf field <code>optional string last_impression_date_time = 1;</code>
     * @return string
     */
    public function getLastImpressionDateTime()
    {
        return isset($this->last_impression_date_time) ? $this->last_impression_date_time : '';
    }

    public function hasLastImpressionDateTime()
    {
        return isset($this->last_impression_date_time);
    }

    public function clearLastImpressionDateTime()
    {
        unset($this->last_impression_date_time);
    }

    /**
     * The timestamp of the last impression observed in the last 48 hours for this
     * campaign.
     * The timestamp is in the customer’s timezone and in
     * “yyyy-MM-dd HH:mm:ss” format.
     *
     * Generated from protobuf field <code>optional string last_impression_date_time = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setLastImpressionDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->last_impression_date_time = $var;

        return $this;
    }

    /**
     * The timestamp of when the campaign will end, if applicable.
     * The timestamp is in the customer’s timezone and in
     * “yyyy-MM-dd HH:mm:ss” format.
     *
     * Generated from protobuf field <code>optional string end_date_time = 2;</code>
     * @return string
     */
    public function getEndDateTime()
    {
        return isset($this->end_date_time) ? $this->end_date_time : '';
    }

    public function hasEndDateTime()
    {
        return isset($this->end_date_time);
    }

    public function clearEndDateTime()
    {
        unset($this->end_date_time);
    }

    /**
     * The timestamp of when the campaign will end, if applicable.
     * The timestamp is in the customer’s timezone and in
     * “yyyy-MM-dd HH:mm:ss” format.
     *
     * Generated from protobuf field <code>optional string end_date_time = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setEndDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->end_date_time = $var;

        return $this;
    }

}

