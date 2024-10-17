<?php

/*
 * Copyright 2018 Google LLC
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

namespace Google\Ads\GoogleAds\Util;

use Google\Ads\GoogleAds\Util\FieldMasks\FieldMasksTestDataProvider;
use Google\Ads\GoogleAds\Util\FieldMasks\Proto\Resource;
use Google\Ads\GoogleAds\Util\FieldMasks\Proto\TestSuite;
use Google\Ads\GoogleAds\V18\Common\ExpandedTextAdInfo;
use Google\Ads\GoogleAds\V18\Common\PercentCpc;
use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V18\Resources\Ad;
use Google\Ads\GoogleAds\V18\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V18\Resources\Campaign;
use Google\Ads\GoogleAds\V18\Resources\Campaign\DynamicSearchAdsSetting;
use Google\Protobuf\FieldMask;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;
use UnexpectedValueException;

/**
 * Unit tests for `FieldMasks`.
 *
 * @see FieldMasks
 * @small
 */
class FieldMasksTest extends TestCase
{
    private static $testCases = null;

    private static function loadTestCases()
    {
        if (is_null(self::$testCases)) {
            // Ideally we would like to load these from a text proto file, like Java.
            // However, we don't have text proto support in PHP currently, so we use a
            // json file instead.
            $testSuite = new TestSuite();
            $testSuite->mergeFromJsonString(FieldMasksTestDataProvider::getJsonTestCases());
            self::$testCases = $testSuite->getTestCases();
        }
        return self::$testCases;
    }

    /**
     * @dataProvider compareData
     */
    public function testCompare(
        Resource $originalResource,
        Resource $modifiedResource,
        FieldMask $expectedMask
    ) {
        $expectedPaths = $this->getSortedPaths($expectedMask);
        $actualMask = FieldMasks::compare($originalResource, $modifiedResource);
        $actualPaths = $this->getSortedPaths($actualMask);
        $this->assertEquals($expectedPaths, $actualPaths);
    }

    /**
     * @dataProvider allSetFieldsOfData
     */
    public function testAllSetFieldsOf(
        Resource $modifiedResource,
        FieldMask $allSetFieldsMask
    ) {
        $allSetFieldsPaths = $this->getSortedPaths($allSetFieldsMask);
        $actualMask = FieldMasks::allSetFieldsOf($modifiedResource);
        $actualPaths = $this->getSortedPaths($actualMask);
        $this->assertEquals($allSetFieldsPaths, $actualPaths);
    }

    public function compareData()
    {
        $testData = [];
        foreach (self::loadTestCases() as $testCase) {
            $testData[] = [
                $testCase->getOriginalResource(),
                $testCase->getModifiedResource(),
                $testCase->getExpectedMask()
            ];
        }
        return $testData;
    }

    public function allSetFieldsOfData()
    {
        $testData = [];
        foreach (self::loadTestCases() as $testCase) {
            $testData[] = [
                $testCase->getModifiedResource(),
                $testCase->getAllSetFieldsMask()
            ];
        }
        return $testData;
    }

    protected function getSortedPaths(FieldMask $fieldMask)
    {
        $paths = [];
        foreach ($fieldMask->getPaths() as $path) {
            $paths[] = $path;
        }
        sort($paths);
        return $paths;
    }

    public function testCompareBothNull()
    {
        $this->expectException(TypeError::class);
        FieldMasks::compare(null, null);
    }

    public function testCompareEitherIsNull()
    {
        $this->expectException(TypeError::class);
        FieldMasks::compare(new Campaign(), null);
        $this->expectException(TypeError::class);
        FieldMasks::compare(null, new Campaign());
    }

    public function testCompareDifferentTypes()
    {
        $this->expectException(InvalidArgumentException::class);
        FieldMasks::compare(new Campaign(), new AdGroupAd());
    }

    public function testAllSetFieldsOfNull()
    {
        $this->expectException(TypeError::class);
        FieldMasks::allSetFieldsOf(null);
    }

    public function testGetFieldValue()
    {
        $campaign = new Campaign([
            'name' => 'test',
            'percent_cpc' => new PercentCpc(['cpc_bid_ceiling_micros' => 1000000]),
            'advertising_channel_type' => AdvertisingChannelType::SEARCH,
            'dynamic_search_ads_setting' => new DynamicSearchAdsSetting([
                'feeds' => ['feed 1', 'feed 2']
            ])
        ]);
        // A value of a field of simple type can be obtained.
        $this->assertEquals('test', FieldMasks::getFieldValue('name', $campaign));
        // A value of a field of a nested message can be obtained.
        $this->assertEquals(
            1000000,
            FieldMasks::getFieldValue('percent_cpc.cpc_bid_ceiling_micros', $campaign)
        );
        // A value of an enum can be obtained.
        $this->assertEquals(
            AdvertisingChannelType::SEARCH,
            FieldMasks::getFieldValue('advertising_channel_type', $campaign)
        );
        // A value of a repeated field type can be obtained.
        $this->assertEquals(
            ['feed 1', 'feed 2'],
            iterator_to_array(
                FieldMasks::getFieldValue('dynamic_search_ads_setting.feeds', $campaign)
                    ->getIterator()
            )
        );

        $adGroupAd = new AdGroupAd([
            'ad' => new Ad([
                'expanded_text_ad' => new ExpandedTextAdInfo(['headline_part1' => 'test'])
            ])
        ]);
        $this->assertEquals(
            'test',
            FieldMasks::getFieldValue('ad.expanded_text_ad.headline_part1', $adGroupAd)
        );
        $this->assertEquals(
            null,
            FieldMasks::getFieldValue('ad.text_ad.headline', $adGroupAd)
        );
    }

    /**
     * @dataProvider getFieldValueFailureProvider
     */
    public function testGetFieldValueObjectStructureNotMatch($fieldMaskPath, $object)
    {
        $this->expectException(UnexpectedValueException::class);
        FieldMasks::getFieldValue($fieldMaskPath, $object);
    }

    public function getFieldValueFailureProvider()
    {
        $adGroupAd = new AdGroupAd([
            'ad' => new Ad([
                'expanded_text_ad' => new ExpandedTextAdInfo(['headline_part1' => 'test'])
            ])
        ]);
        return [
            ['ad.test_field1.headline_part1', $adGroupAd],
            ['ad_1.expanded_text_ad.headline_part1', $adGroupAd]
        ];
    }

    public function testGetFieldValueNull()
    {
        $this->expectException(TypeError::class);
        FieldMasks::getFieldValue('campaign', null);
    }
}
