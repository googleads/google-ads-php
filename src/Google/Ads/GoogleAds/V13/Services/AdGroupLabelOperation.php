<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/services/ad_group_label_service.proto

namespace Google\Ads\GoogleAds\V13\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A single operation (create, remove) on an ad group label.
 *
 * Generated from protobuf message <code>google.ads.googleads.v13.services.AdGroupLabelOperation</code>
 */
class AdGroupLabelOperation extends \Google\Protobuf\Internal\Message
{
    protected $operation;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V13\Resources\AdGroupLabel $create
     *           Create operation: No resource name is expected for the new ad group
     *           label.
     *     @type string $remove
     *           Remove operation: A resource name for the ad group label
     *           being removed, in this format:
     *           `customers/{customer_id}/adGroupLabels/{ad_group_id}~{label_id}`
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V13\Services\AdGroupLabelService::initOnce();
        parent::__construct($data);
    }

    /**
     * Create operation: No resource name is expected for the new ad group
     * label.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.resources.AdGroupLabel create = 1;</code>
     * @return \Google\Ads\GoogleAds\V13\Resources\AdGroupLabel|null
     */
    public function getCreate()
    {
        return $this->readOneof(1);
    }

    public function hasCreate()
    {
        return $this->hasOneof(1);
    }

    /**
     * Create operation: No resource name is expected for the new ad group
     * label.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v13.resources.AdGroupLabel create = 1;</code>
     * @param \Google\Ads\GoogleAds\V13\Resources\AdGroupLabel $var
     * @return $this
     */
    public function setCreate($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V13\Resources\AdGroupLabel::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Remove operation: A resource name for the ad group label
     * being removed, in this format:
     * `customers/{customer_id}/adGroupLabels/{ad_group_id}~{label_id}`
     *
     * Generated from protobuf field <code>string remove = 2 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getRemove()
    {
        return $this->readOneof(2);
    }

    public function hasRemove()
    {
        return $this->hasOneof(2);
    }

    /**
     * Remove operation: A resource name for the ad group label
     * being removed, in this format:
     * `customers/{customer_id}/adGroupLabels/{ad_group_id}~{label_id}`
     *
     * Generated from protobuf field <code>string remove = 2 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setRemove($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getOperation()
    {
        return $this->whichOneof("operation");
    }

}

