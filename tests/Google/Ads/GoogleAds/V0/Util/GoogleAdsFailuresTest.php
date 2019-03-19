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

namespace Google\Ads\GoogleAds\Util\V0;

use Google\Protobuf\Any;
use Google\Rpc\Status;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsFailure;
use PHPUnit\Framework\TestCase;

class GoogleAdsFailureTest extends TestCase
{
    public function testFromAny()
    {
        $anyMock = $this
            ->getMockBuilder(Any::class)
            ->disableOriginalConstructor()
            ->getMock();
        $anyMock
            ->method("unpack")
            ->willReturn(new GoogleAdsFailure());
        
        $this->assertInstanceOf(GoogleAdsFailure::class, GoogleAdsFailures::fromAny($anyMock));
    }

    public function testFromEmptyStatus()
    {
        $emptyStatus = new Status();
        $this->assertCount(0, GoogleAdsFailures::fromStatus($emptyStatus));
    }

    public function testFromStatusWithSingleFailure()
    {
        $anyMock = $this
            ->getMockBuilder(Any::class)
            ->disableOriginalConstructor()
            ->getMock();
        $anyMock
            ->method("unpack")
            ->willReturn(new GoogleAdsFailure());

        $status = new Status(['details' => [$anyMock]]);
        $failures = GoogleAdsFailures::fromStatus($status);
        $this->assertCount(1, $failures);
        $this->assertInstanceOf(GoogleAdsFailure::class, $failures[0]);
    }
}
