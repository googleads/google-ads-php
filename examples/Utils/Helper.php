<?php

/**
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

namespace Google\Ads\GoogleAds\Examples\Utils;

use DateTime;

/**
 * General utilities that are shared between code examples.
 */
final class Helper
{
    /**
     * Generates a printable string for the current date and time in local time zone.
     * @return string the result string
     */
    public static function getPrintableDatetime(): string
    {
        return (new DateTime())->format("Y-m-d\TH:i:s.vP");
    }

    /**
     * Generates a short printable string for the current date and time in local time zone.
     * @return string the result string
     */
    public static function getShortPrintableDatetime(): string
    {
        return (new DateTime())->format("mdHisv");
    }

    /**
     * Converts an amount from the micro unit to the base unit.
     *
     * @param int|float|null $amount the amount in micro unit
     * @return float the amount converted to the base unit if not null otherwise 0
     */
    public static function microToBase($amount): float
    {
        return $amount ? $amount / 1000000.0 : 0.0;
    }

    /**
     * Converts an amount from the base unit to the micro unit.
     *
     * @param float|int|null $amount the amount in base unit
     * @return int the amount converted to the micro unit if not null otherwise 0
     */
    public static function baseToMicro($amount): int
    {
        return $amount ? (int) ($amount * 1000000) : 0;
    }
}
