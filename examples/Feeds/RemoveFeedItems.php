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

namespace Google\Ads\GoogleAds\Examples\Feeds;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\FeedItem;
use Google\Ads\GoogleAds\V18\Services\FeedItemOperation;
use Google\Ads\GoogleAds\V18\Services\MutateFeedItemsRequest;
use Google\ApiCore\ApiException;

/** Removes feed items from a feed. */
class RemoveFeedItems
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const FEED_ID = 'INSERT_FEED_ID_HERE';
    private const FEED_ITEM_ID_1 = 'INSERT_FEED_ITEM_ID_1_HERE';
    private const FEED_ITEM_ID_2 = 'INSERT_FEED_ITEM_ID_2_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FEED_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FEED_ITEM_IDS => GetOpt::MULTIPLE_ARGUMENT
        ]);

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID,
                $options[ArgumentNames::FEED_ID] ?: self::FEED_ID,
                $options[ArgumentNames::FEED_ITEM_IDS] ?:
                    [self::FEED_ITEM_ID_1, self::FEED_ITEM_ID_2]
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
     * @param int $feedId the feed ID that the feed items belong to
     * @param array $feedItemIds the IDs of the feed items to remove
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $feedId,
        array $feedItemIds
    ) {
        // Creates the remove operations.
        $operations = [];
        foreach ($feedItemIds as $feedItemId) {
            // Creates the feed item resource name.
            $feedItemResourceName = ResourceNames::forFeedItem(
                $customerId,
                $feedId,
                $feedItemId
            );

            // Constructs an operation that will remove the feed item based on the resource name.
            $feedItemOperation = new FeedItemOperation();
            $feedItemOperation->setRemove($feedItemResourceName);

            $operations[] = $feedItemOperation;
        }

        // Issues a mutate request to remove the feed items.
        $feedItemServiceClient = $googleAdsClient->getFeedItemServiceClient();
        $response = $feedItemServiceClient->mutateFeedItems(
            MutateFeedItemsRequest::build($customerId, $operations)
        );

        // Prints the resource names of the removed feed items.
        foreach ($response->getResults() as $removedFeedItem) {
            /** @var FeedItem $removedFeedItem */
            printf(
                "Removed feed item with resource name '%s'.%s",
                $removedFeedItem->getResourceName(),
                PHP_EOL
            );
        }
    }
}

RemoveFeedItems::main();
