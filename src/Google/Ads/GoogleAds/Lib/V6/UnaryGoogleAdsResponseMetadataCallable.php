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

use Google\ApiCore\Call;
use Google\ApiCore\Middleware\ResponseMetadataMiddleware;

/**
 * Callable for returning `GoogleAdsResponseMetadata` from unary calls to the API.
 */
class UnaryGoogleAdsResponseMetadataCallable
{
    use GoogleAdsMetadataTrait;

    /** @var callable $nextHandler */
    private $nextHandler;

    /**
     * Creates the `GoogleAdsResponseMetadata` callable.
     *
     * @param callable $nextHandler
     */
    public function __construct(callable $nextHandler)
    {
        $this->nextHandler = $nextHandler;
    }

    /**
     * @param Call $call the current request
     * @param array $options the optional parameters
     * @return array|\GuzzleHttp\Promise\PromiseInterface the two-member array of
     *     response and metadata if `withResponseMetadata` is specified as an option;
     *     Or else, the `Promise` interface of the next handler
     */
    public function __invoke(Call $call, array $options)
    {
        if (
            isset($options['withResponseMetadata'])
            && !empty($options['withResponseMetadata'])
        ) {
            $next = new ResponseMetadataMiddleware($this->nextHandler);
            return $next($call, $options)->then(function ($responseList) {
                list($response, $metadata) = $responseList;
                return [$response, new GoogleAdsResponseMetadata($metadata)];
            });
        } else {
            $next = $this->nextHandler;
            return $next($call, $options);
        }
    }
}
