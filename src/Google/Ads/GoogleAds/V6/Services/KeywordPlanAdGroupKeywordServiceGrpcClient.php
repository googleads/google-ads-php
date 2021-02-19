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
namespace Google\Ads\GoogleAds\V6\Services;

/**
 * Proto file describing the keyword plan ad group keyword service.
 *
 * Service to manage Keyword Plan ad group keywords. KeywordPlanAdGroup is
 * required to add ad group keywords. Positive and negative keywords are
 * supported. A maximum of 10,000 positive keywords are allowed per keyword
 * plan. A maximum of 1,000 negative keywords are allower per keyword plan. This
 * includes campaign negative keywords and ad group negative keywords.
 */
class KeywordPlanAdGroupKeywordServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the requested Keyword Plan ad group keyword in full detail.
     * @param \Google\Ads\GoogleAds\V6\Services\GetKeywordPlanAdGroupKeywordRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetKeywordPlanAdGroupKeyword(\Google\Ads\GoogleAds\V6\Services\GetKeywordPlanAdGroupKeywordRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v6.services.KeywordPlanAdGroupKeywordService/GetKeywordPlanAdGroupKeyword',
        $argument,
        ['\Google\Ads\GoogleAds\V6\Resources\KeywordPlanAdGroupKeyword', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates, updates, or removes Keyword Plan ad group keywords. Operation
     * statuses are returned.
     * @param \Google\Ads\GoogleAds\V6\Services\MutateKeywordPlanAdGroupKeywordsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MutateKeywordPlanAdGroupKeywords(\Google\Ads\GoogleAds\V6\Services\MutateKeywordPlanAdGroupKeywordsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v6.services.KeywordPlanAdGroupKeywordService/MutateKeywordPlanAdGroupKeywords',
        $argument,
        ['\Google\Ads\GoogleAds\V6\Services\MutateKeywordPlanAdGroupKeywordsResponse', 'decode'],
        $metadata, $options);
    }

}
