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
use Google\Ads\GoogleAds\V2\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V2\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/**
 * This example gets the account hierarchy of the specified manager account. If you don't specify
 * manager customer ID, the example will instead print the hierarchies of all accessible customer
 * accounts for your authenticated Google account.
 * Note that if the list of accessible customers for your authenticated Google account includes
 * accounts within the same hierarchy, this example will retrieve and print the overlapping
 * portions of the hierarchy for each accessible customer.
 */
class GetAccountHierarchy
{
    // Optional: Inserts the manager customer ID below.
    const MANAGER_CUSTOMER_ID = null;
    const PAGE_SIZE = 1000;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::MANAGER_CUSTOMER_ID => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::MANAGER_CUSTOMER_ID] ?: self::MANAGER_CUSTOMER_ID
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
     * @param int|null $managerCustomerId the customer ID
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, ?int $managerCustomerId)
    {
        $seedCustomerIds = [];
        if ($managerCustomerId) {
            $seedCustomerIds[] = $managerCustomerId;
        } else {
            // Issues a request for listing all accessible customers by this authenticated Google
            // account.
            $customerServiceClient = $googleAdsClient->getCustomerServiceClient();
            $accessibleCustomers = $customerServiceClient->listAccessibleCustomers();
            print 'No manager customer ID is specified. The example will print the hierarchies of'
                . ' all accessible customer IDs:' . PHP_EOL;

            foreach ($accessibleCustomers->getResourceNames() as $customerResourceName) {
                $customer = CustomerServiceClient::parseName($customerResourceName)['customer'];
                print $customer . PHP_EOL;
                $seedCustomerIds[] = $customer;
            }
            print PHP_EOL;
        }

        foreach ($seedCustomerIds as $seedCustomerId) {
            $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
            // Creates a query that retrieves all child accounts of the manager specified in search
            // calls below.
            $query = 'SELECT customer_client.client_customer, customer_client.level,'
                . ' customer_client.manager, customer_client.descriptive_name,'
                . ' customer_client.currency_code, customer_client.time_zone,'
                . ' customer_client.id FROM customer_client';

            // Performs a breadth-first search algorithm to build an associative array mapping
            // managers to their child accounts ($customerIdsToChildAccounts).
            $unprocessedCustomerIds = [$seedCustomerId];
            $customerIdsToChildAccounts = [];
            $rootCustomerClient = null;
            while (!empty($unprocessedCustomerIds)) {
                $customerId = array_shift($unprocessedCustomerIds);
                // Issues a search request by specifying page size.
                $response = $googleAdsServiceClient->search(
                    $customerId,
                    $query,
                    ['pageSize' => self::PAGE_SIZE]
                );

                // Iterates over all rows in all pages to get all customer clients under the
                // specified customer's hierarchy.
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

                    // For all level-1 (direct child) accounts that are a manager account, the above
                    // query will be run against them to create an associative array of managers to
                    // their child accounts for printing the hierarchy afterwards.
                    $customerIdsToChildAccounts[$customerId][] = $customerClient;
                    if ($customerClient->getManagerUnwrapped()) {
                        // A customer can be managed by multiple managers, so to prevent visiting
                        // the same customer many times, we need to check if it's already in the
                        // map.
                        $alreadyVisited = array_key_exists(
                            $customerClient->getIdUnwrapped(),
                            $customerIdsToChildAccounts
                        );
                        if (!$alreadyVisited && $customerClient->getLevelUnwrapped() === 1) {
                            array_push(
                                $unprocessedCustomerIds,
                                $customerClient->getIdUnwrapped()
                            );
                        }
                    }
                }
            };

            printf(
                "The hierarchy of customer ID %d is printed below:%s",
                $rootCustomerClient->getIdUnwrapped(),
                PHP_EOL
            );
            self::printAccountHierarchy($rootCustomerClient, $customerIdsToChildAccounts, 0);
            print PHP_EOL;
        }
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
        if ($depth === 0) {
            print 'Customer ID (Descriptive Name, Currency Code, Time Zone)' . PHP_EOL;
        }
        $customerId = $customerClient->getIdUnwrapped();
        print str_repeat('-', $depth * 2);
        printf(
            " %d ('%s', '%s', '%s')%s",
            $customerId,
            $customerClient->getDescriptiveNameUnwrapped(),
            $customerClient->getCurrencyCodeUnwrapped(),
            $customerClient->getTimeZoneUnwrapped(),
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
