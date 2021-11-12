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
 * Proto file describing the keyword plan service.
 *
 * Service to manage keyword plans.
 */
class KeywordPlanServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested plan in full detail.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\GetKeywordPlanRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetKeywordPlan(\Google\Ads\GoogleAds\V9\Services\GetKeywordPlanRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.KeywordPlanService/GetKeywordPlan',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Resources\KeywordPlan', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates, updates, or removes keyword plans. Operation statuses are
     * returned.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [DatabaseError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [KeywordPlanError]()
     *   [MutateError]()
     *   [NewResourceCreationError]()
     *   [QuotaError]()
     *   [RequestError]()
     *   [ResourceCountLimitExceededError]()
     *   [StringLengthError]()
     * @param \Google\Ads\GoogleAds\V9\Services\MutateKeywordPlansRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateKeywordPlans(\Google\Ads\GoogleAds\V9\Services\MutateKeywordPlansRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.KeywordPlanService/MutateKeywordPlans',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\MutateKeywordPlansResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the requested Keyword Plan forecast curve.
     * Only the bidding strategy is considered for generating forecast curve.
     * The bidding strategy value specified in the plan is ignored.
     *
     * To generate a forecast at a value specified in the plan, use
     * KeywordPlanService.GenerateForecastMetrics.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [KeywordPlanError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\GenerateForecastCurveRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateForecastCurve(\Google\Ads\GoogleAds\V9\Services\GenerateForecastCurveRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.KeywordPlanService/GenerateForecastCurve',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\GenerateForecastCurveResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns a forecast in the form of a time series for the Keyword Plan over
     * the next 52 weeks.
     * (1) Forecasts closer to the current date are generally more accurate than
     * further out.
     *
     * (2) The forecast reflects seasonal trends using current and
     * prior traffic patterns. The forecast period of the plan is ignored.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [KeywordPlanError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\GenerateForecastTimeSeriesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateForecastTimeSeries(\Google\Ads\GoogleAds\V9\Services\GenerateForecastTimeSeriesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.KeywordPlanService/GenerateForecastTimeSeries',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\GenerateForecastTimeSeriesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the requested Keyword Plan forecasts.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [KeywordPlanError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\GenerateForecastMetricsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateForecastMetrics(\Google\Ads\GoogleAds\V9\Services\GenerateForecastMetricsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.KeywordPlanService/GenerateForecastMetrics',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\GenerateForecastMetricsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the requested Keyword Plan historical metrics.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [KeywordPlanError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\GenerateHistoricalMetricsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateHistoricalMetrics(\Google\Ads\GoogleAds\V9\Services\GenerateHistoricalMetricsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.KeywordPlanService/GenerateHistoricalMetrics',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\GenerateHistoricalMetricsResponse', 'decode'],
        $metadata, $options);
    }

}
