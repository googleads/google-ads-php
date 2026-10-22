<?php

/**
 * Copyright 2025 Robert Humphries <services@developer-rob.co.uk>
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

/**
 * Utilities to manage the support for Google Ads API versions in the library.
 */
class DynamicVersionAutoloader
{
    /** @var string The project's base namespace */
    private const BASE_NAMESPACE = "Google\\Ads\\GoogleAds\\";

    public static function getOldestSupportedApiVersion(): int
    {
        return min(static::getSupportedApiVersions());
    }

    public static function getLatestSupportedApiVersion(): int
    {
        return max(static::getSupportedApiVersions());
    }

    public static function getSupportedApiVersions(): array
    {
        $versionArray = [];

        foreach (scandir(__DIR__) as $directory) {
            if ($directory[0] === "V") {
                $directoryVersion = \substr($directory, 1);
                if ((int)$directoryVersion != 0) {
                    $versionArray[] = $directoryVersion;
                }
            }
        }

        return $versionArray;
    }

    /**
     * This function will register an autoloader that will convert
     * \Google\Ads\GoogleAds\Current\... to \Google\Ads\GoogleAds\V{$version}
     * for all namespaces where a version number exists.
     *
     * @param int $version A numeric version to use for all calls
     */
    public static function setGoogleAdsAutoloaderCurrentVersion(int $version): void
    {
        if (class_exists(__NAMESPACE__ . "\\V{$version}\\GoogleAdsErrors") === false) {
            throw new \ValueError("{$version} specified for \$version is not provided by the SDK");
        }

        if (class_exists(__NAMESPACE__ . "\\Current\\GoogleAdsErrors", true)) {
            throw new \ValueError("Autoloader already registered for " . __NAMESPACE__ . "\\Current");
        }

        static::setGoogleAdsAutoloader("Current", $version);
    }

    public static function setGoogleAdsAutoloaderLatestVersion(): void
    {
        if (class_exists(__NAMESPACE__ . "\\Latest\\GoogleAdsErrors", true)) {
            throw new \ValueError("Autoloader already registered for " . __NAMESPACE__ . "\\Latest");
        }

        static::setGoogleAdsAutoloader("Latest", static::getLatestSupportedApiVersion());
    }

    protected static function setGoogleAdsAutoloader(string $namespaceString, int $apiVersion): void
    {
        \spl_autoload_register(
            static function (string $class) use ($namespaceString, $apiVersion): void {
                if (
                    \strcasecmp(
                        \substr($class, 0, strlen(static::BASE_NAMESPACE)),
                        static::BASE_NAMESPACE,
                    ) != 0
                ) {
                    return;
                }

                $baseNamespace = static::BASE_NAMESPACE;
                $namespacePortions = explode("\\", \substr($class, strlen(static::BASE_NAMESPACE)));
                if (\in_array(\strtolower($namespacePortions[0]), ["lib", "util"])) {
                    $baseNamespace .= "{$namespacePortions[0]}\\";
                    \array_shift($namespacePortions);
                }

                if (\strcasecmp($namespacePortions[0], $namespaceString) != 0) {
                    return;
                }
                \array_shift($namespacePortions);

                $fullyQualifiedClassName    = "{$baseNamespace}V{$apiVersion}\\" . implode("\\", $namespacePortions);

                if (class_exists($fullyQualifiedClassName, true)) {
                    \class_alias($fullyQualifiedClassName, $class);
                }
            }
        );
    }
}
