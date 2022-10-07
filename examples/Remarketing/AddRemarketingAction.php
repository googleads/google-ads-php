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
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V12\Common\TagSnippet;
use Google\Ads\GoogleAds\V12\Enums\TrackingCodePageFormatEnum\TrackingCodePageFormat;
use Google\Ads\GoogleAds\V12\Enums\TrackingCodeTypeEnum\TrackingCodeType;
use Google\Ads\GoogleAds\V12\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V12\Resources\RemarketingAction;
use Google\Ads\GoogleAds\V12\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V12\Services\RemarketingActionOperation;
use Google\ApiCore\ApiException;

/**
 * This example adds a new remarketing action to the customer and then retrieves its associated
 * tag snippets.
 */
class AddRemarketingAction
{
    private const PAGE_SIZE = 1000;

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
    // [START add_remarketing_action]
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Creates a remarketing action with the specified name.
        $remarketingAction = new RemarketingAction([
            'name' => 'Remarketing action #' . Helper::getPrintableDatetime()
        ]);

        // Creates a remarketing action operation.
        $remarketingActionOperation =
            new RemarketingActionOperation(['create' => $remarketingAction]);

        // Issues a mutate request to add the remarketing action and prints out some information.
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

        // Creates a query that retrieves the previously created remarketing action with its
        // generated tag snippets.
        // [START add_remarketing_action_1]
        $query =
            "SELECT remarketing_action.id, "
            . "remarketing_action.name, "
            . "remarketing_action.tag_snippets "
            . "FROM remarketing_action "
            . "WHERE remarketing_action.resource_name = '$remarketingActionResourceName'";
            // [END add_remarketing_action_1]

        // Issues a search request by specifying page size.
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        // There is only one row because we limited the search using the resource name, which is
        // unique.
        /** @var GoogleAdsRow $googleAdsRow */
        $googleAdsRow = $response->iterateAllElements()->current();

        // Prints some attributes of the remarketing action. The ID and tag snippets are generated
        // by the API.
        printf(
            "Remarketing action has ID %d and name '%s'.%s%s",
            $googleAdsRow->getRemarketingAction()->getId(),
            $googleAdsRow->getRemarketingAction()->getName(),
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
                $tagSnippet->getGlobalSiteTag(),
                PHP_EOL
            );
            printf(
                "and the following event snippet:%s%s%s%s",
                PHP_EOL,
                $tagSnippet->getEventSnippet(),
                PHP_EOL,
                PHP_EOL
            );
        }
    }
    // [END add_remarketing_action]
}

AddRemarketingAction::main();
