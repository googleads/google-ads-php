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

use Google\Ads\GoogleAds\Util\Testing\FieldMasksTestDataProvider;
use Google\Ads\GoogleAds\Util\Testing\Resource;
use Google\Ads\GoogleAds\Util\Testing\TestSuite;
use PHPUnit\Framework\TestCase;

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
     * @dataProvider fieldMaskCompareData
     */
    public function testFieldMaskCompare($originalResource, $modifiedResource, $expectedFieldMask)
    {
        $actualFieldMask = FieldMasks::compare($originalResource, $modifiedResource);
        $this->assertEquals($expectedFieldMask, $actualFieldMask);
    }

    public function fieldMaskCompareData()
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

    /**
     * @dataProvider fieldMaskAllSetFieldsOfData
     */
    public function testFieldMaskAllSetFieldsOf($resource, $expectedFieldMask)
    {
        $actualFieldMask = FieldMasks::allSetFieldsOf($resource);
        $this->assertEquals($expectedFieldMask, $actualFieldMask);
    }

    public function fieldMaskAllSetFieldsOfData()
    {
        $testData = [];
        $emptyResource = new Resource();
        foreach (self::loadTestCases() as $testCase) {
            $resource = $testCase->getModifiedResource();
            $testData[] = [$resource, FieldMasks::compare($emptyResource, $resource)];
        }
        return $testData;
    }
}
