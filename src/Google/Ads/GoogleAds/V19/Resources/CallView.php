<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/call_view.proto

namespace Google\Ads\GoogleAds\V19\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A call view that includes data for call tracking of call-only ads or call
 * extensions.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.CallView</code>
 */
class CallView extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the call view.
     * Call view resource names have the form:
     * `customers/{customer_id}/callViews/{call_detail_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. Country code of the caller.
     *
     * Generated from protobuf field <code>string caller_country_code = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $caller_country_code = '';
    /**
     * Output only. Area code of the caller. Null if the call duration is shorter
     * than 15 seconds.
     *
     * Generated from protobuf field <code>string caller_area_code = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $caller_area_code = '';
    /**
     * Output only. The advertiser-provided call duration in seconds.
     *
     * Generated from protobuf field <code>int64 call_duration_seconds = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $call_duration_seconds = 0;
    /**
     * Output only. The advertiser-provided call start date time.
     *
     * Generated from protobuf field <code>string start_call_date_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $start_call_date_time = '';
    /**
     * Output only. The advertiser-provided call end date time.
     *
     * Generated from protobuf field <code>string end_call_date_time = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $end_call_date_time = '';
    /**
     * Output only. The call tracking display location.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.CallTrackingDisplayLocationEnum.CallTrackingDisplayLocation call_tracking_display_location = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $call_tracking_display_location = 0;
    /**
     * Output only. The type of the call.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.CallTypeEnum.CallType type = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $type = 0;
    /**
     * Output only. The status of the call.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.GoogleVoiceCallStatusEnum.GoogleVoiceCallStatus call_status = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $call_status = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the call view.
     *           Call view resource names have the form:
     *           `customers/{customer_id}/callViews/{call_detail_id}`
     *     @type string $caller_country_code
     *           Output only. Country code of the caller.
     *     @type string $caller_area_code
     *           Output only. Area code of the caller. Null if the call duration is shorter
     *           than 15 seconds.
     *     @type int|string $call_duration_seconds
     *           Output only. The advertiser-provided call duration in seconds.
     *     @type string $start_call_date_time
     *           Output only. The advertiser-provided call start date time.
     *     @type string $end_call_date_time
     *           Output only. The advertiser-provided call end date time.
     *     @type int $call_tracking_display_location
     *           Output only. The call tracking display location.
     *     @type int $type
     *           Output only. The type of the call.
     *     @type int $call_status
     *           Output only. The status of the call.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\CallView::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the call view.
     * Call view resource names have the form:
     * `customers/{customer_id}/callViews/{call_detail_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the call view.
     * Call view resource names have the form:
     * `customers/{customer_id}/callViews/{call_detail_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
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
     * Output only. Country code of the caller.
     *
     * Generated from protobuf field <code>string caller_country_code = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getCallerCountryCode()
    {
        return $this->caller_country_code;
    }

    /**
     * Output only. Country code of the caller.
     *
     * Generated from protobuf field <code>string caller_country_code = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setCallerCountryCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->caller_country_code = $var;

        return $this;
    }

    /**
     * Output only. Area code of the caller. Null if the call duration is shorter
     * than 15 seconds.
     *
     * Generated from protobuf field <code>string caller_area_code = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getCallerAreaCode()
    {
        return $this->caller_area_code;
    }

    /**
     * Output only. Area code of the caller. Null if the call duration is shorter
     * than 15 seconds.
     *
     * Generated from protobuf field <code>string caller_area_code = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setCallerAreaCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->caller_area_code = $var;

        return $this;
    }

    /**
     * Output only. The advertiser-provided call duration in seconds.
     *
     * Generated from protobuf field <code>int64 call_duration_seconds = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getCallDurationSeconds()
    {
        return $this->call_duration_seconds;
    }

    /**
     * Output only. The advertiser-provided call duration in seconds.
     *
     * Generated from protobuf field <code>int64 call_duration_seconds = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setCallDurationSeconds($var)
    {
        GPBUtil::checkInt64($var);
        $this->call_duration_seconds = $var;

        return $this;
    }

    /**
     * Output only. The advertiser-provided call start date time.
     *
     * Generated from protobuf field <code>string start_call_date_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getStartCallDateTime()
    {
        return $this->start_call_date_time;
    }

    /**
     * Output only. The advertiser-provided call start date time.
     *
     * Generated from protobuf field <code>string start_call_date_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setStartCallDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->start_call_date_time = $var;

        return $this;
    }

    /**
     * Output only. The advertiser-provided call end date time.
     *
     * Generated from protobuf field <code>string end_call_date_time = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getEndCallDateTime()
    {
        return $this->end_call_date_time;
    }

    /**
     * Output only. The advertiser-provided call end date time.
     *
     * Generated from protobuf field <code>string end_call_date_time = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setEndCallDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->end_call_date_time = $var;

        return $this;
    }

    /**
     * Output only. The call tracking display location.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.CallTrackingDisplayLocationEnum.CallTrackingDisplayLocation call_tracking_display_location = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getCallTrackingDisplayLocation()
    {
        return $this->call_tracking_display_location;
    }

    /**
     * Output only. The call tracking display location.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.CallTrackingDisplayLocationEnum.CallTrackingDisplayLocation call_tracking_display_location = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setCallTrackingDisplayLocation($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\CallTrackingDisplayLocationEnum\CallTrackingDisplayLocation::class);
        $this->call_tracking_display_location = $var;

        return $this;
    }

    /**
     * Output only. The type of the call.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.CallTypeEnum.CallType type = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Output only. The type of the call.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.CallTypeEnum.CallType type = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\CallTypeEnum\CallType::class);
        $this->type = $var;

        return $this;
    }

    /**
     * Output only. The status of the call.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.GoogleVoiceCallStatusEnum.GoogleVoiceCallStatus call_status = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getCallStatus()
    {
        return $this->call_status;
    }

    /**
     * Output only. The status of the call.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.GoogleVoiceCallStatusEnum.GoogleVoiceCallStatus call_status = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setCallStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\GoogleVoiceCallStatusEnum\GoogleVoiceCallStatus::class);
        $this->call_status = $var;

        return $this;
    }

}

