<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/reach_plan_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [ReachPlanService.GenerateConversionRates][google.ads.googleads.v20.services.ReachPlanService.GenerateConversionRates].
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.GenerateConversionRatesRequest</code>
 */
class GenerateConversionRatesRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The ID of the customer. A conversion rate based on the historical
     * data of this customer may be suggested.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $customer_id = '';
    /**
     * The name of the customer being planned for. This is a user-defined value.
     *
     * Generated from protobuf field <code>optional string customer_reach_group = 2;</code>
     */
    protected $customer_reach_group = null;
    /**
     * Optional. Additional information on the application issuing the request.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.AdditionalApplicationInfo reach_application_info = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $reach_application_info = null;

    /**
     * @param string $customerId Required. The ID of the customer. A conversion rate based on the historical
     *                           data of this customer may be suggested.
     *
     * @return \Google\Ads\GoogleAds\V20\Services\GenerateConversionRatesRequest
     *
     * @experimental
     */
    public static function build(string $customerId): self
    {
        return (new self())
            ->setCustomerId($customerId);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $customer_id
     *           Required. The ID of the customer. A conversion rate based on the historical
     *           data of this customer may be suggested.
     *     @type string $customer_reach_group
     *           The name of the customer being planned for. This is a user-defined value.
     *     @type \Google\Ads\GoogleAds\V20\Common\AdditionalApplicationInfo $reach_application_info
     *           Optional. Additional information on the application issuing the request.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\ReachPlanService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The ID of the customer. A conversion rate based on the historical
     * data of this customer may be suggested.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Required. The ID of the customer. A conversion rate based on the historical
     * data of this customer may be suggested.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
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
     * The name of the customer being planned for. This is a user-defined value.
     *
     * Generated from protobuf field <code>optional string customer_reach_group = 2;</code>
     * @return string
     */
    public function getCustomerReachGroup()
    {
        return isset($this->customer_reach_group) ? $this->customer_reach_group : '';
    }

    public function hasCustomerReachGroup()
    {
        return isset($this->customer_reach_group);
    }

    public function clearCustomerReachGroup()
    {
        unset($this->customer_reach_group);
    }

    /**
     * The name of the customer being planned for. This is a user-defined value.
     *
     * Generated from protobuf field <code>optional string customer_reach_group = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setCustomerReachGroup($var)
    {
        GPBUtil::checkString($var, True);
        $this->customer_reach_group = $var;

        return $this;
    }

    /**
     * Optional. Additional information on the application issuing the request.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.AdditionalApplicationInfo reach_application_info = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Ads\GoogleAds\V20\Common\AdditionalApplicationInfo|null
     */
    public function getReachApplicationInfo()
    {
        return $this->reach_application_info;
    }

    public function hasReachApplicationInfo()
    {
        return isset($this->reach_application_info);
    }

    public function clearReachApplicationInfo()
    {
        unset($this->reach_application_info);
    }

    /**
     * Optional. Additional information on the application issuing the request.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.common.AdditionalApplicationInfo reach_application_info = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Ads\GoogleAds\V20\Common\AdditionalApplicationInfo $var
     * @return $this
     */
    public function setReachApplicationInfo($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Common\AdditionalApplicationInfo::class);
        $this->reach_application_info = $var;

        return $this;
    }

}

