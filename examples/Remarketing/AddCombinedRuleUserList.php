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
use Google\Ads\GoogleAds\V12\Common\CombinedRuleUserListInfo;
use Google\Ads\GoogleAds\V12\Common\RuleBasedUserListInfo;
use Google\Ads\GoogleAds\V12\Common\UserListRuleInfo;
use Google\Ads\GoogleAds\V12\Common\UserListRuleItemGroupInfo;
use Google\Ads\GoogleAds\V12\Common\UserListRuleItemInfo;
use Google\Ads\GoogleAds\V12\Common\UserListStringRuleItemInfo;
use Google\Ads\GoogleAds\V12\Enums\UserListCombinedRuleOperatorEnum\UserListCombinedRuleOperator;
use Google\Ads\GoogleAds\V12\Enums\UserListMembershipStatusEnum\UserListMembershipStatus;
use Google\Ads\GoogleAds\V12\Enums\UserListPrepopulationStatusEnum\UserListPrepopulationStatus;
use Google\Ads\GoogleAds\V12\Enums\UserListStringRuleItemOperatorEnum\UserListStringRuleItemOperator;
use Google\Ads\GoogleAds\V12\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V12\Resources\UserList;
use Google\Ads\GoogleAds\V12\Services\UserListOperation;
use Google\ApiCore\ApiException;

/**
 * Creates a rule-based user list defined by a combination of rules for users who have visited two
 * different pages of a website.
 */
class AddCombinedRuleUserList
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const URL_STRING = 'url__';

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
    // [START add_combined_rule_user_list]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // Creates a rule targeting any user that visited a url that equals
        // http://example.com/example1'.
        $userVisitedSite1Rule = new UserListRuleItemInfo([
            // Uses a built-in parameter to create a domain URL rule.
            'name' => self::URL_STRING,
            'string_rule_item' => new UserListStringRuleItemInfo([
                'operator' => UserListStringRuleItemOperator::EQUALS,
                'value' => 'http://example.com/example1'
            ])
        ]);

        // Creates a UserListRuleInfo object containing the first rule.
        $userVisitedSite1RuleInfo = new UserListRuleInfo([
            'rule_item_groups' => [
                new UserListRuleItemGroupInfo([
                    'rule_items' => [$userVisitedSite1Rule]
                ])
            ]
        ]);

        // Creates a rule targeting any user that visited a url that equals
        // http://example.com/example2'.
        $userVisitedSite2Rule = new UserListRuleItemInfo([
            // Uses a built-in parameter to create a domain URL rule.
            'name' => self::URL_STRING,
            'string_rule_item' => new UserListStringRuleItemInfo([
                'operator' => UserListStringRuleItemOperator::EQUALS,
                'value' => 'http://example.com/example2'
            ])
        ]);

        // Creates a UserListRuleInfo object containing the second rule.
        $userVisitedSite2RuleInfo = new UserListRuleInfo([
            'rule_item_groups' => [
                new UserListRuleItemGroupInfo([
                    'rule_items' => [$userVisitedSite2Rule]
                ])
            ]
        ]);

        // Creates the user list where "Visitors of a page who did visit another page". To create a
        // user list where "Visitors of a page who did not visit another page", change the
        // UserListCombinedRuleOperator from PBAND to AND_NOT.
        $combinedRuleUserListInfo = new CombinedRuleUserListInfo([
            'left_operand' => $userVisitedSite1RuleInfo,
            'right_operand' => $userVisitedSite2RuleInfo,
            'rule_operator' => UserListCombinedRuleOperator::PBAND
        ]);

        // Defines a representation of a user list that is generated by a rule.
        $ruleBasedUserListInfo = new RuleBasedUserListInfo([
            // Optional: To include past users in the user list, set the prepopulation_status to
            // REQUESTED.
            'prepopulation_status' => UserListPrepopulationStatus::REQUESTED,
            'combined_rule_user_list' => $combinedRuleUserListInfo
        ]);

        // Creates a user list.
        $userList = new UserList([
            'name' => 'All visitors to http://example.com/example1 AND ' .
                'http://example.com/example2 #' . Helper::getPrintableDatetime(),
            'description' => 'Visitors of both http://example.com/example1 AND ' .
                'http://example.com/example2',
            'membership_status' => UserListMembershipStatus::OPEN,
            'membership_life_span' => 365,
            'rule_based_user_list' => $ruleBasedUserListInfo
        ]);

        // Creates the operation.
        $operation = new UserListOperation();
        $operation->setCreate($userList);

        // Issues a mutate request to add the user list and prints some information.
        $userListServiceClient = $googleAdsClient->getUserListServiceClient();
        $response = $userListServiceClient->mutateUserLists($customerId, [$operation]);
        printf(
            "Created user list with resource name '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_combined_rule_user_list]
}

AddCombinedRuleUserList::main();
