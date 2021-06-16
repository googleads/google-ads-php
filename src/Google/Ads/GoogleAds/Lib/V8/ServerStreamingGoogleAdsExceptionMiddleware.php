<?php

/**
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

use Exception;
use Google\ApiCore\ApiException;
use Google\ApiCore\Call;
use Google\ApiCore\ServerStream;

/**
 * Middleware for throwing `GoogleAdsException` when server streaming calls to the API server fail.
 */
class ServerStreamingGoogleAdsExceptionMiddleware
{
    /** @var callable $nextHandler */
    private $nextHandler;
    private $statusMetadataExtractor;

    /**
     * Creates the `GoogleAdsException` middleware.
     *
     * @param callable $nextHandler
     * @param StatusMetadataExtractor $statusMetadataExtractor
     */
    public function __construct(
        callable $nextHandler,
        StatusMetadataExtractor $statusMetadataExtractor = null
    ) {
        $this->nextHandler = $nextHandler;
        $this->statusMetadataExtractor = $statusMetadataExtractor ?: new StatusMetadataExtractor();
    }

    /**
     * Throws a `GoogleAdsException` when calls to the Google Ads API server
     * fail.
     *
     * @param Call $call the current request
     * @param array $options the optional parameters
     * @return ServerStream the `ServerStream` customized to throw `GoogleAdsException`
     */
    public function __invoke(Call $call, array $options)
    {
        $next = $this->nextHandler;
        /** @var ServerStream $stream */
        $stream = $next(
            $call,
            $options
        );

        return new class (
            $stream,
            $this->statusMetadataExtractor
        ) extends GoogleAdsServerStreamDecorator {
            use GoogleAdsExceptionTrait;

            private $statusMetadataExtractor;

            /**
             * @param ServerStream $serverStream the ServerStream to wrap
             * @param StatusMetadataExtractor $statusMetadataExtractor
             */
            public function __construct(
                ServerStream $serverStream,
                StatusMetadataExtractor $statusMetadataExtractor
            ) {
                parent::__construct($serverStream);
                $this->statusMetadataExtractor = $statusMetadataExtractor;
            }

            /**
             * {@inheritdoc}
             */
            public function readAll()
            {
                try {
                    foreach ($this->serverStream->readAll() as $response) {
                        yield $response;
                    }
                } catch (Exception $exception) {
                    if ($exception instanceof ApiException) {
                        $this->throwGoogleAdsException($exception, $this->statusMetadataExtractor);
                    }
                    throw $exception;
                }
            }
        };
    }
}
