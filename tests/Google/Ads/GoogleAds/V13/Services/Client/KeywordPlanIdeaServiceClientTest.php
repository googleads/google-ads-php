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

namespace Google\Ads\GoogleAds\V13\Services\Client;

use Google\Ads\GoogleAds\V13\Services\Client\KeywordPlanIdeaServiceClient;
use Google\Ads\GoogleAds\V13\Services\GenerateAdGroupThemesRequest;
use Google\Ads\GoogleAds\V13\Services\GenerateAdGroupThemesResponse;
use Google\Ads\GoogleAds\V13\Services\GenerateKeywordHistoricalMetricsRequest;
use Google\Ads\GoogleAds\V13\Services\GenerateKeywordHistoricalMetricsResponse;
use Google\Ads\GoogleAds\V13\Services\GenerateKeywordIdeaResponse;
use Google\Ads\GoogleAds\V13\Services\GenerateKeywordIdeaResult;
use Google\Ads\GoogleAds\V13\Services\GenerateKeywordIdeasRequest;
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
class KeywordPlanIdeaServiceClientTest extends GeneratedTest
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

    /** @return KeywordPlanIdeaServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new KeywordPlanIdeaServiceClient($options);
    }

    /** @test */
    public function generateAdGroupThemesTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GenerateAdGroupThemesResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $keywords = [];
        $adGroups = [];
        $request = (new GenerateAdGroupThemesRequest())
            ->setCustomerId($customerId)
            ->setKeywords($keywords)
            ->setAdGroups($adGroups);
        $response = $gapicClient->generateAdGroupThemes($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v13.services.KeywordPlanIdeaService/GenerateAdGroupThemes', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getKeywords();
        $this->assertProtobufEquals($keywords, $actualValue);
        $actualValue = $actualRequestObject->getAdGroups();
        $this->assertProtobufEquals($adGroups, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateAdGroupThemesExceptionTest()
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
        $keywords = [];
        $adGroups = [];
        $request = (new GenerateAdGroupThemesRequest())
            ->setCustomerId($customerId)
            ->setKeywords($keywords)
            ->setAdGroups($adGroups);
        try {
            $gapicClient->generateAdGroupThemes($request);
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
    public function generateKeywordHistoricalMetricsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GenerateKeywordHistoricalMetricsResponse();
        $transport->addResponse($expectedResponse);
        $request = new GenerateKeywordHistoricalMetricsRequest();
        $response = $gapicClient->generateKeywordHistoricalMetrics($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v13.services.KeywordPlanIdeaService/GenerateKeywordHistoricalMetrics', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateKeywordHistoricalMetricsExceptionTest()
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
        $request = new GenerateKeywordHistoricalMetricsRequest();
        try {
            $gapicClient->generateKeywordHistoricalMetrics($request);
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
    public function generateKeywordIdeasTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $nextPageToken = '';
        $totalSize = 705419236;
        $resultsElement = new GenerateKeywordIdeaResult();
        $results = [
            $resultsElement,
        ];
        $expectedResponse = new GenerateKeywordIdeaResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setTotalSize($totalSize);
        $expectedResponse->setResults($results);
        $transport->addResponse($expectedResponse);
        $request = new GenerateKeywordIdeasRequest();
        $response = $gapicClient->generateKeywordIdeas($request);
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getResults()[0], $resources[0]);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v13.services.KeywordPlanIdeaService/GenerateKeywordIdeas', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateKeywordIdeasExceptionTest()
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
        $request = new GenerateKeywordIdeasRequest();
        try {
            $gapicClient->generateKeywordIdeas($request);
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
    public function generateAdGroupThemesAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GenerateAdGroupThemesResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $keywords = [];
        $adGroups = [];
        $request = (new GenerateAdGroupThemesRequest())
            ->setCustomerId($customerId)
            ->setKeywords($keywords)
            ->setAdGroups($adGroups);
        $response = $gapicClient->generateAdGroupThemesAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v13.services.KeywordPlanIdeaService/GenerateAdGroupThemes', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getKeywords();
        $this->assertProtobufEquals($keywords, $actualValue);
        $actualValue = $actualRequestObject->getAdGroups();
        $this->assertProtobufEquals($adGroups, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
