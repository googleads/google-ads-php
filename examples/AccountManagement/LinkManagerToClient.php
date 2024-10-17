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
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Enums\ManagerLinkStatusEnum\ManagerLinkStatus;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\CustomerClientLink;
use Google\Ads\GoogleAds\V18\Resources\CustomerManagerLink;
use Google\Ads\GoogleAds\V18\Services\CustomerClientLinkOperation;
use Google\Ads\GoogleAds\V18\Services\CustomerManagerLinkOperation;
use Google\Ads\GoogleAds\V18\Services\MutateCustomerClientLinkRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCustomerManagerLinkRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;

/**
 * This example demonstrates how to link an existing Google Ads manager customer
 * account to an existing Google Ads client customer account.
 */
class LinkManagerToClient
{
    private const MANAGER_CUSTOMER_ID = 'INSERT_MANAGER_CUSTOMER_ID_HERE';
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::MANAGER_CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT
        ]);

        try {
            self::runExample(
                $options[ArgumentNames::MANAGER_CUSTOMER_ID] ?: self::MANAGER_CUSTOMER_ID,
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
     * This example assumes that the same credentials will work for both customers,
     * but that may not be the case. If you need to use different credentials
     * for each customer, then you may either update the client configuration or
     * instantiate the clients accordingly, one for each set of credentials. Always make
     * sure to update the configuration before fetching any services you need to use.
     *
     * @param int $managerCustomerId the manager customer ID
     * @param int $clientCustomerId the customer ID
     */
    // [START link_manager_to_client]
    public static function runExample(int $managerCustomerId, int $clientCustomerId)
    {
        // Extends an invitation to the client while authenticating as the manager.
        $customerClientLinkResourceName = self::createInvitation(
            $managerCustomerId,
            $clientCustomerId
        );

        // Retrieves the manager link information.
        $managerLinkResourceName = self::getManagerLinkResourceName(
            $managerCustomerId,
            $clientCustomerId,
            $customerClientLinkResourceName
        );

        // Accepts the manager's invitation while authenticating as the client.
        self::acceptInvitation($clientCustomerId, $managerLinkResourceName);
    }

    /**
     * Extends an invitation from a manager customer to a client customer.
     *
     * @param int $managerCustomerId the manager customer ID
     * @param int $clientCustomerId the customer ID
     * @return string the resource name of the customer client link created for the invitation
     */
    private static function createInvitation(
        int $managerCustomerId,
        int $clientCustomerId
    ) {
        // Creates a client with the manager customer ID as login customer ID.
        $googleAdsClient = self::createGoogleAdsClient($managerCustomerId);

        // Creates a customer client link.
        $customerClientLink = new CustomerClientLink([
            // Sets the client customer to invite.
            'client_customer' => ResourceNames::forCustomer($clientCustomerId),
            'status' => ManagerLinkStatus::PENDING
        ]);

        // Creates a customer client link operation for creating the one above.
        $customerClientLinkOperation = new CustomerClientLinkOperation();
        $customerClientLinkOperation->setCreate($customerClientLink);

        // Issues a mutate request to create the customer client link.
        $customerClientLinkServiceClient = $googleAdsClient->getCustomerClientLinkServiceClient();
        $response = $customerClientLinkServiceClient->mutateCustomerClientLink(
            MutateCustomerClientLinkRequest::build(
                $managerCustomerId,
                $customerClientLinkOperation
            )
        );

        // Prints the result.
        $customerClientLinkResourceName = $response->getResult()->getResourceName();
        printf(
            "An invitation has been extended from the manager customer %d" .
            " to the client customer %d with the customer client link resource name '%s'.%s",
            $managerCustomerId,
            $clientCustomerId,
            $customerClientLinkResourceName,
            PHP_EOL
        );

        // Returns the resource name of the created customer client link.
        return $customerClientLinkResourceName;
    }

    /**
     * Retrieves the manager link resource name of a customer client link given its resource name.
     *
     * @param int $managerCustomerId the manager customer ID
     * @param int $clientCustomerId the customer ID
     * @param string $customerClientLinkResourceName the customer client link resource name
     * @return string the manager link resource name
     */
    private static function getManagerLinkResourceName(
        int $managerCustomerId,
        int $clientCustomerId,
        string $customerClientLinkResourceName
    ) {
        // Creates a client with the manager customer ID as login customer ID.
        $googleAdsClient = self::createGoogleAdsClient($managerCustomerId);

        // Creates the query.
        $query = "SELECT customer_client_link.manager_link_id FROM customer_client_link" .
            " WHERE customer_client_link.resource_name = '$customerClientLinkResourceName'";

        // Issues a search request.
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response = $googleAdsServiceClient->search(
            SearchGoogleAdsRequest::build($managerCustomerId, $query)
        );

        // Gets the ID and resource name associated to the manager link found.
        $managerLinkId = $response->getIterator()->current()
            ->getCustomerClientLink()
            ->getManagerLinkId();
        $managerLinkResourceName = ResourceNames::forCustomerManagerLink(
            $clientCustomerId,
            $managerCustomerId,
            $managerLinkId
        );

        // Prints the result.
        printf(
            "Retrieved the manager link of the customer client link:" .
            " its ID is %d and its resource name is '%s'.%s",
            $managerLinkId,
            $managerLinkResourceName,
            PHP_EOL
        );

        // Returns the resource name of the manager link found.
        return $managerLinkResourceName;
    }

    /**
     * Accepts an invitation.
     *
     * @param int $clientCustomerId the customer ID
     * @param string $managerLinkResourceName the resource name of the manager link to accept
     */
    private static function acceptInvitation(
        int $clientCustomerId,
        string $managerLinkResourceName
    ) {
        // Creates a client with the client customer ID as login customer ID.
        $googleAdsClient = self::createGoogleAdsClient($clientCustomerId);

        // Creates the customer manager link with the updated status.
        $customerManagerLink = new CustomerManagerLink();
        $customerManagerLink->setResourceName($managerLinkResourceName);
        $customerManagerLink->setStatus(ManagerLinkStatus::ACTIVE);

        // Creates a customer manager link operation for updating the one above.
        $customerManagerLinkOperation = new CustomerManagerLinkOperation();
        $customerManagerLinkOperation->setUpdate($customerManagerLink);
        $customerManagerLinkOperation->setUpdateMask(
            FieldMasks::allSetFieldsOf($customerManagerLink)
        );

        // Issues a mutate request to update the customer manager link.
        $customerManagerLinkServiceClient =
            $googleAdsClient->getCustomerManagerLinkServiceClient();
        $response = $customerManagerLinkServiceClient->mutateCustomerManagerLink(
            MutateCustomerManagerLinkRequest::build(
                $clientCustomerId,
                [$customerManagerLinkOperation]
            )
        );

        // Prints the result.
        printf(
            "The client %d accepted the invitation with the resource name '%s'.%s",
            $clientCustomerId,
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END link_manager_to_client]

    /**
     * Creates a Google Ads client based on the default configuration file
     * and a given login customer id.
     *
     * @param int $loginCustomerId  the login customer ID
     * @return GoogleAdsClient the created client
     */
    private static function createGoogleAdsClient(int $loginCustomerId)
    {
        // Generates a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())
            // Sets the properties based on the default properties file
            ->fromFile()
            ->build();

        // Builds and returns the Google Ads client
        return (new GoogleAdsClientBuilder())
            // Sets the properties based on the default properties file
            ->fromFile()
            // Uses the OAuth2 credentials created above.
            ->withOAuth2Credential($oAuth2Credential)
            // Overrides the login customer ID with the given one.
            ->withLoginCustomerId($loginCustomerId)
            ->build();
    }
}

LinkManagerToClient::main();
