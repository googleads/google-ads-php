<?php

/*
 * Copyright 2018 Google LLC
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

namespace Google\Ads\GoogleAds\Lib\V2;

use Google\ApiCore\Transport\Grpc\UnaryInterceptorInterface;

/**
 * Intercepts gRPC unary calls for adding the Google Ads logging mechanism.
 */
class GoogleAdsLoggingInterceptor implements UnaryInterceptorInterface
{
    private $unaryCallLogger;

    /**
     * Constructs the Google Ads logging interceptor.
     *
     * @param GoogleAdsUnaryCallLogger $unaryCallLogger the unary call logger for logging gRPC
     *     requests
     */
    public function __construct(
        GoogleAdsUnaryCallLogger $unaryCallLogger
    ) {
        $this->unaryCallLogger = $unaryCallLogger;
    }

    /**
     * @see UnaryInterceptorInterface::interceptUnaryUnary()
     *
     * @param mixed $method
     * @param mixed $argument
     * @param $deserialize
     * @param array $metadata
     * @param array $options
     * @param callable $continuation
     * @return GoogleAdsLoggingUnaryCall
     */
    public function interceptUnaryUnary(
        $method,
        $argument,
        $deserialize,
        array $metadata,
        array $options,
        callable $continuation
    ) {
        return new GoogleAdsLoggingUnaryCall(
            $continuation($method, $argument, $deserialize, $metadata, $options),
            compact('method', 'argument', 'deserialize', 'metadata', 'options'),
            $this->unaryCallLogger
        );
    }

    /**
     * Gets the Google Ads unary call logger.
     *
     * @return GoogleAdsUnaryCallLogger
     */
    public function getUnaryCallLogger()
    {
        return $this->unaryCallLogger;
    }
}
