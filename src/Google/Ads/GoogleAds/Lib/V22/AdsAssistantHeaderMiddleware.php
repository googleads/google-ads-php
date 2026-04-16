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

namespace Google\Ads\GoogleAds\Lib\V22;

use Google\ApiCore\Call;
use Google\ApiCore\AgentHeader;
use Google\ApiCore\Middleware\MiddlewareInterface;

/**
 * Appends ads assistant metadata to the x-goog-api-client header.
 */
class AdsAssistantHeaderMiddleware implements MiddlewareInterface
{
    private $nextHandler;
    private $adsAssistant;

    public function __construct(callable $nextHandler, string $adsAssistant)
    {
        $this->nextHandler = $nextHandler;
        $this->adsAssistant = $adsAssistant;
    }

    public function __invoke(Call $call, array $options)
    {
        // Check if the agent header exists to avoid errors
        if (isset($options['headers'][AgentHeader::AGENT_HEADER_KEY][0])) {
            $options['headers'][AgentHeader::AGENT_HEADER_KEY][0] .= sprintf(
                ' gaada/%s',
                $this->adsAssistant
            );
        }
        
        $next = $this->nextHandler;
        return $next($call, $options);
    }
}