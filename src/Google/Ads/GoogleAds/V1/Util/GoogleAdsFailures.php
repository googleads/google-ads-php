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

use \Google\Protobuf\Any;
use \Google\Rpc\Status;
use Google\Ads\GoogleAds\V1\Errors\GoogleAdsFailure;

final class GoogleAdsFailures
{
    /**
     * Unpacks a single GoogleAdsFailure from an Any instance.
     *
     * @param Any An Any instance to unpack
     * @return GoogleAdsFailure
     */
    public static function fromAny(Any $any)
    {
        return $any->unpack();
    }

    /**
     * Unpacks GoogleAdsFailure from the partial failure Status.
     *
     * @param Status $status
     * @return GoogleAdsFailure
     */
    public static function fromStatus(Status $status)
    {
        $result = [];
        foreach ($status->getDetails() as $any) {
            $result[] = GoogleAdsFailures::fromAny($any);
        }
        return $result;
    }
}
