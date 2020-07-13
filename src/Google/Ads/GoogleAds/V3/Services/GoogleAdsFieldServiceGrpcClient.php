<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2020 Google LLC
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
namespace Google\Ads\GoogleAds\V3\Services;

/**
 * Proto file describing the GoogleAdsFieldService
 *
 * Service to fetch Google Ads API fields.
 */
class GoogleAdsFieldServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns just the requested field.
     * @param \Google\Ads\GoogleAds\V3\Services\GetGoogleAdsFieldRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V3\Resources\GoogleAdsField
     */
    public function GetGoogleAdsField(\Google\Ads\GoogleAds\V3\Services\GetGoogleAdsFieldRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v3.services.GoogleAdsFieldService/GetGoogleAdsField',
        $argument,
        ['\Google\Ads\GoogleAds\V3\Resources\GoogleAdsField', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns all fields that match the search query.
     * @param \Google\Ads\GoogleAds\V3\Services\SearchGoogleAdsFieldsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V3\Services\SearchGoogleAdsFieldsResponse
     */
    public function SearchGoogleAdsFields(\Google\Ads\GoogleAds\V3\Services\SearchGoogleAdsFieldsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v3.services.GoogleAdsFieldService/SearchGoogleAdsFields',
        $argument,
        ['\Google\Ads\GoogleAds\V3\Services\SearchGoogleAdsFieldsResponse', 'decode'],
        $metadata, $options);
    }

}
