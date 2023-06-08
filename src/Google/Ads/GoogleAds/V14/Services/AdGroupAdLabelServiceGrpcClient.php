<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2023 Google LLC
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
namespace Google\Ads\GoogleAds\V14\Services;

/**
 * Proto file describing the Ad Group Ad Label service.
 *
 * Service to manage labels on ad group ads.
 */
class AdGroupAdLabelServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates and removes ad group ad labels.
     * Operation statuses are returned.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [DatabaseError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [LabelError]()
     *   [MutateError]()
     *   [NewResourceCreationError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V14\Services\MutateAdGroupAdLabelsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateAdGroupAdLabels(\Google\Ads\GoogleAds\V14\Services\MutateAdGroupAdLabelsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v14.services.AdGroupAdLabelService/MutateAdGroupAdLabels',
        $argument,
        ['\Google\Ads\GoogleAds\V14\Services\MutateAdGroupAdLabelsResponse', 'decode'],
        $metadata, $options);
    }

}
