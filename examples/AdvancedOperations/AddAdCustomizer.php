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

namespace Google\Ads\GoogleAds\Examples\AdvancedOperations;

require __DIR__ . '/../../vendor/autoload.php';

use DateTime;
use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V8\ResourceNames;
use Google\Ads\GoogleAds\V8\Common\ExpandedTextAdInfo;
use Google\Ads\GoogleAds\V8\Enums\AdCustomizerPlaceholderFieldEnum\AdCustomizerPlaceholderField;
use Google\Ads\GoogleAds\V8\Enums\FeedAttributeTypeEnum\FeedAttributeType;
use Google\Ads\GoogleAds\V8\Enums\FeedOriginEnum\FeedOrigin;
use Google\Ads\GoogleAds\V8\Enums\PlaceholderTypeEnum\PlaceholderType;
use Google\Ads\GoogleAds\V8\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V8\Resources\Ad;
use Google\Ads\GoogleAds\V8\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V8\Resources\AttributeFieldMapping;
use Google\Ads\GoogleAds\V8\Resources\Feed;
use Google\Ads\GoogleAds\V8\Resources\FeedAttribute;
use Google\Ads\GoogleAds\V8\Resources\FeedItem;
use Google\Ads\GoogleAds\V8\Resources\FeedItemAttributeValue;
use Google\Ads\GoogleAds\V8\Resources\FeedItemTarget;
use Google\Ads\GoogleAds\V8\Resources\FeedMapping;
use Google\Ads\GoogleAds\V8\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V8\Services\FeedItemOperation;
use Google\Ads\GoogleAds\V8\Services\FeedItemTargetOperation;
use Google\Ads\GoogleAds\V8\Services\FeedMappingOperation;
use Google\Ads\GoogleAds\V8\Services\FeedOperation;
use Google\ApiCore\ApiException;

/**
 * Adds an ad customizer feed and associates it with the customer. Then it adds an ad that uses the
 * feed to populate dynamic data.
 */
class AddAdCustomizer
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const AD_GROUP_ID_1 = 'INSERT_AD_GROUP_ID_1_HERE';
    private const AD_GROUP_ID_2 = 'INSERT_AD_GROUP_ID_2_HERE';

    // We're creating two different ad groups to be dynamically populated by the same feed.
    private const NUMBER_OF_AD_GROUPS = 2;

    // We're doing only searches by resource_name in this example, we can set page size = 1.
    private const PAGE_SIZE = 1;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_IDS => GetOpt::MULTIPLE_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_IDS] ?: [self::AD_GROUP_ID_1, self::AD_GROUP_ID_2]
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
     * @param array $adGroupIds the ad group IDs
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $adGroupIds
    ) {
        if (count($adGroupIds) != self::NUMBER_OF_AD_GROUPS) {
            throw new \InvalidArgumentException(
                'Please pass exactly ' . self::NUMBER_OF_AD_GROUPS .
                ' ad group IDs in the adGroupIds parameter.'
            );
        }

        $feedName = 'Ad Customizer example feed ' . Helper::getShortPrintableDatetime();

        // Create a feed to be used for ad customization.
        $adCustomizerFeedResourceName = self::createAdCustomizerFeed(
            $googleAdsClient,
            $customerId,
            $feedName
        );

        // Retrieve the attributes of the feed.
        $adCustomizerFeedAttributes = self::getFeedAttributes(
            $googleAdsClient,
            $customerId,
            $adCustomizerFeedResourceName
        );

        // Map the feed to the ad customizer placeholder fields.
        self::createAdCustomizerMapping(
            $googleAdsClient,
            $customerId,
            $adCustomizerFeedResourceName,
            $adCustomizerFeedAttributes
        );

        // Create feed items to be used to customize ads.
        $feedItemResourceNames = self::createFeedItems(
            $googleAdsClient,
            $customerId,
            $adCustomizerFeedResourceName,
            $adCustomizerFeedAttributes
        );

        // Set the feed to be used only with the specified ad groups.
        self::createFeedItemTargets(
            $googleAdsClient,
            $customerId,
            $adGroupIds,
            $feedItemResourceNames
        );

        // Create ads that use the feed for customization.
        self::createAdsWithCustomizations(
            $googleAdsClient,
            $customerId,
            $adGroupIds,
            $feedName
        );
    }

   /**
    * Creates a feed to be used for ad customization.
    *
    * @param GoogleAdsClient $googleAdsClient the Google Ads API client
    * @param int $customerId the customer ID in which to create the feed
    * @param string $feedName the name of the feed to create
    * @return string the resource name of the newly created feed
    */
    // [START add_ad_customizer]
    private static function createAdCustomizerFeed(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $feedName
    ) {
        // Creates three feed attributes: a name, a price and a date. The attribute names are
        // arbitrary choices and will be used as placeholders in the ad text fields.
        $nameAttribute = new FeedAttribute(['type' => FeedAttributeType::STRING, 'name' => 'Name']);
        $priceAttribute =
            new FeedAttribute(['type' => FeedAttributeType::STRING, 'name' => 'Price']);
        $dateAttribute =
            new FeedAttribute(['type' => FeedAttributeType::DATE_TIME, 'name' => 'Date']);

        // Creates the feed.
        $feed = new Feed([
            'name' => $feedName,
            'attributes' => [$nameAttribute, $priceAttribute, $dateAttribute],
            'origin' => FeedOrigin::USER
        ]);

        // Creates a feed operation for creating a feed.
        $feedOperation = new FeedOperation();
        $feedOperation->setCreate($feed);

        // Issues a mutate request to add the feed.
        $feedServiceClient = $googleAdsClient->getFeedServiceClient();
        $feedResponse = $feedServiceClient->mutateFeeds($customerId, [$feedOperation]);

        $feedResourceName = $feedResponse->getResults()[0]->getResourceName();
        printf("Added feed with resource name '%s'.%s", $feedResourceName, PHP_EOL);

        return $feedResourceName;
    }
    // [END add_ad_customizer]

    /**
     * Retrieves attributes for a feed.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $feedResourceName the resource name of the feed
     * @return array the feed attributes, keyed by attribute name
     */
    // [START add_ad_customizer_1]
    private static function getFeedAttributes(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $feedResourceName
    ) {
        $query = "SELECT feed.attributes, feed.name FROM feed "
            . "WHERE feed.resource_name = '$feedResourceName'";

        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        /** @var Feed $feed */
        $feed = $response->getIterator()->current()->getFeed();
        $feedDetails = [];
        printf(
            "Found the following attributes for feed with name %s:%s",
            $feed->getName(),
            PHP_EOL
        );
        foreach ($feed->getAttributes() as $feedAttribute) {
            /** @var FeedAttribute $feedAttribute */
            $feedDetails[$feedAttribute->getName()] = $feedAttribute->getId();
            printf(
                "\t'%s' with id %d and type '%s'%s",
                $feedAttribute->getName(),
                $feedAttribute->getId(),
                FeedAttributeType::name($feedAttribute->getType()),
                PHP_EOL
            );
        }
        return $feedDetails;
    }
    // [END add_ad_customizer_1]

    /**
     * Creates a feed mapping for a given feed.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adCustomizerFeedResourceName the resource name of the ad customizer feed
     * @param array $feedDetails an associative array from feed attribute names to their IDs
     */
    // [START add_ad_customizer_2]
    private static function createAdCustomizerMapping(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adCustomizerFeedResourceName,
        array $feedDetails
    ) {
        // Maps the feed attribute IDs to the field ID constants.
        $nameFieldMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $feedDetails['Name'],
            'ad_customizer_field' => AdCustomizerPlaceholderField::STRING
        ]);

        $priceFieldMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $feedDetails['Price'],
            'ad_customizer_field' => AdCustomizerPlaceholderField::PRICE
        ]);

        $dateFieldMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $feedDetails['Date'],
            'ad_customizer_field' => AdCustomizerPlaceholderField::DATE
        ]);

        // Creates the feed mapping.
        $feedMapping = new FeedMapping([
            'placeholder_type' => PlaceholderType::AD_CUSTOMIZER,
            'feed' => $adCustomizerFeedResourceName,
            'attribute_field_mappings' => [$nameFieldMapping, $priceFieldMapping, $dateFieldMapping]
        ]);

        // Creates the operation.
        $feedMappingOperation = new FeedMappingOperation();
        $feedMappingOperation->setCreate($feedMapping);

        // Issues a mutate request to add the feed mapping.
        $feedMappingServiceClient = $googleAdsClient->getFeedMappingServiceClient();
        $response = $feedMappingServiceClient->mutateFeedMappings(
            $customerId,
            [$feedMappingOperation]
        );

        // Displays the results.
        foreach ($response->getResults() as $result) {
            printf(
                "Created feed mapping with resource name '%s'.%s",
                $result->getResourceName(),
                PHP_EOL
            );
        }
    }
    // [END add_ad_customizer_2]

    /**
     * Creates two different feed items to enable two different ad customizations.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $adCustomizerFeedResourceName the resource name of the feed
     * @param array $adCustomizerFeedAttributes the attributes of the feed
     * @return string[] the created feed item resource names
     */
    // [START add_ad_customizer_3]
    private static function createFeedItems(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adCustomizerFeedResourceName,
        array $adCustomizerFeedAttributes
    ) {
        $feedItemOperations = [];

        $feedItemOperations[] = self::createFeedItemOperation(
            'Mars',
            '$1234.56',
            date_format(new DateTime('first day of this month'), 'Ymd His'),
            $adCustomizerFeedResourceName,
            $adCustomizerFeedAttributes
        );

        $feedItemOperations[] = self::createFeedItemOperation(
            'Venus',
            '$6543.21',
            // Set the date to the 15th of the current month.
            date_format(DateTime::createFromFormat('d', '15'), 'Ymd His'),
            $adCustomizerFeedResourceName,
            $adCustomizerFeedAttributes
        );

        // Adds the feed items.
        $feedItemServiceClient = $googleAdsClient->getFeedItemServiceClient();
        $response = $feedItemServiceClient->mutateFeedItems($customerId, $feedItemOperations);

        $feedItemResourceNames = [];
        // Displays the results.
        foreach ($response->getResults() as $result) {
            printf(
                "Created feed item with resource name '%s'.%s",
                $result->getResourceName(),
                PHP_EOL
            );
            $feedItemResourceNames[] = $result->getResourceName();
        }

        return $feedItemResourceNames;
    }
    // [END add_ad_customizer_3]

    /**
     * Creates a FeedItemOperation.
     *
     * @param string $name the value of the Name attribute
     * @param string $price the value of the Price attribute
     * @param string $date the value of the Date attribute
     * @param string $adCustomizerFeedResourceName the resource name of the feed
     * @param array $adCustomizerFeedAttributes the attributes to be set on the feed
     * @return FeedItemOperation the feed item operation to create a feed item
     */
    // [START add_ad_customizer_4]
    private static function createFeedItemOperation(
        string $name,
        string $price,
        string $date,
        string $adCustomizerFeedResourceName,
        array $adCustomizerFeedAttributes
    ) {
        $nameAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $adCustomizerFeedAttributes['Name'],
            'string_value' => $name
        ]);

        $priceAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $adCustomizerFeedAttributes['Price'],
            'string_value' => $price
        ]);

        $dateAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $adCustomizerFeedAttributes['Date'],
            'string_value' => $date
        ]);

        $feedItem = new FeedItem([
            'feed' => $adCustomizerFeedResourceName,
            'attribute_values' => [$nameAttributeValue, $priceAttributeValue, $dateAttributeValue]
        ]);

        $feedItemOperation = new FeedItemOperation();
        $feedItemOperation->setCreate($feedItem);

        return $feedItemOperation;
    }
    // [END add_ad_customizer_4]

  /**
   * Restricts the feed items to work only with a specific ad group; this prevents the feed items
   * from being used elsewhere and makes sure they are used only for customizing a specific ad
   * group.
   *
   * @param GoogleAdsClient $googleAdsClient the Google Ads API client
   * @param int $customerId the customer ID
   * @param array $adGroupIds the ad group IDs to bind the feed items to
   * @param array $feedItemResourceNames the resource names of the feed items
   */
    // [START add_ad_customizer_5]
    private static function createFeedItemTargets(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $adGroupIds,
        array $feedItemResourceNames
    ) {
        // Bind each feed item to a specific ad group to make sure it will only be used to customize
        // ads inside that ad group; using the feed item elsewhere will result in an error.
        for ($i = 0; $i < count($feedItemResourceNames); $i++) {
            $feedItemResourceName = $feedItemResourceNames[$i];
            $adGroupId = $adGroupIds[$i];

            $feedItemTarget = new FeedItemTarget([
                'feed_item' => $feedItemResourceName,
                'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId)
            ]);

            // Creates the operation.
            $feedItemTargetOperation = new FeedItemTargetOperation();
            $feedItemTargetOperation->setCreate($feedItemTarget);

            // Issues a mutate request to add the feed item target.
            $feedItemTargetServiceClient = $googleAdsClient->getFeedItemTargetServiceClient();
            $feedItemTargetResponse = $feedItemTargetServiceClient->mutateFeedItemTargets(
                $customerId,
                [$feedItemTargetOperation]
            );

            $feedItemTargetResourceName =
                $feedItemTargetResponse->getResults()[0]->getResourceName();
            printf(
                "Added feed item target with resource name '%s'.%s",
                $feedItemTargetResourceName,
                PHP_EOL
            );
        }
    }
    // [END add_ad_customizer_5]

    /**
     * Creates expanded text ads that use the ad customizer feed to populate the placeholders.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param array $adGroupIds the ad group IDs in which to create the ads
     * @param string $feedName the name of the feed
     */
    // [START add_ad_customizer_6]
    private static function createAdsWithCustomizations(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $adGroupIds,
        string $feedName
    ) {
        $expandedTextAdInfo = new ExpandedTextAdInfo([
            'headline_part1' => "Luxury cruise to {=$feedName.Name}",
            'headline_part2' => "Only {=$feedName.Price}",
            'description' => "Offer ends in {=countdown($feedName.Date)}!"
        ]);

        $ad = new Ad([
            'expanded_text_ad' => $expandedTextAdInfo,
            'final_urls' => ['http://www.example.com']
        ]);

        $adGroupAdOperations = [];

        foreach ($adGroupIds as $adGroupId) {
            $adGroupAd = new AdGroupAd([
                'ad' => $ad,
                'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId)
            ]);

            $adGroupAdOperation = new AdGroupAdOperation();
            $adGroupAdOperation->setCreate($adGroupAd);

            $adGroupAdOperations[] = $adGroupAdOperation;
        }

        // Issues a mutate request to add the ads.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        $adGroupAdResponse = $adGroupAdServiceClient->mutateAdGroupAds(
            $customerId,
            $adGroupAdOperations
        );

        printf('Added %d ads:%s', count($adGroupAdResponse->getResults()), PHP_EOL);
        foreach ($adGroupAdResponse->getResults() as $result) {
            printf("Added an ad with resource name '%s'.%s", $result->getResourceName(), PHP_EOL);
        }
    }
    // [END add_ad_customizer_6]
}

AddAdCustomizer::main();
