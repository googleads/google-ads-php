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
namespace Google\Ads\GoogleAds\V20\Services;

/**
 * Service to retrieve Travel asset suggestions.
 */
class TravelAssetSuggestionServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns Travel Asset suggestions. Asset
     * suggestions are returned on a best-effort basis. There are no guarantees
     * that all possible asset types will be returned for any given hotel
     * property.
     * @param \Google\Ads\GoogleAds\V20\Services\SuggestTravelAssetsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SuggestTravelAssets(\Google\Ads\GoogleAds\V20\Services\SuggestTravelAssetsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v20.services.TravelAssetSuggestionService/SuggestTravelAssets',
        $argument,
        ['\Google\Ads\GoogleAds\V20\Services\SuggestTravelAssetsResponse', 'decode'],
        $metadata, $options);
    }

}
