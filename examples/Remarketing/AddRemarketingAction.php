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

namespace Google\Ads\GoogleAds\Examples\Remarketing;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V2\Common\BasicUserListInfo;
use Google\Ads\GoogleAds\V2\Common\TagSnippet;
use Google\Ads\GoogleAds\V2\Common\UserListActionInfo;
use Google\Ads\GoogleAds\V2\Enums\ConversionActionCategoryEnum\ConversionActionCategory;
use Google\Ads\GoogleAds\V2\Enums\ConversionActionStatusEnum\ConversionActionStatus;
use Google\Ads\GoogleAds\V2\Enums\ConversionActionTypeEnum\ConversionActionType;
use Google\Ads\GoogleAds\V2\Enums\TrackingCodePageFormatEnum\TrackingCodePageFormat;
use Google\Ads\GoogleAds\V2\Enums\TrackingCodeTypeEnum\TrackingCodeType;
use Google\Ads\GoogleAds\V2\Enums\UserListMembershipStatusEnum\UserListMembershipStatus;
use Google\Ads\GoogleAds\V2\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V2\Resources\ConversionAction;
use Google\Ads\GoogleAds\V2\Resources\ConversionAction\ValueSettings;
use Google\Ads\GoogleAds\V2\Resources\RemarketingAction;
use Google\Ads\GoogleAds\V2\Resources\UserList;
use Google\Ads\GoogleAds\V2\Services\ConversionActionOperation;
use Google\Ads\GoogleAds\V2\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V2\Services\RemarketingActionOperation;
use Google\Ads\GoogleAds\V2\Services\UserListOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\BoolValue;
use Google\Protobuf\DoubleValue;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/**
 * This example adds a new remarketing action to the customer and retrieves the associated
 * tag snippets.
 */
class AddRemarketingAction
{
    const PAGE_SIZE = 1000;

    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';

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
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
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
        // Creates a new remarketing action with the specified name.
        $remarketingAction = new RemarketingAction(
            ['name' => new StringValue(['value' => 'Remarketing action #' . uniqid()])]
        );

        // Creates a remarketing action operation.
        $remarketingActionOperation =
            new RemarketingActionOperation(['create' => $remarketingAction]);

        // Issues a mutate request to add the remarketing action.
        $remarketingActionServiceClient = $googleAdsClient->getRemarketingActionServiceClient();
        $response = $remarketingActionServiceClient->mutateRemarketingActions(
            $customerId,
            [$remarketingActionOperation]
        );
        $remarketingActionResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Added remarketing action with resource name '%s'.%s",
            $remarketingActionResourceName,
            PHP_EOL
        );

//        $userList = new UserList([
//            'name' => new StringValue(['value' => 'User list #' . uniqid()]),
//            'description' => new StringValue([
//                'value' => 'A list of mars cruise customers in the last year']),
//            'membership_status' => UserListMembershipStatus::OPEN,
//            'membership_life_span' => new Int64Value(['value' => 365]),
//            'basic_user_list' => new BasicUserListInfo([
//                'actions' => [
//                    new UserListActionInfo([
//                        'remarketing_action'
//                            => new StringValue(['value' => $remarketingActionResourceName])
//                    ])
//                ]
//            ])
//        ]);
//        $userListOperation = new UserListOperation();
//        $userListOperation->setCreate($userList);
//        $userListServiceClient = $googleAdsClient->getUserListServiceClient();
//        $response = $userListServiceClient->mutateUserLists(
//            $customerId,
//            [$userListOperation]
//        );
//        $userListResourceName = $response->getResults()[0]->getResourceName();
//        printf("Added user list with resource name '%s'.%s", $userListResourceName, PHP_EOL);

        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves the previously created remarketing action.
        $query =
            "SELECT remarketing_action.id, "
            . "remarketing_action.name, "
            . "remarketing_action.tag_snippets "
            . "FROM remarketing_action "
            . "WHERE remarketing_action.resource_name = '$remarketingActionResourceName'";

        // Issues a search request by specifying page size.
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);
        /** @var GoogleAdsRow $googleAdsRow */
        $googleAdsRow = $response->iterateAllElements()->current();

        // Print some attributes of the remarketing action, which are generated by the API.
        printf(
            "Remarketing action has ID %d and name '%s'.%s%s",
            $googleAdsRow->getRemarketingAction()->getIdUnwrapped(),
            $googleAdsRow->getRemarketingAction()->getNameUnwrapped(),
            PHP_EOL,
            PHP_EOL
        );
        print 'It has the following generated tag snippets:' . PHP_EOL;
        foreach ($googleAdsRow->getRemarketingAction()->getTagSnippets() as $tagSnippet) {
            /** @var TagSnippet $tagSnippet */
            printf(
                "Tag snippet with code type '%s' and code page format '%s' has the following"
                . " global site tag:%s%s%s",
                TrackingCodeType::name($tagSnippet->getType()),
                TrackingCodePageFormat::name($tagSnippet->getPageFormat()),
                PHP_EOL,
                $tagSnippet->getGlobalSiteTagUnwrapped(),
                PHP_EOL
            );
            printf(
                "And the following event snippet:%s%s%s%s",
                PHP_EOL,
                $tagSnippet->getEventSnippetUnwrapped(),
                PHP_EOL,
                PHP_EOL
            );
        }
    }
}

AddRemarketingAction::main();
