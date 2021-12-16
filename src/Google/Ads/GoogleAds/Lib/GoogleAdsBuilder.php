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
 * Populates a data object from configuration settings.
 *
 * @see Configuration
 */
interface GoogleAdsBuilder
{
    /**
     * @var string the default filename for the configuration file for this
     *     library
     */
    public const DEFAULT_CONFIGURATION_FILENAME = 'google_ads_php.ini';

    /**
     * @var string the prefix of the environment variable names used for configuration
     */
    public const CONFIGURATION_ENVIRONMENT_VARIABLES_PREFIX = 'GOOGLE_ADS_';

    /**
     * @var string the environment variable name used to specify the default configuration file path
     */
    public const DEFAULT_CONFIGURATION_FILENAME_ENVIRONMENT_VARIABLE_NAME =
        self::CONFIGURATION_ENVIRONMENT_VARIABLES_PREFIX . 'CONFIGURATION_FILE_PATH';

    /**
     * Populates this builder from the specified configuration object.
     *
     * @param Configuration $configuration the configuration
     * @return self this builder populated from the configuration
     */
    public function from(Configuration $configuration);

    /**
     * Populates this builder from the specified configuration object.
     *
     * @param Configuration $configuration the configuration
     * @return self this builder populated from the configuration
     */
    public function fromEnvironmentVariablesConfiguration(Configuration $configuration);

    /**
     * Populates this builder from the specified file path.
     *
     * @param string $path the file path
     * @return self this builder populated from the configuration
     */
    public function fromFile(string $path);

    /**
     * Populates this builder from environment variables.
     *
     * @return self this builder populated from the configuration
     */
    public function fromEnvironmentVariables();

    /**
     * Creates a new instance of the data object being populated. This method
     * should call defaultOptionals() and validate().
     *
     * @return mixed the data object
     * @throws \InvalidArgumentException if there are any validation errors
     */
    public function build();

    /**
     * Sets all optional fields to their default if they are `null`.
     */
    public function defaultOptionals();

    /**
     * Checks that required fields have been included and all included
     * fields are valid (e.g., URIs are valid).
     *
     * @throws \InvalidArgumentException if there are any validation errors
     */
    public function validate();
}
