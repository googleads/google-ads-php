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

namespace Google\Ads\GoogleAds\Lib\V17;

use Google\Ads\GoogleAds\V17\Services\SearchGoogleAdsStreamRequest;
use Google\Ads\GoogleAds\V17\Services\UploadCallConversionsResponse;
use Google\Ads\GoogleAds\V17\Services\UploadClickConversionsResponse;
use Google\ApiCore\Transport\Grpc\ForwardingCall;
use Google\ApiCore\Transport\Grpc\ForwardingServerStreamingCall;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Unit tests for `GoogleAdsLoggingServerStreamingCall`.
 *
 * Note: With the limitation of PHPUnit, we cannot combine `@depends` and `@dataProvider` in a way
 * that makes it work properly, so we need to implement two methods: `testGetStatus` and
 * `testGetStatusWithEmptyResponses`, although both share the same code.
 *
 * @covers \Google\Ads\GoogleAds\Lib\V17\GoogleAdsLoggingServerStreamingCall
 * @small
 */
class GoogleAdsLoggingServerStreamingCallTest extends TestCase
{
    public function testResponses()
    {
        // Prepares the inner call.
        $forwardingCallMock = $this->getMockBuilder(ForwardingServerStreamingCall::class)
            ->disableOriginalConstructor()
            ->getMock();
        $response1 = new UploadCallConversionsResponse();
        $response2 = new UploadClickConversionsResponse();
        $forwardingCallMock->method('responses')->willReturn([$response1, $response2]);

        // Instantiates an GoogleAdsLoggingServerStreamingCall.
        $googleAdsLoggingServerStreamingCall =
            $this->createGoogleAdsLoggingServerStreamingCall($forwardingCallMock);

        // Checks if the returned results are the same as those in the inner call;
        $actualResponses = iterator_to_array($googleAdsLoggingServerStreamingCall->responses());
        $this->assertEquals([$response1, $response2], $actualResponses);

        return [
            'forwardingCallMock' => $forwardingCallMock,
            'streamingCall' => $googleAdsLoggingServerStreamingCall
        ];
    }

    /**
     * @depends testResponses
     */
    public function testGetStatus($dependingData)
    {
        $this->performStatusAssertion($dependingData);
    }

    public function testResponsesWithEmptyResponses()
    {
        // Prepares the inner call.
        $forwardingCallMock = $this->getMockBuilder(ForwardingServerStreamingCall::class)
            ->disableOriginalConstructor()
            ->getMock();
        $forwardingCallMock->method('responses')->willReturn([]);

        // Instantiates an GoogleAdsLoggingServerStreamingCall.
        $googleAdsLoggingServerStreamingCall =
            $this->createGoogleAdsLoggingServerStreamingCall($forwardingCallMock);

        // Checks if the returned results are the same as those in the inner call;
        $actualResponses = iterator_to_array($googleAdsLoggingServerStreamingCall->responses());
        $this->assertEmpty($actualResponses);

        return [
            'forwardingCallMock' => $forwardingCallMock,
            'streamingCall' => $googleAdsLoggingServerStreamingCall
        ];
    }

    /**
     * @depends testResponsesWithEmptyResponses
     */
    public function testGetStatusWithEmptyResponses($dependingData)
    {
        $this->performStatusAssertion($dependingData);
    }

    private function createGoogleAdsLoggingServerStreamingCall(
        ForwardingCall $forwardingCallMock
    ): GoogleAdsLoggingServerStreamingCall {
        $loggerMock =
            $this->getMockBuilder(LoggerInterface::class)->disableOriginalConstructor()->getMock();
        $googleAdsCallLogger = new GoogleAdsCallLogger($loggerMock, LogLevel::INFO, 'example.com');
        return new GoogleAdsLoggingServerStreamingCall(
            $forwardingCallMock,
            [
                'method' => 'GoogleAdsService/SearchStream',
                'argument' => new SearchGoogleAdsStreamRequest()
            ],
            $googleAdsCallLogger
        );
    }

    private function performStatusAssertion(array $dependingData)
    {
        $forwardingCallMock = $dependingData['forwardingCallMock'];
        $streamingCall = $dependingData['streamingCall'];

        // Sets up the status of the inner call.
        $expectedStatus = self::createExpectedStatus();
        $forwardingCallMock->method('getStatus')->willReturn($expectedStatus);

        $this->assertSame($expectedStatus, $streamingCall->getStatus());
    }

    private function createExpectedStatus(): object
    {
        $expectedStatus = new \stdClass();
        $expectedStatus->code = 0;
        $expectedStatus->message = 'success';
        $expectedStatus->metadata = ['request-id' => ['AbCDeF']];
        return $expectedStatus;
    }
}
