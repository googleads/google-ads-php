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

use Google\ApiCore\Transport\Grpc\ForwardingServerStreamingCall;
use Grpc\ServerStreamingCall;

/**
 * Extends ForwardingServerStreamingCall with the logging functionality.
 */
class GoogleAdsLoggingServerStreamingCall extends ForwardingServerStreamingCall
{
    private $googleAdsCallLogger;
    private $lastRequestData;
    private $storedResponses;

    /**
     * Constructs the LoggingSeverStreamingCall using the inner call and logging intercepter.
     *
     * @param ServerStreamingCall|ForwardingServerStreamingCall $innerCall
     * @param array $lastRequestData
     * @param GoogleAdsCallLogger $googleAdsCallLogger
     */
    public function __construct(
        $innerCall,
        array $lastRequestData,
        GoogleAdsCallLogger $googleAdsCallLogger
    ) {
        parent::__construct($innerCall);
        $this->lastRequestData = $lastRequestData;
        $this->googleAdsCallLogger = $googleAdsCallLogger;
        if ($this->googleAdsCallLogger->isLoggingResponsesEnabled()) {
            $this->storedResponses = [];
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus()
    {
        $status = parent::getStatus();
        if (empty($this->storedResponses)) {
            $this->googleAdsCallLogger->log($this, $status, $this->lastRequestData);
        } else {
            foreach ($this->storedResponses as $response) {
                $this->googleAdsCallLogger->log($this, $status, $this->lastRequestData, $response);
            }
        }
        return $status;
    }

    /**
     * {@inheritdoc}
     */
    public function responses()
    {
        foreach ($this->innerCall->responses() as $response) {
            // To save memory, stores responses only when it's necessary.
            if ($this->googleAdsCallLogger->isLoggingResponsesEnabled()) {
                $this->storedResponses[] = $response;
            }
            yield $response;
        }
    }
}
