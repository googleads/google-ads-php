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

namespace Google\Ads\GoogleAds\Examples\Extensions;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\Util\V15\ResourceNames;
use Google\Ads\GoogleAds\V15\Common\MatchingFunction;
use Google\Ads\GoogleAds\V15\Enums\AffiliateLocationFeedRelationshipTypeEnum\AffiliateLocationFeedRelationshipType;
use Google\Ads\GoogleAds\V15\Enums\AffiliateLocationPlaceholderFieldEnum\AffiliateLocationPlaceholderField;
use Google\Ads\GoogleAds\V15\Enums\FeedOriginEnum\FeedOrigin;
use Google\Ads\GoogleAds\V15\Enums\PlaceholderTypeEnum\PlaceholderType;
use Google\Ads\GoogleAds\V15\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V15\Resources\AttributeFieldMapping;
use Google\Ads\GoogleAds\V15\Resources\CampaignFeed;
use Google\Ads\GoogleAds\V15\Resources\CustomerFeed;
use Google\Ads\GoogleAds\V15\Resources\Feed;
use Google\Ads\GoogleAds\V15\Resources\Feed\AffiliateLocationFeedData;
use Google\Ads\GoogleAds\V15\Resources\FeedMapping;
use Google\Ads\GoogleAds\V15\Services\CampaignFeedOperation;
use Google\Ads\GoogleAds\V15\Services\CustomerFeedOperation;
use Google\Ads\GoogleAds\V15\Services\FeedOperation;
use Google\Ads\GoogleAds\V15\Services\FeedServiceClient;
use Google\Ads\GoogleAds\V15\Services\GoogleAdsRow;
use Google\Ads\GoogleAds\V15\Services\MutateCampaignFeedsRequest;
use Google\Ads\GoogleAds\V15\Services\MutateCustomerFeedsRequest;
use Google\Ads\GoogleAds\V15\Services\MutateFeedsRequest;
use Google\Ads\GoogleAds\V15\Services\SearchGoogleAdsRequest;
use Google\Ads\GoogleAds\V15\Services\SearchGoogleAdsStreamRequest;
use Google\ApiCore\ApiException;
use RuntimeException;

/**
 * This code example adds a feed that syncs retail addresses for a given retail chain ID and
 * associates the feed with a campaign for serving affiliate location extensions.
 */
class AddAffiliateLocationExtensions
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // The retail chain ID. For a complete list of valid retail chain IDs, see
    // https://developers.google.com/adwords/api/docs/appendix/codes-formats#chain-ids.
    private const CHAIN_ID = 'INSERT_CHAIN_ID_HERE';
    // The campaign ID for which the affiliate location extensions are added.
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';
    // Optional: Delete all existing location extension feeds. This is required for this code
    // example to run correctly more than once.
    // 1. Google Ads only allows one location extension feed per email address.
    // 2. A Google Ads account cannot have a location extension feed and an affiliate location
    // extension feed at the same time.
    private const DELETE_EXISTING_FEEDS = false;

    // The maximum number of attempts to make to retrieve the feed mapping before throwing an
    // exception.
    private const MAX_FEED_MAPPING_RETRIEVAL_ATTEMPTS = 10;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CHAIN_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::DELETE_EXISTING_FEEDS => GetOpt::OPTIONAL_ARGUMENT
        ]);

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            // We set this value to true to show how to use GAPIC v2 source code. You can remove the
            // below line if you wish to use the old-style source code. Note that in that case, you
            // probably need to modify some parts of the code below to make it work.
            // For more information, see
            // https://developers.devsite.corp.google.com/google-ads/api/docs/client-libs/php/gapic.
            ->usingGapicV2Source(true)
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID,
                $options[ArgumentNames::CHAIN_ID] ?: self::CHAIN_ID,
                $options[ArgumentNames::CAMPAIGN_ID] ?: self::CAMPAIGN_ID,
                filter_var(
                    $options[ArgumentNames::DELETE_EXISTING_FEEDS]
                        ?: self::DELETE_EXISTING_FEEDS,
                    FILTER_VALIDATE_BOOLEAN
                )
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
     * @param int $chainId the retail chain ID
     * @param int $campaignId the campaign ID for which the affiliate location extensions are added
     * @param bool $shouldDeleteExistingFeeds true if it should delete the existing feeds. The
     *     example will throw an error if feeds already exist and this option is not set to true
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $chainId,
        int $campaignId,
        bool $shouldDeleteExistingFeeds
    ) {
        if ($shouldDeleteExistingFeeds) {
            self::deleteLocationExtensionFeeds($googleAdsClient, $customerId);
        }
        $feedResourceName = self::createAffiliateLocationExtensionFeed(
            $googleAdsClient,
            $customerId,
            $chainId
        );
        // After the completion of the feed creation operation above the added feed will not
        // be available for usage in a campaign feed until the feed mapping is created.
        // We then need to wait for the feed mapping to be created.
        $feedMapping = self::waitForFeedToBeReady(
            $googleAdsClient,
            $customerId,
            $feedResourceName
        );
        self::createCampaignFeed(
            $googleAdsClient,
            $customerId,
            $campaignId,
            $feedMapping,
            $feedResourceName,
            $chainId
        );
    }

    /**
     * Deletes the existing location extension feeds.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     */
    private static function deleteLocationExtensionFeeds(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // To delete a location extension feed, you need to
        // 1. Delete the customer feed so that the location extensions from the feed stop serving.
        // 2. Delete the feed so that Google Ads will no longer sync from the Business Profile
        // account.
        $customerFeeds = self::getLocationExtensionCustomerFeeds($googleAdsClient, $customerId);
        if (!empty($customerFeeds)) {
            // Optional: You may also want to delete the campaign and ad group feeds.
            self::removeCustomerFeeds($googleAdsClient, $customerId, $customerFeeds);
        }
        $feeds = self::getLocationExtensionFeeds($googleAdsClient, $customerId);
        if (!empty($feeds)) {
            self::removeFeeds($googleAdsClient, $customerId, $feeds);
        }
    }

    /**
     * Gets the existing location extension customer feeds.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return CustomerFeed[] the list of location extension customer feeds
     */
    private static function getLocationExtensionCustomerFeeds(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ): array {
        $customerFeeds = [];

        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates the query. A location extension customer feed can be identified by filtering
        // for placeholder_types as LOCATION (location extension feeds) or
        // placeholder_types as AFFILIATE_LOCATION (affiliate location extension feeds).
        $query = 'SELECT customer_feed.resource_name ' .
            'FROM customer_feed ' .
            'WHERE customer_feed.placeholder_types CONTAINS ANY(LOCATION, AFFILIATE_LOCATION) ' .
            'AND customer_feed.status = ENABLED';
        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($customerId, $query)
        );
        // Iterates over all rows in all messages to collect the results.
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $customerFeeds[] = $googleAdsRow->getCustomerFeed();
        }

        return $customerFeeds;
    }

    /**
     * Removes the customer feeds.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param CustomerFeed[] $customerFeeds the list of customer feeds to remove
     */
    private static function removeCustomerFeeds(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $customerFeeds
    ) {
        $operations = [];
        foreach ($customerFeeds as $customerFeed) {
            /** @var CustomerFeed $customerFeed */
            $operations[] = new CustomerFeedOperation([
                'remove' => $customerFeed->getResourceName()
            ]);
        }

        // Issues a mutate request to remove the customer feeds.
        $googleAdsClient->getCustomerFeedServiceClient()->mutateCustomerFeeds(
            MutateCustomerFeedsRequest::build($customerId, $operations)
        );
    }

    /**
     * Gets the existing location extension feeds.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return Feed[] the list of location extension feeds
     */
    private static function getLocationExtensionFeeds(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ): array {
        $feeds = [];

        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates the query.
        $query = 'SELECT feed.resource_name ' .
            'FROM feed ' .
            'WHERE feed.status = ENABLED ' .
            'AND feed.origin = USER';
        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream(
            SearchGoogleAdsStreamRequest::build($customerId, $query)
        );
        // Iterates over all rows in all messages to collect the results.
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            /** @var GoogleAdsRow $googleAdsRow */
            $feeds[] = $googleAdsRow->getFeed();
        }

        return $feeds;
    }

    /**
     * Removes the feeds.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param Feed[] $feeds the list of feeds to remove
     */
    private static function removeFeeds(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $feeds
    ) {
        $operations = [];
        foreach ($feeds as $feed) {
            /** @var Feed $feed */
            $operations[] = new FeedOperation([
                'remove' => $feed->getResourceName()
            ]);
        }

        // Issues a mutate request to remove the feeds.
        $googleAdsClient->getFeedServiceClient()->mutateFeeds(
            MutateFeedsRequest::build($customerId, $operations)
        );
    }

    /**
     * Creates the affiliate location extension feed.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $chainId the retail chain ID
     * @return string the resource name of the newly created affiliate location extension feed
     */
    // [START add_affiliate_location_extensions]
    private static function createAffiliateLocationExtensionFeed(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $chainId
    ): string {
        // Creates a feed that will sync to retail addresses for a given retail chain ID.
        // Do not add feed attributes, Google Ads will add them automatically because this will
        // be a system generated feed.
        $feed = new Feed([
            'name' => 'Affiliate Location Extension feed #' . Helper::getPrintableDatetime(),
            'affiliate_location_feed_data' => new AffiliateLocationFeedData([
                'chain_ids' => [$chainId],
                'relationship_type' => AffiliateLocationFeedRelationshipType::GENERAL_RETAILER
            ]),
            // Since this feed's contents will be managed by Google, you must set its origin to
            // GOOGLE.
            'origin' => FeedOrigin::GOOGLE
        ]);

        // Creates the feed operation.
        $operation = new FeedOperation();
        $operation->setCreate($feed);

        // Issues a mutate request to add the feed and prints some information.
        $feedServiceClient = $googleAdsClient->getFeedServiceClient();
        $response =
            $feedServiceClient->mutateFeeds(MutateFeedsRequest::build($customerId, [$operation]));
        $feedResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Affiliate location extension feed created with resource name: '%s'.%s",
            $feedResourceName,
            PHP_EOL
        );

        return $feedResourceName;
    }
    // [END add_affiliate_location_extensions]

    /**
     * Waits for the affiliate location extension feed to be ready. An exponential back-off
     * policy with a maximum number of attempts is used to poll the server.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $feedResourceName the feed resource name
     * @throws RuntimeException if the feed mapping is still not ready and the maximum number of
     *     attempts has been reached
     * @return FeedMapping the newly created feed mapping
     */
    // [START add_affiliate_location_extensions_2]
    private static function waitForFeedToBeReady(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $feedResourceName
    ): FeedMapping {
        $numAttempts = 0;

        while ($numAttempts < self::MAX_FEED_MAPPING_RETRIEVAL_ATTEMPTS) {
            // Once you create a feed, Google's servers will setup the feed by creating feed
            // attributes and feed mapping. Once the feed mapping is created, it is ready to be
            // used for creating customer feed.
            // This process is asynchronous, so we wait until the feed mapping is created,
            // performing exponential backoff.
            $feedMapping = self::getAffiliateLocationExtensionFeedMapping(
                $googleAdsClient,
                $customerId,
                $feedResourceName
            );

            if (is_null($feedMapping)) {
                $numAttempts++;
                $sleepSeconds = intval(5 * pow(2, $numAttempts));
                printf(
                    'Checked: %d time(s). Feed is not ready yet. ' .
                    'Waiting %d seconds before trying again.%s',
                    $numAttempts,
                    $sleepSeconds,
                    PHP_EOL
                );
                sleep($sleepSeconds);
            } else {
                printf("Feed '%s' is now ready.%s", $feedResourceName, PHP_EOL);
                return $feedMapping;
            }
        }

        throw new RuntimeException(sprintf(
            "The affiliate location feed mapping is still not ready after %d attempt(s).%s",
            self::MAX_FEED_MAPPING_RETRIEVAL_ATTEMPTS,
            PHP_EOL
        ));
    }
    // [END add_affiliate_location_extensions_2]

    /**
     * Gets the affiliate location extension feed mapping.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $feedResourceName the feed resource name
     * @return FeedMapping|null the feed mapping if it exists otherwise null
     */
    // [START add_affiliate_location_extensions_1]
    private static function getAffiliateLocationExtensionFeedMapping(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $feedResourceName
    ): ?FeedMapping {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves the feed mapping.
        $query = sprintf(
            "SELECT feed_mapping.resource_name, " .
            "feed_mapping.attribute_field_mappings, " .
            "feed_mapping.status " .
            "FROM feed_mapping " .
            "WHERE feed_mapping.feed = '%s' " .
            "AND feed_mapping.status = ENABLED " .
            "AND feed_mapping.placeholder_type = AFFILIATE_LOCATION " .
            "LIMIT 1",
            $feedResourceName
        );

        // Issues a search request.
        $response = $googleAdsServiceClient->search(
            SearchGoogleAdsRequest::build($customerId, $query)->setReturnTotalResultsCount(true)
        );

        return $response->getPage()->getPageElementCount() === 1
            ? $response->getIterator()->current()->getFeedMapping()
            : null;
    }
    // [END add_affiliate_location_extensions_1]

    /**
     * Creates the campaign feed.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID for which the affiliate location extensions are added
     * @param FeedMapping $feedMapping the affiliate location extension feed mapping
     * @param string $feedResourceName the feed resource name
     * @param int $chainId the retail chain ID
     */
    // [START add_affiliate_location_extensions_3]
    private static function createCampaignFeed(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        FeedMapping $feedMapping,
        string $feedResourceName,
        int $chainId
    ) {
        $matchingFunction = sprintf(
            'IN(FeedAttribute[%d, %d], %d)',
            FeedServiceClient::parseName($feedResourceName)['feed'],
            self::getAttributeIdForChainId($feedMapping),
            $chainId
        );

        // Adds a campaign feed that associates the feed with this campaign for the
        // AFFILIATE_LOCATION placeholder type.
        $campaignFeed = new CampaignFeed([
            'feed' => $feedResourceName,
            'placeholder_types' => [PlaceholderType::AFFILIATE_LOCATION],
            'matching_function' => new MatchingFunction(['function_string' => $matchingFunction]),
            'campaign' => ResourceNames::forCampaign($customerId, $campaignId)
        ]);

        // Creates the campaign feed operation.
        $operation = new CampaignFeedOperation();
        $operation->setCreate($campaignFeed);

        // Issues a mutate request to add the campaign feed and prints some information.
        $campaignFeedServiceClient = $googleAdsClient->getCampaignFeedServiceClient();
        $response = $campaignFeedServiceClient->mutateCampaignFeeds(
            MutateCampaignFeedsRequest::build($customerId, [$operation])
        );
        printf(
            "Campaign feed created with resource name: '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_affiliate_location_extensions_3]

    /**
     * Gets the feed attribute ID for the retail chain ID.
     *
     * @param FeedMapping $feedMapping the feed mapping
     * @@return int the feed attribute ID
     */
    // [START add_affiliate_location_extensions_4]
    private static function getAttributeIdForChainId(FeedMapping $feedMapping): int
    {
        foreach ($feedMapping->getAttributeFieldMappings() as $fieldMapping) {
            /** @var AttributeFieldMapping $fieldMapping */
            if (
                $fieldMapping->getAffiliateLocationField()
                === AffiliateLocationPlaceholderField::CHAIN_ID
            ) {
                return $fieldMapping->getFeedAttributeId();
            }
        }

        throw new RuntimeException(
            "Affiliate location feed mapping isn't setup correctly." . PHP_EOL
        );
    }
    // [END add_affiliate_location_extensions_4]
}

AddAffiliateLocationExtensions::main();
