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

namespace Google\Ads\GoogleAds\V1\Util;

use \Google\Protobuf\Any;
use \Google\Protobuf\Int64Value;
use \Google\Rpc\Status;
use Google\Ads\GoogleAds\V1\Errors\ErrorLocation;
use Google\Ads\GoogleAds\V1\Errors\ErrorLocation\FieldPathElement;
use Google\Ads\GoogleAds\V1\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V1\Errors\GoogleAdsFailure;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `GoogleAdsErrors`.
 *
 * @see GoogleAdsErrors
 * @small
 */
class GoogleAdsErrorsTest extends TestCase
{
    private $googleAdsFailureMock;
    private $statusMock;

    public function setUp()
    {
        $indexMock = $this
            ->getMockBuilder(Int64Value::class)
            ->disableOriginalConstructor()
            ->getMock();
        $indexMock
            ->method("getValue")
            ->willReturn(0);

        $fieldPathElementMock = $this
            ->getMockBuilder(FieldPathElement::class)
            ->disableOriginalConstructor()
            ->getMock();
        $fieldPathElementMock
            ->method("getFieldName")
            ->willReturn("operations");
        $fieldPathElementMock
            ->method("getIndex")
            ->willReturn($indexMock);

        $locationMock = $this
            ->getMockBuilder(ErrorLocation::class)
            ->disableOriginalConstructor()
            ->getMock();
        $locationMock
            ->method("getFieldPathElements")
            ->willReturn([$fieldPathElementMock]);

        $errorMock = $this
            ->getMockBuilder(GoogleAdsError::class)
            ->disableOriginalConstructor()
            ->getMock();
        $errorMock
            ->method("getLocation")
            ->willReturn($locationMock);
        $errorMock
            ->method("getMessage")
            ->willReturn("A test message.");

        $this->googleAdsFailureMock = $this
            ->getMockBuilder(GoogleAdsFailure::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->googleAdsFailureMock
            ->method("getErrors")
            ->willReturn([$errorMock]);

        $anyMock = $this
            ->getMockBuilder(Any::class)
            ->disableOriginalConstructor()
            ->getMock();
        $anyMock
            ->method("unpack")
            ->willReturn($this->googleAdsFailureMock);

        $this->statusMock = $this
            ->getMockBuilder(Status::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->statusMock
            ->method("getDetails")
            ->willReturn([$anyMock]);
    }

    public function testFromStatusWithNoErrors()
    {
        $emptyStatusMock = $this
            ->getMockBuilder(Status::class)
            ->disableOriginalConstructor()
            ->getMock();

        $emptyStatusMock
            ->method("getDetails")
            ->willReturn([]);

        $errors = GoogleAdsErrors::fromStatus(0, $emptyStatusMock);
        $this->assertCount(0, $errors);
    }

    public function testFromStatusWithSingleError()
    {
        $errors = GoogleAdsErrors::fromStatus(0, $this->statusMock);
        $this->assertCount(1, $errors);

        $expectedMessage = "A test message.";
        $this->assertEquals($expectedMessage, $errors[0]->getMessage());
    }

    public function testFromStatusWithInvalidOperationIndex()
    {
        $errors = GoogleAdsErrors::fromStatus(1, $this->statusMock);
        $this->assertCount(0, $errors);
    }

    public function testFromFailureWithNoErrors()
    {
        $emptyFailureMock = $this
            ->getMockBuilder(GoogleAdsFailure::class)
            ->disableOriginalConstructor()
            ->getMock();

        $emptyFailureMock
            ->method("getErrors")
            ->willReturn([]);

        $errors = GoogleAdsErrors::fromFailure(0, $emptyFailureMock);
        $this->assertCount(0, $errors);
    }

    public function testFromFailureWithSingleError()
    {
        $errors = GoogleAdsErrors::fromFailure(0, $this->googleAdsFailureMock);
        $this->assertCount(1, $errors);
        
        $expectedMessage = "A test message.";
        $this->assertEquals($expectedMessage, $errors[0]->getMessage());
    }

    public function testFromFailureWithInvalidOperationIndex()
    {
        $errors = GoogleAdsErrors::fromFailure(1, $this->googleAdsFailureMock);
        $this->assertCount(0, $errors);
    }
}
