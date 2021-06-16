<?php
/*
 * Copyright 2021 Google LLC
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

namespace Google\Ads\GoogleAds\V8\Services;

use Google\Ads\GoogleAds\V8\Services\CustomerClientServiceClient;
use Google\Ads\GoogleAds\V8\Resources\CustomerClient;
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
class CustomerClientServiceClientTest extends GeneratedTest
{
    /**
     * @return TransportInterface
     */
    private function createTransport($deserialize = null)
    {
        return new MockTransport($deserialize);
    }

    /**
     * @return CredentialsWrapper
     */
    private function createCredentials()
    {
        return $this->getMockBuilder(CredentialsWrapper::class)->disableOriginalConstructor()->getMock();
    }

    /**
     * @return CustomerClientServiceClient
     */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new CustomerClientServiceClient($options);
    }

    /**
     * @test
     */
    public function getCustomerClientTest()
    {
        $transport = $this->createTransport();
        $client = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $resourceName2 = 'resourceName2625949903';
        $clientCustomer = 'clientCustomer-1152265774';
        $hidden = true;
        $level = 102865796;
        $timeZone = 'timeZone36848094';
        $testAccount = true;
        $manager = false;
        $descriptiveName = 'descriptiveName-2128097762';
        $currencyCode = 'currencyCode1108728155';
        $id = 3355;
        $expectedResponse = new CustomerClient();
        $expectedResponse->setResourceName($resourceName2);
        $expectedResponse->setClientCustomer($clientCustomer);
        $expectedResponse->setHidden($hidden);
        $expectedResponse->setLevel($level);
        $expectedResponse->setTimeZone($timeZone);
        $expectedResponse->setTestAccount($testAccount);
        $expectedResponse->setManager($manager);
        $expectedResponse->setDescriptiveName($descriptiveName);
        $expectedResponse->setCurrencyCode($currencyCode);
        $expectedResponse->setId($id);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedResourceName = $client->customerClientName('[CUSTOMER_ID]', '[CLIENT_CUSTOMER_ID]');
        $response = $client->getCustomerClient($formattedResourceName);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v8.services.CustomerClientService/GetCustomerClient', $actualFuncCall);
        $actualValue = $actualRequestObject->getResourceName();
        $this->assertProtobufEquals($formattedResourceName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * @test
     */
    public function getCustomerClientExceptionTest()
    {
        $transport = $this->createTransport();
        $client = $this->createClient([
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
        $formattedResourceName = $client->customerClientName('[CUSTOMER_ID]', '[CLIENT_CUSTOMER_ID]');
        try {
            $client->getCustomerClient($formattedResourceName);
            // If the $client method call did not throw, fail the test
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
