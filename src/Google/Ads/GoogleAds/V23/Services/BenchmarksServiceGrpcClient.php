<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2026 Google LLC
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
namespace Google\Ads\GoogleAds\V23\Services;

/**
 * Proto file describing the benchmarks service.
 *
 * BenchmarksService helps users compare YouTube advertisement data against
 * industry benchmarks. Accessible to allowlisted customers only.
 */
class BenchmarksServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns a date range that supports benchmarks.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V23\Services\ListBenchmarksAvailableDatesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListBenchmarksAvailableDates(\Google\Ads\GoogleAds\V23\Services\ListBenchmarksAvailableDatesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v23.services.BenchmarksService/ListBenchmarksAvailableDates',
        $argument,
        ['\Google\Ads\GoogleAds\V23\Services\ListBenchmarksAvailableDatesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the list of locations that support benchmarks (for example,
     * countries).
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V23\Services\ListBenchmarksLocationsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListBenchmarksLocations(\Google\Ads\GoogleAds\V23\Services\ListBenchmarksLocationsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v23.services.BenchmarksService/ListBenchmarksLocations',
        $argument,
        ['\Google\Ads\GoogleAds\V23\Services\ListBenchmarksLocationsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the list of products that supports benchmarks.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V23\Services\ListBenchmarksProductsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListBenchmarksProducts(\Google\Ads\GoogleAds\V23\Services\ListBenchmarksProductsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v23.services.BenchmarksService/ListBenchmarksProducts',
        $argument,
        ['\Google\Ads\GoogleAds\V23\Services\ListBenchmarksProductsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the list of benchmarks sources (for example, Industry Verticals).
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V23\Services\ListBenchmarksSourcesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListBenchmarksSources(\Google\Ads\GoogleAds\V23\Services\ListBenchmarksSourcesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v23.services.BenchmarksService/ListBenchmarksSources',
        $argument,
        ['\Google\Ads\GoogleAds\V23\Services\ListBenchmarksSourcesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns YouTube advertisement metrics for the given client against industry
     * benchmarks.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [BenchmarksError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V23\Services\GenerateBenchmarksMetricsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateBenchmarksMetrics(\Google\Ads\GoogleAds\V23\Services\GenerateBenchmarksMetricsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v23.services.BenchmarksService/GenerateBenchmarksMetrics',
        $argument,
        ['\Google\Ads\GoogleAds\V23\Services\GenerateBenchmarksMetricsResponse', 'decode'],
        $metadata, $options);
    }

}
