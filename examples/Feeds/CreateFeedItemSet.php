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
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\FeedItemSet;
use Google\Ads\GoogleAds\V18\Services\FeedItemSetOperation;
use Google\Ads\GoogleAds\V18\Services\MutateFeedItemSetsRequest;
use Google\ApiCore\ApiException;

/**
 * Creates a new feed item set for a specified feed, which must belong to either a Google Ads
 * location extension or an affiliate extension. This is equivalent to a "location group" in the
 * Google Ads UI. See https://support.google.com/google-ads/answer/9288588 for more detail.
 */
class CreateFeedItemSet
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const FEED_ID = 'INSERT_FEED_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FEED_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::FEED_ID] ?: self::FEED_ID
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
     * @param int $feedId the ID of feed that a newly created feed item set will be associated with
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $feedId
    ) {
        // Creates a new feed item set.
        $feedItemSet = new FeedItemSet([
            'feed' => ResourceNames::forFeed($customerId, $feedId),
            'display_name' => 'Feed Item Set #' . Helper::getPrintableDatetime()
        ]);

        // A feed item set can be created as a dynamic set by setting an optional filter field
        // below. If your feed is a location extension, uncomment the code that sets
        // $dynamic_location_set_filter. If your feed is an affiliate extension, set
        // $dynamic_affiliate_location_set_filter instead.
        // 1) Location extension.
        /*
        $feedItemSet->setDynamicLocationSetFilter(new DynamicLocationSetFilter([
            // Adds a filter for a business name using exact matching.
            'business_name_filter' => new BusinessNameFilter([
                'business_name' => 'INSERT_YOUR_BUSINESS_NAME_HERE',
                'filter_type' => FeedItemSetStringFilterType::EXACT
            ])
        ]));
        */
        // 2) Affiliate extension.
        /*
        $feedItemSet->setDynamicAffiliateLocationSetFilter(
            new DynamicAffiliateLocationSetFilter(['chain_ids' => [INSERT_CHAIN_IDS_HERE]])
        );
        */

        // Constructs an operation that will create a new feed item set.
        $feedItemSetOperation = new FeedItemSetOperation();
        $feedItemSetOperation->setCreate($feedItemSet);

        // Issues a mutate request to add the feed item set on the server.
        $feedItemServiceClient = $googleAdsClient->getFeedItemSetServiceClient();
        $response = $feedItemServiceClient->mutateFeedItemSets(
            MutateFeedItemSetsRequest::build($customerId, [$feedItemSetOperation])
        );
        // Prints some information about the created feed item set.
        printf(
            "Created a feed item set with resource name '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
}

CreateFeedItemSet::main();
