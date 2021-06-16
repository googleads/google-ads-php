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
use Google\Ads\GoogleAds\V8\Enums\CampaignExperimentTrafficSplitTypeEnum\CampaignExperimentTrafficSplitType;
use Google\Ads\GoogleAds\V8\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V8\Resources\CampaignExperiment;
use Google\Ads\GoogleAds\V8\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/**
 * This example illustrates how to begin creation of a campaign experiment from a draft and wait
 * for it to complete.
 */
class CreateCampaignExperiment
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const BASE_CAMPAIGN_ID = 'INSERT_BASE_CAMPAIGN_ID_HERE';
    private const DRAFT_ID = 'INSERT_DRAFT_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::BASE_CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::DRAFT_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::BASE_CAMPAIGN_ID] ?: self::BASE_CAMPAIGN_ID,
                $options[ArgumentNames::DRAFT_ID] ?: self::DRAFT_ID
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
     * @param int $baseCampaignId the base campaign ID
     * @param int $draftId the draft ID used to create an experiment
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $baseCampaignId,
        int $draftId
    ) {
        // Creates a campaign experiment.
        $campaignExperiment = new CampaignExperiment([
            'campaign_draft'
                => ResourceNames::forCampaignDraft($customerId, $baseCampaignId, $draftId),
            'name' => 'Campaign Experiment #' . Helper::getPrintableDatetime(),
            'traffic_split_percent' => 50,
            'traffic_split_type' => CampaignExperimentTrafficSplitType::RANDOM_QUERY
        ]);

        // Issues an asynchronous request to create the campaign experiment. This will return
        // `Google\LongRunning\Operation` (LRO).
        $campaignExperimentServiceClient = $googleAdsClient->getCampaignExperimentServiceClient();
        $operationResponse = $campaignExperimentServiceClient->createCampaignExperiment(
            $customerId,
            $campaignExperiment
        );

        // Prints some info about the process and the campaign experiment resource name.
        $campaignExperimentResourceName =
            $operationResponse->getMetadata()->getCampaignExperiment();
        printf(
            'Asynchronous request to create campaign experiment with resource name "%1$s"'
            . ' started.%2$sWaiting until operation completes.%2$s',
            $campaignExperimentResourceName,
            PHP_EOL
        );

        // pollUntilComplete() implements a default back-off policy for retrying. You can tweak the
        // retrying parameters like the maximum polling interval to use by passing them as an array
        // to the pollUntilComplete() function. Visit the OperationResponse.php file for more
        // details.
        $operationResponse->pollUntilComplete();

        // Fetches information about the created experiment campaign and prints out its resource
        // name.
        $query = "SELECT campaign_experiment.experiment_campaign FROM campaign_experiment"
            . " WHERE campaign_experiment.resource_name = '$campaignExperimentResourceName'";
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response = $googleAdsServiceClient->search($customerId, $query);
        /** @var GoogleAdsRow $googleAdsRow */
        $googleAdsRow = $response->getIterator()->current();
        printf(
            "Experiment campaign with resource name '%s' finished creating.%s",
            $googleAdsRow->getCampaignExperiment()->getExperimentCampaign(),
            PHP_EOL
        );
    }
}

CreateCampaignExperiment::main();
