<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/campaign_budget_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The result for the campaign budget mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.MutateCampaignBudgetResult</code>
 */
class MutateCampaignBudgetResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * The mutated campaign budget with only mutable fields after mutate. The
     * field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.CampaignBudget campaign_budget = 2;</code>
     */
    protected $campaign_budget = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Returned for successful operations.
     *     @type \Google\Ads\GoogleAds\V20\Resources\CampaignBudget $campaign_budget
     *           The mutated campaign budget with only mutable fields after mutate. The
     *           field will only be returned when response_content_type is set to
     *           "MUTABLE_RESOURCE".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\CampaignBudgetService::initOnce();
        parent::__construct($data);
    }

    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
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
     * The mutated campaign budget with only mutable fields after mutate. The
     * field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.CampaignBudget campaign_budget = 2;</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\CampaignBudget|null
     */
    public function getCampaignBudget()
    {
        return $this->campaign_budget;
    }

    public function hasCampaignBudget()
    {
        return isset($this->campaign_budget);
    }

    public function clearCampaignBudget()
    {
        unset($this->campaign_budget);
    }

    /**
     * The mutated campaign budget with only mutable fields after mutate. The
     * field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.CampaignBudget campaign_budget = 2;</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\CampaignBudget $var
     * @return $this
     */
    public function setCampaignBudget($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\CampaignBudget::class);
        $this->campaign_budget = $var;

        return $this;
    }

}

