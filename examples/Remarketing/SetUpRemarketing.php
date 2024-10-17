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
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\FlexibleRuleOperandInfo;
use Google\Ads\GoogleAds\V18\Common\FlexibleRuleUserListInfo;
use Google\Ads\GoogleAds\V18\Common\RuleBasedUserListInfo;
use Google\Ads\GoogleAds\V18\Common\UserListInfo;
use Google\Ads\GoogleAds\V18\Common\UserListRuleInfo;
use Google\Ads\GoogleAds\V18\Common\UserListRuleItemGroupInfo;
use Google\Ads\GoogleAds\V18\Common\UserListRuleItemInfo;
use Google\Ads\GoogleAds\V18\Common\UserListStringRuleItemInfo;
use Google\Ads\GoogleAds\V18\Enums\UserListFlexibleRuleOperatorEnum\UserListFlexibleRuleOperator;
use Google\Ads\GoogleAds\V18\Enums\UserListMembershipStatusEnum\UserListMembershipStatus;
use Google\Ads\GoogleAds\V18\Enums\UserListPrepopulationStatusEnum\UserListPrepopulationStatus;
use Google\Ads\GoogleAds\V18\Enums\UserListStringRuleItemOperatorEnum\UserListStringRuleItemOperator;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V18\Resources\CampaignCriterion;
use Google\Ads\GoogleAds\V18\Resources\UserList;
use Google\Ads\GoogleAds\V18\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupCriteriaRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupCriteriaResponse;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignCriteriaRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignCriteriaResponse;
use Google\Ads\GoogleAds\V18\Services\MutateUserListsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateUserListsResponse;
use Google\Ads\GoogleAds\V18\Services\SearchGoogleAdsRequest;
use Google\Ads\GoogleAds\V18\Services\UserListOperation;
use Google\ApiCore\ApiException;

/**
 * Demonstrates various operations involved in remarketing, including (a) creating a user list based
 * on visitors to a website, (b) targeting a user list with an ad group criterion, (c) updating the
 * bid modifier on an ad group criterion, (d) finding and removing all ad group criteria under a
 * given campaign, (e) targeting a user list with a campaign criterion, and (f) updating the bid
 * modifier on a campaign criterion. It is unlikely that users will need to perform all of these
 * operations consecutively, and all of the operations contained herein are meant of for
 * illustrative purposes.
 */
class SetUpRemarketing
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    // Optional: To use a different bid modifier value from the default (1.5), modify
    // the line below with your desired bid modifier value.
    private const BID_MODIFIER_VALUE = 1.5;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::BID_MODIFIER_VALUE => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::CAMPAIGN_ID] ?: self::CAMPAIGN_ID,
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID,
                $options[ArgumentNames::BID_MODIFIER_VALUE] ?: self::BID_MODIFIER_VALUE
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
     * @param int $campaignId the campaign ID
     * @param int $adGroupId the ad group ID
     * @param float $bidModifierValue the bid modifier value
     */
    private static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        int $adGroupId,
        float $bidModifierValue
    ) {
        $userListResourceName = self::createUserList($googleAdsClient, $customerId);
        $adGroupCriterionResourceName = self::targetAdsInAdGroupToUserList(
            $googleAdsClient,
            $customerId,
            $adGroupId,
            $userListResourceName
        );
        self::modifyAdGroupBids(
            $googleAdsClient,
            $customerId,
            $adGroupCriterionResourceName,
            $bidModifierValue
        );
        self::removeExistingListCriteriaFromAdGroup($googleAdsClient, $customerId, $campaignId);
        $campaignCriterionResourceName = self::targetAdsInCampaignToUserList(
            $googleAdsClient,
            $customerId,
            $campaignId,
            $userListResourceName
        );
        self::modifyCampaignBids(
            $googleAdsClient,
            $customerId,
            $campaignCriterionResourceName,
            $bidModifierValue
        );
    }

    /**
     * Creates a user list targeting users that have visited a given URL.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the user list resource name
     */
    // [START setup_remarketing]
    private static function createUserList(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ): string {
        // Creates a rule targeting any user that visited a URL containing 'example.com'.
        $rule = new UserListRuleItemInfo([
            // Uses a built-in parameter to create a domain URL rule.
            'name' => 'url__',
            'string_rule_item' => new UserListStringRuleItemInfo([
                'operator' => UserListStringRuleItemOperator::CONTAINS,
                'value' => 'example.com'
            ])
        ]);

        // Specifies that the user list targets visitors of a page based on the provided rule.
        $flexibleRuleUserListInfo = new FlexibleRuleUserListInfo([
            'inclusive_rule_operator' => UserListFlexibleRuleOperator::PBAND,
            // Inclusive operands are joined together with the specified inclusive rule operator.
            'inclusive_operands' => [
                new FlexibleRuleOperandInfo([
                    'rule' => new UserListRuleInfo([
                        'rule_item_groups' =>
                            [new UserListRuleItemGroupInfo(['rule_items' => [$rule]])]
                    ]),
                    // Optionally add a lookback window for this rule, in days.
                    'lookback_window_days' => 7
                ])
            ],
            'exclusive_operands' => []
        ]);

        // Defines a representation of a user list that is generated by a rule.
        $ruleBasedUserListInfo = new RuleBasedUserListInfo([
            'flexible_rule_user_list' => $flexibleRuleUserListInfo,
            // Optional: To include past users in the user list, set the prepopulation_status to
            // REQUESTED.
            'prepopulation_status' => UserListPrepopulationStatus::REQUESTED
        ]);

        // Creates the user list.
        $userList = new UserList([
            'name' => "All visitors to example.com #" . Helper::getPrintableDatetime(),
            'description' => "Any visitor to any page of example.com",
            'membership_status' => UserListMembershipStatus::OPEN,
            'membership_life_span' => 365,
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

        $userListResourceName = $userListResponse->getResults()[0]->getResourceName();
        printf("Created user list with resource name '%s'.%s", $userListResourceName, PHP_EOL);

        return $userListResourceName;
    }
    // [END setup_remarketing]

    /**
     * Creates an ad group criterion that targets a user list with an ad group.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param string $userListResourceName the user list resource name
     * @return string the ad group criterion resource name
     */
    // [START setup_remarketing_1]
    private static function targetAdsInAdGroupToUserList(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        string $userListResourceName
    ): string {
        // Creates the ad group criterion targeting members of the user list.
        $adGroupCriterion = new AdGroupCriterion([
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            'user_list' => new UserListInfo(['user_list' => $userListResourceName])
        ]);

        // Creates the operation.
        $operation = new AdGroupCriterionOperation();
        $operation->setCreate($adGroupCriterion);

        // Issues a mutate request to add an ad group criterion.
        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
        /** @var MutateAdGroupCriteriaResponse $adGroupCriterionResponse */
        $adGroupCriterionResponse = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            MutateAdGroupCriteriaRequest::build($customerId, [$operation])
        );

        $adGroupCriterionResourceName =
            $adGroupCriterionResponse->getResults()[0]->getResourceName();
        printf(
            "Successfully created ad group criterion with resource name '%s' " .
            "targeting user list with resource name '%s' with ad group with ID %d.%s",
            $adGroupCriterionResourceName,
            $userListResourceName,
            $adGroupId,
            PHP_EOL
        );

        return $adGroupCriterionResourceName;
    }
    // [END setup_remarketing_1]

    /**
     * Updates the bid modifier on an ad group criterion.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adGroupCriterionResourceName the ad group criterion to update
     * @param float $bidModifierValue the bid modifier value
     */
    private static function modifyAdGroupBids(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupCriterionResourceName,
        float $bidModifierValue
    ) {
        // Creates the ad group criterion with a bid modifier. You may alternatively set the bid for
        // the ad group criterion directly.
        $adGroupCriterion = new AdGroupCriterion([
            'resource_name' => $adGroupCriterionResourceName,
            'bid_modifier' => $bidModifierValue
        ]);

        // Constructs an operation that will update the ad group criterion with the specified
        // resource name, using the FieldMasks utility to derive the update mask. This mask tells
        // the Google Ads API which attributes of the ad group criterion you want to change.
        $operation = new AdGroupCriterionOperation();
        $operation->setUpdate($adGroupCriterion);
        $operation->setUpdateMask(FieldMasks::allSetFieldsOf($adGroupCriterion));

        // Issues a mutate request to update an ad group criterion.
        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
        /** @var MutateAdGroupCriteriaResponse $adGroupCriteriaResponse */
        $adGroupCriteriaResponse = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            MutateAdGroupCriteriaRequest::build($customerId, [$operation])
        );

        printf(
            "Updated bid for ad group criterion with resource name '%s'.%s",
            $adGroupCriteriaResponse->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }

    /**
     * Removes all ad group criteria targeting a user list under a given campaign. This is a
     * necessary step before targeting a user list at the campaign level.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID
     */
    // [START setup_remarketing_3]
    private static function removeExistingListCriteriaFromAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        // Retrieves all of the ad group criteria under a campaign.
        $allAdGroupCriteria = self::getUserListAdGroupCriteria(
            $googleAdsClient,
            $customerId,
            $campaignId
        );

        $removeOperations = [];
        // Creates a list of remove operations.
        foreach ($allAdGroupCriteria as $adGroupCriterionResourceName) {
            $operation = new AdGroupCriterionOperation();
            $operation->setRemove($adGroupCriterionResourceName);
            $removeOperations[] = $operation;
        }

        // Issues a mutate request to remove the ad group criteria.
        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
        /** @var MutateAdGroupCriteriaResponse $adGroupCriteriaResponse */
        $adGroupCriteriaResponse = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            MutateAdGroupCriteriaRequest::build($customerId, $removeOperations)
        );

        foreach ($adGroupCriteriaResponse->getResults() as $adGroupCriteriaResult) {
            printf(
                "Successfully removed ad group criterion with resource name '%s'.%s",
                $adGroupCriteriaResult->getResourceName(),
                PHP_EOL
            );
        }
    }
    // [END setup_remarketing_3]

    /**
     * Finds all of user list ad group criteria under a campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID under which to search the ad group criteria
     * @return string[] the list of the ad group criteria resource names
     */
    // [START setup_remarketing_2]
    private static function getUserListAdGroupCriteria(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ): array {
        // Creates a query that retrieves all of the ad group criteria under a campaign.
        $query = sprintf(
            "SELECT ad_group_criterion.criterion_id " .
            "FROM ad_group_criterion " .
            "WHERE campaign.id = %d " .
            "AND ad_group_criterion.type = 'USER_LIST'",
            $campaignId
        );

        // Creates the Google Ads service client.
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();

        // Issues the search request.
        $response =
            $googleAdsServiceClient->search(SearchGoogleAdsRequest::build($customerId, $query));

        $userListCriteria = [];
        // Iterates over all rows in all pages. Prints the user list criteria and adds the ad group
        // criteria resource names to the list.
        foreach ($response->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $adGroupCriterionResourceName = $googleAdsRow->getAdGroupCriterion()->getResourceName();

            printf(
                "Ad group criterion with resource name '%s' was found.%s",
                $adGroupCriterionResourceName,
                PHP_EOL
            );

            $userListCriteria[] = $adGroupCriterionResourceName;
        }

        return $userListCriteria;
    }
    // [END setup_remarketing_2]

    /**
     * Creates a campaign criterion that targets a user list with a campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID on which the user list will be targeted
     * @param string $userListResourceName the resource name of the user list to be targeted
     * @return string the campaign criterion resource name
     */
    // [START setup_remarketing_4]
    private static function targetAdsInCampaignToUserList(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        string $userListResourceName
    ): string {
        // Creates the campaign criterion.
        $campaignCriterion = new CampaignCriterion([
            'campaign' => ResourceNames::forCampaign($customerId, $campaignId),
            'user_list' => new UserListInfo(['user_list' => $userListResourceName])
        ]);

        // Creates the operation.
        $operation = new CampaignCriterionOperation();
        $operation->setCreate($campaignCriterion);

        // Issues a mutate request to create a campaign criterion.
        $campaignCriterionServiceClient = $googleAdsClient->getCampaignCriterionServiceClient();
        /** @var MutateCampaignCriteriaResponse $campaignCriteriaResponse */
        $campaignCriteriaResponse = $campaignCriterionServiceClient->mutateCampaignCriteria(
            MutateCampaignCriteriaRequest::build($customerId, [$operation])
        );

        $campaignCriterionResourceName =
            $campaignCriteriaResponse->getResults()[0]->getResourceName();
        printf(
            "Successfully created campaign criterion with resource name '%s' " .
            "targeting user list with resource name '%s' with campaign with ID %d.%s",
            $campaignCriterionResourceName,
            $userListResourceName,
            $campaignId,
            PHP_EOL
        );

        return $campaignCriterionResourceName;
    }
    // [END setup_remarketing_4]

    /**
     * Updates the bid modifier on a campaign criterion.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $campaignCriterionResourceName the campaign criterion to update
     * @param float $bidModifierValue the bid modifier value
     */
    private static function modifyCampaignBids(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignCriterionResourceName,
        float $bidModifierValue
    ) {
        // Creates the campaign criterion to update.
        $campaignCriterion = new CampaignCriterion([
            'resource_name' => $campaignCriterionResourceName,
            'bid_modifier' => $bidModifierValue
        ]);

        // Constructs an operation that will update the campaign criterion with the specified
        // resource name, using the FieldMasks utility to derive the update mask. This mask tells
        // the Google Ads API which attributes of the campaign criterion you want to change.
        $operation = new CampaignCriterionOperation();
        $operation->setUpdate($campaignCriterion);
        $operation->setUpdateMask(FieldMasks::allSetFieldsOf($campaignCriterion));

        // Issues a request to update a campaign criterion.
        $campaignCriterionServiceClient = $googleAdsClient->getCampaignCriterionServiceClient();
        /** @var MutateCampaignCriteriaResponse $campaignCriteriaResponse */
        $campaignCriteriaResponse = $campaignCriterionServiceClient->mutateCampaignCriteria(
            MutateCampaignCriteriaRequest::build($customerId, [$operation])
        );

        printf(
            "Successfully updated the bid for campaign criterion with resource name '%s'.%s",
            $campaignCriteriaResponse->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
}

SetUpRemarketing::main();
