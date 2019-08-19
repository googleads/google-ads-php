<?php
/**
 * Copyright 2018 Google LLC
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
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V2\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\V2\ResourceNames;
use Google\Ads\GoogleAds\V2\Common\TargetSpend;
use Google\Ads\GoogleAds\V2\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V2\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V2\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V2\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V2\Resources\BiddingStrategy;
use Google\Ads\GoogleAds\V2\Resources\Campaign;
use Google\Ads\GoogleAds\V2\Resources\Campaign\NetworkSettings;
use Google\Ads\GoogleAds\V2\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V2\Services\BiddingStrategyOperation;
use Google\Ads\GoogleAds\V2\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V2\Services\CampaignOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\BoolValue;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/**
 * This example adds a portfolio bidding strategy and uses it to construct a campaign.
 */
class UsePortfolioBiddingStrategy
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Optional: Specify a campaign budget ID below to be used to create a campaign. If none is
    // specified, this example will create a new campaign budget.
    const CAMPAIGN_BUDGET_ID = null;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments(
            [
                ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
                ArgumentNames::CAMPAIGN_BUDGET_ID => GetOpt::OPTIONAL_ARGUMENT
            ]
        );

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
                $options[ArgumentNames::CAMPAIGN_BUDGET_ID] ?: self::CAMPAIGN_BUDGET_ID
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
     * @param int $campaignBudgetId the campaign budget ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignBudgetId
    ) {
        $biddingStrategyResourceName = self::createBiddingStrategy($googleAdsClient, $customerId);
        if (is_null($campaignBudgetId)) {
            $campaignBudgetResourceName =
                self::createSharedCampaignBudget($googleAdsClient, $customerId);
        } else {
            $campaignBudgetResourceName =
                ResourceNames::forCampaignBudget($customerId, $campaignBudgetId);
        }
        self::createCampaignWithBiddingStrategy(
            $googleAdsClient,
            $customerId,
            $biddingStrategyResourceName,
            $campaignBudgetResourceName
        );
    }

    /**
     * Creates the portfolio bidding strategy.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the resource name of created bidding strategy
     */
    private static function createBiddingStrategy(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Creates a portfolio bidding strategy.
        $portfolioBiddingStrategy = new BiddingStrategy([
            'name' => new StringValue(['value' => 'Maximize Clicks #' . uniqid()]),
            'target_spend' => new TargetSpend([
                'cpc_bid_ceiling_micros' => new Int64Value(['value' => 2000000]),
                'target_spend_micros' => new Int64Value(['value' => 20000000])
            ])
        ]);

        // Constructs an operation that will create a portfolio bidding strategy.
        $biddingStrategyOperation = new BiddingStrategyOperation();
        $biddingStrategyOperation->setCreate($portfolioBiddingStrategy);

        // Issues a mutate request to create the bidding strategy.
        $biddingStrategyServiceClient = $googleAdsClient->getBiddingStrategyServiceClient();
        $response = $biddingStrategyServiceClient->mutateBiddingStrategies(
            $customerId,
            [$biddingStrategyOperation]
        );
        /** @var BiddingStrategy $addedBiddingStrategy */
        $addedBiddingStrategy = $response->getResults()[0];

        // Prints out the resource name of the created bidding strategy.
        printf(
            "Created portfolio bidding strategy with resource name: '%s'.%s",
            $addedBiddingStrategy->getResourceName(),
            PHP_EOL
        );

        return $addedBiddingStrategy->getResourceName();
    }

    /**
     * Creates an explicitly shared budget to be used to create the campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the resource name of created shared budget
     */
    private static function createSharedCampaignBudget(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // Creates a shared budget.
        $budget = new CampaignBudget([
            'name' => new StringValue(['value' => 'Shared Interplanetary Budget #' . uniqid()]),
            'delivery_method' => BudgetDeliveryMethod::STANDARD,
            // Sets the amount of budget.
            'amount_micros' => new Int64Value(['value' => 50000000]),
            // Makes the budget explicitly shared.
            'explicitly_shared' => new BoolValue(['value' => true])
        ]);

        // Constructs a campaign budget operation.
        $campaignBudgetOperation = new CampaignBudgetOperation();
        $campaignBudgetOperation->setCreate($budget);

        // Issues a mutate request to create the budget.
        $campaignBudgetServiceClient = $googleAdsClient->getCampaignBudgetServiceClient();
        $response = $campaignBudgetServiceClient->mutateCampaignBudgets(
            $customerId,
            [$campaignBudgetOperation]
        );

        /** @var CampaignBudget $addedBudget */
        $addedBudget = $response->getResults()[0];
        printf(
            "Created a shared budget with resource name '%s'.%s",
            $addedBudget->getResourceName(),
            PHP_EOL
        );

        return $addedBudget->getResourceName();
    }

    /**
     * Creates a campaign with the created portfolio bidding strategy.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $biddingStrategyResourceName the bidding strategy resource name to use
     * @param string $campaignBudgetResourceName the shared budget resource name to use
     */
    private static function createCampaignWithBiddingStrategy(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $biddingStrategyResourceName,
        string $campaignBudgetResourceName
    ) {
        // Creates a Search campaign.
        $campaign = new Campaign([
            'name' => new StringValue(['value' => 'Interplanetary Cruise #' . uniqid()]),
            'advertising_channel_type' => AdvertisingChannelType::SEARCH,
            // Recommendation: Set the campaign to PAUSED when creating it to prevent
            // the ads from immediately serving. Set to ENABLED once you've added
            // targeting and the ads are ready to serve.
            'status' => CampaignStatus::PAUSED,
            // Configures the campaign network options.
            'network_settings' => new NetworkSettings([
                'target_google_search' => new BoolValue(['value' => true]),
                'target_search_network' => new BoolValue(['value' => true]),
                'target_content_network' => new BoolValue(['value' => true]),
            ]),
            // Sets the bidding strategy and budget.
            'bidding_strategy' => new StringValue(['value' => $biddingStrategyResourceName]),
            'campaign_budget' => new StringValue(['value' => $campaignBudgetResourceName])
        ]);

        // Constructs a campaign operation.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setCreate($campaign);

        // Issues a mutate request to add the campaign.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        $response = $campaignServiceClient->mutateCampaigns($customerId, [$campaignOperation]);

        /** @var Campaign $addedCampaign */
        $addedCampaign = $response->getResults()[0];
        printf(
            "Created a campaign with resource name: '%s'.%s",
            $addedCampaign->getResourceName(),
            PHP_EOL
        );
    }
}

UsePortfolioBiddingStrategy::main();
