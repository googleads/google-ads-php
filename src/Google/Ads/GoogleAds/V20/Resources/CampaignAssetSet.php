<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/campaign_asset_set.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * CampaignAssetSet is the linkage between a campaign and an asset set.
 * Adding a CampaignAssetSet links an asset set with a campaign.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.CampaignAssetSet</code>
 */
class CampaignAssetSet extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the campaign asset set.
     * Asset set asset resource names have the form:
     * `customers/{customer_id}/campaignAssetSets/{campaign_id}~{asset_set_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Immutable. The campaign to which this asset set is linked.
     *
     * Generated from protobuf field <code>string campaign = 2 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $campaign = '';
    /**
     * Immutable. The asset set which is linked to the campaign.
     *
     * Generated from protobuf field <code>string asset_set = 3 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $asset_set = '';
    /**
     * Output only. The status of the campaign asset set asset. Read-only.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetSetLinkStatusEnum.AssetSetLinkStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $status = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the campaign asset set.
     *           Asset set asset resource names have the form:
     *           `customers/{customer_id}/campaignAssetSets/{campaign_id}~{asset_set_id}`
     *     @type string $campaign
     *           Immutable. The campaign to which this asset set is linked.
     *     @type string $asset_set
     *           Immutable. The asset set which is linked to the campaign.
     *     @type int $status
     *           Output only. The status of the campaign asset set asset. Read-only.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\CampaignAssetSet::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the campaign asset set.
     * Asset set asset resource names have the form:
     * `customers/{customer_id}/campaignAssetSets/{campaign_id}~{asset_set_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the campaign asset set.
     * Asset set asset resource names have the form:
     * `customers/{customer_id}/campaignAssetSets/{campaign_id}~{asset_set_id}`
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
     * Immutable. The campaign to which this asset set is linked.
     *
     * Generated from protobuf field <code>string campaign = 2 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * Immutable. The campaign to which this asset set is linked.
     *
     * Generated from protobuf field <code>string campaign = 2 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
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
     * Immutable. The asset set which is linked to the campaign.
     *
     * Generated from protobuf field <code>string asset_set = 3 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAssetSet()
    {
        return $this->asset_set;
    }

    /**
     * Immutable. The asset set which is linked to the campaign.
     *
     * Generated from protobuf field <code>string asset_set = 3 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAssetSet($var)
    {
        GPBUtil::checkString($var, True);
        $this->asset_set = $var;

        return $this;
    }

    /**
     * Output only. The status of the campaign asset set asset. Read-only.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetSetLinkStatusEnum.AssetSetLinkStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Output only. The status of the campaign asset set asset. Read-only.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.AssetSetLinkStatusEnum.AssetSetLinkStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\AssetSetLinkStatusEnum\AssetSetLinkStatus::class);
        $this->status = $var;

        return $this;
    }

}

