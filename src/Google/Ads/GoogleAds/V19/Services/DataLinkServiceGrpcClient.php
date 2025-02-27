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
namespace Google\Ads\GoogleAds\V19\Services;

/**
 * This service allows management of data links between  a Google
 * Ads customer and another data entity.
 */
class DataLinkServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates a data link. The requesting Google Ads account name and account ID
     * will be shared with the third party (such as YouTube creators for video
     * links) to whom you are creating the link with. Only customers on the
     * allow-list can create data links.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [DatabaseError]()
     *   [DataLinkError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V19\Services\CreateDataLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateDataLink(\Google\Ads\GoogleAds\V19\Services\CreateDataLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v19.services.DataLinkService/CreateDataLink',
        $argument,
        ['\Google\Ads\GoogleAds\V19\Services\CreateDataLinkResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Remove a data link.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [DatabaseError]()
     *   [DataLinkError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V19\Services\RemoveDataLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RemoveDataLink(\Google\Ads\GoogleAds\V19\Services\RemoveDataLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v19.services.DataLinkService/RemoveDataLink',
        $argument,
        ['\Google\Ads\GoogleAds\V19\Services\RemoveDataLinkResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update a data link.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [DatabaseError]()
     *   [DataLinkError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V19\Services\UpdateDataLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateDataLink(\Google\Ads\GoogleAds\V19\Services\UpdateDataLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v19.services.DataLinkService/UpdateDataLink',
        $argument,
        ['\Google\Ads\GoogleAds\V19\Services\UpdateDataLinkResponse', 'decode'],
        $metadata, $options);
    }

}
