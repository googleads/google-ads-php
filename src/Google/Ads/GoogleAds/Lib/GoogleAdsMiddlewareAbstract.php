<?php

/*
 * Copyright 2021 Google LLC
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

namespace Google\Ads\GoogleAds\Lib;

use Google\ApiCore\Call;

/**
 * Participant in processing a server request and response.
 *
 * This can be replaced by Psr\Http\Server\MiddlewareInterface (PSR-15) when GAX PHP supports it.
 */
abstract class GoogleAdsMiddlewareAbstract
{
    /** @var callable */
    private $nextHandler;

    /**
     * Creates a new Google Ads middleware.
     *
     * @param callable|null $nextHandler the next handler
     */
    public function __construct(callable $nextHandler = null)
    {
        $this->nextHandler = $nextHandler;
    }

    /**
     * Sets the next handler.
     *
     * @param callable $nextHandler the next handler
     * @return self
     */
    final public function withNextHandler(callable $nextHandler)
    {
        $this->nextHandler = $nextHandler;
        return $this;
    }

    /**
     * Gets the next handler.
     *
     * @return callable|null the next handler
     */
    final protected function getNextHandler()
    {
        return $this->nextHandler;
    }

    /**
     * Processes an incoming server request in order to produce a response.
     *
     * If unable to produce the response itself, it may delegate to the provided
     * request handler to do so.
     *
     * @param Call $call the current request
     * @param array $options the optional parameters
     * @return mixed the response
     */
    abstract public function __invoke(Call $call, array $options);
}
