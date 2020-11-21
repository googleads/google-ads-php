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

use Google\Ads\GoogleAds\Lib\Testing\ConfigurationLoaderTestProvider;
use Google\Ads\GoogleAds\Lib\Testing\OAuth2TokenBuilderTestProvider;
use Google\Ads\GoogleAds\Util\EnvironmentalVariables;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Google\Auth\Credentials\UserRefreshCredentials;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use UnexpectedValueException;

/**
 * Unit tests for `OAuth2TokenBuilder`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder
 * @small
 */
class OAuth2TokenBuilderTest extends TestCase
{

    /** @var OAuth2TokenBuilder $oAuth2TokenBuilder */
    private $oAuth2TokenBuilder;
    /** @var string $jsonKeyFilePath */
    private $jsonKeyFilePath;

    /**
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    protected function setUp(): void
    {
        $this->oAuth2TokenBuilder = new OAuth2TokenBuilder();
        $this->jsonKeyFilePath = OAuth2TokenBuilderTestProvider::getFakeJsonKeyFilePath();
    }

    public function testBuildWithWebOrInstalledAppFlow()
    {
        $tokenFetcher = $this->oAuth2TokenBuilder
            ->withClientId('abcxyz-123.apps.googleusercontent.com')
            ->withClientSecret('ABcXyZ-123abc')
            ->withRefreshToken('1/AbC-xY123Za-bc')
            ->build();
        $this->assertInstanceOf(UserRefreshCredentials::class, $tokenFetcher);
        $this->assertEquals(
            'abcxyz-123.apps.googleusercontent.com',
            $this->oAuth2TokenBuilder->getClientId()
        );
        $this->assertEquals('ABcXyZ-123abc', $this->oAuth2TokenBuilder->getClientSecret());
        $this->assertEquals('1/AbC-xY123Za-bc', $this->oAuth2TokenBuilder->getRefreshToken());
    }

    public function testBuildWithWebOrInstalledAppFlowFromFile()
    {
        $environmentalVariablesMock = $this
            ->getMockBuilder(EnvironmentalVariables::class)
            ->getMock();
        $environmentalVariablesMock
            ->method('getHome')
            ->willReturn(ConfigurationLoaderTestProvider::getFilePathToFakeHome());
        $configurationLoader = new ConfigurationLoader($environmentalVariablesMock);

        $oAuth2TokenBuilder = new OAuth2TokenBuilder($configurationLoader);
        $tokenFetcher = $oAuth2TokenBuilder
            ->fromFile('home_google_ads_php.ini')
            ->build();

        $this->assertInstanceOf(UserRefreshCredentials::class, $tokenFetcher);
        $this->assertEquals('test-id', $oAuth2TokenBuilder->getClientId());
        $this->assertEquals('test-secret', $oAuth2TokenBuilder->getClientSecret());
        $this->assertEquals('test-refresh-token', $oAuth2TokenBuilder->getRefreshToken());
    }

    public function testBuildWithWebOrInstalledAppFlowFromCustomDefaultFile()
    {
        $environmentalVariablesMock = $this
            ->getMockBuilder(EnvironmentalVariables::class)
            ->getMock();
        $environmentalVariablesMock
            ->method('get')
            ->with(GoogleAdsBuilder::DEFAULT_CONFIGURATION_FILENAME_ENVIRONMENT_VARIABLE_NAME)
            ->willReturn(ConfigurationLoaderTestProvider::getFakeHomeFilePathForTestIniFile());
        $configurationLoader = new ConfigurationLoader($environmentalVariablesMock);

        $oAuth2TokenBuilder = new OAuth2TokenBuilder(
            $configurationLoader,
            $environmentalVariablesMock
        );
        $tokenFetcher = $oAuth2TokenBuilder
            ->fromFile()
            ->build();

        $this->assertInstanceOf(UserRefreshCredentials::class, $tokenFetcher);
        $this->assertEquals('test-id', $oAuth2TokenBuilder->getClientId());
        $this->assertEquals('test-secret', $oAuth2TokenBuilder->getClientSecret());
        $this->assertEquals('test-refresh-token', $oAuth2TokenBuilder->getRefreshToken());
    }

    public function testBuildFailsWhenMissingRequiredValuesForInstAppOrWebFlow()
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage("All of 'clientId', 'clientSecret', and 'refreshToken' " .
            "must be set when using installed/web application flow.");
        $this->oAuth2TokenBuilder
            ->withClientId('abcxyz-123.apps.googleusercontent.com')
            ->withClientSecret('ABcXyZ-123abc')
            ->build();
    }

    public function testBuildFromWithServiceAccountFlow()
    {
        $valueMap = [
            [
                'jsonKeyFilePath',
                'OAUTH2',
                $this->jsonKeyFilePath
            ], [
                'scopes',
                'OAUTH2',
                'https://www.googleapis.com/auth/adwords'
            ],
        ];
        $configurationMock = $this->getMockBuilder(Configuration::class)
            ->disableOriginalConstructor()
            ->getMock();
        $configurationMock->expects($this->any())
            ->method('getConfiguration')
            ->will($this->returnValueMap($valueMap));
        $tokenFetcher = $this->oAuth2TokenBuilder
            ->from($configurationMock)
            ->build();
        $this->assertInstanceOf(ServiceAccountCredentials::class, $tokenFetcher);
    }

    public function testBuildFromWithServiceAccountFlowUsingImpersonation()
    {
        $valueMap = [
            [
                'jsonKeyFilePath',
                'OAUTH2',
                $this->jsonKeyFilePath
            ], [
                'scopes',
                'OAUTH2',
                'https://www.googleapis.com/auth/adwords'
            ], [
                'impersonatedEmail',
                'OAUTH2',
                'noreply@example.com'
            ]
        ];
        $configurationMock = $this->getMockBuilder(Configuration::class)
            ->disableOriginalConstructor()
            ->getMock();
        $configurationMock->expects($this->any())
            ->method('getConfiguration')
            ->will($this->returnValueMap($valueMap));
        $tokenFetcher = $this->oAuth2TokenBuilder
            ->from($configurationMock)
            ->build();
        $this->assertInstanceOf(ServiceAccountCredentials::class, $tokenFetcher);
        $this->assertEquals(
            $this->jsonKeyFilePath,
            $this->oAuth2TokenBuilder->getJsonKeyFilePath()
        );
        $this->assertEquals(
            'https://www.googleapis.com/auth/adwords',
            $this->oAuth2TokenBuilder->getScopes()
        );
        $this->assertEquals(
            'noreply@example.com',
            $this->oAuth2TokenBuilder->getImpersonatedEmail()
        );
    }

    public function testBuildFailsWhenSettingValuesForMultipleFlows()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Cannot have both service account flow and installed/web ' .
            'application flow credential values set.');
        $this->oAuth2TokenBuilder
            ->withJsonKeyFilePath($this->jsonKeyFilePath)
            ->withScopes('https://www.googleapis.com/auth/adwords')
            ->withClientId('abcxyz-123.apps.googleusercontent.com')
            ->withClientSecret('ABcXyZ-123abc')
            ->withRefreshToken('1/AbC-xY123Za-bc')
            ->build();
    }

    public function testBuildWithServiceAccountFlow()
    {
        $tokenFetcher = $this->oAuth2TokenBuilder
            ->withJsonKeyFilePath($this->jsonKeyFilePath)
            ->withScopes('https://www.googleapis.com/auth/adwords')
            ->build();
        $this->assertInstanceOf(ServiceAccountCredentials::class, $tokenFetcher);
    }

    public function testBuildWithServiceAccountFlowUsingImpersonation()
    {
        $tokenFetcher = $this->oAuth2TokenBuilder
            ->withJsonKeyFilePath($this->jsonKeyFilePath)
            ->withScopes('https://www.googleapis.com/auth/adwords')
            ->withImpersonatedEmail('noreply@example.com')
            ->build();
        $this->assertInstanceOf(ServiceAccountCredentials::class, $tokenFetcher);
    }

    public function testBuildFailsWhenMissingRequiredValuesForServiceAccountFlow()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Both 'jsonKeyFilePath' and 'scopes' must be set when" .
            " using service account flow.");
        $this->oAuth2TokenBuilder
            ->withJsonKeyFilePath($this->jsonKeyFilePath)
            ->build();
    }
}
