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
namespace Google\Ads\GoogleAds\V5\Services;

/**
 * This service allows management of links between Google Ads accounts and other
 * accounts.
 */
class AccountLinkServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the account link in full detail.
     * @param \Google\Ads\GoogleAds\V5\Services\GetAccountLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V5\Resources\AccountLink
     */
    public function GetAccountLink(\Google\Ads\GoogleAds\V5\Services\GetAccountLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v5.services.AccountLinkService/GetAccountLink',
        $argument,
        ['\Google\Ads\GoogleAds\V5\Resources\AccountLink', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates an account link.
     * @param \Google\Ads\GoogleAds\V5\Services\CreateAccountLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V5\Services\CreateAccountLinkResponse
     */
    public function CreateAccountLink(\Google\Ads\GoogleAds\V5\Services\CreateAccountLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v5.services.AccountLinkService/CreateAccountLink',
        $argument,
        ['\Google\Ads\GoogleAds\V5\Services\CreateAccountLinkResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates or removes an account link.
     * From V5, create is not supported through
     * AccountLinkService.MutateAccountLink. Please use
     * AccountLinkService.CreateAccountLink instead.
     * @param \Google\Ads\GoogleAds\V5\Services\MutateAccountLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Google\Ads\GoogleAds\V5\Services\MutateAccountLinkResponse
     */
    public function MutateAccountLink(\Google\Ads\GoogleAds\V5\Services\MutateAccountLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v5.services.AccountLinkService/MutateAccountLink',
        $argument,
        ['\Google\Ads\GoogleAds\V5\Services\MutateAccountLinkResponse', 'decode'],
        $metadata, $options);
    }

}
