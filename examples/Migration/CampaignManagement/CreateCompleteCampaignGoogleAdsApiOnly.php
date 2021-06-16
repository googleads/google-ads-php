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

namespace Google\Ads\GoogleAds\Examples\Migration\CampaignManagement;

require __DIR__ . '/../vendor/autoload.php';

use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\V8\Common\ManualCpc;
use Google\Ads\GoogleAds\V8\Common\ExpandedTextAdInfo;
use Google\Ads\GoogleAds\V8\Common\KeywordInfo;
use Google\Ads\GoogleAds\V8\Enums\AdGroupAdStatusEnum\AdGroupAdStatus;
use Google\Ads\GoogleAds\V8\Enums\AdGroupCriterionStatusEnum\AdGroupCriterionStatus;
use Google\Ads\GoogleAds\V8\Enums\AdGroupStatusEnum\AdGroupStatus;
use Google\Ads\GoogleAds\V8\Enums\AdGroupTypeEnum\AdGroupType;
use Google\Ads\GoogleAds\V8\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V8\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V8\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V8\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V8\Resources\Ad;
use Google\Ads\GoogleAds\V8\Resources\AdGroup;
use Google\Ads\GoogleAds\V8\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V8\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V8\Resources\Campaign;
use Google\Ads\GoogleAds\V8\Resources\Campaign\NetworkSettings;
use Google\Ads\GoogleAds\V8\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V8\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V8\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V8\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignOperation;
use Google\Ads\GoogleAds\V8\Services\MutateAdGroupAdsResponse;
use Google\Ads\GoogleAds\V8\Services\MutateAdGroupsResponse;
use Google\Ads\GoogleAds\V8\Services\MutateAdGroupCriteriaResponse;
use Google\Ads\GoogleAds\V8\Services\MutateCampaignBudgetsResponse;
use Google\Ads\GoogleAds\V8\Services\MutateCampaignsResponse;

/**
 * This code example is the last in a series of code examples that shows how to create
 * a Search campaign using the AdWords API, and then migrate it to the Google Ads API one
 * functionality at a time. See CreateCompleteCampaignAdwordsApiOnly.php through
 * CreateCompleteCampaignBothApisPhase4.php for code examples in various stages of migration.
 *
 * This code example represents the final state, where all the functionality - create a
 * campaign budget, a Search campaign, ad groups, keywords and expanded text ads have been
 * migrated to using the Google Ads API. The AdWords API is not used.
 */
class CreateCompleteCampaignGoogleAdsApiOnly
{

    // Number of ads being added/updated in this code example.
    private const NUMBER_OF_ADS = 5;
    // The list of keywords being added in this code example.
    private const KEYWORDS_TO_ADD = [
        "mars cruise",
        "space hotel"
    ];

    // The default page size for search queries.
    private const PAGE_SIZE = 1000;

    /**
     * Runs the CreateCompleteCampaignGoogleAdsApiOnly example.
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        $campaignBudget = self::createCampaignBudget($googleAdsClient, $customerId);
        $campaign = self::createCampaign($googleAdsClient, $customerId, $campaignBudget);
        $adGroup = self::createAdGroup($googleAdsClient, $customerId, $campaign);
        self::createTextAds($googleAdsClient, $customerId, $adGroup);
        self::createKeywords($googleAdsClient, $customerId, $adGroup, self::KEYWORDS_TO_ADD);
    }

    /**
     * Creates a campaign budget.
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @return CampaignBudget the newly created campaign budget
     */
    private static function createCampaignBudget(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // Creates a campaign budget.
        $campaignBudget = new CampaignBudget([
            'name' => 'Interplanetary Cruise Budget #' . Helper::getPrintableDatetime(),
            'delivery_method' => BudgetDeliveryMethod::STANDARD,
            'amount_micros' => 500000
        ]);

        // Creates a campaign budget operation.
        $campaignBudgetOperation = new CampaignBudgetOperation();
        $campaignBudgetOperation->setCreate($campaignBudget);

        // Issues a mutate request to add campaign budgets.
        $campaignBudgetServiceClient = $googleAdsClient->getCampaignBudgetServiceClient();
        /** @var MutateCampaignBudgetsResponse $campaignBudgetResponse */
        $campaignBudgetResponse = $campaignBudgetServiceClient->mutateCampaignBudgets(
            $customerId,
            [$campaignBudgetOperation]
        );

        $campaignBudgetResourceName = $campaignBudgetResponse->getResults()[0]->getResourceName();
        $newCampaignBudget = self::getCampaignBudget(
            $googleAdsClient,
            $customerId,
            $campaignBudgetResourceName
        );

        printf("Added budget named '%s'.%s", $newCampaignBudget->getName(), PHP_EOL);

        return $newCampaignBudget;
    }

    /**
     * Gets a campaign budget.
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param string $resourceName the resource name of the campaign budget to retrieve
     * @return CampaignBudget the campaign budget
     */
    private static function getCampaignBudget(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $resourceName
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $query = "SELECT campaign_budget.id, campaign_budget.name, campaign_budget.resource_name " .
                 "FROM campaign_budget " .
                 "WHERE campaign_budget.resource_name = '$resourceName'";

        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        return $response->getIterator()->current()->getCampaignBudget();
    }

    /**
     * Creates a campaign.
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param CampaignBudget $campaignBudget the campaign budget
     * @return Campaign the newly created campaign
     */
    private static function createCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        CampaignBudget $campaignBudget
    ) {
        $campaign = new Campaign([
            'name' => 'Interplanetary Cruise #' . Helper::getPrintableDatetime(),
            'advertising_channel_type' => AdvertisingChannelType::SEARCH,
            // Recommendation: Set the campaign to PAUSED when creating it to prevent
            // the ads from immediately serving. Set to ENABLED once you've added
            // targeting and the ads are ready to serve.
            'status' => CampaignStatus::PAUSED,
            // Sets the bidding strategy and budget.
            'manual_cpc' => new ManualCpc(),
            'campaign_budget' => $campaignBudget->getResourceName(),
            // Adds the network settings configured above.
            'network_settings' => new NetworkSettings([
                'target_google_search' => true,
                'target_search_network' => true,
                'target_content_network' => false,
                'target_partner_search_network' => false
            ]),
            // Optional: Sets the start and end dates.
            'start_date' => date('Ymd', strtotime('+1 day')),
            'end_date' => date('Ymd', strtotime('+1 month'))
        ]);

        // Creates a campaign operation.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setCreate($campaign);

        // Issues a mutate request to add campaigns.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        /** @var MutateCampaignsResponse $campaignResponse */
        $campaignResponse = $campaignServiceClient->mutateCampaigns(
            $customerId,
            [$campaignOperation]
        );

        $campaignResourceName = $campaignResponse->getResults()[0]->getResourceName();
        $newCampaign = self::getCampaign($googleAdsClient, $customerId, $campaignResourceName);

        printf("Added campaign named '%s'.%s", $newCampaign->getName(), PHP_EOL);

        return $newCampaign;
    }

    /**
     * Gets a campaign.
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param string $campaignResourceName the resource name of the campaign to retrieve
     * @return Campaign the campaign
     */
    private static function getCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $campaignResourceName
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $query = "SELECT campaign.id, campaign.name, campaign.resource_name " .
                 "FROM campaign " .
                 "WHERE campaign.resource_name = '$campaignResourceName'";

        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        return $response->getIterator()->current()->getCampaign();
    }

    /**
     * Creates an ad group.
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param Campaign $campaign the campaign
     * @return AdGroup the newly created ad group
     */
    private static function createAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        Campaign $campaign
    ) {
        // Constructs an ad group and sets an optional CPC value.
        $adGroup = new AdGroup([
            'name' => 'Earth to Mars Cruises #' . Helper::getPrintableDatetime(),
            'campaign' => $campaign->getResourceName(),
            'status' => AdGroupStatus::ENABLED,
            'type' => AdGroupType::SEARCH_STANDARD,
            'cpc_bid_micros' => 10000000
        ]);

        // Creates an ad group operation.
        $adGroupOperation = new AdGroupOperation();
        $adGroupOperation->setCreate($adGroup);

        // Issues a mutate request to add the ad groups.
        $adGroupServiceClient = $googleAdsClient->getAdGroupServiceClient();
        /** @var MutateAdGroupsResponse $adGroupResponse */
        $adGroupResponse = $adGroupServiceClient->mutateAdGroups($customerId, [$adGroupOperation]);

        $adGroupResourceName = $adGroupResponse->getResults()[0]->getResourceName();
        $newAdGroup = self::getAdGroup($googleAdsClient, $customerId, $adGroupResourceName);

        printf("Added ad group named '%s'.%s", $newAdGroup->getName(), PHP_EOL);

        return $newAdGroup;
    }

    /**
     * Gets an ad group.
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param string $adGroupResourceName the resource name of the ad group to retrieve
     * @return AdGroup the ad group
     */
    private static function getAdGroup(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $adGroupResourceName
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $query = "SELECT ad_group.id, ad_group.name, ad_group.resource_name " .
                 "FROM ad_group " .
                 "WHERE ad_group.resource_name = '$adGroupResourceName'";

        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        return $response->getIterator()->current()->getAdGroup();
    }

    /**
     * Creates text ads.
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param AdGroup $adGroup the ad group
     */
    private static function createTextAds(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        AdGroup $adGroup
    ) {
        $operations = [];
        for ($i = 0; $i < self::NUMBER_OF_ADS; $i++) {
            // Creates the expanded text ad info.
            $expandedTextAdInfo = new ExpandedTextAdInfo([
                'headline_part1' => 'Cruise to Mars #' . Helper::getPrintableDatetime(),
                'headline_part2' => 'Best Space Cruise Line',
                'description' => 'Buy your tickets now!'
            ]);

            // Creates an ad group ad to hold the above ad.
            $adGroupAd = new AdGroupAd([
                'ad_group' => $adGroup->getResourceName(),
                'status' => AdGroupAdStatus::PAUSED,
                'ad' => new Ad([
                    'expanded_text_ad' => $expandedTextAdInfo,
                    'final_urls' => ['http://www.example.com']
                ])
            ]);

            // Creates an ad group ad operation and add it to the operations array.
            $adGroupAdOperation = new AdGroupAdOperation();
            $adGroupAdOperation->setCreate($adGroupAd);
            $operations[] = $adGroupAdOperation;
        }

        // Issues a mutate request to add the ad group ads.
        $adGroupAdServiceClient = $googleAdsClient->getAdGroupAdServiceClient();
        /** @var MutateAdGroupAdsResponse $adGroupAdResponse */
        $adGroupAdResponse = $adGroupAdServiceClient->mutateAdGroupAds($customerId, $operations);

        $newAdResourceNames = [];
        foreach ($adGroupAdResponse->getResults() as $result) {
            $newAdResourceNames[] = $result->getResourceName();
        }

        $newAds = self::getAds($googleAdsClient, $customerId, $newAdResourceNames);
        foreach ($newAds as $newAd) {
            /** @var AdGroupAd $newAd */
            // Note that the status printed below is an enum value.
            // For example, a value of 2 will be returned when the ad status is 'ENABLED'.
            // A mapping of enum names to values can be found at AdGroupAdStatus.php.
            printf(
                "Created expanded text ad with ID %d, status %d and headline '%s - %s'.%s",
                $newAd->getAd()->getId(),
                $newAd->getStatus(),
                $newAd->getAd()->getExpandedTextAd()->getHeadlinePart1(),
                $newAd->getAd()->getExpandedTextAd()->getHeadlinePart2(),
                PHP_EOL
            );
        }
    }

    /**
     * Gets an array of ads by their resource names.
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param array $adResourceNames the resource names of the ads to retrieve
     * @return array an array of ads
     */
    private static function getAds(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $adResourceNames
    ) {
        $resourceNames = join(",", array_map(function ($resourceName) {
            return "'$resourceName'";
        }, $adResourceNames));
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $query = "SELECT ad_group_ad.ad.id, " .
                 "ad_group_ad.ad.expanded_text_ad.headline_part1, " .
                 "ad_group_ad.ad.expanded_text_ad.headline_part2, " .
                 "ad_group_ad.status, ad_group_ad.ad.final_urls, " .
                 "ad_group_ad.resource_name " .
                 "FROM ad_group_ad " .
                 "WHERE ad_group_ad.resource_name in ($resourceNames)";

        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        $ads = [];
        foreach ($response->iterateAllElements() as $result) {
            $ads[] = $result->getAdGroupAd();
        }
        return $ads;
    }

    /**
     * Creates keywords.
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param AdGroup $adGroup the ad group
     * @param array $keywordsToAdd the keywords to create
     */
    private static function createKeywords(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        AdGroup $adGroup,
        array $keywordsToAdd
    ) {

        $adGroupCriterionOperations = [];
        foreach ($keywordsToAdd as $keywordText) {
            // Constructs an ad group criterion using the keyword text info above.
            $adGroupCriterion = new AdGroupCriterion([
                'ad_group' => $adGroup->getResourceName(),
                'status' => AdGroupCriterionStatus::ENABLED,
                'keyword' => new KeywordInfo([
                    'text' => $keywordText,
                    'match_type' => KeywordMatchType::EXACT
                ])
            ]);

            $adGroupCriterionOperation = new AdGroupCriterionOperation();
            $adGroupCriterionOperation->setCreate($adGroupCriterion);
            $adGroupCriterionOperations[] = $adGroupCriterionOperation;
        }

        // Issues a mutate request to add the ad group criteria.
        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
        /** @var MutateAdGroupCriteriaResponse $adGroupCriterionResponse */
        $adGroupCriterionResponse = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            $customerId,
            $adGroupCriterionOperations
        );

        $newAdGroupCriterionResourceNames = [];
        foreach ($adGroupCriterionResponse->getResults() as $result) {
            $newAdGroupCriterionResourceNames[] = $result->getResourceName();
        }

        $newKeywords = self::getKeywords(
            $googleAdsClient,
            $customerId,
            $newAdGroupCriterionResourceNames
        );
        foreach ($newKeywords as $newKeyword) {
            /** @var AdGroupCriterion $newKeyword */
            // Note that the match type printed below is an enum value.
            // For example, a value of 2 will be returned when the keyword match type is 'EXACT'.
            // A mapping of enum names to values can be found at KeywordMatchType.php.
            printf(
                "Keyword with text '%s', id = %d and match type %d was created.%s",
                $newKeyword->getKeyword()->getText(),
                $newKeyword->getCriterionId(),
                $newKeyword->getKeyword()->getMatchType(),
                PHP_EOL
            );
        }
    }

    /**
     * Gets an array of keywords by their resource names.
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param array $keywordResourceNames the resource names of the keywords to retrieve
     * @return array an array of keywords
     */
    private static function getKeywords(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $keywordResourceNames
    ) {
        $resourceNames = join(",", array_map(function ($resourceName) {
            return "'$resourceName'";
        }, $keywordResourceNames));
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $query = "SELECT ad_group.id, ad_group.status, ad_group_criterion.criterion_id, " .
                 "ad_group_criterion.keyword.text, ad_group_criterion.keyword.match_type " .
                 "FROM ad_group_criterion " .
                 "WHERE ad_group_criterion.type = 'KEYWORD' " .
                 "AND ad_group.status = 'ENABLED' " .
                 "AND ad_group_criterion.status IN ('ENABLED', 'PAUSED') " .
                 "AND ad_group_criterion.resource_name IN ($resourceNames)";

        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        $keywords = [];
        foreach ($response->iterateAllElements() as $result) {
            $keywords[] = $result->getAdGroupCriterion();
        }
        return $keywords;
    }
}
