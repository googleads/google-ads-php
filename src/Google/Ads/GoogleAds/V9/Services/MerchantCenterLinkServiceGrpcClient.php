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
 * Proto file describing the MerchantCenterLink service.
 *
 * This service allows management of links between Google Ads and Google
 * Merchant Center.
 */
class MerchantCenterLinkServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns Merchant Center links available for this customer.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\ListMerchantCenterLinksRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListMerchantCenterLinks(\Google\Ads\GoogleAds\V9\Services\ListMerchantCenterLinksRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.MerchantCenterLinkService/ListMerchantCenterLinks',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\ListMerchantCenterLinksResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the Merchant Center link in full detail.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\GetMerchantCenterLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetMerchantCenterLink(\Google\Ads\GoogleAds\V9\Services\GetMerchantCenterLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.MerchantCenterLinkService/GetMerchantCenterLink',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Resources\MerchantCenterLink', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates status or removes a Merchant Center link.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldMaskError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V9\Services\MutateMerchantCenterLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateMerchantCenterLink(\Google\Ads\GoogleAds\V9\Services\MutateMerchantCenterLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v9.services.MerchantCenterLinkService/MutateMerchantCenterLink',
        $argument,
        ['\Google\Ads\GoogleAds\V9\Services\MutateMerchantCenterLinkResponse', 'decode'],
        $metadata, $options);
    }

}
