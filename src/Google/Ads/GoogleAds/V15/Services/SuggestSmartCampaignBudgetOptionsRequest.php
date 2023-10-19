<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v15/services/smart_campaign_suggest_service.proto

namespace Google\Ads\GoogleAds\V15\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [SmartCampaignSuggestService.SuggestSmartCampaignBudgetOptions][google.ads.googleads.v15.services.SmartCampaignSuggestService.SuggestSmartCampaignBudgetOptions].
 *
 * Generated from protobuf message <code>google.ads.googleads.v15.services.SuggestSmartCampaignBudgetOptionsRequest</code>
 */
class SuggestSmartCampaignBudgetOptionsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The ID of the customer whose budget options are to be suggested.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $customer_id = '';
    protected $suggestion_data;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $customer_id
     *           Required. The ID of the customer whose budget options are to be suggested.
     *     @type string $campaign
     *           Required. The resource name of the campaign to get suggestion for.
     *     @type \Google\Ads\GoogleAds\V15\Services\SmartCampaignSuggestionInfo $suggestion_info
     *           Required. Information needed to get budget options
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V15\Services\SmartCampaignSuggestService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The ID of the customer whose budget options are to be suggested.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Required. The ID of the customer whose budget options are to be suggested.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setCustomerId($var)
    {
        GPBUtil::checkString($var, True);
        $this->customer_id = $var;

        return $this;
    }

    /**
     * Required. The resource name of the campaign to get suggestion for.
     *
     * Generated from protobuf field <code>string campaign = 2 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCampaign()
    {
        return $this->readOneof(2);
    }

    public function hasCampaign()
    {
        return $this->hasOneof(2);
    }

    /**
     * Required. The resource name of the campaign to get suggestion for.
     *
     * Generated from protobuf field <code>string campaign = 2 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCampaign($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Required. Information needed to get budget options
     *
     * Generated from protobuf field <code>.google.ads.googleads.v15.services.SmartCampaignSuggestionInfo suggestion_info = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Ads\GoogleAds\V15\Services\SmartCampaignSuggestionInfo|null
     */
    public function getSuggestionInfo()
    {
        return $this->readOneof(3);
    }

    public function hasSuggestionInfo()
    {
        return $this->hasOneof(3);
    }

    /**
     * Required. Information needed to get budget options
     *
     * Generated from protobuf field <code>.google.ads.googleads.v15.services.SmartCampaignSuggestionInfo suggestion_info = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Ads\GoogleAds\V15\Services\SmartCampaignSuggestionInfo $var
     * @return $this
     */
    public function setSuggestionInfo($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V15\Services\SmartCampaignSuggestionInfo::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getSuggestionData()
    {
        return $this->whichOneof("suggestion_data");
    }

}

