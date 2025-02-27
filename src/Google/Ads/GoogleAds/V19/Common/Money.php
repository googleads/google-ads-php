<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/common/feed_common.proto

namespace Google\Ads\GoogleAds\V19\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a price in a particular currency.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.common.Money</code>
 */
class Money extends \Google\Protobuf\Internal\Message
{
    /**
     * Three-character ISO 4217 currency code.
     *
     * Generated from protobuf field <code>optional string currency_code = 3;</code>
     */
    protected $currency_code = null;
    /**
     * Amount in micros. One million is equivalent to one unit.
     *
     * Generated from protobuf field <code>optional int64 amount_micros = 4;</code>
     */
    protected $amount_micros = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $currency_code
     *           Three-character ISO 4217 currency code.
     *     @type int|string $amount_micros
     *           Amount in micros. One million is equivalent to one unit.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Common\FeedCommon::initOnce();
        parent::__construct($data);
    }

    /**
     * Three-character ISO 4217 currency code.
     *
     * Generated from protobuf field <code>optional string currency_code = 3;</code>
     * @return string
     */
    public function getCurrencyCode()
    {
        return isset($this->currency_code) ? $this->currency_code : '';
    }

    public function hasCurrencyCode()
    {
        return isset($this->currency_code);
    }

    public function clearCurrencyCode()
    {
        unset($this->currency_code);
    }

    /**
     * Three-character ISO 4217 currency code.
     *
     * Generated from protobuf field <code>optional string currency_code = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setCurrencyCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->currency_code = $var;

        return $this;
    }

    /**
     * Amount in micros. One million is equivalent to one unit.
     *
     * Generated from protobuf field <code>optional int64 amount_micros = 4;</code>
     * @return int|string
     */
    public function getAmountMicros()
    {
        return isset($this->amount_micros) ? $this->amount_micros : 0;
    }

    public function hasAmountMicros()
    {
        return isset($this->amount_micros);
    }

    public function clearAmountMicros()
    {
        unset($this->amount_micros);
    }

    /**
     * Amount in micros. One million is equivalent to one unit.
     *
     * Generated from protobuf field <code>optional int64 amount_micros = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setAmountMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->amount_micros = $var;

        return $this;
    }

}

