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
use Google\Ads\GoogleAds\V8\Enums\AdGroupStatusEnum\AdGroupStatus;
use Google\Ads\GoogleAds\V8\Enums\AdGroupTypeEnum\AdGroupType;
use Google\Ads\GoogleAds\V8\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V8\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V8\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V8\Resources\AdGroup;
use Google\Ads\GoogleAds\V8\Resources\Campaign;
use Google\Ads\GoogleAds\V8\Resources\Campaign\NetworkSettings;
use Google\Ads\GoogleAds\V8\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V8\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V8\Services\CampaignOperation;
use Google\Ads\GoogleAds\V8\Services\MutateAdGroupsResponse;
use Google\Ads\GoogleAds\V8\Services\MutateCampaignBudgetsResponse;
use Google\Ads\GoogleAds\V8\Services\MutateCampaignsResponse;
use Google\AdsApi\AdWords\AdWordsServices;
use Google\AdsApi\AdWords\AdWordsSession;
use Google\AdsApi\AdWords\v201809\cm\AdGroupAd;
use Google\AdsApi\AdWords\v201809\cm\AdGroupAdOperation;
use Google\AdsApi\AdWords\v201809\cm\AdGroupAdService;
use Google\AdsApi\AdWords\v201809\cm\AdGroupAdStatus;
use Google\AdsApi\AdWords\v201809\cm\AdGroupCriterionOperation;
use Google\AdsApi\AdWords\v201809\cm\AdGroupCriterionService;
use Google\AdsApi\AdWords\v201809\cm\BiddableAdGroupCriterion;
use Google\AdsApi\AdWords\v201809\cm\ExpandedTextAd;
use Google\AdsApi\AdWords\v201809\cm\Keyword;
use Google\AdsApi\AdWords\v201809\cm\KeywordMatchType;
use Google\AdsApi\AdWords\v201809\cm\Operator;
use Google\AdsApi\AdWords\v201809\cm\UrlList;
use Google\AdsApi\AdWords\v201809\cm\UserStatus;

/**
 * This code example is the fourth in a series of code examples that shows how to create
 * a Search campaign using the AdWords API, and then migrate it to the Google Ads API one
 * functionality at a time. See CreateCompleteCampaignAdwordsApiOnly.php through
 * CreateCompleteCampaignBothApisPhase4.php for code examples in various stages of migration.
 *
 * In this code example, the functionalities to create a campaign budget, a search campaign, and
 * an ad group have been migrated to the Google Ads API. The remaining functionalities -
 * creating expanded text ads and creating keywords - are using the AdWords API.
 */
class CreateCompleteCampaignBothApisPhase3
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
     * Runs the CreateCompleteCampaignBothApisPhase3 example.
     * @param AdWordsServices $adWordsServices the AdWords services
     * @param AdWordsSession $adWordsSession the AdWords session
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     */
    public static function runExample(
        AdWordsServices $adWordsServices,
        AdWordsSession $adWordsSession,
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        $campaignBudget = self::createCampaignBudget($googleAdsClient, $customerId);
        $campaign = self::createCampaign($googleAdsClient, $customerId, $campaignBudget);
        $adGroup = self::createAdGroup($googleAdsClient, $customerId, $campaign);
        self::createTextAds($adWordsServices, $adWordsSession, $adGroup->getId());
        self::createKeywords(
            $adWordsServices,
            $adWordsSession,
            $adGroup->getId(),
            self::KEYWORDS_TO_ADD
        );
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
     *
     * @param AdWordsServices $adWordsServices the AdWords services
     * @param AdWordsSession $adWordsSession the AdWords session
     * @param int $adGroupId the ad group ID
     */
    private static function createTextAds(
        AdWordsServices $adWordsServices,
        AdWordsSession $adWordsSession,
        int $adGroupId
    ) {
        /** @var AdGroupAdService $adGroupAdService */
        $adGroupAdService = $adWordsServices->get($adWordsSession, AdGroupAdService::class);

        $operations = [];

        for ($i = 0; $i < self::NUMBER_OF_ADS; $i++) {
            // Create an expanded text ad.
            $expandedTextAd = new ExpandedTextAd();
            $expandedTextAd->setHeadlinePart1(
                'Cruise #' . Helper::getPrintableDatetime() . ' to Mars'
            );
            $expandedTextAd->setHeadlinePart2('Best Space Cruise Line');
            $expandedTextAd->setHeadlinePart3('For Your Loved Ones');
            $expandedTextAd->setDescription('Buy your tickets now!');
            $expandedTextAd->setDescription2('Discount ends soon');
            $expandedTextAd->setFinalUrls(['http://www.example.com']);

            // Create ad group ad.
            $adGroupAd = new AdGroupAd();
            $adGroupAd->setAdGroupId($adGroupId);
            $adGroupAd->setAd($expandedTextAd);

            // Optional: Set additional settings.
            $adGroupAd->setStatus(AdGroupAdStatus::PAUSED);

            // Create ad group ad operation and add it to the list.
            $operation = new AdGroupAdOperation();
            $operation->setOperand($adGroupAd);
            $operation->setOperator(Operator::ADD);
            $operations[] = $operation;
        }

        // Create the ad group ads on the server and print out their information.
        $result = $adGroupAdService->mutate($operations);
        foreach ($result->getValue() as $adGroupAd) {
            /** @var ExpandedTextAd $ad */
            $ad = $adGroupAd->getAd();
            printf(
                "Expanded text ad with ID %d and headline '%s - %s%s'"
                . " was created.%s",
                $ad->getId(),
                $ad->getHeadlinePart1(),
                $ad->getHeadlinePart2(),
                $ad->getHeadlinePart3()  ? ' - ' . $ad->getHeadlinePart3() : '',
                PHP_EOL
            );
        }
    }

    /**
     * Creates keywords.
     *
     * @param AdWordsServices $adWordsServices the AdWords services
     * @param AdWordsSession $adWordsSession the AdWords session
     * @param int $adGroupId the ad group ID
     * @param string[] $keywordsToAdd
     */
    private static function createKeywords(
        AdWordsServices $adWordsServices,
        AdWordsSession $adWordsSession,
        int $adGroupId,
        array $keywordsToAdd
    ) {
        /** @var AdGroupCriterionService $adGroupCriterionService */
        $adGroupCriterionService =
            $adWordsServices->get($adWordsSession, AdGroupCriterionService::class);

        $operations = [];

        foreach ($keywordsToAdd as $keywordText) {
            // Create a keyword.
            $keyword = new Keyword();
            $keyword->setText($keywordText);
            $keyword->setMatchType(KeywordMatchType::BROAD);

            // Create a biddable ad group criterion.
            $adGroupCriterion = new BiddableAdGroupCriterion();
            $adGroupCriterion->setAdGroupId($adGroupId);
            $adGroupCriterion->setCriterion($keyword);

            // Optional: Set the user status.
            $adGroupCriterion->setUserStatus(UserStatus::PAUSED);
            // Optional: Set the keyword destination url.
            $adGroupCriterion->setFinalUrls(
                new UrlList(['http://www.example.com/mars/cruise/?kw=' . urlencode($keywordText)])
            );

            // Create an ad group criterion operation and add it to the list.
            $operation = new AdGroupCriterionOperation();
            $operation->setOperand($adGroupCriterion);
            $operation->setOperator(Operator::ADD);
            $operations[] = $operation;
        }

        // Create the keywords on the server and print out their information.
        $result = $adGroupCriterionService->mutate($operations);
        foreach ($result->getValue() as $adGroupCriterion) {
            /** @var Keyword $keyword */
            $keyword = $adGroupCriterion->getCriterion();
            printf(
                "Keyword with ad group ID %d, keyword ID %d, text '%s' and match type '%s'"
                . " was created.%s",
                $adGroupCriterion->getAdGroupId(),
                $keyword->getId(),
                $keyword->getText(),
                $keyword->getMatchType(),
                PHP_EOL
            );
        }
    }
}
