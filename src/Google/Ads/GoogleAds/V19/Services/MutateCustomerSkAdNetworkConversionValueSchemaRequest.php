<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/customer_sk_ad_network_conversion_value_schema_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [CustomerSkAdNetworkConversionValueSchemaService.MutateCustomerSkAdNetworkConversionValueSchema][google.ads.googleads.v19.services.CustomerSkAdNetworkConversionValueSchemaService.MutateCustomerSkAdNetworkConversionValueSchema].
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.MutateCustomerSkAdNetworkConversionValueSchemaRequest</code>
 */
class MutateCustomerSkAdNetworkConversionValueSchemaRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * The ID of the customer whose shared sets are being modified.
     *
     * Generated from protobuf field <code>string customer_id = 1;</code>
     */
    protected $customer_id = '';
    /**
     * The operation to perform.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.services.CustomerSkAdNetworkConversionValueSchemaOperation operation = 2;</code>
     */
    protected $operation = null;
    /**
     * If true, the request is validated but not executed. Only errors are
     * returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 3;</code>
     */
    protected $validate_only = false;
    /**
     * Optional. If true, enables returning warnings. Warnings return error
     * messages and error codes without blocking the execution of the mutate
     * operation.
     *
     * Generated from protobuf field <code>bool enable_warnings = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $enable_warnings = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $customer_id
     *           The ID of the customer whose shared sets are being modified.
     *     @type \Google\Ads\GoogleAds\V19\Services\CustomerSkAdNetworkConversionValueSchemaOperation $operation
     *           The operation to perform.
     *     @type bool $validate_only
     *           If true, the request is validated but not executed. Only errors are
     *           returned, not results.
     *     @type bool $enable_warnings
     *           Optional. If true, enables returning warnings. Warnings return error
     *           messages and error codes without blocking the execution of the mutate
     *           operation.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\CustomerSkAdNetworkConversionValueSchemaService::initOnce();
        parent::__construct($data);
    }

    /**
     * The ID of the customer whose shared sets are being modified.
     *
     * Generated from protobuf field <code>string customer_id = 1;</code>
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * The ID of the customer whose shared sets are being modified.
     *
     * Generated from protobuf field <code>string customer_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCustomerId($var)
    {
        GPBUtil::checkString($var, True);
        $this->customer_id = $var;

        return $this;
    }

    /**
     * The operation to perform.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.services.CustomerSkAdNetworkConversionValueSchemaOperation operation = 2;</code>
     * @return \Google\Ads\GoogleAds\V19\Services\CustomerSkAdNetworkConversionValueSchemaOperation|null
     */
    public function getOperation()
    {
        return $this->operation;
    }

    public function hasOperation()
    {
        return isset($this->operation);
    }

    public function clearOperation()
    {
        unset($this->operation);
    }

    /**
     * The operation to perform.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.services.CustomerSkAdNetworkConversionValueSchemaOperation operation = 2;</code>
     * @param \Google\Ads\GoogleAds\V19\Services\CustomerSkAdNetworkConversionValueSchemaOperation $var
     * @return $this
     */
    public function setOperation($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Services\CustomerSkAdNetworkConversionValueSchemaOperation::class);
        $this->operation = $var;

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

    /**
     * Optional. If true, enables returning warnings. Warnings return error
     * messages and error codes without blocking the execution of the mutate
     * operation.
     *
     * Generated from protobuf field <code>bool enable_warnings = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getEnableWarnings()
    {
        return $this->enable_warnings;
    }

    /**
     * Optional. If true, enables returning warnings. Warnings return error
     * messages and error codes without blocking the execution of the mutate
     * operation.
     *
     * Generated from protobuf field <code>bool enable_warnings = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setEnableWarnings($var)
    {
        GPBUtil::checkBool($var);
        $this->enable_warnings = $var;

        return $this;
    }

}

