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

namespace Google\Ads\GoogleAds\Lib\Testing;

/**
 * Provides testing data for the `OAuth2TokenBuilderTest`.
 *
 * @see \Google\Ads\GoogleAds\Lib\OAuth2TokenBuilderTest
 */
class OAuth2TokenBuilderTestProvider
{
    /**
     * Gets the file path to a fake JSON key file for testing.
     *
     * @return string
     */
    public static function getFakeJsonKeyFilePath()
    {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . 'API-Project-abc123xyz.json';
    }
}
