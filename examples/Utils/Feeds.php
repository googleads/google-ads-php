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

namespace Google\Ads\GoogleAds\Examples\Utils;

use Google\Ads\GoogleAds\Lib\V4\GoogleAdsClient;
use Google\Ads\GoogleAds\V4\Enums\FlightPlaceholderFieldEnum\FlightPlaceholderField;
use Google\Ads\GoogleAds\V4\Enums\RealEstatePlaceholderFieldEnum\RealEstatePlaceholderField;
use Google\Ads\GoogleAds\V4\Resources\FeedAttribute;
use Google\Ads\GoogleAds\V4\Resources\FeedItem;
use Google\Ads\GoogleAds\V4\Resources\FeedItemAttributeValue;
use Google\Ads\GoogleAds\V4\Services\GoogleAdsRow;

/**
 * Utilities that are shared between code examples related to feeds.
 */
final class Feeds
{
    private const PAGE_SIZE = 1000;

    /**
     * Retrieves a feed item and its attribute values given a resource name.
     *
     * @param string $feedItemResourceName the feed item resource name
     * @param int $customerId the customer ID
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @return FeedItem the feed item
     */
    public static function feedItemFor(
        string $feedItemResourceName,
        int $customerId,
        GoogleAdsClient $googleAdsClient
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Constructs the query to get the feed item with attribute values.
        $query = "SELECT feed_item.attribute_values FROM feed_item"
            . " WHERE feed_item.resource_name = '$feedItemResourceName'";
        // Issues a search request by specifying page size.
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        // Returns the feed item attribute values, which belongs to the first item. We can ensure
        // it belongs to the first one because we specified the feed item resource name in the
        // query.
        return $response->getIterator()->current()->getFeedItem();
    }

    /**
     * Gets the index of the target feed item attribute value. This is needed to specify which feed
     * item attribute value will be updated in the given feed item.
     *
     * @param FeedItemAttributeValue $targetFeedItemAttributeValue the new feed item attribute value
     *     that will be updated
     * @param FeedItem $feedItem the feed item that will be updated. It should be populated with
     *     the current attribute values
     * @return int the attribute index
     */
    public static function attributeIndexFor(
        FeedItemAttributeValue $targetFeedItemAttributeValue,
        FeedItem $feedItem
    ) {
        $attributeIndex = -1;
        // Loops through attribute values to find the index of the feed item attribute value to
        // update.
        foreach ($feedItem->getAttributeValues() as $feedItemAttributeValue) {
            /** @var FeedItemAttributeValue $feedItemAttributeValue */
            $attributeIndex++;
            // Checks if the current feedItemAttributeValue is the one we are updating
            if (
                $feedItemAttributeValue->getFeedAttributeIdUnwrapped()
                === $targetFeedItemAttributeValue->getFeedAttributeIdUnwrapped()
            ) {
                break;
            }
        }

        if ($attributeIndex === -1) {
            throw new \InvalidArgumentException(
                'No matching feed attribute for feed item attribute ID: '
                . $targetFeedItemAttributeValue->getFeedAttributeIdUnwrapped()
            );
        }

        return $attributeIndex;
    }

    /**
     * Retrieves the place holder fields to feed attributes map for a flights feed.
     * See FlightPlaceholderField.php for all available placeholder field values.
     *
     * @see Feeds::placeholderFieldsMapFor()
     *
     * @param string $feedResourceName the feed resource name to get the attributes from
     * @param int $customerId the customer ID
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @return array the map from placeholder fields to feed attributes
     */
    public static function flightPlaceholderFieldsMapFor(
        string $feedResourceName,
        int $customerId,
        GoogleAdsClient $googleAdsClient
    ) {
        return self::placeholderFieldsMapFor(
            $feedResourceName,
            $customerId,
            $googleAdsClient,
            [
                'Flight Description' => FlightPlaceholderField::FLIGHT_DESCRIPTION,
                'Destination ID' => FlightPlaceholderField::DESTINATION_ID,
                'Flight Price' => FlightPlaceholderField::FLIGHT_PRICE,
                'Flight Sale Price' => FlightPlaceholderField::FLIGHT_SALE_PRICE,
                'Final URLs' => FlightPlaceholderField::FINAL_URLS
            ]
        );
    }

    /**
     * Retrieves the place holder fields to feed attributes map for a real estate feed.
     * See RealEstatePlaceholderField.php for all available placeholder field values.
     *
     * @see Feeds::placeholderFieldsMapFor()
     *
     * @param string $feedResourceName the feed resource name to get the attributes from
     * @param int $customerId the customer ID
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @return array the map from placeholder fields to feed attributes
     */
    public static function realEstatePlaceholderFieldsMapFor(
        string $feedResourceName,
        int $customerId,
        GoogleAdsClient $googleAdsClient
    ) {
        return self::placeholderFieldsMapFor(
            $feedResourceName,
            $customerId,
            $googleAdsClient,
            [
                'Listing ID' => RealEstatePlaceholderField::LISTING_ID,
                'Listing Name' => RealEstatePlaceholderField::LISTING_NAME,
                'Final URLs' => RealEstatePlaceholderField::FINAL_URLS,
                'Image URL' => RealEstatePlaceholderField::IMAGE_URL,
                'Contextual Keywords' => RealEstatePlaceholderField::CONTEXTUAL_KEYWORDS
            ]
        );
    }

    /**
     * Retrieves the placeholder fields to feed attributes map for a feed. The initial
     * query retrieves the feed attributes, or columns, of the feed. Each feed attribute will also
     * include the feed attribute ID, which will be used in a subsequent step.
     *
     * Then a map is created for the feed attributes (columns) and returned:
     * - The keys are the placeholder types that the columns will be.
     * - The values are the feed attributes.
     *
     * @param string $feedResourceName the feed resource name to get the attributes from
     * @param int $customerId the customer ID
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param array $feedAttributeNamesMap the associative array mapping from feed attribute names
     *     to placeholder fields
     * @return array the map from placeholder fields to feed attributes
     */
    private static function placeholderFieldsMapFor(
        string $feedResourceName,
        int $customerId,
        GoogleAdsClient $googleAdsClient,
        array $feedAttributeNamesMap
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        // Constructs the query to get the feed attributes for the specified feed resource name.
        $query = "SELECT feed.attributes FROM feed WHERE feed.resource_name = '$feedResourceName'";
        // Issues a search request by specifying page size.
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        // Gets the first result because we only need the single feed we created previously.
        /** @var GoogleAdsRow $googleAdsRow */
        $googleAdsRow = $response->getIterator()->current();

        // Gets the attributes list from the feed and creates a map with keys of placeholder fields
        // and values of feed attributes.
        $feedAttributes =
            iterator_to_array($googleAdsRow->getFeed()->getAttributes()->getIterator());
        $placeholderFields = array_map(
            function (FeedAttribute $feedAttribute) use ($feedAttributeNamesMap) {
                if (!array_key_exists($feedAttribute->getNameUnwrapped(), $feedAttributeNamesMap)) {
                    throw new \RuntimeException('Invalid feed attribute name.');
                }
                return $feedAttributeNamesMap[$feedAttribute->getNameUnwrapped()];
            },
            $feedAttributes
        );
        return array_combine($placeholderFields, $feedAttributes);
    }
}
