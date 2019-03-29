<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2019 Google LLC.
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
//
namespace Google\Ads\GoogleAds\V1\Services;

/**
 * Service to manage customer-manager links.
 */
class CustomerManagerLinkServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested CustomerManagerLink in full detail.
     * @param \Google\Ads\GoogleAds\V1\Services\GetCustomerManagerLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetCustomerManagerLink(\Google\Ads\GoogleAds\V1\Services\GetCustomerManagerLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v1.services.CustomerManagerLinkService/GetCustomerManagerLink',
        $argument,
        ['\Google\Ads\GoogleAds\V1\Resources\CustomerManagerLink', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates or updates customer manager links. Operation statuses are returned.
     * @param \Google\Ads\GoogleAds\V1\Services\MutateCustomerManagerLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function MutateCustomerManagerLink(\Google\Ads\GoogleAds\V1\Services\MutateCustomerManagerLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v1.services.CustomerManagerLinkService/MutateCustomerManagerLink',
        $argument,
        ['\Google\Ads\GoogleAds\V1\Services\MutateCustomerManagerLinkResponse', 'decode'],
        $metadata, $options);
    }

}
