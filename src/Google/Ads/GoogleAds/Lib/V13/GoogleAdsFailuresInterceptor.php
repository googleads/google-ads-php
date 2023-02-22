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

namespace Google\Ads\GoogleAds\Lib\V13;

use Grpc\Interceptor;

/**
 * Intercepts gRPC calls to lazily initialize GoogleAdsFailures.
 */
class GoogleAdsFailuresInterceptor extends Interceptor
{
    /**
     * @see Interceptor::interceptUnaryUnary()
     *
     * @param mixed $method
     * @param mixed $argument
     * @param callable $deserialize
     * @param callable $continuation
     * @param array $metadata
     * @param array $options
     * @return GoogleAdsFailuresUnaryCall
     */
    public function interceptUnaryUnary(
        $method,
        $argument,
        $deserialize,
        $continuation,
        array $metadata = [],
        array $options = []
    ) {
        return new GoogleAdsFailuresUnaryCall(
            $continuation($method, $argument, $deserialize, $metadata, $options)
        );
    }
}
