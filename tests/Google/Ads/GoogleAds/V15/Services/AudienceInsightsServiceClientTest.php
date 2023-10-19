<?php
/*
 * Copyright 2023 Google LLC
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

/*
 * GENERATED CODE WARNING
 * This file was automatically generated - do not edit!
 */

namespace Google\Ads\GoogleAds\V15\Services;

use Google\Ads\GoogleAds\V15\Services\AudienceInsightsServiceClient;
use Google\Ads\GoogleAds\V15\Services\BasicInsightsAudience;
use Google\Ads\GoogleAds\V15\Services\GenerateAudienceCompositionInsightsResponse;
use Google\Ads\GoogleAds\V15\Services\GenerateInsightsFinderReportResponse;
use Google\Ads\GoogleAds\V15\Services\GenerateSuggestedTargetingInsightsResponse;
use Google\Ads\GoogleAds\V15\Services\InsightsAudience;
use Google\Ads\GoogleAds\V15\Services\ListAudienceInsightsAttributesResponse;
use Google\Ads\GoogleAds\V15\Services\ListInsightsEligibleDatesResponse;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\Testing\GeneratedTest;
use Google\ApiCore\Testing\MockTransport;
use Google\Rpc\Code;
use stdClass;

/**
 * @group services
 *
 * @group gapic
 */
class AudienceInsightsServiceClientTest extends GeneratedTest
{
    /** @return TransportInterface */
    private function createTransport($deserialize = null)
    {
        return new MockTransport($deserialize);
    }

    /** @return CredentialsWrapper */
    private function createCredentials()
    {
        return $this->getMockBuilder(CredentialsWrapper::class)->disableOriginalConstructor()->getMock();
    }

    /** @return AudienceInsightsServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new AudienceInsightsServiceClient($options);
    }

    /** @test */
    public function generateAudienceCompositionInsightsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GenerateAudienceCompositionInsightsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $audience = new InsightsAudience();
        $audienceCountryLocations = [];
        $audience->setCountryLocations($audienceCountryLocations);
        $dimensions = [];
        $response = $gapicClient->generateAudienceCompositionInsights($customerId, $audience, $dimensions);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v15.services.AudienceInsightsService/GenerateAudienceCompositionInsights', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getAudience();
        $this->assertProtobufEquals($audience, $actualValue);
        $actualValue = $actualRequestObject->getDimensions();
        $this->assertProtobufEquals($dimensions, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateAudienceCompositionInsightsExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $customerId = 'customerId-1772061412';
        $audience = new InsightsAudience();
        $audienceCountryLocations = [];
        $audience->setCountryLocations($audienceCountryLocations);
        $dimensions = [];
        try {
            $gapicClient->generateAudienceCompositionInsights($customerId, $audience, $dimensions);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateInsightsFinderReportTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $savedReportUrl = 'savedReportUrl1274866844';
        $expectedResponse = new GenerateInsightsFinderReportResponse();
        $expectedResponse->setSavedReportUrl($savedReportUrl);
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $baselineAudience = new BasicInsightsAudience();
        $baselineAudienceCountryLocation = [];
        $baselineAudience->setCountryLocation($baselineAudienceCountryLocation);
        $specificAudience = new BasicInsightsAudience();
        $specificAudienceCountryLocation = [];
        $specificAudience->setCountryLocation($specificAudienceCountryLocation);
        $response = $gapicClient->generateInsightsFinderReport($customerId, $baselineAudience, $specificAudience);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v15.services.AudienceInsightsService/GenerateInsightsFinderReport', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getBaselineAudience();
        $this->assertProtobufEquals($baselineAudience, $actualValue);
        $actualValue = $actualRequestObject->getSpecificAudience();
        $this->assertProtobufEquals($specificAudience, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateInsightsFinderReportExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $customerId = 'customerId-1772061412';
        $baselineAudience = new BasicInsightsAudience();
        $baselineAudienceCountryLocation = [];
        $baselineAudience->setCountryLocation($baselineAudienceCountryLocation);
        $specificAudience = new BasicInsightsAudience();
        $specificAudienceCountryLocation = [];
        $specificAudience->setCountryLocation($specificAudienceCountryLocation);
        try {
            $gapicClient->generateInsightsFinderReport($customerId, $baselineAudience, $specificAudience);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateSuggestedTargetingInsightsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GenerateSuggestedTargetingInsightsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $audience = new InsightsAudience();
        $audienceCountryLocations = [];
        $audience->setCountryLocations($audienceCountryLocations);
        $response = $gapicClient->generateSuggestedTargetingInsights($customerId, $audience);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v15.services.AudienceInsightsService/GenerateSuggestedTargetingInsights', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getAudience();
        $this->assertProtobufEquals($audience, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateSuggestedTargetingInsightsExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $customerId = 'customerId-1772061412';
        $audience = new InsightsAudience();
        $audienceCountryLocations = [];
        $audience->setCountryLocations($audienceCountryLocations);
        try {
            $gapicClient->generateSuggestedTargetingInsights($customerId, $audience);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listAudienceInsightsAttributesTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new ListAudienceInsightsAttributesResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $dimensions = [];
        $queryText = 'queryText-168156604';
        $response = $gapicClient->listAudienceInsightsAttributes($customerId, $dimensions, $queryText);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v15.services.AudienceInsightsService/ListAudienceInsightsAttributes', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getDimensions();
        $this->assertProtobufEquals($dimensions, $actualValue);
        $actualValue = $actualRequestObject->getQueryText();
        $this->assertProtobufEquals($queryText, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listAudienceInsightsAttributesExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        // Mock request
        $customerId = 'customerId-1772061412';
        $dimensions = [];
        $queryText = 'queryText-168156604';
        try {
            $gapicClient->listAudienceInsightsAttributes($customerId, $dimensions, $queryText);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listInsightsEligibleDatesTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new ListInsightsEligibleDatesResponse();
        $transport->addResponse($expectedResponse);
        $response = $gapicClient->listInsightsEligibleDates();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v15.services.AudienceInsightsService/ListInsightsEligibleDates', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listInsightsEligibleDatesExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        try {
            $gapicClient->listInsightsEligibleDates();
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }
}
