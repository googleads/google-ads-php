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

use Google\Ads\GoogleAds\V8\Services\AdGroupCriterionServiceClient;
use Google\Ads\GoogleAds\V8\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V8\Services\MutateAdGroupCriteriaResponse;

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
class AdGroupCriterionServiceClientTest extends GeneratedTest
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
     * @return AdGroupCriterionServiceClient
     */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new AdGroupCriterionServiceClient($options);
    }

    /**
     * @test
     */
    public function getAdGroupCriterionTest()
    {
        $transport = $this->createTransport();
        $client = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $resourceName2 = 'resourceName2625949903';
        $criterionId = 326773895;
        $displayName = 'displayName1615086568';
        $adGroup = 'adGroup-1371635869';
        $negative = false;
        $bidModifier = 1.36236335E8;
        $cpcBidMicros = 909381114;
        $cpmBidMicros = 2094758992;
        $cpvBidMicros = 933014521;
        $percentCpcBidMicros = 2098488628;
        $effectiveCpcBidMicros = 1373966446;
        $effectiveCpmBidMicros = 83139256;
        $effectiveCpvBidMicros = 1078605215;
        $effectivePercentCpcBidMicros = 584306996;
        $finalUrlSuffix = 'finalUrlSuffix-1825164662';
        $trackingUrlTemplate = 'trackingUrlTemplate-1611329070';
        $expectedResponse = new AdGroupCriterion();
        $expectedResponse->setResourceName($resourceName2);
        $expectedResponse->setCriterionId($criterionId);
        $expectedResponse->setDisplayName($displayName);
        $expectedResponse->setAdGroup($adGroup);
        $expectedResponse->setNegative($negative);
        $expectedResponse->setBidModifier($bidModifier);
        $expectedResponse->setCpcBidMicros($cpcBidMicros);
        $expectedResponse->setCpmBidMicros($cpmBidMicros);
        $expectedResponse->setCpvBidMicros($cpvBidMicros);
        $expectedResponse->setPercentCpcBidMicros($percentCpcBidMicros);
        $expectedResponse->setEffectiveCpcBidMicros($effectiveCpcBidMicros);
        $expectedResponse->setEffectiveCpmBidMicros($effectiveCpmBidMicros);
        $expectedResponse->setEffectiveCpvBidMicros($effectiveCpvBidMicros);
        $expectedResponse->setEffectivePercentCpcBidMicros($effectivePercentCpcBidMicros);
        $expectedResponse->setFinalUrlSuffix($finalUrlSuffix);
        $expectedResponse->setTrackingUrlTemplate($trackingUrlTemplate);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedResourceName = $client->adGroupCriterionName('[CUSTOMER_ID]', '[AD_GROUP_ID]', '[CRITERION_ID]');
        $response = $client->getAdGroupCriterion($formattedResourceName);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v8.services.AdGroupCriterionService/GetAdGroupCriterion', $actualFuncCall);
        $actualValue = $actualRequestObject->getResourceName();
        $this->assertProtobufEquals($formattedResourceName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * @test
     */
    public function getAdGroupCriterionExceptionTest()
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
        $formattedResourceName = $client->adGroupCriterionName('[CUSTOMER_ID]', '[AD_GROUP_ID]', '[CRITERION_ID]');
        try {
            $client->getAdGroupCriterion($formattedResourceName);
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

    /**
     * @test
     */
    public function mutateAdGroupCriteriaTest()
    {
        $transport = $this->createTransport();
        $client = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new MutateAdGroupCriteriaResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $operations = [];
        $response = $client->mutateAdGroupCriteria($customerId, $operations);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v8.services.AdGroupCriterionService/MutateAdGroupCriteria', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getOperations();
        $this->assertProtobufEquals($operations, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * @test
     */
    public function mutateAdGroupCriteriaExceptionTest()
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
        $customerId = 'customerId-1772061412';
        $operations = [];
        try {
            $client->mutateAdGroupCriteria($customerId, $operations);
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
