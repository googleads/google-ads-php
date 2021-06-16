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
 * Proto file describing the ExtensionFeedItem service.
 *
 * Service to manage extension feed items.
 */
class ExtensionFeedItemServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested extension feed item in full detail.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\GetExtensionFeedItemRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetExtensionFeedItem(\Google\Ads\GoogleAds\V8\Services\GetExtensionFeedItemRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.ExtensionFeedItemService/GetExtensionFeedItem',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Resources\ExtensionFeedItem', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates, updates, or removes extension feed items. Operation
     * statuses are returned.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CollectionSizeError]()
     *   [CountryCodeError]()
     *   [DatabaseError]()
     *   [DateError]()
     *   [DistinctError]()
     *   [ExtensionFeedItemError]()
     *   [FieldError]()
     *   [FieldMaskError]()
     *   [HeaderError]()
     *   [ImageError]()
     *   [InternalError]()
     *   [LanguageCodeError]()
     *   [MutateError]()
     *   [NewResourceCreationError]()
     *   [OperationAccessDeniedError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     *   [SizeLimitError]()
     *   [StringLengthError]()
     *   [UrlFieldError]()
     * @param \Google\Ads\GoogleAds\V8\Services\MutateExtensionFeedItemsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateExtensionFeedItems(\Google\Ads\GoogleAds\V8\Services\MutateExtensionFeedItemsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.ExtensionFeedItemService/MutateExtensionFeedItems',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\MutateExtensionFeedItemsResponse', 'decode'],
        $metadata, $options);
    }

}
