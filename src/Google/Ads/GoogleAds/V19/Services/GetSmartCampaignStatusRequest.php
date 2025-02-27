<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/smart_campaign_setting_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [SmartCampaignSettingService.GetSmartCampaignStatus][google.ads.googleads.v19.services.SmartCampaignSettingService.GetSmartCampaignStatus].
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.GetSmartCampaignStatusRequest</code>
 */
class GetSmartCampaignStatusRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name of the Smart campaign setting belonging to the
     * Smart campaign to fetch the status of.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';

    /**
     * @param string $resourceName Required. The resource name of the Smart campaign setting belonging to the
     *                             Smart campaign to fetch the status of.
     *
     * @return \Google\Ads\GoogleAds\V19\Services\GetSmartCampaignStatusRequest
     *
     * @experimental
     */
    public static function build(string $resourceName): self
    {
        return (new self())
            ->setResourceName($resourceName);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Required. The resource name of the Smart campaign setting belonging to the
     *           Smart campaign to fetch the status of.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\SmartCampaignSettingService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name of the Smart campaign setting belonging to the
     * Smart campaign to fetch the status of.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Required. The resource name of the Smart campaign setting belonging to the
     * Smart campaign to fetch the status of.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setResourceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->resource_name = $var;

        return $this;
    }

}

