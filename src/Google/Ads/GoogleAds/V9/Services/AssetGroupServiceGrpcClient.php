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
 * Proto file describing the AssetGroup service.
 *
 * Service to manage asset group
 */
class AssetGroupServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested asset group in full detail.
     * @param \Google\Ads\GoogleAds\V9\Services\GetAssetGroupRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetAssetGroup(\Google\Ads\GoogleAds\V9\Services\GetAssetGroupRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.AssetGroupService/GetAssetGroup',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Resources\AssetGroup', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates, updates or removes asset groups. Operation statuses are
     * returned.
     * @param \Google\Ads\GoogleAds\V9\Services\MutateAssetGroupsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateAssetGroups(\Google\Ads\GoogleAds\V9\Services\MutateAssetGroupsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.AssetGroupService/MutateAssetGroups',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\MutateAssetGroupsResponse', 'decode'],
        $metadata, $options);
    }

}
