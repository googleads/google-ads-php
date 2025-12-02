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
namespace Google\Ads\GoogleAds\V19\Services;

/**
 * Proto file describing the keyword plan idea service.
 *
 * Service to generate keyword ideas.
 */
class KeywordPlanIdeaServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns a list of keyword ideas.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CollectionSizeError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [KeywordPlanIdeaError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V19\Services\GenerateKeywordIdeasRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateKeywordIdeas(\Google\Ads\GoogleAds\V19\Services\GenerateKeywordIdeasRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v19.services.KeywordPlanIdeaService/GenerateKeywordIdeas',
        $argument,
        ['\Google\Ads\GoogleAds\V19\Services\GenerateKeywordIdeaResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns a list of keyword historical metrics.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CollectionSizeError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V19\Services\GenerateKeywordHistoricalMetricsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateKeywordHistoricalMetrics(\Google\Ads\GoogleAds\V19\Services\GenerateKeywordHistoricalMetricsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v19.services.KeywordPlanIdeaService/GenerateKeywordHistoricalMetrics',
        $argument,
        ['\Google\Ads\GoogleAds\V19\Services\GenerateKeywordHistoricalMetricsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns a list of suggested AdGroups and suggested modifications
     * (text, match type) for the given keywords.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CollectionSizeError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V19\Services\GenerateAdGroupThemesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateAdGroupThemes(\Google\Ads\GoogleAds\V19\Services\GenerateAdGroupThemesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v19.services.KeywordPlanIdeaService/GenerateAdGroupThemes',
        $argument,
        ['\Google\Ads\GoogleAds\V19\Services\GenerateAdGroupThemesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns metrics (such as impressions, clicks, total cost) of a keyword
     * forecast for the given campaign.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CollectionSizeError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V19\Services\GenerateKeywordForecastMetricsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateKeywordForecastMetrics(\Google\Ads\GoogleAds\V19\Services\GenerateKeywordForecastMetricsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v19.services.KeywordPlanIdeaService/GenerateKeywordForecastMetrics',
        $argument,
        ['\Google\Ads\GoogleAds\V19\Services\GenerateKeywordForecastMetricsResponse', 'decode'],
        $metadata, $options);
    }

}
