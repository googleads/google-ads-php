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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\CustomerClient;
use Google\Ads\GoogleAds\V18\Services\CustomerServiceClient;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\ListAccessibleCustomersRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsStreamRequest;
use Google\ApiCore\ApiException;

/**
 * Gets the account hierarchy of the specified manager customer ID and login customer ID. If you
 * don't specify them, the example will instead print the hierarchies of all accessible customer
 * accounts for your authenticated Google account. Note that if the list of accessible customers
 * for your authenticated Google account includes accounts within the same hierarchy, this example
 * will retrieve and print the overlapping portions of the hierarchy for each accessible customer.
 */
class GetAccountHierarchy
{
    // Optional: You may pass the manager customer ID on the command line or specify it here. If
    // neither are set, a null value will be passed to the runExample() method, and the example
    // will print the hierarchies of all accessible customer IDs.
    private const MANAGER_CUSTOMER_ID = null;
    // Optional: You may pass the login customer ID on the command line or specify it here if and
    // only if the manager customer ID is set. If the login customer ID is set neither on the
    // command line nor below, a null value will be passed to the runExample() method, and the
    // example will use each accessible customer ID as the login customer ID.
    private const LOGIN_CUSTOMER_ID = null;

    // Stores the mapping from the root customer IDs (the ones that will be used as a start point
    // for printing each hierarchy) to their `CustomerClient` objects.
    private static array $rootCustomerClients = [];

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::MANAGER_CUSTOMER_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::LOGIN_CUSTOMER_ID => GetOpt::OPTIONAL_ARGUMENT
        ]);
        $managerCustomerId =
            $options[ArgumentNames::MANAGER_CUSTOMER_ID] ?: self::MANAGER_CUSTOMER_ID;
        $loginCustomerId =
            $options[ArgumentNames::LOGIN_CUSTOMER_ID] ?: self::LOGIN_CUSTOMER_ID;
        if ($managerCustomerId xor $loginCustomerId) {
            throw new \InvalidArgumentException(
                'Both the manager customer ID and login customer ID must be provided together, '
                . 'or they must both be null.'
            );
        }

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        try {
            self::runExample($googleAdsClient, $managerCustomerId, $loginCustomerId);
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
     * @param int|null $managerCustomerId the manager customer ID
     * @param int|null $loginCustomerId the login customer ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        ?int $managerCustomerId,
        ?int $loginCustomerId
    ) {
        $rootCustomerIds = [];
        if (is_null($managerCustomerId)) {
            // We will get the account hierarchies for all accessible customers.
            $rootCustomerIds = self::getAccessibleCustomers($googleAdsClient);
        } else {
            // We will get only the hierarchy for the provided manager customer ID when it's
            // provided.
            $rootCustomerIds[] = $managerCustomerId;
        }

        $allHierarchies = [];
        $accountsWithNoInfo = [];

        // Constructs a map of account hierarchies.
        foreach ($rootCustomerIds as $rootCustomerId) {
            $customerClientToHierarchy =
                self::createCustomerClientToHierarchy($loginCustomerId, $rootCustomerId);
            if (is_null($customerClientToHierarchy)) {
                $accountsWithNoInfo[] = $rootCustomerId;
            } else {
                $allHierarchies += $customerClientToHierarchy;
            }
        }

        // Prints the IDs of any accounts that did not produce hierarchy information.
        if (!empty($accountsWithNoInfo)) {
            print
                'Unable to retrieve information for the following accounts which are likely '
                . 'either test accounts or accounts with setup issues. Please check the logs for '
                . 'details:' . PHP_EOL;
            foreach ($accountsWithNoInfo as $accountId) {
                print $accountId . PHP_EOL;
            }
            print PHP_EOL;
        }

        // Prints the hierarchy information for all accounts for which there is hierarchy info
        // available.
        foreach ($allHierarchies as $rootCustomerId => $customerIdsToChildAccounts) {
            printf(
                "The hierarchy of customer ID %d is printed below:%s",
                $rootCustomerId,
                PHP_EOL
            );
            self::printAccountHierarchy(
                self::$rootCustomerClients[$rootCustomerId],
                $customerIdsToChildAccounts,
                0
            );
            print PHP_EOL;
        }
    }

    /**
     * Creates a map between a customer client and each of its managers' mappings.
     *
     * @param int|null $loginCustomerId the login customer ID used to create the GoogleAdsClient
     * @param int $rootCustomerId the ID of the customer at the root of the tree
     * @return array|null a map between a customer client and each of its managers' mappings if the
     *     account hierarchy can be retrieved. If the account hierarchy cannot be retrieved, returns
     *     null
     */
    private static function createCustomerClientToHierarchy(
        ?int $loginCustomerId,
        int $rootCustomerId
    ): ?array {
        // Creates a GoogleAdsClient with the specified login customer ID. See
        // https://developers.google.com/google-ads/api/docs/concepts/call-structure#cid for more
        // information.
        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();
        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->withLoginCustomerId($loginCustomerId ?? $rootCustomerId)
            ->build();

        // Creates the Google Ads Service client.
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all child accounts of the manager specified in search
        // calls below.
        $query = 'SELECT customer_client.client_customer, customer_client.level,'
            . ' customer_client.manager, customer_client.descriptive_name,'
            . ' customer_client.currency_code, customer_client.time_zone,'
            . ' customer_client.id FROM customer_client WHERE customer_client.level <= 1';

        $rootCustomerClient = null;
        // Adds the root customer ID to the list of IDs to be processed.
        $managerCustomerIdsToSearch = [$rootCustomerId];

        // Performs a breadth-first search algorithm to build an associative array mapping
        // managers to their child accounts ($customerIdsToChildAccounts).
        $customerIdsToChildAccounts = [];

        while (!empty($managerCustomerIdsToSearch)) {
            $customerIdToSearch = array_shift($managerCustomerIdsToSearch);
            // Issues a search request.
            /** @var GoogleAdsServerStreamDecorator $stream */
            $stream = $googleAdsServiceClient->searchStream(SearchGoogleAdsStreamRequest::build(
                $customerIdToSearch,
                $query
            ));

            // Iterates over all elements to get all customer clients under the specified customer's
            // hierarchy.
            foreach ($stream->iterateAllElements() as $googleAdsRow) {
                /** @var GoogleAdsRow $googleAdsRow */
                $customerClient = $googleAdsRow->getCustomerClient();

                // Gets the CustomerClient object for the root customer in the tree.
                if ($customerClient->getId() === $rootCustomerId) {
                    $rootCustomerClient = $customerClient;
                    self::$rootCustomerClients[$rootCustomerId] = $rootCustomerClient;
                }

                // The steps below map parent and children accounts. Continue here so that managers
                // accounts exclude themselves from the list of their children accounts.
                if ($customerClient->getId() === $customerIdToSearch) {
                    continue;
                }

                // For all level-1 (direct child) accounts that are a manager account, the above
                // query will be run against them to create an associative array of managers to
                // their child accounts for printing the hierarchy afterwards.
                $customerIdsToChildAccounts[$customerIdToSearch][] = $customerClient;
                // Checks if the child account is a manager itself so that it can later be processed
                // and added to the map if it hasn't been already.
                if ($customerClient->getManager()) {
                    // A customer can be managed by multiple managers, so to prevent visiting
                    // the same customer multiple times, we need to check if it's already in the
                    // map.
                    $alreadyVisited = array_key_exists(
                        $customerClient->getId(),
                        $customerIdsToChildAccounts
                    );
                    if (!$alreadyVisited && $customerClient->getLevel() === 1) {
                        array_push($managerCustomerIdsToSearch, $customerClient->getId());
                    }
                }
            }
        }

        return is_null($rootCustomerClient) ? null
            : [$rootCustomerClient->getId() => $customerIdsToChildAccounts];
    }

    /**
     * Retrieves a list of accessible customers with the provided set up credentials.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @return int[] the list of customer IDs
     */
    private static function getAccessibleCustomers(GoogleAdsClient $googleAdsClient): array
    {
        $accessibleCustomerIds = [];
        // Issues a request for listing all customers accessible by this authenticated Google
        // account.
        $customerServiceClient = $googleAdsClient->getCustomerServiceClient();
        $accessibleCustomers =
            $customerServiceClient->listAccessibleCustomers(new ListAccessibleCustomersRequest());

        print 'No manager customer ID is specified. The example will print the hierarchies of'
            . ' all accessible customer IDs:' . PHP_EOL;
        foreach ($accessibleCustomers->getResourceNames() as $customerResourceName) {
            $customer = CustomerServiceClient::parseName($customerResourceName)['customer_id'];
            print $customer . PHP_EOL;
            $accessibleCustomerIds[] = intval($customer);
        }
        print PHP_EOL;

        return $accessibleCustomerIds;
    }

    /**
     * Prints the specified account's hierarchy using recursion.
     *
     * @param CustomerClient $customerClient the customer client whose info will be printed and
     *     its child accounts will be processed if it's a manager
     * @param array $customerIdsToChildAccounts a map from customer IDs to child
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
        $customerId = $customerClient->getId();
        print str_repeat('-', $depth * 2);
        printf(
            " %d ('%s', '%s', '%s')%s",
            $customerId,
            $customerClient->getDescriptiveName(),
            $customerClient->getCurrencyCode(),
            $customerClient->getTimeZone(),
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
