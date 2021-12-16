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

namespace Google\Ads\GoogleAds\Lib;

/**
 * Holds and helps retrieve configuration data.
 */
class Configuration
{
    private $config;

    /**
     * Creates a new configuration from the specified associative array of settings.
     *
     * @param array $settings an associative array of settings
     */
    public function __construct(array $settings)
    {
        $this->config = $settings;
    }

    /**
     * Gets the value for the specified setting name.
     *
     * @param string $name the setting name
     * @param string $section optional, the name of the section containing the
     *     setting
     * @return string|null the value of the setting, or null if it doesn't exist
     */
    public function getConfiguration($name, $section = null)
    {
        $configValue = null;

        if ($section === null) {
            if (array_key_exists($name, $this->config)) {
                $configValue = $this->config[$name];
            }
        } else {
            if (array_key_exists($section, $this->config)) {
                $sectionSettings = $this->config[$section];
                if (array_key_exists($name, $sectionSettings)) {
                    $configValue = $sectionSettings[$name];
                }
            }
        }

        return $configValue;
    }
}
