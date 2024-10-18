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
 * Proto file describing the Asset service.
 *
 * Service to manage assets. Asset types can be created with AssetService are
 * YoutubeVideoAsset, MediaBundleAsset and ImageAsset. TextAsset should be
 * created with Ad inline.
 */
class AssetServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates assets. Operation statuses are returned.
     *
     * List of thrown errors:
     *   [AssetError]()
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CollectionSizeError]()
     *   [CurrencyCodeError]()
     *   [DatabaseError]()
     *   [DateError]()
     *   [DistinctError]()
     *   [FieldError]()
     *   [FieldMaskError]()
     *   [HeaderError]()
     *   [IdError]()
     *   [InternalError]()
     *   [ListOperationError]()
     *   [MediaUploadError]()
     *   [MutateError]()
     *   [NotAllowlistedError]()
     *   [NotEmptyError]()
     *   [OperatorError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     *   [SizeLimitError]()
     *   [StringFormatError]()
     *   [StringLengthError]()
     *   [UrlFieldError]()
     *   [YoutubeVideoRegistrationError]()
     * @param \Google\Ads\GoogleAds\V18\Services\MutateAssetsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateAssets(\Google\Ads\GoogleAds\V18\Services\MutateAssetsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.AssetService/MutateAssets',
        $argument,
        ['\Google\Ads\GoogleAds\V18\Services\MutateAssetsResponse', 'decode'],
        $metadata, $options);
    }

}
