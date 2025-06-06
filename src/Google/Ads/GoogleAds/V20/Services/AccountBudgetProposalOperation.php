<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v20/services/account_budget_proposal_service.proto

namespace Google\Ads\GoogleAds\V20\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A single operation to propose the creation of a new account-level budget or
 * edit/end/remove an existing one.
 *
 * Generated from protobuf message <code>google.ads.googleads.v20.services.AccountBudgetProposalOperation</code>
 */
class AccountBudgetProposalOperation extends \Google\Protobuf\Internal\Message
{
    /**
     * FieldMask that determines which budget fields are modified.  While budgets
     * may be modified, proposals that propose such modifications are final.
     * Therefore, update operations are not supported for proposals.
     * Proposals that modify budgets have the 'update' proposal type.  Specifying
     * a mask for any other proposal type is considered an error.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 3;</code>
     */
    protected $update_mask = null;
    protected $operation;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Protobuf\FieldMask $update_mask
     *           FieldMask that determines which budget fields are modified.  While budgets
     *           may be modified, proposals that propose such modifications are final.
     *           Therefore, update operations are not supported for proposals.
     *           Proposals that modify budgets have the 'update' proposal type.  Specifying
     *           a mask for any other proposal type is considered an error.
     *     @type \Google\Ads\GoogleAds\V20\Resources\AccountBudgetProposal $create
     *           Create operation: A new proposal to create a new budget, edit an
     *           existing budget, end an actively running budget, or remove an approved
     *           budget scheduled to start in the future.
     *           No resource name is expected for the new proposal.
     *     @type string $remove
     *           Remove operation: A resource name for the removed proposal is expected,
     *           in this format:
     *           `customers/{customer_id}/accountBudgetProposals/{account_budget_proposal_id}`
     *           A request may be cancelled iff it is pending.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V20\Services\AccountBudgetProposalService::initOnce();
        parent::__construct($data);
    }

    /**
     * FieldMask that determines which budget fields are modified.  While budgets
     * may be modified, proposals that propose such modifications are final.
     * Therefore, update operations are not supported for proposals.
     * Proposals that modify budgets have the 'update' proposal type.  Specifying
     * a mask for any other proposal type is considered an error.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 3;</code>
     * @return \Google\Protobuf\FieldMask|null
     */
    public function getUpdateMask()
    {
        return $this->update_mask;
    }

    public function hasUpdateMask()
    {
        return isset($this->update_mask);
    }

    public function clearUpdateMask()
    {
        unset($this->update_mask);
    }

    /**
     * FieldMask that determines which budget fields are modified.  While budgets
     * may be modified, proposals that propose such modifications are final.
     * Therefore, update operations are not supported for proposals.
     * Proposals that modify budgets have the 'update' proposal type.  Specifying
     * a mask for any other proposal type is considered an error.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 3;</code>
     * @param \Google\Protobuf\FieldMask $var
     * @return $this
     */
    public function setUpdateMask($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\FieldMask::class);
        $this->update_mask = $var;

        return $this;
    }

    /**
     * Create operation: A new proposal to create a new budget, edit an
     * existing budget, end an actively running budget, or remove an approved
     * budget scheduled to start in the future.
     * No resource name is expected for the new proposal.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccountBudgetProposal create = 2;</code>
     * @return \Google\Ads\GoogleAds\V20\Resources\AccountBudgetProposal|null
     */
    public function getCreate()
    {
        return $this->readOneof(2);
    }

    public function hasCreate()
    {
        return $this->hasOneof(2);
    }

    /**
     * Create operation: A new proposal to create a new budget, edit an
     * existing budget, end an actively running budget, or remove an approved
     * budget scheduled to start in the future.
     * No resource name is expected for the new proposal.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v20.resources.AccountBudgetProposal create = 2;</code>
     * @param \Google\Ads\GoogleAds\V20\Resources\AccountBudgetProposal $var
     * @return $this
     */
    public function setCreate($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V20\Resources\AccountBudgetProposal::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Remove operation: A resource name for the removed proposal is expected,
     * in this format:
     * `customers/{customer_id}/accountBudgetProposals/{account_budget_proposal_id}`
     * A request may be cancelled iff it is pending.
     *
     * Generated from protobuf field <code>string remove = 1 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getRemove()
    {
        return $this->readOneof(1);
    }

    public function hasRemove()
    {
        return $this->hasOneof(1);
    }

    /**
     * Remove operation: A resource name for the removed proposal is expected,
     * in this format:
     * `customers/{customer_id}/accountBudgetProposals/{account_budget_proposal_id}`
     * A request may be cancelled iff it is pending.
     *
     * Generated from protobuf field <code>string remove = 1 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setRemove($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(1, $var);

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

