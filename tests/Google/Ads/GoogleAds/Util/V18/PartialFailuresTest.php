<?php

/*
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

namespace Google\Ads\GoogleAds\Util\V18;

use Google\Rpc\Status;
use Google\Protobuf\GPBEmpty;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `PartialFailures`.
 *
 * @see PartialFailures
 * @small
 */
class PartialFailuresTest extends TestCase
{
    public function testIsPartialFailure()
    {
        $emptyMessage = new GPBEmpty();

        $this->assertTrue(PartialFailures::isPartialFailure($emptyMessage));
    }

    public function testNotPartialFailure()
    {
        $someMessage = new Status(['message' => 'a']);

        $this->assertFalse(PartialFailures::isPartialFailure($someMessage));
    }
}
