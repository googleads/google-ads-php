<?php

/**
 * Copyright 2020 Google LLC
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

namespace Google\Ads\GoogleAds\Examples\Billing;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Enums\InvoiceTypeEnum\InvoiceType;
use Google\Ads\GoogleAds\V18\Enums\MonthOfYearEnum\MonthOfYear;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Invoice;
use Google\Ads\GoogleAds\V18\Resources\Invoice\AccountBudgetSummary;
use Google\Ads\GoogleAds\V18\Services\ListInvoicesRequest;
use Google\ApiCore\ApiException;

/**
 * This code example retrieves the invoices issued last month for a given billing setup.
 */
class GetInvoices
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const BILLING_SETUP_ID = 'INSERT_BILLING_SETUP_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::BILLING_SETUP_ID => GetOpt::REQUIRED_ARGUMENT
        ]);

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID,
                $options[ArgumentNames::BILLING_SETUP_ID] ?: self::BILLING_SETUP_ID
            );
        } catch (GoogleAdsException $googleAdsException) {
            printf(
                "Request with ID '%s' has failed.%sGoogle Ads failure details:%s",
                $googleAdsException->getRequestId(),
                PHP_EOL,
                PHP_EOL
            );
            foreach ($googleAdsException->getGoogleAdsFailure()->getErrors() as $error) {
                /** @var GoogleAdsError $error */
                printf(
                    "\t%s: %s%s",
                    $error->getErrorCode()->getErrorCode(),
                    $error->getMessage(),
                    PHP_EOL
                );
            }
            exit(1);
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
            exit(1);
        }
    }

    /**
     * Runs the example.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $billingSetupId the billing setup ID to filter the invoices on
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $billingSetupId
    ) {
        // Gets the date one month before now.
        $lastMonth = strtotime('-1 month');

        // [START get_invoices]
        // Issues the request.
        $response = $googleAdsClient->getInvoiceServiceClient()->listInvoices(
            ListInvoicesRequest::build(
                $customerId,
                ResourceNames::forBillingSetup($customerId, $billingSetupId),
                // The year needs to be 2019 or later.
                date('Y', $lastMonth),
                MonthOfYear::value(strtoupper(date('F', $lastMonth)))
            )
        );
        // [END get_invoices]

        // [START get_invoices_1]
        // Iterates over all invoices retrieved and prints their information.
        foreach ($response->getInvoices() as $invoice) {
            /** @var Invoice $invoice */
            printf(
                "- Found the invoice '%s':" . PHP_EOL .
                "  ID (also known as Invoice Number): '%s'" . PHP_EOL .
                "  Type: %s" . PHP_EOL .
                "  Billing setup ID: '%s'" . PHP_EOL .
                "  Payments account ID (also known as Billing Account Number): '%s'" . PHP_EOL .
                "  Payments profile ID (also known as Billing ID): '%s'" . PHP_EOL .
                "  Issue date (also known as Invoice Date): %s" . PHP_EOL .
                "  Due date: %s" . PHP_EOL .
                "  Currency code: %s" . PHP_EOL .
                "  Service date range (inclusive): from %s to %s" . PHP_EOL .
                "  Adjustments: subtotal '%.2f', tax '%.2f', total '%.2f'" . PHP_EOL .
                "  Regulatory costs: subtotal '%.2f', tax '%.2f', total '%.2f'" . PHP_EOL .
                "  Replaced invoices: '%s'" . PHP_EOL .
                "  Amounts: subtotal '%.2f', tax '%.2f', total '%.2f'" . PHP_EOL .
                "  Corrected invoice: '%s'" . PHP_EOL .
                "  PDF URL: '%s'" . PHP_EOL .
                "  Account budgets:" . PHP_EOL,
                $invoice->getResourceName(),
                $invoice->getId(),
                InvoiceType::name($invoice->getType()),
                $invoice->getBillingSetup(),
                $invoice->getPaymentsAccountId(),
                $invoice->getPaymentsProfileId(),
                $invoice->getIssueDate(),
                $invoice->getDueDate(),
                $invoice->getCurrencyCode(),
                $invoice->getServiceDateRange()->getStartDate(),
                $invoice->getServiceDateRange()->getEndDate(),
                Helper::microToBase($invoice->getAdjustmentsSubtotalAmountMicros()),
                Helper::microToBase($invoice->getAdjustmentsTaxAmountMicros()),
                Helper::microToBase($invoice->getAdjustmentsTotalAmountMicros()),
                Helper::microToBase($invoice->getRegulatoryCostsSubtotalAmountMicros()),
                Helper::microToBase($invoice->getRegulatoryCostsTaxAmountMicros()),
                Helper::microToBase($invoice->getRegulatoryCostsTotalAmountMicros()),
                $invoice->getReplacedInvoices()
                    ? implode(
                        "', '",
                        iterator_to_array($invoice->getReplacedInvoices()->getIterator())
                    ) : 'none',
                Helper::microToBase($invoice->getSubtotalAmountMicros()),
                Helper::microToBase($invoice->getTaxAmountMicros()),
                Helper::microToBase($invoice->getTotalAmountMicros()),
                $invoice->getCorrectedInvoice() ?: 'none',
                $invoice->getPdfUrl()
            );
            foreach ($invoice->getAccountBudgetSummaries() as $accountBudgetSummary) {
                /** @var AccountBudgetSummary $accountBudgetSummary */
                printf(
                    "  - Account budget '%s':" . PHP_EOL .
                    "      Name (also known as Account Budget): '%s'" . PHP_EOL .
                    "      Customer (also known as Account ID): '%s'" . PHP_EOL .
                    "      Customer descriptive name (also known as Account): '%s'" . PHP_EOL .
                    "      Purchase order number (also known as Purchase Order): '%s'" . PHP_EOL .
                    "      Billing activity date range (inclusive): from %s to %s" . PHP_EOL .
                    "      Amounts: subtotal '%.2f', tax '%.2f', total '%.2f'" . PHP_EOL,
                    $accountBudgetSummary->getAccountBudget(),
                    $accountBudgetSummary->getAccountBudgetName() ?: 'none',
                    $accountBudgetSummary->getCustomer(),
                    $accountBudgetSummary->getCustomerDescriptiveName() ?: 'none',
                    $accountBudgetSummary->getPurchaseOrderNumber() ?: 'none',
                    $accountBudgetSummary->getBillableActivityDateRange()->getStartDate(),
                    $accountBudgetSummary->getBillableActivityDateRange()->getEndDate(),
                    Helper::microToBase($accountBudgetSummary->getSubtotalAmountMicros()),
                    Helper::microToBase($accountBudgetSummary->getTaxAmountMicros()),
                    Helper::microToBase($accountBudgetSummary->getTotalAmountMicros())
                );
            }
        }
        // [END get_invoices_1]
    }
}

GetInvoices::main();
