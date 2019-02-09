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

namespace Google\Ads\GoogleAds\Examples\Utils;

use GetOpt\GetOpt;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `ArgumentParser`.
 *
 * @see ArgumentParser
 * @small
 */
class ArgumentParserTest extends TestCase
{

    /** @var ArgumentParser $argumentParser */
    private $argumentParser;

    public function setUp()
    {
        $this->argumentParser = new ArgumentParser();
    }

    /**
     * @covers \Google\Ads\GoogleAds\Examples\Utils\ArgumentParser::parseCommandArguments()
     */
    public function testPassingRequiredArguments()
    {
        $_SERVER['argv'] = [null, '--customerId', 123456, '--campaignId', 11111];
        $expectedResult = ['customerId' => 123456, 'campaignId' => 11111];
        $actualResult = $this->argumentParser->parseCommandArguments(
            ['customerId' => GetOpt::REQUIRED_ARGUMENT, 'campaignId' => GetOpt::REQUIRED_ARGUMENT]
        );
        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Examples\Utils\ArgumentParser::parseCommandArguments()
     */
    public function testPassingOptionalArguments()
    {
        $_SERVER['argv'] = [null, '--customerId', 123456, '--campaignId', 11111];
        $expectedResult = ['customerId' => 123456, 'campaignId' => 11111];
        $actualResult = $this->argumentParser->parseCommandArguments(
            ['customerId' => GetOpt::OPTIONAL_ARGUMENT, 'campaignId' => GetOpt::OPTIONAL_ARGUMENT]
        );
        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Examples\Utils\ArgumentParser::parseCommandArguments()
     */
    public function testPassingRequiredAndOptionalArguments()
    {
        $_SERVER['argv'] = [null, '--customerId', 123456, '--campaignId', 11111];
        $expectedResult = ['customerId' => 123456, 'campaignId' => 11111];
        $actualResult = $this->argumentParser->parseCommandArguments(
            ['customerId' => GetOpt::REQUIRED_ARGUMENT, 'campaignId' => GetOpt::OPTIONAL_ARGUMENT]
        );
        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Examples\Utils\ArgumentParser::parseCommandArguments()
     */
    public function testPassingRequiredAndOptionalArgumentsWhenOptionalArgumentMissingValue()
    {
        $_SERVER['argv'] = [null, '--customerId', 123456];
        $expectedResult = ['customerId' => 123456, 'campaignId' => null];
        $actualResult = $this->argumentParser->parseCommandArguments(
            ['customerId' => GetOpt::REQUIRED_ARGUMENT, 'campaignId' => GetOpt::OPTIONAL_ARGUMENT]
        );
        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Examples\Utils\ArgumentParser::parseCommandArguments()
     * @expectedException \GetOpt\ArgumentException
     * @expectedExceptionMessage 'customerId' must have a value
     */
    public function testPassingRequiredArgumentButMissingValue()
    {
        $this->expectOutputRegex('/Usage/');
        $_SERVER['argv'] = [null, '--campaignId', 11111, '--customerId'];
        $this->argumentParser->parseCommandArguments(
            ['customerId' => GetOpt::REQUIRED_ARGUMENT, 'campaignId' => GetOpt::OPTIONAL_ARGUMENT]
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Examples\Utils\ArgumentParser::parseCommandArguments()
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage All required arguments must be specified
     */
    public function testPassingOptionalWithoutRequiredArguments()
    {
        $this->expectOutputRegex('/Usage/');
        $_SERVER['argv'] = [null, '--campaignId', 11111];
        $this->argumentParser->parseCommandArguments(
            ['customerId' => GetOpt::REQUIRED_ARGUMENT, 'campaignId' => GetOpt::OPTIONAL_ARGUMENT]
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Examples\Utils\ArgumentParser::parseCommandArguments()
     * @expectedException \GetOpt\ArgumentException
     * @expectedExceptionMessage Option 'adGroupId' is unknown
     */
    public function testPassingInvalidArguments()
    {
        $this->expectOutputRegex('/Usage/');
        $_SERVER['argv'] = [null, '--adGroupId', 11111];
        $this->argumentParser->parseCommandArguments(
            ['customerId' => GetOpt::REQUIRED_ARGUMENT, 'campaignId' => GetOpt::OPTIONAL_ARGUMENT]
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Examples\Utils\ArgumentParser::parseCommandArguments()
     */
    public function testPrintHelpMessage()
    {
        $argumentParserMock = $this->getMockBuilder(ArgumentParser::class)
            ->setMethods(['printHelpMessageAndExit'])
            ->getMock();
        $argumentParserMock
            ->expects($this->once())
            ->method('printHelpMessageAndExit');
        $_SERVER['argv'] = [null, '--customerId', 123456, '--help'];
        $argumentParserMock->parseCommandArguments(['customerId' => GetOpt::REQUIRED_ARGUMENT]);
    }
}
