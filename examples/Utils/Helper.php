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
    
        public static function toMicro($number) {//min 10000 //1000000
        return (int) str_replace('.', '', number_format($number, 2, '.', '') . '0000');
    }

    public static function fromMicro($number) {//min 0.01 //1
        return (float) number_format($number / 1000000, 2, '.', '');
    }
}
