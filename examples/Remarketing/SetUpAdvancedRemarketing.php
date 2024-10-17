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
use Google\Ads\GoogleAds\V18\Common\UserListDateRuleItemInfo;
use Google\Ads\GoogleAds\V18\Common\UserListNumberRuleItemInfo;
use Google\Ads\GoogleAds\V18\Common\UserListRuleInfo;
use Google\Ads\GoogleAds\V18\Common\UserListRuleItemGroupInfo;
use Google\Ads\GoogleAds\V18\Common\UserListRuleItemInfo;
use Google\Ads\GoogleAds\V18\Common\UserListStringRuleItemInfo;
use Google\Ads\GoogleAds\V18\Enums\UserListDateRuleItemOperatorEnum\UserListDateRuleItemOperator;
use Google\Ads\GoogleAds\V18\Enums\UserListFlexibleRuleOperatorEnum\UserListFlexibleRuleOperator;
use Google\Ads\GoogleAds\V18\Enums\UserListMembershipStatusEnum\UserListMembershipStatus;
use Google\Ads\GoogleAds\V18\Enums\UserListNumberRuleItemOperatorEnum\UserListNumberRuleItemOperator;
use Google\Ads\GoogleAds\V18\Enums\UserListPrepopulationStatusEnum\UserListPrepopulationStatus;
use Google\Ads\GoogleAds\V18\Enums\UserListStringRuleItemOperatorEnum\UserListStringRuleItemOperator;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\UserList;
use Google\Ads\GoogleAds\V18\Services\MutateUserListsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateUserListsResponse;
use Google\Ads\GoogleAds\V18\Services\UserListOperation;
use Google\ApiCore\ApiException;

/**
 * Creates a rule-based user list defined by an expression rule for users who have either checked
 * out in November or December OR visited the checkout page with more than one item in their cart.
 */
class SetUpAdvancedRemarketing
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
    private static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Creates a rule targeting any user that visited the checkout page.
        // [START setup_advanced_remarketing]
        $checkoutRule = new UserListRuleItemInfo([
            // The rule variable name must match a corresponding key name fired from a pixel.
            // To learn more about setting up remarketing tags, visit
            // https://support.google.com/google-ads/answer/2476688.
            // To learn more about remarketing events and parameters, visit
            // https://support.google.com/google-ads/answer/7305793.
            'name' => 'ecomm_pagetype',
            'string_rule_item' => new UserListStringRuleItemInfo([
                'operator' => UserListStringRuleItemOperator::EQUALS,
                'value' => 'checkout'
            ])
        ]);
        // [END setup_advanced_remarketing]

        // Creates a rule targeting any user that had more than one item in their cart.
        // [START setup_advanced_remarketing_1]
        $cartSizeRule = new UserListRuleItemInfo([
            // The rule variable name must match a corresponding key name fired from a pixel.
            'name' => 'cart_size',
            'number_rule_item' => new UserListNumberRuleItemInfo([
                'operator' => UserListNumberRuleItemOperator::GREATER_THAN,
                'value' => 1.0
            ])
        ]);
        // [END setup_advanced_remarketing_1]

        // Creates a rule group that includes the checkout and cart size rules. Combining the two
        // rule items into a UserListRuleItemGroupInfo object causes Google Ads to AND their rules
        // together. To instead OR the rules together, each rule should be placed in its own rule
        // item group.
        // [START setup_advanced_remarketing_2]
        $checkoutAndCartSizeRuleGroup = new UserListRuleItemGroupInfo([
            'rule_items' => [$checkoutRule, $cartSizeRule]
        ]);
        // [END setup_advanced_remarketing_2]

        // Creates the RuleItem for checkout start date. The tags and keys used below must have been
        // in place in the past for the date range specified in the rules.
        // [START setup_advanced_remarketing_3]
        $startDateRule = new UserListRuleItemInfo([
            // The rule variable name must match a corresponding key name fired from a pixel.
            'name' => 'checkoutdate',
            'date_rule_item' => new UserListDateRuleItemInfo([
                // Available UserListDateRuleItemOperators can be found at
                // https://developers.google.com/google-ads/api/reference/rpc/latest/UserListDateRuleItemOperatorEnum.UserListDateRuleItemOperator
                'operator' => UserListDateRuleItemOperator::AFTER,
                'value' => '20191031'
            ])
        ]);
        // [END setup_advanced_remarketing_3]

        // Creates the RuleItem for checkout end date.
        // [START setup_advanced_remarketing_4]
        $endDateRule = new UserListRuleItemInfo([
            // The rule variable name must match a corresponding key name fired from a pixel.
            'name' => 'checkoutdate',
            'date_rule_item' => new UserListDateRuleItemInfo([
                'operator' => UserListDateRuleItemOperator::BEFORE,
                'value' => '20200101'
            ])
        ]);
        // [END setup_advanced_remarketing_4]

        // Creates a rule group targeting users who checked out between November and December by
        // using the start and end date rules. Combining the two rule items into a
        // UserListRuleItemGroupInfo object causes Google Ads to AND their rules together. To
        // instead OR the rules together, each rule should be placed in its own rule item group.
        // [START setup_advanced_remarketing_5]
        $checkoutDateRuleGroup = new UserListRuleItemGroupInfo([
            'rule_items' => [$startDateRule, $endDateRule]
        ]);
        // [END setup_advanced_remarketing_5]

        // Create a FlexibleRuleUserListInfo object, or a flexible rule representation of visitors
        // with one or multiple actions. FlexibleRuleUserListInfo wraps UserListRuleInfo in a
        // FlexibleRuleOperandInfo object that represents which users lists to include or exclude.
        // [START setup_advanced_remarketing_6]
        $flexibleRuleUserListInfo = new FlexibleRuleUserListInfo([
            'inclusive_rule_operator' => UserListFlexibleRuleOperator::PBAND,
            'inclusive_operands' => [
                new FlexibleRuleOperandInfo([
                    'rule' => new UserListRuleInfo([
                        // The default rule_type for a UserListRuleInfo object is OR of ANDs
                        // (disjunctive normal form). That is, rule items will be ANDed together
                        // within rule item groups and the groups themselves will be ORed together.
                        'rule_item_groups' => [
                            $checkoutAndCartSizeRuleGroup,
                            $checkoutDateRuleGroup
                        ]
                    ]),
                    // Optionally add a lookback window for this rule, in days.
                    'lookback_window_days' => 7
                ])
            ],
            'exclusive_operands' => []
        ]);
        // [END setup_advanced_remarketing_6]

        // Defines a representation of a user list that is generated by a rule.
        $ruleBasedUserListInfo = new RuleBasedUserListInfo([
            'flexible_rule_user_list' => $flexibleRuleUserListInfo,
            // Optional: To include past users in the user list, set the prepopulation_status to
            // REQUESTED.
            'prepopulation_status' => UserListPrepopulationStatus::REQUESTED
        ]);

        // Creates the user list.
        $userList = new UserList([
            'name' => 'My expression rule user list #' . Helper::getPrintableDatetime(),
            'description' => 'Users who checked out in November or December OR ' .
                'visited the checkout page with more than one item in their cart',
            'membership_status' => UserListMembershipStatus::OPEN,
            'membership_life_span' => 90,
            'rule_based_user_list' => $ruleBasedUserListInfo
        ]);

        // Creates the operation.
        $operation = new UserListOperation();
        $operation->setCreate($userList);

        // Issues a mutate request to add a user list.
        $userListServiceClient = $googleAdsClient->getUserListServiceClient();
        /** @var MutateUserListsResponse $userListResponse */
        $userListResponse = $userListServiceClient->mutateUserLists(
            MutateUserListsRequest::build($customerId, [$operation])
        );

        printf(
            "Created user list with resource name '%s'.%s",
            $userListResponse->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
}

SetUpAdvancedRemarketing::main();
