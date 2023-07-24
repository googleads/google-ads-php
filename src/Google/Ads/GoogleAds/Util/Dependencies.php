<?php

/**
 * Copyright 2023 Google LLC
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
 * Utilities for dependencies of the Google Ads API PHP client library.
 */
class Dependencies
{
    /**
     * Gets the grpc version installed by Composer from the specified file (default to
     *  `composer.lock`. Returns null if that information cannot be found by any causes.
     *
     * @param string $fileName the file name to extract the grpc version from
     * @return null|string the grpc version installed by Composer
     */
    public function getGrpcComposerVersion(string $fileName = 'composer.lock'): ?string
    {
        if (!file_exists($fileName)) {
            return null;
        }
        $composerLockFileContents = file_get_contents($fileName);
        if (empty($composerLockFileContents)) {
            return null;
        }

        $composerLockJson = json_decode($composerLockFileContents, true);
        if (!array_key_exists('packages', $composerLockJson)) {
            return null;
        }

        $grpcComposerVersion = null;
        foreach ($composerLockJson['packages'] as $package) {
            if ($package['name'] === 'grpc/grpc') {
                return $package['version'];
            }
        }
        return null;
    }

    /**
     * Gets the grpc version installed on as a system package, e.g., by PECL.
     * Returns null if that information cannot be found by any causes.
     *
     * @return null|string the grpc version installed as a system package
     */
    public function getGrpcSystemPackageVersion(): ?string
    {
        $grpcVersion = phpversion('grpc');
        return $grpcVersion ?? null;
    }
}
