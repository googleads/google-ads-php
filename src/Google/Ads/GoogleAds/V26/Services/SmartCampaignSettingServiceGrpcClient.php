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
namespace Google\Ads\GoogleAds\V26\Services;

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
     * @param \Google\Ads\GoogleAds\V26\Services\GetSmartCampaignStatusRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Google\Ads\GoogleAds\V26\Services\GetSmartCampaignStatusResponse>
     */
    public function GetSmartCampaignStatus(\Google\Ads\GoogleAds\V26\Services\GetSmartCampaignStatusRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v26.services.SmartCampaignSettingService/GetSmartCampaignStatus',
        $argument,
        ['\Google\Ads\GoogleAds\V26\Services\GetSmartCampaignStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates Smart campaign settings for campaigns.
     * @param \Google\Ads\GoogleAds\V26\Services\MutateSmartCampaignSettingsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Google\Ads\GoogleAds\V26\Services\MutateSmartCampaignSettingsResponse>
     */
    public function MutateSmartCampaignSettings(\Google\Ads\GoogleAds\V26\Services\MutateSmartCampaignSettingsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v26.services.SmartCampaignSettingService/MutateSmartCampaignSettings',
        $argument,
        ['\Google\Ads\GoogleAds\V26\Services\MutateSmartCampaignSettingsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Generates a Performance Max (PMax) draft campaign from an existing Smart
     * campaign, initialized with a status of [CampaignStatus.PAUSED] and a
     * creation status of [CampaignCreationStatus.INCOMPLETE]. Returns the draft
     * PMax campaign ID and related entity IDs.
     *
     * Note:
     * * Images are required for the draft PMax campaign to pass validation, so
     *   system default placeholder images are added automatically. Review and
     *   update the target images after the draft PMax campaign is generated.
     * * Verify that the EU political advertising status
     *   ([Campaign.contains_eu_political_advertising]) is accurate. By default,
     *   this field is set to
     *   [EuPoliticalAdvertisingStatus.DOES_NOT_CONTAIN_EU_POLITICAL_ADVERTISING]
     *   to satisfy Performance Max campaign validation requirements.
     * @param \Google\Ads\GoogleAds\V26\Services\GeneratePMaxDraftCampaignRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Google\Ads\GoogleAds\V26\Services\GeneratePMaxDraftCampaignResponse>
     */
    public function GeneratePMaxDraftCampaign(\Google\Ads\GoogleAds\V26\Services\GeneratePMaxDraftCampaignRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v26.services.SmartCampaignSettingService/GeneratePMaxDraftCampaign',
        $argument,
        ['\Google\Ads\GoogleAds\V26\Services\GeneratePMaxDraftCampaignResponse', 'decode'],
        $metadata, $options);
    }

}
