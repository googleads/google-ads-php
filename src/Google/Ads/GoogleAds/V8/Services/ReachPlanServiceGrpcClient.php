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
namespace Google\Ads\GoogleAds\V8\Services;

/**
 * Proto file describing the reach plan service.
 *
 * Reach Plan Service gives users information about audience size that can
 * be reached through advertisement on YouTube. In particular,
 * GenerateReachForecast provides estimated number of people of specified
 * demographics that can be reached by an ad in a given market by a campaign of
 * certain duration with a defined budget.
 */
class ReachPlanServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the list of plannable locations (for example, countries & DMAs).
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\ListPlannableLocationsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListPlannableLocations(\Google\Ads\GoogleAds\V8\Services\ListPlannableLocationsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.ReachPlanService/ListPlannableLocations',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\ListPlannableLocationsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the list of per-location plannable YouTube ad formats with allowed
     * targeting.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\ListPlannableProductsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListPlannableProducts(\Google\Ads\GoogleAds\V8\Services\ListPlannableProductsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.ReachPlanService/ListPlannableProducts',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\ListPlannableProductsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Generates a product mix ideas given a set of preferences. This method
     * helps the advertiser to obtain a good mix of ad formats and budget
     * allocations based on its preferences.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [ReachPlanError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\GenerateProductMixIdeasRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateProductMixIdeas(\Google\Ads\GoogleAds\V8\Services\GenerateProductMixIdeasRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.ReachPlanService/GenerateProductMixIdeas',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\GenerateProductMixIdeasResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Generates a reach forecast for a given targeting / product mix.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [ReachPlanError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\GenerateReachForecastRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateReachForecast(\Google\Ads\GoogleAds\V8\Services\GenerateReachForecastRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.ReachPlanService/GenerateReachForecast',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\GenerateReachForecastResponse', 'decode'],
        $metadata, $options);
    }

}
