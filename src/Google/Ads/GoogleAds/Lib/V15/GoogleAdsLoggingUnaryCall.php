<?php

/*
 * Copyright 2022 Google LLC
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

namespace Google\Ads\GoogleAds\Lib\V15;

use Google\ApiCore\Transport\Grpc\ForwardingUnaryCall;
use Grpc\UnaryCall;

/**
 * Extends ForwardingUnaryCall with logging functionality.
 */
class GoogleAdsLoggingUnaryCall extends ForwardingUnaryCall
{
    /**
     * Constructs the LoggingUnaryCall using the inner call and logging intercepter.
     *
     * @param UnaryCall|ForwardingUnaryCall $innerCall
     * @param array $lastRequestData
     * @param GoogleAdsCallLogger $googleAdsCallLogger
     */
    public function __construct(
        $innerCall,
        private array $lastRequestData,
        private GoogleAdsCallLogger $googleAdsCallLogger
    ) {
        parent::__construct($innerCall);
    }

    /**
     * {@inheritdoc}
     */
    public function wait()
    {
        [$response, $status] = parent::wait();
        $this->googleAdsCallLogger->log($this, $status, $this->lastRequestData, $response);
        return [$response, $status];
    }
}
