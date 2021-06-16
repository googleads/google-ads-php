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

namespace Google\Ads\GoogleAds\Examples\CampaignManagement;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V8\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V8\ResourceNames;
use Google\Ads\GoogleAds\V8\Enums\BudgetDeliveryMethodEnum\BudgetDeliveryMethod;
use Google\Ads\GoogleAds\V8\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V8\Resources\CampaignBudget;
use Google\Ads\GoogleAds\V8\Services\CampaignBudgetOperation;
use Google\ApiCore\ApiException;

/**
 * This example illustrates how to graduate a campaign experiment.
 */
class GraduateCampaignExperiment
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_EXPERIMENT_ID = 'INSERT_CAMPAIGN_EXPERIMENT_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_EXPERIMENT_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID,
                $options[ArgumentNames::CAMPAIGN_EXPERIMENT_ID] ?: self::CAMPAIGN_EXPERIMENT_ID
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
     * @param int $customerId the client customer ID
     * @param int $campaignExperimentId the campaign experiment ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignExperimentId
    ) {
        // Graduating a campaign experiment requires a new budget. Since the budget for the base
        // campaign has explicitly_shared set to false, the budget cannot
        // be shared with the campaign after it is made independent by graduation.
        $budget = new CampaignBudget([
            'name' => 'Budget #' . Helper::getPrintableDatetime(),
            'delivery_method' => BudgetDeliveryMethod::STANDARD,
            'amount_micros' => 5000000
        ]);

        // Creates a campaign budget operation.
        $campaignBudgetOperation = new CampaignBudgetOperation();
        $campaignBudgetOperation->setCreate($budget);

        // Issues a mutate request to create a campaign budget.
        $campaignBudgetServiceClient = $googleAdsClient->getCampaignBudgetServiceClient();
        $response = $campaignBudgetServiceClient->mutateCampaignBudgets(
            $customerId,
            [$campaignBudgetOperation]
        );

        // Prints out some information about the created campaign budget.
        /** @var CampaignBudget $addedBudget */
        $addedBudget = $response->getResults()[0];
        printf(
            "Created new budget with resource name '%s' for adding to the experiment campaign"
            . " during graduation.%s",
            $addedBudget->getResourceName(),
            PHP_EOL
        );

        // Graduates the experiment campaign using the campaign budget created above.
        $campaignExperimentServiceClient = $googleAdsClient->getCampaignExperimentServiceClient();
        $response = $campaignExperimentServiceClient->graduateCampaignExperiment(
            ResourceNames::forCampaignExperiment($customerId, $campaignExperimentId),
            $addedBudget->getResourceName()
        );
        printf(
            "Campaign with resource name '%s' is now graduated.%s",
            $response->getGraduatedCampaign(),
            PHP_EOL
        );
    }
}

GraduateCampaignExperiment::main();
