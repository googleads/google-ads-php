<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2019 Google LLC.
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
//
namespace Google\Ads\GoogleAds\V1\Services;

/**
 * Proto file describing the FeedItemTarget service.
 *
 * Service to manage feed item targets.
 */
class FeedItemTargetServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested feed item targets in full detail.
     * @param \Google\Ads\GoogleAds\V1\Services\GetFeedItemTargetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetFeedItemTarget(\Google\Ads\GoogleAds\V1\Services\GetFeedItemTargetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v1.services.FeedItemTargetService/GetFeedItemTarget',
        $argument,
        ['\Google\Ads\GoogleAds\V1\Resources\FeedItemTarget', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates or removes feed item targets. Operation statuses are returned.
     * @param \Google\Ads\GoogleAds\V1\Services\MutateFeedItemTargetsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function MutateFeedItemTargets(\Google\Ads\GoogleAds\V1\Services\MutateFeedItemTargetsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v1.services.FeedItemTargetService/MutateFeedItemTargets',
        $argument,
        ['\Google\Ads\GoogleAds\V1\Services\MutateFeedItemTargetsResponse', 'decode'],
        $metadata, $options);
    }

}
