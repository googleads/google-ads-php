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

namespace Google\Ads\GoogleAds\Util;

use UnexpectedValueException;

/**
 * Provides methods for obtaining environmental variables in a
 * platform-independant manner.
 */
class EnvironmentalVariables
{
    /**
     * Attempts to find the home directory of the user running the PHP script.
     *
     * @return string the path to the home directory with any trailing directory
     *     separators removed
     * @throws UnexpectedValueException if a home directory could not be found
     */
    public function getHome()
    {
        $home = null;

        if (!empty(getenv('HOME'))) {
            // Try the environmental variables.
            $home = getenv('HOME');
        } elseif (!empty($_SERVER['HOME'])) {
            // If not in the environment variables, check the super global $_SERVER as
            // a last resort.
            $home = $_SERVER['HOME'];
        } elseif (!empty(getenv('HOMEDRIVE')) && !empty(getenv('HOMEPATH'))) {
            // If the 'HOME' environmental variable wasn't found, we may be on
            // Windows.
            $home = getenv('HOMEDRIVE') . getenv('HOMEPATH');
        } elseif (!empty($_SERVER['HOMEDRIVE']) && !empty($_SERVER['HOMEPATH'])) {
            $home = $_SERVER['HOMEDRIVE'] . $_SERVER['HOMEPATH'];
        }

        if ($home === null) {
            throw new UnexpectedValueException('Could not locate home directory.');
        }

        return rtrim($home, '\\/');
    }

    /**
     * Retrieves the environment variable value of a given name.
     *
     * @param string $name the name
     * @return string|null the value if any, null otherwise
     */
    public function get(string $name): ?string
    {
        if (!empty(getenv($name))) {
            // Tries the environmental variables.
            return getenv($name);
        } elseif (!empty($_SERVER[$name])) {
            // Tries the super global $_SERVER.
            return $_SERVER[$name];
        }

        return null;
    }

    /**
     * Retrieves the environment variables that start with a given prefix.
     *
     * @param string|null $prefix the prefix
     * @return array an associative array with matching environment variable names and values
     */
    public function getStartingWith(?string $prefix): array
    {
        if (is_null($prefix)) {
            return getenv();
        }

        $envVars = [];
        $prefixLength = strlen($prefix);
        foreach (getenv() as $name => $value) {
            if (strpos($name, $prefix) === 0) {
                $envVars[substr($name, $prefixLength)] = $value;
            }
        }

        return $envVars;
    }
}
