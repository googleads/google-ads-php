<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v8/resources/bidding_data_exclusion.proto

namespace Google\Ads\GoogleAds\V8\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a bidding data exclusion.
 * See "About data exclusions" at
 * https://support.google.com/google-ads/answer/10370710.
 *
 * Generated from protobuf message <code>google.ads.googleads.v8.resources.BiddingDataExclusion</code>
 */
class BiddingDataExclusion extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the data exclusion.
     * Data exclusion resource names have the form:
     * `customers/{customer_id}/biddingDataExclusions/{data_exclusion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the data exclusion.
     *
     * Generated from protobuf field <code>int64 data_exclusion_id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $data_exclusion_id = 0;
    /**
     * The scope of the data exclusion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.enums.SeasonalityEventScopeEnum.SeasonalityEventScope scope = 3;</code>
     */
    protected $scope = 0;
    /**
     * Output only. The status of the data exclusion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.enums.SeasonalityEventStatusEnum.SeasonalityEventStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $status = 0;
    /**
     * Required. The inclusive start time of the data exclusion in yyyy-MM-dd HH:mm:ss
     * format.
     * A data exclusion is backward looking and should be used for events that
     * start in the past and end either in the past or future.
     *
     * Generated from protobuf field <code>string start_date_time = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $start_date_time = '';
    /**
     * Required. The exclusive end time of the data exclusion in yyyy-MM-dd HH:mm:ss format.
     * The length of [start_date_time, end_date_time) interval must be
     * within (0, 14 days].
     *
     * Generated from protobuf field <code>string end_date_time = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $end_date_time = '';
    /**
     * The name of the data exclusion. The name can be at most 255
     * characters.
     *
     * Generated from protobuf field <code>string name = 7;</code>
     */
    protected $name = '';
    /**
     * The description of the data exclusion. The description can be at
     * most 2048 characters.
     *
     * Generated from protobuf field <code>string description = 8;</code>
     */
    protected $description = '';
    /**
     * If not specified, all devices will be included in this exclusion.
     * Otherwise, only the specified targeted devices will be included in this
     * exclusion.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v8.enums.DeviceEnum.Device devices = 9;</code>
     */
    private $devices;
    /**
     * The data exclusion will apply to the campaigns listed when the scope of
     * this exclusion is CAMPAIGN. The maximum number of campaigns per event is
     * 2000.
     * Note: a data exclusion with both advertising_channel_types and
     * campaign_ids is not supported.
     *
     * Generated from protobuf field <code>repeated string campaigns = 10 [(.google.api.resource_reference) = {</code>
     */
    private $campaigns;
    /**
     * The data_exclusion will apply to all the campaigns under the listed
     * channels retroactively as well as going forward when the scope of this
     * exclusion is CHANNEL.
     * The supported advertising channel types are DISPLAY, SEARCH and SHOPPING.
     * Note: a data exclusion with both advertising_channel_types and
     * campaign_ids is not supported.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v8.enums.AdvertisingChannelTypeEnum.AdvertisingChannelType advertising_channel_types = 11;</code>
     */
    private $advertising_channel_types;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the data exclusion.
     *           Data exclusion resource names have the form:
     *           `customers/{customer_id}/biddingDataExclusions/{data_exclusion_id}`
     *     @type int|string $data_exclusion_id
     *           Output only. The ID of the data exclusion.
     *     @type int $scope
     *           The scope of the data exclusion.
     *     @type int $status
     *           Output only. The status of the data exclusion.
     *     @type string $start_date_time
     *           Required. The inclusive start time of the data exclusion in yyyy-MM-dd HH:mm:ss
     *           format.
     *           A data exclusion is backward looking and should be used for events that
     *           start in the past and end either in the past or future.
     *     @type string $end_date_time
     *           Required. The exclusive end time of the data exclusion in yyyy-MM-dd HH:mm:ss format.
     *           The length of [start_date_time, end_date_time) interval must be
     *           within (0, 14 days].
     *     @type string $name
     *           The name of the data exclusion. The name can be at most 255
     *           characters.
     *     @type string $description
     *           The description of the data exclusion. The description can be at
     *           most 2048 characters.
     *     @type int[]|\Google\Protobuf\Internal\RepeatedField $devices
     *           If not specified, all devices will be included in this exclusion.
     *           Otherwise, only the specified targeted devices will be included in this
     *           exclusion.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $campaigns
     *           The data exclusion will apply to the campaigns listed when the scope of
     *           this exclusion is CAMPAIGN. The maximum number of campaigns per event is
     *           2000.
     *           Note: a data exclusion with both advertising_channel_types and
     *           campaign_ids is not supported.
     *     @type int[]|\Google\Protobuf\Internal\RepeatedField $advertising_channel_types
     *           The data_exclusion will apply to all the campaigns under the listed
     *           channels retroactively as well as going forward when the scope of this
     *           exclusion is CHANNEL.
     *           The supported advertising channel types are DISPLAY, SEARCH and SHOPPING.
     *           Note: a data exclusion with both advertising_channel_types and
     *           campaign_ids is not supported.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V8\Resources\BiddingDataExclusion::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the data exclusion.
     * Data exclusion resource names have the form:
     * `customers/{customer_id}/biddingDataExclusions/{data_exclusion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the data exclusion.
     * Data exclusion resource names have the form:
     * `customers/{customer_id}/biddingDataExclusions/{data_exclusion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
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
     * Output only. The ID of the data exclusion.
     *
     * Generated from protobuf field <code>int64 data_exclusion_id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getDataExclusionId()
    {
        return $this->data_exclusion_id;
    }

    /**
     * Output only. The ID of the data exclusion.
     *
     * Generated from protobuf field <code>int64 data_exclusion_id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setDataExclusionId($var)
    {
        GPBUtil::checkInt64($var);
        $this->data_exclusion_id = $var;

        return $this;
    }

    /**
     * The scope of the data exclusion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.enums.SeasonalityEventScopeEnum.SeasonalityEventScope scope = 3;</code>
     * @return int
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * The scope of the data exclusion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.enums.SeasonalityEventScopeEnum.SeasonalityEventScope scope = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setScope($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V8\Enums\SeasonalityEventScopeEnum\SeasonalityEventScope::class);
        $this->scope = $var;

        return $this;
    }

    /**
     * Output only. The status of the data exclusion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.enums.SeasonalityEventStatusEnum.SeasonalityEventStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Output only. The status of the data exclusion.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.enums.SeasonalityEventStatusEnum.SeasonalityEventStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V8\Enums\SeasonalityEventStatusEnum\SeasonalityEventStatus::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Required. The inclusive start time of the data exclusion in yyyy-MM-dd HH:mm:ss
     * format.
     * A data exclusion is backward looking and should be used for events that
     * start in the past and end either in the past or future.
     *
     * Generated from protobuf field <code>string start_date_time = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getStartDateTime()
    {
        return $this->start_date_time;
    }

    /**
     * Required. The inclusive start time of the data exclusion in yyyy-MM-dd HH:mm:ss
     * format.
     * A data exclusion is backward looking and should be used for events that
     * start in the past and end either in the past or future.
     *
     * Generated from protobuf field <code>string start_date_time = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setStartDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->start_date_time = $var;

        return $this;
    }

    /**
     * Required. The exclusive end time of the data exclusion in yyyy-MM-dd HH:mm:ss format.
     * The length of [start_date_time, end_date_time) interval must be
     * within (0, 14 days].
     *
     * Generated from protobuf field <code>string end_date_time = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getEndDateTime()
    {
        return $this->end_date_time;
    }

    /**
     * Required. The exclusive end time of the data exclusion in yyyy-MM-dd HH:mm:ss format.
     * The length of [start_date_time, end_date_time) interval must be
     * within (0, 14 days].
     *
     * Generated from protobuf field <code>string end_date_time = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setEndDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->end_date_time = $var;

        return $this;
    }

    /**
     * The name of the data exclusion. The name can be at most 255
     * characters.
     *
     * Generated from protobuf field <code>string name = 7;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The name of the data exclusion. The name can be at most 255
     * characters.
     *
     * Generated from protobuf field <code>string name = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * The description of the data exclusion. The description can be at
     * most 2048 characters.
     *
     * Generated from protobuf field <code>string description = 8;</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * The description of the data exclusion. The description can be at
     * most 2048 characters.
     *
     * Generated from protobuf field <code>string description = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * If not specified, all devices will be included in this exclusion.
     * Otherwise, only the specified targeted devices will be included in this
     * exclusion.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v8.enums.DeviceEnum.Device devices = 9;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getDevices()
    {
        return $this->devices;
    }

    /**
     * If not specified, all devices will be included in this exclusion.
     * Otherwise, only the specified targeted devices will be included in this
     * exclusion.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v8.enums.DeviceEnum.Device devices = 9;</code>
     * @param int[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setDevices($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::ENUM, \Google\Ads\GoogleAds\V8\Enums\DeviceEnum\Device::class);
        $this->devices = $arr;

        return $this;
    }

    /**
     * The data exclusion will apply to the campaigns listed when the scope of
     * this exclusion is CAMPAIGN. The maximum number of campaigns per event is
     * 2000.
     * Note: a data exclusion with both advertising_channel_types and
     * campaign_ids is not supported.
     *
     * Generated from protobuf field <code>repeated string campaigns = 10 [(.google.api.resource_reference) = {</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCampaigns()
    {
        return $this->campaigns;
    }

    /**
     * The data exclusion will apply to the campaigns listed when the scope of
     * this exclusion is CAMPAIGN. The maximum number of campaigns per event is
     * 2000.
     * Note: a data exclusion with both advertising_channel_types and
     * campaign_ids is not supported.
     *
     * Generated from protobuf field <code>repeated string campaigns = 10 [(.google.api.resource_reference) = {</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCampaigns($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->campaigns = $arr;

        return $this;
    }

    /**
     * The data_exclusion will apply to all the campaigns under the listed
     * channels retroactively as well as going forward when the scope of this
     * exclusion is CHANNEL.
     * The supported advertising channel types are DISPLAY, SEARCH and SHOPPING.
     * Note: a data exclusion with both advertising_channel_types and
     * campaign_ids is not supported.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v8.enums.AdvertisingChannelTypeEnum.AdvertisingChannelType advertising_channel_types = 11;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAdvertisingChannelTypes()
    {
        return $this->advertising_channel_types;
    }

    /**
     * The data_exclusion will apply to all the campaigns under the listed
     * channels retroactively as well as going forward when the scope of this
     * exclusion is CHANNEL.
     * The supported advertising channel types are DISPLAY, SEARCH and SHOPPING.
     * Note: a data exclusion with both advertising_channel_types and
     * campaign_ids is not supported.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v8.enums.AdvertisingChannelTypeEnum.AdvertisingChannelType advertising_channel_types = 11;</code>
     * @param int[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAdvertisingChannelTypes($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::ENUM, \Google\Ads\GoogleAds\V8\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType::class);
        $this->advertising_channel_types = $arr;

        return $this;
    }

}

