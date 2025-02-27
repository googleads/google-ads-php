<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/resources/customer_label.proto

namespace Google\Ads\GoogleAds\V19\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a relationship between a customer and a label. This customer may
 * not have access to all the labels attached to it. Additional CustomerLabels
 * may be returned by increasing permissions with login-customer-id.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.resources.CustomerLabel</code>
 */
class CustomerLabel extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. Name of the resource.
     * Customer label resource names have the form:
     * `customers/{customer_id}/customerLabels/{label_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The resource name of the customer to which the label is
     * attached. Read only.
     *
     * Generated from protobuf field <code>optional string customer = 4 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $customer = null;
    /**
     * Output only. The resource name of the label assigned to the customer.
     * Note: the Customer ID portion of the label resource name is not
     * validated when creating a new CustomerLabel.
     *
     * Generated from protobuf field <code>optional string label = 5 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $label = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. Name of the resource.
     *           Customer label resource names have the form:
     *           `customers/{customer_id}/customerLabels/{label_id}`
     *     @type string $customer
     *           Output only. The resource name of the customer to which the label is
     *           attached. Read only.
     *     @type string $label
     *           Output only. The resource name of the label assigned to the customer.
     *           Note: the Customer ID portion of the label resource name is not
     *           validated when creating a new CustomerLabel.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Resources\CustomerLabel::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. Name of the resource.
     * Customer label resource names have the form:
     * `customers/{customer_id}/customerLabels/{label_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. Name of the resource.
     * Customer label resource names have the form:
     * `customers/{customer_id}/customerLabels/{label_id}`
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
     * Output only. The resource name of the customer to which the label is
     * attached. Read only.
     *
     * Generated from protobuf field <code>optional string customer = 4 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCustomer()
    {
        return isset($this->customer) ? $this->customer : '';
    }

    public function hasCustomer()
    {
        return isset($this->customer);
    }

    public function clearCustomer()
    {
        unset($this->customer);
    }

    /**
     * Output only. The resource name of the customer to which the label is
     * attached. Read only.
     *
     * Generated from protobuf field <code>optional string customer = 4 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCustomer($var)
    {
        GPBUtil::checkString($var, True);
        $this->customer = $var;

        return $this;
    }

    /**
     * Output only. The resource name of the label assigned to the customer.
     * Note: the Customer ID portion of the label resource name is not
     * validated when creating a new CustomerLabel.
     *
     * Generated from protobuf field <code>optional string label = 5 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getLabel()
    {
        return isset($this->label) ? $this->label : '';
    }

    public function hasLabel()
    {
        return isset($this->label);
    }

    public function clearLabel()
    {
        unset($this->label);
    }

    /**
     * Output only. The resource name of the label assigned to the customer.
     * Note: the Customer ID portion of the label resource name is not
     * validated when creating a new CustomerLabel.
     *
     * Generated from protobuf field <code>optional string label = 5 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setLabel($var)
    {
        GPBUtil::checkString($var, True);
        $this->label = $var;

        return $this;
    }

}

