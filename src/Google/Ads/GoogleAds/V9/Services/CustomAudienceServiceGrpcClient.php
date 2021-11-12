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
 * Proto file describing the Custom Audience service.
 *
 * Service to manage custom audiences.
 */
class CustomAudienceServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested custom audience in full detail.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\GetCustomAudienceRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetCustomAudience(\Google\Ads\GoogleAds\V9\Services\GetCustomAudienceRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.CustomAudienceService/GetCustomAudience',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Resources\CustomAudience', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates or updates custom audiences. Operation statuses are returned.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CustomAudienceError]()
     *   [CustomInterestError]()
     *   [FieldError]()
     *   [FieldMaskError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [OperationAccessDeniedError]()
     *   [PolicyViolationError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\MutateCustomAudiencesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateCustomAudiences(\Google\Ads\GoogleAds\V9\Services\MutateCustomAudiencesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.CustomAudienceService/MutateCustomAudiences',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\MutateCustomAudiencesResponse', 'decode'],
        $metadata, $options);
    }

}
