<?php

/**
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

use Generator;
use Google\ApiCore\ApiException;
use Google\ApiCore\ServerStream;

/**
 * Extends and wraps ServerStream.
 */
class GoogleAdsServerStreamDecorator extends ServerStream
{
    protected $serverStream;

    /**
     * @param ServerStream $serverStream the ServerStream to wrap
     */
    public function __construct(ServerStream $serverStream)
    {
        $this->serverStream = $serverStream;
    }

    /**
     * {@inheritdoc}
     */
    public function readAll()
    {
        foreach ($this->serverStream->readAll() as $response) {
            yield $response;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getServerStreamingCall()
    {
        return $this->serverStream->getServerStreamingCall();
    }

    /**
     *
     * Returns an iterator over the full list of elements of the stream.
     *
     * @experimental: This is specific to SearchGoogleAdsStreamResponse but works just fine because
     * GoogleAdsService.SearchStream is the only Server Stream typed call that can be made in the
     * Google Ads API. To make this right, modifications in Gapic, Gax and PHP post
     * processing script would be required: add a middleware or interceptor using an extended
     * version of the GoogleAdsGapicClientTrait.
     *
     * @return Generator
     * @throws ApiException
     */
    public function iterateAllElements()
    {
        foreach ($this->readAll() as $response) {
            foreach ($response->getResults() as $element) {
                yield $element;
            }
        }
    }
}
