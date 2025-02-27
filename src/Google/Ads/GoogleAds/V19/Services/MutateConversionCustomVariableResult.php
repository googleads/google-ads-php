<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/conversion_custom_variable_service.proto

namespace Google\Ads\GoogleAds\V19\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The result for the conversion custom variable mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.MutateConversionCustomVariableResult</code>
 */
class MutateConversionCustomVariableResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * The mutated conversion custom variable with only mutable fields after
     * mutate. The field will only be returned when response_content_type is set
     * to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionCustomVariable conversion_custom_variable = 2;</code>
     */
    protected $conversion_custom_variable = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Returned for successful operations.
     *     @type \Google\Ads\GoogleAds\V19\Resources\ConversionCustomVariable $conversion_custom_variable
     *           The mutated conversion custom variable with only mutable fields after
     *           mutate. The field will only be returned when response_content_type is set
     *           to "MUTABLE_RESOURCE".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\ConversionCustomVariableService::initOnce();
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
     * The mutated conversion custom variable with only mutable fields after
     * mutate. The field will only be returned when response_content_type is set
     * to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionCustomVariable conversion_custom_variable = 2;</code>
     * @return \Google\Ads\GoogleAds\V19\Resources\ConversionCustomVariable|null
     */
    public function getConversionCustomVariable()
    {
        return $this->conversion_custom_variable;
    }

    public function hasConversionCustomVariable()
    {
        return isset($this->conversion_custom_variable);
    }

    public function clearConversionCustomVariable()
    {
        unset($this->conversion_custom_variable);
    }

    /**
     * The mutated conversion custom variable with only mutable fields after
     * mutate. The field will only be returned when response_content_type is set
     * to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.resources.ConversionCustomVariable conversion_custom_variable = 2;</code>
     * @param \Google\Ads\GoogleAds\V19\Resources\ConversionCustomVariable $var
     * @return $this
     */
    public function setConversionCustomVariable($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Resources\ConversionCustomVariable::class);
        $this->conversion_custom_variable = $var;

        return $this;
    }

}

