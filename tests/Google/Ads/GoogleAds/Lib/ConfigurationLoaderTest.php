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

use Google\Ads\GoogleAds\Util\EnvironmentalVariables;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use UnexpectedValueException;

/**
 * Unit tests for `ConfigurationLoader`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\ConfigurationLoader
 * @small
 */
class ConfigurationLoaderTest extends TestCase
{
    /** @var ConfigurationLoader $configurationLoader */
    private $configurationLoader;

    /**
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    protected function setUp(): void
    {
        $environmentalVariablesMock = $this
            ->getMockBuilder(EnvironmentalVariables::class)
            ->getMock();
        $environmentalVariablesMock
            ->method('getHome')
            ->willReturn(ConfigurationLoaderTestProvider::getFilePathToFakeHome());
        $environmentalVariablesMock
            ->method('getStartingWith')
            ->with(GoogleAdsBuilder::CONFIGURATION_ENVIRONMENT_VARIABLES_PREFIX)
            ->willReturn([
                GoogleAdsBuilder::DEFAULT_CONFIGURATION_FILENAME_ENVIRONMENT_VARIABLE_NAME =>
                    ConfigurationLoaderTestProvider::getFakeHomeFilePathForTestIniFile()
            ]);
        $this->configurationLoader =
            new ConfigurationLoader($environmentalVariablesMock);
    }

    public function testFromFileFileExists()
    {
        $config = $this->configurationLoader->fromFile(
            ConfigurationLoaderTestProvider::getFilePathForTestIniFile()
        );
        $this->assertNotNull($config);
        $this->assertInstanceOf(Configuration::class, $config);
    }

    public function testFromFileFileExistsInHome()
    {
        $config = $this->configurationLoader->fromFile('home_google_ads_php.ini');
        $this->assertNotNull($config);
        $this->assertInstanceOf(Configuration::class, $config);
    }

    public function testFromFileFileDoesNotExistAnywhere()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->configurationLoader->fromFile('asdf.ini');
    }

    public function testFromFileFileHomeDirDoesNotExist()
    {
        $this->expectException(InvalidArgumentException::class);
        $environmentalVariablesMock = $this
            ->getMockBuilder(EnvironmentalVariables::class)
            ->getMock();
        $environmentalVariablesMock
            ->method('getHome')
            ->willThrowException(new UnexpectedValueException());
        $configurationLoader = new ConfigurationLoader($environmentalVariablesMock);
        $configurationLoader->fromFile('home_google_ads_php.ini');
    }

    public function testFromString()
    {
        $iniString = file_get_contents(
            ConfigurationLoaderTestProvider::getFilePathForTestIniFile()
        );
        $config = $this->configurationLoader->fromString($iniString);
        $this->assertNotNull($config);
        $this->assertInstanceOf(Configuration::class, $config);
    }

    public function testFromEnvironmentVariables()
    {
        $config = $this->configurationLoader->fromEnvironmentVariables(
            GoogleAdsBuilder::CONFIGURATION_ENVIRONMENT_VARIABLES_PREFIX
        );
        $this->assertNotNull($config);
        $this->assertInstanceOf(Configuration::class, $config);
    }
}
