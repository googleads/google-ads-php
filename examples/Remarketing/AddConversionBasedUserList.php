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
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\BasicUserListInfo;
use Google\Ads\GoogleAds\V18\Common\UserListActionInfo;
use Google\Ads\GoogleAds\V18\Enums\UserListMembershipStatusEnum\UserListMembershipStatus;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\UserList;
use Google\Ads\GoogleAds\V18\Services\MutateUserListsRequest;
use Google\Ads\GoogleAds\V18\Services\UserListOperation;
use Google\ApiCore\ApiException;

/**
 * Creates a basic user list consisting of people who triggered one or more conversion actions.
 */
class AddConversionBasedUserList
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CONVERSION_ACTION_ID_1 = 'INSERT_CONVERSION_ACTION_ID_1_HERE';
    private const CONVERSION_ACTION_ID_2 = 'INSERT_CONVERSION_ACTION_ID_2_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CONVERSION_ACTION_IDS => GetOpt::MULTIPLE_ARGUMENT
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
                $options[ArgumentNames::CONVERSION_ACTION_IDS] ?:
                    [self::CONVERSION_ACTION_ID_1, self::CONVERSION_ACTION_ID_2]
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
     * @param array $conversionActionIds the IDs of the conversion actions for the basic user list
     */
    // [START add_conversion_based_user_list]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $conversionActionIds
    ) {
        $userListActionInfoList = [];
        foreach ($conversionActionIds as $conversionActionId) {
            // Creates the UserListActionInfo object for a given conversion action. This specifies
            // the conversion action that, when triggered, will cause a user to be added to a
            // UserList.
            $userListActionInfoList[] = new UserListActionInfo([
                'conversion_action' => ResourceNames::forConversionAction(
                    $customerId,
                    $conversionActionId
                )
            ]);
        }

        // Creates a basic user list info object with all of the conversion actions.
        $basicUserListInfo = new BasicUserListInfo(['actions' => $userListActionInfoList]);

        // Creates the basic user list.
        $basicUserList = new UserList([
            'name' => 'Example BasicUserList #' . Helper::getPrintableDatetime(),
            'description' => 'A list of people who have triggered one or more conversion actions',
            'membership_status' => UserListMembershipStatus::OPEN,
            'membership_life_span' => 365,
            'basic_user_list' => $basicUserListInfo
        ]);

        // Creates the operation.
        $operation = new UserListOperation();
        $operation->setCreate($basicUserList);

        // Issues a mutate request to add the user list and prints some information.
        $userListServiceClient = $googleAdsClient->getUserListServiceClient();
        $response = $userListServiceClient->mutateUserLists(
            MutateUserListsRequest::build($customerId, [$operation])
        );
        printf(
            "Created basic user list with resource name '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_conversion_based_user_list]
}

AddConversionBasedUserList::main();
