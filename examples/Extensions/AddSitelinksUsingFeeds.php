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
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsServerStreamDecorator;
use Google\Ads\GoogleAds\Util\V8\ResourceNames;
use Google\Ads\GoogleAds\V8\Common\MatchingFunction;
use Google\Ads\GoogleAds\V8\Enums\FeedAttributeTypeEnum\FeedAttributeType;
use Google\Ads\GoogleAds\V8\Enums\FeedOriginEnum\FeedOrigin;
use Google\Ads\GoogleAds\V8\Enums\PlaceholderTypeEnum\PlaceholderType;
use Google\Ads\GoogleAds\V8\Enums\SitelinkPlaceholderFieldEnum\SitelinkPlaceholderField;
use Google\Ads\GoogleAds\V8\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V8\Resources\AttributeFieldMapping;
use Google\Ads\GoogleAds\V8\Resources\CampaignFeed;
use Google\Ads\GoogleAds\V8\Resources\ExtensionFeedItem;
use Google\Ads\GoogleAds\V8\Resources\Feed;
use Google\Ads\GoogleAds\V8\Resources\FeedAttribute;
use Google\Ads\GoogleAds\V8\Resources\FeedItem;
use Google\Ads\GoogleAds\V8\Resources\FeedItemAttributeValue;
use Google\Ads\GoogleAds\V8\Resources\FeedItemTarget;
use Google\Ads\GoogleAds\V8\Resources\FeedMapping;
use Google\Ads\GoogleAds\V8\Services\CampaignFeedOperation;
use Google\Ads\GoogleAds\V8\Services\FeedItemOperation;
use Google\Ads\GoogleAds\V8\Services\FeedItemTargetOperation;
use Google\Ads\GoogleAds\V8\Services\FeedMappingOperation;
use Google\Ads\GoogleAds\V8\Services\FeedOperation;
use Google\Ads\GoogleAds\V8\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/**
 * Adds sitelinks to a campaign using feed services. If an ad group ID is provided, also creates
 * the ad group targeting for the first feed item. To create a campaign, run AddCampaigns.php.
 */
class AddSitelinksUsingFeeds
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';
    private const AD_GROUP_ID = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::OPTIONAL_ARGUMENT
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
                $options[ArgumentNames::CAMPAIGN_ID] ?: self::CAMPAIGN_ID,
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID
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
     * @param int $customerId the client customer ID
     * @param int $campaignId the campaign ID
     * @param int|null $adGroupId the ad group ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        ?int $adGroupId
    ) {
        // Creates a feed, which acts as a table to store data.
        $feedData = self::createFeed($googleAdsClient, $customerId);

        // Creates feed items, which fill out the feed table with data.
        $feedData = self::createFeedItems($googleAdsClient, $customerId, $feedData);

        // Creates a feed mapping, which tells Google Ads how to interpret this data to
        // display additional sitelink information on ads.
        self::createFeedMapping($googleAdsClient, $customerId, $feedData);

        // Creates a campaign feed, which tells Google Ads which campaigns to use the
        // provided data with.
        self::createCampaignFeed($googleAdsClient, $customerId, $campaignId, $feedData);

        // If an ad group is specified, limits targeting only to the given ad group.
        if (!is_null($adGroupId)) {
            self::createAdGroupTargeting($googleAdsClient, $customerId, $adGroupId, $feedData);
        }
    }

    /**
     * Creates a feed.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return array the feed data containing the created feed resource name and the feed attribute
     *     IDs
     */
    private static function createFeed(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Creates a feed.
        $feed = new Feed([
            'name' => 'Sitelinks Feed #' . Helper::getPrintableDatetime(),
            'origin' => FeedOrigin::USER,
            // Specifies the column name and data type. This is just raw data at this point,
            // and not yet linked to any particular purpose. The names are used to help us
            // remember what they are intended for later.
            'attributes' => [
                new FeedAttribute(['name' => 'Link Text', 'type' => FeedAttributeType::STRING]),
                new FeedAttribute([
                    'name' => 'Link Final URL',
                    'type' => FeedAttributeType::URL_LIST
                ]),
                new FeedAttribute(['name' => 'Line 1', 'type' => FeedAttributeType::STRING]),
                new FeedAttribute(['name' => 'Line 2', 'type' => FeedAttributeType::STRING])
            ]
        ]);

        // Creates a feed operation.
        $feedOperation = new FeedOperation();
        $feedOperation->setCreate($feed);

        // Issues a mutate request to add the feed.
        $feedServiceClient = $googleAdsClient->getFeedServiceClient();
        $response = $feedServiceClient->mutateFeeds(
            $customerId,
            [$feedOperation]
        );

        $feedResourceName = $response->getResults()[0]->getResourceName();
        // Prints some information about the created feed.
        printf("Created a feed with the resource name: '%s'.%s", $feedResourceName, PHP_EOL);

        // After we create the feed, we need to fetch it so we can determine the attribute IDs,
        // which will be required when populating feed items.
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Creates a query that retrieves the created feed.
        $query = "SELECT feed.attributes FROM feed WHERE feed.resource_name = '$feedResourceName'";
        // Issues a search stream request.
        /** @var GoogleAdsServerStreamDecorator $stream */
        $stream = $googleAdsServiceClient->searchStream($customerId, $query);
        /** @var GoogleAdsRow $googleAdsRow */
        $googleAdsRow = $stream->iterateAllElements()->current();

        $feedAttributeIds = [];
        foreach ($googleAdsRow->getFeed()->getAttributes() as $attribute) {
            /** @var FeedAttribute $attribute  */
            $feedAttributeIds[] = $attribute->getId();
        }

        return [
            'feed' => $feedResourceName,
            // The attribute IDs come back in the same order that they were added.
            'textAttributeId' => $feedAttributeIds[0],
            'finalUrlAttributeId' => $feedAttributeIds[1],
            'line1AttributeId' => $feedAttributeIds[2],
            'line2AttributeId' => $feedAttributeIds[3]
        ];
    }

    /**
     * Creates feed items.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param array $feedData the feed data containing information about the created feed
     * @return array the feed data containing information about the created feed and feed items
     */
    private static function createFeedItems(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $feedData
    ) {
        // Creates new feed item operations.
        $operations = [
            self::createFeedItemOperation(
                $feedData,
                'Home',
                'http://www.example.com',
                'Home line 1',
                'Home line 2'
            ),
            self::createFeedItemOperation(
                $feedData,
                'Stores',
                'http://www.example.com/stores',
                'Stores line 1',
                'Stores line 2'
            ),
            self::createFeedItemOperation(
                $feedData,
                'On Sale',
                'http://www.example.com/sale',
                'On Sale line 1',
                'On Sale line 2'
            ),
            self::createFeedItemOperation(
                $feedData,
                'Support',
                'http://www.example.com/support',
                'Support line 1',
                'Support line 2'
            ),
            self::createFeedItemOperation(
                $feedData,
                'Products',
                'http://www.example.com/catalogue',
                'Products line 1',
                'Products line 2'
            ),
            self::createFeedItemOperation(
                $feedData,
                'About Us',
                'http://www.example.com/about',
                'About Us line 1',
                'About Us line 2'
            )
        ];

        // Issues a mutate request to add the feed items.
        $feedItemServiceClient = $googleAdsClient->getFeedItemServiceClient();
        $response = $feedItemServiceClient->mutateFeedItems($customerId, $operations);

        // Prints some information about the created feed items.
        printf(
            "Created %d feed items with the following resource names:%s",
            $response->getResults()->count(),
            PHP_EOL
        );
        $addedFeedItemsResourceNames = [];
        foreach ($response->getResults() as $addedFeedItem) {
            /** @var ExtensionFeedItem $addedFeedItem */
            $addedFeedItemResourceName = $addedFeedItem->getResourceName();
            print "\t" . $addedFeedItemResourceName . PHP_EOL;
            $addedFeedItemsResourceNames[] = $addedFeedItemResourceName;
        }

        // We will need the resource name of the feed item to use in targeting.
        $feedData['feedItems'] = $addedFeedItemsResourceNames;

        // We may also need the feed item ID if we are going to use it in a mapping function.
        // For feed items, the ID is the last part of the resource name, after the '~'.
        $feedData['feedItemIds'] = array_map(
            function (string $feedResourceName) {
                $tokens = explode('~', $feedResourceName);
                return end($tokens);
            },
            $addedFeedItemsResourceNames
        );

        return $feedData;
    }

    /**
     * Creates a new feed item operation.
     *
     * @param array $feedData the feed data used for creating new feed item operation
     * @param string $sitelinkText the sitelink text
     * @param string $sitelinkFinalUrl the sitelink final URL
     * @param string $sitelinkLine1 the sitelink line 1
     * @param string $sitelinkLine2 the sitelink line 2
     * @return FeedItemOperation the created feed item operation
     */
    private static function createFeedItemOperation(
        array $feedData,
        string $sitelinkText,
        string $sitelinkFinalUrl,
        string $sitelinkLine1,
        string $sitelinkLine2
    ) {
        // Creates a feed item used for creating a new feed item operation.
        $feedItem = new FeedItem([
            'feed' => $feedData['feed'],
            'attribute_values' => [
                new FeedItemAttributeValue([
                    'feed_attribute_id' => $feedData['textAttributeId'],
                    'string_value' => $sitelinkText
                ]),
                new FeedItemAttributeValue([
                    'feed_attribute_id' => $feedData['finalUrlAttributeId'],
                    'string_values' => [$sitelinkFinalUrl]
                ]),
                new FeedItemAttributeValue([
                    'feed_attribute_id' => $feedData['line1AttributeId'],
                    'string_value' => $sitelinkLine1
                ]),
                new FeedItemAttributeValue([
                    'feed_attribute_id' => $feedData['line2AttributeId'],
                    'string_value' => $sitelinkLine2
                ])
            ]
        ]);
        return new FeedItemOperation(['create' => $feedItem]);
    }

    /**
     * Creates a feed mapping.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param array $feedData the feed data containing information about the created feed and feed
     *     items
     */
    private static function createFeedMapping(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $feedData
    ) {
        // Creates a feed mapping.
        $feedMapping = new FeedMapping([
            'placeholder_type' => PlaceholderType::SITELINK,
            'feed' => $feedData['feed'],
            'attribute_field_mappings' => [
                new AttributeFieldMapping([
                    'feed_attribute_id' => $feedData['textAttributeId'],
                    'sitelink_field' => SitelinkPlaceholderField::TEXT
                ]),
                new AttributeFieldMapping([
                    'feed_attribute_id' => $feedData['finalUrlAttributeId'],
                    'sitelink_field' => SitelinkPlaceholderField::FINAL_URLS
                ]),
                new AttributeFieldMapping([
                    'feed_attribute_id' => $feedData['line1AttributeId'],
                    'sitelink_field' => SitelinkPlaceholderField::LINE_1
                ]),
                new AttributeFieldMapping([
                    'feed_attribute_id' => $feedData['line2AttributeId'],
                    'sitelink_field' => SitelinkPlaceholderField::LINE_2
                ])
            ]
        ]);

        // Creates a feed mapping operation.
        $feedMappingOperation = new FeedMappingOperation();
        $feedMappingOperation->setCreate($feedMapping);

        // Issues a mutate request to add the feed mapping.
        $feedMappingServiceClient = $googleAdsClient->getFeedMappingServiceClient();
        $response = $feedMappingServiceClient->mutateFeedMappings(
            $customerId,
            [$feedMappingOperation]
        );

        $feedMappingResourceName = $response->getResults()[0]->getResourceName();
        // Prints some information about the created feed mapping.
        printf(
            "Created a feed mapping with the resource name: '%s'.%s",
            $feedMappingResourceName,
            PHP_EOL
        );
    }

    /**
     * Creates a campaign feed.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID to create a campaign feed for
     * @param array $feedData the feed data containing information about the created feed and feed
     *     items
     */
    private static function createCampaignFeed(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        array $feedData
    ) {
        // Creates a campaign feed with the specified matching function.
        $campaignFeed = new CampaignFeed([
            'feed' => $feedData['feed'],
            'placeholder_types' => [PlaceholderType::SITELINK],
            'campaign' => ResourceNames::forCampaign($customerId, $campaignId),
            'matching_function' => new MatchingFunction([
                'function_string' => sprintf(
                    "AND(IN(FEED_ITEM_ID,{ %s }),EQUALS(CONTEXT.DEVICE,'Mobile'))",
                    implode(',', $feedData['feedItemIds'])
                )
            ])
        ]);

        // Creates a campaign feed operation.
        $campaignFeedOperation = new CampaignFeedOperation();
        $campaignFeedOperation->setCreate($campaignFeed);

        // Issues a mutate request to add the campaign feed.
        $campaignFeedServiceClient = $googleAdsClient->getCampaignFeedServiceClient();
        $response = $campaignFeedServiceClient->mutateCampaignFeeds(
            $customerId,
            [$campaignFeedOperation]
        );

        $campaignFeedResourceName = $response->getResults()[0]->getResourceName();
        // Prints some information about the created campaign feed.
        printf(
            "Created a campaign feed with the resource name: '%s'.%s",
            $campaignFeedResourceName,
            PHP_EOL
        );
    }

    /**
     * Creates an ad group targeting for the first feed item.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID to create a targeting for
     * @param array $feedData the feed data containing information about the created feed and feed
     *     items
     */
    private static function createAdGroupTargeting(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        array $feedData
    ) {
        $feedItem = $feedData['feedItems'][0];
        // Creates a feed item target.
        $feedItemTarget = new FeedItemTarget([
            // You must set targeting on a per-feed-item basis. This will restrict the
            // first feed item we added to only serve for the given ad group.
            'feed_item' => $feedItem,
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId)
        ]);

        // Creates a feed item target operation.
        $feedItemTargetOperation = new FeedItemTargetOperation();
        $feedItemTargetOperation->setCreate($feedItemTarget);

        // Issues a mutate request to add the feed item target.
        $feedItemTargetServiceClient = $googleAdsClient->getFeedItemTargetServiceClient();
        $response = $feedItemTargetServiceClient->mutateFeedItemTargets(
            $customerId,
            [$feedItemTargetOperation]
        );

        $feedItemTargetResourceName = $response->getResults()[0]->getResourceName();
        // Prints some information about the created feed item target.
        printf(
            "Created a feed item target '%s' for the feed item '%s'.%s",
            $feedItemTargetResourceName,
            $feedItem,
            PHP_EOL
        );
    }
}

AddSitelinksUsingFeeds::main();
