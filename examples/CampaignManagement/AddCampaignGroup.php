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

namespace Google\Ads\GoogleAds\Examples\CampaignManagement;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\GoogleAdsException;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Util\FieldMasks;
use Google\Ads\GoogleAds\Util\ResourceNames;
use Google\Ads\GoogleAds\V0\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V0\Resources\Campaign;
use Google\Ads\GoogleAds\V0\Resources\CampaignGroup;
use Google\Ads\GoogleAds\V0\Services\CampaignGroupOperation;
use Google\Ads\GoogleAds\V0\Services\CampaignOperation;
use Google\ApiCore\ApiException;
use Google\Protobuf\StringValue;

/**
 * This example adds a campaign group and then adds campaigns to the group. To get campaigns, run
 * GetCampaigns.php.
 */
class AddCampaignGroup
{
    const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    const CAMPAIGN_ID_1 = 'INSERT_CAMPAIGN_ID_1_HERE';
    const CAMPAIGN_ID_2 = 'INSERT_CAMPAIGN_ID_2_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_IDS => GetOpt::MULTIPLE_ARGUMENT,
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
                $options[ArgumentNames::CAMPAIGN_IDS] ?: [self::CAMPAIGN_ID_1, self::CAMPAIGN_ID_2]
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
     * @param array $campaignIds the IDs of the campaigns to add to the campaign group
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        $customerId,
        array $campaignIds
    ) {
        $campaignGroupResourceName = self::addCampaignGroup($googleAdsClient, $customerId);
        self::addCampaignsToGroup(
            $googleAdsClient,
            $customerId,
            $campaignGroupResourceName,
            $campaignIds
        );
    }

    /**
     * Creates a new CampaignGroup in the specified client account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID without hyphens
     * @return string the resource name of created campaign group
     */
    private static function addCampaignGroup(
        GoogleAdsClient $googleAdsClient,
        $customerId
    ) {
        $campaignGroupOperation = new CampaignGroupOperation();
        $campaignGroupOperation->setCreate(
            new CampaignGroup(['name' => new StringValue(
                ['value' => 'Mars campaign group #' . uniqid()]
            )])
        );

        $campaignGroupServiceClient = $googleAdsClient->getCampaignGroupService();
        $response = $campaignGroupServiceClient->mutateCampaignGroups(
            $customerId,
            [$campaignGroupOperation]
        );

        $campaignGroupResourceName = $response->getResults()[0]->getResourceName();
        print "Added campaign group with resource name: " . $campaignGroupResourceName . PHP_EOL;

        return $campaignGroupResourceName;
    }

    /**
     * Adds campaigns to a CampaignGroup in the specified client account.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID without hyphens
     * @param string $campaignGroupResourceName the resource name of the campaign group
     * @param array $campaignIds the IDs of the campaigns to add to the campaign group
     */
    private static function addCampaignsToGroup(
        GoogleAdsClient $googleAdsClient,
        $customerId,
        $campaignGroupResourceName,
        array $campaignIds
    ) {
        $operations = [];
        foreach ($campaignIds as $campaignId) {
            $campaign = new Campaign([
                    'resource_name' => ResourceNames::forCampaign($customerId, $campaignId),
                    'campaign_group' => new StringValue(['value' => $campaignGroupResourceName])
            ]);

            $campaignOperation = new CampaignOperation();
            $campaignOperation->setUpdate($campaign);
            $campaignOperation->setUpdateMask(FieldMasks::allSetFieldsOf($campaign));

            $operations[] = $campaignOperation;
        }

        $campaignServiceClient = $googleAdsClient->getCampaignServiceClient();
        $response = $campaignServiceClient->mutateCampaigns($customerId, $operations);

        printf(
            "Added %d campaigns to campaign group with resource name %s:%s",
            $response->getResults()->count(),
            $campaignGroupResourceName,
            PHP_EOL
        );

        foreach ($response->getResults() as $addedCampaign) {
            /** @var Campaign $addedCampaign */
            print $addedCampaign->getResourceName() . PHP_EOL;
        }
    }
}

AddCampaignGroup::main();
