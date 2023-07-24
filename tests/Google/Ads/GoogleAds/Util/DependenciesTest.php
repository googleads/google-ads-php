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

use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `Dependencies`.
 *
 * @covers \Google\Ads\GoogleAds\Util\Dependencies
 * @small
 */
class DependenciesTest extends TestCase
{
    /** @var Dependencies $dependencies */
    private $dependencies;
    /** @var string $composerLockFilePath */
    private $composerLockFilePath;
    /** @var string $composerLockWithoutGrpcFilePath */
    private $composerLockWithoutGrpcFilePath;

    /**
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    protected function setUp(): void
    {
        $this->dependencies = new Dependencies();
        $this->composerLockFilePath = DependenciesTestProvider::getFakeComposerLockFilePath();
        $this->composerLockWithoutGrpcFilePath =
            DependenciesTestProvider::getFakeComposerLockWithoutGrpcFilePath();
    }


    public function testGetGrpcComposerVersion()
    {
        $this->assertEquals(
            '1.52.0',
            $this->dependencies->getGrpcComposerVersion($this->composerLockFilePath)
        );
    }

    public function testGetGrpcComposerVersionNotFound()
    {
        $this->assertNull(
            $this->dependencies->getGrpcComposerVersion($this->composerLockWithoutGrpcFilePath)
        );
    }
}
