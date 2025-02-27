<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/services/conversion_upload_service.proto

namespace Google\Ads\GoogleAds\V19\Services\CartData;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Contains data of the items purchased.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.services.CartData.Item</code>
 */
class Item extends \Google\Protobuf\Internal\Message
{
    /**
     * The shopping id of the item. Must be equal to the Merchant Center product
     * identifier.
     *
     * Generated from protobuf field <code>string product_id = 1;</code>
     */
    protected $product_id = '';
    /**
     * Number of items sold.
     *
     * Generated from protobuf field <code>int32 quantity = 2;</code>
     */
    protected $quantity = 0;
    /**
     * Unit price excluding tax, shipping, and any transaction
     * level discounts. The currency code is the same as that in the
     * ClickConversion message.
     *
     * Generated from protobuf field <code>double unit_price = 3;</code>
     */
    protected $unit_price = 0.0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $product_id
     *           The shopping id of the item. Must be equal to the Merchant Center product
     *           identifier.
     *     @type int $quantity
     *           Number of items sold.
     *     @type float $unit_price
     *           Unit price excluding tax, shipping, and any transaction
     *           level discounts. The currency code is the same as that in the
     *           ClickConversion message.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Services\ConversionUploadService::initOnce();
        parent::__construct($data);
    }

    /**
     * The shopping id of the item. Must be equal to the Merchant Center product
     * identifier.
     *
     * Generated from protobuf field <code>string product_id = 1;</code>
     * @return string
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * The shopping id of the item. Must be equal to the Merchant Center product
     * identifier.
     *
     * Generated from protobuf field <code>string product_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setProductId($var)
    {
        GPBUtil::checkString($var, True);
        $this->product_id = $var;

        return $this;
    }

    /**
     * Number of items sold.
     *
     * Generated from protobuf field <code>int32 quantity = 2;</code>
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Number of items sold.
     *
     * Generated from protobuf field <code>int32 quantity = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setQuantity($var)
    {
        GPBUtil::checkInt32($var);
        $this->quantity = $var;

        return $this;
    }

    /**
     * Unit price excluding tax, shipping, and any transaction
     * level discounts. The currency code is the same as that in the
     * ClickConversion message.
     *
     * Generated from protobuf field <code>double unit_price = 3;</code>
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    /**
     * Unit price excluding tax, shipping, and any transaction
     * level discounts. The currency code is the same as that in the
     * ClickConversion message.
     *
     * Generated from protobuf field <code>double unit_price = 3;</code>
     * @param float $var
     * @return $this
     */
    public function setUnitPrice($var)
    {
        GPBUtil::checkDouble($var);
        $this->unit_price = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Item::class, \Google\Ads\GoogleAds\V19\Services\CartData_Item::class);

