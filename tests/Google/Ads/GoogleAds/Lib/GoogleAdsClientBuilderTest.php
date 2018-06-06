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

use Google\Auth\FetchAuthTokenInterface;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `GoogleAdsClientBuilder`.
 *
 * @see GoogleAdsClientBuilder
 * @small
 */
class GoogleAdsClientBuilderTest extends TestCase
{

    /** @var GoogleAdsClientBuilder $googleAdsClientBuilder*/
    private $googleAdsClientBuilder;
    private $fetchAuthTokenInterfaceMock;

    /**
     * @see \PHPUnit\Framework\TestCase::setUp
     */
    protected function setUp()
    {
        $this->googleAdsClientBuilder = new GoogleAdsClientBuilder();
        $this->fetchAuthTokenInterfaceMock = $this
            ->getMockBuilder(FetchAuthTokenInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @covers \Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder::from
     * @covers \Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder::build
     */
    public function testBuildClientFromConfiguration()
    {
        $valueMap = [
            /* Config name, section, value */
            ['developerToken', 'GOOGLE_ADS', 'ABcdeFGH93KL-NOPQ_STUv'],
            ['endpoint', 'GOOGLE_ADS', 'https://abc.xyz:443']
        ];
        $configurationMock = $this->getMockBuilder(Configuration::class)
            ->disableOriginalConstructor()
            ->getMock();
        $configurationMock->expects($this->any())
            ->method('getConfiguration')
            ->will($this->returnValueMap($valueMap));

        $googleAdsClient = $this->googleAdsClientBuilder
            ->from($configurationMock)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame(
            'ABcdeFGH93KL-NOPQ_STUv',
            $googleAdsClient->getDeveloperToken()
        );
        $this->assertSame('https://abc.xyz:443', $googleAdsClient->getEndpoint());
    }

    /**
     * @covers \Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder::from
     */
    public function testBuildFromDefaults()
    {
        $valueMap = [
            ['developerToken', 'GOOGLE_ADS', 'ABcdeFGH93KL-NOPQ_STUv']
        ];
        $configurationMock = $this->getMockBuilder(Configuration::class)
            ->disableOriginalConstructor()
            ->getMock();
        $configurationMock->expects($this->any())
            ->method('getConfiguration')
            ->will($this->returnValueMap($valueMap));

        $googleAdsClient = $this->googleAdsClientBuilder
            ->from($configurationMock)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame(
            'ABcdeFGH93KL-NOPQ_STUv',
            $googleAdsClient->getDeveloperToken()
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder::build
     * @expectedException \InvalidArgumentException
     */
    public function testBuildFailsWithoutDeveloperToken()
    {
        $this->googleAdsClientBuilder
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();
    }

    /**
     * @covers \Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder::build
     * @expectedException \InvalidArgumentException
     */
    public function testBuildFailsWithInvalidEndpointUrl()
    {
        $this->googleAdsClientBuilder
            ->withDeveloperToken('ABcdeFGH93KL-NOPQ_STUv')
            ->withEndpoint('http://:999')
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();
    }

    /**
     * @covers \Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder::build
     * @expectedException \InvalidArgumentException
     */
    public function testBuildFailsWithoutOAuth2Credential()
    {
        $this->googleAdsClientBuilder
            ->withDeveloperToken('ABcdeFGH93KL-NOPQ_STUv')
            ->build();
    }

    /**
     * @covers \Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder::build
     */
    public function testBuild()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken('ABcdeFGH93KL-NOPQ_STUv')
            ->withEndpoint('abc.xyz.com')
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame(
            'ABcdeFGH93KL-NOPQ_STUv',
            $googleAdsClient->getDeveloperToken()
        );
        $this->assertSame('abc.xyz.com', $googleAdsClient->getEndpoint());
        $this->assertInstanceOf(
            FetchAuthTokenInterface::class,
            $googleAdsClient->getOAuth2Credential()
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder::build
     */
    public function testBuildDefaults()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken('ABcdeFGH93KL-NOPQ_STUv')
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame(
            'ABcdeFGH93KL-NOPQ_STUv',
            $googleAdsClient->getDeveloperToken()
        );
        $this->assertInstanceOf(
            FetchAuthTokenInterface::class,
            $googleAdsClient->getOAuth2Credential()
        );
    }
}
