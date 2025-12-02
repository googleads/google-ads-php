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
namespace Google\Ads\GoogleAds\V20\Services;

/**
 * Proto file describing the UserDataService.
 *
 * Service to manage user data uploads.
 * Any uploads made to a Customer Match list through this service will be
 * eligible for matching as per the customer matching process. See
 * https://support.google.com/google-ads/answer/7474263. However, the uploads
 * made through this service will not be visible under the 'Segment members'
 * section for the Customer Match List in the Google Ads UI.
 */
class UserDataServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Uploads the given user data.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CollectionSizeError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [OfflineUserDataJobError]()
     *   [QuotaError]()
     *   [RequestError]()
     *   [UserDataError]()
     * @param \Google\Ads\GoogleAds\V20\Services\UploadUserDataRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UploadUserData(\Google\Ads\GoogleAds\V20\Services\UploadUserDataRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v20.services.UserDataService/UploadUserData',
        $argument,
        ['\Google\Ads\GoogleAds\V20\Services\UploadUserDataResponse', 'decode'],
        $metadata, $options);
    }

}
