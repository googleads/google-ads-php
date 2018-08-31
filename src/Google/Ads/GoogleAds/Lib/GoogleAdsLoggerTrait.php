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

use Monolog\Logger;

/**
 * Contains methods related to Google Ads logging.
 */
trait GoogleAdsLoggerTrait
{
    private static $logLevelList;
    private static $logLevelNamesToNormalizedValues;

    /**
     * Returns the next finer PSR-3 log level for the specified log level.
     *
     * @param string $level the current log level
     * @return string the level name
     */
    private static function getNextFinerLogLevel($level)
    {
        if (!isset(self::$logLevelList) || !isset(self::$logLevelNamesToNormalizedValues)) {
            self::$logLevelList = array_keys(Logger::getLevels());
            self::$logLevelNamesToNormalizedValues = array_flip(self::$logLevelList);
        }

        $currentLevel = self::$logLevelNamesToNormalizedValues[strtoupper($level)];
        if (!isset($currentLevel)) {
            throw new \InvalidArgumentException("The specified log level '$level' is invalid.");
        }
        if ($currentLevel === 0) {
            // DEBUG is the finest level, so returns itself instead.
            return $level;
        }

        return self::$logLevelList[$currentLevel - 1];
    }
}
