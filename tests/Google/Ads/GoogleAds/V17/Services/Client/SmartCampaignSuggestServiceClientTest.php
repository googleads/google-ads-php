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

use Google\Ads\GoogleAds\V17\Services\Client\SmartCampaignSuggestServiceClient;
use Google\Ads\GoogleAds\V17\Services\SmartCampaignSuggestionInfo;
use Google\Ads\GoogleAds\V17\Services\SuggestKeywordThemesRequest;
use Google\Ads\GoogleAds\V17\Services\SuggestKeywordThemesResponse;
use Google\Ads\GoogleAds\V17\Services\SuggestSmartCampaignAdRequest;
use Google\Ads\GoogleAds\V17\Services\SuggestSmartCampaignAdResponse;
use Google\Ads\GoogleAds\V17\Services\SuggestSmartCampaignBudgetOptionsRequest;
use Google\Ads\GoogleAds\V17\Services\SuggestSmartCampaignBudgetOptionsResponse;
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
class SmartCampaignSuggestServiceClientTest extends GeneratedTest
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

    /** @return SmartCampaignSuggestServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new SmartCampaignSuggestServiceClient($options);
    }

    /** @test */
    public function suggestKeywordThemesTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new SuggestKeywordThemesResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $suggestionInfo = new SmartCampaignSuggestionInfo();
        $request = (new SuggestKeywordThemesRequest())
            ->setCustomerId($customerId)
            ->setSuggestionInfo($suggestionInfo);
        $response = $gapicClient->suggestKeywordThemes($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v17.services.SmartCampaignSuggestService/SuggestKeywordThemes', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getSuggestionInfo();
        $this->assertProtobufEquals($suggestionInfo, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function suggestKeywordThemesExceptionTest()
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
        $suggestionInfo = new SmartCampaignSuggestionInfo();
        $request = (new SuggestKeywordThemesRequest())
            ->setCustomerId($customerId)
            ->setSuggestionInfo($suggestionInfo);
        try {
            $gapicClient->suggestKeywordThemes($request);
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
    public function suggestSmartCampaignAdTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new SuggestSmartCampaignAdResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $suggestionInfo = new SmartCampaignSuggestionInfo();
        $request = (new SuggestSmartCampaignAdRequest())
            ->setCustomerId($customerId)
            ->setSuggestionInfo($suggestionInfo);
        $response = $gapicClient->suggestSmartCampaignAd($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v17.services.SmartCampaignSuggestService/SuggestSmartCampaignAd', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getSuggestionInfo();
        $this->assertProtobufEquals($suggestionInfo, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function suggestSmartCampaignAdExceptionTest()
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
        $suggestionInfo = new SmartCampaignSuggestionInfo();
        $request = (new SuggestSmartCampaignAdRequest())
            ->setCustomerId($customerId)
            ->setSuggestionInfo($suggestionInfo);
        try {
            $gapicClient->suggestSmartCampaignAd($request);
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
    public function suggestSmartCampaignBudgetOptionsTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new SuggestSmartCampaignBudgetOptionsResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $formattedCampaign = $gapicClient->campaignName('[CUSTOMER_ID]', '[CAMPAIGN_ID]');
        $request = (new SuggestSmartCampaignBudgetOptionsRequest())
            ->setCustomerId($customerId)
            ->setCampaign($formattedCampaign);
        $response = $gapicClient->suggestSmartCampaignBudgetOptions($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v17.services.SmartCampaignSuggestService/SuggestSmartCampaignBudgetOptions', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getCampaign();
        $this->assertProtobufEquals($formattedCampaign, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function suggestSmartCampaignBudgetOptionsExceptionTest()
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
        $formattedCampaign = $gapicClient->campaignName('[CUSTOMER_ID]', '[CAMPAIGN_ID]');
        $request = (new SuggestSmartCampaignBudgetOptionsRequest())
            ->setCustomerId($customerId)
            ->setCampaign($formattedCampaign);
        try {
            $gapicClient->suggestSmartCampaignBudgetOptions($request);
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
    public function suggestKeywordThemesAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new SuggestKeywordThemesResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $suggestionInfo = new SmartCampaignSuggestionInfo();
        $request = (new SuggestKeywordThemesRequest())
            ->setCustomerId($customerId)
            ->setSuggestionInfo($suggestionInfo);
        $response = $gapicClient->suggestKeywordThemesAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v17.services.SmartCampaignSuggestService/SuggestKeywordThemes', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getSuggestionInfo();
        $this->assertProtobufEquals($suggestionInfo, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
