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

namespace Google\Ads\GoogleAds\Util\V18;

use Google\Protobuf\Any;
use Google\Rpc\Status;
use Google\Ads\GoogleAds\V18\Errors\ErrorLocation;
use Google\Ads\GoogleAds\V18\Errors\ErrorLocation\FieldPathElement;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsFailure;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `GoogleAdsErrors`.
 *
 * @see GoogleAdsErrors
 * @small
 */
class GoogleAdsErrorsTest extends TestCase
{
    private $failure;

    public function setUp(): void
    {
        $this->failure = $this->createGoogleAdsFailure();
        $any = new Any();
        $any->pack($this->failure);
        $this->status = new Status([
            'details' => [$any]
        ]);
    }

    public function testFromStatusWithNoErrors()
    {
        $emptyStatus = new Status(['details' => []]);
        $errors = GoogleAdsErrors::fromStatus(0, $emptyStatus);
        $this->assertCount(0, $errors);
    }

    public function testFromStatusWithSingleError()
    {
        $errors = GoogleAdsErrors::fromStatus(0, $this->status);
        $this->assertCount(1, $errors);

        $expectedMessage = "A test message.";
        $this->assertEquals($expectedMessage, $errors[0]->getMessage());
    }

    public function testFromStatusWithInvalidOperationIndex()
    {
        $errors = GoogleAdsErrors::fromStatus(1, $this->status);
        $this->assertCount(0, $errors);
    }

    public function testFromFailureWithNoErrors()
    {
        $emptyFailure = new GoogleAdsFailure(['errors' => []]);
        $errors = GoogleAdsErrors::fromFailure(0, $emptyFailure);
        $this->assertCount(0, $errors);
    }

    public function testFromFailureWithSingleError()
    {
        $errors = GoogleAdsErrors::fromFailure(0, $this->failure);
        $this->assertCount(1, $errors);

        $expectedMessage = "A test message.";
        $this->assertEquals($expectedMessage, $errors[0]->getMessage());
    }

    public function testFromFailureWithInvalidOperationIndex()
    {
        $errors = GoogleAdsErrors::fromFailure(1, $this->failure);
        $this->assertCount(0, $errors);
    }

    public function testFromFailureWithMutateOperation()
    {
        $failureWithMutateOperation = $this->createGoogleAdsFailure("mutate_operations");
        $errors = GoogleAdsErrors::fromFailure(0, $failureWithMutateOperation);
        $this->assertCount(1, $errors);

        $expectedMessage = "A test message.";
        $this->assertEquals($expectedMessage, $errors[0]->getMessage());
    }

    public function testFromFailureWithConversions()
    {
        $failureWithConversions = $this->createGoogleAdsFailure("conversions");
        $errors = GoogleAdsErrors::fromFailure(0, $failureWithConversions);
        $this->assertCount(1, $errors);

        $expectedMessage = "A test message.";
        $this->assertEquals($expectedMessage, $errors[0]->getMessage());
    }

    public function testFromFailureWithConversionAdjustments()
    {
        $failureWithConversions = $this->createGoogleAdsFailure("conversion_adjustments");
        $errors = GoogleAdsErrors::fromFailure(0, $failureWithConversions);
        $this->assertCount(1, $errors);

        $expectedMessage = "A test message.";
        $this->assertEquals($expectedMessage, $errors[0]->getMessage());
    }

    private function createGoogleAdsFailure($fieldName = "operations")
    {
        return new GoogleAdsFailure([
            "errors" => [
                new GoogleAdsError([
                    "message" => "A test message.",
                    "location" => new ErrorLocation([
                        "field_path_elements" => [
                            new FieldPathElement([
                                "index" => 0,
                                "field_name" => $fieldName
                            ])
                        ]
                    ])
                ])
            ]
        ]);
    }
}
