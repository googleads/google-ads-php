<?php

/**
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

namespace  Google\Ads\GoogleAds\Lib;

use Google\Ads\GoogleAds\Util\EnvironmentalVariables;
use InvalidArgumentException;
use UnexpectedValueException;

/**
 * Loads settings from *.ini files into configuration objects.
 *
 * @see Configuration
 */
final class ConfigurationLoader
{

    private $environmentalVariables;

    /**
     * @param EnvironmentalVariables $environmentalVariables
     */
    public function __construct(
        EnvironmentalVariables $environmentalVariables = null
    ) {
        $this->environmentalVariables = is_null($environmentalVariables)
            ? new EnvironmentalVariables() : $environmentalVariables;
    }

    /**
     * Creates a configuration from a file path to an *.ini file. If the file isn't
     * found in the specified path, we will try to find the file in the user's
     * home directory.
     *
     * E.g., If you specified the path "/config/googleads/google_ads_php.ini" and it
     * doesn't exist, we will try to find "google_ads_php.ini" in your home directory.
     *
     * @param string $configIniFilePath the file path to the *.ini file
     * @throws InvalidArgumentException if the config file could not be found
     * @return Configuration the created configuration
     */
    public function fromFile($configIniFilePath)
    {
        if (!file_exists($configIniFilePath)) {
            try {
                $home = $this->environmentalVariables->getHome();
                $homeConfigIniFilePath =
                    $home . DIRECTORY_SEPARATOR . pathinfo($configIniFilePath, PATHINFO_BASENAME);
                if (file_exists($homeConfigIniFilePath)) {
                    $configIniFilePath = $homeConfigIniFilePath;
                } else {
                    throw new InvalidArgumentException(
                        sprintf(
                            "Config file not found as specified: '%s' or in the home directory: '%s'.",
                            $configIniFilePath,
                            $homeConfigIniFilePath
                        )
                    );
                }
            } catch (UnexpectedValueException $e) {
                throw new InvalidArgumentException(
                    sprintf(
                        "Config file not found as specified: '%s'. Home "
                        . "directory could not be located so it was not searched.",
                        $configIniFilePath
                    )
                );
            }
        }

        return new Configuration(parse_ini_file($configIniFilePath, true));
    }

    /**
     * Creates a configuration from an *.ini string.
     *
     * @param string $iniString
     * @return Configuration the created configuration
     */
    public function fromString($iniString)
    {
        return new Configuration(parse_ini_string($iniString, true));
    }
}
