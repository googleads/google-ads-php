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
 * Proto file describing the OfflineUserDataJobService.
 *
 * Service to manage offline user data jobs.
 */
class OfflineUserDataJobServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates an offline user data job.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [DatabaseError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [NotAllowlistedError]()
     *   [OfflineUserDataJobError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V20\Services\CreateOfflineUserDataJobRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateOfflineUserDataJob(\Google\Ads\GoogleAds\V20\Services\CreateOfflineUserDataJobRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v20.services.OfflineUserDataJobService/CreateOfflineUserDataJob',
        $argument,
        ['\Google\Ads\GoogleAds\V20\Services\CreateOfflineUserDataJobResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Adds operations to the offline user data job.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [DatabaseError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [OfflineUserDataJobError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V20\Services\AddOfflineUserDataJobOperationsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AddOfflineUserDataJobOperations(\Google\Ads\GoogleAds\V20\Services\AddOfflineUserDataJobOperationsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v20.services.OfflineUserDataJobService/AddOfflineUserDataJobOperations',
        $argument,
        ['\Google\Ads\GoogleAds\V20\Services\AddOfflineUserDataJobOperationsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Runs the offline user data job.
     *
     * When finished, the long running operation will contain the processing
     * result or failure information, if any.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [DatabaseError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [OfflineUserDataJobError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V20\Services\RunOfflineUserDataJobRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RunOfflineUserDataJob(\Google\Ads\GoogleAds\V20\Services\RunOfflineUserDataJobRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v20.services.OfflineUserDataJobService/RunOfflineUserDataJob',
        $argument,
        ['\Google\LongRunning\Operation', 'decode'],
        $metadata, $options);
    }

}
