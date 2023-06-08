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

namespace Google\Ads\GoogleAds\Examples\Feeds;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\Util\V14\ResourceNames;
use Google\Ads\GoogleAds\V14\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V14\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/**
 * This example gets all feed items of the specified feed item set by fetching all feed item set
 * links. To create a new feed item set, run CreateFeedItemSet.php. To link a feed item to a feed
 * item set, run LinkFeedItemSet.php.
 */
class GetFeedItemsOfFeedItemSet
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const FEED_ID = 'INSERT_FEED_ID_HERE';
    private const FEED_ITEM_SET_ID = 'INSERT_FEED_ITEM_SET_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FEED_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FEED_ITEM_SET_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::FEED_ID] ?: self::FEED_ID,
                $options[ArgumentNames::FEED_ITEM_SET_ID] ?: self::FEED_ITEM_SET_ID
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
     * @param int $feedId the feed ID that the specified feed item set is associated with
     * @param int $feedItemSetId the ID of specified feed item set
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $feedId,
        int $feedItemSetId
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves all feed item set links associated with the specified feed
        // item set.
        $query = sprintf(
            "SELECT feed_item_set_link.feed_item FROM feed_item_set_link "
            . "WHERE feed_item_set_link.feed_item_set = '%s'",
            ResourceNames::forFeedItemSet($customerId, $feedId, $feedItemSetId)
        );

        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream($customerId, $query);

        printf(
            "The feed items with the following resource names are linked with the feed item set "
            . "with ID %d:%s",
            $feedItemSetId,
            PHP_EOL
        );
        // Iterates over all rows in all messages and prints the requested field values for
        // the feed item set link in each row.
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            printf("'%s'%s", $googleAdsRow->getFeedItemSetLink()->getFeedItem(), PHP_EOL);
        }
    }
}

GetFeedItemsOfFeedItemSet::main();
