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

namespace Google\Ads\GoogleAds\Lib\V20;

use Google\Ads\GoogleAds\Lib\GoogleAdsMiddlewareAbstract;
use Google\ApiCore\ArrayTrait;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\LongRunning\OperationsClient;
use Google\ApiCore\Middleware\FixedHeaderMiddleware;

/**
 * Overrides methods in `GapicClientTrait` to support providing Google Ads API-related parameters
 * for each service client.
 */
trait GoogleAdsGapicClientTrait
{
    use ArrayTrait;

    private static $DEVELOPER_TOKEN_KEY = 'developer-token';
    private static $LOGIN_CUSTOMER_ID = 'login-customer-id';
    private static $LINKED_CUSTOMER_ID = 'linked-customer-id';
    private static $UNARY_MIDDLEWARES = 'unary-middlewares';
    private static $STREAMING_MIDDLEWARES = 'streaming-middlewares';

    private $developerToken = null;
    private $loginCustomerId = null;
    private $linkedCustomerId = null;
    private $unaryMiddlewares = [];
    private $streamingMiddlewares = [];
    private ?GoogleAdsResponseMetadata $responseMetadata = null;

    /**
     * @see GapicClientTrait::modifyClientOptions()
     */
    protected function modifyClientOptions(array &$options)
    {
        $this->developerToken = $options[self::$DEVELOPER_TOKEN_KEY] ?? null;
        $this->loginCustomerId = $options[self::$LOGIN_CUSTOMER_ID] ?? null;
        $this->linkedCustomerId = $options[self::$LINKED_CUSTOMER_ID] ?? null;
        $this->unaryMiddlewares = $options[self::$UNARY_MIDDLEWARES] ?? [];
        $this->streamingMiddlewares = $options[self::$STREAMING_MIDDLEWARES] ?? [];
        // Ensure that this isn't already an OperationsClient nor GoogleAdsOperationClient to avoid
        // recursion.
        if (
            !isset($options['operationsClient'])
            && get_class($this) != OperationsClient::class
            && get_class($this) != GoogleAdsOperationClient::class
        ) {
            $operationOptions = $options;
            // Use all the options except for those related to this service instance.
            $this->pluckArray([
                'serviceName',
                'clientConfig',
                'descriptorsConfigPath',
            ], $operationOptions);
            // Sets the options for handling long running operations.
            $options['operationsClient'] = new GoogleAdsOperationClient($operationOptions);
        }
    }

    /**
     * Adds a FixedHeaderMiddleware to a callable.
     *
     * @param callable $callable the callable to add to
     * @return callable the modified callable
     */
    private function addFixedHeaderMiddleware(callable &$callable)
    {
        if (!is_null($this->developerToken)) {
            $headers = [self::$DEVELOPER_TOKEN_KEY => [$this->developerToken]];

            if (!is_null($this->loginCustomerId)) {
                $headers[self::$LOGIN_CUSTOMER_ID] = [$this->loginCustomerId];
            }
            if (!is_null($this->linkedCustomerId)) {
                $headers[self::$LINKED_CUSTOMER_ID] = [$this->linkedCustomerId];
            }

            $callable = new FixedHeaderMiddleware($callable, $headers);
        }
        return $callable;
    }

    /**
     * @see GapicClientTrait::modifyUnaryCallable()
     */
    protected function modifyUnaryCallable(callable &$callable)
    {
        $callable = $this->addFixedHeaderMiddleware($callable);
        $callable = new UnaryGoogleAdsExceptionMiddleware($callable);
        $callable = new UnaryGoogleAdsResponseMetadataCallable($callable, $this);
        foreach ($this->unaryMiddlewares as $unaryMiddleware) {
            /** @var GoogleAdsMiddlewareAbstract $unaryMiddleware */
            $callable = $unaryMiddleware->withNextHandler($callable);
        }
    }

    /**
     * @see GapicClientTrait::modifyStreamingCallable()
     */
    protected function modifyStreamingCallable(callable &$callable)
    {
        $callable = $this->addFixedHeaderMiddleware($callable);
        $callable = new ServerStreamingGoogleAdsExceptionMiddleware($callable);
        $callable = new ServerStreamingGoogleAdsResponseMetadataCallable($callable);
        foreach ($this->streamingMiddlewares as $streamingMiddleware) {
            /** @var GoogleAdsMiddlewareAbstract $streamingMiddleware */
            $callable = $streamingMiddleware->withNextHandler($callable);
        }
    }

    public function getResponseMetadata(): ?GoogleAdsResponseMetadata
    {
        return $this->responseMetadata;
    }

    public function setResponseMetadata(?GoogleAdsResponseMetadata $responseMetadata): void
    {
        $this->responseMetadata = $responseMetadata;
    }
}
