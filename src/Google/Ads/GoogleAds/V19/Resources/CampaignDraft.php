<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/campaign_draft.proto

namespace Google\Ads\GoogleAds\V19\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A campaign draft.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.CampaignDraft</code>
 */
class CampaignDraft extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the campaign draft.
     * Campaign draft resource names have the form:
     * `customers/{customer_id}/campaignDrafts/{base_campaign_id}~{draft_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the draft.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional int64 draft_id = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $draft_id = null;
    /**
     * Immutable. The base campaign to which the draft belongs.
     *
     * Generated from protobuf field <code>optional string base_campaign = 10 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $base_campaign = null;
    /**
     * The name of the campaign draft.
     * This field is required and should not be empty when creating new
     * campaign drafts.
     * It must not contain any null (code point 0x0), NL line feed
     * (code point 0xA) or carriage return (code point 0xD) characters.
     *
     * Generated from protobuf field <code>optional string name = 11;</code>
     */
    protected $name = null;
    /**
     * Output only. Resource name of the Campaign that results from overlaying the
     * draft changes onto the base campaign.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional string draft_campaign = 12 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $draft_campaign = null;
    /**
     * Output only. The status of the campaign draft. This field is read-only.
     * When a new campaign draft is added, the status defaults to PROPOSED.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.CampaignDraftStatusEnum.CampaignDraftStatus status = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $status = 0;
    /**
     * Output only. Whether there is an experiment based on this draft currently
     * serving.
     *
     * Generated from protobuf field <code>optional bool has_experiment_running = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $has_experiment_running = null;
    /**
     * Output only. The resource name of the long-running operation that can be
     * used to poll for completion of draft promotion. This is only set if the
     * draft promotion is in progress or finished.
     *
     * Generated from protobuf field <code>optional string long_running_operation = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $long_running_operation = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the campaign draft.
     *           Campaign draft resource names have the form:
     *           `customers/{customer_id}/campaignDrafts/{base_campaign_id}~{draft_id}`
     *     @type int|string $draft_id
     *           Output only. The ID of the draft.
     *           This field is read-only.
     *     @type string $base_campaign
     *           Immutable. The base campaign to which the draft belongs.
     *     @type string $name
     *           The name of the campaign draft.
     *           This field is required and should not be empty when creating new
     *           campaign drafts.
     *           It must not contain any null (code point 0x0), NL line feed
     *           (code point 0xA) or carriage return (code point 0xD) characters.
     *     @type string $draft_campaign
     *           Output only. Resource name of the Campaign that results from overlaying the
     *           draft changes onto the base campaign.
     *           This field is read-only.
     *     @type int $status
     *           Output only. The status of the campaign draft. This field is read-only.
     *           When a new campaign draft is added, the status defaults to PROPOSED.
     *     @type bool $has_experiment_running
     *           Output only. Whether there is an experiment based on this draft currently
     *           serving.
     *     @type string $long_running_operation
     *           Output only. The resource name of the long-running operation that can be
     *           used to poll for completion of draft promotion. This is only set if the
     *           draft promotion is in progress or finished.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\CampaignDraft::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the campaign draft.
     * Campaign draft resource names have the form:
     * `customers/{customer_id}/campaignDrafts/{base_campaign_id}~{draft_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the campaign draft.
     * Campaign draft resource names have the form:
     * `customers/{customer_id}/campaignDrafts/{base_campaign_id}~{draft_id}`
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
     * Output only. The ID of the draft.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional int64 draft_id = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getDraftId()
    {
        return isset($this->draft_id) ? $this->draft_id : 0;
    }

    public function hasDraftId()
    {
        return isset($this->draft_id);
    }

    public function clearDraftId()
    {
        unset($this->draft_id);
    }

    /**
     * Output only. The ID of the draft.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional int64 draft_id = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setDraftId($var)
    {
        GPBUtil::checkInt64($var);
        $this->draft_id = $var;

        return $this;
    }

    /**
     * Immutable. The base campaign to which the draft belongs.
     *
     * Generated from protobuf field <code>optional string base_campaign = 10 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getBaseCampaign()
    {
        return isset($this->base_campaign) ? $this->base_campaign : '';
    }

    public function hasBaseCampaign()
    {
        return isset($this->base_campaign);
    }

    public function clearBaseCampaign()
    {
        unset($this->base_campaign);
    }

    /**
     * Immutable. The base campaign to which the draft belongs.
     *
     * Generated from protobuf field <code>optional string base_campaign = 10 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setBaseCampaign($var)
    {
        GPBUtil::checkString($var, True);
        $this->base_campaign = $var;

        return $this;
    }

    /**
     * The name of the campaign draft.
     * This field is required and should not be empty when creating new
     * campaign drafts.
     * It must not contain any null (code point 0x0), NL line feed
     * (code point 0xA) or carriage return (code point 0xD) characters.
     *
     * Generated from protobuf field <code>optional string name = 11;</code>
     * @return string
     */
    public function getName()
    {
        return isset($this->name) ? $this->name : '';
    }

    public function hasName()
    {
        return isset($this->name);
    }

    public function clearName()
    {
        unset($this->name);
    }

    /**
     * The name of the campaign draft.
     * This field is required and should not be empty when creating new
     * campaign drafts.
     * It must not contain any null (code point 0x0), NL line feed
     * (code point 0xA) or carriage return (code point 0xD) characters.
     *
     * Generated from protobuf field <code>optional string name = 11;</code>
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
     * Output only. Resource name of the Campaign that results from overlaying the
     * draft changes onto the base campaign.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional string draft_campaign = 12 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getDraftCampaign()
    {
        return isset($this->draft_campaign) ? $this->draft_campaign : '';
    }

    public function hasDraftCampaign()
    {
        return isset($this->draft_campaign);
    }

    public function clearDraftCampaign()
    {
        unset($this->draft_campaign);
    }

    /**
     * Output only. Resource name of the Campaign that results from overlaying the
     * draft changes onto the base campaign.
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional string draft_campaign = 12 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setDraftCampaign($var)
    {
        GPBUtil::checkString($var, True);
        $this->draft_campaign = $var;

        return $this;
    }

    /**
     * Output only. The status of the campaign draft. This field is read-only.
     * When a new campaign draft is added, the status defaults to PROPOSED.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.CampaignDraftStatusEnum.CampaignDraftStatus status = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Output only. The status of the campaign draft. This field is read-only.
     * When a new campaign draft is added, the status defaults to PROPOSED.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.CampaignDraftStatusEnum.CampaignDraftStatus status = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\CampaignDraftStatusEnum\CampaignDraftStatus::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Output only. Whether there is an experiment based on this draft currently
     * serving.
     *
     * Generated from protobuf field <code>optional bool has_experiment_running = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return bool
     */
    public function getHasExperimentRunning()
    {
        return isset($this->has_experiment_running) ? $this->has_experiment_running : false;
    }

    public function hasHasExperimentRunning()
    {
        return isset($this->has_experiment_running);
    }

    public function clearHasExperimentRunning()
    {
        unset($this->has_experiment_running);
    }

    /**
     * Output only. Whether there is an experiment based on this draft currently
     * serving.
     *
     * Generated from protobuf field <code>optional bool has_experiment_running = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param bool $var
     * @return $this
     */
    public function setHasExperimentRunning($var)
    {
        GPBUtil::checkBool($var);
        $this->has_experiment_running = $var;

        return $this;
    }

    /**
     * Output only. The resource name of the long-running operation that can be
     * used to poll for completion of draft promotion. This is only set if the
     * draft promotion is in progress or finished.
     *
     * Generated from protobuf field <code>optional string long_running_operation = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getLongRunningOperation()
    {
        return isset($this->long_running_operation) ? $this->long_running_operation : '';
    }

    public function hasLongRunningOperation()
    {
        return isset($this->long_running_operation);
    }

    public function clearLongRunningOperation()
    {
        unset($this->long_running_operation);
    }

    /**
     * Output only. The resource name of the long-running operation that can be
     * used to poll for completion of draft promotion. This is only set if the
     * draft promotion is in progress or finished.
     *
     * Generated from protobuf field <code>optional string long_running_operation = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setLongRunningOperation($var)
    {
        GPBUtil::checkString($var, True);
        $this->long_running_operation = $var;

        return $this;
    }

}

