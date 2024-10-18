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
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\FeedItemSetLink;
use Google\Ads\GoogleAds\V18\Services\FeedItemSetLinkOperation;
use Google\Ads\GoogleAds\V18\Services\MutateFeedItemSetLinksRequest;
use Google\ApiCore\ApiException;

/**
 * Links the specified feed item set to the specified feed item. The specified feed item set must
 * not be created as a dynamic set, i.e., both FeedItemSet::$dynamic_location_set_filter and
 * FeedItemSet::$dynamic_affiliate_location_set_filter must not be set.
 */
class LinkFeedItemSet
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const FEED_ID = 'INSERT_FEED_ID_HERE';
    private const FEED_ITEM_SET_ID = 'INSERT_FEED_ITEM_SET_ID_HERE';
    private const FEED_ITEM_ID = 'INSERT_FEED_ITEM_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FEED_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FEED_ITEM_SET_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FEED_ITEM_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::FEED_ITEM_SET_ID] ?: self::FEED_ITEM_SET_ID,
                $options[ArgumentNames::FEED_ITEM_ID] ?: self::FEED_ITEM_ID
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
     * @param int $feedItemId the ID of specified feed item
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $feedId,
        int $feedItemSetId,
        int $feedItemId
    ) {
        // Creates a new feed item set link that binds the specified feed item set and feed item.
        $feedItemSetLink = new FeedItemSetLink([
            'feed_item_set' => ResourceNames::forFeedItemSet($customerId, $feedId, $feedItemSetId),
            'feed_item' => ResourceNames::forFeedItem($customerId, $feedId, $feedItemId)
        ]);

        // Constructs a feed item set link operation.
        $feedItemSetLinkOperation = new FeedItemSetLinkOperation();
        $feedItemSetLinkOperation->setCreate($feedItemSetLink);

        // Issues a mutate request to add the feed item set link on the server.
        $feedItemSetLinkServiceClient = $googleAdsClient->getFeedItemSetLinkServiceClient();
        $response = $feedItemSetLinkServiceClient->mutateFeedItemSetLinks(
            MutateFeedItemSetLinksRequest::build($customerId, [$feedItemSetLinkOperation])
        );
        // Prints some information about the created feed item set link.
        printf(
            "Created a feed item set link with resource name '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
}

LinkFeedItemSet::main();
