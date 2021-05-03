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

use DateTime;
use PHPUnit\Framework\TestCase;
use Google\ApiCore\ValidationException;
use GuzzleHttp\Exception\ConnectException;

class ApiVersionSupportTest extends TestCase
{
    private $mockPath;

    public function setUp()
    {
        // Builds the temporary directory that will be used for tests.
        $this->mockPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR .
            'google-ads-php_' . (new DateTime())->format("mdHisv");
        mkdir($this->mockPath);
    }

    public function testRemoveDirectories()
    {
        // Creates directory content.
        // Removes it.
        // Assert empty content.
    }

    public function getDirectoryPathsForApiVersion()
    {
        // Get and assert default paths
        // Get and assert paths for given lib root path
    }
}
