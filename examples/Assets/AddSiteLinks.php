<?php

/**
 * Copyright 2021 Google LLC
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

namespace Google\Ads\GoogleAds\Examples\Extensions;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\SitelinkAsset;
use Google\Ads\GoogleAds\V18\Enums\AssetFieldTypeEnum\AssetFieldType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Asset;
use Google\Ads\GoogleAds\V18\Resources\CampaignAsset;
use Google\Ads\GoogleAds\V18\Services\AssetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignAssetOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAssetResult;
use Google\Ads\GoogleAds\V18\Services\MutateAssetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignAssetResult;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignAssetsRequest;
use Google\ApiCore\ApiException;

/**
 * Adds sitelinks to a campaign using Assets. To create a campaign, run AddCampaigns.php.
 */
class AddSitelinks
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
     * @param int $customerId the client customer ID
     * @param int $campaignId the campaign ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        // Creates sitelink assets.
        $assetResourceNames
            = self::createSitelinkAssets($googleAdsClient, $customerId);

        // Associates the sitelinks at the campaign level.
        self::linkSitelinksToCampaign(
            $googleAdsClient,
            $customerId,
            $campaignId,
            $assetResourceNames
        );
    }

    /**
     * Creates sitelinks that will be then added to campaigns.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @return string[] $assetResourceNames the resource names of the sitelink assets
     */
    private static function createSitelinkAssets(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ): array {
        // Creates some sitelink assets.
        $storeLocatorAsset = new SitelinkAsset([
            'description1' => 'Get in touch',
            'description2' => 'Find your local store',
            'link_text' => 'Store locator'
        ]);
        $storeAsset = new SitelinkAsset([
            'description1' => 'Buy some stuff',
            'description2' => 'It\'s really good',
            'link_text' => 'Store'
        ]);
        $storeAdditionalAsset = new SitelinkAsset([
            'description1' => 'Even more stuff',
            'description2' => 'There\'s never enough',
            'link_text' => 'Store for more'
        ]);

        // Wraps the sitelinks in an Asset and sets the URLs.
        $assets = [
            new Asset([
                'sitelink_asset' => $storeLocatorAsset,
                'final_urls' => ['http://example.com/contact/store-finder'],
                // Optionally sets a different URL for mobile.
                'final_mobile_urls' => ['http://example.com/mobile/contact/store-finder']
            ]),
            new Asset([
                'sitelink_asset' => $storeAsset,
                'final_urls' => ['http://example.com/store'],
                // Optionally sets a different URL for mobile.
                'final_mobile_urls' => ['http://example.com/mobile/store']
            ]),
            new Asset([
                'sitelink_asset' => $storeAdditionalAsset,
                'final_urls' => ['http://example.com/store/more'],
                // Optionally sets a different URL for mobile.
                'final_mobile_urls' => ['http://example.com/mobile/store/more']
            ])
        ];

        // Creates an operation to add each asset.
        $assetOperations = array_map(function (Asset $asset) {
            return new AssetOperation(['create' => $asset]);
        }, $assets);

        // Issues a mutate request to add the assets and print its information.
        $assetServiceClient = $googleAdsClient->getAssetServiceClient();
        $response = $assetServiceClient->mutateAssets(
            MutateAssetsRequest::build($customerId, $assetOperations)
        );
        $createdAssetResourceNames = [];
        foreach ($response->getResults() as $result) {
            /** @var MutateAssetResult $result */
            printf(
                "Created a sitelink asset with resource name: '%s'.%s",
                $result->getResourceName(),
                PHP_EOL
            );
            $createdAssetResourceNames[] = $result->getResourceName();
        }

        return $createdAssetResourceNames;
    }


    /**
     * Links the assets to a campaign.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID to link the assets
     * @param string[] $assetResourceNames the resource names of the sitelink assets
     */
    private static function linkSitelinksToCampaign(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        array $assetResourceNames
    ): void {
        // Creates a CampaignAssetOperation for each asset resource name by linking it to a newly
        // created CampaignAsset.
        $campaignAssetOperations = array_map(
            function (string $assetResourceName) use ($customerId, $campaignId) {
                return new CampaignAssetOperation(['create' => new CampaignAsset([
                    'asset' => $assetResourceName,
                    'campaign' => ResourceNames::forCampaign($customerId, $campaignId),
                    'field_type' => AssetFieldType::SITELINK
                ])]);
            },
            $assetResourceNames
        );

        // Issues a mutate request to add the campaign assets and prints its information.
        $campaignAssetServiceClient = $googleAdsClient->getCampaignAssetServiceClient();
        $response = $campaignAssetServiceClient->mutateCampaignAssets(
            MutateCampaignAssetsRequest::build($customerId, $campaignAssetOperations)
        );
        foreach ($response->getResults() as $result) {
            /** @var MutateCampaignAssetResult $result */
            printf(
                "Created a campaign asset with resource name: '%s'.%s",
                $result->getResourceName(),
                PHP_EOL
            );
        }
    }
}

AddSitelinks::main();
