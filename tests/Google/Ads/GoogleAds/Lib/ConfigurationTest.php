<?php

/*
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

namespace Google\Ads\GoogleAds\Lib;

use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `Configuration`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\Configuration
 * @small
 */
class ConfigurationTest extends TestCase
{

    /** @var Configuration $configuration */
    private $configuration;

    /**
     * @see \PHPUnit\Framework\TestCase::setUp
     */
    protected function setUp()
    {
        $this->configuration = new Configuration(['DEFAULT' => ['a' => 'value'], 'b' => 'value2']);
    }

    public function testGetConfigurationWithSection()
    {
        $this->configuration = new Configuration(['DEFAULT' => ['a' => 'value'], 'b' => 'value2']);
        $this->assertEquals('value', $this->configuration->getConfiguration('a', 'DEFAULT'));
    }

    public function testGetConfigurationWithNoSection()
    {
        $this->assertEquals('value2', $this->configuration->getConfiguration('b'));
    }

    public function testGetConfigurationNotFound()
    {
        $this->assertNull($this->configuration->getConfiguration('c'));
    }
}
