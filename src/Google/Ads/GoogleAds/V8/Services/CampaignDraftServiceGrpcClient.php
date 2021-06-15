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
 * Proto file describing the Campaign Draft service.
 *
 * Service to manage campaign drafts.
 */
class CampaignDraftServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested campaign draft in full detail.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\GetCampaignDraftRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetCampaignDraft(\Google\Ads\GoogleAds\V8\Services\GetCampaignDraftRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.CampaignDraftService/GetCampaignDraft',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Resources\CampaignDraft', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates, updates, or removes campaign drafts. Operation statuses are
     * returned.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CampaignDraftError]()
     *   [DatabaseError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [MutateError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\MutateCampaignDraftsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateCampaignDrafts(\Google\Ads\GoogleAds\V8\Services\MutateCampaignDraftsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.CampaignDraftService/MutateCampaignDrafts',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\MutateCampaignDraftsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Promotes the changes in a draft back to the base campaign.
     *
     * This method returns a Long Running Operation (LRO) indicating if the
     * Promote is done. Use [Operations.GetOperation] to poll the LRO until it
     * is done. Only a done status is returned in the response. See the status
     * in the Campaign Draft resource to determine if the promotion was
     * successful. If the LRO failed, use
     * [CampaignDraftService.ListCampaignDraftAsyncErrors][google.ads.googleads.v8.services.CampaignDraftService.ListCampaignDraftAsyncErrors] to view the list of
     * error reasons.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [CampaignDraftError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\PromoteCampaignDraftRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function PromoteCampaignDraft(\Google\Ads\GoogleAds\V8\Services\PromoteCampaignDraftRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.CampaignDraftService/PromoteCampaignDraft',
        $argument,
        ['\Google\LongRunning\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns all errors that occurred during CampaignDraft promote. Throws an
     * error if called before campaign draft is promoted.
     * Supports standard list paging.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V8\Services\ListCampaignDraftAsyncErrorsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListCampaignDraftAsyncErrors(\Google\Ads\GoogleAds\V8\Services\ListCampaignDraftAsyncErrorsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v8.services.CampaignDraftService/ListCampaignDraftAsyncErrors',
        $argument,
        ['\Google\Ads\GoogleAds\V8\Services\ListCampaignDraftAsyncErrorsResponse', 'decode'],
        $metadata, $options);
    }

}
