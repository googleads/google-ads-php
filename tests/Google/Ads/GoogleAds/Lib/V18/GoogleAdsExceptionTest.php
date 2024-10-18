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

use Google\Ads\GoogleAds\V18\Errors\GoogleAdsFailure;
use Google\ApiCore\ApiException;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `GoogleAdsException`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\V18\GoogleAdsException
 * @small
 */
class GoogleAdsExceptionTest extends TestCase
{
    /** @var GoogleAdsException $googleAdsException */
    private $googleAdsException;

    /** @var GoogleAdSsFailure $googleAdsFailure */
    private $googleAdsFailure;

    /** @var ApiException $apiExceptionMock */
    private $apiExceptionMock;

    /**
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    protected function setUp(): void
    {
        $this->apiExceptionMock = $this
            ->getMockBuilder(ApiException::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->googleAdsFailure = new GoogleAdsFailure();
        $this->googleAdsException = new GoogleAdsException(
            $this->apiExceptionMock,
            $this->googleAdsFailure,
            ['metadata' => ['request-id' => ['AbCdEf']]]
        );
    }

    public function testGetGoogleAdsFailure()
    {
        $this->assertSame(
            $this->googleAdsFailure,
            $this->googleAdsException->getGoogleAdsFailure()
        );
    }

    public function testGetRequestId()
    {
        $this->assertEquals('AbCdEf', $this->googleAdsException->getRequestId());
    }

    public function testGetRequestIdNoMetadata()
    {
        $googleAdsException = new GoogleAdsException(
            $this->apiExceptionMock,
            $this->googleAdsFailure
        );
        $this->assertEquals(null, $googleAdsException->getRequestId());
    }
}
