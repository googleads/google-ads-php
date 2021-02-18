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
namespace Google\Ads\GoogleAds\V6\Services;

/**
 * Proto file describing the keyword plan campaign service.
 *
 * Service to manage Keyword Plan campaigns.
 */
class KeywordPlanCampaignServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested Keyword Plan campaign in full detail.
     * @param \Google\Ads\GoogleAds\V6\Services\GetKeywordPlanCampaignRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetKeywordPlanCampaign(\Google\Ads\GoogleAds\V6\Services\GetKeywordPlanCampaignRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v6.services.KeywordPlanCampaignService/GetKeywordPlanCampaign',
        $argument,
        ['\Google\Ads\GoogleAds\V6\Resources\KeywordPlanCampaign', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates, updates, or removes Keyword Plan campaigns. Operation statuses are
     * returned.
     * @param \Google\Ads\GoogleAds\V6\Services\MutateKeywordPlanCampaignsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateKeywordPlanCampaigns(\Google\Ads\GoogleAds\V6\Services\MutateKeywordPlanCampaignsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v6.services.KeywordPlanCampaignService/MutateKeywordPlanCampaigns',
        $argument,
        ['\Google\Ads\GoogleAds\V6\Services\MutateKeywordPlanCampaignsResponse', 'decode'],
        $metadata, $options);
    }

}
