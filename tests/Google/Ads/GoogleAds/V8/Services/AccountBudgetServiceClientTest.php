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

use Google\Ads\GoogleAds\V8\Services\AccountBudgetServiceClient;
use Google\Ads\GoogleAds\V8\Resources\AccountBudget;
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
class AccountBudgetServiceClientTest extends GeneratedTest
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
     * @return AccountBudgetServiceClient
     */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new AccountBudgetServiceClient($options);
    }

    /**
     * @test
     */
    public function getAccountBudgetTest()
    {
        $transport = $this->createTransport();
        $client = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $resourceName2 = 'resourceName2625949903';
        $id = 3355;
        $billingSetup = 'billingSetup-1181632583';
        $name = 'name3373707';
        $proposedStartDateTime = 'proposedStartDateTime1279924808';
        $approvedStartDateTime = 'approvedStartDateTime-58305639';
        $totalAdjustmentsMicros = 1469082819;
        $amountServedMicros = 1848146642;
        $purchaseOrderNumber = 'purchaseOrderNumber1774283736';
        $notes = 'notes105008833';
        $proposedEndDateTime = 'proposedEndDateTime1799190849';
        $approvedEndDateTime = 'approvedEndDateTime-450243886';
        $proposedSpendingLimitMicros = 368712267;
        $approvedSpendingLimitMicros = 2102140486;
        $adjustedSpendingLimitMicros = 1818287939;
        $expectedResponse = new AccountBudget();
        $expectedResponse->setResourceName($resourceName2);
        $expectedResponse->setId($id);
        $expectedResponse->setBillingSetup($billingSetup);
        $expectedResponse->setName($name);
        $expectedResponse->setProposedStartDateTime($proposedStartDateTime);
        $expectedResponse->setApprovedStartDateTime($approvedStartDateTime);
        $expectedResponse->setTotalAdjustmentsMicros($totalAdjustmentsMicros);
        $expectedResponse->setAmountServedMicros($amountServedMicros);
        $expectedResponse->setPurchaseOrderNumber($purchaseOrderNumber);
        $expectedResponse->setNotes($notes);
        $expectedResponse->setProposedEndDateTime($proposedEndDateTime);
        $expectedResponse->setApprovedEndDateTime($approvedEndDateTime);
        $expectedResponse->setProposedSpendingLimitMicros($proposedSpendingLimitMicros);
        $expectedResponse->setApprovedSpendingLimitMicros($approvedSpendingLimitMicros);
        $expectedResponse->setAdjustedSpendingLimitMicros($adjustedSpendingLimitMicros);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedResourceName = $client->accountBudgetName('[CUSTOMER_ID]', '[ACCOUNT_BUDGET_ID]');
        $response = $client->getAccountBudget($formattedResourceName);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v8.services.AccountBudgetService/GetAccountBudget', $actualFuncCall);
        $actualValue = $actualRequestObject->getResourceName();
        $this->assertProtobufEquals($formattedResourceName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * @test
     */
    public function getAccountBudgetExceptionTest()
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
        $formattedResourceName = $client->accountBudgetName('[CUSTOMER_ID]', '[ACCOUNT_BUDGET_ID]');
        try {
            $client->getAccountBudget($formattedResourceName);
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
