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
use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\ResourceNames;
use Google\Ads\GoogleAds\V0\Common\TargetSpend;
use Google\Ads\GoogleAds\V0\Enums\AdvertisingChannelTypeEnum_AdvertisingChannelType;
use Google\Ads\GoogleAds\V0\Enums\BudgetDeliveryMethodEnum_BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V0\Enums\CampaignStatusEnum_CampaignStatus;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V0\Resources\BiddingStrategy;
use Google\Ads\GoogleAds\V0\Resources\Campaign;
use Google\Ads\GoogleAds\V0\Resources\Campaign_NetworkSettings;
use Google\Ads\GoogleAds\V0\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V0\Services\BiddingStrategyOperation;
use Google\Ads\GoogleAds\V0\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V0\Services\CampaignOperation;
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
     * @param int $customerId the client customer ID without hyphens
     * @param int $campaignBudgetId the campaign budget ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        $customerId,
        $campaignBudgetId
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
     * @param int $customerId the client customer ID without hyphens
     * @return string the resource name of created bidding strategy
     */
    private static function createBiddingStrategy(GoogleAdsClient $googleAdsClient, $customerId)
    {
        // Creates a portfolio bidding strategy.
        $targetSpend = new TargetSpend();
        $wrappedCpcBidCeilingMicros = new Int64Value();
        $wrappedCpcBidCeilingMicros->setValue(2000000);
        $targetSpend->setCpcBidCeilingMicros($wrappedCpcBidCeilingMicros);
        $wrappedTargetSpendMicros = new Int64Value();
        $wrappedTargetSpendMicros->setValue(20000000);
        $targetSpend->setTargetSpendMicros($wrappedTargetSpendMicros);

        $portfolioBiddingStrategy = new BiddingStrategy();
        $wrappedName = new StringValue();
        $wrappedName->setValue('Maximize Clicks #' . uniqid());
        $portfolioBiddingStrategy->setName($wrappedName);
        $portfolioBiddingStrategy->setTargetSpend($targetSpend);

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
     * @param int $customerId the client customer ID without hyphens
     * @return string the resource name of created shared budget
     */
    private static function createSharedCampaignBudget(
        GoogleAdsClient $googleAdsClient,
        $customerId
    ) {
        // Creates a shared budget.
        $budget = new CampaignBudget();
        $wrappedName = new StringValue();
        $wrappedName->setValue('Shared Interplanetary Budget #' . uniqid());
        $budget->setName($wrappedName);
        $budget->setDeliveryMethod(BudgetDeliveryMethodEnum_BudgetDeliveryMethod::STANDARD);

        // Sets the amount of budget.
        $wrappedAmountMicros = new Int64Value();
        $wrappedAmountMicros->setValue(50000000);
        $budget->setAmountMicros($wrappedAmountMicros);

        // Makes the budget explicitly shared.
        $wrappedExplicitlyShared = new BoolValue();
        $wrappedExplicitlyShared->setValue(true);
        $budget->setExplicitlyShared($wrappedExplicitlyShared);

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
     * @param int $customerId the client customer ID without hyphens
     * @param string $biddingStrategyResourceName the bidding strategy resource name to use
     * @param string $campaignBudgetResourceName the shared budget resource name to use
     */
    private static function createCampaignWithBiddingStrategy(
        GoogleAdsClient $googleAdsClient,
        $customerId,
        $biddingStrategyResourceName,
        $campaignBudgetResourceName
    ) {
        // Creates a Search campaign.
        $campaign = new Campaign();
        $wrappedName = new StringValue();
        $wrappedName->setValue('Interplanetary Cruise #' . uniqid());
        $campaign->setName($wrappedName);
        $campaign->setAdvertisingChannelType(
            AdvertisingChannelTypeEnum_AdvertisingChannelType::SEARCH
        );
        // Recommendation: Set the campaign to PAUSED when creating it to prevent
        // the ads from immediately serving. Set to ENABLED once you've added
        // targeting and the ads are ready to serve.
        $campaign->setStatus(CampaignStatusEnum_CampaignStatus::PAUSED);

        // Configures the campaign network options.
        $wrappedTrueValue = new BoolValue();
        $wrappedTrueValue->setValue(true);
        $networkSettings = new Campaign_NetworkSettings();
        $networkSettings->setTargetGoogleSearch($wrappedTrueValue);
        $networkSettings->setTargetSearchNetwork($wrappedTrueValue);
        $networkSettings->setTargetContentNetwork($wrappedTrueValue);
        $campaign->setNetworkSettings($networkSettings);

        // Sets the bidding strategy and budget.
        $wrappedBiddingStrategyResourceName = new StringValue();
        $wrappedBiddingStrategyResourceName->setValue($biddingStrategyResourceName);
        $campaign->setBiddingStrategy($wrappedBiddingStrategyResourceName);
        $wrappedCampaignBudgetResourceName = new StringValue();
        $wrappedCampaignBudgetResourceName->setValue($campaignBudgetResourceName);
        $campaign->setCampaignBudget($wrappedCampaignBudgetResourceName);

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
