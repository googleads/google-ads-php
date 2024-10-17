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

use Google\Ads\GoogleAds\V18\Services\CampaignDuration;
use Google\Ads\GoogleAds\V18\Services\Client\ReachPlanServiceClient;
use Google\Ads\GoogleAds\V18\Services\GenerateReachForecastRequest;
use Google\Ads\GoogleAds\V18\Services\GenerateReachForecastResponse;
use Google\Ads\GoogleAds\V18\Services\ListPlannableLocationsRequest;
use Google\Ads\GoogleAds\V18\Services\ListPlannableLocationsResponse;
use Google\Ads\GoogleAds\V18\Services\ListPlannableProductsRequest;
use Google\Ads\GoogleAds\V18\Services\ListPlannableProductsResponse;
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
class ReachPlanServiceClientTest extends GeneratedTest
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

    /** @return ReachPlanServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new ReachPlanServiceClient($options);
    }

    /** @test */
    public function generateReachForecastTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GenerateReachForecastResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $campaignDuration = new CampaignDuration();
        $plannedProducts = [];
        $request = (new GenerateReachForecastRequest())
            ->setCustomerId($customerId)
            ->setCampaignDuration($campaignDuration)
            ->setPlannedProducts($plannedProducts);
        $response = $gapicClient->generateReachForecast($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.ReachPlanService/GenerateReachForecast', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getCampaignDuration();
        $this->assertProtobufEquals($campaignDuration, $actualValue);
        $actualValue = $actualRequestObject->getPlannedProducts();
        $this->assertProtobufEquals($plannedProducts, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateReachForecastExceptionTest()
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
        $campaignDuration = new CampaignDuration();
        $plannedProducts = [];
        $request = (new GenerateReachForecastRequest())
            ->setCustomerId($customerId)
            ->setCampaignDuration($campaignDuration)
            ->setPlannedProducts($plannedProducts);
        try {
            $gapicClient->generateReachForecast($request);
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
    public function listPlannableLocationsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new ListPlannableLocationsResponse();
        $transport->addResponse($expectedResponse);
        $request = new ListPlannableLocationsRequest();
        $response = $gapicClient->listPlannableLocations($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.ReachPlanService/ListPlannableLocations', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listPlannableLocationsExceptionTest()
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
        $request = new ListPlannableLocationsRequest();
        try {
            $gapicClient->listPlannableLocations($request);
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
    public function listPlannableProductsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new ListPlannableProductsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $plannableLocationId = 'plannableLocationId-2050234651';
        $request = (new ListPlannableProductsRequest())
            ->setPlannableLocationId($plannableLocationId);
        $response = $gapicClient->listPlannableProducts($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.ReachPlanService/ListPlannableProducts', $actualFuncCall);
        $actualValue = $actualRequestObject->getPlannableLocationId();
        $this->assertProtobufEquals($plannableLocationId, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listPlannableProductsExceptionTest()
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
        $plannableLocationId = 'plannableLocationId-2050234651';
        $request = (new ListPlannableProductsRequest())
            ->setPlannableLocationId($plannableLocationId);
        try {
            $gapicClient->listPlannableProducts($request);
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
    public function generateReachForecastAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GenerateReachForecastResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $campaignDuration = new CampaignDuration();
        $plannedProducts = [];
        $request = (new GenerateReachForecastRequest())
            ->setCustomerId($customerId)
            ->setCampaignDuration($campaignDuration)
            ->setPlannedProducts($plannedProducts);
        $response = $gapicClient->generateReachForecastAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.ReachPlanService/GenerateReachForecast', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getCampaignDuration();
        $this->assertProtobufEquals($campaignDuration, $actualValue);
        $actualValue = $actualRequestObject->getPlannedProducts();
        $this->assertProtobufEquals($plannedProducts, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
