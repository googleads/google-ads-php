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
 * Proto file describing the GoogleAdsService.
 *
 * Service to fetch data and metrics across resources.
 */
class GoogleAdsServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns all rows that match the search query.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [ChangeEventError]()
     *   [ChangeStatusError]()
     *   [ClickViewError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QueryError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\SearchGoogleAdsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Search(\Google\Ads\GoogleAds\V8\Services\SearchGoogleAdsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.GoogleAdsService/Search',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\SearchGoogleAdsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns all rows that match the search stream query.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [ChangeEventError]()
     *   [ChangeStatusError]()
     *   [ClickViewError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QueryError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\SearchGoogleAdsStreamRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function SearchStream(\Google\Ads\GoogleAds\V8\Services\SearchGoogleAdsStreamRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/google.ads.googleads.v8.services.GoogleAdsService/SearchStream',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\SearchGoogleAdsStreamResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates, updates, or removes resources. This method supports atomic
     * transactions with multiple types of resources. For example, you can
     * atomically create a campaign and a campaign budget, or perform up to
     * thousands of mutates atomically.
     *
     * This method is essentially a wrapper around a series of mutate methods. The
     * only features it offers over calling those methods directly are:
     *
     * - Atomic transactions
     * - Temp resource names (described below)
     * - Somewhat reduced latency over making a series of mutate calls
     *
     * Note: Only resources that support atomic transactions are included, so this
     * method can't replace all calls to individual services.
     *
     * ## Atomic Transaction Benefits
     *
     * Atomicity makes error handling much easier. If you're making a series of
     * changes and one fails, it can leave your account in an inconsistent state.
     * With atomicity, you either reach the desired state directly, or the request
     * fails and you can retry.
     *
     * ## Temp Resource Names
     *
     * Temp resource names are a special type of resource name used to create a
     * resource and reference that resource in the same request. For example, if a
     * campaign budget is created with `resource_name` equal to
     * `customers/123/campaignBudgets/-1`, that resource name can be reused in
     * the `Campaign.budget` field in the same request. That way, the two
     * resources are created and linked atomically.
     *
     * To create a temp resource name, put a negative number in the part of the
     * name that the server would normally allocate.
     *
     * Note:
     *
     * - Resources must be created with a temp name before the name can be reused.
     *   For example, the previous CampaignBudget+Campaign example would fail if
     *   the mutate order was reversed.
     * - Temp names are not remembered across requests.
     * - There's no limit to the number of temp names in a request.
     * - Each temp name must use a unique negative number, even if the resource
     *   types differ.
     *
     * ## Latency
     *
     * It's important to group mutates by resource type or the request may time
     * out and fail. Latency is roughly equal to a series of calls to individual
     * mutate methods, where each change in resource type is a new call. For
     * example, mutating 10 campaigns then 10 ad groups is like 2 calls, while
     * mutating 1 campaign, 1 ad group, 1 campaign, 1 ad group is like 4 calls.
     *
     * List of thrown errors:
     *   [AdCustomizerError]()
     *   [AdError]()
     *   [AdGroupAdError]()
     *   [AdGroupCriterionError]()
     *   [AdGroupError]()
     *   [AssetError]()
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [BiddingError]()
     *   [CampaignBudgetError]()
     *   [CampaignCriterionError]()
     *   [CampaignError]()
     *   [CampaignExperimentError]()
     *   [CampaignSharedSetError]()
     *   [CollectionSizeError]()
     *   [ContextError]()
     *   [ConversionActionError]()
     *   [CriterionError]()
     *   [CustomerFeedError]()
     *   [DatabaseError]()
     *   [DateError]()
     *   [DateRangeError]()
     *   [DistinctError]()
     *   [ExtensionFeedItemError]()
     *   [ExtensionSettingError]()
     *   [FeedAttributeReferenceError]()
     *   [FeedError]()
     *   [FeedItemError]()
     *   [FeedItemSetError]()
     *   [FieldError]()
     *   [FieldMaskError]()
     *   [FunctionParsingError]()
     *   [HeaderError]()
     *   [ImageError]()
     *   [InternalError]()
     *   [KeywordPlanAdGroupKeywordError]()
     *   [KeywordPlanCampaignError]()
     *   [KeywordPlanError]()
     *   [LabelError]()
     *   [ListOperationError]()
     *   [MediaUploadError]()
     *   [MutateError]()
     *   [NewResourceCreationError]()
     *   [NullError]()
     *   [OperationAccessDeniedError]()
     *   [PolicyFindingError]()
     *   [PolicyViolationError]()
     *   [QuotaError]()
     *   [RangeError]()
     *   [RequestError]()
     *   [ResourceCountLimitExceededError]()
     *   [SettingError]()
     *   [SharedSetError]()
     *   [SizeLimitError]()
     *   [StringFormatError]()
     *   [StringLengthError]()
     *   [UrlFieldError]()
     *   [UserListError]()
     *   [YoutubeVideoRegistrationError]()
     * @param \Google\Ads\GoogleAds\V8\Services\MutateGoogleAdsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Mutate(\Google\Ads\GoogleAds\V8\Services\MutateGoogleAdsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.GoogleAdsService/Mutate',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\MutateGoogleAdsResponse', 'decode'],
        $metadata, $options);
    }

}
