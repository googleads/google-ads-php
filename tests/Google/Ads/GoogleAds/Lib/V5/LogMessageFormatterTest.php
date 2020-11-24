<?php

/**
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

namespace Google\Ads\GoogleAds\Lib\V5;

use Google\Ads\GoogleAds\V5\Errors\ErrorCode;
use Google\Ads\GoogleAds\V5\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V5\Errors\GoogleAdsFailure;
use Google\Ads\GoogleAds\V5\Resources\Campaign;
use Google\Ads\GoogleAds\V5\Resources\Customer;
use Google\Ads\GoogleAds\V5\Resources\GeoTargetConstant;
use Google\Ads\GoogleAds\V5\Services\GeoTargetConstantSuggestion;
use Google\Ads\GoogleAds\V5\Services\GetCustomerRequest;
use Google\Ads\GoogleAds\V5\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V5\Services\SearchGoogleAdsRequest;
use Google\Ads\GoogleAds\V5\Services\SearchGoogleAdsResponse;
use Google\Ads\GoogleAds\V5\Services\SuggestGeoTargetConstantsRequest;
use Google\Ads\GoogleAds\V5\Services\SuggestGeoTargetConstantsRequest\LocationNames;
use Google\Ads\GoogleAds\V5\Services\SuggestGeoTargetConstantsResponse;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;
use Grpc\UnaryCall;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Unit tests for `LogMessageFormatter`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\V5\LogMessageFormatter
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
    private $resourceNameAvailableRequest;
    private $resourceNameAvailableResponse;

    public function testFormatSummary()
    {
        $this->createSuccessRequestResponse();
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatSummary(
            $this->successRequest,
            $this->successResponse,
            'googleads.api.com'
        );

        $this->assertStringContainsString('RequestId: "AbCdEfGh"', $actualOutput);
        $this->assertStringContainsString('Method: "GoogleAdsService/Search"', $actualOutput);
        $this->assertStringContainsString('CustomerId: 1234567890', $actualOutput);
        $this->assertStringContainsString('Host: "googleads.api.com"', $actualOutput);
        $this->assertStringContainsString('IsFault: 0', $actualOutput);
    }

    public function testFormatSummaryWithFailureRequest()
    {
        $this->createFailureRequestResponse();
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

        $this->assertStringContainsString('RequestId: "AbCdEfGhIJk"', $actualOutput);
        $this->assertStringContainsString('Method: "GoogleAdsService/Search"', $actualOutput);
        $this->assertStringContainsString('CustomerId: 1234567890', $actualOutput);
        $this->assertStringContainsString('Host: "googleads.api.com"', $actualOutput);
        $this->assertStringContainsString('IsFault: 1', $actualOutput);
    }

    public function testFormatSummaryWithNoCustomerIdInRequest()
    {
        $this->createRequestWithNoCustomerId();
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatSummary(
            $this->noCustomerIdRequest,
            $this->noCustomerIdResponse,
            'googleads.api.com'
        );

        $this->assertStringContainsString('RequestId: "AbCdEfGh"', $actualOutput);
        $this->assertStringContainsString(
            'Method: "GeoTargetConstantService/SuggestGeoTargetConstants"',
            $actualOutput
        );
        $this->assertStringContainsString(
            'CustomerId: "No customer ID could be extracted from the request"',
            $actualOutput
        );
        $this->assertStringContainsString('Host: "googleads.api.com"', $actualOutput);
        $this->assertStringContainsString('IsFault: 0', $actualOutput);
    }

    public function testFormatSummaryWithResourceNameInRequest()
    {
        $this->createRequestWithResourceName();
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatSummary(
            $this->resourceNameAvailableRequest,
            $this->resourceNameAvailableResponse,
            'googleads.api.com'
        );

        $this->assertStringContainsString('RequestId: "AbCdEfGh"', $actualOutput);
        $this->assertStringContainsString(
            'Method: "CustomerService/GetCustomer"',
            $actualOutput
        );
        $this->assertStringContainsString('CustomerId: 1234567890', $actualOutput);
        $this->assertStringContainsString('Host: "googleads.api.com"', $actualOutput);
        $this->assertStringContainsString('IsFault: 0', $actualOutput);
    }

    public function testFormatDetail()
    {
        $this->createSuccessRequestResponse();
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatDetail(
            $this->successRequest,
            $this->successResponse,
            'googleads.api.com'
        );

        $this->assertStringContainsString('"request-id": "AbCdEfGh"', $actualOutput);
        $this->assertStringContainsString('"developer-token": "REDACTED"', $actualOutput);
        $this->assertStringContainsString('Method Name: GoogleAdsService/Search', $actualOutput);
        $this->assertStringContainsString(
            'Request: {"customerId":"1234567890","query":"SELECT campaign.id FROM campaign"}',
            $actualOutput
        );
        $this->assertStringContainsString('Host: googleads.api.com', $actualOutput);
        $this->assertStringContainsString(
            'Response: {"results":[{"campaign":{"id":"1"}},{"campaign":{"id":"2"}},'
            . '{"campaign":{"id":"3"}}]}',
            $actualOutput
        );
    }

    public function testFormatDetailWithFailureRequest()
    {
        $this->createFailureRequestResponse();
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

        $this->assertStringContainsString('"request-id": "AbCdEfGhIJk"', $actualOutput);
        $this->assertStringContainsString('"developer-token": "REDACTED"', $actualOutput);
        $this->assertStringContainsString('Method Name: GoogleAdsService/Search', $actualOutput);
        $this->assertStringContainsString(
            'Request: {"customerId":"1234567890","query":"SELECT campaign.id FROM campaign"}',
            $actualOutput
        );
        $this->assertStringContainsString(
            'Details: Request is missing required authentication credential. Expected OAuth '
            . '2 access token, login cookie or other valid authentication credential.',
            $actualOutput
        );
        $this->assertStringContainsString(
            '"authenticationError":"AUTHENTICATION_ERROR"',
            $actualOutput
        );
        $this->assertStringContainsString('Host: googleads.api.com', $actualOutput);
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
            new GoogleAdsRow(['campaign' => new Campaign(['id' => 1])]),
            new GoogleAdsRow(['campaign' => new Campaign(['id' => 2])]),
            new GoogleAdsRow(['campaign' => new Campaign(['id' => 3])])
        ];
        $response = new SearchGoogleAdsResponse(['results' => $googleAdsRows]);

        $call = $this->getMockBuilder(UnaryCall::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->getMock();
        $call->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGh'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->successRequest = compact('method', 'argument', 'metadata');
        $this->successResponse = compact('status', 'response', 'call');
    }

    private function createRequestWithResourceName()
    {
        $method = 'CustomerService/GetCustomer';
        $argument = new GetCustomerRequest([
            'resource_name' => 'customers/1234567890'
        ]);
        $metadata = ['developer-token' => ['a1b2c3']];

        $status = new stdClass();
        $status->code = 0;
        $status->metadata = [
            'request-id' => ['AbCdEfGh']
        ];

        $response = new Customer(
            ['resource_name' => 'customers/123456789']
        );

        $call = $this->getMockBuilder(UnaryCall::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->getMock();
        $call->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGh'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->resourceNameAvailableRequest = compact('method', 'argument', 'metadata');
        $this->resourceNameAvailableResponse = compact('status', 'response', 'call');
    }

    private function createRequestWithNoCustomerId()
    {
        $method = 'GeoTargetConstantService/SuggestGeoTargetConstants';
        $argument = new SuggestGeoTargetConstantsRequest([
            'location_names' => new LocationNames(['names' => ['Paris']])
        ]);
        $metadata = ['developer-token' => ['a1b2c3']];

        $status = new stdClass();
        $status->code = 0;
        $status->metadata = [
            'request-id' => ['AbCdEfGh']
        ];

        $geoTargetConstantSuggestions = [
            new GeoTargetConstantSuggestion([
                'locale' => 'US',
                'reach' => 30000,
                'search_term' => 'Paris',
                'geo_target_constant' => new GeoTargetConstant(['id' => 1006094])
            ]),
        ];
        $response = new SuggestGeoTargetConstantsResponse(
            ['geo_target_constant_suggestions' => $geoTargetConstantSuggestions]
        );

        $call = $this->getMockBuilder(UnaryCall::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->getMock();
        $call->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGh'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->noCustomerIdRequest = compact('method', 'argument', 'metadata');
        $this->noCustomerIdResponse = compact('status', 'response', 'call');
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

        $call = $this->getMockBuilder(UnaryCall::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->getMock();
        $call->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGhIJk'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->failureRequest = compact('method', 'argument', 'metadata');
        $this->failureResponse = compact('status', 'response', 'call');
    }
}
