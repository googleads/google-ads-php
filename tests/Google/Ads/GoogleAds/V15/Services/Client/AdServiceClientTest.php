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

namespace Google\Ads\GoogleAds\V15\Services\Client;

use Google\Ads\GoogleAds\V15\Resources\Ad;
use Google\Ads\GoogleAds\V15\Services\Client\AdServiceClient;
use Google\Ads\GoogleAds\V15\Services\GetAdRequest;
use Google\Ads\GoogleAds\V15\Services\MutateAdsRequest;
use Google\Ads\GoogleAds\V15\Services\MutateAdsResponse;
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
class AdServiceClientTest extends GeneratedTest
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

    /** @return AdServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new AdServiceClient($options);
    }

    /** @test */
    public function getAdTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $resourceName2 = 'resourceName2625949903';
        $id = 3355;
        $trackingUrlTemplate = 'trackingUrlTemplate-1611329070';
        $finalUrlSuffix = 'finalUrlSuffix-1825164662';
        $displayUrl = 'displayUrl1714674802';
        $addedByGoogleAds = false;
        $name = 'name3373707';
        $expectedResponse = new Ad();
        $expectedResponse->setResourceName($resourceName2);
        $expectedResponse->setId($id);
        $expectedResponse->setTrackingUrlTemplate($trackingUrlTemplate);
        $expectedResponse->setFinalUrlSuffix($finalUrlSuffix);
        $expectedResponse->setDisplayUrl($displayUrl);
        $expectedResponse->setAddedByGoogleAds($addedByGoogleAds);
        $expectedResponse->setName($name);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedResourceName = $gapicClient->adName('[CUSTOMER_ID]', '[AD_ID]');
        $request = (new GetAdRequest())
            ->setResourceName($formattedResourceName);
        $response = $gapicClient->getAd($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v15.services.AdService/GetAd', $actualFuncCall);
        $actualValue = $actualRequestObject->getResourceName();
        $this->assertProtobufEquals($formattedResourceName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function getAdExceptionTest()
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
        $formattedResourceName = $gapicClient->adName('[CUSTOMER_ID]', '[AD_ID]');
        $request = (new GetAdRequest())
            ->setResourceName($formattedResourceName);
        try {
            $gapicClient->getAd($request);
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
    public function mutateAdsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new MutateAdsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $operations = [];
        $request = (new MutateAdsRequest())
            ->setCustomerId($customerId)
            ->setOperations($operations);
        $response = $gapicClient->mutateAds($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v15.services.AdService/MutateAds', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getOperations();
        $this->assertProtobufEquals($operations, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function mutateAdsExceptionTest()
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
        $request = (new MutateAdsRequest())
            ->setCustomerId($customerId)
            ->setOperations($operations);
        try {
            $gapicClient->mutateAds($request);
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
    public function getAdAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $resourceName2 = 'resourceName2625949903';
        $id = 3355;
        $trackingUrlTemplate = 'trackingUrlTemplate-1611329070';
        $finalUrlSuffix = 'finalUrlSuffix-1825164662';
        $displayUrl = 'displayUrl1714674802';
        $addedByGoogleAds = false;
        $name = 'name3373707';
        $expectedResponse = new Ad();
        $expectedResponse->setResourceName($resourceName2);
        $expectedResponse->setId($id);
        $expectedResponse->setTrackingUrlTemplate($trackingUrlTemplate);
        $expectedResponse->setFinalUrlSuffix($finalUrlSuffix);
        $expectedResponse->setDisplayUrl($displayUrl);
        $expectedResponse->setAddedByGoogleAds($addedByGoogleAds);
        $expectedResponse->setName($name);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedResourceName = $gapicClient->adName('[CUSTOMER_ID]', '[AD_ID]');
        $request = (new GetAdRequest())
            ->setResourceName($formattedResourceName);
        $response = $gapicClient->getAdAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v15.services.AdService/GetAd', $actualFuncCall);
        $actualValue = $actualRequestObject->getResourceName();
        $this->assertProtobufEquals($formattedResourceName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
