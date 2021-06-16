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

use Google\Ads\GoogleAds\V8\Services\ChangeStatusServiceClient;
use Google\Ads\GoogleAds\V8\Resources\ChangeStatus;
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
class ChangeStatusServiceClientTest extends GeneratedTest
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
     * @return ChangeStatusServiceClient
     */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new ChangeStatusServiceClient($options);
    }

    /**
     * @test
     */
    public function getChangeStatusTest()
    {
        $transport = $this->createTransport();
        $client = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $resourceName2 = 'resourceName2625949903';
        $lastChangeDateTime = 'lastChangeDateTime-1232504456';
        $campaign = 'campaign-139919088';
        $adGroup = 'adGroup-1371635869';
        $adGroupAd = 'adGroupAd-85224833';
        $adGroupCriterion = 'adGroupCriterion1073735877';
        $campaignCriterion = 'campaignCriterion696907314';
        $feed = 'feed3138974';
        $feedItem = 'feedItem-1644093164';
        $adGroupFeed = 'adGroupFeed-296532742';
        $campaignFeed = 'campaignFeed1065863021';
        $adGroupBidModifier = 'adGroupBidModifier438322997';
        $expectedResponse = new ChangeStatus();
        $expectedResponse->setResourceName($resourceName2);
        $expectedResponse->setLastChangeDateTime($lastChangeDateTime);
        $expectedResponse->setCampaign($campaign);
        $expectedResponse->setAdGroup($adGroup);
        $expectedResponse->setAdGroupAd($adGroupAd);
        $expectedResponse->setAdGroupCriterion($adGroupCriterion);
        $expectedResponse->setCampaignCriterion($campaignCriterion);
        $expectedResponse->setFeed($feed);
        $expectedResponse->setFeedItem($feedItem);
        $expectedResponse->setAdGroupFeed($adGroupFeed);
        $expectedResponse->setCampaignFeed($campaignFeed);
        $expectedResponse->setAdGroupBidModifier($adGroupBidModifier);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedResourceName = $client->changeStatusName('[CUSTOMER_ID]', '[CHANGE_STATUS_ID]');
        $response = $client->getChangeStatus($formattedResourceName);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v8.services.ChangeStatusService/GetChangeStatus', $actualFuncCall);
        $actualValue = $actualRequestObject->getResourceName();
        $this->assertProtobufEquals($formattedResourceName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * @test
     */
    public function getChangeStatusExceptionTest()
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
        $formattedResourceName = $client->changeStatusName('[CUSTOMER_ID]', '[CHANGE_STATUS_ID]');
        try {
            $client->getChangeStatus($formattedResourceName);
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
