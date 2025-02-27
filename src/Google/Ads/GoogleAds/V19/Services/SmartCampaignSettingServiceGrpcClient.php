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
 * Proto file describing the Smart campaign setting service.
 *
 * Service to manage Smart campaign settings.
 */
class SmartCampaignSettingServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the status of the requested Smart campaign.
     * @param \Google\Ads\GoogleAds\V19\Services\GetSmartCampaignStatusRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetSmartCampaignStatus(\Google\Ads\GoogleAds\V19\Services\GetSmartCampaignStatusRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v19.services.SmartCampaignSettingService/GetSmartCampaignStatus',
        $argument,
        ['\Google\Ads\GoogleAds\V19\Services\GetSmartCampaignStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates Smart campaign settings for campaigns.
     * @param \Google\Ads\GoogleAds\V19\Services\MutateSmartCampaignSettingsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateSmartCampaignSettings(\Google\Ads\GoogleAds\V19\Services\MutateSmartCampaignSettingsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v19.services.SmartCampaignSettingService/MutateSmartCampaignSettings',
        $argument,
        ['\Google\Ads\GoogleAds\V19\Services\MutateSmartCampaignSettingsResponse', 'decode'],
        $metadata, $options);
    }

}
