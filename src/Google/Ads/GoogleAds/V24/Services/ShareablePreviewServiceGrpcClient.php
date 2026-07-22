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
namespace Google\Ads\GoogleAds\V24\Services;

/**
 * Service to generate Shareable Previews.
 *
 * Only Performance Max asset groups and certain YouTube video/audio ad formats
 * are supported. Other ad types, such as Responsive Search Ads or Responsive
 * Display Ads, are not supported and return an `UNSUPPORTED_AD_TYPE` error.
 *
 * The generated preview URLs cannot be embedded in an iframe because the
 * response headers include `X-Frame-Options: deny`.
 */
class ShareablePreviewServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested Shareable Preview.
     * @param \Google\Ads\GoogleAds\V24\Services\GenerateShareablePreviewsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Google\Ads\GoogleAds\V24\Services\GenerateShareablePreviewsResponse>
     */
    public function GenerateShareablePreviews(\Google\Ads\GoogleAds\V24\Services\GenerateShareablePreviewsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v24.services.ShareablePreviewService/GenerateShareablePreviews',
        $argument,
        ['\Google\Ads\GoogleAds\V24\Services\GenerateShareablePreviewsResponse', 'decode'],
        $metadata, $options);
    }

}
