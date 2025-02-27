<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/campaign_asset_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The result for the campaign asset mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.MutateCampaignAssetResult</code>
 */
class MutateCampaignAssetResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * The mutated campaign asset with only mutable fields after
     * mutate. The field will only be returned when response_content_type is set
     * to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.CampaignAsset campaign_asset = 2;</code>
     */
    protected $campaign_asset = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Returned for successful operations.
     *     @type \Google\Ads\GoogleAds\V19\Resources\CampaignAsset $campaign_asset
     *           The mutated campaign asset with only mutable fields after
     *           mutate. The field will only be returned when response_content_type is set
     *           to "MUTABLE_RESOURCE".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\CampaignAssetService::initOnce();
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
     * The mutated campaign asset with only mutable fields after
     * mutate. The field will only be returned when response_content_type is set
     * to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.CampaignAsset campaign_asset = 2;</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\CampaignAsset|null
     */
    public function getCampaignAsset()
    {
        return $this->campaign_asset;
    }

    public function hasCampaignAsset()
    {
        return isset($this->campaign_asset);
    }

    public function clearCampaignAsset()
    {
        unset($this->campaign_asset);
    }

    /**
     * The mutated campaign asset with only mutable fields after
     * mutate. The field will only be returned when response_content_type is set
     * to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.CampaignAsset campaign_asset = 2;</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\CampaignAsset $var
     * @return $this
     */
    public function setCampaignAsset($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\CampaignAsset::class);
        $this->campaign_asset = $var;

        return $this;
    }

}

