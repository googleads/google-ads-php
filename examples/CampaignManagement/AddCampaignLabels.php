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
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\CampaignLabel;
use Google\Ads\GoogleAds\V18\Services\CampaignLabelOperation;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignLabelsRequest;
use Google\ApiCore\ApiException;

/** This example adds a campaign label to a list of campaigns. */
class AddCampaignLabels
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID_1 = 'INSERT_CAMPAIGN_ID_1_HERE';
    private const CAMPAIGN_ID_2 = 'INSERT_CAMPAIGN_ID_2_HERE';
    private const LABEL_ID = 'INSERT_LABEL_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_IDS => GetOpt::MULTIPLE_ARGUMENT,
            ArgumentNames::LABEL_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CAMPAIGN_IDS] ?:
                    [self::CAMPAIGN_ID_1, self::CAMPAIGN_ID_2],
                $options[ArgumentNames::LABEL_ID] ?: self::LABEL_ID
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
     * @param array $campaignIds the IDs of the campaigns to which the label will be added
     * @param int $labelId the ID of the label to attach to campaigns
     */
    // [START add_campaign_labels]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $campaignIds,
        int $labelId
    ) {
        // Gets the resource name of the label to be added across all given campaigns.
        $labelResourceName = ResourceNames::forLabel($customerId, $labelId);

        // Creates a campaign label operation for each campaign.
        $operations = [];
        foreach ($campaignIds as $campaignId) {
            // Creates the campaign label.
            $campaignLabel = new CampaignLabel([
                'campaign' => ResourceNames::forCampaign($customerId, $campaignId),
                'label' => $labelResourceName
            ]);
            $campaignLabelOperation = new CampaignLabelOperation();
            $campaignLabelOperation->setCreate($campaignLabel);
            $operations[] = $campaignLabelOperation;
        }

        // Issues a mutate request to add the labels to the campaigns.
        $campaignLabelServiceClient = $googleAdsClient->getCampaignLabelServiceClient();
        $response = $campaignLabelServiceClient->mutateCampaignLabels(
            MutateCampaignLabelsRequest::build($customerId, $operations)
        );

        printf("Added %d campaign labels:%s", $response->getResults()->count(), PHP_EOL);

        foreach ($response->getResults() as $addedCampaignLabel) {
            /** @var CampaignLabel $addedCampaignLabel */
            printf(
                "New campaign label added with resource name: '%s'.%s",
                $addedCampaignLabel->getResourceName(),
                PHP_EOL
            );
        }
    }
    // [END add_campaign_labels]
}

AddCampaignLabels::main();
