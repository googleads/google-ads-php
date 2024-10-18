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
 * Proto file describing the Ad Group Ad service.
 *
 * Service to manage ads in an ad group.
 */
class AdGroupAdServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates, updates, or removes ads. Operation statuses are returned.
     *
     * List of thrown errors:
     *   [AdCustomizerError]()
     *   [AdError]()
     *   [AdGroupAdError]()
     *   [AdSharingError]()
     *   [AdxError]()
     *   [AssetError]()
     *   [AssetLinkError]()
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CollectionSizeError]()
     *   [ContextError]()
     *   [DatabaseError]()
     *   [DateError]()
     *   [DistinctError]()
     *   [FeedAttributeReferenceError]()
     *   [FieldError]()
     *   [FieldMaskError]()
     *   [FunctionError]()
     *   [FunctionParsingError]()
     *   [HeaderError]()
     *   [IdError]()
     *   [ImageError]()
     *   [InternalError]()
     *   [ListOperationError]()
     *   [MediaBundleError]()
     *   [MediaFileError]()
     *   [MutateError]()
     *   [NewResourceCreationError]()
     *   [NotEmptyError]()
     *   [NullError]()
     *   [OperationAccessDeniedError]()
     *   [OperatorError]()
     *   [PolicyFindingError]()
     *   [PolicyValidationParameterError]()
     *   [PolicyViolationError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     *   [ResourceCountLimitExceededError]()
     *   [SizeLimitError]()
     *   [StringFormatError]()
     *   [StringLengthError]()
     *   [UrlFieldError]()
     * @param \Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateAdGroupAds(\Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.AdGroupAdService/MutateAdGroupAds',
        $argument,
        ['\Google\Ads\GoogleAds\V18\Services\MutateAdGroupAdsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Remove automatically created assets from an ad.
     *
     * List of thrown errors:
     *   [AdError]()
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [AutomaticallyCreatedAssetRemovalError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V18\Services\RemoveAutomaticallyCreatedAssetsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RemoveAutomaticallyCreatedAssets(\Google\Ads\GoogleAds\V18\Services\RemoveAutomaticallyCreatedAssetsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.AdGroupAdService/RemoveAutomaticallyCreatedAssets',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

}
