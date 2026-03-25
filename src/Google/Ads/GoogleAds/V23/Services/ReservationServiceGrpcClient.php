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
 * Service for reservation related operations.
 * This service is not publicly available.
 */
class ReservationServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Proposes quotes for booking campaigns.
     * This request can have a latency of 30 seconds.
     * @param \Google\Ads\GoogleAds\V23\Services\QuoteCampaignsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Google\Ads\GoogleAds\V23\Services\QuoteCampaignsResponse>
     */
    public function QuoteCampaigns(\Google\Ads\GoogleAds\V23\Services\QuoteCampaignsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v23.services.ReservationService/QuoteCampaigns',
        $argument,
        ['\Google\Ads\GoogleAds\V23\Services\QuoteCampaignsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Books the requested campaigns.
     * This request can have a latency of 30 seconds.
     * @param \Google\Ads\GoogleAds\V23\Services\BookCampaignsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Google\Ads\GoogleAds\V23\Services\BookCampaignsResponse>
     */
    public function BookCampaigns(\Google\Ads\GoogleAds\V23\Services\BookCampaignsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v23.services.ReservationService/BookCampaigns',
        $argument,
        ['\Google\Ads\GoogleAds\V23\Services\BookCampaignsResponse', 'decode'],
        $metadata, $options);
    }

}
