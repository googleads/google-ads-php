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

use Google\Ads\GoogleAds\V18\Resources\GoogleAdsField;
use Google\Ads\GoogleAds\V18\Services\Client\GoogleAdsFieldServiceClient;
use Google\Ads\GoogleAds\V18\Services\GetGoogleAdsFieldRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsFieldsRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsFieldsResponse;
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
class GoogleAdsFieldServiceClientTest extends GeneratedTest
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

    /** @return GoogleAdsFieldServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new GoogleAdsFieldServiceClient($options);
    }

    /** @test */
    public function getGoogleAdsFieldTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $resourceName2 = 'resourceName2625949903';
        $name = 'name3373707';
        $selectable = true;
        $filterable = true;
        $sortable = true;
        $typeUrl = 'typeUrl-675981590';
        $isRepeated = false;
        $expectedResponse = new GoogleAdsField();
        $expectedResponse->setResourceName($resourceName2);
        $expectedResponse->setName($name);
        $expectedResponse->setSelectable($selectable);
        $expectedResponse->setFilterable($filterable);
        $expectedResponse->setSortable($sortable);
        $expectedResponse->setTypeUrl($typeUrl);
        $expectedResponse->setIsRepeated($isRepeated);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedResourceName = $gapicClient->googleAdsFieldName('[GOOGLE_ADS_FIELD]');
        $request = (new GetGoogleAdsFieldRequest())
            ->setResourceName($formattedResourceName);
        $response = $gapicClient->getGoogleAdsField($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.GoogleAdsFieldService/GetGoogleAdsField', $actualFuncCall);
        $actualValue = $actualRequestObject->getResourceName();
        $this->assertProtobufEquals($formattedResourceName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getGoogleAdsFieldExceptionTest()
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
        $formattedResourceName = $gapicClient->googleAdsFieldName('[GOOGLE_ADS_FIELD]');
        $request = (new GetGoogleAdsFieldRequest())
            ->setResourceName($formattedResourceName);
        try {
            $gapicClient->getGoogleAdsField($request);
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
    public function searchGoogleAdsFieldsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $nextPageToken = '';
        $totalResultsCount = 43694645;
        $resultsElement = new GoogleAdsField();
        $results = [
            $resultsElement,
        ];
        $expectedResponse = new SearchGoogleAdsFieldsResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setTotalResultsCount($totalResultsCount);
        $expectedResponse->setResults($results);
        $transport->addResponse($expectedResponse);
        // Mock request
        $query = 'query107944136';
        $request = (new SearchGoogleAdsFieldsRequest())
            ->setQuery($query);
        $response = $gapicClient->searchGoogleAdsFields($request);
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getResults()[0], $resources[0]);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.GoogleAdsFieldService/SearchGoogleAdsFields', $actualFuncCall);
        $actualValue = $actualRequestObject->getQuery();
        $this->assertProtobufEquals($query, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function searchGoogleAdsFieldsExceptionTest()
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
        $query = 'query107944136';
        $request = (new SearchGoogleAdsFieldsRequest())
            ->setQuery($query);
        try {
            $gapicClient->searchGoogleAdsFields($request);
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
    public function getGoogleAdsFieldAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $resourceName2 = 'resourceName2625949903';
        $name = 'name3373707';
        $selectable = true;
        $filterable = true;
        $sortable = true;
        $typeUrl = 'typeUrl-675981590';
        $isRepeated = false;
        $expectedResponse = new GoogleAdsField();
        $expectedResponse->setResourceName($resourceName2);
        $expectedResponse->setName($name);
        $expectedResponse->setSelectable($selectable);
        $expectedResponse->setFilterable($filterable);
        $expectedResponse->setSortable($sortable);
        $expectedResponse->setTypeUrl($typeUrl);
        $expectedResponse->setIsRepeated($isRepeated);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedResourceName = $gapicClient->googleAdsFieldName('[GOOGLE_ADS_FIELD]');
        $request = (new GetGoogleAdsFieldRequest())
            ->setResourceName($formattedResourceName);
        $response = $gapicClient->getGoogleAdsFieldAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.GoogleAdsFieldService/GetGoogleAdsField', $actualFuncCall);
        $actualValue = $actualRequestObject->getResourceName();
        $this->assertProtobufEquals($formattedResourceName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
