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
namespace Google\Ads\GoogleAds\V19\Services;

/**
 * This service allows management of LocalServicesLead resources.
 */
class LocalServicesLeadServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * RPC to append Local Services Lead Conversation resources to Local Services
     * Lead resources.
     * @param \Google\Ads\GoogleAds\V19\Services\AppendLeadConversationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AppendLeadConversation(\Google\Ads\GoogleAds\V19\Services\AppendLeadConversationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v19.services.LocalServicesLeadService/AppendLeadConversation',
        $argument,
        ['\Google\Ads\GoogleAds\V19\Services\AppendLeadConversationResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * RPC to provide feedback on Local Services Lead resources.
     * @param \Google\Ads\GoogleAds\V19\Services\ProvideLeadFeedbackRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ProvideLeadFeedback(\Google\Ads\GoogleAds\V19\Services\ProvideLeadFeedbackRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v19.services.LocalServicesLeadService/ProvideLeadFeedback',
        $argument,
        ['\Google\Ads\GoogleAds\V19\Services\ProvideLeadFeedbackResponse', 'decode'],
        $metadata, $options);
    }

}
