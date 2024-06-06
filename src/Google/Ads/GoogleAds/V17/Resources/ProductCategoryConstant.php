<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v17/resources/product_category_constant.proto

namespace Google\Ads\GoogleAds\V17\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Product Category.
 *
 * Generated from protobuf message <code>google.ads.googleads.v17.resources.ProductCategoryConstant</code>
 */
class ProductCategoryConstant extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the product category.
     * Product category resource names have the form:
     * `productCategoryConstants/{level}~{category_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the product category.
     * This ID is equivalent to the google_product_category ID as described in
     * this article: https://support.google.com/merchants/answer/6324436.
     *
     * Generated from protobuf field <code>int64 category_id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $category_id = 0;
    /**
     * Output only. Resource name of the parent product category.
     *
     * Generated from protobuf field <code>optional string product_category_constant_parent = 3 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $product_category_constant_parent = null;
    /**
     * Output only. Level of the product category.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v17.enums.ProductCategoryLevelEnum.ProductCategoryLevel level = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $level = 0;
    /**
     * Output only. State of the product category.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v17.enums.ProductCategoryStateEnum.ProductCategoryState state = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $state = 0;
    /**
     * Output only. List of all available localizations of the product category.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v17.resources.ProductCategoryConstant.ProductCategoryLocalization localizations = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $localizations;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the product category.
     *           Product category resource names have the form:
     *           `productCategoryConstants/{level}~{category_id}`
     *     @type int|string $category_id
     *           Output only. The ID of the product category.
     *           This ID is equivalent to the google_product_category ID as described in
     *           this article: https://support.google.com/merchants/answer/6324436.
     *     @type string $product_category_constant_parent
     *           Output only. Resource name of the parent product category.
     *     @type int $level
     *           Output only. Level of the product category.
     *     @type int $state
     *           Output only. State of the product category.
     *     @type array<\Google\Ads\GoogleAds\V17\Resources\ProductCategoryConstant\ProductCategoryLocalization>|\Google\Protobuf\Internal\RepeatedField $localizations
     *           Output only. List of all available localizations of the product category.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V17\Resources\ProductCategoryConstant::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the product category.
     * Product category resource names have the form:
     * `productCategoryConstants/{level}~{category_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the product category.
     * Product category resource names have the form:
     * `productCategoryConstants/{level}~{category_id}`
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
     * Output only. The ID of the product category.
     * This ID is equivalent to the google_product_category ID as described in
     * this article: https://support.google.com/merchants/answer/6324436.
     *
     * Generated from protobuf field <code>int64 category_id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Output only. The ID of the product category.
     * This ID is equivalent to the google_product_category ID as described in
     * this article: https://support.google.com/merchants/answer/6324436.
     *
     * Generated from protobuf field <code>int64 category_id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setCategoryId($var)
    {
        GPBUtil::checkInt64($var);
        $this->category_id = $var;

        return $this;
    }

    /**
     * Output only. Resource name of the parent product category.
     *
     * Generated from protobuf field <code>optional string product_category_constant_parent = 3 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getProductCategoryConstantParent()
    {
        return isset($this->product_category_constant_parent) ? $this->product_category_constant_parent : '';
    }

    public function hasProductCategoryConstantParent()
    {
        return isset($this->product_category_constant_parent);
    }

    public function clearProductCategoryConstantParent()
    {
        unset($this->product_category_constant_parent);
    }

    /**
     * Output only. Resource name of the parent product category.
     *
     * Generated from protobuf field <code>optional string product_category_constant_parent = 3 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setProductCategoryConstantParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->product_category_constant_parent = $var;

        return $this;
    }

    /**
     * Output only. Level of the product category.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v17.enums.ProductCategoryLevelEnum.ProductCategoryLevel level = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Output only. Level of the product category.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v17.enums.ProductCategoryLevelEnum.ProductCategoryLevel level = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setLevel($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V17\Enums\ProductCategoryLevelEnum\ProductCategoryLevel::class);
        $this->level = $var;

        return $this;
    }

    /**
     * Output only. State of the product category.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v17.enums.ProductCategoryStateEnum.ProductCategoryState state = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. State of the product category.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v17.enums.ProductCategoryStateEnum.ProductCategoryState state = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V17\Enums\ProductCategoryStateEnum\ProductCategoryState::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Output only. List of all available localizations of the product category.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v17.resources.ProductCategoryConstant.ProductCategoryLocalization localizations = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLocalizations()
    {
        return $this->localizations;
    }

    /**
     * Output only. List of all available localizations of the product category.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v17.resources.ProductCategoryConstant.ProductCategoryLocalization localizations = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<\Google\Ads\GoogleAds\V17\Resources\ProductCategoryConstant\ProductCategoryLocalization>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLocalizations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V17\Resources\ProductCategoryConstant\ProductCategoryLocalization::class);
        $this->localizations = $arr;

        return $this;
    }

}

