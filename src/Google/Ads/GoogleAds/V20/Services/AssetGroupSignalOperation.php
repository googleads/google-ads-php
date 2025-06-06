<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/asset_group_signal_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A single operation (create, remove) on an asset group signal.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.AssetGroupSignalOperation</code>
 */
class AssetGroupSignalOperation extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. The list of policy violation keys that should not cause a
     * PolicyViolationError to be reported. Not all policy violations are
     * exemptable, refer to the is_exemptible field in the returned
     * PolicyViolationError.
     * Resources violating these polices will be saved, but will not be eligible
     * to serve. They may begin serving at a later time due to a change in
     * policies, re-review of the resource, or a change in advertiser
     * certificates.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.PolicyViolationKey exempt_policy_violation_keys = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $exempt_policy_violation_keys;
    protected $operation;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V20\Common\PolicyViolationKey>|\Google\Protobuf\Internal\RepeatedField $exempt_policy_violation_keys
     *           Optional. The list of policy violation keys that should not cause a
     *           PolicyViolationError to be reported. Not all policy violations are
     *           exemptable, refer to the is_exemptible field in the returned
     *           PolicyViolationError.
     *           Resources violating these polices will be saved, but will not be eligible
     *           to serve. They may begin serving at a later time due to a change in
     *           policies, re-review of the resource, or a change in advertiser
     *           certificates.
     *     @type \Google\Ads\GoogleAds\V20\Resources\AssetGroupSignal $create
     *           Create operation: No resource name is expected for the new asset group
     *           signal.
     *     @type string $remove
     *           Remove operation: A resource name for the removed asset group signal is
     *           expected, in this format:
     *           `customers/{customer_id}/assetGroupSignals/{asset_group_id}~{criterion_id}`
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\AssetGroupSignalService::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. The list of policy violation keys that should not cause a
     * PolicyViolationError to be reported. Not all policy violations are
     * exemptable, refer to the is_exemptible field in the returned
     * PolicyViolationError.
     * Resources violating these polices will be saved, but will not be eligible
     * to serve. They may begin serving at a later time due to a change in
     * policies, re-review of the resource, or a change in advertiser
     * certificates.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.PolicyViolationKey exempt_policy_violation_keys = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getExemptPolicyViolationKeys()
    {
        return $this->exempt_policy_violation_keys;
    }

    /**
     * Optional. The list of policy violation keys that should not cause a
     * PolicyViolationError to be reported. Not all policy violations are
     * exemptable, refer to the is_exemptible field in the returned
     * PolicyViolationError.
     * Resources violating these polices will be saved, but will not be eligible
     * to serve. They may begin serving at a later time due to a change in
     * policies, re-review of the resource, or a change in advertiser
     * certificates.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v20.common.PolicyViolationKey exempt_policy_violation_keys = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<\Google\Ads\GoogleAds\V20\Common\PolicyViolationKey>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setExemptPolicyViolationKeys($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V20\Common\PolicyViolationKey::class);
        $this->exempt_policy_violation_keys = $arr;

        return $this;
    }

    /**
     * Create operation: No resource name is expected for the new asset group
     * signal.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AssetGroupSignal create = 1;</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\AssetGroupSignal|null
     */
    public function getCreate()
    {
        return $this->readOneof(1);
    }

    public function hasCreate()
    {
        return $this->hasOneof(1);
    }

    /**
     * Create operation: No resource name is expected for the new asset group
     * signal.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AssetGroupSignal create = 1;</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\AssetGroupSignal $var
     * @return $this
     */
    public function setCreate($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\AssetGroupSignal::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Remove operation: A resource name for the removed asset group signal is
     * expected, in this format:
     * `customers/{customer_id}/assetGroupSignals/{asset_group_id}~{criterion_id}`
     *
     * Generated from protobuf field <code>string remove = 2 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getRemove()
    {
        return $this->readOneof(2);
    }

    public function hasRemove()
    {
        return $this->hasOneof(2);
    }

    /**
     * Remove operation: A resource name for the removed asset group signal is
     * expected, in this format:
     * `customers/{customer_id}/assetGroupSignals/{asset_group_id}~{criterion_id}`
     *
     * Generated from protobuf field <code>string remove = 2 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setRemove($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getOperation()
    {
        return $this->whichOneof("operation");
    }

}

