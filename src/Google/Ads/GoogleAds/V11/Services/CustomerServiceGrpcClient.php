<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2022 Google LLC
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
namespace Google\Ads\GoogleAds\V11\Services;

/**
 * Proto file describing the Customer service.
 *
 * Service to manage customers.
 */
class CustomerServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Updates a customer. Operation statuses are returned.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [DatabaseError]()
     *   [FieldMaskError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     *   [UrlFieldError]()
     * @param \Google\Ads\GoogleAds\V11\Services\MutateCustomerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateCustomer(\Google\Ads\GoogleAds\V11\Services\MutateCustomerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v11.services.CustomerService/MutateCustomer',
        $argument,
        ['\Google\Ads\GoogleAds\V11\Services\MutateCustomerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns resource names of customers directly accessible by the
     * user authenticating the call.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V11\Services\ListAccessibleCustomersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListAccessibleCustomers(\Google\Ads\GoogleAds\V11\Services\ListAccessibleCustomersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v11.services.CustomerService/ListAccessibleCustomers',
        $argument,
        ['\Google\Ads\GoogleAds\V11\Services\ListAccessibleCustomersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates a new client under manager. The new client customer is returned.
     *
     * List of thrown errors:
     *   [AccessInvitationError]()
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CurrencyCodeError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [ManagerLinkError]()
     *   [QuotaError]()
     *   [RequestError]()
     *   [StringLengthError]()
     *   [TimeZoneError]()
     * @param \Google\Ads\GoogleAds\V11\Services\CreateCustomerClientRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateCustomerClient(\Google\Ads\GoogleAds\V11\Services\CreateCustomerClientRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v11.services.CustomerService/CreateCustomerClient',
        $argument,
        ['\Google\Ads\GoogleAds\V11\Services\CreateCustomerClientResponse', 'decode'],
        $metadata, $options);
    }

}
