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
use Google\Ads\GoogleAds\Lib\V20\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V20\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V20\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\V20\ResourceNames;
use Google\Ads\GoogleAds\V20\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V20\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V20\Resources\Campaign;
use Google\Ads\GoogleAds\V20\Services\CampaignOperation;
use Google\Ads\GoogleAds\V20\Services\MutateCampaignsRequest;
use Google\ApiCore\ApiException;

/**
 * This example updates a campaign by setting the status to `PAUSED`. To get campaigns, run
 * GetCampaigns.php.
 */
class UpdateCampaign
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::CAMPAIGN_ID] ?: self::CAMPAIGN_ID
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
     * @param int $campaignId the ID of campaign to update
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        // Creates a campaign object with the specified resource name and other changes.
        $campaign = new Campaign([
            'resource_name' => ResourceNames::forCampaign($customerId, $campaignId),
            'status' => CampaignStatus::PAUSED
        ]);

        // Constructs an operation that will update the campaign with the specified resource name,
        // using the FieldMasks utility to derive the update mask. This mask tells the Google Ads
        // API which attributes of the campaign you want to change.
        $campaignOperation = new CampaignOperation();
        $campaignOperation->setUpdate($campaign);
        $campaignOperation->setUpdateMask(FieldMasks::allSetFieldsOf($campaign));

        // Issues a mutate request to update the campaign.
        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        $response = $campaignServiceClient->mutateCampaigns(MutateCampaignsRequest::build(
            $customerId,
            [$campaignOperation]
        ));

        // Prints the resource name of the updated campaign.
        /** @var Campaign $updatedCampaign */
        $updatedCampaign = $response->getResults()[0];
        printf(
            "Updated campaign with resource name: '%s'%s",
            $updatedCampaign->getResourceName(),
            PHP_EOL
        );
    }
}

UpdateCampaign::main();
