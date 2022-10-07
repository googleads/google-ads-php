<?php

/**
 * Copyright 2022 Google LLC
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

namespace Google\Ads\GoogleAds\Util\V12;

use Google\Protobuf\Any;
use Google\Protobuf\DescriptorPool;
use Google\Protobuf\Internal\RepeatedField;
use Google\Rpc\Status;
use Google\Ads\GoogleAds\V12\Errors\GoogleAdsFailure;

final class GoogleAdsFailures
{
    /**
     * Unpacks a single GoogleAdsFailure from an Any instance.
     *
     * @param Any $any an Any instance to unpack
     * @return GoogleAdsFailure
     */
    public static function fromAny(Any $any)
    {
        self::init();
        $ret = $any->unpack();
        if (!$ret instanceof GoogleAdsFailure) {
            throw new \InvalidArgumentException("Message did not contain a GoogleAdsFailure");
        }

        return $ret;
    }

    /**
     * Gets a single GoogleAdsFailure by combining all errors from a list of Any objects.
     *
     * @param Any[]|RepeatedField $anys a list of Any instances to unpack
     * @return GoogleAdsFailure
     */
    public static function fromAnys($anys)
    {
        $errors = [];
        foreach ($anys as $any) {
            /** @var Any $any */
            $ret = self::fromAny($any);
            $errors = array_merge($errors, iterator_to_array($ret->getErrors()->getIterator()));
        }
        return new GoogleAdsFailure(['errors' => $errors]);
    }

    /**
     * Unpacks GoogleAdsFailure from the partial failure Status.
     *
     * @param Status $status
     * @return GoogleAdsFailure[]
     */
    public static function fromStatus(Status $status)
    {
        $result = [];
        foreach ($status->getDetails() as $any) {
            $result[] = GoogleAdsFailures::fromAny($any);
        }
        return $result;
    }

    /**
     * Initializes.
     */
    public static function init()
    {
        // This initialization is needed to populate the descriptor pool with the GoogleAdsFailure
        // class and prevent exceptions from being thrown.
        if (
            is_null(
                DescriptorPool::getGeneratedPool()->getDescriptorByClassName(
                    GoogleAdsFailure::class
                )
            )
        ) {
            new GoogleAdsFailure();
        }
    }
}
