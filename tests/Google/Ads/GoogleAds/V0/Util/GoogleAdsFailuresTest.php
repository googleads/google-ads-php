<?php
/*
 * Copyright 2019 Google LLC
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

namespace Google\Ads\GoogleAds\V0\Util;

use \Google\Protobuf\Any;
use \Google\Rpc\Status;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsFailure;
use PHPUnit\Framework\TestCase;

class GoogleAdsFailureTest extends TestCase
{
    public function testFromAny()
    {
        $failureMock = $this
            ->getMockBuilder(GoogleAdsFailure::class)
            ->disableOriginalConstructor()
            ->getMock();

        $anyMock = $this
            ->getMockBuilder(Any::class)
            ->disableOriginalConstructor()
            ->getMock();
        $anyMock
            ->method("unpack")
            ->willReturn($failureMock);
        
        $this->assertInstanceOf(GoogleAdsFailure::class, GoogleAdsFailures::fromAny($anyMock));
    }

    public function testFromEmptyStatus()
    {
        $emptyStatusMock = $this
            ->getMockBuilder(Status::class)
            ->disableOriginalConstructor()
            ->getMock();
        $emptyStatusMock
            ->method("getDetails")
            ->willReturn([]);

        $this->assertCount(0, GoogleAdsFailures::fromStatus($emptyStatusMock));
    }

    public function testFromStatusWithSingleFailure()
    {
        $failureMock = $this
        ->getMockBuilder(GoogleAdsFailure::class)
        ->disableOriginalConstructor()
        ->getMock();

        $anyMock = $this
            ->getMockBuilder(Any::class)
            ->disableOriginalConstructor()
            ->getMock();
        $anyMock
            ->method("unpack")
            ->willReturn($failureMock);

        $statusMock = $this
            ->getMockBuilder(Status::class)
            ->disableOriginalConstructor()
            ->getMock();
        $statusMock
            ->method("getDetails")
            ->willReturn([$anyMock]);

        $failures = GoogleAdsFailures::fromStatus($statusMock);
        $this->assertCount(1, $failures);
        $this->assertInstanceOf(GoogleAdsFailure::class, $failures[0]);
    }
}
