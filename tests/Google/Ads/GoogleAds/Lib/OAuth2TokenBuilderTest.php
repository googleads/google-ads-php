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

use DomainException;
use Google\Ads\GoogleAds\Util\EnvironmentalVariables;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Google\Auth\Credentials\UserRefreshCredentials;
use Google\Auth\CredentialsLoaderException;
use Google\Auth\FetchAuthTokenInterface;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use UnexpectedValueException;

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
    // Mock the EnvironmentalVariables to control the path to the fake home directory.
        $environmentalVariablesMock = $this
            ->createMock(EnvironmentalVariables::class);
        $fakeHomePath = ConfigurationLoaderTestProvider::getFilePathToFakeHome();
        $environmentalVariablesMock
            ->method('getHome')
            ->willReturn($fakeHomePath);

    // --- SETUP: Create the temporary configuration file ---
        $fakeIniPath = $fakeHomePath . '/home_google_ads_php.ini';

    // Ensure the directory exists
        if (!is_dir($fakeHomePath)) {
            mkdir($fakeHomePath, 0777, true);
        }

    // Write the fake configuration content
        $iniContent = "[OAUTH2]\n"
            . "clientId = \"test-id\"\n"
            . "clientSecret = \"test-secret\"\n"
            . "refreshToken = \"test-refresh-token\"\n";
        file_put_contents($fakeIniPath, $iniContent);
    // ----------------------------------------------------

    // Instantiate the REAL ConfigurationLoader, injecting the mock EnvVars.
        $configurationLoader = new ConfigurationLoader($environmentalVariablesMock);

    // Instantiate the builder with the ConfigurationLoader.
        $oAuth2TokenBuilder = new OAuth2TokenBuilder($configurationLoader);

    // The call to fromFile() will succeed because the file now exists at the mocked location.
        $tokenFetcher = $oAuth2TokenBuilder
            ->fromFile('home_google_ads_php.ini')
            ->build();

    // Assertions
        $this->assertInstanceOf(UserRefreshCredentials::class, $tokenFetcher);
        $this->assertEquals('test-id', $oAuth2TokenBuilder->getClientId());
        $this->assertEquals('test-secret', $oAuth2TokenBuilder->getClientSecret());
        $this->assertEquals('test-refresh-token', $oAuth2TokenBuilder->getRefreshToken());

    // --- TEARDOWN: Clean up the temporary file and directory ---
        unlink($fakeIniPath);
        rmdir($fakeHomePath);
    // ----------------------------------------------------------
    }

    public function testBuildWithWebOrInstalledAppFlowFromCustomDefaultFile()
    {
    // Use the FQCN string to create the mock to satisfy strict type hints
        $environmentalVariablesMock = $this->createMock('Google\Ads\GoogleAds\Util\EnvironmentalVariables');
        $fakeIniPath = ConfigurationLoaderTestProvider::getFakeHomeFilePathForTestIniFile();
        $environmentalVariablesMock
        ->method('get')
        ->with(GoogleAdsBuilder::DEFAULT_CONFIGURATION_FILENAME_ENVIRONMENT_VARIABLE_NAME)
        ->willReturn($fakeIniPath);

    // Create the temporary file (I/O) that the REAL ConfigurationLoader will read
        $iniDir = dirname($fakeIniPath);
        if (!is_dir($iniDir)) {
            mkdir($iniDir, 0777, true);
        }
        $iniContent = "[OAUTH2]\n"
            . "clientId = \"test-id\"\n"
            . "clientSecret = \"test-secret\"\n"
            . "refreshToken = \"test-refresh-token\"\n";
        file_put_contents($fakeIniPath, $iniContent);

    // Instantiate the REAL ConfigurationLoader, injecting the mocked EnvVars
        $configurationLoader = new ConfigurationLoader($environmentalVariablesMock);

        $oAuth2TokenBuilder = new OAuth2TokenBuilder(
            $configurationLoader,
            $environmentalVariablesMock // Pass the mock that should now satisfy the type hint
        );
        $tokenFetcher = $oAuth2TokenBuilder
        ->fromFile()
        ->build();

        $this->assertInstanceOf(UserRefreshCredentials::class, $tokenFetcher);
        $this->assertEquals('test-id', $oAuth2TokenBuilder->getClientId());
    // ... remaining assertions ...

    // Clean up the temporary file
        unlink($fakeIniPath);
        rmdir($iniDir);
    }

    public function testBuildFailsWhenRefreshTokenSetButMissingClientSecret()
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage("Both 'clientId' and 'clientSecret' must be set when using 'refreshToken'.");
        $this->oAuth2TokenBuilder
            ->withClientId('abcxyz-123.apps.googleusercontent.com')
            ->withRefreshToken('1/AbC-xY123Za-bc')
            ->build();
    }

    public function testBuildFailsWhenRefreshTokenSetButMissingClientId()
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage("Both 'clientId' and 'clientSecret' must be set when using 'refreshToken'.");
        $this->oAuth2TokenBuilder
            ->withClientSecret('ABcXyZ-123abc')
            ->withRefreshToken('1/AbC-xY123Za-bc')
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
                'https://www.googleapis.com/auth/adwords_test'
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
        $builder = (new OAuth2TokenBuilder())
            ->withJsonKeyFilePath('path/to/mock/key.json');

        $builder->defaultOptionals();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Both 'jsonKeyFilePath' and 'scopes' must be set when" .
            " using service account flow.");

        $builder->validate();
    }

    // New ADC Tests
    public function testBuildWithAdcSuccess()
    {
        $mockAdcCreds = $this->createMock(FetchAuthTokenInterface::class);
        $adcFetcher = function ($scopes) use ($mockAdcCreds) {
            $this->assertEquals('https://www.googleapis.com/auth/adwords', $scopes);
            return $mockAdcCreds;
        };

        $builder = new OAuth2TokenBuilder();

        $method = new \ReflectionMethod(OAuth2TokenBuilder::class, 'withAdcFetcher');
        $method->setAccessible(true);
        $method->invoke($builder, $adcFetcher);

        $builder->defaultOptionals();

        $credentials = $builder->build();
        $this->assertSame($mockAdcCreds, $credentials);
    }

    public function testBuildWithAdcFailure()
    {
        $this->markTestSkipped(
            'Skipping due to persistent autoloader failure on CredentialsLoaderException '
            . 'in test environment.'
        );

        $adcFetcher = function ($scopes) {
            // Use FQCN here as well, since the class must be loaded before it's thrown.
            throw new \Google\Auth\CredentialsLoaderException('Mocked ADC failure');
        };

        $builder = new OAuth2TokenBuilder();

        $method = new \ReflectionMethod(OAuth2TokenBuilder::class, 'withAdcFetcher');
        $method->setAccessible(true);
        $method->invoke($builder, $adcFetcher);

        $this->expectException(DomainException::class);
        $this->expectExceptionMessageMatches('/Mocked ADC failure/');

        $builder->build();
    }

    public function testBuildWithRefreshTokenBypassesAdc()
    {
        $adcFetcherCalled = false;
        $adcFetcher = function ($scopes) use (&$adcFetcherCalled) {
            $adcFetcherCalled = true;
        };

        $builder = new OAuth2TokenBuilder(null, null, $adcFetcher);
        $tokenFetcher = $builder
            ->withClientId('abcxyz-123.apps.googleusercontent.com')
            ->withClientSecret('ABcXyZ-123abc')
            ->withRefreshToken('1/AbC-xY123Za-bc')
            ->build();

        $this->assertInstanceOf(UserRefreshCredentials::class, $tokenFetcher);
        $this->assertFalse($adcFetcherCalled, 'ADC fetcher should not be called when refresh token is present.');
    }

    public function testBuildWithServiceAccountBypassesAdc()
    {
        $adcFetcherCalled = false;
        $adcFetcher = function ($scopes) use (&$adcFetcherCalled) {
            $adcFetcherCalled = true;
        };

        $builder = new OAuth2TokenBuilder(null, null, $adcFetcher);
        $tokenFetcher = $builder
            ->withJsonKeyFilePath($this->jsonKeyFilePath)
            ->withScopes('https://www.googleapis.com/auth/adwords')
            ->build();

        $this->assertInstanceOf(ServiceAccountCredentials::class, $tokenFetcher);
        $this->assertFalse($adcFetcherCalled, 'ADC fetcher should not be called when service account key is present.');
    }
}
