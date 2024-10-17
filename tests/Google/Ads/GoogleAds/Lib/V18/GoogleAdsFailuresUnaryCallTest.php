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

use Google\Ads\GoogleAds\V18\Services\MutateCampaignsResponse;
use Google\Ads\GoogleAds\V18\Services\ListBatchJobResultsResponse;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsResponse;
use Google\ApiCore\Transport\Grpc\ForwardingUnaryCall;
use Google\Rpc\Status;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `GoogleAdsFailuresUnaryCall`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\V18\GoogleAdsFailuresUnaryCall
 * @small
 */
class GoogleAdsFailuresUnaryCallTest extends TestCase
{
    /**
     * @param mixed $expectedResponse the expected response
     * @param bool $isInitializationExpected whether the lazy initialization of GoogleAdsFailures
     *     is expected to be triggered or not
     * @dataProvider provideTestCases
     */
    public function test($expectedResponse, bool $isInitializationExpected)
    {
        // Prepares the inner call.
        $expectedStatus = new \stdClass();
        $expectedStatus->code = 0;
        $expectedStatus->message = 'success';
        $expectedStatus->metadata = ['request-id' => ['AbCDeF']];
        $forwardingCallMock = $this->getMockBuilder(ForwardingUnaryCall::class)
            ->disableOriginalConstructor()
            ->getMock();
        $forwardingCallMock->method('wait')->willReturn([$expectedResponse, $expectedStatus]);
        $googleAdsFailuresUnaryCallMock = $this->getMockBuilder(GoogleAdsFailuresUnaryCall::class)
            ->enableOriginalConstructor()
            ->setConstructorArgs([$forwardingCallMock])
            ->setMethodsExcept(array('wait'))
            ->getMock();
        $googleAdsFailuresUnaryCallMock
            ->expects($isInitializationExpected ? $this->once() : $this->never())
            ->method('initGoogleAdsFailures');

        $unaryCallResponse = $googleAdsFailuresUnaryCallMock->wait();
        $this->assertSame($expectedResponse, $unaryCallResponse[0]);
        $this->assertSame($expectedStatus, $unaryCallResponse[1]);
    }

    public function provideTestCases()
    {
        return [
            [new SearchGoogleAdsResponse(), false],
            [new MutateCampaignsResponse(), false],
            [new ListBatchJobResultsResponse(), true],
            [new MutateCampaignsResponse(['partial_failure_error' => new Status()]), true],
        ];
    }
}
