<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/conversion_value_rule.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A conversion value rule
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.ConversionValueRule</code>
 */
class ConversionValueRule extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the conversion value rule.
     * Conversion value rule resource names have the form:
     * `customers/{customer_id}/conversionValueRules/{conversion_value_rule_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the conversion value rule.
     *
     * Generated from protobuf field <code>int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = 0;
    /**
     * Action applied when the rule is triggered.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleAction action = 3;</code>
     */
    protected $action = null;
    /**
     * Condition for Geo location that must be satisfied for the value rule to
     * apply.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleGeoLocationCondition geo_location_condition = 4;</code>
     */
    protected $geo_location_condition = null;
    /**
     * Condition for device type that must be satisfied for the value rule to
     * apply.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleDeviceCondition device_condition = 5;</code>
     */
    protected $device_condition = null;
    /**
     * Condition for audience that must be satisfied for the value rule to apply.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleAudienceCondition audience_condition = 6;</code>
     */
    protected $audience_condition = null;
    /**
     * Condition for itinerary that must be satisfied for the value rule to apply.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleItineraryCondition itinerary_condition = 9;</code>
     */
    protected $itinerary_condition = null;
    /**
     * Output only. The resource name of the conversion value rule's owner
     * customer. When the value rule is inherited from a manager customer,
     * owner_customer will be the resource name of the manager whereas the
     * customer in the resource_name will be of the requesting serving customer.
     * ** Read-only **
     *
     * Generated from protobuf field <code>string owner_customer = 7 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $owner_customer = '';
    /**
     * The status of the conversion value rule.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ConversionValueRuleStatusEnum.ConversionValueRuleStatus status = 8;</code>
     */
    protected $status = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the conversion value rule.
     *           Conversion value rule resource names have the form:
     *           `customers/{customer_id}/conversionValueRules/{conversion_value_rule_id}`
     *     @type int|string $id
     *           Output only. The ID of the conversion value rule.
     *     @type \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleAction $action
     *           Action applied when the rule is triggered.
     *     @type \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleGeoLocationCondition $geo_location_condition
     *           Condition for Geo location that must be satisfied for the value rule to
     *           apply.
     *     @type \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleDeviceCondition $device_condition
     *           Condition for device type that must be satisfied for the value rule to
     *           apply.
     *     @type \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleAudienceCondition $audience_condition
     *           Condition for audience that must be satisfied for the value rule to apply.
     *     @type \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleItineraryCondition $itinerary_condition
     *           Condition for itinerary that must be satisfied for the value rule to apply.
     *     @type string $owner_customer
     *           Output only. The resource name of the conversion value rule's owner
     *           customer. When the value rule is inherited from a manager customer,
     *           owner_customer will be the resource name of the manager whereas the
     *           customer in the resource_name will be of the requesting serving customer.
     *           ** Read-only **
     *     @type int $status
     *           The status of the conversion value rule.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\ConversionValueRule::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the conversion value rule.
     * Conversion value rule resource names have the form:
     * `customers/{customer_id}/conversionValueRules/{conversion_value_rule_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the conversion value rule.
     * Conversion value rule resource names have the form:
     * `customers/{customer_id}/conversionValueRules/{conversion_value_rule_id}`
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
     * Output only. The ID of the conversion value rule.
     *
     * Generated from protobuf field <code>int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Output only. The ID of the conversion value rule.
     *
     * Generated from protobuf field <code>int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt64($var);
        $this->id = $var;

        return $this;
    }

    /**
     * Action applied when the rule is triggered.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleAction action = 3;</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleAction|null
     */
    public function getAction()
    {
        return $this->action;
    }

    public function hasAction()
    {
        return isset($this->action);
    }

    public function clearAction()
    {
        unset($this->action);
    }

    /**
     * Action applied when the rule is triggered.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleAction action = 3;</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleAction $var
     * @return $this
     */
    public function setAction($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleAction::class);
        $this->action = $var;

        return $this;
    }

    /**
     * Condition for Geo location that must be satisfied for the value rule to
     * apply.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleGeoLocationCondition geo_location_condition = 4;</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleGeoLocationCondition|null
     */
    public function getGeoLocationCondition()
    {
        return $this->geo_location_condition;
    }

    public function hasGeoLocationCondition()
    {
        return isset($this->geo_location_condition);
    }

    public function clearGeoLocationCondition()
    {
        unset($this->geo_location_condition);
    }

    /**
     * Condition for Geo location that must be satisfied for the value rule to
     * apply.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleGeoLocationCondition geo_location_condition = 4;</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleGeoLocationCondition $var
     * @return $this
     */
    public function setGeoLocationCondition($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleGeoLocationCondition::class);
        $this->geo_location_condition = $var;

        return $this;
    }

    /**
     * Condition for device type that must be satisfied for the value rule to
     * apply.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleDeviceCondition device_condition = 5;</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleDeviceCondition|null
     */
    public function getDeviceCondition()
    {
        return $this->device_condition;
    }

    public function hasDeviceCondition()
    {
        return isset($this->device_condition);
    }

    public function clearDeviceCondition()
    {
        unset($this->device_condition);
    }

    /**
     * Condition for device type that must be satisfied for the value rule to
     * apply.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleDeviceCondition device_condition = 5;</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleDeviceCondition $var
     * @return $this
     */
    public function setDeviceCondition($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleDeviceCondition::class);
        $this->device_condition = $var;

        return $this;
    }

    /**
     * Condition for audience that must be satisfied for the value rule to apply.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleAudienceCondition audience_condition = 6;</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleAudienceCondition|null
     */
    public function getAudienceCondition()
    {
        return $this->audience_condition;
    }

    public function hasAudienceCondition()
    {
        return isset($this->audience_condition);
    }

    public function clearAudienceCondition()
    {
        unset($this->audience_condition);
    }

    /**
     * Condition for audience that must be satisfied for the value rule to apply.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleAudienceCondition audience_condition = 6;</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleAudienceCondition $var
     * @return $this
     */
    public function setAudienceCondition($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleAudienceCondition::class);
        $this->audience_condition = $var;

        return $this;
    }

    /**
     * Condition for itinerary that must be satisfied for the value rule to apply.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleItineraryCondition itinerary_condition = 9;</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleItineraryCondition|null
     */
    public function getItineraryCondition()
    {
        return $this->itinerary_condition;
    }

    public function hasItineraryCondition()
    {
        return isset($this->itinerary_condition);
    }

    public function clearItineraryCondition()
    {
        unset($this->itinerary_condition);
    }

    /**
     * Condition for itinerary that must be satisfied for the value rule to apply.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.ConversionValueRule.ValueRuleItineraryCondition itinerary_condition = 9;</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleItineraryCondition $var
     * @return $this
     */
    public function setItineraryCondition($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\ConversionValueRule\ValueRuleItineraryCondition::class);
        $this->itinerary_condition = $var;

        return $this;
    }

    /**
     * Output only. The resource name of the conversion value rule's owner
     * customer. When the value rule is inherited from a manager customer,
     * owner_customer will be the resource name of the manager whereas the
     * customer in the resource_name will be of the requesting serving customer.
     * ** Read-only **
     *
     * Generated from protobuf field <code>string owner_customer = 7 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getOwnerCustomer()
    {
        return $this->owner_customer;
    }

    /**
     * Output only. The resource name of the conversion value rule's owner
     * customer. When the value rule is inherited from a manager customer,
     * owner_customer will be the resource name of the manager whereas the
     * customer in the resource_name will be of the requesting serving customer.
     * ** Read-only **
     *
     * Generated from protobuf field <code>string owner_customer = 7 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setOwnerCustomer($var)
    {
        GPBUtil::checkString($var, True);
        $this->owner_customer = $var;

        return $this;
    }

    /**
     * The status of the conversion value rule.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ConversionValueRuleStatusEnum.ConversionValueRuleStatus status = 8;</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the conversion value rule.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ConversionValueRuleStatusEnum.ConversionValueRuleStatus status = 8;</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\ConversionValueRuleStatusEnum\ConversionValueRuleStatus::class);
        $this->status = $var;

        return $this;
    }

}

