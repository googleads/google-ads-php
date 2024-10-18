<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2024 Google LLC
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
namespace Google\Ads\GoogleAds\V18\Services;

/**
 * Proto file describing the audience insights service.
 *
 * Audience Insights Service helps users find information about groups of
 * people and how they can be reached with Google Ads. Accessible to
 * allowlisted customers only.
 */
class AudienceInsightsServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates a saved report that can be viewed in the Insights Finder tool.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V18\Services\GenerateInsightsFinderReportRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateInsightsFinderReport(\Google\Ads\GoogleAds\V18\Services\GenerateInsightsFinderReportRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.AudienceInsightsService/GenerateInsightsFinderReport',
        $argument,
        ['\Google\Ads\GoogleAds\V18\Services\GenerateInsightsFinderReportResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Searches for audience attributes that can be used to generate insights.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V18\Services\ListAudienceInsightsAttributesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListAudienceInsightsAttributes(\Google\Ads\GoogleAds\V18\Services\ListAudienceInsightsAttributesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.AudienceInsightsService/ListAudienceInsightsAttributes',
        $argument,
        ['\Google\Ads\GoogleAds\V18\Services\ListAudienceInsightsAttributesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists date ranges for which audience insights data can be requested.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V18\Services\ListInsightsEligibleDatesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListInsightsEligibleDates(\Google\Ads\GoogleAds\V18\Services\ListInsightsEligibleDatesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.AudienceInsightsService/ListInsightsEligibleDates',
        $argument,
        ['\Google\Ads\GoogleAds\V18\Services\ListInsightsEligibleDatesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns a collection of attributes that are represented in an audience of
     * interest, with metrics that compare each attribute's share of the audience
     * with its share of a baseline audience.
     *
     * List of thrown errors:
     *   [AudienceInsightsError]()
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V18\Services\GenerateAudienceCompositionInsightsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateAudienceCompositionInsights(\Google\Ads\GoogleAds\V18\Services\GenerateAudienceCompositionInsightsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.AudienceInsightsService/GenerateAudienceCompositionInsights',
        $argument,
        ['\Google\Ads\GoogleAds\V18\Services\GenerateAudienceCompositionInsightsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns a collection of targeting insights (e.g. targetable audiences) that
     * are relevant to the requested audience.
     *
     * List of thrown errors:
     *   [AudienceInsightsError]()
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V18\Services\GenerateSuggestedTargetingInsightsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateSuggestedTargetingInsights(\Google\Ads\GoogleAds\V18\Services\GenerateSuggestedTargetingInsightsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.AudienceInsightsService/GenerateSuggestedTargetingInsights',
        $argument,
        ['\Google\Ads\GoogleAds\V18\Services\GenerateSuggestedTargetingInsightsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns a collection of audience attributes along with estimates of the
     * overlap between their potential YouTube reach and that of a given input
     * attribute.
     *
     * List of thrown errors:
     *   [AudienceInsightsError]()
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V18\Services\GenerateAudienceOverlapInsightsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateAudienceOverlapInsights(\Google\Ads\GoogleAds\V18\Services\GenerateAudienceOverlapInsightsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.AudienceInsightsService/GenerateAudienceOverlapInsights',
        $argument,
        ['\Google\Ads\GoogleAds\V18\Services\GenerateAudienceOverlapInsightsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns potential reach metrics for targetable audiences.
     *
     * This method helps answer questions like "How many Men aged 18+ interested
     * in Camping can be reached on YouTube?"
     *
     * List of thrown errors:
     *   [AudienceInsightsError]()
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V18\Services\GenerateTargetingSuggestionMetricsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateTargetingSuggestionMetrics(\Google\Ads\GoogleAds\V18\Services\GenerateTargetingSuggestionMetricsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.AudienceInsightsService/GenerateTargetingSuggestionMetrics',
        $argument,
        ['\Google\Ads\GoogleAds\V18\Services\GenerateTargetingSuggestionMetricsResponse', 'decode'],
        $metadata, $options);
    }

}
