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
 * Proto file describing the Invoice service.
 *
 * A service to fetch invoices issued for a billing setup during a given month.
 */
class InvoiceServiceGrpcClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns all invoices associated with a billing setup, for a given month.
     *
     * List of thrown errors:
     *   [AuthenticationError]()
     *   [AuthorizationError]()
     *   [FieldError]()
     *   [HeaderError]()
     *   [InternalError]()
     *   [InvoiceError]()
     *   [QuotaError]()
     *   [RequestError]()
     * @param \Google\Ads\GoogleAds\V18\Services\ListInvoicesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListInvoices(\Google\Ads\GoogleAds\V18\Services\ListInvoicesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.ads.googleads.v18.services.InvoiceService/ListInvoices',
        $argument,
        ['\Google\Ads\GoogleAds\V18\Services\ListInvoicesResponse', 'decode'],
        $metadata, $options);
    }

}
