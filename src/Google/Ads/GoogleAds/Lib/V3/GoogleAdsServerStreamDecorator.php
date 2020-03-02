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

namespace Google\Ads\GoogleAds\Lib\V3;

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
}
