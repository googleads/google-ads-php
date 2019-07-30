<?php
/**
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

namespace Google\Ads\GoogleAds\Lib\V1;

use Google\Ads\GoogleAds\V1\Errors\ErrorCode;
use Google\Ads\GoogleAds\V1\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V1\Errors\GoogleAdsFailure;
use Google\Ads\GoogleAds\V1\Resources\Campaign;
use Google\Ads\GoogleAds\V1\Resources\GeoTargetConstant;
use Google\Ads\GoogleAds\V1\Services\GeoTargetConstantSuggestion;
use Google\Ads\GoogleAds\V1\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V1\Services\SearchGoogleAdsRequest;
use Google\Ads\GoogleAds\V1\Services\SearchGoogleAdsResponse;
use Google\Ads\GoogleAds\V1\Services\SuggestGeoTargetConstantsRequest;
use Google\Ads\GoogleAds\V1\Services\SuggestGeoTargetConstantsRequest\LocationNames;
use Google\Ads\GoogleAds\V1\Services\SuggestGeoTargetConstantsResponse;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;
use Grpc\UnaryCall;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Unit tests for `LogMessageFormatter`.
 *
 * @see LogMessageFormatter
 * @small
 */
class LogMessageFormatterTest extends TestCase
{

    private $successRequest;
    private $successResponse;
    private $failureRequest;
    private $failureResponse;
    private $noCustomerIdRequest;
    private $noCustomerIdResponse;

    /**
     * @see \PHPUnit\Framework\TestCase::setUp
     */
    protected function setUp()
    {
        $this->createSuccessRequestResponse();
        $this->createFailureRequestResponse();
    }

    /**
     * @covers \Google\Ads\GoogleAds\Lib\V1\LogMessageFormatter::formatSummary()
     */
    public function testFormatSummary()
    {
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatSummary(
            $this->successRequest,
            $this->successResponse,
            'googleads.api.com'
        );

        $this->assertContains('RequestId: "AbCdEfGh"', $actualOutput);
        $this->assertContains('Method: "GoogleAdsService/Search"', $actualOutput);
        $this->assertContains('ClientCustomerId: 1234567890', $actualOutput);
        $this->assertContains('Host: "googleads.api.com"', $actualOutput);
        $this->assertContains('IsFault: 0', $actualOutput);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Lib\V1\LogMessageFormatter::formatSummary()
     */
    public function testFormatSummaryWithFailureRequest()
    {
        $mockStatusMetadataExtractor = $this->getMockBuilder(StatusMetadataExtractor::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->getMock();
        $mockStatusMetadataExtractor->method('extractErrorMessageList')->willReturn(
            ['Authentication of the request failed.']
        );
        $logMessageFormatter = new LogMessageFormatter($mockStatusMetadataExtractor);

        $actualOutput = $logMessageFormatter->formatSummary(
            $this->failureRequest,
            $this->failureResponse,
            'googleads.api.com'
        );

        $this->assertContains('RequestId: "AbCdEfGhIJk"', $actualOutput);
        $this->assertContains('Method: "GoogleAdsService/Search"', $actualOutput);
        $this->assertContains('ClientCustomerId: 1234567890', $actualOutput);
        $this->assertContains('Host: "googleads.api.com"', $actualOutput);
        $this->assertContains('IsFault: 1', $actualOutput);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Lib\V1\LogMessageFormatter::formatSummary()
     */
    public function testFormatSummaryWithNoCustomerIdInRequest()
    {
        $this->createRequestWithNoCustomerId();
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatSummary(
            $this->noCustomerIdRequest,
            $this->noCustomerIdResponse,
            'googleads.api.com'
        );

        $this->assertContains('RequestId: "AbCdEfGh"', $actualOutput);
        $this->assertContains(
            'Method: "GeoTargetConstantService/SuggestGeoTargetConstants"',
            $actualOutput
        );
        $this->assertContains('Host: "googleads.api.com"', $actualOutput);
        $this->assertContains('IsFault: 0', $actualOutput);
    }

    /**
     * @covers \Google\Ads\GoogleAds\Lib\V1\LogMessageFormatter::formatDetail()
     */
    public function testFormatDetail()
    {
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatDetail(
            $this->successRequest,
            $this->successResponse,
            'googleads.api.com'
        );

        $this->assertContains('"request-id": "AbCdEfGh"', $actualOutput);
        $this->assertContains('"developer-token": "REDACTED"', $actualOutput);
        $this->assertContains('Method Name: GoogleAdsService/Search', $actualOutput);
        $this->assertContains(
            'Request: {"customerId":"1234567890","query":"SELECT campaign.id FROM campaign"}',
            $actualOutput
        );
        $this->assertContains('Host: googleads.api.com', $actualOutput);
        $this->assertContains(
            'Response: {"results":[{"campaign":{"id":"1"}},{"campaign":{"id":"2"}},'
            . '{"campaign":{"id":"3"}}]}',
            $actualOutput
        );
    }

    /**
     * @covers \Google\Ads\GoogleAds\Lib\V1\LogMessageFormatter::formatDetail()
     */
    public function testFormatDetailWithFailureRequest()
    {
        $mockStatusMetadataExtractor = $this->getMockBuilder(StatusMetadataExtractor::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->getMock();
        $mockStatusMetadataExtractor->method('extractGoogleAdsFailure')->willReturn(
            new GoogleAdsFailure(
                [
                    'errors' => [
                        new GoogleAdsError(
                            [
                                'error_code' => new ErrorCode(['authentication_error' => 2]),
                                'message' => 'Authentication of the request failed.'
                            ]
                        )
                    ]
                ]
            )
        );
        $logMessageFormatter = new LogMessageFormatter($mockStatusMetadataExtractor);

        $actualOutput = $logMessageFormatter->formatDetail(
            $this->failureRequest,
            $this->failureResponse,
            'googleads.api.com'
        );

        $this->assertContains('"request-id": "AbCdEfGhIJk"', $actualOutput);
        $this->assertContains('"developer-token": "REDACTED"', $actualOutput);
        $this->assertContains('Method Name: GoogleAdsService/Search', $actualOutput);
        $this->assertContains(
            'Request: {"customerId":"1234567890","query":"SELECT campaign.id FROM campaign"}',
            $actualOutput
        );
        $this->assertContains(
            'Details: Request is missing required authentication credential. Expected OAuth '
            . '2 access token, login cookie or other valid authentication credential.',
            $actualOutput
        );
        $this->assertContains('"authenticationError":"AUTHENTICATION_ERROR"', $actualOutput);
        $this->assertContains('Host: googleads.api.com', $actualOutput);
    }

    private function createSuccessRequestResponse()
    {
        $method = 'GoogleAdsService/Search';
        $argument = new SearchGoogleAdsRequest(
            ['customer_id' => 1234567890, 'query' => 'SELECT campaign.id FROM campaign']
        );
        $metadata = ['developer-token' => ['a1b2c3']];

        $status = new stdClass();
        $status->code = 0;
        $status->metadata = [
            'request-id' => ['AbCdEfGh']
        ];

        $googleAdsRows = [
            new GoogleAdsRow(
                ['campaign' => new Campaign(['id' => new Int64Value(['value' => 1])])]
            ),
            new GoogleAdsRow(
                ['campaign' => new Campaign(['id' => new Int64Value(['value' => 2])])]
            ),
            new GoogleAdsRow(['campaign' => new Campaign(['id' => new Int64Value(['value' => 3])])])
        ];
        $response = new SearchGoogleAdsResponse(['results' => $googleAdsRows]);

        $unaryCall = $this->getMockBuilder(UnaryCall::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->getMock();
        $unaryCall->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGh'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->successRequest = compact('method', 'argument', 'metadata');
        $this->successResponse = compact('status', 'response', 'unaryCall');
    }

    private function createRequestWithNoCustomerId()
    {
        $method = 'GeoTargetConstantService/SuggestGeoTargetConstants';
        $argument = new SuggestGeoTargetConstantsRequest([
            'location_names' => new LocationNames(
                ['names' => [new StringValue(['value' => 'Paris'])]]
            )
        ]);
        $metadata = ['developer-token' => ['a1b2c3']];

        $status = new stdClass();
        $status->code = 0;
        $status->metadata = [
            'request-id' => ['AbCdEfGh']
        ];

        $geoTargetConstantSuggestions = [
            new GeoTargetConstantSuggestion([
                'locale' => new StringValue(['value' => 'US']),
                'reach' => new Int64Value(['value' => 30000]),
                'search_term' =>  new StringValue(['value' => 'Paris']),
                'geo_target_constant' => new GeoTargetConstant([
                    'id' => new Int64Value(['value' => 1006094])
                ])
            ]),
        ];
        $response = new SuggestGeoTargetConstantsResponse(
            ['geo_target_constant_suggestions' => $geoTargetConstantSuggestions]
        );

        $unaryCall = $this->getMockBuilder(UnaryCall::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->getMock();
        $unaryCall->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGh'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->noCustomerIdRequest = compact('method', 'argument', 'metadata');
        $this->noCustomerIdResponse = compact('status', 'response', 'unaryCall');
    }

    private function createFailureRequestResponse()
    {
        $method = 'GoogleAdsService/Search';
        $argument = new SearchGoogleAdsRequest(
            ['customer_id' => 1234567890, 'query' => 'SELECT campaign.id FROM campaign']
        );
        $metadata = ['developer-token' => ['a1b2c3']];

        $status = new stdClass();
        $status->code = 16;
        $status->metadata = [
            'request-id' => ['AbCdEfGhIJk']
        ];
        $status->details =
            'Request is missing required authentication credential. Expected OAuth 2 access token,'
            . ' login cookie or other valid authentication credential.';

        $response = new SearchGoogleAdsResponse(['results' => []]);

        $unaryCall = $this->getMockBuilder(UnaryCall::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->getMock();
        $unaryCall->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGhIJk'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->failureRequest = compact('method', 'argument', 'metadata');
        $this->failureResponse = compact('status', 'response', 'unaryCall');
    }
}
