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

use Google\Auth\FetchAuthTokenInterface;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Unit tests for `ConfigurationTrait`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\ConfigurationTrait
 * @small
 */
class ConfigurationTraitTest extends TestCase
{
    /** @var ConfigurationTraitInserted $configurationTraitInserted */
    private $configurationTraitInserted;

    /** @var LoggerInterface $loggerMock */
    private $loggerMock;

    /** @var FetchAuthTokenInterface $fetchAuthTokenInterfaceMock */
    private $fetchAuthTokenInterfaceMock;

    /**
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    protected function setUp(): void
    {
        $this->loggerMock =
            $this->getMockBuilder(LoggerInterface::class)->disableOriginalConstructor()->getMock();
        $this->fetchAuthTokenInterfaceMock =
            $this->getMockBuilder(FetchAuthTokenInterface::class)->disableOriginalConstructor()->getMock();

        $this->configurationTraitInserted = new ConfigurationTraitInserted(
            'AbCdEf',
            12345,
            67890,
            'ads.google.com',
            $this->fetchAuthTokenInterfaceMock,
            $this->loggerMock,
            LogLevel::INFO,
            'localhost',
            'grpc'
        );
    }

    public function testGetDeveloperToken()
    {
        $this->assertEquals('AbCdEf', $this->configurationTraitInserted->getDeveloperToken());
    }

    public function testGetLoginCustomerId()
    {
        $this->assertEquals(12345, $this->configurationTraitInserted->getLoginCustomerId());
    }

    public function testGetLinkedCustomerId()
    {
        $this->assertEquals(67890, $this->configurationTraitInserted->getLinkedCustomerId());
    }

    public function testGetEndpoint()
    {
        $this->assertEquals('ads.google.com', $this->configurationTraitInserted->getEndpoint());
    }

    public function testGetOAuth2Credential()
    {
        $this->assertSame(
            $this->fetchAuthTokenInterfaceMock,
            $this->configurationTraitInserted->getOAuth2Credential()
        );
    }

    public function testGetLogger()
    {
        $this->assertSame($this->loggerMock, $this->configurationTraitInserted->getLogger());
    }

    public function testGetLogLevel()
    {
        $this->assertEquals(LogLevel::INFO, $this->configurationTraitInserted->getLogLevel());
    }

    public function testGetProxy()
    {
        $this->assertEquals('localhost', $this->configurationTraitInserted->getProxy());
    }

    public function testGetTransport()
    {
        $this->assertEquals('grpc', $this->configurationTraitInserted->getTransport());
    }
}
