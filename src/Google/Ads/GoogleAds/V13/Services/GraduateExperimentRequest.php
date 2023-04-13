<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/services/experiment_service.proto

namespace Google\Ads\GoogleAds\V13\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [ExperimentService.GraduateExperiment][google.ads.googleads.v13.services.ExperimentService.GraduateExperiment].
 *
 * Generated from protobuf message <code>google.ads.googleads.v13.services.GraduateExperimentRequest</code>
 */
class GraduateExperimentRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The experiment to be graduated.
     *
     * Generated from protobuf field <code>string experiment = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    protected $experiment = '';
    /**
     * Required. List of campaign budget mappings for graduation. Each campaign
     * that appears here will graduate, and will be assigned a new budget that is
     * paired with it in the mapping. The maximum size is one.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v13.services.CampaignBudgetMapping campaign_budget_mappings = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $campaign_budget_mappings;
    /**
     * If true, the request is validated but not executed. Only errors are
     * returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 3;</code>
     */
    protected $validate_only = false;

    /**
     * @param string                                                     $experiment             Required. The experiment to be graduated.
     * @param \Google\Ads\GoogleAds\V13\Services\CampaignBudgetMapping[] $campaignBudgetMappings Required. List of campaign budget mappings for graduation. Each campaign
     *                                                                                           that appears here will graduate, and will be assigned a new budget that is
     *                                                                                           paired with it in the mapping. The maximum size is one.
     *
     * @return \Google\Ads\GoogleAds\V13\Services\GraduateExperimentRequest
     *
     * @experimental
     */
    public static function build(string $experiment, array $campaignBudgetMappings): self
    {
        return (new self())
            ->setExperiment($experiment)
            ->setCampaignBudgetMappings($campaignBudgetMappings);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $experiment
     *           Required. The experiment to be graduated.
     *     @type array<\Google\Ads\GoogleAds\V13\Services\CampaignBudgetMapping>|\Google\Protobuf\Internal\RepeatedField $campaign_budget_mappings
     *           Required. List of campaign budget mappings for graduation. Each campaign
     *           that appears here will graduate, and will be assigned a new budget that is
     *           paired with it in the mapping. The maximum size is one.
     *     @type bool $validate_only
     *           If true, the request is validated but not executed. Only errors are
     *           returned, not results.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V13\Services\ExperimentService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The experiment to be graduated.
     *
     * Generated from protobuf field <code>string experiment = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getExperiment()
    {
        return $this->experiment;
    }

    /**
     * Required. The experiment to be graduated.
     *
     * Generated from protobuf field <code>string experiment = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setExperiment($var)
    {
        GPBUtil::checkString($var, True);
        $this->experiment = $var;

        return $this;
    }

    /**
     * Required. List of campaign budget mappings for graduation. Each campaign
     * that appears here will graduate, and will be assigned a new budget that is
     * paired with it in the mapping. The maximum size is one.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v13.services.CampaignBudgetMapping campaign_budget_mappings = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCampaignBudgetMappings()
    {
        return $this->campaign_budget_mappings;
    }

    /**
     * Required. List of campaign budget mappings for graduation. Each campaign
     * that appears here will graduate, and will be assigned a new budget that is
     * paired with it in the mapping. The maximum size is one.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v13.services.CampaignBudgetMapping campaign_budget_mappings = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param array<\Google\Ads\GoogleAds\V13\Services\CampaignBudgetMapping>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCampaignBudgetMappings($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V13\Services\CampaignBudgetMapping::class);
        $this->campaign_budget_mappings = $arr;

        return $this;
    }

    /**
     * If true, the request is validated but not executed. Only errors are
     * returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 3;</code>
     * @return bool
     */
    public function getValidateOnly()
    {
        return $this->validate_only;
    }

    /**
     * If true, the request is validated but not executed. Only errors are
     * returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 3;</code>
     * @param bool $var
     * @return $this
     */
    public function setValidateOnly($var)
    {
        GPBUtil::checkBool($var);
        $this->validate_only = $var;

        return $this;
    }

}

