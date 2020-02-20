<?php

/**
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

use Google\Ads\GoogleAds\V2\Errors\GoogleAdsFailure;
use Google\ApiCore\ApiException;
use Google\ApiCore\Call;
use GuzzleHttp\Promise\Promise;

/**
 * Middleware for throwing `GoogleAdsException` when calls to the API server fail.
 */
class GoogleAdsExceptionMiddleware
{
    use GoogleAdsMetadataTrait;

    /** @var callable $nextHandler */
    private $nextHandler;
    private $statusMetadataExtractor;

    /**
     * Creates the `GoogleAdsException` middleware.
     *
     * @param callable $nextHandler
     * @param StatusMetadataExtractor $statusMetadataExtractor
     */
    public function __construct(callable $nextHandler, $statusMetadataExtractor = null)
    {
        $this->nextHandler = $nextHandler;
        $this->statusMetadataExtractor = $statusMetadataExtractor ?: new StatusMetadataExtractor();
    }

    /**
     * Throws a `GoogleAdsException` when calls to the Google Ads API server
     * fail.
     *
     * @param Call $call the current request
     * @param array $options the optional parameters
     * @return \GuzzleHttp\Promise\PromiseInterface the `Promise` interface
     *     customized to throw `GoogleAdsException`
     */
    public function __invoke(Call $call, array $options)
    {
        $next = $this->nextHandler;
        /** @var Promise $promise */
        $promise = $next(
            $call,
            $options
        );

        return $promise->then(
            null,
            function ($exception) {
                if ($exception instanceof ApiException) {
                    $metadata = $exception->getMetadata();

                    if (isset($metadata[self::$GOOGLE_ADS_FAILURE_BINARY_KEY])) {
                        throw $this->createGoogleAdsException(
                            $exception,
                            $this->statusMetadataExtractor->extractGoogleAdsFailure(
                                $metadata,
                                self::$GOOGLE_ADS_FAILURE_BINARY_KEY
                            )
                        );
                    }

                    if (isset($metadata[self::$GOOGLE_ADS_FAILURE_JSON_KEY])) {
                        throw $this->createGoogleAdsException(
                            $exception,
                            $this->statusMetadataExtractor->extractGoogleAdsFailure(
                                $metadata,
                                self::$GOOGLE_ADS_FAILURE_JSON_KEY
                            )
                        );
                    }
                }
                throw $exception;
            }
        );
    }

    private function createGoogleAdsException(
        ApiException $exception,
        GoogleAdsFailure $googleAdsFailure
    ) {
        $optionalArgs = [
            'previous' => $exception->getPrevious(),
            'metadata' => $exception->getMetadata(),
            'basicMessage' => $exception->getBasicMessage()
        ];
        return new GoogleAdsException($exception, $googleAdsFailure, $optionalArgs);
    }
}
