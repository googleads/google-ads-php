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
use Google\Ads\GoogleAds\Lib\V5\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V5\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V5\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V5\ResourceNames;
use Google\Ads\GoogleAds\V5\Enums\InvoiceTypeEnum\InvoiceType;
use Google\Ads\GoogleAds\V5\Enums\MonthOfYearEnum\MonthOfYear;
use Google\Ads\GoogleAds\V5\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V5\Resources\Invoice;
use Google\Ads\GoogleAds\V5\Resources\Invoice\AccountBudgetSummary;
use Google\ApiCore\ApiException;

/**
 * This code example retrieves the invoices issued last month for a given customer and billing
 * setup.
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
        // Identify the last month
        $lastMonth = strtotime('-1 month');

        // Issues the request.
        $response = $googleAdsClient->getInvoiceServiceClient()->listInvoices(
            $customerId,
            ResourceNames::forBillingSetup($customerId, $billingSetupId),
            // Needs to be 2019 or later
            date('Y', $lastMonth),
            MonthOfYear::value(strtoupper(date('F', $lastMonth)))
        );

        // Iterates over all invoices retrieved and prints their information.
        foreach ($response->getInvoices() as $invoice) {
            /** @var Invoice $invoice */
            printf(
                "- Found the invoice '%s':" . PHP_EOL .
                "  ID: %s" . PHP_EOL .
                "  Type: %s" . PHP_EOL .
                "  Billing setup ID: %s" . PHP_EOL .
                "  Payments account ID: %s" . PHP_EOL .
                "  Payments profile ID: %s" . PHP_EOL .
                "  Issue date: %s" . PHP_EOL .
                "  Due date: %s" . PHP_EOL .
                "  Currency code: %s" . PHP_EOL .
                "  Service date range: from %s to %s" . PHP_EOL .
                "  Adjustments: subtotal '%.2f', tax '%.2f', total '%.2f'" . PHP_EOL .
                "  Regulatory costs: subtotal '%.2f', tax '%.2f', total '%.2f'" . PHP_EOL .
                "  Replaced invoices: %s" . PHP_EOL .
                "  Amounts: subtotal '%.2f', tax '%.2f', total '%.2f'" . PHP_EOL .
                "  Corrected invoice: %s" . PHP_EOL .
                "  PDF URL: " . PHP_EOL .
                "  Account budgets:" . PHP_EOL,
                $invoice->getResourceName(),
                $invoice->getIdUnwrapped(),
                InvoiceType::name($invoice->getType()),
                $invoice->getBillingSetupUnwrapped(),
                $invoice->getPaymentsAccountIdUnwrapped(),
                $invoice->getPaymentsProfileIdUnwrapped(),
                $invoice->getIssueDateUnwrapped(),
                $invoice->getDueDateUnwrapped(),
                $invoice->getCurrencyCodeUnwrapped(),
                $invoice->getServiceDateRange()->getStartDateUnwrapped(),
                $invoice->getServiceDateRange()->getEndDateUnwrapped(),
                self::microsToPlain($invoice->getAdjustmentsSubtotalAmountMicrosUnwrapped()),
                self::microsToPlain($invoice->getAdjustmentsTaxAmountMicrosUnwrapped()),
                self::microsToPlain($invoice->getAdjustmentsTotalAmountMicrosUnwrapped()),
                self::microsToPlain($invoice->getRegulatoryCostsSubtotalAmountMicrosUnwrapped()),
                self::microsToPlain($invoice->getRegulatoryCostsTaxAmountMicrosUnwrapped()),
                self::microsToPlain($invoice->getRegulatoryCostsTotalAmountMicrosUnwrapped()),
                implode(', ', iterator_to_array($invoice->getReplacedInvoices()->getIterator())),
                self::microsToPlain($invoice->getSubtotalAmountMicrosUnwrapped()),
                self::microsToPlain($invoice->getTaxAmountMicrosUnwrapped()),
                self::microsToPlain($invoice->getTotalAmountMicrosUnwrapped()),
                $invoice->getCorrectedInvoiceUnwrapped(),
                $invoice->getPdfUrlUnwrapped()
            );
            foreach ($invoice->getAccountBudgetSummaries() as $accountBudgetSummary) {
                /** @var AccountBudgetSummary $accountBudgetSummaries */
                printf(
                    "  - Account budget: resource name '%s', name '%s'" . PHP_EOL .
                    "      Customer: ID '%s', descriptive name '%s'" . PHP_EOL .
                    "      Purchase order number: %s" . PHP_EOL .
                    "      Billing activity date range: from %s to %s" . PHP_EOL .
                    "      Amounts: subtotal '%.2f', tax '%.2f', total '%.2f'" . PHP_EOL,
                    $accountBudgetSummary->getAccountBudgetUnwrapped(),
                    $accountBudgetSummary->getAccountBudgetNameUnwrapped(),
                    $accountBudgetSummary->getCustomerUnwrapped(),
                    $accountBudgetSummary->getCustomerDescriptiveNameUnwrapped(),
                    $accountBudgetSummary->getPurchaseOrderNumberUnwrapped(),
                    $accountBudgetSummary->getBillableActivityDateRange()->getStartDateUnwrapped(),
                    $accountBudgetSummary->getBillableActivityDateRange()->getEndDateUnwrapped(),
                    $accountBudgetSummary->getSubtotalAmountMicrosUnwrapped() / 1000000.0,
                    $accountBudgetSummary->getTaxAmountMicrosUnwrapped() / 1000000.0,
                    $accountBudgetSummary->getTotalAmountMicrosUnwrapped() / 1000000.0
                );
            }
        }
    }

    /**
     * Converts an amount from the micro unit to the plain unit.
     *
     * @param int $amount the amount
     * @return int the amount converted in plain unit if not null otherwise 0
     */
    private static function microsToPlain(int $amount): int {
        return $amount ? $amount / 1000000.0 : 0.0;
    }
}

GetInvoices::main();
