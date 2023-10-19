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
use Google\Ads\GoogleAds\V15\Enums\FlightPlaceholderFieldEnum\FlightPlaceholderField;
use Google\Ads\GoogleAds\V15\Enums\PlaceholderTypeEnum\PlaceholderType;
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

/** Adds a flights feed, creates the associated feed mapping, and adds a feed item. */
class AddFlightsFeed
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
        // Creates a new flights feed.
        $feedResourceName = self::createFeed($googleAdsClient, $customerId);
        // Gets the newly created feed's attributes and packages them into a map. This read
        // operation is required to retrieve the attribute IDs.
        $placeHoldersToFeedAttributesMap =
            Feeds::flightPlaceholderFieldsMapFor($feedResourceName, $customerId, $googleAdsClient);
        // Creates the feed mapping.
        self::createFeedMapping(
            $googleAdsClient,
            $customerId,
            $feedResourceName,
            $placeHoldersToFeedAttributesMap
        );
        // Creates a feed item.
        self::createFeedItem(
            $googleAdsClient,
            $customerId,
            $feedResourceName,
            $placeHoldersToFeedAttributesMap
        );
    }

    /**
     * Creates a feed that will be used as a flight feed.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the feed resource name
     */
    private static function createFeed(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Creates a flight description attribute.
        $flightDescriptionAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::STRING,
            'name' => 'Flight Description'
        ]);
        // Creates a destination ID attribute.
        $destinationIdAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::STRING,
            'name' => 'Destination ID'
        ]);
        // Creates a flight price attribute.
        $flightPriceAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::STRING,
            'name' => 'Flight Price'
        ]);
        // Creates a flight sale price attribute.
        $flightSalesPriceAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::STRING,
            'name' => 'Flight Sale Price'
        ]);
        // Creates a Final URLs attribute.
        $finalUrlsAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::URL_LIST,
            'name' => 'Final URLs'
        ]);

        // Creates the feed with the newly created feed attributes.
        $feed = new Feed([
            'name' => 'Flights Feed #' . Helper::getPrintableDatetime(),
            'attributes' => [
                $flightDescriptionAttribute,
                $destinationIdAttribute,
                $flightPriceAttribute,
                $flightSalesPriceAttribute,
                $finalUrlsAttribute
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
        // Maps the feed attribute IDs to the field ID constants.
        $flightDescriptionMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                FlightPlaceholderField::FLIGHT_DESCRIPTION]->getId(),
            'flight_field' => FlightPlaceholderField::FLIGHT_DESCRIPTION
        ]);
        $destinationIdMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                FlightPlaceholderField::DESTINATION_ID]->getId(),
            'flight_field' => FlightPlaceholderField::DESTINATION_ID
        ]);
        $flightPriceMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                FlightPlaceholderField::FLIGHT_PRICE]->getId(),
            'flight_field' => FlightPlaceholderField::FLIGHT_PRICE
        ]);
        $flightSalePriceMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                FlightPlaceholderField::FLIGHT_SALE_PRICE]->getId(),
            'flight_field' => FlightPlaceholderField::FLIGHT_SALE_PRICE
        ]);
        $finalUrlsMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                FlightPlaceholderField::FINAL_URLS]->getId(),
            'flight_field' => FlightPlaceholderField::FINAL_URLS
        ]);

        // Creates the feed mapping.
        $feedMapping = new FeedMapping([
            'placeholder_type' => PlaceholderType::DYNAMIC_FLIGHT,
            'feed' => $feedResourceName,
            'attribute_field_mappings' => [
                $flightDescriptionMapping,
                $destinationIdMapping,
                $flightPriceMapping,
                $flightSalePriceMapping,
                $finalUrlsMapping
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
    private static function createFeedItem(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $feedResourceName,
        array $placeHoldersToFeedAttributesMap
    ) {
        // Creates the flight description feed attribute value.
        $flightDescriptionAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                FlightPlaceholderField::FLIGHT_DESCRIPTION]->getId(),
            'string_value' => 'Earth to Mars'
        ]);
        // Creates the destination ID feed attribute value.
        $destinationIdAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                FlightPlaceholderField::DESTINATION_ID]->getId(),
            'string_value' => 'Mars'
        ]);
        // Creates the flight price feed attribute value.
        $flightPriceAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                FlightPlaceholderField::FLIGHT_PRICE]->getId(),
            'string_value' => '499.99 USD'
        ]);
        // Creates the flight sale price feed attribute value.
        $flightSalePriceAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $placeHoldersToFeedAttributesMap[
                FlightPlaceholderField::FLIGHT_SALE_PRICE]->getId(),
            'string_value' => '299.99 USD'
        ]);
        // Creates the final URLs feed attribute value.
        $finalUrlsAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id'
                => $placeHoldersToFeedAttributesMap[FlightPlaceholderField::FINAL_URLS]->getId(),
            'string_values' => ['http://www.example.com/flights/']
        ]);

        // Creates the feed item, specifying the feed ID and the attributes created above.
        $feedItem = new FeedItem([
            'feed' => $feedResourceName,
            'attribute_values' => [
                $flightDescriptionAttributeValue,
                $destinationIdAttributeValue,
                $flightPriceAttributeValue,
                $flightSalePriceAttributeValue,
                $finalUrlsAttributeValue
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
}

AddFlightsFeed::main();
