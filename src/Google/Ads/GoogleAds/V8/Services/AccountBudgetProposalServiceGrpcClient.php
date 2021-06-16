<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2021 Google LLC
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
//
namespace Google\Ads\GoogleAds\V8\Services;

/**
 * Proto file describing the AccountBudgetProposal service.
 *
 * A service for managing account-level budgets via proposals.
 *
 * A proposal is a request to create a new budget or make changes to an
 * existing one.
 *
 * Reads for account-level budgets managed by these proposals will be
 * supported in a future version. Until then, please use the
 * BudgetOrderService from the AdWords API. Learn more at
 * https://developers.google.com/adwords/api/docs/guides/budget-order
 *
 * Mutates:
 * The CREATE operation creates a new proposal.
 * UPDATE operations aren't supported.
 * The REMOVE operation cancels a pending proposal.
 */
class AccountBudgetProposalServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns an account-level budget proposal in full detail.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\GetAccountBudgetProposalRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetAccountBudgetProposal(\Google\Ads\GoogleAds\V8\Services\GetAccountBudgetProposalRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.AccountBudgetProposalService/GetAccountBudgetProposal',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Resources\AccountBudgetProposal', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates, updates, or removes account budget proposals.  Operation statuses
     * are returned.
     *
     * List of thrown errors:
     *   [AccountBudgetProposalError]()
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [DatabaseError]()
     *   [DateError]()
     *   [FieldError]()
     *   [FieldMaskError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [QuotaError]()
     *   [RequestError]()
     *   [StringLengthError]()
     * @param \Google\Ads\GoogleAds\V8\Services\MutateAccountBudgetProposalRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateAccountBudgetProposal(\Google\Ads\GoogleAds\V8\Services\MutateAccountBudgetProposalRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.AccountBudgetProposalService/MutateAccountBudgetProposal',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\MutateAccountBudgetProposalResponse', 'decode'],
        $metadata, $options);
    }

}
