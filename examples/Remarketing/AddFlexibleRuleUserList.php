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
use Google\Ads\GoogleAds\V18\Common\FlexibleRuleOperandInfo;
use Google\Ads\GoogleAds\V18\Common\FlexibleRuleUserListInfo;
use Google\Ads\GoogleAds\V18\Common\RuleBasedUserListInfo;
use Google\Ads\GoogleAds\V18\Common\UserListRuleInfo;
use Google\Ads\GoogleAds\V18\Common\UserListRuleItemGroupInfo;
use Google\Ads\GoogleAds\V18\Common\UserListRuleItemInfo;
use Google\Ads\GoogleAds\V18\Common\UserListStringRuleItemInfo;
use Google\Ads\GoogleAds\V18\Enums\UserListFlexibleRuleOperatorEnum\UserListFlexibleRuleOperator;
use Google\Ads\GoogleAds\V18\Enums\UserListMembershipStatusEnum\UserListMembershipStatus;
use Google\Ads\GoogleAds\V18\Enums\UserListPrepopulationStatusEnum\UserListPrepopulationStatus;
use Google\Ads\GoogleAds\V18\Enums\UserListStringRuleItemOperatorEnum\UserListStringRuleItemOperator;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\UserList;
use Google\Ads\GoogleAds\V18\Services\MutateUserListsRequest;
use Google\Ads\GoogleAds\V18\Services\UserListOperation;
use Google\ApiCore\ApiException;

/**
 * Creates a rule-based user list defined by a combination of rules for users who have visited two
 * different pages of a website.
 */
class AddFlexibleRuleUserList
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
        $userVisitedSite1RuleInfo = self::createUserListRuleFromUrl('http://example.com/example1');
        // Creates a rule targeting any user that visited a url that equals
        // http://example.com/example2'.
        $userVisitedSite2RuleInfo = self::createUserListRuleFromUrl('http://example.com/example2');
        // Creates a rule targeting any user that visited a url that equals
        // http://example.com/example3'.
        $userVisitedSite3RuleInfo = self::createUserListRuleFromUrl('http://example.com/example3');

        // Create the user list "Visitors of page 1 AND page 2, but not page 3".
        // To create the user list "Visitors of page 1 *OR* page 2, but not page 3",
        // change the UserListFlexibleRuleOperator from PBAND to OR.
        $flexibleRuleUserListInfo = new FlexibleRuleUserListInfo([
            'inclusive_rule_operator' => UserListFlexibleRuleOperator::PBAND,
            'inclusive_operands' => [
                new FlexibleRuleOperandInfo([
                    'rule' => $userVisitedSite1RuleInfo,
                    // Optionally add a lookback window for this rule, in days.
                    'lookback_window_days' => 7
                ]),
                new FlexibleRuleOperandInfo([
                    'rule' => $userVisitedSite2RuleInfo,
                    // Optionally add a lookback window for this rule, in days.
                    'lookback_window_days' => 7
                ])
            ],
            // Exclusive operands are joined together with OR. This represents the set of users to
            // be excluded from the user list.
            'exclusive_operands' => [
                new FlexibleRuleOperandInfo(['rule' => $userVisitedSite3RuleInfo])
            ]
        ]);

        // Defines a representation of a user list that is generated by a rule.
        $ruleBasedUserListInfo = new RuleBasedUserListInfo([
            // Optional: To include past users in the user list, set the prepopulation_status to
            // REQUESTED.
            'prepopulation_status' => UserListPrepopulationStatus::REQUESTED,
            'flexible_rule_user_list' => $flexibleRuleUserListInfo
        ]);

        // Creates a user list.
        $userList = new UserList([
            'name' => 'All visitors to http://example.com/example1 AND ' .
                'http://example.com/example2 but NOT http://example.com/example3 #'
                . Helper::getPrintableDatetime(),
            'description' => 'Visitors of both http://example.com/example1 AND ' .
                'http://example.com/example2 but NOT http://example.com/example3',
            'membership_status' => UserListMembershipStatus::OPEN,
            'rule_based_user_list' => $ruleBasedUserListInfo
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
            "Created user list with resource name '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_combined_rule_user_list]

    /**
     * Creates a UserListRuleInfo object containing a rule targeting any user that visited the
     * provided URL.
     *
     * @param string $url the URL to create a UserListStringRuleItemInfo
     * @return UserListRuleInfo the created UserListRuleInfo
     */
    private static function createUserListRuleFromUrl(string $url): UserListRuleInfo
    {
        // Create a rule targeting any user that visited a URL that equals the given URL.
        $userVisitedSiteRule = new UserListRuleItemInfo([
            // Uses a built-in parameter to create a domain URL rule.
            'name' => self::URL_STRING,
            'string_rule_item' => new UserListStringRuleItemInfo([
                'operator' => UserListStringRuleItemOperator::EQUALS,
                'value' => $url
            ])
        ]);

        // Returns a UserListRuleInfo object containing the rule.
        return new UserListRuleInfo([
            'rule_item_groups' => [
                new UserListRuleItemGroupInfo([
                    'rule_items' => [$userVisitedSiteRule]
                ])
            ]
        ]);
    }
}

AddFlexibleRuleUserList::main();
