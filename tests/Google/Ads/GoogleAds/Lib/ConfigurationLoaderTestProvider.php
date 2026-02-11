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

namespace Google\Ads\GoogleAds\Lib;

/**
 * Provides testing data for the `ConfigurationLoaderTest`.
 *
 * @see \Google\Ads\GoogleAds\Lib\ConfigurationLoaderTest
 */
class ConfigurationLoaderTestProvider
{
    /**
     * Gets the absolute file path to the fake INI file used for
     * `ConfigurationLoader` tests.
     *
     * @return string
     */
    public static function getFilePathForTestIniFile()
    {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . 'google_ads_php.ini';
    }

    /**
     * Gets the absolute file path to the fake home directory for
     * `ConfigurationLoader` tests.
     *
     * @return string
     */
    public static function getFilePathToFakeHome()
    {
        $path = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'fakehome';
        
        // --- NEW CODE STARTS HERE ---
        // Automatically create the directory if it doesn't exist
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        // --- NEW CODE ENDS HERE ---
        
        return $path;
    }

    /**
     * Gets the absolute file path of the fake INI file located in the fake home directory.
     *
     * @return string
     */
    public static function getFakeHomeFilePathForTestIniFile()
    {
        $filePath = self::getFilePathToFakeHome() . DIRECTORY_SEPARATOR . 'home_google_ads_php.ini';
        
        // --- NEW CODE STARTS HERE ---
        // Automatically create a dummy .ini file if it doesn't exist
        if (!file_exists($filePath)) {
            $dummyContent = "[GOOGLE_ADS]\ndeveloperToken = 'dummy-token'\n"
                . "loginCustomerId = 123456789\n\n"
                . "[OAUTH2]\nclientId = 'dummy-id'\nclientSecret = 'dummy-secret'\n"
                . "refreshToken = 'dummy-token'";
            file_put_contents($filePath, $dummyContent);
        }
        // --- NEW CODE ENDS HERE ---
        
        return $filePath;
    }
}

