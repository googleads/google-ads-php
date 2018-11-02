<?php
/**
 * Copyright 2018 Google LLC
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
use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V0\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/** This example retrieves all account budgets for a Google Ads customer. */
class GetAccountBudgets
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const PAGE_SIZE = 1000;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID
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
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
        }
    }

    /**
     * Runs the example.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID without hyphens
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves the account budgets.
        $query = 'SELECT account_budget.status, '
            . 'account_budget.billing_setup, '
            . 'account_budget.approved_spending_limit_micros, '
            . 'account_budget.approved_spending_limit_type, '
            . 'account_budget.proposed_spending_limit_micros, '
            . 'account_budget.proposed_spending_limit_type, '
            . 'account_budget.approved_start_date_time, '
            . 'account_budget.proposed_start_date_time, '
            . 'account_budget.approved_end_date_time, '
            . 'account_budget.approved_end_time_type,'
            . 'account_budget.proposed_end_date_time, '
            . 'account_budget.proposed_end_time_type '
            . 'FROM account_budget';

        // Issues a search request by specifying page size.
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        // Iterates over all rows in all pages and prints the requested field values for
        // the account budget in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            // Note that the status, spending limit type, and end time type printed below are enum
            // values. For example, a value of 2 will be returned when the account budget status is
            // 'APPROVED'.
            // A mapping of enum names to values can be found in the following files:
            // * AccountBudgetStatus.php (for the account budget status)
            // * SpendingLimitType.php (for the spending limit type)
            // * TimeType.php (for the end time type)
            $accountBudget = $googleAdsRow->getAccountBudget();
            printf(
                'Found the account budget \'%s\' with status \'%d\', billing setup '
                . '\'%s\', amount served %.2f, total adjustments %.2f,%s'
                . '  approved spending limit \'%s\' (proposed \'%s\'),%s'
                . '  approved start time \'%s\' (proposed \'%s\'),%s'
                . '  approved end time \'%s\' (proposed \'%s\').%s',
                $accountBudget->getResourceName(),
                $accountBudget->getStatus(),
                $accountBudget->getBillingSetup()
                    ? $accountBudget->getBillingSetup()->getValue() : 'none',
                $accountBudget->getAmountServedMicros()
                    ? $accountBudget->getAmountServedMicros()->getValue() / 1000000.0
                    : 0.0,
                $accountBudget->getTotalAdjustmentsMicros()
                    ? $accountBudget->getTotalAdjustmentsMicros()->getValue() / 1000000.0
                    : 0.0,
                PHP_EOL,
                $accountBudget->getApprovedSpendingLimitMicros()
                    ? sprintf(
                        '%.2f',
                        $accountBudget->getApprovedSpendingLimitMicros()->getValue() / 1000000.0
                    ) : $accountBudget->getApprovedSpendingLimitType(),
                $accountBudget->getProposedSpendingLimitMicros()
                    ? sprintf(
                        '%.2f',
                        $accountBudget->getProposedSpendingLimitMicros()->getValue() / 1000000.0
                    ) : $accountBudget->getProposedSpendingLimitType(),
                PHP_EOL,
                $accountBudget->getApprovedStartDateTime()
                    ? $accountBudget->getApprovedStartDateTime()->getValue()
                    : 'none',
                $accountBudget->getProposedStartDateTime()
                    ? $accountBudget->getProposedStartDateTime()->getValue()
                    : 'none',
                PHP_EOL,
                $accountBudget->getApprovedEndDateTime()
                    ? $accountBudget->getApprovedEndDateTime()->getValue()
                    : $accountBudget->getApprovedEndTimeType(),
                $accountBudget->getProposedEndDateTime()
                    ? $accountBudget->getProposedEndDateTime()->getValue()
                    : $accountBudget->getProposedEndTimeType(),
                PHP_EOL
            );
        }
    }
}

GetAccountBudgets::main();
