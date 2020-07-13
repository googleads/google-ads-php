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
namespace Google\Ads\GoogleAds\V2\Services;

/**
 * Proto file describing the MutateJobService.
 *
 * Service to manage mutate jobs.
 */
class MutateJobServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates a mutate job.
     * @param \Google\Ads\GoogleAds\V2\Services\CreateMutateJobRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V2\Services\CreateMutateJobResponse
     */
    public function CreateMutateJob(\Google\Ads\GoogleAds\V2\Services\CreateMutateJobRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v2.services.MutateJobService/CreateMutateJob',
        $argument,
        ['\Google\Ads\GoogleAds\V2\Services\CreateMutateJobResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the mutate job.
     * @param \Google\Ads\GoogleAds\V2\Services\GetMutateJobRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V2\Resources\MutateJob
     */
    public function GetMutateJob(\Google\Ads\GoogleAds\V2\Services\GetMutateJobRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v2.services.MutateJobService/GetMutateJob',
        $argument,
        ['\Google\Ads\GoogleAds\V2\Resources\MutateJob', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the results of the mutate job. The job must be done.
     * Supports standard list paging.
     * @param \Google\Ads\GoogleAds\V2\Services\ListMutateJobResultsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V2\Services\ListMutateJobResultsResponse
     */
    public function ListMutateJobResults(\Google\Ads\GoogleAds\V2\Services\ListMutateJobResultsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v2.services.MutateJobService/ListMutateJobResults',
        $argument,
        ['\Google\Ads\GoogleAds\V2\Services\ListMutateJobResultsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Runs the mutate job.
     *
     * The Operation.metadata field type is MutateJobMetadata. When finished, the
     * long running operation will not contain errors or a response. Instead, use
     * ListMutateJobResults to get the results of the job.
     * @param \Google\Ads\GoogleAds\V2\Services\RunMutateJobRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\LongRunning\Operation
     */
    public function RunMutateJob(\Google\Ads\GoogleAds\V2\Services\RunMutateJobRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v2.services.MutateJobService/RunMutateJob',
        $argument,
        ['\Google\LongRunning\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Add operations to the mutate job.
     * @param \Google\Ads\GoogleAds\V2\Services\AddMutateJobOperationsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V2\Services\AddMutateJobOperationsResponse
     */
    public function AddMutateJobOperations(\Google\Ads\GoogleAds\V2\Services\AddMutateJobOperationsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v2.services.MutateJobService/AddMutateJobOperations',
        $argument,
        ['\Google\Ads\GoogleAds\V2\Services\AddMutateJobOperationsResponse', 'decode'],
        $metadata, $options);
    }

}
