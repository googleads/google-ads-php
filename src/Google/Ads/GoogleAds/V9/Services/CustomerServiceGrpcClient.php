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
namespace Google\Ads\GoogleAds\V9\Services;

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
     * Returns the requested customer in full detail.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\GetCustomerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetCustomer(\Google\Ads\GoogleAds\V9\Services\GetCustomerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.CustomerService/GetCustomer',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Resources\Customer', 'decode'],
        $metadata, $options);
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
     * @param \Google\Ads\GoogleAds\V9\Services\MutateCustomerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateCustomer(\Google\Ads\GoogleAds\V9\Services\MutateCustomerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.CustomerService/MutateCustomer',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\MutateCustomerResponse', 'decode'],
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
     * @param \Google\Ads\GoogleAds\V9\Services\ListAccessibleCustomersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListAccessibleCustomers(\Google\Ads\GoogleAds\V9\Services\ListAccessibleCustomersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.CustomerService/ListAccessibleCustomers',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\ListAccessibleCustomersResponse', 'decode'],
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
     * @param \Google\Ads\GoogleAds\V9\Services\CreateCustomerClientRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateCustomerClient(\Google\Ads\GoogleAds\V9\Services\CreateCustomerClientRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.CustomerService/CreateCustomerClient',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\CreateCustomerClientResponse', 'decode'],
        $metadata, $options);
    }

}
