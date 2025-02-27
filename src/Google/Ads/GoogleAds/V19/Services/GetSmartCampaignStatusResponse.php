<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/smart_campaign_setting_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for
 * [SmartCampaignSettingService.GetSmartCampaignStatus][google.ads.googleads.v19.services.SmartCampaignSettingService.GetSmartCampaignStatus].
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.GetSmartCampaignStatusResponse</code>
 */
class GetSmartCampaignStatusResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The status of this Smart campaign.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.SmartCampaignStatusEnum.SmartCampaignStatus smart_campaign_status = 1;</code>
     */
    protected $smart_campaign_status = 0;
    protected $smart_campaign_status_details;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $smart_campaign_status
     *           The status of this Smart campaign.
     *     @type \Google\Ads\GoogleAds\V19\Services\SmartCampaignNotEligibleDetails $not_eligible_details
     *           Details related to Smart campaigns that are ineligible to serve.
     *     @type \Google\Ads\GoogleAds\V19\Services\SmartCampaignEligibleDetails $eligible_details
     *           Details related to Smart campaigns that are eligible to serve.
     *     @type \Google\Ads\GoogleAds\V19\Services\SmartCampaignPausedDetails $paused_details
     *           Details related to paused Smart campaigns.
     *     @type \Google\Ads\GoogleAds\V19\Services\SmartCampaignRemovedDetails $removed_details
     *           Details related to removed Smart campaigns.
     *     @type \Google\Ads\GoogleAds\V19\Services\SmartCampaignEndedDetails $ended_details
     *           Details related to Smart campaigns that have ended.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\SmartCampaignSettingService::initOnce();
        parent::__construct($data);
    }

    /**
     * The status of this Smart campaign.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.SmartCampaignStatusEnum.SmartCampaignStatus smart_campaign_status = 1;</code>
     * @return int
     */
    public function getSmartCampaignStatus()
    {
        return $this->smart_campaign_status;
    }

    /**
     * The status of this Smart campaign.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.enums.SmartCampaignStatusEnum.SmartCampaignStatus smart_campaign_status = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setSmartCampaignStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V19\Enums\SmartCampaignStatusEnum\SmartCampaignStatus::class);
        $this->smart_campaign_status = $var;

        return $this;
    }

    /**
     * Details related to Smart campaigns that are ineligible to serve.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.services.SmartCampaignNotEligibleDetails not_eligible_details = 2;</code>
     * @return \Google\Ads\GoogleAds\V19\Services\SmartCampaignNotEligibleDetails|null
     */
    public function getNotEligibleDetails()
    {
        return $this->readOneof(2);
    }

    public function hasNotEligibleDetails()
    {
        return $this->hasOneof(2);
    }

    /**
     * Details related to Smart campaigns that are ineligible to serve.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.services.SmartCampaignNotEligibleDetails not_eligible_details = 2;</code>
     * @param \Google\Ads\GoogleAds\V19\Services\SmartCampaignNotEligibleDetails $var
     * @return $this
     */
    public function setNotEligibleDetails($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Services\SmartCampaignNotEligibleDetails::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Details related to Smart campaigns that are eligible to serve.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.services.SmartCampaignEligibleDetails eligible_details = 3;</code>
     * @return \Google\Ads\GoogleAds\V19\Services\SmartCampaignEligibleDetails|null
     */
    public function getEligibleDetails()
    {
        return $this->readOneof(3);
    }

    public function hasEligibleDetails()
    {
        return $this->hasOneof(3);
    }

    /**
     * Details related to Smart campaigns that are eligible to serve.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.services.SmartCampaignEligibleDetails eligible_details = 3;</code>
     * @param \Google\Ads\GoogleAds\V19\Services\SmartCampaignEligibleDetails $var
     * @return $this
     */
    public function setEligibleDetails($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Services\SmartCampaignEligibleDetails::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Details related to paused Smart campaigns.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.services.SmartCampaignPausedDetails paused_details = 4;</code>
     * @return \Google\Ads\GoogleAds\V19\Services\SmartCampaignPausedDetails|null
     */
    public function getPausedDetails()
    {
        return $this->readOneof(4);
    }

    public function hasPausedDetails()
    {
        return $this->hasOneof(4);
    }

    /**
     * Details related to paused Smart campaigns.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.services.SmartCampaignPausedDetails paused_details = 4;</code>
     * @param \Google\Ads\GoogleAds\V19\Services\SmartCampaignPausedDetails $var
     * @return $this
     */
    public function setPausedDetails($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Services\SmartCampaignPausedDetails::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Details related to removed Smart campaigns.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.services.SmartCampaignRemovedDetails removed_details = 5;</code>
     * @return \Google\Ads\GoogleAds\V19\Services\SmartCampaignRemovedDetails|null
     */
    public function getRemovedDetails()
    {
        return $this->readOneof(5);
    }

    public function hasRemovedDetails()
    {
        return $this->hasOneof(5);
    }

    /**
     * Details related to removed Smart campaigns.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.services.SmartCampaignRemovedDetails removed_details = 5;</code>
     * @param \Google\Ads\GoogleAds\V19\Services\SmartCampaignRemovedDetails $var
     * @return $this
     */
    public function setRemovedDetails($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Services\SmartCampaignRemovedDetails::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Details related to Smart campaigns that have ended.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.services.SmartCampaignEndedDetails ended_details = 6;</code>
     * @return \Google\Ads\GoogleAds\V19\Services\SmartCampaignEndedDetails|null
     */
    public function getEndedDetails()
    {
        return $this->readOneof(6);
    }

    public function hasEndedDetails()
    {
        return $this->hasOneof(6);
    }

    /**
     * Details related to Smart campaigns that have ended.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.services.SmartCampaignEndedDetails ended_details = 6;</code>
     * @param \Google\Ads\GoogleAds\V19\Services\SmartCampaignEndedDetails $var
     * @return $this
     */
    public function setEndedDetails($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Services\SmartCampaignEndedDetails::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getSmartCampaignStatusDetails()
    {
        return $this->whichOneof("smart_campaign_status_details");
    }

}

