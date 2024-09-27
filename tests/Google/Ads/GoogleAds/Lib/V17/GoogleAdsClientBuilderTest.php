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

namespace Google\Ads\GoogleAds\Lib\V17;

use Google\Ads\GoogleAds\Lib\Configuration;
use Google\Ads\GoogleAds\Lib\ConfigurationLoader;
use Google\Ads\GoogleAds\Lib\ConfigurationLoaderTestProvider;
use Google\Ads\GoogleAds\Lib\GoogleAdsBuilder;
use Google\Ads\GoogleAds\Util\Dependencies;
use Google\Ads\GoogleAds\Util\EnvironmentalVariables;
use Google\Auth\FetchAuthTokenInterface;
use Google\Auth\HttpHandler\HttpHandlerFactory;
use Grpc\ChannelCredentials;
use Grpc\Interceptor;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use UnexpectedValueException;

/**
 * Unit tests for `GoogleAdsClientBuilder`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\V17\GoogleAdsClientBuilder
 * @small
 */
class GoogleAdsClientBuilderTest extends TestCase
{
    private static $DEVELOPER_TOKEN = 'ABcdeFGH93KL-NOPQ_STUv';
    private static $LOGIN_CUSTOMER_ID = 123456789;
    private static $LINKED_CUSTOMER_ID = 123456789;
    private static $INVALID_TRANSPORT = '1234567890';
    private static $INVALID_BOOLEAN_STRING = 'invalid_boolean_string';
    private static $DEFAULT_GRPC_CHANNEL_CREDENTIAL;

    /** @var GoogleAdsClientBuilder $googleAdsClientBuilder */
    private $googleAdsClientBuilder;
    /** @var FetchAuthTokenInterface $fetchAuthTokenInterfaceMock */
    private $fetchAuthTokenInterfaceMock;
    /** @var LoggerInterface $loggerMock */
    private $loggerMock;

    /**
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    protected function setUp(): void
    {
        $this->googleAdsClientBuilder = new GoogleAdsClientBuilder();
        $this->fetchAuthTokenInterfaceMock = $this
            ->getMockBuilder(FetchAuthTokenInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->loggerMock =
            $this->getMockBuilder(LoggerInterface::class)->disableOriginalConstructor()->getMock();
        self::$DEFAULT_GRPC_CHANNEL_CREDENTIAL = ChannelCredentials::createDefault();
    }

    public function testBuildClientFromConfiguration()
    {
        $valueMap = [
            /* Config name, section, value */
            ['developerToken', 'GOOGLE_ADS', self::$DEVELOPER_TOKEN],
            ['useCloudOrgForApiAccess', 'GOOGLE_ADS', 'true'],
            ['loginCustomerId', 'GOOGLE_ADS', self::$LOGIN_CUSTOMER_ID],
            ['linkedCustomerId', 'GOOGLE_ADS', self::$LINKED_CUSTOMER_ID],
            ['endpoint', 'GOOGLE_ADS', 'https://abc.xyz:443'],
            ['proxy', 'CONNECTION', 'https://localhost:8080'],
            ['transport', 'CONNECTION', 'grpc'],
            ['grpcChannelIsSecure', 'CONNECTION', 'true']
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
            ->withLogger($this->loggerMock)
            ->build();

        $this->assertSame(self::$DEVELOPER_TOKEN, $googleAdsClient->getDeveloperToken());
        $this->assertTrue($googleAdsClient->useCloudOrgForApiAccess());
        $this->assertSame(self::$LOGIN_CUSTOMER_ID, $googleAdsClient->getLoginCustomerId());
        $this->assertSame(self::$LINKED_CUSTOMER_ID, $googleAdsClient->getLinkedCustomerId());
        $this->assertSame('https://abc.xyz:443', $googleAdsClient->getEndpoint());
        $this->assertSame('https://localhost:8080', $googleAdsClient->getProxy());
        $this->assertSame('grpc', $googleAdsClient->getTransport());
        $this->assertTrue($googleAdsClient->getGrpcChannelIsSecure());
        $this->assertSame($this->loggerMock, $googleAdsClient->getLogger());
    }

    /**
     * @dataProvider provideGrpcChannelIsSecureValues
     */
    public function testBuildClientFromConfigurationWithGrpcChannelIsSecure(
        ?string $configValue,
        bool $processedValue
    ) {
        $valueMap = [
            /* Config name, section, value */
            ['developerToken', 'GOOGLE_ADS', self::$DEVELOPER_TOKEN],
            ['grpcChannelIsSecure', 'CONNECTION', $configValue]
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

        $this->assertSame($processedValue, $googleAdsClient->getGrpcChannelIsSecure());
    }

    public function provideGrpcChannelIsSecureValues()
    {
        return [
            [null, true],
            ["", true],
            [self::$INVALID_BOOLEAN_STRING, true],
            ["true", true],
            ["false", false],
        ];
    }

    public function testBuildFromDefaults()
    {
        $valueMap = [
            ['developerToken', 'GOOGLE_ADS', self::$DEVELOPER_TOKEN]
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

        $this->assertSame(self::$DEVELOPER_TOKEN, $googleAdsClient->getDeveloperToken());
    }

    public function testBuildFromFile()
    {
        $environmentalVariablesMock = $this
            ->getMockBuilder(EnvironmentalVariables::class)
            ->getMock();
        $environmentalVariablesMock
            ->method('getHome')
            ->willReturn(ConfigurationLoaderTestProvider::getFilePathToFakeHome());
        $configurationLoader = new ConfigurationLoader($environmentalVariablesMock);

        $googleAdsClientBuilder = new GoogleAdsClientBuilder($configurationLoader);
        $googleAdsClient = $googleAdsClientBuilder
            ->fromFile('home_google_ads_php.ini')
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->build();

        $this->assertSame(self::$DEVELOPER_TOKEN, $googleAdsClient->getDeveloperToken());
    }

    public function testBuildFromEnvironmentVariables()
    {
        $editedDeveloperToken = self::$DEVELOPER_TOKEN . 'edited';

        $environmentalVariablesMock = $this
            ->getMockBuilder(EnvironmentalVariables::class)
            ->getMock();
        $environmentalVariablesMock
            ->method('getHome')
            ->willReturn(ConfigurationLoaderTestProvider::getFilePathToFakeHome());
        $environmentalVariablesMock
            ->method('getStartingWith')
            ->with(GoogleAdsBuilder::CONFIGURATION_ENVIRONMENT_VARIABLES_PREFIX)
            ->willReturn(['DEVELOPER_TOKEN' => $editedDeveloperToken]);
        $configurationLoader = new ConfigurationLoader($environmentalVariablesMock);

        $googleAdsClientBuilder = new GoogleAdsClientBuilder(
            $configurationLoader,
            $environmentalVariablesMock
        );
        $googleAdsClient = $googleAdsClientBuilder
            ->fromFile('home_google_ads_php.ini')
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withLoginCustomerId(self::$LOGIN_CUSTOMER_ID)
            ->fromEnvironmentVariables()
            ->build();

        $this->assertSame(self::$LOGIN_CUSTOMER_ID, $googleAdsClient->getLoginCustomerId());
        $this->assertSame($editedDeveloperToken, $googleAdsClient->getDeveloperToken());
    }

    public function testBuildFailsWithoutDeveloperToken()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->googleAdsClientBuilder
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();
    }

    public function testBuildFailsWithInvalidEndpointUrl()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withEndpoint('http://:999')
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();
    }

    public function testBuildFailsWithoutOAuth2Credential()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->build();
    }

    /**
     * @dataProvider provideInvalidProxyURIs
     */
    public function testBuildFailsWithInvalidProxyUri($invalidProxyUri)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withProxy($invalidProxyUri)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();
    }

    public function provideInvalidProxyURIs()
    {
        return [
            ['foo'],
            ['http://'],
            ['foo.com'],
            ['http://.com']
        ];
    }

    public function testBuildFailsWithInvalidTransport()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withTransport(self::$INVALID_TRANSPORT)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();
    }

    public function testBuildFailsWhenGrpcChannelIsNotSecureAndGrpcChannelCredentialIsSet()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withGrpcChannelIsSecure(false)
            ->withGrpcChannelCredential(self::$DEFAULT_GRPC_CHANNEL_CREDENTIAL)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();
    }

    public function testBuildFailsWhenTransportIsNotGrpcAndGrpcChannelIsNotSecure()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withTransport('rest')
            ->withGrpcChannelIsSecure(false)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();
    }

    public function testBuildFailsWhenTransportIsNotGrpcAndGrpcChannelCredentialIsSet()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withTransport('rest')
            ->withGrpcChannelCredential(self::$DEFAULT_GRPC_CHANNEL_CREDENTIAL)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();
    }

    public function testBuild()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withLoginCustomerId(self::$LOGIN_CUSTOMER_ID)
            ->withEndpoint('abc.xyz.com')
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame(self::$DEVELOPER_TOKEN, $googleAdsClient->getDeveloperToken());
        $this->assertNull($googleAdsClient->useCloudOrgForApiAccess());
        $this->assertSame(self::$LOGIN_CUSTOMER_ID, $googleAdsClient->getLoginCustomerId());
        $this->assertSame('abc.xyz.com', $googleAdsClient->getEndpoint());
        $this->assertInstanceOf(
            FetchAuthTokenInterface::class,
            $googleAdsClient->getOAuth2Credential()
        );
    }

    public function testBuildDefaults()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame(self::$DEVELOPER_TOKEN, $googleAdsClient->getDeveloperToken());
        $this->assertInstanceOf(
            FetchAuthTokenInterface::class,
            $googleAdsClient->getOAuth2Credential()
        );
    }

    public function testBuildWithLoginCustomerId()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withLoginCustomerId(self::$LOGIN_CUSTOMER_ID)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame(self::$LOGIN_CUSTOMER_ID, $googleAdsClient->getLoginCustomerId());
    }

    public function testBuildWithLinkedCustomerId()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withLinkedCustomerId(self::$LINKED_CUSTOMER_ID)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame(self::$LINKED_CUSTOMER_ID, $googleAdsClient->getLinkedCustomerId());
    }

    public function testBuildWithNullLoginCustomerId()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withLoginCustomerId(null)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();
        $this->assertNull($googleAdsClient->getLoginCustomerId());
    }

    public function testBuildWithNullLinkedCustomerId()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withLinkedCustomerId(null)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();
        $this->assertNull($googleAdsClient->getLinkedCustomerId());
    }

    public function testBuildWithNegativeLoginCustomerId()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withLoginCustomerId(-1)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();
    }

    public function testBuildWithNegativeLinkedCustomerId()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withLinkedCustomerId(-1)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();
    }

    public function testBuildWithGrpcChannelIsSecure()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withGrpcChannelIsSecure(false)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertFalse($googleAdsClient->getGrpcChannelIsSecure());
    }

    public function testBuildWithGrpcChannelCredential()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withGrpcChannelCredential(self::$DEFAULT_GRPC_CHANNEL_CREDENTIAL)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame(
            self::$DEFAULT_GRPC_CHANNEL_CREDENTIAL,
            $googleAdsClient->getGrpcChannelCredential()
        );
    }

    public function testBuildWithUnaryMiddlewares()
    {
        $unaryMiddlewares = [
            new UnaryGoogleAdsExceptionMiddleware(),
            new UnaryGoogleAdsExceptionMiddleware()
        ];

        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withUnaryMiddlewares(...$unaryMiddlewares)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame($unaryMiddlewares, $googleAdsClient->getUnaryMiddlewares());
    }

    public function testBuildWithStreamingMiddlewares()
    {
        $streamingMiddlewares = [
            new ServerStreamingGoogleAdsExceptionMiddleware(),
            new ServerStreamingGoogleAdsExceptionMiddleware()
        ];

        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withStreamingMiddlewares(...$streamingMiddlewares)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame($streamingMiddlewares, $googleAdsClient->getStreamingMiddlewares());
    }

    public function testBuildWithGrpcInterceptors()
    {
        $grpcInterceptors = [new Interceptor(), new Interceptor()];

        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withGrpcInterceptors(...$grpcInterceptors)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame($grpcInterceptors, $googleAdsClient->getGrpcInterceptors());
    }

    public function testBuildWithHttpHandler()
    {
        $httpHandler = HttpHandlerFactory::build();

        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withHttpHandler($httpHandler)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame($httpHandler, $googleAdsClient->getHttpHandler());
    }

    /**
     * @dataProvider provideValidProxyURIs
     */
    public function testBuildWithValidProxyURIs(string $proxy)
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withProxy($proxy)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame($proxy, $googleAdsClient->getProxy());
    }

    public function provideValidProxyURIs()
    {
        return [
            ['http://localhost:8080'],
            ['http://user:pass@localhost:8080'],
            ['https://localhost:8080'],
            ['https://user:pass@localhost:8080']
        ];
    }

    /**
     * @dataProvider provideValidTransports
     */
    public function testBuildWithValidTransports(string $transport)
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withTransport($transport)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame($transport, $googleAdsClient->getTransport());
    }

    public static function provideValidTransports()
    {
        return [
            ['grpc'],
            ['rest']
        ];
    }

    public function testBuildWithoutLogLevelSetsDefault()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertSame(LogLevel::INFO, $googleAdsClient->getLogLevel());
    }

    public function testBuildWithInvalidLogLevelThrowsException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->withLogLevel("banana")
            ->build();
    }

    public function testBuildWithLowercaseLogLevel()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->withLogLevel("debug")
            ->build();

        $this->assertSame(LogLevel::DEBUG, $googleAdsClient->getLogLevel());
    }

    public function testBuildWithSystemPackageGrpcVersionGreaterThanComposerGrpcVersion()
    {
        $dependenciesMock = $this->getMockBuilder(Dependencies::class)
            ->disableOriginalConstructor()
            ->getMock();
        $dependenciesMock->method('getGrpcComposerVersion')->willReturn('1.1');
        $dependenciesMock->method('getGrpcSystemPackageVersion')->willReturn('1.1.5');
        /** @var Dependencies $dependenciesMock */
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->withDependencies($dependenciesMock)
            ->build();
        $this->assertInstanceOf(GoogleAdsClient::class, $googleAdsClient);
        $this->assertEquals(self::$DEVELOPER_TOKEN, $googleAdsClient->getDeveloperToken());
    }

    public function testBuildWithSystemPackageGrpcVersionNotFound()
    {
        $dependenciesMock = $this->getMockBuilder(Dependencies::class)
            ->disableOriginalConstructor()
            ->getMock();
        $dependenciesMock->method('getGrpcComposerVersion')->willReturn('1.1');
        $dependenciesMock->method('getGrpcSystemPackageVersion')->willReturn(null);
        /** @var Dependencies $dependenciesMock */
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->withDependencies($dependenciesMock)
            ->build();
        $this->assertInstanceOf(GoogleAdsClient::class, $googleAdsClient);
        $this->assertEquals(self::$DEVELOPER_TOKEN, $googleAdsClient->getDeveloperToken());
    }

    public function testBuildWithComposerGrpcVersionNotFound()
    {
        $dependenciesMock = $this->getMockBuilder(Dependencies::class)
            ->disableOriginalConstructor()
            ->getMock();
        $dependenciesMock->method('getGrpcComposerVersion')->willReturn(null);
        $dependenciesMock->method('getGrpcSystemPackageVersion')->willReturn('2.3');
        /** @var Dependencies $dependenciesMock */
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->withDependencies($dependenciesMock)
            ->build();
        $this->assertInstanceOf(GoogleAdsClient::class, $googleAdsClient);
        $this->assertEquals(self::$DEVELOPER_TOKEN, $googleAdsClient->getDeveloperToken());
    }

    public function testBuildWithBothComposerAndSystemPackageGrpcVersionsNotFound()
    {
        $dependenciesMock = $this->getMockBuilder(Dependencies::class)
            ->disableOriginalConstructor()
            ->getMock();
        $dependenciesMock->method('getGrpcComposerVersion')->willReturn(null);
        $dependenciesMock->method('getGrpcSystemPackageVersion')->willReturn(null);
        /** @var Dependencies $dependenciesMock */
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->withDependencies($dependenciesMock)
            ->build();
        $this->assertInstanceOf(GoogleAdsClient::class, $googleAdsClient);
        $this->assertEquals(self::$DEVELOPER_TOKEN, $googleAdsClient->getDeveloperToken());
    }

    public function testBuildFailsWithSystemPackageGrpcVersionSmallerThanComposerGrpcVersion()
    {
        $this->expectException(UnexpectedValueException::class);
        $dependenciesMock = $this->getMockBuilder(Dependencies::class)
            ->disableOriginalConstructor()
            ->getMock();
        $dependenciesMock->method('getGrpcComposerVersion')->willReturn('2');
        $dependenciesMock->method('getGrpcSystemPackageVersion')->willReturn('1.1.5');
        /** @var Dependencies $dependenciesMock */
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->withDependencies($dependenciesMock)
            ->build();
    }

    public function testBuildUsingCloudOrgForApiAccess()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->usingCloudOrgForApiAccess(true)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->build();

        $this->assertTrue($googleAdsClient->useCloudOrgForApiAccess());
    }
}
