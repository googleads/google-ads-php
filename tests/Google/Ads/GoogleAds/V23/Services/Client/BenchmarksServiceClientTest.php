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

use Google\Ads\GoogleAds\V23\Common\LocationInfo;
use Google\Ads\GoogleAds\V23\Services\BenchmarksSource;
use Google\Ads\GoogleAds\V23\Services\Client\BenchmarksServiceClient;
use Google\Ads\GoogleAds\V23\Services\GenerateBenchmarksMetricsRequest;
use Google\Ads\GoogleAds\V23\Services\GenerateBenchmarksMetricsResponse;
use Google\Ads\GoogleAds\V23\Services\ListBenchmarksAvailableDatesRequest;
use Google\Ads\GoogleAds\V23\Services\ListBenchmarksAvailableDatesResponse;
use Google\Ads\GoogleAds\V23\Services\ListBenchmarksLocationsRequest;
use Google\Ads\GoogleAds\V23\Services\ListBenchmarksLocationsResponse;
use Google\Ads\GoogleAds\V23\Services\ListBenchmarksProductsRequest;
use Google\Ads\GoogleAds\V23\Services\ListBenchmarksProductsResponse;
use Google\Ads\GoogleAds\V23\Services\ListBenchmarksSourcesRequest;
use Google\Ads\GoogleAds\V23\Services\ListBenchmarksSourcesResponse;
use Google\Ads\GoogleAds\V23\Services\ProductFilter;
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
class BenchmarksServiceClientTest extends GeneratedTest
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

    /** @return BenchmarksServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new BenchmarksServiceClient($options);
    }

    /** @test */
    public function generateBenchmarksMetricsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GenerateBenchmarksMetricsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $location = new LocationInfo();
        $benchmarksSource = new BenchmarksSource();
        $productFilter = new ProductFilter();
        $request = (new GenerateBenchmarksMetricsRequest())
            ->setCustomerId($customerId)
            ->setLocation($location)
            ->setBenchmarksSource($benchmarksSource)
            ->setProductFilter($productFilter);
        $response = $gapicClient->generateBenchmarksMetrics($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v23.services.BenchmarksService/GenerateBenchmarksMetrics', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getLocation();
        $this->assertProtobufEquals($location, $actualValue);
        $actualValue = $actualRequestObject->getBenchmarksSource();
        $this->assertProtobufEquals($benchmarksSource, $actualValue);
        $actualValue = $actualRequestObject->getProductFilter();
        $this->assertProtobufEquals($productFilter, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function generateBenchmarksMetricsExceptionTest()
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
        $location = new LocationInfo();
        $benchmarksSource = new BenchmarksSource();
        $productFilter = new ProductFilter();
        $request = (new GenerateBenchmarksMetricsRequest())
            ->setCustomerId($customerId)
            ->setLocation($location)
            ->setBenchmarksSource($benchmarksSource)
            ->setProductFilter($productFilter);
        try {
            $gapicClient->generateBenchmarksMetrics($request);
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
    public function listBenchmarksAvailableDatesTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new ListBenchmarksAvailableDatesResponse();
        $transport->addResponse($expectedResponse);
        $request = new ListBenchmarksAvailableDatesRequest();
        $response = $gapicClient->listBenchmarksAvailableDates($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v23.services.BenchmarksService/ListBenchmarksAvailableDates', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listBenchmarksAvailableDatesExceptionTest()
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
        $request = new ListBenchmarksAvailableDatesRequest();
        try {
            $gapicClient->listBenchmarksAvailableDates($request);
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
    public function listBenchmarksLocationsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new ListBenchmarksLocationsResponse();
        $transport->addResponse($expectedResponse);
        $request = new ListBenchmarksLocationsRequest();
        $response = $gapicClient->listBenchmarksLocations($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v23.services.BenchmarksService/ListBenchmarksLocations', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listBenchmarksLocationsExceptionTest()
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
        $request = new ListBenchmarksLocationsRequest();
        try {
            $gapicClient->listBenchmarksLocations($request);
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
    public function listBenchmarksProductsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new ListBenchmarksProductsResponse();
        $transport->addResponse($expectedResponse);
        $request = new ListBenchmarksProductsRequest();
        $response = $gapicClient->listBenchmarksProducts($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v23.services.BenchmarksService/ListBenchmarksProducts', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listBenchmarksProductsExceptionTest()
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
        $request = new ListBenchmarksProductsRequest();
        try {
            $gapicClient->listBenchmarksProducts($request);
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
    public function listBenchmarksSourcesTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new ListBenchmarksSourcesResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $benchmarksSources = [];
        $request = (new ListBenchmarksSourcesRequest())
            ->setBenchmarksSources($benchmarksSources);
        $response = $gapicClient->listBenchmarksSources($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v23.services.BenchmarksService/ListBenchmarksSources', $actualFuncCall);
        $actualValue = $actualRequestObject->getBenchmarksSources();
        $this->assertProtobufEquals($benchmarksSources, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listBenchmarksSourcesExceptionTest()
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
        $benchmarksSources = [];
        $request = (new ListBenchmarksSourcesRequest())
            ->setBenchmarksSources($benchmarksSources);
        try {
            $gapicClient->listBenchmarksSources($request);
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
    public function generateBenchmarksMetricsAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new GenerateBenchmarksMetricsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $location = new LocationInfo();
        $benchmarksSource = new BenchmarksSource();
        $productFilter = new ProductFilter();
        $request = (new GenerateBenchmarksMetricsRequest())
            ->setCustomerId($customerId)
            ->setLocation($location)
            ->setBenchmarksSource($benchmarksSource)
            ->setProductFilter($productFilter);
        $response = $gapicClient->generateBenchmarksMetricsAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v23.services.BenchmarksService/GenerateBenchmarksMetrics', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getLocation();
        $this->assertProtobufEquals($location, $actualValue);
        $actualValue = $actualRequestObject->getBenchmarksSource();
        $this->assertProtobufEquals($benchmarksSource, $actualValue);
        $actualValue = $actualRequestObject->getProductFilter();
        $this->assertProtobufEquals($productFilter, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
