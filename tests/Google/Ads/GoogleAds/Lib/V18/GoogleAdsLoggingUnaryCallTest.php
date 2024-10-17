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

namespace Google\Ads\GoogleAds\Lib\V18;

use Google\Ads\GoogleAds\V18\Resources\Campaign;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\ApiCore\Transport\Grpc\ForwardingUnaryCall;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Unit tests for `GoogleAdsLoggingUnaryCall`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\V18\GoogleAdsLoggingUnaryCall
 * @small
 */
class GoogleAdsLoggingUnaryCallTest extends TestCase
{
    public function testWait()
    {
        // Prepares the inner call.
        $expectedResponse = new Campaign();
        $expectedStatus = new \stdClass();
        $expectedStatus->code = 0;
        $expectedStatus->message = 'success';
        $expectedStatus->metadata = ['request-id' => ['AbCDeF']];
        $forwardingCallMock = $this->getMockBuilder(ForwardingUnaryCall::class)
            ->disableOriginalConstructor()
            ->getMock();
        $forwardingCallMock->method('wait')->willReturn([$expectedResponse, $expectedStatus]);

        // Instantiate an GoogleAdsLoggingUnaryCall.
        $loggerMock =
            $this->getMockBuilder(LoggerInterface::class)->disableOriginalConstructor()->getMock();
        $googleAdsCallLogger = new GoogleAdsCallLogger($loggerMock, LogLevel::INFO, 'example.com');
        $googleAdsLoggingUnaryCall = new GoogleAdsLoggingUnaryCall(
            $forwardingCallMock,
            [
                'method' => 'GoogleAdsService/Search',
                'argument' => new SearchGoogleAdsRequest()
            ],
            $googleAdsCallLogger
        );

        $unaryCallResponse = $googleAdsLoggingUnaryCall->wait();

        $this->assertSame($expectedResponse, $unaryCallResponse[0]);
        $this->assertSame($expectedStatus, $unaryCallResponse[1]);
    }
}
