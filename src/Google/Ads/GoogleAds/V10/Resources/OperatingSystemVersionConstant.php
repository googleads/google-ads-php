<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/resources/operating_system_version_constant.proto

namespace Google\Ads\GoogleAds\V10\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A mobile operating system version or a range of versions, depending on
 * `operator_type`. List of available mobile platforms at
 * https://developers.google.com/google-ads/api/reference/data/codes-formats#mobile-platforms
 *
 * Generated from protobuf message <code>google.ads.googleads.v10.resources.OperatingSystemVersionConstant</code>
 */
class OperatingSystemVersionConstant extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the operating system version constant.
     * Operating system version constant resource names have the form:
     * `operatingSystemVersionConstants/{criterion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the operating system version.
     *
     * Generated from protobuf field <code>optional int64 id = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = null;
    /**
     * Output only. Name of the operating system.
     *
     * Generated from protobuf field <code>optional string name = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $name = null;
    /**
     * Output only. The OS Major Version number.
     *
     * Generated from protobuf field <code>optional int32 os_major_version = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $os_major_version = null;
    /**
     * Output only. The OS Minor Version number.
     *
     * Generated from protobuf field <code>optional int32 os_minor_version = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $os_minor_version = null;
    /**
     * Output only. Determines whether this constant represents a single version or a range of
     * versions.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v10.enums.OperatingSystemVersionOperatorTypeEnum.OperatingSystemVersionOperatorType operator_type = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $operator_type = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the operating system version constant.
     *           Operating system version constant resource names have the form:
     *           `operatingSystemVersionConstants/{criterion_id}`
     *     @type int|string $id
     *           Output only. The ID of the operating system version.
     *     @type string $name
     *           Output only. Name of the operating system.
     *     @type int $os_major_version
     *           Output only. The OS Major Version number.
     *     @type int $os_minor_version
     *           Output only. The OS Minor Version number.
     *     @type int $operator_type
     *           Output only. Determines whether this constant represents a single version or a range of
     *           versions.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V10\Resources\OperatingSystemVersionConstant::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the operating system version constant.
     * Operating system version constant resource names have the form:
     * `operatingSystemVersionConstants/{criterion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the operating system version constant.
     * Operating system version constant resource names have the form:
     * `operatingSystemVersionConstants/{criterion_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
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
     * Output only. The ID of the operating system version.
     *
     * Generated from protobuf field <code>optional int64 id = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The ID of the operating system version.
     *
     * Generated from protobuf field <code>optional int64 id = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. Name of the operating system.
     *
     * Generated from protobuf field <code>optional string name = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. Name of the operating system.
     *
     * Generated from protobuf field <code>optional string name = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The OS Major Version number.
     *
     * Generated from protobuf field <code>optional int32 os_major_version = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getOsMajorVersion()
    {
        return isset($this->os_major_version) ? $this->os_major_version : 0;
    }

    public function hasOsMajorVersion()
    {
        return isset($this->os_major_version);
    }

    public function clearOsMajorVersion()
    {
        unset($this->os_major_version);
    }

    /**
     * Output only. The OS Major Version number.
     *
     * Generated from protobuf field <code>optional int32 os_major_version = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setOsMajorVersion($var)
    {
        GPBUtil::checkInt32($var);
        $this->os_major_version = $var;

        return $this;
    }

    /**
     * Output only. The OS Minor Version number.
     *
     * Generated from protobuf field <code>optional int32 os_minor_version = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getOsMinorVersion()
    {
        return isset($this->os_minor_version) ? $this->os_minor_version : 0;
    }

    public function hasOsMinorVersion()
    {
        return isset($this->os_minor_version);
    }

    public function clearOsMinorVersion()
    {
        unset($this->os_minor_version);
    }

    /**
     * Output only. The OS Minor Version number.
     *
     * Generated from protobuf field <code>optional int32 os_minor_version = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setOsMinorVersion($var)
    {
        GPBUtil::checkInt32($var);
        $this->os_minor_version = $var;

        return $this;
    }

    /**
     * Output only. Determines whether this constant represents a single version or a range of
     * versions.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v10.enums.OperatingSystemVersionOperatorTypeEnum.OperatingSystemVersionOperatorType operator_type = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getOperatorType()
    {
        return $this->operator_type;
    }

    /**
     * Output only. Determines whether this constant represents a single version or a range of
     * versions.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v10.enums.OperatingSystemVersionOperatorTypeEnum.OperatingSystemVersionOperatorType operator_type = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setOperatorType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V10\Enums\OperatingSystemVersionOperatorTypeEnum\OperatingSystemVersionOperatorType::class);
        $this->operator_type = $var;

        return $this;
    }

}

