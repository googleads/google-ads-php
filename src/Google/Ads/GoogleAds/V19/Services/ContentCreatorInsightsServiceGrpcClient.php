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
 * Proto file describing the content creator insights service.
 *
 * Content Creator Insights Service helps users find information about YouTube
 * Creators and their content and how these creators and their audiences can be
 * reached with Google Ads. Accessible to allowlisted customers only.
 */
class ContentCreatorInsightsServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns insights for a collection of YouTube Creators and Channels.
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
     * @param \Google\Ads\GoogleAds\V19\Services\GenerateCreatorInsightsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateCreatorInsights(\Google\Ads\GoogleAds\V19\Services\GenerateCreatorInsightsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v19.services.ContentCreatorInsightsService/GenerateCreatorInsights',
        $argument,
        ['\Google\Ads\GoogleAds\V19\Services\GenerateCreatorInsightsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns insights for trending content on YouTube.
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
     * @param \Google\Ads\GoogleAds\V19\Services\GenerateTrendingInsightsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateTrendingInsights(\Google\Ads\GoogleAds\V19\Services\GenerateTrendingInsightsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v19.services.ContentCreatorInsightsService/GenerateTrendingInsights',
        $argument,
        ['\Google\Ads\GoogleAds\V19\Services\GenerateTrendingInsightsResponse', 'decode'],
        $metadata, $options);
    }

}
