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
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\V2\Enums\FeedAttributeTypeEnum\FeedAttributeType;
use Google\Ads\GoogleAds\V2\Enums\FlightPlaceholderFieldEnum\FlightPlaceholderField;
use Google\Ads\GoogleAds\V2\Enums\PlaceholderTypeEnum\PlaceholderType;
use Google\Ads\GoogleAds\V2\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V2\Resources\AttributeFieldMapping;
use Google\Ads\GoogleAds\V2\Resources\Feed;
use Google\Ads\GoogleAds\V2\Resources\FeedAttribute;
use Google\Ads\GoogleAds\V2\Resources\FeedItem;
use Google\Ads\GoogleAds\V2\Resources\FeedItemAttributeValue;
use Google\Ads\GoogleAds\V2\Resources\FeedMapping;
use Google\Ads\GoogleAds\V2\Services\FeedItemOperation;
use Google\Ads\GoogleAds\V2\Services\FeedMappingOperation;
use Google\Ads\GoogleAds\V2\Services\FeedOperation;
use Google\Ads\GoogleAds\V2\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/** Adds a flights feed, creates the associated feed mapping, and adds a feed item. */
class AddFlightsFeed
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const PAGE_SIZE = 1000;

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
     * @param int $customerId the customer ID
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Creates a new flights feed.
        $feedResourceName = self::createFeed($googleAdsClient, $customerId);
        // Gets the newly created feed's attributes and packages them into a map. This read
        // operation is required to retrieve the attribute IDs.
        $placeHoldersToFeedAttributesMap =
            self::getFeed($googleAdsClient, $customerId, $feedResourceName);
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
            'name' => new StringValue(['value' => 'Flight Description'])
        ]);
        // Creates a destination ID attribute.
        $destinationIdAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::STRING,
            'name' => new StringValue(['value' => 'Destination ID'])
        ]);
        // Creates a flight price attribute.
        $flightPriceAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::STRING,
            'name' => new StringValue(['value' => 'Flight Price'])
        ]);
        // Creates a flight sale price attribute.
        $flightSalesPriceAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::STRING,
            'name' => new StringValue(['value' => 'Flight Sale Price'])
        ]);
        // Creates a Final URLs attribute.
        $finalUrlsAttribute = new FeedAttribute([
            'type' =>  FeedAttributeType::URL_LIST,
            'name' => new StringValue(['value' => 'Final URLs'])
        ]);

        // Creates the feed with the newly created feed attributes.
        $feed = new Feed([
            'name' => new StringValue(['value' => 'Flights Feed #' . uniqid()]),
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
        $response = $feedServiceClient->mutateFeeds($customerId, [$operation]);
        $feedResourceName = $response->getResults()[0]->getResourceName();
        printf("Feed with resource name '%s' was created.%s", $feedResourceName, PHP_EOL);

        return $feedResourceName;
    }

    /**
     * Retrieves details about a feed. The initial query retrieves the feed attributes, or columns,
     * of the feed. Each feed attribute will also include the feed attribute ID, which will be used
     * in a subsequent step.
     *
     * The example then inserts a new key-value pair into a map for each
     * feed attribute, which is the return value of the method:
     * - The keys are the placeholder types that the columns will be.
     * - The values are the feed attributes.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $feedResourceName the feed resource name to get the attributes from
     * @return array the map from placeholder fields to feed attributes
     */
    private static function getFeed(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $feedResourceName
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

        // Gets the attributes list from the feed and creates a map with keys of each attribute and
        // values of each corresponding ID.
        $feedAttributes =
            iterator_to_array($googleAdsRow->getFeed()->getAttributes()->getIterator());

        $feedPlaceHolderFieldsList = array_map(function (FeedAttribute $feedAttribute) {
            switch ($feedAttribute->getNameUnwrapped()) {
                case 'Flight Description':
                    return FlightPlaceholderField::FLIGHT_DESCRIPTION;
                    break;
                case 'Destination ID':
                    return FlightPlaceholderField::DESTINATION_ID;
                    break;
                case 'Flight Price':
                    return FlightPlaceholderField::FLIGHT_PRICE;
                    break;
                case 'Flight Sale Price':
                    return FlightPlaceholderField::FLIGHT_SALE_PRICE;
                    break;
                case 'Final URLs':
                    return FlightPlaceholderField::FINAL_URLS;
                    break;
                // See FlightPlaceholderField.php for all available values.
                default:
                    throw new \RuntimeException('Invalid feed attribute name.');
            }
        }, $feedAttributes);

        return array_combine($feedPlaceHolderFieldsList, $feedAttributes);
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
            'feed_attribute_id' => new Int64Value([
                'value' =>
                    $placeHoldersToFeedAttributesMap[FlightPlaceholderField::FLIGHT_DESCRIPTION]
                        ->getId()->getValue()
            ]),
            'flight_field' => FlightPlaceholderField::FLIGHT_DESCRIPTION
        ]);
        $destinationIdMapping = new AttributeFieldMapping([
            'feed_attribute_id' => new Int64Value([
                'value' =>
                    $placeHoldersToFeedAttributesMap[FlightPlaceholderField::DESTINATION_ID]
                        ->getId()->getValue()
            ]),
            'flight_field' => FlightPlaceholderField::DESTINATION_ID
        ]);
        $flightPriceMapping = new AttributeFieldMapping([
            'feed_attribute_id' => new Int64Value([
                'value' =>
                    $placeHoldersToFeedAttributesMap[FlightPlaceholderField::FLIGHT_PRICE]
                        ->getId()->getValue()
            ]),
            'flight_field' => FlightPlaceholderField::FLIGHT_PRICE
        ]);
        $flightSalePriceMapping = new AttributeFieldMapping([
            'feed_attribute_id' => new Int64Value([
                'value' =>
                    $placeHoldersToFeedAttributesMap[FlightPlaceholderField::FLIGHT_SALE_PRICE]
                        ->getId()->getValue()
            ]),
            'flight_field' => FlightPlaceholderField::FLIGHT_SALE_PRICE
        ]);
        $finalUrlsMapping = new AttributeFieldMapping([
            'feed_attribute_id' => new Int64Value([
                'value' =>
                    $placeHoldersToFeedAttributesMap[FlightPlaceholderField::FINAL_URLS]
                        ->getId()->getValue()
            ]),
            'flight_field' => FlightPlaceholderField::FINAL_URLS
        ]);

        // Creates the feed mapping.
        $feedMapping = new FeedMapping([
            'placeholder_type' => PlaceholderType::DYNAMIC_FLIGHT,
            'feed' => new StringValue(['value' => $feedResourceName]),
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
        $response = $feedMappingServiceClient->mutateFeedMappings($customerId, [$operation]);
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
            'feed_attribute_id' => new Int64Value([
                'value' =>
                    $placeHoldersToFeedAttributesMap[FlightPlaceholderField::FLIGHT_DESCRIPTION]
                        ->getId()->getValue()
            ]),
            'string_value' => new StringValue(['value' => 'Earth to Mars'])
        ]);
        // Creates the destination ID feed attribute value.
        $destinationIdAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => new Int64Value([
                'value' =>
                    $placeHoldersToFeedAttributesMap[FlightPlaceholderField::DESTINATION_ID]
                        ->getId()->getValue()
            ]),
            'string_value' => new StringValue(['value' => 'Mars'])
        ]);
        // Creates the flight price feed attribute value.
        $flightPriceAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => new Int64Value([
                'value' =>
                    $placeHoldersToFeedAttributesMap[FlightPlaceholderField::FLIGHT_PRICE]
                        ->getId()->getValue()
            ]),
            'string_value' => new StringValue(['value' => '499.99 USD'])
        ]);
        // Creates the flight sale price feed attribute value.
        $flightSalePriceAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => new Int64Value([
                'value' =>
                    $placeHoldersToFeedAttributesMap[FlightPlaceholderField::FLIGHT_SALE_PRICE]
                        ->getId()->getValue()
            ]),
            'string_value' => new StringValue(['value' => '299.99 USD'])
        ]);
        // Creates the final URLs feed attribute value.
        $finalUrlsAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => new Int64Value([
                'value' =>
                    $placeHoldersToFeedAttributesMap[FlightPlaceholderField::FINAL_URLS]
                        ->getId()->getValue()
            ]),
            'string_values' => [new StringValue(['value' => 'http://www.example.com/flights/'])]
        ]);

        // Creates the feed item, specifying the feed ID and the attributes created above.
        $feedItem = new FeedItem([
            'feed' => new StringValue(['value' => $feedResourceName]),
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
        $response = $feedItemServiceClient->mutateFeedItems($customerId, [$operation]);
        printf(
            "Feed item with resource name '%s' was created.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
}

AddFlightsFeed::main();
