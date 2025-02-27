<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v19/errors/errors.proto

namespace Google\Ads\GoogleAds\V19\Errors;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Error returned as part of a mutate response.
 * This error indicates single policy violation by some text
 * in one of the fields.
 *
 * Generated from protobuf message <code>google.ads.googleads.v19.errors.PolicyViolationDetails</code>
 */
class PolicyViolationDetails extends \Google\Protobuf\Internal\Message
{
    /**
     * Human readable description of policy violation.
     *
     * Generated from protobuf field <code>string external_policy_description = 2;</code>
     */
    protected $external_policy_description = '';
    /**
     * Unique identifier for this violation.
     * If policy is exemptible, this key may be used to request exemption.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.PolicyViolationKey key = 4;</code>
     */
    protected $key = null;
    /**
     * Human readable name of the policy.
     *
     * Generated from protobuf field <code>string external_policy_name = 5;</code>
     */
    protected $external_policy_name = '';
    /**
     * Whether user can file an exemption request for this violation.
     *
     * Generated from protobuf field <code>bool is_exemptible = 6;</code>
     */
    protected $is_exemptible = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $external_policy_description
     *           Human readable description of policy violation.
     *     @type \Google\Ads\GoogleAds\V19\Common\PolicyViolationKey $key
     *           Unique identifier for this violation.
     *           If policy is exemptible, this key may be used to request exemption.
     *     @type string $external_policy_name
     *           Human readable name of the policy.
     *     @type bool $is_exemptible
     *           Whether user can file an exemption request for this violation.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V19\Errors\Errors::initOnce();
        parent::__construct($data);
    }

    /**
     * Human readable description of policy violation.
     *
     * Generated from protobuf field <code>string external_policy_description = 2;</code>
     * @return string
     */
    public function getExternalPolicyDescription()
    {
        return $this->external_policy_description;
    }

    /**
     * Human readable description of policy violation.
     *
     * Generated from protobuf field <code>string external_policy_description = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setExternalPolicyDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->external_policy_description = $var;

        return $this;
    }

    /**
     * Unique identifier for this violation.
     * If policy is exemptible, this key may be used to request exemption.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.PolicyViolationKey key = 4;</code>
     * @return \Google\Ads\GoogleAds\V19\Common\PolicyViolationKey|null
     */
    public function getKey()
    {
        return $this->key;
    }

    public function hasKey()
    {
        return isset($this->key);
    }

    public function clearKey()
    {
        unset($this->key);
    }

    /**
     * Unique identifier for this violation.
     * If policy is exemptible, this key may be used to request exemption.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v19.common.PolicyViolationKey key = 4;</code>
     * @param \Google\Ads\GoogleAds\V19\Common\PolicyViolationKey $var
     * @return $this
     */
    public function setKey($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V19\Common\PolicyViolationKey::class);
        $this->key = $var;

        return $this;
    }

    /**
     * Human readable name of the policy.
     *
     * Generated from protobuf field <code>string external_policy_name = 5;</code>
     * @return string
     */
    public function getExternalPolicyName()
    {
        return $this->external_policy_name;
    }

    /**
     * Human readable name of the policy.
     *
     * Generated from protobuf field <code>string external_policy_name = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setExternalPolicyName($var)
    {
        GPBUtil::checkString($var, True);
        $this->external_policy_name = $var;

        return $this;
    }

    /**
     * Whether user can file an exemption request for this violation.
     *
     * Generated from protobuf field <code>bool is_exemptible = 6;</code>
     * @return bool
     */
    public function getIsExemptible()
    {
        return $this->is_exemptible;
    }

    /**
     * Whether user can file an exemption request for this violation.
     *
     * Generated from protobuf field <code>bool is_exemptible = 6;</code>
     * @param bool $var
     * @return $this
     */
    public function setIsExemptible($var)
    {
        GPBUtil::checkBool($var);
        $this->is_exemptible = $var;

        return $this;
    }

}

