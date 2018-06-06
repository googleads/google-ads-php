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
use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\V0\Common\ManualCpc;
use Google\Ads\GoogleAds\V0\Enums\AdvertisingChannelTypeEnum_AdvertisingChannelType;
use Google\Ads\GoogleAds\V0\Enums\BudgetDeliveryMethodEnum_BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V0\Enums\CampaignStatusEnum_CampaignStatus;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V0\Resources\Campaign;
use Google\Ads\GoogleAds\V0\Resources\Campaign_NetworkSettings;
use Google\Ads\GoogleAds\V0\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V0\Services\CampaignBudgetOperation;
use Google\Ads\GoogleAds\V0\Services\CampaignOperation;
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
        $options = ArgumentParser::parseCommandArguments([
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
     * @param int $customerId the client customer ID without hyphens
     */
    public static function runExample(GoogleAdsClient $googleAdsClient, $customerId)
    {
        // Creates a single shared budget to be used by the campaigns added below.
        $budgetResourceName = self::addCampaignBudget($googleAdsClient, $customerId);
        $wrappedBudgetResourceName = new StringValue();
        $wrappedBudgetResourceName->setValue($budgetResourceName);

        $wrappedTrueValue = new BoolValue();
        $wrappedTrueValue->setValue(true);
        $wrappedFalseValue = new BoolValue();
        $wrappedFalseValue->setValue(false);

        $wrappedStartDate = new StringValue();
        $wrappedStartDate->setValue(date('Ymd', strtotime('+1 day')));
        $wrappedEndDate = new StringValue();
        $wrappedEndDate->setValue(date('Ymd', strtotime('+1 month')));

        $campaignOperations = [];
        for ($i = 0; $i < self::NUMBER_OF_CAMPAIGNS_TO_ADD; $i++) {
            // Configures the campaign network options.
            $networkSettings = new Campaign_NetworkSettings();
            $networkSettings->setTargetGoogleSearch($wrappedTrueValue);
            $networkSettings->setTargetSearchNetwork($wrappedTrueValue);
            $networkSettings->setTargetContentNetwork($wrappedFalseValue);
            $networkSettings->setTargetPartnerSearchNetwork($wrappedFalseValue);

            // Creates a campaign.
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
            // Sets the bidding strategy and budget.
            $campaign->setManualCpc(new ManualCpc());
            $campaign->setCampaignBudget($wrappedBudgetResourceName);
            // Adds the network settings configured above.
            $campaign->setNetworkSettings($networkSettings);

            // Optional: Sets the start and end dates.
            $campaign->setStartDate($wrappedStartDate);
            $campaign->setEndDate($wrappedEndDate);

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
     * @param int $customerId the client customer ID
     * @return string the resource name of the newly created budget
     */
    private static function addCampaignBudget(GoogleAdsClient $googleAdsClient, $customerId)
    {
        // Creates a campaign budget.
        $budget = new CampaignBudget();

        $wrappedName = new StringValue();
        $wrappedName->setValue('Interplanetary Cruise Budget #' . uniqid());
        $budget->setName($wrappedName);

        $budget->setDeliveryMethod(BudgetDeliveryMethodEnum_BudgetDeliveryMethod::STANDARD);

        $wrappedAmountMicros = new Int64Value();
        $wrappedAmountMicros->setValue(500000);
        $budget->setAmountMicros($wrappedAmountMicros);

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
