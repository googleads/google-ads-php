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
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsException;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V3\ResourceNames;
use Google\Ads\GoogleAds\V3\Enums\FlightPlaceholderFieldEnum\FlightPlaceholderField;
use Google\Ads\GoogleAds\V3\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V3\Resources\FeedItemAttributeValue;
use Google\Ads\GoogleAds\V3\Services\FeedItemOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\Int64Value;

/**
 * Removes a feed item attribute value of a feed item in a flights feed. To create a flights feed,
 * run the AddFlightsFeed example. This example is specific to feeds of type DYNAMIC_FLIGHT.
 * The attribute you are removing must be present on the feed.
 *
 * This example is specifically for removing an attribute of a flights feed item,
 * but it can also be changed to work with other feed types.
 *
 * To make this work with other feed types, replace the FlightPlaceholderField enum with the
 * equivalent one of your feed type, and replace Feeds::flightPlaceholderFieldsMapFor() with the
 * method that can return a similar value for your feed type. Check the
 * flightPlaceholderFieldsMapFor() method for details.
 */
class RemoveFlightsFeedItemAttributeValue
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const FEED_ID = 'INSERT_FEED_ID_HERE';
    private const FEED_ITEM_ID = 'INSERT_FEED_ITEM_ID_HERE';
    private const FLIGHT_PLACEHOLDER_FIELD_NAME = 'INSERT_FLIGHT_PLACEHOLDER_FIELD_NAME_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FEED_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FEED_ITEM_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::FLIGHT_PLACEHOLDER_FIELD_NAME => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::FEED_ITEM_ID] ?: self::FEED_ITEM_ID,
                $options[ArgumentNames::FLIGHT_PLACEHOLDER_FIELD_NAME]
                    ?: self::FLIGHT_PLACEHOLDER_FIELD_NAME
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
     * @param int $feedId the ID of feed containing the feed item to be updated
     * @param int $feedItemId ID of the feed item to be updated
     * @param string $flightPlaceholderFieldName the flight placeholder field name for the attribute
     *     to be removed
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $feedId,
        int $feedItemId,
        string $flightPlaceholderFieldName
    ) {
        // Gets a map of the placeholder values to feed attributes.
        $placeHoldersToFeedAttributesMap = Feeds::flightPlaceholderFieldsMapFor(
            ResourceNames::forFeed($customerId, $feedId),
            $customerId,
            $googleAdsClient
        );
        // Gets the ID of the feed attribute for the placeholder field.
        $attributeId = $placeHoldersToFeedAttributesMap[
            FlightPlaceholderField::value($flightPlaceholderFieldName)]->getIdUnwrapped();
        // Creates the feed item attribute value that will be removed, so only the feed attribute ID
        // is needed.
        $removedFeedItemAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => new Int64Value(['value' => $attributeId])
        ]);

        // Retrieves the feed item and its associated attributes based on the resource name.
        $feedItem = Feeds::feedItemFor(
            ResourceNames::forFeedItem($customerId, $feedId, $feedItemId),
            $customerId,
            $googleAdsClient
        );
        // Gets the index of the attribute value that will be removed in the feed item.
        $attributeIndex = Feeds::attributeIndexFor($removedFeedItemAttributeValue, $feedItem);
        // Any feed item attribute values that are not included in the feed item will be removed,
        // which is why you must retain all other feed attribute values here.
        $feedItemAttributeValues = array_filter(
            iterator_to_array($feedItem->getAttributeValues()->getIterator()),
            function ($index) use ($attributeIndex) {
                return $index !== $attributeIndex;
            },
            ARRAY_FILTER_USE_KEY
        );
        $feedItem->setAttributeValues($feedItemAttributeValues);

        // Creates the feed item operation.
        $operation = new FeedItemOperation();
        $operation->setUpdate($feedItem);
        $operation->setUpdateMask(FieldMasks::allSetFieldsOf($feedItem));

        // Issues a mutate request to update the feed item and print some information.
        $feedItemServiceClient = $googleAdsClient->getFeedItemServiceClient();
        $response = $feedItemServiceClient->mutateFeedItems($customerId, [$operation]);
        printf(
            "Feed item with resource name '%s' was updated to remove the value of"
            . " placeholder field type '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            $flightPlaceholderFieldName,
            PHP_EOL
        );
    }
}

RemoveFlightsFeedItemAttributeValue::main();
