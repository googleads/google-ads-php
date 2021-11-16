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
 * Proto file describing the Campaign Experiment service.
 *
 * CampaignExperimentService manages the life cycle of campaign experiments.
 * It is used to create new experiments from drafts, modify experiment
 * properties, promote changes in an experiment back to its base campaign,
 * graduate experiments into new stand-alone campaigns, and to remove an
 * experiment.
 *
 * An experiment consists of two variants or arms - the base campaign and the
 * experiment campaign, directing a fixed share of traffic to each arm.
 * A campaign experiment is created from a draft of changes to the base campaign
 * and will be a snapshot of changes in the draft at the time of creation.
 */
class CampaignExperimentServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested campaign experiment in full detail.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\GetCampaignExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetCampaignExperiment(\Google\Ads\GoogleAds\V9\Services\GetCampaignExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.CampaignExperimentService/GetCampaignExperiment',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Resources\CampaignExperiment', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates a campaign experiment based on a campaign draft. The draft campaign
     * will be forked into a real campaign (called the experiment campaign) that
     * will begin serving ads if successfully created.
     *
     * The campaign experiment is created immediately with status INITIALIZING.
     * This method return a long running operation that tracks the forking of the
     * draft campaign. If the forking fails, a list of errors can be retrieved
     * using the ListCampaignExperimentAsyncErrors method. The operation's
     * metadata will be a StringValue containing the resource name of the created
     * campaign experiment.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CampaignExperimentError]()
     *   [DatabaseError]()
     *   [DateError]()
     *   [DateRangeError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\CreateCampaignExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateCampaignExperiment(\Google\Ads\GoogleAds\V9\Services\CreateCampaignExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.CampaignExperimentService/CreateCampaignExperiment',
        $argument,
        ['\Google\LongRunning\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates campaign experiments. Operation statuses are returned.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CampaignExperimentError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\MutateCampaignExperimentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateCampaignExperiments(\Google\Ads\GoogleAds\V9\Services\MutateCampaignExperimentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.CampaignExperimentService/MutateCampaignExperiments',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\MutateCampaignExperimentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Graduates a campaign experiment to a full campaign. The base and experiment
     * campaigns will start running independently with their own budgets.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CampaignExperimentError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\GraduateCampaignExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GraduateCampaignExperiment(\Google\Ads\GoogleAds\V9\Services\GraduateCampaignExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.CampaignExperimentService/GraduateCampaignExperiment',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\GraduateCampaignExperimentResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Promotes the changes in a experiment campaign back to the base campaign.
     *
     * The campaign experiment is updated immediately with status PROMOTING.
     * This method return a long running operation that tracks the promoting of
     * the experiment campaign. If the promoting fails, a list of errors can be
     * retrieved using the ListCampaignExperimentAsyncErrors method.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\PromoteCampaignExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function PromoteCampaignExperiment(\Google\Ads\GoogleAds\V9\Services\PromoteCampaignExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.CampaignExperimentService/PromoteCampaignExperiment',
        $argument,
        ['\Google\LongRunning\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Immediately ends a campaign experiment, changing the experiment's scheduled
     * end date and without waiting for end of day. End date is updated to be the
     * time of the request.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CampaignExperimentError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\EndCampaignExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function EndCampaignExperiment(\Google\Ads\GoogleAds\V9\Services\EndCampaignExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.CampaignExperimentService/EndCampaignExperiment',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns all errors that occurred during CampaignExperiment create or
     * promote (whichever occurred last).
     * Supports standard list paging.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\ListCampaignExperimentAsyncErrorsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListCampaignExperimentAsyncErrors(\Google\Ads\GoogleAds\V9\Services\ListCampaignExperimentAsyncErrorsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.CampaignExperimentService/ListCampaignExperimentAsyncErrors',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\ListCampaignExperimentAsyncErrorsResponse', 'decode'],
        $metadata, $options);
    }

}
