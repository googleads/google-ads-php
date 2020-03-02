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

namespace Google\Ads\GoogleAds\Examples\BasicOperations;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V3\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V3\Common\ManualCpc;
use Google\Ads\GoogleAds\V3\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V3\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V3\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V3\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V3\Resources\Campaign;
use Google\Ads\GoogleAds\V3\Resources\Campaign\NetworkSettings;
use Google\Ads\GoogleAds\V3\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V3\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V3\Services\CampaignOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\BoolValue;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/** This example adds new campaigns to an account. */
class AddCampaigns
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const NUMBER_OF_CAMPAIGNS_TO_ADD = 2;

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
        // Creates a single shared budget to be used by the campaigns added below.
        $budgetResourceName =
            new StringValue(['value' => self::addCampaignBudget($googleAdsClient, $customerId)]);

        $trueValue = new BoolValue(['value' => true]);
        $falseValue = new BoolValue(['value' => false]);

        $startDate = new StringValue(['value' => date('Ymd', strtotime('+1 day'))]);
        $endDate = new StringValue(['value' => date('Ymd', strtotime('+1 month'))]);

        // Configures the campaign network options.
        $networkSettings = new NetworkSettings([
            'target_google_search' => $trueValue,
            'target_search_network' => $trueValue,
            'target_content_network' => $falseValue,
            'target_partner_search_network' => $falseValue
        ]);

        $campaignOperations = [];
        for ($i = 0; $i < self::NUMBER_OF_CAMPAIGNS_TO_ADD; $i++) {
            // Creates a campaign.
            $campaign = new Campaign([
                'name' => new StringValue(['value' => 'Interplanetary Cruise #' . uniqid()]),
                'advertising_channel_type' => AdvertisingChannelType::SEARCH,
                // Recommendation: Set the campaign to PAUSED when creating it to prevent
                // the ads from immediately serving. Set to ENABLED once you've added
                // targeting and the ads are ready to serve.
                'status' => CampaignStatus::PAUSED,
                // Sets the bidding strategy and budget.
                'manual_cpc' => new ManualCpc(),
                'campaign_budget' => $budgetResourceName,
                // Adds the network settings configured above.
                'network_settings' => $networkSettings,
                // Optional: Sets the start and end dates.
                'start_date' => $startDate,
                'end_date' => $endDate
            ]);

            // Creates a campaign operation.
            $campaignOperation = new CampaignOperation();
            $campaignOperation->setCreate($campaign);
            $campaignOperations[] = $campaignOperation;
        }

        // Issues a mutate request to add campaigns.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        $response = $campaignServiceClient->mutateCampaigns($customerId, $campaignOperations);

        printf("Added %d campaigns:%s", $response->getResults()->count(), PHP_EOL);

        foreach ($response->getResults() as $addedCampaign) {
            /** @var Campaign $addedCampaign */
            print "{$addedCampaign->getResourceName()}" . PHP_EOL;
        }
    }

    /**
     * Creates a new campaign budget in the specified client account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string the resource name of the newly created budget
     */
    private static function addCampaignBudget(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // Creates a campaign budget.
        $budget = new CampaignBudget([
            'name' => new StringValue(['value' => 'Interplanetary Cruise Budget #' . uniqid()]),
            'delivery_method' => BudgetDeliveryMethod::STANDARD,
            'amount_micros' => new Int64Value(['value' => 500000])
        ]);

        // Creates a campaign budget operation.
        $campaignBudgetOperation = new CampaignBudgetOperation();
        $campaignBudgetOperation->setCreate($budget);

        // Issues a mutate request.
        $campaignBudgetServiceClient = $googleAdsClient->getCampaignBudgetServiceClient();
        $response = $campaignBudgetServiceClient->mutateCampaignBudgets(
            $customerId,
            [$campaignBudgetOperation]
        );

        /** @var CampaignBudget $addedBudget */
        $addedBudget = $response->getResults()[0];
        printf("Added budget named '%s'%s", $addedBudget->getResourceName(), PHP_EOL);

        return $addedBudget->getResourceName();
    }
}

AddCampaigns::main();
