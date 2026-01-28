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
 * Service to support incentive related operations.
 */
class IncentiveServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns incentives for a given user.
     * @param \Google\Ads\GoogleAds\V23\Services\FetchIncentiveRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function FetchIncentive(\Google\Ads\GoogleAds\V23\Services\FetchIncentiveRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v23.services.IncentiveService/FetchIncentive',
        $argument,
        ['\Google\Ads\GoogleAds\V23\Services\FetchIncentiveResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Applies the incentive for the ads customer.
     * @param \Google\Ads\GoogleAds\V23\Services\ApplyIncentiveRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ApplyIncentive(\Google\Ads\GoogleAds\V23\Services\ApplyIncentiveRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v23.services.IncentiveService/ApplyIncentive',
        $argument,
        ['\Google\Ads\GoogleAds\V23\Services\ApplyIncentiveResponse', 'decode'],
        $metadata, $options);
    }

}
