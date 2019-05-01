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
 * Proto file describing the keyword plan ad group service.
 *
 * Service to manage Keyword Plan ad groups.
 */
class KeywordPlanAdGroupServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested Keyword Plan ad group in full detail.
     * @param \Google\Ads\GoogleAds\V1\Services\GetKeywordPlanAdGroupRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetKeywordPlanAdGroup(\Google\Ads\GoogleAds\V1\Services\GetKeywordPlanAdGroupRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v1.services.KeywordPlanAdGroupService/GetKeywordPlanAdGroup',
        $argument,
        ['\Google\Ads\GoogleAds\V1\Resources\KeywordPlanAdGroup', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates, updates, or removes Keyword Plan ad groups. Operation statuses are
     * returned.
     * @param \Google\Ads\GoogleAds\V1\Services\MutateKeywordPlanAdGroupsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function MutateKeywordPlanAdGroups(\Google\Ads\GoogleAds\V1\Services\MutateKeywordPlanAdGroupsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v1.services.KeywordPlanAdGroupService/MutateKeywordPlanAdGroups',
        $argument,
        ['\Google\Ads\GoogleAds\V1\Services\MutateKeywordPlanAdGroupsResponse', 'decode'],
        $metadata, $options);
    }

}
