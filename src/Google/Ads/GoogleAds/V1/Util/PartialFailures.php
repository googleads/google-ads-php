<?php
/**
 * Copyright 2019 Google LLC
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

namespace Google\Ads\GoogleAds\V1\Util;

use \Google\Protobuf\Internal\Message;
use Google\Ads\GoogleAds\V1\Errors\GoogleAdsFailure;

final class PartialFailures
{
    /**
     * Initializes a GoogleAdsFailure to make sure that the metadata pool knows about it.
     */
    public static function initialize()
    {
        $tempUnusedVar = new GoogleAdsFailure();
    }

    /**
     * Checks if a result in a mutate response is a partial failure.
     *
     * @param Message $message
     * @return bool
     */
    public static function isPartialFailure(Message $message)
    {
        return $message->byteSize() == 0;
    }
}
