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

namespace Google\Ads\GoogleAds\Examples\Remarketing;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V18\GoogleAdsException;
use Google\Ads\GoogleAds\Util\V18\ResourceNames;
use Google\Ads\GoogleAds\V18\Common\DynamicEducationAsset;
use Google\Ads\GoogleAds\V18\Enums\AssetSetTypeEnum\AssetSetType;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\Asset;
use Google\Ads\GoogleAds\V18\Resources\AssetSet;
use Google\Ads\GoogleAds\V18\Resources\AssetSetAsset;
use Google\Ads\GoogleAds\V18\Resources\CampaignAssetSet;
use Google\Ads\GoogleAds\V18\Services\AssetOperation;
use Google\Ads\GoogleAds\V18\Services\AssetSetAssetOperation;
use Google\Ads\GoogleAds\V18\Services\AssetSetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignAssetSetOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAssetSetAssetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAssetSetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAssetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignAssetSetsRequest;
use Google\ApiCore\ApiException;

/** Adds an asset for use in dynamic remarketing. */
class AddDynamicRemarketingAsset
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    // Specify a campaign type which supports dynamic remarketing, such as Display.
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
     * @param int $customerId the client customer ID
     * @param int $campaignId the campaign ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId
    ) {
        // Creates an asset.
        $assetResourceName = self::createAsset($googleAdsClient, $customerId);
        // Creates an asset set - this is a collection of assets that can be associated with a
        // campaign.
        // Note: do not confuse this with an asset group. An asset group replaces ad groups in some
        // types of campaigns.
        $assetSetResourceName = self::createAssetSet($googleAdsClient, $customerId);
        // Adds the asset to the asset set.
        self::addAssetsToAssetSet(
            $googleAdsClient,
            $customerId,
            $assetResourceName,
            $assetSetResourceName
        );
        // Finally links the asset set to the specified campaign.
        self::linkAssetSetToCampaign(
            $googleAdsClient,
            $assetSetResourceName,
            $customerId,
            $campaignId
        );
    }

    /**
     * Creates an asset to use in dynamic remarketing.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @return string the created asset's resource name
     */
    private static function createAsset(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // [START add_asset]
        // Creates a dynamic education asset.
        // See https://support.google.com/google-ads/answer/6053288?#zippy=%2Ceducation for a
        // detailed explanation of the field format.
        $dynamicEducationAsset = new DynamicEducationAsset([
            // Defines meta-information about the school and program.
            'school_name' => 'The University of Unknown',
            'address' => 'Building 1, New York, 12345, USA',
            'program_name' => 'BSc. Computer Science',
            'subject' => 'Computer Science',
            'program_description' => 'Slinging code for fun and profit!',
            // Sets up the program ID which is the ID that should be specified in the tracking
            // pixel.
            'program_id' => 'bsc-cs-uofu',
            // Sets up the location ID which may additionally be specified in the tracking pixel.
            'location_id' => 'nyc',
            'image_url' => 'https://gaagl.page.link/Eit5',
            'android_app_link' => 'android-app://com.example.android/http/example.com/gizmos?1234',
            'ios_app_link' => 'exampleApp://content/page',
            'ios_app_store_id' => 123
        ]);

        // Wraps the dynamic education asset in an asset.
        $asset = new Asset([
            'dynamic_education_asset' => $dynamicEducationAsset,
            'final_urls' => ['https://www.example.com']
        ]);

        // Creates an asset operation.
        $assetOperation = new AssetOperation();
        $assetOperation->setCreate($asset);

        // Issues a mutate request to add the asset and prints its information.
        $assetServiceClient = $googleAdsClient->getAssetServiceClient();
        $response = $assetServiceClient->mutateAssets(
            MutateAssetsRequest::build($customerId, [$assetOperation])
        );
        $assetResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Created a dynamic education asset with resource name: '%s'.%s",
            $assetResourceName,
            PHP_EOL
        );

        return $assetResourceName;
        // [END add_asset]
    }

    /**
     * Creates an asset set.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @return string the created asset set's resource name
     */
    private static function createAssetSet(GoogleAdsClient $googleAdsClient, int $customerId)
    {
        // [START add_asset_set]
        // Creates an asset set which will be used to link the dynamic remarketing assets to a
        // campaign.
        $assetSet = new AssetSet([
            'name' => 'My dynamic remarketing assets ' . Helper::getPrintableDatetime(),
            'type' => AssetSetType::DYNAMIC_EDUCATION
        ]);

        // Creates an asset set operation.
        $assetSetOperation = new AssetSetOperation();
        $assetSetOperation->setCreate($assetSet);

        // Issues a mutate request to add the asset set and prints its information.
        $assetSetServiceClient = $googleAdsClient->getAssetSetServiceClient();
        $response = $assetSetServiceClient->mutateAssetSets(
            MutateAssetSetsRequest::build($customerId, [$assetSetOperation])
        );
        $assetSetResourceName = $response->getResults()[0]->getResourceName();
        printf(
            "Created an asset set with resource name: '%s'.%s",
            $assetSetResourceName,
            PHP_EOL
        );

        return $assetSetResourceName;
        // [END add_asset_set]
    }

    /**
     * Adds an asset to an asset set by creating an asset set asset link.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param string $assetResourceName the asset resource name
     * @param string $assetSetResourceName the asset set resource name
     */
    private static function addAssetsToAssetSet(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $assetResourceName,
        string $assetSetResourceName
    ) {
        // [START add_asset_set_asset]
        // Creates an asset set asset.
        $assetSetAsset = new AssetSetAsset([
            'asset' => $assetResourceName,
            'asset_set' => $assetSetResourceName
        ]);

        // Creates an asset set asset operation.
        $assetSetAssetOperation = new AssetSetAssetOperation();
        $assetSetAssetOperation->setCreate($assetSetAsset);

        // Issues a mutate request to add the asset set asset and prints its information.
        // Note this is the point that the API will enforce uniqueness of the
        // DynamicEducationAsset::program_id field. You can have any number of assets with the same
        // program_id, however, only one asset is allowed per asset set with the same product ID.
        $assetSetAssetServiceClient = $googleAdsClient->getAssetSetAssetServiceClient();
        $response = $assetSetAssetServiceClient->mutateAssetSetAssets(
            MutateAssetSetAssetsRequest::build($customerId, [$assetSetAssetOperation])
        );
        printf(
            "Created asset set asset link with resource name: '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
        // [END add_asset_set_asset]
    }

    /**
     * Links the specified asset set to the specified campaign by creating a campaign asset set.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param string $assetSetResourceName the  asset set's resource name to link
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID to link the asset set to
     */
    private static function linkAssetSetToCampaign(
        GoogleAdsClient $googleAdsClient,
        string $assetSetResourceName,
        int $customerId,
        int $campaignId
    ) {
        // [START add_campaign_asset_set]
        // Creates a campaign asset set representing the link between an asset set and a campaign.
        $campaignAssetSet = new CampaignAssetSet([
            'asset_set' => $assetSetResourceName,
            'campaign' => ResourceNames::forCampaign($customerId, $campaignId)
        ]);

        // Creates a campaign asset set operation.
        $campaignAssetSetOperation = new CampaignAssetSetOperation();
        $campaignAssetSetOperation->setCreate($campaignAssetSet);

        // Issues a mutate request to add the campaign asset set and prints its information.
        $campaignAssetSetServiceClient = $googleAdsClient->getCampaignAssetSetServiceClient();
        $response = $campaignAssetSetServiceClient->mutateCampaignAssetSets(
            MutateCampaignAssetSetsRequest::build($customerId, [$campaignAssetSetOperation])
        );
        printf(
            "Created a campaign asset set with resource name: '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
        // [END add_campaign_asset_set]
    }
}

AddDynamicRemarketingAsset::main();
