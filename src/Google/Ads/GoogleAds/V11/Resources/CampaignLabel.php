<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v11/resources/campaign_label.proto

namespace Google\Ads\GoogleAds\V11\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a relationship between a campaign and a label.
 *
 * Generated from protobuf message <code>google.ads.googleads.v11.resources.CampaignLabel</code>
 */
class CampaignLabel extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. Name of the resource.
     * Campaign label resource names have the form:
     * `customers/{customer_id}/campaignLabels/{campaign_id}~{label_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Immutable. The campaign to which the label is attached.
     *
     * Generated from protobuf field <code>optional string campaign = 4 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $campaign = null;
    /**
     * Immutable. The label assigned to the campaign.
     *
     * Generated from protobuf field <code>optional string label = 5 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $label = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. Name of the resource.
     *           Campaign label resource names have the form:
     *           `customers/{customer_id}/campaignLabels/{campaign_id}~{label_id}`
     *     @type string $campaign
     *           Immutable. The campaign to which the label is attached.
     *     @type string $label
     *           Immutable. The label assigned to the campaign.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V11\Resources\CampaignLabel::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. Name of the resource.
     * Campaign label resource names have the form:
     * `customers/{customer_id}/campaignLabels/{campaign_id}~{label_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. Name of the resource.
     * Campaign label resource names have the form:
     * `customers/{customer_id}/campaignLabels/{campaign_id}~{label_id}`
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
     * Immutable. The campaign to which the label is attached.
     *
     * Generated from protobuf field <code>optional string campaign = 4 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
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
     * Immutable. The campaign to which the label is attached.
     *
     * Generated from protobuf field <code>optional string campaign = 4 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
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
     * Immutable. The label assigned to the campaign.
     *
     * Generated from protobuf field <code>optional string label = 5 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getLabel()
    {
        return isset($this->label) ? $this->label : '';
    }

    public function hasLabel()
    {
        return isset($this->label);
    }

    public function clearLabel()
    {
        unset($this->label);
    }

    /**
     * Immutable. The label assigned to the campaign.
     *
     * Generated from protobuf field <code>optional string label = 5 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setLabel($var)
    {
        GPBUtil::checkString($var, True);
        $this->label = $var;

        return $this;
    }

}
