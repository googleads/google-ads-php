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
 * Service to upload conversions.
 */
class ConversionUploadServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Processes the given click conversions.
     * @param \Google\Ads\GoogleAds\V3\Services\UploadClickConversionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V3\Services\UploadClickConversionsResponse
     */
    public function UploadClickConversions(\Google\Ads\GoogleAds\V3\Services\UploadClickConversionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v3.services.ConversionUploadService/UploadClickConversions',
        $argument,
        ['\Google\Ads\GoogleAds\V3\Services\UploadClickConversionsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Processes the given call conversions.
     * @param \Google\Ads\GoogleAds\V3\Services\UploadCallConversionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V3\Services\UploadCallConversionsResponse
     */
    public function UploadCallConversions(\Google\Ads\GoogleAds\V3\Services\UploadCallConversionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v3.services.ConversionUploadService/UploadCallConversions',
        $argument,
        ['\Google\Ads\GoogleAds\V3\Services\UploadCallConversionsResponse', 'decode'],
        $metadata, $options);
    }

}
