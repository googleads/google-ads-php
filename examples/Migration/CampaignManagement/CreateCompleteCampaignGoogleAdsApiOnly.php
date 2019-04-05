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

use Google\Ads\GoogleAds\Lib\V1\GoogleAdsClient;
use Google\Ads\GoogleAds\V1\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V1\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V1\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V1\Services\CampaignBugdetServiceClient;
use Google\Ads\GoogleAds\V1\Services\MutateCampaignBudgetsResponse;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/**
 * This code example is the last in a series of code examples that shows how to create
 * a Search campign using the AdWords API, and then migrate it to the Google Ads API one
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
    const NUMBER_OF_ADS = 5;
    // The list of keywords being added in this code example.
    const KEYWORDS_TO_ADD = [
        "mars cruise",
        "space hotel"
    ];

    // The default page size for search queries
    const PAGE_SIZE = 1000;

    /**
     * Runs the CreateCompleteCampaignGoogleAdsApiOnly example.
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param string $customerId the client customer ID without hyphens
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, string $customerId)
    {
        /** @var CampaignBudgetServiceClient $campaignBudgetServiceClient */
        $campaignBudgetServiceClient = $googleAdsClient->getCampaignBudgetServiceClient();

        // Creates a campaign budget.
        $campaignBudget = new CampaignBudget([
            'name' => new StringValue(['value' => 'Interplanetary Cruise Budget #' . uniqid()]),
            'delivery_method' => BudgetDeliveryMethod::STANDARD,
            'amount_micros' => new Int64Value(['value' => 500000])
        ]);

        // Creates a campaign budget operation.
        $campaignBudgetOperation = new CampaignBudgetOperation();
        $campaignBudgetOperation->setCreate($campaignBudget);

        /** @var MutateCampaignBudgetResponse $campaignBudgetResponse */
        $campaignBudgetResponse = $campaignBudgetServiceClient->mutateCampaignBudgets(
            $customerId,
            [$campaignBudgetOperation]
        );

        $campaignBudgetResourceName = $campaignBudgetResponse->getResults()[0]->getResourceName();
        $newCampaignBudget = self::getCampaignBudget(
            $googleAdsClient,
            $campaignBudgetResourceName,
            $customerId
        );
    }

    /**
     * Gets a campaign budget.
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param string $customerId the client customer ID without hyphens
     * @param string $resourceName the resource name of the campaign budget to retrieve
     */
    private static function getCampaignBudget(
        GoogleAdsClient $googleAdsClient,
        string $customerId,
        string $resourceName
    ) {
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $query = "SELECT campaign_budget.id, campaign_budget.name, " .
                 "campaign_budget.resource_name from campaign_budget where " .
                 "campaign_budget.resource_name='" . $resourceName . "'";

        $response =
            $googleAdsServiceClient->search($customerId, $query, ['pageSize' => self::PAGE_SIZE]);

        return $response->getIterator()->current()->getCampaignBudget();
    }
}
