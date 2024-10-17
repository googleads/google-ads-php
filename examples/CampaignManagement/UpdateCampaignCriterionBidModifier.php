<?php

/**
 * Copyright 2020 Google LLC
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
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\CampaignCriterion;
use Google\Ads\GoogleAds\V18\Services\CampaignCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignCriteriaRequest;
use Google\ApiCore\ApiException;

/**
 * This example updates a campaign criterion with a new bid modifier value.
 */
class UpdateCampaignCriterionBidModifier
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';
    private const CRITERION_ID = 'INSERT_CRITERION_ID_HERE';
    // Specify the bid modifier value here or the default specified below will be used.
    private const BID_MODIFIER_VALUE = 1.5;

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CRITERION_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::BID_MODIFIER_VALUE => GetOpt::OPTIONAL_ARGUMENT
        ]);

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
                $options[ArgumentNames::CAMPAIGN_ID] ?: self::CAMPAIGN_ID,
                $options[ArgumentNames::CRITERION_ID] ?: self::CRITERION_ID,
                $options[ArgumentNames::BID_MODIFIER_VALUE] ?: self::BID_MODIFIER_VALUE
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
     * @param int $customerId the customer ID
     * @param int $campaignId the ID of the campaign for which the bid modifier will be updated
     * @param int $criterionId the ID of the criterion to update
     * @param float $bidModifierValue the bid modifier value to set
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        int $criterionId,
        float $bidModifierValue
    ) {
        // Creates a campaign criterion with the specified resource name and updated bid modifier
        // value.
        $campaignCriterion = new CampaignCriterion([
            'resource_name' => ResourceNames::forCampaignCriterion(
                $customerId,
                $campaignId,
                $criterionId
            ),
            'bid_modifier' => $bidModifierValue
        ]);

        // Creates the campaign criterion operation.
        $campaignCriterionOperation = new CampaignCriterionOperation();
        $campaignCriterionOperation->setUpdate($campaignCriterion);
        $campaignCriterionOperation->setUpdateMask(FieldMasks::allSetFieldsOf($campaignCriterion));

        // Issues a mutate request to update the bid modifier of campaign criterion.
        $campaignCriterionServiceClient = $googleAdsClient->getCampaignCriterionServiceClient();
        $response = $campaignCriterionServiceClient->mutateCampaignCriteria(
            MutateCampaignCriteriaRequest::build($customerId, [$campaignCriterionOperation])
        );

        // Prints the resource name of the updated campaign criterion.
        /** @var CampaignCriterion $updatedCampaignCriterion */
        $updatedCampaignCriterion = $response->getResults()[0];
        printf(
            "Campaign criterion with resource name '%s' was modified.%s",
            $updatedCampaignCriterion->getResourceName(),
            PHP_EOL
        );
    }
}

UpdateCampaignCriterionBidModifier::main();
