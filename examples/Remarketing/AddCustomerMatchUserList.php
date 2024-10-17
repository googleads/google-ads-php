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
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\Util\V18\GoogleAdsFailures;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\Consent;
use Google\Ads\GoogleAds\V18\Common\CrmBasedUserListInfo;
use Google\Ads\GoogleAds\V18\Common\CustomerMatchUserListMetadata;
use Google\Ads\GoogleAds\V18\Common\OfflineUserAddressInfo;
use Google\Ads\GoogleAds\V18\Common\UserData;
use Google\Ads\GoogleAds\V18\Common\UserIdentifier;
use Google\Ads\GoogleAds\V18\Enums\ConsentStatusEnum\ConsentStatus;
use Google\Ads\GoogleAds\V18\Enums\CustomerMatchUploadKeyTypeEnum\CustomerMatchUploadKeyType;
use Google\Ads\GoogleAds\V18\Enums\OfflineUserDataJobStatusEnum\OfflineUserDataJobStatus;
use Google\Ads\GoogleAds\V18\Enums\OfflineUserDataJobTypeEnum\OfflineUserDataJobType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\OfflineUserDataJob;
use Google\Ads\GoogleAds\V18\Resources\UserList;
use Google\Ads\GoogleAds\V18\Services\AddOfflineUserDataJobOperationsRequest;
use Google\Ads\GoogleAds\V18\Services\AddOfflineUserDataJobOperationsResponse;
use Google\Ads\GoogleAds\V18\Services\CreateOfflineUserDataJobRequest;
use Google\Ads\GoogleAds\V18\Services\CreateOfflineUserDataJobResponse;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\MutateUserListsRequest;
use Google\Ads\GoogleAds\V18\Services\OfflineUserDataJobOperation;
use Google\Ads\GoogleAds\V18\Services\RunOfflineUserDataJobRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsStreamRequest;
use Google\Ads\GoogleAds\V18\Services\UserListOperation;
use Google\ApiCore\ApiException;

/**
 * Creates operations to add members to a user list (a.k.a. audience) using an OfflineUserDataJob,
 * and if requested, runs the job.
 *
 * If a job ID is specified, this example adds operations to that job. Otherwise, it creates a
 * new job for the operations.
 *
 * IMPORTANT: Your application should create a single job containing all of the operations for a
 * user list. This will be far more efficient than creating and running multiple jobs that each
 * contain a small set of operations.
 *
 * Note:
 * - This feature is only available to accounts that meet the requirements described at
 *   https://support.google.com/adspolicy/answer/6299717.
 * - It may take up to several hours for the list to be populated with users.
 * - Email addresses must be associated with a Google account.
 * - For privacy purposes, the user list size will show as zero until the list has
 *   at least 1,000 users. After that, the size will be rounded to the two most
 *   significant digits.
 */
class AddCustomerMatchUserList
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Optional: The ID of an existing user list. If not specified, this example will create a new
    // user list.
    private const USER_LIST_ID = null;
    // Optional: The ID of an existing offline user data job in the PENDING state. If not specified,
    // this example will create a new job.
    private const OFFLINE_USER_DATA_JOB_ID = null;
    // Optional: The consent status for ad personalization.
    private const AD_PERSONALIZATION_CONSENT = null;
    // Optional: The consent status for ad user data.
    private const AD_USER_DATA_CONSENT = null;
    // Optional: If true, runs the offline user data job after adding operations. The default value
    // is false.
    private const RUN_JOB = false;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::RUN_JOB => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::USER_LIST_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::OFFLINE_USER_DATA_JOB_ID => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::AD_PERSONALIZATION_CONSENT => GetOpt::OPTIONAL_ARGUMENT,
            ArgumentNames::AD_USER_DATA_CONSENT => GetOpt::OPTIONAL_ARGUMENT
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
                filter_var(
                    $options[ArgumentNames::RUN_JOB] ?: self::RUN_JOB,
                    FILTER_VALIDATE_BOOLEAN
                ),
                $options[ArgumentNames::USER_LIST_ID] ?: self::USER_LIST_ID,
                $options[ArgumentNames::OFFLINE_USER_DATA_JOB_ID] ?: self::OFFLINE_USER_DATA_JOB_ID,
                $options[ArgumentNames::AD_PERSONALIZATION_CONSENT]
                    ? ConsentStatus::value($options[ArgumentNames::AD_PERSONALIZATION_CONSENT])
                    : self::AD_PERSONALIZATION_CONSENT,
                $options[ArgumentNames::AD_USER_DATA_CONSENT]
                    ? ConsentStatus::value($options[ArgumentNames::AD_USER_DATA_CONSENT])
                    : self::AD_USER_DATA_CONSENT
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
     * @param bool $runJob if true, run the offline user data job after adding operations.
     *     Otherwise, only adds operations to the job
     * @param int|null $userListId optional ID of an existing user list. If `null`, creates a new
     *     user list
     * @param int|null $offlineUserDataJobId optional ID of an existing OfflineUserDataJob in the
     *     PENDING state. If `null`, create a new job
     * @param int|null $adPersonalizationConsent consent status for ad personalization for all
     *     members in the job
     * @param int|null $adUserDataConsent the consent status for ad user data for all members in
     *     the job
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        bool $runJob,
        ?int $userListId,
        ?int $offlineUserDataJobId,
        ?int $adPersonalizationConsent,
        ?int $adUserDataConsent
    ) {
        $userListResourceName = null;
        if (is_null($offlineUserDataJobId)) {
            if (is_null($userListId)) {
                // Creates a Customer Match user list.
                $userListResourceName =
                    self::createCustomerMatchUserList($googleAdsClient, $customerId);
            } else {
                // Uses the specified Customer Match user list.
                $userListResourceName = ResourceNames::forUserList($customerId, $userListId);
            }
        }
        self::addUsersToCustomerMatchUserList(
            $googleAdsClient,
            $customerId,
            $runJob,
            $userListResourceName,
            $offlineUserDataJobId,
            $adPersonalizationConsent,
            $adUserDataConsent
        );
    }

    /**
     * Creates a Customer Match user list.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the resource name of the newly created user list
     */
    // [START add_customer_match_user_list_3]
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
                // Sets the upload key type to indicate the type of identifier that will be used to
                // add users to the list. This field is immutable and required for a CREATE
                // operation.
                'upload_key_type' => CustomerMatchUploadKeyType::CONTACT_INFO
            ])
        ]);

        // Creates the user list operation.
        $operation = new UserListOperation();
        $operation->setCreate($userList);

        // Issues a mutate request to add the user list and prints some information.
        $userListServiceClient = $googleAdsClient->getUserListServiceClient();
        $response = $userListServiceClient->mutateUserLists(
            MutateUserListsRequest::build($customerId, [$operation])
        );
        $userListResourceName = $response->getResults()[0]->getResourceName();
        printf("User list with resource name '%s' was created.%s", $userListResourceName, PHP_EOL);

        return $userListResourceName;
    }
    // [END add_customer_match_user_list_3]

    /**
     * Creates and executes an asynchronous job to add users to the Customer Match user list.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param bool $runJob if true, run the offline user data job after adding operations.
     *     Otherwise, only adds operations to the job
     * @param int|null $userListId optional ID of an existing user list. If `null`, creates a new
     *     user list
     * @param int|null $offlineUserDataJobId optional ID of an existing OfflineUserDataJob in the
     *     PENDING state. If `null`, create a new job
     * @param int|null $adPersonalizationConsent consent status for ad personalization for all
     *     members in the job. Only used if $offlineUserDataJobId is `null`
     * @param int|null $adUserDataConsent consent status for ad user data for all members in the
     *     job. Only used if $offlineUserDataJobId is `null`
     */
    // [START add_customer_match_user_list]
    private static function addUsersToCustomerMatchUserList(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        bool $runJob,
        ?string $userListResourceName,
        ?int $offlineUserDataJobId,
        ?int $adPersonalizationConsent,
        ?int $adUserDataConsent
    ) {
        $offlineUserDataJobServiceClient =
            $googleAdsClient->getOfflineUserDataJobServiceClient();

        if (is_null($offlineUserDataJobId)) {
            // Creates a new offline user data job.
            $offlineUserDataJob = new OfflineUserDataJob([
                'type' => OfflineUserDataJobType::CUSTOMER_MATCH_USER_LIST,
                'customer_match_user_list_metadata' => new CustomerMatchUserListMetadata([
                    'user_list' => $userListResourceName
                ])
            ]);
            // Adds consent information to the job if specified.
            if (!empty($adPersonalizationConsent) || !empty($adUserDataConsent)) {
                $consent = new Consent();
                if (!empty($adPersonalizationConsent)) {
                    $consent->setAdPersonalization($adPersonalizationConsent);
                }
                if (!empty($adUserDataConsent)) {
                    $consent->setAdUserData($adUserDataConsent);
                }
                // Specifies whether user consent was obtained for the data you are uploading. See
                // https://www.google.com/about/company/user-consent-policy for details.
                $offlineUserDataJob->getCustomerMatchUserListMetadata()->setConsent($consent);
            }

            // Issues a request to create the offline user data job.
            /** @var CreateOfflineUserDataJobResponse $createOfflineUserDataJobResponse */
            $createOfflineUserDataJobResponse =
                $offlineUserDataJobServiceClient->createOfflineUserDataJob(
                    CreateOfflineUserDataJobRequest::build($customerId, $offlineUserDataJob)
                );
            $offlineUserDataJobResourceName = $createOfflineUserDataJobResponse->getResourceName();
            printf(
                "Created an offline user data job with resource name: '%s'.%s",
                $offlineUserDataJobResourceName,
                PHP_EOL
            );
        } else {
            // Reuses the specified offline user data job.
            $offlineUserDataJobResourceName =
                ResourceNames::forOfflineUserDataJob($customerId, $offlineUserDataJobId);
        }

        // Issues a request to add the operations to the offline user data job. This example
        // only adds a few operations, so it only sends one AddOfflineUserDataJobOperations request.
        // If your application is adding a large number of operations, split the operations into
        // batches and send multiple AddOfflineUserDataJobOperations requests for the SAME job. See
        // https://developers.google.com/google-ads/api/docs/remarketing/audience-types/customer-match#customer_match_considerations
        // and https://developers.google.com/google-ads/api/docs/best-practices/quotas#user_data
        // for more information on the per-request limits.
        /** @var AddOfflineUserDataJobOperationsResponse $operationResponse */
        $response = $offlineUserDataJobServiceClient->addOfflineUserDataJobOperations(
            AddOfflineUserDataJobOperationsRequest::build(
                $offlineUserDataJobResourceName,
                self::buildOfflineUserDataJobOperations()
            )->setEnablePartialFailure(true)
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
        } else {
            print 'The operations are added to the offline user data job.' . PHP_EOL;
        }

        if ($runJob === false) {
            printf(
                "Not running offline user data job '%s', as requested.%s",
                $offlineUserDataJobResourceName,
                PHP_EOL
            );
            return;
        }

        // Issues an asynchronous request to run the offline user data job for executing all added
        // operations. The result is OperationResponse. Visit the OperationResponse.php file for
        // more details.
        $offlineUserDataJobServiceClient->runOfflineUserDataJob(
            RunOfflineUserDataJobRequest::build($offlineUserDataJobResourceName)
        );

        // Offline user data jobs may take 6 hours or more to complete, so instead of waiting
        // for the job to complete, retrieves and displays the job status once. If the job is
        // completed successfully, prints information about the user list. Otherwise, prints the
        // query to use to check the job again later.
        self::checkJobStatus($googleAdsClient, $customerId, $offlineUserDataJobResourceName);
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
        // Creates a raw input list of unhashed user information, where each element of the list
        // represents a single user and is a map containing a separate entry for the keys 'email',
        // 'phone', 'firstName', 'lastName', 'countryCode', and 'postalCode'. In your application,
        // this data might come from a file or a database.
        $rawRecords = [];
        // The first user data has an email address and a phone number.
        $rawRecord1 = [
            // The first user data has an email address and a phone number.
            'email' => 'dana@example.com',
            // Phone number to be converted to E.164 format, with a leading '+' as required. This
            // includes whitespace that will be removed later.
            'phone' => '+1 800 5550101'
        ];
        $rawRecords[] = $rawRecord1;

        // The second user data has an email address, a mailing address, and a phone number.
        $rawRecord2 = [
            // Email address that includes a period (.) before the Gmail domain.
            'email' => 'alex.2@example.com',
            // Address that includes all four required elements: first name, last name, country
            // code, and postal code.
            'firstName' => 'Alex',
            'lastName' => 'Quinn',
            'countryCode' => 'US',
            'postalCode' => '94045',
            // Phone number to be converted to E.164 format, with a leading '+' as required.
            'phone' => '+1 800 5550102',
        ];
        $rawRecords[] = $rawRecord2;

        // The third user data only has an email address.
        $rawRecord3 = ['email' => 'charlie@example.com'];
        $rawRecords[] = $rawRecord3;

        // Iterates over the raw input list and creates a UserData object for each record.
        $userDataList = [];
        foreach ($rawRecords as $rawRecord) {
            // Checks if the record has email, phone, or address information, and adds a SEPARATE
            // UserIdentifier object for each one found. For example, a record with an email address
            // and a phone number will result in a UserData with two UserIdentifiers.

            // IMPORTANT: Since the identifier attribute of UserIdentifier
            // (https://developers.google.com/google-ads/api/reference/rpc/latest/UserIdentifier) is
            // a oneof
            // (https://protobuf.dev/programming-guides/proto3/#oneof-features), you must set only
            // ONE of 'hashed_email, 'hashed_phone_number', 'mobile_id', 'third_party_user_id', or
            // 'address_info'.
            // Setting more than one of these attributes on the same UserIdentifier will clear all
            // the other members of the oneof. For example, the following code is INCORRECT and will
            // result in a UserIdentifier with ONLY a 'hashed_phone_number'.
            //
            // $incorrectlyPopulatedUserIdentifier = new UserIdentifier();
            // $incorrectlyPopulatedUserIdentifier->setHashedEmail('...');
            // $incorrectlyPopulatedUserIdentifier->setHashedPhoneNumber('...');
            //
            // The separate 'if' statements below demonstrate the correct approach for creating a
            // UserData for a member with multiple UserIdentifiers.

            $userIdentifiers = [];
            // Checks if the record has an email address, and if so, adds a UserIdentifier for it.
            if (array_key_exists('email', $rawRecord)) {
                $hashedEmailIdentifier = new UserIdentifier([
                    'hashed_email' => self::normalizeAndHash($rawRecord['email'], true)
                ]);
                // Adds the hashed email identifier to the user identifiers list.
                $userIdentifiers[] = $hashedEmailIdentifier;
            }

            // Checks if the record has a phone number, and if so, adds a UserIdentifier for it.
            if (array_key_exists('phone', $rawRecord)) {
                $hashedPhoneNumberIdentifier = new UserIdentifier([
                    'hashed_phone_number' => self::normalizeAndHash($rawRecord['phone'], true)
                ]);
                // Adds the hashed email identifier to the user identifiers list.
                $userIdentifiers[] = $hashedPhoneNumberIdentifier;
            }

            // Checks if the record has all the required mailing address elements, and if so, adds a
            // UserIdentifier for the mailing address.
            if (array_key_exists('firstName', $rawRecord)) {
                // Checks if the record contains all the other required elements of a mailing
                // address.
                $missingAddressKeys = [];
                foreach (['lastName', 'countryCode', 'postalCode'] as $addressKey) {
                    if (!array_key_exists($addressKey, $rawRecord)) {
                        $missingAddressKeys[] = $addressKey;
                    }
                }
                if (!empty($missingAddressKeys)) {
                    printf(
                        "Skipping addition of mailing address information because the "
                        . "following required keys are missing: %s%s",
                        json_encode($missingAddressKeys),
                        PHP_EOL
                    );
                } else {
                    // Creates an OfflineUserAddressInfo object that contains all the required
                    // elements of a mailing address.
                    $addressIdentifier = new UserIdentifier([
                       'address_info' => new OfflineUserAddressInfo([
                           'hashed_first_name' => self::normalizeAndHash(
                               $rawRecord['firstName'],
                               false
                           ),
                           'hashed_last_name' => self::normalizeAndHash(
                               $rawRecord['lastName'],
                               false
                           ),
                           'country_code' => $rawRecord['countryCode'],
                           'postal_code' => $rawRecord['postalCode']
                       ])
                    ]);
                    // Adds the address identifier to the user identifiers list.
                    $userIdentifiers[] = $addressIdentifier;
                }
            }
            if (!empty($userIdentifiers)) {
                // Builds the UserData and adds it to the list.
                $userDataList[] = new UserData(['user_identifiers' => $userIdentifiers]);
            }
        }

        // Creates the operations to add users.
        $operations = array_map(
            function (UserData $userData) {
                return new OfflineUserDataJobOperation(['create' => $userData]);
            },
            $userDataList
        );
        // [END add_customer_match_user_list_2]
        return $operations;
    }

    /**
     * Retrieves, checks, and prints the status of the offline user data job.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $offlineUserDataJobResourceName the resource name of the offline user data job
     *     to get the status for
     */
    // [START add_customer_match_user_list_4]
    private static function checkJobStatus(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $offlineUserDataJobResourceName
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();

        // Creates a query that retrieves the offline user data job.
        $query = "SELECT offline_user_data_job.resource_name, "
              . "offline_user_data_job.id, "
              . "offline_user_data_job.status, "
              . "offline_user_data_job.type, "
              . "offline_user_data_job.failure_reason, "
              . "offline_user_data_job.customer_match_user_list_metadata.user_list "
              . "FROM offline_user_data_job "
              . "WHERE offline_user_data_job.resource_name = '$offlineUserDataJobResourceName'";

        // Issues a search request to get the GoogleAdsRow containing the job from the response.
        /** @var GoogleAdsRow $googleAdsRow */
        $googleAdsRow =
            $googleAdsServiceClient->search(SearchGoogleAdsRequest::build($customerId, $query))
                ->getIterator()
                ->current();
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
                $offlineUserDataJob->getCustomerMatchUserListMetadata()->getUserList()
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
    // [END add_customer_match_user_list_4]

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
        // [START add_customer_match_user_list_5]
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();

        // Creates a query that retrieves the user list.
        $query =
            "SELECT user_list.size_for_display, user_list.size_for_search " .
            "FROM user_list " .
            "WHERE user_list.resource_name = '$userListResourceName'";

        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($customerId, $query)
        );
        // [END add_customer_match_user_list_5]

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
     * @param bool $trimIntermediateSpaces if true, removes leading, trailing, and intermediate
     *     spaces from the string before hashing. If false, only removes leading and trailing
     *     spaces from the string before hashing.
     * @return string the normalized and hashed value
     */
    private static function normalizeAndHash(string $value, bool $trimIntermediateSpaces): string
    {
        // Normalizes by first converting all characters to lowercase, then trimming spaces.
        $normalized = strtolower($value);
        if ($trimIntermediateSpaces === true) {
            // Removes leading, trailing, and intermediate spaces.
            $normalized = str_replace(' ', '', $normalized);
        } else {
            // Removes only leading and trailing spaces.
            $normalized = trim($normalized);
        }
        return hash('sha256', $normalized);
    }
}

AddCustomerMatchUserList::main();
