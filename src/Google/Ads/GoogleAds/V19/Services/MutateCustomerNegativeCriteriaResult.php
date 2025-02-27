<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/customer_negative_criterion_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The result for the criterion mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.MutateCustomerNegativeCriteriaResult</code>
 */
class MutateCustomerNegativeCriteriaResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * The mutated criterion with only mutable fields after mutate. The field will
     * only be returned when response_content_type is set to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.CustomerNegativeCriterion customer_negative_criterion = 2;</code>
     */
    protected $customer_negative_criterion = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Returned for successful operations.
     *     @type \Google\Ads\GoogleAds\V19\Resources\CustomerNegativeCriterion $customer_negative_criterion
     *           The mutated criterion with only mutable fields after mutate. The field will
     *           only be returned when response_content_type is set to "MUTABLE_RESOURCE".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\CustomerNegativeCriterionService::initOnce();
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
     * The mutated criterion with only mutable fields after mutate. The field will
     * only be returned when response_content_type is set to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.CustomerNegativeCriterion customer_negative_criterion = 2;</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\CustomerNegativeCriterion|null
     */
    public function getCustomerNegativeCriterion()
    {
        return $this->customer_negative_criterion;
    }

    public function hasCustomerNegativeCriterion()
    {
        return isset($this->customer_negative_criterion);
    }

    public function clearCustomerNegativeCriterion()
    {
        unset($this->customer_negative_criterion);
    }

    /**
     * The mutated criterion with only mutable fields after mutate. The field will
     * only be returned when response_content_type is set to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.CustomerNegativeCriterion customer_negative_criterion = 2;</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\CustomerNegativeCriterion $var
     * @return $this
     */
    public function setCustomerNegativeCriterion($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\CustomerNegativeCriterion::class);
        $this->customer_negative_criterion = $var;

        return $this;
    }

}

