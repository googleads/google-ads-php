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
use Google\Ads\GoogleAds\V18\Common\LogicalUserListInfo;
use Google\Ads\GoogleAds\V18\Common\LogicalUserListOperandInfo;
use Google\Ads\GoogleAds\V18\Common\UserListLogicalRuleInfo;
use Google\Ads\GoogleAds\V18\Enums\UserListLogicalRuleOperatorEnum\UserListLogicalRuleOperator;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\UserList;
use Google\Ads\GoogleAds\V18\Services\MutateUserListsRequest;
use Google\Ads\GoogleAds\V18\Services\UserListOperation;
use Google\ApiCore\ApiException;

/**
 * Creates a combination user list containing users that are present on any one of the provided user
 * lists.
 */
class AddLogicalUserList
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const USER_LIST_ID_1 = 'INSERT_USER_LIST_ID_1_HERE';
    private const USER_LIST_ID_2 = 'INSERT_USER_LIST_ID_2_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::USER_LIST_IDS => GetOpt::MULTIPLE_ARGUMENT
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
                $options[ArgumentNames::USER_LIST_IDS] ?:
                    [self::USER_LIST_ID_1, self::USER_LIST_ID_2]
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
     * @param array $userListIds the IDs of the lists to be used for the new combination user list
     */
    // [START add_logical_user_list]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $userListIds
    ) {
        // Adds each of the provided list IDs to a list of rule operands specifying which lists the
        // operator should target.
        $logicalUserListOperandInfoList = [];
        foreach ($userListIds as $userListId) {
            $logicalUserListOperandInfoList[] = new LogicalUserListOperandInfo([
                'user_list' => ResourceNames::forUserList($customerId, $userListId)
            ]);
        }

        // Creates the UserListLogicalRuleInfo specifying that a user should be added to the new
        // list if they are present in any of the provided lists.
        $userListLogicalRuleInfo = new UserListLogicalRuleInfo([
            // Using ANY means that a user should be added to the combined list if they are present
            // on any of the lists targeted in the LogicalUserListOperandInfo. Use ALL to add users
            // present on all of the provided lists or NONE to add users that aren't present on any
            // of the targeted lists.
            'operator' => UserListLogicalRuleOperator::ANY,
            'rule_operands' => $logicalUserListOperandInfoList
        ]);

        // Creates the new combination user list.
        $userList = new UserList([
            'name' => 'My combination list of other user lists #' . Helper::getPrintableDatetime(),
            'logical_user_list' => new LogicalUserListInfo([
                'rules' => [$userListLogicalRuleInfo]
            ])
        ]);

        // Creates the operation.
        $operation = new UserListOperation();
        $operation->setCreate($userList);

        // Issues a mutate request to add the user list and prints some information.
        $userListServiceClient = $googleAdsClient->getUserListServiceClient();
        $response = $userListServiceClient->mutateUserLists(
            MutateUserListsRequest::build($customerId, [$operation])
        );
        printf(
            "Created combination user list with resource name '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_logical_user_list]
}

AddLogicalUserList::main();
