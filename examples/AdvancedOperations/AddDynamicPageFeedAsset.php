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

namespace Google\Ads\GoogleAds\Examples\AdvancedOperations;

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
use Google\Ads\GoogleAds\V18\Common\PageFeedAsset;
use Google\Ads\GoogleAds\V18\Common\WebpageConditionInfo;
use Google\Ads\GoogleAds\V18\Common\WebpageInfo;
use Google\Ads\GoogleAds\V18\Enums\AssetSetTypeEnum\AssetSetType;
use Google\Ads\GoogleAds\V18\Enums\WebpageConditionOperandEnum\WebpageConditionOperand;
use Google\Ads\GoogleAds\V18\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V18\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V18\Resources\Asset;
use Google\Ads\GoogleAds\V18\Resources\AssetSet;
use Google\Ads\GoogleAds\V18\Resources\AssetSetAsset;
use Google\Ads\GoogleAds\V18\Resources\CampaignAssetSet;
use Google\Ads\GoogleAds\V18\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V18\Services\AssetOperation;
use Google\Ads\GoogleAds\V18\Services\AssetSetAssetOperation;
use Google\Ads\GoogleAds\V18\Services\AssetSetOperation;
use Google\Ads\GoogleAds\V18\Services\CampaignAssetSetOperation;
use Google\Ads\GoogleAds\V18\Services\MutateAdGroupCriteriaRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAssetSetAssetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAssetSetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateAssetsRequest;
use Google\Ads\GoogleAds\V18\Services\MutateCampaignAssetSetsRequest;
use Google\ApiCore\ApiException;

/** Adds a page feed with URLs for a Dynamic Search Ads campaign. */
class AddDynamicPageFeedAsset
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const CAMPAIGN_ID = 'INSERT_CAMPAIGN_ID_HERE';
    private const AD_GROUP_ID = 'INSERT_AD_GROUP_ID_HERE';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::CAMPAIGN_ID => GetOpt::REQUIRED_ARGUMENT,
            ArgumentNames::AD_GROUP_ID => GetOpt::REQUIRED_ARGUMENT
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
                $options[ArgumentNames::AD_GROUP_ID] ?: self::AD_GROUP_ID
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
     * @param int $adGroupId the ad group ID
     */
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $campaignId,
        int $adGroupId
    ) {
        // The label for the DSA page URLs.
        $dsaPageUrlLabel = 'discounts';
        // Creates assets.
        $assetResourceNames = self::createAssets($googleAdsClient, $customerId, $dsaPageUrlLabel);
        // Creates an asset set - this is a collection of assets that can be associated with a
        // campaign.
        // Note: do not confuse this with an asset group. An asset group replaces ad groups in some
        // types of campaigns.
        $assetSetResourceName = self::createAssetSet($googleAdsClient, $customerId);
        // Adds the assets to the asset set.
        self::addAssetsToAssetSet(
            $googleAdsClient,
            $customerId,
            $assetResourceNames,
            $assetSetResourceName
        );
        // Links the asset set to the specified campaign.
        self::linkAssetSetToCampaign(
            $googleAdsClient,
            $assetSetResourceName,
            $customerId,
            $campaignId
        );
        // Optional: Targets web pages matching the feed's label in the ad group.
        self::addDsaTarget($googleAdsClient, $customerId, $adGroupId, $dsaPageUrlLabel);
        printf(
            "Dynamic page feed setup is complete for campaign with ID %d.%s",
            $campaignId,
            PHP_EOL
        );
    }

    /**
     * Creates assets to be used in a DSA page feed.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param string $dsaPageUrlLabel the DSA page URL label
     * @return string[] the created assets' resource names
     */
    private static function createAssets(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        string $dsaPageUrlLabel
    ): array {
        // [START add_asset]
        $urls = [
            'http://www.example.com/discounts/rental-cars',
            'http://www.example.com/discounts/hotel-deals',
            'http://www.example.com/discounts/flight-deals'
        ];
        $operations = [];
        // Creates one asset per URL.
        foreach ($urls as $url) {
            $pageFeedAsset = new PageFeedAsset([
                'page_url' => $url,
                // Recommended: adds labels to the asset. These labels can be used later in ad group
                // targeting to restrict the set of pages that can serve.
                'labels' => [$dsaPageUrlLabel]
            ]);

            // Wraps the page feed asset in an asset.
            $asset = new Asset(['page_feed_asset' => $pageFeedAsset]);

            // Creates an asset operation and adds it to the list of operations.
            $assetOperation = new AssetOperation();
            $assetOperation->setCreate($asset);
            $operations[] = $assetOperation;
        }

        // Issues a mutate request to add the assets and prints its information.
        $assetServiceClient = $googleAdsClient->getAssetServiceClient();
        $response = $assetServiceClient->mutateAssets(MutateAssetsRequest::build(
            $customerId,
            $operations
        ));
        $assetResourceNames = [];
        printf("Added %d assets:%s", $response->getResults()->count(), PHP_EOL);
        foreach ($response->getResults() as $addedAsset) {
            /** @var Asset $addedAsset */
            $assetResourceName = $addedAsset->getResourceName();
            printf(
                "Created an asset with resource name: '%s'.%s",
                $assetResourceName,
                PHP_EOL
            );
            $assetResourceNames[] = $assetResourceName;
        }
        return $assetResourceNames;
        // [END add_asset]
    }

    /**
     * Creates an asset set.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @return string the created asset set's resource name
     */
    private static function createAssetSet(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ): string {
        // [START add_asset_set]
        // Creates an asset set which will be used to link the dynamic page feed assets to a
        // campaign.
        $assetSet = new AssetSet([
            'name' => 'My dynamic page feed ' . Helper::getPrintableDatetime(),
            'type' => AssetSetType::PAGE_FEED
        ]);

        // Creates an asset set operation.
        $assetSetOperation = new AssetSetOperation();
        $assetSetOperation->setCreate($assetSet);

        // Issues a mutate request to add the asset set and prints its information.
        $assetSetServiceClient = $googleAdsClient->getAssetSetServiceClient();
        $response = $assetSetServiceClient->mutateAssetSets(MutateAssetSetsRequest::build(
            $customerId,
            [$assetSetOperation]
        ));
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
     * Adds assets to an asset set by creating an asset set asset link.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the client customer ID
     * @param string[] $assetResourceNames the asset resource names
     * @param string $assetSetResourceName the asset set resource name
     */
    private static function addAssetsToAssetSet(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        array $assetResourceNames,
        string $assetSetResourceName
    ): void {
        // [START add_asset_set_asset]
        $operations = [];
        foreach ($assetResourceNames as $assetResourceName) {
            // Creates an asset set asset.
            $assetSetAsset = new AssetSetAsset([
                'asset' => $assetResourceName,
                'asset_set' => $assetSetResourceName
            ]);

            // Creates an asset set asset operation and adds it to the list of operations.
            $assetSetAssetOperation = new AssetSetAssetOperation();
            $assetSetAssetOperation->setCreate($assetSetAsset);
            $operations[] = $assetSetAssetOperation;
        }

        // Issues a mutate request to add the asset set assets and prints its information.
        $assetSetAssetServiceClient = $googleAdsClient->getAssetSetAssetServiceClient();
        $response = $assetSetAssetServiceClient->mutateAssetSetAssets(
            MutateAssetSetAssetsRequest::build($customerId, $operations)
        );
        printf("Added %d asset set assets:%s", $response->getResults()->count(), PHP_EOL);
        foreach ($response->getResults() as $addedAssetSetAsset) {
            /** @var AssetSetAsset $addedAssetSetAsset */
            printf(
                "Created an asset set asset link with resource name: '%s'.%s",
                $addedAssetSetAsset->getResourceName(),
                PHP_EOL
            );
        }
        // [END add_asset_set_asset]
    }

    /**
     * Links the specified asset set to the specified campaign by creating a campaign asset set.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param string $assetSetResourceName the asset set's resource name to link
     * @param int $customerId the customer ID
     * @param int $campaignId the campaign ID to link the asset set to
     */
    private static function linkAssetSetToCampaign(
        GoogleAdsClient $googleAdsClient,
        string $assetSetResourceName,
        int $customerId,
        int $campaignId
    ): void {
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

    /**
     * Creates an ad group criterion targeting the DSA label.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     * @param int $adGroupId the ad group ID
     * @param string $dsaPageUrlLabel the label for the DSA page URLs
     */
    public static function addDsaTarget(
        GoogleAdsClient $googleAdsClient,
        int $customerId,
        int $adGroupId,
        string $dsaPageUrlLabel
    ): void {
        // [START add_dsa_target]
        // Creates the webpage condition info that targets an advertiser's webpages based on the
        // custom label specified by the DSA page URL label (e.g. "discounts").
        $webpageConditionInfo = new WebpageConditionInfo([
            'operand' => WebpageConditionOperand::CUSTOM_LABEL,
            'argument' => $dsaPageUrlLabel
        ]);

        // Creates the webpage info, or criterion for targeting webpages of an advertiser's website.
        $webpageInfo = new WebpageInfo([
            'criterion_name' => 'Test Criterion',
            'conditions' => [$webpageConditionInfo]
        ]);

        // Creates the ad group criterion.
        $adGroupCriterion = new AdGroupCriterion([
            'ad_group' => ResourceNames::forAdGroup($customerId, $adGroupId),
            'webpage' => $webpageInfo,
            'cpc_bid_micros' => 1_500_000
        ]);

        // Creates the ad group criterion operation.
        $adGroupCriterionOperation = new AdGroupCriterionOperation();
        $adGroupCriterionOperation->setCreate($adGroupCriterion);

        // Issues a mutate request to add the ad group criterion and prints its information.
        $adGroupCriterionServiceClient = $googleAdsClient->getAdGroupCriterionServiceClient();
        $response = $adGroupCriterionServiceClient->mutateAdGroupCriteria(
            MutateAdGroupCriteriaRequest::build($customerId, [$adGroupCriterionOperation])
        );
        printf(
            "Created ad group criterion with resource name '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
        // [END add_dsa_target]
    }
}

AddDynamicPageFeedAsset::main();
