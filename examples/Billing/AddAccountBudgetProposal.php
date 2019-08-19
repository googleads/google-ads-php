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
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V2\ResourceNames;
use Google\Ads\GoogleAds\V2\Enums\AccountBudgetProposalTypeEnum\AccountBudgetProposalType;
use Google\Ads\GoogleAds\V2\Enums\TimeTypeEnum\TimeType;
use Google\Ads\GoogleAds\V2\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V2\Resources\AccountBudgetProposal;
use Google\Ads\GoogleAds\V2\Services\AccountBudgetProposalOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/**
 * This example creates an account budget proposal using the 'CREATE' operation. To get account
 * budget proposals, run GetAccountBudgetProposals.php
 */
class AddAccountBudgetProposal
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const BILLING_SETUP_ID = 'INSERT_BILLING_SETUP_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::BILLING_SETUP_ID=> GetOpt::REQUIRED_ARGUMENT
        ]);

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())->fromFile()
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
     * @param int $customerId the customer ID
     * @param int $billingSetupId the billing setup ID used to add the account budget proposal
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $billingSetupId
    ) {
        // Constructs an account budget proposal.
        $accountBudgetProposal = new AccountBudgetProposal([
            'billing_setup' => new StringValue(
                ['value' => ResourceNames::forBillingSetup($customerId, $billingSetupId)]
            ),
            'proposal_type' => AccountBudgetProposalType::CREATE,
            'proposed_name' => new StringValue(['value' => 'Account Budget (example)']),
            // Specifies the account budget starts immediately.
            'proposed_start_time_type' => TimeType::NOW,
            // Alternatively you can specify a specific start time. Refer to the
            // AccountBudgetProposal class for allowed formats.
            //
            // 'proposed_start_date_time' => new StringValue(['value' => '2020-01-02 03:04:05']),

            // Specify that the budget runs forever.
            'proposed_end_time_type' => TimeType::FOREVER,
            // Alternatively you can specify a specific end time. Allowed formats are as above.
            // 'proposed_end_date_time' => new StringValue(['value' => '2021-02-03 04:05:06']),

            // Optional: set notes for the budget. These are free text and do not effect budget
            // delivery.
            // 'proposed_notes' => new StringValue(['value' => 'Received prepayment of $0.01']),

            // Optional: set PO number for record keeping. This value is at the user's
            // discretion, and has no effect on Google Billing & Payments.
            // 'proposed_purchase_order_number' => new StringValue(['value' => 'PO number 12345']),

            // Set the spending limit to 0.01, measured in the Google Ads account currency.
            'proposed_spending_limit_micros' => new Int64Value(['value' => 10000])
        ]);

        $accountBudgetProposalOperation = new AccountBudgetProposalOperation();
        $accountBudgetProposalOperation->setCreate($accountBudgetProposal);

        // Issues a mutate request to add the account budget proposal.
        $accountBudgetProposalServiceClient =
            $googleAdsClient->getAccountBudgetProposalServiceClient();
        $response = $accountBudgetProposalServiceClient->mutateAccountBudgetProposal(
            $customerId,
            $accountBudgetProposalOperation
        );

        printf(
            "Added an account budget proposal with resource name '%s'.%s",
            $response->getResult()->getResourceName(),
            PHP_EOL
        );
    }
}

AddAccountBudgetProposal::main();
