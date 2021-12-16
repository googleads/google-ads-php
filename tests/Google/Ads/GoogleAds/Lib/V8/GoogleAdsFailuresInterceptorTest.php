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

namespace Google\Ads\GoogleAds\Lib\V8;

use Google\Ads\GoogleAds\V8\Services\GetCampaignRequest;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `GoogleAdsFailuresInterceptor`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\V8\GoogleAdsFailuresInterceptor
 * @small
 */
class GoogleAdsFailuresInterceptorTest extends TestCase
{
    public function testInterceptUnaryUnary()
    {
        $this->assertInstanceOf(
            GoogleAdsFailuresUnaryCall::class,
            (new GoogleAdsFailuresInterceptor())->interceptUnaryUnary(
                'CampaignService/GetCampaigns',
                new GetCampaignRequest(),
                ['Campaign', 'decode'],
                function ($method, $argument, $deserialize, $metadata, $options) {
                    // The function body is not needed for testing.
                }
            )
        );
    }
}
