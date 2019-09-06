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

use DateInterval;
use DateTime;
use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V2\Common\WebpageConditionInfo;
use Google\Ads\GoogleAds\V2\Common\WebpageInfo;
use Google\Ads\GoogleAds\V2\Enums\DsaPageFeedCriterionFieldEnum\DsaPageFeedCriterionField;
use Google\Ads\GoogleAds\V2\Enums\FeedAttributeTypeEnum\FeedAttributeType;
use Google\Ads\GoogleAds\V2\Enums\FeedOriginEnum\FeedOrigin;
use Google\Ads\GoogleAds\V2\Enums\FeedMappingCriterionTypeEnum\FeedMappingCriterionType;
use Google\Ads\GoogleAds\V2\Enums\WebpageConditionOperandEnum\WebpageConditionOperand;
use Google\Ads\GoogleAds\V2\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V2\Resources\AttributeFieldMapping;
use Google\Ads\GoogleAds\V2\Resources\Campaign;
use Google\Ads\GoogleAds\V2\Resources\Campaign\DynamicSearchAdsSetting;
use Google\Ads\GoogleAds\V2\Resources\Feed;
use Google\Ads\GoogleAds\V2\Resources\FeedAttribute;
use Google\Ads\GoogleAds\V2\Resources\FeedItem;
use Google\Ads\GoogleAds\V2\Resources\FeedMapping;
use Google\Ads\GoogleAds\V2\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V2\Services\CampaignOperation;
use Google\Ads\GoogleAds\V2\Services\FeedOperation;
use Google\Ads\GoogleAds\V2\Services\FeedItemOperation;
use Google\Ads\GoogleAds\V2\Services\FeedMappingOperation;
use Google\Ads\GoogleAds\V2\Resources\FeedItemAttributeValue;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V2\ResourceNames;
use Google\Ads\GoogleAds\V2\Enums\AdCustomizerPlaceholderFieldEnum\AdCustomizerPlaceholderField;
use Google\Ads\GoogleAds\V2\Enums\PlaceholderTypeEnum\PlaceholderType;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;
use Google\ApiCore\ApiException;
use Psr\Log\LogLevel;

/**
 * This code example adds a page feed to specify precisely which URLs to use with your Dynamic
 * Search Ads campaign.
 */
class AddAdCustomizer
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const AD_GROUP_ID_1 = 'INSERT_AD_GROUP_ID_1_HERE';
    const AD_GROUP_ID_2 = 'INSERT_AD_GROUP_ID_2_HERE';

    // We're doing only searches by resource_name in this example, we can set page size = 1.
    const PAGE_SIZE = 1;

    // We're creating two different ad groups to be dynamically populated by the same feed.
    const NUMBER_OF_AD_GROUPS = 2;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::MULTIPLE_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_ID] ?: [self::AD_GROUP_ID_1, self::AD_GROUP_ID_2]
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
     * @param int $adGroupId the ad group ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $adGroupIds
    ) {
        if (count($adGroupIds) != self::NUMBER_OF_AD_GROUPS) {
            throw new \InvalidArgumentException(
                "Please pass exactly two ad group IDs in the adGroupId parameter."
            );
        }

        $feedName = "Ad Customizer example feed " . uniqid();

        $adCustomizerFeedResourceName = self::createAdCustomizerFeed(
            $googleAdsClient,
            $customerId,
            $feedName
        );

        $adCustomizerFeedAttributes = self::getFeedAttributes(
            $googleAdsClient,
            $customerId,
            $adCustomizerFeedResourceName
        );

        self::createAdCustomizerMapping(
            $googleAdsClient,
            $customerId,
            $adCustomizerFeedResourceName,
            $adCustomizerFeedAttributes
        );

        $feedItemResourceNames = self::createFeedItems(
            $googleAdsClient,
            $customerId,
            $adCustomizerFeedResourceName,
            $adCustomizerFeedAttributes
        );

        /*self::createFeedItemTargets(
            $googleAdsClient,
            $customerId,
            $adGroupIds,
            $feedItemResourceNames
        );

        self::createAdsWithCustomizations(
            $googleAdsClient,
            $customerId,
            $adGroupIds,
            $feedName
        );*/
    }

   /**
    * Creates a feed to be used for ad customization.
    *
    * @param GoogleAdsClient googleAdsClient the Google Ads API client
    * @param int $customerId the customer ID in which to create the feed
    * @return string the resource name of the newly created feed
    */
    private static function createAdCustomizerFeed(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // Creates three feed attributes: a name, a price and a date. The attribute names are arbitrary
        // choices and will be used as placeholders in the ad text fields.
        $nameAttribute = new FeedAttribute([
            'type' => FeedAttributeType::STRING,
            'name' => new StringValue(['value' => 'Name'])
        ]);
        
        $priceAttribute = new FeedAttribute([
            'type' => FeedAttributeType::STRING,
            'name' => new StringValue(['value' => 'Price'])
        ]);

        $dateAttribute = new FeedAttribute([
            'type' => FeedAttributeType::DATE_TIME,
            'name' => new StringValue(['value' => 'Date'])
        ]);

        // Creates the feed.
        $feed = new Feed([
            'name' => new StringValue(['value' => 'DSA Feed #' . uniqid()]),
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
        printf("Added feed named '%s'.%s", $feedResourceName, PHP_EOL);

        return $feedResourceName;
    }

    /**
     * Retrieves attributes for a feed.
     *
     * @param GoogleAdsClient googleAdsClient the Google Ads API client
     * @param int customerId the customer ID
     * @param string feedResourceName the resource name of the feed
     * @return array the feed attributes, keyed by attribute name
     */
    private static function getFeedAttributes(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $feedResourceName
    ) {
        $query = "SELECT feed.attributes, feed.name FROM feed WHERE feed.resource_name = " .
                "'$feedResourceName'";

        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        $feed = $response->getIterator()->current()->getFeed();
        $feedAttributes = $feed->getAttributes();
        $feedDetails = [];
        printf(
            "Found the following attributes for feed with name %s:%s",
            $feed->getNameUnwrapped(),
            PHP_EOL
        );
        foreach ($feedAttributes as $feedAttribute) {
            /** @var FeedAttribute $feedAttribute */
            $feedDetails[$feedAttribute->getNameUnwrapped()] = $feedAttribute->getIdUnwrapped();
            printf(
                "\t'%s' with id %d and type '%s'%s",
                $feedAttribute->getNameUnwrapped(),
                $feedAttribute->getIdUnwrapped(),
                FeedAttributeType::name($feedAttribute->getType()),
                PHP_EOL
            );
        }
        return $feedDetails;
    }

    /**
     * Creates a feed mapping for a given feed.
     *
     * @param GoogleAdsClient googleAdsClient the Google Ads API client
     * @param int customerId the customer ID
     * @param array feedDetails the names and IDs of feed attributes
     */
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

    /**
     * Creates two different feed items to enable two different ad customizations.
     *
     * @param GoogleAdsClient googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param array $feedDetails the names and IDs of feed attributes
     * @param string $dsaPageUrlLabel the label for the DSA page URLs
     */
    private function createFeedItems(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adCustomizerFeedResourceName,
        array $adCustomizerFeedAttributes
    ) {
        $feedItemOperations = [];
        
        $marsDate = new DateTime('first day of this month');
        $feedItemOperations []= self::createFeedItemOperation(
            "Mars",
            "$1234.56",
            date_format($marsDate, "Ymd His"),
            $adCustomizerFeedResourceName,
            $adCustomizerFeedAttributes
        );

        $venusDate = DateTime::createFromFormat('d', '15');
        $feedItemOperations []= self::createFeedItemOperation(
            "Venus",
            "$6543.21",
            date_format($venusDate, "Ymd His"),
            $adCustomizerFeedResourceName,
            $adCustomizerFeedAttributes
        );

        // Adds the feed items.
        $feedItemServiceClient = $googleAdsClient->getFeedItemServiceClient();
        $response = $feedItemServiceClient->mutateFeedItems($customerId, $feedItemOperations);

        // Displays the results.
        foreach ($response->getResults() as $result) {
            printf(
                "Created feed item with resource name '%s'.%s",
                $result->getResourceName(),
                PHP_EOL
            );
        }
    }

    private function createFeedItemOperation(
        string $name,
        string $price,
        string $date,
        string $adCustomizerFeedResourceName,
        array $adCustomizerFeedAttributes
    ) {
        $nameAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $adCustomizerFeedAttributes['Name'],
            'string_value' => new StringValue(['value' => $name])
        ]);

        $priceAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $adCustomizerFeedAttributes['Price'],
            'string_value' => new StringValue(['value' => $price])
        ]);
                
        $dateAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $adCustomizerFeedAttributes['Date'],
            'string_value' => new StringValue(['value' => $date])
        ]);

        $feedItem = new FeedItem([
            'feed' => $adCustomizerFeedResourceName,
            'attribute_values' => [
                $nameAttributeValue,
                $priceAttributeValue,
                $dateAttributeValue
            ]
        ]);

        $feedItemOperation = new FeedItemOperation();
        $feedItemOperation->setCreate($feedItem);

        return $feedItemOperation;
    }    
}

AddAdCustomizer::main();
