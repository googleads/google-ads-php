<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/shopping_product.proto

namespace Google\Ads\GoogleAds\V20\Resources\ShoppingProduct;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An issue affecting whether a product can show in ads.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.ShoppingProduct.ProductIssue</code>
 */
class ProductIssue extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The error code that identifies the issue.
     *
     * Generated from protobuf field <code>string error_code = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $error_code = '';
    /**
     * Output only. The severity of the issue in Google Ads.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ProductIssueSeverityEnum.ProductIssueSeverity ads_severity = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $ads_severity = 0;
    /**
     * Output only. The name of the product's attribute, if any, that triggered
     * the issue.
     *
     * Generated from protobuf field <code>optional string attribute_name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $attribute_name = null;
    /**
     * Output only. The short description of the issue in English.
     *
     * Generated from protobuf field <code>string description = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $description = '';
    /**
     * Output only. The detailed description of the issue in English.
     *
     * Generated from protobuf field <code>string detail = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $detail = '';
    /**
     * Output only. The URL of the Help Center article for the issue.
     *
     * Generated from protobuf field <code>string documentation = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $documentation = '';
    /**
     * Output only. List of upper-case two-letter ISO 3166-1 codes of the
     * regions affected by the issue. If empty, all regions are affected.
     *
     * Generated from protobuf field <code>repeated string affected_regions = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $affected_regions;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $error_code
     *           Output only. The error code that identifies the issue.
     *     @type int $ads_severity
     *           Output only. The severity of the issue in Google Ads.
     *     @type string $attribute_name
     *           Output only. The name of the product's attribute, if any, that triggered
     *           the issue.
     *     @type string $description
     *           Output only. The short description of the issue in English.
     *     @type string $detail
     *           Output only. The detailed description of the issue in English.
     *     @type string $documentation
     *           Output only. The URL of the Help Center article for the issue.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $affected_regions
     *           Output only. List of upper-case two-letter ISO 3166-1 codes of the
     *           regions affected by the issue. If empty, all regions are affected.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\ShoppingProduct::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The error code that identifies the issue.
     *
     * Generated from protobuf field <code>string error_code = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getErrorCode()
    {
        return $this->error_code;
    }

    /**
     * Output only. The error code that identifies the issue.
     *
     * Generated from protobuf field <code>string error_code = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setErrorCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->error_code = $var;

        return $this;
    }

    /**
     * Output only. The severity of the issue in Google Ads.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ProductIssueSeverityEnum.ProductIssueSeverity ads_severity = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getAdsSeverity()
    {
        return $this->ads_severity;
    }

    /**
     * Output only. The severity of the issue in Google Ads.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ProductIssueSeverityEnum.ProductIssueSeverity ads_severity = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setAdsSeverity($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\ProductIssueSeverityEnum\ProductIssueSeverity::class);
        $this->ads_severity = $var;

        return $this;
    }

    /**
     * Output only. The name of the product's attribute, if any, that triggered
     * the issue.
     *
     * Generated from protobuf field <code>optional string attribute_name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getAttributeName()
    {
        return isset($this->attribute_name) ? $this->attribute_name : '';
    }

    public function hasAttributeName()
    {
        return isset($this->attribute_name);
    }

    public function clearAttributeName()
    {
        unset($this->attribute_name);
    }

    /**
     * Output only. The name of the product's attribute, if any, that triggered
     * the issue.
     *
     * Generated from protobuf field <code>optional string attribute_name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setAttributeName($var)
    {
        GPBUtil::checkString($var, True);
        $this->attribute_name = $var;

        return $this;
    }

    /**
     * Output only. The short description of the issue in English.
     *
     * Generated from protobuf field <code>string description = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Output only. The short description of the issue in English.
     *
     * Generated from protobuf field <code>string description = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The detailed description of the issue in English.
     *
     * Generated from protobuf field <code>string detail = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Output only. The detailed description of the issue in English.
     *
     * Generated from protobuf field <code>string detail = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setDetail($var)
    {
        GPBUtil::checkString($var, True);
        $this->detail = $var;

        return $this;
    }

    /**
     * Output only. The URL of the Help Center article for the issue.
     *
     * Generated from protobuf field <code>string documentation = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getDocumentation()
    {
        return $this->documentation;
    }

    /**
     * Output only. The URL of the Help Center article for the issue.
     *
     * Generated from protobuf field <code>string documentation = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setDocumentation($var)
    {
        GPBUtil::checkString($var, True);
        $this->documentation = $var;

        return $this;
    }

    /**
     * Output only. List of upper-case two-letter ISO 3166-1 codes of the
     * regions affected by the issue. If empty, all regions are affected.
     *
     * Generated from protobuf field <code>repeated string affected_regions = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAffectedRegions()
    {
        return $this->affected_regions;
    }

    /**
     * Output only. List of upper-case two-letter ISO 3166-1 codes of the
     * regions affected by the issue. If empty, all regions are affected.
     *
     * Generated from protobuf field <code>repeated string affected_regions = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAffectedRegions($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->affected_regions = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductIssue::class, \Google\Ads\GoogleAds\V20\Resources\ShoppingProduct_ProductIssue::class);

