<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2020 Google LLC
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
namespace Google\Ads\GoogleAds\V4\Services;

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
     * @param \Google\Ads\GoogleAds\V4\Services\GetCustomerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V4\Resources\Customer
     */
    public function GetCustomer(\Google\Ads\GoogleAds\V4\Services\GetCustomerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v4.services.CustomerService/GetCustomer',
        $argument,
        ['\Google\Ads\GoogleAds\V4\Resources\Customer', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates a customer. Operation statuses are returned.
     * @param \Google\Ads\GoogleAds\V4\Services\MutateCustomerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V4\Services\MutateCustomerResponse
     */
    public function MutateCustomer(\Google\Ads\GoogleAds\V4\Services\MutateCustomerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v4.services.CustomerService/MutateCustomer',
        $argument,
        ['\Google\Ads\GoogleAds\V4\Services\MutateCustomerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns resource names of customers directly accessible by the
     * user authenticating the call.
     * @param \Google\Ads\GoogleAds\V4\Services\ListAccessibleCustomersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V4\Services\ListAccessibleCustomersResponse
     */
    public function ListAccessibleCustomers(\Google\Ads\GoogleAds\V4\Services\ListAccessibleCustomersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v4.services.CustomerService/ListAccessibleCustomers',
        $argument,
        ['\Google\Ads\GoogleAds\V4\Services\ListAccessibleCustomersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates a new client under manager. The new client customer is returned.
     * @param \Google\Ads\GoogleAds\V4\Services\CreateCustomerClientRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V4\Services\CreateCustomerClientResponse
     */
    public function CreateCustomerClient(\Google\Ads\GoogleAds\V4\Services\CreateCustomerClientRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v4.services.CustomerService/CreateCustomerClient',
        $argument,
        ['\Google\Ads\GoogleAds\V4\Services\CreateCustomerClientResponse', 'decode'],
        $metadata, $options);
    }

}
