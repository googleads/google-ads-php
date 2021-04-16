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

namespace Google\Ads\GoogleAds;

use Composer\Script\Event;
use DirectoryIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/**
 * Removes the support of Google Ads API versions. It can be used to reduce the weight of the
 * library.
 *
 * TODO(pierrick): args doc
 */
class RemoveApiVersionSupport
{

    public static function mainCallback(Event $event)
    {
        print '--- Remove API Version support tool' . PHP_EOL;
        $arguments = $event->getArguments();
        if ($arguments) {
            // Removes all versions that are not specified in arguments.
            $apiVersionsToRemove = [];
            foreach (self::getSupportedVersions() as $version) {
                if (!in_array($version, $arguments)) {
                    $apiVersionsToRemove[] = $version;
                }
            }
            print 'The support of the following API versions will be removed: ';
            print self::printVersions($apiVersionsToRemove);
            print PHP_EOL;
            if (!array_search('-f', $arguments)) {
                print 'Enter "y" to confirm that you want to remove [no]: ';
                if (str_replace(PHP_EOL, '', fgets(STDIN)) !== 'y') {
                    print 'No API versions to remove, quitting.' . PHP_EOL;
                    return;
                }
            }
            foreach ($apiVersionsToRemove as $apiVersionToRemove) {
                self::removeApiVersionSupport($apiVersionToRemove);
            }
            print 'Done, quitting.' . PHP_EOL;
        } else {
            // Uses interactive mode.
            while (true) {
                print 'Here are the versions currently supported: ';
                self::printVersions(self::getSupportedVersions());
                print PHP_EOL;
                print 'Enter the API version you want to remove the support for [Quit]: ';
                $apiVersionToRemove = str_replace(PHP_EOL, '', fgets(STDIN));
                if ($apiVersionToRemove) {
                    self::removeApiVersionSupport($apiVersionToRemove);
                } else {
                    print 'No API version entered, quitting.' . PHP_EOL;
                    break;
                }
                print '---' . PHP_EOL;
            }
        }
    }

    /**
     * Prints a set of API versions.
     *
     * @param string[] $versions the API versions to print
     */
    public static function printVersions(array $versions)
    {
        if ($versions) {
            print join(', ', $versions);
        } else {
            print 'none';
        }
    }

    /**
     * Returns the supported versions of Google Ads API.
     * @return string[] the versions
     */
    public static function getSupportedVersions()
    {
        // Retrieves all existing versions based on library content.
        $dirIterator = new DirectoryIterator(__DIR__ . '/Lib');
        $apiVersions = [];
        foreach ($dirIterator as $element) {
            // Filters the directories that are dedicated to specific API versions.
            $matches = [];
            preg_match('/^V([0-9]+)$/', $element->getFilename(), $matches);
            if ($element->isDot() || !$element->isDir() || !$matches) {
                continue;
            }
            $apiVersions[] = $matches[1];
        }
        return $apiVersions;
    }

    /**
     * Removes the support of one Google Ads API version.
     *
     * @param string $apiVersion the Google Ads API version to remove support for
     */
    private static function removeApiVersionSupport(string $apiVersion)
    {
        // Checks that the version exists.
        $apiVersionIndex = array_search($apiVersion, self::getSupportedVersions());
        if ($apiVersionIndex === false) {
            print 'The provided API version is not supported' . PHP_EOL;
            return;
        }

        // Removes the associated folders
        $rootPath = dirname(__DIR__, 4);
        self::removeDirectory($rootPath . '/metadata/Google/Ads/GoogleAds/V' . $apiVersion);
        self::removeDirectory(__DIR__ . '/V' . $apiVersion);
        self::removeDirectory(__DIR__ . '/Util/V' . $apiVersion);
        self::removeDirectory(__DIR__ . '/Lib/V' . $apiVersion);
        self::removeDirectory($rootPath . '/tests/Google/Ads/GoogleAds/V' . $apiVersion);
        self::removeDirectory($rootPath . '/tests/Google/Ads/GoogleAds/Util/V' . $apiVersion);
        self::removeDirectory($rootPath . '/tests/Google/Ads/GoogleAds/Lib/V' . $apiVersion);

        print 'The support of the API version ' . $apiVersion . ' was successfully removed.' . PHP_EOL;
    }

    /**
     * Recursivelly removes a given directory.
     *
     * @param string $path the path of the directory to remove
     */
    private static function removeDirectory(string $path)
    {
        print 'Removing directory: ' . $path . PHP_EOL;
        $dirIterator =
            new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS);
        $fileIterator =
            new RecursiveIteratorIterator($dirIterator, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($fileIterator as $file) {
            if ($file->isDir()) {
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        rmdir($path);
    }
}
