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

use Composer\Script\Event;
use DirectoryIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/**
 * Utilities to remove the support for Google Ads API versions. It is typically used to reduce the
 * weight of the library and it can be used either in dev mode or not.
 */
class ApiVersionSupport
{
    /**
     * @var string the root path of the library
     */
    private $rootPath;

    /**
     * This PHP callback method can be used to define a Composer script.
     *
     * @param Event $event the event context provided by Composer which contains the arguments
     *     passed to the Composer script
     */
    public static function composerScriptCallback(Event $event)
    {
        // Removes all API versions specified in the arguments.
        $apiVersionSupport = new ApiVersionSupport();
        foreach ($event->getArguments() as $apiVersionToRemove) {
            if (is_numeric($apiVersionToRemove)) {
                print 'Removing support for API version ' . $apiVersionToRemove . PHP_EOL;
                $apiVersionSupport->removeDirectories(
                    $apiVersionSupport->getDirectoryPathsForApiVersion(intval($apiVersionToRemove))
                );
            }
        }
    }

    /**
     * Constructor.
     *
     * @param string|null $rootPath the root path of the library, the one that contains this class
     *     file is used by default
     */
    public function __construct(?string $rootPath)
    {
        $this->rootPath = $rootPath ?: dirname(__DIR__, 5);
    }

    /**
     * Gets the directory paths that are specific to a given Google Ads API version.
     *
     * @param int $version the Google Ads API version to get the directory paths of
     * @return string[] the paths
     */
    private function getDirectoryPathsForApiVersion(int $version): array
    {
        $paths = [];
        $versionName = 'V' . $version;

        $metadataPath = join(
            DIRECTORY_SEPARATOR,
            [$this->rootPath, 'metadata', 'Google', 'Ads', 'GoogleAds']
        );
        $paths[] = join(DIRECTORY_SEPARATOR, [$metadataPath, $versionName]);

        $srcPath = join(
            DIRECTORY_SEPARATOR,
            [$this->rootPath, 'src', 'Google', 'Ads', 'GoogleAds']
        );
        $paths[] = join(DIRECTORY_SEPARATOR, [$srcPath, $versionName]);
        $paths[] = join(DIRECTORY_SEPARATOR, [$srcPath, 'Util', $versionName]);
        $paths[] = join(DIRECTORY_SEPARATOR, [$srcPath, 'Lib', $versionName]);

        $testsPath = join(
            DIRECTORY_SEPARATOR,
            [$this->rootPath, 'tests', 'Google', 'Ads', 'GoogleAds']
        );
        $paths[] = join(DIRECTORY_SEPARATOR, [$testsPath, $versionName]);
        $paths[] = join(DIRECTORY_SEPARATOR, [$testsPath, 'Util', $versionName]);
        $paths[] = join(DIRECTORY_SEPARATOR, [$testsPath, 'Lib', $versionName]);

        return $paths;
    }

    /**
     * Recursively removes directories.
     *
     * @param string[] $paths the paths of the directories to remove
     */
    private function removeDirectories(array $paths)
    {
        foreach ($paths as $path) {
            if (file_exists($path)) {
                $files = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS),
                    RecursiveIteratorIterator::CHILD_FIRST
                );
                // Removes all contents.
                foreach ($files as $file) {
                    $file->isDir() ? rmdir($file->getRealPath()) : unlink($file->getRealPath());
                }
                // Removes self.
                rmdir($path);
                print 'Removed: ' . $path . PHP_EOL;
            } else {
                print 'Not found: ' . $path . PHP_EOL;
            }
        }
    }
}
