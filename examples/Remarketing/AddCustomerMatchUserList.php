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

namespace Google\Ads\GoogleAds\Examples\Remarketing;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\Util\V12\GoogleAdsFailures;
use Google\Ads\GoogleAds\V12\Common\CrmBasedUserListInfo;
use Google\Ads\GoogleAds\V12\Common\CustomerMatchUserListMetadata;
use Google\Ads\GoogleAds\V12\Common\OfflineUserAddressInfo;
use Google\Ads\GoogleAds\V12\Common\UserData;
use Google\Ads\GoogleAds\V12\Common\UserIdentifier;
use Google\Ads\GoogleAds\V12\Enums\CustomerMatchUploadKeyTypeEnum\CustomerMatchUploadKeyType;
use Google\Ads\GoogleAds\V12\Enums\OfflineUserDataJobStatusEnum\OfflineUserDataJobStatus;
use Google\Ads\GoogleAds\V12\Enums\OfflineUserDataJobTypeEnum\OfflineUserDataJobType;
use Google\Ads\GoogleAds\V12\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V12\Resources\OfflineUserDataJob;
use Google\Ads\GoogleAds\V12\Resources\UserList;
use Google\Ads\GoogleAds\V12\Services\AddOfflineUserDataJobOperationsResponse;
use Google\Ads\GoogleAds\V12\Services\CreateOfflineUserDataJobResponse;
use Google\Ads\GoogleAds\V12\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V12\Services\OfflineUserDataJobOperation;
use Google\Ads\GoogleAds\V12\Services\UserListOperation;
use Google\ApiCore\ApiException;

/**
 * This example uses Customer Match to create a new user list (a.k.a. audience) and adds users to
 * it.
 *
 * Note: It may take up to several hours for the list to be populated with users.
 * Email addresses must be associated with a Google account.
 * For privacy purposes, the user list size will show as zero until the list has
 * at least 1,000 users. After that, the size will be rounded to the two most
 * significant digits.
 */
class AddCustomerMatchUserList
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

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
        $userListResourceName = self::createCustomerMatchUserList($googleAdsClient, $customerId);
        self::addUsersToCustomerMatchUserList($googleAdsClient, $customerId, $userListResourceName);
        self::printCustomerMatchUserListInfo($googleAdsClient, $customerId, $userListResourceName);
    }

    /**
     * Creates a Customer Match user list.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the resource name of the newly created user list
     */
    private static function createCustomerMatchUserList(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ): string {
        // Creates the user list.
        $userList = new UserList([
            'name' => 'Customer Match list #' . Helper::getPrintableDatetime(),
            'description' => 'A list of customers that originated from email '
                . 'and physical addresses',
            // Customer Match user lists can use a membership life span of 10000 to
            // indicate unlimited; otherwise normal values apply.
            // Sets the membership life span to 30 days.
            'membership_life_span' => 30,
            'crm_based_user_list' => new CrmBasedUserListInfo([
                'upload_key_type' => CustomerMatchUploadKeyType::CONTACT_INFO
            ])
        ]);

        // Creates the user list operation.
        $operation = new UserListOperation();
        $operation->setCreate($userList);

        // Issues a mutate request to add the user list and prints some information.
        $userListServiceClient = $googleAdsClient->getUserListServiceClient();
        $response = $userListServiceClient->mutateUserLists($customerId, [$operation]);
        $userListResourceName = $response->getResults()[0]->getResourceName();
        printf("User list with resource name '%s' was created.%s", $userListResourceName, PHP_EOL);

        return $userListResourceName;
    }

    /**
     * Creates and executes an asynchronous job to add users to the Customer Match user list.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $userListResourceName the resource name of the Customer Match user list to add
     *     users to
     */
    // [START add_customer_match_user_list]
    private static function addUsersToCustomerMatchUserList(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $userListResourceName
    ) {
        $offlineUserDataJobServiceClient = $googleAdsClient->getOfflineUserDataJobServiceClient();

        // Creates a new offline user data job.
        $offlineUserDataJob = new OfflineUserDataJob([
            'type' => OfflineUserDataJobType::CUSTOMER_MATCH_USER_LIST,
            'customer_match_user_list_metadata' => new CustomerMatchUserListMetadata([
                'user_list' => $userListResourceName
            ])
        ]);

        // Issues a request to create the offline user data job.
        /** @var CreateOfflineUserDataJobResponse $createOfflineUserDataJobResponse */
        $createOfflineUserDataJobResponse =
            $offlineUserDataJobServiceClient->createOfflineUserDataJob(
                $customerId,
                $offlineUserDataJob
            );
        $offlineUserDataJobResourceName = $createOfflineUserDataJobResponse->getResourceName();
        printf(
            "Created an offline user data job with resource name: '%s'.%s",
            $offlineUserDataJobResourceName,
            PHP_EOL
        );

        // Issues a request to add the operations to the offline user data job.
        /** @var AddOfflineUserDataJobOperationsResponse $operationResponse */
        $response = $offlineUserDataJobServiceClient->addOfflineUserDataJobOperations(
            $offlineUserDataJobResourceName,
            self::buildOfflineUserDataJobOperations(),
            ['enablePartialFailure' => true]
        );

        // Prints the status message if any partial failure error is returned.
        // Note: The details of each partial failure error are not printed here, you can refer to
        // the example HandlePartialFailure.php to learn more.
        if ($response->hasPartialFailureError()) {
            // Extracts the partial failure from the response status.
            $partialFailure = GoogleAdsFailures::fromAny(
                $response->getPartialFailureError()->getDetails()->getIterator()->current()
            );
            printf(
                "%d partial failure error(s) occurred: %s.%s",
                count($partialFailure->getErrors()),
                $response->getPartialFailureError()->getMessage(),
                PHP_EOL
            );
        }
        print 'The operations are added to the offline user data job.' . PHP_EOL;

        // Issues an asynchronous request to run the offline user data job for executing all added
        // operations. The result is OperationResponse. Visit the OperationResponse.php file for
        // more details.
        $offlineUserDataJobServiceClient->runOfflineUserDataJob($offlineUserDataJobResourceName);

        // Offline user data jobs may take 6 hours or more to complete, so instead of waiting
        // for the job to complete, retrieves and displays the job status once. If the job is
        // completed successfully, prints information about the user list. Otherwise, prints the
        // query to use to check the job again later.
        self::checkJobStatus(
            $googleAdsClient,
            $customerId,
            $offlineUserDataJobResourceName,
            $userListResourceName
        );
    }
    // [END add_customer_match_user_list]

    /**
     * Builds and returns offline user data job operations to add one user identified by an
     * email address and one user identified based on a physical address.
     *
     * @return OfflineUserDataJobOperation[] an array with the operations
     */
    private static function buildOfflineUserDataJobOperations(): array
    {
        // [START add_customer_match_user_list_2]
        // Creates a first user data based on an email address.
        $userDataWithEmailAddress = new UserData([
            'user_identifiers' => [
                new UserIdentifier([
                    // Hash normalized email addresses based on SHA-256 hashing algorithm.
                    'hashed_email' => self::normalizeAndHash('customer@example.com')
                ])
            ]
        ]);

        // Creates a second user data based on a physical address.
        $userDataWithPhysicalAddress = new UserData([
            'user_identifiers' => [
                new UserIdentifier([
                    'address_info' => new OfflineUserAddressInfo([
                        // First and last name must be normalized and hashed.
                        'hashed_first_name' => self::normalizeAndHash('John'),
                        'hashed_last_name' => self::normalizeAndHash('Doe'),
                        // Country code and zip code are sent in plain text.
                        'country_code' => 'US',
                        'postal_code' => '10011'
                    ])
                ])
            ]
        ]);
        // [END add_customer_match_user_list_2]

        // Creates the operations to add the two users.
        $operations = [
            new OfflineUserDataJobOperation(['create' => $userDataWithEmailAddress]),
            new OfflineUserDataJobOperation(['create' => $userDataWithPhysicalAddress])
        ];

        return $operations;
    }

    /**
     * Retrieves, checks, and prints the status of the offline user data job.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $offlineUserDataJobResourceName the resource name of the offline user data job
     *     to get the status for
     * @param string $userListResourceName the resource name of the Customer Match user list
     */
    private static function checkJobStatus(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $offlineUserDataJobResourceName,
        string $userListResourceName
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();

        // Creates a query that retrieves the offline user data job.
        $query = "SELECT offline_user_data_job.resource_name, "
              . "offline_user_data_job.id, "
              . "offline_user_data_job.status, "
              . "offline_user_data_job.type, "
              . "offline_user_data_job.failure_reason "
              . "FROM offline_user_data_job "
              . "WHERE offline_user_data_job.resource_name = '$offlineUserDataJobResourceName'";

        // Issues a search request to get the GoogleAdsRow containing the job from the response.
        /** @var GoogleAdsRow $googleAdsRow */
        $googleAdsRow =
            $googleAdsServiceClient->search($customerId, $query)->getIterator()->current();
        $offlineUserDataJob = $googleAdsRow->getOfflineUserDataJob();

        // Prints out some information about the offline user data job.
        $offlineUserDataJobStatus = $offlineUserDataJob->getStatus();
        printf(
            "Offline user data job ID %d with type '%s' has status: %s.%s",
            $offlineUserDataJob->getId(),
            OfflineUserDataJobType::name($offlineUserDataJob->getType()),
            OfflineUserDataJobStatus::name($offlineUserDataJobStatus),
            PHP_EOL
        );

        if ($offlineUserDataJobStatus === OfflineUserDataJobStatus::SUCCESS) {
            // Prints information about the user list.
            self::printCustomerMatchUserListInfo(
                $googleAdsClient,
                $customerId,
                $userListResourceName
            );
        } elseif ($offlineUserDataJobStatus === OfflineUserDataJobStatus::FAILED) {
            printf("  Failure reason: %s.%s", $offlineUserDataJob->getFailureReason(), PHP_EOL);
        } elseif (
            $offlineUserDataJobStatus === OfflineUserDataJobStatus::PENDING
            || $offlineUserDataJobStatus === OfflineUserDataJobStatus::RUNNING
        ) {
            printf(
                '%1$sTo check the status of the job periodically, use the following GAQL query with'
                . ' GoogleAdsService.search:%1$s%2$s%1$s',
                PHP_EOL,
                $query
            );
        }
    }

    /**
     * Prints information about the Customer Match user list.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $userListResourceName the resource name of the Customer Match user list to
     *     print information about
     */
    private static function printCustomerMatchUserListInfo(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $userListResourceName
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();

        // Creates a query that retrieves the user list.
        $query =
            "SELECT user_list.size_for_display, user_list.size_for_search " .
            "FROM user_list " .
            "WHERE user_list.resource_name = '$userListResourceName'";

        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream($customerId, $query);

        // Prints out some information about the user list.
        /** @var GoogleAdsRow $googleAdsRow */
        $googleAdsRow = $stream->iterateAllElements()->current();
        printf(
            "The estimated number of users that the user list '%s' has is %d for Display " .
             "and %d for Search.%s",
            $googleAdsRow->getUserList()->getResourceName(),
            $googleAdsRow->getUserList()->getSizeForDisplay(),
            $googleAdsRow->getUserList()->getSizeForSearch(),
            PHP_EOL
        );
        print 'Reminder: It may take several hours for the user list to be populated with the ' .
            'users so getting zeros for the estimations is expected.' . PHP_EOL;
    }

    /**
     * Normalizes and hashes a string value.
     *
     * @param string $value the value to normalize and hash
     * @return string the normalized and hashed value
     */
    private static function normalizeAndHash(string $value): string
    {
        return hash('sha256', strtolower(trim($value)));
    }
}

AddCustomerMatchUserList::main();
