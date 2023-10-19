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
use Google\Ads\GoogleAds\Examples\Utils\Feeds;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V15\GoogleAdsException;
use Google\Ads\GoogleAds\V15\Enums\FeedAttributeTypeEnum\FeedAttributeType;
use Google\Ads\GoogleAds\V15\Enums\PlaceholderTypeEnum\PlaceholderType;
use Google\Ads\GoogleAds\V15\Enums\RealEstatePlaceholderFieldEnum\RealEstatePlaceholderField;
use Google\Ads\GoogleAds\V15\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V15\Resources\AttributeFieldMapping;
use Google\Ads\GoogleAds\V15\Resources\Feed;
use Google\Ads\GoogleAds\V15\Resources\FeedAttribute;
use Google\Ads\GoogleAds\V15\Resources\FeedItem;
use Google\Ads\GoogleAds\V15\Resources\FeedItemAttributeValue;
use Google\Ads\GoogleAds\V15\Resources\FeedMapping;
use Google\Ads\GoogleAds\V15\Services\FeedItemOperation;
use Google\Ads\GoogleAds\V15\Services\FeedMappingOperation;
use Google\Ads\GoogleAds\V15\Services\FeedOperation;
use Google\Ads\GoogleAds\V15\Services\MutateFeedItemsRequest;
use Google\Ads\GoogleAds\V15\Services\MutateFeedMappingsRequest;
use Google\Ads\GoogleAds\V15\Services\MutateFeedsRequest;
use Google\ApiCore\ApiException;

/** Adds a real estate feed, creates the feed mapping, and adds items to the feed. */
class AddRealEstateFeed
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
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Creates a new feed, but you can fetch and re-use an existing feed by skipping the
        // createFeed method and inserting the feed resource name of the existing feed into the
        // getFeed method.
        $feedResourceName = self::createFeed($googleAdsClient, $customerId);
        // Gets the page feed details.
        $placeHoldersToFeedAttributesMap = Feeds::realEstatePlaceholderFieldsMapFor(
            $feedResourceName,
            $customerId,
            $googleAdsClient
        );
        // Creates the feed mapping.
        self::createFeedMapping(
            $googleAdsClient,
            $customerId,
            $feedResourceName,
            $placeHoldersToFeedAttributesMap
        );
        // Creates the feed item and adds it to the feed.
        self::createFeedItem(
            $googleAdsClient,
            $customerId,
            $feedResourceName,
            $placeHoldersToFeedAttributesMap
        );
    }

    /**
     * Creates a feed.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the feed resource name
     */
    private static function createFeed(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Creates a listing ID attribute.
        $listingIdAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::STRING,
            'name' => 'Listing ID'
        ]);
        // Creates a listing name attribute.
        $listingNameAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::STRING,
            'name' => 'Listing Name'
        ]);
        // Creates a final URLs attribute.
        $finalUrlsAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::URL_LIST,
            'name' => 'Final URLs'
        ]);
        // Creates an image URL attribute.
        $imageUrlAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::URL,
            'name' => 'Image URL'
        ]);
        // Creates a contextual keywords attribute.
        $contextualKeywordsAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::STRING_LIST,
            'name' => 'Contextual Keywords'
        ]);

        // Creates the feed with the newly created feed attributes.
        $feed = new Feed([
            'name' => 'Real Estate Feed #' . Helper::getPrintableDatetime(),
            'attributes' => [
                $listingIdAttribute,
                $listingNameAttribute,
                $finalUrlsAttribute,
                $imageUrlAttribute,
                $contextualKeywordsAttribute
            ]
        ]);

        // Creates the feed operation.
        $operation = new FeedOperation();
        $operation->setCreate($feed);

        // Issues a mutate request to add the feed and print some information.
        $feedServiceClient = $googleAdsClient->getFeedServiceClient();
        $response =
            $feedServiceClient->mutateFeeds(MutateFeedsRequest::build($customerId, [$operation]));
        $feedResourceName = $response->getResults()[0]->getResourceName();
        printf("Feed with resource name '%s' was created.%s", $feedResourceName, PHP_EOL);

        return $feedResourceName;
    }

    /**
     * Creates a feed mapping for a given feed.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $feedResourceName the feed resource name for creating a feed mapping
     * @param array $placeHoldersToFeedAttributesMap the map from placeholder fields to feed
     *      attributes
     */
    private static function createFeedMapping(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $feedResourceName,
        array $placeHoldersToFeedAttributesMap
    ) {
        // Maps the feed attribute IDs to the placeholder values. The feed attribute ID is the ID
        // of the feed attribute created in the createdFeed method. This can be thought of as the
        // generic ID of the column of the new feed. The placeholder value specifies the type of
        // column this is in the context of a real estate feed (e.g. a LISTING_ID or
        // LISTING_NAME). The feed mapping associates the feed column by ID to this type and
        // controls how the feed attributes are presented in dynamic content.
        // See RealEstatePlaceholderField.php for the full list of placeholder values.
        $listingIdMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                RealEstatePlaceholderField::LISTING_ID]->getId(),
            'real_estate_field' => RealEstatePlaceholderField::LISTING_ID
        ]);
        $listingNameMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                RealEstatePlaceholderField::LISTING_NAME]->getId(),
            'real_estate_field' => RealEstatePlaceholderField::LISTING_NAME
        ]);
        $finalUrlsMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                RealEstatePlaceholderField::FINAL_URLS]->getId(),
            'real_estate_field' => RealEstatePlaceholderField::FINAL_URLS
        ]);
        $imageUrlMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                RealEstatePlaceholderField::IMAGE_URL]->getId(),
            'real_estate_field' => RealEstatePlaceholderField::IMAGE_URL
        ]);
        $contextualKeywordsMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                RealEstatePlaceholderField::CONTEXTUAL_KEYWORDS]->getId(),
            'real_estate_field' => RealEstatePlaceholderField::CONTEXTUAL_KEYWORDS
        ]);

        // Creates the feed mapping.
        $feedMapping = new FeedMapping([
            'placeholder_type' => PlaceholderType::DYNAMIC_REAL_ESTATE,
            'feed' => $feedResourceName,
            'attribute_field_mappings' => [
                $listingIdMapping,
                $listingNameMapping,
                $finalUrlsMapping,
                $imageUrlMapping,
                $contextualKeywordsMapping
            ]
        ]);

        // Creates the feed mapping operation.
        $operation = new FeedMappingOperation();
        $operation->setCreate($feedMapping);

        // Issues a mutate request to add the feed mapping and print some information.
        $feedMappingServiceClient = $googleAdsClient->getFeedMappingServiceClient();
        $response = $feedMappingServiceClient->mutateFeedMappings(
            MutateFeedMappingsRequest::build($customerId, [$operation])
        );
        printf(
            "Feed mapping with resource name '%s' was created.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }

    /**
     * Adds a new item to the feed.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $feedResourceName the feed resource name for creating a feed item
     * @param array $placeHoldersToFeedAttributesMap the map from placeholder fields to feed
     *      attributes
     */
    // [START add_real_estate_feed_1]
    private static function createFeedItem(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $feedResourceName,
        array $placeHoldersToFeedAttributesMap
    ) {
        // Creates the listing ID feed attribute value.
        $listingIdAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                RealEstatePlaceholderField::LISTING_ID]->getId(),
            'string_value' => 'ABC123DEF'
        ]);
        // Creates the listing name feed attribute value.
        $listingNameAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                RealEstatePlaceholderField::LISTING_NAME]->getId(),
            'string_value' => 'Two bedroom with magnificent views'
        ]);
        // Creates the final URLs feed attribute value.
        $finalUrlsAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                RealEstatePlaceholderField::FINAL_URLS]->getId(),
            'string_values' => ['http://www.example.com/listings/']
        ]);
        // Creates the image URL feed attribute value.
        $imageUrlAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id'
                => $placeHoldersToFeedAttributesMap[RealEstatePlaceholderField::IMAGE_URL]->getId(),
            'string_value' => 'http://www.example.com/listings/images?listing_id=ABC123DEF'
        ]);
        // Creates the contextual keywords feed attribute value.
        $contextualKeywordsAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                RealEstatePlaceholderField::CONTEXTUAL_KEYWORDS]->getId(),
            'string_values' => ['beach community', 'ocean view', 'two bedroom']
        ]);

        // Creates the feed item, specifying the feed ID and the attributes created above.
        $feedItem = new FeedItem([
            'feed' => $feedResourceName,
            'attribute_values' => [
                $listingIdAttributeValue,
                $listingNameAttributeValue,
                $finalUrlsAttributeValue,
                $imageUrlAttributeValue,
                $contextualKeywordsAttributeValue
            ]
        ]);

        // Creates the feed item operation.
        $operation = new FeedItemOperation();
        $operation->setCreate($feedItem);

        // Issues a mutate request to add the feed item and print some information.
        $feedItemServiceClient = $googleAdsClient->getFeedItemServiceClient();
        $response = $feedItemServiceClient->mutateFeedItems(
            MutateFeedItemsRequest::build($customerId, [$operation])
        );
        printf(
            "Feed item with resource name '%s' was created.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_real_estate_feed_1]
}

AddRealEstateFeed::main();
