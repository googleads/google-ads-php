<?php
/*
 * Copyright 2024 Google LLC
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

namespace Google\Ads\GoogleAds\V18\Services\Client;

use Google\Ads\GoogleAds\V18\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V18\Services\ApplyRecommendationRequest;
use Google\Ads\GoogleAds\V18\Services\ApplyRecommendationResponse;
use Google\Ads\GoogleAds\V18\Services\Client\RecommendationServiceClient;
use Google\Ads\GoogleAds\V18\Services\DismissRecommendationRequest;
use Google\Ads\GoogleAds\V18\Services\DismissRecommendationResponse;
use Google\Ads\GoogleAds\V18\Services\GenerateRecommendationsRequest;
use Google\Ads\GoogleAds\V18\Services\GenerateRecommendationsResponse;
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
class RecommendationServiceClientTest extends GeneratedTest
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

    /** @return RecommendationServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new RecommendationServiceClient($options);
    }

    /** @test */
    public function applyRecommendationTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new ApplyRecommendationResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $operations = [];
        $request = (new ApplyRecommendationRequest())
            ->setCustomerId($customerId)
            ->setOperations($operations);
        $response = $gapicClient->applyRecommendation($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.RecommendationService/ApplyRecommendation', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getOperations();
        $this->assertProtobufEquals($operations, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function applyRecommendationExceptionTest()
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
        $operations = [];
        $request = (new ApplyRecommendationRequest())
            ->setCustomerId($customerId)
            ->setOperations($operations);
        try {
            $gapicClient->applyRecommendation($request);
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
    public function dismissRecommendationTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new DismissRecommendationResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $operations = [];
        $request = (new DismissRecommendationRequest())
            ->setCustomerId($customerId)
            ->setOperations($operations);
        $response = $gapicClient->dismissRecommendation($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.RecommendationService/DismissRecommendation', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getOperations();
        $this->assertProtobufEquals($operations, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function dismissRecommendationExceptionTest()
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
        $operations = [];
        $request = (new DismissRecommendationRequest())
            ->setCustomerId($customerId)
            ->setOperations($operations);
        try {
            $gapicClient->dismissRecommendation($request);
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
    public function generateRecommendationsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GenerateRecommendationsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $recommendationTypes = [];
        $advertisingChannelType = AdvertisingChannelType::UNSPECIFIED;
        $request = (new GenerateRecommendationsRequest())
            ->setCustomerId($customerId)
            ->setRecommendationTypes($recommendationTypes)
            ->setAdvertisingChannelType($advertisingChannelType);
        $response = $gapicClient->generateRecommendations($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.RecommendationService/GenerateRecommendations', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getRecommendationTypes();
        $this->assertProtobufEquals($recommendationTypes, $actualValue);
        $actualValue = $actualRequestObject->getAdvertisingChannelType();
        $this->assertProtobufEquals($advertisingChannelType, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateRecommendationsExceptionTest()
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
        $recommendationTypes = [];
        $advertisingChannelType = AdvertisingChannelType::UNSPECIFIED;
        $request = (new GenerateRecommendationsRequest())
            ->setCustomerId($customerId)
            ->setRecommendationTypes($recommendationTypes)
            ->setAdvertisingChannelType($advertisingChannelType);
        try {
            $gapicClient->generateRecommendations($request);
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
    public function applyRecommendationAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new ApplyRecommendationResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $operations = [];
        $request = (new ApplyRecommendationRequest())
            ->setCustomerId($customerId)
            ->setOperations($operations);
        $response = $gapicClient->applyRecommendationAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.RecommendationService/ApplyRecommendation', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getOperations();
        $this->assertProtobufEquals($operations, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
