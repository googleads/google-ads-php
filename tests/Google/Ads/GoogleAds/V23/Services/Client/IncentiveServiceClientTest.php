<?php
/*
 * Copyright 2026 Google LLC
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

namespace Google\Ads\GoogleAds\V23\Services\Client;

use Google\Ads\GoogleAds\V23\Services\ApplyIncentiveRequest;
use Google\Ads\GoogleAds\V23\Services\ApplyIncentiveResponse;
use Google\Ads\GoogleAds\V23\Services\Client\IncentiveServiceClient;
use Google\Ads\GoogleAds\V23\Services\FetchIncentiveRequest;
use Google\Ads\GoogleAds\V23\Services\FetchIncentiveResponse;
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
class IncentiveServiceClientTest extends GeneratedTest
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

    /** @return IncentiveServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new IncentiveServiceClient($options);
    }

    /** @test */
    public function applyIncentiveTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $couponCode = 'couponCode1728427622';
        $creationTime = 'creationTime1932333101';
        $expectedResponse = new ApplyIncentiveResponse();
        $expectedResponse->setCouponCode($couponCode);
        $expectedResponse->setCreationTime($creationTime);
        $transport->addResponse($expectedResponse);
        // Mock request
        $countryCode = 'countryCode1481071862';
        $request = (new ApplyIncentiveRequest())
            ->setCountryCode($countryCode);
        $response = $gapicClient->applyIncentive($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v23.services.IncentiveService/ApplyIncentive', $actualFuncCall);
        $actualValue = $actualRequestObject->getCountryCode();
        $this->assertProtobufEquals($countryCode, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function applyIncentiveExceptionTest()
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
        $countryCode = 'countryCode1481071862';
        $request = (new ApplyIncentiveRequest())
            ->setCountryCode($countryCode);
        try {
            $gapicClient->applyIncentive($request);
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
    public function fetchIncentiveTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new FetchIncentiveResponse();
        $transport->addResponse($expectedResponse);
        $request = new FetchIncentiveRequest();
        $response = $gapicClient->fetchIncentive($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v23.services.IncentiveService/FetchIncentive', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function fetchIncentiveExceptionTest()
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
        $request = new FetchIncentiveRequest();
        try {
            $gapicClient->fetchIncentive($request);
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
    public function applyIncentiveAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $couponCode = 'couponCode1728427622';
        $creationTime = 'creationTime1932333101';
        $expectedResponse = new ApplyIncentiveResponse();
        $expectedResponse->setCouponCode($couponCode);
        $expectedResponse->setCreationTime($creationTime);
        $transport->addResponse($expectedResponse);
        // Mock request
        $countryCode = 'countryCode1481071862';
        $request = (new ApplyIncentiveRequest())
            ->setCountryCode($countryCode);
        $response = $gapicClient->applyIncentiveAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v23.services.IncentiveService/ApplyIncentive', $actualFuncCall);
        $actualValue = $actualRequestObject->getCountryCode();
        $this->assertProtobufEquals($countryCode, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
