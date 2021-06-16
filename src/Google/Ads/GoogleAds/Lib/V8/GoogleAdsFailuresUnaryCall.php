<?php

/*
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Ads\GoogleAds\Lib\V8;

use Google\Ads\GoogleAds\Util\V8\GoogleAdsFailures;
use Google\Ads\GoogleAds\V8\Services\ListBatchJobResultsResponse;
use Google\ApiCore\Transport\Grpc\ForwardingUnaryCall;

/**
 * Extends ForwardingUnaryCall with GoogleAdsFailures lazy initialization functionality.
 */
class GoogleAdsFailuresUnaryCall extends ForwardingUnaryCall
{
    /**
     * {@inheritdoc}
     */
    public function wait()
    {
        list($response, $status) = parent::wait();

        // Partial failures and batch job results can return objects that contain GoogleAdsFailure.
        // We need to make sure that the pool is aware of this class, in order to serialize the
        // response correctly.
        if (
            $response instanceof ListBatchJobResultsResponse
            || (
                !is_null($response)
                && method_exists($response, 'getPartialFailureError')
                && !is_null($response->getPartialFailureError())
            )
        ) {
            $this->initGoogleAdsFailures();
        }

        return [$response, $status];
    }

    /**
     * Initializes the GoogleAdsFailures.
     */
    public function initGoogleAdsFailures()
    {
        GoogleAdsFailures::init();
    }
}
