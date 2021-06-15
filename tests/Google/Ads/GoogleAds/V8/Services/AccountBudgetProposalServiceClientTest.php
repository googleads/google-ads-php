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

use Google\Ads\GoogleAds\V8\Services\AccountBudgetProposalServiceClient;
use Google\Ads\GoogleAds\V8\Resources\AccountBudgetProposal;
use Google\Ads\GoogleAds\V8\Services\AccountBudgetProposalOperation;

use Google\Ads\GoogleAds\V8\Services\MutateAccountBudgetProposalResponse;
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
class AccountBudgetProposalServiceClientTest extends GeneratedTest
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
     * @return AccountBudgetProposalServiceClient
     */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new AccountBudgetProposalServiceClient($options);
    }

    /**
     * @test
     */
    public function getAccountBudgetProposalTest()
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
        $accountBudget = 'accountBudget383567255';
        $proposedName = 'proposedName-1200293948';
        $approvedStartDateTime = 'approvedStartDateTime-58305639';
        $proposedPurchaseOrderNumber = 'proposedPurchaseOrderNumber461694911';
        $proposedNotes = 'proposedNotes1446017192';
        $creationDateTime = 'creationDateTime263411550';
        $approvalDateTime = 'approvalDateTime-1411096126';
        $proposedStartDateTime = 'proposedStartDateTime1279924808';
        $proposedEndDateTime = 'proposedEndDateTime1799190849';
        $approvedEndDateTime = 'approvedEndDateTime-450243886';
        $proposedSpendingLimitMicros = 368712267;
        $approvedSpendingLimitMicros = 2102140486;
        $expectedResponse = new AccountBudgetProposal();
        $expectedResponse->setResourceName($resourceName2);
        $expectedResponse->setId($id);
        $expectedResponse->setBillingSetup($billingSetup);
        $expectedResponse->setAccountBudget($accountBudget);
        $expectedResponse->setProposedName($proposedName);
        $expectedResponse->setApprovedStartDateTime($approvedStartDateTime);
        $expectedResponse->setProposedPurchaseOrderNumber($proposedPurchaseOrderNumber);
        $expectedResponse->setProposedNotes($proposedNotes);
        $expectedResponse->setCreationDateTime($creationDateTime);
        $expectedResponse->setApprovalDateTime($approvalDateTime);
        $expectedResponse->setProposedStartDateTime($proposedStartDateTime);
        $expectedResponse->setProposedEndDateTime($proposedEndDateTime);
        $expectedResponse->setApprovedEndDateTime($approvedEndDateTime);
        $expectedResponse->setProposedSpendingLimitMicros($proposedSpendingLimitMicros);
        $expectedResponse->setApprovedSpendingLimitMicros($approvedSpendingLimitMicros);
        $transport->addResponse($expectedResponse);
        // Mock request
        $formattedResourceName = $client->accountBudgetProposalName('[CUSTOMER_ID]', '[ACCOUNT_BUDGET_PROPOSAL_ID]');
        $response = $client->getAccountBudgetProposal($formattedResourceName);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v8.services.AccountBudgetProposalService/GetAccountBudgetProposal', $actualFuncCall);
        $actualValue = $actualRequestObject->getResourceName();
        $this->assertProtobufEquals($formattedResourceName, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * @test
     */
    public function getAccountBudgetProposalExceptionTest()
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
        $formattedResourceName = $client->accountBudgetProposalName('[CUSTOMER_ID]', '[ACCOUNT_BUDGET_PROPOSAL_ID]');
        try {
            $client->getAccountBudgetProposal($formattedResourceName);
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
    public function mutateAccountBudgetProposalTest()
    {
        $transport = $this->createTransport();
        $client = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new MutateAccountBudgetProposalResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $operation = new AccountBudgetProposalOperation();
        $response = $client->mutateAccountBudgetProposal($customerId, $operation);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v8.services.AccountBudgetProposalService/MutateAccountBudgetProposal', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getOperation();
        $this->assertProtobufEquals($operation, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * @test
     */
    public function mutateAccountBudgetProposalExceptionTest()
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
        $operation = new AccountBudgetProposalOperation();
        try {
            $client->mutateAccountBudgetProposal($customerId, $operation);
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
