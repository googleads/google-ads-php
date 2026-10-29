<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2026 Google LLC
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
namespace Google\Ads\GoogleAds\V26\Services;

/**
 * Proto file describing the CustomerBudgetNetworkSetting service.
 *
 * Service to manage customer-level budget network settings.
 */
class CustomerBudgetNetworkSettingServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates or updates the customer budget network setting.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [BudgetNetworkSettingError]()
     *   [DatabaseError]()
     *   [DistinctError]()
     *   [FieldError]()
     *   [FieldMaskError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [NewResourceCreationError]()
     *   [OperationAccessDeniedError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     *   [ResourceCountLimitExceededError]()
     *   [StringLengthError]()
     * @param \Google\Ads\GoogleAds\V26\Services\MutateCustomerBudgetNetworkSettingRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Google\Ads\GoogleAds\V26\Services\MutateCustomerBudgetNetworkSettingResponse>
     */
    public function MutateCustomerBudgetNetworkSetting(\Google\Ads\GoogleAds\V26\Services\MutateCustomerBudgetNetworkSettingRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v26.services.CustomerBudgetNetworkSettingService/MutateCustomerBudgetNetworkSetting',
        $argument,
        ['\Google\Ads\GoogleAds\V26\Services\MutateCustomerBudgetNetworkSettingResponse', 'decode'],
        $metadata, $options);
    }

}
