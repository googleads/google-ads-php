<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2025 Google LLC
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
namespace Google\Ads\GoogleAds\V20\Services;

/**
 * Proto file describing the Customer Negative Criterion service.
 *
 * Service to manage CustomerSkAdNetworkConversionValueSchema.
 */
class CustomerSkAdNetworkConversionValueSchemaServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates or updates the CustomerSkAdNetworkConversionValueSchema.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [InternalError]()
     *   [MutateError]()
     * @param \Google\Ads\GoogleAds\V20\Services\MutateCustomerSkAdNetworkConversionValueSchemaRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateCustomerSkAdNetworkConversionValueSchema(\Google\Ads\GoogleAds\V20\Services\MutateCustomerSkAdNetworkConversionValueSchemaRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v20.services.CustomerSkAdNetworkConversionValueSchemaService/MutateCustomerSkAdNetworkConversionValueSchema',
        $argument,
        ['\Google\Ads\GoogleAds\V20\Services\MutateCustomerSkAdNetworkConversionValueSchemaResponse', 'decode'],
        $metadata, $options);
    }

}
