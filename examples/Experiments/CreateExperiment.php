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
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V24\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V24\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V24\GoogleAdsException;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V24\ResourceNames;
use Google\Ads\GoogleAds\V24\Enums\ExperimentStatusEnum\ExperimentStatus;
use Google\Ads\GoogleAds\V24\Enums\ExperimentTypeEnum\ExperimentType;
use Google\Ads\GoogleAds\V24\Enums\ResponseContentTypeEnum\ResponseContentType;
use Google\Ads\GoogleAds\V24\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V24\Resources\Campaign;
use Google\Ads\GoogleAds\V24\Resources\Experiment;
use Google\Ads\GoogleAds\V24\Resources\ExperimentArm;
use Google\Ads\GoogleAds\V24\Services\CampaignOperation;
use Google\Ads\GoogleAds\V24\Services\Client\ExperimentServiceClient;
use Google\Ads\GoogleAds\V24\Services\ExperimentArmOperation;
use Google\Ads\GoogleAds\V24\Services\ExperimentOperation;
use Google\Ads\GoogleAds\V24\Services\MutateCampaignsRequest;
use Google\Ads\GoogleAds\V24\Services\MutateExperimentArmsRequest;
use Google\Ads\GoogleAds\V24\Services\MutateExperimentsRequest;
use Google\ApiCore\ApiException;

/**
 * Creates a new experiment, arms, and modifies the draft campaign.
 *
 * @category GoogleAds
 * @package  Google\Ads\GoogleAds\Examples\Experiments
 * @author   Google Ads API Team <googleads-api@googlegroups.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @link     https://github.com/googleads/google-ads-php
 */
class CreateExperiment
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const BASE_CAMPAIGN_ID = 'INSERT_BASE_CAMPAIGN_ID_HERE';

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
                ArgumentNames::BASE_CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT
            ]
        );

        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

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
            foreach (
                $googleAdsException->getGoogleAdsFailure()->getErrors()
                as $error
            ) {
                /* @var GoogleAdsError $error */
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
     * @param int             $customerId      the client customer ID
     * @param int             $campaignId      the campaign ID
     *
     * @return void
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        $experimentServiceClient
            = $googleAdsClient->getExperimentServiceClient();

        $experimentResourceName = self::_createExperimentResource(
            $experimentServiceClient,
            $customerId
        );
        $draftCampaignResourceName = self::_createExperimentArms(
            $googleAdsClient,
            $customerId,
            $campaignId,
            $experimentResourceName
        );
        self::_modifyDraftCampaign(
            $googleAdsClient,
            $customerId,
            $draftCampaignResourceName
        );

        $experimentServiceClient->scheduleExperiment($experimentResourceName);
    }

    /**
     * Creates an experiment resource.
     *
     * @param ExperimentServiceClient $experimentServiceClient the experiment client
     * @param int                     $customerId              the customer ID
     *
     * @return string the created experiment's resource name
     */
    private static function _createExperimentResource(
        ExperimentServiceClient $experimentServiceClient,
        int $customerId
    ): string {
        // [START create_experiment_1]
        $experiment = new Experiment(
            [
            'name' => 'Example Experiment #' . Helper::getPrintableDatetime(),
            'type' => ExperimentType::SEARCH_CUSTOM,
            'suffix' => '[experiment]',
            'status' => ExperimentStatus::SETUP
            ]
        );
        $experimentOperation
            = new ExperimentOperation(['create' => $experiment]);

        $response = $experimentServiceClient->mutateExperiments(
            MutateExperimentsRequest::build(
                $customerId,
                [$experimentOperation]
            )
        );
        $experimentResourceName
            = $response->getResults()[0]->getResourceName();
        print "Created experiment with resource name '$experimentResourceName'"
            . PHP_EOL;

        return $experimentResourceName;
        // [END create_experiment_1]
    }

    /**
     * Creates experiment arms and returns the treatment arm resource name.
     *
     * @param GoogleAdsClient $googleAdsClient        the Google Ads API client
     * @param int             $customerId             the customer ID
     * @param int             $campaignId             the campaign ID
     * @param string          $experimentResourceName the experiment's resource name
     *
     * @return string the treatment arm's resource name
     */
    private static function _createExperimentArms(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        string $experimentResourceName
    ): string {
        // [START create_experiment_2]
        $operations = [];
        $experimentArm1 = new ExperimentArm(
            [
            'control' => true,
            'campaigns' => [
                ResourceNames::forCampaign($customerId, $campaignId)
            ],
            'experiment' => $experimentResourceName,
            'name' => 'control arm',
            'traffic_split' => 40
            ]
        );
        $operations[]
            = new ExperimentArmOperation(['create' => $experimentArm1]);
        $experimentArm2 = new ExperimentArm(
            [
            'control' => false,
            'experiment' => $experimentResourceName,
            'name' => 'experiment arm',
            'traffic_split' => 60
            ]
        );
        $operations[]
            = new ExperimentArmOperation(['create' => $experimentArm2]);

        $experimentArmServiceClient
            = $googleAdsClient->getExperimentArmServiceClient();
        $response = $experimentArmServiceClient->mutateExperimentArms(
            MutateExperimentArmsRequest::build($customerId, $operations)
                ->setResponseContentType(ResponseContentType::MUTABLE_RESOURCE)
        );

        $controlArmResourceName
            = $response->getResults()[0]->getResourceName();
        $treatmentArm = $response->getResults()[count($operations) - 1];
        print "Created control arm with resource name "
            . "'$controlArmResourceName'" . PHP_EOL;
        print "Created treatment arm with resource name '"
            . $treatmentArm->getResourceName() . "'" . PHP_EOL;

        return $treatmentArm->getExperimentArm()->getCampaigns()[0];
        // [END create_experiment_2]
    }

    /**
     * Modifies the draft campaign to simulate experiment testing.
     *
     * @param GoogleAdsClient $googleAdsClient           the Google Ads client
     * @param int             $customerId                the customer ID
     * @param string          $draftCampaignResourceName the draft campaign
     *
     * @return void
     */
    private static function _modifyDraftCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $draftCampaignResourceName
    ): void {
        $updatedCampaign = new Campaign(
            [
            'resource_name' => $draftCampaignResourceName,
            'name' => 'Modified Campaign Name '
                . Helper::getShortPrintableDatetime()
            ]
        );
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setUpdate($updatedCampaign);
        $campaignOperation->setUpdateMask(
            FieldMasks::allSetFieldsOf($updatedCampaign)
        );

        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        $campaignServiceClient->mutateCampaigns(
            MutateCampaignsRequest::build($customerId, [$campaignOperation])
        );

        print "Updated the name for the campaign '$draftCampaignResourceName'"
            . PHP_EOL;
    }
}

CreateExperiment::main();