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
 * Proto file describing the Experiment service.
 *
 * Service to manage experiments.
 */
class ExperimentServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates, updates, or removes experiments. Operation statuses are returned.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [ExperimentError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V20\Services\MutateExperimentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateExperiments(\Google\Ads\GoogleAds\V20\Services\MutateExperimentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v20.services.ExperimentService/MutateExperiments',
        $argument,
        ['\Google\Ads\GoogleAds\V20\Services\MutateExperimentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Immediately ends an experiment, changing the experiment's scheduled
     * end date and without waiting for end of day. End date is updated to be the
     * time of the request.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [ExperimentError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V20\Services\EndExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function EndExperiment(\Google\Ads\GoogleAds\V20\Services\EndExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v20.services.ExperimentService/EndExperiment',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns all errors that occurred during the last Experiment update (either
     * scheduling or promotion).
     * Supports standard list paging.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V20\Services\ListExperimentAsyncErrorsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListExperimentAsyncErrors(\Google\Ads\GoogleAds\V20\Services\ListExperimentAsyncErrorsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v20.services.ExperimentService/ListExperimentAsyncErrors',
        $argument,
        ['\Google\Ads\GoogleAds\V20\Services\ListExperimentAsyncErrorsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Graduates an experiment to a full campaign.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [ExperimentError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V20\Services\GraduateExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GraduateExperiment(\Google\Ads\GoogleAds\V20\Services\GraduateExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v20.services.ExperimentService/GraduateExperiment',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Schedule an experiment. The in design campaign
     * will be converted into a real campaign (called the experiment campaign)
     * that will begin serving ads if successfully created.
     *
     * The experiment is scheduled immediately with status INITIALIZING.
     * This method returns a long running operation that tracks the forking of the
     * in design campaign. If the forking fails, a list of errors can be retrieved
     * using the ListExperimentAsyncErrors method. The operation's
     * metadata will be a string containing the resource name of the created
     * experiment.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [ExperimentError]()
     *   [DatabaseError]()
     *   [DateError]()
     *   [DateRangeError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V20\Services\ScheduleExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ScheduleExperiment(\Google\Ads\GoogleAds\V20\Services\ScheduleExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v20.services.ExperimentService/ScheduleExperiment',
        $argument,
        ['\Google\LongRunning\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Promotes the trial campaign thus applying changes in the trial campaign
     * to the base campaign.
     * This method returns a long running operation that tracks the promotion of
     * the experiment campaign. If it fails, a list of errors can be retrieved
     * using the ListExperimentAsyncErrors method. The operation's
     * metadata will be a string containing the resource name of the created
     * experiment.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [ExperimentError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V20\Services\PromoteExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function PromoteExperiment(\Google\Ads\GoogleAds\V20\Services\PromoteExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v20.services.ExperimentService/PromoteExperiment',
        $argument,
        ['\Google\LongRunning\Operation', 'decode'],
        $metadata, $options);
    }

}
