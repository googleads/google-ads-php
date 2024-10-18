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

namespace Google\Ads\GoogleAds\Lib\V18;

use Google\Ads\GoogleAds\Lib\InsecureCredentialsWrapper;
use Google\Auth\FetchAuthTokenInterface;
use Google\Auth\HttpHandler\HttpHandlerFactory;
use Grpc\ChannelCredentials;
use Grpc\Interceptor;
use Monolog\Handler\NullHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `GoogleAdsClient`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient
 * @small
 */
class GoogleAdsClientTest extends TestCase
{
    private static $CREDENTIALS_LOADER_KEY = 'credentials';
    private static $DEVELOPER_TOKEN_KEY = 'developer-token';
    private static $LOGIN_CUSTOMER_ID_KEY = 'login-customer-id';
    private static $LINKED_CUSTOMER_ID_KEY = 'linked-customer-id';
    private static $TRANSPORT_KEY = 'transport';
    private static $UNARY_MIDDLEWARES_KEY = 'unary-middlewares';
    private static $STREAMING_MIDDLEWARES_KEY = 'streaming-middlewares';

    private static $DEVELOPER_TOKEN = 'ABcdeFGH93KL-NOPQ_STUv';
    private static $LOGIN_CUSTOMER_ID = 1234567890;
    private static $LINKED_CUSTOMER_ID = 1234567890;

    private static $PROXY = 'http://localhost:8080';

    private static $TRANSPORT = 'grpc';
    private static $DEFAULT_GRPC_CHANNEL_CREDENTIAL;
    private static $DEFAULT_INTERCEPTOR_TYPES = [
        GoogleAdsLoggingInterceptor::class,
        GoogleAdsFailuresInterceptor::class
    ];

    /** @var GoogleAdsClientBuilder $googleAdsClientBuilder */
    private $googleAdsClientBuilder;
    private $fetchAuthTokenInterfaceMock;

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
        self::$DEFAULT_GRPC_CHANNEL_CREDENTIAL = ChannelCredentials::createDefault();
    }

    public function testGetClientOptions()
    {
        $unaryMiddlewares = [
            new UnaryGoogleAdsExceptionMiddleware(),
            new UnaryGoogleAdsExceptionMiddleware()
        ];
        $streamingMiddlewares = [
            new ServerStreamingGoogleAdsExceptionMiddleware(),
            new ServerStreamingGoogleAdsExceptionMiddleware()
        ];
        $grpcInterceptors = [new Interceptor(), new Interceptor()];
        $httpHandler = HttpHandlerFactory::build();

        $googleAdsClient = $this->googleAdsClientBuilder
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withLoginCustomerId(self::$LOGIN_CUSTOMER_ID)
            ->withLinkedCustomerId(self::$LINKED_CUSTOMER_ID)
            ->withLogger(new Logger('', [new NullHandler()]))
            ->withProxy(self::$PROXY)
            ->withTransport(self::$TRANSPORT)
            ->withGrpcChannelIsSecure(true)
            ->withGrpcChannelCredential(self::$DEFAULT_GRPC_CHANNEL_CREDENTIAL)
            ->withUnaryMiddlewares(...$unaryMiddlewares)
            ->withStreamingMiddlewares(...$streamingMiddlewares)
            ->withGrpcInterceptors(...$grpcInterceptors)
            ->withHttpHandler($httpHandler)
            ->build();
        $clientOptions = $googleAdsClient->getGoogleAdsClientOptions();

        $this->assertSame(
            $this->fetchAuthTokenInterfaceMock,
            $clientOptions[self::$CREDENTIALS_LOADER_KEY]
        );
        $this->assertSame(
            self::$DEVELOPER_TOKEN,
            $clientOptions[self::$DEVELOPER_TOKEN_KEY]
        );
        $this->assertSame(
            strval(self::$LOGIN_CUSTOMER_ID),
            $clientOptions[self::$LOGIN_CUSTOMER_ID_KEY]
        );
        $this->assertSame(
            strval(self::$LINKED_CUSTOMER_ID),
            $clientOptions[self::$LINKED_CUSTOMER_ID_KEY]
        );
        foreach (self::$DEFAULT_INTERCEPTOR_TYPES as $index => $defaultInterceptorType) {
            $this->assertInstanceOf(
                $defaultInterceptorType,
                $clientOptions['transportConfig']['grpc']['interceptors'][$index]
            );
        }
        $this->assertSame(
            $httpHandler,
            $clientOptions['transportConfig']['rest']['httpHandler']
        );
        $this->assertSame(
            getenv('http_proxy'),
            self::$PROXY
        );
        $this->assertSame(
            self::$TRANSPORT,
            $clientOptions[self::$TRANSPORT_KEY]
        );
        $this->assertInstanceOf(
            ChannelCredentials::class,
            $clientOptions['transportConfig']['grpc']['stubOpts'][self::$CREDENTIALS_LOADER_KEY]
        );
        $this->assertSame(
            $unaryMiddlewares,
            $clientOptions[self::$UNARY_MIDDLEWARES_KEY]
        );
        $this->assertSame(
            $streamingMiddlewares,
            $clientOptions[self::$STREAMING_MIDDLEWARES_KEY]
        );
        $this->assertSame(
            $grpcInterceptors,
            array_slice(
                $clientOptions['transportConfig']['grpc']['interceptors'],
                count(self::$DEFAULT_INTERCEPTOR_TYPES)
            )
        );

        $this->assertSame(
            $this->fetchAuthTokenInterfaceMock,
            $clientOptions[self::$CREDENTIALS_LOADER_KEY]
        );
    }

    public function testNullLoginCustomerIdNotAppearInClientOptions()
    {
        $googleAdsClient =
            $this->googleAdsClientBuilder->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
                ->withDeveloperToken(self::$DEVELOPER_TOKEN)
                ->withLoginCustomerId(null)
                ->build();

        $this->assertArrayNotHasKey(
            self::$LOGIN_CUSTOMER_ID_KEY,
            $googleAdsClient->getGoogleAdsClientOptions()
        );
    }

    public function testNullLinkedCustomerIdNotAppearInClientOptions()
    {
        $googleAdsClient =
            $this->googleAdsClientBuilder->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
                ->withDeveloperToken(self::$DEVELOPER_TOKEN)
                ->withLinkedCustomerId(null)
                ->build();

        $this->assertArrayNotHasKey(
            self::$LINKED_CUSTOMER_ID_KEY,
            $googleAdsClient->getGoogleAdsClientOptions()
        );
    }

    public function testCredentialsWhenGrpcChannelIsNotSecureInClientOptions()
    {
        $googleAdsClient =
            $this->googleAdsClientBuilder->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
                ->withDeveloperToken(self::$DEVELOPER_TOKEN)
                ->withGrpcChannelIsSecure(false)
                ->build();
        $clientOptions = $googleAdsClient->getGoogleAdsClientOptions();

        $this->assertInstanceOf(
            InsecureCredentialsWrapper::class,
            $clientOptions[self::$CREDENTIALS_LOADER_KEY]
        );

        $this->assertSame(
            ChannelCredentials::createInsecure(),
            $clientOptions['transportConfig']['grpc']['stubOpts'][self::$CREDENTIALS_LOADER_KEY]
        );
    }
}
