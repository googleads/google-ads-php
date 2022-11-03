<?php

/**
 * Copyright 2022 Google LLC
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
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V12\GoogleAdsException;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V12\ResourceNames;
use Google\Ads\GoogleAds\V12\Enums\CampaignExperimentTrafficSplitTypeEnum\CampaignExperimentTrafficSplitType;
use Google\Ads\GoogleAds\V12\Enums\ExperimentStatusEnum\ExperimentStatus;
use Google\Ads\GoogleAds\V12\Enums\ExperimentTypeEnum\ExperimentType;
use Google\Ads\GoogleAds\V12\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V12\Resources\Campaign;
use Google\Ads\GoogleAds\V12\Resources\CampaignExperiment;
use Google\Ads\GoogleAds\V12\Resources\Experiment;
use Google\Ads\GoogleAds\V12\Resources\ExperimentArm;
use Google\Ads\GoogleAds\V12\Services\CampaignOperation;
use Google\Ads\GoogleAds\V12\Services\ExperimentArmOperation;
use Google\Ads\GoogleAds\V12\Services\ExperimentOperation;
use Google\Ads\GoogleAds\V12\Services\ExperimentServiceClient;
use Google\Ads\GoogleAds\V12\Services\GoogleAdsRow;
use Google\ApiCore\ApiException;

/**
 * This example creates a new experiment, experiment arms, and demonstrates how to modify the draft
 * campaign as well as begin the experiment.
 */
class CreateExperiment
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const BASE_CAMPAIGN_ID = 'INSERT_BASE_CAMPAIGN_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::BASE_CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::BASE_CAMPAIGN_ID] ?: self::BASE_CAMPAIGN_ID
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
     * @param int $campaignId the campaign ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        $experimentServiceClient = $googleAdsClient->getExperimentServiceClient();

        $experimentResourceName =
            self::createExperimentResource($experimentServiceClient, $customerId);
        $treatmentArmResourceName = self::createExperimentArms(
            $googleAdsClient,
            $customerId,
            $campaignId,
            $experimentResourceName
        );
        $draftCampaignResourceName =
            self::fetchDraftCampaign($googleAdsClient, $customerId, $treatmentArmResourceName);
        self::modifyDraftCampaign($googleAdsClient, $customerId, $draftCampaignResourceName);

        // When you're done setting up the experiment and arms and modifying the draft campaign,
        // this will begin the experiment.
        $experimentServiceClient->scheduleExperiment($experimentResourceName);
    }

    /**
     * Creates an experiment resource.
     *
     * @param ExperimentServiceClient $experimentServiceClient the experiment service client
     * @param int $customerId the customer ID
     * @return string the created experiment's resource name
     */
    // [START create_experiment_1]
    private static function createExperimentResource(
        ExperimentServiceClient $experimentServiceClient,
        int $customerId
    ): string {
        // Creates an experiment and its operation.
        $experiment = new Experiment([
            // Name must be unique.
            'name' => 'Example Experiment #' . Helper::getPrintableDatetime(),
            'type' => ExperimentType::SEARCH_CUSTOM,
            'suffix' => '[experiment]',
            'status' => ExperimentStatus::SETUP
        ]);
        $experimentOperation = new ExperimentOperation(['create' => $experiment]);

        // Issues a request to create the experiment.
        $response = $experimentServiceClient->mutateExperiments(
            $customerId,
            [$experimentOperation]
        );
        $experimentResourceName = $response->getResults()[0]->getResourceName();
        print "Created experiment with resource name '$experimentResourceName'" . PHP_EOL;

        return $experimentResourceName;
    }
    // [END create_experiment_1]

    /**
     * Creates experiment arms and returns the treatment arm resource name, which will be used in
     * the next step.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID
     * @param string $experimentResourceName the experiment's resource name
     * @return string the treatment arm's resource name
     */
    // [START create_experiment_2]
    private static function createExperimentArms(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        string $experimentResourceName
    ): string {
        $operations = [];
        $experimentArm1 = new ExperimentArm([
            // The "control" arm references an already-existing campaign.
            'control' => true,
            'campaigns' => [ResourceNames::forCampaign($customerId, $campaignId)],
            'experiment' => $experimentResourceName,
            'name' => 'control arm',
            'traffic_split' => 40
        ]);
        $operations[] = new ExperimentArmOperation(['create' => $experimentArm1]);
        $experimentArm2 = new ExperimentArm([
            // The non-"control" arm, also called a "treatment" arm, will automatically
            // generate draft campaigns that you can modify before starting the
            // experiment.
            'control' => false,
            'experiment' => $experimentResourceName,
            'name' => 'experiment arm',
            'traffic_split' => 60
        ]);
        $operations[] = new ExperimentArmOperation(['create' => $experimentArm2]);

        // Issues a request to create the experiment arms.
        $experimentArmServiceClient = $googleAdsClient->getExperimentArmServiceClient();
        $response = $experimentArmServiceClient->mutateExperimentArms($customerId, $operations);
        // Results always return in the order that you specify them in the request.
        // Since we created the treatment arm last, it will be the last result.  If
        // you don't remember which arm is the treatment arm, you can always filter
        // the query in the next section with `experiment_arm.control = false`.
        $controlArmResourceName = $response->getResults()[0]->getResourceName();
        $treatmentArmResourceName =
            $response->getResults()[count($operations) - 1]->getResourceName();
        print "Created control arm with resource name '$controlArmResourceName'" . PHP_EOL;
        print "Created treatment arm with resource name '$treatmentArmResourceName'" . PHP_EOL;

        return $treatmentArmResourceName;
    }
    // [END create_experiment_2]

    /**
     * Fetches the draft campaign of the experiment treatment arm.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $treatmentArmResourceName the treatment arm's resource name
     * @return string the draft campaign's resource name
     */
    // [START create_experiment_3]
    private static function fetchDraftCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $treatmentArmResourceName
    ): string {
        // Fetches information about the in design campaigns and prints out its resource
        // name. The `in_design_campaigns` represent campaign drafts, which you can modify
        // before starting the experiment.
        $query = "SELECT experiment_arm.in_design_campaigns FROM experiment_arm"
            . " WHERE experiment_arm.resource_name = '$treatmentArmResourceName'";
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $response = $googleAdsServiceClient->search($customerId, $query);

        // In design campaigns returns as an array, but for now it can only ever contain a single
        // ID, so we just grab the first one.
        /** @var GoogleAdsRow $googleAdsRow */
        $googleAdsRow = $response->getIterator()->current();
        $draftCampaignResourceName = $googleAdsRow->getExperimentArm()->getInDesignCampaigns()[0];
        print "Found draft campaign with resource name '$draftCampaignResourceName'" . PHP_EOL;

        return $draftCampaignResourceName;
    }
    // [END create_experiment_3]

    /**
     * Modifies the draft campaign to simulate the experiment where you're testing changing
     * attributes of the campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param string $draftCampaignResourceName the draft campaign's resource name
     */
    private static function modifyDraftCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $draftCampaignResourceName
    ): void {
        // You can change anything you like about the campaign. These are the changes you're testing
        // by doing this experiment. Here we just change the name for illustrative purposes, but
        // generally you may want to change more meaningful parts of the campaign.
        $updatedCampaign = new Campaign([
            'resource_name' => $draftCampaignResourceName,
            'name' => 'Modified Campaign Name ' . Helper::getShortPrintableDatetime()
        ]);
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setUpdate($updatedCampaign);
        $campaignOperation->setUpdateMask(FieldMasks::allSetFieldsOf($updatedCampaign));

        // Issues a request to update the campaign.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        $campaignServiceClient->mutateCampaigns($customerId, [$campaignOperation]);

        print "Updated the name for the campaign '$draftCampaignResourceName'" . PHP_EOL;
    }
}

CreateExperiment::main();
