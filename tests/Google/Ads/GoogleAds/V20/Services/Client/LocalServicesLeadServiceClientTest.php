<?php
/*
 * Copyright 2025 Google LLC
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

namespace Google\Ads\GoogleAds\V20\Services\Client;

use Google\Ads\GoogleAds\V20\Enums\LocalServicesLeadSurveyAnswerEnum\SurveyAnswer;
use Google\Ads\GoogleAds\V20\Services\AppendLeadConversationRequest;
use Google\Ads\GoogleAds\V20\Services\AppendLeadConversationResponse;
use Google\Ads\GoogleAds\V20\Services\Client\LocalServicesLeadServiceClient;
use Google\Ads\GoogleAds\V20\Services\ProvideLeadFeedbackRequest;
use Google\Ads\GoogleAds\V20\Services\ProvideLeadFeedbackResponse;
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
class LocalServicesLeadServiceClientTest extends GeneratedTest
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

    /** @return LocalServicesLeadServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new LocalServicesLeadServiceClient($options);
    }

    /** @test */
    public function appendLeadConversationTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new AppendLeadConversationResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $conversations = [];
        $request = (new AppendLeadConversationRequest())
            ->setCustomerId($customerId)
            ->setConversations($conversations);
        $response = $gapicClient->appendLeadConversation($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v20.services.LocalServicesLeadService/AppendLeadConversation', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getConversations();
        $this->assertProtobufEquals($conversations, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function appendLeadConversationExceptionTest()
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
        $conversations = [];
        $request = (new AppendLeadConversationRequest())
            ->setCustomerId($customerId)
            ->setConversations($conversations);
        try {
            $gapicClient->appendLeadConversation($request);
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
    public function provideLeadFeedbackTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new ProvideLeadFeedbackResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedResourceName = $gapicClient->localServicesLeadName('[CUSTOMER_ID]', '[LOCAL_SERVICES_LEAD_ID]');
        $surveyAnswer = SurveyAnswer::UNSPECIFIED;
        $request = (new ProvideLeadFeedbackRequest())
            ->setResourceName($formattedResourceName)
            ->setSurveyAnswer($surveyAnswer);
        $response = $gapicClient->provideLeadFeedback($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v20.services.LocalServicesLeadService/ProvideLeadFeedback', $actualFuncCall);
        $actualValue = $actualRequestObject->getResourceName();
        $this->assertProtobufEquals($formattedResourceName, $actualValue);
        $actualValue = $actualRequestObject->getSurveyAnswer();
        $this->assertProtobufEquals($surveyAnswer, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function provideLeadFeedbackExceptionTest()
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
        $formattedResourceName = $gapicClient->localServicesLeadName('[CUSTOMER_ID]', '[LOCAL_SERVICES_LEAD_ID]');
        $surveyAnswer = SurveyAnswer::UNSPECIFIED;
        $request = (new ProvideLeadFeedbackRequest())
            ->setResourceName($formattedResourceName)
            ->setSurveyAnswer($surveyAnswer);
        try {
            $gapicClient->provideLeadFeedback($request);
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
    public function appendLeadConversationAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new AppendLeadConversationResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $conversations = [];
        $request = (new AppendLeadConversationRequest())
            ->setCustomerId($customerId)
            ->setConversations($conversations);
        $response = $gapicClient->appendLeadConversationAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v20.services.LocalServicesLeadService/AppendLeadConversation', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getConversations();
        $this->assertProtobufEquals($conversations, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
