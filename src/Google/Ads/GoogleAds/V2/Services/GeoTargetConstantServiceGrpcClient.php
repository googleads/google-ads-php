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
namespace Google\Ads\GoogleAds\V2\Services;

/**
 * Proto file describing the Geo target constant service.
 *
 * Service to fetch geo target constants.
 */
class GeoTargetConstantServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested geo target constant in full detail.
     * @param \Google\Ads\GoogleAds\V2\Services\GetGeoTargetConstantRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V2\Resources\GeoTargetConstant
     */
    public function GetGeoTargetConstant(\Google\Ads\GoogleAds\V2\Services\GetGeoTargetConstantRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v2.services.GeoTargetConstantService/GetGeoTargetConstant',
        $argument,
        ['\Google\Ads\GoogleAds\V2\Resources\GeoTargetConstant', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns GeoTargetConstant suggestions by location name or by resource name.
     * @param \Google\Ads\GoogleAds\V2\Services\SuggestGeoTargetConstantsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V2\Services\SuggestGeoTargetConstantsResponse
     */
    public function SuggestGeoTargetConstants(\Google\Ads\GoogleAds\V2\Services\SuggestGeoTargetConstantsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v2.services.GeoTargetConstantService/SuggestGeoTargetConstants',
        $argument,
        ['\Google\Ads\GoogleAds\V2\Services\SuggestGeoTargetConstantsResponse', 'decode'],
        $metadata, $options);
    }

}
