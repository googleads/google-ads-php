<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2024 Google LLC
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
namespace Google\Ads\GoogleAds\V18\Services;

/**
 * This service allows management of product link invitations from Google Ads
 * accounts to other accounts.
 */
class ProductLinkInvitationServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates a product link invitation.
     * @param \Google\Ads\GoogleAds\V18\Services\CreateProductLinkInvitationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateProductLinkInvitation(\Google\Ads\GoogleAds\V18\Services\CreateProductLinkInvitationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.ProductLinkInvitationService/CreateProductLinkInvitation',
        $argument,
        ['\Google\Ads\GoogleAds\V18\Services\CreateProductLinkInvitationResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update a product link invitation.
     * @param \Google\Ads\GoogleAds\V18\Services\UpdateProductLinkInvitationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateProductLinkInvitation(\Google\Ads\GoogleAds\V18\Services\UpdateProductLinkInvitationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.ProductLinkInvitationService/UpdateProductLinkInvitation',
        $argument,
        ['\Google\Ads\GoogleAds\V18\Services\UpdateProductLinkInvitationResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Remove a product link invitation.
     * @param \Google\Ads\GoogleAds\V18\Services\RemoveProductLinkInvitationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RemoveProductLinkInvitation(\Google\Ads\GoogleAds\V18\Services\RemoveProductLinkInvitationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.ProductLinkInvitationService/RemoveProductLinkInvitation',
        $argument,
        ['\Google\Ads\GoogleAds\V18\Services\RemoveProductLinkInvitationResponse', 'decode'],
        $metadata, $options);
    }

}
