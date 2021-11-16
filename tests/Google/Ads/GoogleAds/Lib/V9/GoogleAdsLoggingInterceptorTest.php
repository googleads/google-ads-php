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

namespace Google\Ads\GoogleAds\Lib\V9;

use Google\Ads\GoogleAds\V9\Services\GetCampaignRequest;
use Google\Ads\GoogleAds\V9\Services\SearchGoogleAdsStreamRequest;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Unit tests for `GoogleAdsLoggingInterceptor`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\V9\GoogleAdsLoggingInterceptor
 * @small
 */
class GoogleAdsLoggingInterceptorTest extends TestCase
{
    /** @var GoogleAdsLoggingInterceptor $googleAdsLoggingInterceptor */
    private $googleAdsLoggingInterceptor;

    /** @var GoogleAdsCallLogger $callLogger */
    private $callLogger;

    /**
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    protected function setUp(): void
    {
        $loggerMock =
            $this->getMockBuilder(LoggerInterface::class)->disableOriginalConstructor()->getMock();
        $this->callLogger = new GoogleAdsCallLogger($loggerMock, LogLevel::INFO, 'example.com');
        $this->googleAdsLoggingInterceptor = new GoogleAdsLoggingInterceptor($this->callLogger);
    }

    public function testGetCallLogger()
    {
        $this->assertSame(
            $this->callLogger,
            $this->googleAdsLoggingInterceptor->getCallLogger()
        );
    }

    public function testInterceptUnaryUnary()
    {
        $this->assertInstanceOf(
            GoogleAdsLoggingUnaryCall::class,
            $this->googleAdsLoggingInterceptor->interceptUnaryUnary(
                'CampaignService/GetCampaigns',
                new GetCampaignRequest(),
                ['Campaign', 'decode'],
                function ($method, $argument, $deserialize, $metadata, $options) {
                    // The function body is not needed for testing.
                }
            )
        );
    }

    public function testInterceptUnaryStream()
    {
        $this->assertInstanceOf(
            GoogleAdsLoggingServerStreamingCall::class,
            $this->googleAdsLoggingInterceptor->interceptUnaryStream(
                'GoogleAdsService/SearchStream',
                new SearchGoogleAdsStreamRequest(),
                ['SearchGoogleAdsStreamResponse', 'decode'],
                function ($method, $argument, $deserialize, $metadata, $options) {
                    // The function body is not needed for testing.
                }
            )
        );
    }
}
