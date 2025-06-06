<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/smart_campaign_suggest_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for
 * [SmartCampaignSuggestService.SuggestSmartCampaignBudgetOptions][google.ads.googleads.v20.services.SmartCampaignSuggestService.SuggestSmartCampaignBudgetOptions].
 * Depending on whether the system could suggest the options, either all of the
 * options or none of them might be returned.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.SuggestSmartCampaignBudgetOptionsResponse</code>
 */
class SuggestSmartCampaignBudgetOptionsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. The lowest budget option.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.services.SuggestSmartCampaignBudgetOptionsResponse.BudgetOption low = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $low = null;
    /**
     * Optional. The recommended budget option.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.services.SuggestSmartCampaignBudgetOptionsResponse.BudgetOption recommended = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $recommended = null;
    /**
     * Optional. The highest budget option.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.services.SuggestSmartCampaignBudgetOptionsResponse.BudgetOption high = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $high = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V20\Services\SuggestSmartCampaignBudgetOptionsResponse\BudgetOption $low
     *           Optional. The lowest budget option.
     *     @type \Google\Ads\GoogleAds\V20\Services\SuggestSmartCampaignBudgetOptionsResponse\BudgetOption $recommended
     *           Optional. The recommended budget option.
     *     @type \Google\Ads\GoogleAds\V20\Services\SuggestSmartCampaignBudgetOptionsResponse\BudgetOption $high
     *           Optional. The highest budget option.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\SmartCampaignSuggestService::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. The lowest budget option.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.services.SuggestSmartCampaignBudgetOptionsResponse.BudgetOption low = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Ads\GoogleAds\V20\Services\SuggestSmartCampaignBudgetOptionsResponse\BudgetOption|null
     */
    public function getLow()
    {
        return $this->low;
    }

    public function hasLow()
    {
        return isset($this->low);
    }

    public function clearLow()
    {
        unset($this->low);
    }

    /**
     * Optional. The lowest budget option.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.services.SuggestSmartCampaignBudgetOptionsResponse.BudgetOption low = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Ads\GoogleAds\V20\Services\SuggestSmartCampaignBudgetOptionsResponse\BudgetOption $var
     * @return $this
     */
    public function setLow($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\SuggestSmartCampaignBudgetOptionsResponse\BudgetOption::class);
        $this->low = $var;

        return $this;
    }

    /**
     * Optional. The recommended budget option.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.services.SuggestSmartCampaignBudgetOptionsResponse.BudgetOption recommended = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Ads\GoogleAds\V20\Services\SuggestSmartCampaignBudgetOptionsResponse\BudgetOption|null
     */
    public function getRecommended()
    {
        return $this->recommended;
    }

    public function hasRecommended()
    {
        return isset($this->recommended);
    }

    public function clearRecommended()
    {
        unset($this->recommended);
    }

    /**
     * Optional. The recommended budget option.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.services.SuggestSmartCampaignBudgetOptionsResponse.BudgetOption recommended = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Ads\GoogleAds\V20\Services\SuggestSmartCampaignBudgetOptionsResponse\BudgetOption $var
     * @return $this
     */
    public function setRecommended($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\SuggestSmartCampaignBudgetOptionsResponse\BudgetOption::class);
        $this->recommended = $var;

        return $this;
    }

    /**
     * Optional. The highest budget option.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.services.SuggestSmartCampaignBudgetOptionsResponse.BudgetOption high = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Ads\GoogleAds\V20\Services\SuggestSmartCampaignBudgetOptionsResponse\BudgetOption|null
     */
    public function getHigh()
    {
        return $this->high;
    }

    public function hasHigh()
    {
        return isset($this->high);
    }

    public function clearHigh()
    {
        unset($this->high);
    }

    /**
     * Optional. The highest budget option.
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v20.services.SuggestSmartCampaignBudgetOptionsResponse.BudgetOption high = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Ads\GoogleAds\V20\Services\SuggestSmartCampaignBudgetOptionsResponse\BudgetOption $var
     * @return $this
     */
    public function setHigh($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Services\SuggestSmartCampaignBudgetOptionsResponse\BudgetOption::class);
        $this->high = $var;

        return $this;
    }

}

