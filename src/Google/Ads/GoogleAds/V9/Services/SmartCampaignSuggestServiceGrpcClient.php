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
namespace Google\Ads\GoogleAds\V9\Services;

/**
 * Service to get suggestions for Smart Campaigns.
 */
class SmartCampaignSuggestServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns BudgetOption suggestions.
     * @param \Google\Ads\GoogleAds\V9\Services\SuggestSmartCampaignBudgetOptionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SuggestSmartCampaignBudgetOptions(\Google\Ads\GoogleAds\V9\Services\SuggestSmartCampaignBudgetOptionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.SmartCampaignSuggestService/SuggestSmartCampaignBudgetOptions',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\SuggestSmartCampaignBudgetOptionsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Suggests a Smart campaign ad compatible with the Ad family of resources,
     * based on data points such as targeting and the business to advertise.
     * @param \Google\Ads\GoogleAds\V9\Services\SuggestSmartCampaignAdRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SuggestSmartCampaignAd(\Google\Ads\GoogleAds\V9\Services\SuggestSmartCampaignAdRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.SmartCampaignSuggestService/SuggestSmartCampaignAd',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\SuggestSmartCampaignAdResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Suggests keyword themes to advertise on.
     * @param \Google\Ads\GoogleAds\V9\Services\SuggestKeywordThemesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SuggestKeywordThemes(\Google\Ads\GoogleAds\V9\Services\SuggestKeywordThemesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.SmartCampaignSuggestService/SuggestKeywordThemes',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\SuggestKeywordThemesResponse', 'decode'],
        $metadata, $options);
    }

}
