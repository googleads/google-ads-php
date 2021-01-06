<?php

/*
 * Copyright 2020 Google LLC
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

use Google\Ads\GoogleAds\Util\EnvironmentalVariables;
use InvalidArgumentException;

/**
 * Abstract class of Google Ads API builders.
 */
abstract class AbstractGoogleAdsBuilder implements GoogleAdsBuilder
{
    private $configurationLoader;
    private $environmentalVariables;

    public function __construct(
        ConfigurationLoader $configurationLoader = null,
        EnvironmentalVariables $environmentalVariables = null
    ) {
        $this->configurationLoader = $configurationLoader ?? new ConfigurationLoader();
        $this->environmentalVariables = $environmentalVariables ?? new EnvironmentalVariables();
    }

    /**
     * Reads configuration settings from the specified file path. The file path is optional,
     * and if omitted, the default file path is used.
     *
     * @see GoogleAdsBuilder::DEFAULT_CONFIGURATION_FILENAME_ENVIRONMENT_VARIABLE_NAME
     *
     * @param string $path the file path
     * @return self this builder populated from the configuration
     * @throws InvalidArgumentException if the configuration file could not be found
     */
    public function fromFile(string $path = null): GoogleAdsBuilder
    {
        if ($path === null) {
            $path = $this->environmentalVariables->get(
                GoogleAdsBuilder::DEFAULT_CONFIGURATION_FILENAME_ENVIRONMENT_VARIABLE_NAME
            ) ?? self::DEFAULT_CONFIGURATION_FILENAME;
        }
        return $this->from($this->configurationLoader->fromFile($path));
    }

    /**
     * Reads configuration settings from the environment variables that are prefixed as required.
     *
     * @see GoogleAdsBuilder::CONFIGURATION_ENVIRONMENT_VARIABLES_PREFIX
     *
     * @return self this builder populated from the configuration
     */
    public function fromEnvironmentVariables(): GoogleAdsBuilder
    {
        return $this->fromEnvironmentVariablesConfiguration(
            $this->configurationLoader->fromEnvironmentVariables(
                self::CONFIGURATION_ENVIRONMENT_VARIABLES_PREFIX
            )
        );
    }
}
