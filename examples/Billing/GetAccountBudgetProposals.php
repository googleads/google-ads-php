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
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V12\Enums\AccountBudgetProposalStatusEnum\AccountBudgetProposalStatus;
use Google\Ads\GoogleAds\V12\Enums\AccountBudgetProposalTypeEnum\AccountBudgetProposalType;
use Google\Ads\GoogleAds\V12\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V12\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/**
 * This example gets all account budget proposals. To add an account budget proposal, run
 * AddAccountBudgetProposal.php
 */
class GetAccountBudgetProposals
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const PAGE_SIZE = 1000;

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
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves the account budget proposals.
        $query = 'SELECT account_budget_proposal.id, '
            . '  account_budget_proposal.account_budget, '
            . '  account_budget_proposal.billing_setup, '
            . '  account_budget_proposal.status, '
            . '  account_budget_proposal.proposed_name, '
            . '  account_budget_proposal.proposed_notes, '
            . '  account_budget_proposal.proposed_purchase_order_number, '
            . '  account_budget_proposal.proposal_type, '
            . '  account_budget_proposal.approval_date_time, '
            . '  account_budget_proposal.creation_date_time '
            . 'FROM account_budget_proposal';

        // Issues a search request by specifying page size.
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        // Iterates over all rows in all pages and prints the requested field values for
        // the account budget proposal in each row.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $accountBudgetProposal = $googleAdsRow->getAccountBudgetProposal();
            printf(
                'Found the account budget proposal with ID %1$d, %11$s'
                . '  status \'%2$s\', %11$s'
                . '  account budget \'%3$s\', %11$s'
                . '  billing setup \'%4$s\', %11$s'
                . '  proposed name \'%5$s\', %11$s'
                . '  proposed notes \'%6$s\', %11$s'
                . '  proposed PO number \'%7$s\'.%11$s'
                . '  proposed type \'%8$s\'.%11$s'
                . '  approval date time \'%9$s\'.%11$s'
                . '  creation date time \'%10$s\'.%11$s',
                $accountBudgetProposal->getId(),
                AccountBudgetProposalStatus::name($accountBudgetProposal->getStatus()),
                $accountBudgetProposal->getAccountBudget(),
                $accountBudgetProposal->getBillingSetup(),
                $accountBudgetProposal->getProposedName(),
                $accountBudgetProposal->getProposedNotes(),
                $accountBudgetProposal->getProposedPurchaseOrderNumber(),
                AccountBudgetProposalType::name($accountBudgetProposal->getProposalType()),
                $accountBudgetProposal->getApprovalDateTime(),
                $accountBudgetProposal->getCreationDateTime(),
                PHP_EOL
            );
        }
    }
}

GetAccountBudgetProposals::main();
