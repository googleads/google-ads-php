<?php

/*
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
 * Provides testing data for the `DependenciesTest`.
 *
 * @see \Google\Ads\GoogleAds\Util\DependenciesTest
 */
class DependenciesTestProvider
{
    /**
     * Gets the file path to a fake composer.lock file.
     *
     * @return string
     */
    public static function getFakeComposerLockFilePath()
    {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . 'fake-composer.lock';
    }

    /**
     * Gets the file path to a fake composer.lock file containing no grpc.
     *
     * @return string
     */
    public static function getFakeComposerLockWithoutGrpcFilePath()
    {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . 'fake-composer-no-grpc.lock';
    }
}
