<?php
/*
 * Copyright 2025 Google LLC
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

namespace Google\Ads\GoogleAds\V19\Services\Client;

use Google\Ads\GoogleAds\V19\Common\LocationInfo;
use Google\Ads\GoogleAds\V19\Services\Client\ContentCreatorInsightsServiceClient;
use Google\Ads\GoogleAds\V19\Services\GenerateCreatorInsightsRequest;
use Google\Ads\GoogleAds\V19\Services\GenerateCreatorInsightsResponse;
use Google\Ads\GoogleAds\V19\Services\GenerateTrendingInsightsRequest;
use Google\Ads\GoogleAds\V19\Services\GenerateTrendingInsightsResponse;
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
class ContentCreatorInsightsServiceClientTest extends GeneratedTest
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

    /** @return ContentCreatorInsightsServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new ContentCreatorInsightsServiceClient($options);
    }

    /** @test */
    public function generateCreatorInsightsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GenerateCreatorInsightsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $customerInsightsGroup = 'customerInsightsGroup-244942948';
        $countryLocations = [];
        $request = (new GenerateCreatorInsightsRequest())
            ->setCustomerId($customerId)
            ->setCustomerInsightsGroup($customerInsightsGroup)
            ->setCountryLocations($countryLocations);
        $response = $gapicClient->generateCreatorInsights($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v19.services.ContentCreatorInsightsService/GenerateCreatorInsights', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getCustomerInsightsGroup();
        $this->assertProtobufEquals($customerInsightsGroup, $actualValue);
        $actualValue = $actualRequestObject->getCountryLocations();
        $this->assertProtobufEquals($countryLocations, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateCreatorInsightsExceptionTest()
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
        $customerInsightsGroup = 'customerInsightsGroup-244942948';
        $countryLocations = [];
        $request = (new GenerateCreatorInsightsRequest())
            ->setCustomerId($customerId)
            ->setCustomerInsightsGroup($customerInsightsGroup)
            ->setCountryLocations($countryLocations);
        try {
            $gapicClient->generateCreatorInsights($request);
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
    public function generateTrendingInsightsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GenerateTrendingInsightsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $customerInsightsGroup = 'customerInsightsGroup-244942948';
        $countryLocation = new LocationInfo();
        $request = (new GenerateTrendingInsightsRequest())
            ->setCustomerId($customerId)
            ->setCustomerInsightsGroup($customerInsightsGroup)
            ->setCountryLocation($countryLocation);
        $response = $gapicClient->generateTrendingInsights($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v19.services.ContentCreatorInsightsService/GenerateTrendingInsights', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getCustomerInsightsGroup();
        $this->assertProtobufEquals($customerInsightsGroup, $actualValue);
        $actualValue = $actualRequestObject->getCountryLocation();
        $this->assertProtobufEquals($countryLocation, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateTrendingInsightsExceptionTest()
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
        $customerInsightsGroup = 'customerInsightsGroup-244942948';
        $countryLocation = new LocationInfo();
        $request = (new GenerateTrendingInsightsRequest())
            ->setCustomerId($customerId)
            ->setCustomerInsightsGroup($customerInsightsGroup)
            ->setCountryLocation($countryLocation);
        try {
            $gapicClient->generateTrendingInsights($request);
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
    public function generateCreatorInsightsAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GenerateCreatorInsightsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $customerInsightsGroup = 'customerInsightsGroup-244942948';
        $countryLocations = [];
        $request = (new GenerateCreatorInsightsRequest())
            ->setCustomerId($customerId)
            ->setCustomerInsightsGroup($customerInsightsGroup)
            ->setCountryLocations($countryLocations);
        $response = $gapicClient->generateCreatorInsightsAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v19.services.ContentCreatorInsightsService/GenerateCreatorInsights', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getCustomerInsightsGroup();
        $this->assertProtobufEquals($customerInsightsGroup, $actualValue);
        $actualValue = $actualRequestObject->getCountryLocations();
        $this->assertProtobufEquals($countryLocations, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
