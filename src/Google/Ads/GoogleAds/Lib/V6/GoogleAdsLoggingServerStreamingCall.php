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

namespace Google\Ads\GoogleAds\Lib\V6;

use Google\ApiCore\Transport\Grpc\ForwardingServerStreamingCall;
use Grpc\ServerStreamingCall;

/**
 * Extends ForwardingServerStreamingCall with logging functionality.
 */
class GoogleAdsLoggingServerStreamingCall extends ForwardingServerStreamingCall
{
    private $googleAdsCallLogger;
    private $lastRequestData;
    private $savedResponses;

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
        $this->savedResponses = [];
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus()
    {
        $status = parent::getStatus();
        if (empty($this->savedResponses)) {
            $this->logSummaryAndDetails($status);
        } else {
            foreach ($this->savedResponses as $response) {
                $this->logSummaryAndDetails($status, $response);
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
            $this->savedResponses[] = $response;
            yield $response;
        }
    }

    /**
     * Logs summary and the details of the given status and response.
     *
     * @param object|null $status the status to be logged
     * @param object|null $response the response to be logged
     */
    private function logSummaryAndDetails(object $status, ?object $response = null)
    {
        $this->googleAdsCallLogger->logSummary(
            $this->lastRequestData,
            compact('response', 'status') + ['call' => $this]
        );
        $this->googleAdsCallLogger->logDetails(
            $this->lastRequestData,
            compact('response', 'status') + ['call' => $this]
        );
    }
}
