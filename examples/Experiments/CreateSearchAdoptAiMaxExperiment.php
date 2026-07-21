<?php

/**
 * Copyright 2026 Google LLC
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
 *
 * @category GoogleAds
 * @package  Google\Ads\GoogleAds\Examples\Experiments
 * @author   Google Ads API Team <googleads-api@googlegroups.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @link     https://github.com/googleads/google-ads-php
 */

namespace Google\Ads\GoogleAds\Examples\Experiments;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V24\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V24\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V24\GoogleAdsException;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V24\ResourceNames;
use Google\Ads\GoogleAds\V24\Enums\AssetAutomationStatusEnum\AssetAutomationStatus;
use Google\Ads\GoogleAds\V24\Enums\AssetAutomationTypeEnum\AssetAutomationType;
use Google\Ads\GoogleAds\V24\Enums\ExperimentTypeEnum\ExperimentType;
use Google\Ads\GoogleAds\V24\Resources\Campaign;
use Google\Ads\GoogleAds\V24\Resources\Campaign\AiMaxSetting;
use Google\Ads\GoogleAds\V24\Resources\Campaign\AssetAutomationSetting;
use Google\Ads\GoogleAds\V24\Resources\Experiment;
use Google\Ads\GoogleAds\V24\Resources\ExperimentArm;
use Google\Ads\GoogleAds\V24\Services\CampaignOperation;
use Google\Ads\GoogleAds\V24\Services\ExperimentArmOperation;
use Google\Ads\GoogleAds\V24\Services\ExperimentOperation;
use Google\Ads\GoogleAds\V24\Services\MutateGoogleAdsRequest;
use Google\Ads\GoogleAds\V24\Services\MutateOperation;
use Google\ApiCore\ApiException;

/**
 * This example shows how to create an ADOPT_AI_MAX intra-campaign experiment.
 *
 * @category GoogleAds
 * @package  Google\Ads\GoogleAds\Examples\Experiments
 * @author   Google Ads API Team <googleads-api@googlegroups.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @link     https://github.com/googleads/google-ads-php
 */
class CreateSearchAdoptAiMaxExperiment
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';

    /**
     * Main entry point for running this example from the CLI or browser.
     *
     * @return void
     */
    public static function main()
    {
        $options = (new ArgumentParser())->parseCommandArguments(
            [
                ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
                ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT
            ]
        );

        $customerId = $options[ArgumentNames::CUSTOMER_ID]
            ?: self::CUSTOMER_ID;
        $campaignId = $options[ArgumentNames::CAMPAIGN_ID]
            ?: self::CAMPAIGN_ID;

        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->fromFile()
            ->withOAuth2Credential(
                (new OAuth2TokenBuilder())->fromFile()->build()
            )
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                (int)$customerId,
                (int)$campaignId
            );
        } catch (GoogleAdsException $googleAdsException) {
            printf(
                "Request with ID '%s' failed with status '%s' and includes "
                . "errors:%s",
                $googleAdsException->getRequestId(),
                $googleAdsException->getStatus(),
                PHP_EOL
            );
            foreach (
                $googleAdsException->getGoogleAdsFailure()->getErrors()
                as $error
            ) {
                printf(
                    "\tError with message \"%s\".%s",
                    $error->getMessage(),
                    PHP_EOL
                );
                if ($error->getLocation()) {
                    foreach (
                        $error->getLocation()->getFieldPathElements()
                        as $fieldPathElement
                    ) {
                        printf(
                            "\t\tOn field: %s%s",
                            $fieldPathElement->getFieldName(),
                            PHP_EOL
                        );
                    }
                }
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
     * Runs the example logic.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int             $customerId      the customer ID
     * @param int             $campaignId      the campaign ID to run experiment on
     *
     * @return void
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        $googleAdsServiceClient
            = $googleAdsClient->getGoogleAdsServiceClient();

        // [START create_search_adopt_ai_max_experiment_1]
        $experimentResourceName
            = ResourceNames::forExperiment($customerId, -1);

        $experiment = new Experiment(
            [
            'resource_name' => $experimentResourceName,
            'name' => 'ADOPT_AI_MAX Experiment #' . uniqid(),
            'type' => ExperimentType::ADOPT_AI_MAX
            ]
        );
        $experimentOperation = new MutateOperation(
            [
            'experiment_operation' =>
                new ExperimentOperation(['create' => $experiment])
            ]
        );

        $campaignResourceName
            = ResourceNames::forCampaign($customerId, $campaignId);

        $controlArm = new ExperimentArm(
            [
            'experiment' => $experimentResourceName,
            'name' => 'Control Arm',
            'control' => true,
            'traffic_split' => 50,
            'campaigns' => [$campaignResourceName]
            ]
        );
        $controlArmOperation = new MutateOperation(
            [
            'experiment_arm_operation' =>
                new ExperimentArmOperation(['create' => $controlArm])
            ]
        );

        $treatmentArm = new ExperimentArm(
            [
            'experiment' => $experimentResourceName,
            'name' => 'Treatment Arm',
            'control' => false,
            'traffic_split' => 50,
            'campaigns' => [$campaignResourceName]
            ]
        );
        $treatmentArmOperation = new MutateOperation(
            [
            'experiment_arm_operation' =>
                new ExperimentArmOperation(['create' => $treatmentArm])
            ]
        );

        $assetAutomationSettings = [];
        $automationTypes = [
            AssetAutomationType::TEXT_ASSET_AUTOMATION,
            AssetAutomationType::FINAL_URL_EXPANSION_TEXT_ASSET_AUTOMATION
        ];

        foreach ($automationTypes as $automationType) {
            $assetAutomationSettings[] = new AssetAutomationSetting(
                [
                'asset_automation_type' => $automationType,
                'asset_automation_status' => AssetAutomationStatus::OPTED_IN
                ]
            );
        }

        $campaign = new Campaign(
            [
            'resource_name' => $campaignResourceName,
            'ai_max_setting' => new AiMaxSetting(['enable_ai_max' => true]),
            'asset_automation_settings' => $assetAutomationSettings
            ]
        );

        $campaignOperation = new CampaignOperation(
            [
            'update' => $campaign,
            'update_mask' => FieldMasks::allSetFieldsOf($campaign)
            ]
        );
        $campaignMutateOperation = new MutateOperation(
            [
            'campaign_operation' => $campaignOperation
            ]
        );

        $mutateOperations = [
            $experimentOperation,
            $controlArmOperation,
            $treatmentArmOperation,
            $campaignMutateOperation
        ];

        $response = $googleAdsServiceClient->mutate(
            MutateGoogleAdsRequest::build($customerId, $mutateOperations)
        );
        // [END create_search_adopt_ai_max_experiment_1]

        $responses = $response->getMutateOperationResponses();

        $experimentResult = $responses[0]->getExperimentResult();
        $controlArmResult = $responses[1]->getExperimentArmResult();
        $treatmentArmResult = $responses[2]->getExperimentArmResult();
        $campaignResult = $responses[3]->getCampaignResult();

        printf(
            "Created experiment: %s%s",
            $experimentResult->getResourceName(),
            PHP_EOL
        );
        printf(
            "Created control arm: %s%s",
            $controlArmResult->getResourceName(),
            PHP_EOL
        );
        printf(
            "Created treatment arm: %s%s",
            $treatmentArmResult->getResourceName(),
            PHP_EOL
        );
        printf(
            "Updated campaign to enable AI Max: %s%s",
            $campaignResult->getResourceName(),
            PHP_EOL
        );
    }
}

CreateSearchAdoptAiMaxExperiment::main();