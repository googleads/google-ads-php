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

namespace Google\Ads\GoogleAds\Lib\V12;

use Google\Ads\GoogleAds\Lib\GoogleAdsMiddlewareAbstract;
use Google\ApiCore\Call;
use Google\ApiCore\ServerStream;

/**
 * Callable for exposing `GoogleAdsResponseMetadata` from server streaming calls to the API.
 */
class ServerStreamingGoogleAdsResponseMetadataCallable extends GoogleAdsMiddlewareAbstract
{
    /**
     * @param Call $call the current request
     * @param array $options the optional parameters
     * @return ServerStream the `ServerStream` customized to expose trailing metadata
     */
    public function __invoke(Call $call, array $options)
    {
        $next = $this->getNextHandler();
        /** @var ServerStream $stream */
        $stream = $next(
            $call,
            $options
        );

        return new class ($stream) extends GoogleAdsServerStreamDecorator
        {
            private $responseMetadata;

            /**
             * {@inheritdoc}
             */
            public function __construct(ServerStream $serverStream)
            {
                parent::__construct($serverStream);
                $this->responseMetadata = new GoogleAdsResponseMetadata([]);
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
                } finally {
                    $this->responseMetadata = new GoogleAdsResponseMetadata(
                        $this->getServerStreamingCall()->getTrailingMetadata() ?: []
                    );
                }
            }

            /**
             * Returns the response metadata in the Google Ads format.
             *
             * @return GoogleAdsResponseMetadata
             */
            public function getResponseMetadata()
            {
                return $this->responseMetadata;
            }
        };
    }
}
