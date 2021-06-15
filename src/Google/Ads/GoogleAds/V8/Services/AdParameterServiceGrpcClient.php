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
 * Proto file describing the Ad Parameter service.
 *
 * Service to manage ad parameters.
 */
class AdParameterServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested ad parameter in full detail.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\GetAdParameterRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetAdParameter(\Google\Ads\GoogleAds\V8\Services\GetAdParameterRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.AdParameterService/GetAdParameter',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Resources\AdParameter', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates, updates, or removes ad parameters. Operation statuses are
     * returned.
     *
     * List of thrown errors:
     *   [AdParameterError]()
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [ContextError]()
     *   [DatabaseError]()
     *   [FieldError]()
     *   [FieldMaskError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\MutateAdParametersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateAdParameters(\Google\Ads\GoogleAds\V8\Services\MutateAdParametersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.AdParameterService/MutateAdParameters',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\MutateAdParametersResponse', 'decode'],
        $metadata, $options);
    }

}
