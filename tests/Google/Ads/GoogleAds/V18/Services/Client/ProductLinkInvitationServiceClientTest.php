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

use Google\Ads\GoogleAds\V18\Enums\ProductLinkInvitationStatusEnum\ProductLinkInvitationStatus;
use Google\Ads\GoogleAds\V18\Resources\ProductLinkInvitation;
use Google\Ads\GoogleAds\V18\Services\Client\ProductLinkInvitationServiceClient;
use Google\Ads\GoogleAds\V18\Services\CreateProductLinkInvitationRequest;
use Google\Ads\GoogleAds\V18\Services\CreateProductLinkInvitationResponse;
use Google\Ads\GoogleAds\V18\Services\RemoveProductLinkInvitationRequest;
use Google\Ads\GoogleAds\V18\Services\RemoveProductLinkInvitationResponse;
use Google\Ads\GoogleAds\V18\Services\UpdateProductLinkInvitationRequest;
use Google\Ads\GoogleAds\V18\Services\UpdateProductLinkInvitationResponse;
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
class ProductLinkInvitationServiceClientTest extends GeneratedTest
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

    /** @return ProductLinkInvitationServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new ProductLinkInvitationServiceClient($options);
    }

    /** @test */
    public function createProductLinkInvitationTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $resourceName = 'resourceName979421212';
        $expectedResponse = new CreateProductLinkInvitationResponse();
        $expectedResponse->setResourceName($resourceName);
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $productLinkInvitation = new ProductLinkInvitation();
        $request = (new CreateProductLinkInvitationRequest())
            ->setCustomerId($customerId)
            ->setProductLinkInvitation($productLinkInvitation);
        $response = $gapicClient->createProductLinkInvitation($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.ProductLinkInvitationService/CreateProductLinkInvitation', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getProductLinkInvitation();
        $this->assertProtobufEquals($productLinkInvitation, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function createProductLinkInvitationExceptionTest()
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
        $productLinkInvitation = new ProductLinkInvitation();
        $request = (new CreateProductLinkInvitationRequest())
            ->setCustomerId($customerId)
            ->setProductLinkInvitation($productLinkInvitation);
        try {
            $gapicClient->createProductLinkInvitation($request);
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
    public function removeProductLinkInvitationTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $resourceName2 = 'resourceName2625949903';
        $expectedResponse = new RemoveProductLinkInvitationResponse();
        $expectedResponse->setResourceName($resourceName2);
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $formattedResourceName = $gapicClient->productLinkInvitationName('[CUSTOMER_ID]', '[CUSTOMER_INVITATION_ID]');
        $request = (new RemoveProductLinkInvitationRequest())
            ->setCustomerId($customerId)
            ->setResourceName($formattedResourceName);
        $response = $gapicClient->removeProductLinkInvitation($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.ProductLinkInvitationService/RemoveProductLinkInvitation', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getResourceName();
        $this->assertProtobufEquals($formattedResourceName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function removeProductLinkInvitationExceptionTest()
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
        $formattedResourceName = $gapicClient->productLinkInvitationName('[CUSTOMER_ID]', '[CUSTOMER_INVITATION_ID]');
        $request = (new RemoveProductLinkInvitationRequest())
            ->setCustomerId($customerId)
            ->setResourceName($formattedResourceName);
        try {
            $gapicClient->removeProductLinkInvitation($request);
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
    public function updateProductLinkInvitationTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $resourceName2 = 'resourceName2625949903';
        $expectedResponse = new UpdateProductLinkInvitationResponse();
        $expectedResponse->setResourceName($resourceName2);
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $productLinkInvitationStatus = ProductLinkInvitationStatus::UNSPECIFIED;
        $formattedResourceName = $gapicClient->productLinkInvitationName('[CUSTOMER_ID]', '[CUSTOMER_INVITATION_ID]');
        $request = (new UpdateProductLinkInvitationRequest())
            ->setCustomerId($customerId)
            ->setProductLinkInvitationStatus($productLinkInvitationStatus)
            ->setResourceName($formattedResourceName);
        $response = $gapicClient->updateProductLinkInvitation($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.ProductLinkInvitationService/UpdateProductLinkInvitation', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getProductLinkInvitationStatus();
        $this->assertProtobufEquals($productLinkInvitationStatus, $actualValue);
        $actualValue = $actualRequestObject->getResourceName();
        $this->assertProtobufEquals($formattedResourceName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function updateProductLinkInvitationExceptionTest()
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
        $productLinkInvitationStatus = ProductLinkInvitationStatus::UNSPECIFIED;
        $formattedResourceName = $gapicClient->productLinkInvitationName('[CUSTOMER_ID]', '[CUSTOMER_INVITATION_ID]');
        $request = (new UpdateProductLinkInvitationRequest())
            ->setCustomerId($customerId)
            ->setProductLinkInvitationStatus($productLinkInvitationStatus)
            ->setResourceName($formattedResourceName);
        try {
            $gapicClient->updateProductLinkInvitation($request);
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
    public function createProductLinkInvitationAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $resourceName = 'resourceName979421212';
        $expectedResponse = new CreateProductLinkInvitationResponse();
        $expectedResponse->setResourceName($resourceName);
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $productLinkInvitation = new ProductLinkInvitation();
        $request = (new CreateProductLinkInvitationRequest())
            ->setCustomerId($customerId)
            ->setProductLinkInvitation($productLinkInvitation);
        $response = $gapicClient->createProductLinkInvitationAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v18.services.ProductLinkInvitationService/CreateProductLinkInvitation', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getProductLinkInvitation();
        $this->assertProtobufEquals($productLinkInvitation, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
