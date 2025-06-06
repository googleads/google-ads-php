<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/resources/payments_account.proto

namespace Google\Ads\GoogleAds\V20\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A payments account, which can be used to set up billing for an Ads customer.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.resources.PaymentsAccount</code>
 */
class PaymentsAccount extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the payments account.
     * PaymentsAccount resource names have the form:
     * `customers/{customer_id}/paymentsAccounts/{payments_account_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. A 16 digit ID used to identify a payments account.
     *
     * Generated from protobuf field <code>optional string payments_account_id = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $payments_account_id = null;
    /**
     * Output only. The name of the payments account.
     *
     * Generated from protobuf field <code>optional string name = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $name = null;
    /**
     * Output only. The currency code of the payments account.
     * A subset of the currency codes derived from the ISO 4217 standard is
     * supported.
     *
     * Generated from protobuf field <code>optional string currency_code = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $currency_code = null;
    /**
     * Output only. A 12 digit ID used to identify the payments profile associated
     * with the payments account.
     *
     * Generated from protobuf field <code>optional string payments_profile_id = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $payments_profile_id = null;
    /**
     * Output only. A secondary payments profile ID present in uncommon
     * situations, for example, when a sequential liability agreement has been
     * arranged.
     *
     * Generated from protobuf field <code>optional string secondary_payments_profile_id = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $secondary_payments_profile_id = null;
    /**
     * Output only. Paying manager of this payment account.
     *
     * Generated from protobuf field <code>optional string paying_manager_customer = 13 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $paying_manager_customer = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the payments account.
     *           PaymentsAccount resource names have the form:
     *           `customers/{customer_id}/paymentsAccounts/{payments_account_id}`
     *     @type string $payments_account_id
     *           Output only. A 16 digit ID used to identify a payments account.
     *     @type string $name
     *           Output only. The name of the payments account.
     *     @type string $currency_code
     *           Output only. The currency code of the payments account.
     *           A subset of the currency codes derived from the ISO 4217 standard is
     *           supported.
     *     @type string $payments_profile_id
     *           Output only. A 12 digit ID used to identify the payments profile associated
     *           with the payments account.
     *     @type string $secondary_payments_profile_id
     *           Output only. A secondary payments profile ID present in uncommon
     *           situations, for example, when a sequential liability agreement has been
     *           arranged.
     *     @type string $paying_manager_customer
     *           Output only. Paying manager of this payment account.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Resources\PaymentsAccount::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the payments account.
     * PaymentsAccount resource names have the form:
     * `customers/{customer_id}/paymentsAccounts/{payments_account_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the payments account.
     * PaymentsAccount resource names have the form:
     * `customers/{customer_id}/paymentsAccounts/{payments_account_id}`
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
     * Output only. A 16 digit ID used to identify a payments account.
     *
     * Generated from protobuf field <code>optional string payments_account_id = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getPaymentsAccountId()
    {
        return isset($this->payments_account_id) ? $this->payments_account_id : '';
    }

    public function hasPaymentsAccountId()
    {
        return isset($this->payments_account_id);
    }

    public function clearPaymentsAccountId()
    {
        unset($this->payments_account_id);
    }

    /**
     * Output only. A 16 digit ID used to identify a payments account.
     *
     * Generated from protobuf field <code>optional string payments_account_id = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setPaymentsAccountId($var)
    {
        GPBUtil::checkString($var, True);
        $this->payments_account_id = $var;

        return $this;
    }

    /**
     * Output only. The name of the payments account.
     *
     * Generated from protobuf field <code>optional string name = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The name of the payments account.
     *
     * Generated from protobuf field <code>optional string name = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The currency code of the payments account.
     * A subset of the currency codes derived from the ISO 4217 standard is
     * supported.
     *
     * Generated from protobuf field <code>optional string currency_code = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The currency code of the payments account.
     * A subset of the currency codes derived from the ISO 4217 standard is
     * supported.
     *
     * Generated from protobuf field <code>optional string currency_code = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. A 12 digit ID used to identify the payments profile associated
     * with the payments account.
     *
     * Generated from protobuf field <code>optional string payments_profile_id = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getPaymentsProfileId()
    {
        return isset($this->payments_profile_id) ? $this->payments_profile_id : '';
    }

    public function hasPaymentsProfileId()
    {
        return isset($this->payments_profile_id);
    }

    public function clearPaymentsProfileId()
    {
        unset($this->payments_profile_id);
    }

    /**
     * Output only. A 12 digit ID used to identify the payments profile associated
     * with the payments account.
     *
     * Generated from protobuf field <code>optional string payments_profile_id = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setPaymentsProfileId($var)
    {
        GPBUtil::checkString($var, True);
        $this->payments_profile_id = $var;

        return $this;
    }

    /**
     * Output only. A secondary payments profile ID present in uncommon
     * situations, for example, when a sequential liability agreement has been
     * arranged.
     *
     * Generated from protobuf field <code>optional string secondary_payments_profile_id = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getSecondaryPaymentsProfileId()
    {
        return isset($this->secondary_payments_profile_id) ? $this->secondary_payments_profile_id : '';
    }

    public function hasSecondaryPaymentsProfileId()
    {
        return isset($this->secondary_payments_profile_id);
    }

    public function clearSecondaryPaymentsProfileId()
    {
        unset($this->secondary_payments_profile_id);
    }

    /**
     * Output only. A secondary payments profile ID present in uncommon
     * situations, for example, when a sequential liability agreement has been
     * arranged.
     *
     * Generated from protobuf field <code>optional string secondary_payments_profile_id = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setSecondaryPaymentsProfileId($var)
    {
        GPBUtil::checkString($var, True);
        $this->secondary_payments_profile_id = $var;

        return $this;
    }

    /**
     * Output only. Paying manager of this payment account.
     *
     * Generated from protobuf field <code>optional string paying_manager_customer = 13 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getPayingManagerCustomer()
    {
        return isset($this->paying_manager_customer) ? $this->paying_manager_customer : '';
    }

    public function hasPayingManagerCustomer()
    {
        return isset($this->paying_manager_customer);
    }

    public function clearPayingManagerCustomer()
    {
        unset($this->paying_manager_customer);
    }

    /**
     * Output only. Paying manager of this payment account.
     *
     * Generated from protobuf field <code>optional string paying_manager_customer = 13 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setPayingManagerCustomer($var)
    {
        GPBUtil::checkString($var, True);
        $this->paying_manager_customer = $var;

        return $this;
    }

}

