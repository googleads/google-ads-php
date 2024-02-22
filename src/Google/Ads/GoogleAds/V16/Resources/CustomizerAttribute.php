<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/resources/customizer_attribute.proto

namespace Google\Ads\GoogleAds\V16\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A customizer attribute.
 * Use CustomerCustomizer, CampaignCustomizer, AdGroupCustomizer, or
 * AdGroupCriterionCustomizer to associate a customizer attribute and
 * set its value at the customer, campaign, ad group, or ad group criterion
 * level, respectively.
 *
 * Generated from protobuf message <code>google.ads.googleads.v16.resources.CustomizerAttribute</code>
 */
class CustomizerAttribute extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the customizer attribute.
     * Customizer Attribute resource names have the form:
     * `customers/{customer_id}/customizerAttributes/{customizer_attribute_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the customizer attribute.
     *
     * Generated from protobuf field <code>int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = 0;
    /**
     * Required. Immutable. Name of the customizer attribute. Required. It must
     * have a minimum length of 1 and maximum length of 40. Name of an enabled
     * customizer attribute must be unique (case insensitive).
     *
     * Generated from protobuf field <code>string name = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     */
    protected $name = '';
    /**
     * Immutable. The type of the customizer attribute.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v16.enums.CustomizerAttributeTypeEnum.CustomizerAttributeType type = 4 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    protected $type = 0;
    /**
     * Output only. The status of the customizer attribute.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v16.enums.CustomizerAttributeStatusEnum.CustomizerAttributeStatus status = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $status = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the customizer attribute.
     *           Customizer Attribute resource names have the form:
     *           `customers/{customer_id}/customizerAttributes/{customizer_attribute_id}`
     *     @type int|string $id
     *           Output only. The ID of the customizer attribute.
     *     @type string $name
     *           Required. Immutable. Name of the customizer attribute. Required. It must
     *           have a minimum length of 1 and maximum length of 40. Name of an enabled
     *           customizer attribute must be unique (case insensitive).
     *     @type int $type
     *           Immutable. The type of the customizer attribute.
     *     @type int $status
     *           Output only. The status of the customizer attribute.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V16\Resources\CustomizerAttribute::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the customizer attribute.
     * Customizer Attribute resource names have the form:
     * `customers/{customer_id}/customizerAttributes/{customizer_attribute_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the customizer attribute.
     * Customizer Attribute resource names have the form:
     * `customers/{customer_id}/customizerAttributes/{customizer_attribute_id}`
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
     * Output only. The ID of the customizer attribute.
     *
     * Generated from protobuf field <code>int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Output only. The ID of the customizer attribute.
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
     * Required. Immutable. Name of the customizer attribute. Required. It must
     * have a minimum length of 1 and maximum length of 40. Name of an enabled
     * customizer attribute must be unique (case insensitive).
     *
     * Generated from protobuf field <code>string name = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. Immutable. Name of the customizer attribute. Required. It must
     * have a minimum length of 1 and maximum length of 40. Name of an enabled
     * customizer attribute must be unique (case insensitive).
     *
     * Generated from protobuf field <code>string name = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Immutable. The type of the customizer attribute.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v16.enums.CustomizerAttributeTypeEnum.CustomizerAttributeType type = 4 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Immutable. The type of the customizer attribute.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v16.enums.CustomizerAttributeTypeEnum.CustomizerAttributeType type = 4 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V16\Enums\CustomizerAttributeTypeEnum\CustomizerAttributeType::class);
        $this->type = $var;

        return $this;
    }

    /**
     * Output only. The status of the customizer attribute.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v16.enums.CustomizerAttributeStatusEnum.CustomizerAttributeStatus status = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Output only. The status of the customizer attribute.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v16.enums.CustomizerAttributeStatusEnum.CustomizerAttributeStatus status = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V16\Enums\CustomizerAttributeStatusEnum\CustomizerAttributeStatus::class);
        $this->status = $var;

        return $this;
    }

}

