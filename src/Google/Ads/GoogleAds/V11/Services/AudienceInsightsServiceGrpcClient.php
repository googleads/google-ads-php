<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2022 Google LLC
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
namespace Google\Ads\GoogleAds\V11\Services;

/**
 * Proto file describing the audience insights service.
 *
 * Audience Insights Service helps users find information about groups of
 * people and how they can be reached with Google Ads.
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
     * @param \Google\Ads\GoogleAds\V11\Services\GenerateInsightsFinderReportRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateInsightsFinderReport(\Google\Ads\GoogleAds\V11\Services\GenerateInsightsFinderReportRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v11.services.AudienceInsightsService/GenerateInsightsFinderReport',
        $argument,
        ['\Google\Ads\GoogleAds\V11\Services\GenerateInsightsFinderReportResponse', 'decode'],
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
     * @param \Google\Ads\GoogleAds\V11\Services\ListAudienceInsightsAttributesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListAudienceInsightsAttributes(\Google\Ads\GoogleAds\V11\Services\ListAudienceInsightsAttributesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v11.services.AudienceInsightsService/ListAudienceInsightsAttributes',
        $argument,
        ['\Google\Ads\GoogleAds\V11\Services\ListAudienceInsightsAttributesResponse', 'decode'],
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
     * @param \Google\Ads\GoogleAds\V11\Services\GenerateAudienceCompositionInsightsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateAudienceCompositionInsights(\Google\Ads\GoogleAds\V11\Services\GenerateAudienceCompositionInsightsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v11.services.AudienceInsightsService/GenerateAudienceCompositionInsights',
        $argument,
        ['\Google\Ads\GoogleAds\V11\Services\GenerateAudienceCompositionInsightsResponse', 'decode'],
        $metadata, $options);
    }

}
