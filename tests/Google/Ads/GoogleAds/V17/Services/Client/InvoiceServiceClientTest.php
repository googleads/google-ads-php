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

use Google\Ads\GoogleAds\V17\Enums\MonthOfYearEnum\MonthOfYear;
use Google\Ads\GoogleAds\V17\Services\Client\InvoiceServiceClient;
use Google\Ads\GoogleAds\V17\Services\ListInvoicesRequest;
use Google\Ads\GoogleAds\V17\Services\ListInvoicesResponse;
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
class InvoiceServiceClientTest extends GeneratedTest
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

    /** @return InvoiceServiceClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new InvoiceServiceClient($options);
    }

    /** @test */
    public function listInvoicesTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new ListInvoicesResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $billingSetup = 'billingSetup-1181632583';
        $issueYear = 'issueYear1443510243';
        $issueMonth = MonthOfYear::UNSPECIFIED;
        $request = (new ListInvoicesRequest())
            ->setCustomerId($customerId)
            ->setBillingSetup($billingSetup)
            ->setIssueYear($issueYear)
            ->setIssueMonth($issueMonth);
        $response = $gapicClient->listInvoices($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v17.services.InvoiceService/ListInvoices', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getBillingSetup();
        $this->assertProtobufEquals($billingSetup, $actualValue);
        $actualValue = $actualRequestObject->getIssueYear();
        $this->assertProtobufEquals($issueYear, $actualValue);
        $actualValue = $actualRequestObject->getIssueMonth();
        $this->assertProtobufEquals($issueMonth, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function listInvoicesExceptionTest()
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
        $billingSetup = 'billingSetup-1181632583';
        $issueYear = 'issueYear1443510243';
        $issueMonth = MonthOfYear::UNSPECIFIED;
        $request = (new ListInvoicesRequest())
            ->setCustomerId($customerId)
            ->setBillingSetup($billingSetup)
            ->setIssueYear($issueYear)
            ->setIssueMonth($issueMonth);
        try {
            $gapicClient->listInvoices($request);
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
    public function listInvoicesAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $expectedResponse = new ListInvoicesResponse();
        $transport->addResponse($expectedResponse);
        // Mock request
        $customerId = 'customerId-1772061412';
        $billingSetup = 'billingSetup-1181632583';
        $issueYear = 'issueYear1443510243';
        $issueMonth = MonthOfYear::UNSPECIFIED;
        $request = (new ListInvoicesRequest())
            ->setCustomerId($customerId)
            ->setBillingSetup($billingSetup)
            ->setIssueYear($issueYear)
            ->setIssueMonth($issueMonth);
        $response = $gapicClient->listInvoicesAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.ads.googleads.v17.services.InvoiceService/ListInvoices', $actualFuncCall);
        $actualValue = $actualRequestObject->getCustomerId();
        $this->assertProtobufEquals($customerId, $actualValue);
        $actualValue = $actualRequestObject->getBillingSetup();
        $this->assertProtobufEquals($billingSetup, $actualValue);
        $actualValue = $actualRequestObject->getIssueYear();
        $this->assertProtobufEquals($issueYear, $actualValue);
        $actualValue = $actualRequestObject->getIssueMonth();
        $this->assertProtobufEquals($issueMonth, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }
}
