<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/asset_group_listing_group_filter.proto

namespace Google\Ads\GoogleAds\V20\Resources\ListingGroupFilterDimension;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Custom attribute of a product offer.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.ListingGroupFilterDimension.ProductCustomAttribute</code>
 */
class ProductCustomAttribute extends \Google\Protobuf\Internal\Message
{
    /**
     * String value of the product custom attribute.
     *
     * Generated from protobuf field <code>optional string value = 1;</code>
     */
    protected $value = null;
    /**
     * Indicates the index of the custom attribute.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ListingGroupFilterCustomAttributeIndexEnum.ListingGroupFilterCustomAttributeIndex index = 2;</code>
     */
    protected $index = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $value
     *           String value of the product custom attribute.
     *     @type int $index
     *           Indicates the index of the custom attribute.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\AssetGroupListingGroupFilter::initOnce();
        parent::__construct($data);
    }

    /**
     * String value of the product custom attribute.
     *
     * Generated from protobuf field <code>optional string value = 1;</code>
     * @return string
     */
    public function getValue()
    {
        return isset($this->value) ? $this->value : '';
    }

    public function hasValue()
    {
        return isset($this->value);
    }

    public function clearValue()
    {
        unset($this->value);
    }

    /**
     * String value of the product custom attribute.
     *
     * Generated from protobuf field <code>optional string value = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkString($var, True);
        $this->value = $var;

        return $this;
    }

    /**
     * Indicates the index of the custom attribute.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ListingGroupFilterCustomAttributeIndexEnum.ListingGroupFilterCustomAttributeIndex index = 2;</code>
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Indicates the index of the custom attribute.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.enums.ListingGroupFilterCustomAttributeIndexEnum.ListingGroupFilterCustomAttributeIndex index = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setIndex($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V20\Enums\ListingGroupFilterCustomAttributeIndexEnum\ListingGroupFilterCustomAttributeIndex::class);
        $this->index = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductCustomAttribute::class, \Google\Ads\GoogleAds\V20\Resources\ListingGroupFilterDimension_ProductCustomAttribute::class);

