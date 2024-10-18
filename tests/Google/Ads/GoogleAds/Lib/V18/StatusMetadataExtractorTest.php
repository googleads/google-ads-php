<?php

/**
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

use Google\Ads\GoogleAds\V18\Errors\AdGroupErrorEnum\AdGroupError;
use Google\Ads\GoogleAds\V18\Errors\CampaignErrorEnum\CampaignError;
use Google\Ads\GoogleAds\V18\Errors\ErrorCode;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsFailure;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `StatusMetadataExtractor`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\V18\StatusMetadataExtractor
 * @small
 */
class StatusMetadataExtractorTest extends TestCase
{
    /** @var StatusMetadataExtractor $statusMetadataExtractor */
    private $statusMetadataExtractor;

    /** @var array $defaultStatusMetadata */
    private $defaultStatusMetadata;

    /**
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    protected function setUp(): void
    {
        $this->statusMetadataExtractor = new StatusMetadataExtractor();
        $defaultGoogleAdsFailure = new GoogleAdsFailure();
        $defaultGoogleAdsFailure->setErrors([
            new GoogleAdsError([
                'message' => 'failure 1',
                'error_code' => new ErrorCode([
                    'campaign_error' => CampaignError::BUDGET_CANNOT_BE_SHARED
                ])
            ]),
            new GoogleAdsError([
                'message' => 'failure 2',
                'error_code' => new ErrorCode([
                    'ad_group_error' => AdGroupError::BID_TOO_BIG
                ])
            ])
        ]);
        $this->defaultStatusMetadata = [
            'google.ads.googleads.v18.errors.googleadsfailure-bin' => [
                $defaultGoogleAdsFailure->serializeToString()
            ]
        ];
    }

    public function testExtractGoogleAdsFailure()
    {
        $actual = $this->statusMetadataExtractor->extractGoogleAdsFailure(
            $this->defaultStatusMetadata,
            'google.ads.googleads.v18.errors.googleadsfailure-bin'
        );

        $this->assertEquals('failure 1', $actual->getErrors()[0]->getMessage());
        $this->assertEquals(
            CampaignError::BUDGET_CANNOT_BE_SHARED,
            $actual->getErrors()[0]->getErrorCode()->getCampaignError()
        );
        $this->assertEquals('failure 2', $actual->getErrors()[1]->getMessage());
        $this->assertEquals(
            AdGroupError::BID_TOO_BIG,
            $actual->getErrors()[1]->getErrorCode()->getAdGroupError()
        );
    }

    public function testExtractGoogleAdsFailureNoKey()
    {
        $statusMetadata = ['dummy-key' => ['dummy-value']];
        $actual = $this->statusMetadataExtractor->extractGoogleAdsFailure(
            $statusMetadata,
            'google.ads.googleads.v18.errors.googleadsfailure-bin'
        );
        $this->assertEquals(new GoogleAdsFailure(), $actual);
    }

    public function testExtractErrorMessageList()
    {
        $actual = $this->statusMetadataExtractor->extractErrorMessageList(
            $this->defaultStatusMetadata,
            'google.ads.googleads.v18.errors.googleadsfailure-bin'
        );

        $this->assertEquals(['failure 1', 'failure 2'], $actual);
    }

    public function testExtractErrorMessageListNoMessages()
    {
        $expected = new GoogleAdsFailure();
        $expected->setErrors([
            new GoogleAdsError([
                'error_code' => new ErrorCode([
                    'campaign_error' => CampaignError::BUDGET_CANNOT_BE_SHARED
                ])
            ]),
            new GoogleAdsError([
                'error_code' => new ErrorCode([
                    'ad_group_error' => AdGroupError::BID_TOO_BIG
                ])
            ])
        ]);
        $statusMetadata = [
            'google.ads.googleads.v18.errors.googleadsfailure-bin' => [
                $expected->serializeToString()
            ]
        ];

        $actual = $this->statusMetadataExtractor->extractErrorMessageList(
            $statusMetadata,
            'google.ads.googleads.v18.errors.googleadsfailure-bin'
        );

        $this->assertEquals(['', ''], $actual);
    }

    public function testExtractErrorMessageListNoKey()
    {
        $statusMetadata = ['dummy-key' => ['dummy-value']];
        $actual = $this->statusMetadataExtractor->extractErrorMessageList(
            $statusMetadata,
            'google.ads.googleads.v18.errors.googleadsfailure-bin'
        );
        $this->assertEquals([], $actual);
    }
}
