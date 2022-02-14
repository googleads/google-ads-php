<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/resources/campaign_bid_modifier.proto

namespace Google\Ads\GoogleAds\V10\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a bid-modifiable only criterion at the campaign level.
 *
 * Generated from protobuf message <code>google.ads.googleads.v10.resources.CampaignBidModifier</code>
 */
class CampaignBidModifier extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the campaign bid modifier.
     * Campaign bid modifier resource names have the form:
     * `customers/{customer_id}/campaignBidModifiers/{campaign_id}~{criterion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The campaign to which this criterion belongs.
     *
     * Generated from protobuf field <code>optional string campaign = 6 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $campaign = null;
    /**
     * Output only. The ID of the criterion to bid modify.
     * This field is ignored for mutates.
     *
     * Generated from protobuf field <code>optional int64 criterion_id = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $criterion_id = null;
    /**
     * The modifier for the bid when the criterion matches.
     *
     * Generated from protobuf field <code>optional double bid_modifier = 8;</code>
     */
    protected $bid_modifier = null;
    protected $criterion;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the campaign bid modifier.
     *           Campaign bid modifier resource names have the form:
     *           `customers/{customer_id}/campaignBidModifiers/{campaign_id}~{criterion_id}`
     *     @type string $campaign
     *           Output only. The campaign to which this criterion belongs.
     *     @type int|string $criterion_id
     *           Output only. The ID of the criterion to bid modify.
     *           This field is ignored for mutates.
     *     @type float $bid_modifier
     *           The modifier for the bid when the criterion matches.
     *     @type \Google\Ads\GoogleAds\V10\Common\InteractionTypeInfo $interaction_type
     *           Immutable. Criterion for interaction type. Only supported for search campaigns.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V10\Resources\CampaignBidModifier::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the campaign bid modifier.
     * Campaign bid modifier resource names have the form:
     * `customers/{customer_id}/campaignBidModifiers/{campaign_id}~{criterion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the campaign bid modifier.
     * Campaign bid modifier resource names have the form:
     * `customers/{customer_id}/campaignBidModifiers/{campaign_id}~{criterion_id}`
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
     * Output only. The campaign to which this criterion belongs.
     *
     * Generated from protobuf field <code>optional string campaign = 6 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCampaign()
    {
        return isset($this->campaign) ? $this->campaign : '';
    }

    public function hasCampaign()
    {
        return isset($this->campaign);
    }

    public function clearCampaign()
    {
        unset($this->campaign);
    }

    /**
     * Output only. The campaign to which this criterion belongs.
     *
     * Generated from protobuf field <code>optional string campaign = 6 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCampaign($var)
    {
        GPBUtil::checkString($var, True);
        $this->campaign = $var;

        return $this;
    }

    /**
     * Output only. The ID of the criterion to bid modify.
     * This field is ignored for mutates.
     *
     * Generated from protobuf field <code>optional int64 criterion_id = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getCriterionId()
    {
        return isset($this->criterion_id) ? $this->criterion_id : 0;
    }

    public function hasCriterionId()
    {
        return isset($this->criterion_id);
    }

    public function clearCriterionId()
    {
        unset($this->criterion_id);
    }

    /**
     * Output only. The ID of the criterion to bid modify.
     * This field is ignored for mutates.
     *
     * Generated from protobuf field <code>optional int64 criterion_id = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setCriterionId($var)
    {
        GPBUtil::checkInt64($var);
        $this->criterion_id = $var;

        return $this;
    }

    /**
     * The modifier for the bid when the criterion matches.
     *
     * Generated from protobuf field <code>optional double bid_modifier = 8;</code>
     * @return float
     */
    public function getBidModifier()
    {
        return isset($this->bid_modifier) ? $this->bid_modifier : 0.0;
    }

    public function hasBidModifier()
    {
        return isset($this->bid_modifier);
    }

    public function clearBidModifier()
    {
        unset($this->bid_modifier);
    }

    /**
     * The modifier for the bid when the criterion matches.
     *
     * Generated from protobuf field <code>optional double bid_modifier = 8;</code>
     * @param float $var
     * @return $this
     */
    public function setBidModifier($var)
    {
        GPBUtil::checkDouble($var);
        $this->bid_modifier = $var;

        return $this;
    }

    /**
     * Immutable. Criterion for interaction type. Only supported for search campaigns.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v10.common.InteractionTypeInfo interaction_type = 5 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Ads\GoogleAds\V10\Common\InteractionTypeInfo|null
     */
    public function getInteractionType()
    {
        return $this->readOneof(5);
    }

    public function hasInteractionType()
    {
        return $this->hasOneof(5);
    }

    /**
     * Immutable. Criterion for interaction type. Only supported for search campaigns.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v10.common.InteractionTypeInfo interaction_type = 5 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Ads\GoogleAds\V10\Common\InteractionTypeInfo $var
     * @return $this
     */
    public function setInteractionType($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V10\Common\InteractionTypeInfo::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getCriterion()
    {
        return $this->whichOneof("criterion");
    }

}

