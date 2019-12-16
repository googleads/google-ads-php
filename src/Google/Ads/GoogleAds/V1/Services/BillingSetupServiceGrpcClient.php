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
 * Proto file describing the BillingSetup service.
 *
 * A service for designating the business entity responsible for accrued costs.
 *
 * A billing setup is associated with a payments account.  Billing-related
 * activity for all billing setups associated with a particular payments account
 * will appear on a single invoice generated monthly.
 *
 * Mutates:
 * The REMOVE operation cancels a pending billing setup.
 * The CREATE operation creates a new billing setup.
 */
class BillingSetupServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns a billing setup.
     * @param \Google\Ads\GoogleAds\V1\Services\GetBillingSetupRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetBillingSetup(\Google\Ads\GoogleAds\V1\Services\GetBillingSetupRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v1.services.BillingSetupService/GetBillingSetup',
        $argument,
        ['\Google\Ads\GoogleAds\V1\Resources\BillingSetup', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates a billing setup, or cancels an existing billing setup.
     * @param \Google\Ads\GoogleAds\V1\Services\MutateBillingSetupRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function MutateBillingSetup(\Google\Ads\GoogleAds\V1\Services\MutateBillingSetupRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v1.services.BillingSetupService/MutateBillingSetup',
        $argument,
        ['\Google\Ads\GoogleAds\V1\Services\MutateBillingSetupResponse', 'decode'],
        $metadata, $options);
    }

}
