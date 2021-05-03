<?php

/**
 * Copyright 2021 Google LLC
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

use PHPUnit\Framework\TestCase;

/**
 * @small
 */
class ApiVersionSupportTest extends TestCase
{
    /**
     * @var string the path where files are located for the tests
     */
    private $mockPath;

    public function setUp(): void
    {
        // Creates a folder that is empty, unique and temporary for the tests.
        $this->mockPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'google-ads-php_' . uniqid();
        mkdir($this->mockPath);
    }

    public function testRemoveDirectories()
    {
        // Creates the content to be removed:
        // |- empty_dir
        // |- full_dir
        //   |- file1
        //   |- sub_dir
        //      |- file2
        $empty_dir = $this->mockPath . DIRECTORY_SEPARATOR . 'empty_dir';
        $full_dir = $this->mockPath . DIRECTORY_SEPARATOR . 'full_dir';
        $sub_dir = $full_dir . DIRECTORY_SEPARATOR . 'sub_dir';
        mkdir($empty_dir);
        mkdir($full_dir);
        mkdir($sub_dir);
        file_put_contents($full_dir . DIRECTORY_SEPARATOR . 'file1', '');
        file_put_contents($sub_dir . DIRECTORY_SEPARATOR . 'file2', '');

        // Removes all the created directories including a missing one.
        $apiVersionSupport = new ApiVersionSupport($this->mockPath);
        $missingDir = $this->mockPath . DIRECTORY_SEPARATOR . 'missingDir';
        $apiVersionSupport->removeDirectories([
            $empty_dir,
            $full_dir,
            $missingDir
        ]);

        // Asserts that there is no content left.
        $this->assertEquals(
            [],
            array_diff(scandir($this->mockPath), array('..', '.')),
            'Not all the content was removed'
        );
    }

    public function testGetDirectoryPathsForApiVersion()
    {
        $version = 0;
        $numberOfPaths = 7;
        $defaultPaths = (new ApiVersionSupport())->getDirectoryPathsForApiVersion($version);
        $this->assertEquals(
            $numberOfPaths,
            count($defaultPaths),
            'The number of returned paths should be ' . $numberOfPaths
        );
        foreach ($defaultPaths as $path) {
            $versionFolder = DIRECTORY_SEPARATOR . 'V' . $version;
            // The path should ends with the version folder.
            $this->assertTrue(
                strlen($path) - strlen($versionFolder) === strrpos($path, $versionFolder, 0),
                'All returned paths should be specific to the provided version'
            );
        }

        $givenPaths = (new ApiVersionSupport($this->mockPath))->getDirectoryPathsForApiVersion(0);
        $this->assertNotEquals(
            $defaultPaths,
            $givenPaths,
            'The library root path used should be the provided one'
        );
    }
}
