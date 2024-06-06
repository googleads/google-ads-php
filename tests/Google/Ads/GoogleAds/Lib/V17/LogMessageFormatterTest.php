<?php

/**
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

use Google\Ads\GoogleAds\Util\V17\ResourceNames;
use Google\Ads\GoogleAds\V17\Errors\ErrorCode;
use Google\Ads\GoogleAds\V17\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V17\Errors\GoogleAdsFailure;
use Google\Ads\GoogleAds\V17\Resources\Campaign;
use Google\Ads\GoogleAds\V17\Resources\ChangeEvent;
use Google\Ads\GoogleAds\V17\Resources\ContactDetails;
use Google\Ads\GoogleAds\V17\Resources\CustomerUserAccess;
use Google\Ads\GoogleAds\V17\Resources\Feed;
use Google\Ads\GoogleAds\V17\Resources\Feed\PlacesLocationFeedData;
use Google\Ads\GoogleAds\V17\Resources\GeoTargetConstant;
use Google\Ads\GoogleAds\V17\Resources\LocalServicesLead;
use Google\Ads\GoogleAds\V17\Resources\LocalServicesLeadConversation;
use Google\Ads\GoogleAds\V17\Resources\MessageDetails;
use Google\Ads\GoogleAds\V17\Services\CampaignOperation;
use Google\Ads\GoogleAds\V17\Services\CreateCustomerClientRequest;
use Google\Ads\GoogleAds\V17\Services\CreateCustomerClientResponse;
use Google\Ads\GoogleAds\V17\Services\GeoTargetConstantSuggestion;
use Google\Ads\GoogleAds\V17\Services\GetCustomerRequest;
use Google\Ads\GoogleAds\V17\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V17\Services\MutateCampaignResult;
use Google\Ads\GoogleAds\V17\Services\MutateCampaignsRequest;
use Google\Ads\GoogleAds\V17\Services\MutateCampaignsResponse;
use Google\Ads\GoogleAds\V17\Services\SearchGoogleAdsRequest;
use Google\Ads\GoogleAds\V17\Services\SearchGoogleAdsResponse;
use Google\Ads\GoogleAds\V17\Services\SearchGoogleAdsStreamRequest;
use Google\Ads\GoogleAds\V17\Services\SearchGoogleAdsStreamResponse;
use Google\Ads\GoogleAds\V17\Services\SuggestGeoTargetConstantsRequest;
use Google\Ads\GoogleAds\V17\Services\SuggestGeoTargetConstantsRequest\LocationNames;
use Google\Ads\GoogleAds\V17\Services\SuggestGeoTargetConstantsResponse;
use Google\Protobuf\FieldMask;
use Grpc\UnaryCall;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Unit tests for `LogMessageFormatter`.
 *
 * @covers \Google\Ads\GoogleAds\Lib\V17\LogMessageFormatter
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
    private $emailAddressRequest;
    private $emailAddressResponse;

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
            'Method: "CampaignService/MutateCampaigns"',
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

        $this->assertStringContainsString('"request-id": "AbCdEfGhIJk"', $actualOutput);
        $this->assertStringContainsString('"developer-token": "REDACTED"', $actualOutput);
        $this->assertStringContainsString('Method Name: GoogleAdsService/Search', $actualOutput);
        $this->assertStringContainsString(
            'Request: ' . "\n"
            . '{"customerId":"1234567890","query":"SELECT campaign.id FROM campaign"}',
            $actualOutput
        );
        $this->assertStringContainsString('Host: googleads.api.com', $actualOutput);
        $this->assertStringContainsString(
            'Response: ' . "\n"
            . '{"results":[{"campaign":{"id":"1"}},{"campaign":{"id":"2"}},'
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
            'Request: ' . "\n"
            . '{"customerId":"1234567890","query":"SELECT campaign.id FROM campaign"}',
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

    public function testFormatDetailWithResponseContainingCustomerUserAccess()
    {
        $this->createRequestResponseWithCustomerUserAccess();
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatDetail(
            $this->emailAddressRequest,
            $this->emailAddressResponse,
            'googleads.api.com'
        );

        $this->assertStringContainsString('"request-id": "AbCdEfGhIJk"', $actualOutput);
        $this->assertStringContainsString('"developer-token": "REDACTED"', $actualOutput);
        $this->assertStringContainsString('Method Name: GoogleAdsService/Search', $actualOutput);
        $this->assertStringContainsString(
            'Request: ' . "\n"
            . '{"customerId":"1234567890",'
            . '"query":"SELECT customer_user_access.email_address,'
            . 'customer_user_access.inviter_user_email_address FROM customer_user_access"}',
            $actualOutput
        );
        $this->assertStringContainsString('Host: googleads.api.com', $actualOutput);
        $this->assertStringContainsString(
            'Response: ' . "\n"
            . '{"results":[{"customerUserAccess":{"emailAddress":"REDACTED",'
            . '"inviterUserEmailAddress":"REDACTED"}}],"fieldMask":'
            . '"customerUserAccess.inviterUserEmailAddress,customerUserAccess.emailAddress"}',
            $actualOutput
        );
    }

    public function testFormatDetailWithResponseContainingChangeEvent()
    {
        $this->createRequestResponseWithChangeEvent();
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatDetail(
            $this->emailAddressRequest,
            $this->emailAddressResponse,
            'googleads.api.com'
        );

        $this->assertStringContainsString('"request-id": "AbCdEfGhIJk"', $actualOutput);
        $this->assertStringContainsString('"developer-token": "REDACTED"', $actualOutput);
        $this->assertStringContainsString('Method Name: GoogleAdsService/Search', $actualOutput);
        $this->assertStringContainsString(
            'Request: ' . "\n"
            . '{"customerId":"1234567890",'
            . '"query":"SELECT change_event.user_email FROM change_event"}',
            $actualOutput
        );
        $this->assertStringContainsString('Host: googleads.api.com', $actualOutput);
        $this->assertStringContainsString(
            'Response: ' . "\n"
            . '{"results":[{"changeEvent":{"userEmail":"REDACTED"}}],"fieldMask":'
            . '"changeEvent.userEmail"}',
            $actualOutput
        );
    }

    public function testFormatDetailWithResponseContainingFeed()
    {
        $this->createRequestResponseWithFeed();
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatDetail(
            $this->emailAddressRequest,
            $this->emailAddressResponse,
            'googleads.api.com'
        );

        $this->assertStringContainsString('"request-id": "AbCdEfGhIJk"', $actualOutput);
        $this->assertStringContainsString('"developer-token": "REDACTED"', $actualOutput);
        $this->assertStringContainsString('Method Name: GoogleAdsService/SearchStream', $actualOutput);
        $this->assertStringContainsString(
            'Request: ' . "\n"
            . '{"customerId":"1234567890",'
            . '"query":"SELECT feed.places_location_feed_data.email_address FROM feed"}',
            $actualOutput
        );
        $this->assertStringContainsString('Host: googleads.api.com', $actualOutput);
        $this->assertStringContainsString(
            'Response: ' . "\n"
            . '{"results":[{"feed":{"placesLocationFeedData":{"emailAddress":"REDACTED"}}}],'
            . '"fieldMask":"feed.placesLocationFeedData.emailAddress"}',
            $actualOutput
        );
    }

    public function testFormatDetailWithResponseContainingLocalServicesLead()
    {
        $this->createRequestResponseWithLocalServicesLead();
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatDetail(
            $this->emailAddressRequest,
            $this->emailAddressResponse,
            'googleads.api.com'
        );

        $this->assertStringContainsString('"request-id": "AbCdEfGhIJk"', $actualOutput);
        $this->assertStringContainsString('"developer-token": "REDACTED"', $actualOutput);
        $this->assertStringContainsString(
            'Method Name: GoogleAdsService/SearchStream',
            $actualOutput
        );
        $this->assertStringContainsString(
            'Request: ' . "\n"
            . '{"customerId":"1234567890",'
            . '"query":"SELECT local_services_lead.contact_details.email FROM local_services_lead"'
            . '}',
            $actualOutput
        );
        $this->assertStringContainsString('Host: googleads.api.com', $actualOutput);
        $this->assertStringContainsString(
            'Response: ' . "\n"
            . '{"results":[{"localServicesLead":{"contactDetails":{"email":"REDACTED"}}}],'
            . '"fieldMask":"localServicesLead.contactDetails.email"}',
            $actualOutput
        );
    }

    public function testFormatDetailWithResponseContainingLocalServicesLeadConversation()
    {
        $this->createRequestResponseWithLocalServicesLeadConversation();
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatDetail(
            $this->emailAddressRequest,
            $this->emailAddressResponse,
            'googleads.api.com'
        );

        $this->assertStringContainsString('"request-id": "AbCdEfGhIJk"', $actualOutput);
        $this->assertStringContainsString('"developer-token": "REDACTED"', $actualOutput);
        $this->assertStringContainsString(
            'Method Name: GoogleAdsService/SearchStream',
            $actualOutput
        );
        $this->assertStringContainsString(
            'Request: ' . "\n"
            . '{"customerId":"1234567890",'
            . '"query":"SELECT local_services_lead_conversation.message_details.text FROM '
            . 'local_services_lead_conversation"'
            . '}',
            $actualOutput
        );
        $this->assertStringContainsString('Host: googleads.api.com', $actualOutput);
        $this->assertStringContainsString(
            'Response: ' . "\n"
            . '{"results":[{"localServicesLeadConversation":{"messageDetails":{"text":"REDACTED"}}}]'
            . ',"fieldMask":"localServicesLeadConversation.messageDetails.text"}',
            $actualOutput
        );
    }

    public function testFormatDetailWithCreateCustomerClientRequest()
    {
        $this->createCreateCustomerClientRequestAndResponse();
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatDetail(
            $this->emailAddressRequest,
            $this->emailAddressResponse,
            'googleads.api.com'
        );

        $this->assertStringContainsString('"request-id": "AbCdEfGhIJk"', $actualOutput);
        $this->assertStringContainsString('"developer-token": "REDACTED"', $actualOutput);
        $this->assertStringContainsString('Method Name: CustomerService/CreateCustomer', $actualOutput);
        $this->assertStringContainsString(
            'Request: ' . "\n" . '{"customerId":"1234567890","emailAddress":"REDACTED"}',
            $actualOutput
        );
        $this->assertStringContainsString('Host: googleads.api.com', $actualOutput);
        $this->assertStringContainsString(
            'Response: ' . "\n" . '{"invitationLink":"http://example.com"}',
            $actualOutput
        );
    }

    /**
     * @dataProvider queryWithGoogleAdsRowProvider
     */
    public function testFormatDetailWithRequestWhoseGaqlQueryContainsEmails(
        string $query,
        string $loggedQuery,
        GoogleAdsRow $resultGoogleAdsRow,
        array $fieldMaskPaths,
        string $loggedResult
    ) {
        $this->createRequestResponseWithEmailsInGaql($query, $resultGoogleAdsRow, $fieldMaskPaths);
        $logMessageFormatter = new LogMessageFormatter();

        $actualOutput = $logMessageFormatter->formatDetail(
            $this->emailAddressRequest,
            $this->emailAddressResponse,
            'googleads.api.com'
        );

        $this->assertStringContainsString('"request-id": "AbCdEfGhIJk"', $actualOutput);
        $this->assertStringContainsString('"developer-token": "REDACTED"', $actualOutput);
        $this->assertStringContainsString('Method Name: GoogleAdsService/Search', $actualOutput);
        $this->assertStringContainsString(
            'Request: ' . "\n" . '{"customerId":"1234567890",' . $loggedQuery . '}',
            $actualOutput
        );
        $this->assertStringContainsString('Host: googleads.api.com', $actualOutput);
        $this->assertStringContainsString('Response: ' . "\n" . $loggedResult, $actualOutput);
    }

    public function queryWithGoogleAdsRowProvider()
    {
        return [
            [
                // Change event.
                'SELECT change_event.user_email FROM change_event WHERE '
                . 'change_event.user_email = "test1@example.com"',
                '"query":"SELECT change_event.user_email FROM change_event WHERE '
                . 'change_event.user_email = \"REDACTED\""',
                new GoogleAdsRow([
                    'change_event' => new ChangeEvent(['user_email' => 'test1@example.com'])
                ]),
                ['change_event.user_email'],
                '{"results":[{"changeEvent":{"userEmail":"REDACTED"}}],"fieldMask":'
                . '"changeEvent.userEmail"}'
            ], [
                // Customer user access.
                'SELECT customer_user_access.email_address FROM customer_user_access WHERE '
                . 'customer_user_access.email_address = \'test@example.com\' AND '
                . 'customer_user_access.inviter_user_email_address LIKE \'test2@example.com\'',
                '"query":"SELECT customer_user_access.email_address FROM customer_user_access '
                . 'WHERE customer_user_access.email_address = \'REDACTED\' '
                . 'AND customer_user_access.inviter_user_email_address LIKE \'REDACTED\'"',
                new GoogleAdsRow([
                    'customer_user_access' => new CustomerUserAccess([
                        'email_address' => 'test1@example.com',
                        'inviter_user_email_address' => 'test2@example.com'
                    ])
                ]),
                [
                    'customer_user_access.email_address',
                    'customer_user_access.inviter_user_email_address'
                ],
                '{"results":[{"customerUserAccess":{"emailAddress":"REDACTED",'
                . '"inviterUserEmailAddress":"REDACTED"}}],"fieldMask":'
                . '"customerUserAccess.emailAddress,customerUserAccess.inviterUserEmailAddress"}'
            ], [
                // Feed.
                'SELECT feed.places_location_feed_data.email_address FROM feed WHERE '
                . 'feed.places_location_feed_data.email_address = "test1@example.com"',
                '"query":"SELECT feed.places_location_feed_data.email_address FROM feed WHERE '
                . 'feed.places_location_feed_data.email_address = \"REDACTED\""',
                new GoogleAdsRow([
                    'feed' => new Feed([
                        'places_location_feed_data' => new PlacesLocationFeedData([
                            'email_address' => 'test1@example.com'
                        ])
                    ])
                ]),
                ['feed.places_location_feed_data.email_address'],
                '{"results":[{"feed":{"placesLocationFeedData":{"emailAddress":"REDACTED"}}}],'
                . '"fieldMask":"feed.placesLocationFeedData.emailAddress"}'
            ], [
                // Local Services lead.
                'SELECT local_services_lead.contact_details.email FROM local_services_lead WHERE '
                . 'local_services_lead.contact_details.email = "test1@example.com"',
                '"query":"SELECT local_services_lead.contact_details.email FROM local_services_lead'
                . ' WHERE local_services_lead.contact_details.email = \"REDACTED\""',
                new GoogleAdsRow([
                    'local_services_lead' => new LocalServicesLead([
                        'contact_details' => new ContactDetails(['email' => 'test1@example.com'])
                    ])
                ]),
                ['local_services_lead.contact_details.email'],
                '{"results":[{"localServicesLead":{"contactDetails":{"email":"REDACTED"}}}],'
                . '"fieldMask":"localServicesLead.contactDetails.email"}'
            ], [
                // Local Services lead conversation.
                'SELECT local_services_lead_conversation.message_details.text FROM '
                . 'local_services_lead_conversation WHERE '
                . 'local_services_lead_conversation.message_details.text = "test1@example.com"',
                '"query":"SELECT local_services_lead_conversation.message_details.text FROM '
                . 'local_services_lead_conversation WHERE '
                . 'local_services_lead_conversation.message_details.text = \"REDACTED\""',
                new GoogleAdsRow([
                    'local_services_lead_conversation' => new LocalServicesLeadConversation([
                        'message_details' => new MessageDetails(['text' => 'test1@example.com'])
                    ])
                ]),
                ['local_services_lead_conversation.message_details.text'],
                '{"results":[{"localServicesLeadConversation":{"messageDetails":{"text":'
                . '"REDACTED"}}}]'
                . ',"fieldMask":"localServicesLeadConversation.messageDetails.text"}'
            ]
        ];
    }

    private function createSuccessRequestResponse()
    {
        $method = 'GoogleAdsService/Search';
        $argument = new SearchGoogleAdsRequest(
            ['customer_id' => 1234567890, 'query' => 'SELECT campaign.id FROM campaign']
        );
        $metadata = ['developer-token' => ['a1b2c3']];
        $status = self::createSuccessfulStatus();

        $googleAdsRows = [
            new GoogleAdsRow(['campaign' => new Campaign(['id' => 1])]),
            new GoogleAdsRow(['campaign' => new Campaign(['id' => 2])]),
            new GoogleAdsRow(['campaign' => new Campaign(['id' => 3])])
        ];
        $response = new SearchGoogleAdsResponse(['results' => $googleAdsRows]);
        $call = self::createUnaryCallMock();

        $this->successRequest = compact('method', 'argument', 'metadata');
        $this->successResponse = compact('status', 'response', 'call');
    }

    private function createRequestWithResourceName()
    {
        $method = 'CampaignService/MutateCampaigns';
        $argument = new MutateCampaignsRequest();
        $argument->setCustomerId(1234567890);
        $argument->setOperations([new CampaignOperation(['update' => new Campaign([
            'resource_name' => ResourceNames::forCampaign(1234567890, 9876543210)
        ])])]);
        $metadata = ['developer-token' => ['a1b2c3']];
        $status = self::createSuccessfulStatus();

        $response = new MutateCampaignsResponse(['results' => [new MutateCampaignResult([
            'resource_name' => ResourceNames::forCampaign(1234567890, 9876543210)
        ])]]);
        $call = self::createUnaryCallMock();

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
        $status = self::createSuccessfulStatus();

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
        $call = self::createUnaryCallMock();

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
        $call = self::createUnaryCallMock();

        $this->failureRequest = compact('method', 'argument', 'metadata');
        $this->failureResponse = compact('status', 'response', 'call');
    }

    private function createRequestResponseWithCustomerUserAccess()
    {
        $method = 'GoogleAdsService/Search';
        $argument = new SearchGoogleAdsRequest([
            'customer_id' => 1234567890,
            'query' => 'SELECT customer_user_access.email_address,'
                . 'customer_user_access.inviter_user_email_address FROM customer_user_access'
        ]);
        $metadata = ['developer-token' => ['a1b2c3']];
        $status = self::createSuccessfulStatus();

        $googleAdsRows = [
            new GoogleAdsRow([
                'customer_user_access' => new CustomerUserAccess([
                    'email_address' => 'test1@example.com',
                    'inviter_user_email_address' => 'test2@example.com'
                ])
            ])
        ];
        $response = new SearchGoogleAdsResponse([
            'results' => $googleAdsRows,
            'field_mask' => new FieldMask([
                'paths' => [
                    'customer_user_access.inviter_user_email_address',
                    'customer_user_access.email_address'
                ]
            ])
        ]);

        $call = self::createUnaryCallMock();
        $call->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGh'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->emailAddressRequest = compact('method', 'argument', 'metadata');
        $this->emailAddressResponse = compact('status', 'response', 'call');
    }

    private function createRequestResponseWithChangeEvent()
    {
        $method = 'GoogleAdsService/Search';
        $argument = new SearchGoogleAdsRequest([
            'customer_id' => 1234567890,
            'query' => 'SELECT change_event.user_email FROM change_event'
        ]);
        $metadata = ['developer-token' => ['a1b2c3']];
        $status = self::createSuccessfulStatus();

        $googleAdsRows = [
            new GoogleAdsRow(
                ['change_event' => new ChangeEvent(['user_email' => 'test1@example.com'])]
            )
        ];
        $response = new SearchGoogleAdsResponse([
            'results' => $googleAdsRows,
            'field_mask' => new FieldMask(['paths' => ['change_event.user_email']])
        ]);

        $call = self::createUnaryCallMock();
        $call->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGh'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->emailAddressRequest = compact('method', 'argument', 'metadata');
        $this->emailAddressResponse = compact('status', 'response', 'call');
    }

    private function createRequestResponseWithFeed()
    {
        $method = 'GoogleAdsService/SearchStream';
        $argument = new SearchGoogleAdsStreamRequest([
            'customer_id' => 1234567890,
            'query' => 'SELECT feed.places_location_feed_data.email_address FROM feed'
        ]);
        $metadata = ['developer-token' => ['a1b2c3']];
        $status = self::createSuccessfulStatus();

        $googleAdsRows = [
            new GoogleAdsRow([
                'feed' => new Feed([
                    'places_location_feed_data' => new PlacesLocationFeedData([
                        'email_address' => 'test1@example.com'])
                ])
            ])
        ];
        $response = new SearchGoogleAdsStreamResponse([
            'results' => $googleAdsRows,
            'field_mask' => new FieldMask([
                'paths' => ['feed.places_location_feed_data.email_address']])
        ]);

        $call = self::createUnaryCallMock();
        $call->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGh'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->emailAddressRequest = compact('method', 'argument', 'metadata');
        $this->emailAddressResponse = compact('status', 'response', 'call');
    }

    private function createRequestResponseWithLocalServicesLead()
    {
        $method = 'GoogleAdsService/SearchStream';
        $argument = new SearchGoogleAdsStreamRequest([
            'customer_id' => 1234567890,
            'query' => 'SELECT local_services_lead.contact_details.email FROM local_services_lead'
        ]);
        $metadata = ['developer-token' => ['a1b2c3']];
        $status = self::createSuccessfulStatus();

        $googleAdsRows = [
            new GoogleAdsRow([
                'local_services_lead' => new LocalServicesLead([
                    'contact_details' => new ContactDetails(['email' => 'test1@example.com'])
                ])
            ])
        ];
        $response = new SearchGoogleAdsStreamResponse([
            'results' => $googleAdsRows,
            'field_mask' => new FieldMask([
                'paths' => ['local_services_lead.contact_details.email']])
        ]);

        $call = self::createUnaryCallMock();
        $call->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGh'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->emailAddressRequest = compact('method', 'argument', 'metadata');
        $this->emailAddressResponse = compact('status', 'response', 'call');
    }

    private function createRequestResponseWithLocalServicesLeadConversation()
    {
        $method = 'GoogleAdsService/SearchStream';
        $argument = new SearchGoogleAdsStreamRequest([
            'customer_id' => 1234567890,
            'query' => 'SELECT local_services_lead_conversation.message_details.text '
                . 'FROM local_services_lead_conversation'
        ]);
        $metadata = ['developer-token' => ['a1b2c3']];
        $status = self::createSuccessfulStatus();

        $googleAdsRows = [
            new GoogleAdsRow([
                'local_services_lead_conversation' => new LocalServicesLeadConversation([
                    'message_details' => new MessageDetails(['text' => 'test1@example.com'])
                ])
            ])
        ];
        $response = new SearchGoogleAdsStreamResponse([
            'results' => $googleAdsRows,
            'field_mask' => new FieldMask([
                'paths' => ['local_services_lead_conversation.message_details.text']])
        ]);

        $call = self::createUnaryCallMock();
        $call->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGh'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->emailAddressRequest = compact('method', 'argument', 'metadata');
        $this->emailAddressResponse = compact('status', 'response', 'call');
    }

    private function createCreateCustomerClientRequestAndResponse()
    {
        $method = 'CustomerService/CreateCustomer';
        $argument = new CreateCustomerClientRequest([
            'customer_id' => 1234567890,
            'email_address' => 'test1@example.com'
        ]);
        $metadata = ['developer-token' => ['a1b2c3']];
        $status = self::createSuccessfulStatus();

        $response = new CreateCustomerClientResponse(['invitation_link' => 'http://example.com']);

        $call = self::createUnaryCallMock();
        $call->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGh'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->emailAddressRequest = compact('method', 'argument', 'metadata');
        $this->emailAddressResponse = compact('status', 'response', 'call');
    }

    private function createRequestResponseWithEmailsInGaql(
        string $query,
        GoogleAdsRow $googleAdsRow,
        array $fieldMaskPaths
    ) {
        $method = 'GoogleAdsService/Search';
        $argument = new SearchGoogleAdsRequest(['customer_id' => 1234567890, 'query' => $query]);
        $metadata = ['developer-token' => ['a1b2c3']];
        $status = self::createSuccessfulStatus();

        $googleAdsRows = [$googleAdsRow];
        $response = new SearchGoogleAdsResponse([
            'results' => $googleAdsRows,
            'field_mask' => new FieldMask(['paths' => $fieldMaskPaths])
        ]);

        $call = self::createUnaryCallMock();
        $call->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGh'], 'x-google-session-info' => ['1234abcd']]
        );

        $this->emailAddressRequest = compact('method', 'argument', 'metadata');
        $this->emailAddressResponse = compact('status', 'response', 'call');
    }

    private static function createSuccessfulStatus()
    {
        $status = new stdClass();
        $status->code = 0;
        $status->metadata = ['request-id' => ['AbCdEfGh']];
        return $status;
    }

    private function createUnaryCallMock()
    {
        $call = $this->getMockBuilder(UnaryCall::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->getMock();
        $call->method('getMetadata')->willReturn(
            ['request-id' => ['AbCdEfGhIJk'], 'x-google-session-info' => ['1234abcd']]
        );
        return $call;
    }
}
