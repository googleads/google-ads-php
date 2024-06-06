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

namespace Google\Ads\GoogleAds\V17\Services\Client;

use Google\Ads\GoogleAds\V17\Services\Client\GoogleAdsServiceClient;
use Google\Ads\GoogleAds\V17\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V17\Services\MutateGoogleAdsRequest;
use Google\Ads\GoogleAds\V17\Services\MutateGoogleAdsResponse;
use Google\Ads\GoogleAds\V17\Services\SearchGoogleAdsRequest;
use Google\Ads\GoogleAds\V17\Services\SearchGoogleAdsResponse;
use Google\Ads\GoogleAds\V17\Services\SearchGoogleAdsStreamRequest;
use Google\Ads\GoogleAds\V17\Services\SearchGoogleAdsStreamResponse;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\ServerStream;
use Google\ApiCore\Testing\GeneratedTest;
use Google\ApiCore\Testing\MockTransport;
use Google\Rpc\Code;
use stdClass;

/**
 * @group services
 *
 * @group gapic
 */
class GoogleAdsServiceClientTest extends GeneratedTest
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

    /** @return GoogleAdsServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new GoogleAdsServiceClient($options);
    }

    /** @test */
    public function mutateTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new MutateGoogleAdsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $mutateOperations = [];
        $request = (new MutateGoogleAdsRequest())
            ->setCustomerId($customerId)
            ->setMutateOperations($mutateOperations);
        $response = $gapicClient->mutate($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v17.services.GoogleAdsService/Mutate', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getMutateOperations();
        $this->assertProtobufEquals($mutateOperations, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function mutateExceptionTest()
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
        $mutateOperations = [];
        $request = (new MutateGoogleAdsRequest())
            ->setCustomerId($customerId)
            ->setMutateOperations($mutateOperations);
        try {
            $gapicClient->mutate($request);
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
    public function searchTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $nextPageToken = '';
        $totalResultsCount = 43694645;
        $queryResourceConsumption = 1151647743;
        $resultsElement = new GoogleAdsRow();
        $results = [
            $resultsElement,
        ];
        $expectedResponse = new SearchGoogleAdsResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setTotalResultsCount($totalResultsCount);
        $expectedResponse->setQueryResourceConsumption($queryResourceConsumption);
        $expectedResponse->setResults($results);
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $query = 'query107944136';
        $request = (new SearchGoogleAdsRequest())
            ->setCustomerId($customerId)
            ->setQuery($query);
        $response = $gapicClient->search($request);
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getResults()[0], $resources[0]);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v17.services.GoogleAdsService/Search', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getQuery();
        $this->assertProtobufEquals($query, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function searchExceptionTest()
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
        $query = 'query107944136';
        $request = (new SearchGoogleAdsRequest())
            ->setCustomerId($customerId)
            ->setQuery($query);
        try {
            $gapicClient->search($request);
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
    public function searchStreamTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $requestId = 'requestId37109963';
        $queryResourceConsumption = 1151647743;
        $expectedResponse = new SearchGoogleAdsStreamResponse();
        $expectedResponse->setRequestId($requestId);
        $expectedResponse->setQueryResourceConsumption($queryResourceConsumption);
        $transport->addResponse($expectedResponse);
        $requestId2 = 'requestId21302939070';
        $queryResourceConsumption2 = 1368084340;
        $expectedResponse2 = new SearchGoogleAdsStreamResponse();
        $expectedResponse2->setRequestId($requestId2);
        $expectedResponse2->setQueryResourceConsumption($queryResourceConsumption2);
        $transport->addResponse($expectedResponse2);
        $requestId3 = 'requestId31302939071';
        $queryResourceConsumption3 = 1368084341;
        $expectedResponse3 = new SearchGoogleAdsStreamResponse();
        $expectedResponse3->setRequestId($requestId3);
        $expectedResponse3->setQueryResourceConsumption($queryResourceConsumption3);
        $transport->addResponse($expectedResponse3);
        // Mock request
        $customerId = 'customerId-1772061412';
        $query = 'query107944136';
        $request = (new SearchGoogleAdsStreamRequest())
            ->setCustomerId($customerId)
            ->setQuery($query);
        $serverStream = $gapicClient->searchStream($request);
        $this->assertInstanceOf(ServerStream::class, $serverStream);
        $responses = iterator_to_array($serverStream->readAll());
        $expectedResponses = [];
        $expectedResponses[] = $expectedResponse;
        $expectedResponses[] = $expectedResponse2;
        $expectedResponses[] = $expectedResponse3;
        $this->assertEquals($expectedResponses, $responses);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v17.services.GoogleAdsService/SearchStream', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getQuery();
        $this->assertProtobufEquals($query, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function searchStreamExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->setStreamingStatus($status);
        $this->assertTrue($transport->isExhausted());
        // Mock request
        $customerId = 'customerId-1772061412';
        $query = 'query107944136';
        $request = (new SearchGoogleAdsStreamRequest())
            ->setCustomerId($customerId)
            ->setQuery($query);
        $serverStream = $gapicClient->searchStream($request);
        $results = $serverStream->readAll();
        try {
            iterator_to_array($results);
            // If the close stream method call did not throw, fail the test
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
    public function mutateAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new MutateGoogleAdsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $mutateOperations = [];
        $request = (new MutateGoogleAdsRequest())
            ->setCustomerId($customerId)
            ->setMutateOperations($mutateOperations);
        $response = $gapicClient->mutateAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v17.services.GoogleAdsService/Mutate', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getMutateOperations();
        $this->assertProtobufEquals($mutateOperations, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
