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
use Google\Ads\GoogleAds\V18\Enums\AccessRoleEnum\AccessRole;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\CustomerUserAccess;
use Google\Ads\GoogleAds\V18\Services\CustomerUserAccessOperation;
use Google\Ads\GoogleAds\V18\Services\MutateCustomerUserAccessRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\ApiCore\ApiException;

/**
 * This code example updates the access role of a user, given the email address.
 * Note: This code example should be run as a user who is an Administrator on the Google Ads
 * account with the specified customer ID. See
 * https://support.google.com/google-ads/answer/9978556 to learn more about account access
 * levels.
 */
class UpdateUserAccess
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const EMAIL_ADDRESS = 'INSERT_EMAIL_ADDRESS_HERE';
    private const ACCESS_ROLE = 'INSERT_ACCESS_ROLE_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::EMAIL_ADDRESS => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::ACCESS_ROLE => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::EMAIL_ADDRESS] ?: self::EMAIL_ADDRESS,
                $options[ArgumentNames::ACCESS_ROLE] ?: self::ACCESS_ROLE
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
     * @param string $emailAddress the email address of the user whose access role should be updated
     * @param string $accessRole the updated access role
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $emailAddress,
        string $accessRole
    ) {
        $userId = self::getUserAccess($googleAdsClient, $customerId, $emailAddress);
        if (!is_null($userId)) {
            self::modifyUserAccess($googleAdsClient, $customerId, $userId, $accessRole);
        }
    }

    /**
     * Gets the customer user access given an email address.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $emailAddress the email address of the user whose access role should be updated
     * @return int|null the user ID if a customer is found, or null if no matching customers were
     *     found
     */
    private static function getUserAccess(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $emailAddress
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all customer user accesses.
        // Use the LIKE query for filtering to ignore the text case for email address when
        // searching for a match.
        $query = "SELECT customer_user_access.user_id, "
            . "customer_user_access.email_address, customer_user_access.access_role,"
            . "customer_user_access.access_creation_date_time FROM customer_user_access "
            . "WHERE customer_user_access.email_address LIKE '$emailAddress'";

        // Issues a search request by to retrieve the customer user accesses.
        $response =
            $googleAdsServiceClient->search(SearchGoogleAdsRequest::build($customerId, $query));
        if (iterator_count($response) > 0) {
            /** @var CustomerUserAccess $customerUserAccess */
            $customerUserAccess = $response->getIterator()->current()->getCustomerUserAccess();
            printf(
                "Customer user access with User ID = %d, Email Address = "
                . "'%s', Access Role = '%s' and Creation Time = %s was found in "
                . "Customer ID: %d.%s",
                $customerUserAccess->getUserId(),
                $customerUserAccess->getEmailAddress(),
                AccessRole::name($customerUserAccess->getAccessRole()),
                $customerUserAccess->getAccessCreationDateTime(),
                $customerId,
                PHP_EOL
            );
            return $customerUserAccess->getUserId();
        } else {
            print 'No customer user access with requested email was found.' . PHP_EOL;
            return null;
        }
    }

    /**
     * Modifies the user access role to a specified value.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $userId ID of the user whose access role is modified
     * @param string $accessRole the updated access role
     */
    private static function modifyUserAccess(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $userId,
        string $accessRole
    ) {
        // Creates the modified user access.
        $customerUserAccess = new CustomerUserAccess([
            'resource_name' => ResourceNames::forCustomerUserAccess($customerId, $userId),
            'access_role' => AccessRole::value($accessRole)
        ]);

        // Constructs an operation that will update the customer user access with the specified
        // resource name, using the FieldMasks utility to derive the update mask. This mask tells
        // the Google Ads API which attributes of the customer user access you want to change.
        $customerUserAccessOperation = new CustomerUserAccessOperation();
        $customerUserAccessOperation->setUpdate($customerUserAccess);
        $customerUserAccessOperation->setUpdateMask(
            FieldMasks::allSetFieldsOf($customerUserAccess)
        );

        // Issues a mutate request to update the customer user access.
        $customerUserAccessServiceClient = $googleAdsClient->getCustomerUserAccessServiceClient();
        $response = $customerUserAccessServiceClient->mutateCustomerUserAccess(
            MutateCustomerUserAccessRequest::build($customerId, $customerUserAccessOperation)
        );

        // Prints the resource name of the updated customer user access.
        printf(
            "Successfully modified customer user access with resource name: '%s'%s",
            $response->getResult()->getResourceName(),
            PHP_EOL
        );
    }
}

UpdateUserAccess::main();
