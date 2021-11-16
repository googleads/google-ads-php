<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/resources/product_bidding_category_constant.proto

namespace Google\Ads\GoogleAds\V9\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Product Bidding Category.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.resources.ProductBiddingCategoryConstant</code>
 */
class ProductBiddingCategoryConstant extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the product bidding category.
     * Product bidding category resource names have the form:
     * `productBiddingCategoryConstants/{country_code}~{level}~{id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. ID of the product bidding category.
     * This ID is equivalent to the google_product_category ID as described in
     * this article: https://support.google.com/merchants/answer/6324436.
     *
     * Generated from protobuf field <code>optional int64 id = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = null;
    /**
     * Output only. Two-letter upper-case country code of the product bidding category.
     *
     * Generated from protobuf field <code>optional string country_code = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $country_code = null;
    /**
     * Output only. Resource name of the parent product bidding category.
     *
     * Generated from protobuf field <code>optional string product_bidding_category_constant_parent = 12 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $product_bidding_category_constant_parent = null;
    /**
     * Output only. Level of the product bidding category.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.ProductBiddingCategoryLevelEnum.ProductBiddingCategoryLevel level = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $level = 0;
    /**
     * Output only. Status of the product bidding category.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.ProductBiddingCategoryStatusEnum.ProductBiddingCategoryStatus status = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $status = 0;
    /**
     * Output only. Language code of the product bidding category.
     *
     * Generated from protobuf field <code>optional string language_code = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $language_code = null;
    /**
     * Output only. Display value of the product bidding category localized according to
     * language_code.
     *
     * Generated from protobuf field <code>optional string localized_name = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $localized_name = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the product bidding category.
     *           Product bidding category resource names have the form:
     *           `productBiddingCategoryConstants/{country_code}~{level}~{id}`
     *     @type int|string $id
     *           Output only. ID of the product bidding category.
     *           This ID is equivalent to the google_product_category ID as described in
     *           this article: https://support.google.com/merchants/answer/6324436.
     *     @type string $country_code
     *           Output only. Two-letter upper-case country code of the product bidding category.
     *     @type string $product_bidding_category_constant_parent
     *           Output only. Resource name of the parent product bidding category.
     *     @type int $level
     *           Output only. Level of the product bidding category.
     *     @type int $status
     *           Output only. Status of the product bidding category.
     *     @type string $language_code
     *           Output only. Language code of the product bidding category.
     *     @type string $localized_name
     *           Output only. Display value of the product bidding category localized according to
     *           language_code.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Resources\ProductBiddingCategoryConstant::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the product bidding category.
     * Product bidding category resource names have the form:
     * `productBiddingCategoryConstants/{country_code}~{level}~{id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the product bidding category.
     * Product bidding category resource names have the form:
     * `productBiddingCategoryConstants/{country_code}~{level}~{id}`
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
     * Output only. ID of the product bidding category.
     * This ID is equivalent to the google_product_category ID as described in
     * this article: https://support.google.com/merchants/answer/6324436.
     *
     * Generated from protobuf field <code>optional int64 id = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. ID of the product bidding category.
     * This ID is equivalent to the google_product_category ID as described in
     * this article: https://support.google.com/merchants/answer/6324436.
     *
     * Generated from protobuf field <code>optional int64 id = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. Two-letter upper-case country code of the product bidding category.
     *
     * Generated from protobuf field <code>optional string country_code = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getCountryCode()
    {
        return isset($this->country_code) ? $this->country_code : '';
    }

    public function hasCountryCode()
    {
        return isset($this->country_code);
    }

    public function clearCountryCode()
    {
        unset($this->country_code);
    }

    /**
     * Output only. Two-letter upper-case country code of the product bidding category.
     *
     * Generated from protobuf field <code>optional string country_code = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setCountryCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->country_code = $var;

        return $this;
    }

    /**
     * Output only. Resource name of the parent product bidding category.
     *
     * Generated from protobuf field <code>optional string product_bidding_category_constant_parent = 12 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getProductBiddingCategoryConstantParent()
    {
        return isset($this->product_bidding_category_constant_parent) ? $this->product_bidding_category_constant_parent : '';
    }

    public function hasProductBiddingCategoryConstantParent()
    {
        return isset($this->product_bidding_category_constant_parent);
    }

    public function clearProductBiddingCategoryConstantParent()
    {
        unset($this->product_bidding_category_constant_parent);
    }

    /**
     * Output only. Resource name of the parent product bidding category.
     *
     * Generated from protobuf field <code>optional string product_bidding_category_constant_parent = 12 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setProductBiddingCategoryConstantParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->product_bidding_category_constant_parent = $var;

        return $this;
    }

    /**
     * Output only. Level of the product bidding category.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.ProductBiddingCategoryLevelEnum.ProductBiddingCategoryLevel level = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Output only. Level of the product bidding category.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.ProductBiddingCategoryLevelEnum.ProductBiddingCategoryLevel level = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setLevel($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\ProductBiddingCategoryLevelEnum\ProductBiddingCategoryLevel::class);
        $this->level = $var;

        return $this;
    }

    /**
     * Output only. Status of the product bidding category.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.ProductBiddingCategoryStatusEnum.ProductBiddingCategoryStatus status = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Output only. Status of the product bidding category.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.ProductBiddingCategoryStatusEnum.ProductBiddingCategoryStatus status = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\ProductBiddingCategoryStatusEnum\ProductBiddingCategoryStatus::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Output only. Language code of the product bidding category.
     *
     * Generated from protobuf field <code>optional string language_code = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getLanguageCode()
    {
        return isset($this->language_code) ? $this->language_code : '';
    }

    public function hasLanguageCode()
    {
        return isset($this->language_code);
    }

    public function clearLanguageCode()
    {
        unset($this->language_code);
    }

    /**
     * Output only. Language code of the product bidding category.
     *
     * Generated from protobuf field <code>optional string language_code = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setLanguageCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->language_code = $var;

        return $this;
    }

    /**
     * Output only. Display value of the product bidding category localized according to
     * language_code.
     *
     * Generated from protobuf field <code>optional string localized_name = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getLocalizedName()
    {
        return isset($this->localized_name) ? $this->localized_name : '';
    }

    public function hasLocalizedName()
    {
        return isset($this->localized_name);
    }

    public function clearLocalizedName()
    {
        unset($this->localized_name);
    }

    /**
     * Output only. Display value of the product bidding category localized according to
     * language_code.
     *
     * Generated from protobuf field <code>optional string localized_name = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setLocalizedName($var)
    {
        GPBUtil::checkString($var, True);
        $this->localized_name = $var;

        return $this;
    }

}

