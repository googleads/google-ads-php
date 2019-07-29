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

namespace Google\Ads\GoogleAds\Lib\V2;

use Google\Auth\FetchAuthTokenInterface;
use Monolog\Handler\NullHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for `GoogleAdsClient`.
 *
 * @see GoogleAdsClient
 * @small
 */
class GoogleAdsClientTest extends TestCase
{

    private static $CREDENTIALS_LOADER_KEY = 'credentials';
    private static $DEVELOPER_TOKEN_KEY = 'developer-token';
    private static $LOGIN_CUSTOMER_ID_KEY = 'login-customer-id';

    private static $DEVELOPER_TOKEN = 'ABcdeFGH93KL-NOPQ_STUv';
    private static $LOGIN_CUSTOMER_ID = '1234567890';

    private static $PROXY = 'http://localhost:8080';

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
     * @covers \Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder::build
     * @covers \Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient::getGoogleAdsClientOptions
     */
    public function testGetClientOptions()
    {
        $googleAdsClient = $this->googleAdsClientBuilder
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->withDeveloperToken(self::$DEVELOPER_TOKEN)
            ->withLoginCustomerId(self::$LOGIN_CUSTOMER_ID)
            ->withOAuth2Credential($this->fetchAuthTokenInterfaceMock)
            ->withLogger(new Logger('', [new NullHandler()]))
            ->withProxy(self::$PROXY)
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
            self::$LOGIN_CUSTOMER_ID,
            $clientOptions[self::$LOGIN_CUSTOMER_ID_KEY]
        );
        $this->assertInstanceOf(
            GoogleAdsLoggingInterceptor::class,
            $clientOptions['transportConfig']['grpc']['interceptors'][0]
        );
        $this->assertSame(
            getenv('http_proxy'),
            self::$PROXY
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder::build
     * @covers \Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient::getGoogleAdsClientOptions
     */
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
}
