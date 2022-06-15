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

namespace Google\Ads\GoogleAds\Lib\V11;

use Grpc\Interceptor;

/**
 * Intercepts gRPC calls for adding the Google Ads logging mechanism.
 */
class GoogleAdsLoggingInterceptor extends Interceptor
{
    private $callLogger;

    /**
     * Constructs the Google Ads logging interceptor.
     *
     * @param GoogleAdsCallLogger $callLogger the call logger for logging gRPC requests
     */
    public function __construct(GoogleAdsCallLogger $callLogger)
    {
        $this->callLogger = $callLogger;
    }

    /**
     * @see Interceptor::interceptUnaryUnary()
     *
     * @param mixed $method
     * @param mixed $argument
     * @param callable $deserialize
     * @param callable $continuation
     * @param array $metadata
     * @param array $options
     * @return GoogleAdsLoggingUnaryCall
     */
    public function interceptUnaryUnary(
        $method,
        $argument,
        $deserialize,
        $continuation,
        array $metadata = [],
        array $options = []
    ) {
        return new GoogleAdsLoggingUnaryCall(
            $continuation($method, $argument, $deserialize, $metadata, $options),
            compact('method', 'argument', 'deserialize', 'metadata', 'options'),
            $this->callLogger
        );
    }

    /**
     * @see Interceptor::interceptUnaryStream()
     *
     * @param mixed $method
     * @param mixed $argument
     * @param callable $deserialize
     * @param callable $continuation
     * @param array $metadata
     * @param array $options
     * @return GoogleAdsLoggingServerStreamingCall
     */
    public function interceptUnaryStream(
        $method,
        $argument,
        $deserialize,
        $continuation,
        array $metadata = [],
        array $options = []
    ) {
        return new GoogleAdsLoggingServerStreamingCall(
            $continuation($method, $argument, $deserialize, $metadata, $options),
            compact('method', 'argument', 'deserialize', 'metadata', 'options'),
            $this->callLogger
        );
    }

    /**
     * Gets the Google Ads call logger.
     *
     * @return GoogleAdsCallLogger
     */
    public function getCallLogger()
    {
        return $this->callLogger;
    }
}
