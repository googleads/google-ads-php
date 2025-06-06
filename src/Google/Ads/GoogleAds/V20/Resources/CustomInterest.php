<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/custom_interest.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A custom interest. This is a list of users by interest.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.CustomInterest</code>
 */
class CustomInterest extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the custom interest.
     * Custom interest resource names have the form:
     * `customers/{customer_id}/customInterests/{custom_interest_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. Id of the custom interest.
     *
     * Generated from protobuf field <code>optional int64 id = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = null;
    /**
     * Status of this custom interest. Indicates whether the custom interest is
     * enabled or removed.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CustomInterestStatusEnum.CustomInterestStatus status = 3;</code>
     */
    protected $status = 0;
    /**
     * Name of the custom interest. It should be unique across the same custom
     * affinity audience.
     * This field is required for create operations.
     *
     * Generated from protobuf field <code>optional string name = 9;</code>
     */
    protected $name = null;
    /**
     * Type of the custom interest, CUSTOM_AFFINITY or CUSTOM_INTENT.
     * By default the type is set to CUSTOM_AFFINITY.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CustomInterestTypeEnum.CustomInterestType type = 5;</code>
     */
    protected $type = 0;
    /**
     * Description of this custom interest audience.
     *
     * Generated from protobuf field <code>optional string description = 10;</code>
     */
    protected $description = null;
    /**
     * List of custom interest members that this custom interest is composed of.
     * Members can be added during CustomInterest creation. If members are
     * presented in UPDATE operation, existing members will be overridden.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.resources.CustomInterestMember members = 7;</code>
     */
    private $members;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the custom interest.
     *           Custom interest resource names have the form:
     *           `customers/{customer_id}/customInterests/{custom_interest_id}`
     *     @type int|string $id
     *           Output only. Id of the custom interest.
     *     @type int $status
     *           Status of this custom interest. Indicates whether the custom interest is
     *           enabled or removed.
     *     @type string $name
     *           Name of the custom interest. It should be unique across the same custom
     *           affinity audience.
     *           This field is required for create operations.
     *     @type int $type
     *           Type of the custom interest, CUSTOM_AFFINITY or CUSTOM_INTENT.
     *           By default the type is set to CUSTOM_AFFINITY.
     *     @type string $description
     *           Description of this custom interest audience.
     *     @type array<\Google\Ads\GoogleAds\V20\Resources\CustomInterestMember>|\Google\Protobuf\Internal\RepeatedField $members
     *           List of custom interest members that this custom interest is composed of.
     *           Members can be added during CustomInterest creation. If members are
     *           presented in UPDATE operation, existing members will be overridden.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\CustomInterest::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the custom interest.
     * Custom interest resource names have the form:
     * `customers/{customer_id}/customInterests/{custom_interest_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the custom interest.
     * Custom interest resource names have the form:
     * `customers/{customer_id}/customInterests/{custom_interest_id}`
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
     * Output only. Id of the custom interest.
     *
     * Generated from protobuf field <code>optional int64 id = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getId()
    {
        return isset($this->id) ? $this->id : 0;
    }

    public function hasId()
    {
        return isset($this->id);
    }

    public function clearId()
    {
        unset($this->id);
    }

    /**
     * Output only. Id of the custom interest.
     *
     * Generated from protobuf field <code>optional int64 id = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Status of this custom interest. Indicates whether the custom interest is
     * enabled or removed.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CustomInterestStatusEnum.CustomInterestStatus status = 3;</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Status of this custom interest. Indicates whether the custom interest is
     * enabled or removed.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CustomInterestStatusEnum.CustomInterestStatus status = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\CustomInterestStatusEnum\CustomInterestStatus::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Name of the custom interest. It should be unique across the same custom
     * affinity audience.
     * This field is required for create operations.
     *
     * Generated from protobuf field <code>optional string name = 9;</code>
     * @return string
     */
    public function getName()
    {
        return isset($this->name) ? $this->name : '';
    }

    public function hasName()
    {
        return isset($this->name);
    }

    public function clearName()
    {
        unset($this->name);
    }

    /**
     * Name of the custom interest. It should be unique across the same custom
     * affinity audience.
     * This field is required for create operations.
     *
     * Generated from protobuf field <code>optional string name = 9;</code>
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
     * Type of the custom interest, CUSTOM_AFFINITY or CUSTOM_INTENT.
     * By default the type is set to CUSTOM_AFFINITY.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CustomInterestTypeEnum.CustomInterestType type = 5;</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Type of the custom interest, CUSTOM_AFFINITY or CUSTOM_INTENT.
     * By default the type is set to CUSTOM_AFFINITY.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.CustomInterestTypeEnum.CustomInterestType type = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\CustomInterestTypeEnum\CustomInterestType::class);
        $this->type = $var;

        return $this;
    }

    /**
     * Description of this custom interest audience.
     *
     * Generated from protobuf field <code>optional string description = 10;</code>
     * @return string
     */
    public function getDescription()
    {
        return isset($this->description) ? $this->description : '';
    }

    public function hasDescription()
    {
        return isset($this->description);
    }

    public function clearDescription()
    {
        unset($this->description);
    }

    /**
     * Description of this custom interest audience.
     *
     * Generated from protobuf field <code>optional string description = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * List of custom interest members that this custom interest is composed of.
     * Members can be added during CustomInterest creation. If members are
     * presented in UPDATE operation, existing members will be overridden.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.resources.CustomInterestMember members = 7;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * List of custom interest members that this custom interest is composed of.
     * Members can be added during CustomInterest creation. If members are
     * presented in UPDATE operation, existing members will be overridden.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.resources.CustomInterestMember members = 7;</code>
     * @param array<\Google\Ads\GoogleAds\V20\Resources\CustomInterestMember>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setMembers($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Resources\CustomInterestMember::class);
        $this->members = $arr;

        return $this;
    }

}

