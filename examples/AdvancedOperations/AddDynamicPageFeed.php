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

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V3\Common\WebpageConditionInfo;
use Google\Ads\GoogleAds\V3\Common\WebpageInfo;
use Google\Ads\GoogleAds\V3\Enums\DsaPageFeedCriterionFieldEnum\DsaPageFeedCriterionField;
use Google\Ads\GoogleAds\V3\Enums\FeedAttributeTypeEnum\FeedAttributeType;
use Google\Ads\GoogleAds\V3\Enums\FeedOriginEnum\FeedOrigin;
use Google\Ads\GoogleAds\V3\Enums\FeedMappingCriterionTypeEnum\FeedMappingCriterionType;
use Google\Ads\GoogleAds\V3\Enums\WebpageConditionOperandEnum\WebpageConditionOperand;
use Google\Ads\GoogleAds\V3\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V3\Resources\AttributeFieldMapping;
use Google\Ads\GoogleAds\V3\Resources\Campaign;
use Google\Ads\GoogleAds\V3\Resources\Campaign\DynamicSearchAdsSetting;
use Google\Ads\GoogleAds\V3\Resources\Feed;
use Google\Ads\GoogleAds\V3\Resources\FeedAttribute;
use Google\Ads\GoogleAds\V3\Resources\FeedItem;
use Google\Ads\GoogleAds\V3\Resources\FeedMapping;
use Google\Ads\GoogleAds\V3\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V3\Services\CampaignOperation;
use Google\Ads\GoogleAds\V3\Services\FeedOperation;
use Google\Ads\GoogleAds\V3\Services\FeedItemOperation;
use Google\Ads\GoogleAds\V3\Services\FeedMappingOperation;
use Google\Ads\GoogleAds\V3\Resources\FeedItemAttributeValue;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V3\ResourceNames;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/**
 * This code example adds a page feed to specify precisely which URLs to use with your Dynamic
 * Search Ads campaign.
 */
class AddDynamicPageFeed
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    private const PAGE_SIZE = 1000;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT
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
     * @param int $campaignId the campaign ID
     * @param int $adGroupId the ad group ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        int $adGroupId
    ) {
        $dsaPageUrlLabel = 'discounts';

        // Creates the page feed details. This code example creates a new feed, but you can
        // fetch and re-use an existing feed.
        $feedDetails = self::createFeed($googleAdsClient, $customerId);
        self::createFeedMapping($googleAdsClient, $customerId, $feedDetails);
        self::createFeedItems($googleAdsClient, $customerId, $feedDetails, $dsaPageUrlLabel);

        // Associates the page feed with the campaign.
        self::updateCampaignDsaSetting($googleAdsClient, $customerId, $feedDetails, $campaignId);

        // Optional: Targets web pages matching the feed's label in the ad group.
        self::addDsaTarget($googleAdsClient, $customerId, $adGroupId, $dsaPageUrlLabel);

        printf("Dynamic page feed setup is complete for campaign ID %d.%s", $campaignId, PHP_EOL);
    }

   /**
    * Creates a feed.
    *
    * @param GoogleAdsClient googleAdsClient the Google Ads API client
    * @param int $customerId the customer ID in which to create the feed
    * @return array the names and IDs of feed attributes
    */
    private static function createFeed(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // Creates a URL attribute.
        $urlAttribute = new FeedAttribute([
            'type' => FeedAttributeType::URL_LIST,
            'name' => new StringValue(['value' => 'Page URL'])
        ]);

        // Creates a label attribute.
        $labelAttribute = new FeedAttribute([
            'type' => FeedAttributeType::STRING_LIST,
            'name' => new StringValue(['value' => 'Label'])
        ]);

        // Creates the feed.
        $feed = new Feed([
            'name' => new StringValue(['value' => 'DSA Feed #' . uniqid()]),
            'attributes' => [$urlAttribute, $labelAttribute],
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

        return self::getFeed($googleAdsClient, $customerId, $feedResourceName);
    }

    /**
     * Retrieves details about a feed.
     *
     * @param GoogleAdsClient googleAdsClient the Google Ads API client
     * @param int customerId the customer ID
     * @param string feedResourceName the resource name of the feed
     * @return array the feed details containing the feed's resource name and the feed attributes'
     * names and values
     */
    private static function getFeed(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $feedResourceName
    ) {
        $query = "SELECT feed.attributes FROM feed WHERE feed.resource_name = '$feedResourceName'";

        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        $feedAttributes = $response->getIterator()->current()->getFeed()->getAttributes();
        $feedDetails = ['resource_name' => $feedResourceName];
        foreach ($feedAttributes as $feedAttribute) {
            /** @var FeedAttribute $feedAttribute */
            $feedDetails[$feedAttribute->getNameUnwrapped()] = $feedAttribute->getIdUnwrapped();
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
    private static function createFeedMapping(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $feedDetails
    ) {
        // Maps the feed attribute IDs to the field ID constants.
        $urlFieldMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $feedDetails['Page URL'],
            'dsa_page_feed_field' => DsaPageFeedCriterionField::PAGE_URL
        ]);

        $labelFieldMapping = new AttributeFieldMapping([
            'feed_attribute_id' => $feedDetails['Label'],
            'dsa_page_feed_field' => DsaPageFeedCriterionField::LABEL
        ]);

        // Creates the feed mapping.
        $feedMapping = new FeedMapping([
            'criterion_type' => FeedMappingCriterionType::DSA_PAGE_FEED,
            'feed' => $feedDetails['resource_name'],
            'attribute_field_mappings' => [$urlFieldMapping, $labelFieldMapping]
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
     * Creates feed items for a given feed.
     *
     * @param GoogleAdsClient googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param array $feedDetails the names and IDs of feed attributes
     * @param string $dsaPageUrlLabel the label for the DSA page URLs
     */
    private function createFeedItems(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $feedDetails,
        string $dsaPageUrlLabel
    ) {
        $urls = [
            'http://www.example.com/discounts/rental-cars',
            'http://www.example.com/discounts/hotel-deals',
            'http://www.example.com/discounts/flight-deals'
        ];

        // Creates a label attribute.
        $labelAttributeValue = new FeedItemAttributeValue([
            'feed_attribute_id' => $feedDetails['Label'],
            'string_values' => [new StringValue(['value' => $dsaPageUrlLabel])]
        ]);

        // Creates one operation per URL.
        $feedItemOperations = [];
        foreach ($urls as $url) {
            // Creates a url attribute.
            $urlAttributeValue = new FeedItemAttributeValue([
                'feed_attribute_id' => $feedDetails['Page URL'],
                'string_values' => [new StringValue(['value' => $url])]
            ]);
     
            // Creates a feed item.
            $feedItem = new FeedItem([
                'feed' => $feedDetails['resource_name'],
                'attribute_values' => [$urlAttributeValue, $labelAttributeValue]
            ]);

            // Creates an operation and adds it to the list of operations.
            $feedItemOperation = new FeedItemOperation();
            $feedItemOperation->setCreate($feedItem);
            $feedItemOperations[] = $feedItemOperation;
        }

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

    /**
     * Updates a campaign to set the DSA feed.
     *
     * @param GoogleAdsClient googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param array $feedDetails the names and IDs of feed attributes
     * @param int $campaignId the campaign ID of the campaign to update
     */
    private static function updateCampaignDsaSetting(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $feedDetails,
        int $campaignId
    ) {
        // Retrieves the existing dynamic search ads settings for the campaign.
        $dsaSetting = self::getDsaSetting(
            $googleAdsClient,
            $customerId,
            $campaignId
        );

        $feedResourceName = $feedDetails['resource_name'];
        $dsaSetting->setFeeds([new StringValue(['value' => $feedResourceName])]);

        // Creates the campaign object to be updated.
        $campaign = new Campaign();
        $campaign->setResourceName(ResourceNames::forCampaign($customerId, $campaignId));
        $campaign->setDynamicSearchAdsSetting($dsaSetting);

        // Creates the update operation and sets the update mask.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setUpdate($campaign);
        $campaignOperation->setUpdateMask(FieldMasks::allSetFieldsOf($campaign));

        // Updates the campaign.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        $response = $campaignServiceClient->mutateCampaigns(
            $customerId,
            [$campaignOperation]
        );

        // Displays the results.
        $campaignResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Updated campaign with resourceName: '%s'.%s",
            $campaignResourceName,
            PHP_EOL
        );
    }

    /**
     * Returns the DSA settings for a campaign. Throws an error if the campaign does not exist or
     * is not a DSA campaign.
     *
     * @param GoogleAdsClient googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID of the campaign to update
     * @return DynamicSearchAdsSetting the DSA settings for the campaign
     */
    private static function getDsaSetting(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        // Creates the query.
        // You must request all DSA fields in order to update the DSA settings in the following
        // step.
        $query = "SELECT campaign.id, campaign.name, " .
        "campaign.dynamic_search_ads_setting.domain_name, " .
        "campaign.dynamic_search_ads_setting.language_code, " .
        "campaign.dynamic_search_ads_setting.use_supplied_urls_only " .
        "FROM campaign where campaign.id = $campaignId";

        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response = $googleAdsServiceClient->search(
            $customerId,
            $query,
            ['pageSize' => self::PAGE_SIZE, 'returnTotalResultsCount' => true]
        );

        // Throws an exception if a campaign with the provided ID does not exist.
        if ($response->getPage()->getResponseObject()->getTotalResultsCount() === 0) {
            throw new \InvalidArgumentException("No campaign found with ID $campaignId");
        }

        $dynamicSearchAdsSetting = $response
            ->getPage()
            ->getResponseObject()
            ->getResults()[0]
            ->getCampaign()
            ->getDynamicSearchAdsSetting();

        // Throws an exception if the campaign is not a DSA campaign.
        if (is_null($dynamicSearchAdsSetting)) {
            throw new \InvalidArgumentException(
                "Campaign with ID $campaignId is not a DSA campaign."
            );
        }

        return $dynamicSearchAdsSetting;
    }

    /**
     * Creates an ad group criterion targeting the DSA label.
     *
     * @param GoogleAdsClient googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param string $dsaPageUrlLabel the label for the DSA page URLs
     */
    public static function addDsaTarget(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        string $dsaPageUrlLabel
    ) {
        $adGroupResourceName = ResourceNames::forAdGroup($customerId, $adGroupId);

        // Creates the webpage condition info.
        $webPageConditionInfo = new WebpageConditionInfo([
            'operand' => WebpageConditionOperand::CUSTOM_LABEL,
            'argument' => $dsaPageUrlLabel
        ]);

        // Creates the webpage info.
        $webPageInfo = new WebpageInfo([
            'criterion_name' => new StringValue(['value' => 'Test Criterion']),
            'conditions' => [$webPageConditionInfo]
        ]);

        // Creates the ad group criterion.
        $adGroupCriterion = new AdGroupCriterion([
            'ad_group' => $adGroupResourceName,
            'webpage' => $webPageInfo,
            'cpc_bid_micros' => new Int64Value(['value' => 1500000])
        ]);

        // Creates the operation.
        $adGroupCriterionOperation = new AdGroupCriterionOperation();
        $adGroupCriterionOperation->setCreate($adGroupCriterion);
        
        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
        $response = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            $customerId,
            [$adGroupCriterionOperation]
        );

        $adGroupCriterionResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Created ad group criterion with resource name '%s'.%s",
            $adGroupCriterionResourceName,
            PHP_EOL
        );
    }
}

AddDynamicPageFeed::main();
