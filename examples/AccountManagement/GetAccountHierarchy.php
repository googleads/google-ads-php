<?php
/**
 * Copyright 2019 Google LLC
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

namespace Google\Ads\GoogleAds\Examples\AccountManagement;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\V2\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V2\Resources\CustomerClient;
use Google\Ads\GoogleAds\V2\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/**
 * This example gets the account hierarchy of the specified customer account.
 */
class GetAccountHierarchy
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
        $googleAdsClient = (new GoogleAdsClientBuilder())->fromFile()
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
     * @param int $customerId the customer ID
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all child accounts of the specified customer ID.
        $query = 'SELECT customer_client.client_customer, customer_client.level,'
            . ' customer_client.manager, customer_client.descriptive_name,'
            . ' customer_client.currency_code, customer_client.time_zone,'
            . ' customer_client.id'
            . ' FROM customer_client';

        $unprocessedManagerAccounts = [$customerId];
        $customerIdsToChildAccounts = [];
        $rootCustomerClient = null;
        while (!empty($unprocessedManagerAccounts)) {
            $managerAccountId = array_shift($unprocessedManagerAccounts);
            // Issues a search request by specifying page size.
            $response = $googleAdsServiceClient->search(
                $managerAccountId,
                $query,
                ['pageSize' => self::PAGE_SIZE]
            );

            printf(
                "Customer clients for the customer ID %d are found:%s",
                $managerAccountId,
                PHP_EOL
            );
            // Iterates over all rows in all pages and prints the requested field values for
            // the change status in each row.
            foreach ($response->iterateAllElements() as $googleAdsRow) {
                /** @var GoogleAdsRow $googleAdsRow */
                $customerClient = $googleAdsRow->getCustomerClient();
                // The customer client that has level of 0 is the specified customer.
                if ($customerClient->getLevelUnwrapped() === 0) {
                    // Store the root customer client, which is the first encountered customer
                    // client that has level of 0.
                    if (is_null($rootCustomerClient)) {
                        $rootCustomerClient = $customerClient;
                    }
                    continue;
                }

                printf(
                    "Customer client ID %d with name '%s', currency code '%s', time zone '%s'"
                    . " is found.%s",
                    $customerClient->getIdUnwrapped(),
                    $customerClient->getDescriptiveNameUnwrapped(),
                    $customerClient->getCurrencyCodeUnwrapped(),
                    $customerClient->getTimeZoneUnwrapped(),
                    PHP_EOL
                );

                // For all level-1 child accounts that are a manager account, the above query will
                // be run against them to create an associative array of managers to their child
                // accounts for printing the hierarchy afterwards.
                $customerIdsToChildAccounts[$managerAccountId][] = $customerClient;
                if ($customerClient->getManagerUnwrapped()) {
                    print '  This customer account is also a manager.' . PHP_EOL;
                    // A customer can be managed by multiple managers, so to prevent visiting the
                    // same customer many times, we need to check if it's already in the map.
                    $alreadyVisited = array_key_exists(
                        $customerClient->getIdUnwrapped(),
                        $customerIdsToChildAccounts
                    );
                    if (!$alreadyVisited && $customerClient->getLevelUnwrapped() === 1) {
                        array_push($unprocessedManagerAccounts, $customerClient->getIdUnwrapped());
                    }
                }
            }
            print PHP_EOL;
        };

        print '(Customer ID, Descriptive Name)' . PHP_EOL;
        self::printAccountHierarchy($rootCustomerClient, $customerIdsToChildAccounts, 0);
    }

    /**
     * Prints the specified account's hierarchy using recursion.
     *
     * @param CustomerClient $customerClient the customer client whose info will be printed and
     *     its child accounts will be processed if it's a manager
     * @param array $customerIdsToChildLinks a map from customer IDs to child
     *     accounts
     * @param int $depth the current depth we are printing from in the
     *     account hierarchy
     */
    private static function printAccountHierarchy(
        CustomerClient $customerClient,
        array $customerIdsToChildAccounts,
        int $depth
    ) {
        $customerId = $customerClient->getIdUnwrapped();
        print str_repeat('-', $depth * 2);
        printf(
            "%d, '%s'%s",
            $customerId,
            $customerClient->getDescriptiveNameUnwrapped(),
            PHP_EOL
        );

        // Recursively call this function for all child accounts of $customerClient.
        if (array_key_exists($customerId, $customerIdsToChildAccounts)) {
            foreach ($customerIdsToChildAccounts[$customerId] as $childAccount) {
                self::printAccountHierarchy($childAccount, $customerIdsToChildAccounts, $depth + 1);
            }
        }
    }
}

GetAccountHierarchy::main();
