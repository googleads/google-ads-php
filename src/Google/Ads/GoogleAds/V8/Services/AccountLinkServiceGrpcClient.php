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
namespace Google\Ads\GoogleAds\V8\Services;

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
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\GetAccountLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetAccountLink(\Google\Ads\GoogleAds\V8\Services\GetAccountLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.AccountLinkService/GetAccountLink',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Resources\AccountLink', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates an account link.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [DatabaseError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [QuotaError]()
     *   [RequestError]()
     *   [ThirdPartyAppAnalyticsLinkError]()
     * @param \Google\Ads\GoogleAds\V8\Services\CreateAccountLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateAccountLink(\Google\Ads\GoogleAds\V8\Services\CreateAccountLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.AccountLinkService/CreateAccountLink',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\CreateAccountLinkResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates or removes an account link.
     * From V5, create is not supported through
     * AccountLinkService.MutateAccountLink. Please use
     * AccountLinkService.CreateAccountLink instead.
     *
     * List of thrown errors:
     *   [AccountLinkError]()
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldMaskError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\MutateAccountLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateAccountLink(\Google\Ads\GoogleAds\V8\Services\MutateAccountLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.AccountLinkService/MutateAccountLink',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\MutateAccountLinkResponse', 'decode'],
        $metadata, $options);
    }

}
